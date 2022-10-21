@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
    @if(isset($search_url))
        <input type="hidden" id="page_url" value="{{ route('follower.index') }}">
    @else 
        <input type="hidden" id="page_url" value="{{ route('following') }}">
    @endif
    <section class="content-header">
        <div class="content-header-left">
            <h1>{{ $page_title }}</h1>            
        </div>
        <div class="content-header-right">
            @if(isset($search_url))
                <a href="{{ route('following') }}" data-toggle="tooltip" data-placement="left" title="Followings" class="btn btn-primary btn-sm">Following</a>
            @else 
                <a href="{{ route('follower.index') }}" data-toggle="tooltip" data-placement="left" title="Followers" class="btn btn-primary btn-sm">Followers</a>
            @endif
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
                                    <th>USER</th>
                                    <th>FOLLOWER</th>
                                    <th>FOLLOWER E-MAIL</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="body">
                                @foreach($models as $key=>$model)
                                <tr id="id-{{ $model->id }}">
                                        <td>{{  $models->firstItem()+$key }}.</td>
                                        <td>{{ $model->hasUser->name }}</td>
                                        <td>{{ $model->hasFollower->name }}</td>
                                        <td>{{ $model->hasFollower->email }}</td>
                                        <td><button data-toggle="tooltip" data-placement="top" title="Delete Follower" class="btn btn-danger btn-xs delete" data-slug="{{ $model->id }}" data-del-url="{{ route("follower.destroy", $model->id) }}" style="margin-left: 3px;"><i class="fa fa-trash"></i> Delete</button></td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="8">
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
