@extends('layouts.admin.app')
@section('title', 'Show Blog')
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
            <h1>Show Blog</h1>
        </div>
        <div class="content-header-right">
            <a href="{{ route("blog.index") }}" data-toggle="tooltip" data-placement="left" title="{{ $view_all_title }}" class="btn btn-primary btn-sm">{{ $view_all_title }}</a>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-body">
                        <table class="table">
                            <tr><th width="200px">Created_by</th><td>{{ $model->hasCreatedBy->name }} ({{ $model->hasCreatedBy->roles->first()->name }})</td></tr>
                            <tr><th>Title</th><td>{{ $model->title }}</td></tr>
                            <tr><th>Description</th><td>{!! $model->description !!}</td></tr>
                            <tr>
                                <th>Attachment</th>
                                <td>
                                    @if($model->extension=='jpg' || $model->extension=='png' || $model->extension=='jpeg')
                                        <img style="border-radius: 50%;" src="{{ asset('public/admin/images/blogs') }}/{{ $model->attachment }}" width="50px" height="50px" alt="">
                                    @else
                                        <img style="border-radius: 50%;" src="{{ asset('public/default.png') }}" width="50  px" height="50px" alt="">
                                    @endif
                                </td>
                            </tr>
                            <tr><th>Extension</th><td>.{{ $model->extension }}</td></tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    @if($model->status)
                                        <span class="label label-success">Active</span>
                                    @else
                                        <span class="label label-danger">In-Active</span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
@endpush
