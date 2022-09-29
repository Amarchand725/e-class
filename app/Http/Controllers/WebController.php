<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Institute;
use App\Models\Course;
use App\Models\User;

class WebController extends Controller
{
    public function index()
    {
        return view('web-views.website.index');
    }

    public function instituteSingle($slug)
    {
        $model = Institute::where('slug', $slug)->first();
        return view('web-views.website.institutes.single', compact('model'));
    }

    public function courseSingle($slug)
    {
        $model = Course::where('slug', $slug)->first();
        $recent_courses = Course::orderby('updated_at', 'desc')->where('id', '!=', $model->id)->where('status', 1)->take(4)->get();
        $related_courses = Course::where('id', '!=', $model->id)->where('status', 1)->where('category_slug', $model->category_slug)->get();
        return view('web-views.website.course.single', compact('model', 'recent_courses', 'related_courses'));
    }
    public function userProfile($slug)
    {
        $model = User::where('slug', $slug)->first();
        $courses = Course::where('created_by', $model->id)->paginate(4);
        return view('web-views.website.user.profile', compact('model', 'courses'));
    }
}
