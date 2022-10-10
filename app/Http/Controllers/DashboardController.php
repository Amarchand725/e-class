<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        if(Auth::check() && Auth::user()->hasRole('Admin')){
            $page_title = 'Admin-Dashboard';
            return view('admin.dashboard.dashboard', compact('page_title'));
        }elseif(Auth::check() && Auth::user()->hasRole('Instructor')){
            $page_title = 'Instructor-Dashboard';
            return view('instructor.dashboard.dashboard', compact('page_title'));
        }else{
            $page_title = 'Instructor-Dashboard';
            return view('instructor.dashboard.dashboard', compact('page_title'));
        }
    }
}
