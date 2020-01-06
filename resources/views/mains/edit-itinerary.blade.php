<?php 

use App\Http\Controllers\ServiceManagement;

?>

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

								<h3 class="page-title">Edit Itinerary</h3>

								<div class="d-inline-block align-items-center">

									<nav>

										<ol class="breadcrumb">

											<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>

											<li class="breadcrumb-item" aria-current="page">Home</li>

											<li class="breadcrumb-item" aria-current="page">Edit Itinerary</li>

										</ol>

									</nav>

								</div>

							</div>

						</div>

					</div>




@if($rights['add']==1)
					<div class="row">

						<div class="col-12">

							<div class="box">

								<div class="box-header with-border">

									<h4 class="box-title">Edit Itinerary</h4>

								</div>

								<div class="box-body">

									<form id="itinerary_form" encytpe="multipart/form-data">

										{{csrf_field()}}

										<div class="row mb-10">

											<div class="col-sm-6 col-md-6">

												<div class="form-group">

													<label for="tour_name">TOUR NAME <span class="asterisk">*</span></label>

													<input type="text" class="form-control" placeholder="TOUR NAME" id="tour_name" name="tour_name" maxlength="255" value="{{$get_itinerary->itinerary_tour_name}}">

												</div>

											</div>

											<div class="col-sm-6 col-md-6">



											</div>









										</div>

										<div class="row mb-10">



											<div class="col-sm-12 col-md-12">

												<div class="box">

													<div class="form-group">

														<label for="tour_description">TOUR DESCRIPTION<span class="asterisk">*</span> </label>

														<textarea id="tour_description" name="tour_description">{{$get_itinerary->itinerary_tour_description}}</textarea>

													</div>

												</div>

											</div>

											<div class="col-sm-6 col-md-6">



												<div class="form-group">

													<label for="occupancy">SELECT OCCUPANCY <span class="asterisk">*</span></label>

													<select class="form-control select2" style="width: 100%;" id="occupancy" name="occupancy">

														<option selected="selected" value="0" hidden>Occupancy</option>

														<option value="Single" @if($get_itinerary->itinerary_occupancy=='Single')  selected @endif>Single</option>

														<option value="Double" @if($get_itinerary->itinerary_occupancy=='Double')  selected @endif>Double</option>

														<option value="Triple" @if($get_itinerary->itinerary_occupancy=='Triple')  selected @endif>Triple</option>

														<option value="Quad" @if($get_itinerary->itinerary_occupancy=='Quad')  selected @endif>Quad</option>

														<option value="Penta" @if($get_itinerary->itinerary_occupancy=='Penta')  selected @endif>Penta</option>

														<option value="Hexa" @if($get_itinerary->itinerary_occupancy=='Hexa')  selected @endif>Hexa</option>

													</select>

												</div>



											</div>

										</div>

										<div class="row mb-10">



											<div class="col-sm-12 col-md-6">

												<div class="form-group">

													<label for="adults">ADULT<span class="asterisk">*</span> </label>

													<input type="text" class="form-control" placeholder="ADULT" id="adults" name="adults" maxlength="10"  onkeypress="javascript:return validateNumber(event)" value="{{$get_itinerary->itinerary_adult}}">

												</div>

											</div>

											<div class="col-sm-6 col-md-6">







											</div>



										</div>

										<div class="row mb-10">



											<div class="col-sm-12 col-md-6">

												<div class="row mb-10">

													<div class="col-sm-6 col-md-6">

														<div class="form-group">

															<label for="child_with_bed">CHILD WITH BED </label>

															<input type="text" class="form-control" placeholder="CHILD WITH BED" id="child_with_bed" maxlength="5" name="child_with_bed" onkeypress="javascript:return validateNumber(event)" value="{{$get_itinerary->itinerary_child_with_bed}}">

														</div>





													</div>

													<div class="col-sm-6 col-md-6">

														<div class="form-group">

															<label for="child_with_no_bed">CHILD WITH NO BED </label>

															<input type="text" class="form-control" placeholder="CHILD WITH NO BED" id="child_with_no_bed" maxlength="5" name="child_with_no_bed" onkeypress="javascript:return validateNumber(event)" value="{{$get_itinerary->itinerary_child_with_no_bed}}">

														</div>





													</div>

												</div>

											</div>

											<div class="col-sm-6 col-md-6">







											</div>



										</div>

										<div class="row">

											<div class="col-sm-6 col-md-6">



												<div class="form-group">

													<label for="country">CUSTOMER COUNTRY </label>

													<select class="form-control select2" style="width: 100%;" name="country" id="country">

														<option selected="selected" value="0" hidden="hidden">COUNTRY</option>

														@foreach($countries as $country)

														@if($country->country_id==$get_itinerary->itinerary_country)

														<option value="{{$country->country_id}}" selected="selected">{{$country->country_name}}</option>

														@else

														<option value="{{$country->country_id}}" >{{$country->country_name}}</option>

														@endif

														@endforeach

													</select>

												</div>



											</div>

											<div class="col-sm-6 col-md-6">







											</div>

										</div>

										<div class="row">

											<div class="col-sm-6 col-md-6">



												<div class="row mb-10">

													<div class="col-sm-6 col-md-6">

														<div class="form-group">

															<label>SELECT DATE</label>

															<div class="input-group date">

																<input type="text" placeholder="FROM DATE"

																class="form-control pull-right datepicker" id="tour_fromdate" name="tour_fromdate"  value="{{$get_itinerary->itinerary_tour_fromdate}}" readonly>

																<div class="input-group-addon" >

																	<i class="fa fa-calendar"></i>

																</div>

															</div>

														</div>





													</div>

													<div class="col-sm-6 col-md-6">

														<div class="form-group">

																<label>&nbsp;</label>

															<div class="input-group date">

																<input type="text" placeholder="TO DATE"

																class="form-control pull-right datepicker" id="tour_todate" value="{{$get_itinerary->itinerary_tour_todate}}"  name="tour_todate" readonly>

																<div class="input-group-addon">

																	<i class="fa fa-calendar"></i>

																</div>

															</div>

														</div>





													</div>

												</div>

											</div>

											<div class="col-sm-6 col-md-6">







											</div>

										</div>

										<div class="row " id="change_date_div">

											<div class="col-sm-6 col-md-6">



												<div class="row mb-10">

													<div class="col-sm-6 col-md-6">



													</div>

													<div class="col-sm-6 col-md-6">

														<button type="button" class="btn btn-success btn-rounded change_date">Change Date</button>

													</div>

												</div>

											</div>

											<div class="col-sm-6 col-md-6">







											</div>

										</div>

										<div class="row">

											<div class="col-md-12 days_div" id="days_div" style="display:none;">

												<div class="form-group">

													<label class="days_no">DAY</label>

													<select class="form-control days_country select2" style="width:100%;">

														<option value="0" hidden="hidden" selected="selected" disabled="">SELECT COUNTRY</option>

														@foreach($countries as $country)

														<option value="{{$country->country_id}}" >{{$country->country_name}}</option>

														@endforeach

													</select>

												</div>

												<div class="form-group days_city_div" style="display:none">

													<select class="form-control select2 days_city" style="width:100%">

														<option value="0" selected="selected" hidden="hidden" disabled="disabled">SELECT CITY</option>

													</select>

												</div>

												<div class="form-group">

													<select class="form-control select2 supplier_name" style="width:100%;" disabled="disabled">

														<option value="0"  selected="selected">SELECT SUPPLIER</option>

														@foreach($suppliers as $supplier)

														<option value="{{$supplier->supplier_id}}">{{$supplier->supplier_name}}</option>  

														@endforeach

													</select>

												</div>



												<div class="form-group">

													<select class="form-control service_type" 

													style="width:100%;"  disabled="disabled">

													<option value="0" selected="selected">SELECT SERVICE TYPE</option>

													<option value="hotel">Hotel</option>

													<option value="activity">Activity</option>

													<option value="transportation">Transportation

													</option>

												</select>

											</div>

											<div class="form-group">

												<select class="form-control select2 days_services" style="width:100%;" disabled="disabled">

													<option  value="0" selected="selected">SELECT SERVICE	</option>

												</select>

											</div>

											<div class="form-group">

												<input type="text" class="form-control days_date" name="days_date" id="days_date" readonly="readonly">

											</div>

                    					<div class="form-group add_more_div pull-right">

                    						<img id="add_more_days" class="plus-icon add_more_days" style="margin-left: auto;" src="{{ asset('assets/images/add_icon.png') }}">

                    					</div>

                </div>

            </div>



            <div class="row" id="itinerary_main_div">

				@php

					$itinerary_package_dates=unserialize($get_itinerary->itinerary_package_dates);

          			$itinerary_package_countries=unserialize($get_itinerary->itinerary_package_countries);

          			$itinerary_package_cities=unserialize($get_itinerary->itinerary_package_cities);

          			$itinerary_package_suppliers=unserialize($get_itinerary->itinerary_package_suppliers);

          			$itinerary_package_service_type=unserialize($get_itinerary->itinerary_package_service_type);

          			$itinerary_package_services=unserialize($get_itinerary->itinerary_package_services);



					$countdates=count($itinerary_package_dates);

					for($days_count=0;$days_count < $countdates;$days_count++)

					{

						$countchildates=count($itinerary_package_dates[$days_count]);





						for($days_child_count=0;$days_child_count < $countchildates;$days_child_count++)

						{

							@endphp

							<div class="col-md-12 days_div{{($days_count+1)}}" id="days_div__{{($days_count+1)}}__{{($days_child_count+1)}}">

								<div class="form-group">

									@if($days_child_count==0)

									<label class="days_no">DAY {{($days_count+1)}}:</label>

									@else

									<label class="days_no"></label>

									@endif

									<select class="form-control days_country select2" style="width:100%;" id="days_country__{{($days_count+1)}}__{{($days_child_count+1)}}" name="days_country[{{$days_count}}][]">

										<option value="0" hidden="hidden" disabled="">SELECT COUNTRY</option>

										@foreach($countries as $country)

										@if($country->country_id==$itinerary_package_countries[$days_count][$days_child_count])

										<option value="{{$country->country_id}}" selected="selected">{{$country->country_name}}</option>

										@else

										<option value="{{$country->country_id}}" >{{$country->country_name}}</option>

										@endif

										@endforeach

									</select>

								</div>

								<div class="form-group days_city_div">

									@php

									$search_city=ServiceManagement::search_country_cities_array($itinerary_package_countries[$days_count][$days_child_count],$itinerary_package_cities[$days_count][$days_child_count]);

									@endphp

									<select class="form-control select2 days_city" style="width:100%" id="days_city__{{($days_count+1)}}__{{($days_child_count+1)}}" name="days_city[{{$days_count}}][]">

										@foreach($search_city as $cities)

										@if($cities->id==$itinerary_package_cities[$days_count][$days_child_count])

										<option value="{{$cities->id}}" selected="selected">{{$cities->name}}</option>

										@else

										<option value="{{$cities->id}}" >{{$cities->name}}</option>

										@endif

										@endforeach



									</select>

								</div>

								<div class="form-group">

									<select class="form-control select2 supplier_name" style="width:100%;" id="supplier_name__{{($days_count+1)}}__{{($days_child_count+1)}}" name="supplier_name[{{$days_count}}][]">

										<option value="0"  selected="selected">SELECT SUPPLIER</option>

										@foreach($suppliers as $supplier)

										@if($supplier->supplier_id==$itinerary_package_suppliers[$days_count][$days_child_count])

										<option value="{{$supplier->supplier_id}}" selected="selected">{{$supplier->supplier_name}}</option>  

										@else

										<option value="{{$supplier->supplier_id}}">{{$supplier->supplier_name}}</option> 

										@endif

										@endforeach

									</select>

								</div>



								<div class="form-group">

									<select class="form-control service_type" 

									style="width:100%;" id="service_type__{{($days_count+1)}}__{{($days_child_count+1)}}" name="service_type[{{$days_count}}][]">

									<option value="0">SELECT SERVICE TYPE</option>

									<option value="hotel" @if($itinerary_package_service_type[$days_count][$days_child_count]=='hotel')  selected @endif>Hotel</option>

									<option value="activity" @if($itinerary_package_service_type[$days_count][$days_child_count]=='activity')  selected @endif>Activity</option>

									<option value="transportation" @if($itinerary_package_service_type[$days_count][$days_child_count]=='transportation')  selected @endif>Transportation

									</option>

								</select>

							</div>

							<div class="form-group">

								@php

									$search_services=ServiceManagement::fetch_services_array($itinerary_package_suppliers[$days_count][$days_child_count],$itinerary_package_countries[$days_count][$days_child_count],$itinerary_package_cities[$days_count][$days_child_count],$itinerary_package_service_type[$days_count][$days_child_count]);

									@endphp

								<select class="form-control select2 days_services" style="width:100%;" id="days_services__{{($days_count+1)}}__{{($days_child_count+1)}}" name="days_services[{{$days_count}}][]">

									<option value="0" selected="selected">SELECT SERVICE</option>

									@if($itinerary_package_service_type[$days_count][$days_child_count]=="activity")



									@foreach($search_services as $services)



									@if($services->activity_id==$itinerary_package_services[$days_count][$days_child_count])

									<option value='{{$services->activity_id}}' selected="selected">{{$services->activity_name}}</option>

									@else

									<option value='{{$services->activity_id}}'>{{$services->activity_name}}</option>



									@endif



									@endforeach



									@elseif($itinerary_package_service_type[$days_count][$days_child_count]=="hotel")



									@foreach($search_services as $services)



									@if($services->hotel_id==$itinerary_package_services[$days_count][$days_child_count])

									<option value='{{$services->hotel_id}}' selected="selected">{{$services->hotel_name}}</option>

									@else

									<option value='{{$services->hotel_id}}'>{{$services->hotel_name}}</option>



									@endif



									@endforeach



									@elseif($itinerary_package_service_type[$days_count][$days_child_count]=="transportation")



									@foreach($search_services as $services)



									@if($services->transport_id==$itinerary_package_services[$days_count][$days_child_count])

									<option value='{{$services->transport_id}}' selected="selected">{{$services->transfer_name}}</option>

									@else

									<option value='{{$services->transport_id}}'>{{$services->transfer_name}}</option>



									@endif

									@endforeach





									@endif

								</select>

							</div>

							<div class="form-group">

								<input type="text" class="form-control days_date" value="{{$itinerary_package_dates[$days_count][$days_child_count]}}" readonly="readonly" id="days_date__{{($days_count+1)}}__{{($days_child_count+1)}}" name="days_date[{{$days_count}}][]">

							</div>

							<div class="form-group add_more_div pull-right">

								@if($countchildates==1)

								<img id="add_more_days__{{($days_count+1)}}__{{($days_child_count+1)}}" class="plus-icon add_more_days" style="margin-left: auto;" src="{{ asset('assets/images/add_icon.png') }}">

								@endif



								@if($days_child_count>0)

								@if($days_child_count==($countchildates-1))

								<img id="remove_more_days__{{($days_count+1)}}__{{($days_child_count+1)}}" class="remove_more_days minus-icon" style=";" src="{{ asset('assets/images/minus_icon.png') }}">

								<img id="add_more_days__{{($days_count+1)}}__{{($days_child_count+1)}}" class="plus-icon add_more_days" style="margin-left: auto;" src="{{ asset('assets/images/add_icon.png') }}">

								@else

								<img id="remove_more_days__{{($days_count+1)}}__{{($days_child_count+1)}}" class="remove_more_days minus-icon" style=";" src="{{ asset('assets/images/minus_icon.png') }}">

								@endif

								@endif



								

							</div>

						</div>	

						@php

					}

				}

					

			@endphp

            </div>









            <div class="row mb-10">

            	<div class="col-md-12">

            		<div class="box-header with-border"

            		style="padding: 10px;border-bottom:none;border-radius:0;border-top:1px solid #c3c3c3">

            		<input type="hidden" name="itinerary_id" value="{{$get_itinerary->itinerary_id}}">

            		<button type="button" id="update_itinerary" class="btn btn-rounded btn-primary mr-10">Update</button>

            		<button type="button" id="discard_itinerary" class="btn btn-rounded btn-primary">Discard</button>

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

	$(document).ready(function()

	{

		CKEDITOR.replace('tour_description');



		$('.select2').select2();

		var date = new Date();

		date.setDate(date.getDate());



		$('#tour_fromdate').datepicker({

			autoclose:true,

			todayHighlight: true,

			format: 'yyyy-mm-dd',

			startDate:date

		}).on('changeDate', function (e) {

			var date_from = $("#tour_fromdate").datepicker("getDate");

			var date_to = $("#tour_todate").datepicker("getDate");

			var difference=Math.ceil(date_to-date_from)/ (1000 * 60 * 60 * 24);

			var loop=0;



			$("#itinerary_main_div").html("");

			if(!date_to)

			{

				$('#tour_todate').datepicker("setDate",date_from);



			}

			else if(date_to<date_from)

			{

				$('#tour_todate').datepicker("setDate",date_from);

			}

			$("#change_date_div").show();

			if(difference<=0)

			{

				for(loop=0;loop<1;loop++)

				{

					var currentDate=new Date(date_from);

					 currentDate.setDate(currentDate.getDate() + loop);

					var month = '' + (currentDate.getMonth() + 1);

					var day = '' + currentDate.getDate();

					var year = currentDate.getFullYear();



					if (month.length < 2)

						month = '0' + month;

					if (day.length < 2) 

						day = '0' + day;



					var actual_date=year+"-"+month+"-"+day;



					var clone_days=$("#days_div").clone();

					clone_days.find(".days_no").parent().parent().css("display","block");

					clone_days.find(".days_no").parent().parent().attr({"id":"days_div__"+(loop+1)+"__1"}).removeClass('days_div').addClass('days_div'+(loop+1));

					clone_days.find(".days_no").text("DAY "+parseInt(loop+1)+" :");

					clone_days.find(".days_country").attr({"id":"days_country__"+parseInt(loop+1)+"__1","name":"days_country["+loop+"][]"}).select2();

						clone_days.find(".days_country").siblings(".select2-container").slice(1).remove();

					clone_days.find(".days_city").attr({"id":"days_city__"+parseInt(loop+1)+"__1","name":"days_city["+loop+"][]"});

					clone_days.find(".supplier_name").attr({"id":"supplier_name__"+parseInt(loop+1)+"__1","name":"supplier_name["+loop+"][]"}).select2();

					clone_days.find(".supplier_name").siblings(".select2-container").slice(1).remove();

					clone_days.find(".days_services").attr({"id":"days_services__"+parseInt(loop+1)+"__1","name":"days_services["+loop+"][]"}).select2();

					clone_days.find(".days_services").siblings(".select2-container").slice(1).remove();

					clone_days.find(".service_type").attr({"id":"service_type__"+parseInt(loop+1)+"__1","name":"service_type["+loop+"][]"});

					clone_days.find(".days_date").attr({"id":"days_date__"+parseInt(loop+1)+"__1","name":"days_date["+loop+"][]"}).val(actual_date);

					clone_days.find(".add_more_days").attr({"id":"add_more_days__"+parseInt(loop+1)+"__1"});

				



					$("#itinerary_main_div").append(clone_days);

				}



			}

			else if(difference>0)

			{

				for(loop=0;loop<(difference+1);loop++)

				{

					var currentDate=new Date(date_from);

					 currentDate.setDate(currentDate.getDate() + loop);

					var month = '' + (currentDate.getMonth() + 1);

					var day = '' + currentDate.getDate();

					var year = currentDate.getFullYear();



					if (month.length < 2)

						month = '0' + month;

					if (day.length < 2) 

						day = '0' + day;



					var actual_date=year+"-"+month+"-"+day;



					var clone_days=$("#days_div").clone();

					clone_days.find(".days_no").parent().parent().css("display","block");

					clone_days.find(".days_no").parent().parent().attr({"id":"days_div__"+(loop+1)+"__1"}).removeClass('days_div').addClass('days_div'+(loop+1));

					clone_days.find(".days_no").text("DAY "+parseInt(loop+1)+" :");

					clone_days.find(".days_country").attr({"id":"days_country__"+parseInt(loop+1)+"__1","name":"days_country["+loop+"][]"}).select2();

						clone_days.find(".days_country").siblings(".select2-container").slice(1).remove();

					clone_days.find(".days_city").attr({"id":"days_city__"+parseInt(loop+1)+"__1","name":"days_city["+loop+"][]"});

					clone_days.find(".supplier_name").attr({"id":"supplier_name__"+parseInt(loop+1)+"__1","name":"supplier_name["+loop+"][]"}).select2();

					clone_days.find(".supplier_name").siblings(".select2-container").slice(1).remove();

					clone_days.find(".days_services").attr({"id":"days_services__"+parseInt(loop+1)+"__1","name":"days_services["+loop+"][]"}).select2();

					clone_days.find(".days_services").siblings(".select2-container").slice(1).remove();

					clone_days.find(".service_type").attr({"id":"service_type__"+parseInt(loop+1)+"__1","name":"service_type["+loop+"][]"});

					clone_days.find(".days_date").attr({"id":"days_date__"+parseInt(loop+1)+"__1","name":"days_date["+loop+"][]"}).val(actual_date);

					clone_days.find(".add_more_days").attr({"id":"add_more_days__"+parseInt(loop+1)+"__1"});

				



					$("#itinerary_main_div").append(clone_days);

				}



			}



		});



		$('#tour_todate').datepicker({

			autoclose:true,

			todayHighlight: true,

			format: 'yyyy-mm-dd',

			startDate:date

		}).on('changeDate', function (e) {

			var date_from = $("#tour_fromdate").datepicker("getDate");

			var date_to = $("#tour_todate").datepicker("getDate");

			var difference=Math.ceil(date_to-date_from)/ (1000 * 60 * 60 * 24);

			var difference1=parseInt(difference);

			var loop=0;



			$("#itinerary_main_div").html("");



			if(!date_from)

			{

				$('#tour_fromdate').datepicker("setDate",date_to);

			}

			else if(date_to<date_from)

			{

				$('#tour_fromdate').datepicker("setDate",date_to);

			}

			$("#change_date_div").show();

			if(difference>0)

			{

				for(loop=0;loop<(difference+1);loop++)

				{

					var currentDate=new Date(date_from);

					 currentDate.setDate(currentDate.getDate() + loop);

					var month = '' + (currentDate.getMonth() + 1);

					var day = '' + currentDate.getDate();

					var year = currentDate.getFullYear();



					if (month.length < 2)

						month = '0' + month;

					if (day.length < 2) 

						day = '0' + day;



					var actual_date=year+"-"+month+"-"+day;



					var clone_days=$("#days_div").clone();

					clone_days.find(".days_no").parent().parent().css("display","block");

					clone_days.find(".days_no").parent().parent().attr({"id":"days_div__"+(loop+1)+"__1"}).removeClass('days_div').addClass('days_div'+(loop+1));

					clone_days.find(".days_no").text("DAY "+parseInt(loop+1)+" :");

					clone_days.find(".days_country").attr({"id":"days_country__"+parseInt(loop+1)+"__1","name":"days_country["+loop+"][]"}).select2();

						clone_days.find(".days_country").siblings(".select2-container").slice(1).remove();

					clone_days.find(".days_city").attr({"id":"days_city__"+parseInt(loop+1)+"__1","name":"days_city["+loop+"][]"});

					clone_days.find(".supplier_name").attr({"id":"supplier_name__"+parseInt(loop+1)+"__1","name":"supplier_name["+loop+"][]"}).select2();

					clone_days.find(".supplier_name").siblings(".select2-container").slice(1).remove();

					clone_days.find(".days_services").attr({"id":"days_services__"+parseInt(loop+1)+"__1","name":"days_services["+loop+"][]"}).select2();

					clone_days.find(".days_services").siblings(".select2-container").slice(1).remove();

					clone_days.find(".service_type").attr({"id":"service_type__"+parseInt(loop+1)+"__1","name":"service_type["+loop+"][]"});

					clone_days.find(".days_date").attr({"id":"days_date__"+parseInt(loop+1)+"__1","name":"days_date["+loop+"][]"}).val(actual_date);

					clone_days.find(".add_more_days").attr({"id":"add_more_days__"+parseInt(loop+1)+"__1"});

				



					$("#itinerary_main_div").append(clone_days);

				}



			}

		});



	});

