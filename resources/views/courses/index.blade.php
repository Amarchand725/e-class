@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<input type="hidden" id="page_url" value="{{ route('course.index') }}">
<section class="content-header">
    <div class="content-header-left">
        <h1>{{ $page_title }}</h1>
    </div>
    @can('course-create')
    <div class="content-header-right">
        <a href="{{ route('course.create') }}" data-toggle="tooltip" data-placement="left" title="Add New Course" class="btn btn-primary btn-sm">Add New Course</a>
    </div>
    @endcan
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
                                <th>THUMBNAIL</th>
                                <th>TITLE</th>
                                <th>SALE PRICE</th>
                                <th>SHORT_DESCRIPTION</th>
                                <th>IS_FEATURED</th>
                                <th>CREATED_BY</th>
                                <th>STATUS</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="body">
                            @foreach($models as $key=>$model)
                            <tr id="id-{{ $model->id }}">
                                    <td>{{  $models->firstItem()+$key }}.</td>
                                    <td>
                                        @if($model->thumbnail)
                                            <img style="border-radius: 50%;" src="{{ asset('public/admin/images/courses') }}/{{ $model->thumbnail }}" width="50px" height="50px" alt="">
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>{{ $model->title }}</td>
                                    <td>${{ number_format($model->price, 2) }}</td>
                                    <td>{{ Str::limit($model->short_description, 20) }}</td>
                                    <td>
                                        @if($model->is_featured)
                                            <span class="label label-success">Featured</span>
                                        @else
                                            <span class="label label-danger">Not Featured</span>
                                        @endif
                                    </td>
                                    <td>{{ $model->hasCreatedBy->name }} ( {{ $model->hasCreatedBy->roles->first()->name }} )</td>
                                    <td>
                                        @if($model->status)
                                            <span class="label label-success">Active</span>
                                        @else
                                            <span class="label label-danger">In-Active</span>
                                        @endif
                                    </td>
                                    <td width="250px">  
                                        <a href="{{ route("course.show", $model->id) }}" data-toggle="tooltip" data-placement="top" title="Course Classes" class="btn btn-primary btn-xs"><i class="fa fa-snowflake-o"></i></a>
                                        <a href="{{ route("course.show", $model->id) }}" data-toggle="tooltip" data-placement="top" title="Show Course" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></a>
                                        @can('course-edit')
                                        <a href="{{ route("course.edit", $model->id) }}" data-toggle="tooltip" data-placement="top" title="Edit Course" class="btn btn-primary btn-xs" style="margin-left: 3px;"><i class="fa fa-edit"></i></a>
                                        @endcan
                                        @can('course-delete')
                                        <button data-toggle="tooltip" data-placement="top" title="Delete Course" class="btn btn-danger btn-xs delete" data-slug="{{ $model->id }}" data-del-url="{{ route("course.destroy", $model->id) }}" style="margin-left: 3px;"><i class="fa fa-trash"></i></button>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="15">
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
