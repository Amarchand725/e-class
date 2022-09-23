@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')

<section class="content-header">
	<div class="content-header-left">
		<h1>Add Permission</h1>
	</div>
	<div class="content-header-right">
		<a href="{{ route('permission.index') }}" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="{{ route('permission.store')}}" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				@csrf
				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Group Name <span style="color:red">*</span></label>
							<div class="col-sm-6">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter permission group name e.g User">
								<span style="color: red">{{ $errors->first('name') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Sub Permissions</label>
							<div class="col-sm-4">
								<!-- Default checkbox -->
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="all" id="checkAll"/>
									<label class="form-check-label" for="checkAll"> <strong>All</strong> </label>
								</div>

								<!-- Default checkbox -->
								<div class="form-check">
									<input class="form-check-input" name="permissions[]" type="checkbox" value="list" id="list" checked/>
									<label class="form-check-label" for="list"> <strong>List</strong></label>
								</div>

								<!-- Checked checkbox -->
								<div class="form-check">
									<input class="form-check-input" name="permissions[]" type="checkbox" value="create" id="create"/>
									<label class="form-check-label" for="create"> <strong>Create</strong></label>
								</div>

								<!-- Checked checkbox -->
								<div class="form-check">
									<input class="form-check-input" name="permissions[]" type="checkbox" value="edit" id="edit"/>
									<label class="form-check-label" for="edit"> <strong>Edit</strong></label>
								</div>

								<!-- Checked checkbox -->
								<div class="form-check">
									<input class="form-check-input" name="permissions[]" type="checkbox" value="delete" id="delete"/>
									<label class="form-check-label" for="delete"> <strong>Delete</strong></label>
								</div>
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

@endsection
@push('js')
<script>
	$("#checkAll").click(function () {
		$('input:checkbox').not(this).prop('checked', this.checked);
	});
	$(document).ready(function() {
		$("#regform").validate({
			rules: {
				name: "required",
			}
		});
	});
</script>

@endpush