</script>



<script>

	$(document).on("change",".days_country",function()

	{

			var country_id=$(this).val();

			var country_actual_id=$(this).attr("id");

			var actual_id=country_actual_id.split("__");

			$.ajax({

				url:"{{route('search-country-cities')}}",

				type:"GET",

				data:{"country_id":country_id},

				success:function(response)

				{



					$("#"+country_actual_id).parent().parent().find('#days_city__'+actual_id[1]+'__'+actual_id[2]).html(response).select2();

					$("#"+country_actual_id).parent().parent().find('#days_city__'+actual_id[1]+'__'+actual_id[2]).siblings(".select2-container").slice(1).remove();

					$("#"+country_actual_id).parent().parent().find('.days_city_div').show();



					$("#"+country_actual_id).parent().parent().find('.supplier_name').removeAttr("disabled");



					$("#"+country_actual_id).parent().parent().find('#service_type__'+actual_id[1]+'__'+actual_id[2]).val(0);

					$("#"+country_actual_id).parent().parent().find('#supplier_name__'+actual_id[1]+'__'+actual_id[2]).val(0).trigger('change.select2');

					$("#"+country_actual_id).parent().parent().find('#days_services__'+actual_id[1]+'__'+actual_id[2]).val(0).trigger('change.select2');



				}

			});



	});



	$(document).on("change",".days_city",function()

	{

		var country_id=$(this).val();

		var country_actual_id=$(this).attr("id");

		var actual_id=country_actual_id.split("__");

		$("#"+country_actual_id).parent().parent().find('.supplier_name').removeAttr("disabled");



		$("#"+country_actual_id).parent().parent().find('#service_type__'+actual_id[1]+'__'+actual_id[2]).val(0);

		$("#"+country_actual_id).parent().parent().find('#supplier_name__'+actual_id[1]+'__'+actual_id[2]).val(0).trigger('change.select2');

		$("#"+country_actual_id).parent().parent().find('#days_services__'+actual_id[1]+'__'+actual_id[2]).val(0).trigger('change.select2');



	});



	$(document).on("change",".supplier_name",function()

	{

		var country_id=$(this).val();

		var country_actual_id=$(this).attr("id");

		var actual_id=country_actual_id.split("__");

		$("#"+country_actual_id).parent().parent().find('#service_type__'+actual_id[1]+'__'+actual_id[2]).val(0);

		$("#"+country_actual_id).parent().parent().find('#days_services__'+actual_id[1]+'__'+actual_id[2]).val(0).trigger('change.select2');



	});



	$(document).on("change",".supplier_name",function()

	{

		$(this).parent().parent().find(".service_type").removeAttr("disabled");



	});

</script>

<script>

	$(document).on("click",".change_date",function()

	{

		$("#tour_fromdate").val("");

		$("#tour_todate").val("");

		$("#itinerary_main_div").html("");

		$("#change_date_div").hide();

	})

</script>

<script>

	$(document).on("change",".service_type",function()

	{

		var id=$(this).attr("id");

		var actual_id=id.split("__");

		var service_type=$(this).val();

		var country=$("#days_country__"+actual_id[1]+'__'+actual_id[2]).val();

		var city=$("#days_city__"+actual_id[1]+'__'+actual_id[2]).val();

		var supplier_name=$("#supplier_name__"+actual_id[1]+'__'+actual_id[2]).val();



		$.ajax({

			url:"{{route('fetch-services')}}",

			type:"GET",

			data:{"supplier":supplier_name,

			"country":country,

			"city":city,

			"services_type":service_type},

			success:function(response)

			{

				$("#days_services__"+actual_id[1]+'__'+actual_id[2]).html(response);

				$("#days_services__"+actual_id[1]+'__'+actual_id[2]).prop("disabled",false);

			}

		});

	});

</script>

<script>

	$(document).on("click",".add_more_days",function()

	{

		 var minus_url = "{!! asset('assets/images/minus_icon.png') !!}";

        var add_url= "{!! asset('assets/images/add_icon.png') !!}";

		var id=$(this).attr("id");

		var actual_id=id.split("__");

		var main_loop=parseInt(actual_id[1]);

		var last_id=$(".days_div"+actual_id[1]+":last").attr("id");

		var last_id=last_id.split("__");

		var loop=parseInt(last_id[2]);



		var actual_date=$("#days_date__"+main_loop+"__"+parseInt(loop)).val();



		var clone_days=$("#days_div").clone();

		clone_days.find(".days_no").parent().parent().css("display","block");

		clone_days.find(".days_no").parent().parent().attr({"id":"days_div__"+main_loop+"__"+parseInt(loop+1)}).removeClass('days_div').addClass('days_div'+parseInt(main_loop));

		clone_days.find(".days_no").text("");

		clone_days.find(".days_country").attr({"id":"days_country__"+main_loop+"__"+parseInt(loop+1),"name":"days_country["+parseInt(main_loop-1)+"][]"}).select2();

		clone_days.find(".days_country").siblings(".select2-container").slice(1).remove();

		clone_days.find(".days_city").attr({"id":"days_city__"+main_loop+"__"+parseInt(loop+1),"name":"days_city["+parseInt(main_loop-1)+"][]"});

		clone_days.find(".supplier_name").attr({"id":"supplier_name__"+main_loop+"__"+parseInt(loop+1),"name":"supplier_name["+parseInt(main_loop-1)+"][]"}).select2();

		clone_days.find(".supplier_name").siblings(".select2-container").slice(1).remove();

		clone_days.find(".days_services").attr({"id":"days_services__"+main_loop+"__"+parseInt(loop+1),"name":"days_services["+parseInt(main_loop-1)+"][]"}).select2();

			clone_days.find(".days_services").siblings(".select2-container").slice(1).remove();

		clone_days.find(".service_type").attr({"id":"service_type__"+main_loop+"__"+parseInt(loop+1),"name":"service_type["+parseInt(main_loop-1)+"][]"});

		clone_days.find(".days_date").attr({"id":"days_date__"+main_loop+"__"+parseInt(loop+1),"name":"days_date["+parseInt(main_loop-1)+"][]"}).val(actual_date);

		clone_days.find(".add_more_days").attr({"id":"add_more_days__"+main_loop+"__"+parseInt(loop+1)});



		$("#days_div__"+main_loop+"__"+loop).find(".add_more_div").html("");

        if(loop>1)

        {

           $("#days_div__"+main_loop+"__"+loop).find(".add_more_div").append('<img id="remove_more_days__'+main_loop+'__'+parseInt(loop)+'" class="remove_more_days minus-icon" style="margin" src="'+minus_url+'">');

       }

       clone_days.find(".add_more_div").html('');

       clone_days.find(".add_more_div").append(' <img id="remove_more_days__'+main_loop+'__'+parseInt(loop+1)+'" class="remove_more_days minus-icon" style="margin-left: auto;" src="'+minus_url+'"> <img id="add_more_days__'+main_loop+'__'+parseInt(loop+1)+'" class="add_more_days plus-icon" style="margin-left: auto;" src="'+add_url+'"> ');



		$(".days_div"+actual_id[1]+":last").after(clone_days);





	});



	$(document).on("click",".remove_more_days",function()

	{



		var id = this.id;

		var split_id=id.split("__");

		$("#days_div__"+split_id[1]+"__"+split_id[2]).remove();

		var minus_url = "{!! asset('assets/images/minus_icon.png') !!}";

		var add_url= "{!! asset('assets/images/add_icon.png') !!}";

		var last_id = $(".days_div"+split_id[1]+":last").attr("id");

		// alert(last_id);

		old_id = last_id.split('__');

		var main_loop=parseInt(old_id[1]);

		old_id=parseInt(old_id[2]);



        if(old_id>1)

        {



        	$("#days_div__"+main_loop+"__"+old_id).find(".add_more_div").html('');

        	$("#days_div__"+main_loop+"__"+old_id).find(".add_more_div").append(' <img id="remove_more_days__'+main_loop+'__'+parseInt(old_id)+'" class="remove_more_days minus-icon" style="margin-left: auto;" src="'+minus_url+'"> <img id="add_more_days__'+main_loop+'__'+parseInt(old_id)+'" class="add_more_days plus-icon" style="margin-left: auto;" src="'+add_url+'"> ');

        }

        else

        {



      $("#days_div__"+main_loop+"__"+old_id).find(".add_more_div").html('');

        $("#days_div__"+main_loop+"__"+old_id).find(".add_more_div").append(' <img id="add_more_days__'+main_loop+'__'+parseInt(old_id)+'" class="add_more_days plus-icon" style="margin-left: auto;" src="'+add_url+'">'); 

        }





	});

