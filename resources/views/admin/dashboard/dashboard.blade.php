@extends('layouts.admin.app')

@section('title', $page_title)
@push('css')
  <style>
    .info-box-text{
      color: #4172a5 !important
    }
  </style>
@endpush
@section('content')
  <section class="content-header">
    <h1>Dashboard</h1>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-blue"><i class="fa fa-hand-o-right"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total Instructors</span>
            <span class="info-box-number" style="color: #4172a5 !important">{{ $data['total_instructors'] }}</span>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-blue"><i class="fa fa-hand-o-right"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total Enrolled Users</span>
            <span class="info-box-number" style="color: #4172a5 !important">{{ $data['total_enrolled_users'] }}</span>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-blue"><i class="fa fa-hand-o-right"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total Orders</span>
            <span class="info-box-number" style="color: #4172a5 !important">{{ $data['total_orders'] }}</span>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-blue"><i class="fa fa-hand-o-right"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total Institutes</span>
            <span class="info-box-number" style="color: #4172a5 !important">{{ $data['total_institutes'] }}</span>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-blue"><i class="fa fa-hand-o-right"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total Courses</span>
            <span class="info-box-number" style="color: #4172a5 !important">{{ $data['total_courses'] }}</span>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-blue"><i class="fa fa-hand-o-right"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total Blogs</span>
            <span class="info-box-number" style="color: #4172a5 !important">{{ $data['total_blogs'] }}</span>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-blue"><i class="fa fa-hand-o-right"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total Followers</span>
            <span class="info-box-number" style="color: #4172a5 !important">{{ $data['total_followers'] }}</span>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-blue"><i class="fa fa-hand-o-right"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total Followings</span>
            <span class="info-box-number" style="color: #4172a5 !important">{{ $data['total_followings'] }}</span>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
