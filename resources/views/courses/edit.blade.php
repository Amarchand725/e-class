@extends('layouts.admin.app')
@section('title', 'Edit Course')
@push('css')
    <style>
        select {
            font-family: 'Font Awesome', 'sans-serif';
        }

        /*  bhoechie tab */
        div.bhoechie-tab-container{
        z-index: 10;
        background-color: #ffffff;
        padding: 0 !important;
        border-radius: 4px;
        -moz-border-radius: 4px;
        border:1px solid #ddd;
        margin-top: 20px;
        margin-left: 50px;
        -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
        box-shadow: 0 6px 12px rgba(0,0,0,.175);
        -moz-box-shadow: 0 6px 12px rgba(0,0,0,.175);
        background-clip: padding-box;
        opacity: 0.97;
        filter: alpha(opacity=97);
        }
        div.bhoechie-tab-menu{
        padding-right: 0;
        padding-left: 0;
        padding-bottom: 0;
        }
        div.bhoechie-tab-menu div.list-group{
        margin-bottom: 0;
        }
        div.bhoechie-tab-menu div.list-group>a{
        margin-bottom: 0;
        }
        div.bhoechie-tab-menu div.list-group>a .glyphicon,
        div.bhoechie-tab-menu div.list-group>a .fa {
        color: #5A55A3;
        }
        div.bhoechie-tab-menu div.list-group>a:first-child{
        border-top-right-radius: 0;
        -moz-border-top-right-radius: 0;
        }
        div.bhoechie-tab-menu div.list-group>a:last-child{
        border-bottom-right-radius: 0;
        -moz-border-bottom-right-radius: 0;
        }
        div.bhoechie-tab-menu div.list-group>a.active,
        div.bhoechie-tab-menu div.list-group>a.active .glyphicon,
        div.bhoechie-tab-menu div.list-group>a.active .fa{
        background-color: #5A55A3;
        background-image: #5A55A3;
        color: #ffffff;
        }
        div.bhoechie-tab-menu div.list-group>a.active:after{
        content: '';
        position: absolute;
        left: 100%;
        top: 50%;
        margin-top: -13px;
        border-left: 0;
        border-bottom: 13px solid transparent;
        border-top: 13px solid transparent;
        border-left: 10px solid #5A55A3;
        }

        div.bhoechie-tab-content{
        background-color: #ffffff;
        /* border: 1px solid #eeeeee; */
        padding: 20px;
        padding-top: 10px;
        }

        div.bhoechie-tab div.bhoechie-tab-content:not(.active){
        display: none;
        }
    </style>
@endpush
@section('content')
<section class="content-header">
	<div class="content-header-left">
		<h1>Course</h1>
	</div>
	<div class="content-header-right">
		<a href="{{ route("course.index") }}" data-toggle="tooltip" data-placement="left" title="{{ $view_all_title }}" class="btn btn-primary btn-sm">{{ $view_all_title }}</a>
	</div>
