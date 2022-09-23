@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
	<section class="content-header">
		<div class="content-header-left">
			<h1>{{ $page_title }}</h1>
		</div>
		<div class="content-header-right">
			<a href="{{ route('role.index') }}" class="btn btn-primary btn-sm">View All</a>
		</div>
	</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="{{ route('role.store') }}" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				@csrf

				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Role Name <span style="color: red">*</span></label>
							<div class="col-sm-9">
								<input type="text" class="form-control" value="{{ old('name') }}" name="name" placeholder="Enter role name">
								<span style="color: red">{{ $errors->first('name') }}</span>
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Short Description </label>
							<div class="col-sm-9">
								<textarea class="form-control" name="description" style="height:80px;" placeholder="Enter short description">{{ old('description') }}</textarea>
								<span style="color: red">{{ $errors->first('description') }}</span>
							</div>
						</div>
						{{-- <div class="form-group">
							<label for="" class="col-sm-2 control-label">Permission: <span style="color: red">*</span></label>
							<div class="col-sm-9">
								@foreach($permission as $value)
									<div class="col-sm-3">
										<label>
											{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }} {{ ucfirst($value->name) }}
										</label>
									</div>
								@endforeach
							</div>
						</div> --}}
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form1">Submit</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>

</section>

<script>
	$(document).ready(function() {
		$("#regform").validate({
			rules: {
				role_name: "required",
			}
		});
	});
</script>
@endsection
