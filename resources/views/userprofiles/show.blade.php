@extends('layouts.admin.app')
@section('title', 'Show UserProfile')
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
            <h1>Show UserProfile</h1>
        </div>
        <div class="content-header-right">
            <a href="{{ route("userprofile.index") }}" data-toggle="tooltip" data-placement="left" title="{{ $view_all_title }}" class="btn btn-primary btn-sm">{{ $view_all_title }}</a>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-body">
                        <table class="table">
                            <tr><th width="200px">Profile</th><td>{{ $model->profile_image }}</td></tr>
                            <tr><th>Role</th><td>{{ $model->roles->first()->name }}</td></tr>
                            <tr><th>User</th><td>{{ $model->name }}</td></tr>
                            <tr><th>First_name</th><td>{{ $model->first_name }}</td></tr>
                            <tr><th>Last_name</th><td>{{ $model->last_name }}</td>
                            </tr><tr><th>Email</th><td>{{ $model->email }}</td></tr>
                            <tr><th>Mobile</th><td>{{ $model->mobile }}</td></tr>
                            
                            <tr><th>Country</th><td>{{ $model->country_id }}</td></tr>
                            <tr><th>State</th><td>{{ $model->state_id }}</td></tr>
                            <tr><th>City</th><td>{{ $model->city_id }}</td></tr>
                            <tr><th>Address</th><td>{{ $model->address }}</td></tr>
                            
                            <tr><th>Facebook_url</th><td>{{ $model->facebook_url }}</td></tr>
                            <tr><th>Twitter_url</th><td>{{ $model->twitter_url }}</td></tr>
                            <tr><th>Youtube_url</th><td>{{ $model->youtube_url }}</td></tr>
                            <tr><th>Linked_in_url</th><td>{{ $model->linked_in_url }}</td></tr>
                            <tr><th>Details</th><td>{{ $model->details }}</td></tr>
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
