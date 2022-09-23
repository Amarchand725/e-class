@extends('layouts.admin.app')
@section('title', $page_title)
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
                <form action="{{ route('menu.update', $menu->id)}}" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    @csrf
                    {{ method_field('PATCH') }}
                    <div class="box box-info">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Menu of </label>
                                <div class="col-sm-8">
                                    <select name="menu_of" id="" disabled class="form-control js-example-basic-single">
                                        <option value="admin" {{ $menu->menu_of=='admin'?'selected':'' }}>Admin</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ Str::lower($role->name) }}" {{ $menu->menu_of==Str::lower($role->name)?'selected':'' }}>{{ $role->name }}</option>
                                        @endforeach
                                        <option value="general" {{ $menu->menu_of=='general'?'selected':'' }}>General</option>
                                    </select>
                                    <span style="color: red">{{ $errors->first('role') }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Parent Menu </label>
                                <div class="col-sm-8">
                                    <select name="parent_id" disabled id="" class="form-control js-example-basic-single">
                                        <option value="" selected>Select parent</option>
                                        @foreach ($parent_menus as $p_menu)
                                            <option value="{{ $p_menu->id }}" {{ $menu->id==$p_menu->id?'selected':'' }}>{{ $p_menu->menu }}</option>
                                        @endforeach
                                    </select>
                                    <span style="color: red">{{ $errors->first('parent_id') }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Icon <span style="color:red">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="icon" value="{{ $menu->icon }}" placeholder="Copy font awesome tag from library and paste here e.g <i class='fa fa-user' aria-hidden='true'></i>">
                                    <span style="color: red">{{ $errors->first('icon') }}</span>
                                    <a href="https://fontawesome.com/v4/icons/" target="_blank" class="btn btn-success">Choose Icon</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Label <span style="color:red">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="label" value="{{ $menu->label }}" placeholder="Enter label e.g All Users">
                                    <span style="color: red">{{ $errors->first('label') }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Menu</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" disabled name="menu" value="{{ $menu->menu }}" placeholder="Enter Menu e.g user">
                                    <span style="color: red">{{ $errors->first('menu') }}</span>
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
