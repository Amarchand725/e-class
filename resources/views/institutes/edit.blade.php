@extends('layouts.admin.app')
@section('title', 'Edit Institute')
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
		<h1>Edit Institute</h1>
	</div>
	<div class="content-header-right">
		<a href="{{ route("institute.index") }}" data-toggle="tooltip" data-placement="left" title="{{ $view_all_title }}" class="btn btn-primary btn-sm">{{ $view_all_title }}</a>
	</div>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="{{ route("institute.update", $model->id) }}" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				@csrf
                {{ method_field('PATCH') }}
				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="logo" class="col-sm-2 control-label">Logo </label>
							<div class="col-sm-8">
								<input type="file" id="imgInput" class="form-control" name="logo" value="{{ old("logo") }}" placeholder="Enter logo">
								<span style="color: red">{{ $errors->first("logo") }}</span>
							</div>
						</div>

						@if($model->logo)
							<div class="form-group">
								<label for="image" class="col-sm-2 control-label">Exit Logo </label>
								<div class="col-sm-8">
									<img src="{{ asset('public/admin/images/institutes') }}/{{ $model->logo }}" id="preview"  width="100px" alt="">
								</div>
							</div>
						@else 
							<div class="form-group">
								<label for="image" class="col-sm-2 control-label">Preview </label>
								<div class="col-sm-8">
									<img src="{{ asset('public/default.png') }}" id="preview"  width="100px" alt="">
								</div>
							</div>
						@endif
							
						<div class="form-group">
							<label for="name" class="col-sm-2 control-label">Name <span style="color:red">*</span></label>
							<div class="col-sm-8"><input type="text" class="form-control" name="name" value="{{ $model->name }}" placeholder="Enter name">
							<span style="color: red">{{ $errors->first("name") }}</span></div></div><div class="form-group">
							<label for="email" class="col-sm-2 control-label">Email <span style="color:red">*</span></label>
							<div class="col-sm-8"><input type="text" class="form-control" name="email" value="{{ $model->email }}" placeholder="Enter email">
							<span style="color: red">{{ $errors->first("email") }}</span></div></div><div class="form-group">
							<label for="mobile" class="col-sm-2 control-label">Mobile <span style="color:red">*</span></label>
							<div class="col-sm-8"><input type="text" class="form-control" name="mobile" value="{{ $model->mobile }}" placeholder="Enter mobile">
							<span style="color: red">{{ $errors->first("mobile") }}</span></div></div>
							
							<div class="form-group">
								<label for="skills" class="col-sm-2 control-label">Skills</label>
								<div class="col-sm-8 input-group" style="margin-left:225px !important">
									@php $skill_tags = ''; @endphp
									@if($model->skill)
										@php $skills = json_decode($model->skill) @endphp 
										@foreach ($skills as $skill)
											@php $skill_tags .= $skill.',' @endphp
										@endforeach
									@endif
									<input type="text" class="form-control" name="skill[]" id="skills" value="{{ $skill_tags }}" data-role="tagsinput" placeholder="Write skill & enter">
									<span style="color: red">{{ $errors->first("skills") }}</span>
								</div>
							</div>
							
							<div class="form-group">
							<label for="address" class="col-sm-2 control-label">Address</label>
							<div class="col-sm-8"><textarea class="form-control" id="address" name="address">{{ $model->address }}</textarea>
							<span style="color: red">{{ $errors->first("address") }}</span></div></div>
							
							<div class="form-group">
							<label for="affilated_by" class="col-sm-2 control-label">Affilated_by</label>
							<div class="col-sm-8"><input type="text" class="form-control" name="affilated_by" value="{{ $model->affilated_by }}" placeholder="Enter affilated_by">
							<span style="color: red">{{ $errors->first("affilated_by") }}</span></div></div>
							
							<div class="form-group">
							<label for="about" class="col-sm-2 control-label">About <span style="color:red">*</span></label>
							<div class="col-sm-8"><textarea class="form-control ckeditor" id="about" name="about">{{ $model->about }}</textarea>
							<span style="color: red">{{ $errors->first("about") }}</span></div></div>
							
							<div class="form-group">
								<label for="is_verified" class="col-sm-2 control-label">Is_verified <span style="color:red">*</span></label>
								<div class="col-sm-8">
									<select class="form-control" name="is_verified">
										<option value="1" {{ $model->is_verified==1?"selected":"" }}>Active</option>
										<option value="0" {{ $model->is_verified==0?"selected":"" }}>In Active</option>
									</select>
									<span style="color: red">{{ $errors->first("is_verified") }}</span>
								</div>
							</div>
						
						<div class="form-group">
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
