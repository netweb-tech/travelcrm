@include('mains.includes.top-header')

<style>

    header.main-header {

        background: url("{{ asset('assets/images/color-plate/theme-purple.jpg') }}");

    }



    /*  div#cke_1_contents {

        height: 250px !important;

    }*/



    img.plus-icon {

        margin: 0 2px;

        display: inline !important;

    }



    /*   @media screen and (max-width:400px){

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

    }*/

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

                                            <li class="breadcrumb-item"><a href="#"><i

                                                        class="mdi mdi-home-outline"></i></a></li>

                                            <li class="breadcrumb-item" aria-current="page">Home</li>

                                            <li class="breadcrumb-item active" aria-current="page">Create New

                                                Guide

                                            </li>

                                        </ol>

                                    </nav>

                                </div>

                            </div>

                            <!-- <div class="right-title">

                                <div class="dropdown">

                                    <button class="btn btn-outline dropdown-toggle no-caret" type="button"

                                        data-toggle="dropdown"><i class="mdi mdi-dots-horizontal"></i></button>

                                    <div class="dropdown-menu dropdown-menu-right">

                                        <a class="dropdown-item" href="#"><i class="mdi mdi-share"></i>Activity</a>

                                        <a class="dropdown-item" href="#"><i class="mdi mdi-email"></i>Messages</a>

                                        <a class="dropdown-item" href="#"><i

                                                class="mdi mdi-help-circle-outline"></i>FAQ</a>

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

                                <h4 class="box-title">CREATE GUIDE</h4>

                            </div>

                            <div class="box-body">

                                <form id="guide_form" enctype="multipart/form-data" method="POST">

                                    {{csrf_field()}}

                                    <div class="row mb-10">

                                        <div class="col-sm-12 col-md-12 col-lg-6">

                                            <div class="form-group">

                                                <label>FIRST NAME <span class="asterisk">*</span></label>

                                                <input type="text" class="form-control" placeholder="FIRST NAME "

                                                name="guide_first_name" id="guide_first_name">

                                            </div>

                                        </div>

                                        <div class="col-sm-12 col-md-12 col-lg-6">

                                        </div>

                                    </div>

                                    <div class="row mb-10">

                                        <div class="col-sm-12 col-md-12 col-lg-6">

                                            <div class="form-group">

                                                <label>LAST NAME <span class="asterisk">*</span></label>

                                                <input type="text" class="form-control" placeholder="LAST NAME "

                                                name="guide_last_name" id="guide_last_name">

                                            </div>

                                        </div>

                                        <div class="col-sm-12 col-md-12 col-lg-6">

                                        </div>

                                    </div>

                                    <div class="row mb-10">

                                        <div class="col-sm-12 col-md-12 col-lg-6">

                                            <div class="form-group">

                                                <label>CONTACT NUMBER <span class="asterisk">*</span></label>

                                                

                                                <input type="text" class="form-control input-lg"

                                                id="contact_number" name="contact_number" autocomplete="off"

                                                placeholder="Enter Mobile Number">

                                                

                                            </div>

                                        </div>

                                        <div class="col-sm-12 col-md-12 col-lg-6">

                                        </div>

                                    </div>

                                    <div class="row mb-10">

                                        <div class="col-sm-12 col-md-12 col-lg-6">

                                            <div class="form-group">

                                                <label>ADDRESS<span class="asterisk">*</span></label>

                                                <textarea rows="5" cols="5" class="form-control"

                                                placeholder="ADDRESS" name="address" id="address"></textarea>

                                            </div>

                                        </div>

                                        <div class="col-sm-12 col-md-12 col-lg-6">

                                        </div>

                                    </div>

                                    <div class="row mb-10">

                                        <div class="col-sm-12 col-md-12 col-lg-6">

                                            <div class="form-group">

                                                <label for="guide_supplier_name">SUPPLIER <span class="asterisk">*</span></label>

                                                <select id="guide_supplier_name" name="guide_supplier_name" class="form-control select2" style="width: 100%;">

                                                    <option value="0" hidden>Select Supplier</option>

                                                    @foreach($suppliers as $supplier)

                                                    <option value="{{$supplier->supplier_id}}">{{$supplier->supplier_name}}</option>

                                                    @endforeach

                                                </select>

                                            </div>

                                        </div>

                                        <div class="col-sm-12 col-md-12 col-lg-6">

                                        </div>

                                    </div>

                                    <div class="row mb-10">

                                        <div class="col-sm-12 col-md-12 col-lg-6">

                                            <div class="form-group">

                                                <div class="form-group">

                                                    <div class="form-group">

                                                        <label>COUNTRY <span class="asterisk">*</span></label>

                                                        <select class="form-control select2" name="guide_country"

                                                            id="guide_country" style="width: 100%;">

                                                            <option selected="selected" hidden value="0">SELECT

                                                            COUNTRY</option>

                                                        </select>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-sm-12 col-md-12 col-lg-6">

                                        </div>

                                    </div>

                                    <div class="row mb-10" id="city_div" style="display:none;">

                                        <div class="col-sm-12 col-md-12 col-lg-6">

                                            <div class="form-group">

                                                <div class="form-group">

                                                    <div class="form-group">

                                                        <label for="guide_city">CITY <span class="asterisk">*</span></label>

                                                        <select id="guide_city" name="guide_city" class="form-control select2" style="width: 100%;">

                                                            <option selected="selected">SELECT CITY</option>

                                                        </select>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-sm-12 col-md-12 col-lg-6">

                                        </div>

                                    </div>

                                    <div class="row mb-10" id="tour_div" style="display:none;">



                                    </div>



                                    <div class="row mb-10">

                                        <div class="col-sm-12 col-md-12 col-lg-6">

                                            <div class="form-group">

                                                <label>GUIDE LANGUAGE<span class="asterisk">*</span></label>

                                                <select class="form-control guide_language" name="guide_language[]"

                                                    id="guide_language" style="width: 100%;" multiple="multiple">

                                                    @foreach($languages as $lang)

                                                    <option value="{{$lang->language_id}}">{{$lang->language_name}}</option>

                                                    @endforeach

                                                </select>

                                            </div>

                                        </div>

                                        <div class="col-sm-12 col-md-12 col-lg-6">

                                        </div>

                                    </div>

                                     <div class="row mb-10">

                                        <div class="col-sm-12 col-md-12 col-lg-6">

                                            <div class="form-group">

                                                <label>GUIDE PRICE <small>(PER DAY)</small><span class="asterisk">*</span></label>

                                                <input class="form-control" name="guide_price_per_day"

                                                    id="guide_price_per_day" placeholder="Guide Price Per Day" onkeypress="javascript:return validateNumber(event)">

                                            </div>

                                        </div>

                                        <div class="col-sm-12 col-md-12 col-lg-6">

                                        </div>

                                    </div>

                                    <div class="row mb-10">

                                        <div class="col-sm-12 col-md-12 col-lg-6">

                                            <div class="form-group">

                                                <label>DESCRIPTION<span class="asterisk">*</span></label>

                                                <textarea rows="5" cols="5" class="form-control"

                                                placeholder="DESCRIPTION" name="description" id="description"></textarea>

                                            </div>

                                        </div>

                                        <div class="col-sm-12 col-md-12 col-lg-6">

                                        </div>

                                    </div>

                                    <div class="row mb-10">

                                        <div class="col-sm-12 col-md-12 col-lg-6">

                                            <div class="row mb-10">

                                                <div class="col-sm-12">

                                                    <div class="row">

                                                        <div class="col-md-6">

                                                            <label>IS ALL DAYS <span class="asterisk">*</span></label>

                                                        </div>

                                                        <div class="col-md-6">

                                                            <input type="radio" id="radio_10"

                                                            class="with-gap radio-col-primary week_all_days"  name="is_all_days" value="Yes">

                                                            <label for="radio_10">Yes </label>

                                                            <input type="radio" id="radio_11"

                                                            class="with-gap radio-col-primary week_all_days" name="is_all_days" value="No">

                                                            <label for="radio_11">No</label>

                                                        </div>

                                                    </div>

                                                    <div class="row">

                                                        <div class="col-md-6">

                                                            <label>MONDAY <span class="asterisk">*</span></label>

                                                        </div>

                                                        <div class="col-md-6">

                                                            <input  type="radio" id="radio_20"

                                                            class="with-gap radio-col-primary weekdays_yes " name="week_monday" value="Yes">

                                                            <label for="radio_20">Yes </label>

                                                            <input type="radio" id="radio_21"

                                                            class="with-gap radio-col-primary weekdays_no " name="week_monday" value="No">

                                                            <label for="radio_21">No</label>

                                                        </div>

                                                    </div>

                                                    <div class="row">

                                                        <div class="col-md-6">

                                                            <label>TUESDAY <span class="asterisk">*</span></label>

                                                        </div>

                                                        <div class="col-md-6">

                                                            <input type="radio" id="radio_30"

                                                            class="with-gap radio-col-primary weekdays_yes" name="week_tuesday" value="Yes">

                                                            <label for="radio_30">Yes </label>

                                                            <input type="radio" id="radio_31"

                                                            class="with-gap radio-col-primary weekdays_no" name="week_tuesday" value="No">

                                                            <label for="radio_31">No</label>

                                                        </div>

                                                    </div>

                                                    <div class="row">

                                                        <div class="col-md-6">

                                                            <label>WEDNESDAY <span class="asterisk">*</span></label>

                                                        </div>

                                                        <div class="col-md-6">

                                                            <input type="radio" id="radio_40"

                                                            class="with-gap radio-col-primary weekdays_yes" name="week_wednesday" value="Yes">

                                                            <label for="radio_40">Yes </label>

                                                            <input type="radio" id="radio_41"

                                                            class="with-gap radio-col-primary weekdays_no" name="week_wednesday" value="No">

                                                            <label for="radio_41">No</label>

                                                        </div>

                                                    </div>

                                                    <div class="row">

                                                        <div class="col-md-6">

                                                            <label>THURSDAY <span class="asterisk">*</span></label>

                                                        </div>

                                                        <div class="col-md-6">

                                                            <input type="radio" id="radio_50"

                                                            class="with-gap radio-col-primary weekdays_yes"  name="week_thursday" value="Yes">

                                                            <label for="radio_50">Yes </label>

                                                            <input type="radio" id="radio_51"

                                                            class="with-gap radio-col-primary weekdays_no"  name="week_thursday" value="No">

                                                            <label for="radio_51">No</label>

                                                        </div>

                                                    </div>

                                                    <div class="row">

                                                        <div class="col-md-6">

                                                            <label>FRIDAY <span class="asterisk">*</span></label>

                                                        </div>

                                                        <div class="col-md-6">

                                                            <input type="radio" id="radio_60"

                                                            class="with-gap radio-col-primary weekdays_yes" name="week_friday" value="Yes">

                                                            <label for="radio_60">Yes </label>

                                                            <input type="radio" id="radio_61"

                                                            class="with-gap radio-col-primary weekdays_no" name="week_friday" value="No">

                                                            <label for="radio_61">No</label>

                                                        </div>

                                                    </div>

                                                    <div class="row">

                                                        <div class="col-md-6">

                                                            <label>SATURDAY <span class="asterisk">*</span></label>

                                                        </div>

                                                        <div class="col-md-6">

                                                            <input type="radio" id="radio_70"

                                                            class="with-gap radio-col-primary weekdays_yes" name="week_saturday" value="Yes">

                                                            <label for="radio_70">Yes </label>

                                                            <input type="radio" id="radio_71"

                                                            class="with-gap radio-col-primary weekdays_no" name="week_saturday" value="No">

                                                            <label for="radio_71">No</label>

                                                        </div>

                                                    </div>

                                                    <div class="row">

                                                        <div class="col-md-6">

                                                            <label>SUNDAY <span class="asterisk">*</span></label>

                                                        </div>

                                                        <div class="col-md-6">

                                                            <input type="radio" id="radio_80"

                                                            class="with-gap radio-col-primary weekdays_yes" name="week_sunday" value="Yes">

                                                            <label for="radio_80">Yes </label>

                                                            <input type="radio" id="radio_81"

                                                            class="with-gap radio-col-primary weekdays_no" name="week_sunday" value="No">

                                                            <label for="radio_81">No</label>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-sm-12 col-md-12 col-lg-6">

                                        </div>

                                    </div>

                                    <div class="row mb-10" style="display:none;">

                                        <div class="col-sm-12 col-md-12 col-lg-6 markup_div" id="markup_div1">

                                            <label>NATIONALITY & TRANSFER MARKUP <span class="asterisk">*</span></label>

                                            <div class="row">

                                                <div class="col-md-12">

                                                    <div class="form-group">

                                                        <select class="form-control select2" style="width: 100%;" id="guide_nationality1" name="guide_nationality[]">

                                                            <option selected="selected" value="0" hidden>SELECT NATIONALITY</option>

                                                            @foreach($countries as $country)

                                                            <option value="{{$country->country_id}}">{{$country->country_name}}</option>

                                                            @endforeach

                                                        </select>

                                                    </div>

                                                </div>

                                                <div class="col-md-12">

                                                    <div class="form-group">

                                                        <select class="form-control" id="guide_markup1" name="guide_markup[]">

                                                            <option value="0" selected="selected">SELECT MARKUP TYPE</option>

                                                            <option>Markup Percentage</option>

                                                            <option>Markup Amount</option>

                                                        </select>

                                                    </div>

                                                </div>

                                                <div class="col-md-12">

                                                    <div class="form-group">

                                                        <input type="text" class="form-control" placeholder="Markup Amount" id="guide_amount1" name="guide_amount[]" onkeypress="javascript:return validateNumber(event)">

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-sm-12 col-md-12 add_more_markup_div">

                                                <img id="add_more_markup1" class="plus-icon add_more_markup" style="display: block !important;margin-left: auto;" src="{{ asset('assets/images/add_icon.png') }}">

                                            </div>

                                        </div>

                                        <div class="col-sm-12 col-md-12 col-lg-6">

                                        </div>

                                    </div>

                                    <div class="row mb-10">

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

                                                                    <!-- /.input group -->

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-sm-12 col-md-12 col-lg-6">

                                        </div>

                                    </div>



                                      <div class="row mb-10" style="display:none;">

                        <div class="col-sm-12 col-md-12 col-lg-6 transport_div" id="transport_div1">

                            <label for="guide_transport_currency1">

                                GUIDE TARIFF <span class="asterisk">*</span></label>

                            <div class="row">

                               <div class="col-sm-12 col-md-12"  >

                                <div class="form-group">

                                    <label for="validity_from">VALIDITY<span class="asterisk">*</span></label>

                                    <div class="row">

                                        <div class="col-sm-6">

                                            <div class="form-group">

                                                <div class="input-group date">

                                                    <input type="text" placeholder="FROM"

                                                    class="form-control pull-right datepicker guide_validity_from" id="guide_validity_from1" name="guide_validity_from[]">

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

                                                    class="form-control pull-right datepicker guide_validity_to" id="guide_validity_to1" name="guide_validity_to[]">

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

                               <div class="col-md-12">

                                <div class="form-group">



                                    <input type="text" class="form-control" placeholder="TOUR NAME"  id="guide_tourname1" name="guide_tourname[]">

                                </div>

                            </div>

                           

                                 <div class="col-md-12">

                                    <div class="form-group">



                                        <input type="text" class="form-control" placeholder="PRICE UPTO 4" id="guide_cost_four1" name="guide_cost_four[]" onkeypress="javascript:return validateNumber(event)">

                                    </div>

                                </div>

                                  <div class="col-md-12">

                                    <div class="form-group">



                                        <input type="text" class="form-control" placeholder="PRICE UPTO 7" id="guide_cost_seven1" name="guide_cost_seven[]" onkeypress="javascript:return validateNumber(event)">

                                    </div>

                                </div>

                                  <div class="col-md-12">

                                    <div class="form-group">



                                       <input type="text" class="form-control" placeholder="PRICE UPTO 20" id="guide_cost_twenty1" name="guide_cost_twenty[]" onkeypress="javascript:return validateNumber(event)">

                                    </div>

                                </div>

                                  <div class="col-md-12">

                                <div class="form-group">



                                    <input type="text" class="form-control" placeholder="DURATION"  id="guide_duration1" name="guide_duration[]">

                                </div>

                            </div>

                            </div>

                            

                            <div class="col-sm-12 col-md-12 add_more_transport_div">

                                <img id="add_more_transport1" class="plus-icon add_more_transport" style="display: block !important;margin-left: auto;" src="{{ asset('assets/images/add_icon.png') }}">

                            </div>

                        </div>

                    </div>



                                    

                                    <div class="row" style="display:none;">

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

                                                            <textarea class="form-control" id="guide_inclusions" name="guide_inclusions"></textarea>

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

                                                            <textarea class="form-control" id="guide_exclusions" name="guide_exclusions"></textarea>

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

                                                            <textarea class="form-control" id="guide_cancellation" name="guide_cancellation"></textarea>

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

                                                            <textarea class="form-control" id="guide_terms_conditions" name="guide_terms_conditions"></textarea>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="row mb-10">

                                        <div class="col-sm-12 col-md-12 col-lg-6">

                                            <div class="img_group">

                                                <label>GUIDE PICTURE</label>

                                                <div class="box1">

                                                    <input class="hide" type="file" id="upload_logo"

                                                    accept="image/png,image/jpg,image/jpeg"

                                                    name="guide_logo_file" onchange="previewFile('logo')">

                                                    <button type="button"

                                                    onclick="document.getElementById('upload_logo').click()"

                                                    id="upload_0" class="btn red btn-outline btn-circle">+

                                                    </button>

                                                </div>

                                                <br>

                                                <!-- ngRepeat: (itemindex,item) in temp_loop.enquiry_comment_attachment track by $index -->

                                                <img id="logo_preview" src="" height="200" alt="LOGO Preview..."

                                                style="display:none">

                                            </div>

                                        </div>

                                    </div>

                                    <div class="row mb-10">

                                        <div class="col-md-12">

                                            <div class="box-header with-border"

                                                style="padding: 10px;border-bottom:none;border-radius:0;border-top:1px solid #c3c3c3">

                                                <button type="button" id="create_guide"

                                                class="btn btn-rounded btn-primary mr-10">Save</button>

                                                <button type="button" id="discard_guide"

                                                class="btn btn-rounded btn-primary">Discard</button>

                                            </div>

                                        </div>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

                        @else

    <h4 class="text-danger">No rights to access this page</h4>

            

            @endif

                </div>

            </div>

        </div>





        @include('mains.includes.footer')



        @include('mains.includes.bottom-footer')



        <script>

            function previewFile(data) {

                if (data == "logo") {

                    var preview = document.getElementById('logo_preview');



                    var file = document.querySelector('input[name="guide_logo_file"]').files[0];

                } else {

                    var preview = document.getElementById('certificate_preview');



                    var file = document.querySelector('input[name="guide_certificate_file"]').files[0];

                }





                var reader = new FileReader();







                reader.onloadend = function () {



                    preview.src = reader.result;



                    preview.style.display = "block";



                }

                if (file) {



                    reader.readAsDataURL(file);



                } else {



                    preview.src = "";



                }

            }



        </script>

        <script>

           function dateshow()

           {

               var date = new Date();

               date.setDate(date.getDate());



               $('.guide_validity_from').datepicker({

                autoclose:true,

                todayHighlight: true,

                format: 'yyyy-mm-dd',

                startDate:date

            });



               $('.guide_validity_from').on('change', function () {

                var date_from_id=this.id;

                var date_id=date_from_id.split("guide_validity_from");



                var date_from = $("#guide_validity_from"+date_id[1]).datepicker("getDate");

                var date_to = $("#guide_validity_to"+date_id[1]).datepicker("getDate");



                if(!date_to)

                {

                    $("#guide_validity_to"+date_id[1]).datepicker("setDate",date_from);

                }



                else if(date_to.getTime()<date_from.getTime())

                {

                    $("#guide_validity_to"+date_id[1]).datepicker("setDate",date_from);

                }



            });



               $('.guide_validity_to').datepicker({

                autoclose:true,

                todayHighlight: true,

                format: 'yyyy-mm-dd',

                startDate:date

            });

               $('.guide_validity_to').on('change', function () { 

                  var date_to_id=this.id;

                  var date_id=date_to_id.split("guide_validity_to");

                  var date_from = $("#guide_validity_from"+date_id[1]).datepicker("getDate");

                  var date_to = $("#guide_validity_to"+date_id[1]).datepicker("getDate");



                  if(!date_from)

                  {

                    $("#guide_validity_from"+date_id[1]).datepicker("setDate",date_to);

                }

                else if(date_to.getTime()<date_from.getTime())

                {

                    $("#guide_validity_from"+date_id[1]).datepicker("setDate",date_to);

                }

            });

           }

            $(document).ready(function()

            {

             CKEDITOR.replace('guide_exclusions');

             CKEDITOR.replace('guide_inclusions');

             CKEDITOR.replace('guide_cancellation');

             CKEDITOR.replace('guide_terms_conditions');

             $('.select2').select2();

            

               var date = new Date();

                date.setDate(date.getDate());

             $('#blackout_days').datepicker({

               multidate: true,

               todayHighlight: true,

               format: 'yyyy-mm-dd',

               startDate:date

            });

             $(".guide_language").select2({placeholder:"SELECT LANGUAGE"});

             dateshow();

            });

    

        </script>

        <script>

              $(document).on("change","#guide_supplier_name",function()

    {

        if($("#guide_supplier_name").val()!="0")

        {

            var supplier_id=$(this).val();

            $.ajax({

                url:"{{route('search-supplier-country')}}",

                type:"GET",

                data:{"supplier_id":supplier_id},

                success:function(response)

                {

                    $("#guide_country").html(response);

                    $('#guide_country').select2();

                    $("#guide_country").prop("disabled",false);



                     $("#guide_city").html("");



                }

            });

        }

    });



           $(document).on("change","#guide_country",function()

           {

               if($("#guide_country").val()!="0")

               {

                var country_id=$(this).val();

                $.ajax({

                    url:"{{route('search-country-cities')}}",

                    type:"GET",

                    data:{"country_id":country_id},

                    success:function(response)

                    {



                        $("#guide_city").html(response);

                        $('#guide_city').select2();

                        $("#city_div").show();





                    }

                });

            }



        });

           $(document).on("change","#guide_city",function()

           {

               if($("#guide_city").val()!="0")

               {

                var city_id=$(this).val();

                var country_id=$("#guide_country").val();

                $.ajax({

                    url:"{{route('searchSightseeingTour')}}",

                    type:"GET",

                    data:{"city_id":city_id,"country_id":country_id},

                    success:function(response)

                    {



                        $("#tour_div").html(response);

                        $("#tour_div").show();





                    }

                });

            }



        });

        </script>

        <script>

            $("#guide_country").on("change", function () {

                if ($(this).val() != "0") {

                    $("#city_div").show();

                }

            });

            $("#discard_guide").on("click", function ()



                {



                    window.history.back();



                });





            $(document).on("click", "#create_guide", function ()

                {



                      // swal("Success","Dummy guide insertion process");



                    var guide_first_name = $("#guide_first_name").val();



                    var guide_last_name = $("#guide_last_name").val();



                    var contact_number = $("#contact_number").val();



                    var address = $("#address").val();



                    var guide_supplier_name = $("#guide_supplier_name").val();



                    var guide_country = $("#guide_country").val();



                    var guide_city = $("#guide_city").val();



                    var guide_description = $("#description").val();



                    var guide_language = $("#guide_language").val();

                    var guide_price_per_day = $("#guide_price_per_day").val();

                    var guide_logo_file = $("#guide_logo_file").val();

                    var is_all_days = $("input[name='is_all_days']:checked").val();

                    var week_monday = $("input[name='week_monday']:checked").val();

                    var week_tuesday = $("input[name='week_tuesday']:checked").val();

                    var week_wednesday = $("input[name='week_wednesday']:checked").val();

                    var week_thursday = $("input[name='week_thursday']:checked").val();

                    var week_friday = $("input[name='week_friday']:checked").val();

                    var week_saturday = $("input[name='week_saturday']:checked").val();

                    var week_sunday = $("input[name='week_sunday']:checked").val();



                    var guide_inclusions= CKEDITOR.instances.guide_inclusions.getData();

                    var guide_exclusions=CKEDITOR.instances.guide_exclusions.getData();

                    var guide_cancellation=CKEDITOR.instances.guide_cancellation.getData();

                    var guide_terms_conditions=CKEDITOR.instances.guide_terms_conditions.getData();









                    if (guide_first_name.trim() == "")



                    {



                        $("#guide_first_name").css("border", "1px solid #cf3c63");



                    } else



                    {



                        $("#guide_first_name").css("border", "1px solid #9e9e9e");



                    }



                     if (guide_last_name.trim() == "")



                    {



                        $("#guide_last_name").css("border", "1px solid #cf3c63");



                    } else



                    {



                        $("#guide_last_name").css("border", "1px solid #9e9e9e");



                    }







                    if (contact_number.trim() == "")



                    {



                        $("#contact_number").css("border", "1px solid #cf3c63");



                    } else



                    {



                        $("#contact_number").css("border", "1px solid #9e9e9e");



                    }



                    if (address.trim() == "")



                    {



                        $("#address").css("border", "1px solid #cf3c63");



                    } else



                    {

                        $("#address").css("border", "1px solid #9e9e9e");



                    }



                    if (guide_supplier_name.trim() == "0")



                    {



                        $("#guide_supplier_name").parent().find(".select2-selection").css("border", "1px solid #cf3c63");



                    } else



                    {

                        $("#guide_supplier_name").parent().find(".select2-selection").css("border", "1px solid #9e9e9e");



                    }



                    if (guide_country.trim() == "0")



                    {



                        $("#guide_country").parent().find(".select2-selection").css("border", "1px solid #cf3c63");



                    } else



                    {

                        $("#guide_country").parent().find(".select2-selection").css("border", "1px solid #9e9e9e");



                    }

                    if (guide_city.trim() == "0")



                    {



                        $("#guide_city").parent().find(".select2-selection").css("border", "1px solid #cf3c63");



                    } else



                    {

                        $("#guide_city").parent().find(".select2-selection").css("border", "1px solid #9e9e9e");



                    }



                     if (guide_language == "")



                    {



                        $("#guide_language").parent().find(".select2-selection").css("border", "1px solid #cf3c63");



                    } else



                    {

                        $("#guide_language").parent().find(".select2-selection").css("border", "1px solid #9e9e9e");



                    }

if (guide_price_per_day == "")



                    {



                        $("#guide_price_per_day").css("border", "1px solid #cf3c63");



                    } else



                    {

                        $("#guide_price_per_day").css("border", "1px solid #9e9e9e");



                    }



                    if (guide_description.trim() == "")



                    {



                        $("#description").css("border", "1px solid #cf3c63");



                    } else



                    {

                        $("#description").css("border", "1px solid #9e9e9e");



                    }

                      if (!is_all_days) {

          $("input[name='is_all_days']").parent().css("border", "1px solid #cf3c63");

      } else {

          $("input[name='is_all_days']").parent().css("border", "1px solid white");

      }

      if (!week_monday) {

          $("input[name='week_monday']").parent().css("border", "1px solid #cf3c63");

      } else {

          $("input[name='week_monday']").parent().css("border", "1px solid white");

      }

      if (!week_tuesday) {

          $("input[name='week_tuesday']").parent().css("border", "1px solid #cf3c63");

      } else {

          $("input[name='week_tuesday']").parent().css("border", "1px solid white");

      }

      if (!week_wednesday) {

          $("input[name='week_wednesday']").parent().css("border", "1px solid #cf3c63");

      } else {

          $("input[name='week_wednesday']").parent().css("border", "1px solid white");

      }

      if (!week_thursday) {

          $("input[name='week_thursday']").parent().css("border", "1px solid #cf3c63");

      } else {

          $("input[name='week_thursday']").parent().css("border", "1px solid white");

      }

      if (!week_friday) {

          $("input[name='week_friday']").parent().css("border", "1px solid #cf3c63");

      } else {

          $("input[name='week_friday']").parent().css("border", "1px solid white");

      }

      if (!week_saturday) {

          $("input[name='week_saturday']").parent().css("border", "1px solid #cf3c63");

      } else {

          $("input[name='week_saturday']").parent().css("border", "1px solid white");

      }

      if (!week_sunday) {

          $("input[name='week_sunday']").parent().css("border", "1px solid #cf3c63");

      } else {

          $("input[name='week_sunday']").parent().css("border", "1px solid white");

      }



      // var guide_nationality = 1;

      // var guide_nationality_error = 0;

      // $("select[name='guide_nationality[]']").each(function() {



      //     if ($(this).val() == "0") {

      //         $("#guide_nationality" + guide_nationality).parent().find(".select2-selection").css("border", "1px solid #cf3c63");

      //         $("#guide_nationality" + guide_nationality).parent().find(".select2-selection").focus();

      //         guide_nationality_error++;

      //     } else {

      //         $("#guide_nationality" + guide_nationality).parent().find(".select2-selection").css("border", "1px solid #9e9e9e");

      //     }

      //     guide_nationality++;



      // });



      // var guide_markup = 1;

      // var guide_markup_error = 0;

      // $("select[name='guide_markup[]']").each(function() {



      //     if ($(this).val() == "0") {

      //         $("#guide_markup" + guide_markup).css("border", "1px solid #cf3c63");

      //         $("#guide_markup" + guide_markup).focus();

      //         guide_markup_error++;

      //     } else {

      //         $("#guide_markup" + guide_markup).css("border", "1px solid #9e9e9e");

      //     }

      //     guide_markup++;



      // });



      // var guide_markup_amt = 1;

      // var guide_markup_amt_error = 0;

      // $("input[name='guide_amount[]']").each(function() {



      //     if ($(this).val().trim() == "") {

      //         $("#guide_amount" + guide_markup_amt).css("border", "1px solid #cf3c63");

      //         $("#guide_amount" + guide_markup_amt).focus();

      //         guide_markup_amt_error++;

      //     } else {

      //         $("#guide_amount" + guide_markup_amt).css("border", "1px solid #9e9e9e");

      //     }

      //     guide_markup_amt++;



      // });



      //  var guide_validity_from = 1;

      // var guide_validity_from_error = 0;

      // $("input[name='guide_validity_from[]']").each(function() {



      //     if ($(this).val() == "") {

      //         $("#guide_validity_from" + guide_validity_from).css("border", "1px solid #cf3c63");

      //         $("#guide_validity_from" + guide_validity_from).focus();

      //         guide_validity_from_error++;

      //     } else {

      //         $("#guide_validity_from" + guide_validity_from).css("border", "1px solid #9e9e9e");

      //     }

      //     guide_validity_from++;



      // });

      //   var guide_validity_to = 1;

      // var guide_validity_to_error = 0;

      // $("input[name='guide_validity_to[]']").each(function() {



      //     if ($(this).val() == "") {

      //         $("#guide_validity_to" + guide_validity_to).css("border", "1px solid #cf3c63");

      //         $("#guide_validity_to" + guide_validity_to).focus();

      //         guide_validity_to_error++;

      //     } else {

      //         $("#guide_validity_to" + guide_validity_to).css("border", "1px solid #9e9e9e");

      //     }

      //     guide_validity_to++;



      // });

      //   var guide_tourname = 1;

      // var guide_tourname_error = 0;

      // $("input[name='guide_tourname[]']").each(function() {



      //     if ($(this).val() == "") {

      //         $("#guide_tourname" + guide_tourname).css("border", "1px solid #cf3c63");

      //         $("#guide_tourname" + guide_tourname).focus();

      //         guide_tourname_error++;

      //     } else {

      //         $("#guide_tourname" + guide_tourname).css("border", "1px solid #9e9e9e");

      //     }

      //     guide_tourname++;



      // });



      //     var guide_cost_four = 1;

      // var guide_cost_four_error = 0;

      // $("input[name='guide_cost_four[]']").each(function() {



      //     if ($(this).val() == "") {

      //         $("#guide_cost_four" + guide_cost_four).css("border", "1px solid #cf3c63");

      //         $("#guide_cost_four" + guide_cost_four).focus();

      //         guide_cost_four_error++;

      //     } else {

      //         $("#guide_cost_four" + guide_cost_four).css("border", "1px solid #9e9e9e");

      //     }

      //     guide_cost_four++;



      // });



      //     var guide_cost_seven = 1;

      // var guide_cost_seven_error = 0;

      // $("input[name='guide_cost_seven[]']").each(function() {



      //     if ($(this).val() == "") {

      //         $("#guide_cost_seven" + guide_cost_seven).css("border", "1px solid #cf3c63");

      //         $("#guide_cost_seven" + guide_cost_seven).focus();

      //         guide_cost_seven_error++;

      //     } else {

      //         $("#guide_cost_seven" + guide_cost_seven).css("border", "1px solid #9e9e9e");

      //     }

      //     guide_cost_seven++;



      // });



      //     var guide_cost_twenty = 1;

      // var guide_cost_twenty_error = 0;

      // $("input[name='guide_cost_twenty[]']").each(function() {



      //     if ($(this).val() == "") {

      //         $("#guide_cost_twenty" + guide_cost_twenty).css("border", "1px solid #cf3c63");

      //         $("#guide_cost_twenty" + guide_cost_twenty).focus();

      //         guide_cost_twenty_error++;

      //     } else {

      //         $("#guide_cost_twenty" + guide_cost_twenty).css("border", "1px solid #9e9e9e");

      //     }

      //     guide_cost_twenty++;



      // });





      //   var guide_duration = 1;

      // var guide_duration_error = 0;

      // $("input[name='guide_duration[]']").each(function() {



      //     if ($(this).val() == "") {

      //         $("#guide_duration" + guide_duration).css("border", "1px solid #cf3c63");

      //         $("#guide_duration" + guide_duration).focus();

      //         guide_duration_error++;

      //     } else {

      //         $("#guide_duration" + guide_duration).css("border", "1px solid #9e9e9e");

      //     }

      //     guide_duration++;



      // });

      if (guide_cancellation.trim() == "")
      {
        $("#cke_guide_cancellation").css("border", "1px solid #cf3c63");

    } else

    {
        $("#cke_guide_cancellation").css("border", "1px solid #9e9e9e");
    }
    if (guide_terms_conditions.trim() == "")
    {
        $("#cke_guide_terms_conditions").css("border", "1px solid #cf3c63");

    } else

    {
        $("#cke_guide_terms_conditions").css("border", "1px solid #9e9e9e");
    }

                   

                    if (guide_first_name.trim() == "") {

                        $("#guide_first_name").focus();

                    } else if (guide_last_name.trim() == "") {

                        $("#guide_last_name").focus();

                    } else if (contact_number.trim() == "") {

                        $("#contact_number").focus();

                    } else if (address.trim() == "") {

                        $("#address").focus();

                    } else if (guide_supplier_name.trim() == "0") {

                        $("#guide_supplier_name").parent().find(".select2-selection").focus();

                    } else if (guide_country.trim() == "0") {

                        $("#guide_country").parent().find(".select2-selection").focus();

                    } else if (guide_city.trim() == "0") {

                        $("#guide_city").parent().find(".select2-selection").focus();

                    } else if (guide_language == "") {

                        $("#guide_language").parent().find(".select2-selection").focus();

                    }
                    else if (guide_price_per_day == "") {

                        $("#guide_price_per_day").focus();

                    }

                     else if (guide_description.trim() == "") {

                        $("#description").focus();

                    } else if (!is_all_days) {

                      $("input[name='is_all_days']").focus();

                    } else if (!week_monday) {

                        $("input[name='week_monday']").focus();

                    } else if (!week_tuesday) {

                        $("input[name='week_tuesday']").focus();

                    } else if (!week_wednesday) {

                        $("input[name='week_wednesday']").focus();

                    } else if (!week_thursday) {

                        $("input[name='week_thursday']").focus();

                    } else if (!week_friday) {

                        $("input[name='week_friday']").focus();

                    } else if (!week_saturday) {

                        $("input[name='week_saturday']").focus();

                    } else if (!week_sunday) {

                        $("input[name='week_sunday']").focus();

                    }
                    //  else if (guide_nationality_error > 0) {



                    // } else if (guide_markup_error > 0) {



                    // } else if (guide_markup_amt_error > 0) {



                    // }
                    // else if (guide_validity_from_error > 0) {



                    // } else if (guide_validity_to_error > 0) {



                    // }

                    // else if (guide_tourname_error > 0) {



                    // }

                    // else if (guide_cost_four_error > 0) {



                    // }

                    // else if (guide_cost_seven_error > 0) {



                    // }

                    // else if (guide_cost_twenty_error > 0) {



                    // }

                    // else if (guide_duration_error > 0) {



                    // }
                    else if(guide_cancellation.trim()=="")
                    {
                      $("#cke_guide_cancellation").focus();  
                  }
                  else if(guide_terms_conditions.trim()=="")
                  {
                      $("#cke_guide_terms_conditions").focus();  
                  }

                   else

                    {



                        $("#create_guide").prop("disabled",true);



                        var formdata = new FormData($("#guide_form")[0]);



                        formdata.append("guide_inclusions",guide_inclusions);

                        formdata.append("guide_exclusions",guide_exclusions);

                        formdata.append("guide_cancellation",guide_cancellation);

                        formdata.append("guide_terms_conditions",guide_terms_conditions);



                        $.ajax({



                            url: "{{route('admin-insert-guide')}}",

                            enctype: 'multipart/form-data',



                            data: formdata,



                            type: "POST",



                            processData: false,



                            contentType: false,



                            success: function (response)



                            {



                                if (response.indexOf("exist") != -1)



                                {



                                    swal("Already Exist!",

                                        "Guide with this contact number already exists");



                                } else if (response.indexOf("success") != -1)



                                {



                                    swal({

                                            title: "Success",

                                            text: "Guide Created Successfully !",

                                            type: "success"

                                        },



                                        function () {



                                            location.reload();



                                        });



                                } else if (response.indexOf("fail") != -1)



                                {



                                    swal("ERROR", "Guide cannot be inserted right now! ");



                                }



                                $("#create_guide").prop("disabled", false);



                            }



                        });



                    }















                });

        </script>



        <script>

             $(document).on("change","input[name='is_all_days']",function()

    {

        if($(this).is(":checked"))

        {

            if($("input[name='is_all_days']:checked").val()=="Yes")

            {

               $(".weekdays_yes").prop("checked",true);

            }

            else

            {

                $(".weekdays_no").prop("checked",true);

            }

        }





    });

               $(document).on("change",".weekdays_yes,.weekdays_no",function()

    {

        var count=0;

        $(".weekdays_yes").each(function()

        {

            if($(this).is(":checked"))

            {

               count++;

            }

        });



        if(count==7)

        {

            $("input[name=is_all_days][value='Yes']").prop("checked",true);

        }

        else

        {

             $("input[name=is_all_days][value='No']").prop("checked",true);

        }



    });



               $(document).on("click",".add_more_transport",function()

    {

        var clone_transport = $(".transport_div:last").clone();

         var add_url= "{!! asset('assets/images/add_icon.png') !!}";

        var minus_url = "{!! asset('assets/images/minus_icon.png') !!}";

        var newer_id = $(".transport_div:last").attr("id");

        new_id = newer_id.split('transport_div');

        old_id = parseInt(new_id[1]);

        new_id = parseInt(new_id[1]) + 1;

        clone_transport.find("input[name='guide_tourname[]']").attr("id", "guide_tourname" + new_id)

        .val("");

        clone_transport.find("input[name='guide_tourname[]']").parent().parent().parent().parent().attr("id",

            "transport_div" + new_id);

                clone_transport.find("input[name='guide_validity_from[]']").attr("id", "guide_validity_from" + new_id).val("");

        clone_transport.find("input[name='guide_validity_to[]']").attr("id", "guide_validity_to" + new_id).val("");

        clone_transport.find("input[name='guide_cost_four[]']").attr("id", "guide_cost_four" + new_id).val("");

        clone_transport.find("input[name='guide_cost_seven[]']").attr("id", "guide_cost_seven" + new_id).val("");

        clone_transport.find("input[name='guide_cost_twenty[]']").attr("id", "guide_cost_twenty" + new_id).val("");

        clone_transport.find("input[name='guide_vehicle[]']").attr("id", "guide_vehicle" + new_id).val("");

        clone_transport.find("input[name='guide_duration[]']").attr("id", "guide_duration" + new_id).val("");

        // clone_transport.find(".add_more_transport").attr("src", minus_url);

        // clone_transport.find(".add_more_transport").attr("id", "remove_more_transport" + new_id);

        // clone_transport.find(".add_more_transport").removeClass('plus-icon add_more_transport').addClass(

        //     'minus-icon remove_more_transport');

        $("#transport_div"+old_id).find(".add_more_transport_div").html("");

        if(old_id>1)

        {

           $("#transport_div"+old_id).find(".add_more_transport_div").append('<img id="remove_more_transport'+old_id+'" class="remove_more_transport minus-icon" src="'+minus_url+'">');

       }

       clone_transport.find(".add_more_transport_div").html('');

       clone_transport.find(".add_more_transport_div").append(' <img id="remove_more_transport'+new_id+'" class="remove_more_transport minus-icon" src="'+minus_url+'"> <img id="add_more_transport'+new_id+'" class="add_more_transport plus-icon" src="'+add_url+'"> ');



        $(".transport_div:last").after(clone_transport);



        dateshow();





    });



 $(document).on("click", ".remove_more_transport", function () {

        var id = this.id;

        var split_id = id.split('remove_more_transport');

        $("#transport_div" + split_id[1]).remove();

         var add_url= "{!! asset('assets/images/add_icon.png') !!}";

        var minus_url = "{!! asset('assets/images/minus_icon.png') !!}";

        $("#transport_div" + split_id[1]).remove();



         var last_id = $(".transport_div:last").attr("id");

         old_id = last_id.split('transport_div');

         old_id=parseInt(old_id[1]);





          if(old_id>1)

         {

           $("#transport_div"+old_id).find(".add_more_transport_div").html("");

           $("#transport_div"+old_id).find(".add_more_transport_div").append('<img id="remove_more_transport'+old_id+'" class="remove_more_transport minus-icon" src="'+minus_url+'"> <img id="add_more_transport'+old_id+'" class="add_more_transport plus-icon" src="'+add_url+'">');

       }

       else

       {



          $("#transport_div"+old_id).find(".add_more_transport_div").html("");

           $("#transport_div"+old_id).find(".add_more_transport_div").append('<img id="add_more_transport'+old_id+'" class="add_more_transport minus-icon" src="'+add_url+'"> ');

     }

    });



                $(document).on("click",".add_more_markup",function()

    {

        var clone_markup = $(".markup_div:last").clone();

        var add_url= "{!! asset('assets/images/add_icon.png') !!}";

        var minus_url = "{!! asset('assets/images/minus_icon.png') !!}";

        var newer_id = $(".markup_div:last").attr("id");

        new_id = newer_id.split('markup_div');

         old_id = parseInt(new_id[1]);

        new_id = parseInt(new_id[1]) + 1;

        clone_markup.find("select[name='guide_nationality[]']").attr("id", "guide_nationality" + new_id)

        .val(0);

        clone_markup.find("select[name='guide_nationality[]']").parent().parent().parent().parent().attr("id",

            "markup_div" + new_id);

        clone_markup.find("select[name='guide_nationality[]']").select2();

         clone_markup.find(".select2-container").slice(1).remove();

        clone_markup.find("select[name='guide_markup[]']").attr("id", "guide_markup" + new_id).val("0");

        clone_markup.find("input[name='guide_amount[]']").attr("id", "guide_amount" + new_id).val("");

        // clone_markup.find(".add_more_markup").attr("src", minus_url);

        // clone_markup.find(".add_more_markup").attr("id", "remove_more_markup" + new_id);

        // clone_markup.find(".add_more_markup").removeClass('plus-icon add_more_markup').addClass(

        //     'minus-icon remove_more_markup');



         $("#markup_div"+old_id).find(".add_more_markup_div").html("");

        if(old_id>1)

        {

           $("#markup_div"+old_id).find(".add_more_markup_div").append('<img id="remove_more_markup'+old_id+'" class="remove_more_markup minus-icon" src="'+minus_url+'">');

       }

       clone_markup.find(".add_more_markup_div").html('');

       clone_markup.find(".add_more_markup_div").append(' <img id="remove_more_markup'+new_id+'" class="remove_more_markup minus-icon" src="'+minus_url+'"> <img id="add_more_markup'+new_id+'" class="add_more_markup plus-icon" src="'+add_url+'"> ');



        $(".markup_div:last").after(clone_markup);

         



    });

 $(document).on("click", ".remove_more_markup", function () {

        var id = this.id;

        var split_id = id.split('remove_more_markup');

         var add_url= "{!! asset('assets/images/add_icon.png') !!}";

        var minus_url = "{!! asset('assets/images/minus_icon.png') !!}";

        $("#markup_div" + split_id[1]).remove();



         var last_id = $(".markup_div:last").attr("id");

         old_id = last_id.split('markup_div');

         old_id=parseInt(old_id[1]);





          if(old_id>1)

         {

           $("#markup_div"+old_id).find(".add_more_markup_div").html("");

           $("#markup_div"+old_id).find(".add_more_markup_div").append('<img id="remove_more_markup'+old_id+'" class="remove_more_markup minus-icon" src="'+minus_url+'"> <img id="add_more_markup'+old_id+'" class="add_more_markup plus-icon" src="'+add_url+'">');

       }

       else

       {



          $("#markup_div"+old_id).find(".add_more_markup_div").html("");

           $("#markup_div"+old_id).find(".add_more_markup_div").append('<img id="add_more_markup'+old_id+'" class="add_more_markup minus-icon" src="'+add_url+'"> ');

     }

    });

        </script>



</body>



</html>



</body>





</html>

