<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Models\Course;
use App\Models\CourseChapter;
use App\Models\CourseClass;
use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
use Illuminate\Support\Str;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = Meeting::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where("host_slug", "like", "%". $request["search"] ."%");
                $query->orWhere("topic", "like", "%". $request["search"] ."%");
                $query->orWhere("slug", "like", "%". $request["search"] ."%");
                $query->orWhere("date", "like", "%". $request["search"] ."%");
            }
            if(Auth::user()->roles[0]->name=='Admin'){
                $models = $query->paginate(10);
            }else{
                $models = $query->where('host_slug', Auth::user()->slug)->paginate(10);
            }

            return (string) view('meetings._search', compact('models'));
        }

        $page_title = 'All Meetings';
        if(Auth::user()->roles[0]->name=='Admin'){
            $models = Meeting::orderby('id', 'desc')->paginate(10);
        }else{
            $models = Meeting::orderby('id', 'desc')->where('host_slug', Auth::user()->slug)->paginate(10);
        }
        return view('meetings.index', compact('models', 'page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view_all_title = 'All Meetings';
        $courses = Course::where('instructor_slug', Auth::user()->slug)->where('status', 1)->get();
        return view('meetings.create', compact('view_all_title', 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Meeting::getValidationRules());
        DB::beginTransaction();

        try{
            $model = new Meeting();

            if (isset($request->thumbnail)) {
                $thumbnail = date('d-m-Y-His').'.'.$request->file('thumbnail')->getClientOriginalExtension();
                $request->thumbnail->move(public_path('/admin/images/meetings'), $thumbnail);
                $model->thumbnail = $thumbnail;
            }

            $model->course_slug = $request->course_slug;
            $model->course_chapter = $request->course_chapter;
            $model->chapter_class = $request->chapter_class;

            $model->meeting_from = $request->meeting_from;
            $model->meeting_url = $request->meeting_url;
            $model->host_slug = Auth::user()->slug;
            $model->email = $request->email;
            $model->start_date = $request->start_date;
            $model->start_time = $request->start_time;
            $model->topic = $request->topic;
            $model->slug = str::slug($request->topic);
            $model->agenda = $request->agenda;
            $model->save();

            DB::commit();

            return redirect()->route('meeting.index')->with('message', 'Meeting Added Successfully !');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error. '.$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $view_all_title = 'Meeting';
        $model = Meeting::findOrFail($id);
      	return view('meetings.show', compact('view_all_title', 'model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $view_all_title = 'Edit Meeting';
        $model = Meeting::findOrFail($id);
        $course_id = Course::where('slug', $model->course_slug)->first()->id;
        $courses = Course::where('instructor_slug', Auth::user()->slug)->where('status', 1)->get();
        $chapters = CourseChapter::where('course_id', $course_id)->get();

        $classes = CourseClass::where('chapter_id', $model->course_chapter)->get();
        return view('meetings.edit', compact(
            'view_all_title', 'model', 'courses', 'chapters', 'classes'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = Meeting::findOrFail($id);
        if(empty($model->thumbnail)){
            $this->validate($request, Meeting::getValidationRules());
        }else{
            $rules = [
                'topic' => ['required'],
                'start_date' => 'required',
                'start_time' => 'required',
                'meeting_url' => 'required',
                'email' => 'required',
            ];

            $this->validate($request, $rules);
        }
        DB::beginTransaction();

        try{
            if (isset($request->thumbnail)) {
                $exist_image = public_path('/admin/images/meetings');
                if($model->thumbnail){
                    $exist = $exist_image.'/'.$model->thumbnail;
                    unlink($exist);
                }

                $thumbnail = date('d-m-Y-His').'.'.$request->file('thumbnail')->getClientOriginalExtension();
                $request->thumbnail->move(public_path('/admin/images/meetings'), $thumbnail);
                $model->thumbnail = $thumbnail;
            }

            $model->course_slug = $request->course_slug;
            $model->course_chapter = $request->course_chapter;
            $model->chapter_class = $request->chapter_class;

            $model->meeting_from = $request->meeting_from;
            $model->meeting_url = $request->meeting_url;
            $model->host_slug = Auth::user()->slug;
            $model->email = $request->email;
            $model->start_date = $request->start_date;
            $model->start_time = $request->start_time;
            $model->topic = $request->topic;
            $model->slug = str::slug($request->topic);
            $model->agenda = $request->agenda;
            $model->status = isset($request->status)?$request->status:0;
            $model->save();

            DB::commit();

            return redirect()->route('meeting.index')->with('message', 'Meeting Updated Successfully !');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error. '.$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Meeting::findOrFail($id);
	    $model->delete();

        if($model){
            return 1;
        }else{
            return 0;
        }
    }
}
