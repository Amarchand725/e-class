@extends('web-views.layouts.app')

@push('css')
@endpush

@section('content')
<section id="about-home" class="about-home-main-block">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="about-home-block">
                    <h1 class="about-home-heading">{{ $model->title }}</h1>
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
                        <li><a href="#" title="about">Created:  <a href="#" title="instructor"> {{ $model->hasCreatedBy->roles->first()->name }} </a> </a></li>
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
                                        <li>$ {{ number_format($model->sale_price, 2) }}</li>
                                        <li><span><s>${{ number_format($model->price, 2) }}</s></span></li>
                                    </ul>
                                </div>

                                <div class="about-home-btn btm-20">                                        
                                    <form id="demo-form2" method="post" action="https://eclass.mediacity.co.in/demo/public/guest/addtocart/1"
                                        data-parsley-validate class="form-horizontal form-label-left">
                                        <input type="hidden" name="_token" value="leZ79T21enQSxfzfbeOTzvgubGXd6jlVMG4Ztrf9">
                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-cart-plus" aria-hidden="true"></i>&nbsp;Add To Cart</button>
                                        </div>
                                    </form>
                                </div>

                                <div class="about-home-includes-list btm-40">
                                    <ul class="btm-40">
                                        <li><span>Course Includes</span></li>
                                        @if($model->haveCourseIncludes)
                                            @foreach ($model->haveCourseIncludes as $include)
                                            <li>{!! $include->icon !!} {{ $include->title }}</li>        
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
                                @if($model->hasUserProfile)
                                    <img src="{{ asset('public/admin/images/profiles') }}/{{  $model->hasUserProfile->profile_image }}" class="img-fluid user-img-one" alt="">
                                @else
                                    <img src="{{ asset('public/default.png') }}" width="50px"  class="img-fluid user-img-one" alt="">
                                @endif
                                <h5 class="about-content-heading">{{ $model->hasCreatedBy->roles->first()->name }}</h5>
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
                                    <a href="../../instructor/1/11.html" class="btn btn-primary" title="course">Profile</a>
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
                                                                                    <div class="col-lg-6 col-md-6">
                                <div class="product-learn-dtl">
                                    <ul>
                                        <li><i data-feather="check-circle"></i>Have the skills to start making money on the side, as a casual freelancer, or full time as a work-from-home freelancer</li>
                                    </ul>
                                </div>
                            </div>
                                                                                                                <div class="col-lg-6 col-md-6">
                                <div class="product-learn-dtl">
                                    <ul>
                                        <li><i data-feather="check-circle"></i>Easily create a beautiful HTML &amp; CSS website with Bootstrap (that doesn&#039;t look like generic Bootstrap websites!)</li>
                                    </ul>
                                </div>
                            </div>
                                                                                                                <div class="col-lg-6 col-md-6">
                                <div class="product-learn-dtl">
                                    <ul>
                                        <li><i data-feather="check-circle"></i>Fully understand how to use Custom Post Types and Advanced Custom Fields in WordPress</li>
                                    </ul>
                                </div>
                            </div>
                                                                                                                <div class="col-lg-6 col-md-6">
                                <div class="product-learn-dtl">
                                    <ul>
                                        <li><i data-feather="check-circle"></i>Allow your clients to update their websites by themselves by creating user accounts</li>
                                    </ul>
                                </div>
                            </div>
                                                                                                                <div class="col-lg-6 col-md-6">
                                <div class="product-learn-dtl">
                                    <ul>
                                        <li><i data-feather="check-circle"></i>Cut away a person from their background</li>
                                    </ul>
                                </div>
                            </div>
                                                                                </div>
                    </div>
                

                                <div class="course-content-block btm-30 top-20">

                    <div class="row">
                        <div class="col-lg-8 col-8">
                            <h3>CourseContent</h3>
                        </div>
                        <!--
                        FSMS commenting below div in order to show course length correctly. 
                        <div class="col-lg-4 col-6">
                            <div class="chapter-total-time">
                                89                                min
                            </div>
                        </div>
                        -->
                    </div>
                    <!-- FSMS -->
                    <div class="row" style="padding-bottom:10px">
                        <div class="col-lg-9 col-6">
                            <div class="expand-content">
                                
                                <small>4 sections • 13 lectures • 01h 29m total length</small>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 col-xs-6 nopadding">
                            <button type="button" onclick="toggleAllSections()" class="btn btn-link courseToggle"><span style="color:#0384a3">Expand all sections</span></button>
                            <button type="button" onclick="toggleAllSections()" class="btn btn-link courseToggle" style="display:none"><span style="color:#0384a3">Collapse all sections</span></button>
                        </div>
                    </div>
                    <!-- FSMS -->

                    <div class="faq-block">
                        <div class="faq-dtl">
                            <div id="accordion" class="second-accordion">
                                                                
                                <div class="card">
                                    <div class="card-header" id="headingTwo33">
                                        <div class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo33" aria-expanded="true" aria-controls="collapseTwo">

                                                <div class="row">
                                                <div class="col-lg-8 col-6">
                                                    Introduction
                                                    
                                                                                                    </div>
                                                <div class="col-lg-2 col-4">
                                                    <div class="text-right">
                                                        8                                                        Classes
                                                    </div>
                                                </div>

                                                <div class="col-lg-2 col-2">
                                                    <div class="chapter-total-time">
                                                        37                                                        min
                                                    </div>
                                                </div>

                                            </div>

                                            </button>
                                        </div>

                                    </div>
                                    <!--
                                    FSMS commenting below line in order to collapse all chapters by default.  
                                       <div id="collapseTwo33" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                                       
                                     -->
                                    
                                    <div id="collapseTwo33" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">

                                        <div class="card-body">
                                            <table class="table">
                                                <tbody>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <tr>
                                                        <th class="class-icon">
                                                                                                                <a href="#" title="Course"><i class="fa fa-play-circle"></i></a>
                                                                                                                                                                                                                                                                                                                                                </th>

                                                        <td>

                                                            <div class="koh-tab-content">
                                                              <div class="koh-tab-content-body">
                                                                <div class="koh-faq">
                                                                  <div class="koh-faq-question">

                                                                    <span class="koh-faq-question-span"> Live class </span>

                                                                                                                                                                                                          </div>
                                                                  <div class="koh-faq-answer">
                                                                    
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            
                                                        </td>

                                                        <td class="txt-rgt">
                                                                                                                min
                                                        


                                                    </tr>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <tr>
                                                        <th class="class-icon">
                                                                                                                <a href="#" title="Course"><i class="fa fa-play-circle"></i></a>
                                                                                                                                                                                                                                                                                                                                                </th>

                                                        <td>

                                                            <div class="koh-tab-content">
                                                              <div class="koh-tab-content-body">
                                                                <div class="koh-faq">
                                                                  <div class="koh-faq-question">

                                                                    <span class="koh-faq-question-span"> How to Install WordPress </span>

                                                                                                                                                                                                                <i class="fa fa-sort-down" aria-hidden="true"></i>
                                                                                                                                      </div>
                                                                  <div class="koh-faq-answer">
                                                                    <p style="box-sizing: border-box; margin: 0px; word-break: break-word; color: #686f7a; font-family: 'sf pro text', -apple-system, BlinkMacSystemFont, Roboto, 'segoe ui', Helvetica, Arial, sans-serif, 'apple color emoji', 'segoe ui emoji', 'segoe ui symbol'; font-size: 13px; letter-spacing: 0.3px; background-color: #ffffff;">In this lecture, we're going to take a look at the final WordPress website we're going to have built by the end of the course. You'll see:</p>
<ol style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10.5px; padding-left: 35px; color: #686f7a; font-family: 'sf pro text', -apple-system, BlinkMacSystemFont, Roboto, 'segoe ui', Helvetica, Arial, sans-serif, 'apple color emoji', 'segoe ui emoji', 'segoe ui symbol'; font-size: 13px; letter-spacing: 0.3px; background-color: #ffffff;">
<li style="box-sizing: border-box;"><span style="box-sizing: border-box;">The beautiful, custom home page</span></li>
<li style="box-sizing: border-box;"><span style="box-sizing: border-box;">Dynamic testimonials</span></li>
<li style="box-sizing: border-box;"><span style="box-sizing: border-box;">How to edit the logo in the WordPress customizer</span></li>
<li style="box-sizing: border-box;">The custom blog page</li>
<li style="box-sizing: border-box;">How to add dynamic resources</li>
<li style="box-sizing: border-box;">Contact page</li>
<li style="box-sizing: border-box;">The WordPress admin panel</li>
</ol>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            
                                                        </td>

                                                        <td class="txt-rgt">
                                                                                                                11:36min
                                                        


                                                    </tr>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <tr>
                                                        <th class="class-icon">
                                                                                                                <a href="#" title="Course"><i class="fa fa-play-circle"></i></a>
                                                                                                                                                                                                                                                                                                                                                </th>

                                                        <td>

                                                            <div class="koh-tab-content">
                                                              <div class="koh-tab-content-body">
                                                                <div class="koh-faq">
                                                                  <div class="koh-faq-question">

                                                                    <span class="koh-faq-question-span"> Wordpress Theme Developement </span>

                                                                                                                                                                                                                <i class="fa fa-sort-down" aria-hidden="true"></i>
                                                                                                                                      </div>
                                                                  <div class="koh-faq-answer">
                                                                    <p><span style="color: #686f7a; font-family: 'sf pro text', -apple-system, BlinkMacSystemFont, Roboto, 'segoe ui', Helvetica, Arial, sans-serif, 'apple color emoji', 'segoe ui emoji', 'segoe ui symbol'; font-size: 13px; letter-spacing: 0.3px; background-color: #ffffff;">Bootstrap is the most popular front-end framework on the web today.&nbsp;</span><span style="box-sizing: border-box; color: #686f7a; font-family: 'sf pro text', -apple-system, BlinkMacSystemFont, Roboto, 'segoe ui', Helvetica, Arial, sans-serif, 'apple color emoji', 'segoe ui emoji', 'segoe ui symbol'; font-size: 13px; letter-spacing: 0.3px; background-color: #ffffff;">In this lecture, I talk about how</span><span style="box-sizing: border-box; color: #686f7a; font-family: 'sf pro text', -apple-system, BlinkMacSystemFont, Roboto, 'segoe ui', Helvetica, Arial, sans-serif, 'apple color emoji', 'segoe ui emoji', 'segoe ui symbol'; font-size: 13px; letter-spacing: 0.3px; background-color: #ffffff;">&nbsp;learning to properly use Bootstrap can save yourself hundreds of hours, and increase your work output by up to 100%.</span></p>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            
                                                        </td>

                                                        <td class="txt-rgt">
                                                                                                                6:19min
                                                        


                                                    </tr>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <tr>
                                                        <th class="class-icon">
                                                                                                                <a href="#" title="Course"><i class="fa fa-play-circle"></i></a>
                                                                                                                                                                                                                                                                                                                                                </th>

                                                        <td>

                                                            <div class="koh-tab-content">
                                                              <div class="koh-tab-content-body">
                                                                <div class="koh-faq">
                                                                  <div class="koh-faq-question">

                                                                    <span class="koh-faq-question-span"> Devlopment </span>

                                                                                                                                                                                                                <i class="fa fa-sort-down" aria-hidden="true"></i>
                                                                                                                                      </div>
                                                                  <div class="koh-faq-answer">
                                                                    <p><span style="color: #686f7a; font-family: 'sf pro text', -apple-system, BlinkMacSystemFont, Roboto, 'segoe ui', Helvetica, Arial, sans-serif, 'apple color emoji', 'segoe ui emoji', 'segoe ui symbol'; font-size: 13px; letter-spacing: 0.3px; background-color: #ffffff;">In this lecture, we'll clean up and customize the stylesheet that is provided with the Underscores Starter theme in order to work better with our custom theme going forward.</span></p>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            
                                                            <a href="../../watch/lightbox/107.html" class="iframe" style="display: block;">preview</a>

                                                            
                                                        </td>

                                                        <td class="txt-rgt">
                                                                                                                10min
                                                        


                                                    </tr>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <tr>
                                                        <th class="class-icon">
                                                                                                                <a href="#" title="Course"><i class="fa fa-play-circle"></i></a>
                                                                                                                                                                                                                                                                                                                                                </th>

                                                        <td>

                                                            <div class="koh-tab-content">
                                                              <div class="koh-tab-content-body">
                                                                <div class="koh-faq">
                                                                  <div class="koh-faq-question">

                                                                    <span class="koh-faq-question-span"> Live 2 </span>

                                                                                                                                           <div class="live-class">Live at: 2020-04-30 14:40:00</div>
                                                                                                                                                                                                          </div>
                                                                  <div class="koh-faq-answer">
                                                                    
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            
                                                        </td>

                                                        <td class="txt-rgt">
                                                                                                                min
                                                        


                                                    </tr>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <tr>
                                                        <th class="class-icon">
                                                                                                                                                                                                                                                                                        <a href="#" title="Course"><i class="fas fa-file-pdf"></i></a>
                                                                                                                                                                        </th>

                                                        <td>

                                                            <div class="koh-tab-content">
                                                              <div class="koh-tab-content-body">
                                                                <div class="koh-faq">
                                                                  <div class="koh-faq-question">

                                                                    <span class="koh-faq-question-span"> pdf </span>

                                                                                                                                                                                                          </div>
                                                                  <div class="koh-faq-answer">
                                                                    
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            
                                                        </td>

                                                        <td class="txt-rgt">
                                                                                                                5mb
                                                        


                                                    </tr>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <tr>
                                                        <th class="class-icon">
                                                                                                                <a href="#" title="Course"><i class="fa fa-play-circle"></i></a>
                                                                                                                                                                                                                                                                                                                                                </th>

                                                        <td>

                                                            <div class="koh-tab-content">
                                                              <div class="koh-tab-content-body">
                                                                <div class="koh-faq">
                                                                  <div class="koh-faq-question">

                                                                    <span class="koh-faq-question-span"> Test </span>

                                                                                                                                                                                                                <i class="fa fa-sort-down" aria-hidden="true"></i>
                                                                                                                                      </div>
                                                                  <div class="koh-faq-answer">
                                                                    <p>Test</p>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            
                                                        </td>

                                                        <td class="txt-rgt">
                                                                                                                min
                                                        


                                                    </tr>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                                                                                
                                <div class="card">
                                    <div class="card-header" id="headingTwo34">
                                        <div class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo34" aria-expanded="false" aria-controls="collapseTwo">

                                                <div class="row">
                                                <div class="col-lg-8 col-6">
                                                    Tools
                                                    
                                                                                                    </div>
                                                <div class="col-lg-2 col-4">
                                                    <div class="text-right">
                                                        2                                                        Classes
                                                    </div>
                                                </div>

                                                <div class="col-lg-2 col-2">
                                                    <div class="chapter-total-time">
                                                        28                                                        min
                                                    </div>
                                                </div>

                                            </div>

                                            </button>
                                        </div>

                                    </div>
                                    <!--
                                    FSMS commenting below line in order to collapse all chapters by default.  
                                       <div id="collapseTwo34" class="collapse " aria-labelledby="headingTwo" data-parent="#accordion">
                                       
                                     -->
                                    
                                    <div id="collapseTwo34" class="collapse " aria-labelledby="headingTwo" data-parent="#accordion">

                                        <div class="card-body">
                                            <table class="table">
                                                <tbody>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <tr>
                                                        <th class="class-icon">
                                                                                                                <a href="#" title="Course"><i class="fa fa-play-circle"></i></a>
                                                                                                                                                                                                                                                                                                                                                </th>

                                                        <td>

                                                            <div class="koh-tab-content">
                                                              <div class="koh-tab-content-body">
                                                                <div class="koh-faq">
                                                                  <div class="koh-faq-question">

                                                                    <span class="koh-faq-question-span"> WordPress Page Templates </span>

                                                                                                                                                                                                                <i class="fa fa-sort-down" aria-hidden="true"></i>
                                                                                                                                      </div>
                                                                  <div class="koh-faq-answer">
                                                                    <p><span style="box-sizing: border-box; color: #686f7a; font-family: 'sf pro text', -apple-system, BlinkMacSystemFont, Roboto, 'segoe ui', Helvetica, Arial, sans-serif, 'apple color emoji', 'segoe ui emoji', 'segoe ui symbol'; font-size: 13px; letter-spacing: 0.3px; background-color: #ffffff;">In this lecture we're going to add some resources using Custom Post Types UI, then code our resources template to dynamically display each individual</span><span style="color: #686f7a; font-family: 'sf pro text', -apple-system, BlinkMacSystemFont, Roboto, 'segoe ui', Helvetica, Arial, sans-serif, 'apple color emoji', 'segoe ui emoji', 'segoe ui symbol'; font-size: 13px; letter-spacing: 0.3px; background-color: #ffffff;">&nbsp;resource.</span></p>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            
                                                        </td>

                                                        <td class="txt-rgt">
                                                                                                                12:36min
                                                        


                                                    </tr>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <tr>
                                                        <th class="class-icon">
                                                                                                                <a href="#" title="Course"><i class="fa fa-play-circle"></i></a>
                                                                                                                                                                                                                                                                                                                                                </th>

                                                        <td>

                                                            <div class="koh-tab-content">
                                                              <div class="koh-tab-content-body">
                                                                <div class="koh-faq">
                                                                  <div class="koh-faq-question">

                                                                    <span class="koh-faq-question-span"> WordPress Navigation Menus </span>

                                                                                                                                                                                                          </div>
                                                                  <div class="koh-faq-answer">
                                                                    
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            
                                                        </td>

                                                        <td class="txt-rgt">
                                                                                                                16:45min
                                                        


                                                    </tr>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                                                                                
                                <div class="card">
                                    <div class="card-header" id="headingTwo35">
                                        <div class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo35" aria-expanded="false" aria-controls="collapseTwo">

                                                <div class="row">
                                                <div class="col-lg-8 col-6">
                                                    WordPress Theme: Set Up
                                                    
                                                                                                    </div>
                                                <div class="col-lg-2 col-4">
                                                    <div class="text-right">
                                                        1                                                        Classes
                                                    </div>
                                                </div>

                                                <div class="col-lg-2 col-2">
                                                    <div class="chapter-total-time">
                                                        12                                                        min
                                                    </div>
                                                </div>

                                            </div>

                                            </button>
                                        </div>

                                    </div>
                                    <!--
                                    FSMS commenting below line in order to collapse all chapters by default.  
                                       <div id="collapseTwo35" class="collapse " aria-labelledby="headingTwo" data-parent="#accordion">
                                       
                                     -->
                                    
                                    <div id="collapseTwo35" class="collapse " aria-labelledby="headingTwo" data-parent="#accordion">

                                        <div class="card-body">
                                            <table class="table">
                                                <tbody>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <tr>
                                                        <th class="class-icon">
                                                                                                                <a href="#" title="Course"><i class="fa fa-play-circle"></i></a>
                                                                                                                                                                                                                                                                                                                                                </th>

                                                        <td>

                                                            <div class="koh-tab-content">
                                                              <div class="koh-tab-content-body">
                                                                <div class="koh-faq">
                                                                  <div class="koh-faq-question">

                                                                    <span class="koh-faq-question-span"> WordPress Page Templates </span>

                                                                                                                                                                                                          </div>
                                                                  <div class="koh-faq-answer">
                                                                    
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            
                                                        </td>

                                                        <td class="txt-rgt">
                                                                                                                12min
                                                        


                                                    </tr>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                                                                                
                                <div class="card">
                                    <div class="card-header" id="headingTwo36">
                                        <div class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo36" aria-expanded="false" aria-controls="collapseTwo">

                                                <div class="row">
                                                <div class="col-lg-8 col-6">
                                                    Bootstrap Themplate
                                                    
                                                                                                    </div>
                                                <div class="col-lg-2 col-4">
                                                    <div class="text-right">
                                                        2                                                        Classes
                                                    </div>
                                                </div>

                                                <div class="col-lg-2 col-2">
                                                    <div class="chapter-total-time">
                                                        12                                                        min
                                                    </div>
                                                </div>

                                            </div>

                                            </button>
                                        </div>

                                    </div>
                                    <!--
                                    FSMS commenting below line in order to collapse all chapters by default.  
                                       <div id="collapseTwo36" class="collapse " aria-labelledby="headingTwo" data-parent="#accordion">
                                       
                                     -->
                                    
                                    <div id="collapseTwo36" class="collapse " aria-labelledby="headingTwo" data-parent="#accordion">

                                        <div class="card-body">
                                            <table class="table">
                                                <tbody>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <tr>
                                                        <th class="class-icon">
                                                                                                                                                                                                                                <a href="#" title="Course"><i class="fas fa-image"></i></a>
                                                                                                                                                                                                                                </th>

                                                        <td>

                                                            <div class="koh-tab-content">
                                                              <div class="koh-tab-content-body">
                                                                <div class="koh-faq">
                                                                  <div class="koh-faq-question">

                                                                    <span class="koh-faq-question-span"> Image </span>

                                                                                                                                                                                                          </div>
                                                                  <div class="koh-faq-answer">
                                                                    
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            
                                                        </td>

                                                        <td class="txt-rgt">
                                                                                                                12mb
                                                        


                                                    </tr>
                                                                                                                                                                                                                                                                                                                        <tr>
                                                        <th class="class-icon">
                                                                                                                <a href="#" title="Course"><i class="fa fa-play-circle"></i></a>
                                                                                                                                                                                                                                                                                                                                                </th>

                                                        <td>

                                                            <div class="koh-tab-content">
                                                              <div class="koh-tab-content-body">
                                                                <div class="koh-faq">
                                                                  <div class="koh-faq-question">

                                                                    <span class="koh-faq-question-span"> video upload </span>

                                                                                                                                                                                                          </div>
                                                                  <div class="koh-faq-answer">
                                                                    
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            
                                                        </td>

                                                        <td class="txt-rgt">
                                                                                                                12min
                                                        


                                                    </tr>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                                                                            </div>
                        </div>
                    </div>
                </div>
                

                



                <div class="requirements">
                    <h3>Requirements</h3>
                    <ul>
                        <li class="comment more">
                                                        Web Designers

Graphic designers are extremely talented, but ask them to code their designs and they&#039;ll freeze up! This leaves them with no other choice but to hire a web developer. Any professional graphic designers knows web developers can be expensive.

If you&#039;re a designer, learning to code your own WordPress websites can change your business entirely! Now, not only are you a great designe
                            <span class="read-more-show hide_content"><br>+&nbsp;See More</span>
                            <span class="read-more-content"> r, but you&#039;re a skillful developer, too! This puts you in a position tomake an extra $1,000 – $5,000 per project.
                            <span class="read-more-hide hide_content"><br>-&nbsp;See Less</span> </span>
                                                    </li>

                    </ul>
                </div>
                <div class="description-block btm-30">
                    <h3>Description</h3>

                    <p><p style="box-sizing: border-box; margin: 0px 0px 10.5px; word-break: break-word; color: #29303b; font-family: 'sf pro text', -apple-system, BlinkMacSystemFont, Roboto, 'segoe ui', Helvetica, Arial, sans-serif, 'apple color emoji', 'segoe ui emoji', 'segoe ui symbol'; font-size: 15px;"><span style="box-sizing: border-box; font-weight: bold;"><img class="img-fluid" style="border-style: dotted;" src="https://images.unsplash.com/photo-1612151855475-877969f4a6cc?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8aGQlMjBpbWFnZXxlbnwwfHwwfHw%3D&amp;w=1000&amp;q=80" alt="" />Graphic &amp; Web Designers</span></p>
<p style="box-sizing: border-box; margin: 0px 0px 10.5px; word-break: break-word; color: #29303b; font-family: 'sf pro text', -apple-system, BlinkMacSystemFont, Roboto, 'segoe ui', Helvetica, Arial, sans-serif, 'apple color emoji', 'segoe ui emoji', 'segoe ui symbol'; font-size: 15px;">Graphic designers are extremely talented, but ask them to code their designs and they'll freeze up! This leaves them with no other choice but to hire a web developer. Any professional graphic designers knows web developers can be expensive.</p>
<p style="box-sizing: border-box; margin: 0px 0px 10.5px; word-break: break-word; color: #29303b; font-family: 'sf pro text', -apple-system, BlinkMacSystemFont, Roboto, 'segoe ui', Helvetica, Arial, sans-serif, 'apple color emoji', 'segoe ui emoji', 'segoe ui symbol'; font-size: 15px;">If you're a designer, learning to code your own WordPress websites can change your business entirely! Now, not only are you a great designer, but you're a skillful developer, too! This puts you in a position tomake an extra $1,000 &ndash; $5,000 per project.</p>
<p style="box-sizing: border-box; margin: 0px 0px 10.5px; word-break: break-word; color: #29303b; font-family: 'sf pro text', -apple-system, BlinkMacSystemFont, Roboto, 'segoe ui', Helvetica, Arial, sans-serif, 'apple color emoji', 'segoe ui emoji', 'segoe ui symbol'; font-size: 15px;"><span style="box-sizing: border-box; font-weight: bold;">Quality HTML5 &amp; CSS3</span></p>
<p style="box-sizing: border-box; margin: 0px 0px 10.5px; word-break: break-word; color: #29303b; font-family: 'sf pro text', -apple-system, BlinkMacSystemFont, Roboto, 'segoe ui', Helvetica, Arial, sans-serif, 'apple color emoji', 'segoe ui emoji', 'segoe ui symbol'; font-size: 15px;">You'll learn how hand-craft a stunning website with valid, semantic and beautiful HTML5 &amp; CSS3.</p>
<p style="box-sizing: border-box; margin: 0px 0px 10.5px; word-break: break-word; color: #29303b; font-family: 'sf pro text', -apple-system, BlinkMacSystemFont, Roboto, 'segoe ui', Helvetica, Arial, sans-serif, 'apple color emoji', 'segoe ui emoji', 'segoe ui symbol'; font-size: 15px;"><span style="box-sizing: border-box; font-weight: bold;">Easy-to-use CMS</span></p>
<p style="box-sizing: border-box; margin: 0px 0px 10.5px; word-break: break-word; color: #29303b; font-family: 'sf pro text', -apple-system, BlinkMacSystemFont, Roboto, 'segoe ui', Helvetica, Arial, sans-serif, 'apple color emoji', 'segoe ui emoji', 'segoe ui symbol'; font-size: 15px;">&nbsp;</p>
<p style="box-sizing: border-box; margin: 0px 0px 10.5px; word-break: break-word; color: #29303b; font-family: 'sf pro text', -apple-system, BlinkMacSystemFont, Roboto, 'segoe ui', Helvetica, Arial, sans-serif, 'apple color emoji', 'segoe ui emoji', 'segoe ui symbol'; font-size: 15px;"><span style="box-sizing: border-box; font-weight: bold;"><img class="img-fluid" src="../../../../../upload.wikimedia.org/wikipedia/commons/thumb/b/b6/Image_created_with_a_mobile_phone.png/1200px-Image_created_with_a_mobile_phone.png" alt="" /></span></p>
<p style="box-sizing: border-box; margin: 0px 0px 10.5px; word-break: break-word; color: #29303b; font-family: 'sf pro text', -apple-system, BlinkMacSystemFont, Roboto, 'segoe ui', Helvetica, Arial, sans-serif, 'apple color emoji', 'segoe ui emoji', 'segoe ui symbol'; font-size: 15px;">&nbsp;</p>
<p style="box-sizing: border-box; margin: 0px 0px 10.5px; word-break: break-word; color: #29303b; font-family: 'sf pro text', -apple-system, BlinkMacSystemFont, Roboto, 'segoe ui', Helvetica, Arial, sans-serif, 'apple color emoji', 'segoe ui emoji', 'segoe ui symbol'; font-size: 15px;">&nbsp;</p>
<p style="box-sizing: border-box; margin: 0px 0px 10.5px; word-break: break-word; color: #29303b; font-family: 'sf pro text', -apple-system, BlinkMacSystemFont, Roboto, 'segoe ui', Helvetica, Arial, sans-serif, 'apple color emoji', 'segoe ui emoji', 'segoe ui symbol'; font-size: 15px;">Allow your clients to easily update their websites by converting your static websites to dynamic websites, using WordPress.</p>
<p style="box-sizing: border-box; margin: 0px 0px 10.5px; word-break: break-word; color: #29303b; font-family: 'sf pro text', -apple-system, BlinkMacSystemFont, Roboto, 'segoe ui', Helvetica, Arial, sans-serif, 'apple color emoji', 'segoe ui emoji', 'segoe ui symbol'; font-size: 15px;">&nbsp;</p>
<p style="box-sizing: border-box; margin: 0px 0px 10.5px; word-break: break-word; color: #29303b; font-family: 'sf pro text', -apple-system, BlinkMacSystemFont, Roboto, 'segoe ui', Helvetica, Arial, sans-serif, 'apple color emoji', 'segoe ui emoji', 'segoe ui symbol'; font-size: 15px;"><img class="img-fluid" style="border-style: dotted; border-width: 1px;" src="https://images.unsplash.com/photo-1453728013993-6d66e9c9123a?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8dmlld3xlbnwwfHwwfHw%3D&amp;w=1000&amp;q=80" alt="" /></p></p>

                </div>


                                                               


                

                <div class="students-bought btm-30">
                    <h3>Recent Courses</h3>
                                                                                <div class="course-bought-block">
                        <div class="row">
                            <div class="col-lg-3 col-sm-4 col-12">
                                <div class="course-bought-img">
                                                                            <a href="../21/travel-hacking-smart-fun-travel-copy-166373019920.html"><img src="../../images/course/157976457360.jpg" class="img-fluid" alt="blog"></a>
                                                                    </div>
                                <div class="course-rate txt-rgt">
                                    <ul>
                                        <li>
                                                                                    <div class="heart"><a href="../../login.html" title="heart"><i data-feather="heart"></i></a></div>
                                                                                </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-7 col-sm-8 col-12">
                                <div class="course-name btm-10"><a href="../21/travel-hacking-smart-fun-travel-copy-166373019920.html">Travel Hacking -Smart &amp; Fun Travel</a></div>
                                <div class="course-user btm-10">
                                    <ul>
                                        <li><i data-feather="clock"></i> <div class="course-update">September, 22nd 2022</div></li>
                                        <li><i data-feather="user"></i> <div class="course-user-count">0</div></li>
                                    </ul>
                                </div>     
                                <p class="course-name-para">60+ World Travel Tips: Cheap Travel. Fear of Flying. Travel Motivation &amp; Safety. Negotiation. Social Success Abroad.</p>                                   
                            </div>
                            <div class="col-lg-2 col-md-3 col-12">
                                
                                                                            <div class="course-currency txt-rgt">
                                            <ul>
                                                
                                                <li class="rate">1.00₹</li>

                                                <li class="rate"><s>2.00₹</s></li>


                                            </ul>
                                        </div>
                                                                                                </div>
                        </div>
                    </div>
                                                                                <div class="course-bought-block">
                        <div class="row">
                            <div class="col-lg-3 col-sm-4 col-12">
                                <div class="course-bought-img">
                                                                            <a href="../20/travel-hacking-smart-fun-travel.html"><img src="../../images/course/157976457360.jpg" class="img-fluid" alt="blog"></a>
                                                                    </div>
                                <div class="course-rate txt-rgt">
                                    <ul>
                                        <li>
                                                                                    <div class="heart"><a href="../../login.html" title="heart"><i data-feather="heart"></i></a></div>
                                                                                </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-7 col-sm-8 col-12">
                                <div class="course-name btm-10"><a href="../20/travel-hacking-smart-fun-travel.html">Travel Hacking -Smart &amp; Fun Travel</a></div>
                                <div class="course-user btm-10">
                                    <ul>
                                        <li><i data-feather="clock"></i> <div class="course-update">September, 19th 2022</div></li>
                                        <li><i data-feather="user"></i> <div class="course-user-count">3</div></li>
                                    </ul>
                                </div>     
                                <p class="course-name-para">60+ World Travel Tips: Cheap Travel. Fear of Flying. Travel Motivation &amp; Safety. Negotiation. Social Success Abroad.</p>                                   
                            </div>
                            <div class="col-lg-2 col-md-3 col-12">
                                
                                                                            <div class="course-currency txt-rgt">
                                            <ul>
                                                
                                                <li class="rate">1.00₹</li>

                                                <li class="rate"><s>2.00₹</s></li>


                                            </ul>
                                        </div>
                                                                                                </div>
                        </div>
                    </div>
                                                                                <div class="course-bought-block">
                        <div class="row">
                            <div class="col-lg-3 col-sm-4 col-12">
                                <div class="course-bought-img">
                                                                            <a href="../19/the-nail-art-tutorial-modern-nail-designs.html"><img src="../../images/course/nails-design-hands-with-bright-yellow-manicure-background-close-up-female-hands-art-nail-tiger-manicure_288539-61.jpg" class="img-fluid" alt="blog"></a>
                                                                    </div>
                                <div class="course-rate txt-rgt">
                                    <ul>
                                        <li>
                                                                                    <div class="heart"><a href="../../login.html" title="heart"><i data-feather="heart"></i></a></div>
                                                                                </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-7 col-sm-8 col-12">
                                <div class="course-name btm-10"><a href="../19/the-nail-art-tutorial-modern-nail-designs.html">The Nail Art Tutorial - Modern Nail...</a></div>
                                <div class="course-user btm-10">
                                    <ul>
                                        <li><i data-feather="clock"></i> <div class="course-update">June, 28th 2022</div></li>
                                        <li><i data-feather="user"></i> <div class="course-user-count">1</div></li>
                                    </ul>
                                </div>     
                                <p class="course-name-para">Learn by creating amazing nail designs, create gorgeous GEL manicures and start your own nail business from home.</p>                                   
                            </div>
                            <div class="col-lg-2 col-md-3 col-12">
                                
                                                                            <div class="course-currency txt-rgt">
                                            <ul>
                                                
                                                <li class="rate">400.00₹</li>

                                                <li class="rate"><s>1000.00₹</s></li>


                                            </ul>
                                        </div>
                                                                                                </div>
                        </div>
                    </div>
                                                                                <div class="course-bought-block">
                        <div class="row">
                            <div class="col-lg-3 col-sm-4 col-12">
                                <div class="course-bought-img">
                                                                            <a href="../18/hair-styling-the-ultimate-hair-course.html"><img src="../../images/course/hair.jpg" class="img-fluid" alt="blog"></a>
                                                                    </div>
                                <div class="course-rate txt-rgt">
                                    <ul>
                                        <li>
                                                                                    <div class="heart"><a href="../../login.html" title="heart"><i data-feather="heart"></i></a></div>
                                                                                </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-7 col-sm-8 col-12">
                                <div class="course-name btm-10"><a href="../18/hair-styling-the-ultimate-hair-course.html">Hair styling- The Ultimate Hair Cou...</a></div>
                                <div class="course-user btm-10">
                                    <ul>
                                        <li><i data-feather="clock"></i> <div class="course-update">July, 18th 2022</div></li>
                                        <li><i data-feather="user"></i> <div class="course-user-count">0</div></li>
                                    </ul>
                                </div>     
                                <p class="course-name-para">You won&#039;t visit a hairdresser again! Cut, dye  and style your hair yourself at home.</p>                                   
                            </div>
                            <div class="col-lg-2 col-md-3 col-12">
                                
                                                                            <div class="course-currency txt-rgt">
                                            <ul>
                                                
                                                <li class="rate">500.00₹</li>

                                                <li class="rate"><s>1200.00₹</s></li>


                                            </ul>
                                        </div>
                                                                                                </div>
                        </div>
                    </div>
                                                                                <div class="course-bought-block">
                        <div class="row">
                            <div class="col-lg-3 col-sm-4 col-12">
                                <div class="course-bought-img">
                                                                            <a href="../17/how-to-paint-portrait-painting-from-photograph.html"><img src="../../images/course/157976358156.jpg" class="img-fluid" alt="blog"></a>
                                                                    </div>
                                <div class="course-rate txt-rgt">
                                    <ul>
                                        <li>
                                                                                    <div class="heart"><a href="../../login.html" title="heart"><i data-feather="heart"></i></a></div>
                                                                                </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-7 col-sm-8 col-12">
                                <div class="course-name btm-10"><a href="../17/how-to-paint-portrait-painting-from-photograph.html">HOW TO PAINT- Portrait Painting Fro...</a></div>
                                <div class="course-user btm-10">
                                    <ul>
                                        <li><i data-feather="clock"></i> <div class="course-update">April, 23rd 2020</div></li>
                                        <li><i data-feather="user"></i> <div class="course-user-count">1</div></li>
                                    </ul>
                                </div>     
                                <p class="course-name-para">Learn How to Draw and Paint Colorful and Vibrant Portrait Paintings in Watercolor</p>                                   
                            </div>
                            <div class="col-lg-2 col-md-3 col-12">
                                                                    <div class="course-currency txt-rgt">
                                        <ul>
                                            <li>Free</li>
                                        </ul>
                                    </div>
                                                            </div>
                        </div>
                    </div>
                                                        </div>
                <div class="about-instructor-block">
                    <h3>About Instructor</h3>
                    
                    <div class="about-instructor btm-40">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-4">
                                <div class="instructor-img btm-30">
                                    
                                                                          <a href="../../instructor/1/11.html" title="instructor"><img src="../../images/user_img/1653992825cute-freelance-girl-using-laptop-sitting-floor-smiling.jpg" class="img-fluid" alt="instructor"></a>
                                                                        
                                </div>
                            </div>
                            <div class="col-lg-10 col-md-9 col-8">
                                <div class="instructor-block">
                                    <div class="instructor-name btm-10"><a href="../../instructor/1/11.html" title="instructor-name"> Admin Example </a></div>
                                    <div class="instructor-post btm-5">About Instructor</div>
                                    
                                    <p><p><strong style="margin: 0px; padding: 0px; font-family: 'Open Sans', Arial, sans-serif; text-align: justify;">Lorem Ipsum</strong><span style="font-family: 'Open Sans', Arial, sans-serif; text-align: justify;">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p></p>
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
                                    <div class="star-ratings-sprite star-ratings-center"><span style="width:100%" class="star-ratings-sprite-rating"></span>
                                    </div>
                                </div>
                                                        <div class="rating-users">Course Rating</div>
                        </div>
                        <div class="histo">
                            <div class="three histo-rate">
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
                                    <span id="bar-three" style=" width:100%;" class="bar bar-clr bar-radius">&nbsp;</span>
                                </span>
                            </div>
                            <div class="two histo-rate">
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
                                                                        <div class="col-lg-6 col-sm-6">
                            <div class="together-img">
                                <div class="student-view-block">
                                    <div class="view-block">
                                        <div class="view-img">
                                                                                            <a href="../9/the-complete-web-developer-bootcamp.html"><img src="../../images/course/webdeveloper.jpg" alt="student">
                                                </a>
                                                                                    </div>
                                        <div class="view-user-img">
                                                                                            <a href="../../all/profile/1.html" title=""><img src="../../images/user_img/1653992825cute-freelance-girl-using-laptop-sitting-floor-smiling.jpg" class="img-fluid user-img-one" alt=""></a>
                                                                                    </div>

                                        <div class="img-wishlist">
                                            <div class="protip-wishlist">
                                                <ul>

                                                    <li class="protip-wish-btn"><a
                                                            href="https://calendar.google.com/calendar/r/eventedit?text=The%20Complete%20Web%20Developer%20Bootcamp"
                                                            target="__blank" title="reminder"><i data-feather="bell"></i></a></li>

                                                                                                        <li class="protip-wish-btn"><a href="../../login.html" title="heart"><i
                                                                data-feather="heart"></i></a></li>
                                                                                                    </ul>
                                            </div>
                                        </div>

                                        <div class="view-dtl">
                                            <div class="view-heading"><a href="../9/the-complete-web-developer-bootcamp.html">The Complete Web Developer Boo...</a></div>
                                            <div class="user-name">
                                                <h6>By <span><a href="../../all/profile/1.html"> Admin</a></span></h6>
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
                                                            <i data-feather="user"></i><span>
                                                                1</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                                        
                                                                                                                            <div class="rate text-right">
                                                                    <ul>
                                                                        

                                                                        <li><a><b>800.00₹</b></a></li>

                                                                        <li><a><b><strike>1500.00₹</strike></b></a></li>

                                                                       
                                                                        
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
                                                                                                <div class="col-lg-6 col-sm-6">
                            <div class="together-img">
                                <div class="student-view-block">
                                    <div class="view-block">
                                        <div class="view-img">
                                                                                            <a href="../12/sql-learn-sql-for-data-analysis.html"><img src="../../images/course/oracle.jpg" alt="student">
                                                </a>
                                                                                    </div>
                                        <div class="view-user-img">
                                                                                            <a href="../../all/profile/1.html" title=""><img src="../../images/user_img/1653992825cute-freelance-girl-using-laptop-sitting-floor-smiling.jpg" class="img-fluid user-img-one" alt=""></a>
                                                                                    </div>

                                        <div class="img-wishlist">
                                            <div class="protip-wishlist">
                                                <ul>

                                                    <li class="protip-wish-btn"><a
                                                            href="https://calendar.google.com/calendar/r/eventedit?text=SQL:%20Learn%20SQL%20for%20data%20analysis"
                                                            target="__blank" title="reminder"><i data-feather="bell"></i></a></li>

                                                                                                        <li class="protip-wish-btn"><a href="../../login.html" title="heart"><i
                                                                data-feather="heart"></i></a></li>
                                                                                                    </ul>
                                            </div>
                                        </div>

                                        <div class="view-dtl">
                                            <div class="view-heading"><a href="../12/sql-learn-sql-for-data-analysis.html">SQL: Learn SQL for data analys...</a></div>
                                            <div class="user-name">
                                                <h6>By <span><a href="../../all/profile/1.html"> Admin</a></span></h6>
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
                                                            <i data-feather="user"></i><span>
                                                                1</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                                        
                                                                                                                            <div class="rate text-right">
                                                                    <ul>
                                                                        

                                                                        <li><a><b>500.00₹</b></a></li>

                                                                        <li><a><b><strike>1000.00₹</strike></b></a></li>

                                                                       
                                                                        
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
                                                                                                <div class="col-lg-6 col-sm-6">
                            <div class="together-img">
                                <div class="student-view-block">
                                    <div class="view-block">
                                        <div class="view-img">
                                                                                            <a href="../14/music-production-with-mixing-mastering.html"><img src="../../images/course/157976172453.jpg" alt="student">
                                                </a>
                                                                                    </div>
                                        <div class="view-user-img">
                                                                                            <a href="../../all/profile/1.html" title=""><img src="../../images/user_img/1653992825cute-freelance-girl-using-laptop-sitting-floor-smiling.jpg" class="img-fluid user-img-one" alt=""></a>
                                                                                    </div>

                                        <div class="img-wishlist">
                                            <div class="protip-wishlist">
                                                <ul>

                                                    <li class="protip-wish-btn"><a
                                                            href="https://calendar.google.com/calendar/r/eventedit?text=Music%20Production%20with%20Mixing%20&amp;%20Mastering"
                                                            target="__blank" title="reminder"><i data-feather="bell"></i></a></li>

                                                                                                        <li class="protip-wish-btn"><a href="../../login.html" title="heart"><i
                                                                data-feather="heart"></i></a></li>
                                                                                                    </ul>
                                            </div>
                                        </div>

                                        <div class="view-dtl">
                                            <div class="view-heading"><a href="../14/music-production-with-mixing-mastering.html">Music Production with Mixing &amp;...</a></div>
                                            <div class="user-name">
                                                <h6>By <span><a href="../../all/profile/1.html"> Instructor</a></span></h6>
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
                                                            <i data-feather="user"></i><span>
                                                                0</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                                        
                                                                                                                            <div class="rate text-right">
                                                                    <ul>
                                                                        

                                                                        <li><a><b>900.00₹</b></a></li>

                                                                        <li><a><b><strike>1000.00₹</strike></b></a></li>

                                                                       
                                                                        
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
                                                                    </div>
                </div>
                
                <!--Model start-->
                                <!--Model close -->
            </div>

        </div>
    </div>
</section>
@endsection