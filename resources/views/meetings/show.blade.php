@extends('layouts.admin.app')
@section('title', 'Show Course')
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
            <h1>Show Course</h1>
        </div>
        <div class="content-header-right">
            <a href="{{ route("course.index") }}" data-toggle="tooltip" data-placement="left" title="{{ $view_all_title }}" class="btn btn-primary btn-sm">{{ $view_all_title }}</a>
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
                                <td>{{ $model->hasCreatedBy->name }} ( {{ $model->hasCreatedBy->roles->first()->name }} )</td>
                            </tr>
                            <tr>
                                <th>Instructor</th>
                                <td>{{ $model->hasInstructor->name??'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Institute</th>
                                <td>{{ $model->hasInstitute->name??'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Category</th>
                                <td>{{ $model->hasCategory->name??'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Title</th>
                                <td>{{ $model->title }}</td>
                            </tr>
                            <tr>
                                <th>Actual Price</th>
                                <td>${{ number_format($model->price, 2) }}</td>
                            </tr>
                            <tr>
                                <th>Sale Price</th>
                                <td>${{ number_format($model->sale_price, 2) }}</td>
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
                                <th>Short Description</th>
                                <td style="text-align: justify">{{ $model->short_description }}</td>
                            </tr>
                            <tr>
                                <th>Requirements</th>
                                <td style="text-align: justify">{!! $model->requirements !!}</td>
                            </tr>
                            <tr>
                                <th>Full Description</th>
                                <td style="text-align: justify">{!! $model->full_description !!}</td>
                            </tr>
                            <tr>
                                <th>Thumbnail</th>
                                <td>
                                    @if($model->thumbnail)
                                        <img src="{{ asset('public/admin/images/courses') }}/{{ $model->thumbnail }}" width="200px" alt="">
                                    @else
                                        <img src="{{ asset('public/default.png') }}" width="200px" alt="">
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Video</th>
                                <td>
                                    @if($model->video)
                                        <video width="200" controls>
                                            <source src="{{ asset('public/admin/images/courses') }}/{{ $model->video }}" type="video/mp4">
                                            <source src="{{ asset('public/admin/images/courses') }}/{{ $model->video }}" type="video/ogg">
                                            Your browser does not support the video tag.
                                        </video>
                                    @else
                                        <img src="{{ asset('public/default.png') }}" width="200px" alt="">
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Whatlearn</th>
                                <td>
                                    <ul>
                                        @if(count($model->haveWhatLearns))
                                            @foreach ($model->haveWhatLearns as $learn)
                                                <li>{{ $learn->title }}</li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>Course Includes</th>
                                <td>
                                    <ul>
                                        @if(count($model->haveCourseIncludes))
                                            @foreach ($model->haveCourseIncludes as $include)
                                                <li>{{ $include->title }}</li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>Tags</th>
                                <td>
                                    <ul>
                                        @if(count($model->haveTags))
                                            @foreach ($model->haveTags as $tag)
                                                <li><span class="badge badge-info">{{ $tag->tag }}</span></li>
                                            @endforeach
                                        @endif
                                    </ul>
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
