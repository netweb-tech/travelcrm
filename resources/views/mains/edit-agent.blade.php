    @include('mains.includes.top-header')
    <style>
        header.main-header {
            background: url("{{ asset('assets/images/color-plate/theme-purple.jpg') }}");
        }

        .iti-flag {
            width: 20px;
            height: 15px;
            box-shadow: 0px 0px 1px 0px #888;
            background-image: url("flags.") !important;
            background-repeat: no-repeat;
            background-color: #DBDBDB;
            background-position: 20px 0
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
        }

        */

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
                    <h3 class="page-title">Agent Management</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Dashboard</li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Agent
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

 @if($rights['edit_delete']==1)
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Edit Agent</h4>
                    </div>
                    <div class="box-body">
                        <form id="agent_form" enctype="multipart/form-data" method="POST">
                            {{csrf_field()}}

                        <div class="row mb-10">
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label>AGENT NAME <span class="asterisk">*</span></label>
                                    <input type="text" class="form-control" placeholder="AGENT NAME " name="agent_name"  id="agent_name" value="{{$get_agent['agent_name']}}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6">

                            </div>
                        </div>
                        <div class="row mb-10">
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label>COMPANY NAME <span class="asterisk">*</span></label>
                                    <input type="text" class="form-control" placeholder="COMPANY NAME " name="company_name" id="company_name" value="{{$get_agent['company_name']}}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6">

                            </div>
                        </div>
                        <div class="row mb-10">
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label>EMAIL ID <span class="asterisk">*</span></label>
                                    <input type="text" class="form-control" placeholder="EMAIL ID" name="email_id" id="email_id" value="{{$get_agent['company_email']}}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6">

                            </div>
                        </div>
                        <div class="row mb-10">
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label>CONTACT NUMBER <span class="asterisk">*</span></label>
                                        <input type="text" 
                                            class="form-control input-lg"
                                            id="contact_number" name="contact_number" autocomplete="off"
                                            placeholder="Enter Mobile Number" value="{{$get_agent['company_contact']}}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6">

                            </div>




                        </div>
                        <div class="row mb-10">
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label>FAX NUMBER </label>
                                    <input type="text" class="form-control" placeholder="FAX NUMBER" name="fax_number" id="fax_number" value="{{$get_agent['company_fax']}}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6">

                            </div>
                        </div>
                        <div class="row mb-10">
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label>Agent Reference ID </label>
                                    <input type="text" class="form-control" placeholder="Agent Reference ID" name="agent_reference_id" id="agent_reference_id" value="{{$get_agent['agent_ref_id']}}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6">

                            </div>
                        </div>
                        <div class="row mb-10">
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label>ADDRESS LINE 1 <span class="asterisk">*</span></label>
                                    <textarea rows="5" cols="5" class="form-control" placeholder="ADDRESS" name="address" id="address">{{$get_agent['address']}}</textarea>
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
                                            <select class="form-control" name="agent_country" id="agent_country">
                                              <option hidden value="0">SELECT COUNTRY</option>

                                              @foreach($countries as $country)
                                                @if($get_agent['agent_country']==$country->country_id)
                                              <option value="{{$country->country_id}}" selected="selected">{{$country->country_name}}</option>
                                              @else
                                              <option value="{{$country->country_id}}">{{$country->country_name}}</option>
                                              @endif


                                              @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6">

                            </div>

                        </div>
                         <div class="row mb-10" id="city_div">

                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <div class="form-group">
                                    <div class="form-group">

                                        <div class="form-group">
                                            <label>CITY <span class="asterisk">*</span></label>
                                                    <select id="agent_city" name="agent_city" class="form-control select2" style="width: 100%;">
                                                            <option value="0" hidden>SELECT CITY</option>
                                                            @foreach($cities as $city)
                                                            @if($city->id==$get_agent->agent_city)
                                                            <option value="{{$city->id}}" selected="selected">{{$city->name}}</option>
                                                            @else
                                                            <option value="{{$city->id}}" >{{$city->name}}</option>
                                                            @endif  
                                                            @endforeach
                                                        </select>
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
                                    <label>CORPORATE REG. NO </label>
                                    <input type="text" class="form-control" placeholder="CORPORATE REG NO" name="corporate_reg_no" id="corporate_reg_no" value="{{$get_agent['corporate_reg_no']}}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6">

                            </div>
                        </div>
                        <div class="row mb-10">
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label>CORPORATE DESCRIPTION <span class="asterisk">*</span></label>
                                    <textarea rows="5" cols="5" class="form-control" placeholder="CORPORATE DESCRIPTION " name="corporate_description" id="corporate_description">{{$get_agent['corporate_desc']}}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6">

                            </div>
                        </div>
                        <div class="row mb-10">
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label>SKYPE ID </label>
                                    <input type="text" class="form-control" placeholder="SKYPE ID" name="skype_id" id="skype_id" value="{{$get_agent['skype_id']}}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6">

                            </div>




                        </div>
                        <div class="row mb-10">
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label>OPERATION HRS FROM </label>
                                    <div class="bootstrap-timepicker">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" class="form-control timepicker" name="operating_hrs_from" id="operating_hrs_from" value="{{$get_agent['operating_hrs_from']}}">
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
                        <div class="col-sm-12 col-md-12 col-lg-6">

                        </div>





                        <div class="row mb-10">
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label>OPERATION HRS TO </label>
                                    <div class="bootstrap-timepicker">
                                        <div class="form-group">


                                            <div class="input-group">
                                                <input type="text" class="form-control timepicker" name="operating_hrs_to" id="operating_hrs_to" value="{{$get_agent['operating_hrs_to']}}">

                                                <div class="input-group-addon">
                                                    <i class="fa fa-clock-o"></i>
                                                </div>
                                            </div>
                                            <!-- /.input group -->
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6">

                            </div>




                        </div>
                        @php
                        $weekdays=unserialize($get_agent['operating_weekdays']);
    
                        @endphp
                        <div class="row mb-10">
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <div class="row mb-10">


                                    <div class="col-sm-12">
                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>MONDAY <span class="asterisk">*</span></label>
                                            </div>
                                            <div class="col-md-6">
                                                <input name="week_monday" type="radio" id="week_monday_1"
                                                    class="with-gap radio-col-primary" value="yes" @if($weekdays["monday"]=="yes")checked @endif>
                                                <label for="week_monday_1" >Yes </label>
                                                <input name="week_monday" type="radio" id="week_monday_2"
                                                    class="with-gap radio-col-primary" value="no" @if($weekdays["monday"]=="no")checked @endif>
                                                <label for="week_monday_2">No</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>TUESDAY <span class="asterisk">*</span></label>
                                            </div>
                                            <div class="col-md-6">
                                                <input name="week_tuesday" type="radio" id="week_tuesday_1"
                                                    class="with-gap radio-col-primary" value="yes" @if($weekdays["tuesday"]=="yes")checked @endif>
                                                <label for="week_tuesday_1">Yes </label>
                                                <input name="week_tuesday" type="radio" id="week_tuesday_2"
                                                    class="with-gap radio-col-primary" value="no" @if($weekdays["tuesday"]=="no")checked @endif>
                                                <label for="week_tuesday_2">No</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>WEDNESDAY <span class="asterisk">*</span></label>
                                            </div>
                                            <div class="col-md-6">
                                                <input name="week_wednesday" type="radio" id="week_wednesday_1"
                                                    class="with-gap radio-col-primary" value="yes" @if($weekdays["wednesday"]=="yes")checked @endif>
                                                <label for="week_wednesday_1">Yes </label>
                                                <input name="week_wednesday" type="radio" id="week_wednesday_2"
                                                    class="with-gap radio-col-primary" value="no" @if($weekdays["wednesday"]=="no")checked @endif>
                                                <label for="week_wednesday_2">No</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>THURSDAY <span class="asterisk">*</span></label>
                                            </div>
                                            <div class="col-md-6">
                                                <input name="week_thursday" type="radio" id="week_thursday_1"
                                                    class="with-gap radio-col-primary" value="yes" @if($weekdays["thursday"]=="yes")checked @endif>
                                                <label for="week_thursday_1">Yes </label>
                                                <input name="week_thursday" type="radio" id="week_thursday_2"
                                                    class="with-gap radio-col-primary" value="no" @if($weekdays["thursday"]=="no")checked @endif>
                                                <label for="week_thursday_2">No</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>FRIDAY <span class="asterisk">*</span></label>
                                            </div>
                                            <div class="col-md-6">
                                                <input name="week_friday" type="radio" id="week_friday_1"
                                                    class="with-gap radio-col-primary" value="yes" @if($weekdays["friday"]=="yes")checked @endif>
                                                <label for="week_friday_1">Yes </label>
                                                <input name="week_friday" type="radio" id="week_friday_2"
                                                    class="with-gap radio-col-primary" value="no" @if($weekdays["friday"]=="no")checked @endif>
                                                <label for="week_friday_2">No</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>SATURDAY <span class="asterisk">*</span></label>
                                            </div>
                                            <div class="col-md-6">
                                                <input name="week_saturday" type="radio" id="week_saturday_1"
                                                    class="with-gap radio-col-primary" value="yes" @if($weekdays["saturday"]=="yes")checked @endif>
                                                <label for="week_saturday_1">Yes </label>
                                                <input name="week_saturday" type="radio" id="week_saturday_2"
                                                    class="with-gap radio-col-primary" value="no" @if($weekdays["saturday"]=="no")checked @endif>
                                                <label for="week_saturday_2">No</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>SUNDAY <span class="asterisk">*</span></label>
                                            </div>
                                            <div class="col-md-6">

                                                <input name="week_sunday" type="radio" id="week_sunday_1"
                                                    class="with-gap radio-col-primary" value="yes" @if($weekdays["sunday"]=="yes")checked @endif>
                                                <label for="week_sunday_1">Yes </label>
                                                <input name="week_sunday" type="radio" id="week_sunday_2"
                                                    class="with-gap radio-col-primary" value="no" @if($weekdays["sunday"]=="no")checked @endif>
                                                <label for="week_sunday_2">No</label>
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
                                <div class="img_group">
                                    <label>CERTIFICATE OF CORPORATION </label>
                                    <div class="box1">
                                      <input class="hide" type="file" id="upload_certificate"

                                            accept="image/png,image/jpg,image/jpeg" 

                                           name="agent_certificate_file" onchange="previewFile('certificate')">

                                        <button type="button" onclick="document.getElementById('upload_certificate').click()"

                                            id="upload_0"

                                            class="btn red btn-outline btn-circle">+

                                        </button>
                                    </div>
                                    <br>

                                    <!-- ngRepeat: (itemindex,item) in temp_loop.enquiry_comment_attachment track by $index -->
                                    @if($get_agent['certificate_corp']!="")
                                     <img id="certificate_preview" height="200" alt="CERTIFICATE Preview..." src="{{ asset('assets/uploads/agent_certificates/')}}/{{$get_agent['certificate_corp']}}">
                                     @else
                                      <img id="certificate_preview" height="200" alt="CERTIFICATE Preview..." src="">

                                     @endif
                                </div>

                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6">

                            </div>





                        </div>
                        <div class="row mb-10">


                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <div class="img_group">
                                    <label>LOGO</label>
                                    <div class="box1">
                                         <input class="hide" type="file" id="upload_logo"

                                            accept="image/png,image/jpg,image/jpeg" 

                                           name="agent_logo_file" onchange="previewFile('logo')">

                                        <button type="button" onclick="document.getElementById('upload_logo').click()"

                                            id="upload_0"

                                            class="btn red btn-outline btn-circle">+

                                        </button>
                                    </div>
                                    <br>

                                    <!-- ngRepeat: (itemindex,item) in temp_loop.enquiry_comment_attachment track by $index -->
                                    @if($get_agent['agent_logo']!="")
                                    <img id="logo_preview" height="200" alt="LOGO Preview..." src="{{ asset('assets/uploads/agent_logos/')}}/{{$get_agent['agent_logo']}}">
                                    @else
                                      <img id="logo_preview" height="200" alt="LOGO Preview..." src="">

                                     @endif
                                </div>

                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6">

                            </div>


                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <div class="form-group">


                                    <div class="form-group">
                                        <label>AGENT CURRENCY <span class="asterisk">*</span></label>
                                        <select class="form-control
                                        " style="width: 100%;"
                                            tabindex="-1" aria-hidden="true" id="agent_opr_currency" name="agent_opr_currency[]" multiple="multiple" >
                                            @php
                                        $operating_currencies=explode(',',$get_agent['agent_opr_currency']);
                                            @endphp
                                            @foreach($currency as $curr)
                                            @if(in_array($curr->code,$operating_currencies))
                                            <option value="{{$curr->code}}" selected="selected">{{$curr->code}} ({{$curr->name}})</option>
                                            @else
                                            <option value="{{$curr->code}}">{{$curr->code}} ({{$curr->name}})</option>
                                            @endif
                                            @endforeach
                                        </select>

                                    </div>

                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6">

                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <div class="form-group">


                                    <div class="form-group">
                                        <label>AGENT COUNTRY OF OPERATION <span class="asterisk">*</span></label>
                                        <select class="form-control select2 " style="width: 100%;"
                                            tabindex="-1" aria-hidden="true" id="agent_opr_countries" name="agent_opr_countries[]" multiple="multiple">
                                             @php
                                        $operating_countries=explode(',',$get_agent['agent_opr_countries']);
                                            @endphp
                                              @foreach($countries as $country)
                                                    @if(in_array($country->country_id,$operating_countries))
                                              <option value="{{$country->country_id}}" selected="selected">{{$country->country_name}}</option>
                                              @else
                                                <option value="{{$country->country_id}}">{{$country->country_name}}</option>
                                              @endif

                                              @endforeach
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6">

                            </div>

                            <div class="col-sm-12">
                                <div class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;">

                                </div>
                                <h4 class="box-title" style="border-color: #c1c1c1;margin-top: 25px;">
                                    <i class="fa fa-plus-circle"></i> SERVICE BANK DETAIL </h4>

                            </div>

                        </div>

                        <div class="row mb-10">
                              @php
                                $agent_bank_details=unserialize($get_agent['agent_bank_details']);

                                    for($bank_count=0;$bank_count< count($agent_bank_details);$bank_count++)
                                    {
                            @endphp
                            <div class="col-md-6 bank_div" id="bank_div_{{($bank_count+1)}}">
                               <div class="col-sm-12 ">
                                <div class="form-group">
                                    <label>ACCOUNT NUMBER <span class="asterisk">*</span></label>
                                    <input type="text" class="form-control" placeholder="ACCOUNT NUMBER" id="account_number_{{($bank_count+1)}}" name="account_number[]" value="{{$agent_bank_details[$bank_count]['account_number']}}">
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>BANK NAME <span class="asterisk">*</span></label>
                                    <input type="text" class="form-control" placeholder="BANK NAME" id="bank_name_{{($bank_count+1)}}" name="bank_name[]"value="{{$agent_bank_details[$bank_count]['bank_name']}}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>BANK IFSC CODE <span class="asterisk">*</span></label>
                                    <input type="text" class="form-control" placeholder="BANK IFSC CODE"  id="bank_ifsc_{{($bank_count+1)}}" name="bank_ifsc[]" value="{{$agent_bank_details[$bank_count]['bank_ifsc']}}">
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>BANK IBAN CODE <span class="asterisk">*</span></label>
                                    <input type="text" class="form-control" placeholder="BANK IBAN CODE" id="bank_iban_{{($bank_count+1)}}" name="bank_iban[]" value="{{$agent_bank_details[$bank_count]['bank_iban']}}">
                                </div>
                            </div>
                                <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>CURRENCY <span class="asterisk">*</span></label>
                                        <select class="form-control" style="width: 100%;"
                                            tabindex="-1" aria-hidden="true" id="bank_currency_{{($bank_count+1)}}" name="bank_currency[]">
                                            <option selected="selected" value="0">Select Currency</option>
                                           @foreach($currency as $curr)
                                            @if($agent_bank_details[$bank_count]['bank_currency']==$curr->code)
                                            <option value="{{$curr->code}}" selected="selected">{{$curr->code}} ({{$curr->name}})</option>
                                            @else
                                              <option value="{{$curr->code}}">{{$curr->code}} ({{$curr->name}})</option>
                                            @endif

                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <div class="col-sm-6 col-md-12" style="display: flex;justify-content: flex-end;">
                                    <!-- <img class="plus-icon" style="display: block;" src="{{ asset('assets/images/minus_icon.png') }}"> -->
                                     @if($bank_count==0)
                                    <img id="add_more_bank1" class="plus-icon add_more_bank" style="display: block;" src="{{ asset('assets/images/add_icon.png') }}">
                                    @else
                                     <img id="remove_more_bank1" class="minus-icon remove_more_bank" style="display: block;" src="{{ asset('assets/images/minus_icon.png') }}">

                                    @endif

                                </div>
                            </div>
                        </div>

                        @php
                            }
                        @endphp
                        </div>
                        <div class="row mb-10">
                        
                            <div class="col-sm-12 col-md-12 col-lg-6">

                            </div>

                            <div class="col-sm-12">
                                <div class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;">

                                </div>
                                <h4 class="box-title" style="border-color: #c1c1c1;margin-top: 25px;">
                                    <i class="fa fa-plus-circle"></i> SERVICE TYPE DETAIL </h4>

                            </div>
                        </div>




                        <div class="row mb-10">

                            <div class="col-sm-12 col-md-12 col-lg-6">
                                    <div class="form-group">
                                            @php
                                        $service_type=explode(',',$get_agent['agent_service_type']);
                                            @endphp
                                        <label>SERVICE TYPE <span class="asterisk">*</span></label>
                                        <select class="form-control" style="width: 100%;"
                                            tabindex="-1" aria-hidden="true" multiple="multiple" name="service_type[]" id="service_type">
                                            <option value="hotel"   @if(in_array("hotel",$service_type)) selected @endif>Hotel</option>
                                            <option value="activity"  @if(in_array("activity",$service_type)) selected @endif>Activity</option>
                                            <option value="transportation"  @if(in_array("transportation",$service_type)) selected @endif>Transportation</option>
                                            <option value="guide" @if(in_array("guide",$service_type)) selected @endif>Guide</option>
                                            <option value="sightseeing" @if(in_array("sightseeing",$service_type)) selected @endif>Sightseeing</option>
                                            <option value="itinerary" @if(in_array("itinerary",$service_type)) selected @endif>Itinerary</option>
                                        </select>
                                    </div>
                            </div>
                            @php
                            $hotel_markup="";
                            $activity_markup="";
                            $transportation_markup="";
                            $guide_markup="";
                            $sightseeing_markup="";
                            $itinerary_markup="";

                            if($get_agent['agent_service_markup']!="")
                            {
                                $get_services=explode("///",$get_agent['agent_service_markup']);
                
                                for($services=0;$services< count($get_services);$services++)
                                {
                                    if($get_services[$services]!="")
                                    {
                                         $get_services_individual=explode("---",$get_services[$services]);
                                         $service_name=$get_services_individual[0]."_markup";
                                         $$service_name=$get_services_individual[1];


                                    }
                                }
                            }
                           

                            @endphp
                              <div class="col-sm-12">
                                                <div class='row'>
                                                    <div class="col-md-6"
                                                    style="padding:0">
                                                    <div class="col-sm-12 col-md-12 mt-20">
                                                        <div class="form-group">
                                                            <input type='hidden' name='service_name[]' value='hotel'>
                                                            <label for="">{{ strtoupper('Hotel')}}</label>
                                                            <input type='text' class='form-control' name='service_cost[]' placeholder="Markup in %" value="{{$hotel_markup}}" onkeypress='javascript:return validateNumber(event)'>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 mt-20">
                                                        <div class="form-group">
                                                         <input type='hidden' name='service_name[]' value='activity'>
                                                         <label for="">{{ strtoupper('Activity')}}</label>
                                                         <input type='text' class='form-control' name='service_cost[]' placeholder="Markup in %"  value="{{$activity_markup}}" onkeypress='javascript:return validateNumber(event)'>
                                                     </div>
                                                 </div>
                                                 <div class="col-sm-12 col-md-12 mt-20">
                                                    <div class="form-group">
                                                        <input type='hidden' name='service_name[]' value='transportation'>
                                                        <label for="">{{ strtoupper('Transportation')}}</label>
                                                        <input type='text' class='form-control' name='service_cost[]' placeholder="Markup in %" value="{{$transportation_markup}}" onkeypress='javascript:return validateNumber(event)'>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12 mt-20">
                                                    <div class="form-group">
                                                        <input type='hidden' name='service_name[]' value='guide'>
                                                        <label for="">{{ strtoupper('Guide')}}</label>
                                                        <input type='text' class='form-control' name='service_cost[]' placeholder="Markup in %" value="{{$guide_markup}}"  onkeypress='javascript:return validateNumber(event)'>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12 mt-20">
                                                    <div class="form-group">
                                                       <input type='hidden' name='service_name[]' value='sightseeing'>
                                                       <label for="">{{ strtoupper('Sightseeing')}}</label>
                                                       <input type='text' class='form-control' name='service_cost[]' placeholder="Markup in %" value="{{$sightseeing_markup}}" onkeypress='javascript:return validateNumber(event)'>
                                                   </div>
                                               </div>
                                                 <div class="col-sm-12 col-md-12 mt-20">
                                                    <div class="form-group">
                                                       <input type='hidden' name='service_name[]' value='itinerary'>
                                                       <label for="">{{ strtoupper('Itinerary')}}</label>
                                                       <input type='text' class='form-control' name='service_cost[]' placeholder="Markup in %" value="{{$itinerary_markup}}" onkeypress='javascript:return validateNumber(event)'>
                                                   </div>
                                               </div>


                                           </div>

                                       </div>


                                   </div>

                            <div class="col-sm-12">
                                <div class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;">

                                </div>
                                <h4 class="box-title" style="border-color: #c1c1c1;margin-top: 25px;">
                                    <i class="fa fa-plus-circle"></i> CONTACT PERSON </h4>

                            </div>

                        </div>

                        <div class="row mb-10">

                            @php
                                $contact_persons=unserialize($get_agent['contact_persons']);

                                    for($contact=0;$contact< count($contact_persons);$contact++)
                                    {
                            @endphp
                            <div class="col-md-6 contact_div" id="contact_div_{{($contact+1)}}">
                                 <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>CONTACT PERSON NAME <span class="asterisk">*</span> </label>
                                    <input type="text" class="form-control" placeholder="CONTACT PERSON NAME " id="contact_name_{{($contact+1)}}" name="contact_person_name[]" value="{{$contact_persons[$contact]['contact_person_name']}}">
                                </div>
                            </div>
                             <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                 
                                    <div class="form-group">
                                    <label>CONTACT NUMBER  <span class="asterisk">*</span></label>
                                   
                                        <input type="text" class="form-control input-lg" id="contact_number_{{($contact+1)}}" name="contact_person_number[]" autocomplete="off" placeholder="CONTACT NUMBER"  value="{{$contact_persons[$contact]['contact_person_number']}}">
                                   
                                </div>
                                </div>
                            </div>
                             <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>EMAIL ID <span class="asterisk">*</span></label>
                                    <input type="text" class="form-control" placeholder="EMAIL ID" id="contact_email_{{($contact+1)}}" name="contact_person_email[]" value="{{$contact_persons[$contact]['contact_person_email']}}">
                                </div>

                                <div class="col-sm-6 col-md-12" style="display: flex;justify-content: flex-end;">
                                    <!-- <img class="plus-icon" style="display: block;" src="{{ asset('assets/images/minus_icon.png')}}"> -->
                                    @if($contact==0)
                                    <img id="add_more_contact{{($contact+1)}}" class="plus-icon add_more_contact" style="display: block;" src="{{ asset('assets/images/add_icon.png')}}">
                                    @else
                                    <img id="remove_more_contact{{($contact+1)}}" class="minus-icon remove_more_contact" style="display: block;" src="{{ asset('assets/images/minus_icon.png')}}">

                                    @endif

                                </div>
                            </div>
                            </div>
                            @php
                             }
                            @endphp

                        </div>
                      

                        <div class="row mb-10">
                            <div class="col-md-12">
                                <div class="box-header with-border"
                                    style="padding: 10px;border-bottom:none;border-radius:0;border-top:1px solid #c3c3c3">
                                    <input type="hidden" name="agent_id" value="<?php echo urlencode(base64_encode(base64_encode($get_agent['agent_id'])));?>">
                                    <button type="button" id="update_agent" class="btn btn-rounded btn-primary mr-10">Update</button>
                                    <button type="button" id="discard_agent" class="btn btn-rounded btn-primary">Discard</button>
                                </div>
                            </div>
                        </div>
                                <form>
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
        if(data=="logo")
        {
         var preview = document.getElementById('logo_preview');

         var file    = document.querySelector('input[name="agent_logo_file"]').files[0];
     }
     else
     {
       var preview = document.getElementById('certificate_preview');

       var file    = document.querySelector('input[name="agent_certificate_file"]').files[0];    
    }


    var reader  = new FileReader();



    reader.onloadend = function () {

        preview.src = reader.result;

        preview.style.display="block";

    }
    if (file) {

        reader.readAsDataURL(file);

    } else {

        preview.src = "";

    }
    }

         $(document).ready(function()

        {

        //Initialize Select2 Elements

        $('.select2').select2();
         $('#agent_opr_currency').select2({
            "placeholder":"SELECT CURRENCY",
         });
           $('#agent_opr_countries').select2({
            "placeholder":"SELECT COUNTRY",
         });
           $('#service_type').select2({
            "placeholder":"SELECT SERVICE TYPE",
         });
          $('.timepicker').timepicker({
              showInputs: false,
              interval: 5,
              timeFormat: 'HH:mm:ss',
        });

          var selectedDates ="{{$get_agent['blackout_dates']}}";
          var selectedDatesArray=selectedDates.split(',');

        var date = new Date();
        date.setDate(date.getDate());

          //Passport validity Date picker

          $('#datepicker').datepicker({
            multidate:true,
            todayHighlight: true,
            format: 'yyyy-mm-dd',
            beforeShowDay:  function(date){
              var Dates = date.getFullYear()+"-"+('0' + (date.getMonth()+1)).slice(-2)+"-"+('0' + date.getDate()).slice(-2);
              if($.inArray(Dates,selectedDatesArray)!= -1 ){
                return [true, "active"];
            }
        }

    }).on('changeDate', function(e) {
        var dates =$("#datepicker").datepicker("getDates");
                // console.log(dates.length);
                var datearray=[];
                for($datecount=0;$datecount<dates.length;$datecount++)
                {
                    var datevalues=new Date(dates[$datecount]);
                    var Dates = datevalues.getFullYear()+"-"+('0' + (datevalues.getMonth()+1)).slice(-2)+"-"+('0' + datevalues.getDate()).slice(-2);
                    datearray.push(Dates);
                }
                $("#blackout_days").val(datearray.join(","));
            });
    });
    </script>
    <script> 
  

        $("#agent_country").on("change",function()
        {
            if($(this).val()!="0")
            {
                $("#city_div").show();
            }
        });
        $("#discard_agent").on("click",function()

        {

            window.history.back();

        });
        $(document).on("click",".add_more_bank",function()
        {
            var clone_contact=$("#bank_div_1").clone();
            var minus_url="{!! asset('assets/images/minus_icon.png') !!}";
            var newer_id=$(".bank_div:last").attr("id");
            new_id=newer_id.split('bank_div_');
           
            new_id=parseInt(new_id[1])+1;
            clone_contact.find("input[name='account_number[]']").attr("id","account_number_"+new_id).val("");
            clone_contact.find("input[name='account_number[]']").parent().parent().parent().attr("id","bank_div_"+new_id);
            clone_contact.find("input[name='bank_name[]']").attr("id","bank_name_"+new_id).val("");
            clone_contact.find("input[name='bank_ifsc[]']").attr("id","bank_ifsc_"+new_id).val("");
             clone_contact.find("input[name='bank_iban[]']").attr("id","bank_iban_"+new_id).val("");
             clone_contact.find("select[name='bank_currency[]']").attr("id","bank_currency_"+new_id).val(0);

            clone_contact.find(".add_more_bank").attr("src",minus_url);
            clone_contact.find(".add_more_bank").attr("id","remove_more_bank"+new_id);
            clone_contact.find(".add_more_bank").removeClass('plus-icon add_more_bank').addClass('minus-icon remove_more_bank');
            $(".bank_div:last").after(clone_contact);
        });

        $(document).on("click",".remove_more_bank",function()
        {
            var id=this.id;
            var split_id=id.split('remove_more_bank');
            $("#bank_div_"+split_id[1]).remove();
        });
        $(document).on("click",".add_more_contact",function()
        {
            var clone_contact=$("#contact_div_1").clone();
            var minus_url="{!! asset('assets/images/minus_icon.png') !!}";
            var newer_id=$(".contact_div:last").attr("id");
            new_id=newer_id.split('contact_div_');
           
            new_id=parseInt(new_id[1])+1;
            clone_contact.find("input[name='contact_person_name[]']").attr("id","contact_name_"+new_id).val("");
            clone_contact.find("input[name='contact_person_name[]']").parent().parent().parent().attr("id","contact_div_"+new_id);
            clone_contact.find("input[name='contact_person_number[]']").attr("id","contact_number_"+new_id).val("");
            clone_contact.find("input[name='contact_person_email[]']").attr("id","contact_email_"+new_id).val("");

            clone_contact.find(".add_more_contact").attr("src",minus_url);
            clone_contact.find(".add_more_contact").attr("id","remove_more_contact"+new_id);
            clone_contact.find(".add_more_contact").removeClass('plus-icon add_more_contact').addClass('minus-icon remove_more_contact');
            $(".contact_div:last").after(clone_contact);
        });

        $(document).on("click",".remove_more_contact",function()
        {
            var id=this.id;
            var split_id=id.split('remove_more_contact');
            $("#contact_div_"+split_id[1]).remove();
        });



            $(document).on("click","#update_agent",function()

            {

                var agent_name=$("#agent_name").val();

                var company_name=$("#company_name").val(); 

                var email_id=$("#email_id").val();

                var contact_number=$("#contact_number").val(); 

                var fax_number=$("#fax_number").val(); 

                var agent_reference_id=$("#agent_reference_id").val(); 

                var address=$("#address").val();

                var agent_country=$("#agent_country").val();

                 var agent_city=$("#agent_city").val(); 

                var corporate_description=$("#corporate_description").val();

                var corporate_description=$("#corporate_description").val();

                var week_monday=$("input[name='week_monday']:checked").val();

                var week_tuesday=$("input[name='week_tuesday']:checked").val();

                var week_wednesday=$("input[name='week_wednesday']:checked").val();

                var week_thursday=$("input[name='week_thursday']:checked").val();

                var week_friday=$("input[name='week_friday']:checked").val();

                var week_saturday=$("input[name='week_saturday']:checked").val();

                var week_sunday=$("input[name='week_sunday']:checked").val();

                var agent_opr_currency=$("#agent_opr_currency").val(); 
                var agent_opr_countries=$("#agent_opr_countries").val();

                // var blackout_days=$("#blackout_days").val(); 

                 var service_type=$("#service_type").val(); 


                 var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/; 



                if(agent_name.trim()=="")

                {

                    $("#agent_name").css("border","1px solid #cf3c63");

                }

                else

                {

                 $("#agent_name").css("border","1px solid #9e9e9e"); 

                }



                if(company_name.trim()=="")

                {

                    $("#company_name").css("border","1px solid #cf3c63");

                }

                else

                {

                 $("#company_name").css("border","1px solid #9e9e9e"); 

                }

                if(email_id.trim()=="")

                {

                    $("#email_id").css("border","1px solid #cf3c63");

                }

                else

                {
                 $("#email_id").css("border","1px solid #9e9e9e"); 

                }
                 if(email_id.trim()!="" && !regex.test(email_id))

                {

                    $("#email_id").css("border","1px solid #cf3c63");

                }
                if(contact_number.trim()=="")

                {

                    $("#contact_number").css("border","1px solid #cf3c63");

                }

                else

                {
                 $("#contact_number").css("border","1px solid #9e9e9e"); 

                }
                //  if(fax_number.trim()=="")

                // {

                //     $("#fax_number").css("border","1px solid #cf3c63");

                // }

                // else

                // {
                //  $("#fax_number").css("border","1px solid #9e9e9e"); 

                // }

            // if(agent_reference_id.trim()=="")

            //     {

            //         $("#agent_reference_id").css("border","1px solid #cf3c63");

            //     }

            //     else

            //     {
            //      $("#agent_reference_id").css("border","1px solid #9e9e9e"); 

            //     }
                if(address.trim()=="")

                {

                    $("#address").css("border","1px solid #cf3c63");

                }

                else

                {
                 $("#address").css("border","1px solid #9e9e9e"); 

                }
                  if(agent_country.trim()=="0")

                {

                    $("#agent_country").css("border","1px solid #cf3c63");

                }

                else

                {
                 $("#agent_country").css("border","1px solid #9e9e9e"); 

                }
                 if(agent_city.trim()=="0")

                {

                    $("#agent_city").css("border","1px solid #cf3c63");

                }

                else

                {
                 $("#agent_city").css("border","1px solid #9e9e9e"); 

                }
                 if(corporate_description.trim()=="")
                {
                    $("#corporate_description").css("border","1px solid #cf3c63");
                }
                else
                {
                 $("#corporate_description").css("border","1px solid #9e9e9e"); 
                }

                  if(!week_monday)
                {
                    $("input[name='week_monday']").parent().css("border","1px solid #cf3c63");
                }
                else
                {
                 $("input[name='week_monday']").parent().css("border","1px solid white"); 
                }
                  if(!week_tuesday)
                {
                    $("input[name='week_tuesday']").parent().css("border","1px solid #cf3c63");
                }
                else
                {
                 $("input[name='week_tuesday']").parent().css("border","1px solid white"); 
                }
                   if(!week_wednesday)
                {
                    $("input[name='week_wednesday']").parent().css("border","1px solid #cf3c63");
                }
                else
                {
                 $("input[name='week_wednesday']").parent().css("border","1px solid white"); 
                }
                  if(!week_thursday)
                {
                    $("input[name='week_thursday']").parent().css("border","1px solid #cf3c63");
                }
                else
                {
                 $("input[name='week_thursday']").parent().css("border","1px solid white"); 
                }
                if(!week_friday)
                {
                    $("input[name='week_friday']").parent().css("border","1px solid #cf3c63");
                }
                else
                {
                 $("input[name='week_friday']").parent().css("border","1px solid white"); 
                }
                 if(!week_saturday)
                {
                    $("input[name='week_saturday']").parent().css("border","1px solid #cf3c63");
                }
                else
                {
                 $("input[name='week_saturday']").parent().css("border","1px solid white"); 
                }
                if(!week_sunday)
                {
                    $("input[name='week_sunday']").parent().css("border","1px solid #cf3c63");
                }
                else
                {
                 $("input[name='week_sunday']").parent().css("border","1px solid white"); 
                }
                 if(agent_opr_currency=="")
                {
                    $("#agent_opr_currency").parent().find("label").css("border","1px solid #cf3c63");
                }
                else
                {
                 $("#agent_opr_currency").parent().find("label").css("border","1px solid white"); 
                }
                  if(agent_opr_countries=="")
                {
                    $("#agent_opr_countries").parent().find("label").css("border","1px solid #cf3c63");
                }
                else
                {
                 $("#agent_opr_countries").parent().find("label").css("border","1px solid white"); 
                }
                //  if(blackout_days.trim()=="")
                // {
                //     $("#blackout_days").css("border","1px solid #cf3c63");
                // }
                // else
                // {
                //  $("#blackout_days").css("border","1px solid #9e9e9e"); 
                // }
                  if(service_type=="")
                {
                    $("#service_type").parent().find("label").css("border","1px solid #cf3c63");
                }
                else
                {
                 $("#service_type").parent().find("label").css("border","1px solid white"); 
                }
                var account_number=1;
                var account_number_error=0;
                $("input[name='account_number[]']").each(function()
                {

                    if($(this).val()=="")
                    {
                        $("#account_number_"+account_number).css("border","1px solid #cf3c63");
                         $("#account_number_"+account_number).focus();
                         account_number_error++;
                    }
                    else
                    {
                       $("#account_number_"+account_number).css("border","1px solid #9e9e9e"); 
                   }
                   account_number++;

                });
                 var bank_name=1;
                  var bank_name_error=0;
                $("input[name='bank_name[]']").each(function()
                {

                    if($(this).val()=="")
                    {
                        $("#bank_name_"+bank_name).css("border","1px solid #cf3c63");
                         $("#bank_name_"+bank_name).focus();
                         bank_name_error++;
                    }
                    else
                    {
                       $("#bank_name_"+bank_name).css("border","1px solid #9e9e9e"); 
                   }
                   bank_name++;

                });

                  var bank_ifsc=1;
                  var bank_ifsc_error=0;
                $("input[name='bank_ifsc[]']").each(function()
                {

                    if($(this).val()=="")
                    {
                        $("#bank_ifsc_"+bank_ifsc).css("border","1px solid #cf3c63");
                        $("#bank_ifsc_"+bank_ifsc).focus();
                        bank_ifsc_error++;
                    }
                    else
                    {
                       $("#bank_ifsc_"+bank_ifsc).css("border","1px solid #9e9e9e"); 
                   }
                   bank_ifsc++;

                });

                  var bank_iban=1;
                  var bank_iban_error=0;
                $("input[name='bank_iban[]']").each(function()
                {

                    if($(this).val()=="")
                    {
                        $("#bank_iban_"+bank_iban).css("border","1px solid #cf3c63");
                        $("#bank_iban_"+bank_iban).focus();
                         bank_iban_error++;
                    }
                    else
                    {
                       $("#bank_iban_"+bank_iban).css("border","1px solid #9e9e9e"); 
                   }
                   bank_iban++;

                }); 
                 var bank_currency=1;
                 var bank_currency_error=0;
                $("select[name='bank_currency[]']").each(function()
                {

                    if($(this).val()=="0")
                    {
                        $("#bank_currency_"+bank_currency).css("border","1px solid #cf3c63");
                         $("#bank_currency_"+bank_currency).focus();
                        bank_currency_error++;
                    }
                    else
                    {
                       $("#bank_currency_"+bank_currency).css("border","1px solid #9e9e9e"); 
                   }
                   bank_currency++;

                }); 

                  var contact_person_name=1;
                   var contact_person_name_error=0;
                $("input[name='contact_person_name[]']").each(function()
                {

                    if($(this).val()=="")
                    {
                        $("#contact_name_"+contact_person_name).css("border","1px solid #cf3c63");
                        $("#contact_name_"+contact_person_name).focus();
                        contact_person_name_error++;

                    }
                    else
                    {
                       $("#contact_name_"+contact_person_name).css("border","1px solid #9e9e9e"); 
                   }
                   contact_person_name++;

                });

                   var contact_person_number=1;
                   var contact_person_number_error=0;
                $("input[name='contact_person_number[]']").each(function()
                {

                    if($(this).val()=="")
                    {
                        $("#contact_number_"+contact_person_number).css("border","1px solid #cf3c63");
                        $("#contact_number_"+contact_person_number).focus();
                         contact_person_number_error++;
                    }
                    else
                    {
                       $("#contact_number_"+contact_person_number).css("border","1px solid #9e9e9e"); 
                   }
                   contact_person_number++;

                }); 

                  var contact_person_email=1;
                  var contact_person_email_error=0;
                $("input[name='contact_person_email[]']").each(function()
                {

                    if($(this).val()=="")
                    {
                        $("#contact_email_"+contact_person_email).css("border","1px solid #cf3c63");
                        $("#contact_email_"+contact_person_email).focus();
                        contact_person_email_error++;
                    }
                    else if($(this).val()!="" && !regex.test($(this).val()))
                    {
                          $("#contact_email_"+contact_person_email).css("border","1px solid #cf3c63");
                        $("#contact_email_"+contact_person_email).focus();
                        contact_person_email_error++;
                    }
                    else
                    {
                       $("#contact_email_"+contact_person_email).css("border","1px solid #9e9e9e"); 
                   }
                   contact_person_email++;

                }); 




                if(agent_name.trim()=="")
                {
                    $("#agent_name").focus();
                }
                else if(company_name.trim()=="")
                {
                    $("#company_name").focus();
                }
                 else if(email_id.trim()=="")
                {
                    $("#email_id").focus();
                }
                  else if(email_id.trim()!="" && !regex.test(email_id))
                {
                    $("#email_id").focus();
                }
                 else if(contact_number.trim()=="")
                {
                    $("#contact_number").focus();
                }
                //    else if(fax_number.trim()=="")
                // {
                //     $("#fax_number").focus();
                // }
                //   else if(agent_reference_id.trim()=="")
                // {
                //     $("#agent_reference_id").focus();
                // }
                 else if(address.trim()=="")
                {
                    $("#address").focus();
                }
                 else if(agent_country.trim()=="0")
                {
                    $("#agent_country").focus();
                }
                 else if(agent_city.trim()=="0")
                {
                    $("#agent_city").focus();
                }
                  else if(corporate_description.trim()=="0")
                {
                    $("#corporate_description").focus();
                }
                else if(!week_monday)
                {
                    $("input[name='week_monday']").focus();
                }
               else if(!week_tuesday)
                {
                    $("input[name='week_tuesday']").focus();
                }
                else if(!week_wednesday)
                {
                    $("input[name='week_wednesday']").focus();
                }
                else if(!week_thursday)
                {
                    $("input[name='week_thursday']").focus();
                }
                else if(!week_friday)
                {
                    $("input[name='week_friday']").focus();
                }
                else if(!week_saturday)
                {
                    $("input[name='week_saturday']").focus();
                }
                else if(!week_sunday)
                {
                    $("input[name='week_sunday']").focus();
                }
                 else if(agent_opr_currency=="")
                {
                    $("#agent_opr_currency").focus();
                }
                    else if(agent_opr_countries=="")
                {
                    $("#agent_opr_countries").focus();
                }
                else if(account_number_error>0)
                {

                }
                else if(bank_name_error>0)
                {

                }
                else if(bank_ifsc_error>0)
                {

                }
                else if(bank_currency_error>0)
                {

                }
                else if(bank_iban_error>0)
                {

                }
                   else if(service_type=="")
                {
                    $("#service_type").focus();
                }
                else if(contact_person_name_error>0)
                {

                }
                else if(contact_person_email_error>0)
                {

                }
                else if(contact_person_number_error>0)
                {

                }
                else

                {

                    $("#update_agent").prop("disabled",true);

                    var formdata=new FormData($("#agent_form")[0]);

                    $.ajax({

                        url:"{{route('update-agent')}}",
                        enctype: 'multipart/form-data',

                        data: formdata,

                        type:"POST",

                        processData: false,

                        contentType: false,

                        success:function(response)

                        {

                           if(response.indexOf("exist")!=-1)

                           {

                              swal("Already Exist!", "Agent with this email or contact already exists");

                           }

                          else if(response.indexOf("success")!=-1)

                          {

                            swal({title:"Success",text:"Agent Updated Successfully !",type: "success"},

                             function(){ 

                                 location.reload();

                             });

                          }

                          else if(response.indexOf("fail")!=-1)

                          {

                           swal("ERROR", "Agent cannot be updated right now! ");

                          }

                            $("#update_agent").prop("disabled",false);

                        }

                    });  

                }







            });

    </script>
           <script>
             $(document).on("change","#agent_country",function()
           {
               if($("#agent_country").val()!="0")
               {
                var country_id=$(this).val();
                $.ajax({
                    url:"{{route('search-country-cities')}}",
                    type:"GET",
                    data:{"country_id":country_id},
                    success:function(response)
                    {

                        $("#agent_city").html(response);
                        $('#agent_city').select2();
                        $("#city_div").show();


                    }
                });
            }

        });
        </script>

    </body>

    </html>

    </body>


    </html>
