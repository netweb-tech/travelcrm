<?php
use App\Http\Controllers\ServiceManagement;
?>
@include('mains.includes.top-header')

<style>
    
    .carousel-item img {
        height: 100%;
    }

    .carousel-item {
        height: 100%;
    }

    p.start_price {
        margin: 0;
    }

    p.country_name.ng-binding {
        font-size: 20px;
        margin: 0;
    }

    .book_card {
        /* padding: 15px; */
        background: #fefeff;
        box-shadow: 0 10px 15px -5px rgba(0, 0, 0, 0.07);
        margin-bottom: 50px;

        border-radius: 5px;
    }

    .hotel_detail {
        height: 150px;
    }

    a.moredetail.ng-scope {
        background: gainsboro;
        padding: 7px 10px;
        /* margin-bottom: 10px; */
    }

    .booking_label {
        background: #5d53ce;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        color: white;
        padding: 10px 15px;
    }

    .booking_detail {
        padding: 15px;
    }

    a.btn.btn-outline.btn-circle.book_btn1 {
        background: #E91E63;
        border-radius: 5px !IMPORTANT;
        padding: 5px 20px;
        width: auto !important;
        height: auto;
        line-height: 2;
        color: white;
    }

    td p {
        margin: 0;
    }

    td {
        background: gainsboro;
    }

    table {
        border-collapse: separate;
    }

    .panel-group .panel-heading+.panel-collapse>.panel-body {
        border-top: 1px solid #59d25a;
    }

    a.panel-title {
        position: relative !important;
        background: #dfffe3;
        color: green !important;
        padding: 13px 20px 13px 85px !important;
        /* border-bottom: 1px solid #3ca23d; */
    }
.panel-title {
    display: block;
    margin-top: 0;
    margin-bottom: 0;
    padding: 1.25rem;
    font-size: 18px;
    color: #4d4d4d;
    height: 48px;
}
    .panel-group .panel-heading+.panel-collapse>.panel-body {
        border-top: none !important;
    }

    .panel-body {
        background: white;
        /* border: 1px solid #59d25a; */
        padding: 10px !important;
    }

    a.panel-title:before {
        content: attr(title) !important;
        position: absolute !important;
        top: 0px !important;
        opacity: 1 !important;
        left: 0 !important;
        padding: 12px 10px;
           width: auto;
    max-width: 250px;
        text-align: center;
        color: white;
        font-family: inherit !important;
        height: 48px;
        background: #279628;
        z-index: 999;
        transform: none !important;
    }

    .tab-content {
        margin-top: 10px;
    }

    div.panel-heading {
        border: 1px solid #59d25a !important;
    }

    .panel {
        border-top: none !important;
        margin-bottom: 5px !important;
    }
div#carousel-example-generic-captions {
    width: 100%;
}
</style>

<body class="hold-transition light-skin sidebar-mini theme-rosegold onlyheader">

<div class="wrapper">

@include('supplier.includes.top-nav')

<div class="content-wrapper">

    <div class="container-full clearfix position-relative">	

@include('mains.includes.nav')

	<div class="content">



    <div class="content-header">

        <div class="d-flex align-items-center">

            <div class="mr-auto">

                <h3 class="page-title">My Bookings</h3>

                <div class="d-inline-block align-items-center">

                    <nav>

                        <ol class="breadcrumb">

                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>

                            <li class="breadcrumb-item" aria-current="page">Home</li>

                            <li class="breadcrumb-item active" aria-current="page">My Bookings

                            </li>

                        </ol>

                    </nav>

                </div>

            </div>

            <!-- <div class="right-title">

                <div class="dropdown">

                    <button class="btn btn-outline dropdown-toggle no-caret" type="button" data-toggle="dropdown"><i

                            class="mdi mdi-dots-horizontal"></i></button>

                    <div class="dropdown-menu dropdown-menu-right">

                        <a class="dropdown-item" href="#"><i class="mdi mdi-share"></i>Activity</a>

                        <a class="dropdown-item" href="#"><i class="mdi mdi-email"></i>Messages</a>

                        <a class="dropdown-item" href="#"><i class="mdi mdi-help-circle-outline"></i>FAQ</a>

                        <a class="dropdown-item" href="#"><i class="mdi mdi-settings"></i>Support</a>

                        <div class="dropdown-divider"></div>

                        <button type="button" class="btn btn-rounded btn-success">Submit</button>

                    </div>

                </div>

            </div> -->

        </div>

    </div>

   <div class="row">
      <div class="box">
          <div class="box-body">
            <div class="row">
            <div class="col-md-12 table-responsive">
                <table id="example1" class="table table-striped">
                    <thead>
                        <tr>
                            <td>Booking ID</td>
                            <td>Booking Type</td>
                            <td>Type Name</td>
                            <td>Agent</td>
                            <td>Supplier</td>
                            <td>Customer Name</td>
                            <td>Customer Email</td>
                            <td>Customer Mobile</td>
                            <td>Booking Date</td>
                            <td>Total Amount</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($fetch_bookings as $bookings)
                        <tr>
                            <td>{{$bookings->booking_id}}</td>
                            <td>{{ucwords($bookings->booking_type)}}</td>
                             <td>@php

                                $booking_type_id=$bookings->booking_type_id;
                                if($bookings->booking_type=="activity")
                                {
                                      $fetch_activity=ServiceManagement::searchActivity($booking_type_id);

                                echo $fetch_activity['activity_name'];

                                }
                                else
                                {
                                    $fetch_hotel=ServiceManagement::searchHotel($booking_type_id);

                                echo $fetch_hotel['hotel_name'];
                                }
                           
                             @endphp</td>
                             
                             <td>@php
                                $fetch_agent=ServiceManagement::searchAgent($bookings->booking_agent_id);
                                echo $fetch_agent['agent_name'];
                             @endphp</td>
                             <td>@php
                                $fetch_supplier=ServiceManagement::searchSupplier($bookings->booking_supplier_id);
                                echo $fetch_supplier['supplier_name'];
                             @endphp</td>
                            <td>{{$bookings->customer_name}}</td>
                            <td>{{$bookings->customer_email}}</td>
                             <td>{{$bookings->customer_contact}}</td>
                              <td>{{$bookings->booking_date}}</td>

                               <td>{{$bookings->booking_currency}} {{$bookings->booking_amount}}</td>
                               <td><a href="javascript:void(0)" class="btn btn-rounded btn-primary btn-sm">View</a></td>


                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
        
      </div>
   </div>

</div>

</div>

</div>
</div>
</div>


@include('mains.includes.footer')

@include('mains.includes.bottom-footer')
</body>
</html>
