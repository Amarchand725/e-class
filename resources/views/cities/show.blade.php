@extends('layouts.admin.app')
@section('title', 'Show City')
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
            <h1>Show City</h1>
        </div>
        <div class="content-header-right">
            <a href="{{ route("city.index") }}" data-toggle="tooltip" data-placement="left" title="{{ $view_all_title }}" class="btn btn-primary btn-sm">{{ $view_all_title }}</a>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-body">
                        <table class="table">
                            <tr><th>Country</th><td>{{ $model->hasCountry->name }}</td></tr>
                            <tr><th>State</th><td>{{ $model->hasState->name }}</td></tr>
                            <tr><th>Name</th><td>{{ $model->name }}</td></tr>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
@endpush