</section>
<section class="content">
	<div class="row">
        <div class="col-md-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 bhoechie-tab-menu">
                        <div class="list-group">
                            <a href="#" class="list-group-item active">
                                <h4 class="glyphicon glyphicon-th-large"></h4> Course
                            </a>
                            <a href="#" class="list-group-item">
                                <h4 class="glyphicon glyphicon-th-large"></h4> CourseInclude
                            </a>
                            <a href="#" class="list-group-item">
                                <h4 class="glyphicon glyphicon-th-large"></h4> WhatLearns
                            </a>
                            <a href="#" class="list-group-item">
                                <h4 class="glyphicon glyphicon-th-large"></h4> Course Chapter
                            </a>
                            <a href="#" class="list-group-item">
                                <h4 class="glyphicon glyphicon-th-large"></h4> Course Class
                            </a>
                            <a href="#" class="list-group-item">
                                <h4 class="glyphicon glyphicon-th-large"></h4> Question
                            </a>
                            <a href="#" class="list-group-item">
                                <h4 class="glyphicon glyphicon-th-large"></h4> Review Rating
                            </a>
                            <a href="#" class="list-group-item">
                                <h4 class="glyphicon glyphicon-th-large"></h4> Announcement
                            </a>
                            <a href="#" class="list-group-item">
                                <h4 class="glyphicon glyphicon-th-large"></h4> Review Report
                            </a>
                            <a href="#" class="list-group-item">
                                <h4 class="glyphicon glyphicon-th-large"></h4> Quiz Topic
                            </a>
                        </div>
                        {{-- <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
                            <!-- flight section -->
                            <div class="bhoechie-tab-content active">
                                <center>
                                  <h1 class="glyphicon glyphicon-plane" style="font-size:14em;color:#55518a"></h1>
                                  <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
                                  <h3 style="margin-top: 0;color:#55518a">Flight Reservation</h3>
                                </center>
                            </div>
                            <!-- train section -->
                            <div class="bhoechie-tab-content">
                                <center>
                                  <h1 class="glyphicon glyphicon-road" style="font-size:12em;color:#55518a"></h1>
                                  <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
                                  <h3 style="margin-top: 0;color:#55518a">Train Reservation</h3>
                                </center>
                            </div>
                
                            <!-- hotel search -->
                            <div class="bhoechie-tab-content">
                                <center>
                                  <h1 class="glyphicon glyphicon-home" style="font-size:12em;color:#55518a"></h1>
                                  <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
                                  <h3 style="margin-top: 0;color:#55518a">Hotel Directory</h3>
                                </center>
                            </div>
                            <div class="bhoechie-tab-content">
                                <center>
                                  <h1 class="glyphicon glyphicon-cutlery" style="font-size:12em;color:#55518a"></h1>
                                  <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
                                  <h3 style="margin-top: 0;color:#55518a">Restaurant Diirectory</h3>
                                </center>
                            </div>
                            <div class="bhoechie-tab-content">
                                <center>
                                  <h1 class="glyphicon glyphicon-credit-card" style="font-size:12em;color:#55518a"></h1>
                                  <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
                                  <h3 style="margin-top: 0;color:#55518a">Credit Card</h3>
                                </center>
                            </div>
                        </div> --}}
                    </div>
              </div>
            </div>
        </div>
		<div class="col-lg-9 col-md-9 col-sm-6 col-xs-12 bhoechie-tab">
            <div class="bhoechie-tab-content active">
                <form action="{{ route("course.update", $model->id) }}" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    @csrf
                    {{ method_field('PATCH') }}
                    <div class="box box-info">
                        <div class="box-body">
                            <input type="hidden" id="page_url" value="{{ route('course.index') }}">
                            <section class="content-header">
                                <div class="content-header-left">
                                    <h1>Edit Course</h1>
                                </div>
                            </section>
                            <hr />
                            <div class="form-group">
                                <label for="instructor" class="col-sm-2 control-label">Instructor <span style="color:red">*</span></label>
                                <div class="col-sm-8">
                                    <select name="instructor_slug" class="form-control" id="instructor">
                                        <option value="" selected>Select instructor</option>
                                        @foreach ($instructors as $instructor)
                                            <option value="{{ $instructor->slug }}" {{ $model->instructor_slug==$instructor->slug?'selected':'' }}>{{ $instructor->name }}</option>
                                        @endforeach
                                    </select>
                                    <span style="color: red">{{ $errors->first("institute_slug") }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="institute" class="col-sm-2 control-label">Institute <span style="color:red">*</span></label>
                                <div class="col-sm-8">
                                    <select name="institute_slug" class="form-control" id="institute">
                                        <option value="" selected>Select institute</option>
                                        @foreach ($institutes as $institute)
                                            <option value="{{ $institute->slug }}" {{ $model->institute_slug==$institute->slug?'selected':'' }}>{{ $institute->name }}</option>
                                        @endforeach
                                    </select>
                                    <span style="color: red">{{ $errors->first("institute_slug") }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="category" class="col-sm-2 control-label">Category <span style="color:red">*</span></label>
                                <div class="col-sm-8">
                                    <select name="category_slug" class="form-control" id="category">
                                        <option value="" selected>Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->slug }}" {{ $model->category_slug==$category->slug?'selected':'' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <span style="color: red">{{ $errors->first("category_slug") }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Title <span style="color:red">*</span></label>
                            <div class="col-sm-8"><input type="text" class="form-control" name="title" value="{{ $model->title }}" placeholder="Enter title">
                            <span style="color: red">{{ $errors->first("title") }}</span></div></div>

                            <div class="form-group">
                            <label for="short_description" class="col-sm-2 control-label">Short Description</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" id="requirements" rows="10" name="short_description" placeholder="Enter short_description">{{ $model->short_description }}</textarea>
                            <span style="color: red">{{ $errors->first("short_description") }}</span></div></div>

                            <div class="form-group">
                            <label for="requirements" class="col-sm-2 control-label">Requirements</label>
                            <div class="col-sm-8">
                                <textarea class="form-control ckeditor" id="requirements" rows="10" name="requirements">{{ $model->requirements }}</textarea>
                            <span style="color: red">{{ $errors->first("requirements") }}</span></div></div>

                            <div class="form-group">
                            <label for="full_description" class="col-sm-2 control-label">Full Description</label>
                            <div class="col-sm-8"><textarea class="form-control ckeditor" rows="10" id="full_description" name="full_description">{{ $model->full_description }}</textarea>
                            <span style="color: red">{{ $errors->first("full_description") }}</span></div></div>

                            <div class="form-group">
                            <label for="thumbnail" class="col-sm-2 control-label">Thumbnail @if(!$model->thumbnail) <span style="color:red">*</span> @endif</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" id="imgInput" accept="image/*" name="thumbnail">
                            <span style="color: red">{{ $errors->first("thumbnail") }}</span></div></div>

                            @if($model->thumbnail)
                                <div class="form-group">
                                    <label for="image" class="col-sm-2 control-label">Exist Thumbnail </label>
                                    <div class="col-sm-8">
                                        <img id="preview" src="{{ asset('public/admin/images/courses') }}/{{ $model->thumbnail }}" width="100px" alt="">
                                    </div>
                                </div>
                            @else 
                                <div class="form-group">
                                    <label for="image" class="col-sm-2 control-label">Preview</label>
                                    <div class="col-sm-8">
                                        <img id="preview" src="{{ asset('public/default.png') }}" width="100px" alt="">
                                    </div>
                                </div>
                            @endif

                            @if($model->video)
                                <div class="form-group">
                                    <label for="image" class="col-sm-2 control-label">Exist Video </label>
                                    <div class="col-sm-8">
                                        <video width="320" height="240" controls>
                                            <source src="{{ asset('public/admin/images/courses') }}/{{ $model->video }}" type="video/mp4">
                                            <source src="{{ asset('public/admin/images/courses') }}/{{ $model->video }}" type="video/ogg">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="is_youtube_url" class="col-sm-2 control-label">Youtube Video URL</label>
                                <div class="col-sm-8">
                                    <div class="switch">
                                        <input id="youtube_url" @if($model->video_url) checked @endif class="cmn-toggle cmn-toggle-round-flat" name="is_youtube_url" value="1" type="checkbox">
                                        <label for="youtube_url"></label>
                                    </div>
                                    <span style="color: red">{{ $errors->first("is_youtube_url") }}</span>
                                </div>
                            </div>

                            <div class="form-group upload-video-field">
                                @if($model->video_url)
                                    <label for="video_url" class="col-sm-2 control-label">Youtube Video URL </label>
                                    <div class="col-sm-8">
                                        <input type="text" value="{{ $model->video_url }}" class="form-control" name="video_url" accept="video/*" placeholder="Enter video url">
                                        <span style="color: red">{{ $errors->first("video_url") }}</span>
                                    </div>
                                @else 
                                    <label for="video" class="col-sm-2 control-label">Upload Video </label>
                                    <div class="col-sm-8">
                                        <input type="file" class="form-control" name="video" accept="video/*">
                                        <span style="color: red">{{ $errors->first("video") }}</span>
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="duration" class="col-sm-2 control-label">Duration </label>
                                <div class="col-sm-8">
                                    <input type="time" value="{{ $model->duration }}" class="form-control" name="duration" accept="video/*" placeholder="Enter video duration">
                                    <span style="color: red">{{ $errors->first("duration") }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="is_paid" class="col-sm-2 control-label">Paid</label>
                                <div class="col-sm-8">
                                    <div class="switch">
                                        <input id="paid" @if($model->is_paid) checked @endif class="cmn-toggle cmn-toggle-round-flat" name="is_paid" value="1" type="checkbox">
                                        <label for="paid"></label>
                                    </div>
                                    <span style="color: red">{{ $errors->first("is_paid") }}</span>
                                </div>
                            </div>

                            <span id="if-paid" @if(!$model->is_paid) style="display: none" @endif>
                                <div class="form-group">
                                    <label for="price" class="col-sm-2 control-label">Price</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control numberonly" name="price" value="{{ $model->retail_price }}" placeholder="Enter price">
                                        <span style="color: red">{{ $errors->first("price") }}</span>
                                    </div>
                                </div>
            
                                <div class="form-group">
                                    <label for="discount_type" class="col-sm-2 control-label">Discount Type</label>
                                    <div class="col-sm-8">
                                        <select name="discount_type" id="discount_type" class="form-control">
                                            <option value="" selected>Select discount type</option>
                                            <option value="percent" {{ $model->discount_type=='percent'?'selected':'' }}>Percent(%)</option>
                                            <option value="fix" {{ $model->discount_type=='fix'?'selected':'' }}>Fixed</option>
                                        </select>
                                        <span style="color: red">{{ $errors->first("discount_type") }}</span>
                                    </div>
                                </div>
        
                                <div class="custome-discount">
                                    @if($model->discount)
                                    <div class="form-group">
                                        <label for="discount" class="col-sm-2 control-label">Discount </label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" value="{{ $model->discount }}" name="discount" id="discount" placeholder="Enter discount value">
                                            <span style="color: red">{{ $errors->first("discount") }}</span>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </span>

                            <div class="form-group">
                                <label for="is_featured" class="col-sm-2 control-label">Featured</label>
                                <div class="col-sm-8">
                                    <div class="switch">
                                        <input id="featured" @if($model->is_featured) checked @endif class="cmn-toggle cmn-toggle-round-flat" name="is_featured" value="1" type="checkbox">
                                        <label for="featured"></label>
                                    </div>
                                    <span style="color: red">{{ $errors->first("is_featured") }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="status" class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-8">
                                    <div class="switch">
                                        <input id="status" class="cmn-toggle cmn-toggle-round-flat" value="1" @if($model->status) checked @endif name="status" type="checkbox">
                                        <label for="status"></label>
                                    </div>
                                    <span style="color: red">{{ $errors->first("status") }}</span>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="status" class="col-sm-2 control-label"></label>
                                <div class="col-sm-8">
                                    <button type="submit" class="btn btn-success pull-left">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="bhoechie-tab-content">
                <div class="box box-info">
                    <div class="box-body">
                        <input type="hidden" id="page_url" value="{{ route('course.index') }}">
                        <section class="content-header">
                            <div class="content-header-left">
                                <h1>Course Includes</h1>
                            </div>
                            <div class="content-header-right">
                                <button type="button" data-toggle="tooltip" data-placement="left" data-course-id="{{ $model->id }}" title="Add New Course" class="btn btn-primary btn-sm add-course-include-btn">Add New Course Include</button>
                            </div>
                        </section>
                        <hr />
                        <section class="content">
                            <div class="row">
                                <div class="col-sm-1">Search:</div>
                                <div class="d-flex col-sm-9">
                                    <input type="text" id="search" class="form-control" placeholder="Search" style="margin-bottom:5px">
                                    <input type="hidden" id="status" value="All" class="form-control">
                                </div>
                                <div class="d-flex col-sm-9">
                                    <a href="" class="btn btn"></a>
                                </div>
                            </div>
                            <table id="" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Icon</th>
                                        <th>Detail</th>
                                        <th>STATUS</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="course-include-body">
                                    @foreach ($includes as $key=>$include)
                                        <tr id="id-{{ $include->id }}">
                                            <td>{{  $includes->firstItem()+$key }}.</td>
                                            <td>{!! $include->icon !!}</td>
                                            <td>{!! $include->detail !!}</td>
                                            <td>
                                                <div class="switch">
                                                    <input id="inc_status-{{ $include->id }}" class="cmn-toggle cmn-toggle-round-flat course-include-status-btn" data-include-id="{{ $include->id }}" data-update-action="{{ route('courseinclude.update', $include->id) }}" @if($include->status) value="1" checked @endif name="status" type="checkbox">
                                                    <label for="inc_status-{{ $include->id }}"></label>
                                                </div>
                                            </td>
                                            <td width="250px">  
                                                <button data-toggle="tooltip" data-update-action="{{ route('courseinclude.update', $include->id) }}" data-course-id="{{ $include->course_id }}" data-course-includes="{{ $include }}" data-placement="top" title="Edit Course include" class="btn btn-primary btn-xs edit-course-include-btn" style="margin-left: 3px;"><i class="fa fa-edit"></i></button>
                                                <button data-toggle="tooltip" data-placement="top" title="Delete Course include" class="btn btn-danger btn-xs delete-course-include" data-slug="{{ $include->id }}" data-del-url="{{ route("courseinclude.destroy", $include->id) }}" style="margin-left: 3px;"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="15">
                                            Displying {{$includes->firstItem()}} to {{$includes->lastItem()}} of {{$includes->total()}} records
                                            <div class="d-flex justify-content-center">
                                                {!! $includes->links('pagination::bootstrap-4') !!}
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </section>
                    </div>
                </div>
            </div>
		</div>
	</div>
    <!-- Add Course Include Modal -->
    <div class="modal fade" id="add-course-include-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #337ab7; color:white">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Course Include</h5>
                    <button type="button" style="margin-top: -20px; color:white" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <form id="add-course-include-form" data-course-form="{{ route('courseinclude.store') }}" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                            @csrf
                            <input type="hidden" name="course_id" id="course-id" value="{{ $model->id }}">
                            <div class="box box-info">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="icon" class="col-sm-2 control-label">Icon <span style="color:red">*</span></label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="icon" id="icon" value="{{ old('icon') }}" placeholder="Copy font awesome tag from library and paste here e.g <i class='fa fa-user' aria-hidden='true'></i>" >
                                            <a href="https://fontawesome.com/v4/icons/" style="margin-top: 5px" target="_blank" class="btn btn-success">Choose Icon</a><br />
                                            <span style="color: red" id="error-icon">{{ $errors->first('icon') }}</span>
                                        </div>
                                    </div>
            
                                    <div class="form-group">
                                        <label for="detail" class="col-sm-2 control-label">Detail <span style="color:red">*</span></label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="detail" rows="5" name="detail" placeholder="Enter detail" >{{ old("detail") }}</textarea>
                                            <span style="color: red" id="error-detail">{{ $errors->first("detail") }}</span>
                                        </div>
                                    </div>
            
                                    <div class="form-group">
                                        <label for="" class="col-sm-2 control-label">Status</label>
                                        <div class="col-sm-8">
                                            <div class="switch">
                                                <input id="ci_status" class="cmn-toggle cmn-toggle-round-flat" value="1" @if(old('status')) checked @endif name="status" type="checkbox">
                                                <label for="ci_status"></label>
                                            </div>
                                            <span style="color: red">{{ $errors->first("status") }}</span>
                                        </div>
                                    </div>
            
                                    <div class="form-group">
                                        <label for="status" class="col-sm-2 control-label"></label>
                                        <div class="col-sm-8">
                                            <button type="submit" class="btn btn-success pull-left">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

     <!-- Edit Course Include Modal -->
     <div class="modal fade" id="edit-course-include-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #337ab7; color:white">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Course Include</h5>
                    <button type="button" style="margin-top: -20px; color:white" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <form id="update-course-include-form" class="form-horizontal" enctype="multipart/form-data" method="put" accept-charset="utf-8">
                            @csrf

                            {{ method_field('PATCH') }}
                            <input type="hidden" name="course_id" id="course-id" value="{{ $model->id }}">
                            <div class="box box-info">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="icon" class="col-sm-2 control-label">Icon <span style="color:red">*</span></label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="icon" id="icon" value="{{ old('icon') }}" placeholder="Copy font awesome tag from library and paste here e.g <i class='fa fa-user' aria-hidden='true'></i>" >
                                            <a href="https://fontawesome.com/v4/icons/" style="margin-top: 5px" target="_blank" class="btn btn-success">Choose Icon</a><br />
                                            <span style="color: red" id="error-icon">{{ $errors->first('icon') }}</span>
                                        </div>
                                    </div>
            
                                    <div class="form-group">
                                        <label for="detail" class="col-sm-2 control-label">Detail <span style="color:red">*</span></label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="detail" rows="5" name="detail" placeholder="Enter detail" >{{ old("detail") }}</textarea>
                                            <span style="color: red" id="error-detail">{{ $errors->first("detail") }}</span>
                                        </div>
                                    </div>
            
                                    <div class="form-group">
                                        <label for="status" class="col-sm-2 control-label"></label>
                                        <div class="col-sm-8">
                                            <button type="submit" class="btn btn-success pull-left">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@push('js')
    <script src="{{ asset('public/website/js/course-include/course-include-functions.js') }}"></script>
    <script>
        $(document).on('click', '#youtube_url', function(){
            if($('input[name="is_youtube_url"]').is(':checked'))
            {
                var html = '';
                html =  '<label for="video_url" class="col-sm-2 control-label">Youtube Video URL </label>'+
                        '<div class="col-sm-8">'+
                            '<input type="text" class="form-control" name="video_url" accept="video/*" placeholder="Enter video url">'+
                            '<span style="color: red">{{ $errors->first("video_url") }}</span>'+
                        '</div>';
                
                $('.upload-video-field').html(html);
            }else
            {
                var html = '';
                html =  '<label for="video" class="col-sm-2 control-label">Upload Video </label>'+
                            '<div class="col-sm-8">'+
                                '<input type="file" class="form-control" name="video" accept="video/*">'+
                                '<span style="color: red">{{ $errors->first("video") }}</span>'+
                            '</div>';
                
                $('.upload-video-field').html(html);
            }
        });

        $(document).on('click', '#paid', function(){
            if($('input[name="is_paid"]').is(':checked'))
            {
                $('#if-paid').css('display', 'block');
            }else
            {
                $('#if-paid').css('display', 'none');
            }
        });

        $(document).on('change', '#discount_type', function(){
            var discount_type = $(this).val();
            
            var html = '';
            if(discount_type){
                html += '<div class="form-group">'+
                            '<label for="discount" class="col-sm-2 control-label">Discount </label>'+
                            '<div class="col-sm-8">'+
                                '<input type="number" class="form-control" name="discount" id="discount" placeholder="Enter discount value">'+
                                '<span style="color: red">{{ $errors->first("discount") }}</span>'+
                            '</div>'+
                        '</div>';
                $('.custome-discount').html(html);    
            }else{
                $('.custome-discount').html("");    
            }
        });
        $(function() {
            $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
                e.preventDefault();
                $(this).siblings('a.active').removeClass("active");
                $(this).addClass("active");
                var index = $(this).index();
                $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
                $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
            });
        });
    </script>
@endpush
