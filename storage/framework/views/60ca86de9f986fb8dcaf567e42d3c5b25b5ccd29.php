<?php
use App\Http\Controllers\ServiceManagement;
?>
<?php echo $__env->make('agent.includes.top-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<style>
    .hotel-div {
        width: 80%;
        float: left;

        display: flex;
        background: white;
    }

    .hotel-list-div {
        display: block;

        border-radius: 5px;
        position: relative;
        /* clear: both; */
        height: 101%;
    }

    .hotel-img-div {

        width: 40% !important;
        float: left;
    }

    .hotel-details {
        float: left;
        width: 60%;
        padding: 0 15px;
    }

    .hotel-info-div {
        width: 20%;
        float: left;


        text-align: right;
        height: 100%;
    }

    .checked {
        color: orange;
    }

    span.hotel-s {
        border: 1px solid #F44336;
        padding: 2px 5px;
        display: inline-block;
        color: #f44336;
        font-size: 12px;
        margin: 0 10px 0 0;
    }

    p.hotel-name {
        font-size: 16px;
        margin: 10px 0 0;
        color: black;
        float: left;
    }


    .rate-no {
        float: right;
    }

    .rate-no {
        float: right;
        display: block;
        margin-top: 14px;
        background: #2d3134;
        color: white;
        padding: 1px 8px;
        font-size: 12px;
        border-radius: 5px;
    }

    .heading-div {
        clear: both;
    }

    .rating {
        display: block;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    p.r-number {
        float: right;
    }

    p.time-info {
        color: #4CAF50;
    }

    p.info {
        clear: both;
        margin: 0;
    }

    span.tag-item {
        background: #ffcbcd;
        padding: 5px 10px;
        border-radius: 5px;
        color: #ff4e54;
    }

    .inclusions {
        margin: 20px 0;
    }

    span.inclusion-item {
        padding: 10px 10px 0 0;
        color: #644ac9;
    }

    img.icon-i {
        width: auto;
        height: 20px;
    }

    p.include-p {
        color: black;
    }

    .inclusion-p {
        color: green
    }

    p.price-p span {
        background: #ee2128;
        color: white;
        padding: 3px 5px 3px 9px;
        border-radius: 5px;
        position: relative;
        z-index: 9999;
        border-top-right-radius: 5px;
        border-bottom-right-radius: 5px;
        margin-left: 20px;
        border-bottom-left-radius: 4px;
        font-size: 12px;
    }

    p.price-p span:before {
        content: "";
        width: 15px;
        height: 14.5px;
        background: #ee2128;
        position: absolute;
        transform: rotate(45deg);
        top: 3.5px;
        left: -6px;
        border-radius: 0px 0px 0px 3px;
        z-index: -1;
    }

    p.price-p span:after {
        content: "";
        background: white;
        width: 4px;
        height: 4px;
        position: absolute;
        top: 50%;
        left: 0px;
        transform: translateY(-50%);
        border-radius: 50%;
    }

    p.price-p {
        color: #ee2128;
    }

    p.tax {
        font-size: 12px;
        margin: 0;
    }

    p.days {
        font-size: 12px;
        margin: 0;
    }

    p.offer {
        font-size: 25px;
        color: black;
        font-weight: bold;
        margin: 0;
    }

    p.cut-price {
        margin: 0;
        text-decoration: line-through;
        font-size: 19px;
    }

    .login-a {
        color: #0088ff;
        font-size: 14px;
        font-weight: 600;
        margin-top: 10px;
        display: block;
    }

    @media  screen and (max-width:1200px) {
        p.hotel-name {
            font-size: 15px;
            margin: 10px 0 0;
            color: black;
            float: left;
        }

        p.r-number {
            float: right;
            font-size: 12px;
        }

        span.inclusion-item {
            padding: 10px 10px 0 0;
            color: #644ac9;
            display: block;
        }

        p.cut-price {
            margin: 0;
            text-decoration: line-through;
            font-size: 16px;
        }

        p.offer {
            font-size: 20px;
            color: black;
            font-weight: bold;
            margin: 0;
        }

        .login-a {
            color: #0088ff;
            font-size: 13px;
            font-weight: 600;
            margin-top: 10px;
            display: block;
        }
    }

    @media  screen and (max-width:1200px) {
        .hotel-div {
            width: 100%;
            float: left;

            display: flex;
            background: white;
        }

        .hotel-info-div {
            width: 100%;
            height: 100%;
            float: left;



            text-align: left;
        }

        span.inclusion-item {
            padding: 10px 10px 0 0;
            color: #644ac9;
            display: inline;
        }
    }

    @media  screen and (max-width:992px) {
        p.hotel-name {
            font-size: 17px;
            margin: 10px 0 0;
            color: black;
            float: none;
        }

        .rate-no {
            float: none;
            display: inline;
            margin-top: 14px;
            background: #2d3134;
            color: white;
            padding: 1px 8px;
            font-size: 12px;
            border-radius: 5px;
        }

        .rating {
            display: block;
            float: none;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        p.r-number {
            float: none;
            font-size: 12px;
        }

        .hotel-details {
            float: none !important;
            width: 100% !important;
            padding: 0 15px;
            margin-top: 20px;
        }

        .hotel-list-div {
            display: block;

            border-radius: 5px;
            position: relative;
            /* clear: both; */
            height: 101%;
        }

        .hotel-div {
            width: 100%;
            float: none;

            display: block;
            background: white;
        }

        .hotel-img-div {
            width: 100% !important;
            float: none !important;
            display: block !important;
        }

        a.flex-prev,
        a.flex-next {
            display: none;
        }

        span.inclusion-item {
            padding: 10px 10px 0 0;
            color: #644ac9;
            display: block;
        }
    }
</style>
<style>
        .packagePriceContainer {
            border: 1px solid gainsboro;
            border-radius: 5px;
        }

        .flexOne {
            background: #c7fffa;
            padding: 10px;
            border-radius: 5px;
            color: #009688;
        }

        .flexOne p {
            margin-bottom: 5px;
        }

        p.oldPrice {
            text-decoration: line-through;
            font-size: 17px;
            color: #6b6b6b;
            margin-bottom: 0;
        }

        p.c-price {
            color: #852d94;
            font-size: 24px;
            margin-bottom: 0;
        }

        span.font12 {
            font-size: 13px;
            margin-left: 5px;
            color: #616161;
        }

        .priceContainer {
            padding: 10px;
        }

        .wdth70 {
            position: absolute;
            top: 20px;
            right: 36px;
            background: #77d6cd;
            color: white;
            font-size: 12px;
            padding: 5px;
        }

        .viewOffers {
            /* margin-top: 10px; */
            padding: 0 15px;
            border-bottom: 1px solid gainsboro;
        }

        button#bookMyPackage {
            background: #009688;
            color: white;
            padding: 8px 15px;
            display: block;
            width: 120px;
            margin: 13px auto;
            text-align: center;
            border-radius: 21px;
            cursor: pointer;
        }

        img.h-img {
            width: 100%;
            height: 100%;
            border: 1px solid gainsboro;
            border-radius: 5px;
        }

        .viewOffers a {
            color: #59c789;
            font-size: 16px;
        }

        h4.head {
            margin-top: 16px;
            font-size: 22px;
            color: #009688;
        }

        p.itenerary {
            border-bottom: 2px solid #359ff4;
            font-size: 21px;
            color: #2196F3;
        }

        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            color: #009688;
            background-color: #ffffff;
            border-radius: 50px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);

        }

        a.nav-link {
            border-radius: 50px !IMPORTANT;
            margin-right: 10px;
            padding: 6px 21px;
            text-align: center;
            font-size: 16px;
        }

        .tab-content {
            margin-top: 20px;
        }

        .t-tab {
            border: 1px solid gainsboro;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 30px;
            margin-left: 25px;
            margin-top: 20px;
        }

        p.days {
            color: black;
            font-size: 18px;
            font-weight: 700;
        }

        p.title-1 {
            margin-bottom: 0;
            color: black;
            font-size: 16px;
        }

        p.title-2 {
            color: black;
            margin-bottom: 5px;
        }

        p.p-i {
            color: black;
        }

        span.span-i {
            color: gray;
            font-size: 12px;
        }

        a.remove {
            color: #359ff4;
            font-weight: 600;


        }

        a.chng {
            color: #359ff4;
            font-weight: 600;
        }

        .change {
            display: flex;
            justify-content: space-between;
        }

        .hr {
            border-right: 2px solid gainsboro;
        }

        .heading-div.c-h-div {
            display: flex;
            justify-content: space-between;
        }
        .t-div {
            display: inline-block;
            background: #fff2ca;
            padding: 10px;
            width: auto;
            border-radius: 10px;
        }
        p.country {
            min-width: 150px;
            margin-bottom: 0;
            font-size: 20px;
            color: #e3aa00;
        }
        p.city {
            margin-bottom: 0;
            font-size: 16px;
            color: #b98a00;
        }
        .d-label
        {
                background: #303046;
    color: white;
    padding: 5px 10px;
    margin-bottom: 15px;
    border-radius: 3px;
        }
     .relative.latoBold.font16.lineHeight18.appendBottom20 {
    color: #ffffff;
    font-size: 18px;
    background: #199a8d;
    text-transform: uppercase;
    font-weight: 600;
    /* text-indent: 13px; */
    letter-spacing: 1px;
    /* border-bottom: 2px solid #e1e1e1; */
    padding-bottom: 5px;
    /* margin-bottom: 15px; */
    display: inline-block;
    text-align: center;
    padding: 10px;
}
.accordContent {
    background: #c7fffa;
    padding: 15px;
    margin-bottom: 30px;
}
hr.h-hr {
    border-bottom: 1px solid gainsboro !important;
    display: block;
    width: 100%;
    margin-bottom: 30px;
}
label#add_more_rooms
{
    font-size: 12px;
    cursor:pointer;
}
label.remove_more_rooms
{
    font-size: 11px;
    cursor:pointer;
}
div.modal {
    z-index: 9999;
}
div#demo {
    margin-top: 25px;
    height: 300px;
}
.carousel-inner {
    height: 100%;
}
.carousel-item {
    height: 100%;
}
button#go_back_btn {
    background: #ffcbda;
    border: 1px solid #ffbed0;
    color: #c51e4e;
    border-radius: 0;
}
h2.title {
    margin: 0;
}
p.paragraph {
    margin: 0;
}
h3.amenty-title {
    font-size: 18px;
}
p.blackfont {
    margin: 0;
}
.go-icon {
    font-size: 20px;
    margin-right: 10px;
}
span.text-lt {
    max-width: 55%;
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

                                <h3 class="page-title">Itinerary Details</h3>

                                <div class="d-inline-block align-items-center">

                                    <nav>

                                        <ol class="breadcrumb">

                                            <li class="breadcrumb-item"><a href="#"><i
                                                        class="mdi mdi-home-outline"></i></a></li>

                                            <li class="breadcrumb-item" aria-current="page">Home </li>

                                            <li class="breadcrumb-item active" aria-current="page">Itinerary Details

                                            </li>

                                        </ol>

                                    </nav>

                                </div>

                            </div>

                                </div>
                            </div>
                             <div class="row">
        <div class="col-12">
            <form action="<?php echo e(route('itinerary-booking')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

            <div class="box">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-7">
                                    <img class="h-img"
                                        src="https://imgak.mmtcdn.com/hp-images/new/cities/6555/phuket12_520x194.jpg">
                                </div>
                                <div class="col-md-5">
                                    <img class="h-img"
                                        src="https://imgak.mmtcdn.com/hp-images/new/cities/6555/phuket10_520x194.jpg">
                                </div>
                               
                                   <?php
                                   $total_whole_itinerary_cost=0;
                                   ?>
                                <div class="col-md-12">
                                    <h4 class="head"><?php echo e($get_itinerary->itinerary_tour_name); ?></h4>
                                    <p class="des"><?php echo $get_itinerary->itinerary_tour_description; ?>
                                    </p>
                                     <div class="row">
                                     <div class="col-12 col-sm-6 col-md-6 col-lg-6" style="display:none">
                                      <label class="d-label"> <span><i class="fa fa-calendar"></i> Dates</span> - <span id="date_pik"><?php
                                        echo date('D, d M Y',strtotime($itinerary_date_from))." - ".date('D, d M Y',strtotime("+".($get_itinerary->itinerary_tour_days-1)." days",strtotime($itinerary_date_from)));
                                      ?></span></label>
                                     
                                         </div>

                                          <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                               <label class="d-label"> <span><i class="fa fa-car"></i>  Itinerary </span> - <?php echo e($get_itinerary->itinerary_tour_days); ?> <?php if($get_itinerary->itinerary_tour_days>1): ?> Nights <?php else: ?> Night <?php endif; ?> <?php echo e(($get_itinerary->itinerary_tour_days+1)); ?> 

                                                <?php $tour_days=$get_itinerary->itinerary_tour_days+1; ?> <?php if($tour_days>1): ?> Days <?php else: ?> Day <?php endif; ?></label>
                                         <!--   <label> <span><i class="fa fa-users"></i> Travellers</span> - 3 Adults, 0 Child</label> -->
                                         <input type="hidden" name="itinerary_id" value="<?php echo e($get_itinerary->itinerary_id); ?>">
                                          <input type="hidden" name="itinerary_tour_name" value="<?php echo e($get_itinerary->itinerary_tour_name); ?>">
                                         <input type="hidden" name="from_date" value="<?php echo e(date('Y-m-d',strtotime($itinerary_date_from))); ?>">
                                            <input type="hidden" name="to_date" value="<?php echo date('Y-m-d',strtotime("+".($get_itinerary->itinerary_tour_days)." days",strtotime($itinerary_date_from))) ?>">
                                         </div>

                                      </div>
                                    <p class="itenerary">ITINERARY</p>
                                    <ul class="nav nav-pills">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="pill" href="#all">Day Plan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#Hotels">Hotels</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#Activity">Activity</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#Site">Sight Seeing</a>
                                        </li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane container active" id="all">
                                            <?php
                                            $itinerary_package_countries=explode(",",$get_itinerary->itinerary_package_countries);
                                            $itinerary_package_cities=explode(",",$get_itinerary->itinerary_package_cities);
                                            $itinerary_package_title=unserialize($get_itinerary->itinerary_package_title);
                                            $itinerary_package_description=unserialize($get_itinerary->itinerary_package_description);
                                            $itinerary_package_services=unserialize($get_itinerary->itinerary_package_services);

                                            ?>
                                            <?php for($days_count=0;$days_count<$get_itinerary->itinerary_tour_days;$days_count++): ?>
                                            <div class="day-count">
                                                <p class="days">Day <?php echo e(($days_count+1)); ?> - <?php echo e($itinerary_package_title[$days_count]); ?></p>
                                                <p class="des"><?php echo $itinerary_package_description[$days_count]; ?>
                                                </p>
                                                <div class="t-div">
                                                    <p class="country">
                                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($country->country_id==$itinerary_package_countries[$days_count]): ?>
                                                        <?php echo e($country->country_name); ?>

                                                        <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <input type="hidden" id="days_country__<?php echo e(($days_count+1)); ?>" value="<?php echo e($itinerary_package_countries[$days_count]); ?>">



                                                   </p>
                                                     <p class="city"><?php 
                                                     $fetch_city_name=ServiceManagement::searchCities($itinerary_package_cities[$days_count],$itinerary_package_countries[$days_count]);
                                                     echo $fetch_city_name['name'];
                                                     ?> </p>
                                                      <input type="hidden" id="days_city__<?php echo e(($days_count+1)); ?>" value="<?php echo e($itinerary_package_cities[$days_count]); ?>">
                                                      <?php $days_date=date('Y-m-d',strtotime("+".($days_count)." days",strtotime($itinerary_date_from))); ?>
                                                      <input type="hidden" name="days_dates[]" value="<?php echo e($days_date); ?>">
                                                </div>
                                                <?php if($itinerary_package_services[$days_count]['hotel']['hotel_no_of_days']!="0"): ?>
                                                <div class="t-tab">
                                                    <div class="row">
                                                        <?php
                                                        $fetch_hotel=ServiceManagement::searchHotel($itinerary_package_services[$days_count]['hotel']['hotel_id']);

                                                        $hotel_images=unserialize($fetch_hotel['hotel_images']);
                                                  ?>  
                                                        <div class="col-md-12 hotels_select" id="hotels_select__<?php echo e(($days_count+1)); ?>" style="margin:0 0 25px">
                                                           <a href="<?php echo e(route('hotel-detail',['hotelid'=>base64_encode($fetch_hotel['hotel_id'])])); ?>" target="_blank" style="display: block;">
                                                                <div class="hotel-list-div">
                                                                    <div class="hotel-div">
                                                                        <div class="hotel-img-div">
                                                                            <?php if(!empty($hotel_images[0])): ?>
                                                                            <img class="cstm-hotel-image" src="<?php echo e(asset('assets/uploads/hotel_images')); ?>/<?php echo e($hotel_images[0]); ?>"
                                                                                style="width:100%">
                                                                                <?php else: ?>
                                                                                  <img class="cstm-hotel-image" src="<?php echo e(asset('assets/images/no-photo.png')); ?>"
                                                                                style="width:100%">
                                                                                <?php endif; ?>

                                                                        </div>
                                                                        <div class="hotel-details">
                                                                            <div class="ens">
                                                                                <div class="rating cstm-hotel-rating"
                                                                                    style="display:inline-block;">
                                                                                    <?php for($stars=1;$stars<=$fetch_hotel['hotel_rating'];$stars++): ?>
                                                                                    <span
                                                                                        class="fa fa-star checked"></span>
                                                                                    <?php endfor; ?>

                                                                                </div>
                                                                            </div>

                                                                            <div class="heading-div">
                                                                                <p class="hotel-name cstm-hotel-name"><?php echo $fetch_hotel['hotel_name'] ?></p>

                                                                            </div>


                                                                            <p class="info cstm-hotel-address"><?php echo $fetch_hotel['hotel_address'] ?></p>
                                                                          <div class="heading-div c-h-div">
                                                                                <div class="rating">
                                                                                    <br> 
                                                                                    <span class="span-i">Checkin Date</span>
                                                                                    <p class="title-2"><?php echo date('D, d M Y',strtotime("+".($days_count)." days",strtotime($itinerary_date_from)));
                                                                                    $checkin_date=date('Y-m-d',strtotime("+".($days_count)." days",strtotime($itinerary_date_from))); 
                                                                                   ?>

                                                                                       </p>
                                                                                       <span class="span-i">Checkout Date</span>
                                                                                    <p class="title-2"><?php 
                                                                                    echo date('D, d M Y',strtotime("+".($itinerary_package_services[$days_count]['hotel']['hotel_no_of_days'])." days",strtotime($checkin_date)));

                                                                                     $checkout_date=date('Y-m-d',strtotime("+".($itinerary_package_services[$days_count]['hotel']['hotel_no_of_days'])." days",strtotime($checkin_date))); 
                                                                                 ?>
                                                                                       </p>
                                                                                       
                                                                                   </div>
                                                                                <!--  <div>
                                                                                    <span class="span-i">INCLUDES</span>
                                                                                    <p class="title-2">Breakfast</p>
                                                                                </div> -->

                                                                            </div>
                                                                            <span class="span-i">ROOM TYPE</span>
                                                                            <p class="title-2 cstm-hotel-room-type"><?php echo e($itinerary_package_services[$days_count]['hotel']['room_name']); ?> </p>
                                                                             <input type="hidden" class="hotel_id" id="hotel_id__<?php echo e(($days_count+1)); ?>" name="hotel_id[<?php echo e($days_count); ?>]" value="<?php echo e($fetch_hotel['hotel_id']); ?>">
                                                                            <input type="hidden" class="hotel_name" id="hotel_name__<?php echo e(($days_count+1)); ?>" name="hotel_name[<?php echo e($days_count); ?>]" value="<?php echo e($fetch_hotel['hotel_name']); ?>">
                                                                              <input type="hidden" class="room_name" id="room_name__<?php echo e(($days_count+1)); ?>" name="room_name[<?php echo e($days_count); ?>]" value="<?php echo e($itinerary_package_services[$days_count]['hotel']['room_name']); ?>">
                                                                            <input type="hidden" class="calc_cost hotel_cost"  id="hotel_cost__<?php echo e(($days_count+1)); ?>" name="hotel_cost[<?php echo e($days_count); ?>]" value="<?php echo e(($itinerary_package_services[$days_count]['hotel']['hotel_cost']*$itinerary_package_services[$days_count]['hotel']['hotel_no_of_days'])); ?>">
                                                                            <input type="hidden" class="hotel_no_of_days" id="hotel_no_of_days__<?php echo e(($days_count+1)); ?>" name="hotel_no_of_days[<?php echo e($days_count); ?>]" value="<?php echo e($itinerary_package_services[$days_count]['hotel']['hotel_no_of_days']); ?>">
                                                                              <input type="hidden" class="hotel_checkin" id="hotel_checkin__<?php echo e(($days_count+1)); ?>" name="hotel_checkin[<?php echo e($days_count); ?>]" value="<?php echo e($checkin_date); ?>">
                                                                                <input type="hidden" class="hotel_checkout" id="hotel_checkout__<?php echo e(($days_count+1)); ?>" name="hotel_checkout[<?php echo e($days_count); ?>]" value="<?php echo e($checkout_date); ?>">
                                                                            <?php 
                                                                            $total_whole_itinerary_cost+=($itinerary_package_services[$days_count]['hotel']['hotel_cost']*$itinerary_package_services[$days_count]['hotel']['hotel_no_of_days']);
                                                                            ?>

                                                                        </div>
                                                                    </div>
                                                                    <div class="hotel-info-div">
                                                                        <a href="#" class="login-a change_hotel" id="change_hotel__<?php echo e($days_count+1); ?>">Change</a>
                                                                    </div>

                                                                </div>

                                                            </a>

                                                        </div>


                                                    </div>
                                                </div>
                                                <?php endif; ?>
                                                <?php if(!empty($itinerary_package_services[$days_count]['sightseeing']['sightseeing_id'])): ?>
                                                <div class="t-tab">
                                                    <div class="row">
                                                        <?php
                                                        $fetch_sightseeing=ServiceManagement::searchSightseeingTourName($itinerary_package_services[$days_count]['sightseeing']['sightseeing_id']);

                                                        $sightseeing_images=unserialize($fetch_sightseeing['sightseeing_images']);
                                                        ?>
                                                        <div class="col-md-12 sightseeing_select" id="sightseeing_select__<?php echo e(($days_count+1)); ?>" style="margin:0 0 25px">
                                                            <a href="<?php echo e(route('sightseeing-details-view',['sightseeing_id'=>base64_encode($fetch_sightseeing['sightseeing_id'])])); ?>" target="_blank" style="display: block;">
                                                                <div class="hotel-list-div">
                                                                    <div class="hotel-div">
                                                                        <div class="hotel-img-div">
                                                                            <?php if(!empty($sightseeing_images[0])): ?>
                                                                            <img class="cstm-sightseeing-image" src="<?php echo e(asset('assets/uploads/sightseeing_images')); ?>/<?php echo e($sightseeing_images[0]); ?>"
                                                                                style="width:100%">
                                                                                <?php else: ?>
                                                                                  <img  class="cstm-sightseeing-image" src="<?php echo e(asset('assets/images/no-photo.png')); ?>"
                                                                                style="width:100%">
                                                                                <?php endif; ?>

                                                                        </div>
                                                                        <div class="hotel-details">
                                                                            <div class="heading-div">
                                                                                <p class="hotel-name cstm-sightseeing-name"><?php echo $fetch_sightseeing['sightseeing_tour_name'] ?> (<?php echo $fetch_sightseeing['sightseeing_distance_covered'] ?> KMS)</p>

                                                                            </div>


                                                                            <p class="info"></p>
                                                                              <p class="address cstm-sightseeing-address"><i class="fa fa-map-marker"></i>
                                                                        <?php
                                                                         $get_from_city=ServiceManagement::searchCities($fetch_sightseeing['sightseeing_city_from'],$itinerary_package_countries[$days_count]);
                                                                                       echo $get_from_city['name']."-";

                                                                                        if($fetch_sightseeing['sightseeing_city_between']!=null && $fetch_sightseeing['sightseeing_city_between']!="")
                                                                                        {
                                                                                       $all_between_cities=explode(",",$fetch_sightseeing['sightseeing_city_between']);
                                                                                       for($cities=0;$cities< count($all_between_cities);$cities++)
                                                                                       {
                                                                                        $fetch_city=ServiceManagement::searchCities($all_between_cities[$cities],$itinerary_package_countries[$days_count]);
                                                                                         echo $fetch_city['name']."-";
                                                                                      }
                                                                                    }
                                                                  
                                                            
                                                                                       $get_from_city=ServiceManagement::searchCities($fetch_sightseeing['sightseeing_city_to'],$itinerary_package_countries[$days_count]);
                                                                                        echo  $get_from_city['name'];

                                                                        ?>
                                                                </p>
                                                                          <div class="heading-div c-h-div">
                                                                                <div class="rating">
                                                                                    <br>  
                                                                                    <span class="span-i">DATE</span>
                                                                                    <p class="title-2"><?php echo date('D, d M Y',strtotime("+".($days_count)." days",strtotime($itinerary_date_from))); ?>
                                                                                       </p>
                                                                                           <?php 
                                                                                           $price=$fetch_sightseeing['sightseeing_adult_cost'];

                                                                                           $price+=round($fetch_sightseeing['sightseeing_food_cost']);
                                                                                           $price+=round($fetch_sightseeing['sightseeing_hotel_cost']);

                                                                                           $total_sightseeing_cost=round($price);
                                                                            $total_whole_itinerary_cost+=($total_sightseeing_cost);
                                                                            ?>
                                                                             <input type="hidden" class="sightseeing_id" id="sightseeing_id__<?php echo e(($days_count+1)); ?>" name="sightseeing_id[<?php echo e($days_count); ?>]" value="<?php echo e($fetch_sightseeing['sightseeing_id']); ?>">
                                                                            <input type="hidden" class="sightseeing_name" name="sightseeing_name[<?php echo e($days_count); ?>]"  id="sightseeing_name__<?php echo e(($days_count+1)); ?>" value="<?php echo e($fetch_sightseeing['sightseeing_tour_name']); ?>">
                                                                            <input type="hidden" class="calc_cost sightseeing_cost" name="sightseeing_cost[<?php echo e($days_count); ?>]" id="sightseeing_cost__<?php echo e(($days_count+1)); ?>" value="<?php echo e($total_sightseeing_cost); ?>">
                                                                                </div>
                                                                                   </div>
                                                                               <!--   <div>
                                                                                    <span class="span-i">INCLUDES</span>
                                                                                    <p class="title-2">Breakfast</p>
                                                                                </div>

                                                                            </div>
                                                                            <span class="span-i">ROOM TYPE</span>
                                                                            <p class="title-2">Superior Room </p> -->

                                                                        </div>

                                                                    </div>
                                                                    <div class="hotel-info-div">
                                                                         <a href="#" class="login-a change_sightseeing" id="change_sightseeing__<?php echo e($days_count+1); ?>">Change</a>

                                                                    </div>

                                                                </div>

                                                            </a>

                                                        </div>

                                                    </div>

                                                </div>
                                                <?php endif; ?>
                                                 <?php if(!empty($itinerary_package_services[$days_count]['activity']['activity_id'][0])): ?>
                                                  <div class="t-tab">
                                                    <?php
                                                        $activity_count=count($itinerary_package_services[$days_count]['activity']['activity_id']);
                                                    ?>
                                                    <?php for($activity_counter=0;$activity_counter < $activity_count;$activity_counter++): ?>
                                                    <div class="row">
                                                        <?php
                                                        $fetch_activity=ServiceManagement::searchActivity($itinerary_package_services[$days_count]['activity']['activity_id'][$activity_counter]);

                                                        $activity_images=unserialize($fetch_activity['activity_images']);
                                                        ?>
                                                        <div class="col-md-12 activity_select" id="activity_select__<?php echo e($days_count+1); ?>__<?php echo e(($activity_counter+1)); ?>" style="margin:0 0 25px">
                                                            <a href="<?php echo e(route('activity-details-view',['activity_id'=>base64_encode($fetch_activity['activity_id'])])); ?>" target="_blank" style="display: block;">
                                                                <div class="hotel-list-div">

                                                                    <div class="hotel-div">
                                                                        <div class="hotel-img-div">
                                                                            <?php if(!empty($activity_images[0])): ?>
                                                                            <img class="cstm-activity-image" src="<?php echo e(asset('assets/uploads/activities_images')); ?>/<?php echo e($activity_images[0]); ?>"
                                                                                style="width:100%">
                                                                                <?php else: ?>
                                                                                  <img class="cstm-activity-image" src="<?php echo e(asset('assets/images/no-photo.png')); ?>"
                                                                                style="width:100%">
                                                                                <?php endif; ?>

                                                                        </div>
                                                                        <div class="hotel-details">
                                                                            <div class="heading-div">
                                                                                <p class="hotel-name cstm-activity-name"> <?php echo e($fetch_activity['activity_name']); ?></p>

                                                                            </div>


                                                                            <p class="info"></p>
                                                                              <p class="address cstm-activity-address"><i class="fa fa-map-marker"></i> <?php echo e($fetch_activity['activity_location']); ?></p>
                                                                            <div class="heading-div c-h-div">
                                                                                <div class="rating">
                                                                                    <br>  
                                                                                    <span class="span-i">DATE</span>
                                                                                    <p class="title-2"><?php echo date('D, d M Y',strtotime("+".($days_count)." days",strtotime($itinerary_date_from))); ?>

                                                                                       </p>
                                                                                        <?php 
                                                                                              $total_activity_cost=round($fetch_activity['adult_price']);
                                                                            $total_whole_itinerary_cost+=($total_activity_cost);
                                                                            ?>
                                                                                         <input type="hidden" class="activity_id" id="activity_id__<?php echo e(($days_count+1)); ?>__<?php echo e(($activity_counter+1)); ?>" name="activity_id[<?php echo e($days_count); ?>][]" value="<?php echo e($fetch_activity['activity_id']); ?>">
                                                                            <input type="hidden" class="activity_name" name="activity_name[<?php echo e($days_count); ?>][]"  id="activity_name__<?php echo e(($days_count+1)); ?>__<?php echo e(($activity_counter+1)); ?>" value="<?php echo e($fetch_activity['activity_name']); ?>">
                                                                                        <input type="hidden" class="calc_cost activity_cost" id="activity_cost__<?php echo e(($days_count+1)); ?>__<?php echo e(($activity_counter+1)); ?>"  
                                                                                        name="activity_cost[<?php echo e($days_count); ?>][]"
                                                                                        value="<?php echo e($total_activity_cost); ?>">
                                                                                             
                                                                                </div>
                                                                                   </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="hotel-info-div">
                                                                         <a href="#" class="login-a change_activity" id="change_activity__<?php echo e($days_count+1); ?>_<?php echo e(($activity_counter+1)); ?>">Change</a>
                                                                    </div>

                                                                </div>

                                                            </a>

                                                        </div>

                                                    </div>
                                                    <?php endfor; ?>
                                                    
                                                </div>
                                                <?php endif; ?>
                                            </div>
                                            <?php endfor; ?>
                                            <div class="day-count">
                                                <p class="days">Day <?php echo e(($days_count+1)); ?> - <?php echo e($itinerary_package_title[$days_count]); ?></p>
                                                <p class="des"><?php echo $itinerary_package_description[$days_count]; ?>
                                                </p>
                                                  <?php $days_date=date('Y-m-d',strtotime("+".($days_count)." days",strtotime($itinerary_date_from))); ?>
                                                      <input type="hidden" name="days_dates[]" value="<?php echo e($days_date); ?>">
                                            </div>
                                            
                                           <!--  <div class="day-count">
                                                <p class="days">Day 2 - Arrival in Phuket</p>
                                                <p class="des">Suited for Couples and Family|A complimentary island tour
                                                    on day 2|
                                                    No “visa on arrival” fee till 30th Oct|Relaxed Itinerary with days
                                                    of Leisure
                                                </p>
                                                <div class="t-tab">
                                                    <div class="row">
                                                        <div class="col-md-12" style="margin:0 0 25px">
                                                            <a href="hotel-detail.php" style="display: block;">
                                                                <div class="hotel-list-div">

                                                                    <div class="hotel-div">
                                                                        <div class="hotel-img-div">

                                                                            <img src="https://r1imghtlak.mmtcdn.com/fa023a780b5f11e9a0ec0242ac110002.jpg?&downsize=*:675&crop=900:675;56,0&output-format=jpg"
                                                                                style="width:100%">
                                                                        </div>
                                                                        <div class="hotel-details">
                                                                            <div class="ens">
                                                                                <span class="hotel-s">4.0/5</span>
                                                                                <div class="rating"
                                                                                    style="display:inline-block;">
                                                                                    <span
                                                                                        class="fa fa-star checked"></span>
                                                                                    <span
                                                                                        class="fa fa-star checked"></span>
                                                                                    <span
                                                                                        class="fa fa-star checked"></span>
                                                                                    <span class="fa fa-star"></span>
                                                                                    <span class="fa fa-star"></span>

                                                                                </div>
                                                                            </div>

                                                                            <div class="heading-div">
                                                                                <p class="hotel-name">Quality Inn Ocean
                                                                                    Palms
                                                                                    Goa</p>

                                                                            </div>


                                                                            <p class="info">Calangute</p>
                                                                            <div class="heading-div c-h-div">
                                                                                <div class="rating">
                                                                                    <span class="span-i">DATES</span>
                                                                                    <p class="title-2">Mon, 16 Mar 2020
                                                                                        -
                                                                                        Fri,
                                                                                        20 Mar 2020</p>
                                                                                </div>
                                                                                <div>
                                                                                    <span class="span-i">INCLUDES</span>
                                                                                    <p class="title-2">Breakfast</p>
                                                                                </div>

                                                                            </div>
                                                                            <span class="span-i">ROOM TYPE</span>
                                                                            <p class="title-2">Superior Room </p>

                                                                        </div>
                                                                    </div>
                                                                    <div class="hotel-info-div">

                                                                        <a href="#" class="login-a">
                                                                            Change</a>

                                                                    </div>

                                                                </div>

                                                            </a>

                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="t-tab">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <img class="t-img"
                                                                src="https://imgak.mmtcdn.com/holidays/images/dynamicDetails/private_transfer.png">
                                                        </div>
                                                        <div class="col-md-5">
                                                            <p class="title-1">Airport to hotel in Phuket</p>
                                                            <p class="title-2"><b>Private Transfer</b></p>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <span class="span-i">DURATION</span>
                                                                    <p class="p-i">2 hrs</p>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <span class="span-i">INCLUDES</span>
                                                                    <p class="p-i">Include Private Transfer</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="change">
                                                                <a href="#" class="remove">Remove</a>
                                                                <span class="hr"></span>
                                                                <a href="#" class="chng">Change</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="t-tab">
                                                    <div class="row">
                                                        <div class="col-md-12" style="margin:0 0 25px">
                                                            <a href="hotel-detail.php" style="display: block;">
                                                                <div class="hotel-list-div">

                                                                    <div class="hotel-div">
                                                                        <div class="hotel-img-div">

                                                                            <img src="https://r1imghtlak.mmtcdn.com/fa023a780b5f11e9a0ec0242ac110002.jpg?&downsize=*:675&crop=900:675;56,0&output-format=jpg"
                                                                                style="width:100%">
                                                                        </div>
                                                                        <div class="hotel-details">
                                                                            <div class="ens">
                                                                                <span class="hotel-s">4.0/5</span>
                                                                                <div class="rating"
                                                                                    style="display:inline-block;">
                                                                                    <span
                                                                                        class="fa fa-star checked"></span>
                                                                                    <span
                                                                                        class="fa fa-star checked"></span>
                                                                                    <span
                                                                                        class="fa fa-star checked"></span>
                                                                                    <span class="fa fa-star"></span>
                                                                                    <span class="fa fa-star"></span>

                                                                                </div>
                                                                            </div>

                                                                            <div class="heading-div">
                                                                                <p class="hotel-name">Quality Inn Ocean
                                                                                    Palms
                                                                                    Goa</p>

                                                                            </div>


                                                                            <p class="info">Calangute</p>
                                                                            <div class="heading-div c-h-div">
                                                                                <div class="rating">
                                                                                    <span class="span-i">DATES</span>
                                                                                    <p class="title-2">Mon, 16 Mar 2020
                                                                                        -
                                                                                        Fri,
                                                                                        20 Mar 2020</p>
                                                                                </div>
                                                                                <div>
                                                                                    <span class="span-i">INCLUDES</span>
                                                                                    <p class="title-2">Breakfast</p>
                                                                                </div>

                                                                            </div>
                                                                            <span class="span-i">ROOM TYPE</span>
                                                                            <p class="title-2">Superior Room </p>

                                                                        </div>
                                                                    </div>
                                                                    <div class="hotel-info-div">

                                                                        <a href="#" class="login-a">
                                                                            Change</a>

                                                                    </div>

                                                                </div>

                                                            </a>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div> -->

                                        </div>
                                        <div class="tab-pane container fade" id="Hotels">
                                            <?php for($days_count=0;$days_count<$get_itinerary->itinerary_tour_days;$days_count++): ?>
                                             <?php if($itinerary_package_services[$days_count]['hotel']['hotel_no_of_days']!="0"): ?>
                                    
                                                
                                            <div class="day-count">
                                                <p class="days">Day <?php echo e(($days_count+1)); ?> - <?php echo e($itinerary_package_title[$days_count]); ?></p>  
                                                <div class="t-tab">
                                                    <div class="row">
                                                        <?php
                                                        $fetch_hotel=ServiceManagement::searchHotel($itinerary_package_services[$days_count]['hotel']['hotel_id']);

                                                        $hotel_images=unserialize($fetch_hotel['hotel_images']);
                                                  ?>  
                                                        <div class="col-md-12 hotels_indiv_select" id="hotels_indiv_select__<?php echo e(($days_count+1)); ?>" style="margin:0 0 25px">
                                                           <a href="<?php echo e(route('hotel-detail',['hotelid'=>base64_encode($fetch_hotel['hotel_id'])])); ?>" target="_blank" style="display: block;">
                                                                <div class="hotel-list-div">
                                                                    <div class="hotel-div">
                                                                        <div class="hotel-img-div">
                                                                            <?php if(!empty($hotel_images[0])): ?>
                                                                            <img class="cstm-hotel-indiv-image" src="<?php echo e(asset('assets/uploads/hotel_images')); ?>/<?php echo e($hotel_images[0]); ?>"
                                                                                style="width:100%">
                                                                                <?php else: ?>
                                                                                  <img class="cstm-hotel-indiv-image" src="<?php echo e(asset('assets/images/no-photo.png')); ?>"
                                                                                style="width:100%">
                                                                                <?php endif; ?>

                                                                        </div>
                                                                        <div class="hotel-details">
                                                                            <div class="ens">
                                                                                <div class="rating cstm-hotel-indiv-rating"
                                                                                    style="display:inline-block;">
                                                                                    <?php for($stars=1;$stars<=$fetch_hotel['hotel_rating'];$stars++): ?>
                                                                                    <span
                                                                                        class="fa fa-star checked"></span>
                                                                                    <?php endfor; ?>

                                                                                </div>
                                                                            </div>

                                                                            <div class="heading-div">
                                                                                <p class="hotel-name cstm-hotel-indiv-name"><?php echo $fetch_hotel['hotel_name'] ?></p>

                                                                            </div>


                                                                            <p class="info cstm-hotel-indiv-address"><?php echo $fetch_hotel['hotel_address'] ?></p>
                                                                          <div class="heading-div c-h-div">
                                                                                <div class="rating">
                                                                                    <br> 
                                                                                    <span class="span-i">Checkin Date</span>
                                                                                    <p class="title-2"><?php echo date('D, d M Y',strtotime("+".($days_count)." days",strtotime($itinerary_date_from)));
                                                                                    $checkin_date=date('Y-m-d',strtotime("+".($days_count)." days",strtotime($itinerary_date_from))); 
                                                                                   ?>
                                                                                       </p>
                                                                                       <span class="span-i">Checkout Date</span>
                                                                                    <p class="title-2"><?php 
                                                                                    echo date('D, d M Y',strtotime("+".($itinerary_package_services[$days_count]['hotel']['hotel_no_of_days'])." days",strtotime($checkin_date)));
                                                                                 ?>
                                                                                       </p>
                                                                                       
                                                                                   </div>
                                                                                <!--  <div>
                                                                                    <span class="span-i">INCLUDES</span>
                                                                                    <p class="title-2">Breakfast</p>
                                                                                </div> -->

                                                                            </div>
                                                                            <span class="span-i">ROOM TYPE</span>
                                                                            <p class="title-2 cstm-hotel-indiv-room-type"><?php echo e($itinerary_package_services[$days_count]['hotel']['room_name']); ?> </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="hotel-info-div">
                                                                        <a href="#" class="login-a change_hotel" id="change_hotel__<?php echo e($days_count+1); ?>">Change</a>
                                                                    </div>

                                                                </div>

                                                            </a>

                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                            <?php endfor; ?>
                                        </div>
                                        <div class="tab-pane container fade" id="Activity">
                                             <?php for($days_count=0;$days_count<$get_itinerary->itinerary_tour_days;$days_count++): ?>
                                              <?php if(!empty($itinerary_package_services[$days_count]['activity']['activity_id'][0])): ?>
                                            <div class="day-count">
                                                <p class="days">Day <?php echo e(($days_count+1)); ?> - <?php echo e($itinerary_package_title[$days_count]); ?></p>
                                                
                                                  <div class="t-tab">
                                                    <?php
                                                        $activity_count=count($itinerary_package_services[$days_count]['activity']['activity_id']);
                                                    ?>
                                                    <?php for($activity_counter=0;$activity_counter < $activity_count;$activity_counter++): ?>
                                                    <div class="row">
                                                        <?php
                                                        $fetch_activity=ServiceManagement::searchActivity($itinerary_package_services[$days_count]['activity']['activity_id'][$activity_counter]);

                                                        $activity_images=unserialize($fetch_activity['activity_images']);
                                                        ?>
                                                        <div class="col-md-12 activity_indiv_select" id="activity_indiv_select__<?php echo e($days_count+1); ?>__<?php echo e(($activity_counter+1)); ?>" style="margin:0 0 25px">
                                                            <a href="<?php echo e(route('activity-details-view',['activity_id'=>base64_encode($fetch_activity['activity_id'])])); ?>" target="_blank" style="display: block;">
                                                                <div class="hotel-list-div">

                                                                    <div class="hotel-div">
                                                                        <div class="hotel-img-div">
                                                                            <?php if(!empty($activity_images[0])): ?>
                                                                            <img class="cstm-activity-indiv-image" src="<?php echo e(asset('assets/uploads/activities_images')); ?>/<?php echo e($activity_images[0]); ?>"
                                                                                style="width:100%">
                                                                                <?php else: ?>
                                                                                  <img class="cstm-activity-indiv-image" src="<?php echo e(asset('assets/images/no-photo.png')); ?>"
                                                                                style="width:100%">
                                                                                <?php endif; ?>

                                                                        </div>
                                                                        <div class="hotel-details">
                                                                            <div class="heading-div">
                                                                                <p class="hotel-name cstm-activity-indiv-name"> <?php echo e($fetch_activity['activity_name']); ?></p>

                                                                            </div>


                                                                            <p class="info"></p>
                                                                              <p class="address cstm-activity-indiv-address"><i class="fa fa-map-marker"></i> <?php echo e($fetch_activity['activity_location']); ?></p>
                                                                            <div class="heading-div c-h-div">
                                                                                <div class="rating">
                                                                                    <br>  
                                                                                    <span class="span-i">DATE</span>
                                                                                    <p class="title-2"><?php echo date('D, d M Y',strtotime("+".($days_count)." days",strtotime($itinerary_date_from))); ?>
                                                                                       </p>
                                                                                    
                                                                                </div>
                                                                                   </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="hotel-info-div">
                                                                         <a href="#" class="login-a change_activity" id="change_activity__<?php echo e($days_count+1); ?>_<?php echo e(($activity_counter+1)); ?>">Change</a>
                                                                    </div>

                                                                </div>

                                                            </a>

                                                        </div>

                                                    </div>
                                                    <?php endfor; ?>
                                                    
                                                </div>
                                               
                                            </div>
                                             <?php endif; ?>
                                            <?php endfor; ?>
                                        </div>
                                        <div class="tab-pane container fade" id="Site">
                                            <?php for($days_count=0;$days_count<$get_itinerary->itinerary_tour_days;$days_count++): ?>
                                             <?php if(!empty($itinerary_package_services[$days_count]['sightseeing']['sightseeing_id'])): ?>
                                            <div class="day-count">
                                                <p class="days">Day <?php echo e(($days_count+1)); ?> - <?php echo e($itinerary_package_title[$days_count]); ?></p>
                                                
                                             <div class="t-tab">
                                                    <div class="row">
                                                        <?php
                                                        $fetch_sightseeing=ServiceManagement::searchSightseeingTourName($itinerary_package_services[$days_count]['sightseeing']['sightseeing_id']);

                                                        $sightseeing_images=unserialize($fetch_sightseeing['sightseeing_images']);
                                                        ?>
                                                        <div class="col-md-12 sightseeing_indiv_select" id="sightseeing_indiv_select__<?php echo e(($days_count+1)); ?>" style="margin:0 0 25px">
                                                            <a href="<?php echo e(route('sightseeing-details-view',['sightseeing_id'=>base64_encode($fetch_sightseeing['sightseeing_id'])])); ?>" target="_blank" style="display: block;">
                                                                <div class="hotel-list-div">
                                                                    <div class="hotel-div">
                                                                        <div class="hotel-img-div">
                                                                            <?php if(!empty($sightseeing_images[0])): ?>
                                                                            <img class="cstm-sightseeing-indiv-image" src="<?php echo e(asset('assets/uploads/sightseeing_images')); ?>/<?php echo e($sightseeing_images[0]); ?>"
                                                                                style="width:100%">
                                                                                <?php else: ?>
                                                                                  <img  class="cstm-sightseeing-indiv-image" src="<?php echo e(asset('assets/images/no-photo.png')); ?>"
                                                                                style="width:100%">
                                                                                <?php endif; ?>

                                                                        </div>
                                                                        <div class="hotel-details">
                                                                            <div class="heading-div">
                                                                                <p class="hotel-name cstm-sightseeing-indiv-name"><?php echo $fetch_sightseeing['sightseeing_tour_name'] ?> (<?php echo $fetch_sightseeing['sightseeing_distance_covered'] ?> KMS)</p>

                                                                            </div>


                                                                            <p class="info"></p>
                                                                              <p class="address cstm-sightseeing-indiv-address"><i class="fa fa-map-marker"></i>
                                                                        <?php
                                                                         $get_from_city=ServiceManagement::searchCities($fetch_sightseeing['sightseeing_city_from'],$itinerary_package_countries[$days_count]);
                                                                                       echo $get_from_city['name']."-";

                                                                                        if($fetch_sightseeing['sightseeing_city_between']!=null && $fetch_sightseeing['sightseeing_city_between']!="")
                                                                                        {
                                                                                       $all_between_cities=explode(",",$fetch_sightseeing['sightseeing_city_between']);
                                                                                       for($cities=0;$cities< count($all_between_cities);$cities++)
                                                                                       {
                                                                                        $fetch_city=ServiceManagement::searchCities($all_between_cities[$cities],$itinerary_package_countries[$days_count]);
                                                                                         echo $fetch_city['name']."-";
                                                                                      }
                                                                                    }
                                                                  
                                                            
                                                                                       $get_from_city=ServiceManagement::searchCities($fetch_sightseeing['sightseeing_city_to'],$itinerary_package_countries[$days_count]);
                                                                                        echo  $get_from_city['name'];

                                                                        ?>
                                                                </p>
                                                                          <div class="heading-div c-h-div">
                                                                                <div class="rating">
                                                                                    <br>  
                                                                                    <span class="span-i">DATE</span>
                                                                                    <p class="title-2"><?php echo date('D, d M Y',strtotime("+".($days_count)." days",strtotime($itinerary_date_from))); ?>
                                                                                       </p>
                                                                                
                                                                                </div>
                                                                                   </div>
                                                                               <!--   <div>
                                                                                    <span class="span-i">INCLUDES</span>
                                                                                    <p class="title-2">Breakfast</p>
                                                                                </div>

                                                                            </div>
                                                                            <span class="span-i">ROOM TYPE</span>
                                                                            <p class="title-2">Superior Room </p> -->

                                                                        </div>

                                                                    </div>
                                                                    <div class="hotel-info-div">
                                                                         <a href="#" class="login-a change_sightseeing" id="change_sightseeing__<?php echo e($days_count+1); ?>">Change</a>

                                                                    </div>

                                                                </div>

                                                            </a>

                                                        </div>

                                                    </div>

                                                </div>
                                               
                                             
                                            </div>
                                             <?php endif; ?>
                                            <?php endfor; ?>
                                        </div>
                                    </div>
                                </div>
                                <hr class="h-hr">
                                <div class="col-md-12">
                                    <h2 style="color: #6b6b6b;font-weight: 700;">Our Policies</h2>
                                    <div class="minHeight100vh">
                                        <div class="appendTop20">
                                            <div class=" relative  latoBold font16 lineHeight18 appendBottom20 active">
                                                Exclusions</div>
                                            <div class="accordContent paddingB20 lineHeight18">
                                             <?php echo $get_itinerary->itinerary_exclusions; ?>
                                            </div>
                                            <div class=" relative  latoBold font16 lineHeight18 appendBottom20 active">
                                                Terms and Conditions</div>
                                            <div class="accordContent paddingB20 lineHeight18">
                                                  <?php echo $get_itinerary->itinerary_terms_and_conditions; ?>
                                            </div>
                                            <div class=" relative  latoBold font16 lineHeight18 appendBottom20 active">
                                                Cancellation Policy</div>
                                            <div class="accordContent paddingB20 lineHeight18">
                                                       <?php echo $get_itinerary->itinerary_cancellation; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="packagePriceContainer">
                                <div class="priceContainer">
                                    <div class="flexOne">
                                       <!--  <p class="oldPrice">₹&nbsp;55,087</p> -->
                                       <?php
                                       $markup_cost=round(($total_whole_itinerary_cost*$markup)/100);
                                        $total_cost=round(($total_whole_itinerary_cost+$markup_cost));
                                       ?>
                                        <p class="c-price">GEL <span id="total_cost_text"><?php echo e($total_cost); ?></span><span class="font12">per person</span></p>
                                        <input type="hidden" name="total_cost" id="total_cost" value="<?php echo e($total_cost); ?>">
                                        <input type="hidden" name="markup_per" id="markup_per"  value="<?php echo e($markup); ?>">
                                         <input type="hidden" name="total_cost_w_markup" id="total_cost_w_markup" value="<?php echo e($total_whole_itinerary_cost); ?>">
                                        <p class="font10 appendTop5">(Taxes are included in this price)</p>
                                    </div>
                                   <!--  <div class="wdth70"><span class="orangeGrad">27% OFF</span></div> -->
                                <div class="row rooms_div" id="rooms_div__1" style="margin-top: 10px;">
                                    <div class="col-md-3">
                                        <span class="rooms_text">Room 1</span>
                                        <input type="hidden" name="rooms_count[]" class="rooms_count" id="rooms_count" value="1">
                                    </div>
                                     <div class="col-md-5">
                                        <select name="select_adults[]" class="form-control select_adults" required="required">
                                            <option value="">Adults</option>
                                            <option value="1">1</option>
                                            <option value="2" selected="selected">2</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 add_more_div">
                                       
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-8"></div>
                                    <div class="col-md-4 text-right">
                                         <label id="add_more_rooms">+ Add room</label>
                                    </div>
                                 </div>
                                </div>
                           
                                <!-- <div class="viewOffers"><a href="javascript:void(0);">View All offers applied</a></div> -->
                                <div class="btnContainer"><button type="submit" class="primaryBtn"
                                        id="bookMyPackage">Book Online</button></div>
                                <div class="hide"><a href="javascript:void(0);" id="create_quote_id">Create Quote</a>
                                </div>
                                <div class="hide"><a href="//holidayz.makemytrip.com/holidays/generateCrm"
                                        target="_blank">Crm Pax Association</a></div>
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
    <?php echo $__env->make('agent.includes.bottom-footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="modal" id="selectHotelModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Select Hotel</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" style="height: 480px;
      overflow-y: auto;
      overflow-x: hidden;">

      <input type="hidden" id="hotel_day_index">
      <div id="first_step_hotel">
      <div class="row">
        <div class="col-md-5">
            <label for="hotel_rating_filter"><b>Star Rating</b></label>
            <select name="hotel_rating_filter" id="hotel_rating_filter" class="form-control">
                <option value="">Any</option>
                <?php
                for($i=5;$i>=1;$i--)
                {
                    echo '<option value="'.$i.'">'.$i.' Star</option>';
                }
                ?>
            </select>
        </div>
        <div class="col-md-5">
            <label for="hotel_rating_filter"><b>Sort By</b></label>
            <select name="hotel_sort_filter" id="hotel_sort_filter" class="form-control">
                 <option value="rating_low_high">Hotel Rating: Low to High</option>
                <option value="rating_high_low">Hotel Rating: High to Low</option>
                <option value="price_low_high">Price: Low to High</option>
                <option value="price_high_low">Price: High to Low</option>
            </select>
        </div>
    </div>
    <!--  <div class="row">
         <div class="col-md-5">
            <label for="hotel_name_filter"><b>Hotel Name</b></label>
           <input name="hotel_name_filter" id="hotel_name_filter" class="form-control" placeholder="Hotel Name">
        </div>
         <div class="col-md-5">
            <label for="hotel_location_filter"><b>Hotel Location</b></label>
           <input name="hotel_location_filter" id="hotel_location_filter" class="form-control" placeholder="Hotel Location">
        </div>
      </div> -->
      <br>
         <div id="hotels_div">
         </div>
     </div>
       <div id="second_step_hotel">
        <button id="go_back_btn" class="btn btn-default"><i class="fa fa-angle-left go-icon"></i> Go back to Hotel List</button>
        <div id="hotels_details_div">
        </div>
       </div>
     </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<div class="modal" id="selectActivityModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Select Activity</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" style="height: 550px;
        overflow-y: auto;
    overflow-x: hidden;">
     <input type="hidden" id="activities_day_index">
       <input type="hidden" id="activities_day_index_self">
       <div id="activities_div">
       </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<div class="modal" id="selectSightseeingModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Select Sightseeing</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" style="height: 550px;
        overflow-y: auto;
    overflow-x: hidden;">
     <input type="hidden" id="sightseeing_day_index">
       <div id="sightseeing_div">
       </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
    <script>
    $(document).on("click",".change_hotel",function()
    {
        var id=this.id;
        var hotel_id=id.split("__")[1];
        var no_of_days=$("#no_of_days").val();
        var country_id=$("#days_country__"+hotel_id).val();
        var city_id=$("#days_city__"+hotel_id).val();
        if(country_id==null)
        {
            alert("Please select country first");
        }
        else if(city_id==0)
        {
            alert("Please select city first");
        }
        else
        {
            $.ajax({
            url:"<?php echo e(route('agent-itinerary-get-hotels')); ?>",
            data:{"country_id":country_id,
                    "city_id":city_id},
            type:"get",
            success:function(response)
            {
                $("#hotels_div").html(response);
                $("#hotel_day_index").val(hotel_id);
                 $("#first_step_hotel").show();
              $("#second_step_hotel").hide();
            $("#selectHotelModal").modal("show");
            }
        });
        
        }


        
    });
</script>
<script>
    $(document).on("click",".change_sightseeing",function()
    {
        var id=this.id;
        var sightseeing_id=id.split("__")[1];

        var country_id=$("#days_country__"+sightseeing_id).val();
        var city_id=$("#days_city__"+sightseeing_id).val();
    if(country_id==null)
        {
            alert("Please select country first");
        }
        else if(city_id==0)
        {
            alert("Please select city first");
        }
        else
        {
        $.ajax({
            url:"<?php echo e(route('agent-itinerary-get-sightseeing')); ?>",
            data:{"country_id":country_id,
                    "city_id":city_id},
            type:"get",
            success:function(response)
            {
                $("#sightseeing_div").html(response);
                $("#sightseeing_day_index").val(sightseeing_id);
            $("#selectSightseeingModal").modal("show");
            }
        });
        }
        
    });
</script>

<script>
    $(document).on("click",".change_activity",function()
    {
        var id=this.id;
        var activity_id=id.split("__")[1].split("_")[0];

        var activity_index=id.split("__")[1].split("_")[1];

        var country_id=$("#days_country__"+activity_id).val();
        var city_id=$("#days_city__"+activity_id).val();
            if(country_id==null)
        {
            alert("Please select country first");
        }
        else if(city_id==0)
        {
            alert("Please select city first");
        }
        else
        {
        $.ajax({
            url:"<?php echo e(route('agent-itinerary-get-activities')); ?>",
            data:{"country_id":country_id,
                    "city_id":city_id},
            type:"get",
            success:function(response)
            {
                $("#activities_div").html(response);
                $("#activities_day_index").val(activity_id);
                 $("#activities_day_index_self").val(activity_index);
            $("#selectActivityModal").modal("show");
            }
        });
        }
        
    });
</script>
<script>
    // $(document).on("click",".select_hotel",function(e)
    // {
    //     $(".select_hotel").each(function()
    //     {
    //         $(this).find('.tick').css("display","none");
    //         $(this).removeClass('selected_hotel');

    //     });
    //     var hotel_day_index=$("#hotel_day_index").val();

    //         var hotel_id=$(this).attr('id').split("__")[1];
    //         var hotel_name=$(this).find('.card-title').text();
    //         $("#hotel_id__"+hotel_day_index).val("");
    //         $("#hotel_name__"+hotel_day_index).val("");
    //         $("#room_name__"+hotel_day_index).val("");
    //         $("#hotel_cost__"+hotel_day_index).val("");
    //         if($("input[name='room_type_"+hotel_id+"']:checked").val())
    //         {
                
    //             $(".select_hotel").each(function()
    //             {
    //                 var id=this.id;
    //                 var hotel_select_id=$(this).attr('id').split("__")[1];

    //                 if(id!="hotel__"+hotel_id)
    //                 {
    //                     $("input[name='room_type_"+hotel_select_id+"']").prop("checked",false);
    //                 }

    //             });

    //         $(this).find('.tick').css("display","block");

    //         $(this).addClass('selected_hotel');
    //         var room_index=$("input[name='room_type_"+hotel_id+"']:checked").val();
    
    //         var hotel_address=$(this).find('.search_hotel_address').val();
    //         var hotel_image=$(this).find('.search_hotel_image').val();
    //         var hotel_rating=$(this).find('.search_hotel_rating').val();

    //         var room_name=$('input[name="room_name_'+room_index+'_'+hotel_id+'"]').val();
    //         var hotel_cost=$('input[name="room_price_'+room_index+'_'+hotel_id+'"]').val();

    //         var days_country=$("#days_country__"+hotel_day_index).val();
    //         var hotel_no_of_days=$("#hotel_no_of_days__"+hotel_day_index).val();
    //         hotel_cost=Math.round(hotel_cost*hotel_no_of_days);
    //         $("#hotel_id__"+hotel_day_index).val(hotel_id);
    //         $("#hotel_name__"+hotel_day_index).val(hotel_name);
    //         $("#room_name__"+hotel_day_index).val(room_name);
    //         $("#hotel_cost__"+hotel_day_index).val(hotel_cost);

    //         var hotel_rating_html="";
    //         for($i=1;$i<hotel_rating;$i++)
    //         {
    //             hotel_rating_html+="<span class='fa fa-star checked'></span>";
    //         }


    //         $("#hotels_select__"+hotel_day_index).find('.cstm-hotel-name').text(hotel_name);
    //          $("#hotels_indiv_select__"+hotel_day_index).find('.cstm-hotel-indiv-name').text(hotel_name);
    //           $("#hotels_select__"+hotel_day_index).find('.cstm-hotel-address').html('<i class="fa fa-map-marker"></i> '+hotel_address);
    //          $("#hotels_indiv_select__"+hotel_day_index).find('.cstm-hotel-indiv-address').html('<i class="fa fa-map-marker"></i>'+hotel_address);
    //            $("#hotels_select__"+hotel_day_index).find('.cstm-hotel-image').attr("src",hotel_image);
    //          $("#hotels_indiv_select__"+hotel_day_index).find('.cstm-hotel-indiv-image').attr("src",hotel_image);
    //           $("#hotels_select__"+hotel_day_index).find('.cstm-hotel-room-type').text(room_name);
    //          $("#hotels_indiv_select__"+hotel_day_index).find('.cstm-hotel-indiv-room-type').text(room_name);
    //            $("#hotels_select__"+hotel_day_index).find('.cstm-hotel-rating').html(hotel_rating_html);
    //          $("#hotels_indiv_select__"+hotel_day_index).find('.cstm-hotel-indiv-rating').html(hotel_rating_html);

    //         var total_cost=0;
    //         $(".calc_cost").each(function()
    //         {
               
    //             if($(this).val()!="")
    //             {
    //                 total_cost+=Math.round($(this).val());
    //             }

    //         });

    //         var markup=$("#markup_per").val();
    //         var markup_cost=Math.round((total_cost*markup)/100);
    //          $("#total_cost_w_markup").val(total_cost);
    //         total_cost=parseInt(parseInt(total_cost)+parseInt(markup_cost));

    //         $("#total_cost").val(total_cost);
    //          $("#total_cost_text").text(total_cost);
    //     }
    //     else
    //     {
    //         alert(" Please select room type");
    //     }

    // });

    $(document).on("click","#go_back_btn",function()
    {
        $("#second_step_hotel").hide(500);
        $("#first_step_hotel").show(200);
         
    });
    $(document).on("click",".select_hotel",function(e)
    {
        var hotel_id=$(this).attr("id").split("__")[1];
          $.ajax({
            url:"<?php echo e(route('agent-itinerary-get-hotels-details')); ?>",
            data:{"hotel_id":hotel_id},
            type:"get",
            success:function(response)
            {
              $("#first_step_hotel").hide(200);
              $("#second_step_hotel").show(500);
              $("#hotels_details_div").html(response);
        
            }
        });
    
    });

    $(document).on("click",".room_type_change",function()
    {
            var hotel_day_index=$("#hotel_day_index").val();
            var hotel_id=$("#hotels_details_div").find('.search_hotel_id').val();
            var hotel_name=$("#hotels_details_div").find('.search_hotel_name').val();
            $("#hotel_id__"+hotel_day_index).val("");
            $("#hotel_name__"+hotel_day_index).val("");
            $("#room_name__"+hotel_day_index).val("");
            $("#hotel_cost__"+hotel_day_index).val("");
            var room_index=$(this).attr('id').split("_")[1];
            var hotel_address=$("#hotels_details_div").find('.search_hotel_address').val();
            var hotel_image=$("#hotels_details_div").find('.search_hotel_image').val();
            var hotel_rating=$("#hotels_details_div").find('.search_hotel_rating').val();

            var room_name=$('input[name="room_name_'+room_index+'_'+hotel_id+'"]').val();
            var hotel_cost=$('input[name="room_price_'+room_index+'_'+hotel_id+'"]').val();
            var days_country=$("#days_country__"+hotel_day_index).val();
            var hotel_no_of_days=$("#hotel_no_of_days__"+hotel_day_index).val();
            hotel_cost=Math.round(hotel_cost*hotel_no_of_days);
            $("#hotel_id__"+hotel_day_index).val(hotel_id);
            $("#hotel_name__"+hotel_day_index).val(hotel_name);
            $("#room_name__"+hotel_day_index).val(room_name);
            $("#hotel_cost__"+hotel_day_index).val(hotel_cost);

            var hotel_rating_html="";
            for($i=1;$i<=hotel_rating;$i++)
            {
                hotel_rating_html+="<span class='fa fa-star checked'></span>";
            }


            $("#hotels_select__"+hotel_day_index).find('.cstm-hotel-name').text(hotel_name);
             $("#hotels_indiv_select__"+hotel_day_index).find('.cstm-hotel-indiv-name').text(hotel_name);
              $("#hotels_select__"+hotel_day_index).find('.cstm-hotel-address').html('<i class="fa fa-map-marker"></i> '+hotel_address);
             $("#hotels_indiv_select__"+hotel_day_index).find('.cstm-hotel-indiv-address').html('<i class="fa fa-map-marker"></i>'+hotel_address);
               $("#hotels_select__"+hotel_day_index).find('.cstm-hotel-image').attr("src",hotel_image);
             $("#hotels_indiv_select__"+hotel_day_index).find('.cstm-hotel-indiv-image').attr("src",hotel_image);
              $("#hotels_select__"+hotel_day_index).find('.cstm-hotel-room-type').text(room_name);
             $("#hotels_indiv_select__"+hotel_day_index).find('.cstm-hotel-indiv-room-type').text(room_name);
               $("#hotels_select__"+hotel_day_index).find('.cstm-hotel-rating').html(hotel_rating_html);
             $("#hotels_indiv_select__"+hotel_day_index).find('.cstm-hotel-indiv-rating').html(hotel_rating_html);

            var total_cost=0;
            $(".calc_cost").each(function()
            {
               
                if($(this).val()!="")
                {
                    total_cost+=Math.round($(this).val());
                }

            });

            var markup=$("#markup_per").val();
            var markup_cost=Math.round((total_cost*markup)/100);
             $("#total_cost_w_markup").val(total_cost);
            total_cost=parseInt(parseInt(total_cost)+parseInt(markup_cost));

            $("#total_cost").val(total_cost);
             $("#total_cost_text").text(total_cost);
                 $("#selectHotelModal").modal("hide");
    });

    $(document).on("click",".select_sightseeing",function()
    {
        $(".select_sightseeing").each(function()
        {
            $(this).find('.tick').css("display","none");
            $(this).removeClass('selected_sightseeing');

        });

        
            $(this).find('.tick').css("display","block");
            $(this).addClass('selected_sightseeing');

            var sightseeing_day_index=$("#sightseeing_day_index").val();

            var sightseeing_id=$(this).attr('id').split("__")[1];

            var sightseeing_name=$(this).find('.card-title').text();
            var sightseeing_cost=$(this).find('.search_sightseeing_cost').val();
            var sightseeing_address=$(this).find('.search_sightseeing_address').val();
            var sightseeing_image=$(this).find('.search_sightseeing_image').val();
            var sightseeing_distance=$(this).find('.search_sightseeing_distance').val();

            $("#sightseeing_id__"+sightseeing_day_index).val(sightseeing_id);
            $("#selected_sightseeing_name__"+sightseeing_day_index).text(sightseeing_name);
            $("#sightseeing_name__"+sightseeing_day_index).val(sightseeing_name);
            $("#sightseeing_cost__"+sightseeing_day_index).val(sightseeing_cost);


              $("#sightseeing_select__"+sightseeing_day_index).find('.cstm-sightseeing-name').text(sightseeing_name+" ("+sightseeing_distance+"KMS)");
             $("#sightseeing_indiv_select__"+sightseeing_day_index).find('.cstm-sightseeing-indiv-name').text(sightseeing_name+" ("+sightseeing_distance+"KMS)");
              $("#sightseeing_select__"+sightseeing_day_index).find('.cstm-sightseeing-address').html('<i class="fa fa-map-marker"></i> '+sightseeing_address);
             $("#sightseeing_indiv_select__"+sightseeing_day_index).find('.cstm-sightseeing-indiv-address').html('<i class="fa fa-map-marker"></i>'+sightseeing_address);
               $("#sightseeing_select__"+sightseeing_day_index).find('.cstm-sightseeing-image').attr("src",sightseeing_image);
             $("#sightseeing_indiv_select__"+sightseeing_day_index).find('.cstm-sightseeing-indiv-image').attr("src",sightseeing_image);

              var total_cost=0;
            $(".calc_cost").each(function()
            {
                if($(this).val()!="")
                {
                    total_cost+=parseInt($(this).val());
                }

            });

              var markup=$("#markup_per").val();
            var markup_cost=Math.round((total_cost*markup)/100);
            $("#total_cost_w_markup").val(total_cost);
            total_cost=parseInt(parseInt(total_cost)+parseInt(markup_cost));
        
             $("#total_cost").val(total_cost);
             $("#total_cost_text").text(total_cost);
             $("#selectSightseeingModal").modal("hide");

    });
    $(document).on("click",".select_activity",function()
    {
         $(".select_activity").each(function()
        {
              $(this).find('.tick').css("display","none");
            $(this).removeClass('selected_activity');

        });

            $(this).find('.tick').css("display","block");
            $(this).addClass('selected_activity');
            
            var activity_id="";
            var activity_name="";
            var activity_cost="";

            var activity_day_index=$("#activities_day_index").val();
             var activity_day_index_self=$("#activities_day_index_self").val();

            activity_id=$(this).attr('id').split("__")[1];
            activity_name=$(this).find('.card-title').text();
            activity_cost=$(this).find('.search_activity_cost').val();
             activity_address=$(this).find('.search_activity_address').val();
            activity_image=$(this).find('.search_activity_image').val();

            $("#activity_id__"+activity_day_index+"__"+activity_day_index_self).val(activity_id);
            $("#selected_activity_name__"+activity_day_index+"__"+activity_day_index_self).text(activity_name);
            $("#activity_name__"+activity_day_index+"__"+activity_day_index_self).val(activity_name);
            $("#activity_cost__"+activity_day_index+"__"+activity_day_index_self).val(activity_cost);

             $("#activity_select__"+activity_day_index+"__"+activity_day_index_self).find('.cstm-activity-name').text(activity_name);
             $("#activity_indiv_select__"+activity_day_index+"__"+activity_day_index_self).find('.cstm-activity-indiv-name').text(activity_name);
              $("#activity_select__"+activity_day_index+"__"+activity_day_index_self).find('.cstm-activity-address').html('<i class="fa fa-map-marker"></i> '+activity_address);
             $("#activity_indiv_select__"+activity_day_index+"__"+activity_day_index_self).find('.cstm-activity-indiv-address').html('<i class="fa fa-map-marker"></i>'+activity_address);
               $("#activity_select__"+activity_day_index+"__"+activity_day_index_self).find('.cstm-activity-image').attr("src",activity_image);
             $("#activity_indiv_select__"+activity_day_index+"__"+activity_day_index_self).find('.cstm-activity-indiv-image').attr("src",activity_image);



             var total_cost=0;
            $(".calc_cost").each(function()
            {
                if($(this).val()!="")
                {
                    total_cost+=parseInt($(this).val());
                }

            });
              var markup=$("#markup_per").val();
            var markup_cost=Math.round((total_cost*markup)/100);
            $("#total_cost_w_markup").val(total_cost);
            total_cost=parseInt(parseInt(total_cost)+parseInt(markup_cost));
            $("#total_cost").val(total_cost);
             $("#total_cost_text").text(total_cost);

  $("#selectActivityModal").modal("hide");

    });
</script>
<script>
    $(document).on("click","#add_more_rooms",function()
    {
        var room_id=$(".rooms_div:last").attr("id").split("__")[1];
        var clone_rooms=$(".rooms_div:last").clone();
        old_id=room_id;
        new_id=parseInt(room_id)+1;
        clone_rooms.find('.rooms_text').parent().parent().attr("id","rooms_div__"+new_id);
        clone_rooms.find('.rooms_text').text("Room "+new_id);
        clone_rooms.find('.rooms_count').val(new_id);
        clone_rooms.find('.select_adults').val("").trigger("change");
        clone_rooms.find('.add_more_div').html('<label class="remove_more_rooms" id="remove_more_rooms__'+new_id+'">x Remove</label>');
        $(".rooms_div:last").after(clone_rooms);
    });
    $(document).on("click",".remove_more_rooms",function()
    {
        $(this).parent().parent().remove();
        var count=1;
        $(".rooms_div").each(function()
        {
            $(this).attr("id","rooms_div__"+count);
             $(this).find('.rooms_text').text("Room "+count);
              $(this).find('.rooms_text').text("Room "+count);
            count++;
        });
    });
</script>
<script>
    $(document).on("change","#hotel_sort_filter",function()
    {
        var sort_factor=$(this).val();
        var sorthotels=$("div.select_hotel");
        if(sort_factor=="rating_low_high")
        {
           
            var rating_low_high_div = sorthotels.sort(function (a, b) {  
               a = parseInt($(a).find(".card-rating-text").text(), 10);
               b = parseInt($(b).find(".card-rating-text").text(), 10);
               if(a > b) {
                return 1;
            } else if(a < b) {
                return -1;
            } else {
                return 0;
            }
        });
            $("#hotel_sort_div").html(rating_low_high_div);
        }
        if(sort_factor=="rating_high_low")
        {
            
            var rating_high_low_div = sorthotels.sort(function (a, b) {
               a = parseInt($(a).find(".card-rating-text").text(), 10);
               b = parseInt($(b).find(".card-rating-text").text(), 10);
               if(a > b) {
                return -1;
            } else if(a < b) {
                return 1;
            } else {
                return 0;
            }
        });
            $("#hotel_sort_div").html(rating_high_low_div);
        }

        if(sort_factor=="price_low_high")
        {
           
            var price_low_high_div = sorthotels.sort(function (a, b) {  
               a = parseInt($(a).find(".card-price-text").text(), 10);
               b = parseInt($(b).find(".card-price-text").text(), 10);
               if(a > b) {
                return 1;
            } else if(a < b) {
                return -1;
            } else {
                return 0;
            }
        });
            $("#hotel_sort_div").html(price_low_high_div);
        }
        if(sort_factor=="price_high_low")
        {
            
            var price_high_low_div = sorthotels.sort(function (a, b) {
               a = parseInt($(a).find(".card-price-text").text(), 10);
               b = parseInt($(b).find(".card-price-text").text(), 10);
               if(a > b) {
                return -1;
            } else if(a < b) {
                return 1;
            } else {
                return 0;
            }
        });
            $("#hotel_sort_div").html(price_high_low_div);
        }
    });

    $(document).on("change","#hotel_rating_filter",function()
    {
      var optionValue = $(this).val();
      if(optionValue!="")
      {
       $(".select_hotel").each(function()
       {
        if($(this).find(".card-rating-text").text()==optionValue)
        {
            $(this).show(500);
        }
        else
        {
            $(this).hide();
        }
    })
   }
   else
   {
    $(".select_hotel").show(500);
}


});
</script>
</body>
    </html><?php /**PATH /home/tqfproco/crm.traveldoor.ge/resources/views/agent/itinerary-details.blade.php ENDPATH**/ ?>