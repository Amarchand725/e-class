@extends('layouts.admin.app')
@section('title', 'Add New City')
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
		<h1>Add New City</h1>
	</div>
	<div class="content-header-right">
		<a href="{{ route("city.index") }}" data-toggle="tooltip" data-placement="left" title="{{ $view_all_title }}" class="btn btn-primary btn-sm">{{ $view_all_title }}</a>
	</div>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="{{ route("city.store") }}" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				@csrf
				<div class="box box-info">
					<div class="box-body">
                        <div class="form-group">
							<label for="country_id" class="col-sm-2 control-label">Counry <span style="color:red">*</span></label>
							<div class="col-sm-8">
								<select class="form-control" name="country_id" id="country">
									<option value="" selected>Select county</option>
									@foreach ($countries as $country)
										<option value="{{ $country->id }}">{{ $country->name }}</option>
									@endforeach
								</select>
								<span style="color: red">{{ $errors->first("country_id") }}</span>
							</div>
						</div>

						<div class="form-group">
							<label for="state_id" class="col-sm-2 control-label">State <span style="color:red">*</span></label>
							<div class="col-sm-8">
								<select class="form-control" name="state_id" id="state_id">
									<option value="" selected>Select state</option>
								</select>
								<span style="color: red">{{ $errors->first("state_id") }}</span>
							</div>
						</div>
						
						<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Name <span style="color:red">*</span></label>
						<div class="col-sm-8"><input type="text" class="form-control" name="name" value="{{ old("name") }}" placeholder="Enter name">
						<span style="color: red">{{ $errors->first("name") }}</span></div></div><div class="form-group">
						<label for="status" class="col-sm-2 control-label">Status <span style="color:red">*</span></label>
						<div class="col-sm-8"><select class="form-control" name="status"><option value="1" {{ old("status")==1?"selected":"" }}>Active</option><option value="0" {{ old("status")==0?"selected":"" }}>In Active</option></select><span style="color: red">{{ $errors->first("status") }}</span></div></div><div class="form-group"><label for="status" class="col-sm-2 control-label"></label><div class="col-sm-8"><button type="submit" class="btn btn-success pull-left">Save</button></div></div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>

@endsection
@push('js')
	<script>
		$(document).on('change', '#country', function(){
			var country_id = $(this).val();
			$.ajax({
				url : "{{ route('admin.get_states') }}",
				data : {'country_id' : country_id},
				type : 'GET',
				success : function(response){	
					var html = '';
					jQuery.each(response.states, function(index, state) {
						html += '<option value="'+state.id+'">'+state.name+'</option>';
					});

					$('#state_id').html(html);
				}
			});
		});
	</script>
@endpush
