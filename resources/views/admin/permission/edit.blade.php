@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')

<section class="content-header">
	<div class="content-header-left">
		<h1>Edit Permission</h1>
	</div>
	<div class="content-header-right">
		<a href="{{ route('permission.index') }}" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="{{ route('permission.update', $permission->id)}}" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				@csrf
				{{ method_field('PATCH') }}
				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Group Name <span style="color: red">*</span></label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="name" value="{{ Str::ucfirst($permission->name) }}">
								<span style="color: red">{{ $errors->first('name') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Sub Permissions</label>
							<div class="col-sm-4">
								@php $basic_permissions = ['all', 'create', 'edit', 'delete'] @endphp 
								@foreach ($basic_permissions as $basic_permission)
									@php $bool = true @endphp 
									@foreach ($permission->havePermissionUrls as $permission_url)
										@if($basic_permission==$permission_url->permission)
											@php $bool = false @endphp
											<div class="form-check">
												<input class="form-check-input" name="permissions[]" checked  type="checkbox" value="{{ $basic_permission }}" id="checkAll-{{ $basic_permission }}"/>
												<label class="form-check-label" for="checkAll-{{ $basic_permission }}"> <strong>{{ Str::ucfirst($basic_permission) }}</strong> </label>
											</div>
										@endif
									@endforeach

									@if($bool)
										<div class="form-check">
											<input class="form-check-input" name="permissions[]" type="checkbox" value="{{ $basic_permission }}" id="checkAll-{{ $basic_permission }}"/>
											<label class="form-check-label" for="checkAll-{{ $basic_permission }}"> <strong>{{ Str::ucfirst($basic_permission) }}</strong> </label>
										</div>
									@endif
								@endforeach
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left">Submit</button>
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
				name: "required",
				guard_name: "required",
			}
		});
	});
</script>

@endsection
