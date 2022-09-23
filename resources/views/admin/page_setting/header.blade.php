@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<section class="content-header">
	<div class="content-header-left">
		<h1><strong>{{ $page_title }}</strong></h1>
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
			<form action="{{ route('page_setting.store') }}" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				@csrf

				<input type="hidden" name="parent_slug" id="" value="{{ $model->slug }}">
				<div class="box box-info">
					<div class="box-body">
						@if(isset($page_data['header_logo']))
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Existing Logo</label>
								<div class="col-sm-9" style="padding-top:6px;">
									<img src="{{ asset('/public/admin/assets/images/page/'.$page_data['header_logo']) }}" class="existing-photo" style="height:50px;">
								</div>
							</div>
						@endif
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Logo </label>
							<div class="col-sm-9">
								<input type="file" name="header_logo" class="form-control">
							</div>
						</div>
						@if(isset($page_data['header_favicon']))
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Existing Favicon</label>
								<div class="col-sm-9" style="padding-top:6px;">
									<img src="{{ asset('/public/admin/assets/images/page/'.$page_data['header_favicon']) }}" class="existing-photo" style="height:50px;">
								</div>
							</div>
						@endif
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Favicon </label>
							<div class="col-sm-9">
								<input type="file" name="header_favicon" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Email </label>
							<div class="col-sm-9">
								<input type="email" name="header_email" class="form-control" value="{{ isset($page_data['header_email'])?$page_data['header_email']:'' }}" placeholder="Enter email address">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Phone </label>
							<div class="col-sm-9">
								<input type="text" name="header_phone" class="form-control" value="{{ isset($page_data['header_phone'])?$page_data['header_phone']:'' }}" placeholder="Enter phone no">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"><b><u>Weekdays</u></b></label>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Morning Slot </label>
							<div class="col-sm-5">
								<label for="">From</label>
								<input type="time" name="weekdays_morning_from_time" value="{{ isset($page_data['weekdays_morning_from_time'])?$page_data['weekdays_morning_from_time']:'' }}" class="form-control">
							</div>
							<div class="col-sm-5">
								<label for="">To</label>
								<input type="time" name="weekdays_morning_to_time" value="{{ isset($page_data['weekdays_morning_to_time'])?$page_data['weekdays_morning_to_time']:'' }}" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Evening Slot </label>
							<div class="col-sm-5">
								<label for="">From</label>
								<input type="time" name="weekdays_evening_from_time" value="{{ isset($page_data['weekdays_evening_from_time'])?$page_data['weekdays_evening_from_time']:'' }}" class="form-control">
							</div>
							<div class="col-sm-5">
								<label for="">To</label>
								<input type="time" name="weekdays_evening_to_time" value="{{ isset($page_data['weekdays_evening_to_time'])?$page_data['weekdays_evening_to_time']:'' }}" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"><b><u>Weekends</u></b></label>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Morning Slot </label>
							<div class="col-sm-5">
								<label for="">From</label>
								<input type="time" name="weekends_morning_from_time" value="{{ isset($page_data['weekends_morning_from_time'])?$page_data['weekends_morning_from_time']:'' }}" class="form-control">
							</div>
							<div class="col-sm-5">
								<label for="">To</label>
								<input type="time" name="weekends_morning_to_time" value="{{ isset($page_data['weekends_morning_to_time'])?$page_data['weekends_morning_to_time']:'' }}" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Evening Slot </label>
							<div class="col-sm-5">
								<label for="">From</label>
								<input type="time" name="weekends_evening_from_time" value="{{ isset($page_data['weekends_evening_from_time'])?$page_data['weekends_evening_from_time']:'' }}" class="form-control">
							</div>
							<div class="col-sm-5">
								<label for="">To</label>
								<input type="time" name="weekends_evening_to_time" value="{{ isset($page_data['weekends_evening_to_time'])?$page_data['weekends_evening_to_time']:'' }}" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form_blog">Submit</button>
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