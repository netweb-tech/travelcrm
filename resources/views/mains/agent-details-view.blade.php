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

								<h3 class="page-title">Agent Management</h3>

								<div class="d-inline-block align-items-center">

									<nav>

										<ol class="breadcrumb">

											<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>

											<li class="breadcrumb-item" aria-current="page">Dashboard</li>

											<li class="breadcrumb-item active" aria-current="page">View Agent Details

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

												<label for="agent_name"><strong>AGENT NAME :</strong></label>

											</div>

											<div class="col-md-9">

												<p class="" id="agent_name"> @if($get_agent->agent_name!="" && $get_agent->agent_name!="0" && $get_agent->agent_name!=null){{$get_agent->agent_name}} @else No Data Available @endif </p>

											</div>

										</div>

										<div class="row">

											<div class="col-md-3">

												<label for="company_name"><strong>COMPANY NAME :</strong></label>

											</div>

											<div class="col-md-9">

												<p class="" id="company_name"> @if($get_agent->company_name!="" && $get_agent->company_name!="0" && $get_agent->company_name!=null){{$get_agent->company_name}} @else No Data Available @endif </p>

											</div>

										</div>

											<div class="row">

											<div class="col-md-3">

												<label for="company_email"><strong>EMAIL ID :</strong></label>

											</div>

											<div class="col-md-9">

												<p class="" id="company_email"> @if($get_agent->company_email!="" && $get_agent->company_email!="0" && $get_agent->company_email!=null){{$get_agent->company_email}} @else No Data Available @endif </p>

											</div>

										</div>
										<div class="row">

											<div class="col-md-3">

												<label for="company_contact"><strong>CONTACT NUMBER :</strong></label>

											</div>

											<div class="col-md-9">

												<p class="" id="company_contact"> @if($get_agent->company_contact!="" && $get_agent->company_contact!="0" && $get_agent->company_contact!=null){{$get_agent->company_contact}} @else No Data Available @endif </p>

											</div>

										</div>
												<div class="row">

											<div class="col-md-3">

												<label for="company_fax"><strong>FAX ADDRESS :</strong></label>

											</div>

											<div class="col-md-9">

												<p class="" id="company_fax"> @if($get_agent->company_fax!="" && $get_agent->company_fax!=null){{$get_agent->company_fax}} @else No Data Available @endif </p>

											</div>

										</div>

										<div class="row">

											<div class="col-md-3">

												<label for="address"><strong>ADDRESS :</strong></label>

											</div>

											<div class="col-md-9">

												<p class="" id="address"> @if($get_agent->address!="" && $get_agent->address!=null){{$get_agent->address}} @else No Data Available @endif </p>

											</div>

										</div>

											<div class="row">

											<div class="col-md-3">

												<label for="agent_country"><strong>COUNTRY :</strong></label>

											</div>

											<div class="col-md-9">

												<p class="" id="agent_country">
													@if($get_agent->agent_country!="" && $get_agent->agent_country!=null)

													@foreach($countries as $country)
													@if($country->country_id==$get_agent->agent_country)
													{{$country->country_name}}
													@endif
													@endforeach
													
													@else
													No Data Available
													@endif 
											</p>

											</div>

										</div>

											<div class="row">

											<div class="col-md-3">

												<label for="agent_city"><strong>CITY :</strong></label>

											</div>

											<div class="col-md-9">

												<p class="" id="agent_city"> @if($get_agent->agent_city!="" && $get_agent->agent_city!=null)
													<?php
														$fetch_city=ServiceManagement::searchCities($get_agent->agent_city,$get_agent->agent_country);

														echo $fetch_city['name'];
														?> 
													@else No Data Available @endif </p>

											</div>

										</div>

											<div class="row">

											<div class="col-md-3">

												<label for="corporate_reg_no"><strong>CORPORATE REG NO :</strong></label>

											</div>

											<div class="col-md-9">

												<p class="" id="corporate_reg_no"> @if($get_agent->corporate_reg_no!="" && $get_agent->corporate_reg_no!=null){{$get_agent->corporate_reg_no}} @else No Data Available @endif </p>

											</div>

										</div>
											<div class="row">

											<div class="col-md-3">

												<label for="corporate_desc"><strong>CORPORATE DESCRIPTION :</strong></label>

											</div>

											<div class="col-md-9">

												<p class="" id="corporate_desc"> @if($get_agent->corporate_desc!="" && $get_agent->corporate_desc!=null){{$get_agent->corporate_desc}} @else No Data Available @endif </p>

											</div>

										</div>

										<div class="row">

											<div class="col-md-3">

												<label for="skype_id"><strong>SKYPE ID :</strong></label>

											</div>

											<div class="col-md-9">

												<p class="" id="skype_id"> @if($get_agent->skype_id!="" && $get_agent->skype_id!=null){{$get_agent->skype_id}} @else No Data Available @endif </p>

											</div>

										</div>
										<div class="row">

											<div class="col-md-3">

												<label for="operating_hrs_from"><strong>OPERATING HOURS :</strong></label>

											</div>

											<div class="col-md-9">

												<p class="" id="operating_hrs_from"> @if($get_agent->operating_hrs_from!="" && $get_agent->operating_hrs_from!=null){{$get_agent->operating_hrs_from}} @else No Data Available @endif 
													To 
													 @if($get_agent->operating_hrs_to!="" && $get_agent->operating_hrs_to!=null){{$get_agent->operating_hrs_to}} @else No Data Available @endif </p>

											</div>

										</div>

										<div class="row">

											<div class="col-md-3">

												<label for="operating_weekdays"><strong>WORKING DAYS :</strong></label>

											</div>

											<div class="col-md-9">

												<p class="" id="operating_weekdays"> @if($get_agent->operating_weekdays!="" && $get_agent->operating_weekdays!=null)
													@php
													$weekdays=unserialize($get_agent->operating_weekdays);
													$show_days=array();
													foreach($weekdays as $key=>$value)
													{
														if($value=="yes")
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
										<div class="row">

											<div class="col-md-3">

												<label for="certificate_corp"><strong>CERTIFICATE OF CORPORATION :</strong></label>

											</div>

											<div class="col-md-9">

												@if($get_agent->certificate_corp!="" && $get_agent->certificate_corp!=null)
												<a href="{{ asset('assets/uploads/agent_certificates/')}}/{{$get_agent->certificate_corp}}" target="_blank"><img src="{{ asset('assets/uploads/agent_certificates/')}}/{{$get_agent->certificate_corp}}" style="width:200px;height:200px"></a>
												@else No Data Available @endif 

											</div>

										</div>
										<div class="row">

											<div class="col-md-3">

												<label for="agent_logo"><strong>LOGO OF CORPORATION :</strong></label>

											</div>

											<div class="col-md-9">

												@if($get_agent->agent_logo!="" && $get_agent->agent_logo!=null)
												<a href="{{ asset('assets/uploads/agent_logos/')}}/{{$get_agent->agent_logo}}" target="_blank"><img src="{{ asset('assets/uploads/agent_logos/')}}/{{$get_agent->agent_logo}}"  style="width:200px;height:200px"></a>
												@else No Data Available @endif 

											</div>

										</div>


										<div class="row mb-10">

											<div class="col-md-12">

												<h4 class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;" >

													<i class="fa fa-minus-circle" id="country_operation"></i> COUNTRY OF OPERATION

												</h4>

											</div>



										</div>
										<div id="country_operation_details">
											 @if($get_agent->agent_opr_countries!="" && $get_agent->agent_opr_countries!=null)
											 <div class="row">
											 	@php
											 	$opr_countries=explode(',',$get_agent->agent_opr_countries);	

											 	for($i=0;$i< count($opr_countries);$i++)
											 	{
											 		@endphp

											 		@foreach($countries as $country)

											 		@if($country->country_id==$opr_countries[$i])
											 		<div class="col-md-6">
											 			<div class="row">
											 				<div class="col-md-6">
											 					<label for="country_name{{$i}}"><strong>COUNTRY:</strong></label>

											 				</div>

											 				<div class="col-md-6">
											 					<p class="" id="country_name{{$i}}">{{$country->country_name}} </p>

											 				</div>
											 				<div class="col-md-6">
											 					<label for="country_code{{$i}}"><strong>COUNTRY CODE :</strong></label>

											 				</div>

											 				<div class="col-md-6">
											 					<p class="" id="country_code{{$i}}">{{$country->country_sortname}} </p>

											 				</div>
											 			</div>
											 		</div>

											 		@endif
											 		

											 		@endforeach


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

													<i class="fa fa-minus-circle" id="currency_operation"></i> AGENT CURRENCY

												</h4>

											</div>



										</div>
										<div id="currency_operation_details">
											 @if($get_agent->agent_opr_currency!="" && $get_agent->agent_opr_currency!=null)
											 <div class="row">
											 	@php
											 	$opr_currencies=explode(',',$get_agent->agent_opr_currency);	

											 	for($cur=0;$cur< count($opr_currencies);$cur++)
											 	{
											 		@endphp

											 		@foreach($currency as $currencies)

											 		@if($currencies->code==$opr_currencies[$cur])
											 		<div class="col-md-6">
											 			<div class="row">
											 				<div class="col-md-6">
											 					<label for="currency_name{{$cur}}"><strong>NAME:</strong></label>

											 				</div>

											 				<div class="col-md-6">
											 					<p class="" id="currency_name{{$cur}}">{{$currencies->name}} </p>

											 				</div>
											 				<div class="col-md-6">
											 					<label for="currency_code{{$cur}}"><strong>CURRENCY CODE :</strong></label>

											 				</div>

											 				<div class="col-md-6">
											 					<p class="" id="currency_code{{$cur}}">{{$currencies->code}} </p>

											 				</div>
											 				<div class="col-md-6">
											 					<label for="currency_code{{$cur}}"><strong>SYMBOL :</strong></label>

											 				</div>

											 				<div class="col-md-6">
											 					<p class="" id="currency_code{{$cur}}">{{$currencies->symbol}} </p>

											 				</div>
											 			</div>
											 		</div>

											 		@endif
											 		

											 		@endforeach


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

													<i class="fa fa-minus-circle" id="bank_details"></i> BANK DETAILS

												</h4>

											</div>



										</div>

										<div id="agent_bank_details">
											@if($get_agent->agent_bank_details!="" && $get_agent->agent_bank_details!=null)
											<div class="row">
												@php

												$bank_details=unserialize($get_agent->agent_bank_details);	

												for($bank_count=0;$bank_count< count($bank_details);$bank_count++)
												{
													@endphp

													<div class="col-md-3">

														<label for="bank_details{{$bank_count}}"><strong><u>BANK DETAILS {{($bank_count+1)}} :</u></strong></label>

													</div>

													<div class="col-md-9">

														<p class="" id="bank_details{{$bank_count}}">
															<strong>ACCOUNT NUMBER:</strong>  {{$bank_details[$bank_count]['account_number']}}
															<br>
															<strong>BANK NAME:</strong>  {{$bank_details[$bank_count]['bank_name']}}
															<br>
															<strong>BANK IFSC:</strong>  {{$bank_details[$bank_count]['bank_ifsc']}}
															<br>
															<strong>BANK IBAN:</strong>  {{$bank_details[$bank_count]['bank_iban']}}
															<br>
															<strong>BANK CURRENCY:</strong>  {{$bank_details[$bank_count]['bank_currency']}}
																
															 </p>

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

													<i class="fa fa-minus-circle" id="service_details"></i> SERVICE TYPE DETAILS

												</h4>

											</div>



										</div>

										<div id="service_type_details">
											@if($get_agent->agent_service_type!="" && $get_agent->agent_service_type!=null)
											<div class="row">
												@php
												$service_details=explode(',',$get_agent->agent_service_type);
												@endphp


													<div class="col-md-3">

														<label for="service_details"><strong>TYPE:</strong></label>

													</div>

													<div class="col-md-9">

														<ul id="service_details">
															@foreach($service_details as $services)
															<li>{{$services}}</li>
															@endforeach
														</ul>

													</div>

												
											</div>
											@else
											No Data Available 
											@endif

											
											<div class="row">
												


													<div class="col-md-3">

														<label for="service_details"><strong>MARKUP:</strong></label>

													</div>

													<div class="col-md-7">
														@if($get_agent->agent_service_markup!="" && $get_agent->agent_service_markup!=null)
														@php
												$service_markup_details=explode('///',$get_agent->agent_service_markup);
												@endphp

														<table class="table table-condensed">
															<tr>
																<th>Service Name</th>
																<th>Markup</th>
															</tr>
															@php

															for($services=0;$services< count($service_markup_details);$services++)
															{
																if($service_markup_details[$services]!="")
																{
																	$get_services_individual=explode("---",$service_markup_details[$services]);
																	@endphp
																	<tr>
																		<td>{{ strtoupper($get_services_individual[0])}}</td>
																		<td>
																		@if($get_services_individual[1]!="")
																		{{ $get_services_individual[1]}}%
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

													</div>

												
											</div>
											

									</div>


									<div class="row mb-10">

											<div class="col-md-12">

												<h4 class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;" >

													<i class="fa fa-minus-circle" id="contact_details"></i> CONTACT PERSONS

												</h4>

											</div>



										</div>

										<div id="agent_contact_details">
											@if($get_agent->contact_persons!="" && $get_agent->contact_persons!=null)
											<div class="row">
												@php

												$contact_details=unserialize($get_agent->contact_persons);	

												for($cont_count=0;$cont_count< count($contact_details);$cont_count++)
												{
													@endphp

													<div class="col-md-3">

														<label for="contact_details{{$cont_count}}"><strong><u>CONTACT PERSON {{($cont_count+1)}} :</u></strong></label>

													</div>

													<div class="col-md-9">

														<p class="" id="contact_details{{$cont_count}}">
															<strong>NAME:</strong>  {{$contact_details[$cont_count]['contact_person_name']}}
															<br>
															<strong>CONTACT:</strong>  {{$contact_details[$cont_count]['contact_person_number']}}
															<br>
															<strong>EMAIL ID:</strong>  {{$contact_details[$cont_count]['contact_person_email']}}
													
															 </p>

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
												<div class="box-header with-border"
												style="padding: 10px;border-bottom:none;border-radius:0;border-top:1px solid #c3c3c3">
												<button type="button" id="discard_agent" class="btn btn-rounded btn-primary">BACK</button>
												<a href="{{route('edit-agent',['agent_id'=>$get_agent->agent_id])}}" id="update_activity" class="btn btn-rounded btn-primary mr-10">EDIT</a>
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

			$(document).on("click","#country_operation",function()

			{

				if($(this).hasClass('fa-minus-circle'))

				{

					$(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');



				}

				else

				{

					$(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');

				}

				$("#country_operation_details").toggle();



			});



			$(document).on("click","#currency_operation",function()

			{

				if($(this).hasClass('fa-minus-circle'))

				{

					$(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');



				}

				else

				{

					$(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');

				}

				$("#currency_operation_details").toggle();



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



			$(document).on("click","#bank_details",function()

			{

				if($(this).hasClass('fa-minus-circle'))

				{

					$(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');



				}

				else

				{

					$(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');

				}

				$("#agent_bank_details").toggle();



			});



			$(document).on("click","#service_details",function()

			{

				if($(this).hasClass('fa-minus-circle'))

				{

					$(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');



				}

				else

				{

					$(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');

				}

				$("#service_type_details").toggle();



			});
			$(document).on("click","#contact_details",function()

			{

				if($(this).hasClass('fa-minus-circle'))

				{

					$(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');



				}

				else

				{

					$(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');

				}

				$("#agent_contact_details").toggle();



			});


			  $("#discard_agent").on("click", function ()

                {

                    window.history.back();

                });







		</script>



	</body>





	</html>

