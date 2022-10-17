@extends('web-views.layouts.app')

@push('css')
@endpush

@section('content')
    <section id="business-home" class="business-home-main-block">
        <div class="business-img">
            <img src="https://eclass.mediacity.co.in/demo/public/images/breadcum/1643952051bredcrumbs.jpg" class="img-fluid" alt="">
        </div>
        <div class="overlay-bg"></div>
        <div class="container-xl">
            <div class="business-dtl">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="bredcrumb-dtl">
                            <h1 class="wishlist-home-heading">My Courses</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="learning-courses" class="learning-courses-main-block">
        <div class="container-xl">
            <h4 class="student-heading">My Courses</h4>
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="view-block">
                        <div class="view-img">
                            <a href="{{ route('user.my_course_details') }}">
                                <img src="https://eclass.mediacity.co.in/demo/public/images/course/app-development-concept-with-programming-languages_23-2148688949.jpg" class="img-fluid" alt="student">
                            </a>
                        </div>
                        <div class="view-user-img">
                            <a href="https://eclass.mediacity.co.in/demo/public/all/profile/13" title=""><img src="https://eclass.mediacity.co.in/demo/public/images/user_img/1637571503young-smiling-student-woman-white-background.jpg" class="img-fluid user-img-one user-img-two" alt=""></a>
                        </div>
                        <div class="view-dtl">
                            <div class="view-heading">
                                <a href="https://eclass.mediacity.co.in/demo/public/coursecontent/11/learn-c-programming">Learn C++ Programming</a>
                            </div>
                            <div class="user-name">
                                <h6>By <span><a href="https://eclass.mediacity.co.in/demo/public/all/profile/13"> Admin</a></span></h6>
                            </div>
                            <!-- <p class="btm-10"><a href="#">by                                 
                                Admin </a></p> -->
                            <div class="rating">
                                <ul>
                                    <li>
                                        <div class="pull-left">
                                            No Rating
                                        </div>
                                    </li>
                                                                    
                                    <li class="reviews">
                                        (0 Reviews)
                                    </li>
                                </ul>
                            </div>


                            <div class="mycourse-progress">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 0%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                                <div class="complete">Start Course</div>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="business-home" class="business-home-main-block">
        <div class="business-img">
            <img src="https://eclass.mediacity.co.in/demo/public/images/breadcum/1643952051bredcrumbs.jpg" class="img-fluid" alt="">
        </div>
        <div class="overlay-bg"></div>
        <div class="container-xl">
            <div class="business-dtl">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="bredcrumb-dtl">
                            <h1 class="wishlist-home-heading">My Subscribed Courses</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="learning-courses" class="learning-courses-main-block">
        <div class="container-xl">
            <div class="row"></div>
        </div>
    </section>
    <section id="no-result-block" class="no-result-block">
        <div class="container-xl">
            <div class="no-result-courses">When Subscribe&nbsp;<a href="https://eclass.mediacity.co.in/demo/public"><b>Browse</b></a></div>
        </div>
    </section>
@endsection