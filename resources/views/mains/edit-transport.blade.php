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
                            <li class="breadcrumb-item active" aria-current="page">Edit Transport
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
          <!--   <div class="right-title">
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

 @if($rights['edit_delete']==1)
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Transport</h4>
                </div>
                <div class="box-body">
                    <form id="transfer_form" encytpe="multipart/form-data">
                        {{csrf_field()}}
                    <div class="row mb-10">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="transfer_name">TRANSFER NAME <span class="asterisk">*</span></label>
                                <input type="text" id="transfer_name" name="transfer_name" class="form-control" placeholder="TRANSFER NAME" value="{{$get_transport->transfer_name}}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">

                        </div>
                    </div>
                    <div class="row mb-10">

                        <div class="col-sm-12 col-md-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="supplier_name">SUPPLIER <span class="asterisk">*</span></label>
                                        <select id="supplier_name" name="supplier_name" class="form-control select2" style="width: 100%;">
                                            <option value="0" hidden>Select Supplier</option>
                                           @foreach($suppliers as $supplier)
                                           @if($get_transport->supplier_id==$supplier->supplier_id)
                                           <option value="{{$supplier->supplier_id}}" selected="selected">{{$supplier->supplier_name}}</option>
                                           @else
                                           <option value="{{$supplier->supplier_id}}">{{$supplier->supplier_name}}</option>
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
                                        <label for="transfer_country">COUNTRY <span class="asterisk">*</span></label>
                                        <select id="transfer_country" name="transfer_country" class="form-control select2" style="width: 100%;">
                                            <option selected="selected" value="0" hidden="hidden">SELECT COUNTRY</option>
                                             @foreach($countries as $country)
                                             @if(in_array($country->country_id,$countries_data))
                                             @if($country->country_id==$get_transport->transfer_country)
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
                                        <label for="transfer_city">CITY <span class="asterisk">*</span></label>
                                        <select id="transfer_city" name="transfer_city" class="form-control select2" style="width: 100%;">
                                            <option selected="selected" value="0" hidden="hidden">SELECT CITY</option>
                                             @foreach($cities as $city)
                                             @if($city->id==$get_transport->transfer_city)
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
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="driver_language">DRIVER LANGUAGE <span class="asterisk">*</span></label>
                                <input type="text" class="form-control" placeholder="DRIVER LANGUAGE" id="driver_language" name="driver_language" value="{{$get_transport->driver_language}}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">

                        </div>
                    </div>
             <!--                   <div class="row mb-10">

                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="period_operation_from">PERIOD OF OPERATION <span class="asterisk">*</span></label>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="input-group date">
                                                <input type="text" placeholder="FROM"
                                                    class="form-control pull-right datepicker" id="period_operation_from" name="period_operation_from">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">

                                            <div class="input-group date">
                                                <input type="text" placeholder="TO"
                                                    class="form-control pull-right datepicker" id="period_operation_to" name="period_operation_to">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                            </div>
                                

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">

                        </div>




                    </div> -->
                    <div class="row mb-10" style="display:none;">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="transfer_arrival_time">ARRIVAL TIME<span class="asterisk">*</span></label>
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
                                            <input type="text" class="form-control timepicker" id="transfer_arrival_time" name="transfer_arrival_time" value="{{$get_transport->transfer_arrival_time}}">

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
                                <label for="transfer_pickup_point">PICK UP POINT <span class="asterisk">*</span></label>
                                <input type="text" class="form-control" placeholder="PICK UP POINT" id="transfer_pickup_point" name="transfer_pickup_point" value="{{$get_transport->transfer_pickup_point}}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">

                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="transfer_drop_point">DROP OFF POINT <span class="asterisk">*</span></label>
                                <input type="text" class="form-control" placeholder="DROP OFF POINT " id="transfer_drop_point" name="transfer_drop_point"value="{{$get_transport->transfer_drop_point}}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">

                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="transfer_meet_point">MEETING POINT <span class="asterisk">*</span></label>
                                <input type="text" class="form-control" placeholder="MEETING POINT" id="transfer_meet_point" name="transfer_meet_point" value="{{$get_transport->transfer_meet_point}}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">

                        </div>
                    </div>

                    <div class="row mb-10">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                                <div class="form-group">
                                       <label for="transfer_description">DESCRIPTION <span class="asterisk">*</span></label>
                                    <textarea class="form-control"
                                        placeholder="DESCRIPTION" id="transfer_description" name="transfer_description">{{$get_transport->transfer_description}}</textarea>
                                </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">

                        </div>
                    </div>
     @php
                        $weekdays=unserialize($get_transport->operating_weekdays);
    
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

                  <!--   <div class="row mb-10">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="transfer_adult_cost">ADULT PRICE <span class="asterisk">*</span></label>
                                <input type="text" class="form-control" placeholder="ADULT PRICE " id="transfer_adult_cost" name="transfer_adult_cost"  onkeypress="javascript:return validateNumber(event)">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">

                        </div>
                    </div> -->
                     <div class="row mb-10">
                        @php
                        $nationality_markup=unserialize($get_transport->nationality_markup_details);

                        for($markup=0;$markup< count($nationality_markup);$markup++)
                        {
                            @endphp
                            <div class="col-sm-12 col-md-12 col-lg-6 markup_div" id="markup_div{{($markup+1)}}">
                                <label>NATIONALITY & TRANSFER MARKUP <span class="asterisk">*</span></label>
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group">

                                            <select class="form-control select2" style="width: 100%;" id="transfer_nationality{{($markup+1)}}" name="transfer_nationality[]">
                                                <option selected="selected" value="0" hidden>SELECT NATIONALITY</option>
                                                @foreach($countries as $country)
                                                 @if($nationality_markup[$markup]['transfer_nationality']==$country->country_id)
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
                                            <select class="form-control" id="transfer_markup{{($markup+1)}}" name="transfer_markup[]">
                                                <option value="0">SELECT MARKUP TYPE</option>
                                                <option  @if($nationality_markup[$markup]['transfer_markup']=="Markup Percentage") selected @endif>Markup Percentage</option>
                                                <option @if($nationality_markup[$markup]['transfer_markup']=="Markup Amount") selected @endif>Markup Amount</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Markup Amount" id="transfer_amount{{($markup+1)}}" name="transfer_amount[]" onkeypress="javascript:return validateNumber(event)" value="{{$nationality_markup[$markup]['transfer_amount']}}">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-12 col-md-12 add_more_markup_div">
                                    @if(count($nationality_markup)==1)
                                   <img id="add_more_markup{{($markup+1)}}" class="plus-icon add_more_markup"  src="{{ asset('assets/images/add_icon.png') }}">
                                   @endif

                                   @if($markup>0)
                                   @if($markup==count($nationality_markup)-1)
                                   <img id="remove_more_markup{{($markup+1)}}" class="minus-icon remove_more_markup"  src="{{ asset('assets/images/minus_icon.png') }}">
                                   <img id="add_more_markup{{($markup+1)}}" class="plus-icon add_more_markup"  src="{{ asset('assets/images/add_icon.png') }}">
                                   @else
                                   <img id="remove_more_markup{{($markup+1)}}" class="minus-icon remove_more_markup"  src="{{ asset('assets/images/minus_icon.png') }}">
                                   @endif
                                   @endif
                                </div>
                            </div>
                            @php
                        }
                        @endphp
                    </div>




                    <div class="row mb-10">
                          @php
                        $transfer_transport=unserialize($get_transport->transfer_transport_tariff);

                        for($transport=0;$transport< count($transfer_transport);$transport++)
                        {
                            @endphp
                        <div class="col-sm-12 col-md-12 col-lg-6 transport_div" id="transport_div{{($transport+1)}}">
                            <label for="transfer_transport_currency1">
                                TRANSPORT TARIFF <span class="asterisk">*</span></label>
                            <div class="row">
                               <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="validity_from">VALIDITY<span class="asterisk">*</span></label>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="input-group date">
                                                    <input type="text" placeholder="FROM"
                                                    class="form-control pull-right datepicker transfer_validity_from" id="transfer_validity_from{{($transport+1)}}" name="transfer_validity_from[]" value="{{$transfer_transport[$transport]['transfer_validity_from']}}">
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
                                                    class="form-control pull-right datepicker transfer_validity_to" id="transfer_validity_to{{($transport+1)}}" name="transfer_validity_to[]" value="{{$transfer_transport[$transport]['transfer_validity_to']}}">
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
                                      <select id="transfer_vehicle_type{{($transport+1)}}" name="transfer_vehicle_type[]" class="form-control">
                                        <option value="0" hidden>SELECT VEHICLE TYPE</option>

                                        @foreach($vehicle_type as $types)
                                         @if($transfer_transport[$transport]['transfer_vehicle_type']==$types->vehicle_type_id)
                                         <option value="{{$types->vehicle_type_id}}" selected="selected">{{$types->vehicle_type_name}}</option>
                                         @else
                                         <option value="{{$types->vehicle_type_id}}">{{$types->vehicle_type_name}}</option>
                                         @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                               <div class="col-md-12">
                                <div class="form-group">

                                    <input type="text" class="form-control" placeholder="VEHICLE"  id="transfer_vehicle{{($transport+1)}}" name="transfer_vehicle[]" value="{{$transfer_transport[$transport]['transfer_vehicle']}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">

                                    <input type="text" class="form-control" placeholder="CAR MODEL"  id="transfer_car_model{{($transport+1)}}" name="transfer_car_model[]" @if(!empty($transfer_transport[$transport]['transfer_car_model'])) value="{{$transfer_transport[$transport]['transfer_car_model']}}" @else value='' @endif>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                <select id="transfer_manufacture_year{{($transport+1)}}" name="transfer_manufacture_year[]" class="form-control">
                                        <option value="0" hidden>SELECT MANUFACTURING YEAR</option>
                                        @php
                                        $year=date("Y");
                                        
                                        for($i=$year;$i>=1990;$i--)
                                        {
                                        if($transfer_transport[$transport]['transfer_manufacture_year']==$i)
                                        {
                                       
                                         echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                      
                                        }
                                        else
                                        {
                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                        }
                                        
                                        }
                                        @endphp
                                        
                                    </select>
                                </div>
                            </div>
                              <div class="col-md-12">
                                <div class="form-group">

                                    <input type="text" class="form-control" placeholder="TRANSFER DURATION"  id="transfer_duration{{($transport+1)}}" name="transfer_duration[]" @if(!empty($transfer_transport[$transport]['transfer_duration'])) value="{{$transfer_transport[$transport]['transfer_duration']}}" @else value='' @endif>
                                </div>
                            </div>

                             <div class="col-md-12">
                                <div class="form-group">

                                    <input type="text" class="form-control" placeholder="MAX PASSENGERS"  id="transfer_max_passengers{{($transport+1)}}" name="transfer_max_passengers[]"  value="{{$transfer_transport[$transport]['transfer_max_passengers']}}">
                                </div>
                            </div>
                             <div class="col-md-12" style="display: none;">
                                <div class="form-group">

                                    <input type="text" class="form-control" placeholder="TOTAL VEHICLE"  id="transfer_total_vehicles{{($transport+1)}}" name="transfer_total_vehicles[]" value="{{$transfer_transport[$transport]['transfer_total_vehicles']}}">
                                </div>
                            </div>
                                <div class="col-md-12">

                                    <div class="form-group">

                                        <select class="form-control" style="width: 100%;" id="transfer_transport_currency{{($transport+1)}}" name="transfer_transport_currency[]">
                                            <option selected="selected" value="0" hidden>SELECT CURRENCY</option>
                                            @foreach($currency as $curr)
                                             @if($transfer_transport[$transport]['transfer_transport_currency']==$curr->code)
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

                                        <input type="text" class="form-control" placeholder="VEHICLE COST" id="transfer_vehicle_cost{{($transport+1)}}" name="transfer_vehicle_cost[]" onkeypress="javascript:return validateNumber(event)"  value="{{$transfer_transport[$transport]['transfer_vehicle_cost']}}">
                                    </div>
                                </div>
                                  <div class="col-md-12">
                                    <div class="form-group">

                                        <input type="text" class="form-control" placeholder="PARKING FEES" id="transfer_parking_cost{{($transport+1)}}" name="transfer_parking_cost[]" onkeypress="javascript:return validateNumber(event)" value="{{$transfer_transport[$transport]['transfer_parking_cost']}}">
                                    </div>
                                </div>
                                  <div class="col-md-12">
                                    <div class="form-group">

                                        <input type="text" class="form-control" placeholder="MIN DRIVER TIP" id="transfer_driver_tip{{($transport+1)}}" name="transfer_driver_tip[]" onkeypress="javascript:return validateNumber(event)" value="{{$transfer_transport[$transport]['transfer_driver_tip']}}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <input type="text" class="form-control" placeholder="REPETITON DISCOUNT COST  " id="transfer_recep_disc{{($transport+1)}}" name="transfer_recep_disc[]" onkeypress="javascript:return validateNumber(event)" value="{{$transfer_transport[$transport]['transfer_recep_disc']}}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <input type="text" class="form-control" placeholder="GUIDE COST" id="transfer_guide_cost{{($transport+1)}}" name="transfer_guide_cost[]" onkeypress="javascript:return validateNumber(event)" value="{{$transfer_transport[$transport]['transfer_guide_cost']}}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <input type="text" class="form-control" placeholder="TOURIST ATTRACTION COST" id="transfer_attraction_cost{{($transport+1)}}" name="transfer_attraction_cost[]" onkeypress="javascript:return validateNumber(event)" value="{{$transfer_transport[$transport]['transfer_attraction_cost']}}">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="img_group">
                                        <label>IMAGES</label>
                                        <div class="box1">
                                            <input type="hidden" value="{{($transport+1)}}" name="upload_ativity_images_index[]">
                                            <input class="hide upload_ativity_images" type="file" id="upload_ativity_images{{($transport+1)}}"
                                            accept="image/png,image/jpg,image/jpeg"
                                            name="upload_ativity_images{{($transport+1)}}[]" multiple="multiple" onchange="return handleFileSelectTransport(event,'previewImg{{($transport+1)}}')">

                                            <button type="button"
                                            onclick="document.getElementById('upload_ativity_images{{($transport+1)}}').click()"
                                            id="upload_0" class="btn red btn-outline btn-circle plus_image_btn">+

                                        </button>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <div id="previewImg_new{{($transport+1)}}" class="row previewImg_new">
                                @php
                                $get_transfer_images=$transfer_transport[$transport]['transfer_images'];
                                for($images=0;$images< count($get_transfer_images);$images++)
                                {
                                 @endphp


                                 <div class='col-md-6 already_images' id="already_images{{($images+1)}}">
                                  
                                   <input type="hidden" name="upload_ativity_already_images{{($transport+1)}}[]" value="{{$get_transfer_images[$images]}}">
                                   <img class='upload_ativity_images_preview' src='{{ asset("assets/uploads/transport_images") }}/{{$get_transfer_images[$images]}}' width=150 height=150 class="img img-thumbnail" />
                                    <span class="remove_already_images" title="Delete Image" id="remove_already_images{{($images+1)}}" style="cursor:pointer"> X </span>

                               </div>
                               @php
                           }
                           @endphp
                       </div>
                            <div id="previewImg{{($transport+1)}}" class="row previewImg">
                            </div>


                            </div>
                            <div class="col-sm-12 col-md-12 add_more_transport_div">
                                    @if(count($transfer_transport)==1)
                                   <img id="add_more_transport{{($transport+1)}}" class="plus-icon add_more_transport"  src="{{ asset('assets/images/add_icon.png') }}">
                                   @endif

                                   @if($transport>0)
                                   @if($transport==count($transfer_transport)-1)
                                   <img id="remove_more_transport{{($transport+1)}}" class="minus-icon remove_more_transport"  src="{{ asset('assets/images/minus_icon.png') }}">
                                   <img id="add_more_transport{{($transport+1)}}" class="plus-icon add_more_transport"  src="{{ asset('assets/images/add_icon.png') }}">
                                   @else
                                   <img id="remove_more_transport{{($transport+1)}}" class="minus-icon remove_more_transport"  src="{{ asset('assets/images/minus_icon.png') }}">
                                   @endif
                                   @endif
                            </div>

                        </div>
                          @php
                        }
                        @endphp
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
                                                        <input type="text" placeholder="BLACKOUT DATES" class="form-control pull-right datepicker" id="blackout_days" name="blackout_days" value="{{$get_transport->transfer_blackout_dates}}">
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
                                             <textarea class="form-control" id="transfer_inclusions" name="transfer_inclusions">{{$get_transport->transfer_inclusions}}</textarea>
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
                                            <textarea class="form-control" id="transfer_exclusions" name="transfer_exclusions">{{$get_transport->transfer_exclusions}}</textarea>
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
                                           <textarea class="form-control" id="transfer_cancellation" name="transfer_cancellation">{{$get_transport->transfer_cancel_policy}}</textarea>
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
                                            <textarea class="form-control" id="transfer_terms_conditions" name="transfer_terms_conditions">{{$get_transport->transfer_terms_conditions}}</textarea>
                                        </div>
                                    </div>
                                </div>





                            </div>
                        </div>
                    </div>
