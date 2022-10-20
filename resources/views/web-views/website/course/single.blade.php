@extends('web-views.layouts.app')

@push('css')
    <style>
        .details svg.feather{
            margin: 0;
        }
    </style>
@endpush

@section('content')
<section id="about-home" class="about-home-main-block">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="about-home-block">
                    <h1 class="about-home-heading">{{ $model->title }}</h1>
                    @if(Session()->has('success'))
                        <div class="alert alert-success" role="alert">
                        Item added to cart successfully.
                        </div>
                    @endif
                    <p>{{ $model->short_description }}</p>
                    <ul>
                        <li>                                                        
                            <div class="pull-left">
                                <div class="star-ratings-sprite"><span style="width:100%" class="star-ratings-sprite-rating"></span>
                                </div>
                            </div>
                        </li>
                        <li>
                            5 rating
                        </li>
                        <li>
                            (1 Reviews)
                        </li>
                        <li>
                            5 students enrolled
                        </li>
                    </ul>
                    <ul>
                        <li><a href="#" title="about">Created:  <a href="{{ route('user.profile', $model->hasInstructor->slug) }}" title="instructor"> {{ $model->hasInstructor->name }} </a> </a></li>
                        <li><a href="#" title="about">Last Updated: {{ date('d F Y', strtotime($model->updated_at)) }}</a></li>
                        <li><a href="#" title="about"><i class="fa fa-comment"></i></a> English</li>
                    </ul>
                </div>
            </div>
            <!-- course preview -->
            <div class="col-lg-4 col-md-4">
                <div class="about-home-product">
                    <div class="video-item hidden-xs">
                        <script type="text/javascript">
                            var video_url = '<iframe src="https://www.youtube.com/embed/z-Jq-Cgg1jk" frameborder="0" allowfullscreen></iframe>';
                        </script>

                        <div class="video-device">
                            <img src="{{ asset('public/admin/images/courses') }}/{{ $model->thumbnail }}" class="bg_img img-fluid" alt="Background">
                            <div class="video-preview">
                                <a href="javascript:void(0);" class="btn-video-play"><i class="fa fa-play"></i></a>
                            </div>
                        </div>
                    </div>
                    <div id="bar-fixed">
                        <div class="about-home-dtl-training">
                            <div class="about-home-dtl-block btm-10">
                                <div class="about-home-rate">
                                    <ul>
                                        @if($model->is_paid)     
                                            <li>$ {{ number_format($model->price, 2) }}</li>
                                            @if($model->discount != NULL)
                                                <li><span><s>${{ number_format($model->retail_price, 2) }}</s></span></li>
                                            @endif
                                        @else 
                                            <li>FREE</li>
                                        @endif
                                    </ul>
                                </div>

                                <div class="about-home-btn btm-20">                                        
                                    <div class="box-footer">
                                        <a href="{{ route('add.to.cart', $model->slug) }}" class="btn btn-primary btn-block text-center" role="button"><i class="fa fa-cart-plus" aria-hidden="true"></i>&nbsp;Add To Cart</a>
                                    </div>
                                </div>

                                <div class="about-home-includes-list btm-40">
                                    <ul class="btm-40">
                                        <li><span>Course Includes</span></li>
                                        @if($model->haveCourseIncludes)
                                            @foreach ($model->haveCourseIncludes as $include)
                                                <li>{!! $include->icon !!} {{ $include->detail }}</li>        
                                            @endforeach
                                        @endif
                                    </ul>
                                
                                    <div class="about-tags">
                                        @if($model->haveTags)
                                            <span><i data-feather="tag"></i> Tags:</span>
                                            @foreach ($model->haveTags as $tag)
                                                <a href="#">
                                                    <span class="badge badge-secondary">
                                                        <span class="badge badge-default">{{ $tag->tag }}</span>
                                                    </span>
                                                </a>
                                            @endforeach
                                        @endif
                                        </p>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col">
                                        <div class="about-home-share text-center">
                                            <a href="https://calendar.google.com/calendar/r/eventedit?text=WordPress%20Theme%20Development" target="__blank"><i data-feather="calendar"></i></a>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="about-home-share text-center">
                                            <a href="#" data-toggle="modal" data-target="#myModalshare" title="share" data-dismiss="modal"><i data-feather="share"></i></a>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="about-home-share text-center">                                           
                                            <div>
                                                <a href="../../login.html" title="gift"><i data-feather="gift"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="about-home-share text-center">
                                            <div class="about-icon-one">
                                                <a href="../../login.html" title="heart"><i data-feather="heart"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="about-home-share text-center">
                                            <div class="report-abuse text-center">
                                                <a href="../../login.html" title="Report"><i data-feather="flag"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                                <!-- Share Course Model start-->
                                <div class="modal fade" data-backdrop="" style="z-index: 1050;" id="myModalshare" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Share this course</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="box box-primary">
                                            <div class="panel panel-sum">
                                                <div class="modal-body">
                                                    <div class="nav-search">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="myInput"  value="wordpress-theme-development.html">
                                                        </div>
                                                        <button onclick="myFunction()" class="btn btn-primary"><i data-feather="copy"></i></button>
                                                    </div>

                                                    <div class="social-icon">

                                                    <div class="row"><div class="col-lg-1 offset-lg-3 col-2"><a href="https://www.facebook.com/sharer/sharer.php?u=https://eclass.mediacity.co.in/demo/public/course/1/wordpress-theme-development" class="social-button " id="" title=""><span class="fa fa-facebook fa-2x"></span></a></div><div class="col-lg-1 col-2"><a href="https://twitter.com/intent/tweet?text=&amp;url=https://eclass.mediacity.co.in/demo/public/course/1/wordpress-theme-development" class="social-button " id="" title=""><span class="fa fa-twitter fa-2x"></span></a></div><div class="col-lg-1 col-2"><a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=https://eclass.mediacity.co.in/demo/public/course/1/wordpress-theme-development&amp;title=&amp;summary=Extra+linkedin+summary+can+be+passed+here" class="social-button " id="" title=""><span class="fa fa-linkedin fa-2x"></span></a></div><div class="col-lg-1 col-2"><a target="_blank" href="https://wa.me/?text=https://eclass.mediacity.co.in/demo/public/course/1/wordpress-theme-development" class="social-button " id="" title=""><span class="fa fa-whatsapp fa-2x"></span></a></div><div class="col-lg-1 col-2"><a target="_blank" href="https://telegram.me/share/url?url=https://eclass.mediacity.co.in/demo/public/course/1/wordpress-theme-development&amp;text=" class="social-button " id="" title=""><span class="fa fa-telegram fa-2x"></span></a></div></ul></div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <!--Model close -->
                            </div>

                            <div class="container-xl" id="adsense"></div>
                        </div>
                    </div>
                    <br>
                    <div class="about-content-sidebar">
                        <div class="container-xl">
                            <div class="about-content-img">
                                @if($model->hasInstructor->profile_image)
                                    <img src="{{ asset('public/admin/images/profiles') }}/{{  $model->hasInstructor->hasUserProfile->profile_image }}" class="img-fluid user-img-one" alt="">
                                @else
                                    <img src="{{ asset('public/default.png') }}" width="50px"  class="img-fluid user-img-one" alt="">
                                @endif
                                <h5 class="about-content-heading">{{ $model->hasInstructor->name }}</h5>
                            </div>
                            <div class="ratings">
                                <div class="star-rating">Users Enrolled 20 </div>
                            </div>
                            
                            <div class="about-reward-badges">
                                <img src="{{ asset('public/website/images/badges/1.png') }}" class="img-fluid" alt="" data-toggle="tooltip" data-placement="bottom" title="Member Since 2 years ago">
                                <img src="{{ asset('public/website/images/badges/2.png') }}" class="img-fluid" alt="" data-toggle="tooltip" data-placement="bottom" title="Has 13 courses">
                                <img src="{{ asset('public/website/images/badges/3.png') }}" class="img-fluid" alt="" data-toggle="tooltip" data-placement="bottom" title="Here user has applied 20 courses">
                                <img src="{{ asset('public/website/images/badges/4.png') }}" class="img-fluid" alt="" data-toggle="tooltip" data-placement="bottom" title="Affiliate Users 1">
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <a href="{{ route('user.profile', $model->hasInstructor->slug) }}" class="btn btn-primary" title="course">Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="about-content-sidebar mt-md-4">
                        <div class="container-xl">
                            <div class="about-reward-badges">
                                <img src="{{ asset('public/website/images/badges/1.png') }}" class="img-fluid" alt="" data-toggle="tooltip" data-placement="bottom" title="Member Since 2020">
                                <img src="{{ asset('public/website/images/badges/2.png') }}" class="img-fluid" alt="" data-toggle="tooltip" data-placement="bottom" title="Has 13 courses">
                                <img src="{{ asset('public/website/images/badges/3.png') }}" class="img-fluid" alt="" data-toggle="tooltip" data-placement="bottom" title="rating from 4 to 5">
                                <img src="{{ asset('public/website/images/badges/4.png') }}" class="img-fluid" alt="" data-toggle="tooltip" data-placement="bottom" title="20 users has enrolled">
                                <img src="{{ asset('public/website/images/badges/5.png') }}" class="img-fluid" alt="" data-toggle="tooltip" data-placement="bottom" title="Live classes 14">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section

