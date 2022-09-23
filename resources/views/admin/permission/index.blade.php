@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<input type="hidden" id="page_url" value="{{ route('permission.index') }}">
<section class="content-header">
    <div class="content-header-left">
        <h1>All Permissions</h1>
    </div>
    {{-- @can('permission-create')
    <div class="content-header-right">
        <a href="{{ route('permission.create') }}" class="btn btn-primary btn-sm">Add New</a>
    </div>
    @endcan --}}
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
                        <div class="d-flex col-sm-11">
                            <input type="text" id="search" class="form-control" placeholder="Search" style="margin-bottom:5px">
                        </div>
                    </div>
                    <table id="" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Permission</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="body">
                            @foreach($permissions as $key=>$permission)
                                <tr id="id-{{ $permission->id }}">
                                    <td>{{  $permissions->firstItem()+$key }}.</td>
                                    <td>{{ Str::ucfirst($permission->name) }}</td>
                                    <td>{{$permission->guard_name}}</td>
                                    <td>
                                        @can('permission-edit')
                                            <a href="{{ route('permission.edit', $permission->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                        @endcan
                                        {{-- @can('permission-delete')
                                            <button class="btn btn-danger btn-xs delete" data-slug="{{ $permission->id }}" data-del-url="{{ url('permission', $permission->id) }}"><i class="fa fa-trash"></i> Delete</button>
                                        @endcan --}}
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="4">
                                    Displying {{$permissions->firstItem()}} to {{$permissions->lastItem()}} of {{$permissions->total()}} records
                                    <div class="d-flex justify-content-center">
                                        {!! $permissions->links('pagination::bootstrap-4') !!}
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
