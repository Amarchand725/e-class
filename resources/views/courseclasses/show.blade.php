@extends('layouts.admin.app')
@section('title', 'Show CourseClass')
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
            <h1>Show CourseClass</h1>
        </div>
        <div class="content-header-right">
            <a href="{{ route("courseclass.index") }}" data-toggle="tooltip" data-placement="left" title="{{ $view_all_title }}" class="btn btn-primary btn-sm">{{ $view_all_title }}</a>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-body">
                        <table class="table"><tr><th>Chapter_id</th><td>{{ $model->chapter_id }}</td></tr><tr><th>Title</th><td>{{ $model->title }}</td></tr><tr><th>Detail</th><td>{{ $model->detail }}</td></tr><tr><th>Type</th><td>{{ $model->type }}</td></tr><tr><th>Attachment</th><td>{{ $model->attachment }}</td></tr><tr><th>Is_featured</th><td>{{ $model->is_featured }}</td></tr><tr><th>Status</th><td>@if($model->status)<span class="label label-success">Active</span>@else<span class="label label-danger">In-Active</span>@endif</td></tr></table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
@endpush
