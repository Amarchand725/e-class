@extends('layouts.admin.app')
@section('title', 'Enroll New User')
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
		<h1>Enroll New User</h1>
	</div>
	<div class="content-header-right">
		<a href="{{ route("enrollstudent.index") }}" data-toggle="tooltip" data-placement="left" title="{{ $view_all_title }}" class="btn btn-primary btn-sm">{{ $view_all_title }}</a>
	</div>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="{{ route("enrollstudent.store") }}" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				@csrf
				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="user_slug" class="col-sm-2 control-label">User <span style="color:red">*</span></label>
							<div class="col-sm-8">
								<select name="user_slug" id="user_slug" class="form-control">
									<option value="" selected>Select User</option>
									@foreach ($users as $user)
										<option value="{{ $user->slug }}">{{ $user->name }}</option>
									@endforeach
								</select>
								<span style="color: red">{{ $errors->first("user_slug") }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="course_slug" class="col-sm-2 control-label">Courses</label>
							<div class="col-sm-8">
								<select name="products[]" id="course_slug" class="form-control"></select>
								<span style="color: red">{{ $errors->first("course_slug") }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="bundle_slug" class="col-sm-2 control-label">Bundles</label>
							<div class="col-sm-8">
								<select name="products[]" id="bundle_slug" class="form-control"></select>
								<span style="color: red">{{ $errors->first("bundle_slug") }}</span>
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
	<script>
		$(document).on('change', '#user_slug', function(){
			var user_slug = $(this).val();
			$.ajax({
				url : "{{ route('instructor.get-user-courses') }}",
				data : {'user_slug' : user_slug},
				type : 'GET',
				success : function(response){
					var html = '';
					jQuery.each(response.order_courses, function(index, course) {
						html += '<option value="course,'+course.order_number+','+course.slug+'">'+course.title+'</option>';
					});

					$('#course_slug').html(html);

					var html = '';
					jQuery.each(response.order_bundles, function(index, bundle) {
						html += '<option value="bundle,'+course.order_number+','+bundle.slug+'">'+bundle.title+'</option>';
					});

					$('#bundle_slug').html(html);
				}
			});
		})
	</script>
@endpush
