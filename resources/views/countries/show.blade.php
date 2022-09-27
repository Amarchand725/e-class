@extends('layouts.admin.app')
@section('title', 'Show Country')
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
            <h1>Show Country</h1>
        </div>
        <div class="content-header-right">
            <a href="{{ route("country.index") }}" data-toggle="tooltip" data-placement="left" title="{{ $view_all_title }}" class="btn btn-primary btn-sm">{{ $view_all_title }}</a>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-body">
                        <table class="table">
                            <tr><th>Name</th><td>{{ $model->name }}</td></tr>
                            <tr><th>Country_code</th><td>{{ $model->country_code }}</td></tr>
                            <tr><th>Currency</th><td>{{ $model->currency }}</td></tr>
                            <tr><th>Currency_symbol</th><td>{{ $model->currency_symbol }}</td></tr>
                            <tr><th>Description</th><td>{{ $model->description }}</td></tr>
                            <tr>
                                <th>Flag</th>
                                <td>
                                    @if($model->flag)
                                        <img style="border-radius: 50%;" src="{{ asset('public/admin/images/countries') }}/{{ $model->flag }}" width="50px" height="50px" alt="">
                                    @else
                                        <img style="border-radius: 50%;" src="{{ asset('public/default.png') }}" width="50px" height="50px" alt="">
                                    @endif
                                </td>
                            </tr>
                            <tr><th>Status</th><td>@if($model->status)<span class="label label-success">Active</span>@else<span class="label label-danger">In-Active</span>@endif</td></tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
@endpush
