@extends('layouts.admin.app')
@section('title', 'Show Fact')
@push('css')
    <style>
        select {
            font-family: 'Font Awesome', 'sans-serif';
        }
    </style>
@endpush
@section('content')
    <section class="content-header">
        <div class="content-header-left">
            <h1>Show Fact</h1>
        </div>
        <div class="content-header-right">
            <a href="{{ route("fact.index") }}" data-toggle="tooltip" data-placement="left" title="{{ $view_all_title }}" class="btn btn-primary btn-sm">{{ $view_all_title }}</a>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-body">
                        <div class="form-group">
<label for="image" class="col-sm-2 control-label">Image</label>
<div class="col-sm-8">@if($model->status)<span class="label label-success">Active</span>@else<span class="label label-danger">In-Active</span>@endif<div>{{ $model->image }}</div></div></div><div class="form-group">
<label for="title" class="col-sm-2 control-label">Title</label>
<div class="col-sm-8">@if($model->status)<span class="label label-success">Active</span>@else<span class="label label-danger">In-Active</span>@endif<div>{{ $model->title }}</div></div></div><div class="form-group">
<label for="counter" class="col-sm-2 control-label">Counter</label>
<div class="col-sm-8">@if($model->status)<span class="label label-success">Active</span>@else<span class="label label-danger">In-Active</span>@endif<div>{{ $model->counter }}</div></div></div><div class="form-group">
<label for="description" class="col-sm-2 control-label">Description</label>
<div class="col-sm-8">@if($model->status)<span class="label label-success">Active</span>@else<span class="label label-danger">In-Active</span>@endif<div>{{ $model->description }}</div></div></div><div class="form-group">
<label for="status" class="col-sm-2 control-label">Status</label>
<div class="col-sm-8">@if($model->status)<span class="label label-success">Active</span>@else<span class="label label-danger">In-Active</span>@endif<div>{{ $model->status }}</div></div></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
@endpush
