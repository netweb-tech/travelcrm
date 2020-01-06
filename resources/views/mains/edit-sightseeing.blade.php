@include('mains.includes.top-header')
<style>
    header.main-header {
          background: url("{{ asset('assets/images/color-plate/theme-purple.jpg') }}");
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
                            <li class="breadcrumb-item active" aria-current="page">Edit SightSeeing
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
                        <a class="dropdown-item" href="#"><i class="mdi mdi-share"></i>sightseeing</a>
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
                    <h4 class="box-title">Edit SightSeeing</h4>
                </div>
                <div class="box-body">
                    <form id="sightseeing_form" encytpe="multipart/form-data">
                        {{csrf_field()}}
                    <div class="row mb-10">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="sightseeing_name">TOUR NAME <span class="asterisk">*</span></label>
                                <input type="text" id="sightseeing_name" name="sightseeing_name" class="form-control" placeholder="TOUR NAME " value="{{$get_sightseeing->sightseeing_tour_name}}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">

                        </div>
                    </div>
                  
                     <div class="row mb-10">
                        <div class="col-md-12">
                           <div class="row mb-10">
                                <div class="col-sm-12">
                                    <div class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;">

                                    </div>
                                    <h4 class="box-title" style="border-color: #c1c1c1;margin-top: 25px;">
                                        <i class="fa fa-plus-circle"></i> TOUR DESCRIPTION <span class="asterisk">*</span> </h4>

                                </div>
                                <div class="col-sm-12">
                                    <div class="box">

                                        <!-- /.box-header -->
                                        <div class="box-body">
                                <textarea id="sightseeing_desc" name="sightseeing_desc" class="form-control" placeholder="TOUR DESCRIPTION">{{$get_sightseeing->sightseeing_tour_desc}}</textarea>
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
                                        <i class="fa fa-plus-circle"></i> TOUR ATTRACTIONS <span class="asterisk">*</span> </h4>

                                </div>
                                <div class="col-sm-12">
                                    <div class="box">

                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <textarea class="form-control" id="tour_attractions" name="tour_attractions">{{$get_sightseeing->sightseeing_attractions}}</textarea>
                                        </div>
                                    </div>
                                </div>





                            </div>
                        </div>
                    </div>

                    {{-- <div class="row mb-10">

                        <div class="col-sm-12 col-md-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="supplier_name">SUPPLIER <span class="asterisk">*</span></label>
                                        <select id="supplier_name" name="supplier_name" class="form-control select2" style="width: 100%;">
                                            <option value="0" hidden>Select Supplier</option>
                                           @foreach($suppliers as $supplier)
                                           <option value="{{$supplier->supplier_id}}">{{$supplier->supplier_name}}</option>  
                                           @endforeach
                                        </select>
                                    </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">

                        </div>

                    </div>--}}
                     <div class="row mb-10">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="sightseeing_cities_covered">CITIES COVERED <span class="asterisk">*</span></label>
                                <input type="text" id="sightseeing_cities_covered" name="sightseeing_cities_covered" class="form-control" placeholder="Cities Covered" value="{{$get_sightseeing->sightseeing_city_covered}}" >
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">

                        </div>
                    </div>
                      <div class="row mb-10">

                        <div class="col-sm-12 col-md-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="sightseeing_country">COUNTRY <span class="asterisk">*</span></label>
                                        <select id="sightseeing_country" name="sightseeing_country" class="form-control select2" style="width: 100%;">
                                            <option selected="selected">SELECT COUNTRY</option>
                                            @foreach($countries as $country)
                                            @if($country->country_id==$get_sightseeing->sightseeing_country)
                                            <option value="{{$country->country_id}}" selected="selected">{{$country->country_name}}</option>
                                            @else
                                             <option value="{{$country->country_id}}">{{$country->country_name}}</option>
                                            @endif
                                            @endforeach

                                        </select>
                                    </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">

                        </div>
                    </div>
                     <div class="row mb-10" id="acitvity_city_from_div" >
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                        <label for="sightseeing_city_from">FROM CITY<span class="asterisk">*</span></label>
                                        <select id="sightseeing_city_from" name="sightseeing_city_from" class="form-control select2" style="width: 100%;">
                                            <option value="0" hidden="hidden">SELECT CITY</option>
                                             @foreach($cities as $city)
                                           
                                                            @if($city->id==$get_sightseeing->sightseeing_city_from)

                                                            <option value="{{$city->id}}" selected="selected">{{$city->name}}</option>

                                                            @else

                                                            <option value="{{$city->id}}" >{{$city->name}}</option>

                                                            @endif  
                                            @endforeach

                                        </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-10" id="acitvity_city_between_div" @if($get_sightseeing->sightseeing_city_covered<=2) style="display:none" @endif>
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                        <label for="sightseeing_city_between">IN BETWEEN CITIES <span class="asterisk">*</span></label>
                                        <select id="sightseeing_city_between" name="sightseeing_city_between[]" class="form-control select2" style="width: 100%;" multiple="multiple">
                                            <option  value="0" hidden="hidden">SELECT CITY</option>
                                             <?php
                                            if($get_sightseeing->sightseeing_city_between!="")
                                            {
                                                $all_cities_between=explode(",",$get_sightseeing->sightseeing_city_between);
                                            

                                            ?>
                                            @foreach($cities as $city)

                                            @if(in_array($city->id, $all_cities_between))

                                            <option value="{{$city->id}}" selected="selected">{{$city->name}}</option>

                                            @else

                                            <option value="{{$city->id}}" >{{$city->name}}</option>

                                            @endif  
                                            @endforeach

                                            <?php
                                        }

                                            ?>
                                        </select>
                            </div>
                        </div>
                    </div>
                     <div class="row mb-10" id="acitvity_city_to_div">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                        <label for="sightseeing_city_to">TO CITY<span class="asterisk">*</span></label>
                                        <select id="sightseeing_city_to" name="sightseeing_city_to" class="form-control select2" style="width: 100%;">
                                            <option value="0" hidden="hidden">SELECT CITY</option>
                                             @foreach($cities as $city)
                                           
                                                            @if($city->id==$get_sightseeing->sightseeing_city_to)

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
                                <label for="sightseeing_distance">DISTANCE COVERED <small>(in kms)</small> <span class="asterisk">*</span></label>
                                <input type="text" class="form-control" placeholder="DISTANCE COVERED (in kms)" id="sightseeing_distance" name="sightseeing_distance" onkeypress="javascript:return validateNumber(event)" value="{{$get_sightseeing->sightseeing_distance_covered}}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">

                        </div>
                    </div>
                     <div class="row mb-10">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="sightseeing_fuel_type">FUEL TYPE <span class="asterisk">*</span></label>
                                        <select id="sightseeing_fuel_type" name="sightseeing_fuel_type" class="form-control select2" style="width: 100%;">
                                            <option value="0" hidden>SELECT FUEL TYPE</option>
                                            @foreach($fuel_type as $fueltype)

                                            @if($fueltype->fuel_type_id==$get_sightseeing->sightseeing_fuel_type)

                                            <option value="{{$fueltype->fuel_type_id}}" selected="selected">{{$fueltype->fuel_type}}</option>  

                                            @else

                                            <option value="{{$fueltype->fuel_type_id}}">{{$fueltype->fuel_type}}</option>  

                                            @endif 

                                            @endforeach
                                        </select>
                                      <!--   <input type="hidden" id="sightseeing_fuel_cost" name="sightseeing_fuel_cost" value="0"> -->
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">

                        </div>
                    </div>
                     <div class="row mb-10" style="display: none">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="sightseeing_total_fuel_cost">TOTAL FUEL COST <span class="asterisk">*</span></label>
                                <input type="text" class="form-control" placeholder="TOTAL FUEL COST" id="sightseeing_total_fuel_cost" name="sightseeing_total_fuel_cost" onkeypress="javascript:return validateNumber(event)" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">

                        </div>
                    </div>

                     <div class="row mb-10">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="sightseeing_food_cost">FOOD COST <span class="asterisk">*</span></label>
                                <input type="text" class="form-control" placeholder="FOOD COST" id="sightseeing_food_cost" name="sightseeing_food_cost" onkeypress="javascript:return validateNumber(event)" value="{{$get_sightseeing->sightseeing_food_cost}}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">

                        </div>
                    </div>

                     <div class="row mb-10">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="sightseeing_hotel_cost">HOTEL COST <span class="asterisk">*</span></label>
                                <input type="text" class="form-control" placeholder="HOTEL COST" id="sightseeing_hotel_cost" name="sightseeing_hotel_cost" onkeypress="javascript:return validateNumber(event)" value="{{$get_sightseeing->sightseeing_hotel_cost}}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">

                        </div>
                    </div>

                     <div class="row mb-10">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="sightseeing_tour_expense_entrance">TOUR EXPENSE WITHOUT ENTRANCE<span class="asterisk">*</span></label>
                                <input type="text" class="form-control" placeholder="TOUR EXPENSE WITHOUT ENTRANCE" id="sightseeing_tour_expense_entrance" name="sightseeing_tour_expense_entrance" onkeypress="javascript:return validateNumber(event)" readonly="readonly" value="{{$get_sightseeing->sightseeing_total_expense_cost}}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">

                        </div>
                    </div>


                  
            
                    <div class="row mb-10">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="sightseeing_adult_cost">ENTRANCE FEES FOR 1 ADULT <span class="asterisk">*</span></label>
                                <input type="text" class="form-control" placeholder="ENTRANCE FEES FOR 1 ADULT" id="sightseeing_adult_cost" name="sightseeing_adult_cost"  onkeypress="javascript:return validateNumber(event)" value="{{$get_sightseeing->sightseeing_adult_cost}}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">

                        </div>
                    </div>


                    <div class="row mb-10">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label value="sightseeing_child_cost">ENTRANCE FEES FOR 1 CHILD <span class="asterisk">*</span> <br> <small>(2 - 10 years)</small> </label>
                                <input type="text" class="form-control" placeholder="ENTRANCE FEES FOR 1 CHILD" id="sightseeing_child_cost" name="sightseeing_child_cost" onkeypress="javascript:return validateNumber(event)"  value="{{$get_sightseeing->sightseeing_child_cost}}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">

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
                       
                        </div>

                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6">

                    </div>
                     <div id="previewImg_new" class="row">
                        @php
                        $get_sightseeing_images=unserialize($get_sightseeing->sightseeing_images);
                        if(!empty($get_sightseeing_images))
                        {

                        for($images=0;$images< count($get_sightseeing_images);$images++)
                        {
                           @endphp


                           <div class='col-md-3 already_images' id="already_images{{($images+1)}}">
                             <span class="pull-right remove_already_images" title="Delete Image" id="remove_already_images{{($images+1)}}" style="cursor:pointer"> X </span>
                            <input type="hidden" name="upload_ativity_already_images[]" value="{{$get_sightseeing_images[$images]}}">
                            <img class='upload_ativity_images_preview' src='{{ asset("assets/uploads/sightseeing_images") }}/{{$get_sightseeing_images[$images]}}' width=150 height=150 class="img img-thumbnail" />

                        </div>
                           @php
                        }
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
                            <input type="hidden" name="sightseeing_id" value="{{$get_sightseeing->sightseeing_id}}">
                            <button type="button" id="update_sightseeing" class="btn btn-rounded btn-primary mr-10">Update</button>
                            <button type="button" id="discard_sightseeing" class="btn btn-rounded btn-primary">Discard</button>
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

$(document).ready(function()
{ 
     document.getElementById('upload_ativity_images').addEventListener('change', handleFileSelect, false);
    CKEDITOR.replace('tour_attractions');
     CKEDITOR.replace('sightseeing_desc');
    $('.select2').select2();
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
                    $("#sightseeing_country").html(response);
                    $('#sightseeing_country').select2();
                    $("#sightseeing_country").prop("disabled",false);

                     $("#sightseeing_city").html("");

                }
            });
        }
    });

    $(document).on("change","#sightseeing_country,#sightseeing_cities_covered",function()
    {
         if($("#sightseeing_country").val()!="0")
        {
            var country_id=$("#sightseeing_country").val();
            $.ajax({
                url:"{{route('search-country-cities')}}",
                type:"GET",
                data:{"country_id":country_id},
                success:function(response)
                {

                    var ciites_covered=$("#sightseeing_cities_covered").val();

                    $("#sightseeing_city_from").html(response);

                    $("#sightseeing_city_between").html(response);
                    $("#sightseeing_city_to").html(response);
                    $('#sightseeing_city_from').select2();
                    $('#sightseeing_city_between').select2({"placeholder":"SELECT CITIES"});
                    $('#sightseeing_city_to').select2();
                    $("#acitvity_city_from_div").show();
                    if(ciites_covered>2)
                    {
                      $("#acitvity_city_between_div").show();
                  }
                  else
                  {
                    $("#acitvity_city_between_div").hide();

                  }

                  $("#acitvity_city_to_div").show();
                   

                }
            });
        }

    });
    
    //  $(document).on("change","#sightseeing_fuel_type",function(e)
    // {
    //             var target=e.target.id;
    //             if(target=="sightseeing_fuel_type")
    //             {
    //                  if($("#sightseeing_fuel_type").val()!="0")
    //                  {
    //                     var fuel_type_id=$(this).val();
    //                     $.ajax({
    //                         url:"{{route('searchFuelCost')}}",
    //                         type:"GET",
    //                         data:{"fuel_type_id":fuel_type_id},
    //                         success:function(response)
    //                         {
    //                             $("#sightseeing_total_fuel_cost").val($.trim(response));
    //                             // var fuelcost=$.trim(response);
    //                             // var distance=$("#sightseeing_distance").val();
    //                             // var total_fuel_cost=parseFloat(distance*fuelcost);
    //                             // $("#sightseeing_total_fuel_cost").val((Math.round((total_fuel_cost * 1000)/10)/100).toFixed(2)).trigger("change");
    //                         }
    //                     });
    //                 }
    //             }

    // });

     $(document).on("change","#sightseeing_food_cost,#sightseeing_hotel_cost",function()
     {
        // var total_fuel_cost=$("#sightseeing_total_fuel_cost").val();
        var food_cost=$("#sightseeing_food_cost").val();
        var hotel_cost=$("#sightseeing_hotel_cost").val();

        // if(total_fuel_cost=="")
        // {
        //     total_fuel_cost=0;
        // }

        if(food_cost=="")
        {
            food_cost=0;
        }

         if(hotel_cost=="")
        {
            hotel_cost=0;
        }
        // var totalcost=parseFloat(parseFloat(total_fuel_cost)+parseFloat(food_cost)+parseFloat(hotel_cost));

         var totalcost=parseFloat(parseFloat(food_cost)+parseFloat(hotel_cost));

        
        $("#sightseeing_tour_expense_entrance").val((Math.round((totalcost * 1000)/10)/100).toFixed(2));

     });
