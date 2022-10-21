<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Institute;
use App\Models\EnrollStudent;
use App\Models\Follower;
use App\Models\Blog;
use App\Models\User;
use App\Models\Order;
use Auth;

class DashboardController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }
    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password],
            $request->get('remember'))){
            return redirect()->route('admin.dashboard');
        }else{
            session()->flash('error', 'Either Email/Password is incorrect');
            return back()->withInput($request->only('email'));
        }
    }
    public function dashboard()
    {
        if(Auth::check() && Auth::user()->hasRole('Admin')){
            $page_title = 'Admin-Dashboard';
            $data = [];
            $data['total_instructors'] = User::role('Instructor')->count();
            $data['total_orders'] = Order::count();
            $data['total_courses'] = Course::count();
            $data['total_institutes'] = Institute::count();
            $data['total_enrolled_users'] = EnrollStudent::count();
            $data['total_followers'] = Follower::where('user_slug', Auth::user()->slug)->count();
            $data['total_followings'] = Follower::where('follower_slug', Auth::user()->slug)->count();
            $data['total_blogs'] = Blog::count();
            return view('admin.dashboard.dashboard', compact('page_title', 'data'));
        }elseif(Auth::check() && Auth::user()->hasRole('Instructor')){
            $page_title = 'Instructor-Dashboard';
            $data = [];
            $data['total_courses'] = Course::where('instructor_slug', Auth::user()->slug)->count();
            $data['total_institutes'] = Institute::where('user_slug', Auth::user()->slug)->count();
            $data['total_enrolled_users'] = EnrollStudent::where('instructor_slug', Auth::user()->slug)->count();
            $data['total_followers'] = Follower::where('user_slug', Auth::user()->slug)->count();
            $data['total_followings'] = Follower::where('follower_slug', Auth::user()->slug)->count();
            $data['total_blogs'] = Blog::where('created_by', Auth::user()->id)->count();
            return view('instructor.dashboard.dashboard', compact('page_title', 'data'));
        }
    }

    public function logout()
    {
        $user_auth = Auth::user();
        Auth::guard('web')->logout();
        if($user_auth->hasRole('Admin')){
            return redirect()->route('admin.login');
        }else{
            return redirect()->route('login');
        }
    }
}
