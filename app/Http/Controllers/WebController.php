<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Institute;
use App\Models\Course;

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
        return view('web-views.website.course.single', compact('model'));
    }
}
