@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<input type="hidden" id="page_url" value="{{ route('userprofile.index') }}">
<section class="content-header">
    <div class="content-header-left">
        <h1>{{ $page_title }}</h1>
    </div>
    <div class="content-header-right">
        <a href="{{ route('userprofile.create') }}" data-toggle="tooltip" data-placement="left" title="Add New User" class="btn btn-primary btn-sm">Add New User</a>
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
                            <input type="hidden" id="status" value="All" class="form-control">
                        </div>
                    </div>
                    <table id="" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>PROFILE</th>
                                <th>USER_NAME</th>
                                <th>ROLE</th>
                                <th>FIRST_NAME</th>
                                <th>LAST_NAME</th>
                                <th>EMAIL</th>
                                <th>MOBILE</th>
                                <th>STATUS</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="body">
                            @foreach($models as $key=>$model)
                            <tr id="id-{{ $model->id }}">
                                    <td>{{  $models->firstItem()+$key }}.</td>
                                    <td>{{ $model->profile_image }}</td>
                                    <td>{{ $model->name }}</td>
                                    <td>{{ $model->roles->first()->name??'N/A' }}</td>
                                    <td>{{ $model->first_name }}</td>
                                    <td>{{ $model->last_name }}</td>
                                    <td>{{ $model->email }}</td>
                                    <td>{{ $model->mobile }}</td>
                                    <td>
                                        @if($model->status)
                                            <span class="label label-success">Active</span>
                                        @else
                                            <span class="label label-danger">In-Active</span>
                                        @endif
                                    </td>
                                    <td width="250px">
                                        <a href="{{ route("userprofile.show", $model->id) }}" data-toggle="tooltip" data-placement="top" title="Show UserProfile" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Show</a>
                                        <a href="{{ route("userprofile.edit", $model->id) }}" data-toggle="tooltip" data-placement="top" title="Edit UserProfile" class="btn btn-primary btn-xs" style="margin-left: 3px;"><i class="fa fa-edit"></i> Edit</a>
                                        <button data-toggle="tooltip" data-placement="top" title="Delete UserProfile" class="btn btn-danger btn-xs delete" data-slug="{{ $model->id }}" data-del-url="{{ route("userprofile.destroy", $model->id) }}" style="margin-left: 3px;"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="22">
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
