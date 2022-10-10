

<?php $__env->startSection('content'); ?>
    <section id="signup" class="signup-block-main-block register-page">
        <div class="container">
            <div class="login-signup">
                <div class="row no-gutters">
                    <div class="col-lg-6 col-md-6">
                        <div class="signup-side-block">
                            <img src="<?php echo e(asset('public/website/images/login/login.png')); ?>" class="img-fluid" alt="">
                            <div class="login-img">
                                <img src="<?php echo e(asset('public/website/images/login/1642399975login-01.png')); ?>" class="img-fluid" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="signup-heading">
                            Eclass Learning Management
                            <div class="signup-block">
                                <form id="become-instructor-form" class="regisger-form signup-form" method="POST" data-action="<?php echo e(route('user.store')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="role_id" value="Student"> <!-- default role from here is student -->
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <i data-feather="user"></i>
                                                <input type="text" class="form-control" name="first_name" value="" id="first_name" placeholder="First Name">
                                                <span class="text-danger" id="error-first_name"><?php echo e($errors->first('first_name')); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <i data-feather="user"></i>
                                                <input type="text" class="form-control" name="last_name" value="" id="last_name" placeholder="Last Name">
                                                <span class="text-danger" id="error-last_name"><?php echo e($errors->first('last_name')); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <i data-feather="mail"></i>
                                                <input type="email" class="form-control" name="email" value="" id="email" placeholder="Email">
                                                <span class="text-danger" id="error-email"><?php echo e($errors->first('email')); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <i data-feather="phone"></i>
                                                <input type="text" class="form-control" name="mobile" value="" id="mobile" placeholder="Mobile">
                                                <span class="text-danger" id="error-mobile"><?php echo e($errors->first('mobile')); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <i data-feather="lock"></i>
                                                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                                <span class="text-danger" id="error-password"><?php echo e($errors->first('password')); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <i data-feather="lock"></i>
                                                <input id="password-confirm" type="password" class="form-control" name="confirmed" placeholder="Confirm Password" required>
                                                <span class="text-danger" id="error-confirmed"><?php echo e($errors->first('confirmed')); ?></span>
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

                                <div class="social-link btm-10">
                                    <h2><span>Or Sign Up Using</span></h2>
                                    <div class="row">
                                        <div class="col-lg-2 col-4">
                                            <a href="https://www.facebook.com/v3.3/dialog/oauth?client_id=&amp;redirect_uri=&amp;scope=email&amp;response_type=code&amp;state=o6ZvvuVeQ5HLKkEyuJ645tgBnEUr7zi0z5I11eLO" target="_blank" title="facebook" class="social-icon facebook-icon" title="Facebook"><i class="fa fa-facebook"></i></a>
                                        </div>

                                        <div class="col-lg-2 col-4">
                                            <div class="google">
                                                <a href="https://accounts.google.com/o/oauth2/auth?client_id=&amp;redirect_uri=https%3A%2F%2Feclass.mediacity.co.in%2Fdemo%2Fpublic%2Fauth%2Fgoogle%2Fcallback&amp;scope=openid+profile+email&amp;response_type=code&amp;state=fCSmYdHOolsxmVWIaqegdzsWkCeISs2IReeQHAAE" target="_blank" title="google" class="social-icon google-icon" title="google"><i class="fab fa-google-plus-g"></i></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-4">
                                            <div class="signin-link amazon-button">
                                                <a href="https://www.amazon.com/ap/oa?client_id=&amp;redirect_uri=https%3A%2F%2Feclass.mediacity.co.in%2Fdemo%2Fpublic%2Fauth%2Famazon%2Fcallback&amp;scope=profile&amp;response_type=code&amp;state=PVKTA65MEiAC7cxCvsFqdGjqEUGo5tmRKsuzXtJN" target="_blank" title="amazon" class="social-icon amazon-icon" title="Amazon"><i class="fab fa-amazon"></i></a>
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-4">
                                            <div class="signin-link linkedin-button">
                                                <a href="https://www.linkedin.com/oauth/v2/authorization?client_id=&amp;redirect_uri=https%3A%2F%2Feclass.mediacity.co.in%2Fdemo%2Fpublic%2Fauth%2Flinkedin%2Fcallback&amp;scope=r_liteprofile+r_emailaddress&amp;response_type=code&amp;state=Cl8XVDgYE5kzFcjVRRQu3uwZlSjWiwq986anPNGP" target="_blank" title="linkedin" class="social-icon linkedin-icon" title="Linkedin"><i class="fab fa-linkedin"></i></a>
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-4">
                                            <div class="signin-link twitter-button">
                                                <a href="auth/twitter.html" target="_blank" title="twitter" class="social-icon twitter-icon" title="Twitter"><i class="fab fa-twitter"></i></a>
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-4">
                                            <div class="signin-link btm-10">
                                                <a href="https://gitlab.com/oauth/authorize?client_id=&amp;redirect_uri=https%3A%2F%2Feclass.mediacity.co.in%2Fdemo%2Fpublic%2Fauth%2Fgitlab%2Fcallback&amp;scope=read_user&amp;response_type=code&amp;state=Epvmn9rldIIhBUhfLaSM2v2jiM4QlfvK6vZbEgxb" target="_blank" title="gitlab" class="social-icon gitlab-icon" title="gitlab"><i class="fab fa-gitlab"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sign-up text-center">Alreadyhaveanaccount?<a href="<?php echo e(route('login')); ?>" title="Login"> Login</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('web-views.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e-class\resources\views/web-views/auth/register.blade.php ENDPATH**/ ?>