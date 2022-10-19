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
                            <h1 class="">Invoice</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="purchase-block" class="purchase-main-block">
        <div class="container-xl">
            <div class="panel-body">
                <div id="printableArea">
                    <div class="border-one">
                        <div class="page-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="invoice-logo">
                                        <img src="{{ asset('public/website/images/logo/logo.png') }}" class="img-fluid" alt="logo">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="invoice-sign">
                                        <a href="#">
                                            <b>
                                                <div class="logotext"></div>
                                            </b>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <small class="purchase-date">
                                Puchased on: {{ date('d F Y', strtotime($order->created_at)) }}
                            </small>
                        </div>
            
                        <!-- info row -->
                        <div class="view-order">
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                    From:
                                    <address>
                                        <strong>Admin</strong><br>
                                        address: Comapny 12345 South Main Street Anywhere<br>
                                        Karachi,
                                        PAKISTAN
                                        <br>
                                        Phone: +917777777777<br>
                                        Email: admin@gmail.com
                                    </address>
                                </div>

                                <div class="col-sm-4 invoice-col">
                                    To:
                                    <address>
                                        <strong>{{ Auth::user()->name }}</strong><br>
                                        address: {{ Auth::user()->hasUserProfile->address }}<br><br />
                                        Phone: {{ Auth::user()->hasUserProfile->mobile }}<br>
                                        Email: {{ Auth::user()->email }}
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    <br>
                                    <b>OrderID:</b> {{ $order->order_number }} <br>
                                    <b>TransactionID:</b> {{ isset($order->hasPayment)?$order->hasPayment->trasaction_id:'' }}<br>
                                    <b>Payment Mode:</b> {{ isset($order->hasPayment)?$order->hasPayment->payment_method:'' }}<br>
                                    <b>Currency:</b> USD<br>
                                    <b>Payment Status</b> {{ isset($order->hasPayment)?$order->hasPayment->status:'' }}<br>
                                    <b>Enroll on:</b> {{ date('d F Y', strtotime($order->created_at)) }}<br>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                        <div class="order-table table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Courses</th>
                                        <th>Instructor</th>
                                        <th>Price</th>
                                        <th>Discount</th>
                                        <th>Qty</th>
                                        <th>Currency</th>
                                        <th class="txt-rgt">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $grand_toal = 0 @endphp 
                                    @foreach ($order->haveOrderDetails as $order_detail)
                                        @php 
                                            $grand_toal += $order_detail->subtotal;
                                        @endphp 
                                        <tr>
                                            <td>
                                                @if($order_detail->hasCourse)
                                                    {{ $order_detail->hasCourse->title }}
                                                @elseif($order_detail->hasBundle)
                                                    {{ $order_detail->hasBundle->title }}
                                                @endif
                                            </td>
                                            <td>
                                                @if($order_detail->hasCourse)
                                                    {{ $order_detail->hasCourse->hasInstructor->email }}
                                                @elseif($order_detail->hasBundle)
                                                    {{ $order_detail->hasBundle->hasCreatedBy->email }}
                                                @endif
                                            </td>
                                            <td>${{ number_format($order_detail->price, 2) }}</td>
                                            <td>${{ number_format($order_detail->discount, 2) }}</td>
                                            <td>{{ $order_detail->quantity }}</td>
                                            <td>USD</td>
                                            <td class="txt-rgt">$ {{ number_format($order_detail->subtotal, 2) }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="5"></td>
                                        <td>Grand Total</td>
                                        <td class="txt-rgt">$ {{ number_format($grand_toal, 2) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <b>
                    <div class="print-btn">
                        <input type="button" class="btn btn-primary" onclick="printDiv('printableArea')" value="Print">
                    </div>
            
                    {{-- <div class="print-btn">
                        <a href="#" target="_blank" class="btn btn-secondary">Download</a>
                    </div> --}}
                </b>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
        
            document.body.innerHTML = printContents;
        
            window.print();
        
            document.body.innerHTML = originalContents;
        }
    </script>
@endpush