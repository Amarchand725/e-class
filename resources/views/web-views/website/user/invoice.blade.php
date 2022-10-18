@extends('web-views.layouts.app')

@push('css')
@endpush

@section('content')
    <section id="business-home" class="business-home-main-block">
        <div class="business-img">
                    <img src="https://eclass.mediacity.co.in/demo/public/images/breadcum/1643952051bredcrumbs.jpg" class="img-fluid" alt="">
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
                <!-- title row -->
    
                <div class="page-header">
    
    
                <div class="row">
    
                    <div class="col-md-6">
                    <div class="invoice-logo">
                                                            <img src="https://eclass.mediacity.co.in/demo/public/images/logo/logo.png" class="img-fluid" alt="logo">
                                        </div>
                                    </div>
                    <div class="col-md-6">
    
                    <div class="invoice-sign">
    
                                                            <a href="https://eclass.mediacity.co.in/demo/public"><b>
                            <div class="logotext"></div>
                        </b></a>
                                        </div>
    
                    </div>
    
    
                </div>
    
    
    
    
                <br>
                            <small class="purchase-date">Puchased on:
                    18th October 2022</small>
                </div>
    
                <!-- info row -->
                <div class="view-order">
                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                    From:
                                    <address>
                        <strong>Admin</strong><br>
    
    
                        address: Comapny 12345 South Main Street Anywhere<br>
                                        Rajasthan,
                                                            INDIA
                                        <br>
    
                        Phone: +917777777777<br>
                        Email: admin@mediacity.co.in
                    </address>
                                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                    To:
                    <address>
                        <strong>User</strong><br>
                        address: <br>
                                                            <br>
                        Phone: 1234567890<br>
                        Email: user@mediacity.co.in
                    </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
    
                    <br>
                    <b>OrderID:</b> <br>
                    <b>TransactionID:</b> <br>
                    <b>Payment Mode:</b> <br>
                    <b>Currency:</b> <br>
                    <b>Payment Status:</b>
                                    Recieved
                                    <br>
                    <b>Enroll on:</b> 18th October 2022<br>
                    <b>
                                    </b></div><b>
                    <!-- /.col -->
                </b></div><b>
                </b></div><b>
                <!-- /.row -->
                <div class="order-table table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Courses</th>
                        <th>Instructor</th>
                        <th>Currency</th>
                                        <th class="txt-rgt">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                                        <td>Ultimate Photoshop Training</td>
                        <td>admin@mediacity.co.in</td>
                        
    
                        <td></td>
    
                        
                        
                        <td class="txt-rgt">
                                                                Free
                                                                </td>
    
                    </tr>
                    </tbody>
                </table>
                </div>
    
                
            </b></div><b>
            </b></div><b>
            <div class="print-btn">
            <input type="button" class="btn btn-primary" onclick="printDiv('printableArea')" value="Print">
            </div>
    
            <div class="print-btn">
            <a href="https://eclass.mediacity.co.in/demo/public/invoice/download/110" target="_blank" class="btn btn-secondary">Download</a>
            </div>
    
        </b></div><b>
        </b></div><b></b>
    </section>
@endsection