@extends('web-views.layouts.app')

@push('css')
    <style>
        .details svg.feather{
            margin: 0;
        }
    </style>
@endpush

@section('content')
<!-- course detail header start -->
<section id="about-home" class="about-home-main-block">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="about-home-block text-white">
                    <h1 class="about-home-heading text-white">{{ $model->title }}</h1>
                    @if(Session()->has('success'))
                        <div class="alert alert-success" role="alert">
                        Item added to cart successfully.
                        </div>
                    @endif
                    <p>{{ $model->short_detail }}</p>
                    <ul>
                        <li>
                            <a href="{{ route('user.profile', $model->hasCreatedBy->slug) }}">Created: {{ $model->hasCreatedBy->name }}</a></span>
                        </li>
                        <li>
                            <a href="#" title="about">
                                Last Updated: {{ date('d, F Y', strtotime($model->updated_at)) }}
                            </a>
                        </li>
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
                            <img src="{{ asset('public/admin/bundle/banners') }}/{{ $model->thumbnail }}" class="bg_img img-fluid" alt="Background">
                            <div class="video-preview">
                                <a href="javascript:void(0);" class="btn-video-play"><i class="fa fa-play"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="about-home-dtl-training">
                        <div class="about-home-dtl-block btm-10">
                            <div class="about-home-rate">
                                <ul>
                                    <li>${{ number_format($model->price, 2) }}</li>
                                    <li><span><s>${{ number_format($model->retail_price, 2) }}</s></span></li>    
                                </ul>
                            </div>
                            <div class="about-home-btn btm-20">
                                <a href="{{ route('add.to.cart', $model->slug) }}" class="btn btn-primary btn-block text-center" role="button"><i class="fa fa-cart-plus" aria-hidden="true"></i>&nbsp;Subscribe Now</a>
                            </div>                        
                            <hr>

                            <div class="row">
                                <div class="col-md-6 col-6">
                                    <div class="about-home-share text-center">
                                        <a href="https://calendar.google.com/calendar/r/eventedit?text=Coding" target="__blank"><i data-feather="calendar"></i></a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-6">
                                    <div class="about-home-share text-center">
                                        <a href="#" data-toggle="modal" data-target="#myModalshare" title="share" data-dismiss="modal"><i data-feather="share"></i></a>
                                    </div>
                                </div>
                            </div>

                            <!--Model start-->
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
                                                    <!-- The text field -->
                                                    <div class="nav-search">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="myInput"  value="2.html">
                                                        </div>
                                                        <button onclick="myFunction()" class="btn btn-primary">CopyText</button>
                                                    </div>

                                                    <div class="social-icon">
                                                        <div class="row"><div class="col-lg-1 offset-lg-3 col-2">
                                                        <a href="https://www.facebook.com/sharer/sharer.php?u=https://eclass.mediacity.co.in/demo/public/bundle/detail/2" class="social-button " id="" title=""><span class="fa fa-facebook fa-2x"></span></a></div><div class="col-lg-1 col-2"><a href="https://twitter.com/intent/tweet?text=&amp;url=https://eclass.mediacity.co.in/demo/public/bundle/detail/2" class="social-button " id="" title=""><span class="fa fa-twitter fa-2x"></span></a></div><div class="col-lg-1 col-2"><a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=https://eclass.mediacity.co.in/demo/public/bundle/detail/2&amp;title=&amp;summary=Extra+linkedin+summary+can+be+passed+here" class="social-button " id="" title=""><span class="fa fa-linkedin fa-2x"></span></a></div><div class="col-lg-1 col-2"><a target="_blank" href="https://wa.me/?text=https://eclass.mediacity.co.in/demo/public/bundle/detail/2" class="social-button " id="" title=""><span class="fa fa-whatsapp fa-2x"></span></a></div><div class="col-lg-1 col-2"><a target="_blank" href="https://telegram.me/share/url?url=https://eclass.mediacity.co.in/demo/public/bundle/detail/2&amp;text=" class="social-button " id="" title=""><span class="fa fa-telegram fa-2x"></span></a></div></ul></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Model close -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- course header end -->
<!-- course detail start -->
<section id="about-product" class="about-product-main-block">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="requirements">
                    <h3>Detail</h3>
                    <ul>
                        <li class="comment more">
                            <p>{!! $model->details !!}</p>
                        </li>
                    </ul>
                </div>
                <div class="course-content-block btm-30">
                    <h3>Courses In Bundle</h3>
                    <!-- FSMS -->
                    {{-- <div class="row" style="padding-bottom:10px">
                        <div class="col-lg-8 col-6">
                        <small> &nbsp; {{ count($courses) }} courses</small>
                        </div>
                        <div class="col-lg-4 col-6">
                            <button type="button" onclick="toggleAllSections()" class="btn btn-link courseToggle float-right"><span
                                    style="color:#0384a3">Expand all courses</span></button>
                            <button type="button" onclick="toggleAllSections()" class="btn btn-link courseToggle float-right"
                                style="display:none"><span style="color:#0384a3">Collapse all
                                        courses</span></button>
                        </div>
                    </div> --}}

                    <!-- FSMS -->
                    <div class="faq-block">
                        <div class="faq-dtl">
                            <div id="accordion" class="second-accordion">
                                @foreach ($courses as $key=>$course)
                                    <div class="card">
                                        <div class="card-header" id="headingTwo10">
                                            <div class="mb-0">
                                                <button class="btn btn-link" data-toggle="collapse"
                                                    data-target="#collapseTwo{{ $key }}" aria-expanded="false"
                                                    aria-controls="collapseTwo">
                                                    <div class="row">
                                                        <div class="col-lg-8 col-12">
                                                            {{ $course->title }}
                                                        </div>
                                                    </div>
                                                </button>
                                            </div>
                                        </div>

                                        <div id="collapseTwo{{ $key }}" class="collapse"
                                            aria-labelledby="headingTwo" data-parent="#accordion">
                                            <div class="card-body">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td class="class-icon">
                                                                {{ $course->short_description }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection