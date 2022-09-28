@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<input type="hidden" id="page_url" value="{{ route('category.index') }}">
<section class="content-header">
    <div class="content-header-left">
        <h1>{{ $page_title }}</h1>
    </div>
    <div class="content-header-right">
        <a href="{{ route('category.create') }}" data-toggle="tooltip" data-placement="left" title="Add New Category" class="btn btn-primary btn-sm">Add New Category</a>
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
                                <th>IMAGE</th><th>ICON</th><th>NAME</th><th>PARENT</th><th>FEATURED</th><th>STATUS</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="body">
                            @foreach($models as $key=>$model)
                            <tr id="id-{{ $model->id }}">
                                    <td>{{  $models->firstItem()+$key }}.</td>
                                    <td>
                                        @if($model->thumbnail)
                                            <img style="border-radius: 50%;" src="{{ asset('public/admin/images/categories') }}/{{ $model->thumbnail }}" width="50px" height="50px" alt="">
                                        @else
                                            <img style="border-radius: 50%;" src="{{ asset('public/default.png') }}" width="50  px" height="50px" alt="">
                                        @endif
                                    </td>
                                    <td>{!! $model->icon !!}</td>
                                    <td>{{ $model->name }}</td>
                                    <td>{{ $model->hasParent->name??'' }}</td>
                                    <td>
                                        @if($model->is_featured)
                                            <span class="label label-success"> Active</span>
                                        @else
                                            <span class="label label-danger"> Deactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($model->status)
                                            <span class="label label-success">Active</span>
                                        @else
                                            <span class="label label-danger">Deactive</span>
                                        @endif
                                    </td>
                                    <td width="250px">
                                        <a href="{{ route("category.show", $model->id) }}" data-toggle="tooltip" data-placement="top" title="Show Category" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Show</a>
                                        <a href="{{ route("category.edit", $model->id) }}" data-toggle="tooltip" data-placement="top" title="Edit Category" class="btn btn-primary btn-xs" style="margin-left: 3px;"><i class="fa fa-edit"></i> Edit</a>
                                        <button data-toggle="tooltip" data-placement="top" title="Delete Category" class="btn btn-danger btn-xs delete" data-slug="{{ $model->id }}" data-del-url="{{ route("category.destroy", $model->id) }}" style="margin-left: 3px;"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="9">
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
