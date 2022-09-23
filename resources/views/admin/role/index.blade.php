@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
    <input type="hidden" id="page_url" value="{{ route('role.index') }}">
    <section class="content-header">
        <div class="content-header-left">
            <h1>All Roles</h1>
        </div>
        <div class="content-header-right">
            <a href="{{ route('role.create') }}" class="btn btn-primary btn-sm">Add New Role</a>
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
                            <div class="d-flex col-sm-11">
                                <input type="text" id="search" class="form-control" placeholder="Search" style="margin-bottom:5px">
                            </div>
                            <div class="d-flex col-sm-5" style="display: none">
                                <select name="" id="status" class="form-control status" style="margin-bottom:5px">
                                    <option value="All" selected>Search by status</option>
                                    <option value="1">Active</option>
                                    <option value="2">In-Active</option>
                                </select>
                            </div>
                        </div>
                        <table id="" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="body">
                                @foreach($roles as $key=>$role)
                                    <tr id="id-{{ $role->id }}">
                                        <td>{{  $roles->firstItem()+$key }}.</td>
                                        <td>{{ $role->name }}</td>
                                        <td>{!! $role->description !!}</td>
                                        <td>
                                            {{-- @can('role-edit') --}}
                                                <a class="btn btn-primary btn-xs" href="{{ route('role.edit', $role->id) }}"><i class="fa fa-edit"></i> Edit</a>
                                            {{-- @endcan --}}
                                            {{-- @can('role-delete')
                                                <button class="btn btn-danger btn-xs delete" data-slug="{{ $role->id }}" data-del-url="{{ url('role', $role->id) }}"><i class="fa fa-trash"></i> Delete</button>
                                            @endcan --}}
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4">
                                        Displying {{$roles->firstItem()}} to {{$roles->lastItem()}} of {{$roles->total()}} records
                                        <div class="d-flex justify-content-center">
                                            {!! $roles->links('pagination::bootstrap-4') !!}
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
