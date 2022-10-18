<?php

namespace App\Http\Controllers\instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    public function editProfile()
    {
        return view('web-views.website.user.edit-profile');
    }
}
