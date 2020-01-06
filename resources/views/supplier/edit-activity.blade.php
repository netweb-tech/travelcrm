@include('supplier.includes.top-header')
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
        height: 275px !IMPORTANT;
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
</style>

<body class="hold-transition light-skin sidebar-mini theme-rosegold onlyheader">

    <div class="wrapper">

        @include('supplier.includes.top-nav')

        <div class="content-wrapper">

            <div class="container-full clearfix position-relative">

                @include('supplier.includes.nav')

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
                            <li class="breadcrumb-item active" aria-current="page">Edit Activity
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


    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Activity</h4>
                </div>
                <div class="box-body">
                    <form id="activity_form" encytpe="multipart/form-data">
                        {{csrf_field()}}
                    <div class="row mb-10">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="activity_name">ACTIVITY NAME <span class="asterisk">*</span></label>
                                 <input type="hidden" name="activity_role" id="activity_role" value="supplier">
                                <input type="text" id="activity_name" name="activity_name" class="form-control" placeholder="ACTIVITY NAME " value="{{$get_activity->activity_name}}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">

                        </div>
                    </div>
                    <div class="row mb-10">

                        <div class="col-sm-12 col-md-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="supplier_name">SUPPLIER <span class="asterisk">*</span></label>
                                        <input type="text" id="supplier_name1" name="supplier_name1" class="form-control" placeholder="Supplier Name" value="{{$get_supplier_countries->supplier_name}}" readonly>
                                        <input type="hidden" id="supplier_name" name="supplier_name" value="{{$get_activity->supplier_id}}">

                                     
                                    </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">

                        </div>

                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="activity_location">ACTIVITY LOCATION <span class="asterisk">*</span></label>
                                <input type="text" class="form-control" placeholder="ACTIVITY LOCATION" id="activity_location" name="activity_location" value="{{$get_activity->activity_location}}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">

                        </div>
                    </div>
                    <div class="row mb-10">

                        <div class="col-sm-12 col-md-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="activity_country">COUNTRY <span class="asterisk">*</span></label>
                                        <select id="activity_country" name="activity_country" class="form-control select2" style="width: 100%;">
                                            <option value="0" hidden>SELECT COUNTRY</option>
                                             @foreach($countries as $country)
                                             @if(in_array($country->country_id,$countries_data))
                                             @if($country->country_id==$get_activity->activity_country)
                                             <option value="{{$country->country_id}}" selected="selected">{{$country->country_name}}</option>
                                             @else
                                             <option value="{{$country->country_id}}" >{{$country->country_name}}</option>
                                             @endif  
                                             @endif
                                           @endforeach
                                        </select>
                                    </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">

                        </div>

                    </div>
                     <div class="row mb-10" id="acitvity_city_div">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                        <label for="activity_city">CITY <span class="asterisk">*</span></label>
                                        <select id="activity_city" name="activity_city" class="form-control select2" style="width: 100%;">
                                             <option value="0" hidden>SELECT CITY</option>
                                            @foreach($cities as $city)
                                             @if($city->id==$get_activity->activity_city)
                                             <option value="{{$city->id}}" selected="selected">{{$city->name}}</option>
                                             @else
                                             <option value="{{$city->id}}" >{{$city->name}}</option>
                                             @endif  
                                           @endforeach
                                        </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-10">

                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="period_operation_from">PERIOD OF OPERATION <span class="asterisk">*</span></label>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="input-group date">
                                                <input type="text" placeholder="FROM"
                                                    class="form-control pull-right datepicker" id="period_operation_from" name="period_operation_from" value="{{$get_activity->operation_period_fromdate}}">
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
                                                    class="form-control pull-right datepicker" id="period_operation_to" name="period_operation_to" value="{{$get_activity->operation_period_todate}}">
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
                    <div class="row mb-10">

                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label>VALIDITY DATE <span class="asterisk">*</span></label>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="input-group date">
                                                <input type="text" placeholder="FROM"
                                                    class="form-control pull-right datepicker" id="validity_operation_from" name="validity_operation_from" value="{{$get_activity->validity_fromdate}}">
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
                                                    class="form-control pull-right datepicker" id="validity_operation_to" name="validity_operation_to" value="{{$get_activity->validity_todate}}">
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
                    <div class="row mb-10">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="activity_time_from">FROM TIME <span class="asterisk">*</span></label>
                                <div class="bootstrap-timepicker">
                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td><a href="#" data-action="incrementHour"><i
                                                                class="glyphicon glyphicon-chevron-up"></i></a></td>
                                                    <td class="separator">&nbsp;</td>
                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                class="glyphicon glyphicon-chevron-up"></i></a></td>
                                                    <td class="separator">&nbsp;</td>
                                                    <td class="meridian-column"><a href="#"
                                                            data-action="toggleMeridian"><i
                                                                class="glyphicon glyphicon-chevron-up"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td><span class="bootstrap-timepicker-hour">09</span></td>
                                                    <td class="separator">:</td>
                                                    <td><span class="bootstrap-timepicker-minute">00</span></td>
                                                    <td class="separator">&nbsp;</td>
                                                    <td><span class="bootstrap-timepicker-meridian">AM</span></td>
                                                </tr>
                                                <tr>
                                                    <td><a href="#" data-action="decrementHour"><i
                                                                class="glyphicon glyphicon-chevron-down"></i></a></td>
                                                    <td class="separator"></td>
                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                class="glyphicon glyphicon-chevron-down"></i></a></td>
                                                    <td class="separator">&nbsp;</td>
                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                class="glyphicon glyphicon-chevron-down"></i></a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="form-group">


                                        <div class="input-group">
                                            <input type="text" class="form-control timepicker" id="activity_time_from" name="activity_time_from" value="{{$get_activity->validity_fromtime}}">

                                            <div class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                        </div>
                                        <!-- /.input group -->
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="activity_time_to">TO TIME  <span class="asterisk">*</span></label>
                                <div class="bootstrap-timepicker">
                                    <div class="bootstrap-timepicker-widget dropdown-menu">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td><a href="#" data-action="incrementHour"><i
                                                                class="glyphicon glyphicon-chevron-up"></i></a></td>
                                                    <td class="separator">&nbsp;</td>
                                                    <td><a href="#" data-action="incrementMinute"><i
                                                                class="glyphicon glyphicon-chevron-up"></i></a></td>
                                                    <td class="separator">&nbsp;</td>
                                                    <td class="meridian-column"><a href="#"
                                                            data-action="toggleMeridian"><i
                                                                class="glyphicon glyphicon-chevron-up"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td><span class="bootstrap-timepicker-hour">09</span></td>
                                                    <td class="separator">:</td>
                                                    <td><span class="bootstrap-timepicker-minute">00</span></td>
                                                    <td class="separator">&nbsp;</td>
                                                    <td><span class="bootstrap-timepicker-meridian">AM</span></td>
                                                </tr>
                                                <tr>
                                                    <td><a href="#" data-action="decrementHour"><i
                                                                class="glyphicon glyphicon-chevron-down"></i></a></td>
                                                    <td class="separator"></td>
                                                    <td><a href="#" data-action="decrementMinute"><i
                                                                class="glyphicon glyphicon-chevron-down"></i></a></td>
                                                    <td class="separator">&nbsp;</td>
                                                    <td><a href="#" data-action="toggleMeridian"><i
                                                                class="glyphicon glyphicon-chevron-down"></i></a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="form-group">


                                        <div class="input-group">
                                            <input type="text" class="form-control timepicker" id="activity_time_to" name="activity_time_to" value="{{$get_activity->validity_totime}}">

                                            <div class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                        </div>
                                        <!-- /.input group -->
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                      @php
                        $weekdays=unserialize($get_activity->operating_weekdays);
    
                        @endphp
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
                                                class="with-gap radio-col-primary week_all_days"  name="is_all_days" value="Yes" @if($weekdays["monday"]=="Yes" && $weekdays["tuesday"]=="Yes" && $weekdays["wednesday"]=="Yes" && $weekdays["thursday"]=="Yes" && $weekdays["friday"]=="Yes" && $weekdays["saturday"]=="Yes" && $weekdays["sunday"]=="Yes")checked @endif>
                                            <label for="radio_10">Yes </label>
                                            <input type="radio" id="radio_11"
                                                class="with-gap radio-col-primary week_all_days" name="is_all_days" value="No" @if($weekdays["monday"]=="No" || $weekdays["tuesday"]=="No" || $weekdays["wednesday"]=="No" || $weekdays["thursday"]=="No" || $weekdays["friday"]=="No" ||$weekdays["saturday"]=="No" || $weekdays["sunday"]=="No") checked @endif>
                                            <label for="radio_11">No</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>MONDAY <span class="asterisk">*</span></label>
                                        </div>
                                        <div class="col-md-6">
                                <input  type="radio" id="radio_20"
                             class="with-gap radio-col-primary weekdays_yes " name="week_monday" value="Yes" @if($weekdays["monday"]=="Yes")checked @endif>
                                            <label for="radio_20">Yes </label>
                                    <input type="radio" id="radio_21"
                                      class="with-gap radio-col-primary weekdays_no " name="week_monday" value="No" @if($weekdays["monday"]=="No")checked @endif>
                                            <label for="radio_21">No</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>TUESDAY <span class="asterisk">*</span></label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="radio" id="radio_30"
                                                class="with-gap radio-col-primary weekdays_yes" name="week_tuesday" value="Yes" @if($weekdays["tuesday"]=="Yes")checked @endif>
                                            <label for="radio_30">Yes </label>
                                            <input type="radio" id="radio_31"
                                                class="with-gap radio-col-primary weekdays_no" name="week_tuesday" value="No" @if($weekdays["tuesday"]=="No")checked @endif>
                                            <label for="radio_31">No</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>WEDNESDAY <span class="asterisk">*</span></label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="radio" id="radio_40"
                                                class="with-gap radio-col-primary weekdays_yes" name="week_wednesday" value="Yes" @if($weekdays["wednesday"]=="Yes")checked @endif>
                                            <label for="radio_40">Yes </label>
                                            <input type="radio" id="radio_41"
                                                class="with-gap radio-col-primary weekdays_no" name="week_wednesday" value="No" @if($weekdays["wednesday"]=="No")checked @endif>
                                            <label for="radio_41">No</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>THURSDAY <span class="asterisk">*</span></label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="radio" id="radio_50"
                                                class="with-gap radio-col-primary weekdays_yes"  name="week_thursday" value="Yes" @if($weekdays["thursday"]=="Yes")checked @endif>
                                            <label for="radio_50">Yes </label>
                                            <input type="radio" id="radio_51"
                                                class="with-gap radio-col-primary weekdays_no"  name="week_thursday" value="No" @if($weekdays["thursday"]=="No")checked @endif>
                                            <label for="radio_51">No</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>FRIDAY <span class="asterisk">*</span></label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="radio" id="radio_60"
                                                class="with-gap radio-col-primary weekdays_yes" name="week_friday" value="Yes" @if($weekdays["friday"]=="Yes")checked @endif>
                                            <label for="radio_60">Yes </label>
                                            <input type="radio" id="radio_61"
                                                class="with-gap radio-col-primary weekdays_no" name="week_friday" value="No" @if($weekdays["friday"]=="No")checked @endif>
                                            <label for="radio_61">No</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>SATURDAY <span class="asterisk">*</span></label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="radio" id="radio_70"
                                                class="with-gap radio-col-primary weekdays_yes" name="week_saturday" value="Yes" @if($weekdays["saturday"]=="Yes")checked @endif>
                                            <label for="radio_70">Yes </label>
                                            <input type="radio" id="radio_71"
                                                class="with-gap radio-col-primary weekdays_no" name="week_saturday" value="No" @if($weekdays["saturday"]=="No")checked @endif>
                                            <label for="radio_71">No</label>
                                        </div>
                                    </div>
                                <div class="row">
                                        <div class="col-md-6">
                                            <label>SUNDAY <span class="asterisk">*</span></label>
                                        </div>
                                        <div class="col-md-6">

                                            <input type="radio" id="radio_80"
                                                class="with-gap radio-col-primary weekdays_yes" name="week_sunday" value="Yes" @if($weekdays["sunday"]=="Yes")checked @endif>
                                            <label for="radio_80">Yes </label>
                                            <input type="radio" id="radio_81"
                                                class="with-gap radio-col-primary weekdays_no" name="week_sunday" value="No" @if($weekdays["sunday"]=="No")checked @endif>
                                            <label for="radio_81">No</label>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">

                        </div>




                    </div>

                    <div class="row mb-10">

                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                        <label for="activity_currency">CURRENCY <span class="asterisk">*</span></label>
                                        <select class="form-control select2" style="width: 100%;" id="activity_currency" name="activity_currency">
                                             <option value="0" hidden>SELECT CURRENCY</option>
                                             @foreach($currency as $curr)
                                             @if($get_activity->activity_currency==$curr->code)
                                             <option value="{{$curr->code}}" selected="selected">{{$curr->code}} ({{$curr->name}})</option>
                                             @else
                                             <option value="{{$curr->code}}">{{$curr->code}} ({{$curr->name}})</option>

                                             @endif
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
                                <label for="activity_adult_cost">ADULT PRICE <span class="asterisk">*</span></label>
                                <input type="text" class="form-control" placeholder="ADULT PRICE " id="activity_adult_cost" name="activity_adult_cost"  onkeypress="javascript:return validateNumber(event)" value="{{$get_activity->adult_price}}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">

                        </div>
                    </div>


                    <div class="row mb-10">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label value="activity_child_cost">CHILD PRICE <span class="asterisk">*</span></label>
                                <input type="text" class="form-control" placeholder="CHILD PRICE" id="activity_child_cost" name="activity_child_cost" onkeypress="javascript:return validateNumber(event)" value="{{$get_activity->child_price}}">
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
                                            <label>FOR ALL AGES<span class="asterisk">*</span></label>
                                        </div>
                                        <div class="col-md-6">

                                            <input type="radio" id="radio_for_all_ages1"
                                            class="with-gap radio-col-primary for_all_ages radio_allowed"  name="for_all_ages" value="Yes" @if($get_activity->for_all_ages=="Yes") checked @endif>
                                            <label for="radio_for_all_ages1">Yes </label>
                                            <input type="radio" id="radio_for_all_ages2" 
                                            class="with-gap radio-col-primary for_all_ages radio_allowed" name="for_all_ages" value="No" @if($get_activity->for_all_ages=="No") checked @endif>
                                            <label for="radio_for_all_ages2">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
                        $child_adult_details=unserialize($get_activity->child_adult_age_details);
                    @endphp
                    <div class="row mb-10" id="for_all_ages_div" @if($get_activity->for_all_ages=="Yes")  style="display:none" @endif>
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="row mb-10">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>CHILD ALLOWED<span class="asterisk">*</span></label>
                                        </div>
                                        <div class="col-md-6">

                                            <input type="radio" id="radio_child_allowed1"
                                            class="with-gap radio-col-primary child_allowed radio_allowed"  name="child_allowed" value="Yes" @if($get_activity->for_all_ages=="No" && $child_adult_details[0][1]=="Yes") checked @endif>
                                            <label for="radio_child_allowed1">Yes </label>
                                            <input type="radio" id="radio_child_allowed2"
                                            class="with-gap radio-col-primary child_allowed radio_allowed" name="child_allowed" value="No" @if($get_activity->for_all_ages=="No" && $child_adult_details[0][1]=="No") checked @endif>
                                            <label for="radio_child_allowed2">No</label>

                                            <div class="row mb-10" id="child_allowed_div" @if($get_activity->for_all_ages=="No" && $child_adult_details[0][1]=="No") style="display:none" @endif >
                                                <div class="col-md-12">
                                                 <label for="child_age">CHILD AGE <span class="asterisk">*</span></label>
                                                 <input type="text" class="form-control" placeholder="CHILD AGE " id="child_age" name="child_age" @if($get_activity->for_all_ages=="No" && $child_adult_details[0][2]!="") value="{{$child_adult_details[0][2]}}" @endif>
                                             </div>
                                         </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-10">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>ADULT ALLOWED<span class="asterisk">*</span></label>
                                        </div>
                                        <div class="col-md-6">

                                            <input type="radio" id="radio_adult_allowed1"
                                            class="with-gap radio-col-primary adult_allowed radio_allowed"  name="adult_allowed" value="Yes" @if($get_activity->for_all_ages=="No" && $child_adult_details[1][1]=="Yes") checked @endif>
                                            <label for="radio_adult_allowed1">Yes </label>
                                            <input type="radio" id="radio_adult_allowed2"
                                            class="with-gap radio-col-primary adult_allowed radio_allowed" name="adult_allowed" value="No" @if($get_activity->for_all_ages=="No" && $child_adult_details[1][1]=="No") checked @endif>
                                            <label for="radio_adult_allowed2">No</label>

                                            <div class="row mb-10" id="adult_allowed_div" @if($get_activity->for_all_ages=="No" && $child_adult_details[1][1]=="No") style="display:none" @endif>
                                                <div class="col-md-12">
                                                    <label for="adult_age">ADULT AGE <span class="asterisk">*</span></label>
                                                 <input type="text" class="form-control" placeholder="ADULT AGE " id="adult_age" name="adult_age"  @if($get_activity->for_all_ages=="No" && $child_adult_details[1][2]!="") value="{{$child_adult_details[1][2]}}" @endif>
                                             </div>
                                         </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                                        <input type="text" placeholder="BLACKOUT DATES" class="form-control pull-right datepicker" id="blackout_days" name="blackout_days" value="{{$get_activity->activity_blackout_dates}}">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                    </div>
                                                    <!-- /.input group -->

                                                </div>
                                            </div>
                                            
                                            
                                        </div>

                                        <!-- <div class="col-sm-12 col-md-12">
                                            <img class="plus-icon" style="display: block;" src="{{ asset('assets/images/add_icon.png') }}">
                                        </div> -->
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">

                        </div>
                    </div>
                    <div class="row mb-10" style="display: none">
                        @php
                        $nationality_markup=unserialize($get_activity->nationality_markup_details);

                        for($markup=0;$markup< count($nationality_markup);$markup++)
                        {
                            @endphp
                            <div class="col-sm-12 col-md-12 col-lg-6 markup_div" id="markup_div{{($markup+1)}}">
                                <label>NATIONALITY & ACTIVITY MARKUP <span class="asterisk">*</span></label>
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group">

                                            <select class="form-control select2" style="width: 100%;" id="activity_nationality{{($markup+1)}}" name="activity_nationality[]">
                                                <option selected="selected" value="0" hidden>SELECT NATIONALITY</option>
                                                @foreach($countries as $country)
                                                 @if($nationality_markup[$markup]['activity_nationality']==$country->country_id)
                                           <option value="{{$country->country_id}}" selected="selected">{{$country->country_name}}</option>
                                             @else
                                            <option value="{{$country->country_id}}">{{$country->country_name}}</option>
                                             @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <select class="form-control" id="activity_markup{{($markup+1)}}" name="activity_markup[]">
                                                <option value="0">SELECT MARKUP TYPE</option>
                                                <option  @if($nationality_markup[$markup]['activity_markup']=="Markup Percentage") selected @endif>Markup Percentage</option>
                                                <option @if($nationality_markup[$markup]['activity_markup']=="Markup Amount") selected @endif>Markup Amount</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Markup Amount" id="activity_amount{{($markup+1)}}" name="activity_amount[]" onkeypress="javascript:return validateNumber(event)" value="{{$nationality_markup[$markup]['activity_amount']}}">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-12 col-md-12">
                                    @if($markup==0)
                                    <img id="add_more_markup{$markup}}" class="plus-icon add_more_markup" style="display: block !important;margin-left: auto;" src="{{ asset('assets/images/add_icon.png') }}">
                                    @else
                                     <img id="remove_more_markup{$markup}}" class="minus-icon remove_more_markup" style="display: block !important;margin-left: auto;" src="{{ asset('assets/images/minus_icon.png') }}">

                                    @endif
                                </div>
                            </div>
                            @php
                        }
                        @endphp
                    </div>


                    <div class="row mb-10" style="display: none">
                         @php
                        $activity_transport=unserialize($get_activity->activity_transport_pricing);

                        for($transport=0;$transport< count($activity_transport);$transport++)
                        {
                            @endphp
                        <div class="col-sm-12 col-md-12 col-lg-6 transport_div" id="transport_div{{($transport+1)}}">
                            <label for="activity_transport_currency1">
                                ACTIVITY TRANSPORT PRICING <span class="asterisk">*</span></label>
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group">

                                        <select class="form-control select2" style="width: 100%;" id="activity_transport_currency{{($transport+1)}}" name="activity_transport_currency[]">
                                            <option selected="selected" value="0" hidden>SELECT CURRENCY</option>
                                            @foreach($currency as $curr)
                                             @if($activity_transport[$transport]['transport_currency']==$curr->code)
                                             <option value="{{$curr->code}}" selected="selected">{{$curr->code}} ({{$curr->name}})</option>
                                             @else
                                             <option value="{{$curr->code}}">{{$curr->code}} ({{$curr->name}})</option>

                                             @endif
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                            <textarea rows="5" cols="5" class="form-control"
                                                placeholder="DESCRIPTION" id="activity_transport_desc{{($transport+1)}}" name="activity_transport_desc[]">{{$activity_transport[$transport]['transport_desc']}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <input type="text" class="form-control" placeholder="COST " id="activity_transport_cost{{($transport+1)}}" name="activity_transport_cost[]" onkeypress="javascript:return validateNumber(event)" value="{{$activity_transport[$transport]['transport_cost']}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                 @if($transport==0)
                                    <img id="add_more_transport1" class="plus-icon add_more_transport" style="display: block !important;margin-left: auto;" src="{{ asset('assets/images/add_icon.png') }}">
                                    @else
                                    <img id="remove_more_transport1" class="minus-icon remove_more_transport" style="display: block !important;margin-left: auto;" src="{{ asset('assets/images/minus_icon.png') }}">

                                    @endif
                            </div>
                        </div>
                         @php
                        }
                        @endphp
                    </div>
               <!--      <div class="row mb-10">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label>ACTIVITY SUBCATEGORY <span class="asterisk">*</span></label>
                                <div class="col-sm-12 col-md-12" style="padding:0">
                                    <button type="button" class="btn btn-rounded btn-primary mr-10"
                                        data-toggle="collapse" data-target="#demo21">Add
                                       Activity Sub Category</button>

                                    <div id="demo21" class="collapse">
                                        <div class="row mt-15 mb-10">
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label>NAME <span class="asterisk">*</span></label>

                                                    <input type="text" class="form-control" placeholder="NAME ">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">

                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row mb-10">
                                                            <div class="col-sm-12">
                                                                <div class="box-header with-border"
                                                                    style="padding: 10px;border-color: #c3c3c3;">

                                                                </div>
                                                                <h4 class="box-title"
                                                                    style="border-color: #c1c1c1;margin-top: 25px;">
                                                                    <i class="fa fa-plus-circle"></i> INCLUSIONS </h4>

                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="box">

                                                                 
                                                                    <div class="box-body">
                                                                        <div id="editor">
                                                                            <h1>Hello world!</h1>
                                                                            <p>I'm an instance of <a
                                                                                    href="https://ckeditor.com">CKEditor</a>.
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>





                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="row mb-10">
                                                            <div class="col-sm-12">
                                                                <div class="box-header with-border"
                                                                    style="padding: 10px;border-color: #c3c3c3;">

                                                                </div>
                                                                <h4 class="box-title"
                                                                    style="border-color: #c1c1c1;margin-top: 25px;">
                                                                    <i class="fa fa-plus-circle"></i> EXCLUSIONS </h4>

                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="box">

                                                                   
                                                                    <div class="box-body">
                                                                        <div id="editor1">
                                                                            <h1>Hello world!</h1>
                                                                            <p>I'm an instance of <a
                                                                                    href="https://ckeditor.com">CKEditor</a>.
                                                                            </p>
                                                                        </div>
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
                                                                <div class="box-header with-border"
                                                                    style="padding: 10px;border-color: #c3c3c3;">

                                                                </div>
                                                                <h4 class="box-title"
                                                                    style="border-color: #c1c1c1;margin-top: 25px;">
                                                                    <i class="fa fa-plus-circle"></i> CANCELLATION
                                                                    POLICY </h4>

                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="box">

                                                                 
                                                                    <div class="box-body">
                                                                        <div id="editor2">
                                                                            <h1>Hello world!</h1>
                                                                            <p>I'm an instance of <a
                                                                                    href="https://ckeditor.com">CKEditor</a>.
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>





                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="row mb-10">
                                                            <div class="col-sm-12">
                                                                <div class="box-header with-border"
                                                                    style="padding: 10px;border-color: #c3c3c3;">

                                                                </div>
                                                                <h4 class="box-title"
                                                                    style="border-color: #c1c1c1;margin-top: 25px;">
                                                                    <i class="fa fa-plus-circle"></i> TERMS AND
                                                                    CONDITIONS </h4>

                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="box">

                                                                   
                                                                    <div class="box-body">
                                                                        <div id="editor3">
                                                                            <h1>Hello world!</h1>
                                                                            <p>I'm an instance of <a
                                                                                    href="https://ckeditor.com">CKEditor</a>.
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>





                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-group">

                                                        <textarea rows="5" cols="5" class="form-control"
                                                            placeholder="DESCRIPTION"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">

                                            </div>

                                            <div class="col-md-12">


                                                <div class="row mb-10">
                                                    <div class="col-sm-12 col-md-12 col-lg-6">
                                                        <div class="form-group">
                                                            <label>FROM TIME <span class="asterisk">*</span></label>
                                                            <div class="bootstrap-timepicker">
                                                                <div class="bootstrap-timepicker-widget dropdown-menu">
                                                                    <table>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td><a href="#"
                                                                                        data-action="incrementHour"><i
                                                                                            class="glyphicon glyphicon-chevron-up"></i></a>
                                                                                </td>
                                                                                <td class="separator">&nbsp;</td>
                                                                                <td><a href="#"
                                                                                        data-action="incrementMinute"><i
                                                                                            class="glyphicon glyphicon-chevron-up"></i></a>
                                                                                </td>
                                                                                <td class="separator">&nbsp;</td>
                                                                                <td class="meridian-column"><a href="#"
                                                                                        data-action="toggleMeridian"><i
                                                                                            class="glyphicon glyphicon-chevron-up"></i></a>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><span
                                                                                        class="bootstrap-timepicker-hour">09</span>
                                                                                </td>
                                                                                <td class="separator">:</td>
                                                                                <td><span
                                                                                        class="bootstrap-timepicker-minute">00</span>
                                                                                </td>
                                                                                <td class="separator">&nbsp;</td>
                                                                                <td><span
                                                                                        class="bootstrap-timepicker-meridian">AM</span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><a href="#"
                                                                                        data-action="decrementHour"><i
                                                                                            class="glyphicon glyphicon-chevron-down"></i></a>
                                                                                </td>
                                                                                <td class="separator"></td>
                                                                                <td><a href="#"
                                                                                        data-action="decrementMinute"><i
                                                                                            class="glyphicon glyphicon-chevron-down"></i></a>
                                                                                </td>
                                                                                <td class="separator">&nbsp;</td>
                                                                                <td><a href="#"
                                                                                        data-action="toggleMeridian"><i
                                                                                            class="glyphicon glyphicon-chevron-down"></i></a>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="form-group">


                                                                    <div class="input-group">
                                                                        <input type="text"
                                                                            class="form-control timepicker">

                                                                        <div class="input-group-addon">
                                                                            <i class="fa fa-clock-o"></i>
                                                                        </div>
                                                                    </div>
                                                                   
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-10">
                                                    <div class="col-sm-12 col-md-12 col-lg-6">
                                                        <div class="form-group">
                                                            <label>TO TIME <span class="asterisk">*</span></label>
                                                            <div class="bootstrap-timepicker">
                                                                <div class="bootstrap-timepicker-widget dropdown-menu">
                                                                    <table>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td><a href="#"
                                                                                        data-action="incrementHour"><i
                                                                                            class="glyphicon glyphicon-chevron-up"></i></a>
                                                                                </td>
                                                                                <td class="separator">&nbsp;</td>
                                                                                <td><a href="#"
                                                                                        data-action="incrementMinute"><i
                                                                                            class="glyphicon glyphicon-chevron-up"></i></a>
                                                                                </td>
                                                                                <td class="separator">&nbsp;</td>
                                                                                <td class="meridian-column"><a href="#"
                                                                                        data-action="toggleMeridian"><i
                                                                                            class="glyphicon glyphicon-chevron-up"></i></a>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><span
                                                                                        class="bootstrap-timepicker-hour">09</span>
                                                                                </td>
                                                                                <td class="separator">:</td>
                                                                                <td><span
                                                                                        class="bootstrap-timepicker-minute">00</span>
                                                                                </td>
                                                                                <td class="separator">&nbsp;</td>
                                                                                <td><span
                                                                                        class="bootstrap-timepicker-meridian">AM</span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><a href="#"
                                                                                        data-action="decrementHour"><i
                                                                                            class="glyphicon glyphicon-chevron-down"></i></a>
                                                                                </td>
                                                                                <td class="separator"></td>
                                                                                <td><a href="#"
                                                                                        data-action="decrementMinute"><i
                                                                                            class="glyphicon glyphicon-chevron-down"></i></a>
                                                                                </td>
                                                                                <td class="separator">&nbsp;</td>
                                                                                <td><a href="#"
                                                                                        data-action="toggleMeridian"><i
                                                                                            class="glyphicon glyphicon-chevron-down"></i></a>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="form-group">


                                                                    <div class="input-group">
                                                                        <input type="text"
                                                                            class="form-control timepicker">

                                                                        <div class="input-group-addon">
                                                                            <i class="fa fa-clock-o"></i>
                                                                        </div>
                                                                    </div>
                                                                  
                                                                </div>

                                                            </div>
                                                        </div>
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

                                                                        <input name="group5" type="radio" id="radio_30"
                                                                            class="with-gap radio-col-primary"
                                                                            checked="">
                                                                        <label for="radio_30">Yes </label>
                                                                        <input name="group5" type="radio" id="radio_31"
                                                                            class="with-gap radio-col-primary">
                                                                        <label for="radio_31">No</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>SUNDAY <span
                                                                                class="asterisk">*</span></label>
                                                                    </div>
                                                                    <div class="col-md-6">

                                                                        <input name="group5" type="radio" id="radio_30"
                                                                            class="with-gap radio-col-primary"
                                                                            checked="">
                                                                        <label for="radio_30">Yes </label>
                                                                        <input name="group5" type="radio" id="radio_31"
                                                                            class="with-gap radio-col-primary">
                                                                        <label for="radio_31">No</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>MONDAY <span
                                                                                class="asterisk">*</span></label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <input name="group6" type="radio" id="radio_32"
                                                                            class="with-gap radio-col-primary">
                                                                        <label for="radio_32">Yes </label>
                                                                        <input name="group6" type="radio" id="radio_33"
                                                                            class="with-gap radio-col-primary">
                                                                        <label for="radio_33">No</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>TUESDAY <span
                                                                                class="asterisk">*</span></label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <input name="group7" type="radio" id="radio_34"
                                                                            class="with-gap radio-col-primary">
                                                                        <label for="radio_34">Yes </label>
                                                                        <input name="group7" type="radio" id="radio_35"
                                                                            class="with-gap radio-col-primary">
                                                                        <label for="radio_35">No</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>WEDNESDAY <span
                                                                                class="asterisk">*</span></label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <input name="group6" type="radio" id="radio_36"
                                                                            class="with-gap radio-col-primary">
                                                                        <label for="radio_36">Yes </label>
                                                                        <input name="group6" type="radio" id="radio_36"
                                                                            class="with-gap radio-col-primary">
                                                                        <label for="radio_36">No</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>THURSDAY <span
                                                                                class="asterisk">*</span></label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <input name="group6" type="radio" id="radio_37"
                                                                            class="with-gap radio-col-primary">
                                                                        <label for="radio_37">Yes </label>
                                                                        <input name="group6" type="radio" id="radio_37"
                                                                            class="with-gap radio-col-primary">
                                                                        <label for="radio_37">No</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>FRIDAY <span
                                                                                class="asterisk">*</span></label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <input name="group6" type="radio" id="radio_38"
                                                                            class="with-gap radio-col-primary">
                                                                        <label for="radio_38">Yes </label>
                                                                        <input name="group6" type="radio" id="radio_38"
                                                                            class="with-gap radio-col-primary">
                                                                        <label for="radio_38">No</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>SATURDAY <span
                                                                                class="asterisk">*</span></label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <input name="group6" type="radio" id="radio_39"
                                                                            class="with-gap radio-col-primary">
                                                                        <label for="radio_39">Yes </label>
                                                                        <input name="group6" type="radio" id="radio_39"
                                                                            class="with-gap radio-col-primary">
                                                                        <label for="radio_39">No</label>
                                                                    </div>
                                                                </div>


                                                            </div>
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
                                                                    <label>CURRENCY <span
                                                                            class="asterisk">*</span></label>
                                                                    <select class="form-control select2"
                                                                        style="width: 100%;">
                                                                        <option selected="selected"> CURRENCY</option>
                                                                        <option>Alaska</option>
                                                                        <option>California</option>
                                                                        <option>Delaware</option>
                                                                        <option>Tennessee</option>
                                                                        <option>Texas</option>
                                                                        <option>Washington</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-lg-6">

                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-12">
                                            <img class="plus-icon" style="display: block;" src="add_icon.png">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">

                        </div>
                    </div> -->



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
                                             <textarea class="form-control" id="activity_inclusions" name="activity_inclusions">{{$get_activity->activity_inclusions}}</textarea>
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
                                            <textarea class="form-control" id="activity_exclusions" name="activity_exclusions">{{$get_activity->activity_exclusions}}</textarea>
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
                                           <textarea class="form-control" id="activity_cancellation" name="activity_cancellation">{{$get_activity->activity_cancel_policy}}</textarea>
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
                                            <textarea class="form-control" id="activity_terms_conditions" name="activity_terms_conditions">{{$get_activity->activity_terms_conditions}}</textarea>
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
                     <div id="previewImg_new" class="row">
                        @php
                        $get_activity_images=unserialize($get_activity->activity_images);
                        for($images=0;$images< count($get_activity_images);$images++)
                        {
                           @endphp


                           <div class='col-md-3 already_images' id="already_images{{($images+1)}}">
                             <span class="pull-right remove_already_images" title="Delete Image" id="remove_already_images{{($images+1)}}" style="cursor:pointer"> X </span>
                            <input type="hidden" name="upload_ativity_already_images[]" value="{{$get_activity_images[$images]}}">
                            <img class='upload_ativity_images_preview' src='{{ asset("assets/uploads/activities_images") }}/{{$get_activity_images[$images]}}' width=150 height=150 class="img img-thumbnail" />

                        </div>
                           @php
                        }
                        @endphp
                        </div>
                         <div id="previewImg" class="row">
                        </div>





                </div>







                <div class="row mb-10">
                    <div class="col-md-12">
                        <div class="box-header with-border"
                            style="padding: 10px;border-bottom:none;border-radius:0;border-top:1px solid #c3c3c3">
                            <input type="hidden" name="activity_id" value="@php echo urlencode(base64_encode(base64_encode($get_activity->activity_id))) @endphp">
                            <button type="button" id="update_activity" class="btn btn-rounded btn-primary mr-10">Update</button>
                            <button type="button" id="discard_activity" class="btn btn-rounded btn-primary">Discard</button>
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
</div>
   @include('supplier.includes.footer')

        @include('supplier.includes.bottom-footer')
<script>

$(document).ready(function()
{
    CKEDITOR.replace('activity_exclusions');
    CKEDITOR.replace('activity_inclusions');
    CKEDITOR.replace('activity_cancellation');
    CKEDITOR.replace('activity_terms_conditions');
    $('.select2').select2();
    var date = new Date();
    date.setDate(date.getDate());
    $('#period_operation_from').datepicker({
        autoclose:true,
        todayHighlight: true,
        format: 'yyyy-mm-dd',
        startDate:date
    }).on('changeDate', function (e) {
        var date_from = $("#period_operation_from").datepicker("getDate");
        var date_to = $("#period_operation_to").datepicker("getDate");

        if(!date_to)
        {
            $('#period_operation_to').datepicker("setDate",date_from);
        }
        else if(date_to<date_from)
        {
            $('#period_operation_to').datepicker("setDate",date_from);
        }
    });

    $('#period_operation_to').datepicker({
        autoclose:true,
        todayHighlight: true,
        format: 'yyyy-mm-dd',
        startDate:date
    }).on('changeDate', function (e) {
        var date_from = $("#period_operation_from").datepicker("getDate");
        var date_to = $("#period_operation_to").datepicker("getDate");

        if(!date_from)
        {
            $('#period_operation_from').datepicker("setDate",date_to);
        }
        else if(date_to<date_from)
        {
            $('#period_operation_from').datepicker("setDate",date_to);
        }
    });

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
    
    $('#blackout_days').datepicker({
     multidate: true,
     todayHighlight: true,
     format: 'yyyy-mm-dd',
     startDate:date
 });
    $('.timepicker').timepicker({
        showInputs: false,
        interval: 5,
        timeFormat: 'HH:mm:ss',
    });

});
    
</script>
<script>
    $(document).on("click",".remove_already_images",function()
    {
        var image=this.id;
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this image !",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function(isConfirm) {
            if (isConfirm) {
              $("#"+image).parent().remove();
              swal("Deleted!", "Selected image has been deleted.", "success");
          } else {
            swal("Cancelled", "Your image is safe :)", "error");
        }
    });
    });
