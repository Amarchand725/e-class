@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<input type="hidden" id="page_url" value="{{ route('menu.index') }}">
<section class="content-header">
    <div class="content-header-left">
        <h1>{{ $page_title }}</h1>
    </div>
    <div class="content-header-right">
        <a href="{{ route('menu.create') }}" class="btn btn-primary btn-sm">Add New Menu</a>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            @if (session('success'))
                <div class="callout callout-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="box box-info">
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-1">Search:</div>
                        <div class="d-flex col-sm-6">
                            <input type="text" id="search" class="form-control" placeholder="Search" style="margin-bottom:5px">
                        </div>
                        <div class="d-flex col-sm-5">
                            <select name="menu_of" id="status" class="form-control js-example-basic-single">
                                <option value="All" selected>Search menu of</option>
                                <option value="admin">Admin</option>
                                @foreach ($roles as $role)
                                    <option value="{{ Str::lower($role->name) }}">{{ $role->name }}</option>
                                @endforeach
                                <option value="general">General</option>
                            </select>
                        </div>
                    </div>
                    <table id="" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Menu of</th>
                                <th>Icon</th>
                                <th>Label</th>
                                <th>Parent</th>
                                <th>Menu</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="body">
                            @foreach($models as $key=>$menu)
                                <tr id="id-{{ $menu->id }}" class="id-{{ $menu->id }}">
                                    <td>{{  $models->firstItem()+$key }}.</td>
                                    <td>{{ Str::ucfirst($menu->menu_of) }}</td>
                                    <td>{!! $menu->icon !!}</td>
                                    <td>{{ Str::ucfirst($menu->label) }}</td>
                                    <td>{{ isset($menu->hasParent)?$menu->hasParent->menu:'--' }}</td>
                                    <td>{{$menu->menu}}</td>
                                    <td>
                                        @if($menu->status)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">In-Active</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('menu.edit', $menu->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                        @if($menu->menu != 'Menu' && $menu->menu != 'Role' && $menu->menu != 'Page')
                                            <button class="btn btn-danger btn-xs delete" data-slug="{{ $menu->id }}" data-del-url="{{ route('menu.destroy', $menu->id) }}"><i class="fa fa-trash"></i> Delete</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="6">
                                    Displying {{$models->firstItem()}} to {{$models->lastItem()}} of {{$models->total()}} records
                                    <div class="d-flex justify-content-center">
                                        {!! $models->links('pagination::bootstrap-4') !!}
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</section>
@endsection
@push('js')
@endpush
