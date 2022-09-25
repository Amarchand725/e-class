@extends('layouts.admin.app')
@section('title', 'Edit Fact')
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
		<h1>Edit Fact</h1>
	</div>
	<div class="content-header-right">
		<a href="{{ route("fact.index") }}" data-toggle="tooltip" data-placement="left" title="{{ $view_all_title }}" class="btn btn-primary btn-sm">{{ $view_all_title }}</a>
	</div>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="{{ route("fact.update", $model->id) }}" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				@csrf
                {{ method_field('PATCH') }}
				<div class="box box-info">
					<div class="box-body">
                        <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Title <span style="color:red">*</span></label>
                        <div class="col-sm-8"><input type="text" class="form-control" name="title" value="{{ $model->title }}" placeholder="Enter title">
                        <span style="color: red">{{ $errors->first("title") }}</span></div></div><div class="form-group">
                        <label for="counter" class="col-sm-2 control-label">Counter</label>
                        <div class="col-sm-8"><input type="number" class="form-control" name="counter" value="{{ $model->counter }}" placeholder="Enter counter">
                        <span style="color: red">{{ $errors->first("counter") }}</span></div></div><div class="form-group">
                        <label for="description" class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-8"><textarea class="form-control" id="description" name="description">{{ $model->description }}</textarea>
                        <span style="color: red">{{ $errors->first("description") }}</span></div></div>

                        @if($model->image)
							<div class="form-group">
								<label for="image" class="col-sm-2 control-label">Exist Image </label>
								<div class="col-sm-8">
									<img style="background:#e5444a" src="{{ asset('public/admin/images/facts') }}/{{ $model->image }}" width="100px" alt="">
								</div>
							</div>
						@endif
						<div class="form-group">
							<label for="image" class="col-sm-2 control-label">Image @if(!$model->image) <span style="color:red">*</span>@endif</label>
							<div class="col-sm-8">
								<input type="file" class="form-control" name="image">
								<span style="color: red">{{ $errors->first("image") }}</span>
							</div>
						</div>

                        <div class="form-group">
                        <label for="status" class="col-sm-2 control-label">Status <span style="color:red">*</span></label>
                        <div class="col-sm-8"><select class="form-control" name="status"><option value="1" {{ $model->status==1?"selected":"" }}>Active</option><option value="0" {{ $model->status==0?"selected":"" }}>In Active</option></select><span style="color: red">{{ $errors->first("status") }}</span></div></div><label for="" class="col-sm-2 control-label"></label>
                        <div class="col-sm-6"><button type="submit" class="btn btn-success pull-left">Save</button></div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>

@endsection
@push('js')
@endpush
