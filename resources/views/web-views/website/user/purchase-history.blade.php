@extends('web-views.layouts.app')

@push('css')
@endpush

@section('content')
    <section id="business-home" class="business-home-main-block">
        <div class="business-img">
            <img src="{{ asset('public/website/images/logo/wishlist-banner.jpg') }}" class="img-fluid" alt="">
        </div>
        <div class="overlay-bg"></div>
        <div class="container-xl">
            <div class="business-dtl">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="bredcrumb-dtl">
                            <h1 class="wishlist-home-heading text-white">Purchase History</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="purchase-block" class="purchase-main-block">
        <div class="container-xl">
            <div class="purchase-table table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="purchase-history-heading">Purchase History</th>
                            <th class="purchase-text">Order No#</th>
                            <th class="purchase-text">Date</th>
                            <th class="purchase-text">Total</th>
                            <th class="purchase-text">Discount</th>
                            <th class="purchase-text">Grand Total</th>
                            <th class="purchase-text">Payment Status</th>
                            <th class="purchase-text">Actions</th>
                        </tr>
                    </thead>  
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>
                                    <div class="purchase-history-course-img">
                                        @if($order->hasOrderDetail->hasCourse)
                                            <a href="{{ route('course.single', $order->hasOrderDetail->hasCourse->slug) }}">
                                                <img src="{{ asset('public/admin/images/courses') }}/{{ $order->hasOrderDetail->hasCourse->thumbnail }}" class="img-fluid" alt="course">
                                            </a>                               
                                        @elseif($order->hasOrderDetail->hasBundle) 
                                            <a href="{{ route('bundle.single', $order->hasOrderDetail->hasBundle->slug) }}">
                                                <img src="{{ asset('public/admin/bundle/banners') }}/{{ $order->hasOrderDetail->hasBundle->thumbnail }}" class="img-fluid" alt="course">
                                            </a>
                                        @endif
                                    </div>
                                    <div class="purchase-history-course-title">
                                        @if($order->hasOrderDetail->hasCourse)
                                            <a href="{{ route('course.single', $order->hasOrderDetail->hasCourse->slug) }}">{{ $order->hasOrderDetail->hasCourse->title }}</a>
                                        @elseif($order->hasOrderDetail->hasBundle)
                                            <a href="{{ route('bundle.single', $order->hasOrderDetail->hasBundle->slug) }}">{{ $order->hasOrderDetail->hasBundle->title }}</a>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <div class="purchase-text">#Inv-{{ $order->order_number }}</div>			                   	
                                </td>
                                <td>
                                    <div class="purchase-text">{{ date('d F Y', strtotime($order->created_at)) }}</div>
                                </td>
                                <td>
                                    <div class="purchase-text">
                                        <span class="badge badge-info">${{ number_format($order->total, 2) }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="purchase-text">
                                        <span class="badge badge-primary">${{ number_format($order->discount, 2) }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="purchase-text">
                                        <span class="badge badge-info">${{ number_format($order->grand_total, 2) }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="purchase-text">
                                        @if($order->payment_status=='succeeded')
                                            <span class="badge badge-success">Completed</span>
                                        @else 
                                            <span class="badge badge-danger">Failed</span>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-btn">
                                        <a href="{{ route('order.invoice', $order->order_number) }}" class="btn btn-secondary">
                                            Invoice
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>  
                </table>
            </div>
        </div>
    </section>
    <section id="purchase-block" class="purchase-main-block">
        <div class="container-xl">
            <div class="purchase-table table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="purchase-history-heading">Refunds</th>
                            <th class="purchase-text">Date</th>
                            <th class="purchase-text">Amount</th>
                            <th class="purchase-text">Payment Mode</th>
                            <th class="purchase-text">Payment Status</th>
                            <th class="purchase-text">Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>
@endsection