<?php
use App\Http\Controllers\ServiceManagement;
?>
@include('supplier.includes.top-header')

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

		@include('supplier.includes.top-nav')

		<div class="content-wrapper">

			<div class="container-full clearfix position-relative">	

				@include('supplier.includes.nav')

				<div class="content">

					<!-- Content Header (Page header) -->

					<div class="content-header">

						<div class="d-flex align-items-center">

							<div class="mr-auto">

								<h3 class="page-title">Supplier Management</h3>

								<div class="d-inline-block align-items-center">

									<nav>

										<ol class="breadcrumb">

											<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>

											<li class="breadcrumb-item" aria-current="page">Dashboard</li>

											<li class="breadcrumb-item active" aria-current="page">View Guide Details

											</li>

										</ol>

									</nav>

								</div>

							</div>

							<!-- <div class="right-title">

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

									<div class="box-body">
										<div class="row">
											<div class="col-md-8">


												<div class="row">

													<div class="col-md-3">

														<label for="guide_name"><strong>GUIDE NAME :</strong></label>

													</div>

													<div class="col-md-9">

														<p class="" id="guide_name"> @if($get_guides->guide_first_name!="" && $get_guides->guide_first_name!="0" && $get_guides->guide_first_name!=null){{$get_guides->guide_first_name}} @endif  @if($get_guides->guide_last_name!="" && $get_guides->guide_last_name!="0" && $get_guides->guide_last_name!=null){{$get_guides->guide_last_name}} @endif </p>

													</div>

												</div>

												<div class="row">

													<div class="col-md-3">

														<label for="guide_contact"><strong>CONTACT NUMBER :</strong></label>

													</div>

													<div class="col-md-9">

														<p class="" id="guide_contact"> @if($get_guides->guide_contact!="" && $get_guides->guide_contact!=null)
															{{$get_guides->guide_contact}}
														@else No Data Available @endif </p>

													</div>

												</div>

												<div class="row">

													<div class="col-md-3">

														<label for="guide_address"><strong>ADDRESS :</strong></label>

													</div>

													<div class="col-md-9">

														<p class="" id="guide_address"> @if($get_guides->guide_address!="" && $get_guides->guide_address!=null)
															{{$get_guides->guide_address}}
														@else No Data Available @endif </p>

													</div>

												</div>



												<div class="row">

													<div class="col-md-3">

														<label for="guide_country"><strong>COUNTRY :</strong></label>

													</div>

													<div class="col-md-9">

														<p class="" id="guide_country"> @if($get_guides->guide_country!="" && $get_guides->guide_country!=null)
															@foreach($countries as $country)
															@if(in_array($country->country_id,$countries_data))
															@if($country->country_id==$get_guides->guide_country)
															{{$country->country_name}}
															@endif
															@endif
															@endforeach
														@else No Data Available @endif </p>

													</div>

												</div>

												<div class="row">

													<div class="col-md-3">

														<label for="guide_city"><strong>CITY :</strong></label>

													</div>

													<div class="col-md-9">

														<p class="" id="guide_city"> @if($get_guides->guide_city!="" && $get_guides->guide_city!=null)
															<?php
															$fetch_city=ServiceManagement::searchCities($get_guides->guide_city,$get_guides->guide_country);

															echo $fetch_city['name'];
															?>
														@else No Data Available @endif </p>

													</div>

												</div>
												<div class="row">

													<div class="col-md-3">

														<label for="guide_language"><strong>LANGUAGE :</strong></label>

													</div>

													<div class="col-md-9">

														<p class="" id="guide_language"> @if($get_guides->guide_language!="" && $get_guides->guide_language!=null)
															@php
															$languages_data=explode(",",$get_guides->guide_language);

															foreach($languages as $language)
															{
																if(in_array($language->language_id,$languages_data))
																{
																	echo $language->language_name." ,";
																}
															}

															@endphp
														@else No Data Available @endif </p>

													</div>

												</div>
												<div class="row">

													<div class="col-md-3">

														<label for="supplier_id"><strong>GUIDE PRICE <small>(per day)</small> :</strong></label>

													</div>

													<div class="col-md-9">

														<p class="" id="supplier_id"> @if($get_guides->guide_price_per_day!="" && $get_guides->guide_price_per_day!=null)
															{{$get_guides->guide_price_per_day}}
														@else No Data Available @endif </p>

													</div>

												</div>


												<div class="row">

													<div class="col-md-3">

														<label for="guide_description"><strong>DESCRIPTION :</strong></label>

													</div>

													<div class="col-md-9">

														<p class="" id="guide_description"> @if($get_guides->guide_description!="" && $get_guides->guide_description!=null)
															{{$get_guides->guide_description}}
														@else No Data Available @endif </p>

													</div>

												</div>

													<div class="row">

											<div class="col-md-3">

												<label for="operating_weekdays"><strong>WORKING DAYS :</strong></label>

											</div>

											<div class="col-md-9">

												<p class="" id="operating_weekdays"> @if($get_guides->operating_weekdays!="" && $get_guides->operating_weekdays!=null)
													@php
													$weekdays=unserialize($get_guides->operating_weekdays);
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
											@if($get_guides->guide_blackout_dates!="" && $get_guides->guide_blackout_dates!=null)
											<div class="row">
											@php
											$blackout_dates=explode(',',$get_guides->guide_blackout_dates);	
											
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

