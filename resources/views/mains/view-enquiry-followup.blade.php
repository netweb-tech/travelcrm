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

							<li class="breadcrumb-item active" aria-current="page">Enquiry Followups

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





						<!-- <div class="col-sm-6 col-md-3">

							<div class="input-group my-colorpicker2">



								<input type="text" class="form-control" placeholder="Search...">



								<div class="input-group-addon">

									<i class="fa fa-search"></i>

								</div>

							</div>

						</div>

						<div class="col-sm-6 col-md-2">

							<div class="form-group">

								<select class="form-control select2" style="width: 100%;">

									<option selected="selected">Select Source</option>

									<option>Facebook</option>

								</select>

							</div>

						</div>

						<div class="col-sm-6 col-md-2">

							<div class="form-group">

								<select class="form-control select2" style="width: 100%;">

									<option selected="selected">Filter by</option>

									<option>Alaska</option>

									<option>California</option>

									<option>Delaware</option>

									<option>Tennessee</option>

									<option>Texas</option>

									<option>Washington</option>

								</select>

							</div>

						</div>-->

						<div class="col-sm-6 col-md-2">

							<div class="form-group" id="sponser_div" style="display:block;">

								 <label>From Date</label>

									<input type="text" id="enq_from_date" name="enq_from_date" class="form-control fromdatepicker" placeholder="Enquiry From Date">

							</div>



						</div> 

						<div class="col-sm-6 col-md-2">

							<div class="form-group" id="sponser_div" style="display:block;">

								 <label>To Date</label>

									<input type="text" id="enq_to_date" name="enq_to_date" class="form-control todatepicker" placeholder="Enquiry To Date">

							</div>



						</div> 

						<div class="col-sm-6 col-md-2">

							<div class="form-group">

								<label>Prospect</label>

								<select class="form-control enq_prospct " id="enq_prospct" style="width: 100%;">

									 <option selected="selected" value="0">PROSPECT</option>

									<option value="Hot">Hot</option>

									<option value="Warm">Warm</option>

									<option value="Cloud">Cloud</option>

								</select>



							</div>

						</div> 

						<div class="col-sm-6 col-md-2">

							<div class="form-group">

								<label>Status</label>

								<select class="form-control  enq_status" id="enq_status" style="width: 100%;">

									<option selected="selected" value="0">STATUS</option>

									<option value="Open">Open</option>

									<option value="Win">Win</option>

									<option value="Fail">Fail</option>

								</select>



							</div>

						</div> 

						 <div class="col-sm-6 col-md-2">



                            <div class="form-group">



                                <label for="assigned_to">ASSIGNED TO</label>



                                <select id="assigned_to" class="form-control" style="width: 100%;" name="assigned_to">



                                    <option selected="selected" value="0">SELECT ASSIGNED USER</option>



                                    @foreach($users as $user)



                                    <option value="{{$user->users_id}}">{{$user->users_fname}} {{$user->users_lname}}</option>



                                    @endforeach



                                </select>



                            </div>



                        </div>

						<!-- <div class="col-sm-6 col-md-4">

							<div class="form-group">



								<div class="input-group date">

									<input type="text" placeholder="Date" class="form-control pull-right datepicker">

									<div class="input-group-addon">

										<i class="fa fa-calendar"></i>

									</div>

								</div>

							



							</div>

						</div>

						<div class="col-sm-6 col-md-2">

							<div class="form-group">

								<select class="form-control select2" style="width: 100%;">

									<option selected="selected">Select User</option>

									<option>Alaska</option>

									<option>California</option>

									<option>Delaware</option>

									<option>Tennessee</option>

									<option>Texas</option>

									<option>Washington</option>

								</select>

							</div>

						</div>

						<div class="col-sm-6 col-md-2">

							<div class="form-group">



								<select class="form-control select2" style="width: 100%;">

									<option selected="selected" value="0">Enquiry Country</option>

									  @foreach($countries as $country)

										<option value="{{$country->country_id}}">{{$country->country_name}}</option>

                                    @endforeach

								</select>



							</div>

						</div>

						<div class="col-sm-6 col-md-2">



							<div class="upload-file">

								<i class="fa fa-upload"></i>

								<input type="file" class="file-i">

							</div>

							<div class="upload-file"><i class="fa fa-file-excel-o" aria-hidden="true"></i>

							</div>



						</div>

						<div class="col-sm-6 col-md-2">



						</div>

					 -->

						<div class="col-12">

							<div class="box">



								<!-- /.box-header -->

								<div class="box-body">

									<div class="table-responsive" id="showdata">

										<table id="example1" class="table table-bordered table-striped">

											<thead>

												<tr>

													<th>ID</th>

													<th>Customer Name</th>

													<th>Customer Contact</th>

													<th>Customer Email</th>

													<th>Created By</th>

													<th>Desination</th>

													<th>Prospect</th>

													<th>Travel Date</th>

													<th>Next FollowUp Date</th>

													<th>Status</th>

													<th>Assigned To</th>

													<th>Action</th>



												</tr>

											</thead>

											<tbody>

												@foreach($get_enquiries as $enquiry)

												<tr>

													<td>{{$enquiry->enq_id}}</td>

													<td>{{$enquiry->customer_name}}</td>

													<td>{{$enquiry->customer_contact}}</td>

													<td>{{$enquiry->customer_email}}</td>

													<td>

														@foreach($users as $user)

														@if($enquiry->emp_id==$user->users_id)

														{{$user->users_fname}} {{$user->users_lname}}

														@endif

														@endforeach

													</td>

														@php

														$destinations=array();

															$get_destination=unserialize($enquiry->enquiry_locations);



															for($i=0;$i< count($get_destination);$i++)

															{	

																$destinations[]=$get_destination[$i]['city'];

															}



															$destination_data=implode(' - ',$destinations);



														@endphp

														<td>{{$destination_data}}</td>

														<td>{{$enquiry->enquiry_prospect}}</td>

														@php

															$get_booking_date=explode(' - ',$enquiry->booking_range);

															$booking_date=date('d/m/Y',strtotime($get_booking_date[0]));

														@endphp

														<td>{{$booking_date}}</td>

														@php

															$get_nxtfollow_update=explode(' - ',$enquiry->nxt_followup_date);

															$next_followup_date=date('d/m/Y h:i a',strtotime($get_nxtfollow_update[0]." ".$get_nxtfollow_update[1]));

														@endphp

														<td>{{$next_followup_date}}</td>

														<td>{{$enquiry->enquiry_status}}</td>

														<td>@foreach($users as $user)

														@if($enquiry->assigned_to==$user->users_id)

														{{$user->users_fname}} {{$user->users_lname}}

														@endif

														@endforeach</td>

														<td>
															@if($rights['add']==1)
														<a href="{{route('enquiry-details',['enq_id'=>$enquiry->enq_id])}}"><i class="fa fa-eye"></i></a> 
														@endif
													</td>

												</tr>

												@endforeach

											</tbody>



										</table>

									</div>

								</div>

								<!-- /.box-body -->

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



    $(function () {



        //Departure



        var date = new Date();



        date.setDate(date.getDate());



        $('.fromdatepicker').datepicker({



            autoclose: true,



            todayHighlight: true,



            format: 'dd/mm/yyyy',



           



            



        })



        //Date picker



        $('.todatepicker').datepicker({



            autoclose: true,



            todayHighlight: true,



            format: 'dd/mm/yyyy',



          



        })

 })



