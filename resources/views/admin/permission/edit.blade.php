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
							<label for="" class="col-sm-2 control-label">Name <span style="color: red">*</span></label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="guard_name" value="{{$permission->guard_name}}">
								<input type="hidden" name="permission" value="{{ $permission->permission }}">
								<span style="color: red">{{ $errors->first('guard_name') }}</span>
							</div>
						</div>
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
				name: "required",
				guard_name: "required",
			}
		});
	});
</script>

@endsection
