@extends('web-views.layouts.app')

@push('css')
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
        }
        .rate:not(:checked) > input {
            position:absolute;
            z-index: -1;
        }
        .rate:not(:checked) > label {
            float:right;
            width:1em;
            overflow:hidden;
            white-space:nowrap;
            cursor:pointer;
            font-size:30px;
            color:#ccc;
        }
        .rate:not(:checked) > label:before {
            content: '★ ';
        }
        .rate > input:checked ~ label {
            color: #ffc700;    
        }
        .rate:not(:checked) > label:hover,
        .rate:not(:checked) > label:hover ~ label {
            color: #deb217;  
        }
        .rate > input:checked + label:hover,
        .rate > input:checked + label:hover ~ label,
        .rate > input:checked ~ label:hover,
        .rate > input:checked ~ label:hover ~ label,
        .rate > label:hover ~ input:checked ~ label {
            color: #c59b08;
        }
        .rate .rated{
            color: #c59b08 !important;
        }
    </style>
@endpush

@section('content')
    <section id="class-nav" class="class-nav-block">
        <div class="container-xl">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-12">
                    <div class="class-nav-heading">
                        @if(!empty($model->hasCourse))
                            {{ $model->hasCourse->title }}
                        @elseif(!empty($model->hasBundle))
                            {{ $model->hasBundle->title }}
                        @endif
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 col-12">
                    <div class="class-button certificate-button">
                        <ul>
                            {{-- <li>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-trophy"></i>&nbsp; Get Certificate
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item"> 
                                            0 of   4 
                                            complete 
                                        </a>
                                    </div>
                                </div>
                            </li> --}}
                            <li>
                                @if($model->hasCourse)
                                    <a href="{{ route('course.single', $model->product_slug) }}" class="course_btn">
                                        Course details <i class="fa fa-chevron-right"></i>
                                    </a>
                                @else 
                                    <a href="{{ route('bundle.single', $model->product_slug) }}" class="course_btn">
                                        Bundle details <i class="fa fa-chevron-right"></i>
                                    </a>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="learning-courses-home" class="learning-courses-home-main-block">
        <div class="container-xl">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="learning-courses-home-video text-white btm-30">
                        <div class="video-item hidden-xs">
                            <div class="video-device">
                                @if(!empty($model->hasCourse))
                                    <img src="{{ asset('public/admin/images/courses') }}/{{ $model->hasCourse->thumbnail }}" class="img-fluid" alt="Background">
                                @elseif(!empty($model->hasBundle))
                                    <img src="{{ asset('public/admin/bundle/banners') }}/{{ $model->hasBundle->banner }}" class="img-fluid" alt="Background">
                                @endif
                                @if($model->hasCourse->type=="video")
                                    <div class="video-preview">    
                                        <a href="{{ $model->hasCourse->video_url }}" class="btn-video-play "><i class="fa fa-play"></i></a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="learning-courses-home-block">
                        @if(!empty($model->hasCourse))
                            <h3 class="learning-courses-home-heading btm-20">
                                <a href="{{ route('course.single', $model->hasCourse->slug) }}" title="heading">
                                    {{ $model->hasCourse->title }}
                                </a>
                            </h3>
                            <div class="learning-courses btm-20 display-inline">By {{ $model->hasCourse->hasInstructor->name }}</div>
                            <br>
                            <div class="learning-courses btm-20">{{ $model->hasCourse->short_description }}</div>
                        @elseif(!empty($model->hasBundle))
                            <h3 class="learning-courses-home-heading btm-20">
                                <a href="{{ route('bundle.single', $model->hasBundle->slug) }}" title="heading">
                                    {{ $model->hasBundle->title }}
                                </a>
                            </h3>
                            <div class="learning-courses btm-20 display-inline">By {{ $model->hasBundle->hasCreatedBy->name }}</div>
                            <br>
                            <div class="learning-courses btm-20">{{ $model->hasBundle->short_detail }}</div>
                        @endif
                        
                        <div class="progress-block">
                            <div class="one histo-rate">
                                <span class="bar-block" style="width: 100%">
                                    <span id="bar-one" style="width: 0%" class="bar bar-clr bar-radius">&nbsp;</span> 
                                </span>
                            </div>
                            <i class="fa fa-trophy lft-7"></i>
                        </div>
                                        
                        <div class="learning-courses-home-btn">
                            @if($model->hasCourse->video)
                                <a href="{{ asset('public/admin/images/courses') }}/{{ $model->hasCourse->video }}" class=" btn btn-primary" title="Continue">Continue to Lecture</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="learning-courses" class="learning-courses-about-main-block">
        <div class="container-xl">
            <div class="about-block">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link text-center" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="false">Overview</a>
                        <a class="nav-item nav-link text-center active show" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="true">Course Content</a>
                        {{-- <a class="nav-item nav-link text-center" id="nav-live-tab" data-toggle="tab" href="#nav-live" role="tab" aria-controls="nav-live" aria-selected="false">Live Class</a> --}}
                        <a class="nav-item nav-link text-center" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Q &amp; A</a>
                        <a class="nav-item nav-link text-center" id="nav-rating-review-tab" data-toggle="tab" href="#nav-rating-review" role="tab" aria-controls="nav-rating-review" aria-selected="false">Review & Rate</a>
                        {{-- <a class="nav-item nav-link text-center" id="nav-homework-tab" data-toggle="tab" href="#nav-homework" role="tab" aria-controls="nav-homework" aria-selected="false">Homework</a> --}}
                    </div>
                </nav>
                
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="overview-block">
                            <h4>Recent Activity</h4>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="learning-questions-block btm-40">
                                        <h5 class="learning-questions-heading">Recent Questions</h5>

                                        <div class="learning-questions-content text-center">
                                            <h3 class="text-center">No Recent Questions</h3>
                                        </div>
                                        <div class="learning-questions-heading">
                                            <a href="#" id="goTab4" title="browse">Browse questions</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="content-course-block">
                                <h4 class="content-course">About this course</h4>
                                <p class="btm-40">
                                    @if(!empty($model->hasCourse))
                                        {{ $model->hasCourse->short_description }}
                                    @elseif(!empty($model->hasBundle))
                                        {{ $model->hasBundle->short_detail }}
                                    @endif
                                </p>
                            </div>
                            <hr>
                            <div class="content-course-number-block">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <div class="content-course-number">By the numbers</div>
                                    </div>
                                    <div class="col-lg-6 col-sm-5">
                                        <div class="content-course-number">
                                            <ul>
                                                <li>students enrolled:
                                                    @if($model->hasCourse) 
                                                        {{ isset($model->hasCourse->haveEnrolledStudents)?count($model->hasCourse->haveEnrolledStudents):0 }} 
                                                    @else 
                                                        {{ isset($model->hasBundle->haveEnrolledStudents)?count($model->hasCourse->haveEnrolledStudents):0 }} 
                                                    @endif
                                                </li>
                                                <li>Languages: English</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-3">
                                        <div class="content-course-number">
                                            <ul>
                                                @if(!empty($model->hasCourse))
                                                    @php 
                                                        $sum_minutes = 0;
                                                        foreach ($model->hasCourse->haveClasses as $course_class){
                                                            $explodedTime = array_map('intval', explode(':', $course_class->lecture_duration ));
                                                            $sum_minutes += $explodedTime[0]*60+$explodedTime[1];
                                                        }
                                                        $lecture_duration_total_time = floor($sum_minutes/60).':'.floor($sum_minutes % 60);
                                                    @endphp 
                                                @elseif(!empty($model->hasBundle))
                                                    {{ $model->hasBundle->short_detail }}
                                                @endif
                                                <li>Classes: {{ count($model->hasCourse->haveClasses) }} </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3">
                                        <div class="content-course-number">Description</div>
                                    </div>
                                    <div class="col-lg-9 col-md-9">
                                        <div class="content-course-number content-course-one">
                                            @if(!empty($model->hasCourse))
                                                <h5 class="content-course-number-heading">About this course</h5>
                                                <p>{{ $model->hasCourse->short_description }}</p>
                                                <h5 class="content-course-number-heading">Description</h5>
                                                <p>{!! $model->hasCourse->full_description !!}</p>
                                            @elseif(!empty($model->hasBundle))
                                                <h5 class="content-course-number-heading">About this Bundle</h5>
                                                <p>{{ $model->hasBundle->short_detail }}</p>
                                                <h5 class="content-course-number-heading">Description</h5>
                                                <p>{!! $model->hasBundle->details !!}/p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3">
                                        <div class="content-course-number">Instructor</div>
                                    </div>
                                    <div class="col-lg-9 col-md-9">
                                        <div class="content-course-number content-course-number-one">
                                            <div class="content-img-block btm-20">
                                                <div class="content-img">
                                                    <a href="{{ route('user.profile', $model->hasCourse->hasInstructor->slug) }}" title="">
                                                        @if($model->hasCourse->hasInstructor->hasUserProfile->profile_image)
                                                            <img src="{{ asset('public/users') }}/{{ $model->hasCourse->hasInstructor->hasUserProfile->profile_image }}" width="50px"  class="img-fluid user-img-one" alt="">
                                                        @else
                                                            <img src="{{ asset('public/default.png') }}" width="50px"  class="img-fluid user-img-one" alt="">
                                                        @endif
                                                    </a>
                                                </div>
                                                <div class="content-img-dtl">
                                                    <div class="profile">
                                                        <a href="{{ route('user.profile', $model->hasCourse->hasInstructor->slug) }}" title="profile">{{ $model->hasCourse->hasInstructor->name }} </a>
                                                    </div>
                                                    <p>{{ $model->hasCourse->hasInstructor->email }}</p>
                                                </div>
                                            </div>
                                            <ul>
                                                <li class="rgt-10"><a href="{{ $model->hasCourse->hasInstructor->hasUserProfile->facebook_url??'' }}" target="_blank" title="facebook"><i class="fa fa-facebook"></i></a></li>
                                                <li class="rgt-10"><a href="{{ $model->hasCourse->hasInstructor->hasUserProfile->linked_in_url??'' }}" target="_blank" title="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                                <li class="rgt-10"><a href="{{ $model->hasCourse->hasInstructor->hasUserProfile->twitter_url??'' }}" target="_blank" title="twitter"><i class="fa fa-youtube"></i></a></li>
                                            </ul>
                                            <p>
                                                <span style="font-family: 'Open Sans', Arial, sans-serif; text-align: justify;">&nbsp;{!! $model->hasCourse->hasInstructor->hasUserProfile->details !!}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade active show" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="profile-block">
                            @if(Auth::check())
                                @php $ifenrolled = App\Models\EnrollStudent::where('product_slug', $model->product_slug)->where('user_slug', Auth::user()->slug)->first(); @endphp 
                            @endif
                            <div id="ck-button">
                                <label>
                                    <input type="checkbox" @if($ifenrolled->is_completed) checked disabled @endif name="select-all" class="hidden" id="select-all"><span>Select All</span>
                                </label>
                            </div>
                                                
                            <div id="accordion" class="second-accordion">
                                @if(!empty($model->hasCourse))
                                    @php $counter = 0 @endphp 
                                    @foreach ($model->hasCourse->haveChapters as $chapter)
                                        @php $counter++ @endphp 
                                        <div class="card btm-10">
                                            <div class="card-header" id="headingChapter44">
                                                <div class="mb-0">
                                                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseChapter-{{ $chapter->name }}" aria-expanded="false" aria-controls="collapseChapter">
                                                        <div class="course-check-table">
                                                            <table class="table">  
                                                                <tbody>
                                                                    <tr>
                                                                        <td width="10px">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input filled-in material-checkbox-input" @if($ifenrolled->is_completed) checked disabled @endif type="checkbox" name="checked[]" value="44" id="checkbox44">
                                                                                <label class="form-check-label" for="invalidCheck"></label>
                                                                            </div>
                                                                        </td>
                                                                        
                                                                        <td>
                                                                            <div class="row">
                                                                                <div class="col-lg-6 col-6">
                                                                                    <div class="section">Chapter: {{ $counter }}</div>
                                                                                </div>
                                                                                <div class="col-lg-6 col-6">
                                                                                    <div class="section-dividation text-right">
                                                                                        {{ count($chapter->haveChapterClasses) }} Classes
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-lg-10 col-8">
                                                                                    <div class="profile-heading">{{ $chapter->name }}</div>
                                                                                </div>
                                                                                <div class="col-lg-2 col-4">
                                                                                    <div class="text-right">
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
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </button>
                                                </div>
                                            </div>
                                            <div id="collapseChapter-{{ $chapter->name }}" class="collapse" aria-labelledby="headingChapter" data-parent="#accordion" style="">
                                                <div class="card-body">
                                                    <table class="table">  
                                                        <tbody>
                                                            @foreach ($chapter->haveChapterClasses as $chapter_class)
                                                                <tr>
                                                                    @if($chapter_class->type=="Video")
                                                                        <td class="class-type">
                                                                            <a href="{{ asset('public/admin/course_class/lectures') }}/{{ $chapter_class->lecture }}" title="Course">
                                                                                <i class="fa fa-play-circle"></i>&nbsp; {{ $chapter_class->title }}
                                                                            </a>   
                                                                        </td>
                                                                    @else 
                                                                        <td class="class-type">
                                                                            <a href="{{ asset('public/admin/images/courses') }}/{{ $chapter_class->attachment }}" title="Course" download>
                                                                                <i class="fa fa-circle"></i>&nbsp; {{ $chapter_class->title }}
                                                                            </a>
                                                                        </td>
                                                                    @endif

                                                                    <td class="class-name">
                                                                        <div class="koh-tab-content">
                                                                            <div class="koh-tab-content-body">
                                                                                <div class="koh-faq">
                                                                                <div class="koh-faq-question">
                                                                                    <span class="koh-faq-question-span"> 
                                                                                        @if(!empty($model->hasCourse))
                                                                                            {{ $model->hasCourse->title }}
                                                                                        @elseif(!empty($model->hasBundle))
                                                                                            {{ $model->hasBundle->title }}
                                                                                        @endif    
                                                                                    </span>
                                                                                </div>
                                                                                <div class="koh-faq-answer"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>

                                                                    <td class="class-size txt-rgt">
                                                                        @php 
                                                                            $explodedTime = array_map('intval', explode(':', $chapter_class->lecture_duration ));
                                                                            $sum_chapter_class_minutes = $explodedTime[0]*60+$explodedTime[1];
                                                                            $chapter_total_lectures_duration = floor($sum_chapter_class_minutes/60).':'.floor($sum_chapter_class_minutes % 60);
                                                                        @endphp
                                                                        {{ $chapter_total_lectures_duration }}                       
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>            
                                            </div>
                                        </div>                           
                                    @endforeach
                                @elseif(!empty($model->hasBundle))
                                    <div class="card btm-10">
                                        <div class="card-header" id="headingChapter44">
                                            <div class="mb-0">
                                                <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseChapter44" aria-expanded="false" aria-controls="collapseChapter">
                                                    <div class="course-check-table">
                                                    <table class="table">  
                                                        <tbody>
                                                            <tr>
                                                            <td width="10px">
                                                                <div class="form-check">
                                                                    <input class="form-check-input filled-in material-checkbox-input" type="checkbox" name="checked[]" value="44" id="checkbox44">
                                                                    <label class="form-check-label" for="invalidCheck">
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            
                                                            <td>
                                                                <div class="row">
                                                                    <div class="col-lg-6 col-6">
                                                                        <div class="section">Section: 1</div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-6">
                                                                        <div class="section-dividation text-right">
                                                                            1                                        Classes
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-10 col-8">
                                                                        <div class="profile-heading">Introduction
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-2 col-4">
                                                                        <div class="text-right">
                                                                            4                                        
                                                                            min

                                                                                                                </div>

                                                                    </div>
                                                                </div>
                                                            </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    </div>
                                                </button>
                                            </div>
                                        </div>
                                        <div id="collapseChapter44" class="collapse" aria-labelledby="headingChapter" data-parent="#accordion" style="">
                                            <div class="card-body">
                                                <table class="table">  
                                                    <tbody>
                                                        <tr>
                                                            <td class="class-type">
                                                                <a href="https://eclass.mediacity.co.in/demo/public/watch/courseclass/69" title="Course" class=""><i class="fa fa-play-circle"></i>&nbsp;class</a>
                                                            </td>

                                                            <td class="class-name">
                                                                <div class="koh-tab-content">
                                                                    <div class="koh-tab-content-body">
                                                                        <div class="koh-faq">
                                                                        <div class="koh-faq-question">
                                                                            <span class="koh-faq-question-span"> Learn Advanced C++ </span>
                                                                        </div>
                                                                        <div class="koh-faq-answer"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <td class="class-size txt-rgt">
                                                                4:36 min                        
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>            
                                        </div>
                                    </div>                    
                                @endif                     
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    @if(isset($ifenrolled) && !empty($ifenrolled) && $ifenrolled->is_completed==0)
                                        <div class="mark-read-button">
                                            <button type="button" data-product-slug="{{ $model->product_slug }}" class="btn btn-md btn-primary mark-complete-course-btn">
                                                Mark as Complete
                                            </button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-live" role="tabpanel" aria-labelledby="nav-live-tab">
                        <div id="about-product" class="about-product-main-block"></div>
                    </div>

                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <div class="learning-contact-block">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="contact-search-block btm-40">
                                        <div class="learning-contact-search">
                                            <h4 class="question-text">No Recent Questions</h4>
                                        </div>
                                        <div class="learning-contact-btn">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Ask a new question
                                            </button>

                                            <!--Model start-->
                                            <div id="myModal" class="modal fade" role="dialog">
                                                <div class="modal-dialog modal-lg">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Ask a new question</h4>
                                                            <button type="button" class="close" data-dismiss="modal">×</button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <form id="demo-form2" method="post" action="https://eclass.mediacity.co.in/demo/public/addquestion/11" data-parsley-validate="" class="form-horizontal form-label-left">
                                                                <input type="hidden" name="_token" value="dQ0sl1GbHxZTV3Zwr46UBZ2AmklNC4gkIfbUeGdq">
                                                                        
                                                                <div class="row">
                                                                <div class="col-md-6">
                                                                    <input type="hidden" name="instructor_id" class="form-control" value="1">
                                                                    <input type="hidden" name="user_id" value="13">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input type="hidden" name="course_id" value="11">
                                                                    <input type="hidden" name="status" value="1">
                                                                </div>
                                                                </div>
                                                                <br>
                                                                <div class="row">
                                                                <div class="col-md-12">
                                                                    <label for="detail">Question:<sup class="redstar">*</sup></label>
                                                                    <div id="mceu_11" class="mce-tinymce mce-container mce-panel" hidefocus="1" tabindex="-1" role="application" style="visibility: hidden; border-width: 1px; width: 100%;"><div id="mceu_11-body" class="mce-container-body mce-stack-layout"><div id="mceu_12" class="mce-top-part mce-container mce-stack-layout-item mce-first"><div id="mceu_12-body" class="mce-container-body"><div id="mceu_13" class="mce-container mce-menubar mce-toolbar mce-first" role="menubar" style="border-width: 0px 0px 1px;"><div id="mceu_13-body" class="mce-container-body mce-flow-layout"><div id="mceu_14" class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-first mce-btn-has-text" tabindex="-1" aria-labelledby="mceu_14" role="menuitem" aria-haspopup="true"><button id="mceu_14-open" role="presentation" type="button" tabindex="-1"><span class="mce-txt">File</span> <i class="mce-caret"></i></button></div><div id="mceu_15" class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-btn-has-text" tabindex="-1" aria-labelledby="mceu_15" role="menuitem" aria-haspopup="true"><button id="mceu_15-open" role="presentation" type="button" tabindex="-1"><span class="mce-txt">Edit</span> <i class="mce-caret"></i></button></div><div id="mceu_16" class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-btn-has-text" tabindex="-1" aria-labelledby="mceu_16" role="menuitem" aria-haspopup="true"><button id="mceu_16-open" role="presentation" type="button" tabindex="-1"><span class="mce-txt">View</span> <i class="mce-caret"></i></button></div><div id="mceu_17" class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-last mce-btn-has-text" tabindex="-1" aria-labelledby="mceu_17" role="menuitem" aria-haspopup="true"><button id="mceu_17-open" role="presentation" type="button" tabindex="-1"><span class="mce-txt">Format</span> <i class="mce-caret"></i></button></div></div></div><div id="mceu_18" class="mce-toolbar-grp mce-container mce-panel mce-last" hidefocus="1" tabindex="-1" role="group"><div id="mceu_18-body" class="mce-container-body mce-stack-layout"><div id="mceu_19" class="mce-container mce-toolbar mce-stack-layout-item mce-first mce-last" role="toolbar"><div id="mceu_19-body" class="mce-container-body mce-flow-layout"><div id="mceu_20" class="mce-container mce-flow-layout-item mce-first mce-btn-group" role="group"><div id="mceu_20-body"><div id="mceu_0" class="mce-widget mce-btn mce-first mce-disabled" tabindex="-1" role="button" aria-label="Undo" aria-disabled="true"><button id="mceu_0-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-undo"></i></button></div><div id="mceu_1" class="mce-widget mce-btn mce-last mce-disabled" tabindex="-1" role="button" aria-label="Redo" aria-disabled="true"><button id="mceu_1-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-redo"></i></button></div></div></div><div id="mceu_21" class="mce-container mce-flow-layout-item mce-btn-group" role="group"><div id="mceu_21-body"><div id="mceu_2" class="mce-widget mce-btn mce-menubtn mce-first mce-last mce-btn-has-text" tabindex="-1" aria-labelledby="mceu_2" role="button" aria-haspopup="true"><button id="mceu_2-open" role="presentation" type="button" tabindex="-1"><span class="mce-txt">Formats</span> <i class="mce-caret"></i></button></div></div></div><div id="mceu_22" class="mce-container mce-flow-layout-item mce-btn-group" role="group"><div id="mceu_22-body"><div id="mceu_3" class="mce-widget mce-btn mce-first" tabindex="-1" aria-pressed="false" role="button" aria-label="Bold"><button id="mceu_3-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-bold"></i></button></div><div id="mceu_4" class="mce-widget mce-btn mce-last" tabindex="-1" aria-pressed="false" role="button" aria-label="Italic"><button id="mceu_4-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-italic"></i></button></div></div></div><div id="mceu_23" class="mce-container mce-flow-layout-item mce-btn-group" role="group"><div id="mceu_23-body"><div id="mceu_5" class="mce-widget mce-btn mce-first" tabindex="-1" aria-pressed="false" role="button" aria-label="Align left"><button id="mceu_5-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-alignleft"></i></button></div><div id="mceu_6" class="mce-widget mce-btn" tabindex="-1" aria-pressed="false" role="button" aria-label="Align center"><button id="mceu_6-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-aligncenter"></i></button></div><div id="mceu_7" class="mce-widget mce-btn" tabindex="-1" aria-pressed="false" role="button" aria-label="Align right"><button id="mceu_7-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-alignright"></i></button></div><div id="mceu_8" class="mce-widget mce-btn mce-last" tabindex="-1" aria-pressed="false" role="button" aria-label="Justify"><button id="mceu_8-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-alignjustify"></i></button></div></div></div><div id="mceu_24" class="mce-container mce-flow-layout-item mce-btn-group" role="group"><div id="mceu_24-body"><div id="mceu_9" class="mce-widget mce-btn mce-first" tabindex="-1" role="button" aria-label="Decrease indent"><button id="mceu_9-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-outdent"></i></button></div><div id="mceu_10" class="mce-widget mce-btn mce-last" tabindex="-1" role="button" aria-label="Increase indent"><button id="mceu_10-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-indent"></i></button></div></div></div><div id="mceu_25" class="mce-container mce-flow-layout-item mce-last mce-btn-group" role="group"><div id="mceu_25-body"></div></div></div></div></div></div></div></div><div id="mceu_26" class="mce-edit-area mce-container mce-panel mce-stack-layout-item" hidefocus="1" tabindex="-1" role="group" style="border-width: 1px 0px 0px;"><iframe id="detail_ifr" frameborder="0" allowtransparency="true" title="Rich Text Area. Press ALT-F9 for menu. Press ALT-F10 for toolbar. Press ALT-0 for help" style="width: 100%; height: 100px; display: block;"></iframe></div><div id="mceu_27" class="mce-statusbar mce-container mce-panel mce-stack-layout-item mce-last" hidefocus="1" tabindex="-1" role="group" style="border-width: 1px 0px 0px;"><div id="mceu_27-body" class="mce-container-body mce-flow-layout"><div id="mceu_28" class="mce-path mce-flow-layout-item mce-first"><div class="mce-path-item">&nbsp;</div></div><div id="mceu_29" class="mce-flow-layout-item mce-resizehandle"><i class="mce-ico mce-i-resize"></i></div><span id="mceu_30" class="mce-branding mce-widget mce-label mce-flow-layout-item mce-last"> Powered by <a href="https://www.tiny.cloud/?utm_campaign=editor_referral&amp;utm_medium=poweredby&amp;utm_source=tinymce" rel="noopener" target="_blank" role="presentation" tabindex="-1">Tiny</a></span></div></div></div></div><textarea name="question" id="detail" rows="4" class="form-control" placeholder="" aria-hidden="true" style="display: none;"></textarea>
                                                                </div>
                                                                </div>
                                                                <br>
                                                                <div class="box-footer">
                                                                <button type="submit" class="btn btn-lg col-md-3 btn-primary">Submit</button>
                                                                </div>
                                                            </form>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <!--Model end-->
                                        </div>
                                    </div>
                                    
                                    <div id="accordion" class="second-accordion"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-announcement" role="tabpanel" aria-labelledby="nav-announcement-tab">
                        <div class="learning-announcement-null text-center">
                            <div class="offset-lg-2 col-lg-8">
                                <h1>No announcements</h1>
                                <p>No announcement detail</p>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="nav-rating-review" role="tabpanel" aria-labelledby="nav-rating-review-tab">
                        <div class="overview-block">
                            <h4>Review & Rate </h4>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="learning-questions-block btm-40">
                                        <h5 class="learning-questions-heading">Review & Rate</h5>
                                        <div class="learning-questions-content">
                                            <div class="form-group">
                                                <label for="">Rate</label><br />
                                                <div class="rate">
                                                    @for($i=5; $i>=1; $i--)
                                                        @if($model->hasProductRating->rate>=$i)
                                                            <input type="radio" class="rating rate-value" id="star{{ $i }}" name="rate" value="{{ $i }}" />
                                                            <label class="rated" for="star{{ $i }}" title="{{ $i }} Stars">5 stars</label>
                                                        @else 
                                                            <input type="radio" class="rating" id="star{{ $i }}" name="rate" value="{{ $i }}" />
                                                            <label for="star{{ $i }}" title="{{ $i }} Stars">5 stars</label>
                                                        @endif
                                                    @endfor
                                                </div>
                                            </div>
                                            <br /><br />
                                            <div class="form-group">
                                                <label for="product-review">Review</label>
                                                <textarea name="review" id="product-review" rows="5" class="form-control" placeholder="Enter review here">@if($model->hasProductRating) {{ $model->hasProductRating->review }} @endif</textarea>
                                            </div>
                                            <div class="form-group">
                                                <button type="button" class="btn btn-success rate-btn" data-product-slug="{{ $model->product_slug }}">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="tab-pane fade" id="nav-assign" role="tabpanel" aria-labelledby="nav-assign-tab">
                        <div class="container-xl">
                            <div class="assignment-main-block">
                                <h3>Your Assignments</h3>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row"></div>
                                    </div>
                                    <div class="col-md-4">
                                        
                                        <div class="contact-search-block btm-40">
                                            
                                            <div class="udemy-contact-btn text-center">
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#assignmodel">Submit Assignment
                                                </button>
                                            </div>



                                            <div class="modal fade" id="assignmodel" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel">Submit Assignment</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                    </div>
                                                    <div class="box box-primary">
                                                    <div class="panel panel-sum">
                                                        <div class="modal-body">
                                                            <form id="demo-form2" method="post" action="https://eclass.mediacity.co.in/demo/public/course/assignment/11" data-parsley-validate="" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                                                <input type="hidden" name="_token" value="dQ0sl1GbHxZTV3Zwr46UBZ2AmklNC4gkIfbUeGdq">

                                                                <input type="hidden" name="user_id" value="13">

                                                                <input type="hidden" name="instructor_id" value="1">
                                                                        
                                                                <div class="row">
                                                                <div class="col-md-12">

                                                                    <div class="form-group">
                                                                        <label for="exampleInputDetails">Chapter Name:<sup class="redstar">*</sup></label>
                                                                        <select style="width: 100%" name="course_chapters" class="form-control js-example-basic-single select2-hidden-accessible" required="" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                                                        <option value="none" selected="" disabled="" hidden="" data-select2-id="3"> 
                                                                        Select Chapter
                                                                        </option>
                                                                                                                                            <option value="44">Introduction</option>
                                                                                                                                            <option value="45">Operator Overloading</option>
                                                                                                                                            <option value="46">Conditional Statements</option>
                                                                                                                                            <option value="47">Loops</option>
                                                                                                                                        </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="2" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-course_chapters-be-container"><span class="select2-selection__rendered" id="select2-course_chapters-be-container" role="textbox" aria-readonly="true" title=" 
                                                                        Select Chapter
                                                                        "> 
                                                                        Select Chapter
                                                                        </span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="title">Title:<sup class="redstar">*</sup></label>
                                                                        <input type="text" class="form-control" name="title" id="title" placeholder="Please Enter Title" value="" required="">
                                                                    </div>
                                                                        
                                                                    <div class="form-group">
                                                                        
                                                                        <div class="wrapper">
                                                                        <label for="detail">Assignment Upload:<sup class="redstar">*</sup></label> 
                                                                        <div class="file-upload">
                                                                            <input type="file" name="assignment" class="form-control">
                                                                            <i class="fa fa-arrow-up"></i>
                                                                        </div>
                                                                        </div>
                                                                    </div> 
                                                                    
                                                                </div>
                                                                
                                                                </div>
                                                                
                                                                <hr>
                                                                <div class="box-footer text-center">
                                                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-appoint" role="tabpanel" aria-labelledby="nav-appoint-tab">
                        <div class="container-xl">
                            <div class="appointment-main-block">
                                <h3>Your Appointment</h3>
                            <div class="row">

                                <div class="col-md-8">
                                                                </div>
                                <div class="col-md-4">
                                    <div class="contact-search-block btm-40">
                                        <div class="udemy-contact-btn text-center">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#appointmodel">Request Appointment
                                            </button>
                                        </div>
                                        <div class="modal fade" id="appointmodel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Request Appointment</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="box box-primary">
                                                <div class="panel panel-sum">
                                                    <div class="modal-body">
                                                        <form id="demo-form2" method="post" action="https://eclass.mediacity.co.in/demo/public/course/appointment/11" data-parsley-validate="" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                                            <input type="hidden" name="_token" value="dQ0sl1GbHxZTV3Zwr46UBZ2AmklNC4gkIfbUeGdq">

                                                            <input type="hidden" name="user_id" value="13">

                                                            <input type="hidden" name="instructor_id" value="1">
                                                            
                                                            
                                                            <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="title">User:<sup class="redstar">*</sup></label>
                                                                    <input type="text" name="fname" value="user@mediacity.co.in" class="form-control" disabled="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="title">Instructor:<sup class="redstar">*</sup></label>
                                                                    <input type="text" name="instructor" value="admin@mediacity.co.in" class="form-control" disabled="">
                                                                </div>
                                                            </div>
                                                            </div>

                                                            
                                                                    
                                                            <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="title">Title:<sup class="redstar">*</sup></label>
                                                                    <input type="text" class="form-control" name="title" id="title" placeholder="Please Enter Title" value="">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="title">Date:<sup class="redstar">*</sup></label>
                                                                    <input type="datetime-local" class="form-control" id="date_time" name="date_time" placeholder="Please Enter Title" value="">
                                                                </div>
                                                            </div>
                                                            </div>

                                                            <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="detail">Detail:<sup class="redstar">*</sup></label>
                                                                    <div id="mceu_42" class="mce-tinymce mce-container mce-panel" hidefocus="1" tabindex="-1" role="application" style="visibility: hidden; border-width: 1px; width: 100%;"><div id="mceu_42-body" class="mce-container-body mce-stack-layout"><div id="mceu_43" class="mce-top-part mce-container mce-stack-layout-item mce-first"><div id="mceu_43-body" class="mce-container-body"><div id="mceu_44" class="mce-container mce-menubar mce-toolbar mce-first" role="menubar" style="border-width: 0px 0px 1px;"><div id="mceu_44-body" class="mce-container-body mce-flow-layout"><div id="mceu_45" class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-first mce-btn-has-text" tabindex="-1" aria-labelledby="mceu_45" role="menuitem" aria-haspopup="true"><button id="mceu_45-open" role="presentation" type="button" tabindex="-1"><span class="mce-txt">File</span> <i class="mce-caret"></i></button></div><div id="mceu_46" class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-btn-has-text" tabindex="-1" aria-labelledby="mceu_46" role="menuitem" aria-haspopup="true"><button id="mceu_46-open" role="presentation" type="button" tabindex="-1"><span class="mce-txt">Edit</span> <i class="mce-caret"></i></button></div><div id="mceu_47" class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-btn-has-text" tabindex="-1" aria-labelledby="mceu_47" role="menuitem" aria-haspopup="true"><button id="mceu_47-open" role="presentation" type="button" tabindex="-1"><span class="mce-txt">View</span> <i class="mce-caret"></i></button></div><div id="mceu_48" class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-last mce-btn-has-text" tabindex="-1" aria-labelledby="mceu_48" role="menuitem" aria-haspopup="true"><button id="mceu_48-open" role="presentation" type="button" tabindex="-1"><span class="mce-txt">Format</span> <i class="mce-caret"></i></button></div></div></div><div id="mceu_49" class="mce-toolbar-grp mce-container mce-panel mce-last" hidefocus="1" tabindex="-1" role="group"><div id="mceu_49-body" class="mce-container-body mce-stack-layout"><div id="mceu_50" class="mce-container mce-toolbar mce-stack-layout-item mce-first mce-last" role="toolbar"><div id="mceu_50-body" class="mce-container-body mce-flow-layout"><div id="mceu_51" class="mce-container mce-flow-layout-item mce-first mce-btn-group" role="group"><div id="mceu_51-body"><div id="mceu_31" class="mce-widget mce-btn mce-first mce-disabled" tabindex="-1" role="button" aria-label="Undo" aria-disabled="true"><button id="mceu_31-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-undo"></i></button></div><div id="mceu_32" class="mce-widget mce-btn mce-last mce-disabled" tabindex="-1" role="button" aria-label="Redo" aria-disabled="true"><button id="mceu_32-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-redo"></i></button></div></div></div><div id="mceu_52" class="mce-container mce-flow-layout-item mce-btn-group" role="group"><div id="mceu_52-body"><div id="mceu_33" class="mce-widget mce-btn mce-menubtn mce-first mce-last mce-btn-has-text" tabindex="-1" aria-labelledby="mceu_33" role="button" aria-haspopup="true"><button id="mceu_33-open" role="presentation" type="button" tabindex="-1"><span class="mce-txt">Formats</span> <i class="mce-caret"></i></button></div></div></div><div id="mceu_53" class="mce-container mce-flow-layout-item mce-btn-group" role="group"><div id="mceu_53-body"><div id="mceu_34" class="mce-widget mce-btn mce-first" tabindex="-1" aria-pressed="false" role="button" aria-label="Bold"><button id="mceu_34-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-bold"></i></button></div><div id="mceu_35" class="mce-widget mce-btn mce-last" tabindex="-1" aria-pressed="false" role="button" aria-label="Italic"><button id="mceu_35-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-italic"></i></button></div></div></div><div id="mceu_54" class="mce-container mce-flow-layout-item mce-btn-group" role="group"><div id="mceu_54-body"><div id="mceu_36" class="mce-widget mce-btn mce-first" tabindex="-1" aria-pressed="false" role="button" aria-label="Align left"><button id="mceu_36-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-alignleft"></i></button></div><div id="mceu_37" class="mce-widget mce-btn" tabindex="-1" aria-pressed="false" role="button" aria-label="Align center"><button id="mceu_37-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-aligncenter"></i></button></div><div id="mceu_38" class="mce-widget mce-btn" tabindex="-1" aria-pressed="false" role="button" aria-label="Align right"><button id="mceu_38-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-alignright"></i></button></div><div id="mceu_39" class="mce-widget mce-btn mce-last" tabindex="-1" aria-pressed="false" role="button" aria-label="Justify"><button id="mceu_39-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-alignjustify"></i></button></div></div></div><div id="mceu_55" class="mce-container mce-flow-layout-item mce-btn-group" role="group"><div id="mceu_55-body"><div id="mceu_40" class="mce-widget mce-btn mce-first" tabindex="-1" role="button" aria-label="Decrease indent"><button id="mceu_40-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-outdent"></i></button></div><div id="mceu_41" class="mce-widget mce-btn mce-last" tabindex="-1" role="button" aria-label="Increase indent"><button id="mceu_41-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-indent"></i></button></div></div></div><div id="mceu_56" class="mce-container mce-flow-layout-item mce-last mce-btn-group" role="group"><div id="mceu_56-body"></div></div></div></div></div></div></div></div><div id="mceu_57" class="mce-edit-area mce-container mce-panel mce-stack-layout-item" hidefocus="1" tabindex="-1" role="group" style="border-width: 1px 0px 0px;"><iframe id="detail_ifr" frameborder="0" allowtransparency="true" title="Rich Text Area. Press ALT-F9 for menu. Press ALT-F10 for toolbar. Press ALT-0 for help" style="width: 100%; height: 100px; display: block;"></iframe></div><div id="mceu_58" class="mce-statusbar mce-container mce-panel mce-stack-layout-item mce-last" hidefocus="1" tabindex="-1" role="group" style="border-width: 1px 0px 0px;"><div id="mceu_58-body" class="mce-container-body mce-flow-layout"><div id="mceu_59" class="mce-path mce-flow-layout-item mce-first"><div class="mce-path-item">&nbsp;</div></div><div id="mceu_60" class="mce-flow-layout-item mce-resizehandle"><i class="mce-ico mce-i-resize"></i></div><span id="mceu_61" class="mce-branding mce-widget mce-label mce-flow-layout-item mce-last"> Powered by <a href="https://www.tiny.cloud/?utm_campaign=editor_referral&amp;utm_medium=poweredby&amp;utm_source=tinymce" rel="noopener" target="_blank" role="presentation" tabindex="-1">Tiny</a></span></div></div></div></div><textarea id="detail" name="detail" class="form-control" placeholder="Enter your details" value="" style="display: none;"></textarea>
                                                                </div>
                                                            </div>
                                                            </div>
                                                            
                                                            <hr>
                                                            <div class="box-footer">
                                                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="tab-pane fade" id="nav-homework" role="tabpanel" aria-labelledby="nav-homework-tab">
                        <div class="assignment-main-block">
                            <!-- row start --> 
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="accordion" id="accordionExample">
                                        <h4 class="text-center">No homework available !</h4>
                                    </div> 
                                </div>
                            </div>
                            <!-- row end --> 
                        </div> 
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script>
        $(document).on('click', '.rating', function(){
            $(this).parents('.rate').find('.rate-value').removeClass("rate-value");
            $(this).addClass('rate-value');
        });
        $(document).on('click', '.rate-btn', function(){
            var rating_value = $('.rate-value').val();
            var review = $('#product-review').val();
            var product_slug = $(this).attr('data-product-slug');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url : "{{ route('user.rate') }}",
                data : {product_slug:product_slug, rating_value:rating_value, review:review},
                type : 'POST',
                success : function(response){
                    if(response=='success'){
                        Swal.fire(
                            'Rated!',
                            'You have rated successfully Thanks.',
                            'success',
                        );
                    }else{
                        Swal.fire(
                            'Error!',
                            'Sorry something went wrong.',
                            'warning',
                        );
                    }
                }
            });
        });

        $(document).on('click', '.mark-complete-course-btn', function(){
            var product_slug = $(this).attr('data-product-slug');
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to complete this course?!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, complete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url : "{{ route('user.complete-course') }}",
                        data : {product_slug:product_slug},
                        type : 'POST',
                        success : function(response){
                            if(response=='success'){
                                Swal.fire(
                                    'Completed!',
                                    'Your have completed successfully.',
                                    'success',
                                );

                                location.reload();
                            }else{
                                Swal.fire(
                                    'Error!',
                                    'Sorry something went wrong.',
                                    'warning',
                                );
                            }
                        }
                    });
                }
            })
        });
    </script>
@endpush