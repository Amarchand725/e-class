@extends('web-views.layouts.app')

@section('content')
    <section id="signup" class="signup-block-main-block register-page">
        <div class="container">
            <div class="login-signup">
                <div class="row no-gutters">
                    <div class="col-lg-6 col-md-6">
                        <div class="signup-side-block">
                            <img src="{{ asset('public/website/images/login/login.png') }}" class="img-fluid" alt="">
                            <div class="login-img">
                                <img src="{{ asset('public/website/images/login/1642399975login-01.png') }}" class="img-fluid" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="signup-heading">
                            Eclass Learning Management
                            <div class="signup-block">
                                <form id="become-instructor-form" class="regisger-form signup-form" method="POST" data-action="{{ route('user.store') }}">
                                    @csrf
                                    <input type="hidden" name="role_id" value="Student"> <!-- default role from here is student -->
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <i data-feather="user"></i>
                                                <input type="text" class="form-control" name="first_name" value="" id="first_name" placeholder="First Name">
                                                <span class="text-danger" id="error-first_name">{{ $errors->first('first_name') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <i data-feather="user"></i>
                                                <input type="text" class="form-control" name="last_name" value="" id="last_name" placeholder="Last Name">
                                                <span class="text-danger" id="error-last_name">{{ $errors->first('last_name') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <i data-feather="mail"></i>
                                                <input type="email" class="form-control" name="email" value="" id="email" placeholder="Email">
                                                <span class="text-danger" id="error-email">{{ $errors->first('email') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <i data-feather="phone"></i>
                                                <input type="text" class="form-control" name="mobile" value="" id="mobile" placeholder="Mobile">
                                                <span class="text-danger" id="error-mobile">{{ $errors->first('mobile') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <i data-feather="lock"></i>
                                                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                                <span class="text-danger" id="error-password">{{ $errors->first('password') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <i data-feather="lock"></i>
                                                <input id="password-confirm" type="password" class="form-control" name="confirmed" placeholder="Confirm Password" required>
                                                <span class="text-danger" id="error-confirmed">{{ $errors->first('confirmed') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="text-center">
                                            <div data-sitekey="" class="g-recaptcha"></div>
                                        </div>
                                    </div>
                                    <br>
                                    <br>

                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="term" id="term" required>
                                            <label class="form-check-label" for="term">
                                                <div class="signin-link text-center btm-20">
                                                    <b>I agree to <a href="#" title="Policy">Terms&amp;Condition </a>, <a href="#" title="Policy">PrivacyPolicy.</a></b>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <button type="submit" title="Sign Up" class="btn btn-primary">Signup</button>
                                </form>
                                <div class="sign-up text-center">Alreadyhaveanaccount?<a href="{{ route('login') }}" title="Login"> Login</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
