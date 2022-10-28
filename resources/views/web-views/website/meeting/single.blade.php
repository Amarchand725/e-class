@extends('web-views.layouts.app')

@push('css')
    <style>
        .details svg.feather{
            margin: 0;
        }
    </style>
@endpush

@section('content')
    <section id="about-home" class="about-home-main-block">
        <div class="container-xl">
            <div class="row">
                <div class="col-lg-8">
                    <div class="about-home-block text-white">
                        <h1 class="about-home-heading text-white">{{ $model->topic }}</h1>
                        <ul>
                            <li>
                                <a href="#" title="about">Created: <a href="{{ route('user.profile', $model->hasHost->slug) }}" title="instructor"> {{ $model->hasHost->name }} </a> </a></li>
                                <li><a href="#" title="about">Start At: {{ date('d-m-Y', strtotime($model->start_date)) }} | {{ date('h:i:s A', strtotime($model->start_time)) }}</a>
                            </li>                        
                        </ul>
                    </div>
                </div>
                <!-- course preview -->
                <div class="col-lg-4">
                    <div class="about-home-product">
                        <div class="video-item hidden-xs">
                            <div class="video-device">
                                <img src="{{ asset('public/admin/images/meetings') }}/{{ $model->thumbnail }}" class="bg_img img-fluid" alt="Background">
                            </div>
                        </div>
                        
                        {{-- <div class="about-home-dtl-training">
                            <div class="about-home-dtl-block btm-10">
                                <div class="about-home-btn btm-20">
                                    <a href="{{ url('/') }}/{{ $model->meeting_url }}" target="_blank" class="iframe btn btn-secondary cboxElement">Join Meeting</a>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="about-product" class="about-product-main-block">
        <div class="container-xl">
            <div class="row">
                <div class="col-lg-8">
                    <div class="requirements">
                        <h3>Agenda</h3>
                        <ul>
                            <li class="comment more">{!! $model->agenda !!}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection