@extends('layouts.admin.app')
@section('title', $page_title)
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
		<h1>{{ $page_title }}</h1>
	</div>
	<div class="content-header-right">
		<a href="{{ route('menu.index') }}" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="{{ route('menu.store')}}" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				@csrf
				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Menu of <span style="color:red">*</span></label>
							<div class="col-sm-8">
								<select name="menu_of" id="" class="form-control js-example-basic-single" required>
                                    <option value="admin" selected>Admin</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ Str::lower($role->name) }}">{{ $role->name }}</option>
                                    @endforeach
                                    <option value="general">General</option>
                                </select>
								<span style="color: red">{{ $errors->first('role') }}</span>
							</div>
						</div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Parent Menu </label>
							<div class="col-sm-8">
								<select name="parent_id" id="" class="form-control js-example-basic-single">
                                    <option value="" selected>Select parent</option>
                                    @foreach ($parent_menus as $p_menu)
                                        <option value="{{ $p_menu->id }}">{{ $p_menu->menu }}</option>
                                    @endforeach
                                </select>
								<span style="color: red">{{ $errors->first('parent_id') }}</span>
							</div>
						</div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Icon <span style="color:red">*</span></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="icon" value="{{ old('icon') }}" placeholder="Copy font awesome tag from library and paste here e.g <i class='fa fa-user' aria-hidden='true'></i>" required>
                                <a href="https://fontawesome.com/v4/icons/" style="margin-top: 5px" target="_blank" class="btn btn-success">Choose Icon</a><br />
                                <span style="color: red">{{ $errors->first('icon') }}</span>
							</div>
						</div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Label <span style="color:red">*</span></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="label" value="{{ old('label') }}" placeholder="Enter label e.g All Users" required>
								<span style="color: red">{{ $errors->first('label') }}</span>
							</div>
						</div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Menu <span style="color:red">*</span></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="menu" value="{{ old('menu') }}" placeholder="Enter Menu e.g user" required>
								<span style="color: red">{{ $errors->first('menu') }}</span>
							</div>
						</div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Columns <span style="color:red">*</span></label>
							<div class="col-sm-8">
                                <table class="table" id="columns">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Default</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody">
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" name="column_names[]" value="" placeholder="Enter column name" required>
                                                <span style="color: red">{{ $errors->first('column_names') }}</span>
                                            </td>
                                            <td style="width:250px">
                                                <select name="types[]" id="" class="form-control js-example-basic-single">
                                                    <option value="integer" selected>INT</option>
                                                    <option value="string">VARCHAR</option>
                                                    {{-- <option value="blob">BLOB (image/file/docs)</option> --}}
                                                    <option value="boolean">BOOLEAN</option>
                                                    <option value="date">DATE</option>
                                                    <option value="time">TIME</option>
                                                    <option value="datetime">DATETIME</option>
                                                    <option value="text">TEXT</option>
                                                    <option value="bigInteger">BIGINT</option>
                                                    <option value="decimal">DECIMAL</option>
                                                    <option value="float">FLOAT</option>
                                                    <option value="double">DOUBLE</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select name="default_types[]" id="" class="form-control default_selection js-example-basic-single">
                                                    <option value="none" selected>None</option>
                                                    <option value="nullable">Null</option>
                                                    <option value="default">Default</option>
                                                </select>
                                                <span class="default-field"></span>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-success btn-sm add-more-btn"><i class="fa fa-plus"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
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
        $(document).ready(function(){
            $('.default_selection').parents('td').find('.default-field').html('<input type="hidden" name="defaults[]" value="1" class="form-control" style="margin-top:5px" placeholder="Enter default value">');
        });
        $(document).on('change', '.default_selection', function(){
            var default_val = $(this).val();
            if(default_val=='default'){
                $(this).parents('td').find('.default-field').html('<input type="text" name="defaults[]" class="form-control" style="margin-top:5px" placeholder="Enter default value">');
            }else{
                $(this).parents('td').find('.default-field').html('<input type="hidden" name="defaults[]" value="1" class="form-control" style="margin-top:5px" placeholder="Enter default value">');
            }
        });
        $(document).on('click', '.add-more-btn', function(){
            var html = '<tr>'+
                            '<td>'+
                                '<input type="text" class="form-control" name="column_names[]" value="" placeholder="Enter Menu e.g user">'+
                            '</td>'+
                            '<td>'+
                                '<select name="types[]" id="" class="form-control js-example-basic-single">'+
                                    '<option value="integer">INT</option>'+
                                    '<option value="string">VARCHAR</option>'+
                                    '<option value="boolean">BOOLEAN</option>'+
                                    '<option value="date">DATE</option>'+
                                    '<option value="text">TEXT</option>'+
                                    '<option value="bigInteger">BIGINT</option>'+
                                    '<option value="float">FLOAT</option>'+
                                '</select>'+
                            '</td>'+
                            '<td>'+
                                '<select name="default_types[]" id="" class="form-control default_selection js-example-basic-single">'+
                                    '<option value="none" selected>None</option>'+
                                    '<option value="nullable">Null</option>'+
                                    '<option value="default">Default</option>'+
                                '</select>'+
                                '<span class="default-field"></span>'+
                            '</td>'+
                            '<td>'+
                                '<button type="button" class="btn btn-danger btn-sm remove-btn"><i class="fa fa-times"></i></button>'+
                            '</td>'+
                        '</tr>';
            $("#columns > tbody").append(html);
        });

        $(document).on('click', '.remove-btn', function(){
            $(this).parents('tr').remove();
        });
    </script>
@endpush
