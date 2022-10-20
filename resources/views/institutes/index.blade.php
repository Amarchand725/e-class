@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<input type="hidden" id="page_url" value="{{ route('institute.index') }}">
<section class="content-header">
    <div class="content-header-left">
        <h1>{{ $page_title }}</h1>
    </div>
    @can('institute-create')
    <div class="content-header-right">
        <a href="{{ route('institute.create') }}" data-toggle="tooltip" data-placement="left" title="Add New Institute" class="btn btn-primary btn-sm">Add New Institute</a>
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
                                <th>LOGO</th>
                                <th>NAME</th>
                                <th>EMAIL</th>
                                <th>MOBILE</th>
                                <th>SKILL</th>
                                <th>AFFILATED_BY</th>
                                <th>IS_VERIFIED</th>
                                <th>STATUS</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="body">
                            @foreach($models as $key=>$model)
                            <tr id="id-{{ $model->id }}">
                                    <td>{{  $models->firstItem()+$key }}.</td>
                                    <td>
                                        @if($model->logo)
                                            <img style="border-radius: 50%;" src="{{ asset('public/admin/images/institutes') }}/{{ $model->logo }}" width="50px" height="50px" alt="">
                                        @else
                                            <img style="border-radius: 50%;" src="{{ asset('public/default.png') }}" width="50px" height="50px" alt="">
                                        @endif
                                    </td>
                                    <td>{{ $model->name }}</td>
                                    <td>{{ $model->email }}</td>
                                    <td>{{ $model->mobile }}</td>
                                    <td>
                                        @php $skills = json_decode($model->skill) @endphp 
                                        @foreach ($skills as $skill)
                                            <span class="badge badge-info">{{ $skill }}</span>,
                                        @endforeach
                                    </td>
                                    <td>{{ $model->affilated_by }}</td>
                                    <td>
                                        @if($model->is_verified)
                                            <span class="label label-success">Active</span>
                                        @else
                                            <span class="label label-danger">In-Active</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($model->status)
                                            <span class="label label-success">Active</span>
                                        @else
                                            <span class="label label-danger">In-Active</span>
                                        @endif
                                    </td>
                                    <td width="250px">
                                        <a href="{{ route("institute.show", $model->id) }}" data-toggle="tooltip" data-placement="top" title="Show Institute" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Show</a>
                                        @can('institute-edit')
                                        <a href="{{ route("institute.edit", $model->id) }}" data-toggle="tooltip" data-placement="top" title="Edit Institute" class="btn btn-primary btn-xs" style="margin-left: 3px;"><i class="fa fa-edit"></i> Edit</a>
                                        @endcan
                                        @can('institute-delete')
                                        <button data-toggle="tooltip" data-placement="top" title="Delete Institute" class="btn btn-danger btn-xs delete" data-slug="{{ $model->id }}" data-del-url="{{ route("institute.destroy", $model->id) }}" style="margin-left: 3px;"><i class="fa fa-trash"></i> Delete</button>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="14">
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
