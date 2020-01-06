<?php
use App\Http\Controllers\ServiceManagement;
?>
<?php echo $__env->make('agent.includes.top-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
    .book_card {
    border: 1px solid gainsboro;
    -ms-filter: "progid:DXImageTransform.Microsoft.Shadow(Strength=31, Direction=117, Color=#E3E3E3)";
    -moz-box-shadow: 3px 6px 31px 5px #E3E3E3;
    -webkit-box-shadow: 3px 6px 31px 5px #E3E3E3;
    box-shadow: 3px 6px 31px 5px #E3E3E3;
    filter: progid:DXImageTransform.Microsoft.Shadow(Strength=31, Direction=135, Color=#E3E3E3);
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
    background: #4CAF50;
    /* border-top-left-radius: 5px; */
    /* border-top-right-radius: 5px; */
    color: white;
    padding: 10px 15px;
    border: 1px solid #4caf50;
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
.form-div{
    border: 1px solid gainsboro;
    padding: 15px;
}
.form-div input, .form-div select {
    border-radius: 0;
    border-color: #c8c8c8;
    /* background: #f3f3f3; */
}
</style>

<body class="hold-transition light-skin sidebar-mini theme-rosegold onlyheader">

<div class="wrapper">

<?php echo $__env->make('agent.includes.top-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="content-wrapper">

    <div class="container-full clearfix position-relative">	

<?php echo $__env->make('agent.includes.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	<div class="content">



    <div class="content-header">

        <div class="d-flex align-items-center">

            <div class="mr-auto">

                <h3 class="page-title">Book Itinerary</h3>

                <div class="d-inline-block align-items-center">

                    <nav>

                        <ol class="breadcrumb">

                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>

                            <li class="breadcrumb-item" aria-current="page">Home

                            <li class="breadcrumb-item active" aria-current="page">Book Itinerary

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
            <form id="itinerary_booking_form" method="post" action="<?php echo e(route('confirm-itinerary-booking')); ?>">
                 <?php echo e(csrf_field()); ?>

             <div class="row mb-20" style="margin-bottom:60px !important">
                <div class="col-md-7">
                    <h4>Enter customer information in order to complete the booking</h4>
                    <div class="form-div">
                            <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
            
                                        <div class="form-group">
                                            <label for="customer_name">CUSTOMER NAME <span class="asterisk">*</span></label>
                                            <input type="text" placeholder="CUSTOMER NAME"class="form-control" id="customer_name" name="customer_name" required="required">
            
            
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12">
            
                                        <div class="form-group">
                                            <label for="customer_name">EMAIL<span class="asterisk">*</span></label>
                                            <input type="email" placeholder="CUSTOMER EMAIL"class="form-control" id="customer_email" name="customer_email" required="required">
            
            
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12">
            
                                        <div class="form-group">
                                            <label for="customer_name">PHONE<span class="asterisk">*</span></label>
                                            <input type="text" placeholder="CUSTOMER PHONE" class="form-control" id="customer_phone" name="customer_phone" required="required">
            
            
                                        </div>
                                    </div>
            
                                     <div class="col-sm-12 col-md-12 col-lg-12">
            
                                        <div class="form-group">
                                            <label for="customer_name">COUNTRY<span class="asterisk">*</span></label>
                                            <select class="form-control" id="customer_country" name="customer_country" required="required">
                                                <option value="">SELECT COUNTRY</option>
                                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($country->country_id); ?>"><?php echo e($country->country_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
            
            
                                        </div>
                                    </div>
                                     <div class="col-sm-12 col-md-12 col-lg-12">
            
                                     <div class="form-group">
                                            <label for="customer_address">ADDRESS<span class="asterisk">*</span></label>
                                            <textarea placeholder="ADDRESS" class="form-control" id="customer_address" name="customer_address" required="required"></textarea>
            
            
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12">
            
                                     <div class="form-group">
                                            <label for="customer_remarks">REMARKS</label>
                                            <textarea placeholder="REMARKS" class="form-control" id="customer_remarks" name="customer_remarks"></textarea>
            
            
                                        </div>
                                    </div>
            
                                </div>
                                <?php
                              
                                $booking_details=serialize($booking_array);
                                echo "<input type='hidden' name='booking_details' value='".$booking_details."'>";
                                ?> 
                              
                                <div class="book_btn">
                                    <button  type="submit" id="hotel_book_btn" style="margin-left: auto;display: block;margin-right: 0 !important;border-radius: 5px;" class="btn btn-rounded btn-primary mr-10">CONFIRM BOOKING</button>
                                </div>         
                    </div>
                    

                  
                </div>
                <div class="col-md-1">
                </div>
                 <div class="col-md-4">
            <div class="book_card">
                <div class="booking_label">
                    <p class="country_name ng-binding">PROCESS ORDER</p>
                </div>

                <div class="booking_detail">
                     <div class="hotel_detail">
                        <p class="hotel_desc"><?php echo e($get_itinerary->itinerary_tour_name); ?> (<?php echo e($get_itinerary->itinerary_tour_days); ?> Nights)</p>
                        <p class="para"><b> Passenger Count : </b><?php echo e($booking_array['booking_adult_count']); ?> Pax</p>
                          <p class="para"><b>From Date : </b><?php echo e(date('d F,Y',strtotime($booking_array['booking_from_date']))); ?></p>
                           <p class="para"><b>To Date : </b><?php echo e(date('d F,Y',strtotime($booking_array['booking_to_date']))); ?></p>

                    </div>
                    <br>
                    <br>
                    <br>
            
                    <div class="">
                            <div class="row">
                                <div class="col-md-5">
                                    <label for="total_price"><strong>TOTAL : </strong></label>
                             </div>
                             <div class="col-md-7">
                             <span id="total_price_text"><?php echo e($booking_array['itinerary_currency']); ?> <?php echo e($booking_array['booking_amount']); ?></span>
                                

                            </div>


                        </div>

                </div>
               

                  

                </div>
            </div>
       
               
                </div>
                 
    </div>
    </form>
           
                
              
          </div>
      </div>
   </div>

</div>

</div>

</div>



<?php echo $__env->make('agent.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('agent.includes.bottom-footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tqfproco/crm.traveldoor.ge/resources/views/agent/itinerary-booking.blade.php ENDPATH**/ ?>