<section id="about-product" class="about-product-main-block">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="product-learn-block">
                    <h3 class="product-learn-heading">Whatlearn</h3>
                    <div class="row">
                        @foreach ($model->haveWhatLearns as $learn)
                            <div class="col-lg-6 col-md-6">
                                <div class="product-learn-dtl">
                                    <ul>
                                        <li class="details"><i data-feather="check-circle"></i><span style="padding-left:10px">{{ $learn->detail }}</span></li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                
                <div class="course-content-block btm-30 top-20">
                    <div class="row">
                        <div class="col-lg-8 col-8">
                            <h3>CourseContent</h3>
                        </div>
                    </div>
                    <!-- FSMS -->
                    <div class="row" style="padding-bottom:10px">
                        <div class="col-lg-9 col-6">
                            <div class="expand-content">
                                @php 
                                $sum_minutes = 0;
                                foreach ($model->haveClasses as $course_class){
                                    $explodedTime = array_map('intval', explode(':', $course_class->lecture_duration ));
                                    $sum_minutes += $explodedTime[0]*60+$explodedTime[1];
                                }
                                $lecture_duration_total_time = floor($sum_minutes/60).':'.floor($sum_minutes % 60);

                                
                                @endphp 
                                <small>{{ count($model->haveChapters) }} sections • {{ count($model->haveClasses) }} lectures • {{ $lecture_duration_total_time }} total length</small>
                            </div>
                        </div>
                    </div>
                    <!-- FSMS -->

                    <div class="faq-block">
                        <div class="faq-dtl">
                            <div id="accordion" class="second-accordion">
                                <div class="card">
                                    @foreach ($model->haveChapters as $key=>$chapter)      
                                        <div class="card-header" id="headingTwo33">
                                            <div class="mb-0">
                                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo{{ $key }}" aria-expanded="false" aria-controls="collapseTwo">
                                                    <div class="row">
                                                        <div class="col-lg-8 col-6">
                                                            {{ $chapter->name }}
                                                        </div>
                                                        <div class="col-lg-2 col-4">
                                                            <div class="text-right">
                                                                {{ count($chapter->haveChapterClasses) }} Classes
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-2 col-2">
                                                            <div class="chapter-total-time">
                                                                @php 
                                                                    $sum_chapter_class_minutes = 0;
                                                                    foreach ($chapter->haveChapterClasses as $chapter_class){
                                                                        $explodedTime = array_map('intval', explode(':', $chapter_class->lecture_duration ));
                                                                        $sum_chapter_class_minutes += $explodedTime[0]*60+$explodedTime[1];
                                                                    }
                                                                    $chapter_total_lectures_duration = floor($sum_chapter_class_minutes/60).':'.floor($sum_chapter_class_minutes % 60);
                                                                @endphp
                                                                {{ $chapter_total_lectures_duration }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </button>
                                            </div>
                                        </div>
                                        
                                        <div id="collapseTwo{{ $key }}" class="collapse false" aria-labelledby="headingTwo" data-parent="#accordion">
                                            <div class="card-body">
                                                <table class="table">
                                                    <tbody>
                                                        @foreach ($chapter->haveChapterClasses as $chapter_class)
                                                            @if($chapter_class->type=="Video")
                                                                <tr>
                                                                    <th class="class-icon">
                                                                        <a href="#" title="Course"><i class="fa fa-play-circle"></i></a>
                                                                    </th>
                                                                    <td>
                                                                        <div class="koh-tab-content">
                                                                            <div class="koh-tab-content-body">
                                                                                <div class="koh-faq">
                                                                                    <div class="koh-faq-question">
                                                                                        <span class="koh-faq-question-span"> 
                                                                                            {{ $chapter_class->title }}
                                                                                        </span>
                                                                                    </div>
                                                                                    <div class="koh-faq-answer"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                    </td>
                                                                    <td class="txt-rgt">
                                                                        @php 
                                                                            $explodedTime = array_map('intval', explode(':', $chapter_class->lecture_duration ));
                                                                            $sum_chapter_class_minutes = $explodedTime[0]*60+$explodedTime[1];
                                                                            $chapter_total_lectures_duration = floor($sum_chapter_class_minutes/60).':'.floor($sum_chapter_class_minutes % 60);
                                                                        @endphp
                                                                        {{ $chapter_total_lectures_duration }}
                                                                    </td>
                                                                </tr>
                                                            @else 
                                                                <tr>
                                                                    <th class="class-icon">
                                                                        <a href="#" title="Course"><i class='fas fa-file-download'></i></a>
                                                                    </th>
                                                                    <td>
                                                                        <div class="koh-tab-content">
                                                                            <div class="koh-tab-content-body">
                                                                                <div class="koh-faq">
                                                                                    <div class="koh-faq-question">
                                                                                        <span class="koh-faq-question-span">
                                                                                            {{ $chapter_class->title }}
                                                                                        </span>
                                                                                    </div>
                                                                                    <div class="koh-faq-answer"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        
                                                                    </td>
                                                                    <td class="txt-rgt">
                                                                        --
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="requirements">
                    <h3>Requirements</h3>
                    <ul>
                        <li class="comment more">
                            {!! $model->hasInstructor->hasUserProfile->requirements??'' !!}
                        </li>
                    </ul>
                </div>
                <div class="description-block btm-30">
                    <h3>Description</h3>
                    <p>{!! $model->hasInstructor->hasUserProfile->details??'' !!}</p>
                </div>

                <div class="students-bought btm-30">
                    <h3>Recent Courses</h3>
                    @foreach ($recent_courses as $recent_course)
                        <div class="course-bought-block">
                            <div class="row">
                                <div class="col-lg-3 col-sm-4 col-12">
                                    <div class="course-bought-img">
                                        <a href="{{ route('course.single', $recent_course->slug) }}">
                                            <img src="{{ asset('public/admin/images/courses') }}/{{ $recent_course->thumbnail }}" class="img-fluid" alt="blog">
                                        </a>
                                    </div>
                                    <div class="course-rate txt-rgt">
                                        <ul>
                                            <li>
                                                <div class="heart">
                                                    <a href="#" title="heart"><i data-feather="heart"></i></a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-lg-7 col-sm-8 col-12">
                                    <div class="course-name btm-10">
                                        <a href="{{ route('course.single', $recent_course->slug) }}">{{ $recent_course->title }}</a>
                                    </div>
                                    <div class="course-user btm-10">
                                        <ul>
                                            <li><i data-feather="clock"></i> <div class="course-update">{{ date('d F Y', strtotime($recent_course->updated_at)) }}</div></li>
                                            <li><i data-feather="user"></i> <div class="course-user-count">0</div></li>
                                        </ul>
                                    </div>     
                                    <p class="course-name-para">{{ $recent_course->short_description }}</p>                                   
                                </div>
                                <div class="col-lg-2 col-md-3 col-12">
                                    <div class="course-currency txt-rgt">
                                        <ul>
                                            @if($recent_course->is_paid)
                                                <li class="rate"><i class="fa fa-dollar"></i> {{ number_format($recent_course->price, 2) }}</li>
                                                @if($recent_course->discount != NULL)
                                                    <li class="rate"><s><i class="fa fa-dollar"></i> {{ number_format($recent_course->retail_price, 2) }}</s></li>
                                                @endif
                                            @else 
                                                <li>FREE</li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="about-instructor-block">
                    <h3>About Instructor</h3>
                    <div class="about-instructor btm-40">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-4">
                                <div class="instructor-img btm-30">
                                    <a href="{{ route('user.profile', $model->hasInstructor->slug) }}" title="instructor">
                                        @if($model->hasInstructor->profile_image)
                                            <img src="{{ asset('public/admin/images/profiles') }}/{{ $model->hasInstructor->hasUserProfile->profile_image }}" class="img-fluid user-img-one" alt="">
                                        @else
                                            <img src="{{ asset('public/default.png') }}" width="50px"  class="img-fluid user-img-one" alt="">
                                        @endif
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-10 col-md-9 col-8">
                                <div class="instructor-block">
                                    <div class="instructor-name btm-10">
                                        <a href="{{ route('user.profile', $model->hasInstructor->slug) }}" title="instructor-name">{{ $model->hasInstructor->name }}</a>
                                    </div>
                                    <div class="instructor-post btm-5">About Instructor</div>
                                    <p>{!! $model->hasInstructor->hasUserProfile->details??'' !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="student-feedback btm-40">
                    <h3 class="student-feedback-heading">Student Feedback</h3>
                    <div class="student-feedback-block">
                        <div class="rating">
                            <div class="rating-num">5</div>
                                <div class="pull-left">
                                    <div class="star-ratings-sprite star-ratings-center">
                                        <span style="width:100%" class="star-ratings-sprite-rating"></span>
                                    </div>
                                </div>
                            <div class="rating-users">Course Rating</div>
                        </div>
                        <div class="histo">
                            <div class="three histo-rate">
                                <span class="histo-star">
                                    <div class="pull-left">
                                        <div class="star-ratings-sprite star-ratings-center">
                                            <span style="width:100%" class="star-ratings-sprite-rating"></span>
                                        </div>
                                    </div>
                                </span>
                                <span class="histo-percent">
                                    <a href="#" title="rate">100%</a>
                                </span>
                                <span class="bar-block">
                                    <span id="bar-three" style=" width:100%;" class="bar bar-clr bar-radius">&nbsp;</span>
                                </span>
                            </div>
                            <div class="two histo-rate">
                                <span class="histo-star">
                                    <div class="pull-left">
                                        <div class="star-ratings-sprite star-ratings-center">
                                            <span style="width:100%" class="star-ratings-sprite-rating"></span>
                                        </div>
                                    </div>
                                </span>
                                <span class="histo-percent">
                                    <a href="#" title="rate">100%</a>
                                </span>
                                <span class="bar-block">
                                    <span id="bar-two" style="width: 100%" class="bar bar-clr bar-radius">&nbsp;</span>
                                </span>
                            </div>
                            <div class="one histo-rate">
                                <span class="histo-star">
                                    <div class="pull-left">
                                        <div class="star-ratings-sprite star-ratings-center"><span style="width:100%" class="star-ratings-sprite-rating"></span>
                                        </div>
                                    </div>
                                </span>
                                <span class="histo-percent">
                                    <a href="#" title="rate">100%</a>
                                </span>
                                <span class="bar-block">
                                    <span id="bar-one" style="width: 100%" class="bar bar-clr bar-radius">&nbsp;</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                
                <div class="learning-review btm-40">
                    <div class="review-dtl">
                        <div class="row btm-20">
                            <div class="col-lg-4">
                                <div class="review-img text-white">
                                    AE
                                </div>
                                <div class="review-img-block">
                                    <div class="review-month">22-09-2022</div>
                                    <div class="review-name">Admin Example</div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="review-rating">
                                    <div class="pull-left-review">
                                        <div class="star-ratings-sprite"><span style="width:100%" class="star-ratings-sprite-rating"></span>
                                        </div>
                                    </div>
                                    <div class="review-text">
                                        <p>good<p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>

                <div class="more-courses btm-30">
                    <h2 class="more-courses-heading">Related Courses</h2>
                    <div class="row">
                        @foreach ($related_courses as $relate_course)
                            <div class="col-lg-6 col-sm-6">
                                <div class="together-img">
                                    <div class="student-view-block">
                                        <div class="view-block">
                                            <div class="view-img">
                                                <a href="{{ route('course.single', $relate_course->slug) }}">
                                                    <img src="{{ asset('public/admin/images/courses') }}/{{ $relate_course->thumbnail }}" alt="course" class="img-fluid owl-lazy">
                                                </a>
                                            </div>
                                            <div class="view-user-img">
                                                <a href=".{{ route('user.profile', $relate_course->hasInstructor->slug) }}" title="">
                                                    @if(isset($relate_course->hasInstructor->hasUserProfile->profile_image))
                                                        <img src="{{ asset('public/admin/images/profiles') }}/{{ $relate_course->hasInstructor->hasUserProfile->profile_image }}" width="50px"  class="img-fluid user-img-one" alt="">
                                                    @else
                                                        <img src="{{ asset('public/default.png') }}" width="50px"  class="img-fluid user-img-one" alt="">
                                                    @endif
                                                </a>
                                            </div>

                                            <div class="img-wishlist">
                                                <div class="protip-wishlist">
                                                    <ul>
                                                        <li class="protip-wish-btn">
                                                            <a href="https://calendar.google.com/calendar/r/eventedit?text=The%20Complete%20Web%20Developer%20Bootcamp"
                                                                target="__blank" title="reminder"><i data-feather="bell"></i>
                                                            </a>
                                                        </li>
                                                        <li class="protip-wish-btn">
                                                            <a href="../../login.html" title="heart"><i data-feather="heart"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="view-dtl">
                                                <div class="view-heading">
                                                    <a href="{{ route('course.single', $relate_course->slug) }}">{{ $relate_course->title }}</a>
                                                </div>
                                                <div class="user-name">
                                                    <h6>By <span><a href="{{ route('user.profile', $relate_course->hasInstructor->slug) }}"> {{ $relate_course->hasInstructor->name }}</a></span></h6>
                                                </div>                                            
                                                <div class="rating">
                                                    <ul>
                                                        <li>
                                                            <div class="pull-left no-rating">
                                                                No Rating
                                                            </div>
                                                        </li>    
                                                    </ul>
                                                </div>
                                                <div class="view-footer">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                                            <div class="count-user">
                                                                <i data-feather="user"></i>
                                                                <span>
                                                                    1
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                                            <div class="rate text-right">
                                                                <ul>                                                             
                                                                    @if($relate_course->is_paid)
                                                                        <li><a><b><i class="fa fa-dollar"></i> {{ number_format($relate_course->price, 2) }}</b></a></li>
                                                                        @if($relate_course->discount != NULL)
                                                                            <li><a><b><strike><i class="fa fa-dollar"></i> {{ number_format($relate_course->retail_price, 2) }}</strike></b></a></li>
                                                                        @endif
                                                                    @else 
                                                                        <li>FREE</li>
                                                                    @endif
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection