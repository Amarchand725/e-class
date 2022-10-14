@extends('layouts.admin.app')
@section('title', 'Show Bundle')
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
            <h1>Show Bundle</h1>
        </div>
        <div class="content-header-right">
            <a href="{{ route("bundle.index") }}" data-toggle="tooltip" data-placement="left" title="{{ $view_all_title }}" class="btn btn-primary btn-sm">{{ $view_all_title }}</a>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-body">
                        <table class="table">
                            <tr>
                                <th width="200px">Courses</th>
                                <td>
                                    @foreach (json_decode($model->course_ids) as $course_id)
                                        <i class="fa fa-arrow-right" aria-hidden="true"></i> <span class="badge badge-info">{{ App\Models\Course::where('id', $course_id)->first()->title }}</span>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>Thumbnail</th>
                                <td>
                                    @if($model->banner)
                                        <img src="{{ asset('public/admin/bundle/banners') }}/{{ $model->thumbnail }}" width="200px" alt="">
                                    @else
                                        <img src="{{ asset('public/default.png') }}" width="200px" alt="">
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Title</th>
                                <td>{{ $model->title }}</td>
                            </tr>
                            <tr>
                                <th>Short_detail</th>
                                <td>{{ $model->short_detail }}</td>
                            </tr>
                            <tr>
                                <th>Details</th>
                                <td>{!! $model->details !!}</td>
                            </tr>
                            
                            <tr>
                                <th>Is Paid</th>
                                <td>
                                    @if($model->is_paid)
                                        <span class="label label-info">Paid</span>
                                    @else
                                        <span class="label label-danger">FREE</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Is Featured</th>
                                <td>
                                    @if($model->is_featured)
                                        <span class="label label-success">Featured</span>
                                    @else
                                        <span class="label label-danger">Not Featured</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Start_from</th>
                                <td> <span class="badge badge-info">{{ date("d, M-Y", strtotime($model->start_from)) }}</span></td>
                            </tr>
                            <tr>
                                <th>End_date</th>
                                <td><span class="badge badge-info">{{ date("d, M-Y", strtotime($model->end_date)) }}</span></td>
                            </tr>
                            <tr>
                                <th>Retail_price</th>
                                <td>${{ number_format($model->retail_price,2) }}</td>
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td>${{ number_format($model->price, 2) }}</td>
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
