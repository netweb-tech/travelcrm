@include('mains.includes.top-header')

<style>

	header.main-header {

		background: url("{{ asset('assets/images/color-plate/theme-purple.jpg') }}");

	}

.days_div
{
	border: 1px solid rgb(207, 60, 99) !important;
    padding: 25px !important;
    margin-bottom: 20px !important;
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

	.select_hotel,.select_sightseeing,.select_activity
	{
		cursor: pointer !important; 
	}

		.color-tiles-text
	{
		background: #573a9e85;
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

								<h3 class="page-title">Create Own Itinerary	</h3>

								<div class="d-inline-block align-items-center">

									<nav>

										<ol class="breadcrumb">

											<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>

											<li class="breadcrumb-item" aria-current="page">Home</li>

											<li class="breadcrumb-item" aria-current="page">Create Own Itinerary</li>

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

									<h4 class="box-title">Create Itinerary</h4>

								</div>

								<div class="box-body">

									<form id="itinerary_form" encytpe="multipart/form-data">

										{{csrf_field()}}

										<div class="row mb-10">

											<div class="col-sm-6 col-md-6">

												<div class="form-group">

													<label for="tour_name">ITINERARY NAME <span class="asterisk">*</span></label>

													<input type="text" class="form-control" placeholder="ITINERARY NAME" id="tour_name" name="tour_name" maxlength="255">

												</div>

											</div>

											<div class="col-sm-6 col-md-6">



											</div>









										</div>

										<div class="row mb-10">



											<div class="col-sm-12 col-md-12">

												<div class="box">

													<div class="form-group">

														<label for="tour_description">ITINERARY DESCRIPTION<span class="asterisk">*</span> </label>

														<textarea id="tour_description" name="tour_description"></textarea>

													</div>

												</div>

											</div>

										</div>

							

										<div class="row mb-10">

											<div class="col-sm-6 col-md-6">



												<div class="row mb-10">

													<div class="col-sm-12 col-md-12">

														<div class="form-group">

															<label>NO. OF NIGHTS</label>

															<select id="no_of_days" name="no_of_days" class="form-control select2" style="width: 100%;">
																<option value="0">SELECT NO. OF NIGHTS</option>
																@for($i=1;$i<=30;$i++)
																<option value="{{$i}}">{{$i}}</option>
																@endfor
															</select>

														</div>





													</div>


												</div>

											</div>

										</div>

										<div class="row " id="change_date_div" style="display: none;">

											<div class="col-sm-6 col-md-6">



												<div class="row mb-10">

													<div class="col-sm-6 col-md-6">



													</div>

													<div class="col-sm-6 col-md-6">

														<button type="button" class="btn btn-success btn-rounded change_date pull-right">Change Days</button>

													</div>

												</div>

											</div>

											<div class="col-sm-6 col-md-6">







											</div>

										</div>

										<div class="row">

											<div class="col-md-12 days_div" id="days_div" style="display: none;">
												<div class="form-group">
														<label class="days_no">DAY</label>
													</div>
											
												<div class="form-group">
													<input type="hidden" class="days_number">
													<label class="days_title_label" for="tour_title">DAY TITLE</label><span class="asterisk">*</span>
													<input type="text" class="form-control days_title" maxlength="255">
													<br>
													<label class="days_description_label" for="tour_description">DAY DESCRIPTION</label><span class="asterisk">*</span> 
													<textarea class="days_description"></textarea>
													
												</div>
												<div class="form-group">

													<select class="form-control days_country select2" style="width:100%;">

														<option value="0" selected="selected" disabled="" hidden="hidden">SELECT COUNTRY</option>

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
													<div class="row">
														<div class="col-xl-3 col-12 hotels_select" style="cursor: pointer">
															<div class="box box-body bg-dark pull-up" style="background:url('{{ asset('assets/images/agent/sunset-pool_1203-3192.jpg') }}') center;">
																<br>
																<p class="font-size-26 text-center color-tiles-text">Hotels</p>
																<br>
															</div>
															<span class="selected_hotel_label"><strong>Selected Hotel :</strong></span>
															<p class="selected_hotel_name"></p>
															<input type="hidden" class="hotel_id">
															<input type="hidden" class="hotel_name">
															<input type="hidden" class="room_name">
															<input type="hidden" class="hotel_cost cal_cost">
															<input type="hidden" class="hotel_no_of_days">
														</div>
														<div class="col-xl-3 col-12 activity_select" style="cursor: pointer">
															<div class="box box-body bg-dark pull-up" style="background:url('{{ asset('assets/images/agent/skydiving-wallpapers-13.jpg') }}') center; ">
																<br>
																<p class="font-size-26 text-center color-tiles-text">Activity</p>
																<br>
															</div>
															<span class="selected_activity_label"><strong>Selected Activity :</strong></span>
															<p class="selected_activity_name"></p>
															<input type="hidden" class="activity_id">
															<input type="hidden" class="activity_name">
															<input type="hidden" class="activity_cost cal_activity_cost">
														</div>
														<div class="col-xl-3 col-12 sightseeing_select" style="cursor: pointer">
															<div class="box box-body bg-dark pull-up" style="background:url('{{ asset('assets/images/agent/climate-landscape-paradise-hotel-sunset_1203-5734.jpg') }}') center;">	
															
																<br>
																<p class="font-size-26 text-center color-tiles-text">Sightseeing</p>	
																<br>
															
															</div>
															<span class="selected_sightseeing_label"><strong>Selected Sightseeing :</strong></span>
															<p class="selected_sightseeing_name"></p>
															<input type="hidden" class="sightseeing_id">
															<input type="hidden" class="sightseeing_name">
															<input type="hidden" class="sightseeing_cost cal_cost">
														</div>
														
													</div>
												</div>



            		

                						</div>

           							 </div>



							            <div class="row" id="itinerary_main_div">



							            </div>

							            <div class="row mb-10">
							            	<div class="col-sm-6 col-md-6">

												<div class="form-group">

													<label for="total_cost">TOTAL COST <span class="asterisk">*</span></label>

													<input type="text" class="form-control" placeholder="TOTAL COST" id="total_cost" name="total_cost" value="0" readonly="readonly">

												</div>

											</div>

							            </div>

							            <div class="row mb-10">

											<div class="col-sm-12 col-md-12">

												<div class="box">

													<div class="form-group">

														<label for="tour_exclusions" style='font-size:20px'>EXCLUSIONS<span class="asterisk">*</span> </label>

														<textarea id="tour_exclusions" name="tour_exclusions"></textarea>

													</div>

												</div>

											</div>

										</div>
										<div class="row mb-10">

											<div class="col-sm-12 col-md-12">

												<div class="box">

													<div class="form-group">

														<label for="tour_terms_and_conditions" style='font-size:20px'>TERMS AND CONDITIONS<span class="asterisk">*</span> </label>

														<textarea id="tour_terms_and_conditions" name="tour_terms_and_conditions"></textarea>

													</div>

												</div>

											</div>

										</div>

										<div class="row mb-10">

											<div class="col-sm-12 col-md-12">

												<div class="box">

													<div class="form-group">

														<label for="tour_cancellation" style='font-size:20px'>CANCELLATION POLICY<span class="asterisk">*</span> </label>

														<textarea id="tour_cancellation" name="tour_cancellation"></textarea>

													</div>

												</div>

											</div>

										</div>









		            <div class="row mb-10">

		            	<div class="col-md-12">

		            		<div class="box-header with-border"

		            		style="padding: 10px;border-bottom:none;border-radius:0;border-top:1px solid #c3c3c3">

		            		<button type="button" id="save_itinerary" class="btn btn-rounded btn-primary mr-10">Save</button>

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
<div class="modal" id="selectHotelModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Select Hotel</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" style="height: 550px;
        overflow-y: auto;
    overflow-x: hidden;">
    <input type="hidden" id="hotel_day_index">
    <label>No. of Nights</label>
    <select id="hotel_no_of_days" name="hotel_no_of_days" class="form-control">
    </select>
    <br>
       <div id="hotels_div">
       </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<div class="modal" id="selectActivityModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Select Activity</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" style="height: 550px;
        overflow-y: auto;
    overflow-x: hidden;">
     <input type="hidden" id="activities_day_index">
       <div id="activities_div">
       </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<div class="modal" id="selectSightseeingModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Select Sightseeing</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" style="height: 550px;
        overflow-y: auto;
    overflow-x: hidden;">
     <input type="hidden" id="sightseeing_day_index">
       <div id="sightseeing_div">
       </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<div class="modal" id="getHotelDays">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Select Days</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" style="height: 550px;
        overflow-y: auto;
    overflow-x: hidden;">
     <input type="hidden" id="hotel_day_index">
       <div id="sightseeing_div">
       </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<script>

	$(document).ready(function()

	{

		CKEDITOR.replace('tour_description');
			CKEDITOR.replace('tour_exclusions');
		CKEDITOR.replace('tour_terms_and_conditions');
		CKEDITOR.replace('tour_cancellation');




		$('.select2').select2();

		


			$(document).on("change","#no_of_days",function()
			{
				var no_of_days=$(this).val();
				$("#itinerary_main_div").html("");
				$("#change_date_div").show();

	
				for(loop=0;loop<no_of_days;loop++)

				{

					var clone_days=$("#days_div").clone();

					clone_days.find(".days_no").parent().parent().css("display","block");

					clone_days.find(".days_no").parent().parent().attr({"id":"days_div__"+(loop+1)+""});

					clone_days.find(".days_no").text("DAY "+parseInt(loop+1)+" :");
					

					clone_days.find(".days_number").attr({"id":"days_number__"+parseInt(loop+1),"name":"days_number[]"}).val(parseInt(loop+1));

					clone_days.find(".days_country").attr({"id":"days_country__"+parseInt(loop+1),"name":"days_country[]"}).select2();

						clone_days.find(".days_country").siblings(".select2-container").slice(1).remove();

					clone_days.find(".days_city").attr({"id":"days_city__"+parseInt(loop+1),"name":"days_city[]"});

					clone_days.find(".days_description_label").attr({"for":"days_description__"+parseInt(loop+1)}).text("DAY "+parseInt(loop+1)+" DESCRIPTION");

					clone_days.find(".days_title_label").attr({"for":"days_title_label__"+parseInt(loop+1)}).text("DAY "+parseInt(loop+1)+" TITLE");

					clone_days.find(".hotels_select").attr({"id":"hotels_select__"+parseInt(loop+1)});

					clone_days.find(".selected_hotel_label").attr({"for":"selected_hotel_name__"+parseInt(loop+1)});

					clone_days.find(".selected_hotel_name").attr({"id":"selected_hotel_name__"+parseInt(loop+1)});
					clone_days.find(".hotel_id").attr({"id":"hotel_id__"+parseInt(loop+1),"name":"hotel_id[]"});
					clone_days.find(".hotel_name").attr({"id":"hotel_name__"+parseInt(loop+1),"name":"hotel_name[]"});
					clone_days.find(".room_name").attr({"id":"room_name__"+parseInt(loop+1),"name":"room_name[]"});
					clone_days.find(".hotel_cost").attr({"id":"hotel_cost__"+parseInt(loop+1),"name":"hotel_cost[]"});
					clone_days.find(".hotel_no_of_days").attr({"id":"hotel_no_of_days__"+parseInt(loop+1),"name":"hotel_no_of_days[]"});


					clone_days.find(".activity_select").attr({"id":"activity_select__"+parseInt(loop+1)});

					clone_days.find(".selected_activity_label").attr({"for":"selected_activity_name__"+parseInt(loop+1)});

					clone_days.find(".selected_activity_name").attr({"id":"selected_activity_name__"+parseInt(loop+1)});
					clone_days.find(".activity_id").attr({"id":"activity_id__"+parseInt(loop+1),"name":"activity_id[]"});
					clone_days.find(".activity_name").attr({"id":"activity_name__"+parseInt(loop+1),"name":"activity_name[]"});
					clone_days.find(".activity_cost").attr({"id":"activity_cost__"+parseInt(loop+1),"name":"activity_cost[]"});
					


					clone_days.find(".sightseeing_select").attr({"id":"sightseeing_select__"+parseInt(loop+1)});

					clone_days.find(".selected_sightseeing_label").attr({"for":"selected_sightseeing_name__"+parseInt(loop+1)});

					clone_days.find(".selected_sightseeing_name").attr({"id":"selected_sightseeing_name__"+parseInt(loop+1)});
					clone_days.find(".sightseeing_id").attr({"id":"sightseeing_id__"+parseInt(loop+1),"name":"sightseeing_id[]"});
					clone_days.find(".sightseeing_name").attr({"id":"sightseeing_name__"+parseInt(loop+1),"name":"sightseeing_name[]"});
					clone_days.find(".sightseeing_cost").attr({"id":"sightseeing_cost__"+parseInt(loop+1),"name":"sightseeing_cost[]"});
					

					clone_days.find(".days_description").attr({"id":"days_description__"+parseInt(loop+1),"name":"days_description[]"});
					clone_days.find(".days_title").attr({"id":"days_title__"+parseInt(loop+1),"name":"days_title[]"});


					
					$("#itinerary_main_div").append(clone_days);
					CKEDITOR.replace('days_description__'+parseInt(loop+1));

				}
				if(no_of_days>0)
				{
					var clone_days=$("#days_div").clone();

					clone_days.find(".days_no").parent().parent().css("display","block");

					clone_days.find(".days_no").parent().parent().attr({"id":"days_div__"+(loop+1)+""});

					clone_days.find(".days_no").text("DAY "+parseInt(loop+1)+" :");
					

					clone_days.find(".days_number").attr({"id":"days_number__"+parseInt(loop+1),"name":"days_number[]"}).val(parseInt(loop+1));

					
						clone_days.find(".days_country").parent().remove();
							clone_days.find(".days_city").remove();
						clone_days.find(".hotels_select").remove();
						clone_days.find(".activity_select").remove();
							clone_days.find(".sightseeing_select").remove();


						clone_days.find(".days_description_label").attr({"for":"days_description__"+parseInt(loop+1)}).text("DAY "+parseInt(loop+1)+" DESCRIPTION");
					clone_days.find(".days_title_label").attr({"for":"days_title_label__"+parseInt(loop+1)}).text("DAY "+parseInt(loop+1)+" TITLE");

	
				
					clone_days.find(".days_description").attr({"id":"days_description__"+parseInt(loop+1),"name":"days_description[]"});
					clone_days.find(".days_title").attr({"id":"days_title__"+parseInt(loop+1),"name":"days_title[]"});


					
					$("#itinerary_main_div").append(clone_days);
					CKEDITOR.replace('days_description__'+parseInt(loop+1));
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

			$("#selected_hotel_name__"+actual_id[1]).text("");
			$("#hotel_id__"+actual_id[1]).val("");
			$("#hotel_name__"+actual_id[1]).val("");
			$("#room_name__"+actual_id[1]).val("");
			$("#hotel_cost__"+actual_id[1]).val("");
			$("#hotel_no_of_days__"+actual_id[1]).val("");

			$("#selected_activity_name__"+actual_id[1]).text("");
			$("#activity_id__"+actual_id[1]).val("");
			$("#activity_name__"+actual_id[1]).val("");
			$("#activity_cost__"+actual_id[1]).val("");

			$("#selected_sightseeing_name__"+actual_id[1]).text("");
			$("#sightseeing_id__"+actual_id[1]).val("");
			$("#sightseeing_name__"+actual_id[1]).val("");
			$("#sightseeing_cost__"+actual_id[1]).val("");


			$.ajax({

				url:"{{route('search-country-cities')}}",

				type:"GET",

				data:{"country_id":country_id},

				success:function(response)

				{



					$("#"+country_actual_id).parent().parent().find('#days_city__'+actual_id[1]).html(response).select2();

					$("#"+country_actual_id).parent().parent().find('#days_city__'+actual_id[1]).siblings(".select2-container").slice(1).remove();

					$("#"+country_actual_id).parent().parent().find('.days_city_div').show();



				}

			});



	});

</script>

<script>

	$(document).on("click",".change_date",function()

	{

		$("#no_of_days").val(0).trigger("change");

		$("#itinerary_main_div").html("");

		$("#change_date_div").hide();

		$("#total_cost").val(0);

	})

</script>

<script>
	$(document).on("click",".hotels_select",function()
	{
		var id=this.id;
		var hotel_id=id.split("__")[1];
		var no_of_days=$("#no_of_days").val();
		no_of_days++;
		var calculate_days=parseInt(no_of_days-parseInt(hotel_id));

		var country_id=$("#days_country__"+hotel_id).val();
		var city_id=$("#days_city__"+hotel_id).val();
		$no_of_days_html='<option value="">Select No. of Nights</option>';
		for($i=1;$i<=calculate_days;$i++)
		{
			$no_of_days_html+='<option value="'+$i+'">'+$i+'</option>';
		}

		if(country_id==null)
		{
			alert("Please select country first");
		}
		else if(city_id==0)
		{
			alert("Please select city first");
		}
		else
		{
			$.ajax({
			url:"{{route('itinerary-get-hotels')}}",
			data:{"country_id":country_id,
					"city_id":city_id},
			type:"get",
			success:function(response)
			{
				$("#hotels_div").html(response);
				$("#hotel_day_index").val(hotel_id);
				$("#hotel_no_of_days").html($no_of_days_html);
			$("#selectHotelModal").modal("show");
			}
		});
		
		}


		
	});
</script>

<script>
	$(document).on("click",".activity_select",function()
	{
		var id=this.id;
		var activity_id=id.split("__")[1];

		var country_id=$("#days_country__"+activity_id).val();
		var city_id=$("#days_city__"+activity_id).val();
			if(country_id==null)
		{
			alert("Please select country first");
		}
		else if(city_id==0)
		{
			alert("Please select city first");
		}
		else
		{
		$.ajax({
			url:"{{route('itinerary-get-activities')}}",
			data:{"country_id":country_id,
					"city_id":city_id},
			type:"get",
			success:function(response)
			{
				$("#activities_div").html(response);
				$("#activities_day_index").val(activity_id);
			$("#selectActivityModal").modal("show");
			}
		});
		}
		
	});
</script>


<script>
	$(document).on("click",".sightseeing_select",function()
	{
		var id=this.id;
		var sightseeing_id=id.split("__")[1];

		var country_id=$("#days_country__"+sightseeing_id).val();
		var city_id=$("#days_city__"+sightseeing_id).val();
	if(country_id==null)
		{
			alert("Please select country first");
		}
		else if(city_id==0)
		{
			alert("Please select city first");
		}
		else
		{
		$.ajax({
			url:"{{route('itinerary-get-sightseeing')}}",
			data:{"country_id":country_id,
					"city_id":city_id},
			type:"get",
			success:function(response)
			{
				$("#sightseeing_div").html(response);
				$("#sightseeing_day_index").val(sightseeing_id);
			$("#selectSightseeingModal").modal("show");
			}
		});
		}
		
	});
</script>
<script>
	$(document).on("click",".select_hotel",function(e)
	{
		
		var hotel_no_of_days=$("#hotel_no_of_days").val();
		if(hotel_no_of_days!="")
		{

		$(".select_hotel").each(function()
		{
			$(this).find('.tick').css("display","none");
			$(this).removeClass('selected_hotel');

		});
		var hotel_day_index=$("#hotel_day_index").val();

			var hotel_id=$(this).attr('id').split("__")[1];
			var hotel_name=$(this).find('.card-title').text();
			$("#hotel_id__"+hotel_day_index).val("");
			$("#selected_hotel_name__"+hotel_day_index).text("");
			$("#hotel_name__"+hotel_day_index).val("");
			$("#room_name__"+hotel_day_index).val("");
			$("#hotel_cost__"+hotel_day_index).val("");
			$("#hotel_no_of_days__"+hotel_day_index).val("");
			if($("input[name='room_type_"+hotel_id+"']:checked").val())
			{
				
				$(".select_hotel").each(function()
				{
					var id=this.id;
					var hotel_select_id=$(this).attr('id').split("__")[1];

					if(id!="hotel__"+hotel_id)
					{
						$("input[name='room_type_"+hotel_select_id+"']").prop("checked",false);
					}

				});

			$(this).find('.tick').css("display","block");

			$(this).addClass('selected_hotel');
			var room_index=$("input[name='room_type_"+hotel_id+"']:checked").val();
			// var hotel_day_index=$("#hotel_day_index").val();
			// var hotel_id=$(this).attr('id').split("__")[1];
			// var hotel_name=$(this).find('.card-title').text();
			// var hotel_cost=$(this).find('.search_hotel_cost').val();
			var room_name=$('input[name="room_name_'+room_index+'_'+hotel_id+'"]').val();
			var hotel_cost=$('input[name="room_price_'+room_index+'_'+hotel_id+'"]').val();

			var days_country=$("#days_country__"+hotel_day_index).val();
			for($i=0;$i<hotel_no_of_days;$i++)
			{

			
			if($i>0)
			{
			$("#days_country__"+hotel_day_index).val(days_country).trigger('change');	
				
			}

			$("#hotel_id__"+hotel_day_index).val(hotel_id);
			$("#selected_hotel_name__"+hotel_day_index).text(hotel_name);
			$("#hotel_name__"+hotel_day_index).val(hotel_name);
			$("#room_name__"+hotel_day_index).val(room_name);
			$("#hotel_cost__"+hotel_day_index).val(hotel_cost);
			if($i==0)
			{
			$("#hotel_no_of_days__"+hotel_day_index).val(hotel_no_of_days);
			}
			else
			{
			$("#hotel_no_of_days__"+hotel_day_index).val(0);
			}

			$("#hotels_select__"+hotel_day_index).css({'cursor':'not-allowed','pointer-events':'none'});
				$("#days_country__"+hotel_day_index).parent().find('.select2-selection').css({'cursor':'not-allowed','pointer-events':'none'});

			hotel_day_index=parseInt(parseInt(hotel_day_index)+1);


			}
			

			// $("#days_country__"+hotel_day_index).val(days_country).trigger('change');	
			// $("#hotels_select__"+hotel_day_index).css({'cursor':'not-allowed','pointer-events':'none'});
			// $("#days_country__"+hotel_day_index).parent().find('.select2-selection').css({'cursor':'not-allowed','pointer-events':'none'});
			// $("#hotel_id__"+hotel_day_index).val(hotel_id);
			// $("#selected_hotel_name__"+hotel_day_index).text(hotel_name);
			// $("#hotel_name__"+hotel_day_index).val(hotel_name);
			// $("#room_name__"+hotel_day_index).val(room_name);
			// $("#hotel_cost__"+hotel_day_index).val(0);
			// $("#hotel_no_of_days__"+hotel_day_index).val(0);
			

			var total_cost=0;
			$(".cal_cost").each(function()
			{
				if($(this).val()!="")
				{
					total_cost+=parseInt($(this).val());
				}

			});
			$(".cal_activity_cost").each(function()
			{
				if($(this).val()!="")
				{
					var activity_cost_array=$(this).val().split("///");
					var total = 0;
					for (var i = 0; i < activity_cost_array.length; i++) {
						total += activity_cost_array[i] << 0;
					}

					total_cost+=parseInt(total);
				}
			});
			$("#total_cost").val(total_cost);
		}
		else
		{
			alert(" Please select room type");
		}

	}
	else
	{
		alert("Please select no. of Days");
	}

	});

	$(document).on("click",".select_sightseeing",function()
	{
		$(".select_sightseeing").each(function()
		{
			$(this).find('.tick').css("display","none");
			$(this).removeClass('selected_sightseeing');

		});

		
			$(this).find('.tick').css("display","block");
			$(this).addClass('selected_sightseeing');

			var sightseeing_day_index=$("#sightseeing_day_index").val();

			var sightseeing_id=$(this).attr('id').split("__")[1];

			var sightseeing_name=$(this).find('.card-title').text();
			var sightseeing_cost=$(this).find('.search_sightseeing_cost').val();

			$("#sightseeing_id__"+sightseeing_day_index).val(sightseeing_id);
			$("#selected_sightseeing_name__"+sightseeing_day_index).text(sightseeing_name);
			$("#sightseeing_name__"+sightseeing_day_index).val(sightseeing_name);
			$("#sightseeing_cost__"+sightseeing_day_index).val(sightseeing_cost);

			  var total_cost=0;
			$(".cal_cost").each(function()
			{
				if($(this).val()!="")
				{
					total_cost+=parseInt($(this).val());
				}

			});
			$(".cal_activity_cost").each(function()
			{
				if($(this).val()!="")
				{
					var activity_cost_array=$(this).val().split("///");
					var total = 0;
					for (var i = 0; i < activity_cost_array.length; i++) {
						total += activity_cost_array[i] << 0;
					}

					total_cost+=parseInt(total);
				}
			});
			$("#total_cost").val(total_cost);

	});
	$(document).on("click",".select_activity",function()
	{

		if($(this).find('.tick').css("display")=="block")
		{
			$(this).find('.tick').css("display","none");
			$(this).removeClass('selected_activity');
		}
		else
		{
			$(this).find('.tick').css("display","block");
			$(this).addClass('selected_activity');
			
		}

			var activity_id=[];
			var activity_name=[];
			var activity_cost=[];

			var activity_day_index=$("#activities_day_index").val();
			var count=0;
			var total_activity_cost=0;
			$(".selected_activity").each(function()
			{
			activity_id[count]=$(this).attr('id').split("__")[1];
			activity_name[count]=$(this).find('.card-title').text();
			activity_cost[count]=$(this).find('.search_activity_cost').val();

			total_activity_cost+=parseInt($(this).find('.search_activity_cost').val());

			count++;
			});

			$("#activity_id__"+activity_day_index).val(activity_id.join("///"));
			$("#selected_activity_name__"+activity_day_index).text(activity_name.join(" , "));
			$("#activity_name__"+activity_day_index).val(activity_name.join("///"));
			$("#activity_cost__"+activity_day_index).val(activity_cost.join("///"));

			 var total_cost=0;
			$(".cal_cost").each(function()
			{
				if($(this).val()!="")
				{
					total_cost+=parseInt($(this).val());
				}

			});
			$(".cal_activity_cost").each(function()
			{
				if($(this).val()!="")
				{
					var activity_cost_array=$(this).val().split("///");
					var total = 0;
					for (var i = 0; i < activity_cost_array.length; i++) {
						total += activity_cost_array[i] << 0;
					}

					total_cost+=parseInt(total);
				}
			});
			$("#total_cost").val(total_cost);



	});
</script>

<script>

	$(document).on("click","#discard_itinerary",function()

	{

		window.history.back();

	})

</script>

<script>

	  $(document).on("click","#save_itinerary",function()
    {
        var tour_name=$("#tour_name").val();
        var no_of_days=$("#no_of_days").val();
        var tour_description= CKEDITOR.instances.tour_description.getData();
         var tour_exclusions= CKEDITOR.instances.tour_exclusions.getData();
           var tour_terms_and_conditions= CKEDITOR.instances.tour_terms_and_conditions.getData();
           var tour_cancellation= CKEDITOR.instances.tour_cancellation.getData();
          var total_cost=$("#total_cost").val();

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


           if (no_of_days.trim() == "0")

        {

            $("#no_of_days").parent().find(".select2-selection").css("border", "1px solid #cf3c63");

        } 

        else

        {

            $("#no_of_days").parent().find(".select2-selection").css("border", "1px solid #9e9e9e");

        }

var days_country_error = 0;

$(".days_country").slice(1).each(function () {

    var days_country_id=$(this).attr("id");
    if ($(this).val() == null) {

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


var hotels_id_error = 0;
var activity_id_error = 0;
var sightseeing_id_error = 0;
var days_description_error = 0;
var days_title_error = 0;

days_description_array=[];
for($i=1;$i<=no_of_days;$i++)
{

	 var days_description=CKEDITOR.instances['days_description__'+$i].getData();

	 days_description_array[($i-1)]=CKEDITOR.instances['days_description__'+$i].getData();
	// if (days_description == "") {

 //        $("#days_description__"+$i).parent().css("border", "1px solid #cf3c63");

 //        $("#days_description__"+$i).parent().focus();

 //        days_description_error++;

 //    } else {

 //         $("#days_description__"+$i).parent().css("border", "1px solid #fff");

 //    }

    if ($("#days_title__" + $i).val() == "") {

        $("#days_title__" + $i).css("border", "1px solid #cf3c63");

        $("#days_title__" + $i).focus();

        days_title_error++;

    } else {

         $("#days_title__" + $i).css("border", "1px solid #9e9e9e");

    }

    if ($("#hotel_id__" + $i).val() == "") {

        $("#hotel_id__" + $i).parent().css("border", "1px solid #cf3c63");

        $("#hotel_id__" + $i).parent().focus();

        hotels_id_error++;

    } else {

         $("#hotel_id__" + $i).parent().css("border", "1px solid #fff");

    }



// if ($("#activity_id__" + $i).val() == "") {

//         $("#activity_id__" + $i).parent().css("border", "1px solid #cf3c63");

//         $("#activity_id__" + $i).parent().focus();

//         activity_id_error++;

//     } else {

//          $("#activity_id__" + $i).parent().css("border", "1px solid #fff");

//     }



// if ($("#sightseeing_id__" + $i).val() == "") {

//         $("#sightseeing_id__" + $i).parent().css("border", "1px solid #cf3c63");

//         $("#sightseeing_id__" + $i).parent().focus();

//         sightseeing_id_error++;

//     } else {

//          $("#sightseeing_id__" + $i).parent().css("border", "1px solid #fff");

//     }
}

var days_description=CKEDITOR.instances['days_description__'+$i].getData();
	 days_description_array[($i-1)]=CKEDITOR.instances['days_description__'+$i].getData();
	// if (days_description == "") {

 //        $("#days_description__"+$i).parent().css("border", "1px solid #cf3c63");

 //        $("#days_description__"+$i).parent().focus();

 //        days_description_error++;

 //    } else {

 //         $("#days_description__"+$i).parent().css("border", "1px solid #fff");

 //    }

    if ($("#days_title__" + $i).val() == "") {

        $("#days_title__" + $i).css("border", "1px solid #cf3c63");

        $("#days_title__" + $i).focus();

        days_title_error++;

    } else {

         $("#days_title__" + $i).css("border", "1px solid #9e9e9e");

    }

 if (total_cost.trim() == "")

        {

            $("#total_cost").css("border", "1px solid #cf3c63");

        } 

        else

        {

            $("#total_cost").css("border", "1px solid #9e9e9e");

        }

         if (tour_exclusions.trim() == "")

        {

            $("#cke_tour_exclusions").css("border", "1px solid #cf3c63");

        } 

        else

        {

            $("#cke_tour_exclusions").css("border", "1px solid #9e9e9e");

        }

         if (tour_terms_and_conditions.trim() == "")

        {

            $("#cke_tour_terms_and_conditions").css("border", "1px solid #cf3c63");

        } 

        else

        {

            $("#cke_tour_terms_and_conditions").css("border", "1px solid #9e9e9e");

        }

          if (tour_cancellation.trim() == "")

        {

            $("#cke_tour_cancellation").css("border", "1px solid #cf3c63");

        } 

        else

        {

            $("#cke_tour_cancellation").css("border", "1px solid #9e9e9e");

        }


if(tour_name.trim() == "")

{

    $("#tour_name").focus();

}

else if(tour_description.trim()=="")

{

  $("#cke_tour_description").focus();  
}
else if(no_of_days.trim()=="0")

{

  $("#no_of_days").parent().find(".select2-selection").focus();  
}
else if(days_country_error>0)
{
}

else if(days_city_error>0)
{
}
else if(days_title_error >0)
{
}
else if(days_description_error >0)
{

}
else if(hotels_id_error>0)
{
}
else if(activity_id_error>0)
{
}
else if(sightseeing_id_error>0)
{
}
else if(total_cost.trim() == "")
{
    $("#total_cost").focus();

}
else if(tour_exclusions.trim()=="")
{
  $("#cke_tour_exclusions").focus();  
}
else if(tour_terms_and_conditions.trim()=="")

{

  $("#cke_tour_terms_and_conditions").focus();  
    
}
else if(tour_cancellation.trim()=="")

{

  $("#cke_tour_cancellation").focus();  
    
}
else

{

    $("#save_itinerary").prop("disabled", true);

    var formdata=new FormData($("#itinerary_form")[0]);

    formdata.append("tour_description",tour_description);
    formdata.append("tour_exclusions",tour_exclusions);
    formdata.append("tour_terms_and_conditions",tour_terms_and_conditions);
       formdata.append("tour_cancellation",tour_cancellation);
	formdata.append("days_description", JSON.stringify(days_description_array));
    $.ajax({

        url:"{{route('insert-itinerary')}}",

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

                    text: "Itinerary Created Successfully !",

                    type: "success"

                },



                function () {



                    location.reload();



                });



            } else if (response.indexOf("fail") != -1)



            {



                swal("ERROR", "Itinerary cannot be inserted right now! ");



            }

            $("#save_itinerary").prop("disabled", false);



        }

    });

}

});

</script>

</body>





</html>