<!-- 
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
                       
                        </div>

                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6">

                    </div>
                     <div id="previewImg_new" class="row">
                        @php
                        $get_transfer_images=unserialize($get_transport->transfer_images);
                        for($images=0;$images< count($get_transfer_images);$images++)
                        {
                           @endphp


                           <div class='col-md-3 already_images' id="already_images{{($images+1)}}">
                             <span class="pull-right remove_already_images" title="Delete Image" id="remove_already_images{{($images+1)}}" style="cursor:pointer"> X </span>
                            <input type="hidden" name="upload_ativity_already_images[]" value="{{$get_transfer_images[$images]}}">
                            <img class='upload_ativity_images_preview' src='{{ asset("assets/uploads/transport_images") }}/{{$get_transfer_images[$images]}}' width=150 height=150 class="img img-thumbnail" />

                        </div>
                           @php
                        }
                        @endphp
                        </div>
                     <div id="previewImg" class="row">
                        </div> -->





                </div>







                <div class="row mb-10">
                    <div class="col-md-12">
                        <div class="box-header with-border"
                            style="padding: 10px;border-bottom:none;border-radius:0;border-top:1px solid #c3c3c3">
                            <input type="hidden" name="transport_id" value="@php echo urlencode(base64_encode(base64_encode($get_transport->transport_id))) @endphp">
                            <button type="button" id="update_transfer" class="btn btn-rounded btn-primary mr-10">Update</button>
                            <button type="button" id="discard_transfer" class="btn btn-rounded btn-primary">Discard</button>
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
<script>
    function dateshow()
    {
     var date = new Date();
    date.setDate(date.getDate());

    $('.transfer_validity_from').datepicker({
        autoclose:true,
        todayHighlight: true,
        format: 'yyyy-mm-dd',
        startDate:date
    });

    $('.transfer_validity_from').on('change', function () {
        var date_from_id=this.id;
        var date_id=date_from_id.split("transfer_validity_from");

        var date_from = $("#transfer_validity_from"+date_id[1]).datepicker("getDate");
        var date_to = $("#transfer_validity_to"+date_id[1]).datepicker("getDate");

        if(!date_to)
        {
            $("#transfer_validity_to"+date_id[1]).datepicker("setDate",date_from);
        }

        else if(date_to.getTime()<date_from.getTime())
        {
            $("#transfer_validity_to"+date_id[1]).datepicker("setDate",date_from);
        }

    });

    $('.transfer_validity_to').datepicker({
        autoclose:true,
        todayHighlight: true,
        format: 'yyyy-mm-dd',
        startDate:date
    });
    $('.transfer_validity_to').on('change', function () { 
      var date_to_id=this.id;
       var date_id=date_to_id.split("transfer_validity_to");
      var date_from = $("#transfer_validity_from"+date_id[1]).datepicker("getDate");
      var date_to = $("#transfer_validity_to"+date_id[1]).datepicker("getDate");

      if(!date_from)
      {
        $("#transfer_validity_from"+date_id[1]).datepicker("setDate",date_to);
    }
    else if(date_to.getTime()<date_from.getTime())
    {
        $("#transfer_validity_from"+date_id[1]).datepicker("setDate",date_to);
    }
});
}

