@include('mains.includes.top-header')
<style>
    header.main-header {
          background: url("{{ asset('assets/images/color-plate/theme-purple.jpg') }}");
    }

    .iti-flag {
        width: 20px;
        height: 15px;
        box-shadow: 0px 0px 1px 0px #888;
        background-image: url("flags.png") !important;
        background-repeat: no-repeat;
        background-color: #DBDBDB;
        background-position: 20px 0
    }

    div#cke_1_contents {
        height: 250px !important;
    }

    table#calendar-demo {
        width: 100%;
        height: 275px !important;
        min-height: 275px !important;
        overflow: hidden;
    }

    .calendar-wrapper.load {
        width: 100%;
        height: 276px;
    }

    .calendar-date-holder .calendar-dates .date.month a {
        display: block;
        padding: 17px 0 !important;
    }

    .calendar-date-holder {
        width: 100% !important;
    }

    section.calendar-head-card {
        display: none;
    }

    .calendar-container {
        border: 1px solid #cccccc;
        height: 276px !important;
    }

    img.plus-icon {
        margin: 0 2px;
        display: inline !important;
    }

    @media screen and (max-width:400px) {
        .calendar-date-holder .calendar-dates .date a {
            text-decoration: none;
            display: block;
            color: inherit;
            padding: 3px !important;
            margin: 1px;
            outline: none;
            border: 2px solid transparent;
            transition: all .3s;
            -o-transition: all .3s;
            -moz-transition: all .3s;
            -webkit-transition: all .3s;
        }
    }
     .panel-body {
        padding: 15px !important;
    }

    .tab-content {
        border: 1px solid #ec407a;
        /* padding: 15px; */
    }

    a.panel-title {
        background: #ec407a;
        color: white !important;
        padding: 10px 15px !important;
    }
    div.cstm-div {
    margin-top: 20px;
}
div.markup_div,.surcharge_div{
    padding: 0;
}
</style>

