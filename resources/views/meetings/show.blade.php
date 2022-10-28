@extends('layouts.admin.app')
@section('title', 'Show Meeting Details')
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
            <h1>Show Meeting Details</h1>
        </div>
        <div class="content-header-right">
            <a href="{{ route("meeting.index") }}" data-toggle="tooltip" data-placement="left" title="{{ $view_all_title }}" class="btn btn-primary btn-sm">{{ $view_all_title }}</a>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-body">
                        <table class="table">
                            <tr>
                                <th>Created At</th>
                                <td>{{ date('d, F-Y H:i A', strtotime($model->created_at)) }}</td>
                            </tr>
                            <tr>
                                <th width="200px">Created By</th>
                                <td>{{ $model->hasHost->name }} ( {{ $model->hasHost->roles->first()->name }} )</td>
                            </tr>
                            <tr>
                                <th width="200px">Meeting Date</th>
                                <td>{{ date('d, M Y', strtotime($model->start_date)) }}</td>
                            </tr>
                            <tr>
                                <th width="200px">Meeting Time</th>
                                <td>{{ date('h:i A', strtotime($model->start_time)) }}</td>
                            </tr>
                            <tr>
                                <th>Instructor</th>
                                <td>{{ $model->hasHost->name??'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Topic</th>
                                <td>{{ $model->topic }}</td>
                            </tr>
                            <tr>
                                <th>Agenda</th>
                                <td style="text-align: justify">{!! $model->agenda !!}</td>
                            </tr>
                            <tr>
                                <th>Thumbnail</th>
                                <td>
                                    @if($model->thumbnail)
                                        <img src="{{ asset('public/admin/images/meetings') }}/{{ $model->thumbnail }}" width="200px" alt="">
                                    @else
                                        <img src="{{ asset('public/default.png') }}" width="200px" alt="">
                                    @endif
                                </td>
                            </tr>
                            
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
