

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

				<h3 class="page-title">Enquiry Management</h3>

				<div class="d-inline-block align-items-center">

					<nav>

						<ol class="breadcrumb">

							<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>

							<li class="breadcrumb-item" aria-current="page">Dashboard</li>

							<li class="breadcrumb-item active" aria-current="page">View Enquiry Details

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





@if($rights['view']==1)
	<div class="row">
		<div class="col-12">

			<div class="box">

				<div class="box-body">

					<div class="row">

						<div class="col-md-3">

							<label for="organization_name"><strong>ORGANIZATION NAME :</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="organization_name"> @if($get_enquiries->organization_name!="" && $get_enquiries->organization_name!="0" && $get_enquiries->organization_name!=null){{$get_enquiries->organization_name}} @else No Data Available @endif </p>

						</div>

					</div>

					<div class="row">

						<div class="col-md-3">

							<label for="customer_name"><strong>CUSTOMER NAME :</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="customer_name">@if($get_enquiries->customer_name!="" && $get_enquiries->customer_name!="0" && $get_enquiries->customer_name!=null){{$get_enquiries->customer_name}} @else No Data Available @endif</p>

						</div>

					</div>

					<div class="row">

						<div class="col-md-3">

							<label for="customer_contact"><strong>CUSTOMER CONTACT :</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="customer_contact">@if($get_enquiries->customer_contact!="" && $get_enquiries->customer_contact!="0" && $get_enquiries->customer_contact!=null){{$get_enquiries->customer_contact}} @else No Data Available @endif</p>

						</div>

					</div>

					<div class="row">

						<div class="col-md-3">

							<label for="customer_alt_contact"><strong>ALTERNATE CONTACT :</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="customer_alt_contact">@if($get_enquiries->customer_alt_contact!="" && $get_enquiries->customer_alt_contact!="0"  && $get_enquiries->customer_alt_contact!=null){{$get_enquiries->customer_alt_contact}} @else No Data Available @endif</p>

						</div>

					</div>

					<div class="row">

						<div class="col-md-3">

							<label for="customer_email"><strong>CUSTOMER EMAIL :</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="customer_email">@if($get_enquiries->customer_email!="" && $get_enquiries->customer_email!="0"  && $get_enquiries->customer_email!=null){{$get_enquiries->customer_email}} @else No Data Available @endif</p>

						</div>

					</div>

					<div class="row">

						<div class="col-md-3">

							<label for="customer_alt_email"><strong>ALTERNATE EMAIL :</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="customer_alt_email">@if($get_enquiries->customer_alt_email!="" && $get_enquiries->customer_alt_email!="0"  && $get_enquiries->customer_alt_email!=null){{$get_enquiries->customer_alt_email}} @else No Data Available @endif</p>

						</div>

					</div>

					<div class="row">

						<div class="col-md-3">

							<label for="address"><strong>ADDRESS :</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="address">@if($get_enquiries->address!="" && $get_enquiries->address!="0"  && $get_enquiries->address!=null){{$get_enquiries->address}} @else No Data Available @endif</p>

						</div>

					</div>

					<div class="row">

						<div class="col-md-3">

							<label for="area"><strong>AREA :</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="area">@if($get_enquiries->area!="" && $get_enquiries->area!="0"  && $get_enquiries->area!=null){{$get_enquiries->area}} @else No Data Available @endif</p>

						</div>

					</div>

					<div class="row">

						<div class="col-md-3">

							<label for="customer_country"><strong>COUNTRY :</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="customer_country">

								@if($get_enquiries->customer_country!="" && $get_enquiries->customer_country!="0"  && $get_enquiries->customer_country!=null)

								@foreach($countries as $country)

								@if($country->country_id==$get_enquiries->customer_country)

								{{$country->country_name}}

								@endif

								@endforeach

								@else

								No Data Available 

							@endif</p>

						</div>

					</div>

					<div class="row">

						<div class="col-md-3">

							<label for="customer_city"><strong>CITY :</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="customer_city">@if($get_enquiries->customer_city!="" && $get_enquiries->customer_city!="0"  && $get_enquiries->customer_city!=null){{$get_enquiries->customer_city}} @else No Data Available @endif</p>

						</div>

					</div>

					<div class="row">

						<div class="col-md-3">

							<label for="customer_state"><strong>STATE :</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="customer_state">@if($get_enquiries->customer_state!="" && $get_enquiries->customer_state!="0"  && $get_enquiries->customer_state!=null){{$get_enquiries->customer_state}} @else No Data Available @endif</p>

						</div>

					</div>

					<div class="row">

						<div class="col-md-3">

							<label for="customer_zipcode"><strong>ZIPCODE :</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="customer_zipcode">@if($get_enquiries->customer_zipcode!="" && $get_enquiries->customer_zipcode!="0"  && $get_enquiries->customer_zipcode!=null){{$get_enquiries->customer_zipcode}} @else No Data Available @endif</p>

						</div>

					</div>

					<div class="row">

						<div class="col-md-3">

							<label for="enquiry_type"><strong>ENQUIRY TYPE :</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="enquiry_type">@if($get_enquiries->enquiry_type!="" && $get_enquiries->enquiry_type!="0"  && $get_enquiries->enquiry_type!=null){{$get_enquiries->enquiry_type}} @else No Data Available @endif</p>

						</div>

					</div>

					<div class="row">

						<div class="col-md-3">

							<label for="passport_no"><strong>PASSPORT NUMBER :</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="passport_no">@if($get_enquiries->passport_no!="" && $get_enquiries->passport_no!="0"  && $get_enquiries->passport_no!=null){{$get_enquiries->passport_no}} @else No Data Available @endif</p>

						</div>

					</div>

					<div class="row">

						<div class="col-md-3">

							<label for="passport_validity"><strong>PASSPORT VALIDITY :</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="passport_validity">@if($get_enquiries->passport_validity!="" && $get_enquiries->passport_validity!="0"  && $get_enquiries->passport_validity!=null)

								@php

								echo date('d/m/Y',strtotime($get_enquiries->passport_validity));

								@endphp

								



							@else No Data Available @endif</p>

						</div>

					</div>

					<div class="row">

						<div class="col-md-3">

							<label for="no_of_adults"><strong>ADULTS :</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="no_of_adults">@if($get_enquiries->no_of_adults!="" && $get_enquiries->no_of_adults!="0"  && $get_enquiries->no_of_adults!=null){{$get_enquiries->no_of_adults}} @else No Data Available @endif</p>

						</div>

					</div>

						<div class="row">

						<div class="col-md-3">

							<label for="no_of_kids"><strong>KIDS :</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="no_of_kids">@if($get_enquiries->no_of_kids!="" && $get_enquiries->no_of_kids!=null){{$get_enquiries->no_of_kids}} @else No Data Available @endif</p>

						</div>

					</div>

					<div class="row">

						<div class="col-md-3">

							<label for="booking_range"><strong>Booking Range :</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="booking_range">@if($get_enquiries->booking_range!="" && $get_enquiries->booking_range!=null)

								@php

								$booking_range=explode(' - ',$get_enquiries->booking_range);

								$booking_range_from=$booking_range[0];

								$booking_range_to=$booking_range[1];



								echo date('Y-m-d H:i:s',strtotime($booking_range_from))." &nbsp; &nbsp; To   &nbsp;&nbsp; ". date('Y-m-d H:i:s',strtotime($booking_range_to));

								@endphp

								 @else No Data Available @endif</p>

						</div>

					</div>

					<div class="row">

						<div class="col-md-3">

							<label for="enquiry_prospect"><strong>PROSPECT :</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="enquiry_prospect">@if($get_enquiries->enquiry_prospect!="" && $get_enquiries->enquiry_prospect!="0"  && $get_enquiries->enquiry_prospect!=null){{$get_enquiries->enquiry_prospect}} @else No Data Available @endif</p>

						</div>

					</div>

						<div class="row">

						<div class="col-md-3">

							<label for="hotel_type"><strong>HOTEL TYPE :</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="hotel_type">@if($get_enquiries->hotel_type!="" && $get_enquiries->hotel_type!="0"  && $get_enquiries->hotel_type!=null){{$get_enquiries->hotel_type}} @else No Data Available @endif</p>

						</div>

					</div>

					<div class="row">

						<div class="col-md-3">

							<label for="budget_type"><strong>BUDGET :</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="budget_type">@if($get_enquiries->budget_type!="" && $get_enquiries->budget_type!="0"  && $get_enquiries->budget_type!=null){{$get_enquiries->budget_type}} @else No Data Available @endif</p>

						</div>

					</div>

					<div class="row">

						<div class="col-md-3">

							<label for="budget_type"><strong>CURRENCY EXCHANGE RATE :</strong></label>

						</div>

						<div class="col-md-9">

						</div>

					</div>

						<div class="row">

						<div class="col-md-3">

							<label for="currency"><strong>Currency:</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="currency">@if($get_enquiries->select_currency!="" && $get_enquiries->select_currency!="0"  && $get_enquiries->select_currency!=null)

								  @foreach($currency as $curr)

                                                 @if($curr->code==$get_enquiries->select_currency)

                                        {{$curr->code}} ({{$curr->name}})

                                        @endif

                                        @endforeach

								 @else No Data Available @endif</p>

						</div>

					</div>

						<div class="row">

						<div class="col-md-3">

							<label for="budget_type"><strong>VISA :</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="budget_type">@if($get_enquiries->have_visa!="" && $get_enquiries->have_visa!="0"  && $get_enquiries->have_visa!=null){{$get_enquiries->have_visa}} @else No Data Available @endif</p>

						</div>

					</div>

					<div class="row">

						<div class="col-md-3">

							<label for="budget_type"><strong>INSURANCE :</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="budget_type">@if($get_enquiries->have_insurance_status!="" && $get_enquiries->have_insurance_status!="0"  && $get_enquiries->have_insurance_status!=null){{$get_enquiries->have_insurance_status}} @else No Data Available @endif</p>

						</div>

					</div>

					<div class="row">

						<div class="col-md-3">

							<label for="customer_country"><strong>DEPARTURE COUNTRY :</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="customer_country">

								@if($get_enquiries->departure_country!="" && $get_enquiries->departure_country!="0"  && $get_enquiries->departure_country!=null)

								@foreach($countries as $country)

								@if($country->country_id==$get_enquiries->departure_country)

								{{$country->country_name}}

								@endif

								@endforeach

								@else

								No Data Available 

							@endif</p>

						</div>

					</div>

					<div class="row">

						<div class="col-md-3">

							<label for="departure_city"><strong>DEPARTURE CITY :</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="departure_city">@if($get_enquiries->departure_city!="" && $get_enquiries->departure_city!="0"  && $get_enquiries->departure_city!=null){{$get_enquiries->departure_city}} @else No Data Available @endif</p>

						</div>

					</div>

					<div class="row">

						<div class="col-md-3">

							<label for="assigned_to"><strong>ASSIGNED USER :</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="assigned_to">

								@if($get_enquiries->assigned_to!=""  && $get_enquiries->assigned_to!=null)	

									@foreach($users as $user)

										@if($get_enquiries->assigned_to==$user->users_id)

										{{$user->users_fname}} {{$user->users_lname}} ({{$user->users_email}})

										@endif

									@endforeach

                               @else

                                    No Data Available

                                @endif</p>

						</div>

					</div>

					<div class="row">

						<div class="col-md-3">

							<label for="customer_dob"><strong>CUSTOMER DOB :</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="customer_dob">@if($get_enquiries->customer_dob!="" && $get_enquiries->customer_dob!="0"  && $get_enquiries->customer_dob!=null)

								@php

								echo date('d-m-Y',strtotime($get_enquiries->customer_dob));

								@endphp

								



							@else No Data Available @endif</p>

						</div>

					</div>

					<div class="row">

						<div class="col-md-3">

							<label for="wedding_date"><strong>WEDDING ANNIVERSARY DATE :</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="wedding_date">@if($get_enquiries->wedding_date!="" && $get_enquiries->wedding_date!="0"  && $get_enquiries->wedding_date!=null)

								@php

								echo date('d-m-Y',strtotime($get_enquiries->wedding_date));

								@endphp

								



							@else No Data Available @endif</p>

						</div>

					</div>

					<div class="row">

						<div class="col-md-3">

							<label for="enquiry_status"><strong>STATUS :</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="enquiry_status">@if($get_enquiries->enquiry_status!="" && $get_enquiries->enquiry_status!="0"  && $get_enquiries->enquiry_status!=null){{$get_enquiries->enquiry_status}} @else No Data Available @endif</p>

						</div>

					</div>

					<div class="row">

						<div class="col-md-3">

							<label for="created_by"><strong>CREATED BY :</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="created_by">@if($get_enquiries->assigned_to!=""  && $get_enquiries->assigned_to!=null)	

									@foreach($users as $user)

										@if($get_enquiries->emp_id==$user->users_id)

										{{$user->users_fname}} {{$user->users_lname}}

										@endif

									@endforeach

                               @else

                                    No Data Available

                                @endif</p>

						</div>

					</div>

					<div class="row mb-10">

						<div class="col-md-12">

							<h4 class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;" >

								<i class="fa fa-minus-circle" id="enquiry_passenger_details"></i> ENQUIRY PASSENGER DETAILS

							</h4>

						</div>

						

					</div>

					<div id="passenger_details_show">

							<div class="row">

								<div class="col-md-3">

									<label for="passenger_name"><strong>NAME :</strong></label>

								</div>

								<div class="col-md-9">

									<p class="" id="passenger_name">@if($get_enquiries->passenger_name!="" && $get_enquiries->passenger_name!="0"  && $get_enquiries->passenger_name!=null){{$get_enquiries->passenger_name}} @else No Data Available @endif</p>

								</div>



							</div>

							<div class="row">

								<div class="col-md-3">

									<label for="passenger_dob"><strong>PASSENGER BIRTHDATE :</strong></label>

								</div>

								<div class="col-md-9">

									<p class="" id="passenger_dob">@if($get_enquiries->passenger_dob!="" && $get_enquiries->passenger_dob!="0"  && $get_enquiries->passenger_dob!=null)

										@php

										echo date('d-m-Y',strtotime($get_enquiries->passenger_dob));

										@endphp 

									@else No Data Available @endif</p>

								</div>



							</div>

							<div class="row">

								<div class="col-md-3">

									<label for="passenger_pan_number"><strong>PAN NUMBER :</strong></label>

								</div>

								<div class="col-md-9">

									<p class="" id="passenger_pan_number">@if($get_enquiries->passenger_pan_number!="" && $get_enquiries->passenger_pan_number!="0"  && $get_enquiries->passenger_pan_number!=null){{$get_enquiries->passenger_pan_number}} @else No Data Available @endif</p>

								</div>



							</div>

							<div class="row">

								<div class="col-md-3">

									<label for="passenger_passport_no"><strong>PASSPORT NO :</strong></label>

								</div>

								<div class="col-md-9">

									<p class="" id="passenger_passport_no">@if($get_enquiries->passenger_passport_no!="" && $get_enquiries->passenger_passport_no!="0"  && $get_enquiries->passenger_passport_no!=null){{$get_enquiries->passenger_passport_no}} @else No Data Available @endif</p>

								</div>



							</div>

						</div>

						<div class="row mb-10">

							<div class="col-md-12">

								<h4 class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;" >

									<i class="fa fa-minus-circle" id="enquiry_location_details"></i> ENQUIRY LOCATION DETAILS

								</h4>

							</div>



						</div>

						<div id="location_details_show">

							

							@php

							$enquiry_locations=unserialize($get_enquiries->enquiry_locations);

							 for($i=0;$i< count($enquiry_locations);$i++)

							 {

							 	@endphp

							<div class="row">

								<div class="col-md-3">

									<label for="location_country{{$i}}"><strong>Country :</strong></label>

								</div>

								<div class="col-md-9">

									<p class="" id="location_country{{$i}}">

									@foreach($countries as $country)

								@if($country->country_id==$enquiry_locations[$i]['country'])

								{{$country->country_name}}

								@endif

								@endforeach</p>

								</div>



							</div>

							<div class="row">

								<div class="col-md-3">

									<label for="location_city{{$i}}"><strong>City :</strong></label>

								</div>

								<div class="col-md-9">

									<p class="" id="location_city{{$i}}">{{$enquiry_locations[$i]['city']}}</p>

								</div>



							</div>

							<br>



							 	@php

							 }	



							@endphp



							

						

						</div>	

						<div class="row mb-10">

							<div class="col-md-12">

                             	<!-- <img  id="add_more_comments" class="pull-right plus-icon add_more_comments" src="{{ asset('assets/images/add_icon.png') }}"> -->

                             	

								<h4 class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;" >

									<i class="fa fa-minus-circle" id="enquiry_comments_details"></i> ENQUIRY COMMENTS
									@if($rights['add']==1)
									 <button type="button"  class="pull-right add_more_comments btn btn-sm" id="add_more_comments">Add Comments</button>
									 @endif

								</h4>



							</div>





						</div>

						<div id="enquiry_comments_show" >

							<div id="comments_form_div" style="display:none;"> 

							<form method="post" id="comments_form">

								{{csrf_field()}}

								<input type="hidden" name="enquiry_id" value="{{$enquiry_id}}">

							<div class="row mb-10">

								<div class="col-sm-6 col-md-6">

									<div class="form-group">

										<label for="enquiry_comments">Comment</label>

										<textarea  id="enquiry_comments" rows="5" cols="5" class="form-control" placeholder="Comment" name="enquiry_comments"></textarea>

									</div>



								</div>

								<div class="col-sm-6 col-md-6">



								</div>

							</div>

							<div class="row mb-10">

								<div class="col-sm-6 col-md-6">

									<div class="form-group">

										<label for="enquiry_comments_status">STATUS </label>

										<select id="enquiry_comments_status" class="form-control" style="width: 100%;" name="enquiry_comments_status">

											<option  value="0" disabled="disabled">SELECT STATUS</option>

											<option value="Open" selected="selected">Open</option>

											<option value="Win">Win</option>

											<option value="Fail">Fail</option>

										</select>

									</div>

								</div>

							</div>

							<div class="row mb-10" id="next_followup_div">

								<div class="col-sm-6 col-md-6">

									<div class="form-group">

										<label for="nxt_followup_date">NEXT FOLLOWUP </label>

										<div class="input-group date">

											<input id="nxt_followup_date" type="text" class="form-control pull-right datepicker" placeholder="DATE" name="nxt_followup_date">

											<div class="input-group-addon">

												<i class="fa fa-calendar"></i>

											</div>

										</div>

									</div>

								</div>

							</div>

							<div class="row mb-10" id="reason_failure_div" style="display:none">

								<div class="col-sm-6 col-md-6">

									<div class="form-group">

										<label for="reason_failure">REASON OF FAILURE </label>

										<select id="reason_failure" class="form-control" style="width: 100%;" name="reason_failure">

											<option value="0" class="" selected="selected">Select Reason</option>

											<option label="Request not placed" value="Request not placed">Request not placed</option>

											<option label="Wrong Number" value="Wrong Number">Wrong Number</option>

											<option label="Duplicate Query" value="Duplicate Query">Duplicate Query</option>

											<option label="Booked with OTA" value="Booked with OTA">Booked with OTA</option>

											<option label="Plan Postponed" value="Plan Postponed">Plan Postponed</option>

											<option label="Plan Cancelled" value="Plan Cancelled">Plan Cancelled</option>

											<option label="Price way too high" value="Price way too high">Price way too high</option>

											<option label="Low Budget" value="Low Budget">Low Budget</option>

											<option label="Found Us Expensive" value="Found Us Expensive">Found Us Expensive</option>

											<option label="Asked for call back but did not respond" value="Asked for call back but did not respond">Asked for call back but did not respond</option>

											<option label="Lost due Client not interested" value="Lost due Client not interested">Lost due Client not interested</option>

											<option label="Won" value="Won">Won</option>

											<option label="Lost due Unavailability" value="Lost due Unavailability">Lost due Unavailability</option>

											<option label="Language Barrier" value="Language Barrier">Language Barrier</option>

											<option label="Destination not Covered" value="Destination not Covered">Destination not Covered</option>

											<option label="Travel dates not decided" value="Travel dates not decided">Travel dates not decided</option>

											<option label="Said Did not want to travel" value="Said Did not want to travel">Said Did not want to travel</option>

											<option label="Phone Disconnect" value="Phone Disconnect">Phone Disconnect</option>

											<option label="Stopped Responding Post Quotation" value="Stopped Responding Post Quotation">Stopped Responding Post Quotation</option>

											<option label="Customer not picked" value="Customer not picked">Customer not picked</option>

											<option label="Follow Up" value="Follow Up">Follow Up</option>

										</select>

									</div>

								</div>

							</div>

							<div class="row mb-10">



								<div class="col-sm-6 col-md-6">

									<div class="img_group">

										<div class="box1">

											<input class="hide" type="file" id="upload_image"

											accept="image/png,image/jpg,image/jpeg" multiple="" 

											name="enquiry_comments_file" onchange="previewFile()">

											<button type="button" onclick="document.getElementById('upload_image').click()"

											id="upload_0"

											class="btn red btn-outline btn-circle">+

										</button>

									</div>

									<br>

									<img id="image_preview" src="" height="200" alt="Image preview..." style="display:none">

									<!-- ngRepeat: (itemindex,item) in temp_loop.enquiry_comment_attachment track by $index -->

								</div>





							</div>

							<div class="col-sm-6 col-md-6">



							</div>



						</div>

						 <div class="row mb-10">

                        <div class="col-md-12">

                       

                                <button type="button" id="add_comments" class="btn btn-rounded btn-primary mr-10">Add</button>

                                <button type="button" id="cancel_comments" class="btn btn-rounded btn-primary">Cancel</button>

                        </div>

                    </div>

                    </form>

                    <br>

                    </div>

						@foreach($get_enquiries_comments as $enquiry_comments)

						<div class="row">

							<div class="col-md-3">

								<label for="enquiry_comments_person{{$loop->iteration}}"><strong>*{{$enquiry_comments->given_by}} :</strong></label> <br>

								@if($enquiry_comments->enq_comments_file!="")

								<a href="{{ asset('assets/uploads/enq_comments/') }}/{{$enquiry_comments->enq_comments_file}}"><img src="{{ asset('assets/uploads/enq_comments/') }}/{{$enquiry_comments->enq_comments_file}}" width=100 height=100 class="img img-thumbnail"></a>

								@endif

							</div>

							<div class="col-md-6">

								<p class="" id="enquiry_comments_text{{$loop->iteration}}">{{$enquiry_comments->enq_comments}}</p>

							</div>

							<div class="col-md-3">

								<label for="enq_nxtfollowup_date{{$loop->iteration}}"><strong>

									@php

									$get_nxtfollow_update=explode(' - ',$enquiry_comments->enq_nxtfollowup_date);

									$next_followup_date=date('d/m/Y H:i:s',strtotime($get_nxtfollow_update[0]." ".$get_nxtfollow_update[1]));

									@endphp

								{{$next_followup_date}}</strong> &nbsp;-  <strong>{{$enquiry_comments->enq_status}} </strong></label>

							</div>

						</div>

						@endforeach

						

					</div>

					<div class="row mb-10">

							<div class="col-md-12">

                             	<!-- <img  id="add_more_comments" class="pull-right plus-icon add_more_comments" src="{{ asset('assets/images/add_icon.png') }}"> -->

                             	

								<h4 class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;" >

									<i class="fa fa-minus-circle" id="payment_details"></i> PAYMENT

									<!--  <button type="button"  class="pull-right add_more_comments btn btn-sm" id="add_more_comments">Add Comments</button> -->

								</h4>



							</div>





						</div>

						<div id="payment_details_show" >

						</div>

						<div class="row mb-10">

							<div class="col-md-12">

                             	<!-- <img  id="add_more_comments" class="pull-right plus-icon add_more_comments" src="{{ asset('assets/images/add_icon.png') }}"> -->

                             	

								<h4 class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;" >

									<i class="fa fa-minus-circle" id="service_costing_details"></i> SERVICE COSTING

									<!--  <button type="button"  class="pull-right add_more_comments btn btn-sm" id="add_more_comments">Add Comments</button> -->

								</h4>



							</div>





						</div>

						<div id="service_costing_details_show" >

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

	$(document).on("click","#enquiry_passenger_details",function()

	{

		if($(this).hasClass('fa-minus-circle'))

		{

			$(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');

			

		}

		else

		{

			$(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');

		}

		$("#passenger_details_show").toggle();



	});



	$(document).on("click","#enquiry_location_details",function()

	{

		if($(this).hasClass('fa-minus-circle'))

		{

			$(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');

			

		}

		else

		{

			$(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');

		}

		$("#location_details_show").toggle();



	});



	$(document).on("click","#enquiry_comments_details",function()

	{

		if($(this).hasClass('fa-minus-circle'))

		{

			$(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');

			

		}

		else

		{

			$(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');

		}

		$("#enquiry_comments_show").toggle();



	});



	$(document).on("change","#enquiry_comments_status",function()

	{

		if($(this).val()=="Fail")

		{

			$("#next_followup_div").hide();

			$("#reason_failure_div").show();

				$("#reason_failure").val("0");

		}

		else

		{

			$("#next_followup_div").show();

			$("#reason_failure_div").hide();

			$("#next_followup_date").val("");

		}

	});



	$(document).on("click","#add_more_comments",function()

	{

		$("#comments_form_div").show();

	});



	$(document).on("click","#cancel_comments",function()

	{

		$("#enquiry_comments").val("");

		$("#nxt_followup_date").val("");

		$("#enquiry_comments_status").val("Open");

		$("#comments_form_div").hide();

	});



	$(document).on("click","#payment_details",function()

	{

		if($(this).hasClass('fa-minus-circle'))

		{

			$(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');

			

		}

		else

		{

			$(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');

		}

		$("#payment_details_show").toggle();



	});



	$(document).on("click","#service_costing_details",function()

	{

		if($(this).hasClass('fa-minus-circle'))

		{

			$(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');

			

		}

		else

		{

			$(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');

		}

		$("#service_costing_details_show").toggle();



	});







</script>

<script>

    function previewFile() {

      var preview = document.getElementById('image_preview');

      var file    = document.querySelector('input[type=file]').files[0];

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

  //  //Followup Datetime picker

        $("#nxt_followup_date").datetimepicker({

             autoclose: true,

        format: "yyyy-mm-dd - hh:ii:ss",

        startDate: new Date(),

        });

</script>



<script>



	$(document).on("click","#add_comments",function()

	{	

		var enquiry_comments=$("#enquiry_comments").val();

		var enquiry_comments_status=$("#enquiry_comments_status").val();

		var nxt_followup_date=$("#nxt_followup_date").val();

		var reason_failure=$("#reason_failure").val();

		

		if(enquiry_comments.trim()=="")

		{

			$("#enquiry_comments").css("border","1px solid #cf3c63");

		}

		else

		{

			$("#enquiry_comments").css("border","1px solid #9e9e9e"); 

		}

		if(enquiry_comments_status.trim()=="0")

		{

			$("#enquiry_comments_status").css("border","1px solid #cf3c63");

		}

		else

		{

			$("#enquiry_comments_status").css("border","1px solid #9e9e9e"); 

		}

		if((enquiry_comments_status=="Open" || enquiry_comments_status=="Win") && nxt_followup_date.trim()=="")

		{

			$("#nxt_followup_date").css("border","1px solid #cf3c63");

		}

		else

		{

			$("#nxt_followup_date").css("border","1px solid #9e9e9e"); 

		}

		if((enquiry_comments_status=="Fail") && reason_failure=="0")

		{

			$("#reason_failure").css("border","1px solid #cf3c63");

		}

		else

		{

			$("#reason_failure").css("border","1px solid #9e9e9e"); 

		}



		if(enquiry_comments.trim()=="")

		{

			$("#enquiry_comments").focus();

		}

		else if(enquiry_comments_status.trim()=="0")

		{

			$("#enquiry_comments_status").focus();

		}

		else if((enquiry_comments_status=="Open" || enquiry_comments_status=="Win") && nxt_followup_date.trim()=="")

		{

			$("#nxt_followup_date").focus();

		}

		else if((enquiry_comments_status=="Fail") && reason_failure=="0")

		{

			$("#reason_failure").focus();

		}

		else

		{

			var formdata=new FormData($("#comments_form")[0]);

			$.ajax({

				url:"{{route('insert-comments')}}",

				enctype: 'multipart/form-data',

				data: formdata,

				type:"POST",

				processData: false,

				contentType: false,

				success:function(response)

				{



					if(response.indexOf("success")!=-1)

					{

						swal({title:"Success",text:"Enquiry Comments Added Successfully !",type: "success"},

							function(){ 

								location.reload();

							});

					}

					else if(response.indexOf("fail")!=-1)

					{

						  swal("ERROR", "Enquiry comments cannot be inserted right now! ");

					}

				}

			});  

		}



	});

</script>

</body>





</html>

