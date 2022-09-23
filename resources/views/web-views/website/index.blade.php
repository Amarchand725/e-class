@extends('web-views.layouts.app')

@push('css')
@endpush

@section('content')
    <!-- Add Slider -->
    @include('web-views.layouts.slider')
    <!-- Add Slider -->

    <!-- learning-work start -->
    @include('web-views.layouts.learning-work')
    <!-- learning-work end -->

    <!-- fact start -->
    @include('web-views.layouts.fact')
    <!-- fact end -->

    <!-- Discount -->
    @include('web-views.layouts.discount')
    <!-- Discount -->

    <!-- learning-courses start -->
    @include('web-views.layouts.recent-courses')
    <!-- learning-courses end -->

    <!-- Featured Courses -->
    @include('web-views.layouts.featured-courses')
    <!-- Featured Courses -->

    <!-- Subscription Bundle start -->
    @include('web-views.layouts.subscription-bundles')
    <!-- Subscription Bundle end -->

    <!-- Best Selling Bundle start -->
    @include('web-views.layouts.best-selling-bundles')
     <!-- Best Selling Bundle start -->

    <!-- Zoom start -->
    @include('web-views.layouts.zoom-liv')
    <!-- Zoom end -->

    <!-- google class room start -->
    <section id="student" class="student-main-block">
        <div class="container"></div>
    </section>
    <!-- google class room end -->

    <!-- Featured Instructor -->
    @include('web-views.layouts.featured-instructors')
    <!-- Featured Instructor -->

    <!-- Blogs -->
    @include('web-views.layouts.blogs')
    <!-- Blogs -->

    <!-- recommendations start -->
    @include('web-views.layouts.recommendations')
    <!-- recommendations end -->

    <!-- categories start -->
    @include('web-views.layouts.featured-categories')
    <!-- categories end -->

    <!-- testimonial start -->
    @include('web-views.layouts.testomonials')
    <!-- testimonial end -->

    <!-- video start -->
    @include('web-views.layouts.video-section')  
    <!-- video end -->

    <!-- instructor start -->
    @include('web-views.layouts.instructors')
    <!-- instructor -->

    <!-- Get start -->
    @include('web-views.layouts.get-start')
    <!-- Get start -->

    <!-- Institute -->
    @include('web-views.layouts.institutes')
    <!-- instructor end -->

    <!-- trusted companies -->
    @include('web-views.layouts.trusted-companies')
    <!-- trusted companies -->

    <section id="trusted" class="trusted-main-block">
        <div class="container-fluid" id="adsense"></div>
    </section>
    <!-- testimonial end -->
@endsection
@push('js')
@endpush