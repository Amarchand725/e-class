@extends('layouts.admin.app')
@section('title', 'Add New Blog')
@push('css')
    <style>
        select {
            font-family: 'Font Awesome', 'sans-serif';
        }
    </style>
@endpush
@section('content')
<section class="content-header">
	<div class="content-header-left">
		<h1>Add New Blog</h1>
	</div>
	<div class="content-header-right">
		<a href="{{ route("blog.index") }}" data-toggle="tooltip" data-placement="left" title="{{ $view_all_title }}" class="btn btn-primary btn-sm">{{ $view_all_title }}</a>
	</div>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="{{ route("blog.store") }}" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				@csrf
				<div class="box box-info">
					<div class="box-body">
                        <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Title <span style="color:red">*</span></label>
                        <div class="col-sm-8"><input type="text" class="form-control" name="title" value="{{ old("title") }}" placeholder="Enter title">
                        <span style="color: red">{{ $errors->first("title") }}</span></div></div>

                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-8">
                                <textarea class="form-control ckeditor" id="description" name="description" placeholder="Enter description">{{ old("description") }}</textarea>
                                <span style="color: red">{{ $errors->first("description") }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="attachment" class="col-sm-2 control-label">Attachment</label>
                            <div class="col-sm-8">
                                <input type="file" id="imgInput" class="form-control" name="attachment">
                                <span style="color: red">{{ $errors->first("attachment") }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="image" class="col-sm-2 control-label">Preview </label>
                            <div class="col-sm-8">
                                <img src="{{ asset('public/default.png') }}" id="preview"  width="100px" alt="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="status" class="col-sm-2 control-label">Status <span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <select class="form-control" name="status">
                                    <option value="1" {{ old("status")==1?"selected":"" }}>Active</option>
                                    <option value="0" {{ old("status")==0?"selected":"" }}>In Active</option>
                                </select>
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
