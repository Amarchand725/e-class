@extends('layouts.admin.app')
@section('title', 'Show User Details')
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
                            <tr>
                                <th width="200px">Profile</th>
                                <td>
                                    @if($model->hasUserProfile)
                                        <img style="border-radius: 50%;" src="{{ asset('public/admin/images/profiles') }}/{{ $model->hasUserProfile->profile_image }}" width="50px" height="50px" alt="">
                                    @else
                                        <img style="border-radius: 50%;" src="{{ asset('public/default.png') }}" width="50px" height="50px" alt="">
                                    @endif
                                </td>
                            </tr>
                            <tr><th>Role</th><td><span class="badge badge-info">{{ $model->roles->first()->name??'N/A' }}</span></td></tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    @if($model->status)
                                        <span class="label label-success"><i class="fa fa-check"></i> Active</span>
                                    @else
                                        <span class="label label-danger"><i class="fa fa-times"></i> In-Active</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Verified</th>
                                <td>
                                    @if($model->is_verified)
                                        <span class="label label-info"><i class="fa fa-check"></i> Verified</span>
                                    @else
                                        <span class="label label-warning"><i class="fa fa-times"></i> Un-verified</span>
                                    @endif
                                </td>
                            </tr>
                            <tr><th>User</th><td>{{ $model->name }}</td></tr>
                            <tr><th>First_name</th><td>{{ $model->hasUserProfile->first_name }}</td></tr>
                            <tr><th>Last_name</th><td>{{ $model->hasUserProfile->last_name }}</td>
                            </tr><tr><th>Email</th><td>{{ $model->email }}</td></tr>
                            <tr><th>Mobile</th><td>{{ $model->hasUserProfile->mobile }}</td></tr>
                            
                            <tr><th>Country</th><td>{{ $model->hasUserProfile->hasCountryName->name??'N/A' }}</td></tr>
                            <tr><th>State</th><td>{{ $model->hasUserProfile->hasStateName->name??'N/A' }}</td></tr>
                            <tr><th>City</th><td>{{ $model->hasUserProfile->hasCityName->name??'N/A' }}</td></tr>
                            <tr><th>Address</th><td>{{ $model->hasUserProfile->address }}</td></tr>
                            
                            <tr><th>Facebook_url</th><td>{{ $model->hasUserProfile->facebook_url }}</td></tr>
                            <tr><th>Twitter_url</th><td>{{ $model->hasUserProfile->twitter_url }}</td></tr>
                            <tr><th>Youtube_url</th><td>{{ $model->hasUserProfile->youtube_url }}</td></tr>
                            <tr><th>Linked_in_url</th><td>{{ $model->hasUserProfile->linked_in_url }}</td></tr>
                            <tr><th>Details</th><td>{!! $model->hasUserProfile->details !!}</td></tr>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
@endpush