</script>
<script>
    $(document).on("click",".add_more_transport",function()
    {
        var clone_transport = $("#transport_div1").clone();
        var minus_url = "{!! asset('assets/images/minus_icon.png') !!}";
        var newer_id = $(".transport_div:last").attr("id");
        new_id = newer_id.split('transport_div');

        new_id = parseInt(new_id[1]) + 1;
        clone_transport.find("select[name='activity_transport_currency[]']").attr("id", "activity_transport_currency" + new_id)
        .val(0);
        clone_transport.find("select[name='activity_transport_currency[]']").parent().parent().parent().parent().attr("id",
            "transport_div" + new_id);
        clone_transport.find("textarea[name='activity_transport_desc[]']").attr("id", "activity_transport_desc" + new_id).val("");
        clone_transport.find("input[name='activity_transport_cost[]']").attr("id", "activity_transport_cost" + new_id).val("");
        clone_transport.find(".add_more_transport").attr("src", minus_url);
        clone_transport.find(".add_more_transport").attr("id", "remove_more_transport" + new_id);
        clone_transport.find(".add_more_transport").removeClass('plus-icon add_more_transport').addClass(
            'minus-icon remove_more_transport');
        $(".transport_div:last").after(clone_transport);
    });
    $(document).on("click",".add_more_markup",function()
    {
        var clone_transport = $("#markup_div1").clone();
        var minus_url = "{!! asset('assets/images/minus_icon.png') !!}";
        var newer_id = $(".markup_div:last").attr("id");
        new_id = newer_id.split('markup_div');

        new_id = parseInt(new_id[1]) + 1;
        clone_transport.find("select[name='activity_nationality[]']").attr("id", "activity_nationality" + new_id)
        .val(0);
        clone_transport.find("select[name='activity_nationality[]']").parent().parent().parent().parent().attr("id",
            "markup_div" + new_id);
        clone_transport.find("select[name='activity_markup[]']").attr("id", "activity_markup" + new_id).val("0");
        clone_transport.find("input[name='activity_amount[]']").attr("id", "activity_amount" + new_id).val("");
        clone_transport.find(".add_more_markup").attr("src", minus_url);
        clone_transport.find(".add_more_markup").attr("id", "remove_more_markup" + new_id);
        clone_transport.find(".add_more_markup").removeClass('plus-icon add_more_markup').addClass(
            'minus-icon remove_more_markup');
        $(".markup_div:last").after(clone_transport);
    });

    $(document).on("click", ".remove_more_transport", function () {
        var id = this.id;
        var split_id = id.split('remove_more_transport');
        $("#transport_div" + split_id[1]).remove();
    });
    $(document).on("click", ".remove_more_markup", function () {
        var id = this.id;
        var split_id = id.split('remove_more_markup');
        $("#markup_div" + split_id[1]).remove();
    });

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
                    $("#activity_country").html(response);
                    $('#activity_country').select2();
                    $("#activity_country").prop("disabled",false);

                     $("#activity_city").html("");

                }
            });
        }
    });

    $(document).on("change","#activity_country",function()
    {
         if($("#activity_country").val()!="0")
        {
            var country_id=$(this).val();
            $.ajax({
                url:"{{route('search-country-cities')}}",
                type:"GET",
                data:{"country_id":country_id},
                success:function(response)
                {
                   
                    $("#activity_city").html(response);
                    $('#activity_city').select2();
                      $("#acitvity_city_div").show();
                   

                }
            });
        }

    });
