@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<input type="hidden" id="page_url" value="{{ route('meeting.index') }}">
<section class="content-header">
    <div class="content-header-left">
        <h1>{{ $page_title }}</h1>
    </div>
    @can('meeting-create')
    <div class="content-header-right">
        <a href="{{ route('meeting.create') }}" data-toggle="tooltip" data-placement="left" title="Add New Meeting" class="btn btn-primary btn-sm">Add New Meeting</a>
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
                                <th>Host</th>
                                <th>Topic</th>
                                <th>Start Date</th>
                                <th>Timing</th>
                                <th>Joing</th>
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
                                            <img style="border-radius: 50%;" src="{{ asset('public/admin/images/meetings') }}/{{ $model->thumbnail }}" width="50px" height="50px" alt="">
                                        @else
                                            <img style="border-radius: 50%;" src="{{ asset('public/default.png') }}" width="50px" height="50px" alt="">
                                        @endif
                                    </td>
                                    <td>{{ $model->hasHost->name }} ( {{ $model->hasHost->roles->first()->name }} )</td>
                                    <td>{{ $model->topic }}</td>
                                    <td>{{ date('d, M-Y', strtotime($model->start_date)) }}</td>
                                    <td>{{ date('h:i A', strtotime($model->start_time)) }}</td>
                                    <td>{{ $model->joining }}</td>
                                    <td>
                                        @if($model->status)
                                            <span class="label label-success">Active</span>
                                        @else
                                            <span class="label label-danger">In-Active</span>
                                        @endif
                                    </td>
                                    <td width="250px">  
                                        <a href="{{ route("meeting.show", $model->id) }}" data-toggle="tooltip" data-placement="top" title="Show Meeting" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></a>
                                        @can('meeting-edit')
                                        <a href="{{ route("meeting.edit", $model->id) }}" data-toggle="tooltip" data-placement="top" title="Edit Meeting" class="btn btn-primary btn-xs" style="margin-left: 3px;"><i class="fa fa-edit"></i></a>
                                        @endcan
                                        @can('meeting-delete')
                                        <button data-toggle="tooltip" data-placement="top" title="Delete meeting" class="btn btn-danger btn-xs delete" data-slug="{{ $model->id }}" data-del-url="{{ route("meeting.destroy", $model->id) }}" style="margin-left: 3px;"><i class="fa fa-trash"></i></button>
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
