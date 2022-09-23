@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<section class="content-header">
	<div class="content-header-left">
		<h1>{{ $page_title }}</strong></h1>
	</div>
	<div class="content-header-right">
		<a href="{{ route('page.index') }}" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			@if (session('message'))
				<div class="callout callout-success">
					{{ session('message') }}
				</div>
			@endif
			
			<div class="box box-info">
				<div class="box-body">
					<h3 class="sec_title">Banner Section</h3>
					<form action="{{ route('page_setting.store') }}" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
						@csrf
						<input type="hidden" name="parent_slug" id="" value="{{ $model->slug }}">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Banner Heading </label>
							<div class="col-sm-6">
								<input type="text" name="banner_heading" class="form-control" value="{{ isset($page_data['banner_heading'])?$page_data['banner_heading']:'' }}" placeholder="Enter banner heading">
							</div>
						</div>
						@if(isset($page_data['banner_bg_image']))
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Existing Image</label>
								<div class="col-sm-6" style="padding-top:6px;">
									<img src="{{ asset('/public/admin/assets/images/page/'.$page_data['banner_bg_image']) }}" class="existing-photo" style="height:180px;">
								</div>
							</div>
						@endif
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Background Image </label>
							<div class="col-sm-6">
								<input type="file" name="banner_bg_image" class="form-control">
							</div>
						</div>
						
						<fieldset>
							<legend>Top Section</legend>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Heading  </label>
								<div class="col-sm-6">
									<input type="text" name="top_sec_heading" class="form-control" value="{{ isset($page_data['top_sec_heading'])?$page_data['top_sec_heading']:'' }}" placeholder="e.g Condidate">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Title  </label>
								<div class="col-sm-6">
									<input type="text" name="top_sec_title" class="form-control" value="{{ isset($page_data['top_sec_title'])?$page_data['top_sec_title']:'' }}" placeholder="Enter title">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Description  </label>
								<div class="col-sm-6">
									<textarea name="top_sec_description" id="" class="form-control" placeholder="Enter description here...">{{ isset($page_data['top_sec_description'])?$page_data['top_sec_description']:'' }}</textarea>
								</div>
							</div>
							@if(isset($page_data['top_sec_image']))
								<div class="form-group">
									<label for="" class="col-sm-2 control-label">Existing Image</label>
									<div class="col-sm-6" style="padding-top:6px;">
										<img src="{{ asset('/public/admin/assets/images/page/'.$page_data['top_sec_image']) }}" class="existing-photo" style="height:180px;">
									</div>
								</div>
							@endif
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Image  </label>
								<div class="col-sm-6">
									<input type="file" name="top_sec_image" class="form-control" value="{{ isset($page_data['home_why_choose_title'])?$page_data['home_why_choose_title']:'' }}">
								</div>
							</div>
						</fieldset>
						<fieldset>
							<legend>Middle Section</legend>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Heading  </label>
								<div class="col-sm-6">
									<input type="text" name="middle_sec_heading" class="form-control" value="{{ isset($page_data['middle_sec_heading'])?$page_data['middle_sec_heading']:'' }}" placeholder="e.g Interviewer">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Title  </label>
								<div class="col-sm-6">
									<input type="text" name="middle_sec_title" class="form-control" value="{{ isset($page_data['middle_sec_title'])?$page_data['middle_sec_title']:'' }}" placeholder="Enter title">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Description  </label>
								<div class="col-sm-6">
									<textarea name="middle_sec_description" id="" class="form-control" placeholder="Enter description here...">{{ isset($page_data['middle_sec_description'])?$page_data['middle_sec_description']:'' }}</textarea>
								</div>
							</div>
							@if(isset($page_data['middle_sec_image']))
								<div class="form-group">
									<label for="" class="col-sm-2 control-label">Existing Image</label>
									<div class="col-sm-6" style="padding-top:6px;">
										<img src="{{ asset('/public/admin/assets/images/page/'.$page_data['middle_sec_image']) }}" class="existing-photo" style="height:180px;">
									</div>
								</div>
							@endif
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Image  </label>
								<div class="col-sm-6">
									<input type="file" name="middle_sec_image" class="form-control" value="{{ isset($page_data['home_why_choose_title'])?$page_data['home_why_choose_title']:'' }}">
								</div>
							</div>
						</fieldset>
						<fieldset>
							<legend>Bottom Section</legend>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Heading  </label>
								<div class="col-sm-6">
									<input type="text" name="bottom_sec_heading" class="form-control" value="{{ isset($page_data['bottom_sec_heading'])?$page_data['bottom_sec_heading']:'' }}" placeholder="e.g Connect">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Title  </label>
								<div class="col-sm-6">
									<input type="text" name="bottom_sec_title" class="form-control" value="{{ isset($page_data['bottom_sec_title'])?$page_data['bottom_sec_title']:'' }}" placeholder="Enter title">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Description  </label>
								<div class="col-sm-6">
									<textarea name="bottom_sec_description" id="" class="form-control" placeholder="Enter description here...">{{ isset($page_data['bottom_sec_description'])?$page_data['bottom_sec_description']:'' }}</textarea>
								</div>
							</div>
							@if(isset($page_data['bottom_sec_image']))
								<div class="form-group">
									<label for="" class="col-sm-2 control-label">Existing Image</label>
									<div class="col-sm-6" style="padding-top:6px;">
										<img src="{{ asset('/public/admin/assets/images/page/'.$page_data['bottom_sec_image']) }}" class="existing-photo" style="height:180px;">
									</div>
								</div>
							@endif
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Image  </label>
								<div class="col-sm-6">
									<input type="file" name="bottom_sec_image" class="form-control" value="{{ isset($page_data['home_why_choose_title'])?$page_data['home_why_choose_title']:'' }}">
								</div>
							</div>
						</fieldset>
						
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Show on Home? </label>
							<div class="col-sm-2">
								<select name="home_banner_status" class="form-control select2 select2-accessible" style="width:auto;" tabindex="-1" aria-hidden="true">
									<option value="1" {{ (isset($page_data['home_banner_status'])?($page_data['home_banner_status']==1?'selected':''):'') }}>Show</option>
									<option value="0" {{ (isset($page_data['home_banner_status'])?($page_data['home_banner_status']==0?'selected':''):'') }}>Hide</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form_home_blog">Submit</button>
							</div>
						</div>
					</form>

					<h3 class="sec_title">Testimonial Section</h3>
					<form action="{{ route('page_setting.store') }}" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
						@csrf
						<input type="hidden" name="parent_slug" id="" value="{{ $model->slug }}">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Title </label>
							<div class="col-sm-6">
								<input type="text" name="home_testimonial_title" class="form-control" value="{{ isset($page_data['home_testimonial_title'])?$page_data['home_testimonial_title']:'' }}" placeholder="Enter title">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">SubTitle </label>
							<div class="col-sm-6">
								<input type="text" name="home_testimonial_subtitle" class="form-control" value="{{ isset($page_data['home_testimonial_subtitle'])?$page_data['home_testimonial_subtitle']:'' }}" placeholder="Enter sub title">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Show on Home? </label>
							<div class="col-sm-2">
								<select name="home_testimonial_status" class="form-control select2 select2-accessible" style="width:auto;" tabindex="-1" aria-hidden="true">
									<option value="1" {{ (isset($page_data['home_testimonial_status'])?($page_data['home_testimonial_status']==1?'selected':''):'') }}>Show</option>
									<option value="0" {{ (isset($page_data['home_testimonial_status'])?($page_data['home_testimonial_status']==0?'selected':''):'') }}>Hide</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form_home_blog">Submit</button>
							</div>
						</div>
					</form>

					<h3 class="sec_title">Contact Section</h3>
					<form action="{{ route('page_setting.store') }}" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
						@csrf
						<input type="hidden" name="parent_slug" id="" value="{{ $model->slug }}">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Title </label>
							<div class="col-sm-6">
								<input type="text" name="home_contact_title" class="form-control" value="{{ isset($page_data['home_contact_title'])?$page_data['home_contact_title']:'' }}" placeholder="Enter title">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Description </label>
							<div class="col-sm-6">
								<textarea type="text" name="home_contact_description" class="form-control editor_short" placeholder="Enter description">{{ isset($page_data['home_contact_description'])?$page_data['home_contact_description']:'' }}</textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Show on Home? </label>
							<div class="col-sm-2">
								<select name="home_contact_status" class="form-control select2 select2-accessible" style="width:auto;" tabindex="-1" aria-hidden="true">
									<option value="1" {{ (isset($page_data['home_contact_status'])?($page_data['home_contact_status']==1?'selected':''):'') }}>Show</option>
									<option value="0" {{ (isset($page_data['home_contact_status'])?($page_data['home_contact_status']==0?'selected':''):'') }}>Hide</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form_home_blog">Submit</button>
							</div>
						</div>
					</form>

					<h3 class="sec_title">Mock Advantage Section</h3>
					<form action="{{ route('page_setting.store') }}" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
						@csrf
						<input type="hidden" name="parent_slug" id="" value="{{ $model->slug }}">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Title </label>
							<div class="col-sm-6">
								<input type="text" name="home_mock_advantage_title" class="form-control" value="{{ isset($page_data['home_mock_advantage_title'])?$page_data['home_mock_advantage_title']:'' }}" placeholder="Enter title">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">SubTitle </label>
							<div class="col-sm-6">
								<input type="text" name="home_mock_advantage_subtitle" class="form-control" value="{{ isset($page_data['home_mock_advantage_subtitle'])?$page_data['home_mock_advantage_subtitle']:'' }}" placeholder="Enter sub title">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Show on Home? </label>
							<div class="col-sm-2">
								<select name="home_mock_advantage_status" class="form-control select2 select2-accessible" style="width:auto;" tabindex="-1" aria-hidden="true">
									<option value="1" {{ (isset($page_data['home_mock_advantage_status'])?($page_data['home_mock_advantage_status']==1?'selected':''):'') }}>Show</option>
									<option value="0" {{ (isset($page_data['home_mock_advantage_status'])?($page_data['home_mock_advantage_status']==0?'selected':''):'') }}>Hide</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form_home_blog">Submit</button>
							</div>
						</div>
					</form>

					<h3 class="sec_title">Mock Advantage Bottom Counter Section</h3>
					<form action="{{ route('page_setting.store') }}" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
						@csrf
						<input type="hidden" name="parent_slug" id="" value="{{ $model->slug }}">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">First Label </label>
							<div class="col-sm-6">
								<input type="text" name="home_mock_advantage_bottom_first_label" class="form-control" value="{{ isset($page_data['home_mock_advantage_bottom_first_label'])?$page_data['home_mock_advantage_bottom_first_label']:'' }}" placeholder="Enter Label">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">First Counter </label>
							<div class="col-sm-6">
								<input type="text" name="home_mock_advantage_bottom_first_counter" class="form-control" value="{{ isset($page_data['home_mock_advantage_bottom_first_counter'])?$page_data['home_mock_advantage_bottom_first_counter']:'' }}" placeholder="Enter Counter">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Second Label </label>
							<div class="col-sm-6">
								<input type="text" name="home_mock_advantage_bottom_second_label" class="form-control" value="{{ isset($page_data['home_mock_advantage_bottom_second_label'])?$page_data['home_mock_advantage_bottom_second_label']:'' }}" placeholder="Enter Label">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Second Counter </label>
							<div class="col-sm-6">
								<input type="text" name="home_mock_advantage_bottom_second_counter" class="form-control" value="{{ isset($page_data['home_mock_advantage_bottom_second_counter'])?$page_data['home_mock_advantage_bottom_second_counter']:'' }}" placeholder="Enter counter">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Third Label </label>
							<div class="col-sm-6">
								<input type="text" name="home_mock_advantage_bottom_third_label" class="form-control" value="{{ isset($page_data['home_mock_advantage_bottom_third_label'])?$page_data['home_mock_advantage_bottom_third_label']:'' }}" placeholder="Enter Label">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Third Counter </label>
							<div class="col-sm-6">
								<input type="text" name="home_mock_advantage_bottom_third_counter" class="form-control" value="{{ isset($page_data['home_mock_advantage_bottom_third_counter'])?$page_data['home_mock_advantage_bottom_third_counter']:'' }}" placeholder="Enter Counter">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Fourth Label </label>
							<div class="col-sm-6">
								<input type="text" name="home_mock_advantage_bottom_fourth_label" class="form-control" value="{{ isset($page_data['home_mock_advantage_bottom_fourth_label'])?$page_data['home_mock_advantage_bottom_fourth_label']:'' }}" placeholder="Enter Label">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Fourth Counter </label>
							<div class="col-sm-6">
								<input type="text" name="home_mock_advantage_bottom_fourth_counter" class="form-control" value="{{ isset($page_data['home_mock_advantage_bottom_fourth_counter'])?$page_data['home_mock_advantage_bottom_fourth_counter']:'' }}" placeholder="Enter Counter">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Show on Home? </label>
							<div class="col-sm-2">
								<select name="home_mock_advantage_counter_status" class="form-control select2 select2-accessible" style="width:auto;" tabindex="-1" aria-hidden="true">
									<option value="1" {{ (isset($page_data['home_mock_advantage_counter_status'])?($page_data['home_mock_advantage_counter_status']==1?'selected':''):'') }}>Show</option>
									<option value="0" {{ (isset($page_data['home_mock_advantage_counter_status'])?($page_data['home_mock_advantage_counter_status']==0?'selected':''):'') }}>Hide</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form_home_blog">Submit</button>
							</div>
						</div>
					</form>

					<h3 class="sec_title">Sign Up Section</h3>
					<form action="{{ route('page_setting.store') }}" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
						@csrf
						<input type="hidden" name="parent_slug" id="" value="{{ $model->slug }}">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Title </label>
							<div class="col-sm-6">
								<input type="text" name="home_signup_title" class="form-control" value="{{ isset($page_data['home_signup_title'])?$page_data['home_signup_title']:'' }}" placeholder="Enter sign up title">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Description </label>
							<div class="col-sm-6">
								<textarea name="home_signup_description" id="" class="form-control" placeholder="Enter sign up description">{{ isset($page_data['home_signup_description'])?$page_data['home_signup_description']:'' }}</textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Button Label </label>
							<div class="col-sm-6">
								<input type="text" name="home_signup_btn_label" class="form-control" value="{{ isset($page_data['home_signup_btn_label'])?$page_data['home_signup_btn_label']:'' }}" placeholder="Enter sign up button label">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Show on Home? </label>
							<div class="col-sm-2">
								<select name="home_signup_status" class="form-control select2 select2-accessible" style="width:auto;" tabindex="-1" aria-hidden="true">
									<option value="1" {{ (isset($page_data['home_signup_status'])?($page_data['home_signup_status']==1?'selected':''):'') }}>Show</option>
									<option value="0" {{ (isset($page_data['home_signup_status'])?($page_data['home_signup_status']==0?'selected':''):'') }}>Hide</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form_home_blog">Submit</button>
							</div>
						</div>
					</form>

					<h3 class="sec_title">Real People Section</h3>
					<form action="{{ route('page_setting.store') }}" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
						@csrf
						<input type="hidden" name="parent_slug" id="" value="{{ $model->slug }}">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Title </label>
							<div class="col-sm-6">
								<input type="text" name="home_real_title" class="form-control" value="{{ isset($page_data['home_real_title'])?$page_data['home_real_title']:'' }}" placeholder="Enter title">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Description </label>
							<div class="col-sm-6">
								<textarea name="home_real_description" id="" class="form-control" placeholder="Enter description">{{ isset($page_data['home_real_description'])?$page_data['home_real_description']:'' }}</textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Show on Home? </label>
							<div class="col-sm-2">
								<select name="home_real_status" class="form-control select2 select2-accessible" style="width:auto;" tabindex="-1" aria-hidden="true">
									<option value="1" {{ (isset($page_data['home_real_status'])?($page_data['home_real_status']==1?'selected':''):'') }}>Show</option>
									<option value="0" {{ (isset($page_data['home_real_status'])?($page_data['home_real_status']==0?'selected':''):'') }}>Hide</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form_home_blog">Submit</button>
							</div>
						</div>
					</form>

					<h3 class="sec_title">How Does Work Section</h3>
					<form action="{{ route('page_setting.store') }}" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
						@csrf
						<input type="hidden" name="parent_slug" id="" value="{{ $model->slug }}">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Title </label>
							<div class="col-sm-6">
								<input type="text" name="home_how_title" class="form-control" value="{{ isset($page_data['home_how_title'])?$page_data['home_how_title']:'' }}" placeholder="Enter title">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Description </label>
							<div class="col-sm-6">
								<textarea name="home_how_description" id="" class="form-control" placeholder="Enter description">{{ isset($page_data['home_how_description'])?$page_data['home_how_description']:'' }}</textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Show on Home? </label>
							<div class="col-sm-2">
								<select name="home_how_status" class="form-control select2 select2-accessible" style="width:auto;" tabindex="-1" aria-hidden="true">
									<option value="1" {{ (isset($page_data['home_how_status'])?($page_data['home_how_status']==1?'selected':''):'') }}>Show</option>
									<option value="0" {{ (isset($page_data['home_how_status'])?($page_data['home_how_status']==0?'selected':''):'') }}>Hide</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form_home_blog">Submit</button>
							</div>
						</div>
					</form>

					<h3 class="sec_title">Pricing Section</h3>
					<form action="{{ route('page_setting.store') }}" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
						@csrf
						<input type="hidden" name="parent_slug" id="" value="{{ $model->slug }}">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Title </label>
							<div class="col-sm-6">
								<input type="text" name="home_pricing_title" class="form-control" value="{{ isset($page_data['home_pricing_title'])?$page_data['home_pricing_title']:'' }}" placeholder="Enter title">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Description </label>
							<div class="col-sm-6">
								<textarea name="home_pricing_description" id="" class="form-control" placeholder="Enter description">{{ isset($page_data['home_pricing_description'])?$page_data['home_pricing_description']:'' }}</textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Show on Home? </label>
							<div class="col-sm-2">
								<select name="home_pricing_status" class="form-control select2 select2-accessible" style="width:auto;" tabindex="-1" aria-hidden="true">
									<option value="1" {{ (isset($page_data['home_pricing_status'])?($page_data['home_pricing_status']==1?'selected':''):'') }}>Show</option>
									<option value="0" {{ (isset($page_data['home_pricing_status'])?($page_data['home_pricing_status']==0?'selected':''):'') }}>Hide</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form_home_blog">Submit</button>
							</div>
						</div>
					</form>
					
					<h3 class="sec_title">Team Section</h3>
					<form action="{{ route('page_setting.store') }}" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
						@csrf
						<input type="hidden" name="parent_slug" id="" value="{{ $model->slug }}">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Title </label>
							<div class="col-sm-6">
								<input type="text" name="home_team_title" class="form-control" value="{{ isset($page_data['home_team_title'])?$page_data['home_team_title']:'' }}" placeholder="Enter title">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Description </label>
							<div class="col-sm-6">
								<textarea name="home_team_description" id="" class="form-control" placeholder="Enter description">{{ isset($page_data['home_team_description'])?$page_data['home_team_description']:'' }}</textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Show on Home? </label>
							<div class="col-sm-2">
								<select name="home_team_status" class="form-control select2 select2-accessible" style="width:auto;" tabindex="-1" aria-hidden="true">
									<option value="1" {{ (isset($page_data['home_team_status'])?($page_data['home_team_status']==1?'selected':''):'') }}>Show</option>
									<option value="0" {{ (isset($page_data['home_team_status'])?($page_data['home_team_status']==0?'selected':''):'') }}>Hide</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form_home_blog">Submit</button>
							</div>
						</div>
					</form>

					<h3 class="sec_title">Help Section</h3>
					<form action="{{ route('page_setting.store') }}" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
						@csrf
						<input type="hidden" name="parent_slug" id="" value="{{ $model->slug }}">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Title </label>
							<div class="col-sm-6">
								<input type="text" name="home_help_title" class="form-control" value="{{ isset($page_data['home_help_title'])?$page_data['home_help_title']:'' }}" placeholder="Enter title">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Description </label>
							<div class="col-sm-6">
								<textarea name="home_help_description" id="" class="form-control" placeholder="Enter description">{{ isset($page_data['home_help_description'])?$page_data['home_help_description']:'' }}</textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Show on Home? </label>
							<div class="col-sm-2">
								<select name="home_help_status" class="form-control select2 select2-accessible" style="width:auto;" tabindex="-1" aria-hidden="true">
									<option value="1" {{ (isset($page_data['home_help_status'])?($page_data['home_help_status']==1?'selected':''):'') }}>Show</option>
									<option value="0" {{ (isset($page_data['home_help_status'])?($page_data['home_help_status']==0?'selected':''):'') }}>Hide</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form_home_blog">Submit</button>
							</div>
						</div>
					</form>

					<h3 class="sec_title">Tips Section</h3>
					<form action="{{ route('page_setting.store') }}" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
						@csrf
						<input type="hidden" name="parent_slug" id="" value="{{ $model->slug }}">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Title </label>
							<div class="col-sm-6">
								<input type="text" name="home_tips_title" class="form-control" value="{{ isset($page_data['home_tips_title'])?$page_data['home_tips_title']:'' }}" placeholder="Enter title">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Description </label>
							<div class="col-sm-6">
								<textarea name="home_tips_description" id="" class="form-control" placeholder="Enter description">{{ isset($page_data['home_tips_description'])?$page_data['home_tips_description']:'' }}</textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Show on Home? </label>
							<div class="col-sm-2">
								<select name="home_tips_status" class="form-control select2 select2-accessible" style="width:auto;" tabindex="-1" aria-hidden="true">
									<option value="1" {{ (isset($page_data['home_tips_status'])?($page_data['home_tips_status']==1?'selected':''):'') }}>Show</option>
									<option value="0" {{ (isset($page_data['home_tips_status'])?($page_data['home_tips_status']==0?'selected':''):'') }}>Hide</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form_home_blog">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
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