</script>
<script>
    $(document).on("click","#update_activity",function()
    {
        var activity_name=$("#activity_name").val();
        var supplier_name=$("#supplier_name").val();
        var activity_location=$("#activity_location").val();
        var activity_country=$("#activity_country").val();
        var activity_city=$("#activity_city").val();
        var period_operation_from=$("#period_operation_from").val();
        var period_operation_to=$("#period_operation_to").val();
        var validity_operation_from=$("#validity_operation_from").val();
        var validity_operation_to=$("#validity_operation_to").val();
        var activity_time_from=$("#activity_time_from").val();
        var activity_time_to=$("#activity_time_to").val();
        var is_all_days = $("input[name='is_all_days']:checked").val();
        var week_monday = $("input[name='week_monday']:checked").val();
        var week_tuesday = $("input[name='week_tuesday']:checked").val();
        var week_wednesday = $("input[name='week_wednesday']:checked").val();
        var week_thursday = $("input[name='week_thursday']:checked").val();
        var week_friday = $("input[name='week_friday']:checked").val();
        var week_saturday = $("input[name='week_saturday']:checked").val();
        var week_sunday = $("input[name='week_sunday']:checked").val();
        var activity_currency=$("#activity_currency").val();
        var activity_adult_cost=$("#activity_adult_cost").val();
        var activity_child_cost=$("#activity_child_cost").val();
           var for_all_ages = $("input[name='for_all_ages']:checked").val();
        var child_allowed = $("input[name='child_allowed']:checked").val();
        var child_age = $("#child_age").val();
        var adult_allowed = $("input[name='adult_allowed']:checked").val();
        var adult_age = $("#adult_age").val();
        var activity_inclusions= CKEDITOR.instances.activity_inclusions.getData();
        var activity_exclusions=CKEDITOR.instances.activity_exclusions.getData();
        var activity_cancellation=CKEDITOR.instances.activity_cancellation.getData();
        var activity_terms_conditions=CKEDITOR.instances.activity_terms_conditions.getData();




        if (activity_name.trim() == "")
        {
            $("#activity_name").css("border", "1px solid #cf3c63");

        } else

        {
            $("#activity_name").css("border", "1px solid #9e9e9e");
        }

       
       if (activity_location.trim() == "")
       {
         $("#activity_location").css("border", "1px solid #cf3c63");

     } else

     {
      $("#activity_location").css("border", "1px solid #9e9e9e");
  }
  if (activity_country == "0")
  {
    $("#activity_country").parent().find(".select2-selection").css("border", "1px solid #cf3c63");

} else

{
   $("#activity_country").parent().find(".select2-selection").css("border", "1px solid #9e9e9e");
}
if (activity_city == "0")
{
    $("#activity_city").parent().find(".select2-selection").css("border", "1px solid #cf3c63");

} else

{
   $("#activity_city").parent().find(".select2-selection").css("border", "1px solid #9e9e9e");
}
if (period_operation_from.trim() == "")
{
    $("#period_operation_from").css("border", "1px solid #cf3c63");

} else

{
    $("#period_operation_from").css("border", "1px solid #9e9e9e");
}
if (period_operation_to.trim() == "")
{
    $("#period_operation_to").css("border", "1px solid #cf3c63");

} else

{
    $("#period_operation_to").css("border", "1px solid #9e9e9e");
}
if (validity_operation_from.trim() == "")
{
    $("#validity_operation_from").css("border", "1px solid #cf3c63");

} else

{
    $("#validity_operation_from").css("border", "1px solid #9e9e9e");
}
if (validity_operation_to.trim() == "")
{
    $("#validity_operation_to").css("border", "1px solid #cf3c63");

} else

{
    $("#validity_operation_to").css("border", "1px solid #9e9e9e");
}
if (activity_time_from.trim() == "")
{
    $("#activity_time_from").css("border", "1px solid #cf3c63");

} else

{
    $("#activity_time_from").css("border", "1px solid #9e9e9e");
}
if (activity_time_to.trim() == "")
{
    $("#activity_time_to").css("border", "1px solid #cf3c63");

} else

{
    $("#activity_time_to").css("border", "1px solid #9e9e9e");
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
if (activity_currency == "0")
{
    $("#activity_currency").parent().find(".select2-selection").css("border", "1px solid #cf3c63");

} else

{
   $("#activity_currency").parent().find(".select2-selection").css("border", "1px solid #9e9e9e");
}
if (activity_adult_cost.trim() == "")
{
    $("#activity_adult_cost").css("border", "1px solid #cf3c63");

} else

{
    $("#activity_adult_cost").css("border", "1px solid #9e9e9e");
}
if (activity_child_cost.trim() == "")
{
    $("#activity_child_cost").css("border", "1px solid #cf3c63");

} else

{
    $("#activity_child_cost").css("border", "1px solid #9e9e9e");
}
if (!for_all_ages) {
    $("input[name='for_all_ages']").parent().css("border", "1px solid #cf3c63");
} else {
    $("input[name='for_all_ages']").parent().css("border", "1px solid white");
}

if (for_all_ages=="No" && !child_allowed) {
    $("input[name='child_allowed']").parent().css("border", "1px solid #cf3c63");
} else {
    $("input[name='child_allowed']").parent().css("border", "1px solid white");
}
if (for_all_ages=="No" && !adult_allowed) {
    $("input[name='adult_allowed']").parent().css("border", "1px solid #cf3c63");
} else {
    $("input[name='adult_allowed']").parent().css("border", "1px solid white");
}

if (for_all_ages=="No" && child_allowed=="Yes" && child_age.trim()=="") {
    $("input[name='child_age']").css("border", "1px solid #cf3c63");
} else {
    $("input[name='child_age']").css("border", "1px solid #9e9e9e");
}

if (for_all_ages=="No" && child_allowed=="Yes" && adult_age.trim()=="") {
    $("input[name='adult_age']").css("border", "1px solid #cf3c63");
} else {
    $("input[name='adult_age']").css("border", "1px solid #9e9e9e");
}

var activity_nationality = 1;
var activity_nationality_error = 0;
// $("select[name='activity_nationality[]']").each(function () {

//     if ($(this).val() == "0") {
//         $("#activity_nationality" + activity_nationality).parent().find(".select2-selection").css("border", "1px solid #cf3c63");
//         $("#activity_nationality" + activity_nationality).parent().find(".select2-selection").focus();
//         activity_nationality_error++;
//     } else {
//         $("#activity_nationality" + activity_nationality).parent().find(".select2-selection").css("border", "1px solid #9e9e9e");
//     }
//     activity_nationality++;

// });

var activity_markup = 1;
var activity_markup_error = 0;
// $("select[name='activity_markup[]']").each(function () {

//     if ($(this).val()== "0") {
//         $("#activity_markup" + activity_markup).css("border", "1px solid #cf3c63");
//         $("#activity_markup" + activity_markup).focus();
//         activity_markup_error++;
//     } else {
//         $("#activity_markup" + activity_markup).css("border", "1px solid #9e9e9e");
//     }
//     activity_markup++;

// });

var activity_markup_amt = 1;
var activity_markup_amt_error = 0;
// $("input[name='activity_amount[]']").each(function () {



//     if ($(this).val().trim() == "") {
//         $("#activity_amount" + activity_markup_amt).css("border", "1px solid #cf3c63");
//         $("#activity_amount" + activity_markup_amt).focus();
//         activity_markup_amt_error++;
//     } else {
//         $("#activity_amount" + activity_markup_amt).css("border", "1px solid #9e9e9e");
//     }
//     activity_markup_amt++;

// });
// var activity_transport_currency = 1;
// var activity_transport_currency_error = 0;
// $("select[name='activity_transport_currency[]']").each(function () {

//     if ($(this).val() == "0") {
//         $("#activity_transport_currency" + activity_transport_currency).parent().find(".select2-selection").css("border", "1px solid #cf3c63");
//         $("#activity_transport_currency" + activity_transport_currency).parent().find(".select2-selection").focus();
//         activity_transport_currency_error++;
//     } else {
//         $("#activity_transport_currency" + activity_transport_currency).parent().find(".select2-selection").css("border", "1px solid #9e9e9e");
//     }
//     activity_transport_currency++;

// });

// var activity_transport_desc = 1;
// var activity_transport_desc_error = 0;
// $("textarea[name='activity_transport_desc[]']").each(function () {



//     if ($(this).val().trim() == "") {
//         $("#activity_transport_desc" + activity_transport_desc).css("border", "1px solid #cf3c63");
//         $("#activity_transport_desc" + activity_transport_desc).focus();
//         activity_transport_desc_error++;
//     } else {
//         $("#activity_transport_desc" + activity_transport_desc).css("border", "1px solid #9e9e9e");
//     }
//     activity_transport_desc++;

// });

// var activity_transport_cost = 1;
// var activity_transport_cost_error = 0;
// $("input[name='activity_transport_cost[]']").each(function () {
//     if ($(this).val().trim() == "") {
//         $("#activity_transport_cost" + activity_transport_cost).css("border", "1px solid #cf3c63");
//         $("#activity_transport_cost" + activity_transport_cost).focus();
//         activity_transport_cost_error++;
//     } else {
//         $("#activity_transport_cost" + activity_transport_cost).css("border", "1px solid #9e9e9e");
//     }
//     activity_transport_cost++;

// });

if (activity_inclusions.trim() == "")
{
    $("#cke_activity_inclusions").css("border", "1px solid #cf3c63");

} else

{
    $("#cke_activity_inclusions").css("border", "1px solid #9e9e9e");
}
if (activity_exclusions.trim() == "")
{
    $("#cke_activity_exclusions").css("border", "1px solid #cf3c63");

} else

{
    $("#cke_activity_exclusions").css("border", "1px solid #9e9e9e");
}
if (activity_cancellation.trim() == "")
{
    $("#cke_activity_cancellation").css("border", "1px solid #cf3c63");

} else

{
    $("#cke_activity_cancellation").css("border", "1px solid #9e9e9e");
}
if (activity_terms_conditions.trim() == "")
{
    $("#cke_activity_terms_conditions").css("border", "1px solid #cf3c63");

} else

{
    $("#cke_activity_terms_conditions").css("border", "1px solid #9e9e9e");
}






if(activity_name.trim() == "")
{
    $("#activity_name").focus();
}
else if(supplier_name=="0")
{
  $("#supplier_name").parent().find(".select2-selection").focus();  
} 
else if(activity_location.trim()=="")
{
  $("#activity_location").focus();  
}
else if(activity_country=="0")
{
  $("#activity_country").parent().find(".select2-selection").focus();  
} 
else if(activity_city=="0")
{
  $("#activity_city").parent().find(".select2-selection").focus();  
}
else if(period_operation_from.trim()=="")
{
  $("#period_operation_from").focus();  
}
else if(period_operation_to.trim()=="")
{
  $("#period_operation_to").focus();  
}
else if(validity_operation_from.trim()=="")
{
  $("#validity_operation_from").focus();  
}
else if(validity_operation_to.trim()=="")
{
  $("#validity_operation_to").focus();  
}
else if(activity_time_from.trim()=="")
{
  $("#activity_time_to").focus();  
}
else if(activity_time_from.trim()=="")
{
  $("#activity_time_to").focus();  
} 
else if (!is_all_days) {
    $("input[name='is_all_days']").focus();
} 
else if (!week_monday) {
    $("input[name='week_monday']").focus();
} 
else if (!week_tuesday) {
    $("input[name='week_tuesday']").focus();
} 
else if (!week_wednesday) {
    $("input[name='week_wednesday']").focus();
} 
else if (!week_thursday) {
    $("input[name='week_thursday']").focus();
}
else if (!week_friday) {
    $("input[name='week_friday']").focus();
} 
else if (!week_saturday) {
    $("input[name='week_saturday']").focus();
} 
else if (!week_sunday) {
    $("input[name='week_sunday']").focus();
}
else if(activity_currency=="0")
{
  $("#activity_currency").parent().find(".select2-selection").focus();  
} 
else if(activity_adult_cost.trim()=="")
{
  $("#activity_adult_cost").focus();  
}
else if(activity_child_cost.trim()=="")
{
  $("#activity_child_cost").focus();  
}
else if (!for_all_ages) {
    $("input[name='for_all_ages']").focus();
}
else if (for_all_ages=="No" && !child_allowed) {
    $("input[name='child_allowed']").focus();
}
else if (for_all_ages=="No" && !adult_allowed) {
    $("input[name='adult_allowed']").focus();
}  
else if (for_all_ages=="No" && child_allowed=="Yes" && child_age.trim()=="") {
    $("input[name='child_age']").focus();
} 
else if (for_all_ages=="No" && adult_allowed=="Yes" && adult_age.trim()=="") {
    $("input[name='adult_age']").focus();
} 
// else if(activity_nationality_error>0)
// {
// }
// else if(activity_markup_error>0)
// {
// }
// else if(activity_markup_amt_error>0)
// {
// }
// else if(activity_transport_currency_error>0)
// {
// }
// else if(activity_transport_cost_error>0)
// {
// }
// else if(activity_transport_desc_error>0)
// {
// }
else if(activity_inclusions.trim()=="")
{
  $("#cke_activity_inclusions").focus();  
}
else if(activity_exclusions.trim()=="")
{
  $("#cke_activity_exclusions").focus();  
}
else if(activity_cancellation.trim()=="")
{
  $("#cke_activity_cancellation").focus();  
}
else if(activity_terms_conditions.trim()=="")
{
  $("#cke_activity_terms_conditions").focus();  
}

else
{
    $("#update_activity").prop("disabled", true);
    var formdata=new FormData($("#activity_form")[0]);

    formdata.append("activity_inclusions",activity_inclusions);
    formdata.append("activity_exclusions",activity_exclusions);
    formdata.append("activity_cancellation",activity_cancellation);
    formdata.append("activity_terms_conditions",activity_terms_conditions);
    $.ajax({
        url:"{{route('update-activity')}}",
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
                    "Activity already exists");

            } else if (response.indexOf("success") != -1)

            {

                swal({
                    title: "Success",
                    text: "Activity Updated Successfully !",
                    type: "success"
                },

                function () {

                    location.reload();

                });

            } else if (response.indexOf("fail") != -1)

            {

                swal("ERROR", "Activity cannot be updated right now! ");

            }
            $("#update_activity").prop("disabled", false);

        }
    });
}
});
    $(document).on("click","#discard_activity",function()
    {
        window.history.back();

    });
       $(document).on("change",".radio_allowed",function()
    {
        var radio_name=$(this).attr("name");

        if(radio_name=="for_all_ages")
        {
                  if($(this).val()=="No")
                  {
                    $("#"+radio_name+"_div").show();
                }
                else
                {
                 $("#"+radio_name+"_div").hide(); 
             }
         }
         else
         {
           if($(this).val()=="Yes")
           {
            $("#"+radio_name+"_div").show();
        }
        else
        {
         $("#"+radio_name+"_div").hide(); 
        } 
        }
        
        });
</script>
</script>
</body>


</html>