<body class="hold-transition light-skin sidebar-mini theme-rosegold onlyheader">

    <div class="wrapper">

        @include('mains.includes.top-nav')

        <div class="content-wrapper">

            <div class="container-full clearfix position-relative">

                @include('mains.includes.nav')

                <div class="content">

    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Service Management</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Dashboard</li>
                            <li class="breadcrumb-item" aria-current="page">Service Management</li>
                            <li class="breadcrumb-item active" aria-current="page">Create New Hotel
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
           <!--  <div class="right-title">
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

    @if($rights['add']==1)
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Create Hotel</h4>
                </div>
                <div class="box-body">
                    <form id="hotel_form" encytpe="multipart/form-data">
                        {{csrf_field()}}
                      <div class="row mb-10">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="hotel_name">HOTEL NAME <span class="asterisk">*</span></label>
                                <input type="text" class="form-control" placeholder="HOTEL NAME " id="hotel_name" name="hotel_name">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <div class="form-group">

                                    <div class="form-group">
                                        <label for="supplier_name">OWN SUPPLIER </label>
                                        <select class="form-control select2" style="width: 100%;" id="supplier_name" name="supplier_name">
                                            <option selected="selected" value="0" hidden>SELECT SUPPLIER</option>
                                            @foreach($suppliers as $supplier)
                                           <option value="{{$supplier->supplier_id}}">{{$supplier->supplier_name}}</option>  
                                           @endforeach
                                         
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="row mb-10">
                       <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="contact_no">CONTACT NO <span class="asterisk">*</span></label>
                            <input id="contact_no" name="contact_no" type="text" class="form-control" placeholder="CONTACT NO">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                                <label for="hotel_rating">RATING <span class="asterisk">*</span></label>
                                <select id="hotel_rating" name="hotel_rating" class="form-control" style="width: 100%;">
                                    <option selected="selected" value="0" hidden="hidden">SELECT RATING </option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="hotel_country">COUNTRY <span class="asterisk">*</span></label>
                            <select id="hotel_country" name="hotel_country" class="form-control select2" style="width: 100%;" disabled="disabled">
                                <option selected="selected" value="0">SELECT COUNTRY</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6" id="acitvity_city_div" style="display:none">
                            <div class="form-group">
                                        <label for="hotel_city">CITY <span class="asterisk">*</span></label>
                                        <select id="hotel_city" name="hotel_city" class="form-control select2" style="width: 100%;">
                                            <option selected="selected">SELECT CITY</option>
                                        </select>
                            </div>
                    </div>
                       <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="hotel_address">HOTEL ADDRESS <span class="asterisk">*</span></label>
                                <textarea id="hotel_address" name="hotel_address" class="form-control" placeholder="HOTEL ADDRESS "
                                    spellcheck="false"></textarea>
                            </div>
                        </div>
                         <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="hotel_description">HOTEL DESCRIPTION <span class="asterisk">*</span></label>
                                <textarea id="hotel_description" name="hotel_description" class="form-control" placeholder="HOTEL DESCRIPTION "
                                    spellcheck="false"></textarea>
                            </div>
                        </div>

                </div>
                  <!-- <div class="row mb-10">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label>BLACKOUT DAYS</label>
                                <div class="col-sm-12 col-md-12" style="padding:0">
                                    <button type="button" class="btn btn-rounded btn-primary mr-10"
                                        data-toggle="collapse" data-target="#demo2">Add
                                       Blackout Days</button>

                                    <div id="demo2" class="collapse">
                                        <div class="row mt-15 mb-10">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">

                                                    <div class="input-group date">
                                                        <input type="text" placeholder="BLACKOUT DATES" class="form-control pull-right datepicker" id="blackout_days" name="blackout_days">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                    </div>
                                                   

                                                </div>
                                            </div>
                                            
                                            
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">

                        </div>
                    </div> -->
                      <div class="row mb-10">
                        <div class="col-sm-12">
                            <div class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;">

                            </div>
                            <h4 class="box-title" style="border-color: #c1c1c1;margin-top: 25px;margin-bottom:0">
                                <i class="fa fa-plus-circle"></i> RATE AND ALLOCATION</h4>

                        </div>
                        <div class="col-sm-12">
                            <div class="row mb-10 p-3 rates_allocations_div" id="rates_allocations_div1">
                                <div class="col-sm-12">

                                    <h4 class="box-title" style="border-color: #c1c1c1;">
                                        <i class="fa fa-plus-circle"></i> SEASON DETAILS</h4>
                                    <div class="box-header with-border"
                                        style="padding: 0;margin-bottom: 10px;border-color: #c3c3c3;">

                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="row mb-10">
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label for="season_name1" id="season_name_label1">SEASON NAME <span class="asterisk">*</span></label>
                                                <input type="text" class="form-control season_name" placeholder="SEASON NAME " id="season_name__1__1" name="season_name[0]">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label>BOOKING VALIDITY <span class="asterisk">*</span></label>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <div class="input-group date">
                                                                <input type="text" placeholder="FROM"
                                                                    class="form-control pull-right datepicker booking_validity_from " id="booking_validity_from__1__1" name="booking_validity_from[0]">
                                                                <div class="input-group-addon">
                                                                    <i class="fa fa-calendar"></i>
                                                                </div>
                                                            </div>
                                                            <!-- /.input group -->

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <div class="input-group date">
                                                                <input type="text" placeholder="TO"
                                                                    class="form-control pull-right datepicker booking_validity_to" id="booking_validity_to__1__1" name="booking_validity_to[0]">
                                                                <div class="input-group-addon">
                                                                    <i class="fa fa-calendar"></i>
                                                                </div>
                                                            </div>
                                                            <!-- /.input group -->

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>




                                    </div>
                                    <div class="row mb-10">

                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">



                                                <label for="stop_sale1" id="stop_sale_label1">STOP SALE <span class="asterisk">*</span></label>
                                                <div class="input-group date">

                                                    <input type="text" placeholder="DATE"
                                                        class="form-control pull-right datepicker stop_sale" id="stop_sale__1__1" name="stop_sale[0]">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                                <!-- /.input group -->

                                            </div>

                                        </div>
                                        <div class="col-sm-6 col-md-6">

                                        </div>
                                        <div class="col-md-12 mt-25">
                                            <div class="row mb-10">
                                                <div class="col-sm-4">

                                                    <h4 class="box-title" style="border-color: #c1c1c1;margin:0">
                                                        <i class="fa fa-plus-circle"></i> MARKUP DETAILS  <span class="asterisk">*</span></h4>

                                                </div>
                                                <div class="col-sm-4">

                                                    <h4 class="box-title" style="border-color: #c1c1c1;margin:0">
                                                        <i class="fa fa-plus-circle"></i> BLACKOUT DAYS</h4>

                                                </div>
                                                <div class="col-sm-4">

                                                    <h4 class="box-title" style="border-color: #c1c1c1;margin:0">
                                                        <i class="fa fa-plus-circle"></i> SURCHARGE DETAILS  <span class="asterisk">*</span></h4>

                                                </div>


                                            </div>

                                            <div class="row mb-10">
                                                <div class="col-sm-4">
                                                    <button type="button" class="btn btn-rounded btn-primary mr-10 markup_details_btn" data-target="#markup_details1" data-toggle="collapse">
                                                        Markup Details </button>
                                                        <br>
                                                        <div id="markup_details1" class=" markup_details_divs collapse cstm-div" style="display:none">
                                                            <div class="col-sm-12 col-md-12 markup_div1" id="markup_div__1__1">
                                                                <div class="form-group">

                                                                    <select class="form-control activity_nationality" id="activity_nationality__1__1" name="activity_nationality[0][]">
                                                                        <option selected="selected" value="0" hidden>SELECT NATIONALITY</option>
                                                                        @foreach($countries as $country)
                                                                        <option value="{{$country->country_id}}">{{$country->country_name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <select class="form-control activity_markup" id="activity_markup__1__1" name="activity_markup[0][]">
                                                                        <option value="0" selected="selected">SELECT MARKUP TYPE</option>
                                                                        <option>Markup Percentage</option>
                                                                        <option>Markup Amount</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control activity_amount" placeholder="Markup Amount" id="activity_amount__1__1" name="activity_amount[0][]" onkeypress="javascript:return validateNumber(event)">
                                                                </div>
                                                                <div  class="form-group add_more_markup_div">
                                                                    <img id="add_more_markup__1__1" class="plus-icon add_more_markup" style="margin-left: auto;" src="{{ asset('assets/images/add_icon.png') }}">
                                                                </div>
                                                            </div>
                                                        </div>

                                                </div>
                                                <div class="col-sm-4">
                                                    <button type="button" class="btn btn-rounded btn-primary mr-10" data-target="#blackout_days1" data-toggle="collapse">
                                                    Blackout Days</button>
                                                     <br>
    
                                                    <div id="blackout_days1" class="collapse cstm-div">
                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-12 blackout_days_div" id="blackout_days_div1_1">

                                                                <div class="form-group">

                                                                    <div class="input-group date">
                                                                        <input type="text" placeholder="BLACKOUT DATES" class="form-control pull-right datepicker blackout_days" id="blackout_days__1__1" name="blackout_days[0]">
                                                                        <div class="input-group-addon">
                                                                            <i class="fa fa-calendar"></i>
                                                                        </div>
                                                                    </div>


                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <button type="button" class="btn btn-rounded btn-primary mr-10 surcharge_details_btn" data-target="#surcharge_details1" data-toggle="collapse">
                                                        Surcharge Details </button>
                                                         <br>
                                                        <div id="surcharge_details1" class="surcharge_details_div collapse cstm-div">
                                                           <div class="col-sm-12 col-md-12 surcharge_div1" id="surcharge_div__1__1">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control surcharge_name" placeholder="SURCHARGE NAME" id="surcharge_name__1__1" name="surcharge_name[0][]">
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="input-group date">
                                                                    <input type="text" placeholder="SURCHARGE DATE" class="form-control pull-right datepicker surcharge_day" id="surcharge_day__1__1" name="surcharge_day[0][]">
                                                                    <div class="input-group-addon">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control surcharge_price" placeholder="Price" id="surcharge_price__1__1" name="surcharge_price[0][]"  onkeypress="javascript:return validateNumber(event)">
                                                            </div>
                                                            <div class="form-group add_more_surcharge_div">
                                                               <img id="add_more_surcharge__1__1" class=" add_more_surcharge plus-icon pull-right" style="margin-left: auto;" src="{{ asset('assets/images/add_icon.png') }}">
                                                           </div>
                                                       </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="box-header with-border"
                                                style="padding: 10px;border-color: #c3c3c3;">

                                            </div>
                                            <h4 class="box-title"
                                                style="border-color: #c1c1c1;margin-top: 25px;margin-bottom:0">
                                                <i class="fa fa-plus-circle"></i> RATE AND ALLOCATION</h4>

                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="box-body">
                                                        <!-- Tab panes -->
                                                        <div class="tab-content">
                                                            <div id="navpills-1" class="tab-pane active">
                                                                <!-- Categroy 1 -->
                                                                <div class=" tab-pane animation-fade active"
                                                                    id="category-1" role="tabpanel">
                                                                    <div class="panel-group panel-group-simple panel-group-continuous"
                                                                        id="accordion2" aria-multiselectable="true"
                                                                        role="tablist">
                                                                        <!-- Question 1 -->
                                                                        <div class="panel">
                                                                            <div class="panel-heading" id="question-1"
                                                                                role="tab">
                                                                                <a class="panel-title"
                                                                                    aria-controls="answer-1"
                                                                                    aria-expanded="true"
                                                                                    data-toggle="collapse"
                                                                                    href="#answer-1"
                                                                                    data-parent="#accordion2">
                                                                                    Rate and allocations
                                                                                </a>
                                                                            </div>
                                                                            <div class="panel-collapse" id="answer-1"
                                                                                aria-labelledby="question-1"
                                                                                role="tabpanel" style="">
                                                                                <div class="panel-body">
                                                                                    <div class="row room_details1" id="room_details__1__1">
                                                                                        <div class="col-md-2">
                                                                                            <div class="form-group">
                                                                                                <label>Room Type</label>
                                                                                                <input type="text"
                                                                                                    class="form-control room_type"
                                                                                                    placeholder="Room Type" id="room_type__1__1" name="room_type[0][]">
                                                                                            </div>

                                                                                        </div>
                                                                                        <div class="col-md-2">
                                                                                            <div class="form-group">
                                                                                                <label>Min</label>
                                                                                                <input type="text"
                                                                                                    class="form-control room_min"
                                                                                                    placeholder="Min " id="room_min__1__1" name="room_min[0][]">
                                                                                            </div>

                                                                                        </div>
                                                                                        <div class="col-md-2">
                                                                                            <div class="form-group">
                                                                                                <label>Max</label>
                                                                                                <input type="text"
                                                                                                    class="form-control room_max"
                                                                                                    placeholder="Max" id="room_max__1__1" name="room_max[0][]">
                                                                                            </div>

                                                                                        </div>
                                                                                        <div class="col-md-2">
                                                                                            <div class="form-group">
                                                                                                <label>Room Class</label>
                                                                                                <input type="text"
                                                                                                    class="form-control room_class"
                                                                                                    placeholder="Room Class" id="room_class__1__1" name="room_class[0][]">
                                                                                            </div>

                                                                                        </div>
                                                                                        <div class="col-md-2">
                                                                                            <div class="form-group">
                                                                                                <label>Currency </label>
                                                                                                <select
                                                                                                    class="form-control room_currency"
                                                                                                    style="width: 100%;"
                                                                                                    tabindex="-1"
                                                                                                    aria-hidden="true" id="room_currency__1__1" name="room_currency[0][]">
                                                                                                    <option
                                                                                                        selected="selected" value="0" hidden>
                                                                                                        SELECT COUNTRY
                                                                                                        @foreach($currency as $curr)
                                                                                                        <option value="{{$curr->code}}">{{$curr->code}} ({{$curr->name}})</option>
                                                                                                        @endforeach
                                                                                                </select>
                                                                                            </div>

                                                                                        </div>
                                                                                        <div class="col-md-2">
                                                                                            <div class="form-group">
                                                                                                <label>Adult </label>
                                                                                                <input type="text"
                                                                                                    class="form-control room_adult"
                                                                                                    placeholder="Adult" id="room_adult__1__1" name="room_adult[0][]" value="1" onkeypress="javascript:return validateNumber(event)">
                                                                                            </div>

                                                                                        </div>
                                                                                        <div class="col-md-2">
                                                                                            <div class="form-group">
                                                                                                <label> CWB <small>(Child with bed)</small></label>
                                                                                                <input type="text"
                                                                                                    class="form-control room_cwb"
                                                                                                    placeholder="CWB" id="room_cwb__1__1" name="room_cwb[0][]"value="0" onkeypress="javascript:return validateNumber(event)">
                                                                                            </div>

                                                                                        </div>
                                                                                        <div class="col-md-2">
                                                                                            <div class="form-group">
                                                                                                <label>CNB <small>(Child with no bed)</small> </label>
                                                                                                <input type="text"
                                                                                                    class="form-control room_cnb"
                                                                                                    placeholder="CNB " id="room_cnb__1__1" name="room_cnb[0][]" value="0" onkeypress="javascript:return validateNumber(event)">
                                                                                            </div>

                                                                                        </div>
                                                                                        <div class="col-md-2">
                                                                                            <div class="form-group">
                                                                                                <label>Weekend </label>
                                                                                                <input type="text"
                                                                                                    class="form-control room_weekend"
                                                                                                    placeholder="Weekend"  id="room_weekend__1__1" name="room_weekend[0][]">
                                                                                            </div>

                                                                                        </div>
                                                                                        <div class="col-md-2">
                                                                                            <div class="form-group">
                                                                                                <label>Meal</label>
                                                                                                <select
                                                                                                    class="form-control room_meal"
                                                                                                    style="width: 100%;"
                                                                                                    id="room_meal__1__1" name="room_meal[0][]">
                                                                                                    <option value="0" disabled="" selected="">SELECT MEAL</option>
                                                                                                    @foreach($hotel_meal as $meals)
                                                                                                     <option value="{{$meals->hotel_meals_id}}">{{$meals->hotel_meals_name}}</option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>

                                                                                        </div>
                                                                                        <div class="col-md-2">
                                                                                            <div class="form-group">
                                                                                                <label>Night /
                                                                                                    Allocation </label>
                                                                                                <input type="text"
                                                                                                    class="form-control room_night"
                                                                                                    placeholder="Night / Allocation"  id="room_night__1__1" name="room_night[0][]">
                                                                                            </div>

                                                                                        </div>
                                                                                        <div class="col-md-2">
                                                                                            <div class="row">
                                                                                                <div class="col-md-12">
                                                                                                    <div
                                                                                                        class="form-group">
                                                                                                        <label>Check
                                                                                                            in-out </label>
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            placeholder="TO"
                                                                                                            class="form-control pull-right timepicker room_checkin" id="room_checkin__1__1" name="room_checkin[0][]">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="col-md-12 mt-10">
                                                                                                    <div
                                                                                                        class="form-group">

                                                                                                        <input
                                                                                                            type="text"
                                                                                                            placeholder="FROM"
                                                                                                            class="form-control pull-right timepicker room_checkout" id="room_checkout__1__1" name="room_checkout[0][]">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>


                                                                                        </div>
                                                                                        <div class="col-sm-6 col-md-12 add_more_rooms_allocations_div">
                                                                                            <img id="add_more_rooms_allocations__1__1" class="add_more_rooms_allocations plus-icon"
                                                                                                style="margin-left: auto;"
                                                                                                src="{{ asset('assets/images/add_icon.png') }}">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="col-sm-12 col-md-12 add_more_main_rates_allocations_div">
                                                    <img  id="add_more_main_rates_allocations1" class="add_more_main_rates_allocations plus-icon" style="margin-left: auto;" src="{{ asset('assets/images/add_icon.png') }}">
                                                </div>
                                            </div>
                                        </div>




                                    </div>
                                </div>

                            </div>

                         <div class="row mb-10">
                                <div class="col-sm-12">
                                    <div class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;">

                                    </div>
                                    <h4 class="box-title" style="border-color: #c1c1c1;margin-top: 25px;">
                                        <i class="fa fa-plus-circle"></i> PROMOTION DETAIL</h4>

                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <button type="button" class="btn btn-rounded btn-primary mr-10 promotion_detail_btn"
                                        data-toggle="collapse" data-target="#promotion_details">Add
                                        Promotion Detail</button>

                                    <div id="promotion_details" class="collapse">
                                        <div class="row mt-15 mb-10">
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label for='hotel_promotion'>PROMOTION <span class="asterisk">*</span> </label>
                                                   
                                                    <input type="text" class="form-control" placeholder="PROMOTION NAME" id="hotel_promotion" name="hotel_promotion">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                    <label for='hotel_prom_discount'>PROMOTION DISCOUNT  <span class="asterisk">*</span> </label>
                                                    <input type="text" class="form-control" placeholder="PROMOTION DISCOUNT in %" id="hotel_prom_discount" name="hotel_prom_discount">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-15 mb-10">
                                           
                                            <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label for="hotel_promotion_from">PROMOTION VALIDITY <span class="asterisk">*</span></label>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <div class="input-group date">
                                                                <input type="text" placeholder="FROM" class="form-control pull-right datepicker" id="hotel_promotion_from" name="hotel_promotion_from">
                                                                <div class="input-group-addon">
                                                                    <i class="fa fa-calendar"></i>
                                                                </div>
                                                            </div>
                                                            <!-- /.input group -->

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <div class="input-group date">
                                                                <input type="text" placeholder="TO" class="form-control pull-right datepicker" id="hotel_promotion_to" name="hotel_promotion_to">
                                                                <div class="input-group-addon">
                                                                    <i class="fa fa-calendar"></i>
                                                                </div>
                                                            </div>
                                                            <!-- /.input group -->

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                       
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                    <label for="hotel_promotion_disc_booking">PROMOTION DISCOUNT ON BOOKING <span class="asterisk">*</span></label>
                                                    <input type="text" class="form-control" placeholder="PROMOTION DISCOUNT ON BOOKING" id="hotel_promotion_disc_booking" name="hotel_promotion_disc_booking">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-15 mb-10">
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label for="hotel_promotion_disc_travel">PROMOTION DISCOUNT ON TRAVEL <span class="asterisk">*</span> </label>
                                                    <input type="text" class="form-control" placeholder="PROMOTION DISCOUNT ON TRAVEL " id="hotel_promotion_disc_travel" name="hotel_promotion_disc_travel">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                             
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>





                            </div>
                            <div class="row mb-10">
                                <div class="col-sm-12">
                                    <div class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;">

                                    </div>
                                    <h4 class="box-title" style="border-color: #c1c1c1;margin-top: 25px;">
                                        <i class="fa fa-plus-circle"></i> HOTEL ADD ON</h4>

                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <button type="button" class="btn btn-rounded btn-primary mr-10 add_on_btn" data-toggle="collapse" data-target="#add_on_details">Add
                                        Hotel Add On</button>

                                      <div id="add_on_details" class="collapse">
                                         <div class="addon_div" id="addon_div1">
                                        <div class="row mt-15 mb-10">
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label for="hotel_addon_name1" id="hotel_addon_name_label1">ADD ON NAME   <span class="asterisk">*</span></label>
                                                    <input type="text" class="form-control" placeholder="ADD ON NAME" id="hotel_addon_name1" name="hotel_addon_name[]">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                    <label for="hotel_desc" id="hotel_desc_label1">DESCRIPTION  <span class="asterisk">*</span> </label>
                                                    <textarea id="hotel_desc1" name="hotel_desc[]" class="form-control" placeholder="DESCRIPTION" spellcheck="false"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-15 mb-10">
                                           
                                            <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label for="hotel_adult_cost1" id="hotel_adult_cost_label1">COST FOR ADULT  <span class="asterisk">*</span></label>
                                                <input type="text" class="form-control" placeholder="COST FOR ADULT " id="hotel_adult_cost1" name="hotel_adult_cost[]" onkeypress="javascript:return validateNumber(event)">
                                                
                                            </div>
                                       
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                    <label for="hotel_child_cost1" id="hotel_child_cost_label1">COST FOR CHILD  <span class="asterisk">*</span></label>
                                                    <input type="text" class="form-control" placeholder="COST FOR CHILD"  id="hotel_child_cost1" name="hotel_child_cost[]" onkeypress="javascript:return validateNumber(event)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-15 mb-10">
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label for="hotel_currency1" id="hotel_currency_label1">CURRENCY  <span class="asterisk">*</span></label>
                                                    <select id="hotel_currency1" name="hotel_currency[]" class="form-control" style="width: 100%;" aria-hidden="true">
                                                        <option selected="selected" value="0" hidden>SELECT CURRENCY </option>
                                                        @foreach($currency as $curr)
                                            <option value="{{$curr->code}}">{{$curr->code}} ({{$curr->name}})</option>
                                            @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 add_more_addon_div">
                                                    <img id="add_more_addon1" class="add_more_addon plus-icon"   style="margin-left: auto;"  src="{{ asset('assets/images/add_icon.png') }}">
                                                </div>
                                            </div>
                                    </div>
                                  
                                </div>
                            </div>
                    <div class="row mb-10">
                                <div class="col-sm-12">
                                    <div class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;">

                                    </div>
                                    <h4 class="box-title" style="border-color: #c1c1c1;margin-top: 25px;">
                                        <i class="fa fa-minus-circle"></i> OTHER POLICIES</h4>

                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <button type="button" class="btn btn-rounded btn-primary mr-10"    data-toggle="collapse" data-target="#policies">Add
                                        Other Policies</button>

                                        <div id="policies" class="collapse">
                                            <div class="other_policies_div" id="other_policies_div1">
                                        <div class="row mt-15 mb-10">
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label for="policy_name1" id="policy_name_label1">NAME <span class="asterisk">*</span></label>
                                                   
                                                    <input type="text" class="form-control" placeholder="NAME" id="policy_name1" name="policy_name[]">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                           
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label for="policy_desc1" id="policy_desc_label1">DESCRIPTION <span class="asterisk">*</span></label>
                                                   
                                                    <textarea class="form-control" placeholder="DESCRIPTION" id="policy_desc1" name="policy_desc[]" spellcheck="false"></textarea>
                                                
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                            
                                            </div>
                                        </div>
                                       
                                        <div class="col-sm-12 col-md-12 add_more_policies_div">
                                                    <img id="add_more_policies1" class="add_more_policies plus-icon"   style="margin-left: auto;" src="{{ asset('assets/images/add_icon.png') }}">
                                                </div>
                                            </div>
                                    </div>
                                   
                                </div>
                                <div class="col-sm-6 col-md-6">

                                </div>




                            </div>
                <div class="row mb-10">
                    <div class="col-sm-12">
                        <div class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;">

                        </div>
                        <h4 class="box-title" style="border-color: #c1c1c1;margin-top: 25px;">
                            <i class="fa fa-plus-circle"></i> VALIDITY</h4>

                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label>BOOKING VALIDITY <span class="asterisk">*</span></label>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="input-group date">
                                                <input type="text" placeholder="FROM"
                                                class="form-control pull-right datepicker" id="validity_operation_from" name="validity_operation_from">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                            </div>
                                            <!-- /.input group -->

                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                         <div class="input-group date">
                                            <input type="text" placeholder="TO"
                                            class="form-control pull-right datepicker" id="validity_operation_to" name="validity_operation_to">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                        </div>
                                        <!-- /.input group -->

                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                        </div>
                    </div>
                    
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row mb-10">
                                <div class="col-sm-12">
                                    <div class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;">

                                    </div>
                                    <h4 class="box-title" style="border-color: #c1c1c1;margin-top: 25px;">
                                        <i class="fa fa-plus-circle"></i> AMENITIES <span class="asterisk">*</span></h4>

                                </div>
                                <div class="col-sm-12">
                                    <div class="box">
                                      <div class="box-body">
                                        @php
                                        $amenities_count=0;
                                       

                                        @endphp
                                        @foreach($fetch_amenities as $amenities)

                                        <h3>{{ $amenities->amenities_name}}</h3>
                                        <input type="hidden" name="amenities[{{$amenities_count}}][0]" id="amenities_{{$amenities_count}}" value="{{$amenities->amenities_id}}">
                                        <div class="row">
                                             <?php
                                             $sub_amenities_count=1;
                                            ?>
                                            @foreach($fetch_sub_amenities as $sub_amenities)
                                            
                                            @if($sub_amenities->amenities_id==$amenities->amenities_id)
                                       
                                            <div class="col-md-3 checkbox">
                                                <input type="checkbox" name="amenities[{{$amenities_count}}][1][]" id="sub_amenities_{{$amenities_count}}_{{$sub_amenities_count}}" value="{{$sub_amenities->sub_amenities_id}}">
                                                <label for="sub_amenities_{{$amenities_count}}_{{$sub_amenities_count}}">{{$sub_amenities->sub_amenities_name}}</label>
                                            </div>
                                              <?php
                                            $sub_amenities_count++;
                                            ?>
                                          
                                            @endif
                                           
                                            @endforeach
                                        </div>
                                         @php
                                            $amenities_count++;
                                            @endphp
                                        @endforeach
                                    </div>
                                </div>
                            </div>





                            </div>
                        </div>
                    </div>
                  

                    <div class="row">
                        <div class="col-md-12">
                            <div class="row mb-10">
                                <div class="col-sm-12">
                                    <div class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;">

                                    </div>
                                    <h4 class="box-title" style="border-color: #c1c1c1;margin-top: 25px;">
                                        <i class="fa fa-plus-circle"></i> INCLUSIONS <span class="asterisk">*</span></h4>

                                </div>
                                <div class="col-sm-12">
                                    <div class="box">

                                        <!-- /.box-header -->
                                        <div class="box-body">
                                             <textarea class="form-control" id="hotel_inclusions" name="hotel_inclusions"></textarea>
                                        </div>
                                    </div>
                                </div>





                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row mb-10">
                                <div class="col-sm-12">
                                    <div class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;">

                                    </div>
                                    <h4 class="box-title" style="border-color: #c1c1c1;margin-top: 25px;">
                                        <i class="fa fa-plus-circle"></i> EXCLUSIONS <span class="asterisk">*</span></h4>

                                </div>
                                <div class="col-sm-12">
                                    <div class="box">

                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <textarea class="form-control" id="hotel_exclusions" name="hotel_exclusions"></textarea>
                                        </div>
                                    </div>
                                </div>





                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row mb-10">
                                <div class="col-sm-12">
                                    <div class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;">

                                    </div>
                                    <h4 class="box-title" style="border-color: #c1c1c1;margin-top: 25px;">
                                        <i class="fa fa-plus-circle"></i> CANCELLATION POLICY <span class="asterisk">*</span></h4>

                                </div>
                                <div class="col-sm-12">
                                    <div class="box">

                                        <!-- /.box-header -->
                                        <div class="box-body">
                                           <textarea class="form-control" id="hotel_cancellation" name="hotel_cancellation"></textarea>
                                        </div>
                                    </div>
                                </div>





                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="row mb-10">
                                <div class="col-sm-12">
                                    <div class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;">

                                    </div>
                                    <h4 class="box-title" style="border-color: #c1c1c1;margin-top: 25px;">
                                        <i class="fa fa-plus-circle"></i> TERMS AND CONDITIONS <span class="asterisk">*</span> </h4>

                                </div>
                                <div class="col-sm-12">
                                    <div class="box">

                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <textarea class="form-control" id="hotel_terms_conditions" name="hotel_terms_conditions"></textarea>
                                        </div>
                                    </div>
                                </div>





                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <div class="img_group">
                            <label>IMAGES</label>
                            <div class="box1">
                                <input class="hide" type="file" id="upload_ativity_images"
                                accept="image/png,image/jpg,image/jpeg"
                                name="upload_ativity_images[]" multiple="multiple">

                                <button type="button"
                                onclick="document.getElementById('upload_ativity_images').click()"
                                id="upload_0" class="btn red btn-outline btn-circle">+

                            </button>
                        </div>
                        <br>

                        <!-- ngRepeat: (itemindex,item) in temp_loop.enquiry_comment_attachment track by $index -->
                       
                        </div>

                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6">

                    </div>
                     <div id="previewImg" class="row">
                        </div>





                </div>







                <div class="row mb-10">
                    <div class="col-md-12">
                        <div class="box-header with-border"
                            style="padding: 10px;border-bottom:none;border-radius:0;border-top:1px solid #c3c3c3">
                            <button type="button" id="save_hotel" class="btn btn-rounded btn-primary mr-10">Save</button>
                            <button type="button" id="discard_hotel" class="btn btn-rounded btn-primary">Discard</button>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
        @else
<h4 class="text-danger">No rights to access this page</h4>
    @endif


</div>
</div>
</div>
</div>
   @include('mains.includes.footer')

        @include('mains.includes.bottom-footer')
        <!-- 
<script>
 function handleFileSelect(event) {
    if (window.File && window.FileList && window.FileReader) {

        var files = event.target.files; //FileList object
        var output = document.getElementById("previewImg");
        output.innerHTML="";

        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            //Only pics
            if (!file.type.match('image')) continue;

            var picReader = new FileReader();
            picReader.addEventListener("load", function (event) {
                var picFile = event.target;
                var div = document.createElement("div");
                 div.className = 'col-md-3';
                div.innerHTML = "<img class='upload_ativity_images_preview' src='" + picFile.result + "'" + "title='" + file.name + "' width=150 height=150 />";
                output.insertBefore(div, null);
            });
            //Read the image
            picReader.readAsDataURL(file);
        }
    } else {
        console.log("Your browser does not support File API");
    }
}

document.getElementById('upload_ativity_images').addEventListener('change', handleFileSelect, false);
</script> -->
<script>
    function all_add_date_timepickers()
{

     var date = new Date();
    date.setDate(date.getDate());
     $('.blackout_days').datepicker({
     multidate: true,
     todayHighlight: true,
     format: 'yyyy-mm-dd',
     startDate:date
 });
      $('.surcharge_day').datepicker({
         autoclose:true,
     todayHighlight: true,
     format: 'yyyy-mm-dd',
     startDate:date
 });
        $('.booking_validity_from').datepicker({
             autoclose:true,
     todayHighlight: true,
     format: 'yyyy-mm-dd',
     startDate:date
 });

         $('.booking_validity_to').datepicker({
             autoclose:true,
     todayHighlight: true,
     format: 'yyyy-mm-dd',
     startDate:date
 });

           $('.stop_sale').datepicker({
             autoclose:true,
     todayHighlight: true,
     format: 'yyyy-mm-dd',
     startDate:date
 });

    $('.timepicker').timepicker({
        showInputs: false,
        timeFormat: 'HH:mm:ss',
    });
}
$(document).ready(function()
{
    document.getElementById('upload_ativity_images').addEventListener('change', handleFileSelect, false);
    CKEDITOR.replace('hotel_exclusions');
    CKEDITOR.replace('hotel_inclusions');
    CKEDITOR.replace('hotel_cancellation');
    CKEDITOR.replace('hotel_terms_conditions');
    $('.select2').select2();
    var date = new Date();
    date.setDate(date.getDate());
    $('#validity_operation_from').datepicker({
        autoclose:true,
        todayHighlight: true,
        format: 'yyyy-mm-dd',
        startDate:date
    }).on('changeDate', function (e) {
        var date_from = $("#validity_operation_from").datepicker("getDate");
        var date_to = $("#validity_operation_to").datepicker("getDate");

        if(!date_to)
        {
            $('#validity_operation_to').datepicker("setDate",date_from);
        }
        else if(date_to<date_from)
        {
            $('#validity_operation_to').datepicker("setDate",date_from);
        }
    });

    $('#validity_operation_to').datepicker({
        autoclose:true,
        todayHighlight: true,
        format: 'yyyy-mm-dd',
        startDate:date
    }).on('changeDate', function (e) {
        var date_from = $("#validity_operation_from").datepicker("getDate");
        var date_to = $("#validity_operation_to").datepicker("getDate");

        if(!date_from)
        {
            $('#validity_operation_from').datepicker("setDate",date_to);
        }
        else if(date_to<date_from)
        {
            $('#validity_operation_from').datepicker("setDate",date_to);
        }
    });

     $('#hotel_promotion_from').datepicker({
        autoclose:true,
        todayHighlight: true,
        format: 'yyyy-mm-dd',
        startDate:date
    }).on('changeDate', function (e) {
        var date_from = $("#hotel_promotion_from").datepicker("getDate");
        var date_to = $("#hotel_promotion_to").datepicker("getDate");

        if(!date_to)
        {
            $('#hotel_promotion_to').datepicker("setDate",date_from);
        }
        else if(date_to<date_from)
        {
            $('#hotel_promotion_to').datepicker("setDate",date_from);
        }
    });

    $('#hotel_promotion_to').datepicker({
        autoclose:true,
        todayHighlight: true,
        format: 'yyyy-mm-dd',
        startDate:date
    }).on('changeDate', function (e) {
        var date_from = $("#hotel_promotion_from").datepicker("getDate");
        var date_to = $("#hotel_promotion_to").datepicker("getDate");

        if(!date_from)
        {
            $('#hotel_promotion_from').datepicker("setDate",date_to);
        }
        else if(date_to<date_from)
        {
            $('#hotel_promotion_from').datepicker("setDate",date_to);
        }
    });
     all_add_date_timepickers();
   

});




    
</script>
<script>
 $(document).on("click",".add_more_main_rates_allocations",function()
    {
        var clone_rates_allocations = $(".rates_allocations_div:last").clone();
        var minus_url = "{!! asset('assets/images/minus_icon.png') !!}";
        var newer_id = $(".rates_allocations_div:last").attr("id");
        var minus_url = "{!! asset('assets/images/minus_icon.png') !!}";
        var add_url= "{!! asset('assets/images/add_icon.png') !!}";
        new_id = newer_id.split('rates_allocations_div');
        old_id=parseInt(new_id[1]);
        new_id = parseInt(new_id[1]) + 1;

        clone_rates_allocations.find('#season_name__'+old_id+'__1').parent().parent().parent().parent().parent().attr('id',"rates_allocations_div"+new_id);
        clone_rates_allocations.find('#season_name__'+old_id+'__1').attr({'id':"season_name__"+new_id+"__1",'name':"season_name["+old_id+"]"}).val("");
        clone_rates_allocations.find('#booking_validity_from__'+old_id+'__1').attr({'id':"booking_validity_from__"+new_id+"__1",'name':"booking_validity_from["+old_id+"]"}).val("");
        clone_rates_allocations.find('#booking_validity_to__'+old_id+'__1').attr({'id':"booking_validity_to__"+new_id+"__1",'name':"booking_validity_to["+old_id+"]"}).val("");
        clone_rates_allocations.find('#stop_sale__'+old_id+'__1').attr({'id':"stop_sale__"+new_id+"__1",'name':"stop_sale["+old_id+"]"}).val("");

        clone_rates_allocations.find("#markup_details"+old_id).attr('id',"markup_details"+new_id);
        clone_rates_allocations.find(".markup_div"+old_id).removeClass("markup_div"+old_id).addClass("markup_div"+new_id);
        clone_rates_allocations.find(".markup_div"+new_id).slice(1).remove();
        clone_rates_allocations.find(".markup_details_btn").attr('data-target',"#markup_details"+new_id);
        clone_rates_allocations.find('#activity_nationality__'+old_id+'__1').attr('id',"activity_nationality__"+new_id+"__1");
        clone_rates_allocations.find('#activity_nationality__'+new_id+'__1').attr('name',"activity_nationality["+old_id+"][]").val(0);
        clone_rates_allocations.find('#activity_nationality__'+new_id+'__1').parent().parent().attr('id',"markup_div__"+new_id+"__1");
        clone_rates_allocations.find('#activity_markup__'+old_id+'__1').attr('id',"activity_markup__"+new_id+"__1");
        clone_rates_allocations.find('#activity_markup__'+new_id+'__1').attr('name',"activity_markup["+old_id+"][]").val(0);
        clone_rates_allocations.find('#activity_amount__'+old_id+'__1').attr('id',"activity_amount__"+new_id+"__1");
        clone_rates_allocations.find('#activity_amount__'+new_id+'__1').attr('name',"activity_amount["+old_id+"][]").val("");
         clone_rates_allocations.find(".add_more_markup_div").html('');
        clone_rates_allocations.find(".add_more_markup_div").append('<img id="add_more_markup__'+new_id+'__1" class="add_more_markup plus-icon" src="'+add_url+'"   style="margin-left: auto;"> ');
        

        clone_rates_allocations.find('#blackout_days__'+old_id+'__1').attr({'id':"blackout_days__"+new_id+"__1",'name':"blackout_days["+old_id+"]"});

        clone_rates_allocations.find("#surcharge_details"+old_id).attr('id',"surcharge_details"+new_id);
          clone_rates_allocations.find(".surcharge_div"+old_id).removeClass("surcharge_div"+old_id).addClass("surcharge_div"+new_id);
          clone_rates_allocations.find(".surcharge_div"+new_id).slice(1).remove();
        clone_rates_allocations.find(".surcharge_details_btn").attr('data-target',"#surcharge_details"+new_id);
        clone_rates_allocations.find('#surcharge_name__'+old_id+'__1').attr('id',"surcharge_name__"+new_id+"__1");
        clone_rates_allocations.find('#surcharge_name__'+new_id+'__1').attr('name',"surcharge_name["+old_id+"][]").val("");
        clone_rates_allocations.find('#surcharge_name__'+new_id+'__1').parent().parent().attr('id',"surcharge_div__"+new_id+"__1");
        clone_rates_allocations.find('#surcharge_day__'+old_id+'__1').attr('id',"surcharge_day__"+new_id+"__1");
        clone_rates_allocations.find('#surcharge_day__'+new_id+'__1').attr('name',"surcharge_day["+old_id+"][]").val("");
        clone_rates_allocations.find('#surcharge_price__'+old_id+'__1').attr('id',"surcharge_price__"+new_id+"__1");
        clone_rates_allocations.find('#surcharge_price__'+new_id+'__1').attr('name',"surcharge_price["+old_id+"][]").val("");
          clone_rates_allocations.find(".add_more_surcharge_div").html('');
        clone_rates_allocations.find(".add_more_surcharge_div").append('<img id="add_more_surcharge__'+new_id+'__1" class="add_more_surcharge plus-icon"  src="'+add_url+'"   style="margin-left: auto;"> ');



        clone_rates_allocations.find('#room_type__'+old_id+'__1').attr('id',"room_type__"+new_id+"__1");
        clone_rates_allocations.find('#room_type__'+new_id+'__1').attr('name',"room_type["+old_id+"][]").val("");
        clone_rates_allocations.find(".room_details"+old_id).removeClass("room_details"+old_id).addClass("room_details"+new_id);
         clone_rates_allocations.find(".room_details"+new_id).slice(1).remove();
        clone_rates_allocations.find("#room_type__"+new_id+"__1").parent().parent().parent().attr('id',"room_details__"+new_id+"__1");
        clone_rates_allocations.find('#room_min__'+old_id+'__1').attr('id',"room_min__"+new_id+"__1");
        clone_rates_allocations.find('#room_min__'+new_id+'__1').attr('name',"room_min["+old_id+"][]").val("");

         clone_rates_allocations.find('#room_max__'+old_id+'__1').attr('id',"room_max__"+new_id+"__1");
        clone_rates_allocations.find('#room_max__'+new_id+'__1').attr('name',"room_max["+old_id+"][]").val("");

        clone_rates_allocations.find('#room_class__'+old_id+'__1').attr('id',"room_class__"+new_id+"__1");
        clone_rates_allocations.find('#room_class__'+new_id+'__1').attr('name',"room_class["+old_id+"][]").val("");

        clone_rates_allocations.find('#room_currency__'+old_id+'__1').attr('id',"room_currency__"+new_id+"__1");
        clone_rates_allocations.find('#room_currency__'+new_id+'__1').attr('name',"room_currency["+old_id+"][]").val(0);

        clone_rates_allocations.find('#room_adult__'+old_id+'__1').attr('id',"room_adult__"+new_id+"__1");
        clone_rates_allocations.find('#room_adult__'+new_id+'__1').attr('name',"room_adult["+old_id+"][]").val("");

        clone_rates_allocations.find('#room_cwb__'+old_id+'__1').attr('id',"room_cwb__"+new_id+"__1");
        clone_rates_allocations.find('#room_cwb__'+new_id+'__1').attr('name',"room_cwb["+old_id+"][]").val("");

        clone_rates_allocations.find('#room_cnb__'+old_id+'__1').attr('id',"room_cnb__"+new_id+"__1");
        clone_rates_allocations.find('#room_cnb__'+new_id+'__1').attr('name',"room_cnb["+old_id+"][]").val("");

        clone_rates_allocations.find('#room_weekend__'+old_id+'__1').attr('id',"room_weekend__"+new_id+"__1");
        clone_rates_allocations.find('#room_weekend__'+new_id+'__1').attr('name',"room_weekend["+old_id+"][]").val("");

        clone_rates_allocations.find('#room_meal__'+old_id+'__1').attr('id',"room_meal__"+new_id+"__1");
        clone_rates_allocations.find('#room_meal__'+new_id+'__1').attr('name',"room_meal["+old_id+"][]").val(0);

         clone_rates_allocations.find('#room_night__'+old_id+'__1').attr('id',"room_night__"+new_id+"__1");
        clone_rates_allocations.find('#room_night__'+new_id+'__1').attr('name',"room_night["+old_id+"][]").val("");

         clone_rates_allocations.find('#room_checkin__'+old_id+'__1').attr('id',"room_checkin__"+new_id+"__1");
        clone_rates_allocations.find('#room_checkin__'+new_id+'__1').attr('name',"room_checkin["+old_id+"][]");

         clone_rates_allocations.find('#room_checkout__'+old_id+'__1').attr('id',"room_checkout__"+new_id+"__1");
        clone_rates_allocations.find('#room_checkout__'+new_id+'__1').attr('name',"room_checkout["+old_id+"][]");
         clone_rates_allocations.find(".add_more_rooms_allocations_div").html("");
        clone_rates_allocations.find(".add_more_rooms_allocations_div").append('<img id="add_more_rooms_allocations__'+new_id+'__1" class="add_more_rooms_allocations plus-icon"  src="'+add_url+'"   style="margin-left: auto;"> ');

         $("#rates_allocations_div"+old_id).find(".add_more_main_rates_allocations_div").html("");
          if(old_id>1)
          {
           $("#rates_allocations_div"+old_id).find(".add_more_main_rates_allocations_div").append('<img id="remove_more_main_rates_allocations'+old_id+'" class="remove_more_main_rates_allocations minus-icon"  src="'+minus_url+'"   style="margin-left: auto;">');
            }
        clone_rates_allocations.find(".add_more_main_rates_allocations_div").html('');
        clone_rates_allocations.find(".add_more_main_rates_allocations_div").append(' <img id="remove_more_main_rates_allocations'+new_id+'" class="remove_more_main_rates_allocations minus-icon"  src="'+minus_url+'"   style="margin-left: auto;"> <img id="add_more_main_rates_allocations'+new_id+'" class="add_more_main_rates_allocations plus-icon"  src="'+add_url+'"   style="margin-left: auto;"> ');

        $(".rates_allocations_div:last").after(clone_rates_allocations);

         all_add_date_timepickers();
    });

    $(document).on("click", ".remove_more_main_rates_allocations", function () {
        var id = this.id;
        var split_id = id.split('remove_more_main_rates_allocations');
        $("#rates_allocations_div" + split_id[1]).remove();
        var minus_url = "{!! asset('assets/images/minus_icon.png') !!}";
        var add_url= "{!! asset('assets/images/add_icon.png') !!}";
        var last_id = $(".rates_allocations_div:last").attr("id");
        old_id = last_id.split('rates_allocations_div');
        old_id=parseInt(old_id[1]);

        if(old_id>1)
        {
           $("#rates_allocations_div"+old_id).find(".add_more_main_rates_allocations_div").html("");
        $("#rates_allocations_div"+old_id).find(".add_more_main_rates_allocations_div").append('<img id="remove_more_main_rates_allocations'+old_id+'" class="remove_more_main_rates_allocations minus-icon" src="'+minus_url+'"   style="margin-left: auto;"> <img id="add_more_main_rates_allocations'+old_id+'" class="add_more_main_rates_allocations plus-icon"  src="'+add_url+'"   style="margin-left: auto;">'); 
        }
        else
        {

        $("#rates_allocations_div"+old_id).find(".add_more_main_rates_allocations_div").html("");
        $("#rates_allocations_div"+old_id).find(".add_more_main_rates_allocations_div").append(' <img id="add_more_main_rates_allocations'+old_id+'" class="add_more_main_rates_allocations plus-icon"  src="'+add_url+'"   style="margin-left: auto;">'); 
        }

        
    });




    $(document).on("click",".add_more_policies",function()
    {
        var clone_policies = $(".other_policies_div:last").clone();
        var minus_url = "{!! asset('assets/images/minus_icon.png') !!}";
        var add_url= "{!! asset('assets/images/add_icon.png') !!}";
        var newer_id = $(".other_policies_div:last").attr("id");
        new_id = newer_id.split('other_policies_div');
        old_id=parseInt(new_id[1]);
        new_id = parseInt(new_id[1]) + 1;

        clone_policies.find("input[name='policy_name[]']").attr("id", "policy_name" + new_id).val("");
        clone_policies.find("label#policy_name_label"+old_id).attr({"id":"policy_name_label" + new_id,"for":"policy_name" + new_id}).val("");
        clone_policies.find("input[name='policy_name[]']").parent().parent().parent().parent().attr("id","other_policies_div" + new_id);
        clone_policies.find("textarea[name='policy_desc[]']").attr("id", "policy_desc" + new_id).val("");
        clone_policies.find("label#policy_desc_label"+old_id).attr({"id":"policy_desc_label" + new_id,"for":"policy_desc" + new_id}).val("");
          $("#other_policies_div"+old_id).find(".add_more_policies_div").html("");
          if(old_id>1)
          {
           $("#other_policies_div"+old_id).find(".add_more_policies_div").append('<img id="remove_more_policies'+old_id+'" class="remove_more_policies minus-icon"  src="'+minus_url+'"   style="margin-left: auto;">');
            }
        clone_policies.find(".add_more_policies_div").html('');
        clone_policies.find(".add_more_policies_div").append(' <img id="remove_more_policies'+new_id+'" class="remove_more_policies minus-icon"  src="'+minus_url+'"   style="margin-left: auto;"> <img id="add_more_policies'+new_id+'" class="add_more_policies plus-icon"  src="'+add_url+'"   style="margin-left: auto;"> ');
            
        $(".other_policies_div:last").after(clone_policies);
    });
      $(document).on("click", ".remove_more_policies", function () {
        var id = this.id;
        var split_id = id.split('remove_more_policies');
        $("#other_policies_div" + split_id[1]).remove();
         var minus_url = "{!! asset('assets/images/minus_icon.png') !!}";
        var add_url= "{!! asset('assets/images/add_icon.png') !!}";
        var last_id = $(".other_policies_div:last").attr("id");
          old_id = last_id.split('other_policies_div');
        old_id=parseInt(old_id[1]);

        if(old_id>1)
        {
           $("#other_policies_div"+old_id).find(".add_more_policies_div").html("");
        $("#other_policies_div"+old_id).find(".add_more_policies_div").append('<img id="remove_more_policies'+old_id+'" class="remove_more_policies minus-icon"  src="'+minus_url+'"   style="margin-left: auto;"> <img id="add_more_policies'+old_id+'" class="add_more_policies plus-icon"  src="'+add_url+'"   style="margin-left: auto;">'); 
        }
        else
        {

           $("#other_policies_div"+old_id).find(".add_more_policies_div").html("");
        $("#other_policies_div"+old_id).find(".add_more_policies_div").append(' <img id="add_more_policies'+old_id+'" class="add_more_policies plus-icon"  src="'+add_url+'"   style="margin-left: auto;">'); 
        }
    });

    $(document).on("click",".add_more_addon",function()
    {
        var clone_addon = $(".addon_div:last").clone();
        var minus_url = "{!! asset('assets/images/minus_icon.png') !!}";
        var add_url= "{!! asset('assets/images/add_icon.png') !!}";
        var newer_id = $(".addon_div:last").attr("id");
        new_id = newer_id.split('addon_div');
        old_id=parseInt(new_id[1]);
        new_id = parseInt(new_id[1]) + 1;

        clone_addon.find("input[name='hotel_addon_name[]']").attr("id", "hotel_addon_name" + new_id).val("");
        clone_addon.find("label#hotel_addon_name_label"+old_id).attr({"id":"hotel_addon_name_label" + new_id,"for":"hotel_addon_name" + new_id}).val("");
        clone_addon.find("input[name='hotel_addon_name[]']").parent().parent().parent().parent().attr("id","addon_div" + new_id);
        clone_addon.find("textarea[name='hotel_desc[]']").attr("id", "hotel_desc" + new_id).val("");
        clone_addon.find("label#hotel_desc_label"+old_id).attr({"id":"hotel_desc_label" + new_id,"for":"hotel_desc" + new_id}).val("");
        clone_addon.find("input[name='hotel_adult_cost[]']").attr("id", "hotel_adult_cost" + new_id).val("");
        clone_addon.find("label#hotel_adult_cost"+old_id).attr({"id":"hotel_adult_cost_label" + new_id,"for":"hotel_adult_cost" + new_id}).val("");
        clone_addon.find("input[name='hotel_child_cost[]']").attr("id", "hotel_child_cost" + new_id).val("");
        clone_addon.find("label#hotel_child_cost"+old_id).attr({"id":"hotel_child_cost_label" + new_id,"for":"hotel_child_cost" + new_id}).val("");
        clone_addon.find("select[name='hotel_currency[]']").attr("id", "hotel_currency" + new_id).val("0");
        clone_addon.find("label#hotel_currency"+old_id).attr({"id":"hotel_currency_label" + new_id,"for":"hotel_currency" + new_id}).val("");


        $("#addon_div"+old_id).find(".add_more_addon_div").html("");
        if(old_id>1)
        {
           $("#addon_div"+old_id).find(".add_more_addon_div").append('<img id="remove_more_addon'+old_id+'" class="remove_more_addon minus-icon"  src="'+minus_url+'"  style="margin-left: auto;">');
       }
       clone_addon.find(".add_more_addon_div").html('');
       clone_addon.find(".add_more_addon_div").append(' <img id="remove_more_addon'+new_id+'" class="remove_more_addon minus-icon"  src="'+minus_url+'"  style="margin-left: auto;"> <img id="add_more_addon'+new_id+'" class="add_more_addon plus-icon"  src="'+add_url+'"  style="margin-left: auto;"> ');

        $(".addon_div:last").after(clone_addon);
    });
    
     $(document).on("click", ".remove_more_addon", function () {
        var id = this.id;
        var split_id = id.split('remove_more_addon');
        $("#addon_div" + split_id[1]).remove();
        var minus_url = "{!! asset('assets/images/minus_icon.png') !!}";
        var add_url= "{!! asset('assets/images/add_icon.png') !!}";
        var last_id = $(".addon_div:last").attr("id");
        old_id = last_id.split('addon_div');
        old_id=parseInt(old_id[1]);

        if(old_id>1)
        {
           $("#addon_div"+old_id).find(".add_more_addon_div").html("");
        $("#addon_div"+old_id).find(".add_more_addon_div").append('<img id="remove_more_addon'+old_id+'" class="remove_more_addon minus-icon" src="'+minus_url+'"> <img id="add_more_addon'+old_id+'" class="add_more_addon plus-icon" src="'+add_url+'">'); 
        }
        else
        {

        $("#addon_div"+old_id).find(".add_more_addon_div").html("");
        $("#addon_div"+old_id).find(".add_more_addon_div").append(' <img id="add_more_addon'+old_id+'" class="add_more_addon plus-icon" src="'+add_url+'">'); 
        }

        
    });

       $(document).on("click",".add_more_markup",function()
    {
        var parent_id=$(this).parent().parent().attr("id");
        var parent_id=parent_id.split("__");

        var clone_markup = $(".markup_div"+parent_id[1]+":last").clone();
        var minus_url = "{!! asset('assets/images/minus_icon.png') !!}";
        var add_url= "{!! asset('assets/images/add_icon.png') !!}";
        var newer_id = $(".markup_div"+parent_id[1]+":last").attr("id");
        new_id = newer_id.split("__");
        old_id=parseInt(new_id[2]);
        new_id = parseInt(new_id[2]) + 1;

        clone_markup.find('#activity_nationality__'+parent_id[1]+'__'+old_id).attr('id',"activity_nationality__"+parent_id[1]+"__"+new_id).val(0);
        clone_markup.find("#activity_nationality__"+parent_id[1]+"__"+new_id).parent().parent().attr('id',"markup_div__"+parent_id[1]+"__"+new_id);
        clone_markup.find('#activity_markup__'+parent_id[1]+'__'+old_id).attr('id',"activity_markup__"+parent_id[1]+"__"+new_id).val(0);
        clone_markup.find('#activity_amount__'+parent_id[1]+'__'+old_id).attr('id',"activity_amount__"+parent_id[1]+"__"+new_id).val("");


        $("#markup_div__"+parent_id[1]+"__"+old_id).find(".add_more_markup_div").html("");
        if(old_id>1)
        {
           $("#markup_div__"+parent_id[1]+"__"+old_id).find(".add_more_markup_div").append('<img id="remove_more_markup__'+parent_id[1]+'__'+old_id+'" class="remove_more_markup minus-icon" src="'+minus_url+'">');
       }
       clone_markup.find(".add_more_markup_div").html('');
       clone_markup.find(".add_more_markup_div").append(' <img id="remove_more_markup__'+parent_id[1]+'__'+new_id+'" class="remove_more_markup minus-icon" src="'+minus_url+'"> <img id="add_more_markup__'+parent_id[1]+'__'+new_id+'" class="add_more_markup plus-icon" src="'+add_url+'"> ');

        $(".markup_div"+parent_id[1]+":last").after(clone_markup);
    });

 


       $(document).on("click", ".remove_more_markup", function () {
         var parent_id=$(this).parent().parent().attr("id");
         var parent_id=parent_id.split("__"); 
         var id = this.id;
         var split_id = id.split('__');
         $("#markup_div__"+parent_id[1]+"__"+split_id[2]).remove();
         var minus_url = "{!! asset('assets/images/minus_icon.png') !!}";
         var add_url= "{!! asset('assets/images/add_icon.png') !!}";
         var last_id = $(".markup_div"+parent_id[1]+":last").attr("id");
         old_id = last_id.split('__');
         old_id=parseInt(old_id[2]);


         if(old_id>1)
         {
           $("#markup_div__"+parent_id[1]+"__"+old_id).find(".add_more_markup_div").html("");
           $("#markup_div__"+parent_id[1]+"__"+old_id).find(".add_more_markup_div").append('<img id="remove_more_markup__'+parent_id[1]+'__'+old_id+'" class="remove_more_markup minus-icon"  src="'+minus_url+'"> <img id="add_more_markup__'+parent_id[1]+'__'+old_id+'" class="add_more_markup plus-icon" src="'+add_url+'"> '); 
       }
       else
       {

         $("#markup_div__"+parent_id[1]+"__"+old_id).find(".add_more_markup_div").html("");
         $("#markup_div__"+parent_id[1]+"__"+old_id).find(".add_more_markup_div").append(' <img id="add_more_markup__'+parent_id[1]+'__'+old_id+'" class="add_more_markup plus-icon"  src="'+add_url+'"> '); 
     }


 });

          $(document).on("click",".add_more_surcharge",function()
    {
        var parent_id=$(this).parent().parent().attr("id");
        var parent_id=parent_id.split("__");

        var clone_markup = $(".surcharge_div"+parent_id[1]+":last").clone();
        var minus_url = "{!! asset('assets/images/minus_icon.png') !!}";
        var add_url= "{!! asset('assets/images/add_icon.png') !!}";
        var newer_id = $(".surcharge_div"+parent_id[1]+":last").attr("id");
        new_id = newer_id.split("__");
        old_id=parseInt(new_id[2]);
        new_id = parseInt(new_id[2]) + 1;

        clone_markup.find('#surcharge_name__'+parent_id[1]+'__'+old_id).attr('id',"surcharge_name__"+parent_id[1]+"__"+new_id).val("");
        clone_markup.find("#surcharge_name__"+parent_id[1]+"__"+new_id).parent().parent().attr('id',"surcharge_div__"+parent_id[1]+"__"+new_id);
        clone_markup.find('#surcharge_day__'+parent_id[1]+'__'+old_id).attr('id',"surcharge_day__"+parent_id[1]+"__"+new_id).val("");
        clone_markup.find('#surcharge_price__'+parent_id[1]+'__'+old_id).attr('id',"surcharge_price__"+parent_id[1]+"__"+new_id).val("");


        $("#surcharge_div__"+parent_id[1]+"__"+old_id).find(".add_more_surcharge_div").html("");
        if(old_id>1)
        {
           $("#surcharge_div__"+parent_id[1]+"__"+old_id).find(".add_more_surcharge_div").append('<img id="remove_more_surcharge__'+parent_id[1]+'__'+old_id+'" class="remove_more_surcharge minus-icon" src="'+minus_url+'">');
       }
       clone_markup.find(".add_more_surcharge_div").html('');
       clone_markup.find(".add_more_surcharge_div").append(' <img id="remove_more_surcharge__'+parent_id[1]+'__'+new_id+'" class="remove_more_surcharge minus-icon" src="'+minus_url+'"> <img id="add_more_surcharge__'+parent_id[1]+'__'+new_id+'" class="add_more_surcharge plus-icon" src="'+add_url+'"> ');

        $(".surcharge_div"+parent_id[1]+":last").after(clone_markup);
        all_add_date_timepickers();
    });

          $(document).on("click", ".remove_more_surcharge", function () {
          var parent_id=$(this).parent().parent().attr("id");
         var parent_id=parent_id.split("__"); 
         var id = this.id;
         var split_id = id.split('__');
         $("#surcharge_div__"+parent_id[1]+"__"+split_id[2]).remove();
         var minus_url = "{!! asset('assets/images/minus_icon.png') !!}";
         var add_url= "{!! asset('assets/images/add_icon.png') !!}";
         var last_id = $(".surcharge_div"+parent_id[1]+":last").attr("id");
         old_id = last_id.split('__');
         old_id=parseInt(old_id[2]);


         if(old_id>1)
         {
           $("#surcharge_div__"+parent_id[1]+"__"+old_id).find(".add_more_surcharge_div").html("");
           $("#surcharge_div__"+parent_id[1]+"__"+old_id).find(".add_more_surcharge_div").append('<img id="remove_more_surcharge__'+parent_id[1]+'__'+old_id+'" class="remove_more_surcharge minus-icon" src="'+minus_url+'"> <img id="add_more_surcharge__'+parent_id[1]+'__'+old_id+'" class="add_more_surcharge plus-icon" src="'+add_url+'"> '); 
       }
       else
       {

         $("#surcharge_div__"+parent_id[1]+"__"+old_id).find(".add_more_surcharge_div").html("");
         $("#surcharge_div__"+parent_id[1]+"__"+old_id).find(".add_more_surcharge_div").append(' <img id="add_more_surcharge__'+parent_id[1]+'__'+old_id+'" class="add_more_surcharge plus-icon" src="'+add_url+'"> '); 
     }


 });

           $(document).on("click",".add_more_rooms_allocations",function()
    {
        var parent_id=$(this).parent().parent().attr("id");
        var parent_id=parent_id.split("__");

        var clone_rooms = $(".room_details"+parent_id[1]+":last").clone();
        var minus_url = "{!! asset('assets/images/minus_icon.png') !!}";
        var add_url= "{!! asset('assets/images/add_icon.png') !!}";
        var newer_id = $(".room_details"+parent_id[1]+":last").attr("id");
        new_id = newer_id.split("__");
        old_id=parseInt(new_id[2]);
        new_id = parseInt(new_id[2]) + 1;

        clone_rooms.find('#room_type__'+parent_id[1]+'__'+old_id).attr('id',"room_type__"+parent_id[1]+"__"+new_id).val("");
        clone_rooms.find("#room_type__"+parent_id[1]+"__"+new_id).parent().parent().parent().attr('id',"room_details__"+parent_id[1]+"__"+new_id);
        clone_rooms.find('#room_min__'+parent_id[1]+'__'+old_id).attr('id',"room_min__"+parent_id[1]+"__"+new_id).val("");
        clone_rooms.find('#room_max__'+parent_id[1]+'__'+old_id).attr('id',"room_max__"+parent_id[1]+"__"+new_id).val("");
        clone_rooms.find('#room_class__'+parent_id[1]+'__'+old_id).attr('id',"room_class__"+parent_id[1]+"__"+new_id).val("");
        clone_rooms.find('#room_currency__'+parent_id[1]+'__'+old_id).attr('id',"room_currency__"+parent_id[1]+"__"+new_id).val(0);
        clone_rooms.find('#room_adult__'+parent_id[1]+'__'+old_id).attr('id',"room_adult__"+parent_id[1]+"__"+new_id).val("");
        clone_rooms.find('#room_cwb__'+parent_id[1]+'__'+old_id).attr('id',"room_cwb__"+parent_id[1]+"__"+new_id).val("");
        clone_rooms.find('#room_cnb__'+parent_id[1]+'__'+old_id).attr('id',"room_cnb__"+parent_id[1]+"__"+new_id).val("");
        clone_rooms.find('#room_weekend__'+parent_id[1]+'__'+old_id).attr('id',"room_weekend__"+parent_id[1]+"__"+new_id).val("");
        clone_rooms.find('#room_meal__'+parent_id[1]+'__'+old_id).attr('id',"room_meal_"+parent_id[1]+"__"+new_id).val(0);
        clone_rooms.find('#room_night__'+parent_id[1]+'__'+old_id).attr('id',"room_night_"+parent_id[1]+"__"+new_id).val("");
        clone_rooms.find('#room_checkin__'+parent_id[1]+'__'+old_id).attr('id',"room_checkin_"+parent_id[1]+"__"+new_id);
        clone_rooms.find('#room_checkout__'+parent_id[1]+'__'+old_id).attr('id',"room_checkout_"+parent_id[1]+"__"+new_id);

        

       //  clone_markup.find('#activity_markup__'+parent_id[1]+'__'+old_id).attr('id',"activity_markup__"+parent_id[1]+"__"+new_id);
       //  clone_markup.find('#activity_amount__'+parent_id[1]+'__'+old_id).attr('id',"activity_amount__"+parent_id[1]+"__"+new_id);


        $("#room_details__"+parent_id[1]+"__"+old_id).find(".add_more_rooms_allocations_div").html("");
        if(old_id>1)
        {
           $("#room_details__"+parent_id[1]+"__"+old_id).find(".add_more_rooms_allocations_div").append('<img id="remove_more_rooms_allocations__'+parent_id[1]+'__'+old_id+'" class="remove_more_rooms_allocations minus-icon"  src="'+minus_url+'">');
       }
       clone_rooms.find(".add_more_rooms_allocations_div").html('');
       clone_rooms.find(".add_more_rooms_allocations_div").append(' <img id="remove_more_rooms_allocations__'+parent_id[1]+'__'+new_id+'" class="remove_more_rooms_allocations minus-icon"  src="'+minus_url+'"> <img id="add_more_rooms_allocations__'+parent_id[1]+'__'+new_id+'" class="add_more_rooms_allocations plus-icon"  src="'+add_url+'"> ');

        $(".room_details"+parent_id[1]+":last").after(clone_rooms);
    });

</script>
<script>
    $(document).on("change","#supplier_name",function()
    {
        if($("#supplier_name").val()!="0")
        {
            var supplier_id=$(this).val();
            $.ajax({
                url:"{{route('search-supplier-country')}}",
                type:"GET",
                data:{"supplier_id":supplier_id},
                success:function(response)
                {
                    $("#hotel_country").html(response);
                    $('#hotel_country').select2();
                    $("#hotel_country").prop("disabled",false);

                     $("#hotel_city").html("");

                }
            });
        }
    });

    $(document).on("change","#hotel_country",function()
    {
         if($("#hotel_country").val()!="0")
        {
            var country_id=$(this).val();
            $.ajax({
                url:"{{route('search-country-cities')}}",
                type:"GET",
                data:{"country_id":country_id},
                success:function(response)
                {
                   
                    $("#hotel_city").html(response);
                    $('#hotel_city').select2();
                      $("#acitvity_city_div").show();
                   

                }
            });
        }

    });
</script>
<script>
    $(document).on("click","#save_hotel",function()
    {
        var hotel_name=$("#hotel_name").val();
        var supplier_name=$("#supplier_name").val();
        var contact_no=$("#contact_no").val();
        var hotel_rating=$("#hotel_rating").val();
        var hotel_country=$("#hotel_country").val();
        var hotel_address=$("#hotel_address").val();
        var hotel_description=$("#hotel_description").val();
        var hotel_city=$("#hotel_city").val();
        var validity_operation_from=$("#validity_operation_from").val();
        var validity_operation_to=$("#validity_operation_to").val();
        var hotel_promotion=$("#hotel_promotion").val();
        var hotel_prom_discount=$("#hotel_prom_discount").val();
        var hotel_promotion_from=$("#hotel_promotion_from").val();
        var hotel_promotion_to=$("#hotel_promotion_to").val();
        var hotel_promotion_disc_booking=$("#hotel_promotion_disc_booking").val();
        var hotel_promotion_disc_travel=$("#hotel_promotion_disc_travel").val();

        var hotel_inclusions= CKEDITOR.instances.hotel_inclusions.getData();
        var hotel_exclusions=CKEDITOR.instances.hotel_exclusions.getData();
        var hotel_cancellation=CKEDITOR.instances.hotel_cancellation.getData();
        var hotel_terms_conditions=CKEDITOR.instances.hotel_terms_conditions.getData();




        if (hotel_name.trim() == "")
        {
            $("#hotel_name").css("border", "1px solid #cf3c63");
        } 
        else
        {
            $("#hotel_name").css("border", "1px solid #9e9e9e");
        }

        if (supplier_name == "0")
        {
            $("#supplier_name").parent().find(".select2-selection").css("border", "1px solid #cf3c63");
        } 
        else
        {
         $("#supplier_name").parent().find(".select2-selection").css("border", "1px solid #9e9e9e");
        }
          if (contact_no.trim() == "")
        {
            $("#contact_no").css("border", "1px solid #cf3c63");
        } 
        else
        {
            $("#contact_no").css("border", "1px solid #9e9e9e");
        }
        if (hotel_rating.trim() == "0")
        {
            $("#hotel_rating").css("border", "1px solid #cf3c63");
        } 
        else
        {
            $("#hotel_rating").css("border", "1px solid #9e9e9e");
        }
        if (hotel_country == "0")
        {
        $("#hotel_country").parent().find(".select2-selection").css("border", "1px solid #cf3c63");
        } 
        else
        {
        $("#hotel_country").parent().find(".select2-selection").css("border", "1px solid #9e9e9e");
        }
        if (hotel_city == "0")
        {
         $("#hotel_city").parent().find(".select2-selection").css("border", "1px solid #cf3c63");
        } 
        else
        {
         $("#hotel_city").parent().find(".select2-selection").css("border", "1px solid #9e9e9e");
        }
        if (hotel_address.trim() == "")
        {
            $("#hotel_address").css("border", "1px solid #cf3c63");
        } 
        else
        {
            $("#hotel_address").css("border", "1px solid #9e9e9e");
        }
          if (hotel_description.trim() == "")
        {
            $("#hotel_description").css("border", "1px solid #cf3c63");
        } 
        else
        {
            $("#hotel_description").css("border", "1px solid #9e9e9e");
        }
         if (validity_operation_from.trim() == "")
        {
            $("#validity_operation_from").css("border", "1px solid #cf3c63");
        } 
        else
        {
            $("#validity_operation_from").css("border", "1px solid #9e9e9e");
        }
         if (validity_operation_to.trim() == "")
        {
            $("#validity_operation_to").css("border", "1px solid #cf3c63");
        } 
        else
        {
            $("#validity_operation_to").css("border", "1px solid #9e9e9e");
        }
         if (hotel_promotion.trim() == "")
        {
            $("#hotel_promotion").css("border", "1px solid #cf3c63");
            $("#promotion_details").addClass("show");
        } 
        else
        {
            $("#hotel_promotion").css("border", "1px solid #9e9e9e");
        }
         if (hotel_prom_discount.trim() == "")
        {
            $("#hotel_prom_discount").css("border", "1px solid #cf3c63");
            $("#promotion_details").addClass("show");
        } 
        else
        {
            $("#hotel_prom_discount").css("border", "1px solid #9e9e9e");
        }
         if (hotel_promotion_from.trim() == "")
        {
            $("#hotel_promotion_from").css("border", "1px solid #cf3c63");
             $("#promotion_details").addClass("show");
        } 
        else
        {
            $("#hotel_promotion_from").css("border", "1px solid #9e9e9e");
        }
        if (hotel_promotion_to.trim() == "")
        {
            $("#hotel_promotion_to").css("border", "1px solid #cf3c63");
             $("#promotion_details").addClass("show");
        } 
        else
        {
            $("#hotel_promotion_to").css("border", "1px solid #9e9e9e");
        }
         if (hotel_promotion_disc_booking.trim() == "")
        {
            $("#hotel_promotion_disc_booking").css("border", "1px solid #cf3c63");
            $("#promotion_details").addClass("show");
        } 
        else
        {
            $("#hotel_promotion_disc_booking").css("border", "1px solid #9e9e9e");
        }
         if (hotel_promotion_disc_travel.trim() == "")
        {
            $("#hotel_promotion_disc_travel").css("border", "1px solid #cf3c63");
            $("#promotion_details").addClass("show");
        } 
        else
        {
            $("#hotel_promotion_disc_travel").css("border", "1px solid #9e9e9e");
        }


 var season_name = 1;
var season_name_error = 0;
$(".season_name").each(function () {
    var season_name_id=$(this).attr("id");
    if ($(this).val() == "") {
        $("#" + season_name_id).css("border", "1px solid #cf3c63");
        $("#" + season_name_id).focus();
        season_name_error++;
    } else {
         $("#" + season_name_id).css("border", "1px solid #9e9e9e");
    }
    season_name++;

});

var booking_validity_from  = 1;
var booking_validity_from_error = 0;
$(".booking_validity_from").each(function () {
    var booking_validity_from_id=$(this).attr("id");
    if ($(this).val() == "") {
        $("#" + booking_validity_from_id).css("border", "1px solid #cf3c63");
        $("#" + booking_validity_from_id).focus();
        booking_validity_from_error++;
    } else {
         $("#" + booking_validity_from_id).css("border", "1px solid #9e9e9e");
    }
    booking_validity_from++;

});

var booking_validity_to  = 1;
var booking_validity_to_error = 0;
$(".booking_validity_to").each(function () {
    var booking_validity_to_id=$(this).attr("id");
    if ($(this).val() == "") {
        $("#" + booking_validity_to_id).css("border", "1px solid #cf3c63");
        $("#" + booking_validity_to_id).focus();
        booking_validity_to_error++;
    } else {
         $("#" + booking_validity_to_id).css("border", "1px solid #9e9e9e");
    }
    booking_validity_to++;

});

var stop_sale  = 1;
var stop_sale_error = 0;
$(".stop_sale").each(function () {
    var stop_sale_id=$(this).attr("id");
    if ($(this).val() == "") {
        $("#" + stop_sale_id).css("border", "1px solid #cf3c63");
        $("#" + stop_sale_id).addClass("show");
        stop_sale_error++;
    } else {
         $("#" + stop_sale_id).css("border", "1px solid #9e9e9e");
    }
    stop_sale++;

});

// var activity_nationality  = 1;
// var activity_nationality_error = 0;
// $(".activity_nationality").each(function () {
//     var activity_nationality_id=$(this).attr("id");
//     if ($(this).val() == "0") {
//         $("#" + activity_nationality_id).css("border", "1px solid #cf3c63");
//         $("#" + activity_nationality_id).focus();
//         $(".markup_details_divs").addClass("show");
//         activity_nationality_error++;
//     } else {
//          $("#" + activity_nationality_id).css("border", "1px solid #9e9e9e");
//     }
//     activity_nationality++;

// });

// var activity_markup  = 1;
// var activity_markup_error = 0;
// $(".activity_markup").each(function () {
//     var activity_markup_id=$(this).attr("id");
//     if ($(this).val() == "0") {
//         $("#" + activity_markup_id).css("border", "1px solid #cf3c63");
//         $("#" + activity_markup_id).focus();
//          $(".markup_details_divs").addClass("show");
//         activity_markup_error++;
//     } else {
//          $("#" + activity_markup_id).css("border", "1px solid #9e9e9e");
//     }
//     activity_markup++;

// });

// var activity_amount  = 1;
// var activity_amount_error = 0;
// $(".activity_amount").each(function () {
//     var activity_amount_id=$(this).attr("id");
//     if ($(this).val() == "") {
//         $("#" + activity_amount_id).css("border", "1px solid #cf3c63");
//         $("#" + activity_amount_id).focus();
//          $(".markup_details_divs").addClass("show");
//         activity_amount_error++;
//     } else {
//          $("#" + activity_amount_id).css("border", "1px solid #9e9e9e");
//     }
//     activity_amount++;

// });


var surcharge_name  = 1;
var surcharge_name_error = 0;
$(".surcharge_name").each(function () {
    var surcharge_name_id=$(this).attr("id");
    if ($(this).val() == "") {
        $("#" + surcharge_name_id).css("border", "1px solid #cf3c63");
        $("#" + surcharge_name_id).focus();
        $(".surcharge_details_div").addClass("show");
        surcharge_name_error++;
    } else {
         $("#" + surcharge_name_id).css("border", "1px solid #9e9e9e");
    }
    surcharge_name++;

});

var surcharge_day  = 1;
var surcharge_day_error = 0;
$(".surcharge_day").each(function () {
    var surcharge_day_id=$(this).attr("id");
    if ($(this).val() == "") {
        $("#" + surcharge_day_id).css("border", "1px solid #cf3c63");
        $("#" + surcharge_day_id).focus();
         $(".surcharge_details_div").addClass("show");
        surcharge_day_error++;
    } else {
         $("#" + surcharge_day_id).css("border", "1px solid #9e9e9e");
    }
    surcharge_day++;

});



var surcharge_price  = 1;
var surcharge_price_error = 0;
$(".surcharge_price").each(function () {
    var surcharge_price_id=$(this).attr("id");
    if ($(this).val() == "") {
        $("#" + surcharge_price_id).css("border", "1px solid #cf3c63");
        $("#" + surcharge_price_id).focus();
         $(".surcharge_details_div").addClass("show");
        surcharge_price_error++;
    } else {
         $("#" + surcharge_price_id).css("border", "1px solid #9e9e9e");
    }
    surcharge_price++;

});



var hotel_addon_name = 1;
var hotel_addon_name_error = 0;
$("input[name='hotel_addon_name[]']").each(function () {

    if ($(this).val() == "") {
        $("#hotel_addon_name" + hotel_addon_name).css("border", "1px solid #cf3c63");
        $("#hotel_addon_name" + hotel_addon_name).focus();
        $("#add_on_details").addClass("show");
        hotel_addon_name_error++;
    } else {
        $("#hotel_addon_name" + hotel_addon_name).css("border", "1px solid #9e9e9e");
    }
    hotel_addon_name++;

});

var hotel_desc = 1;
var hotel_desc_error = 0;
$("textarea[name='hotel_desc[]']").each(function () {

    if ($(this).val() == "") {
        $("#hotel_desc" + hotel_desc).css("border", "1px solid #cf3c63");
        $("#hotel_desc" + hotel_desc).focus();
        $("#add_on_details").addClass("show");
        hotel_desc_error++;
    } else {
        $("#hotel_desc" + hotel_desc).css("border", "1px solid #9e9e9e");
    }
    hotel_desc++;

});
var hotel_adult_cost = 1;
var hotel_adult_cost_error = 0;
$("input[name='hotel_adult_cost[]']").each(function () {

    if ($(this).val() == "") {
        $("#hotel_adult_cost" + hotel_adult_cost).css("border", "1px solid #cf3c63");
        $("#hotel_adult_cost" + hotel_adult_cost).focus();
        $("#add_on_details").addClass("show");
        hotel_adult_cost_error++;
    } else {
        $("#hotel_adult_cost" + hotel_adult_cost).css("border", "1px solid #9e9e9e");
    }
    hotel_adult_cost++;

});
var hotel_child_cost = 1;
var hotel_child_cost_error = 0;
$("input[name='hotel_child_cost[]']").each(function () {

    if ($(this).val() == "") {
        $("#hotel_child_cost" + hotel_child_cost).css("border", "1px solid #cf3c63");
        $("#hotel_child_cost" + hotel_child_cost).focus();
        $("#add_on_details").addClass("show");
        hotel_child_cost_error++;
    } else {
        $("#hotel_child_cost" + hotel_child_cost).css("border", "1px solid #9e9e9e");
    }
    hotel_child_cost++;

});
var hotel_currency = 1;
var hotel_currency_error = 0;
$("select[name='hotel_currency[]']").each(function () {

    if ($(this).val() == "0") {
        $("#hotel_currency" + hotel_currency).css("border", "1px solid #cf3c63");
        $("#hotel_currency" + hotel_currency).focus();
        $("#add_on_details").addClass("show");
        hotel_currency_error++;
    } else {
        $("#hotel_currency" + hotel_currency).css("border", "1px solid #9e9e9e");
    }
    hotel_currency++;

});


var policy_name = 1;
var policy_name_error = 0;
$("input[name='policy_name[]']").each(function () {

    if ($(this).val() == "") {
        $("#policy_name" + policy_name).css("border", "1px solid #cf3c63");
        $("#policy_name" + policy_name).focus();
        $("#policies").addClass("show");
        policy_name_error++;
    } else {
        $("#policy_name" + policy_name).css("border", "1px solid #9e9e9e");
    }
    policy_name++;

});

var policy_desc = 1;
var policy_desc_error = 0;
$("textarea[name='policy_desc[]']").each(function () {

    if ($(this).val() == "") {
        $("#policy_desc" + policy_desc).css("border", "1px solid #cf3c63");
        $("#policy_desc" + policy_desc).focus();
        $("#policies").addClass("show");
        policy_desc_error++;
    } else {
        $("#policy_desc" + policy_desc).css("border", "1px solid #9e9e9e");
    }
    policy_desc++;

});


if (hotel_inclusions.trim() == "")
{
    $("#cke_hotel_inclusions").css("border", "1px solid #cf3c63");

} else

{
    $("#cke_hotel_inclusions").css("border", "1px solid #9e9e9e");
}
if (hotel_exclusions.trim() == "")
{
    $("#cke_hotel_exclusions").css("border", "1px solid #cf3c63");

} else

{
    $("#cke_hotel_exclusions").css("border", "1px solid #9e9e9e");
}
if (hotel_cancellation.trim() == "")
{
    $("#cke_hotel_cancellation").css("border", "1px solid #cf3c63");

} else

{
    $("#cke_hotel_cancellation").css("border", "1px solid #9e9e9e");
}
if (hotel_terms_conditions.trim() == "")
{
    $("#cke_hotel_terms_conditions").css("border", "1px solid #cf3c63");

} else

{
    $("#cke_hotel_terms_conditions").css("border", "1px solid #9e9e9e");
}

if(hotel_name.trim() == "")
{
    $("#hotel_name").focus();
}
else if(supplier_name=="0")
{
  $("#supplier_name").parent().find(".select2-selection").focus();  
} 
else if(contact_no.trim()=="")
{
  $("#contact_no").focus();  
}
else if(hotel_rating.trim()=="0")
{
  $("#hotel_rating").focus();  
}
else if(hotel_country=="0")
{
  $("#hotel_country").parent().find(".select2-selection").focus();  
} 
else if(hotel_city=="0")
{
  $("#hotel_city").parent().find(".select2-selection").focus();  
}
else if(hotel_address.trim()=="")
{
  $("#hotel_address").focus();  
}
else if(hotel_description.trim()=="")
{
  $("#hotel_description").focus();  
}
else if(validity_operation_from.trim()=="")
{
  $("#validity_operation_from").focus();  
}
else if(validity_operation_to.trim()=="")
{
  $("#validity_operation_to").focus();  
}
else if(season_name_error>0)
{
}
else if(booking_validity_from_error>0)
{
}
else if(booking_validity_to_error>0)
{
}
else if(stop_sale_error>0)
{
}
// else if(activity_nationality_error>0)
// {
// }
// else if(activity_markup_error>0)
// {
// }
// else if(activity_amount_error>0)
// {
// }
else if(surcharge_name_error>0)
{
}
else if(surcharge_day_error>0)
{
}
else if(surcharge_price_error>0)
{
}
else if(hotel_promotion.trim()=="")
{
  $("#hotel_promotion").focus();  
}
else if(hotel_prom_discount.trim()=="")
{
  $("#hotel_prom_discount").focus();  
}
else if(hotel_promotion_from.trim()=="")
{
  $("#hotel_promotion_from").focus();  
}
else if(hotel_promotion_to.trim()=="")
{
  $("#hotel_promotion_to").focus();  
}
else if(hotel_promotion_disc_booking.trim()=="")
{
  $("#hotel_promotion_disc_booking").focus();  
}
else if(hotel_promotion_disc_travel.trim()=="")
{
  $("#hotel_promotion_disc_travel").focus();  
}
else if(hotel_addon_name_error>0)
{
}
else if(hotel_desc_error>0)
{
}
else if(hotel_adult_cost_error>0)
{
}
else if(hotel_child_cost_error>0)
{
}
else if(hotel_currency_error>0)
{
}
else if(policy_name_error>0)
{
}
else if(policy_desc_error>0)
{
}
else if(hotel_inclusions.trim()=="")
{
  $("#cke_hotel_inclusions").focus();  
}
else if(hotel_exclusions.trim()=="")
{
  $("#cke_hotel_exclusions").focus();  
}
else if(hotel_cancellation.trim()=="")
{
  $("#cke_hotel_cancellation").focus();  
}
else if(hotel_terms_conditions.trim()=="")
{
  $("#cke_hotel_terms_conditions").focus();  
}

else
{
    $("#save_hotel").prop("disabled", true);
    var formdata=new FormData($("#hotel_form")[0]);

    formdata.append("hotel_inclusions",hotel_inclusions);
    formdata.append("hotel_exclusions",hotel_exclusions);
    formdata.append("hotel_cancellation",hotel_cancellation);
    formdata.append("hotel_terms_conditions",hotel_terms_conditions);
    $.ajax({
        url:"{{route('insert-hotel')}}",
        enctype:"multipart/form-data",
        type:"POST",
        data:formdata,
        contentType: false,
        processData: false,
        success:function(response)
        {
            if (response.indexOf("exist") != -1)

            {

                swal("Already Exist!",
                    "Hotel already exists");

            } else if (response.indexOf("success") != -1)

            {

                swal({
                    title: "Success",
                    text: "Hotel Created Successfully !",
                    type: "success"
                },

                function () {

                    location.reload();

                });

            } else if (response.indexOf("fail") != -1)

            {

                swal("ERROR", "Hotel cannot be inserted right now! ");

            }
            $("#save_hotel").prop("disabled", false);

        }
    });
}
});
    $(document).on("click","#discard_hotel",function()
    {
        window.history.back();

    });
</script>
</body>


</html>
