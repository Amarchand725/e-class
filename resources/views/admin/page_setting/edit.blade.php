@extends('layouts.admin.app')
@section('content')

<section class="content-header">
	<div class="content-header-left">
		<h1>Add Page Setting of <strong>{{ $model->title }}</strong></h1>
	</div>
	<div class="content-header-right">
		<a href="{{ route('page.index') }}" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="{{ route('page_setting.store') }}" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				@csrf
				<div class="box box-info">
					<div class="box-body">
						<h3 class="sec_title">Meta Items</h3>
						<form action="{{ route('page.home_setting')}}" class="form-horizontal" method="post" accept-charset="utf-8">
							@csrf
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Title </label>
								<div class="col-sm-6">
									<input type="text" name="home['meta_items']['title']" class="form-control" value="">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Meta Keyword </label>
								<div class="col-sm-6">
									<textarea class="form-control" name="home['meta_items']['title']" style="height:60px;"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Meta Description </label>
								<div class="col-sm-6">
									<textarea class="form-control" name="meta_description" style="height:60px;"></textarea>
								</div>
							</div>
							<h3 class="sec_title">Banner Section</h3>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Banner Heading </label>
								<div class="col-sm-6">
									<input type="text" name="banner_heading" class="form-control" value="" placeholder="Enter banner heading">
								</div>
							</div>
							
							<fieldset>
								<legend>Top Section</legend>
								<div class="form-group">
									<label for="" class="col-sm-2 control-label">Heading  </label>
									<div class="col-sm-6">
										<input type="text" name="top_sec_heading" class="form-control" value="" placeholder="e.g Condidate">
									</div>
								</div>
								<div class="form-group">
									<label for="" class="col-sm-2 control-label">Title  </label>
									<div class="col-sm-6">
										<input type="text" name="top_sec_title" class="form-control" value="" placeholder="Enter title">
									</div>
								</div>
								<div class="form-group">
									<label for="" class="col-sm-2 control-label">Description  </label>
									<div class="col-sm-6">
										<textarea name="top_sec_description" id="" class="form-control" placeholder="Enter description here..."></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="" class="col-sm-2 control-label">Image  </label>
									<div class="col-sm-6">
										<input type="file" name="top_sec_image" class="form-control" value="">
									</div>
								</div>
							</fieldset>
							<fieldset>
								<legend>Middle Section</legend>
								<div class="form-group">
									<label for="" class="col-sm-2 control-label">Heading  </label>
									<div class="col-sm-6">
										<input type="text" name="middle_sec_heading" class="form-control" value="" placeholder="e.g Interviewer">
									</div>
								</div>
								<div class="form-group">
									<label for="" class="col-sm-2 control-label">Title  </label>
									<div class="col-sm-6">
										<input type="text" name="middle_sec_title" class="form-control" value="" placeholder="Enter title">
									</div>
								</div>
								<div class="form-group">
									<label for="" class="col-sm-2 control-label">Description  </label>
									<div class="col-sm-6">
										<textarea name="middle_sec_description" id="" class="form-control" placeholder="Enter description here..."></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="" class="col-sm-2 control-label">Image  </label>
									<div class="col-sm-6">
										<input type="file" name="middle_sec_image" class="form-control" value="">
									</div>
								</div>
							</fieldset>
							<fieldset>
								<legend>Bottom Section</legend>
								<div class="form-group">
									<label for="" class="col-sm-2 control-label">Heading  </label>
									<div class="col-sm-6">
										<input type="text" name="bottom_sec_heading" class="form-control" value="" placeholder="e.g Connect">
									</div>
								</div>
								<div class="form-group">
									<label for="" class="col-sm-2 control-label">Title  </label>
									<div class="col-sm-6">
										<input type="text" name="bottom_sec_title" class="form-control" value="" placeholder="Enter title">
									</div>
								</div>
								<div class="form-group">
									<label for="" class="col-sm-2 control-label">Description  </label>
									<div class="col-sm-6">
										<textarea name="bottom_sec_description" id="" class="form-control" placeholder="Enter description here..."></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="" class="col-sm-2 control-label">Image  </label>
									<div class="col-sm-6">
										<input type="file" name="bottom_sec_image" class="form-control" value="">
									</div>
								</div>
							</fieldset>
							
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Show on Home? </label>
								<div class="col-sm-2">
									<select name="home_service_status" class="form-control select2 select2-accessible" style="width:auto;" tabindex="-1" aria-hidden="true">
										<option>Show</option>
										<option>Hide</option>
									</select>
								</div>
							</div>

							<h3 class="sec_title">Why Choose Us Section</h3>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Title </label>
								<div class="col-sm-6">
									<input type="text" name="home_why_choose_title" class="form-control" value="">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">SubTitle </label>
								<div class="col-sm-6">
									<input type="text" name="home_why_choose_subtitle" class="form-control" value="">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Show on Home? </label>
								<div class="col-sm-2">
									<select name="home_why_choose_status" class="form-control select2 select2-accessible" style="width:auto;" tabindex="-1" aria-hidden="true">
										<option>Show</option>
										<option>Hide</option>
									</select>
								</div>
							</div>

							<h3 class="sec_title">Counter Information Section</h3>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Item 1 - Title </label>
								<div class="col-sm-2">
									<input type="text" name="counter_1_title" class="form-control" value="">
								</div>
								<label for="" class="col-sm-2 control-label">Item 1 - Value </label>
								<div class="col-sm-2">
									<input type="text" name="counter_1_value" class="form-control" value="">
								</div>
								<label for="" class="col-sm-2 control-label">Item 1 - Icon </label>
								<div class="col-sm-2">
									<input type="text" name="counter_1_icon" class="form-control" value="">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Item 2 - Title </label>
								<div class="col-sm-2">
									<input type="text" name="counter_2_title" class="form-control" value="">
								</div>
								<label for="" class="col-sm-2 control-label">Item 2 - Value </label>
								<div class="col-sm-2">
									<input type="text" name="counter_2_value" class="form-control" value="">
								</div>
								<label for="" class="col-sm-2 control-label">Item 2 - Icon </label>
								<div class="col-sm-2">
									<input type="text" name="counter_2_icon" class="form-control" value="">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Item 3 - Title </label>
								<div class="col-sm-2">
									<input type="text" name="counter_3_title" class="form-control" value="">
								</div>
								<label for="" class="col-sm-2 control-label">Item 3 - Value </label>
								<div class="col-sm-2">
									<input type="text" name="counter_3_value" class="form-control" value="">
								</div>
								<label for="" class="col-sm-2 control-label">Item 3 - Icon </label>
								<div class="col-sm-2">
									<input type="text" name="counter_3_icon" class="form-control" value="">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Item 4 - Title </label>
								<div class="col-sm-2">
									<input type="text" name="counter_4_title" class="form-control" value="">
								</div>
								<label for="" class="col-sm-2 control-label">Item 4 - Value </label>
								<div class="col-sm-2">
									<input type="text" name="counter_4_value" class="form-control" value="">
								</div>
								<label for="" class="col-sm-2 control-label">Item 4 - Icon </label>
								<div class="col-sm-2">
									<input type="text" name="counter_4_icon" class="form-control" value="">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Show on Home? </label>
								<div class="col-sm-2">
									<select name="counter_status" class="form-control select2 select2-accessible" style="width:auto;" tabindex="-1" aria-hidden="true">
										<option>Show</option>
										<option>Hide</option>
									</select>
								</div>
							</div>

							<h3 class="sec_title">Testimonial Section</h3>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Title </label>
								<div class="col-sm-6">
									<input type="text" name="home_testimonial_title" class="form-control" value="">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">SubTitle </label>
								<div class="col-sm-6">
									<input type="text" name="home_testimonial_subtitle" class="form-control" value="">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Show on Home? </label>
								<div class="col-sm-2">
									<select name="home_testimonial_status" class="form-control select2 select2-accessible" style="width:auto;" tabindex="-1" aria-hidden="true">
										<option>Show</option>
										<option>Hide</option>
									</select>
								</div>
							</div>

							<h3 class="sec_title">Pricing Table Section</h3>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Title </label>
								<div class="col-sm-6">
									<input type="text" name="home_ptable_title" class="form-control" value="">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">SubTitle </label>
								<div class="col-sm-6">
									<input type="text" name="home_ptable_subtitle" class="form-control" value="">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Show on Home? </label>
								<div class="col-sm-2">
									<select name="home_ptable_status" class="form-control select2 select2-accessible" style="width:auto;" tabindex="-1" aria-hidden="true">
										<option>Show</option>
										<option>Hide</option>
									</select>
								</div>
							</div>

							<h3 class="sec_title">Contact Section</h3>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Title </label>
								<div class="col-sm-6">
									<input type="text" name="home_blog_title" class="form-control" value="">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Description </label>
								<div class="col-sm-6">
									<textarea type="text" name="home_blog_subtitle" class="form-control editor_short" value=""></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Contact Title </label>
								<div class="col-sm-6">
									<input type="text" name="home_blog_item" class="form-control" value="">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Show on Home? </label>
								<div class="col-sm-2">
									<select name="home_blog_status" class="form-control select2 select2-accessible" style="width:auto;" tabindex="-1" aria-hidden="true">
										<option>Show</option>
										<option>Hide</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2"></label>
								<div class="col-sm-6">
									<button type="submit" class="btn btn-success pull-left" name="form_home_blog">Submit</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>

@endsection
@push('js')
<script>
	$(document).ready(function() {
		if ($(".texteditor").length > 0) {
			tinymce.init({
				selector: "textarea.texteditor",
				theme: "modern",
				height: 150,
				plugins: [
					"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
					"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
					"save table contextmenu directionality emoticons template paste textcolor"
				],
				toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

			});
		}
		$("#regform").validate({
			rules: {
				title: "required"
			}
		});
	});
</script>
@endpush