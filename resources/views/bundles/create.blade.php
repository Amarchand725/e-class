@extends('layouts.admin.app')
@section('title', 'Add New Bundle')
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
		<h1>Add New Bundle</h1>
	</div>
	<div class="content-header-right">
		<a href="{{ route("bundle.index") }}" data-toggle="tooltip" data-placement="left" title="{{ $view_all_title }}" class="btn btn-primary btn-sm">{{ $view_all_title }}</a>
	</div>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="{{ route("bundle.store") }}" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				@csrf
				<div class="box box-info">
					<div class="box-body">
                        <div class="form-group">
							<label for="course_ids" class="col-sm-2 control-label">Courses <span style="color:red">*</span></label>
							<div class="col-sm-8">
								<select name="course_ids[]" multiple id="course_ids" class="form-control">
									<option value="" selected>Select courses</option>
									@foreach ($courses as $course)
										<option value="{{ $course->id }}">{{ $course->title }}</option>
									@endforeach
								</select>
								<span style="color: red">{{ $errors->first("course_ids") }}</span>
							</div>
						</div>
						
						<div class="form-group">
						<label for="title" class="col-sm-2 control-label">Title <span style="color:red">*</span></label>
						<div class="col-sm-8"><input type="text" class="form-control" name="title" value="{{ old("title") }}" placeholder="Enter title">
						<span style="color: red">{{ $errors->first("title") }}</span></div></div>
																		
						<div class="form-group">
							<label for="start_from" class="col-sm-2 control-label">Start_from <span style="color:red">*</span></label>
							<div class="col-sm-8">
								<input type="date" class="form-control" name="start_from" value="{{ old("start_from") }}" placeholder="Enter start_from">
								<span style="color: red">{{ $errors->first("start_from") }}</span>
							</div>
						</div>
						
						<div class="form-group">
						<label for="end_date" class="col-sm-2 control-label">End_date <span style="color:red">*</span></label>
						<div class="col-sm-8"><input type="date" class="form-control" name="end_date" value="{{ old("end_date") }}" placeholder="Enter end_date">
						<span style="color: red">{{ $errors->first("end_date") }}</span></div></div>
												
						<div class="form-group">
							<label for="short_detail" class="col-sm-2 control-label">Short Detail <span style="color:red">*</span></label>
							<div class="col-sm-8">
								<textarea class="form-control" id="short_detail" name="short_detail" rows="5" placeholder="Enter short_detail">{{ old("short_detail") }}</textarea>
								<span style="color: red">{{ $errors->first("short_detail") }}</span>
							</div>
						</div>
							
						<div class="form-group">
							<label for="details" class="col-sm-2 control-label">Details</label>
							<div class="col-sm-8">
								<textarea class="form-control ckeditor" id="details" name="details" placeholder="Enter details">{{ old("details") }}</textarea>
								<span style="color: red">{{ $errors->first("details") }}</span>
							</div>
						</div>
							
						<div class="form-group">
                            <label for="banner" class="col-sm-2 control-label">Banner <span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" id="imgInput" name="banner" accept="image/*">
                                <span style="color: red">{{ $errors->first("banner") }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="image" class="col-sm-2 control-label">Preview </label>
                            <div class="col-sm-8">
                                <img src="{{ asset('public/default.png') }}" id="preview"  width="100px" alt="">
                            </div>
                        </div>

						<div class="form-group">
                            <label for="is_paid" class="col-sm-2 control-label">Paid</label>
                            <div class="col-sm-8">
                                <div class="switch">
                                    <input id="paid" class="cmn-toggle cmn-toggle-round-flat" name="is_paid" value="1" type="checkbox">
                                    <label for="paid"></label>
                                </div>
                                <span style="color: red">{{ $errors->first("is_paid") }}</span>
                            </div>
                        </div>

                        <span id="if-paid" style="display: none">
                            <div class="form-group">
                                <label for="retail_price" class="col-sm-2 control-label">Retail Price</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control numberonly" readonly id="retail_price" name="retail_price" value="{{ old("retail_price") }}" placeholder="Enter retail_price">
                                    <span style="color: red">{{ $errors->first("retail_price") }}</span>
                                </div>
                            </div>
							<div class="form-group">
                                <label for="price" class="col-sm-2 control-label">Price</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control numberonly" name="price" value="{{ old("price") }}" placeholder="Enter price">
                                    <span style="color: red">{{ $errors->first("price") }}</span>
                                </div>
                            </div>
                        </span>

                        <div class="form-group">
                            <label for="is_featured" class="col-sm-2 control-label">Featured</label>
                            <div class="col-sm-8">
                                <div class="switch">
                                    <input id="featured" class="cmn-toggle cmn-toggle-round-flat" @if(old('is_featured')) checked @endif name="is_featured" value="1" type="checkbox">
                                    <label for="featured"></label>
                                </div>
                                <span style="color: red">{{ $errors->first("is_featured") }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="status" class="col-sm-2 control-label">Status</label>
                            <div class="col-sm-8">
                                <div class="switch">
                                    <input id="status" class="cmn-toggle cmn-toggle-round-flat" value="1" @if(old('status')) checked @endif name="status" type="checkbox">
                                    <label for="status"></label>
                                </div>
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
	<script>
		$(document).on('change', '#course_ids', function(){
			var course_ids = $(this).val();
			$.ajax({
				url : "{{ route('get_courses_price') }}",
				data : {'course_ids' : course_ids},
				type : 'GET',
				success : function(response){
					$('#retail_price').val(response);
				}
			});
		});
		$(document).on('click', '#paid', function(){
            if($('input[name="is_paid"]').is(':checked'))
            {
                $('#if-paid').css('display', 'block');
            }else
            {
                $('#if-paid').css('display', 'none');
            }
        });
	</script>
@endpush
