@extends('layouts.admin.app')
@section('title', 'Edit Payout Setting')
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
		<h1>Edit Payout Setting</h1>
	</div>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="{{ route("payoutsetting.update", $model->id) }}" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				@csrf
				{{ method_field('PATCH') }}

				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="type" class="col-sm-2 control-label">Type <span style="color:red">*</span></label>
							<div class="col-sm-8">
								<select name="type" id="type" class="form-control">
									<option value="" selected>Select Type</option>
									<option value="bank" {{ $model->type=='bank'?'selected':'' }}>Bank Transfer</option>
								</select>
								<span style="color: red">{{ $errors->first("type") }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="bank_name" class="col-sm-2 control-label">Bank Name <span style="color:red">*</span></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="bank_name" value="{{ $model->bank }}" id="bank_name" placeholder="Enter bank name">
								<span style="color: red">{{ $errors->first("bank_name") }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="account_title" class="col-sm-2 control-label">AccountHolderName <span style="color:red">*</span></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="account_title" value="{{ $model->account_title }}" id="account_title" placeholder="Enter Account title">
								<span style="color: red">{{ $errors->first("account_title") }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="account_number" class="col-sm-2 control-label">Account Number <span style="color:red">*</span></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="account_number" value="{{ $model->account_number }}" id="account_number" placeholder="Enter account number">
								<span style="color: red">{{ $errors->first("account_number") }}</span>
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
