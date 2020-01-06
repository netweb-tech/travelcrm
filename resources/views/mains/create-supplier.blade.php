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
                                <h3 class="page-title">Supplier Management</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#"><i
                                                        class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Dashboard</li>
                                            <li class="breadcrumb-item" aria-current="page">Supplier Management</li>
                                            <li class="breadcrumb-item active" aria-current="page">Create New
                                                Supplier
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
                                    <h4 class="box-title">Create Supplier</h4>
                                </div>
                                <div class="box-body">
                                    <form id="supplier_form" enctype="multipart/form-data" method="POST">
                                        {{csrf_field()}}

                                        <div class="row mb-10">
                                            <div class="col-sm-12 col-md-12 col-lg-6">
                                                <div class="form-group">
                                                    <label>SUPPLIER NAME <span class="asterisk">*</span></label>
                                                    <input type="text" class="form-control" placeholder="SUPPLIER NAME "
                                                        name="supplier_name" id="supplier_name">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-6">

                                            </div>
                                        </div>
                                        <div class="row mb-10">
                                            <div class="col-sm-12 col-md-12 col-lg-6">
                                                <div class="form-group">
                                                    <label>COMPANY NAME <span class="asterisk">*</span></label>
                                                    <input type="text" class="form-control" placeholder="COMPANY NAME "
                                                        name="company_name" id="company_name">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-6">

                                            </div>
                                        </div>
                                        <div class="row mb-10">
                                            <div class="col-sm-12 col-md-12 col-lg-6">
                                                <div class="form-group">
                                                    <label>EMAIL ID <span class="asterisk">*</span></label>
                                                    <input type="text" class="form-control" placeholder="EMAIL ID"
                                                        name="email_id" id="email_id">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-6">

                                            </div>
                                        </div>
                                        <div class="row mb-10">
                                            <div class="col-sm-12 col-md-12 col-lg-6">
                                                <div class="form-group">
                                                    <label>CONTACT NUMBER <span class="asterisk">*</span></label>
                                                    <div class="intl-tel-input">
                                                        <input type="text" class="form-control input-lg"
                                                            id="contact_number" name="contact_number" autocomplete="off"
                                                            placeholder="Enter Mobile Number">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-6">

                                            </div>




                                        </div>
                                        <div class="row mb-10">
                                            <div class="col-sm-12 col-md-12 col-lg-6">
                                                <div class="form-group">
                                                    <label>FAX NUMBER <span class="asterisk">*</span></label>
                                                    <input type="text" class="form-control" placeholder="FAX NUMBER"
                                                        name="fax_number" id="fax_number">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-6">

                                            </div>
                                        </div>
                                        <div class="row mb-10">
                                            <div class="col-sm-12 col-md-12 col-lg-6">
                                                <div class="form-group">
                                                    <label>Supplier Reference ID <span class="asterisk">*</span></label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Supplier Reference ID" name="supplier_reference_id"
                                                        id="supplier_reference_id">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-6">

                                            </div>
                                        </div>
                                        <div class="row mb-10">
                                            <div class="col-sm-12 col-md-12 col-lg-6">
                                                <div class="form-group">
                                                    <label>ADDRESS LINE 1 <span class="asterisk">*</span></label>
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
                                                    <div class="form-group">

                                                        <div class="form-group">
                                                            <label>COUNTRY <span class="asterisk">*</span></label>
                                                            <select class="form-control" name="supplier_country"
                                                                id="supplier_country">
                                                                <option selected="selected" hidden value="0">SELECT
                                                                    COUNTRY</option>

                                                                @foreach($countries as $country)

                                                                <option value="{{$country->country_id}}">
                                                                    {{$country->country_name}}</option>

                                                                @endforeach
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
                                                            <label>CITY <span class="asterisk">*</span></label>
                                                            <input type="text" class="form-control" placeholder="CITY"
                                                                name="supplier_city" id="supplier_city">
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
                                                    <input type="text" class="form-control"
                                                        placeholder="CORPORATE REG NO" name="corporate_reg_no"
                                                        id="corporate_reg_no">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-6">

                                            </div>
                                        </div>
                                        <div class="row mb-10">
                                            <div class="col-sm-12 col-md-12 col-lg-6">
                                                <div class="form-group">
                                                    <label>CORPORATE DESCRIPTION <span class="asterisk">*</span></label>
                                                    <textarea rows="5" cols="5" class="form-control"
                                                        placeholder="CORPORATE DESCRIPTION "
                                                        name="corporate_description"
                                                        id="corporate_description"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-6">

                                            </div>
                                        </div>
                                        <div class="row mb-10">
                                            <div class="col-sm-12 col-md-12 col-lg-6">
                                                <div class="form-group">
                                                    <label>SKYPE ID </label>
                                                    <input type="text" class="form-control" placeholder="SKYPE ID"
                                                        name="skype_id" id="skype_id">
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
                                                                <input type="text" class="form-control timepicker"
                                                                    name="operating_hrs_from" id="operating_hrs_from">
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
                                                                <input type="text" class="form-control timepicker"
                                                                    name="operating_hrs_to" id="operating_hrs_to">

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

                                        <div class="row mb-10">
                                            <div class="col-sm-12 col-md-12 col-lg-6">
                                                <div class="row mb-10">


                                                    <div class="col-sm-12">

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>MONDAY <span class="asterisk">*</span></label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input name="week_monday" type="radio"
                                                                    id="week_monday_1"
                                                                    class="with-gap radio-col-primary" value="yes">
                                                                <label for="week_monday_1">Yes </label>
                                                                <input name="week_monday" type="radio"
                                                                    id="week_monday_2"
                                                                    class="with-gap radio-col-primary" value="no">
                                                                <label for="week_monday_2">No</label>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>TUESDAY <span class="asterisk">*</span></label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input name="week_tuesday" type="radio"
                                                                    id="week_tuesday_1"
                                                                    class="with-gap radio-col-primary" value="yes">
                                                                <label for="week_tuesday_1">Yes </label>
                                                                <input name="week_tuesday" type="radio"
                                                                    id="week_tuesday_2"
                                                                    class="with-gap radio-col-primary" value="no">
                                                                <label for="week_tuesday_2">No</label>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>WEDNESDAY <span class="asterisk">*</span></label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input name="week_wednesday" type="radio"
                                                                    id="week_wednesday_1"
                                                                    class="with-gap radio-col-primary" value="yes">
                                                                <label for="week_wednesday_1">Yes </label>
                                                                <input name="week_wednesday" type="radio"
                                                                    id="week_wednesday_2"
                                                                    class="with-gap radio-col-primary" value="no">
                                                                <label for="week_wednesday_2">No</label>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>THURSDAY <span class="asterisk">*</span></label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input name="week_thursday" type="radio"
                                                                    id="week_thursday_1"
                                                                    class="with-gap radio-col-primary" value="yes">
                                                                <label for="week_thursday_1">Yes </label>
                                                                <input name="week_thursday" type="radio"
                                                                    id="week_thursday_2"
                                                                    class="with-gap radio-col-primary" value="no">
                                                                <label for="week_thursday_2">No</label>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>FRIDAY <span class="asterisk">*</span></label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input name="week_friday" type="radio"
                                                                    id="week_friday_1"
                                                                    class="with-gap radio-col-primary" value="yes">
                                                                <label for="week_friday_1">Yes </label>
                                                                <input name="week_friday" type="radio"
                                                                    id="week_friday_2"
                                                                    class="with-gap radio-col-primary" value="no">
                                                                <label for="week_friday_2">No</label>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>SATURDAY <span class="asterisk">*</span></label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input name="week_saturday" type="radio"
                                                                    id="week_saturday_1"
                                                                    class="with-gap radio-col-primary" value="yes">
                                                                <label for="week_saturday_1">Yes </label>
                                                                <input name="week_saturday" type="radio"
                                                                    id="week_saturday_2"
                                                                    class="with-gap radio-col-primary" value="no">
                                                                <label for="week_saturday_2">No</label>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>SUNDAY <span class="asterisk">*</span></label>
                                                            </div>
                                                            <div class="col-md-6">

                                                                <input name="week_sunday" type="radio"
                                                                    id="week_sunday_1"
                                                                    class="with-gap radio-col-primary" value="yes">
                                                                <label for="week_sunday_1">Yes </label>
                                                                <input name="week_sunday" type="radio"
                                                                    id="week_sunday_2"
                                                                    class="with-gap radio-col-primary" value="no">
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
                                                            name="supplier_certificate_file"
                                                            onchange="previewFile('certificate')">

                                                        <button type="button"
                                                            onclick="document.getElementById('upload_certificate').click()"
                                                            id="upload_0" class="btn red btn-outline btn-circle">+

                                                        </button>
                                                    </div>
                                                    <br>

                                                    <!-- ngRepeat: (itemindex,item) in temp_loop.enquiry_comment_attachment track by $index -->

                                                    <img id="certificate_preview" src="" height="200"
                                                        alt="CERTIFICATE Preview..." style="display:none">
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
                                                            name="supplier_logo_file" onchange="previewFile('logo')">

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
                                            <div class="col-sm-12 col-md-12 col-lg-6">

                                            </div>


                                            <div class="col-sm-12 col-md-12 col-lg-6">
                                                <div class="form-group">


                                                    <div class="form-group">
                                                        <label>SUPPLIER CURRENCY <span class="asterisk">*</span></label>
                                                        <select class="form-control
                                    " style="width: 100%;" tabindex="-1" aria-hidden="true" id="supplier_opr_currency"
                                                            name="supplier_opr_currency[]" multiple="multiple">

                                                            @foreach($currency as $curr)

                                                            <option value="{{$curr->code}}">{{$curr->code}}
                                                                ({{$curr->name}})</option>

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
                                                        <label>SUPPLIER COUNTRY OF OPERATION <span
                                                                class="asterisk">*</span></label>
                                                        <select class="form-control select2 " style="width: 100%;"
                                                            tabindex="-1" aria-hidden="true" id="supplier_opr_countries"
                                                            name="supplier_opr_countries[]" multiple="multiple">
                                                            @foreach($countries as $country)

                                                            <option value="{{$country->country_id}}">
                                                                {{$country->country_name}}</option>

                                                            @endforeach
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-6">

                                            </div>

                                            <div class="col-sm-12 col-md-12 col-lg-6">
                                                <div class="form-group">
                                                    <label style="display:block">BLACKOUT DAYS :
                                                        <!-- <span class="asterisk">*</span> --></label>
                                                    <input type="text" class="form-control blackout_datepicker"
                                                        id="blackout_days" name="blackout_days" readonly="readonly">
                                                    <div id="datepicker"></div>
                                                    <!--  <table id="calendar-demo" class="calendar"></table> -->
                                                    <!-- /.input group -->
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-6">

                                            </div>

                                            <div class="col-sm-12">
                                                <div class="box-header with-border"
                                                    style="padding: 10px;border-color: #c3c3c3;">

                                                </div>
                                                <h4 class="box-title" style="border-color: #c1c1c1;margin-top: 25px;">
                                                    <i class="fa fa-plus-circle"></i> SERVICE BANK DETAIL </h4>

                                            </div>

                                        </div>
                                      <!--   <button type="button" class="btn btn-rounded btn-primary mr-10"
                                            data-toggle="collapse" data-target="#demo">Add
                                            Service Bank Detail</button> -->

                                        <div class="row mb-10">
                                            <div class="col-sm-12 ">
                                               <!--  <div id="demo" class="collapse"> -->
                                                    <div class="row">
                                                        <div class="col-md-6 bank_div" id="bank_div_1"
                                                            style="padding:0">

                                                            <div class="col-sm-12 col-md-12 mt-20">
                                                                <div class="form-group">
                                                                    <label>ACCOUNT NUMBER <span
                                                                            class="asterisk">*</span></label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="ACCOUNT NUMBER"
                                                                        id="account_number_1" name="account_number[]">
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="form-group">
                                                                    <label>BANK NAME <span
                                                                            class="asterisk">*</span></label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="BANK NAME" id="bank_name_1"
                                                                        name="bank_name[]">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="form-group">
                                                                    <label>BANK SWIFT CODE <span
                                                                            class="asterisk">*</span></label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="BANK SWIFT CODE" id="bank_swift_1"
                                                                        name="bank_swift[]">
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="form-group">
                                                                    <label>BANK IBAN CODE <span
                                                                            class="asterisk">*</span></label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="BANK IBAN CODE" id="bank_iban_1"
                                                                        name="bank_iban[]">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="form-group">
                                                                    <div class="form-group">
                                                                        <label>CURRENCY <span
                                                                                class="asterisk">*</span></label>
                                                                        <select class="form-control"
                                                                            style="width: 100%;" tabindex="-1"
                                                                            aria-hidden="true" id="bank_currency_1"
                                                                            name="bank_currency[]">
                                                                            <option selected="selected" value="0">Select
                                                                                Currency</option>
                                                                            @foreach($currency as $curr)

                                                                            <option value="{{$curr->code}}">
                                                                                {{$curr->code}} ({{$curr->name}})
                                                                            </option>

                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                </div>
                                                                <div class="col-sm-6 col-md-12"
                                                                    style="display: flex;justify-content: flex-end;">
                                                                    <!-- <img class="plus-icon" style="display: block;" src="{{ asset('assets/images/minus_icon.png') }}"> -->
                                                                    <img id="add_more_bank1"
                                                                        class="plus-icon add_more_bank"
                                                                        style="display: block;"
                                                                        src="{{ asset('assets/images/add_icon.png') }}">

                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
                                               <!--  </div> -->
                                            </div>
                                           
                                        </div>
                                        <div class="row mb-10">

                                            <div class="col-sm-12 col-md-12 col-lg-6">

                                            </div>

                                            <div class="col-sm-12">
                                                <div class="box-header with-border"
                                                    style="padding: 10px;border-color: #c3c3c3;">

                                                </div>
                                                <h4 class="box-title" style="border-color: #c1c1c1;margin-top: 25px;">
                                                    <i class="fa fa-plus-circle"></i> SERVICE TYPE DETAIL </h4>

                                            </div>
                                        </div>




                                        <div class="row mb-10">

                                            <div class="col-sm-12 col-md-12 col-lg-6">
                                             <!--    <button type="button" class="btn btn-rounded btn-primary mr-10"
                                                    data-toggle="collapse" data-target="#demo1">Add
                                                    PROMOTION DETAIL</button> -->

                                               <!--  <div id="demo1" class="collapse"> -->
                                                    <div class="col-sm-12 col-md-12 mt-20">
                                                        <div class="form-group">
                                                            <div class="form-group">
                                                                <label>SERVICE TYPE <span
                                                                        class="asterisk">*</span></label>
                                                                <select class="form-control" style="width: 100%;"
                                                                    tabindex="-1" aria-hidden="true" multiple="multiple"
                                                                    name="service_type[]" id="service_type">
                                                                    <option value="hotel">Hotel</option>
                                                                    <option value="activity">Activity</option>
                                                                    <option value="transportation">Transportation
                                                                    </option>
                                                                    <option value="guide">Guide
                                                                    </option>
                                                                    
                                                                </select>
                                                            </div>

                                                        </div>
                                                    </div>



                                                <!-- </div> -->

                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-6">

                                            </div>

                                            <div class="col-sm-12">
                                                <div class="box-header with-border"
                                                    style="padding: 10px;border-color: #c3c3c3;">

                                                </div>
                                                <h4 class="box-title" style="border-color: #c1c1c1;margin-top: 25px;">
                                                    <i class="fa fa-plus-circle"></i> CONTACT PERSON </h4>

                                            </div>

                                        </div>
                                      <!--   <button type="button" class="btn btn-rounded btn-primary mr-10"
                                            data-toggle="collapse" data-target="#demo2">Add
                                            PROMOTION DETAIL
                                        </button> -->
                                        <div class="row mb-10">
                                            <div class="col-md-12">
                                                <!-- <div id="demo2" class="collapse"> -->
                                                    <div class="row">
                                                        <div class="col-md-6 contact_div" id="contact_div_1"
                                                            style="padding:0">
                                                            <div class="col-sm-12 col-md-12 mt-20">
                                                                <div class="form-group">
                                                                    <label>CONTACT PERSON NAME <span
                                                                            class="asterisk">*</span>
                                                                    </label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="CONTACT PERSON NAME "
                                                                        id="contact_name_1"
                                                                        name="contact_person_name[]">
                                                                </div>

                                                            </div>
                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="form-group">

                                                                    <div class="form-group">
                                                                        <label>CONTACT NUMBER <span
                                                                                class="asterisk">*</span></label>
                                                                        <div class="intl-tel-input">
                                                                            <input type="text"
                                                                                class="form-control input-lg"
                                                                                id="contact_number_1"
                                                                                name="contact_person_number[]"
                                                                                autocomplete="off"
                                                                                placeholder="CONTACT NUMBER">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="form-group">
                                                                    <label>EMAIL ID <span
                                                                            class="asterisk">*</span></label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="EMAIL ID" id="contact_email_1"
                                                                        name="contact_person_email[]">
                                                                </div>

                                                                <div class="col-sm-6 col-md-12"
                                                                    style="display: flex;justify-content: flex-end;">
                                                                    <!-- <img class="plus-icon" style="display: block;" src="{{ asset('assets/images/minus_icon.png')}}"> -->
                                                                    <img id="add_more_contact1"
                                                                        class="plus-icon add_more_contact"
                                                                        style="display: block;"
                                                                        src="{{ asset('assets/images/add_icon.png')}}">

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <!-- </div> -->
                                            </div>
                                        </div>


                                        <div class="row mb-10">
                                            <div class="col-md-12">
                                                <div class="box-header with-border"
                                                    style="padding: 10px;border-bottom:none;border-radius:0;border-top:1px solid #c3c3c3">
                                                    <button type="button" id="create_supplier"
                                                        class="btn btn-rounded btn-primary mr-10">Save</button>
                                                    <button type="button" id="discard_supplier"
                                                        class="btn btn-rounded btn-primary">Discard</button>
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
                if (data == "logo") {
                    var preview = document.getElementById('logo_preview');

                    var file = document.querySelector('input[name="supplier_logo_file"]').files[0];
                } else {
                    var preview = document.getElementById('certificate_preview');

                    var file = document.querySelector('input[name="supplier_certificate_file"]').files[0];
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

            $(document).ready(function ()

                {

                    //Initialize Select2 Elements

                    $('.select2').select2();
                    $('#supplier_opr_currency').select2({
                        "placeholder": "SELECT CURRENCY",
                    });
                    $('#supplier_opr_countries').select2({
                        "placeholder": "SELECT COUNTRY",
                    });
                    $('#service_type').select2({
                        "placeholder": "SELECT SERVICE TYPE",
                    });
                    $('.timepicker').timepicker({
                        showInputs: false,
                        interval: 5,
                        timeFormat: 'HH:mm:ss',
                    });

                    var date = new Date();
                    date.setDate(date.getDate());

                    //Passport validity Date picker

                    $('#datepicker').datepicker({
                        multidate: true,
                        todayHighlight: true,
                        format: 'yyyy-mm-dd',
                    }).on('changeDate', function (e) {
                        var dates = $("#datepicker").datepicker("getDates");
                        // console.log(dates.length);
                        var datearray = [];
                        for ($datecount = 0; $datecount < dates.length; $datecount++) {
                            var datevalues = new Date(dates[$datecount]);
                            var Dates = datevalues.getFullYear() + "-" + ('0' + (datevalues.getMonth() +
                                1)).slice(-2) + "-" + ('0' + datevalues.getDate()).slice(-2);
                            datearray.push(Dates);
                        }
                        $("#blackout_days").val(datearray.join(","));
                    });
                });
        </script>
        <script>
            $("#supplier_country").on("change", function () {
                if ($(this).val() != "0") {
                    $("#city_div").show();
                }
            });
            $("#discard_supplier").on("click", function ()

                {

                    window.history.back();

                });
            $(document).on("click", ".add_more_bank", function () {
                var clone_contact = $("#bank_div_1").clone();
                var minus_url = "{!! asset('assets/images/minus_icon.png') !!}";
                var newer_id = $(".bank_div:last").attr("id");
                new_id = newer_id.split('bank_div_');

                new_id = parseInt(new_id[1]) + 1;
                clone_contact.find("input[name='account_number[]']").attr("id", "account_number_" + new_id)
                    .val("");
                clone_contact.find("input[name='account_number[]']").parent().parent().parent().attr("id",
                    "bank_div_" + new_id);
                clone_contact.find("input[name='bank_name[]']").attr("id", "bank_name_" + new_id).val("");
                clone_contact.find("input[name='bank_swift[]']").attr("id", "bank_swift_" + new_id).val("");
                clone_contact.find("input[name='bank_iban[]']").attr("id", "bank_iban_" + new_id).val("");
                clone_contact.find("select[name='bank_currency[]']").attr("id", "bank_currency_" + new_id)
                    .val(0);

                clone_contact.find(".add_more_bank").attr("src", minus_url);
                clone_contact.find(".add_more_bank").attr("id", "remove_more_bank" + new_id);
                clone_contact.find(".add_more_bank").removeClass('plus-icon add_more_bank').addClass(
                    'minus-icon remove_more_bank');
                $(".bank_div:last").after(clone_contact);
            });

            $(document).on("click", ".remove_more_bank", function () {
                var id = this.id;
                var split_id = id.split('remove_more_bank');
                $("#bank_div_" + split_id[1]).remove();
            });
            $(document).on("click", ".add_more_contact", function () {
                var clone_contact = $("#contact_div_1").clone();
                var minus_url = "{!! asset('assets/images/minus_icon.png') !!}";
                var newer_id = $(".contact_div:last").attr("id");
                new_id = newer_id.split('contact_div_');

                new_id = parseInt(new_id[1]) + 1;
                clone_contact.find("input[name='contact_person_name[]']").attr("id", "contact_name_" +
                    new_id).val("");
                clone_contact.find("input[name='contact_person_name[]']").parent().parent().parent().attr(
                    "id", "contact_div_" + new_id);
                clone_contact.find("input[name='contact_person_number[]']").attr("id", "contact_number_" +
                    new_id).val("");
                clone_contact.find("input[name='contact_person_email[]']").attr("id", "contact_email_" +
                    new_id).val("");

                clone_contact.find(".add_more_contact").attr("src", minus_url);
                clone_contact.find(".add_more_contact").attr("id", "remove_more_contact" + new_id);
                clone_contact.find(".add_more_contact").removeClass('plus-icon add_more_contact').addClass(
                    'minus-icon remove_more_contact');
                $(".contact_div:last").after(clone_contact);
            });

            $(document).on("click", ".remove_more_contact", function () {
                var id = this.id;
                var split_id = id.split('remove_more_contact');
                $("#contact_div_" + split_id[1]).remove();
            });



            $(document).on("click", "#create_supplier", function ()

                {

                    var supplier_name = $("#supplier_name").val();

                    var company_name = $("#company_name").val();

                    var email_id = $("#email_id").val();

                    var contact_number = $("#contact_number").val();

                    var fax_number = $("#fax_number").val();

                    var supplier_reference_id = $("#supplier_reference_id").val();

                    var address = $("#address").val();

                    var supplier_country = $("#supplier_country").val();

                    var supplier_city = $("#supplier_city").val();

                    var corporate_description = $("#corporate_description").val();

                    var corporate_description = $("#corporate_description").val();

                    var week_monday = $("input[name='week_monday']:checked").val();

                    var week_tuesday = $("input[name='week_tuesday']:checked").val();

                    var week_wednesday = $("input[name='week_wednesday']:checked").val();

                    var week_thursday = $("input[name='week_thursday']:checked").val();

                    var week_friday = $("input[name='week_friday']:checked").val();

                    var week_saturday = $("input[name='week_saturday']:checked").val();

                    var week_sunday = $("input[name='week_sunday']:checked").val();

                    var supplier_opr_currency = $("#supplier_opr_currency").val();
                    var supplier_opr_countries = $("#supplier_opr_countries").val();

                    // var blackout_days=$("#blackout_days").val(); 

                    var service_type = $("#service_type").val();


                    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;



                    if (supplier_name.trim() == "")

                    {

                        $("#supplier_name").css("border", "1px solid #cf3c63");

                    } else

                    {

                        $("#supplier_name").css("border", "1px solid #9e9e9e");

                    }



                    if (company_name.trim() == "")

                    {

                        $("#company_name").css("border", "1px solid #cf3c63");

                    } else

                    {

                        $("#company_name").css("border", "1px solid #9e9e9e");

                    }

                    if (email_id.trim() == "")

                    {

                        $("#email_id").css("border", "1px solid #cf3c63");

                    } else

                    {
                        $("#email_id").css("border", "1px solid #9e9e9e");

                    }
                    if (email_id.trim() != "" && !regex.test(email_id))

                    {

                        $("#email_id").css("border", "1px solid #cf3c63");

                    }
                    if (contact_number.trim() == "")

                    {

                        $("#contact_number").css("border", "1px solid #cf3c63");

                    } else

                    {
                        $("#contact_number").css("border", "1px solid #9e9e9e");

                    }
                    if (fax_number.trim() == "")

                    {

                        $("#fax_number").css("border", "1px solid #cf3c63");

                    } else

                    {
                        $("#fax_number").css("border", "1px solid #9e9e9e");

                    }

                    if (supplier_reference_id.trim() == "")

                    {

                        $("#supplier_reference_id").css("border", "1px solid #cf3c63");

                    } else

                    {
                        $("#supplier_reference_id").css("border", "1px solid #9e9e9e");

                    }
                    if (address.trim() == "")

                    {

                        $("#address").css("border", "1px solid #cf3c63");

                    } else

                    {
                        $("#address").css("border", "1px solid #9e9e9e");

                    }
                    if (supplier_country.trim() == "0")

                    {

                        $("#supplier_country").css("border", "1px solid #cf3c63");

                    } else

                    {
                        $("#supplier_country").css("border", "1px solid #9e9e9e");

                    }
                    if (supplier_city.trim() == "")

                    {

                        $("#supplier_city").css("border", "1px solid #cf3c63");

                    } else

                    {
                        $("#supplier_city").css("border", "1px solid #9e9e9e");

                    }
                    if (corporate_description.trim() == "") {
                        $("#corporate_description").css("border", "1px solid #cf3c63");
                    } else {
                        $("#corporate_description").css("border", "1px solid #9e9e9e");
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
                    if (supplier_opr_currency == "") {
                        $("#supplier_opr_currency").parent().find("label").css("border", "1px solid #cf3c63");
                    } else {
                        $("#supplier_opr_currency").parent().find("label").css("border", "1px solid white");
                    }
                    if (supplier_opr_countries == "") {
                        $("#supplier_opr_countries").parent().find("label").css("border", "1px solid #cf3c63");
                    } else {
                        $("#supplier_opr_countries").parent().find("label").css("border", "1px solid white");
                    }
                    //  if(blackout_days.trim()=="")
                    // {
                    //     $("#blackout_days").css("border","1px solid #cf3c63");
                    // }
                    // else
                    // {
                    //  $("#blackout_days").css("border","1px solid #9e9e9e"); 
                    // }
                    if (service_type == "") {
                        $("#service_type").parent().find("label").css("border", "1px solid #cf3c63");
                    } else {
                        $("#service_type").parent().find("label").css("border", "1px solid white");
                    }
                    var account_number = 1;
                    var account_number_error = 0;
                    $("input[name='account_number[]']").each(function () {

                        if ($(this).val() == "") {
                            $("#account_number_" + account_number).css("border", "1px solid #cf3c63");
                            $("#account_number_" + account_number).focus();
                            account_number_error++;
                        } else {
                            $("#account_number_" + account_number).css("border", "1px solid #9e9e9e");
                        }
                        account_number++;

                    });
                    var bank_name = 1;
                    var bank_name_error = 0;
                    $("input[name='bank_name[]']").each(function () {

                        if ($(this).val() == "") {
                            $("#bank_name_" + bank_name).css("border", "1px solid #cf3c63");
                            $("#bank_name_" + bank_name).focus();
                            bank_name_error++;
                        } else {
                            $("#bank_name_" + bank_name).css("border", "1px solid #9e9e9e");
                        }
                        bank_name++;

                    });

                    var bank_swift = 1;
                    var bank_swift_error = 0;
                    $("input[name='bank_swift[]']").each(function () {

                        if ($(this).val() == "") {
                            $("#bank_swift_" + bank_swift).css("border", "1px solid #cf3c63");
                            $("#bank_swift_" + bank_swift).focus();
                            bank_swift_error++;
                        } else {
                            $("#bank_swift_" + bank_swift).css("border", "1px solid #9e9e9e");
                        }
                        bank_swift++;

                    });

                    var bank_iban = 1;
                    var bank_iban_error = 0;
                    $("input[name='bank_iban[]']").each(function () {

                        if ($(this).val() == "") {
                            $("#bank_iban_" + bank_iban).css("border", "1px solid #cf3c63");
                            $("#bank_iban_" + bank_iban).focus();
                            bank_iban_error++;
                        } else {
                            $("#bank_iban_" + bank_iban).css("border", "1px solid #9e9e9e");
                        }
                        bank_iban++;

                    });
                    var bank_currency = 1;
                    var bank_currency_error = 0;
                    $("select[name='bank_currency[]']").each(function () {

                        if ($(this).val() == "0") {
                            $("#bank_currency_" + bank_currency).css("border", "1px solid #cf3c63");
                            $("#bank_currency_" + bank_currency).focus();
                            bank_currency_error++;
                        } else {
                            $("#bank_currency_" + bank_currency).css("border", "1px solid #9e9e9e");
                        }
                        bank_currency++;

                    });

                    var contact_person_name = 1;
                    var contact_person_name_error = 0;
                    $("input[name='contact_person_name[]']").each(function () {

                        if ($(this).val() == "") {
                            $("#contact_name_" + contact_person_name).css("border",
                                "1px solid #cf3c63");
                            $("#contact_name_" + contact_person_name).focus();
                            contact_person_name_error++;

                        } else {
                            $("#contact_name_" + contact_person_name).css("border",
                                "1px solid #9e9e9e");
                        }
                        contact_person_name++;

                    });

                    var contact_person_number = 1;
                    var contact_person_number_error = 0;
                    $("input[name='contact_person_number[]']").each(function () {

                        if ($(this).val() == "") {
                            $("#contact_number_" + contact_person_number).css("border",
                                "1px solid #cf3c63");
                            $("#contact_number_" + contact_person_number).focus();
                            contact_person_number_error++;
                        } else {
                            $("#contact_number_" + contact_person_number).css("border",
                                "1px solid #9e9e9e");
                        }
                        contact_person_number++;

                    });

                    var contact_person_email = 1;
                    var contact_person_email_error = 0;
                    $("input[name='contact_person_email[]']").each(function () {

                        if ($(this).val() == "") {
                            $("#contact_email_" + contact_person_email).css("border",
                                "1px solid #cf3c63");
                            $("#contact_email_" + contact_person_email).focus();
                            contact_person_email_error++;
                        } else if ($(this).val() != "" && !regex.test($(this).val())) {
                            $("#contact_email_" + contact_person_email).css("border",
                                "1px solid #cf3c63");
                            $("#contact_email_" + contact_person_email).focus();
                            contact_person_email_error++;
                        } else {
                            $("#contact_email_" + contact_person_email).css("border",
                                "1px solid #9e9e9e");
                        }
                        contact_person_email++;

                    });




                    if (supplier_name.trim() == "") {
                        $("#supplier_name").focus();
                    } else if (company_name.trim() == "") {
                        $("#company_name").focus();
                    } else if (email_id.trim() == "") {
                        $("#email_id").focus();
                    } else if (email_id.trim() != "" && !regex.test(email_id)) {
                        $("#email_id").focus();
                    } else if (contact_number.trim() == "") {
                        $("#contact_number").focus();
                    } else if (fax_number.trim() == "") {
                        $("#fax_number").focus();
                    } else if (supplier_reference_id.trim() == "") {
                        $("#supplier_reference_id").focus();
                    } else if (address.trim() == "") {
                        $("#address").focus();
                    } else if (supplier_country.trim() == "0") {
                        $("#supplier_country").focus();
                    } else if (supplier_city.trim() == "") {
                        $("#supplier_city").focus();
                    } else if (corporate_description.trim() == "0") {
                        $("#corporate_description").focus();
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
                    } else if (supplier_opr_currency == "") {
                        $("#supplier_opr_currency").focus();
                    } else if (supplier_opr_countries == "") {
                        $("#supplier_opr_countries").focus();
                    }
                    // else if(blackout_days.trim()=="")
                    // {
                    //     $("#blackout_days").focus();
                    // }
                    else if (account_number_error > 0) {

                    } else if (bank_name_error > 0) {

                    } else if (bank_swift_error > 0) {

                    } else if (bank_currency_error > 0) {

                    } else if (bank_iban_error > 0) {

                    } else if (service_type == "") {
                        $("#service_type").focus();
                    } else if (contact_person_name_error > 0) {

                    } else if (contact_person_email_error > 0) {

                    } else if (contact_person_number_error > 0) {

                    } else

                    {

                        $("#create_supplier").prop("disabled",true);

                        var formdata = new FormData($("#supplier_form")[0]);

                        $.ajax({

                            url: "{{route('insert-supplier')}}",
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
                                        "Supplier with this email or username already exists");

                                } else if (response.indexOf("success") != -1)

                                {

                                    swal({
                                            title: "Success",
                                            text: "Supplier Created Successfully !",
                                            type: "success"
                                        },

                                        function () {

                                            location.reload();

                                        });

                                } else if (response.indexOf("fail") != -1)

                                {

                                    swal("ERROR", "Supplier cannot be inserted right now! ");

                                }

                                $("#create_supplier").prop("disabled", false);

                            }

                        });

                    }







                });
        </script>

</body>

</html>

</body>


</html>
