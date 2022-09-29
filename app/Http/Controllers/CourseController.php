<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Course;
use DB;
use Session;
use Auth;
use Illuminate\Support\Str;
use App\Models\WhatLearn;
use App\Models\CourseInclude;
use App\Models\CourseTag;
use App\Models\Institute;
use App\Models\Category;
use App\Models\User;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = Course::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where("created_by", "like", "%". $request["search"] ."%");$query->orWhere("title", "like", "%". $request["search"] ."%");$query->orWhere("slug", "like", "%". $request["search"] ."%");$query->orWhere("price", "like", "%". $request["search"] ."%");$query->orWhere("short_description", "like", "%". $request["search"] ."%");$query->orWhere("requirements", "like", "%". $request["search"] ."%");$query->orWhere("full_description", "like", "%". $request["search"] ."%");$query->orWhere("is_featured", "like", "%". $request["search"] ."%");$query->orWhere("thumbnail", "like", "%". $request["search"] ."%");$query->orWhere("video", "like", "%". $request["search"] ."%");
            }
            $models = $query->paginate(10);
            return (string) view('courses._search', compact('models'));
        }

        $page_title = Menu::where('menu', 'course')->first()->label;
        $models = Course::orderby('id', 'desc')->paginate(10);
        return view('courses.index', compact('models', 'page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $view_all_title = Menu::where('menu', 'course')->first()->label;
        $instructors = User::role('instructor')->where('status', 1)->get();
        $institutes = Institute::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        return view('courses.create', compact('view_all_title', 'institutes', 'categories', 'instructors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Course::getValidationRules());
        DB::beginTransaction();

        try{
            $model = new Course();

            if (isset($request->thumbnail)) {
                $thumbnail = date('d-m-Y-His').'.'.$request->file('thumbnail')->getClientOriginalExtension();
                $request->thumbnail->move(public_path('/admin/images/courses'), $thumbnail);
                $model->thumbnail = $thumbnail;
            }

            if (isset($request->video)) {
                $video = date('d-m-Y-His').'.'.$request->file('video')->getClientOriginalExtension();
                $request->video->move(public_path('/admin/images/courses'), $video);
                $model->video = $video;
            }

            $price = $request->price;
            if(isset($request->discount)){
                if($request->discount_type=='percent'){
                    $discount_price = $request->discount*$price/100;
                    $price = $price-$discount_price;
                    $price = round($price, 2);
                }else{
                    $price = $price-$request->discount;
                }
            }

            $model->created_by = Auth::user()->id;
            $model->instructor_slug = $request->instructor_slug;
            $model->institute_slug = $request->institute_slug;
            $model->category_slug = $request->category_slug;
            $model->title = $request->title;
            $model->slug = str::slug($request->title);
            $model->retail_price = $request->price;
            $model->discount_type = $request->discount_type;
            $model->discount = $request->discount;
            $model->price = $price;
            $model->is_paid = isset($request->is_paid)?$request->is_paid:0;
            $model->is_featured = isset($request->is_featured)?$request->is_featured:0;
            $model->short_description = $request->short_description;
            $model->requirements = $request->requirements;
            $model->full_description = $request->full_description;
            $model->video_url = isset($request->video_url)?$request->video_url:NULL;
            $model->duration = $request->duration;
            $model->status = isset($request->status)?$request->status:0;
            $model->save();

            /* if($model && count($request->learns) > 0){
                foreach($request->learns as $learn){
                    if($learn != NULL){
                        WhatLearn::create([
                            'course_id' => $model->id,
                            'title' => $learn,
                        ]);
                    }
                }
            }

            if($model && count($request->includes) > 0){
                foreach($request->includes as $key=>$include){
                    if($include != NULL){
                        CourseInclude::create([
                            'course_id' => $model->id,
                            'icon' => $request->icons[$key],
                            'title' => $include,
                        ]);
                    }
                }
            }

            if($model && count($request->tags) > 0){
                foreach($request->tags as $tag){
                    if($tag != NULL){
                        CourseTag::create([
                            'course_id' => $model->id,
                            'tag' => $tag,
                        ]);
                    }
                }
            } */

            DB::commit();

            return redirect()->route('course.index')->with('message', 'Course Added Successfully !');
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
        $view_all_title = Menu::where('menu', 'course')->first()->label;
        $model = Course::findOrFail($id);
      	return view('courses.show', compact('view_all_title', 'model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $view_all_title = Menu::where('menu', 'course')->first()->label;
        $model = Course::findOrFail($id);
        $instructors = User::role('instructor')->where('status', 1)->get();
        $institutes = Institute::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        return view('courses.edit', compact('view_all_title', 'model', 'institutes', 'categories', 'instructors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $model = Course::findOrFail($id);

        if(!$model->thumbnail){
            $this->validate($request, Course::getValidationRules());
        }else{
            $rules = [
                'title' => 'unique:courses,title,'.$id,
            ];

            $this->validate($request, $rules);
        }

        try{
            if (isset($request->thumbnail)) {
                $exist_image = public_path('/admin/images/courses');
                if($model->profile_image){
                    $exist = $exist_image.'/'.$model->thumbnail;
                    unlink($exist);
                }

                $thumbnail = date('d-m-Y-His').'.'.$request->file('thumbnail')->getClientOriginalExtension();
                $request->thumbnail->move(public_path('/admin/images/courses'), $thumbnail);
                $model->thumbnail = $thumbnail;
            }

            if (isset($request->video)) {
                $exist_image = public_path('/admin/images/courses');
                if($model->profile_image){
                    $exist = $exist_image.'/'.$model->video;
                    unlink($exist);
                }

                $video = date('d-m-Y-His').'.'.$request->file('video')->getClientOriginalExtension();
                $request->video->move(public_path('/admin/images/courses'), $video);
                $model->video = $video;
            }

            $price = $request->price;
            if(isset($request->discount)){
                if($request->discount_type=='percent'){
                    $discount_price = $request->discount*$price/100;
                    $price = $price-$discount_price;
                    $price = round($price, 2);
                }else{
                    $price = $price-$request->discount;
                }
            }

            $model->instructor_slug = $request->instructor_slug;
            $model->institute_slug = $request->institute_slug;
            $model->category_slug = $request->category_slug;
            $model->title = $request->title;
            $model->slug = str::slug($request->title);
            $model->retail_price = $request->price;
            $model->discount_type = $request->discount_type;
            $model->discount = $request->discount;
            $model->price = $price;
            $model->is_paid = isset($request->is_paid)?$request->is_paid:0;
            $model->is_featured = isset($request->is_featured)?$request->is_featured:0;
            $model->short_description = $request->short_description;
            $model->requirements = $request->requirements;
            $model->full_description = $request->full_description;
            $model->video_url = isset($request->video_url)?$request->video_url:NULL;
            $model->duration = $request->duration;
            $model->status = isset($request->status)?$request->status:0;
            $model->save();

            /* if (isset($request->thumbnail)) {
                $thumbnail = date('d-m-Y-His').'.'.$request->file('thumbnail')->getClientOriginalExtension();
                $request->thumbnail->move(public_path('/admin/images/courses'), $thumbnail);
                $model->thumbnail = $thumbnail;
            }

            if (isset($request->video)) {
                $video = date('d-m-Y-His').'.'.$request->file('video')->getClientOriginalExtension();
                $request->video->move(public_path('/admin/images/courses'), $video);
                $model->video = $video;
            }

            $model->instructor_slug = $request->instructor_slug;
            $model->institute_slug = $request->institute_slug;
            $model->category_slug = $request->category_slug;
            $model->title = $request->title;
            $model->slug = str::slug($request->title);
            $model->price = $request->price;
            $model->sale_price = $request->sale_price;
            $model->is_featured = $request->is_featured;
            $model->short_description = $request->short_description;
            $model->requirements = $request->requirements;
            $model->full_description = $request->full_description;
            $model->status = $request->status;
            $model->save(); */

            /* if($model && count($request->learns) > 0){
                WhatLearn::where('course_id', $model->id)->delete();
                foreach($request->learns as $learn){
                    if($learn != NULL){
                        WhatLearn::create([
                            'course_id' => $model->id,
                            'title' => $learn,
                        ]);
                    }
                }
            }

            if($model && count($request->includes) > 0){
                CourseInclude::where('course_id', $model->id)->delete();
                foreach($request->includes as $key=>$include){
                    if($include != NULL){
                        CourseInclude::create([
                            'course_id' => $model->id,
                            'icon' => $request->icons[$key],
                            'title' => $include,
                        ]);
                    }
                }
            }

            if($model && count($request->tags) > 0){
                CourseTag::where('course_id', $model->id)->delete();
                foreach($request->tags as $tag){
                    if($tag != NULL){
                        CourseTag::create([
                            'course_id' => $model->id,
                            'tag' => $tag,
                        ]);
                    }
                }
            } */

            return redirect()->route('course.index')->with('message', 'Course update Successfully !');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error. '.$e->getMessage());
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
        $model = Course::findOrFail($id);
	    $model->delete();

        if($model){
            return 1;
        }else{
            return 0;
        }
    }
}
