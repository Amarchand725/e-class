<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('web-views.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();
        if(Auth::user()->hasRole('Admin')){
            return redirect()->intended(RouteServiceProvider::ADMIN_HOME);
        }elseif(Auth::user()->hasRole('Inscructor')){
            return redirect()->intended(RouteServiceProvider::INSTRUCTOR_HOME);
        }else{
            if(Session::has('checkout')){
                Session::forget('checkout');
                return redirect()->route('checkout');
            }
            
            return redirect()->intended(RouteServiceProvider::HOME);    
        }
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $user_auth = Auth::user();
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if($user_auth->hasRole('Admin')){
            return redirect()->route('admin.login');
        }else{
            return redirect()->route('login');
        }
    }
}
