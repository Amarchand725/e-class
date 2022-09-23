@extends('layouts.admin.app')
@section('title', '{page_title}')
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
            <h1>{page_title}</h1>
        </div>
        <div class="content-header-right">
            <a href="{view_all_route}" data-toggle="tooltip" data-placement="left" title="{{ $view_all_title }}" class="btn btn-primary btn-sm">{{ $view_all_title }}</a>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-body">
                        {show_form}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
@endpush