</script>
<script>
    $(document).on("click","#update_sightseeing",function()
    {
        var sightseeing_name=$("#sightseeing_name").val();
         var sightseeing_desc=CKEDITOR.instances.sightseeing_desc.getData();
        var sightseeing_cities_covered=$("#sightseeing_cities_covered").val();
        var sightseeing_country=$("#sightseeing_country").val();
        var sightseeing_city_from=$("#sightseeing_city_from").val();
        var sightseeing_city_between=$("#sightseeing_city_between").val();
        var sightseeing_city_to=$("#sightseeing_city_to").val();
        var sightseeing_distance=$("#sightseeing_distance").val();
        var sightseeing_fuel_type=$("#sightseeing_fuel_type").val();
        var sightseeing_food_cost=$("#sightseeing_food_cost").val();
        var sightseeing_hotel_cost=$("#sightseeing_hotel_cost").val();
        var sightseeing_tour_expense_entrance=$("#sightseeing_tour_expense_entrance").val();
        var sightseeing_adult_cost=$("#sightseeing_adult_cost").val();
        var sightseeing_child_cost=$("#sightseeing_child_cost").val();
          var tour_attractions= CKEDITOR.instances.tour_attractions.getData();



        if (sightseeing_name.trim() == "")
        {
            $("#sightseeing_name").css("border", "1px solid #cf3c63");

        } else

        {
            $("#sightseeing_name").css("border", "1px solid #9e9e9e");
        }

      

  if (sightseeing_cities_covered.trim() == "")
  {
    $("#sightseeing_cities_covered").css("border", "1px solid #cf3c63");

} else

{
    $("#sightseeing_cities_covered").css("border", "1px solid #9e9e9e");
}
if (sightseeing_country == "0")
{
    $("#sightseeing_country").parent().find(".select2-selection").css("border", "1px solid #cf3c63");

} else

{
   $("#sightseeing_country").parent().find(".select2-selection").css("border", "1px solid #9e9e9e");
}
if (sightseeing_city_from == "0")
{
    $("#sightseeing_city_from").parent().find(".select2-selection").css("border", "1px solid #cf3c63");
    
} else

{
   $("#sightseeing_city_from").parent().find(".select2-selection").css("border", "1px solid #9e9e9e");
}
var total_between=parseInt(sightseeing_cities_covered-2);
if (sightseeing_cities_covered>2 && sightseeing_city_between.length!=total_between)
{
    $("#sightseeing_city_between").parent().find(".select2-selection").css("border", "1px solid #cf3c63");
    
} else

{
   $("#sightseeing_city_between").parent().find(".select2-selection").css("border", "1px solid #9e9e9e");
}
if (sightseeing_city_to == "0")
{
    $("#sightseeing_city_to").parent().find(".select2-selection").css("border", "1px solid #cf3c63");
    
} else

{
   $("#sightseeing_city_to").parent().find(".select2-selection").css("border", "1px solid #9e9e9e");
}
if (sightseeing_distance.trim() == "")
{
    $("#sightseeing_distance").css("border", "1px solid #cf3c63");

} else

{
    $("#sightseeing_distance").css("border", "1px solid #9e9e9e");
}
if (sightseeing_fuel_type == "0")
{
    $("#sightseeing_fuel_type").parent().find(".select2-selection").css("border", "1px solid #cf3c63");
    
} else

{
   $("#sightseeing_fuel_type").parent().find(".select2-selection").css("border", "1px solid #9e9e9e");
}

if (sightseeing_food_cost.trim() == "")
{
    $("#sightseeing_food_cost").css("border", "1px solid #cf3c63");

} else

{
    $("#sightseeing_food_cost").css("border", "1px solid #9e9e9e");
}

if (sightseeing_hotel_cost.trim() == "")
{
    $("#sightseeing_hotel_cost").css("border", "1px solid #cf3c63");

} else

{
    $("#sightseeing_hotel_cost").css("border", "1px solid #9e9e9e");
}
if (sightseeing_tour_expense_entrance.trim() == "")
{
    $("#sightseeing_tour_expense_entrance").css("border", "1px solid #cf3c63");

} else

{
    $("#sightseeing_tour_expense_entrance").css("border", "1px solid #9e9e9e");
}
if (sightseeing_adult_cost.trim() == "")
{
    $("#sightseeing_adult_cost").css("border", "1px solid #cf3c63");

} else

{
    $("#sightseeing_adult_cost").css("border", "1px solid #9e9e9e");
}
if (sightseeing_child_cost.trim() == "")
{
    $("#sightseeing_child_cost").css("border", "1px solid #cf3c63");

} else

{
    $("#sightseeing_child_cost").css("border", "1px solid #9e9e9e");
}
if (sightseeing_desc.trim() == "")
{
    $("#cke_sightseeing_desc").css("border", "1px solid #cf3c63");

} else

{
    $("#cke_sightseeing_desc").css("border", "1px solid #9e9e9e");
}
if (tour_attractions.trim() == "")
{
    $("#cke_tour_attractions").css("border", "1px solid #cf3c63");

} else

{
    $("#cke_tour_attractions").css("border", "1px solid #9e9e9e");
}




if(sightseeing_name.trim() == "")
{
    $("#sightseeing_name").focus();
}
else if(sightseeing_cities_covered.trim() == "")
{
    $("#sightseeing_cities_covered").focus();
}
else if(sightseeing_country=="0")
{
  $("#sightseeing_country").parent().find(".select2-selection").focus();  
} 
else if(sightseeing_city_from=="0")
{
  $("#sightseeing_city_from").parent().find(".select2-selection").focus();  
}
else if(sightseeing_cities_covered>2 && sightseeing_city_between.length!=total_between)
{
  $("#sightseeing_city_between").parent().find(".select2-selection").focus();  
}
else if(sightseeing_city_to=="0")
{
  $("#sightseeing_city_to").parent().find(".select2-selection").focus();  
}
else if(sightseeing_distance.trim() == "")
{
    $("#sightseeing_distance").focus();
}
else if(sightseeing_fuel_type.trim() == "0")
{
    $("#sightseeing_fuel_type").parent().find(".select2-selection").focus();
}
else if(sightseeing_fuel_type.trim() == "")
{
    $("#sightseeing_food_cost").focus();
}
else if(sightseeing_hotel_cost.trim() == "")
{
    $("#sightseeing_hotel_cost").focus();
}
else if(sightseeing_tour_expense_entrance.trim() == "")
{
    $("#sightseeing_tour_expense_entrance").focus();
}
else if(sightseeing_adult_cost.trim() == "")
{
    $("#sightseeing_adult_cost").focus();
}
else if(sightseeing_child_cost.trim() == "")
{
    $("#sightseeing_child_cost").focus();
}
else if(sightseeing_desc.trim() == "")
{
    $("#cke_sightseeing_desc").focus();
}
else if(tour_attractions.trim()=="")
{
  $("#cke_tour_attractions").focus();  
}
else
{
    $("#update_sightseeing").prop("disabled", true);
    var formdata=new FormData($("#sightseeing_form")[0]);
      formdata.append("tour_attractions",tour_attractions);
       formdata.append("sightseeing_desc",sightseeing_desc);
    $.ajax({
        url:"{{route('update-sightseeing')}}",
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
                    "Sightseeing already exists");

            } else if (response.indexOf("success") != -1)

            {

                swal({
                    title: "Success",
                    text: "Sightseeing Updated Successfully !",
                    type: "success"
                },

                function () {

                    location.reload();

                });

            } else if (response.indexOf("fail") != -1)

            {

                swal("ERROR", "Sightseeing cannot be updated right now! ");

            }
            $("#update_sightseeing").prop("disabled", false);

        }
    });
}
});
    $(document).on("click","#discard_sightseeing",function()
    {
        window.history.back();

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
</body>


</html>
