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

											<li class="breadcrumb-item active" aria-current="page">View Hotel Details

											</li>

										</ol>

									</nav>

								</div>

							</div>
<!-- 
							<div class="right-title">

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

												<label for="hotel_name"><strong>HOTEL NAME :</strong></label>

											</div>

											<div class="col-md-9">

												<p class="" id="hotel_name"> @if($get_hotels->hotel_name!="" && $get_hotels->hotel_name!="0" && $get_hotels->hotel_name!=null){{$get_hotels->hotel_name}} @else No Data Available @endif </p>

											</div>

										</div>

										<div class="row">

											<div class="col-md-3">

												<label for="supplier_id"><strong>SUPPLIER NAME :</strong></label>

											</div>

											<div class="col-md-9">

												<p class="" id="supplier_id"> @if($get_hotels->supplier_id!="" && $get_hotels->supplier_id!=null)
													@foreach($suppliers as $supplier)
													@if($get_hotels->supplier_id==$supplier->supplier_id)
													{{$supplier->supplier_name}}
													@endif 
													@endforeach 
												@else No Data Available @endif </p>

											</div>

										</div>
										
										<div class="row">

											<div class="col-md-3">

												<label for="hotel_country"><strong>COUNTRY :</strong></label>

											</div>

											<div class="col-md-9">

												<p class="" id="hotel_country"> @if($get_hotels->hotel_country!="" && $get_hotels->hotel_country!=null)
													@foreach($countries as $country)
													@if(in_array($country->country_id,$countries_data))
													@if($country->country_id==$get_hotels->hotel_country)
													{{$country->country_name}}
													@endif
													@endif
													@endforeach
												@else No Data Available @endif </p>

											</div>

										</div>

										<div class="row">

											<div class="col-md-3">

												<label for="hotel_city"><strong>CITY :</strong></label>

											</div>

											<div class="col-md-9">

												<p class="" id="hotel_city"> @if($get_hotels->hotel_city!="" && $get_hotels->hotel_city!=null)
													<?php
														$fetch_city=ServiceManagement::searchCities($get_hotels->hotel_city,$get_hotels->hotel_country);

														echo $fetch_city['name'];
														?>
												@else No Data Available @endif </p>

											</div>

										</div>
										<div class="row">

											<div class="col-md-3">

												<label for="hotel_contact"><strong>HOTEL CONTACT :</strong></label>

											</div>

											<div class="col-md-9">

												<p class="" id="hotel_contact"> @if($get_hotels->hotel_contact!="" && $get_hotels->hotel_contact!=null)
												{{$get_hotels->hotel_contact}}
												@else No Data Available @endif </p>

											</div>

										</div>

										<div class="row">

											<div class="col-md-3">

												<label for="hotel_rating"><strong>HOTEL RATING :</strong></label>

											</div>

											<div class="col-md-9">

											 @if($get_hotels->hotel_rating!="" && $get_hotels->hotel_rating!=null)
												@php

												for($i=1;$i<= $get_hotels->hotel_rating;$i++)
												{
													echo '<h4 style="display:inline"><i class="fa fa-star" aria-hidden="true" style="color:#e3b044"></i></h4>';
												}

												@endphp
												@else No Data Available @endif 

											</div>

										</div>
											<div class="row">

											<div class="col-md-3">

												<label for="hotel_address"><strong>HOTEL ADDRESS :</strong></label>

											</div>

											<div class="col-md-9">

												<p class="" id="hotel_address"> @if($get_hotels->hotel_address!="" && $get_hotels->hotel_address!=null)
												{{$get_hotels->hotel_address}}
												@else No Data Available @endif </p>

											</div>

										</div>
										


											<div class="row mb-10">

											<div class="col-md-12">

												<h4 class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;" >

													<i class="fa fa-minus-circle" id="rate_allocation"></i> RATE AND ALLOCATION

												</h4>

											</div>
											<div class="row" style="padding: 0 30px;">
												<div class="col-md-12">
													<div id="rate_allocation_details" class="row">
											@php
											$hotel_season_details=unserialize($get_hotels->hotel_season_details);
											$hotel_markup_details=unserialize($get_hotels->hotel_markup_details);
											$hotel_blackout_dates=unserialize($get_hotels->hotel_blackout_dates);
											$hotel_surcharge_details=unserialize($get_hotels->hotel_surcharge_details);
											$rate_allocation_details=unserialize($get_hotels->rate_allocation_details);


											for($rate_allocation_count=0;$rate_allocation_count< count($hotel_season_details);$rate_allocation_count++)
											{
												@endphp
												<div class="row mb-10" style="padding: 0 20px;">

													<div class="col-md-12">

														<h4 class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;" >
															<i class="fa fa-minus-circle season_details" id="season_details{{($rate_allocation_count+1)}}"></i> SEASON {{($rate_allocation_count+1)}} DETAILS
														</h4>

													</div>
												
												<div id="season_showdetails{{($rate_allocation_count+1)}}" class="rate_allocation_details_data row">
													<div class="row">
														<div class="col-md-12">
															
															<div class="row" style="padding: 0 30px;">

																<div class="col-md-3">

																	<label for="season_name{{($rate_allocation_count+1)}}"><strong>SEASON NAME :</strong></label>

																</div>

																<div class="col-md-9">

																	<p class="" id="season_name{{($rate_allocation_count+1)}}"> @if($hotel_season_details[$rate_allocation_count]['season_name']!="" && $hotel_season_details[$rate_allocation_count]['season_name']!=null)
																		{{$hotel_season_details[$rate_allocation_count]['season_name']}}
																	@else No Data Available @endif </p>

																</div>

															</div>
															<div class="row" style="padding: 0 30px;">

																<div class="col-md-3">

																	<label for="booking_validity_from{{($rate_allocation_count+1)}}"><strong>BOOKING VALIDITY :</strong></label>

																</div>

																<div class="col-md-9">

																	<p class="" id="booking_validity_from{{($rate_allocation_count+1)}}">  @if($hotel_season_details[$rate_allocation_count]['booking_validity_from']!="" && $hotel_season_details[$rate_allocation_count]['booking_validity_from']!=null)
																		@php
																		echo date('d-m-Y',strtotime($hotel_season_details[$rate_allocation_count]['booking_validity_from']));
																		@endphp
																		@else No Data Available
																		@endif 
																		To

																		@if($hotel_season_details[$rate_allocation_count]['booking_validity_to'] && $hotel_season_details[$rate_allocation_count]['booking_validity_to']!=null)
																		@php
																		echo date('d-m-Y',strtotime($hotel_season_details[$rate_allocation_count]['booking_validity_to']));
																		@endphp
																		@else No Data Available
																		@endif 
																	</p>

																</div>

															</div>
															<div class="row" style="padding: 0 30px;">

																<div class="col-md-3">

																	<label for="stop_sale{{($rate_allocation_count+1)}}"><strong>STOP SALE :</strong></label>

																</div>

																<div class="col-md-9">

																	<p class="" id="stop_sale{{($rate_allocation_count+1)}}">  @if($hotel_season_details[$rate_allocation_count]['stop_sale']!="" && $hotel_season_details[$rate_allocation_count]['stop_sale']!=null)
																		@php
																		echo date('d-m-Y',strtotime($hotel_season_details[$rate_allocation_count]['stop_sale']));
																		@endphp
																		@else No Data Available
																		@endif 
																	</p>

																</div>

															</div>
															
															<div class="row mb-10" style="padding: 0 20px;">

																<div class="col-md-12">

																	<h4 class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;" >

																		<i class="fa fa-minus-circle nationality_markup_details" id="nationality_markup_details{{($rate_allocation_count+1)}}"></i> MARKUP DETAILS

																	</h4>

																</div>
											<div id="nationality_markup_showdetails{{($rate_allocation_count+1)}}" class="row" style="padding: 0 30px;">


											@php
											for($nation_count=0;$nation_count< count($hotel_markup_details[$rate_allocation_count]['activity_nationality']);$nation_count++)
											{
											@endphp
											<div class="col-md-6">
												<div class="row">
												<div class="col-md-6">
													<label for="activity_nationality{{$nation_count}}"><strong>NATIONALITY:</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="activity_nationality{{$nation_count}}">
													@foreach($countries as $country)
											 		@if($country->country_id==$hotel_markup_details[$rate_allocation_count]['activity_nationality'][$nation_count])
											 		{{$country->country_name}}
											 		@endif
											 		@endforeach
												</p>
											</div>
												<div class="col-md-6">
													<label for="activity_markup{{$nation_count}}"><strong>MARKUP TYPE:</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="activity_markup{{$nation_count}}">{{$hotel_markup_details[$rate_allocation_count]['activity_markup'][$nation_count]}}
												</p>
											</div>
											<div class="col-md-6">
													<label for="activity_amount{{$nation_count}}"><strong>MARKUP PERCENTAGE/AMOUNT:</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="activity_amount{{$nation_count}}">{{$hotel_markup_details[$rate_allocation_count]['activity_amount'][$nation_count]}}
												</p>
											</div>
											</div>
											</div>
											
											@php
											}
											@endphp					
											
											</div>


															</div>
																<div class="row mb-10" style="padding: 0 20px;">

																<div class="col-md-12">

																	<h4 class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;" >

																		<i class="fa fa-minus-circle hotel_blackout_dates" id="hotel_blackout_dates{{($rate_allocation_count+1)}}"></i> BLACKOUT DATES

																	</h4>

																</div>
											<div id="hotel_blackout_showdates{{($rate_allocation_count+1)}}" class="col-md-12" style="padding: 0 30px;">

									<div class="row">
											@php
											$blackout_dates=explode(',',$hotel_blackout_dates[$rate_allocation_count]);	

											for($blackout_count=0;$blackout_count< count($blackout_dates);$blackout_count++)
											{
												
												
											@endphp
											<div class="col-md-3">

												<label for="blackout_dates{{$blackout_count}}"><strong>DAY {{($blackout_count+1)}} :</strong></label>

											</div>

											<div class="col-md-3">

												<p class="" id="blackout_dates{{$blackout_count}}">
												 @php
												 if($blackout_dates[$blackout_count]=="")
												 {
														echo "No Data Available";
												 }
												 else
												 {
												 	echo date('d-m-Y',strtotime($blackout_dates[$blackout_count]));
												 }
												
												 @endphp </p>

											</div>
											@php
											}
											@endphp		
										</div>			
									</div>


								</div>
								<div class="row mb-10" style="padding: 0 20px;">

									<div class="col-md-12">

										<h4 class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;" >

											<i class="fa fa-minus-circle surcharge_details" id="surcharge_details{{($rate_allocation_count+1)}}"></i> SURCHARGE DETAILS

										</h4>

									</div>
											<div id="surcharge_showdetails{{($rate_allocation_count+1)}}" class="row" style="padding: 0 30px;">


											@php
											for($surcharge_count=0;$surcharge_count< count($hotel_surcharge_details[$rate_allocation_count]['surcharge_name']);$surcharge_count++)
											{
											@endphp
											<div class="col-md-6">
												<div class="row">
												<div class="col-md-6">
													<label for="surcharge_name{{$surcharge_count}}"><strong>SURCHARGE NAME:</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="surcharge_name{{$surcharge_count}}">
													{{$hotel_surcharge_details[$rate_allocation_count]['surcharge_name'][$surcharge_count]}}
												</p>
											</div>
												<div class="col-md-6">
													<label for="surcharge_day{{$surcharge_count}}"><strong>SURCHARGE DATE:</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="surcharge_day{{$surcharge_count}}">
													@php echo date('d-m-Y',strtotime($hotel_surcharge_details[$rate_allocation_count]['surcharge_day'][$surcharge_count])) @endphp
												</p>
											</div>
											<div class="col-md-6">
													<label for="surcharge_price{{$surcharge_count}}"><strong>SURCHARGE PRICE:</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="surcharge_price{{$surcharge_count}}">{{$hotel_surcharge_details[$rate_allocation_count]['surcharge_price'][$surcharge_count]}}
												</p>
											</div>
											</div>
											</div>
											
											@php
											}
											@endphp					
											
											</div>


															</div>

															<div class="row mb-10" style="padding: 0 20px;">

									<div class="col-md-12">

										<h4 class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;" >

											<i class="fa fa-minus-circle roomrate_allocation_details" id="roomrate_allocation_details{{($rate_allocation_count+1)}}"></i> ROOM RATE AND ALLOCATION DETAILS

										</h4>

									</div>
											<div id="roomrate_allocation_showdetails{{($rate_allocation_count+1)}}" class="row" style="padding: 0 30px;">


											@php
											for($room_count=0;$room_count< count($rate_allocation_details[$rate_allocation_count]['room_type']);$room_count++)
											{
											@endphp
											<div class="col-md-6">
												<div class="row">
												<div class="col-md-6">
													<label for="room_type{{$room_count}}"><strong>ROOM TYPE:</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="room_type{{$room_count}}">
													@if($rate_allocation_details[$rate_allocation_count]['room_type'][$room_count]!="" && $rate_allocation_details[$rate_allocation_count]['room_type'][$room_count]!="null")
													{{$rate_allocation_details[$rate_allocation_count]['room_type'][$room_count]}}
													@else
													No Data Available
													@endif
												</p>
											</div>
												<div class="col-md-6">
													<label for="room_min{{$room_count}}"><strong>Min:</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="room_min{{$room_count}}">
													@if($rate_allocation_details[$rate_allocation_count]['room_min'][$room_count]!="" && $rate_allocation_details[$rate_allocation_count]['room_min'][$room_count]!="null")
													{{$rate_allocation_details[$rate_allocation_count]['room_min'][$room_count]}}
													@else
													No Data Available
													@endif
												</p>
											</div>
											<div class="col-md-6">
													<label for="room_max{{$room_count}}"><strong>Max:</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="room_max{{$room_count}}">
													@if($rate_allocation_details[$rate_allocation_count]['room_max'][$room_count]!="" && $rate_allocation_details[$rate_allocation_count]['room_max'][$room_count]!="null")
													{{$rate_allocation_details[$rate_allocation_count]['room_max'][$room_count]}}
													@else
													No Data Available
													@endif
												</p>
											</div>
											<div class="col-md-6">
													<label for="room_class{{$room_count}}"><strong>Room Class:</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="room_class{{$room_count}}">
													@if($rate_allocation_details[$rate_allocation_count]['room_class'][$room_count]!="" && $rate_allocation_details[$rate_allocation_count]['room_class'][$room_count]!="null")
													{{$rate_allocation_details[$rate_allocation_count]['room_class'][$room_count]}}
													@else
													No Data Available
													@endif
												</p>
											</div>
												<div class="col-md-6">
													<label for="room_class{{$room_count}}"><strong>Currency:</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="room_class{{$room_count}}">
													@if($rate_allocation_details[$rate_allocation_count]['room_currency'][$room_count]!="" && $rate_allocation_details[$rate_allocation_count]['room_currency'][$room_count]!="null")
													@foreach($currency as $curr)
											 		@if($curr->code==$rate_allocation_details[$rate_allocation_count]['room_currency'][$room_count])
											 		{{$curr->code}} ({{$curr->name}})
											 		@endif
											 		@endforeach
													@else
													No Data Available
													@endif
												</p>
											</div>
												<div class="col-md-6">
													<label for="room_class{{$room_count}}"><strong>Adult:</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="room_class{{$room_count}}">
													@if($rate_allocation_details[$rate_allocation_count]['room_adult'][$room_count]!="" && $rate_allocation_details[$rate_allocation_count]['room_adult'][$room_count]!="null")
													{{$rate_allocation_details[$rate_allocation_count]['room_adult'][$room_count]}}
													@else
													No Data Available
													@endif
												</p>
											</div>
											<div class="col-md-6">
													<label for="room_cwb{{$room_count}}"><strong>CWB:</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="room_cwb{{$room_count}}">
													@if($rate_allocation_details[$rate_allocation_count]['room_cwb'][$room_count]!="" && $rate_allocation_details[$rate_allocation_count]['room_cwb'][$room_count]!="null")
													{{$rate_allocation_details[$rate_allocation_count]['room_cwb'][$room_count]}}
													@else
													No Data Available
													@endif
												</p>
											</div>
											<div class="col-md-6">
													<label for="room_cnb{{$room_count}}"><strong>CNB:</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="room_cnb{{$room_count}}">
													@if($rate_allocation_details[$rate_allocation_count]['room_cnb'][$room_count]!="" && $rate_allocation_details[$rate_allocation_count]['room_cnb'][$room_count]!="null")
													{{$rate_allocation_details[$rate_allocation_count]['room_cnb'][$room_count]}}
													@else
													No Data Available
													@endif
												</p>
											</div>
											<div class="col-md-6">
													<label for="room_weekend{{$room_count}}"><strong>Weekend:</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="room_weekend{{$room_count}}">
													@if($rate_allocation_details[$rate_allocation_count]['room_weekend'][$room_count]!="" && $rate_allocation_details[$rate_allocation_count]['room_weekend'][$room_count]!="null")
													{{$rate_allocation_details[$rate_allocation_count]['room_weekend'][$room_count]}}
													@else
													No Data Available
													@endif
												</p>
											</div>
											<div class="col-md-6">
													<label for="room_meal{{$room_count}}"><strong>Meal:</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="room_meal{{$room_count}}">
													@if($rate_allocation_details[$rate_allocation_count]['room_meal'][$room_count]!="" && $rate_allocation_details[$rate_allocation_count]['room_meal'][$room_count]!="null")
													<!-- {{$rate_allocation_details[$rate_allocation_count]['room_meal'][$room_count]}} -->
													@foreach($hotel_meal as $meals)
													@if($rate_allocation_details[$rate_allocation_count]['room_meal'][$room_count]==$meals->hotel_meals_id)
													{{$meals->hotel_meals_name}}
													@endif
													@endforeach
													@else
													No Data Available
													@endif
												</p>
											</div>
											<div class="col-md-6">
													<label for="room_night{{$room_count}}"><strong>Night / Allocation:</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="room_night{{$room_count}}">
													@if($rate_allocation_details[$rate_allocation_count]['room_night'][$room_count]!="" && $rate_allocation_details[$rate_allocation_count]['room_night'][$room_count]!="null")
													{{$rate_allocation_details[$rate_allocation_count]['room_night'][$room_count]}}
													@else
													No Data Available
													@endif
												</p>
											</div>
											<div class="col-md-6">
													<label for="room_night{{$room_count}}"><strong>Check in-out:</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="room_night{{$room_count}}">
													@if($rate_allocation_details[$rate_allocation_count]['room_checkin'][$room_count]!="" && $rate_allocation_details[$rate_allocation_count]['room_checkin'][$room_count]!="null")
													{{$rate_allocation_details[$rate_allocation_count]['room_checkin'][$room_count]}}
													@else
													No Data Available
													@endif
													To 

													@if($rate_allocation_details[$rate_allocation_count]['room_checkout'][$room_count]!="" && $rate_allocation_details[$rate_allocation_count]['room_checkout'][$room_count]!="null")
													{{$rate_allocation_details[$rate_allocation_count]['room_checkout'][$room_count]}}
													@else
													No Data Available
													@endif
												</p>
											</div>


											</div>
											</div>
											
											@php
											}
											@endphp					
											
											</div>


															</div>

										

														</div>
													</div>
											</div>
										</div>
												@php
											}
											@endphp


											

										</div>
												</div>
											</div>



										</div>


										<div class="row mb-10">

											<div class="col-md-12">

												<h4 class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;" >

													<i class="fa fa-minus-circle" id="hotel_promotion_details"></i> PROMOTION DETAILS

												</h4>

											</div>



										</div>
										<div id="hotel_promotion_showdetails" class="row">
											
											@php
											$hotel_promotion_details=unserialize($get_hotels->hotel_promotion_details);
											@endphp
											@if(count($hotel_promotion_details)>0)

											<div class="col-md-8">
												<div class="row">
												<div class="col-md-8">
													<label for="hotel_promotion"><strong>PROMOTION :</strong></label>
												</div>
												<div class="col-md-4">
												<p class="" id="hotel_promotion">
													{{$hotel_promotion_details['hotel_promotion']}}
													
												</p>
											</div>
												<div class="col-md-8">
													<label for="hotel_prom_discount"><strong>PROMOTION DISCOUNT :</strong></label>
												</div>
												<div class="col-md-4">
												<p class="" id="hotel_prom_discount">{{$hotel_promotion_details['hotel_prom_discount']}}
												</p>
											</div>
											<div class="col-md-8">
													<label for="hotel_promotion_from"><strong>PROMOTION VALIDITY:</strong></label>
												</div>
												<div class="col-md-4">
												<p class="" id="hotel_promotion_from">@php echo date('d-m-Y',strtotime($hotel_promotion_details['hotel_promotion_from'])) @endphp to 
													@php echo date('d-m-Y',strtotime($hotel_promotion_details['hotel_promotion_to'])) @endphp
												</p>
											</div>
											<div class="col-md-8">
													<label for="hotel_promotion_disc_booking"><strong>PROMOTION DISCOUNT ON BOOKING:</strong></label>
												</div>
												<div class="col-md-4">
												<p class="" id="hotel_promotion_disc_booking">{{$hotel_promotion_details['hotel_promotion_disc_booking']}}
												</p>
											</div>
											<div class="col-md-8">
													<label for="hotel_promotion_disc_travel"><strong>PROMOTION DISCOUNT ON TRAVEL :</strong></label>
												</div>
												<div class="col-md-4">
												<p class="" id="hotel_promotion_disc_travel">{{$hotel_promotion_details['hotel_promotion_disc_travel']}}
												</p>
											</div>
											</div>
											</div>
											@endif

											</div>
											<div class="row mb-10">

												<div class="col-md-12">

													<h4 class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;" >

														<i class="fa fa-minus-circle" id="hotel_addon_details"></i> HOTEL ADDON DETAILS

													</h4>

												</div>



											</div>
										<div id="hotel_addon_showdetails" class="row">
											@if($get_hotels->hotel_add_ons!="" && $get_hotels->hotel_add_ons!=null)
											@php
											$hotel_add_ons=unserialize($get_hotels->hotel_add_ons);

											for($adoon_count=0;$adoon_count< count($hotel_add_ons);$adoon_count++)
											{
											@endphp
											<div class="col-md-6">
												<div class="row">
													
												<div class="col-md-6">
													<label for="hotel_addon_name{{$adoon_count}}"><strong>ADD ON NAME:</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="hotel_addon_name{{$adoon_count}}">{{$hotel_add_ons[$adoon_count]['hotel_addon_name']}}
												</p>
											</div>
											<div class="col-md-6">
													<label for="hotel_desc{{$adoon_count}}"><strong>DESCRIPTION :</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="hotel_desc{{$adoon_count}}">{{$hotel_add_ons[$adoon_count]['hotel_desc']}}
												</p>
											</div>
											<div class="col-md-6">
													<label for="hotel_adult_cost{{$adoon_count}}"><strong>COST FOR ADULT :</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="hotel_adult_cost{{$adoon_count}}">{{$hotel_add_ons[$adoon_count]['hotel_adult_cost']}}
												</p>
											</div>
											<div class="col-md-6">
													<label for="hotel_child_cost{{$adoon_count}}"><strong>COST FOR CHILD:</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="hotel_child_cost{{$adoon_count}}">{{$hotel_add_ons[$adoon_count]['hotel_child_cost']}}
												</p>
											</div>
											<div class="col-md-6">
													<label for="hotel_currency{{$adoon_count}}"><strong>CURRENCY:</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="hotel_currency{{$adoon_count}}">@foreach($currency as $curr)

											 		@if($curr->code==$hotel_add_ons[$adoon_count]['hotel_currency'])
											 		{{$curr->code}} ({{$curr->name}})
											 		@endif
											 		@endforeach
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

														<i class="fa fa-minus-circle" id="hotel_other_policies"></i> OTHER POLICIES DETAILS

													</h4>

												</div>



											</div>
										<div id="hotel_other_policies_showdetails" class="row">
											@if($get_hotels->hotel_other_policies!="" && $get_hotels->hotel_other_policies!=null)
											@php
											$hotel_other_policies=unserialize($get_hotels->hotel_other_policies);

											for($adoon_count=0;$adoon_count< count($hotel_other_policies);$adoon_count++)
											{
											@endphp
											<div class="col-md-6">
												<div class="row">
													
												<div class="col-md-6">
													<label for="policy_name{{$adoon_count}}"><strong>NAME:</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="policy_name{{$adoon_count}}">{{$hotel_other_policies[$adoon_count]['policy_name']}}
												</p>
											</div>
											<div class="col-md-6">
													<label for="policy_desc{{$adoon_count}}"><strong>DESCRIPTION :</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="policy_desc{{$adoon_count}}">{{$hotel_other_policies[$adoon_count]['policy_desc']}}
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

														<i class="fa fa-minus-circle" id="booking_validity"></i> VALIDITY

													</h4>

												</div>



											</div>
										<div id="booking_validity_details" class="row">

											<div class="col-md-3">

												<label for="hotel_rating"><strong>BOOKING VALIDTY :</strong></label>

											</div>

											<div class="col-md-9">

											 @if($get_hotels->booking_validity_from!="" && $get_hotels->booking_validity_from!=null)
												@php
												echo date('d-m-Y',strtotime($get_hotels->booking_validity_from));
												@endphp
												@else No Data Available
												 @endif 
												 To

											 @if($get_hotels->booking_validity_to!="" && $get_hotels->booking_validity_to!=null)
												@php
												echo date('d-m-Y',strtotime($get_hotels->booking_validity_to));
												@endphp
												@else No Data Available
												 @endif 

											</div>


											</div>


											<div class="row mb-10">

											<div class="col-md-12">

												<h4 class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;" >

													<i class="fa fa-minus-circle" id="hotel_inclusions"></i> INCLUSIONS

												</h4>

											</div>



										</div>
										<div class="row" id="hotel_inclusions_details">

											<div class="col-md-12">
												<textarea id="hotel_inclusions_data">
										 @if($get_hotels->hotel_inclusions!="" && $get_hotels->hotel_inclusions!=null) {{$get_hotels->hotel_inclusions}} @else No Data Available @endif
										 </textarea>

											</div>

										</div>

											
										<div class="row mb-10">

											<div class="col-md-12">

												<h4 class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;" >

													<i class="fa fa-minus-circle" id="hotel_exclusions"></i> EXCLUSIONS

												</h4>

											</div>



										</div>
										<div class="row" id="hotel_exclusions_details">

											
											<div class="col-md-12">
												<textarea id="hotel_exclusions_data">
										 @if($get_hotels->hotel_exclusions!="" && $get_hotels->hotel_exclusions!=null) {{$get_hotels->hotel_exclusions}} @else No Data Available @endif
										</textarea>

											</div>

										</div>
										<div class="row mb-10">

											<div class="col-md-12">

												<h4 class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;" >

													<i class="fa fa-minus-circle" id="hotel_cancel_policy"></i> CANCELLATION POLICY

												</h4>

											</div>



										</div>
										<div class="row" id="hotel_cancel_policy_details">

											<div class="col-md-12">
												<textarea id="hotel_cancel_policy_data">
										 @if($get_hotels->hotel_cancel_policy!="" && $get_hotels->hotel_cancel_policy!=null) {{$get_hotels->hotel_cancel_policy}} @else No Data Available @endif
										</textarea>

											</div>

										</div>
										<div class="row mb-10">

											<div class="col-md-12">

												<h4 class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;" >

													<i class="fa fa-minus-circle" id="hotel_terms_conditions"></i> TERMS AND CONDITIONS

												</h4>

											</div>



										</div>
										<div class="row" id="hotel_terms_conditions_details">

											<div class="col-md-12">
												<textarea id="hotel_terms_conditions_data">
										 @if($get_hotels->hotel_terms_conditions!="" && $get_hotels->hotel_terms_conditions!=null) {{$get_hotels->hotel_terms_conditions}} @else No Data Available @endif
										</textarea>

											</div>

										</div>
										<br>
										<div class="row mb-10">

											<div class="col-md-12">

												<h4 class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;" >

													<i class="fa fa-minus-circle" id="hotel_images"></i> HOTEL IMAGES

												</h4>

											</div>



										</div>
										<div class="row" id="hotel_images_details">

											@php
											$get_hotels_images=unserialize($get_hotels->hotel_images);
											for($images=0;$images< count($get_hotels_images);$images++)
											{
												@endphp
												<div class='col-md-3'>
													<img class='upload_ativity_images_preview' src='{{ asset("assets/uploads/hotel_images") }}/{{$get_hotels_images[$images]}}' width=150 height=150 class="img img-thumbnail" />

												</div>
												@php
											}
											@endphp

										</div>


									
										<br>
										<div class="row mb-10">
											<div class="col-md-12">
												<div class="box-header with-border"
												style="padding: 10px;border-bottom:none;border-radius:0;border-top:1px solid #c3c3c3">
												<button type="button" id="discard_hotel" class="btn btn-rounded btn-primary">BACK</button>
												<a href="{{route('edit-hotel',['hotel_id'=>$get_hotels->hotel_id])}}" id="update_hotel" class="btn btn-rounded btn-primary mr-10">EDIT</a>
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
				CKEDITOR.replace('hotel_exclusions_data', {readOnly:true});
				CKEDITOR.replace('hotel_inclusions_data',{readOnly:true});
				CKEDITOR.replace('hotel_cancel_policy_data',{readOnly:true});
				CKEDITOR.replace('hotel_terms_conditions_data',{readOnly:true});

			});
			$(document).on("click","#discard_hotel",function()
			{
				window.history.back();

			});

			$(document).on("click",".season_details",function()

			{	
				var id=this.id;
				var actual_id=id.split("season_details");

				if($(this).hasClass('fa-minus-circle'))

				{

					$(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');



				}

				else

				{

					$(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');

				}

				$("#season_showdetails"+actual_id[1]).toggle();



			});

$(document).on("click",".nationality_markup_details",function()

			{	
				var id=this.id;
				var actual_id=id.split("nationality_markup_details");

				if($(this).hasClass('fa-minus-circle'))

				{

					$(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');



				}

				else

				{

					$(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');

				}

				$("#nationality_markup_showdetails"+actual_id[1]).toggle();



			});

$(document).on("click",".hotel_blackout_dates",function()

			{	
				var id=this.id;
				var actual_id=id.split("hotel_blackout_dates");

				if($(this).hasClass('fa-minus-circle'))

				{

					$(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');



				}

				else

				{

					$(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');

				}

				$("#hotel_blackout_showdates"+actual_id[1]).toggle();



			});

$(document).on("click",".surcharge_details",function()

			{	
				var id=this.id;
				var actual_id=id.split("surcharge_details");

				if($(this).hasClass('fa-minus-circle'))

				{

					$(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');



				}

				else

				{

					$(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');

				}

				$("#surcharge_showdetails"+actual_id[1]).toggle();



			});

$(document).on("click",".roomrate_allocation_details",function()

			{	
				var id=this.id;
				var actual_id=id.split("roomrate_allocation_details");

				if($(this).hasClass('fa-minus-circle'))

				{

					$(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');



				}

				else

				{

					$(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');

				}

				$("#roomrate_allocation_showdetails"+actual_id[1]).toggle();



			});

			$(document).on("click","#hotel_promotion_details",function()

			{

				if($(this).hasClass('fa-minus-circle'))

				{

					$(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');



				}

				else

				{

					$(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');

				}

				$("#hotel_promotion_showdetails").toggle();



			});



			$(document).on("click","#rate_allocation",function()

			{

				if($(this).hasClass('fa-minus-circle'))

				{

					$(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');



				}

				else

				{

					$(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');

				}

				$("#rate_allocation_details").toggle();



			});
			
			$(document).on("click","#hotel_other_policies",function()

			{

				if($(this).hasClass('fa-minus-circle'))

				{

					$(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');



				}

				else

				{

					$(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');

				}

				$("#hotel_other_policies_showdetails").toggle();



			});
			$(document).on("click","#hotel_addon_details",function()

			{

				if($(this).hasClass('fa-minus-circle'))

				{

					$(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');



				}

				else

				{

					$(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');

				}

				$("#hotel_addon_showdetails").toggle();



			});



$(document).on("click","#booking_validity",function()

			{

				if($(this).hasClass('fa-minus-circle'))

				{

					$(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');



				}

				else

				{

					$(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');

				}

				$("#booking_validity_details").toggle();



			});

			$(document).on("click","#hotel_inclusions",function()

			{

				if($(this).hasClass('fa-minus-circle'))

				{

					$(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');



				}

				else

				{

					$(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');

				}

				$("#hotel_inclusions_details").toggle();



			});
			$(document).on("click","#hotel_exclusions",function()

			{

				if($(this).hasClass('fa-minus-circle'))

				{

					$(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');



				}

				else

				{

					$(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');

				}

				$("#hotel_exclusions_details").toggle();



			});
			$(document).on("click","#hotel_cancel_policy",function()

			{

				if($(this).hasClass('fa-minus-circle'))

				{

					$(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');



				}

				else

				{

					$(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');

				}

				$("#hotel_cancel_policy_details").toggle();



			});

	$(document).on("click","#hotel_terms_conditions",function()

			{

				if($(this).hasClass('fa-minus-circle'))

				{

					$(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');



				}

				else

				{

					$(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');

				}

				$("#hotel_terms_conditions_details").toggle();



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



			$(document).on("click","#hotel_images",function()

			{

				if($(this).hasClass('fa-minus-circle'))

				{

					$(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');



				}

				else

				{

					$(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');

				}

				$("#hotel_images_details").toggle();



			});
		</script>



	</body>





	</html>