</script>

<script>

	$(document).on("click","#discard_itinerary",function()

	{

		window.history.back();

	})

</script>

<script>

	  $(document).on("click","#update_itinerary",function()

    {

        var tour_name=$("#tour_name").val();

        var occupancy=$("#occupancy").val();

        var adults=$("#adults").val();

        var child_with_bed=$("#child_with_bed").val();

        var child_with_no_bed=$("#child_with_no_bed").val();

        var country=$("#country").val();

        var tour_fromdate=$("#tour_fromdate").val();

        var tour_todate=$("#tour_todate").val();

        var tour_description= CKEDITOR.instances.tour_description.getData();









        if (tour_name.trim() == "")

        {

            $("#tour_name").css("border", "1px solid #cf3c63");

        } 

        else

        {

            $("#tour_name").css("border", "1px solid #9e9e9e");

        }

        if (tour_description.trim() == "")

        {

            $("#cke_tour_description").css("border", "1px solid #cf3c63");

        } 

        else

        {

            $("#cke_tour_description").css("border", "1px solid #9e9e9e");

        }



        if (occupancy == "0")

        {

            $("#occupancy").parent().find(".select2-selection").css("border", "1px solid #cf3c63");

        } 

        else

        {

         $("#occupancy").parent().find(".select2-selection").css("border", "1px solid #9e9e9e");

        }

          if (adults.trim() == "")

        {

            $("#adults").css("border", "1px solid #cf3c63");

        } 

        else

        {

            $("#adults").css("border", "1px solid #9e9e9e");

        }

         if (child_with_bed.trim() == "")

        {

            $("#child_with_bed").css("border", "1px solid #cf3c63");

        } 

        else

        {

            $("#child_with_bed").css("border", "1px solid #9e9e9e");

        }

          if (child_with_no_bed.trim() == "")

        {

            $("#child_with_no_bed").css("border", "1px solid #cf3c63");

        } 

        else

        {

            $("#child_with_no_bed").css("border", "1px solid #9e9e9e");

        }

         if (country.trim() == "0")

        {

            $("#country").parent().find(".select2-selection").css("border", "1px solid #cf3c63");

        } 

        else

        {

            $("#country").parent().find(".select2-selection").css("border", "1px solid #9e9e9e");

        }

           if (tour_fromdate.trim() == "")

        {

            $("#tour_fromdate").css("border", "1px solid #cf3c63");

        } 

        else

        {

            $("#tour_fromdate").css("border", "1px solid #9e9e9e");

        }

         if (tour_todate.trim() == "")

        {

            $("#tour_todate").css("border", "1px solid #cf3c63");

        } 

        else

        {

            $("#tour_todate").css("border", "1px solid #9e9e9e");

        }





var days_country_error = 0;

$(".days_country").slice(1).each(function () {

    var days_country_id=$(this).attr("id");

    if ($(this).val() == "0") {

        $("#" + days_country_id).parent().find(".select2-selection").css("border", "1px solid #cf3c63");

        $("#" + days_country_id).parent().find(".select2-selection").focus();

        days_country_error++;

    } else {

         $("#" + days_country_id).parent().find(".select2-selection").css("border", "1px solid #9e9e9e");

    }



});



var days_city_error = 0;

$(".days_city").slice(1).each(function () {

    var days_city_id=$(this).attr("id");

    if ($(this).val() == "0") {

        $("#" + days_city_id).parent().find(".select2-selection").css("border", "1px solid #cf3c63");

        $("#" + days_city_id).parent().find(".select2-selection").focus();

        days_city_error++;

    } else {

         $("#" + days_city_id).parent().find(".select2-selection").css("border", "1px solid #9e9e9e");

    }



});

var supplier_name_error = 0;

$(".supplier_name").slice(1).each(function () {

    var supplier_name_id=$(this).attr("id");

    if ($(this).val() == "0") {

        $("#" + supplier_name_id).parent().find(".select2-selection").css("border", "1px solid #cf3c63");

        $("#" + supplier_name_id).parent().find(".select2-selection").focus();

        supplier_name_error++;

    } else {

         $("#" + supplier_name_id).parent().find(".select2-selection").css("border", "1px solid #9e9e9e");

    }



});



var service_type_error = 0;

$(".service_type").slice(1).each(function () {

    var service_type_id=$(this).attr("id");

    if ($(this).val() == "0") {

        $("#" + service_type_id).css("border", "1px solid #cf3c63");

        $("#" + service_type_id).focus();

        service_type_error++;

    } else {

         $("#" + service_type_id).css("border", "1px solid #9e9e9e");

    }



});



var days_services_error = 0;

$(".days_services").slice(1).each(function () {

    var days_services_id=$(this).attr("id");

    if ($(this).val() == "0") {

        $("#" + days_services_id).parent().find(".select2-selection").css("border", "1px solid #cf3c63");

        $("#" + days_services_id).parent().find(".select2-selection").focus();

        days_services_error++;

    } else {

         $("#" + days_services_id).parent().find(".select2-selection").css("border", "1px solid #9e9e9e");

    }



});

var days_date_error = 0;

$(".days_date").slice(1).each(function () {

    var days_date_id=$(this).attr("id");

    if ($(this).val() == "") {

        $("#" + days_date_id).css("border", "1px solid #cf3c63");

        $("#" + days_date_id).focus();

        days_date_error++;

    } else {

         $("#" + days_date_id).css("border", "1px solid #9e9e9e");

    }



});





if(tour_name.trim() == "")

{

    $("#tour_name").focus();

}

else if(tour_description.trim()=="")

{

  $("#cke_tour_description").focus();  

}

else if(occupancy=="0")

{

  $("#occupancy").parent().find(".select2-selection").focus();  

} 

else if(adults.trim()=="")

{

  $("#adults").focus();  

}

else if(child_with_bed.trim()=="")

{

  $("#child_with_bed").focus();  

}

else if(child_with_no_bed.trim()=="")

{

  $("#child_with_no_bed").focus();  

}

else if(child_with_no_bed.trim()=="")

{

  $("#child_with_no_bed").focus();  

}

else if(country.trim()=="0")

{

  $("#country").parent().find(".select2-selection").focus();  

}

else if(tour_fromdate.trim()=="")

{

  $("#tour_fromdate").focus();  

}

else if(tour_todate.trim()=="")

{

  $("#tour_todate").focus();  

}

else if(days_country_error>0)

{

}

else if(days_city_error>0)

{

}

else if(supplier_name_error>0)

{

}

else if(service_type_error>0)

{

}

else if(days_services_error>0)

{

}

else if(days_date_error>0)

{

}

else

{

    $("#update_itinerary").prop("disabled", true);

    var formdata=new FormData($("#itinerary_form")[0]);

    formdata.append("tour_description",tour_description);

    $.ajax({

        url:"{{route('update-itinerary')}}",

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

                    "Itinerary already exists");



            } else if (response.indexOf("success") != -1)



            {



                swal({

                    title: "Success",

                    text: "Itinerary Updated Successfully !",

                    type: "success"

                },



                function () {



                    location.reload();



                });



            } else if (response.indexOf("fail") != -1)



            {



                swal("ERROR", "Itinerary cannot be updated right now! ");



            }

            $("#update_itinerary").prop("disabled", false);



        }

    });

}

});

</script>

</body>





</html>

