@extends('web-views.layouts.app')

@push('css')
@endpush

@section('content')
    <section id="business-home" class="business-home-main-block">
        <div class="business-img">
            <img src="{{ asset('public/website/images/logo/wishlist-banner.jpg') }}" class="img-fluid" alt="">
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
                @foreach ($orders as $order)
                    @foreach ($order->haveOrderDetails as $order_detail)
                        <div class="col-lg-3 col-sm-6">
                            <div class="view-block">
                                <div class="view-img">
                                    @if(!empty($order_detail->hasCourse))
                                        <a href="{{ route('user.my_course.single', $order_detail->hasCourse->slug) }}">
                                            <img src="{{ asset('public/admin/images/courses') }}/{{ $order_detail->hasCourse->thumbnail }}" class="img-fluid" alt="Course">
                                        </a>
                                    @elseif(!empty($order_detail->hasBundle))
                                        <a href="{{ route('user.my_course.single', $order_detail->hasBundle->slug) }}">
                                            <img src="{{ asset('public/admin/bundle/banners') }}/{{ $order_detail->hasBundle->banner }}" class="img-fluid" alt="Bundle">
                                        </a>
                                    @endif
                                </div>
                                <div class="view-user-img">
                                    @if(!empty($order_detail->hasCourse))
                                        <a href="{{ route('user.profile', $order_detail->hasCourse->hasInstructor->slug) }}" title="">
                                            @if($order_detail->hasCourse->hasInstructor->hasUserProfile->profile_image)
                                                <img src="{{ asset('public/users') }}/{{ $order_detail->hasCourse->hasInstructor->hasUserProfile->profile_image }}" width="50px"  class="img-fluid user-img-one" alt="">
                                            @else
                                                <img src="{{ asset('public/default.png') }}" width="50px"  class="img-fluid user-img-one" alt="">
                                            @endif
                                        </a>
                                    @elseif(!empty($order_detail->hasBundle))
                                        <a href="{{ route('user.profile', $order_detail->hasBundle->hasCreatedBy->slug) }}" title="">
                                            @if($order_detail->hasBundle->hasCreatedBy->hasUserProfile->profile_image)
                                                <img src="{{ asset('public/users') }}/{{ $order_detail->hasBundle->hasCreatedBy->hasUserProfile->profile_image }}" width="50px"  class="img-fluid user-img-one" alt="">
                                            @else
                                                <img src="{{ asset('public/default.png') }}" width="50px"  class="img-fluid user-img-one" alt="">
                                            @endif
                                        </a>
                                    @endif
                                </div>
                                <div class="view-dtl">
                                    <div class="view-heading">
                                        @if(!empty($order_detail->hasCourse))
                                            <a href="{{ route('user.my_course.single', $order_detail->hasCourse->slug) }}">{{ $order_detail->hasCourse->title }}</a>
                                        @elseif(!empty($order_detail->hasBundle))
                                            <a href="{{ route('user.my_course.single', $order_detail->hasBundle->slug) }}">{{ $order_detail->hasBundle->title }}</a>
                                        @endif
                                    </div>
                                    <div class="user-name">
                                        @if(!empty($order_detail->hasCourse))
                                            <h6>By <span><a href="{{ route('user.profile', $order_detail->hasCourse->hasInstructor->slug) }}">{{ $order_detail->hasCourse->hasInstructor->name }}</a></span></h6>
                                        @elseif(!empty($order_detail->hasBundle))
                                            <h6>By <span><a href="{{ route('user.profile', $order_detail->hasBundle->hasCreatedBy->slug) }}">{{ $order_detail->hasBundle->hasCreatedBy->name }}</a></span></h6>
                                        @endif
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
                    @endforeach
                @endforeach
            </div>
        </div>
    </section>
    <section id="business-home" class="business-home-main-block">
        <div class="business-img">
            <img src="{{ asset('public/website/images/logo/subscribe-banner.jpg') }}" class="img-fluid" alt="">
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
@endsection