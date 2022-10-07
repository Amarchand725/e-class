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
                            {{-- <a href="#" class="list-group-item">
                                <h4 class="glyphicon glyphicon-th-large"></h4> Review Rating
                            </a> --}}
                            <a href="#" class="list-group-item">
                                <h4 class="glyphicon glyphicon-th-large"></h4> Announcement
                            </a>
                            {{-- <a href="#" class="list-group-item">
                                <h4 class="glyphicon glyphicon-th-large"></h4> Quiz Topic
                            </a> --}}
                        </div>
                    </div>
              </div>
            </div>
        </div>
		<div class="col-lg-9 col-md-9 col-sm-6 col-xs-12 bhoechie-tab">
            <!-- COURSE -->
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

            <!-- COURSE INCLUDES-->
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

            <!-- COURSE WHATLEARNS-->
            <div class="bhoechie-tab-content">
                <div class="box box-info">
                    <div class="box-body">
                        <input type="hidden" id="page_url" value="{{ route('whatlearn.index') }}">
                        <section class="content-header">
                            <div class="content-header-left">
                                <h1>WhatLearns</h1>
                            </div>
                            <div class="content-header-right">
                                <button type="button" data-toggle="tooltip" data-placement="left" data-course-id="{{ $model->id }}" title="Add New WhatLearn" class="btn btn-primary btn-sm add-course-whatlearn-btn">Add New WhatLearn</button>
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
                                        <th>Detail</th>
                                        <th>STATUS</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="course-whatlearn-body">
                                    @foreach ($whatlearns as $key=>$whatlearn)
                                        <tr id="id-{{ $whatlearn->id }}">
                                            <td>{{  $whatlearns->firstItem()+$key }}.</td>
                                            <td>{!! $whatlearn->detail !!}</td>
                                            <td>
                                                <div class="switch">
                                                    <input id="inc_status-{{ $whatlearn->id }}" class="cmn-toggle cmn-toggle-round-flat course-whatlearn-status-btn" data-whatlearn-id="{{ $whatlearn->id }}" data-update-action="{{ route('whatlearn.update', $whatlearn->id) }}" @if($whatlearn->status) value="1" checked @endif name="status" type="checkbox">
                                                    <label for="inc_status-{{ $whatlearn->id }}"></label>
                                                </div>
                                            </td>
                                            <td width="250px">  
                                                <button data-toggle="tooltip" data-update-action="{{ route('whatlearn.update', $whatlearn->id) }}" data-course-id="{{ $whatlearn->course_id }}" data-course-whatlearns="{{ $whatlearn }}" data-placement="top" title="Edit Course whatlearn" class="btn btn-primary btn-xs edit-course-whatlearn-btn" style="margin-left: 3px;"><i class="fa fa-edit"></i></button>
                                                <button data-toggle="tooltip" data-placement="top" title="Delete Course whatlearn" class="btn btn-danger btn-xs delete-course-whatlearn" data-slug="{{ $whatlearn->id }}" data-del-url="{{ route("whatlearn.destroy", $whatlearn->id) }}" style="margin-left: 3px;"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="15">
                                            Displying {{$whatlearns->firstItem()}} to {{$whatlearns->lastItem()}} of {{$whatlearns->total()}} records
                                            <div class="d-flex justify-content-center">
                                                {!! $whatlearns->links('pagination::bootstrap-4') !!}
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </section>
                    </div>
                </div>
            </div>

            <!-- COURSE CHAPTERS-->
            <div class="bhoechie-tab-content">
                <div class="box box-info">
                    <div class="box-body">
                        <input type="hidden" id="page_url" value="{{ route('coursechapter.index') }}">
                        <section class="content-header">
                            <div class="content-header-left">
                                <h1>Course Chapters</h1>
                            </div>
                            <div class="content-header-right">
                                <button type="button" data-toggle="tooltip" data-placement="left" data-course-id="{{ $model->id }}" title="Add New coursechapter" class="btn btn-primary btn-sm add-course-chapter-btn">Add New coursechapter</button>
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
                                        <th>Chapter</th>
                                        <th>STATUS</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="course-chapter-body">
                                    @foreach ($coursechapters as $key=>$coursechapter)
                                        <tr id="id-{{ $coursechapter->id }}">
                                            <td>{{  $coursechapters->firstItem()+$key }}.</td>
                                            <td>{!! $coursechapter->name !!}</td>
                                            <td>
                                                <div class="switch">
                                                    <input id="inc_status-{{ $coursechapter->id }}" class="cmn-toggle cmn-toggle-round-flat course-chapter-status-btn" data-chapter-id="{{ $coursechapter->id }}" data-update-action="{{ route('coursechapter.update', $coursechapter->id) }}" @if($coursechapter->status) value="1" checked @endif name="status" type="checkbox">
                                                    <label for="inc_status-{{ $coursechapter->id }}"></label>
                                                </div>
                                            </td>
                                            <td width="250px">  
                                                <button data-toggle="tooltip" data-update-action="{{ route('coursechapter.update', $coursechapter->id) }}" data-course-id="{{ $coursechapter->course_id }}" data-course-chapters="{{ $coursechapter }}" data-placement="top" title="Edit Course coursechapter" class="btn btn-primary btn-xs edit-course-chapter-btn" style="margin-left: 3px;"><i class="fa fa-edit"></i></button>
                                                <button data-toggle="tooltip" data-placement="top" title="Delete Course coursechapter" class="btn btn-danger btn-xs delete-course-chapter" data-slug="{{ $coursechapter->id }}" data-del-url="{{ route("coursechapter.destroy", $coursechapter->id) }}" style="margin-left: 3px;"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="15">
                                            Displying {{$coursechapters->firstItem()}} to {{$coursechapters->lastItem()}} of {{$coursechapters->total()}} records
                                            <div class="d-flex justify-content-center">
                                                {!! $coursechapters->links('pagination::bootstrap-4') !!}
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </section>
                    </div>
                </div>
            </div>

            <!-- COURSE CLASSES-->
            <div class="bhoechie-tab-content">
                <div class="box box-info">
                    <div class="box-body">
                        <input type="hidden" id="page_url" value="{{ route('courseclass.index') }}">
                        <section class="content-header">
                            <div class="content-header-left">
                                <h1>Course Classes</h1>
                            </div>
                            <div class="content-header-right">
                                <button type="button" data-toggle="tooltip" data-placement="left" data-course-id="{{ $model->id }}" title="Add New courseclass" class="btn btn-primary btn-sm add-course-class-btn">Add New Course Class</button>
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
                                        <th>Chapter</th>
                                        <th>Title</th>
                                        <th>STATUS</th>
                                        <th>FEATURED</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="course-class-body">
                                    @foreach ($courseclasses as $key=>$courseclass)
                                        <tr id="id-{{ $courseclass->id }}">
                                            <td>{{  $courseclasses->firstItem()+$key }}.</td>
                                            <td>{!! $courseclass->hasChapter->name??'N/A' !!}</td>
                                            <td>{!! $courseclass->title !!}</td>
                                            <td>
                                                <div class="switch">
                                                    <input id="class_status-{{ $courseclass->id }}" class="cmn-toggle cmn-toggle-round-flat course-class-status-btn" data-class-id="{{ $courseclass->id }}" data-update-action="{{ route('courseclass.update', $courseclass->id) }}" @if($courseclass->status) value="1" checked @endif name="status" type="checkbox">
                                                    <label for="class_status-{{ $courseclass->id }}"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="switch">
                                                    <input id="is_featured-{{ $courseclass->id }}" class="cmn-toggle cmn-toggle-round-flat course-class-featured-btn" data-class-id="{{ $courseclass->id }}" data-update-action="{{ route('courseclass.update', $courseclass->id) }}" value="1" @if($courseclass->is_featured) checked @endif name="is_featured" type="checkbox">
                                                    <label for="is_featured-{{ $courseclass->id }}"></label>
                                                </div>
                                            </td>
                                            <td width="250px">  
                                                <button data-toggle="tooltip" data-update-action="{{ route('courseclass.update', $courseclass->id) }}" data-edit-class-url="{{ route('courseclass.edit', $courseclass->id) }}" data-class-id="{{ $courseclass->course_id }}"  data-placement="top" title="Edit Course courseclass" class="btn btn-primary btn-xs edit-course-class-btn" style="margin-left: 3px;"><i class="fa fa-edit"></i></button>
                                                <button data-toggle="tooltip" data-placement="top" title="Delete Course courseclass" class="btn btn-danger btn-xs delete-course-class" data-slug="{{ $courseclass->id }}" data-del-url="{{ route("courseclass.destroy", $courseclass->id) }}" style="margin-left: 3px;"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="15">
                                            Displying {{$courseclasses->firstItem()}} to {{$courseclasses->lastItem()}} of {{$courseclasses->total()}} records
                                            <div class="d-flex justify-content-center">
                                                {!! $courseclasses->links('pagination::bootstrap-4') !!}
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </section>
                    </div>
                </div>
            </div>

            <!-- COURSE QUESTION-->
            <div class="bhoechie-tab-content">
                <div class="box box-info">
                    <div class="box-body">
                        <input type="hidden" id="page_url" value="{{ route('courseclass.index') }}">
                        <section class="content-header">
                            <div class="content-header-left">
                                <h1>Course Questions</h1>
                            </div>
                            <div class="content-header-right">
                                <button type="button" data-toggle="tooltip" data-placement="left" data-course-id="{{ $model->id }}" title="Add New coursequestion" class="btn btn-primary btn-sm add-course-question-btn">Add New Course Question</button>
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
                                        <th>QUESTION</th>
                                        <th>STATUS</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="course-question-body">
                                    @foreach ($coursequestions as $key=>$coursequestion)
                                        <tr id="id-{{ $coursequestion->id }}">
                                            <td>{{  $coursequestions->firstItem()+$key }}.</td>
                                            <td>{!! $coursequestion->question !!}</td>
                                            <td>
                                                <div class="switch">
                                                    <input id="question_status-{{ $coursequestion->id }}" class="cmn-toggle cmn-toggle-round-flat course-question-status-btn" data-question-id="{{ $coursequestion->id }}" data-update-action="{{ route('coursequestion.update', $coursequestion->id) }}" @if($coursequestion->status) value="1" checked @endif name="status" type="checkbox">
                                                    <label for="question_status-{{ $coursequestion->id }}"></label>
                                                </div>
                                            </td>
                                            <td width="250px">  
                                                <button data-toggle="tooltip" data-update-action="{{ route('coursequestion.update', $coursequestion->id) }}" data-course-questions="{{ $coursequestion }}" data-question-id="{{ $coursequestion->course_id }}"  data-placement="top" title="Edit Course coursequestion" class="btn btn-primary btn-xs edit-course-question-btn" style="margin-left: 3px;"><i class="fa fa-edit"></i></button>
                                                <button data-toggle="tooltip" data-placement="top" title="Delete Course coursequestion" class="btn btn-danger btn-xs delete-course-question" data-slug="{{ $coursequestion->id }}" data-del-url="{{ route("coursequestion.destroy", $coursequestion->id) }}" style="margin-left: 3px;"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="15">
                                            Displying {{$coursequestions->firstItem()}} to {{$coursequestions->lastItem()}} of {{$coursequestions->total()}} records
                                            <div class="d-flex justify-content-center">
                                                {!! $coursequestions->links('pagination::bootstrap-4') !!}
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </section>
                    </div>
                </div>
            </div>

            <!-- COURSE ANNOUNCEMENT-->
            <div class="bhoechie-tab-content">
                <div class="box box-info">
                    <div class="box-body">
                        <input type="hidden" id="page_url" value="{{ route('courseannouncement.index') }}">
                        <section class="content-header">
                            <div class="content-header-left">
                                <h1>Course Announcement</h1>
                            </div>
                            <div class="content-header-right">
                                <button type="button" data-toggle="tooltip" data-placement="left" data-course-id="{{ $model->id }}" title="Add New courseannouncement" class="btn btn-primary btn-sm add-course-announcement-btn">Add New Course Announcement</button>
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
                                        <th>announcement</th>
                                        <th>STATUS</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="course-announcement-body">
                                    @foreach ($courseannouncements as $key=>$courseannouncement)
                                        <tr id="id-{{ $courseannouncement->id }}">
                                            <td>{{  $courseannouncements->firstItem()+$key }}.</td>
                                            <td>{!! $courseannouncement->announcement !!}</td>
                                            <td>
                                                <div class="switch">
                                                    <input id="announcement_status-{{ $courseannouncement->id }}" class="cmn-toggle cmn-toggle-round-flat course-announcement-status-btn" data-announcement-id="{{ $courseannouncement->id }}" data-update-action="{{ route('courseannouncement.update', $courseannouncement->id) }}" @if($courseannouncement->status) value="1" checked @endif name="status" type="checkbox">
                                                    <label for="announcement_status-{{ $courseannouncement->id }}"></label>
                                                </div>
                                            </td>
                                            <td width="250px">  
                                                <button data-toggle="tooltip" data-update-action="{{ route('courseannouncement.update', $courseannouncement->id) }}" data-course-announcements="{{ $courseannouncement }}" data-announcement-id="{{ $courseannouncement->course_id }}"  data-placement="top" title="Edit Course courseannouncement" class="btn btn-primary btn-xs edit-course-announcement-btn" style="margin-left: 3px;"><i class="fa fa-edit"></i></button>
                                                <button data-toggle="tooltip" data-placement="top" title="Delete Course courseannouncement" class="btn btn-danger btn-xs delete-course-announcement" data-slug="{{ $courseannouncement->id }}" data-del-url="{{ route("courseannouncement.destroy", $courseannouncement->id) }}" style="margin-left: 3px;"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="15">
                                            Displying {{$courseannouncements->firstItem()}} to {{$courseannouncements->lastItem()}} of {{$courseannouncements->total()}} records
                                            <div class="d-flex justify-content-center">
                                                {!! $courseannouncements->links('pagination::bootstrap-4') !!}
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

    @include('web-views.website.courseincludes.announcements.modals')

    @include('web-views.website.courseincludes.questions.modals')

    @include('web-views.website.courseincludes.classes.modals')

    @include('web-views.website.courseincludes.chapters.modals')
    
    @include('web-views.website.courseincludes.whatlearns.modals')

    @include('web-views.website.courseincludes.includes.modals')
</section>

@endsection
@push('js')
    <script src="{{ asset('public/website/js/course-include/course-announcement-functions.js') }}"></script>
    <script src="{{ asset('public/website/js/course-include/course-question-functions.js') }}"></script>
    <script src="{{ asset('public/website/js/course-include/course-class-functions.js') }}"></script>
    <script src="{{ asset('public/website/js/course-include/course-chapter-functions.js') }}"></script>
    <script src="{{ asset('public/website/js/course-include/course-whatlearn-functions.js') }}"></script>
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

        course_attachment.onchange = evt => {
            const [file] = course_attachment.files
            if (file) {
                class_preview.src = URL.createObjectURL(file)
            }
        }
    </script>
@endpush
