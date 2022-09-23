@extends('layouts.admin.app')
@section('content')

<section class="content-header">
	<div class="content-header-left">
		<h1>Show Service Details</h1>
	</div>
	<div class="content-header-right">
		<a href="{{ route('service.index') }}" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<table class="table bordered">
					<tr>
						<th>Image</th>
						<td>
							@if($service->image)
								<img src="{{ asset('public/admin/assets/images/services') }}/{{ $service->image }}" alt="Slider Image" height="400px" width="500px">
							@else 
								<img src="{{ asset('public/admin/assets/images/services/no-photo1.jpg') }}" alt="Slider Image" height="400px" width="500px">
							@endif
						</td>
					</tr>
					<tr>
						<th>Name</th>
						<td><span class="badge badge-success">{{ $service->name }}</span></td>
					</tr>
					<tr>
						<th>Short Description</th>
						<td>{!! $service->short_description !!}</td>
					</tr>
					<tr>
						<th>Full Description</th>
						<td>{!! $service->description !!}</td>
					</tr>
					<tr>
						<th>Status</th>
						<td>
							@if($service->status)
								<span class="badge badge-success">Active</span>
							@else 
								<span class="badge badge-danger">In-Active</span>
							@endif
						</td>
					</tr>
					<tr>
						<th>Date</th>
						<td>
							<span class="badge badge-success">{{ date('d, F-Y H:i:s A', strtotime($service->created_at)) }}</span>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</section>

<script>
	$(document).ready(function() {
		$('.editor_short').summernote({
			height: 150
		});
	});
</script>
@endsection