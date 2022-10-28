<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseChapter;
use App\Models\Course;
use App\Models\Chat;
use App\Models\EnrollStudent;

class ChatController extends Controller
{
    public function Chat($chapter_id)
    {
        $model = CourseChapter::where('id', $chapter_id)->first();
        $course_slug = Course::where('id', $model->course_id)->first()->slug;
        $messages = Chat::where('chapter_id', $model->id)->get();
        $students = EnrollStudent::orderby('id', 'desc')->where('product_slug', $course_slug)->get();
        return view('web-views.website.user.chat', compact('model', 'messages', 'students'));
    }
}
