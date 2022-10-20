@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<input type="hidden" id="page_url" value="{{ route('enrollstudent.index') }}">
<section class="content-header">
    <div class="content-header-left">
        <h1>{{ $page_title }}</h1>
    </div>
    @can('institute-create')
    <div class="content-header-right">
        <a href="{{ route('enrollstudent.create') }}" data-toggle="tooltip" data-placement="left" title="Enroll New User" class="btn btn-primary btn-sm">Enroll New User</a>
    </div>
    @endcan
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            @if (session('success'))
                <div class="callout callout-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="box box-info">
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-1">Search:</div>
                        <div class="d-flex col-sm-11">
                            <input type="text" id="search" class="form-control" placeholder="Search" style="margin-bottom:5px">
                            <input type="hidden" id="status" value="All" class="form-control">
                        </div>
                    </div>
                    <table id="" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>USER</th>
                                <th>PAYMENT DETAIL</th>
                                <th>SUBSCRIPTION STATUS</th>
                                <th>UNENROLL</th>
                                <th>STATUS</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody id="body">
                            @foreach($models as $key=>$model)
                            <tr id="id-{{ $model->id }}">
                                    <td>{{  $models->firstItem()+$key }}.</td>
                                    <td>
                                        <table class="table">
                                            <tr>
                                                <th>User</th>
                                                <td>{{ $model->hasUser->name }}</td>
                                            </tr>
                                            <tr>
                                                @php 
                                                    $order_detail = App\Models\OrderDetails::where('order_number', $model->order_number)->where('product_slug', $model->product_slug)->first();
                                                    @endphp 
                                                    @if($order_detail->hasCourse)
                                                    <th>Course</th>
                                                    <td>
                                                        {{ $order_detail->hasCourse->title }}
                                                    </td>
                                                @else 
                                                    <th>Bundle</th>
                                                    <td>
                                                        {{ $order_detail->hasBundle->title }}
                                                    </td>
                                                @endif
                                            </tr>
                                        </table>
                                    </td>
                                    <td>
                                        @php 
                                        $order_detail = App\Models\OrderDetails::where('order_number', $model->order_number)->where('product_slug', $model->product_slug)->first();
                                        @endphp 
                                        <table class="table">
                                            <tr>
                                                <th>EnrolledBy</th>
                                                <td>{{ $model->createdBy->name }} ( {{ $model->createdBy->roles[0]->name }} )</td>
                                            </tr>
                                            <tr>
                                                <th>TransactionId</th>
                                                <td>{{ $order_detail->hasPayment->trasaction_id }}</td>
                                            </tr>
                                            <tr>
                                                <th>PaymentMethod</th>
                                                <td>{{ $order_detail->hasOrder->payment_type }}</td>
                                            </tr>
                                            <tr>
                                                <th>TotalAmount</th>
                                                <td>${{ number_format($order_detail->subtotal, 2) }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td> -- </td>
                                    <td>{{ date('d M Y', strtotime($model->updated_at)) }}</td>
                                    <td>
                                        @if($model->status)
                                            <span class="label label-success">Active</span>
                                        @else
                                            <span class="label label-danger">In-Active</span>
                                        @endif
                                    </td>
                                    <td width="250px">
                                        @can('enroll-edit')
                                        <a href="{{ route("enrollstudent.edit", $model->id) }}" data-toggle="tooltip" data-placement="top" title="Edit enroll student" class="btn btn-primary btn-xs" style="margin-left: 3px;"><i class="fa fa-edit"></i> Edit</a>
                                        @endcan
                                        @can('enroll-delete')
                                        <button data-toggle="tooltip" data-placement="top" title="Delete enroll student" class="btn btn-danger btn-xs delete" data-slug="{{ $model->id }}" data-del-url="{{ route("enrollstudent.destroy", $model->id) }}" style="margin-left: 3px;"><i class="fa fa-trash"></i> Delete</button>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="14">
                                    Displying {{$models->firstItem()}} to {{$models->lastItem()}} of {{$models->total()}} records
                                    <div class="d-flex justify-content-center">
                                        {!! $models->links('pagination::bootstrap-4') !!}
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</section>
@endsection
@push('js')
@endpush