<!-- 												<div class="row mb-10">

											<div class="col-md-12">

												<h4 class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;" >

													<i class="fa fa-minus-circle" id="nationality_markup_details"></i> NATIONALITY & TRANSFER MARKUP DETAILS

												</h4>

											</div>



										</div>
										<div id="nationality_markup_showdetails" class="row">
											@if($get_guides->nationality_markup_details!="" && $get_guides->nationality_markup_details!=null)
											@php
											$nationality_markup_details=unserialize($get_guides->nationality_markup_details);

											for($nation_count=0;$nation_count< count($nationality_markup_details);$nation_count++)
											{
											@endphp
											<div class="col-md-6">
												<div class="row">
												<div class="col-md-6">
													<label for="guide_nationality{{$nation_count}}"><strong>NATIONALITY:</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="guide_nationality{{$nation_count}}">
													@foreach($countries as $country)

											 		@if($country->country_id==$nationality_markup_details[$nation_count]['guide_nationality'])
											 		{{$country->country_name}}
											 		@endif
											 		@endforeach
												</p>
											</div>
												<div class="col-md-6">
													<label for="guide_markup{{$nation_count}}"><strong>MARKUP TYPE:</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="guide_markup{{$nation_count}}">{{$nationality_markup_details[$nation_count]['guide_markup']}}
												</p>
											</div>
											<div class="col-md-6">
													<label for="guide_amount{{$nation_count}}"><strong>MARKUP PERCENTAGE/AMOUNT:</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="guide_amount{{$nation_count}}">{{$nationality_markup_details[$nation_count]['guide_amount']}}
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
											</div>-->
											<div class="row mb-10" style="display: none">

											<div class="col-md-12">

												<h4 class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;" >

													<i class="fa fa-minus-circle" id="transport_pricing"></i> GUIDE TARIFF DETAILS

												</h4>

											</div>
										</div>
										<div id="transport_pricing_details" class="row" style="display: none">
											@if($get_guides->guide_tariff!="" && $get_guides->guide_tariff!=null)
											@php
											$guide_tariff=unserialize($get_guides->guide_tariff);

											for($transport_count=0;$transport_count< count($guide_tariff);$transport_count++)
											{
											@endphp
											<div class="col-md-6" style="border-bottom: 1px solid #8c8c8c;padding: 1% 4% 1% 4%">
												<div class="row">
													<div class="col-md-6" >
													<label for="guide_validity_from{{$transport_count}}"><strong>VALIDITY:</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="guide_validity_from{{$transport_count}}">
													@if($guide_tariff[$transport_count]['guide_validity_from']!="" && $guide_tariff[$transport_count]['guide_validity_from']!="0" && $guide_tariff[$transport_count]['guide_validity_from']!=null)
													@php echo date('d-m-Y',strtotime($guide_tariff[$transport_count]['guide_validity_from'])) @endphp
													@else 
													No Data Available 
													@endif
													To
													@if($guide_tariff[$transport_count]['guide_validity_to']!="" && $guide_tariff[$transport_count]['guide_validity_to']!="0" && $guide_tariff[$transport_count]['guide_validity_to']!=null) 
													@php 
													echo date('d-m-Y',strtotime($guide_tariff[$transport_count]['guide_validity_to'])) @endphp
													@else 
													No Data Available
													@endif
												</p>
											</div>
											<div class="col-md-6">
													<label for="guide_tourname{{$transport_count}}"><strong>TOUR NAME:</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="guide_tourname{{$transport_count}}">{{$guide_tariff[$transport_count]['guide_tourname']}}
												</p>
											</div>
											
											
												<div class="col-md-6">
													<label for="guide_cost_four{{$transport_count}}"><strong>PRICE UPTO 4:</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="guide_cost_four{{$transport_count}}">{{$guide_tariff[$transport_count]['guide_cost_four']}}
												</p>
											</div>
											<div class="col-md-6">
													<label for="guide_cost_seven{{$transport_count}}"><strong>PRICE UPTO 7:</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="guide_cost_seven{{$transport_count}}">{{$guide_tariff[$transport_count]['guide_cost_seven']}}
												</p>
											</div>
											<div class="col-md-6">
													<label for="guide_cost_twenty{{$transport_count}}"><strong>PRICE UPTO 20:</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="guide_cost_twenty{{$transport_count}}">{{$guide_tariff[$transport_count]['guide_cost_twenty']}}
												</p>
											</div>
											<div class="col-md-6">
													<label for="guide_duration{{$transport_count}}"><strong>DURATION:</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="guide_duration{{$transport_count}}">
													@if(!empty($guide_tariff[$transport_count]['guide_duration']))
													{{$guide_tariff[$transport_count]['guide_duration']}}
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
											@else
											No Data Available 
											@endif
											</div>
												<div class="row mb-10" style="display:none">

											<div class="col-md-12">

												<h4 class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;" >

													<i class="fa fa-minus-circle" id="guide_inclusions"></i> INCLUSIONS

												</h4>

											</div>



										</div>
										<div class="row" id="guide_inclusions_details" style="display:none">

											<div class="col-md-12">
												<textarea id="guide_inclusions_data">
										 @if($get_guides->guide_inclusions!="" && $get_guides->guide_inclusions!=null) {{$get_guides->guide_inclusions}} @else No Data Available @endif
										 </textarea>

											</div>

										</div>

											
										<div class="row mb-10" style="display:none">

											<div class="col-md-12">

												<h4 class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;" >

													<i class="fa fa-minus-circle" id="guide_exclusions"></i> EXCLUSIONS

												</h4>

											</div>



										</div>
										<div class="row" id="guide_exclusions_details" style="display:none">

											
											<div class="col-md-12">
												<textarea id="guide_exclusions_data">
										 @if($get_guides->guide_exclusions!="" && $get_guides->guide_exclusions!=null) {{$get_guides->guide_exclusions}} @else No Data Available @endif
										</textarea>

											</div>

										</div>
										<div class="row mb-10">

											<div class="col-md-12">

												<h4 class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;" >

													<i class="fa fa-minus-circle" id="guide_cancel_policy"></i> CANCELLATION POLICY

												</h4>

											</div>



										</div>
										<div class="row" id="guide_cancel_policy_details">

											<div class="col-md-12">
												<textarea id="guide_cancel_policy_data">
										 @if($get_guides->guide_cancel_policy!="" && $get_guides->guide_cancel_policy!=null) {{$get_guides->guide_cancel_policy}} @else No Data Available @endif
										</textarea>

											</div>

										</div>
										<div class="row mb-10">

											<div class="col-md-12">

												<h4 class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;" >

													<i class="fa fa-minus-circle" id="guide_terms_conditions"></i> TERMS AND CONDITIONS

												</h4>

											</div>



										</div>
										<div class="row" id="guide_terms_conditions_details">

											<div class="col-md-12">
												<textarea id="guide_terms_conditions_data">
										 @if($get_guides->guide_terms_conditions!="" && $get_guides->guide_terms_conditions!=null) {{$get_guides->guide_terms_conditions}} @else No Data Available @endif
										</textarea>

											</div>

										</div>
										<div class="row mb-10">

											<div class="col-md-12">

												<h4 class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;" >

													<i class="fa fa-minus-circle" id="sightseeing_guide_cost"></i> SIGHTSEEING GUIDE COST

												</h4>

											</div>



										</div>
										<div class="row" id="sightseeing_guide_cost_details">

											{{-- <div class="col-md-12">
												
												

												@if($get_guides->guide_tours_cost!="" && $get_guides->guide_tours_cost!=null)
												@php
												$guide_cost_details=explode('///',$get_guides->guide_tours_cost);
												@endphp

												<table class="table table-condensed">
													<tr>
														<th>Tour Name</th>
														<th>Cost</th>
													</tr>
													@php

													for($services=0;$services< count($guide_cost_details);$services++)
													{
														if($guide_cost_details[$services]!="")
														{
															$get_services_individual=explode("---",$guide_cost_details[$services]);
															 $get_name=ServiceManagement::searchSightseeingTourName($get_services_individual[0]);

                                                        $tour_name=$get_name['sightseeing_tour_name'];
															@endphp
															<tr>
																<td>{{$tour_name}}</td>
																<td>
																	@if($get_services_individual[1]!="")
																	{{ $get_services_individual[1]}}
																	@else
																	No Data Available 

																@endif</td>
															</tr>
															@php
														}
													}
													@endphp
												</table>
												@else
												No Data Available 
												@endif

											</div> --}}
											<div class="col-md-12">
                                           @php
                                            $guide_tours_cost=unserialize($get_guides->guide_tours_cost);
                                           @endphp

                                                @if($guide_tours_cost=="null" || $guide_tours_cost=="" || count($guide_tours_cost)<=0)
                                                <div class='row'><p class='text-center'><b>No Tour Cost Available</b></p></div>
                                                @else
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th>SIGHTSEEING TOURS</th>
                                                        <th>VEHICLE TYPE</th>
                                                        <th>GUIDE COST</th>
                                                    </tr>
                                                @php
                                                for($tour_count=0;$tour_count < count($guide_tours_cost);$tour_count++)
                                                {
                                                    $fetch_tour_name=ServiceManagement::searchSightseeingTourName($guide_tours_cost[$tour_count]['tour_name']);

                                                    $tour_name=$fetch_tour_name['sightseeing_tour_name'];
                                                    echo "<tr>
                                                        <td rowspan='".(count($guide_tours_cost[$tour_count]['tour_vehicle_name'])+1)."'>".ucwords($tour_name)."</td>
                                                        ";

                                                         for($tour_vehicle_count=0;$tour_vehicle_count < count($guide_tours_cost[$tour_count]['tour_vehicle_name']);$tour_vehicle_count++)
                                                         {
                                                            $vehicle_name="";
                                                            foreach($fetch_vehicle_type as $vehicle_type)
                                                            {
                                                                if($vehicle_type->vehicle_type_id==$guide_tours_cost[$tour_count]['tour_vehicle_name'][$tour_vehicle_count])
                                                                {
                                                                   $vehicle_name=$vehicle_type->vehicle_type_name;

                                                                   echo "<tr><td>$vehicle_name</td>
                                                                   	<td>".$guide_tours_cost[$tour_count]['tour_guide_cost'][$tour_vehicle_count]."</td></tr>";
                                                            
                                                             }
                                                           }     
                                                         } 
                                                            echo "</tr>";
                                                    }
                                                    @endphp
                                                </table>
                                                @endif

                                            </div>

												
									


										</div>









												<br>
												<div class="row mb-10">
													<div class="col-md-12">
														<div class="box-header with-border"
														style="padding: 10px;border-bottom:none;border-radius:0;border-top:1px solid #c3c3c3">
														<button type="button" id="discard_guide" class="btn btn-rounded btn-primary">BACK</button>
														<a href="{{route('supplier-edit-guide',['guide_id'=>$get_guides->guide_id])}}" id="update_transfer" class="btn btn-rounded btn-primary mr-10">EDIT</a>
													</div>
												</div>
											</div>





											<!-- /.row -->

										</div>
										<div class="col-md-4">
											<a href="{{ asset('assets/uploads/guide_images/')}}/{{$get_guides->guide_image}}" target="_blank"><img height="200" alt="Guide Picture Preview..."
												src="{{ asset('assets/uploads/guide_images/')}}/{{$get_guides->guide_image}}"></a>
											</div>
										</div>

										<!-- /.box-body -->

									</div>


								</div>
								<!-- /.box -->
							</div>
						</div>
					</div>
			</div>
		</div>

		@include('supplier.includes.footer')

		@include('supplier.includes.bottom-footer')



		<script>
			$(document).on("click","#discard_guide",function()
			{
				window.history.back();

			});
			$(document).ready(function()
			{
				CKEDITOR.replace('guide_exclusions_data', {readOnly:true});
				CKEDITOR.replace('guide_inclusions_data',{readOnly:true});
				CKEDITOR.replace('guide_cancel_policy_data',{readOnly:true});
				CKEDITOR.replace('guide_terms_conditions_data',{readOnly:true});

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
			$(document).on("click","#guide_inclusions",function()

			{

				if($(this).hasClass('fa-minus-circle'))

				{

					$(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');



				}

				else

				{

					$(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');

				}

				$("#guide_inclusions_details").toggle();



			});
			$(document).on("click","#guide_exclusions",function()

			{

				if($(this).hasClass('fa-minus-circle'))

				{

					$(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');



				}

				else

				{

					$(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');

				}

				$("#guide_exclusions_details").toggle();



			});
			$(document).on("click","#guide_cancel_policy",function()

			{

				if($(this).hasClass('fa-minus-circle'))

				{

					$(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');



				}

				else

				{

					$(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');

				}

				$("#guide_cancel_policy_details").toggle();



			});

	$(document).on("click","#guide_terms_conditions",function()

			{

				if($(this).hasClass('fa-minus-circle'))

				{

					$(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');



				}

				else

				{

					$(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');

				}

				$("#guide_terms_conditions_details").toggle();



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

			$(document).on("click","#sightseeing_guide_cost",function()

			{

				if($(this).hasClass('fa-minus-circle'))

				{

					$(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');



				}

				else

				{

					$(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');

				}

				$("#sightseeing_guide_cost_details").toggle();



			});




		</script>



	</body>





	</html>

