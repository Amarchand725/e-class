@extends('layouts.admin.app')
@section('title', 'Edit Courseinclude')
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
		<h1>Edit Courseinclude</h1>
	</div>
	<div class="content-header-right">
		<a href="{{ route("courseinclude.index") }}" data-toggle="tooltip" data-placement="left" title="{{ $view_all_title }}" class="btn btn-primary btn-sm">{{ $view_all_title }}</a>
	</div>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="{{ route("courseinclude.update", $model->id) }}" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				@csrf
                {{ method_field('PATCH') }}
				<div class="box box-info">
					<div class="box-body">
                        <div class="form-group">
<label for="course_id" class="col-sm-2 control-label">Course_id <span style="color:red">*</span></label>
<div class="col-sm-8"><input type="number" class="form-control" name="course_id" value="{{ $model->course_id }}" placeholder="Enter course_id">
<span style="color: red">{{ $errors->first("course_id") }}</span></div></div><div class="form-group">
<label for="icon" class="col-sm-2 control-label">Icon <span style="color:red">*</span></label>
<div class="col-sm-8"><input type="text" class="form-control" name="icon" value="{{ $model->icon }}" placeholder="Enter icon">
<span style="color: red">{{ $errors->first("icon") }}</span></div></div><div class="form-group">
<label for="detail" class="col-sm-2 control-label">Detail <span style="color:red">*</span></label>
<div class="col-sm-8"><textarea class="form-control" id="detail" name="detail">{{ $model->detail }}</textarea>
<span style="color: red">{{ $errors->first("detail") }}</span></div></div><div class="form-group">
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
