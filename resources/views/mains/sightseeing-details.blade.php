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

				<h3 class="page-title">Sightseeing Details View</h3>

				<div class="d-inline-block align-items-center">

					<nav>

						<ol class="breadcrumb">

							<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>

							<li class="breadcrumb-item" aria-current="page">Home</li>

							<li class="breadcrumb-item" aria-current="page">Service Management</li>

							<li class="breadcrumb-item active" aria-current="page">Sightseeing Details View

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

							<label for="sightseeing_tour_name"><strong>TOUR NAME :</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="sightseeing_tour_name"> @if($get_sightseeing->sightseeing_tour_name!="" && $get_sightseeing->sightseeing_tour_name!="0" && $get_sightseeing->sightseeing_tour_name!=null){{$get_sightseeing->sightseeing_tour_name}} @else No Data Available @endif </p>

						</div>

					</div>

					<div class="row">

						<div class="col-md-3">

							<label for="sightseeing_tour_desc"><strong>TOUR DESCRIPTION  :</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="sightseeing_tour_desc"> @if($get_sightseeing->sightseeing_tour_desc!="" && $get_sightseeing->sightseeing_tour_desc!="0" && $get_sightseeing->sightseeing_tour_desc!=null)
								<?php echo $get_sightseeing->sightseeing_tour_desc ?> @else No Data Available @endif </p>

						</div>

					</div>

					<div class="row">

						<div class="col-md-3">

							<label for="sightseeing_city_covered"><strong>CITIES COVERED:</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="sightseeing_city_covered"> @if($get_sightseeing->sightseeing_city_covered!="" && $get_sightseeing->sightseeing_city_covered!="0" && $get_sightseeing->sightseeing_city_covered!=null){{$get_sightseeing->sightseeing_city_covered}} @else No Data Available @endif </p>

						</div>

					</div>

					<div class="row">

						<div class="col-md-3">

							<label for="users_lname"><strong>COUNTRY :</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="users_lname"> @if($get_sightseeing->sightseeing_country!="" && $get_sightseeing->sightseeing_country!="0" && $get_sightseeing->sightseeing_country!=null)
							@foreach($countries as $country)
                                            @if($country->country_id==$get_sightseeing->sightseeing_country)
                                          {{$country->country_name}}
                                            @endif
                                            @endforeach
                                             @else No Data Available @endif </p>

						</div>

					</div>
					<div class="row">

						<div class="col-md-3">

							<label for="sightseeing_city_from"><strong>FROM CITY:</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="sightseeing_city_from"> @if($get_sightseeing->sightseeing_city_from!="" && $get_sightseeing->sightseeing_city_from!="0" && $get_sightseeing->sightseeing_city_from!=null)
														<?php
														$fetch_city=ServiceManagement::searchCities($get_sightseeing->sightseeing_city_from,$get_sightseeing->sightseeing_country);

														echo $fetch_city['name'];
														?>
														 @else No Data Available @endif </p>

						</div>

					</div>
					<div class="row">

						<div class="col-md-3">

							<label for="sightseeing_city_between"><strong>IN BETWEEN CITIES:</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="sightseeing_city_between"> @if($get_sightseeing->sightseeing_city_between!="" && $get_sightseeing->sightseeing_city_between!="0" && $get_sightseeing->sightseeing_city_between!=null)
														
														<?php
														$all_between_cities=explode(",",$get_sightseeing->sightseeing_city_between);
														for($cities=0;$cities< count($all_between_cities);$cities++)
														{
																$fetch_city=ServiceManagement::searchCities($all_between_cities[$cities],$get_sightseeing->sightseeing_country);
														echo $fetch_city['name'];

														if($cities<count($all_between_cities)-1)
														{
															echo " ,";
														}
														}
													
														?>

														 @else No Data Available @endif </p>

						</div>

					</div>
					<div class="row">

						<div class="col-md-3">

							<label for="sightseeing_city_to"><strong>TO CITY:</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="sightseeing_city_to"> @if($get_sightseeing->sightseeing_city_to!="" && $get_sightseeing->sightseeing_city_to!="0" && $get_sightseeing->sightseeing_city_to!=null)
														<?php
														$fetch_city=ServiceManagement::searchCities($get_sightseeing->sightseeing_city_to,$get_sightseeing->sightseeing_country);

														echo $fetch_city['name'];
														?>
														 @else No Data Available @endif </p>

						</div>

					</div>
						<div class="row">

						<div class="col-md-3">

							<label for="sightseeing_distance_covered"><strong>DISTANCE COVERED  :</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="sightseeing_distance_covered"> @if($get_sightseeing->sightseeing_distance_covered!="" && $get_sightseeing->sightseeing_distance_covered!="0" && $get_sightseeing->sightseeing_distance_covered!=null){{$get_sightseeing->sightseeing_distance_covered}} KMS @else No Data Available @endif </p>

						</div>

					</div>

					<div class="row">

						<div class="col-md-3">

							<label for="sightseeing_fuel_type"><strong>FUEL TYPE  :</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="sightseeing_fuel_type"> @if($get_sightseeing->sightseeing_fuel_type!="" && $get_sightseeing->sightseeing_fuel_type!="0" && $get_sightseeing->sightseeing_fuel_type!=null)
								 @foreach($fuel_type as $fueltype)
                                            @if($fueltype->fuel_type_id==$get_sightseeing->sightseeing_fuel_type)
                                            {{$fueltype->fuel_type}}
                                            @endif
                                            @endforeach
								 @else No Data Available @endif </p>

						</div>

					</div>
					<div class="row">

						<div class="col-md-3">

							<label for="sightseeing_food_cost"><strong>FOOD COST :</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="sightseeing_food_cost"> @if($get_sightseeing->sightseeing_food_cost!="" && $get_sightseeing->sightseeing_food_cost!="0" && $get_sightseeing->sightseeing_food_cost!=null){{$get_sightseeing->sightseeing_food_cost}} @else No Data Available @endif </p>

						</div>

					</div>

					<div class="row">

						<div class="col-md-3">

							<label for="sightseeing_hotel_cost"><strong>HOTEL COST :</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="sightseeing_hotel_cost"> @if($get_sightseeing->sightseeing_hotel_cost!="" && $get_sightseeing->sightseeing_hotel_cost!="0" && $get_sightseeing->sightseeing_hotel_cost!=null){{$get_sightseeing->sightseeing_hotel_cost}} @else No Data Available @endif </p>

						</div>

					</div>
						<div class="row">

						<div class="col-md-3">

							<label for="sightseeing_total_expense_cost"><strong>TOUR EXPENSE WITHOUT ENTRANCE :</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="sightseeing_total_expense_cost"> @if($get_sightseeing->sightseeing_total_expense_cost!="" && $get_sightseeing->sightseeing_total_expense_cost!="0" && $get_sightseeing->sightseeing_total_expense_cost!=null){{$get_sightseeing->sightseeing_total_expense_cost}} @else No Data Available @endif </p>

						</div>

					</div>

					<div class="row">

						<div class="col-md-3">

							<label for="sightseeing_adult_cost"><strong>ENTRANCE FEES FOR 1 ADULT :</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="sightseeing_adult_cost"> @if($get_sightseeing->sightseeing_adult_cost!="" && $get_sightseeing->sightseeing_adult_cost!="0" && $get_sightseeing->sightseeing_adult_cost!=null){{$get_sightseeing->sightseeing_adult_cost}} @else No Data Available @endif </p>

						</div>

					</div>

					<div class="row">

						<div class="col-md-3">

							<label for="sightseeing_child_cost"><strong>ENTRANCE FEES FOR 1 CHILD :</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="sightseeing_child_cost"> @if($get_sightseeing->sightseeing_child_cost!="" && $get_sightseeing->sightseeing_child_cost!="0" && $get_sightseeing->sightseeing_child_cost!=null){{$get_sightseeing->sightseeing_child_cost}} @else No Data Available @endif </p>

						</div>

					</div>


						<div class="row">

						<div class="col-md-3">

							<label for="users_status"><strong>STATUS :</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="users_status"> 

								@if($get_sightseeing->sightseeing_status!="" && $get_sightseeing->sightseeing_status!=null)

								@if($get_sightseeing->sightseeing_status=="1")

								Active

								@else

								InActive

								@endif

								 @else 

								No Data Available 

								@endif </p>

						</div>

					</div>

					<div class="row">

						<div class="col-md-3">

							<label for="users_contact"><strong>Created DateTime :</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="users_contact"> @if($get_sightseeing->created_at!=""  && $get_sightseeing->created_at!=null){{$get_sightseeing->created_at}} @else No Data Available @endif </p>

						</div>

					</div>

					<div class="row">

						<div class="col-md-3">

							<label for="users_contact"><strong>Updated DateTime :</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="users_contact"> @if($get_sightseeing->updated_at!=""  && $get_sightseeing->updated_at!=null){{$get_sightseeing->updated_at}} @else No Data Available @endif </p>

						</div>

					</div>
						<div class="row mb-10">

											<div class="col-md-12">

												<h4 class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;" >

													<i class="fa fa-minus-circle" id="sightseeing_attractions"></i> TOUR ATTRACTIONS

												</h4>

											</div>



										</div>
										<div class="row" id="sightseeing_attractions_details">

											<div class="col-md-12">
												<textarea id="sightseeing_attractions_data">
										 @if($get_sightseeing->sightseeing_attractions!="" && $get_sightseeing->sightseeing_attractions!=null) {{$get_sightseeing->sightseeing_attractions}} @else No Data Available @endif
										</textarea>

											</div>

										</div>
										<br>
										<div class="row mb-10">

											<div class="col-md-12">

												<h4 class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;" >

													<i class="fa fa-minus-circle" id="sightseeing_images"></i> SIGHTSEEING IMAGES

												</h4>

											</div>



										</div>
										<div class="row" id="sightseeing_images_details">


											@php
											$get_sightseeing_images=unserialize($get_sightseeing->sightseeing_images);
											if(!empty($get_sightseeing_images))
											{

										
											for($images=0;$images< count($get_sightseeing_images);$images++)
											{
												@endphp
												<div class='col-md-3'>
													<img class='upload_ativity_images_preview' src='{{ asset("assets/uploads/sightseeing_images") }}/{{$get_sightseeing_images[$images]}}' width=150 height=150 class="img img-thumbnail" />

												</div>
												@php
											}
										}
										else
										{
											echo "No Data Available";
										}

											@endphp

										</div>
										<br>

					  <div class="row mb-10">

                        <div class="col-md-12">

                            <div class="box-header with-border"

                                style="padding: 10px;border-bottom:none;border-radius:0;border-top:1px solid #c3c3c3">

                                <button type="button"  id="back_btn" onclick="window.history.back()" class="btn btn-rounded btn-primary mr-10">Back</button>

                                <a href="{{route('edit-sightseeing',['sightseeing_id'=>$get_sightseeing->sightseeing_id])}}"><button type="button" id="discard_sightseeing" class="btn btn-rounded btn-primary">Edit</button></a>

                            </div>

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
				CKEDITOR.replace('sightseeing_attractions_data', {readOnly:true});
			

			});
		$(document).on("click","#sightseeing_attractions",function()

			{

				if($(this).hasClass('fa-minus-circle'))

				{

					$(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');



				}

				else

				{

					$(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');

				}

				$("#sightseeing_attractions_details").toggle();



			});

		$(document).on("click","#sightseeing_images",function()

			{

				if($(this).hasClass('fa-minus-circle'))

				{

					$(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');



				}

				else

				{

					$(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');

				}

				$("#sightseeing_images_details").toggle();



			});

</script>



</body>





</html>