$(document).ready(function()
{
    // document.getElementById('upload_ativity_images').addEventListener('change', handleFileSelect, false);
    CKEDITOR.replace('transfer_exclusions');
    CKEDITOR.replace('transfer_inclusions');
    CKEDITOR.replace('transfer_cancellation');
    CKEDITOR.replace('transfer_terms_conditions');
    $('.select2').select2();

       var date = new Date();
    date.setDate(date.getDate());
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

    dateshow();

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
        var clone_transport = $(".transport_div:last").clone();
         var add_url= "{!! asset('assets/images/add_icon.png') !!}";
        var minus_url = "{!! asset('assets/images/minus_icon.png') !!}";
        var newer_id = $(".transport_div:last").attr("id");
        new_id = newer_id.split('transport_div');
        old_id = parseInt(new_id[1]);
        new_id = parseInt(new_id[1]) + 1;
        clone_transport.find("select[name='transfer_transport_currency[]']").attr("id", "transfer_transport_currency" + new_id)
        .val(0);
         clone_transport.find("select[name='transfer_transport_currency[]']").select2();
           clone_transport.find(".select2-container").slice(1).remove();
        clone_transport.find("select[name='transfer_transport_currency[]']").parent().parent().parent().parent().attr("id",
            "transport_div" + new_id);
        clone_transport.find("select[name='transfer_vehicle_type[]']").attr("id", "transfer_vehicle_type" + new_id).val("0");
        clone_transport.find("input[name='transfer_validity_from[]']").attr("id", "transfer_validity_from" + new_id).val("");
        clone_transport.find("input[name='transfer_validity_to[]']").attr("id", "transfer_validity_to" + new_id).val("");
        clone_transport.find("input[name='transfer_vehicle[]']").attr("id", "transfer_vehicle" + new_id).val("");
        clone_transport.find("input[name='transfer_car_model[]']").attr("id", "transfer_car_model" + new_id).val("");
        clone_transport.find("select[name='transfer_manufacture_year[]']").attr("id", "transfer_manufacture_year" + new_id).val("0");
        clone_transport.find("input[name='transfer_duration[]']").attr("id", "transfer_duration" + new_id).val("");
        clone_transport.find("input[name='transfer_total_vehicles[]']").attr("id", "transfer_total_vehicles" + new_id).val("");
        clone_transport.find("input[name='transfer_max_passengers[]']").attr("id", "transfer_max_passengers" + new_id).val("");
        clone_transport.find("input[name='transfer_vehicle_cost[]']").attr("id", "transfer_vehicle_cost" + new_id).val("");
        clone_transport.find("input[name='transfer_parking_cost[]']").attr("id", "transfer_parking_cost" + new_id).val("");
        clone_transport.find("input[name='transfer_driver_tip[]']").attr("id", "transfer_driver_tip" + new_id).val("");
        clone_transport.find("input[name='transfer_recep_disc[]']").attr("id", "transfer_recep_disc" + new_id).val("");
        clone_transport.find("input[name='transfer_guide_cost[]']").attr("id", "transfer_guide_cost" + new_id).val("");
        clone_transport.find("input[name='transfer_attraction_cost[]']").attr("id", "transfer_attraction_cost" + new_id).val("");
        clone_transport.find("input[name='upload_ativity_images_index[]']").val(new_id);
         clone_transport.find(".upload_ativity_images").attr({"id":"upload_ativity_images" + new_id,"onchange":"return handleFileSelectTransport(event,'previewImg"+new_id+"')",'name':"upload_ativity_images"+new_id+"[]"}).val("");
         clone_transport.find(".previewImg").attr("id", "previewImg" + new_id).html("");
          clone_transport.find(".previewImg_new").attr("id", "previewImg_new" + new_id).html("");
         clone_transport.find(".plus_image_btn").attr("onclick", "document.getElementById('upload_ativity_images"+new_id+"').click()");
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


    $(document).on("click",".add_more_markup",function()
    {
        var clone_markup = $(".markup_div:last").clone();
        var add_url= "{!! asset('assets/images/add_icon.png') !!}";
        var minus_url = "{!! asset('assets/images/minus_icon.png') !!}";
        var newer_id = $(".markup_div:last").attr("id");
        new_id = newer_id.split('markup_div');
         old_id = parseInt(new_id[1]);
        new_id = parseInt(new_id[1]) + 1;
        clone_markup.find("select[name='transfer_nationality[]']").attr("id", "transfer_nationality" + new_id)
        .val(0);
        clone_markup.find("select[name='transfer_nationality[]']").parent().parent().parent().parent().attr("id",
            "markup_div" + new_id);
        clone_markup.find("select[name='transfer_nationality[]']").select2();
         clone_markup.find(".select2-container").slice(1).remove();
        clone_markup.find("select[name='transfer_markup[]']").attr("id", "transfer_markup" + new_id).val("0");
        clone_markup.find("input[name='transfer_amount[]']").attr("id", "transfer_amount" + new_id).val("");
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
                    $("#transfer_country").html(response);
                    $('#transfer_country').select2();
                    $("#transfer_country").prop("disabled",false);

                     $("#transfer_city").html("");

                }
            });
        }
    });

    $(document).on("change","#transfer_country",function()
    {
         if($("#transfer_country").val()!="0")
        {
            var country_id=$(this).val();
            $.ajax({
                url:"{{route('search-country-cities')}}",
                type:"GET",
                data:{"country_id":country_id},
                success:function(response)
                {
                   
                    $("#transfer_city").html(response);
                    $('#transfer_city').select2();
                      $("#acitvity_city_div").show();
                   

                }
            });
        }

    });
