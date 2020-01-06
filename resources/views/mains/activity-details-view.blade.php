

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

											<li class="breadcrumb-item active" aria-current="page">View Activity Details

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

												<label for="activity_name"><strong>ACTIVITY NAME :</strong></label>

											</div>

											<div class="col-md-9">

												<p class="" id="activity_name"> @if($get_activity->activity_name!="" && $get_activity->activity_name!="0" && $get_activity->activity_name!=null){{$get_activity->activity_name}} @else No Data Available @endif </p>

											</div>

										</div>

										<div class="row">

											<div class="col-md-3">

												<label for="supplier_id"><strong>SUPPLIER NAME :</strong></label>

											</div>

											<div class="col-md-9">

												<p class="" id="supplier_id"> @if($get_activity->supplier_id!="" && $get_activity->supplier_id!=null)
													@foreach($suppliers as $supplier)
													@if($get_activity->supplier_id==$supplier->supplier_id)
													{{$supplier->supplier_name}}
													@endif 
													@endforeach 
												@else No Data Available @endif </p>

											</div>

										</div>
											<div class="row">

											<div class="col-md-3">

												<label for="activity_location"><strong>ACTIVITY LOCATION :</strong></label>

											</div>

											<div class="col-md-9">

												<p class="" id="activity_location"> @if($get_activity->activity_location!="" && $get_activity->activity_location!="0" && $get_activity->activity_location!=null){{$get_activity->activity_location}} @else No Data Available @endif </p>

											</div>

										</div>
										<div class="row">

											<div class="col-md-3">

												<label for="activity_country"><strong>COUNTRY :</strong></label>

											</div>

											<div class="col-md-9">

												<p class="" id="activity_country"> @if($get_activity->activity_country!="" && $get_activity->activity_country!=null)
													@foreach($countries as $country)
													@if(in_array($country->country_id,$countries_data))
													@if($country->country_id==$get_activity->activity_country)
													{{$country->country_name}}
													@endif
													@endif
													@endforeach
												@else No Data Available @endif </p>

											</div>

										</div>

										<div class="row">

											<div class="col-md-3">

												<label for="activity_city"><strong>CITY :</strong></label>

											</div>

											<div class="col-md-9">

												<p class="" id="activity_city"> @if($get_activity->activity_city!="" && $get_activity->activity_city!=null)
													@foreach($cities as $city)
													@if($city->id==$get_activity->activity_city)
													{{$city->name}}
													@endif  
													@endforeach
												@else No Data Available @endif </p>

											</div>

										</div>

										<div class="row">

											<div class="col-md-3">

												<label for="operation_period_fromdate"><strong>PERIOD OF OPERATION :</strong></label>

											</div>

											<div class="col-md-9">

												<p class="" id="operation_period_fromdate"> @if($get_activity->operation_period_fromdate!="" && $get_activity->operation_period_fromdate!="0" && $get_activity->operation_period_fromdate!=null) @php echo date('d-m-Y',strtotime($get_activity->operation_period_fromdate)) @endphp @else No Data Available @endif To  @if($get_activity->operation_period_todate!="" && $get_activity->operation_period_todate!="0" && $get_activity->operation_period_todate!=null) @php echo date('d-m-Y',strtotime($get_activity->operation_period_todate)) @endphp @else No Data Available @endif </p>

											</div>

										</div>
										<div class="row">

											<div class="col-md-3">

												<label for="validity_fromdate"><strong>VALIDITY DATE :</strong></label>

											</div>

											<div class="col-md-9">

												<p class="" id="validity_fromdate"> @if($get_activity->validity_fromdate!="" && $get_activity->validity_fromdate!="0" && $get_activity->validity_fromdate!=null) @php echo date('d-m-Y',strtotime($get_activity->validity_fromdate)) @endphp @else No Data Available @endif To  @if($get_activity->validity_todate!="" && $get_activity->validity_todate!="0" && $get_activity->validity_todate!=null) @php echo date('d-m-Y',strtotime($get_activity->validity_todate)) @endphp @else No Data Available @endif </p>

											</div>

										</div>
										<div class="row">

											<div class="col-md-3">

												<label for="validity_fromtime"><strong>TIME :</strong></label>

											</div>

											<div class="col-md-9">

												<p class="" id="validity_fromtime"> @if($get_activity->validity_fromtime!="" && $get_activity->validity_fromtime!="0" && $get_activity->validity_fromtime!=null) {{$get_activity->validity_fromtime}} @else No Data Available @endif To  @if($get_activity->validity_totime!="" && $get_activity->validity_totime!="0" && $get_activity->validity_totime!=null) {{$get_activity->validity_totime}} @else No Data Available @endif </p>

											</div>

										</div>
										<div class="row">

											<div class="col-md-3">

												<label for="operating_weekdays"><strong>WORKING DAYS :</strong></label>

											</div>

											<div class="col-md-9">

												<p class="" id="operating_weekdays"> @if($get_activity->operating_weekdays!="" && $get_activity->operating_weekdays!=null)
													@php
													$weekdays=unserialize($get_activity->operating_weekdays);
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

									
										<div class="row">

											<div class="col-md-3">

												<label for="operating_weekdays"><strong>CURRENCY :</strong></label>

											</div>

											<div class="col-md-9">

												<p class="" id="operating_weekdays"> @if($get_activity->activity_currency!="" && $get_activity->activity_currency!=null)
													@foreach($currency as $curr)

											 		@if($curr->code==$get_activity->activity_currency)
											 		{{$curr->code}} ({{$curr->name}})
													
											 		@endif
											 		@endforeach
													 @else No Data Available @endif 
													 </p>

											</div>

										</div>
											<div class="row">

											<div class="col-md-3">

												<label for="adult_price"><strong>ADULT PRICE :</strong></label>

											</div>

											<div class="col-md-9">

												<p class="" id="adult_price"> @if($get_activity->adult_price!="" && $get_activity->adult_price!=null) {{$get_activity->adult_price}} @else No Data Available @endif</p>

											</div>

										</div>

										<div class="row">

											<div class="col-md-3">

												<label for="child_price"><strong>CHILD PRICE :</strong></label>

											</div>

											<div class="col-md-9">

												<p class="" id="child_price"> @if($get_activity->child_price!="" && $get_activity->child_price!=null) {{$get_activity->child_price}} @else No Data Available @endif</p>

											</div>

										</div>

										<div class="row">

											<div class="col-md-3">

												<label for="for_all_ages"><strong>ALLOW POLICY:</strong></label>

											</div>

											<div class="col-md-9">

												<p class="" id="for_all_ages"> @if($get_activity->for_all_ages!="" && $get_activity->for_all_ages!=null) 
													@if($get_activity->for_all_ages=="Yes")

													For all ages

													@else

													@php
													$child_adult_details=unserialize($get_activity->child_adult_age_details);
													@endphp

													<b>FOR CHILD</b> :  @if($get_activity->for_all_ages=="No" && $child_adult_details[0][1]=="No") Not allowed @elseif($get_activity->for_all_ages=="No" && $child_adult_details[0][1]=="Yes") {{$child_adult_details[0][2]}} @endif

													<br>

													<b>FOR ADULT</b> :  @if($get_activity->for_all_ages=="No" && $child_adult_details[0][1]=="No") Not allowed @elseif($get_activity->for_all_ages=="No" && $child_adult_details[1][1]=="Yes") {{$child_adult_details[1][2]}} @endif



													@endif


													
												@else No Data Available @endif</p>

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
											@if($get_activity->activity_blackout_dates!="" && $get_activity->activity_blackout_dates!=null)
											<div class="row">
											@php
											$blackout_dates=explode(',',$get_activity->activity_blackout_dates);	
											
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

											<div class="row mb-10" style="display:none">

											<div class="col-md-12">

												<h4 class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;" >

													<i class="fa fa-minus-circle" id="nationality_markup_details"></i> NATIONALITY & ACTIVITY MARKUP DETAILS

												</h4>

											</div>



										</div>
										<div id="nationality_markup_showdetails" class="row" style="display:none">
											@if($get_activity->nationality_markup_details!="" && $get_activity->nationality_markup_details!=null)
											@php
											$nationality_markup_details=unserialize($get_activity->nationality_markup_details);

											for($nation_count=0;$nation_count< count($nationality_markup_details);$nation_count++)
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

											 		@if($country->country_id==$nationality_markup_details[$nation_count]['activity_nationality'])
											 		{{$country->country_name}}
											 		@endif
											 		@endforeach
												</p>
											</div>
												<div class="col-md-6">
													<label for="activity_markup{{$nation_count}}"><strong>MARKUP TYPE:</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="activity_markup{{$nation_count}}">{{$nationality_markup_details[$nation_count]['activity_markup']}}
												</p>
											</div>
											<div class="col-md-6">
													<label for="activity_amount{{$nation_count}}"><strong>MARKUP PERCENTAGE/AMOUNT:</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="activity_amount{{$nation_count}}">{{$nationality_markup_details[$nation_count]['activity_amount']}}
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

													<i class="fa fa-minus-circle" id="activity_transport_pricing"></i> ACTIVITY TRANSPORT PRICING DETAILS

												</h4>

											</div>



										</div>
										<div id="activity_transport_pricing_details" class="row" style="display:none">
											@if($get_activity->activity_transport_pricing!="" && $get_activity->activity_transport_pricing!=null)
											@php
											$activity_transport_pricing=unserialize($get_activity->activity_transport_pricing);

											for($transport_count=0;$transport_count< count($activity_transport_pricing);$transport_count++)
											{
											@endphp
											<div class="col-md-6">
												<div class="row">
												<div class="col-md-6">
													<label for="transport_currency{{$transport_count}}"><strong>CURRENCY:</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="transport_currency{{$transport_count}}">
													@foreach($currency as $curr)

											 		@if($curr->code==$activity_transport_pricing[$transport_count]['transport_currency'])
											 		{{$curr->code}} ({{$curr->name}})
											 		@endif
											 		@endforeach
												</p>
											</div>
												<div class="col-md-6">
													<label for="transport_desc{{$transport_count}}"><strong>DESCRIPTION:</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="transport_desc{{$transport_count}}">{{$activity_transport_pricing[$transport_count]['transport_desc']}}
												</p>
											</div>
											<div class="col-md-6">
													<label for="transport_cost{{$transport_count}}"><strong>COST:</strong></label>
												</div>
												<div class="col-md-6">
												<p class="" id="transport_cost{{$transport_count}}">{{$activity_transport_pricing[$transport_count]['transport_cost']}}
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

													<i class="fa fa-minus-circle" id="activity_inclusions"></i> INCLUSIONS

												</h4>

											</div>



										</div>
										<div class="row" id="activity_inclusions_details">

											<div class="col-md-12">
												<textarea id="activity_inclusions_data">
										 @if($get_activity->activity_inclusions!="" && $get_activity->activity_inclusions!=null) {{$get_activity->activity_inclusions}} @else No Data Available @endif
										 </textarea>

											</div>

										</div>

											
										<div class="row mb-10">

											<div class="col-md-12">

												<h4 class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;" >

													<i class="fa fa-minus-circle" id="activity_exclusions"></i> EXCLUSIONS

												</h4>

											</div>



										</div>
										<div class="row" id="activity_exclusions_details">

											
											<div class="col-md-12">
												<textarea id="activity_exclusions_data">
										 @if($get_activity->activity_exclusions!="" && $get_activity->activity_exclusions!=null) {{$get_activity->activity_exclusions}} @else No Data Available @endif
										</textarea>

											</div>

										</div>
										<div class="row mb-10">

											<div class="col-md-12">

												<h4 class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;" >

													<i class="fa fa-minus-circle" id="activity_cancel_policy"></i> CANCELLATION POLICY

												</h4>

											</div>



										</div>
										<div class="row" id="activity_cancel_policy_details">

											<div class="col-md-12">
												<textarea id="activity_cancel_policy_data">
										 @if($get_activity->activity_cancel_policy!="" && $get_activity->activity_cancel_policy!=null) {{$get_activity->activity_cancel_policy}} @else No Data Available @endif
										</textarea>

											</div>

										</div>
										<div class="row mb-10">

											<div class="col-md-12">

												<h4 class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;" >

													<i class="fa fa-minus-circle" id="activity_terms_conditions"></i> TERMS AND CONDITIONS

												</h4>

											</div>



										</div>
										<div class="row" id="activity_terms_conditions_details">

											<div class="col-md-12">
												<textarea id="activity_terms_conditions_data">
										 @if($get_activity->activity_terms_conditions!="" && $get_activity->activity_terms_conditions!=null) {{$get_activity->activity_terms_conditions}} @else No Data Available @endif
										</textarea>

											</div>

										</div>
										<br>
										<div class="row mb-10">

											<div class="col-md-12">

												<h4 class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;" >

													<i class="fa fa-minus-circle" id="activity_images"></i> ACTIVITY IMAGES

												</h4>

											</div>



										</div>
										<div class="row" id="activity_images_details">

											@php
											$get_activity_images=unserialize($get_activity->activity_images);
											for($images=0;$images< count($get_activity_images);$images++)
											{
												@endphp
												<div class='col-md-3'>
													<img class='upload_ativity_images_preview' src='{{ asset("assets/uploads/activities_images") }}/{{$get_activity_images[$images]}}' width=150 height=150 class="img img-thumbnail" />

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
												<button type="button" id="discard_activity" class="btn btn-rounded btn-primary">BACK</button>
												<a href="{{route('edit-activity',['activity_id'=>$get_activity->activity_id])}}" id="update_activity" class="btn btn-rounded btn-primary mr-10">EDIT</a>
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
				CKEDITOR.replace('activity_exclusions_data', {readOnly:true});
				CKEDITOR.replace('activity_inclusions_data',{readOnly:true});
				CKEDITOR.replace('activity_cancel_policy_data',{readOnly:true});
				CKEDITOR.replace('activity_terms_conditions_data',{readOnly:true});

			});
			$(document).on("click","#discard_activity",function()
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



			$(document).on("click","#activity_transport_pricing",function()

			{

				if($(this).hasClass('fa-minus-circle'))

				{

					$(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');



				}

				else

				{

					$(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');

				}

				$("#activity_transport_pricing_details").toggle();



			});
			$(document).on("click","#activity_inclusions",function()

			{

				if($(this).hasClass('fa-minus-circle'))

				{

					$(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');



				}

				else

				{

					$(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');

				}

				$("#activity_inclusions_details").toggle();



			});
			$(document).on("click","#activity_exclusions",function()

			{

				if($(this).hasClass('fa-minus-circle'))

				{

					$(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');



				}

				else

				{

					$(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');

				}

				$("#activity_exclusions_details").toggle();



			});
			$(document).on("click","#activity_cancel_policy",function()

			{

				if($(this).hasClass('fa-minus-circle'))

				{

					$(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');



				}

				else

				{

					$(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');

				}

				$("#activity_cancel_policy_details").toggle();



			});

	$(document).on("click","#activity_terms_conditions",function()

			{

				if($(this).hasClass('fa-minus-circle'))

				{

					$(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');



				}

				else

				{

					$(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');

				}

				$("#activity_terms_conditions_details").toggle();



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



			$(document).on("click","#activity_images",function()

			{

				if($(this).hasClass('fa-minus-circle'))

				{

					$(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');



				}

				else

				{

					$(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');

				}

				$("#activity_images_details").toggle();



			});
		</script>



	</body>





	</html>

