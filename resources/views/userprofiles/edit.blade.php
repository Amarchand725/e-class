@extends('layouts.admin.app')
@section('title', 'Edit User')
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
		<h1>Edit User</h1>
	</div>
	<div class="content-header-right">
		<a href="{{ route("userprofile.index") }}" data-toggle="tooltip" data-placement="left" title="{{ $view_all_title }}" class="btn btn-primary btn-sm">{{ $view_all_title }}</a>
	</div>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="{{ route("userprofile.update", $model->id) }}" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				@csrf
                {{ method_field('PATCH') }}
				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="role_id" class="col-sm-2 control-label">Role <span style="color:red">*</span></label>
							<div class="col-sm-8">
								<select class="form-control" name="role_id" id="">
									<option value="" selected>Select role</option>
									@foreach ($roles as $role)
										<option value="{{ $role->id }}" {{ $model->roles->first()->id==$role->id?'selected':'' }}>{{ $role->name }}</option>
									@endforeach
								</select>
								<span style="color: red">{{ $errors->first("role_id") }}</span>
							</div>
						</div>

						<div class="form-group">
						<label for="first_name" class="col-sm-2 control-label">First_name</label>
						<div class="col-sm-8"><input type="text" class="form-control" name="first_name" value="{{ $model->hasUserProfile->first_name }}" placeholder="Enter first_name">
						<span style="color: red">{{ $errors->first("first_name") }}</span></div></div>
						
						<div class="form-group">
						<label for="last_name" class="col-sm-2 control-label">Last_name</label>
						<div class="col-sm-8"><input type="text" class="form-control" name="last_name" value="{{ $model->hasUserProfile->last_name }}" placeholder="Enter last_name">
						<span style="color: red">{{ $errors->first("last_name") }}</span></div></div>
						
						<div class="form-group">
						<label for="email" class="col-sm-2 control-label">Email <span style="color:red">*</span></label>
						<div class="col-sm-8"><input type="text" class="form-control" name="email" value="{{ $model->email }}" placeholder="Enter email">
						<span style="color: red">{{ $errors->first("email") }}</span></div></div>
						
						<div class="form-group">
						<label for="mobile" class="col-sm-2 control-label">Mobile</label>
						<div class="col-sm-8"><input type="text" class="form-control numberonly" name="mobile" value="{{ $model->hasUserProfile->mobile }}" placeholder="Enter mobile">
						<span style="color: red">{{ $errors->first("mobile") }}</span></div></div>
						
						<div class="form-group">
						<label for="password" class="col-sm-2 control-label">Password <span style="color:red">*</span></label>
						<div class="col-sm-8"><input type="text" class="form-control" name="password" value="" placeholder="Enter password">
						<span style="color: red">{{ $errors->first("password") }}</span></div></div>
						
						<div class="form-group">
						<label for="address" class="col-sm-2 control-label">Address</label>
						<div class="col-sm-8"><input type="text" class="form-control" name="address" value="{{ $model->hasUserProfile->address }}" placeholder="Enter address">
						<span style="color: red">{{ $errors->first("address") }}</span></div></div>
						
						<div class="form-group">
							<label for="country_id" class="col-sm-2 control-label">Country</label>
							<div class="col-sm-8">
								<select class="form-control" name="country_id" id="country">
									<option value="" selected>Select country</option>
									@foreach ($countries as $country)
										<option value="{{ $country->id }}" {{ $model->hasUserProfile->country_id==$country->id?'selected':'' }}>{{ $country->name }}</option>
									@endforeach
								</select>
							<span style="color: red">{{ $errors->first("country_id") }}</span></div></div>
							
							<div class="form-group">
							<label for="state_id" class="col-sm-2 control-label">State</label>
							<div class="col-sm-8">
								<select class="form-control" name="state_id" id="state_id">
									<option value="" selected>Select state</option>
									@foreach ($states as $state)
										<option value="{{ $state->id }}" {{ $model->hasUserProfile->state_id==$state->id?'selected':'' }}>{{ $state->name }}</option>
									@endforeach
								</select>
							<span style="color: red">{{ $errors->first("state_id") }}</span></div></div>
							
							<div class="form-group">
								<label for="city_id" class="col-sm-2 control-label">City</label>
								<div class="col-sm-8">
									<select class="form-control" name="city_id" id="city_id">
										<option value="" selected>Select city</option>
										@foreach ($cities as $city)
										<option value="{{ $city->id }}" {{ $model->hasUserProfile->city_id==$city->id?'selected':'' }}>{{ $city->name }}</option>
									@endforeach
									</select>
									<span style="color: red">{{ $errors->first("city_id") }}</span>
								</div>
							</div>
						
						<div class="form-group">
						<label for="facebook_url" class="col-sm-2 control-label">Facebook_url</label>
						<div class="col-sm-8"><textarea class="form-control" id="facebook_url" name="facebook_url">{{ $model->hasUserProfile->facebook_url }}</textarea>
						<span style="color: red">{{ $errors->first("facebook_url") }}</span></div></div>
						
						<div class="form-group">
						<label for="twitter_url" class="col-sm-2 control-label">Twitter_url</label>
						<div class="col-sm-8"><textarea class="form-control" id="twitter_url" name="twitter_url">{{ $model->hasUserProfile->twitter_url }}</textarea>
						<span style="color: red">{{ $errors->first("twitter_url") }}</span></div></div>
						
						<div class="form-group">
						<label for="youtube_url" class="col-sm-2 control-label">Youtube_url</label>
						<div class="col-sm-8"><textarea class="form-control" id="youtube_url" name="youtube_url">{{ $model->hasUserProfile->youtube_url }}</textarea>
						<span style="color: red">{{ $errors->first("youtube_url") }}</span></div></div>
						
						<div class="form-group">
						<label for="linked_in_url" class="col-sm-2 control-label">Linked_in_url</label>
						<div class="col-sm-8"><textarea class="form-control" id="linked_in_url" name="linked_in_url">{{ $model->hasUserProfile->linked_in_url }}</textarea>
						<span style="color: red">{{ $errors->first("linked_in_url") }}</span></div></div>
						
						<div class="form-group">
						<label for="details" class="col-sm-2 control-label">Details</label>
						<div class="col-sm-8"><textarea class="form-control ckeditor" id="details" name="details">{{ $model->hasUserProfile->details }}</textarea>
						<span style="color: red">{{ $errors->first("details") }}</span></div></div>

						<div class="form-group">
							<label for="profile_image" class="col-sm-2 control-label">Profile</label>
							<div class="col-sm-8"><input type="file" id="imgInput" accept="image/*" class="form-control" name="profile_image" value="{{ old("profile_image") }}" placeholder="Enter profile_image">
							<span style="color: red">{{ $errors->first("profile_image") }}</span></div>
						</div>
						@if($model->hasUserProfile->profile_image)
							<div class="form-group">
								<label for="image" class="col-sm-2 control-label">Exit Profile Image </label>
								<div class="col-sm-8">
									<img src="{{ asset('public/admin/images/profiles') }}/{{ $model->hasUserProfile->profile_image }}" id="preview"  width="100px" alt="">
								</div>
							</div>
						@else 
							<div class="form-group">
								<label for="image" class="col-sm-2 control-label">Preview </label>
								<div class="col-sm-8">
									<img src="{{ asset('public/default.png') }}" id="preview"  width="100px" alt="">
								</div>
							</div>
						@endif
						
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
							<label for="is_featured" class="col-sm-2 control-label">Featured</label>
							<div class="col-sm-8">
								<select class="form-control" name="is_featured">
									<option value="1" {{ $model->is_featured==1?"selected":"" }}>Active</option>
									<option value="0" {{ $model->is_featured==0?"selected":"" }}>In Active</option>
								</select>
								<span style="color: red">{{ $errors->first("is_featured") }}</span>
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
