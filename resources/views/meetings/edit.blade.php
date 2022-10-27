@extends('layouts.admin.app')
@section('title', 'Edit Meeting')
@push('css')
@endpush
@section('content')
<section class="content-header">
	<div class="content-header-left">
		<h1>Meeting</h1>
	</div>
	<div class="content-header-right">
		<a href="{{ route("meeting.index") }}" data-toggle="tooltip" data-placement="left" title="{{ $view_all_title }}" class="btn btn-primary btn-sm">{{ $view_all_title }}</a>
	</div>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="{{ route("meeting.store") }}" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				@csrf
				<div class="box box-info">
					<div class="box-body">
                        <div class="form-group">
                            <label for="zoom_meeting_url" class="col-sm-2 control-label">Zoom Meeting URL <span style="color:red">*</span></label>
                            <div class="col-sm-8"><input type="text" class="form-control" name="zoom_meeting_url" value="{{ old("zoom_meeting_url") }}" placeholder="Enter zoom_meeting_url">
                            <span style="color: red">{{ $errors->first("zoom_meeting_url") }}</span></div></div>

                        <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">Zoom Email <span style="color:red">*</span></label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="email" value="{{ old("email") }}" placeholder="Enter email">
                                <span style="color: red">{{ $errors->first("email") }}</span></div></div>
                        
                        <div class="form-group">
                            <label for="start_date" class="col-sm-2 control-label">Start Date <span style="color:red">*</span></label>
                            <div class="col-sm-8"><input type="date" class="form-control" name="start_date" value="{{ old("start_date") }}" placeholder="Enter start_date">
                            <span style="color: red">{{ $errors->first("start_date") }}</span></div></div>

                        <div class="form-group">
                            <label for="start_time" class="col-sm-2 control-label">Start Time <span style="color:red">*</span></label>
                            <div class="col-sm-8"><input type="time" class="form-control" name="start_time" value="{{ old("start_time") }}" placeholder="Enter start_time">
                            <span style="color: red">{{ $errors->first("start_time") }}</span></div></div>
                        
                        <div class="form-group">
                            <label for="topic" class="col-sm-2 control-label">Topic <span style="color:red">*</span></label>
                            <div class="col-sm-8"><input type="text" class="form-control" name="topic" value="{{ old("topic") }}" placeholder="Enter topic">
                            <span style="color: red">{{ $errors->first("topic") }}</span></div></div>

                        <div class="form-group">
                            <label for="agenda" class="col-sm-2 control-label">Agenda</label>
                            <div class="col-sm-8">
                                <textarea name="agenda" class="form-control ckeditor" id="agenda" rows="5" placeholder="Enter agenda"></textarea>
                                <span style="color: red">{{ $errors->first("agenda") }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="thumbnail" class="col-sm-2 control-label">Thumbnail <span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" id="imgInput" name="thumbnail" accept="image/*">
                                <span style="color: red">{{ $errors->first("thumbnail") }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="image" class="col-sm-2 control-label">Preview </label>
                            <div class="col-sm-8">
                                <img src="{{ asset('public/default.png') }}" id="preview"  width="100px" alt="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="status" class="col-sm-2 control-label">Status</label>
                            <div class="col-sm-8">
                                <div class="switch">
                                    <input id="status" class="cmn-toggle cmn-toggle-round-flat" @if(old('status')) checked @endif name="status" type="checkbox">
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
	</div>
</section>

@endsection
@push('js')
@endpush
