@extends('web-views.layouts.app')

@section('content')
<section id="signup" class="signup-block-main-block">
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
                            <form method="POST" class="signup-form" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <i data-feather="mail"></i>
                                    <input id="email" type="email" class="form-control" placeholder="Enter Your E-Mail"   name="email" value="" required autofocus>
                                </div>

                                <div class="form-group">
                                    <i data-feather="lock"></i>
                                    <input id="password" type="password" class="form-control" placeholder="Enter Your Password" name="password" required>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" >
                                                <label class="form-check-label" for="remember">
                                                    Remember Me
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <div class="forgot-password text-right btm-20">
                                            <a href="#" title="sign-up">ForgotPassword</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit"  class="btn btn-primary">
                                        Login
                                    </button>
                                </div>
                            </form>

                            {{-- <div class="social-link btm-10">
                                <h2><span>Or Sign Up Using</span></h2>
                                <div class="row">
                                    <div class="col-lg-2 col-4">
                                        <a href="#" target="_blank" title="facebook" class="social-icon facebook-icon" title="Facebook"><i class="fa fa-facebook"></i></a>
                                    </div>

                                    <div class="col-lg-2 col-4">
                                        <div class="google">
                                            <a href="#" target="_blank" title="google" class="social-icon google-icon" title="google"><i class="fab fa-google-plus-g"></i></a>
                                        </div>
                                    </div>

                                    <div class="col-lg-2 col-4">
                                        <div class="signin-link amazon-button">
                                            <a href="#" target="_blank" title="amazon" class="social-icon amazon-icon" title="Amazon"><i class="fab fa-amazon"></i></a>
                                        </div>
                                    </div>

                                    <div class="col-lg-2 col-4">
                                        <div class="signin-link linkedin-button">
                                            <a href="#" target="_blank" title="linkedin" class="social-icon linkedin-icon" title="Linkedin"><i class="fab fa-linkedin"></i></a>
                                        </div>
                                    </div>

                                    <div class="col-lg-2 col-4">
                                        <div class="signin-link twitter-button">
                                            <a href="#" target="_blank" title="twitter" class="social-icon twitter-icon" title="Twitter"><i class="fab fa-twitter"></i></a>
                                        </div>
                                    </div>

                                    <div class="col-lg-2 col-4">
                                        <div class="signin-link btm-10">
                                            <a href="#" target="_blank" title="gitlab" class="social-icon gitlab-icon" title="gitlab"><i class="fab fa-gitlab"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="sign-up text-center">
                                Donothaveanaccount?<a href="register.html" title="sign-up"> Signup</a>
                            </div>
                            <hr>
                            <div class="signin-link text-center">
                               Bysigningup <a href="#" title="Policy">Terms&amp;Condition </a>, <a href="#" title="Policy">PrivacyPolicy.</a>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!--  Signup end-->
@endsection