</script>
<script>
    $(document).on("click","#update_transfer",function()
    {
        var transfer_name=$("#transfer_name").val();
        var supplier_name=$("#supplier_name").val();
        var transfer_pickup_point=$("#transfer_pickup_point").val();
        var transfer_drop_point=$("#transfer_drop_point").val();
        var transfer_meet_point=$("#transfer_meet_point").val();
        var transfer_description=$("#transfer_description").val();
        var driver_language=$("#driver_language").val();
        var transfer_country=$("#transfer_country").val();
        var transfer_city=$("#transfer_city").val();
        // var transfer_arrival_time=$("#transfer_arrival_time").val();
        var is_all_days = $("input[name='is_all_days']:checked").val();
        var week_monday = $("input[name='week_monday']:checked").val();
        var week_tuesday = $("input[name='week_tuesday']:checked").val();
        var week_wednesday = $("input[name='week_wednesday']:checked").val();
        var week_thursday = $("input[name='week_thursday']:checked").val();
        var week_friday = $("input[name='week_friday']:checked").val();
        var week_saturday = $("input[name='week_saturday']:checked").val();
        var week_sunday = $("input[name='week_sunday']:checked").val();
    
        var transfer_inclusions= CKEDITOR.instances.transfer_inclusions.getData();
        var transfer_exclusions=CKEDITOR.instances.transfer_exclusions.getData();
        var transfer_cancellation=CKEDITOR.instances.transfer_cancellation.getData();
        var transfer_terms_conditions=CKEDITOR.instances.transfer_terms_conditions.getData();




     if (transfer_name.trim() == "") {
          $("#transfer_name").css("border", "1px solid #cf3c63");
      } else

      {
          $("#transfer_name").css("border", "1px solid #9e9e9e");
      }

      if (supplier_name == "0") {
          $("#supplier_name").parent().find(".select2-selection").css("border", "1px solid #cf3c63");

      } else {
          $("#supplier_name").parent().find(".select2-selection").css("border", "1px solid #9e9e9e");
      }

      if (driver_language.trim() == "") {
          $("#driver_language").css("border", "1px solid #cf3c63");
      } else {
          $("#driver_language").css("border", "1px solid #9e9e9e");
      }

      // if (transfer_arrival_time.trim() == "") {
      //     $("#transfer_arrival_time").css("border", "1px solid #cf3c63");

      // } else

      // {
      //     $("#transfer_arrival_time").css("border", "1px solid #9e9e9e");
      // }
      if (transfer_country == "0") {
          $("#transfer_country").parent().find(".select2-selection").css("border", "1px solid #cf3c63");

      } else

      {
          $("#transfer_country").parent().find(".select2-selection").css("border", "1px solid #9e9e9e");
      }
      if (transfer_city == "0") {
          $("#transfer_city").parent().find(".select2-selection").css("border", "1px solid #cf3c63");

      } else

      {
          $("#transfer_city").parent().find(".select2-selection").css("border", "1px solid #9e9e9e");
      }
      if (transfer_pickup_point.trim() == "") {
          $("#transfer_pickup_point").css("border", "1px solid #cf3c63");

      } else

      {
          $("#transfer_pickup_point").css("border", "1px solid #9e9e9e");
      }
      if (transfer_drop_point.trim() == "") {
          $("#transfer_drop_point").css("border", "1px solid #cf3c63");

      } else

      {
          $("#transfer_drop_point").css("border", "1px solid #9e9e9e");
      }
      if (transfer_meet_point.trim() == "") {
          $("#transfer_meet_point").css("border", "1px solid #cf3c63");

      } else

      {
          $("#transfer_meet_point").css("border", "1px solid #9e9e9e");
      }
      if (transfer_description.trim() == "") {
          $("#transfer_description").css("border", "1px solid #cf3c63");

      } else

      {
          $("#transfer_description").css("border", "1px solid #9e9e9e");
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

      var transfer_nationality = 1;
      var transfer_nationality_error = 0;
      $("select[name='transfer_nationality[]']").each(function() {

          if ($(this).val() == "0") {
              $("#transfer_nationality" + transfer_nationality).parent().find(".select2-selection").css("border", "1px solid #cf3c63");
              $("#transfer_nationality" + transfer_nationality).parent().find(".select2-selection").focus();
              transfer_nationality_error++;
          } else {
              $("#transfer_nationality" + transfer_nationality).parent().find(".select2-selection").css("border", "1px solid #9e9e9e");
          }
          transfer_nationality++;

      });

      var transfer_markup = 1;
      var transfer_markup_error = 0;
      $("select[name='transfer_markup[]']").each(function() {

          if ($(this).val() == "0") {
              $("#transfer_markup" + transfer_markup).css("border", "1px solid #cf3c63");
              $("#transfer_markup" + transfer_markup).focus();
              transfer_markup_error++;
          } else {
              $("#transfer_markup" + transfer_markup).css("border", "1px solid #9e9e9e");
          }
          transfer_markup++;

      });

      var transfer_markup_amt = 1;
      var transfer_markup_amt_error = 0;
      $("input[name='transfer_amount[]']").each(function() {

          if ($(this).val().trim() == "") {
              $("#transfer_amount" + transfer_markup_amt).css("border", "1px solid #cf3c63");
              $("#transfer_amount" + transfer_markup_amt).focus();
              transfer_markup_amt_error++;
          } else {
              $("#transfer_amount" + transfer_markup_amt).css("border", "1px solid #9e9e9e");
          }
          transfer_markup_amt++;

      });
      var transfer_validity_from = 1;
      var transfer_validity_from_error = 0;
      $("input[name='transfer_validity_from[]']").each(function() {

          if ($(this).val() == "") {
              $("#transfer_validity_from" + transfer_validity_from).css("border", "1px solid #cf3c63");
              $("#transfer_validity_from" + transfer_validity_from).focus();
              transfer_validity_from_error++;
          } else {
              $("#transfer_validity_from" + transfer_validity_from).css("border", "1px solid #9e9e9e");
          }
          transfer_validity_from++;

      });
        var transfer_validity_to = 1;
      var transfer_validity_to_error = 0;
      $("input[name='transfer_validity_to[]']").each(function() {

          if ($(this).val() == "") {
              $("#transfer_validity_to" + transfer_validity_to).css("border", "1px solid #cf3c63");
              $("#transfer_validity_to" + transfer_validity_to).focus();
              transfer_validity_to_error++;
          } else {
              $("#transfer_validity_to" + transfer_validity_to).css("border", "1px solid #9e9e9e");
          }
          transfer_validity_to++;

      });
       var transfer_vehicle_type = 1;
      var transfer_vehicle_type_error = 0;
      $("select[name='transfer_vehicle_type[]']").each(function() {

          if ($(this).val() == "0") {
              $("#transfer_vehicle_type" + transfer_vehicle_type).css("border", "1px solid #cf3c63");
              $("#transfer_vehicle_type" + transfer_vehicle_type).focus();
              transfer_vehicle_type_error++;
          } else {
              $("#transfer_vehicle_type" + transfer_vehicle_type).css("border", "1px solid #9e9e9e");
          }
          transfer_vehicle_type++;

      });
         var transfer_vehicle = 1;
      var transfer_vehicle_error = 0;
      $("input[name='transfer_vehicle[]']").each(function() {

          if ($(this).val() == "") {
              $("#transfer_vehicle" + transfer_vehicle).css("border", "1px solid #cf3c63");
              $("#transfer_vehicle" + transfer_vehicle).focus();
              transfer_vehicle_error++;
          } else {
              $("#transfer_vehicle" + transfer_vehicle).css("border", "1px solid #9e9e9e");
          }
          transfer_vehicle++;

      });
       var transfer_car_model = 1;
      var transfer_car_model_error = 0;
      $("input[name='transfer_car_model[]']").each(function() {

          if ($(this).val() == "") {
              $("#transfer_car_model" + transfer_car_model).css("border", "1px solid #cf3c63");
              $("#transfer_car_model" + transfer_car_model).focus();
              transfer_car_model_error++;
          } else {
              $("#transfer_car_model" + transfer_car_model).css("border", "1px solid #9e9e9e");
          }
          transfer_car_model++;

      });
       var transfer_manufacture_year = 1;
      var transfer_manufacture_year_error = 0;
      $("select[name='transfer_manufacture_year[]']").each(function() {

          if ($(this).val() == "0") {
              $("#transfer_manufacture_year" + transfer_manufacture_year).css("border", "1px solid #cf3c63");
              $("#transfer_manufacture_year" + transfer_manufacture_year).focus();
              transfer_manufacture_year_error++;
          } else {
              $("#transfer_manufacture_year" + transfer_manufacture_year).css("border", "1px solid #9e9e9e");
          }
          transfer_manufacture_year++;

      });
      var transfer_duration = 1;
      var transfer_duration_error = 0;
      $("input[name='transfer_duration[]']").each(function() {

          if ($(this).val() == "") {
              $("#transfer_duration" + transfer_duration).css("border", "1px solid #cf3c63");
              $("#transfer_duration" + transfer_duration).focus();
              transfer_duration_error++;
          } else {
              $("#transfer_duration" + transfer_duration).css("border", "1px solid #9e9e9e");
          }
          transfer_duration++;

      });
       var transfer_max_passengers = 1;
      var transfer_max_passengers_error = 0;
      $("input[name='transfer_max_passengers[]']").each(function() {

          if ($(this).val() == "") {
              $("#transfer_max_passengers" + transfer_max_passengers).css("border", "1px solid #cf3c63");
              $("#transfer_max_passengers" + transfer_max_passengers).focus();
              transfer_max_passengers_error++;
          } else {
              $("#transfer_max_passengers" + transfer_max_passengers).css("border", "1px solid #9e9e9e");
          }
          transfer_max_passengers++;

      });
      //    var transfer_total_vehicles = 1;
      // var transfer_total_vehicles_error = 0;
      // $("input[name='transfer_total_vehicles[]']").each(function() {

      //     if ($(this).val() == "") {
      //         $("#transfer_total_vehicles" + transfer_total_vehicles).css("border", "1px solid #cf3c63");
      //         $("#transfer_total_vehicles" + transfer_total_vehicles).focus();
      //         transfer_total_vehicles_error++;
      //     } else {
      //         $("#transfer_total_vehicles" + transfer_total_vehicles).css("border", "1px solid #9e9e9e");
      //     }
      //     transfer_total_vehicles++;

      // });

       var transfer_transport_currency = 1;
      var transfer_transport_currency_error = 0;
      $("select[name='transfer_transport_currency[]']").each(function() {

          if ($(this).val() == "0") {
              $("#transfer_transport_currency" + transfer_transport_currency).css("border", "1px solid #cf3c63");
              $("#transfer_transport_currency" + transfer_transport_currency).focus();
              transfer_transport_currency_error++;
          } else {
              $("#transfer_transport_currency" + transfer_transport_currency).css("border", "1px solid #9e9e9e");
          }
          transfer_transport_currency++;

      });

          var transfer_vehicle_cost = 1;
      var transfer_vehicle_cost_error = 0;
      $("input[name='transfer_vehicle_cost[]']").each(function() {

          if ($(this).val() == "") {
              $("#transfer_vehicle_cost" + transfer_vehicle_cost).css("border", "1px solid #cf3c63");
              $("#transfer_vehicle_cost" + transfer_vehicle_cost).focus();
              transfer_vehicle_cost_error++;
          } else {
              $("#transfer_vehicle_cost" + transfer_vehicle_cost).css("border", "1px solid #9e9e9e");
          }
          transfer_vehicle_cost++;

      });


          var transfer_parking_cost = 1;
      var transfer_parking_cost_error = 0;
      $("input[name='transfer_parking_cost[]']").each(function() {

          if ($(this).val() == "") {
              $("#transfer_parking_cost" + transfer_parking_cost).css("border", "1px solid #cf3c63");
              $("#transfer_parking_cost" + transfer_parking_cost).focus();
              transfer_parking_cost_error++;
          } else {
              $("#transfer_parking_cost" + transfer_parking_cost).css("border", "1px solid #9e9e9e");
          }
          transfer_parking_cost++;

      });

         var transfer_driver_tip = 1;
      var transfer_driver_tip_error = 0;
      $("input[name='transfer_driver_tip[]']").each(function() {

          if ($(this).val() == "") {
              $("#transfer_driver_tip" + transfer_driver_tip).css("border", "1px solid #cf3c63");
              $("#transfer_driver_tip" + transfer_driver_tip).focus();
              transfer_driver_tip_error++;
          } else {
              $("#transfer_driver_tip" + transfer_driver_tip).css("border", "1px solid #9e9e9e");
          }
          transfer_driver_tip++;

      });

        var transfer_recep_disc = 1;
      var transfer_recep_disc_error = 0;
      $("input[name='transfer_recep_disc[]']").each(function() {

          if ($(this).val() == "") {
              $("#transfer_recep_disc" + transfer_recep_disc).css("border", "1px solid #cf3c63");
              $("#transfer_recep_disc" + transfer_recep_disc).focus();
              transfer_recep_disc_error++;
          } else {
              $("#transfer_recep_disc" + transfer_recep_disc).css("border", "1px solid #9e9e9e");
          }
          transfer_recep_disc++;

      });
          var transfer_guide_cost = 1;
      var transfer_guide_cost_error = 0;
      $("input[name='transfer_guide_cost[]']").each(function() {

          if ($(this).val() == "") {
              $("#transfer_guide_cost" + transfer_guide_cost).css("border", "1px solid #cf3c63");
              $("#transfer_guide_cost" + transfer_guide_cost).focus();
              transfer_guide_cost_error++;
          } else {
              $("#transfer_guide_cost" + transfer_guide_cost).css("border", "1px solid #9e9e9e");
          }
          transfer_guide_cost++;

      });
         var transfer_attraction_cost = 1;
      var transfer_attraction_cost_error = 0;
      $("input[name='transfer_attraction_cost[]']").each(function() {

          if ($(this).val() == "") {
              $("#transfer_attraction_cost" + transfer_attraction_cost).css("border", "1px solid #cf3c63");
              $("#transfer_attraction_cost" + transfer_attraction_cost).focus();
              transfer_attraction_cost_error++;
          } else {
              $("#transfer_attraction_cost" + transfer_attraction_cost).css("border", "1px solid #9e9e9e");
          }
          transfer_attraction_cost++;

      });


      if (transfer_inclusions.trim() == "") {
          $("#cke_transfer_inclusions").css("border", "1px solid #cf3c63");

      } else

      {
          $("#cke_transfer_inclusions").css("border", "1px solid #9e9e9e");
      }
      if (transfer_exclusions.trim() == "") {
          $("#cke_transfer_exclusions").css("border", "1px solid #cf3c63");

      } else

      {
          $("#cke_transfer_exclusions").css("border", "1px solid #9e9e9e");
      }
      if (transfer_cancellation.trim() == "") {
          $("#cke_transfer_cancellation").css("border", "1px solid #cf3c63");

      } else

      {
          $("#cke_transfer_cancellation").css("border", "1px solid #9e9e9e");
      }
      if (transfer_terms_conditions.trim() == "") {
          $("#cke_transfer_terms_conditions").css("border", "1px solid #cf3c63");


      } else
      {
          $("#cke_transfer_terms_conditions").css("border", "1px solid #9e9e9e");
      }

      if (transfer_name.trim() == "") {
          $("#transfer_name").focus();
      } else if (supplier_name == "0") {
          $("#supplier_name").parent().find(".select2-selection").focus();
      } else if (driver_language.trim() == "") {
          $("#driver_language").focus();
      } 
      // else if (transfer_arrival_time.trim() == "") {
      //     $("#transfer_arrival_time").focus();
      // } 
      else if (transfer_pickup_point.trim() == "") {
          $("#transfer_pickup_point").focus();
      }
      else if (transfer_drop_point.trim() == "") {
          $("#transfer_drop_point").focus();
      }
       else if (transfer_meet_point.trim() == "") {
          $("#transfer_meet_point").focus();
      }
       else if (transfer_description.trim() == "") {
          $("#transfer_description").focus();
      }
      else if (transfer_country == "0") {
          $("#transfer_country").parent().find(".select2-selection").focus();
      } else if (transfer_city == "0") {
          $("#transfer_city").parent().find(".select2-selection").focus();
      }  else if (!is_all_days) {
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
      } else if (transfer_nationality_error > 0) {

      } else if (transfer_markup_error > 0) {

      } else if (transfer_markup_amt_error > 0) {

      } else if (transfer_validity_from_error > 0) {

      } else if (transfer_validity_to_error > 0) {

      } else if (transfer_vehicle_type_error > 0) {

      } else if (transfer_vehicle_error > 0) {

      } else if (transfer_car_model_error > 0) {

      } else if (transfer_manufacture_year_error > 0) {

      } else if (transfer_duration_error > 0) {

      } else if (transfer_max_passengers_error > 0) {

      } // else if (transfer_total_vehicles_error > 0) {

      // }
       else if (transfer_transport_currency_error > 0) {

      }
      else if (transfer_vehicle_cost_error > 0) {

      }
       else if (transfer_parking_cost_error > 0) {

      }
       else if (transfer_driver_tip_error > 0) {

      }
        else if (transfer_recep_disc_error > 0) {

      }
      else if (transfer_guide_cost_error > 0) {

      }
      else if (transfer_attraction_cost_error > 0) {

      }
       else if (transfer_inclusions.trim() == "") {
          $("#cke_transfer_inclusions").focus();
      } else if (transfer_exclusions.trim() == "") {
          $("#cke_transfer_exclusions").focus();
      } else if (transfer_cancellation.trim() == "") {
          $("#cke_transfer_cancellation").focus();
      } else if (transfer_terms_conditions.trim() == "") {
          $("#cke_transfer_terms_conditions").focus();
      } else {
    $("#update_transfer").prop("disabled", true);
    var formdata=new FormData($("#transfer_form")[0]);

    formdata.append("transfer_inclusions",transfer_inclusions);
    formdata.append("transfer_exclusions",transfer_exclusions);
    formdata.append("transfer_cancellation",transfer_cancellation);
    formdata.append("transfer_terms_conditions",transfer_terms_conditions);
    $.ajax({
        url:"{{route('update-transport')}}",
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
                    "Transport already exists");

            } else if (response.indexOf("success") != -1)

            {

                swal({
                    title: "Success",
                    text: "Transport Updated Successfully !",
                    type: "success"
                },

                function () {

                    location.reload();

                });

            } else if (response.indexOf("fail") != -1)

            {

                swal("ERROR", "Transport cannot be updated right now! ");

            }
            $("#update_transfer").prop("disabled", false);

        }
    });
}
});
    $(document).on("click","#discard_transfer",function()
    {
        window.history.back();

    });
</script>
<script>
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
</script>
</body>


</html>
