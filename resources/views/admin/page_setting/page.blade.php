@extends('layouts.admin.app')

@section('content')
<section class="content-header">
    <div class="content-header-left">
        <h1>Page Section</h1>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            @if (session('status'))
				<div class="callout callout-success">
					{{ session('status') }}
				</div>
			@endif
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Home</a></li>
                    <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">About</a></li>
                    <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Service</a></li>
                    <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false">Contact</a></li>
                    <li class=""><a href="#tab_5" data-toggle="tab" aria-expanded="false">Blog</a></li>
                </ul>
                <div class="tab-content">
                    <!-- Home -->
                    <div class="tab-pane active" id="tab_1">
                        @foreach($Pageview as $view)
                            <h3 class="sec_title">Meta Items</h3>
                            <form action="{{ route('page.home_setting')}}" class="form-horizontal" method="post" accept-charset="utf-8">
                                @csrf
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Title </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="title" class="form-control" value="{{$view->title}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Meta Keyword </label>
                                    <div class="col-sm-6">
                                        <textarea class="form-control" name="meta_keyword" style="height:60px;">{{$view->meta_keyword}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Meta Description </label>
                                    <div class="col-sm-6">
                                        <textarea class="form-control" name="meta_description" style="height:60px;">{{$view->meta_description}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2"></label>
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-success pull-left" name="form_home">Update</button>
                                    </div>
                                </div>
                            </form>
                            <h3 class="sec_title">Banner Section</h3>
                            <form action="{{ route('page.home_setting')}}" class="form-horizontal" method="post" accept-charset="utf-8">
                                @csrf
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Banner Heading </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="banner_heading" class="form-control" value="{{$view->home_service_title}}">
                                    </div>
                                </div>
                                <fieldset>
                                    <legend>Top Section</legend>
                                    <div class="form-group">
                                        <label for="" class="col-sm-2 control-label">Heading  </label>
                                        <div class="col-sm-6">
                                            <input type="text" name="top_sec_heading" class="form-control" value="{{$view->home_service_subtitle}}" placeholder="e.g Condidate">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-2 control-label">Title  </label>
                                        <div class="col-sm-6">
                                            <input type="text" name="top_sec_title" class="form-control" value="{{$view->home_service_subtitle}}" placeholder="Enter title">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-2 control-label">Description  </label>
                                        <div class="col-sm-6">
                                            <textarea name="top_sec_description" id="" class="form-control" placeholder="Enter description here..."></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-2 control-label">Image  </label>
                                        <div class="col-sm-6">
                                            <input type="file" name="top_sec_image" class="form-control" value="{{$view->home_service_subtitle}}">
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Middle Section</legend>
                                    <div class="form-group">
                                        <label for="" class="col-sm-2 control-label">Heading  </label>
                                        <div class="col-sm-6">
                                            <input type="text" name="middle_sec_heading" class="form-control" value="{{$view->home_service_subtitle}}" placeholder="e.g Interviewer">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-2 control-label">Title  </label>
                                        <div class="col-sm-6">
                                            <input type="text" name="middle_sec_title" class="form-control" value="{{$view->home_service_subtitle}}" placeholder="Enter title">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-2 control-label">Description  </label>
                                        <div class="col-sm-6">
                                            <textarea name="middle_sec_description" id="" class="form-control" placeholder="Enter description here..."></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-2 control-label">Image  </label>
                                        <div class="col-sm-6">
                                            <input type="file" name="middle_sec_image" class="form-control" value="{{$view->home_service_subtitle}}">
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Bottom Section</legend>
                                    <div class="form-group">
                                        <label for="" class="col-sm-2 control-label">Heading  </label>
                                        <div class="col-sm-6">
                                            <input type="text" name="bottom_sec_heading" class="form-control" value="{{$view->home_service_subtitle}}" placeholder="e.g Connect">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-2 control-label">Title  </label>
                                        <div class="col-sm-6">
                                            <input type="text" name="bottom_sec_title" class="form-control" value="{{$view->home_service_subtitle}}" placeholder="Enter title">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-2 control-label">Description  </label>
                                        <div class="col-sm-6">
                                            <textarea name="bottom_sec_description" id="" class="form-control" placeholder="Enter description here..."></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-2 control-label">Image  </label>
                                        <div class="col-sm-6">
                                            <input type="file" name="bottom_sec_image" class="form-control" value="{{$view->home_service_subtitle}}">
                                        </div>
                                    </div>
                                </fieldset>
                                
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Show on Home? </label>
                                    <div class="col-sm-2">
                                        <select name="home_service_status" class="form-control select2 select2-accessible" style="width:auto;" tabindex="-1" aria-hidden="true">
                                            <option {{ $view->home_service_status == 'Show' ? 'selected':'' }}>Show</option>
                                            <option {{ $view->home_service_status == 'Hide' ? 'selected':'' }}>Hide</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2"></label>
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-success pull-left" name="form_home_service">Update</button>

                                    </div>
                                </div>
                            </form>
                            <h3 class="sec_title">Second Section</h3>
                            <form action="{{ route('page.home_setting')}}" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                @csrf
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Left Title </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="home_welcome_title" class="form-control" value="{{$view->home_welcome_title}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Left Text </label>
                                    <div class="col-sm-6">
                                        <textarea name="home_welcome_text" class="form-control editor_short" cols="30" rows="10">{{$view->home_welcome_text}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Right Title </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="home_welcome_subtitle" class="form-control" value="{{$view->home_welcome_subtitle}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Right Text </label>
                                    <div class="col-sm-6">
                                        <textarea name="home_welcome_video" class="form-control editor_short" cols="30" rows="10" style="height:100px;">{{$view->home_welcome_video}}</textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Show on Home? </label>
                                    <div class="col-sm-2">
                                        <select name="home_welcome_status" class="form-control select2 select2-accessible" style="width:auto;" tabindex="-1" aria-hidden="true">
                                            <option {{ $view->home_welcome_status == 'Show' ? 'selected':'' }}>Show</option>
                                            <option {{ $view->home_welcome_status == 'Hide' ? 'selected':'' }}>Hide</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2"></label>
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-success pull-left" name="form_home_welcome">Update</button>

                                    </div>
                                </div>
                            </form>
                            <h3 class="sec_title">Third Image</h3>
                            <form action="{{ route('page.home_setting')}}" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                @csrf
                                @if($view->home_welcome_image_bg)
                                    <div class="form-group">
                                        <label for="" class="col-sm-2 control-label">Existing Image</label>
                                        <div class="col-sm-6" style="padding-top:6px;">
                                            <img src="{{ asset('/public/admin/assets/images/page/'.$view->home_welcome_image_bg) }}" class="existing-photo" style="height:180px;">
                                        </div>
                                    </div>
                                @endif`
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Image</label>
                                    <div class="col-sm-6" style="padding-top:5px;">
                                        <input type="file" name="home_welcome_image_bg">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2"></label>
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-success pull-left" name="form_home_welcome_video_bg">Update</button>

                                    </div>
                                </div>
                            </form>
                            <h3 class="sec_title">Third Section</h3>
                            <form action="{{ route('page.home_setting')}}" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                @csrf
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Title </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="home_feature_title" class="form-control" value="{{$view->home_feature_title}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Description </label>
                                    <div class="col-sm-6">
                                        <textarea type="text" name="home_feature_subtitle" class="form-control editor_short" value="">{{$view->home_feature_subtitle}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Show on Home? </label>
                                    <div class="col-sm-2">
                                        <select name="home_feature_status" class="form-control select2 select2-accessible" style="width:auto;" tabindex="-1" aria-hidden="true">
                                            <option {{ $view->home_feature_status == 'Show' ? 'selected':'' }}>Show</option>
                                            <option {{ $view->home_feature_status == 'Hide' ? 'selected':'' }}>Hide</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2"></label>
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-success pull-left" name="form_home_feature">Update</button>

                                    </div>
                                </div>
                            </form>
                            <h3 class="sec_title">Fourth Photo Section</h3>
                            <form action="{{ route('page.home_setting')}}" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                @csrf
                                @if($view->counter_photo)
                                    <div class="form-group">
                                        <label for="" class="col-sm-2 control-label">Existing Image</label>
                                        <div class="col-sm-6" style="padding-top:6px;">
                                            <img src="{{ asset('/public/admin/assets/images/page/'.$view->counter_photo) }}" class="existing-photo" style="height:180px;">
                                        </div>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">New Image</label>
                                    <div class="col-sm-6" style="padding-top:6px;">
                                        <input type="file" name="counter_photo">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label"></label>
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-success pull-left" name="form_home_counter_photo">Update</button>
                                    </div>
                                </div>
                            </form>

                            <h3 class="sec_title">Fourth Section</h3>
                            <form action="{{ route('page.home_setting')}}" class="form-horizontal" method="post" accept-charset="utf-8">
                                @csrf
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Title </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="home_portfolio_title" class="form-control" value="{{$view->home_portfolio_title}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Description </label>
                                    <div class="col-sm-6">
                                        <textarea type="text" name="home_portfolio_subtitle" class="form-control editor_short" value="">{{$view->home_portfolio_subtitle}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Show on Home? </label>
                                    <div class="col-sm-2">
                                        <select name="home_portfolio_status" class="form-control select2 select2-accessible" style="width:auto;" tabindex="-1" aria-hidden="true">
                                            <option {{ $view->home_portfolio_status == 'Show' ? 'selected':'' }}>Show</option>
                                            <option {{ $view->home_portfolio_status == 'Hide' ? 'selected':'' }}>Hide</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2"></label>
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-success pull-left" name="form_home_portfolio">Update</button>

                                    </div>
                                </div>
                            </form>
                            <h3 class="sec_title">Fifth Section</h3>
                            <form action="{{ route('page.home_setting')}}" class="form-horizontal" method="post" accept-charset="utf-8">
                                @csrf
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Left Title </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="home_booking_form_title" class="form-control" value="{{$view->home_booking_form_title}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Left Description </label>
                                    <div class="col-sm-6">
                                        <textarea type="text" name="home_booking_faq_title" class="form-control editor_short" value="">{{$view->home_booking_faq_title}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Right Title </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="home_team_title" class="form-control" value="{{$view->home_team_title}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Right Description </label>
                                    <div class="col-sm-6">
                                        <textarea type="text" name="home_team_subtitle" class="form-control editor_short" value="">{{$view->home_team_subtitle}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Show on Home? </label>
                                    <div class="col-sm-2">
                                        <select name="home_booking_status" class="form-control select2 select2-accessible" style="width:auto;" tabindex="-1" aria-hidden="true">
                                            <option {{ $view->home_booking_status == 'Show' ? 'selected':'' }}>Show</option>
                                            <option {{ $view->home_booking_status == 'Hide' ? 'selected':'' }}>Hide</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2"></label>
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-success pull-left" name="form_home_booking">Update</button>

                                    </div>
                                </div>
                            </form>

                            <h3 class="sec_title">Fifth Photo Section</h3>
                            <form action="{{ route('page.home_setting')}}" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                @csrf
                                @if($view->home_booking_photo)
                                    <div class="form-group">
                                        <label for="" class="col-sm-2 control-label">Existing Photo</label>
                                        <div class="col-sm-6" style="padding-top:6px;">
                                            <img src="{{ asset('/public/admin/assets/images/page/'.$view->home_booking_photo) }}" class="" existing-photo="" style=" height:180px;">
                                        </div>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">New Photo</label>
                                    <div class="col-sm-6" style="padding-top:6px;">
                                        <input type="file" name="home_booking_photo">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label"></label>
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-success pull-left" name="form_home_booking_photo">Update</button>
                                    </div>
                                </div>
                            </form>

                            <h3 class="sec_title">Why Choose Us Section</h3>
                            <form action="{{ route('page.home_setting')}}" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                @csrf
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Title </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="home_why_choose_title" class="form-control" value="{{$view->home_why_choose_title}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">SubTitle </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="home_why_choose_subtitle" class="form-control" value="{{$view->home_why_choose_subtitle}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Show on Home? </label>
                                    <div class="col-sm-2">
                                        <select name="home_why_choose_status" class="form-control select2 select2-accessible" style="width:auto;" tabindex="-1" aria-hidden="true">
                                            <option {{ $view->home_why_choose_status == 'Show' ? 'selected':'' }}>Show</option>
                                            <option {{ $view->home_why_choose_status == 'Hide' ? 'selected':'' }}>Hide</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2"></label>
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-success pull-left" name="form_home_why_choose">Update</button>

                                    </div>
                                </div>
                            </form>

                            <h3 class="sec_title">Counter Information Section</h3>
                            <form action="{{ route('page.home_setting')}}" class="form-horizontal" method="post" accept-charset="utf-8">
                                @csrf <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Item 1 - Title </label>
                                    <div class="col-sm-2">
                                        <input type="text" name="counter_1_title" class="form-control" value="{{$view->counter_1_title}}">
                                    </div>
                                    <label for="" class="col-sm-2 control-label">Item 1 - Value </label>
                                    <div class="col-sm-2">
                                        <input type="text" name="counter_1_value" class="form-control" value="{{$view->counter_1_value}}">
                                    </div>
                                    <label for="" class="col-sm-2 control-label">Item 1 - Icon </label>
                                    <div class="col-sm-2">
                                        <input type="text" name="counter_1_icon" class="form-control" value="{{$view->counter_1_icon}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Item 2 - Title </label>
                                    <div class="col-sm-2">
                                        <input type="text" name="counter_2_title" class="form-control" value="{{$view->counter_2_title}}">
                                    </div>
                                    <label for="" class="col-sm-2 control-label">Item 2 - Value </label>
                                    <div class="col-sm-2">
                                        <input type="text" name="counter_2_value" class="form-control" value="{{$view->counter_2_value}}">
                                    </div>
                                    <label for="" class="col-sm-2 control-label">Item 2 - Icon </label>
                                    <div class="col-sm-2">
                                        <input type="text" name="counter_2_icon" class="form-control" value="{{$view->counter_2_icon}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Item 3 - Title </label>
                                    <div class="col-sm-2">
                                        <input type="text" name="counter_3_title" class="form-control" value="{{$view->counter_3_title}}">
                                    </div>
                                    <label for="" class="col-sm-2 control-label">Item 3 - Value </label>
                                    <div class="col-sm-2">
                                        <input type="text" name="counter_3_value" class="form-control" value="{{$view->counter_3_value}}">
                                    </div>
                                    <label for="" class="col-sm-2 control-label">Item 3 - Icon </label>
                                    <div class="col-sm-2">
                                        <input type="text" name="counter_3_icon" class="form-control" value="{{$view->counter_3_icon}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Item 4 - Title </label>
                                    <div class="col-sm-2">
                                        <input type="text" name="counter_4_title" class="form-control" value="{{$view->counter_4_title}}">
                                    </div>
                                    <label for="" class="col-sm-2 control-label">Item 4 - Value </label>
                                    <div class="col-sm-2">
                                        <input type="text" name="counter_4_value" class="form-control" value="{{$view->counter_4_value}}">
                                    </div>
                                    <label for="" class="col-sm-2 control-label">Item 4 - Icon </label>
                                    <div class="col-sm-2">
                                        <input type="text" name="counter_4_icon" class="form-control" value="{{$view->counter_4_icon}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Show on Home? </label>
                                    <div class="col-sm-2">
                                        <select name="counter_status" class="form-control select2 select2-accessible" style="width:auto;" tabindex="-1" aria-hidden="true">
                                            <option {{ $view->counter_status == 'Show' ? 'selected':'' }}>Show</option>
                                            <option {{ $view->counter_status == 'Hide' ? 'selected':'' }}>Hide</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label"></label>
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-success pull-left" name="form_home_counter_text">Update</button>
                                    </div>
                                </div>
                            </form>

                            <h3 class="sec_title">Testimonial Section</h3>
                            <form action="{{ route('page.home_setting')}}" class="form-horizontal" method="post" accept-charset="utf-8">
                                @csrf
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Title </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="home_testimonial_title" class="form-control" value="{{$view->home_testimonial_title}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">SubTitle </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="home_testimonial_subtitle" class="form-control" value="{{$view->home_testimonial_subtitle}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Show on Home? </label>
                                    <div class="col-sm-2">
                                        <select name="home_testimonial_status" class="form-control select2 select2-accessible" style="width:auto;" tabindex="-1" aria-hidden="true">
                                            <option {{ $view->home_testimonial_status == 'Show' ? 'selected':'' }}>Show</option>
                                            <option {{ $view->home_testimonial_status == 'Hide' ? 'selected':'' }}>Hide</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2"></label>
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-success pull-left" name="form_home_testimonial">Update</button>

                                    </div>
                                </div>
                            </form>

                            <h3 class="sec_title">Pricing Table Section</h3>
                            <form action="{{ route('page.home_setting')}}" class="form-horizontal" method="post" accept-charset="utf-8">
                                @csrf
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Title </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="home_ptable_title" class="form-control" value="{{$view->home_ptable_title}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">SubTitle </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="home_ptable_subtitle" class="form-control" value="{{$view->home_ptable_subtitle}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Show on Home? </label>
                                    <div class="col-sm-2">
                                        <select name="home_ptable_status" class="form-control select2 select2-accessible" style="width:auto;" tabindex="-1" aria-hidden="true">
                                            <option {{ $view->home_ptable_status == 'Show' ? 'selected':'' }}>Show</option>
                                            <option {{ $view->home_ptable_status == 'Hide' ? 'selected':'' }}>Hide</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2"></label>
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-success pull-left" name="form_home_pricing_table">Update</button>

                                    </div>
                                </div>
                            </form>

                            <h3 class="sec_title">Contact Section</h3>
                            <form action="{{ route('page.home_setting')}}" class="form-horizontal" method="post" accept-charset="utf-8">
                                @csrf
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Title </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="home_blog_title" class="form-control" value="{{$view->home_blog_title}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Description </label>
                                    <div class="col-sm-6">
                                        <textarea type="text" name="home_blog_subtitle" class="form-control editor_short" value="">{{$view->home_blog_subtitle}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Contact Title </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="home_blog_item" class="form-control" value="{{$view->home_blog_item}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Show on Home? </label>
                                    <div class="col-sm-2">
                                        <select name="home_blog_status" class="form-control select2 select2-accessible" style="width:auto;" tabindex="-1" aria-hidden="true">
                                            <option {{ $view->home_blog_status == 'Show' ? 'selected':'' }}>Show</option>
                                            <option {{ $view->home_blog_status == 'Hide' ? 'selected':'' }}>Hide</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2"></label>
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-success pull-left" name="form_home_blog">Update</button>

                                    </div>
                                </div>
                            </form>
                        @endforeach
                    </div>

                    <!-- About -->
                    <div class="tab-pane" id="tab_2">
                        @foreach($aboutview as $view)
                            <form action="{{ route('page.about')}}" class="form-horizontal" method="post" accept-charset="utf-8">
                                @csrf
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">About Heading </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="about_heading" class="form-control" value="{{$view->about_heading}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">About Content </label>
                                    <div class="col-sm-9">
                                        <textarea name="about_content" class="form-control texteditor" cols="30" rows="10">{{$view->about_content}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Meta Title </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="mt_about" class="form-control" value="{{$view->mt_about}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Meta Keyword </label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="mk_about" style="height:60px;">{{$view->mk_about}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Meta Description </label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="md_about" style="height:60px;">{{$view->md_about}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label"></label>
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-success pull-left" name="form_about">Update</button>
                                    </div>
                                </div>
                            </form>
                        @endforeach
                    </div>

                    <!-- Service -->
                    <div class="tab-pane" id="tab_3">
                        @foreach($serviceview as $view)
                            <form action="{{ route('page.service')}}" class="form-horizontal" method="post" accept-charset="utf-8">
                                @csrf
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Service Heading </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="service_heading" class="form-control" value="{{$view->service_heading}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Description</label>
                                    <div class="col-sm-6">
                                        <textarea class="form-control editor" name="service_description" style="height:60px;">{{$view->service_description}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Meta Title </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="mt_service" class="form-control" value="{{$view->mt_service}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Meta Keyword </label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="mk_service" style="height:60px;">{{$view->mk_service}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Meta Description </label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="md_service" style="height:60px;">{{$view->md_service}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label"></label>
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-success pull-left" name="form_service">Update</button>
                                    </div>
                                </div>
                            </form>
                        @endforeach
                    </div>

                    <!-- Contact -->
                    <div class="tab-pane" id="tab_4">
                        @foreach($contactview as $view)
                            <form action="{{ route('page.contact')}}" class="form-horizontal" method="post" accept-charset="utf-8">
                                @csrf
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Contact Heading </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="contact_heading" class="form-control" value="{{$view->contact_heading}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Contact Address </label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="contact_address" style="height:60px;">{{$view->contact_address}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Contact Email </label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="contact_email" style="height:60px;">{{$view->contact_email}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Contact Phone </label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="contact_phone" style="height:60px;">{{$view->contact_phone}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Contact Map (iframe Code) </label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="contact_map" style="height:120px;">{{$view->contact_map}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Meta Title </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="mt_contact" class="form-control" value="{{$view->mt_contact}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Meta Keyword </label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="mk_contact" style="height:60px;">{{$view->mk_contact}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Meta Description </label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="md_contact" style="height:60px;">{{$view->md_contact}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label"></label>
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-success pull-left" name="form_contact">Update</button>
                                    </div>
                                </div>

                            </form>
                        @endforeach
                    </div>

                    <!-- Blog -->
                    <div class="tab-pane" id="tab_5">
                        @foreach($blogview as $view)
                            <form action="{{ route('page.blog')}}" class="form-horizontal" method="post" accept-charset="utf-8">
                                @csrf
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Blog Heading </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="blog_heading" class="form-control" value="{{$view->blog_heading}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Meta Title </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="mt_blog" class="form-control" value="{{$view->mt_blog}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Meta Keyword </label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="mk_blog" style="height:60px;">{{$view->mk_blog}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Meta Description </label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="md_blog" style="height:60px;">{{$view->md_blog}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label"></label>
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-success pull-left" name="form_news">Update</button>
                                    </div>
                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('js')
<script>
	$(document).ready(function() {
		if ($(".texteditor").length > 0) {
			tinymce.init({
				selector: "textarea.texteditor",
				theme: "modern",
				height: 150,
				plugins: [
					"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
					"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
					"save table contextmenu directionality emoticons template paste textcolor"
				],
				toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

			});
		}
	});
</script>
@endpush