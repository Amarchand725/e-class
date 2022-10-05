@extends('layouts.admin.app')
@section('title', 'Add New CourseClass')
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
		<h1>Add New CourseClass</h1>
	</div>
	<div class="content-header-right">
		<a href="{{ route("courseclass.index") }}" data-toggle="tooltip" data-placement="left" title="{{ $view_all_title }}" class="btn btn-primary btn-sm">{{ $view_all_title }}</a>
	</div>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="{{ route("courseclass.store") }}" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				@csrf
				<div class="box box-info">
					<div class="box-body">
                        <div class="form-group">
<label for="chapter_id" class="col-sm-2 control-label">Chapter_id <span style="color:red">*</span></label>
<div class="col-sm-8"><input type="number" class="form-control" name="chapter_id" value="{{ old("chapter_id") }}" placeholder="Enter chapter_id">
<span style="color: red">{{ $errors->first("chapter_id") }}</span></div></div><div class="form-group">
<label for="title" class="col-sm-2 control-label">Title <span style="color:red">*</span></label>
<div class="col-sm-8"><input type="text" class="form-control" name="title" value="{{ old("title") }}" placeholder="Enter title">
<span style="color: red">{{ $errors->first("title") }}</span></div></div><div class="form-group">
<label for="detail" class="col-sm-2 control-label">Detail</label>
<div class="col-sm-8"><textarea class="form-control" id="detail" name="detail" placeholder="Enter detail">{{ old("detail") }}</textarea>
<span style="color: red">{{ $errors->first("detail") }}</span></div></div><div class="form-group">
<label for="type" class="col-sm-2 control-label">Type <span style="color:red">*</span></label>
<div class="col-sm-8"><input type="text" class="form-control" name="type" value="{{ old("type") }}" placeholder="Enter type">
<span style="color: red">{{ $errors->first("type") }}</span></div></div><div class="form-group">
<label for="attachment" class="col-sm-2 control-label">Attachment</label>
<div class="col-sm-8"><input type="text" class="form-control" name="attachment" value="{{ old("attachment") }}" placeholder="Enter attachment">
<span style="color: red">{{ $errors->first("attachment") }}</span></div></div><div class="form-group">
<label for="is_featured" class="col-sm-2 control-label">Is_featured <span style="color:red">*</span></label>
<div class="col-sm-8"><select class="form-control" name="status"><option value="1" {{ old("status")==1?"selected":"" }}>Active</option><option value="0" {{ old("status")==0?"selected":"" }}>In Active</option></select><span style="color: red">{{ $errors->first("is_featured") }}</span></div></div><div class="form-group">
<label for="status" class="col-sm-2 control-label">Status <span style="color:red">*</span></label>
<div class="col-sm-8"><select class="form-control" name="status"><option value="1" {{ old("status")==1?"selected":"" }}>Active</option><option value="0" {{ old("status")==0?"selected":"" }}>In Active</option></select><span style="color: red">{{ $errors->first("status") }}</span></div></div><div class="form-group"><label for="status" class="col-sm-2 control-label"></label><div class="col-sm-8"><button type="submit" class="btn btn-success pull-left">Save</button></div></div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>

@endsection
@push('js')
@endpush
