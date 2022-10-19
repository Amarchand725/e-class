<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            return view('admin.dashboard.dashboard', compact('page_title'));
        }elseif(Auth::check() && Auth::user()->hasRole('Instructor')){
            $page_title = 'Instructor-Dashboard';
            return view('instructor.dashboard.dashboard', compact('page_title'));
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
