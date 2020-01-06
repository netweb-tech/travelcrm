<?php
use App\Http\Controllers\ServiceManagement;
?>
@include('mains.includes.top-header')

<style>

	.iti-flag {

		width: 20px;

		height: 15px;

		box-shadow: 0px 0px 1px 0px #888;

		background-image: url("{{asset('assets/images/flags.png')}}") !important;

		background-repeat: no-repeat;

		background-color: #DBDBDB;

		background-position: 20px 0

	}



	div#cke_1_contents {

		height: 250px !important;

	}

</style>

<body class="hold-transition light-skin sidebar-mini theme-rosegold onlyheader">

	<div class="wrapper">

		@include('mains.includes.top-nav')

		<div class="content-wrapper">

			<div class="container-full clearfix position-relative">	

				@include('mains.includes.nav')

				<div class="content">

					<!-- Content Header (Page header) -->

					<div class="content-header">

						<div class="d-flex align-items-center">

							<div class="mr-auto">

								<h3 class="page-title">Service Management</h3>

								<div class="d-inline-block align-items-center">

									<nav>

										<ol class="breadcrumb">

											<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>

											<li class="breadcrumb-item" aria-current="page">Dashboard</li>

											<li class="breadcrumb-item active" aria-current="page">View Transport Details

											</li>

										</ol>

									</nav>

								</div>

							</div>

						<!-- 	<div class="right-title">

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




 @if($rights['view']==1)
						<div class="row">







							<div class="col-12">

								<div class="box">

									<div class="box-body">

										<div class="row">

											<div class="col-md-3">

												<label for="transfer_name"><strong>TRANSFER NAME :</strong></label>

											</div>

											<div class="col-md-9">

												<p class="" id="transfer_name"> @if($get_transport->transfer_name!="" && $get_transport->transfer_name!="0" && $get_transport->transfer_name!=null){{$get_transport->transfer_name}} @else No Data Available @endif </p>

											</div>

										</div>

										<div class="row">

											<div class="col-md-3">

												<label for="supplier_id"><strong>SUPPLIER NAME :</strong></label>

											</div>

											<div class="col-md-9">

												<p class="" id="supplier_id"> @if($get_transport->supplier_id!="" && $get_transport->supplier_id!=null)
													@foreach($suppliers as $supplier)
													@if($get_transport->supplier_id==$supplier->supplier_id)
													{{$supplier->supplier_name}}
													@endif 
													@endforeach 
												@else No Data Available @endif </p>

											</div>

										</div>
										
										<div class="row">

											<div class="col-md-3">

												<label for="transfer_country"><strong>COUNTRY :</strong></label>

											</div>

											<div class="col-md-9">

												<p class="" id="transfer_country"> @if($get_transport->transfer_country!="" && $get_transport->transfer_country!=null)
													@foreach($countries as $country)
													@if(in_array($country->country_id,$countries_data))
													@if($country->country_id==$get_transport->transfer_country)
													{{$country->country_name}}
													@endif
													@endif
													@endforeach
												@else No Data Available @endif </p>

											</div>

										</div>

										<div class="row">

											<div class="col-md-3">

												<label for="transfer_city"><strong>CITY :</strong></label>

											</div>

											<div class="col-md-9">

												<p class="" id="transfer_city"> @if($get_transport->transfer_city!="" && $get_transport->transfer_city!=null)
													<?php
														$fetch_city=ServiceManagement::searchCities($get_transport->transfer_city,$get_transport->transfer_country);

														echo $fetch_city['name'];
														?>
												@else No Data Available @endif </p>

											</div>

										</div>
										<div class="row">

											<div class="col-md-3">

												<label for="supplier_id"><strong>DRIVER LANGUAGE :</strong></label>

											</div>

											<div class="col-md-9">

												<p class="" id="supplier_id"> @if($get_transport->driver_language!="" && $get_transport->driver_language!=null)
												{{$get_transport->driver_language}}
												@else No Data Available @endif </p>

											</div>

										</div>
										<div class="row" style="display:none">

											<div class="col-md-3">

												<label for="validity_fromtime"><strong>ARRIVAL TIME :</strong></label>

											</div>

											<div class="col-md-9">

												<p class="" id="validity_fromtime"> @if($get_transport->transfer_arrival_time!="" && $get_transport->transfer_arrival_time!="0" && $get_transport->transfer_arrival_time!=null) {{$get_transport->transfer_arrival_time}} @else No Data Available @endif </p>

											</div>

										</div>
										
										<div class="row">

											<div class="col-md-3">

												<label for="supplier_id"><strong>PICK UP POINT :</strong></label>

											</div>

											<div class="col-md-9">

												<p class="" id="supplier_id"> @if($get_transport->transfer_pickup_point!="" && $get_transport->transfer_pickup_point!=null)
												{{$get_transport->transfer_pickup_point}}
												@else No Data Available @endif </p>

											</div>

										</div>
											<div class="row">

											<div class="col-md-3">

												<label for="supplier_id"><strong>DROP OFF POINT :</strong></label>

											</div>

											<div class="col-md-9">

												<p class="" id="supplier_id"> @if($get_transport->transfer_drop_point!="" && $get_transport->transfer_drop_point!=null)
												{{$get_transport->transfer_drop_point}}
												@else No Data Available @endif </p>

											</div>

										</div>
										<div class="row">

											<div class="col-md-3">

												<label for="supplier_id"><strong>MEETING POINT :</strong></label>

											</div>

											<div class="col-md-9">

												<p class="" id="supplier_id"> @if($get_transport->transfer_meet_point!="" && $get_transport->transfer_meet_point!=null)
												{{$get_transport->transfer_meet_point}}
												@else No Data Available @endif </p>

											</div>

										</div>
											<div class="row">

											<div class="col-md-3">

												<label for="supplier_id"><strong>DESCRIPTION :</strong></label>

											</div>

											<div class="col-md-9">

												<p class="" id="supplier_id"> @if($get_transport->transfer_description!="" && $get_transport->transfer_description!=null)
												{{$get_transport->transfer_meet_point}}
												@else No Data Available @endif </p>

											</div>

										</div>
										<div class="row">

											<div class="col-md-3">

												<label for="operating_weekdays"><strong>WORKING DAYS :</strong></label>

											</div>

											<div class="col-md-9">

												<p class="" id="operating_weekdays"> @if($get_transport->operating_weekdays!="" && $get_transport->operating_weekdays!=null)
													@php
													$weekdays=unserialize($get_transport->operating_weekdays);
													$show_days=array();
													foreach($weekdays as $key=>$value)
													{
														if($value=="Yes")
														{
															array_push($show_days,ucfirst($key));
														}
													}

													echo implode(" ,",$show_days);
													@endphp
													 @else No Data Available @endif 
													 </p>

											</div>

										</div>


											<div class="row mb-10">

											<div class="col-md-12">

												<h4 class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;" >

													<i class="fa fa-minus-circle" id="blackout_days"></i> BLACKOUT DAYS

												</h4>

											</div>



										</div>
										<div id="blackout_days_details">
											@if($get_transport->transfer_blackout_dates!="" && $get_transport->transfer_blackout_dates!=null)
											<div class="row">
											@php
											$blackout_dates=explode(',',$get_transport->transfer_blackout_dates);	
											
											for($black=0;$black< count($blackout_dates);$black++)
											{
												@endphp
												
													<div class="col-md-2">

												<label for="blackout_dates{{$black}}"><strong>DAY {{($black+1)}} :</strong></label>

											</div>

											<div class="col-md-2">

												<p class="" id="blackout_dates{{$black}}">
												 @php
												echo date('d-m-Y',strtotime($blackout_dates[$black]));
												 @endphp </p>

											</div>

												@php
											}
											@endphp
										</div>
											@else
											No Data Available 
											@endif
										</div>

												<div class="row mb-10">

											<div class="col-md-12">

												<h4 class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;" >

													<i class="fa fa-minus-circle" id="nationality_markup_details"></i> NATIONALITY & TRANSFER MARKUP DETAILS

												</h4>

											</div>



										</div>
										<div id="nationality_markup_showdetails" class="row">
											@if($get_transport->nationality_markup_details!="" && $get_transport->nationality_markup_details!=null)
											@php
											$nationality_markup_details=unserialize($get_transport->nationality_markup_details);

											for($nation_count=0;$nation_count< count($nationality_markup_details);$nation_count++)
											{
											@endphp
											<div class="col-md-6">
												<div class="row">
												<div class="col-md-6">
													<label for="transfer_nationality{{$nation_count}}"><strong>NATIONALITY:</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="transfer_nationality{{$nation_count}}">
													@foreach($countries as $country)

											 		@if($country->country_id==$nationality_markup_details[$nation_count]['transfer_nationality'])
											 		{{$country->country_name}}
											 		@endif
											 		@endforeach
												</p>
											</div>
												<div class="col-md-6">
													<label for="transfer_markup{{$nation_count}}"><strong>MARKUP TYPE:</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="transfer_markup{{$nation_count}}">{{$nationality_markup_details[$nation_count]['transfer_markup']}}
												</p>
											</div>
											<div class="col-md-6">
													<label for="transfer_amount{{$nation_count}}"><strong>MARKUP PERCENTAGE/AMOUNT:</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="transfer_amount{{$nation_count}}">{{$nationality_markup_details[$nation_count]['transfer_amount']}}
												</p>
											</div>
											</div>
											</div>
											
											@php
											}
											@endphp					
											@else
											No Data Available 
											@endif
											</div>
											<div class="row mb-10">

											<div class="col-md-12">

												<h4 class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;" >

													<i class="fa fa-minus-circle" id="transport_pricing"></i> TRANSPORT TARIFF DETAILS

												</h4>

											</div>



										</div>
										<div id="transport_pricing_details" class="row">
											@if($get_transport->transfer_transport_tariff!="" && $get_transport->transfer_transport_tariff!=null)
											@php
											$transfer_transport_tariff=unserialize($get_transport->transfer_transport_tariff);

											for($transport_count=0;$transport_count< count($transfer_transport_tariff);$transport_count++)
											{
											@endphp
											<div class="col-md-6" style="border-bottom: 1px solid #8c8c8c;padding: 1% 4% 1% 4%">
												<div class="row">
													<div class="col-md-6">
													<label for="transfer_validity_from{{$transport_count}}"><strong>VALIDITY:</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="transfer_validity_from{{$transport_count}}">
													@if($transfer_transport_tariff[$transport_count]['transfer_validity_from']!="" && $transfer_transport_tariff[$transport_count]['transfer_validity_from']!="0" && $transfer_transport_tariff[$transport_count]['transfer_validity_from']!=null)
													@php echo date('d-m-Y',strtotime($transfer_transport_tariff[$transport_count]['transfer_validity_from'])) @endphp
													@else 
													No Data Available 
													@endif
													To
													@if($transfer_transport_tariff[$transport_count]['transfer_validity_to']!="" && $transfer_transport_tariff[$transport_count]['transfer_validity_to']!="0" && $transfer_transport_tariff[$transport_count]['transfer_validity_to']!=null) 
													@php 
													echo date('d-m-Y',strtotime($transfer_transport_tariff[$transport_count]['transfer_validity_to'])) @endphp
													@else 
													No Data Available
													@endif
												</p>
											</div>
											<div class="col-md-6">
													<label for="transfer_vehicle_type{{$transport_count}}"><strong>VEHICLE TYPE:</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="transfer_vehicle_type{{$transport_count}}"><!-- {{$transfer_transport_tariff[$transport_count]['transfer_vehicle_type']}} -->

                                        @foreach($vehicle_type as $types)
                                         @if($transfer_transport_tariff[$transport_count]['transfer_vehicle_type']==$types->vehicle_type_id)
                                         {{$types->vehicle_type_name}}
                                         @endif
                                        @endforeach
												</p>
											</div>
											<div class="col-md-6">
													<label for="transfer_vehicle{{$transport_count}}"><strong>VEHICLE:</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="transfer_vehicle{{$transport_count}}">{{$transfer_transport_tariff[$transport_count]['transfer_vehicle']}}
												</p>
											</div>
											<div class="col-md-6">
													<label for="transfer_car_model{{$transport_count}}"><strong>CAR MODEL:</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="transfer_car_model{{$transport_count}}">
													@if(!empty($transfer_transport_tariff[$transport_count]['transfer_car_model']))
													{{$transfer_transport_tariff[$transport_count]['transfer_car_model']}}
													@else 
													No Data Available
													@endif
												</p>
											</div>
											<div class="col-md-6">
													<label for="transfer_manufacture_year{{$transport_count}}"><strong>MANUFACTURE YEAR:</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="transfer_manufacture_year{{$transport_count}}">
													@if(!empty($transfer_transport_tariff[$transport_count]['transfer_manufacture_year']))
													{{$transfer_transport_tariff[$transport_count]['transfer_manufacture_year']}}
													@else 
													No Data Available
													@endif
												</p>
											</div>
											<div class="col-md-6">
													<label for="transfer_duration{{$transport_count}}"><strong>TRANSFER DURATION:</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="transfer_duration{{$transport_count}}">
													@if(!empty($transfer_transport_tariff[$transport_count]['transfer_duration']))
													{{$transfer_transport_tariff[$transport_count]['transfer_duration']}}
													@else 
													No Data Available
													@endif
												</p>
											</div>
											<div class="col-md-6">
													<label for="transfer_max_passengers{{$transport_count}}"><strong>MAX PASSENGERS:</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="transfer_max_passengers{{$transport_count}}">{{$transfer_transport_tariff[$transport_count]['transfer_max_passengers']}}
												</p>
											</div>
											<!-- <div class="col-md-6">
													<label for="transfer_total_vehicles{{$transport_count}}"><strong>TOTAL VEHICLES:</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="transfer_total_vehicles{{$transport_count}}">{{$transfer_transport_tariff[$transport_count]['transfer_total_vehicles']}}
												</p>
											</div> -->
												<div class="col-md-6">
													<label for="transport_currency{{$transport_count}}"><strong>TRANSPORT CURRENCY:</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="transport_currency{{$transport_count}}">
													@foreach($currency as $curr)

											 		@if($curr->code==$transfer_transport_tariff[$transport_count]['transfer_transport_currency'])
											 		{{$curr->code}} ({{$curr->name}})
											 		@endif
											 		@endforeach
												</p>
											</div>
												<div class="col-md-6">
													<label for="transfer_vehicle_cost{{$transport_count}}"><strong>VEHICLE COST:</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="transfer_vehicle_cost{{$transport_count}}">{{$transfer_transport_tariff[$transport_count]['transfer_vehicle_cost']}}
												</p>
											</div>
											<div class="col-md-6">
													<label for="transfer_parking_cost{{$transport_count}}"><strong>PARKING COST:</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="transfer_parking_cost{{$transport_count}}">{{$transfer_transport_tariff[$transport_count]['transfer_parking_cost']}}
												</p>
											</div>
											<div class="col-md-6">
													<label for="transfer_driver_tip{{$transport_count}}"><strong>DRIVER TIP:</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="transfer_driver_tip{{$transport_count}}">{{$transfer_transport_tariff[$transport_count]['transfer_driver_tip']}}
												</p>
											</div>
											<div class="col-md-6">
													<label for="transfer_recep_disc{{$transport_count}}"><strong>REPETITON DISCOUNT COST  :</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="transfer_recep_disc{{$transport_count}}">{{$transfer_transport_tariff[$transport_count]['transfer_recep_disc']}}
												</p>
											</div>
											<div class="col-md-6">
													<label for="transfer_guide_cost{{$transport_count}}"><strong>GUIDE COST  :</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="transfer_guide_cost{{$transport_count}}">{{$transfer_transport_tariff[$transport_count]['transfer_guide_cost']}}
												</p>
											</div>
											<div class="col-md-6">
													<label for="transfer_attraction_cost{{$transport_count}}"><strong>TOURIST ATTRACTION COST  :</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="transfer_attraction_cost{{$transport_count}}">{{$transfer_transport_tariff[$transport_count]['transfer_attraction_cost']}}
												</p>
											</div>
											<div class="col-md-6">
													<label for="transfer_attraction_cost{{$transport_count}}"><strong>VEHICLE IMAGES :</strong></label>
												</div>
												<div class="col-md-6">
												
											</div>
											<div class="col-md-12">
												<div class="row">
													@php
													$get_transfer_images=$transfer_transport_tariff[$transport_count]['transfer_images'];
													for($images=0;$images< count($get_transfer_images);$images++)
													{
														@endphp
														<div class='col-md-6'>
															<a href='{{ asset("assets/uploads/transport_images") }}/{{$get_transfer_images[$images]}}' target="_blank"><img class='upload_ativity_images_preview' src='{{ asset("assets/uploads/transport_images") }}/{{$get_transfer_images[$images]}}' width=150 height=150 class="img img-thumbnail" /></a>
														</div>
														@php
													}
													@endphp
												</div>
											</div>
										</div>
											</div>
											
											
											@php
											}
											@endphp					
											@else
											No Data Available 
											@endif
											</div>


											<div class="row mb-10">

											<div class="col-md-12">

												<h4 class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;" >

													<i class="fa fa-minus-circle" id="transfer_inclusions"></i> INCLUSIONS

												</h4>

											</div>



										</div>
										<div class="row" id="transfer_inclusions_details">

											<div class="col-md-12">
												<textarea id="transfer_inclusions_data">
										 @if($get_transport->transfer_inclusions!="" && $get_transport->transfer_inclusions!=null) {{$get_transport->transfer_inclusions}} @else No Data Available @endif
										 </textarea>

											</div>

										</div>

											
										<div class="row mb-10">

											<div class="col-md-12">

												<h4 class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;" >

													<i class="fa fa-minus-circle" id="transfer_exclusions"></i> EXCLUSIONS

												</h4>

											</div>



										</div>
										<div class="row" id="transfer_exclusions_details">

											
											<div class="col-md-12">
												<textarea id="transfer_exclusions_data">
										 @if($get_transport->transfer_exclusions!="" && $get_transport->transfer_exclusions!=null) {{$get_transport->transfer_exclusions}} @else No Data Available @endif
										</textarea>

											</div>

										</div>
										<div class="row mb-10">

											<div class="col-md-12">

												<h4 class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;" >

													<i class="fa fa-minus-circle" id="transfer_cancel_policy"></i> CANCELLATION POLICY

												</h4>

											</div>



										</div>
										<div class="row" id="transfer_cancel_policy_details">

											<div class="col-md-12">
												<textarea id="transfer_cancel_policy_data">
										 @if($get_transport->transfer_cancel_policy!="" && $get_transport->transfer_cancel_policy!=null) {{$get_transport->transfer_cancel_policy}} @else No Data Available @endif
										</textarea>

											</div>

										</div>
										<div class="row mb-10">

											<div class="col-md-12">

												<h4 class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;" >

													<i class="fa fa-minus-circle" id="transfer_terms_conditions"></i> TERMS AND CONDITIONS

												</h4>

											</div>



										</div>
										<div class="row" id="transfer_terms_conditions_details">

											<div class="col-md-12">
												<textarea id="transfer_terms_conditions_data">
										 @if($get_transport->transfer_terms_conditions!="" && $get_transport->transfer_terms_conditions!=null) {{$get_transport->transfer_terms_conditions}} @else No Data Available @endif
										</textarea>

											</div>

										</div>
									<!-- 	<br>
										<div class="row mb-10">

											<div class="col-md-12">

												<h4 class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;" >

													<i class="fa fa-minus-circle" id="transfer_images"></i> TRANSPORT IMAGES

												</h4>

											</div>



										</div>
										<div class="row" id="transfer_images_details">

											@php
											$get_transport_images=unserialize($get_transport->transfer_images);
											for($images=0;$images< count($get_transport_images);$images++)
											{
												@endphp
												<div class='col-md-3'>
													<img class='upload_ativity_images_preview' src='{{ asset("assets/uploads/transport_images") }}/{{$get_transport_images[$images]}}' width=150 height=150 class="img img-thumbnail" />

												</div>
												@php
											}
											@endphp

										</div>
 -->

									
										<br>
										<div class="row mb-10">
											<div class="col-md-12">
												<div class="box-header with-border"
												style="padding: 10px;border-bottom:none;border-radius:0;border-top:1px solid #c3c3c3">
												<button type="button" id="discard_transfer" class="btn btn-rounded btn-primary">BACK</button>
												<a href="{{route('edit-transport',['transport_id'=>$get_transport->transport_id])}}" id="update_transfer" class="btn btn-rounded btn-primary mr-10">EDIT</a>
											</div>
										</div>
									</div>





									<!-- /.row -->

								</div>

								<!-- /.box-body -->

							</div>
							<!-- /.box -->
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
				CKEDITOR.replace('transfer_exclusions_data', {readOnly:true});
				CKEDITOR.replace('transfer_inclusions_data',{readOnly:true});
				CKEDITOR.replace('transfer_cancel_policy_data',{readOnly:true});
				CKEDITOR.replace('transfer_terms_conditions_data',{readOnly:true});

			});
			$(document).on("click","#discard_transfer",function()
			{
				window.history.back();

			});


			$(document).on("click","#nationality_markup_details",function()

			{

				if($(this).hasClass('fa-minus-circle'))

				{

					$(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');



				}

				else

				{

					$(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');

				}

				$("#nationality_markup_showdetails").toggle();



			});



			$(document).on("click","#transport_pricing",function()

			{

				if($(this).hasClass('fa-minus-circle'))

				{

					$(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');



				}

				else

				{

					$(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');

				}

				$("#transport_pricing_details").toggle();



			});
			$(document).on("click","#transfer_inclusions",function()

			{

				if($(this).hasClass('fa-minus-circle'))

				{

					$(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');



				}

				else

				{

					$(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');

				}

				$("#transfer_inclusions_details").toggle();



			});
			$(document).on("click","#transfer_exclusions",function()

			{

				if($(this).hasClass('fa-minus-circle'))

				{

					$(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');



				}

				else

				{

					$(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');

				}

				$("#transfer_exclusions_details").toggle();



			});
			$(document).on("click","#transfer_cancel_policy",function()

			{

				if($(this).hasClass('fa-minus-circle'))

				{

					$(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');



				}

				else

				{

					$(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');

				}

				$("#transfer_cancel_policy_details").toggle();



			});

	$(document).on("click","#transfer_terms_conditions",function()

			{

				if($(this).hasClass('fa-minus-circle'))

				{

					$(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');



				}

				else

				{

					$(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');

				}

				$("#transfer_terms_conditions_details").toggle();



			});

			$(document).on("click","#blackout_days",function()

			{

				if($(this).hasClass('fa-minus-circle'))

				{

					$(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');



				}

				else

				{

					$(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');

				}

				$("#blackout_days_details").toggle();



			});



			$(document).on("click","#transfer_images",function()

			{

				if($(this).hasClass('fa-minus-circle'))

				{

					$(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');



				}

				else

				{

					$(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');

				}

				$("#transfer_images_details").toggle();



			});
		</script>



	</body>





	</html>

