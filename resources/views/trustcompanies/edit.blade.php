@extends('layouts.admin.app')
@section('title', 'Edit TrustCompany')
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
		<h1>Edit TrustCompany</h1>
	</div>
	<div class="content-header-right">
		<a href="{{ route("trustcompany.index") }}" data-toggle="tooltip" data-placement="left" title="{{ $view_all_title }}" class="btn btn-primary btn-sm">{{ $view_all_title }}</a>
	</div>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="{{ route("trustcompany.update", $model->id) }}" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				@csrf
                {{ method_field('PATCH') }}
				<div class="box box-info">
					<div class="box-body">
                        <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name <span style="color:red">*</span></label>
                        <div class="col-sm-8"><input type="text" class="form-control" name="name" value="{{ $model->name }}" placeholder="Enter name">
                        <span style="color: red">{{ $errors->first("name") }}</span></div></div>

                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-8">
                                <textarea name="description" class="form-control" id="description" rows="10" placeholder="Enter description">{{ $model->description }}</textarea>
                                <span style="color: red">{{ $errors->first("description") }}</span>
                            </div>
                        </div>

                        @if($model->logo)
							<div class="form-group">
								<label for="image" class="col-sm-2 control-label">Exist Logo </label>
								<div class="col-sm-8">
                                    @if($model->logo)
                                        <img id="preview" src="{{ asset('public/admin/images/trust-companies') }}/{{ $model->logo }}" width="100px" alt="">
                                    @else
                                        <img id="preview" src="{{ asset('public/default.png') }}" width="100px" alt="">
                                    @endif
								</div>
							</div>
						@endif

                        <div class="form-group">
                            <label for="logo" class="col-sm-2 control-label">Logo</label>
                            <div class="col-sm-8">
                                <input type="file" accept="image/*" class="form-control" name="logo" id="imgInput">
                                <span style="color: red">{{ $errors->first("logo") }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="status" class="col-sm-2 control-label">Status <span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <select class="form-control" name="status">
                                    <option value="1" {{ $model->status==1?"selected":"" }}>Active</option>
                                    <option value="0" {{ $model->status==0?"selected":"" }}>In Active</option>
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
