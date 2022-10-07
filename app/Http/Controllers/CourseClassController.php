<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\CourseClass;
use App\Models\CourseChapter;
use DB;
use Session;

class CourseClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = CourseClass::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where("chapter_id", "like", "%". $request["search"] ."%");$query->orWhere("title", "like", "%". $request["search"] ."%");$query->orWhere("detail", "like", "%". $request["search"] ."%");$query->orWhere("type", "like", "%". $request["search"] ."%");$query->orWhere("attachment", "like", "%". $request["search"] ."%");$query->orWhere("is_featured", "like", "%". $request["search"] ."%");
            }
            $models = $query->paginate(10);
            return (string) view('courseclasses._search', compact('models'));
        }

        $page_title = Menu::where('menu', 'courseclass')->first()->label;
        $models = CourseClass::orderby('id', 'desc')->paginate(10);
        return view('courseclasses.index', compact('models', 'page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $view_all_title = Menu::where('menu', 'courseclass')->first()->label;
        return view('courseclasses.create', compact('view_all_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, CourseClass::getValidationRules());

        $input = $request->all();

        DB::beginTransaction();

        try{
            if (isset($request->attachment)) {
                $attachment = date('d-m-Y-His').'.'.$request->file('attachment')->getClientOriginalExtension();
                $request->attachment->move(public_path('/admin/course_class/attachments'), $attachment);
                $input['attachment'] = $attachment;
            }

            if (isset($request->lecture)) {
                $getID3 = new \getID3();
                
                $lecture = date('d-m-Y-His').'.'.$request->file('lecture')->getClientOriginalExtension();
                $pathVideo = $request->lecture->move(public_path('/admin/course_class/lectures'), $lecture);
                $fileAnalyze = $getID3->analyze($pathVideo);
                $input['lecture'] = $lecture;
                $input['lecture_duration'] = $fileAnalyze['playtime_string'];
            }

            if(isset($request['status']) && $request['status']==null){
                $input['status'] = 1;
            }else{
                $input['status'] = 0;            
            }
            if(isset($request['is_featured']) && $request['is_featured']==null){
                $input['is_featured'] = 1;
            }else{
                $input['is_featured'] = 0;
            }
	        $model = CourseClass::create($input);

            DB::commit();
            if($model){
                $courseclasses = CourseClass::orderby('id', 'desc')->where('course_id', $model->course_id)->paginate(10);
                $listing = (string) view('web-views.website.courseincludes.classes.listing', compact('courseclasses'));
                return response()->json(['code'=>200, 'listing'=>$listing]);
            }
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error. '.$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $view_all_title = Menu::where('menu', 'courseclass')->first()->label;
        $model = CourseClass::findOrFail($id);
      	return view('courseclasses.show', compact('view_all_title', 'model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $model = CourseClass::findOrFail($id);
        $coursechapters = CourseChapter::orderby('id', 'desc')->get();
        return (string) view('courseclasses.ajax.edit', compact('coursechapters', 'model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $model = CourseClass::findOrFail($id);

        if(isset($request->change_status)){
            if($model->status==1){
                $model->status = 0;
            }else{
                $model->status = 1;
            }
            $model->save();
            if($model){
                $courseclasses = CourseClass::orderby('id', 'desc')->where('course_id', $model->course_id)->paginate(10);
                $listing = (string) view('web-views.website.courseincludes.classes.listing', compact('courseclasses'));
                return response()->json(['code'=>200, 'listing'=>$listing]);
            }
        }

        if(isset($request->is_featured)){
            if($model->is_featured==1){
                $model->is_featured = 0;
            }else{
                $model->is_featured = 1;
            }
            $model->save();
            if($model){
                $courseclasses = CourseClass::orderby('id', 'desc')->where('course_id', $model->course_id)->paginate(10);
                $listing = (string) view('web-views.website.courseincludes.classes.listing', compact('courseclasses'));
                return response()->json(['code'=>200, 'listing'=>$listing]);
            }
        }

        $input = $request->all();
	    $this->validate($request, CourseClass::getValidationRules());

        try{
            if (isset($request->attachment)) {
                $exist_path = public_path('/admin/course_class/attachments');
                if($model->attachment){
                    $exist_file = $exist_path.'/'.$model->attachment;
                    unlink($exist_file);
                }
                
                $attachment = date('d-m-Y-His').'.'.$request->file('attachment')->getClientOriginalExtension();
                $request->attachment->move(public_path('/admin/course_class/attachments'), $attachment);
                $input['attachment'] = $attachment;
            }

            if (isset($request->lecture)) {
                $exist_path = public_path('/admin/course_class/lectures');
                if($model->lecture){
                    $exist_file = $exist_path.'/'.$model->lecture;
                    unlink($exist_file);
                }

                $getID3 = new \getID3();
                
                $lecture = date('d-m-Y-His').'.'.$request->file('lecture')->getClientOriginalExtension();
                $pathVideo = $request->lecture->move(public_path('/admin/course_class/lectures'), $lecture);
                $fileAnalyze = $getID3->analyze($pathVideo);
                $input['lecture'] = $lecture;
                $input['lecture_duration'] = $fileAnalyze['playtime_string'];
            }

            $input = $request->except(['status']);
            $input = $request->except(['is_featured']);
            $model->fill( $input )->save();
            
            DB::commit();
            if($model){
                $courseclasses = CourseClass::orderby('id', 'desc')->where('course_id', $model->course_id)->paginate(10);
                $listing = (string) view('web-views.website.courseincludes.classes.listing', compact('courseclasses'));
                return response()->json(['code'=>200, 'listing'=>$listing]);
            }
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error'=>'Error. '.$e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $model = CourseClass::findOrFail($id);
	    $model->delete();

        if($model){
            return 1;
        }else{
            return 0;
        }
    }
}
