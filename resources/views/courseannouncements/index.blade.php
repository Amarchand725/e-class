@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<input type="hidden" id="page_url" value="{{ route('courseannouncement.index') }}">
<section class="content-header">
    <div class="content-header-left">
        <h1>{{ $page_title }}</h1>
    </div>
    <div class="content-header-right">
        <a href="{{ route('courseannouncement.create') }}" data-toggle="tooltip" data-placement="left" title="Add New Courseannouncement" class="btn btn-primary btn-sm">Add New Courseannouncement</a>
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
                                <th>ANNOUNCEMENT</th><th>STATUS</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="body">
                            @foreach($models as $key=>$model)
                            <tr id="id-{{ $model->id }}">
                                    <td>{{  $models->firstItem()+$key }}.</td>
                                    <td>{{ $model->announcement }}</td><td>@if($model->status)<span class="label label-success">Active</span>@else<span class="label label-danger">In-Active</span>@endif</td><td width="250px"><a href="{{ route("courseannouncement.show", $model->id) }}" data-toggle="tooltip" data-placement="top" title="Show Courseannouncement" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Show</a><a href="{{ route("courseannouncement.edit", $model->id) }}" data-toggle="tooltip" data-placement="top" title="Edit Courseannouncement" class="btn btn-primary btn-xs" style="margin-left: 3px;"><i class="fa fa-edit"></i> Edit</a><button data-toggle="tooltip" data-placement="top" title="Delete Courseannouncement" class="btn btn-danger btn-xs delete" data-slug="{{ $model->id }}" data-del-url="{{ route("courseannouncement.destroy", $model->id) }}" style="margin-left: 3px;"><i class="fa fa-trash"></i> Delete</button></td>
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
