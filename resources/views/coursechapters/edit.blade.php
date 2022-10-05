@extends('layouts.admin.app')
@section('title', 'Edit CourseChapter')
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
		<h1>Edit CourseChapter</h1>
	</div>
	<div class="content-header-right">
		<a href="{{ route("coursechapter.index") }}" data-toggle="tooltip" data-placement="left" title="{{ $view_all_title }}" class="btn btn-primary btn-sm">{{ $view_all_title }}</a>
	</div>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="{{ route("coursechapter.update", $model->id) }}" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				@csrf
                {{ method_field('PATCH') }}
				<div class="box box-info">
					<div class="box-body">
                        <div class="form-group">
<label for="name" class="col-sm-2 control-label">Name <span style="color:red">*</span></label>
<div class="col-sm-8"><input type="text" class="form-control" name="name" value="{{ $model->name }}" placeholder="Enter name">
<span style="color: red">{{ $errors->first("name") }}</span></div></div><div class="form-group">
<label for="file" class="col-sm-2 control-label">File</label>
<div class="col-sm-8"><input type="text" class="form-control" name="file" value="{{ $model->file }}" placeholder="Enter file">
<span style="color: red">{{ $errors->first("file") }}</span></div></div><div class="form-group">
<label for="status" class="col-sm-2 control-label">Status <span style="color:red">*</span></label>
<div class="col-sm-8"><select class="form-control" name="status"><option value="1" {{ $model->status==1?"selected":"" }}>Active</option><option value="0" {{ $model->status==0?"selected":"" }}>In Active</option></select><span style="color: red">{{ $errors->first("status") }}</span></div></div><div class="form-group"><label for="status" class="col-sm-2 control-label"></label><div class="col-sm-8"><button type="submit" class="btn btn-success pull-left">Save</button></div></div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>

@endsection
@push('js')
@endpush