</script>

<script>



    var mainStuff = function () {

   

	var enq_to_date=$('#enq_to_date').val();

	var enq_from_date=$('#enq_from_date').val();

	var enq_prospct=$('#enq_prospct').val();

	var enq_status=$('#enq_status').val();

	var assigned_to=$('#assigned_to').val();

	$.ajax({



                url: "{{route('enquiry_view_filter_followup')}}",



                data: {

                      'enq_to_date':enq_to_date,

                      'enq_from_date':enq_from_date,

                      'enq_prospct':enq_prospct,

                      'enq_status':enq_status,

                      'assigned_to':assigned_to,



                },

                  type: 'GET',

                 success: function (data) 



                {

                 

                   if(data=="")



                   {

                   }



                   else



                   {



                 



                       $('#showdata').html(data);



                       $('#example1').DataTable({



                        'paging'      : true,



                        'lengthChange': false,



                        'searching'   : false,



                        'ordering'    : false,



                        'info'        : false,



                        'autoWidth'   : false



                      })



                    }



                }



            })



      



    }



</script>

<script>

 $('#enq_from_date').on('change',mainStuff);

 $('#enq_to_date').on('change',mainStuff);

  $('#enq_prospct').on('change',mainStuff);

 $('#enq_status').on('change',mainStuff);

 $('#assigned_to').on('change',mainStuff);

</script>



</body>





</html>

