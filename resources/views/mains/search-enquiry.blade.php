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
    #table-loader svg{
    width: 100px;
    height: 100px;
    display:inline-block;
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

							<li class="breadcrumb-item active" aria-current="page">Enquiry Management

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
		@if($rights['add']==1 || $rights['view']==1)
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
							@if($rights['view']==1)	

						<div class="col-sm-6 col-md-2">

							<div class="form-group" id="sponser_div" style="display:block;">

								 <label>Mobile</label>

									<input type="text" id="enq_mobile" name="enq_mobile" class="form-control " placeholder="Enquiry To Mobile">

							</div>



						</div> 

						<div class="col-sm-6 col-md-2">
							<div class="form-group" id="sponser_div" style="display:block;">

								 <label>Email</label>

									<input type="text" id="enq_email" name="enq_email" class="form-control " placeholder="Enquiry To Email">
							</div>
						</div> 
						<div class="col-sm-6 col-md-2">
							<div class="form-group" id="sponser_div" style="display:block;">

								 <label>Passport</label>

									<input type="text" id="enq_passport" name="enq_passport" class="form-control " placeholder="Enter Passport No">
							</div>
						</div>
						<div class="col-sm-6 col-md-2">
							<div class="form-group" id="sponser_div" style="display:block;">

								 <label>Name</label>

									<input type="text" id="enq_name" name="enq_name" class="form-control " placeholder="Enter Name">
							</div>
						</div>

						

						
                        @endif
                      

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
						@if($rights['view']==1)	
						<div class="col-12">
							<div class="box">
								<!-- /.box-header -->
								<div class="box-body">

									<div class="table-responsive" id="showdata">
										  <div id="table-loader" class="text-center" style="display: none">
									              <svg version="1.1" id="L5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
									              viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
									              <circle fill="#F33D38" stroke="none" cx="6" cy="50" r="6">
									                <animateTransform 
									                attributeName="transform" 
									                dur="1s" 
									                type="translate" 
									                values="0 15 ; 0 -15; 0 15" 
									                repeatCount="indefinite" 
									                begin="0.1"/>
									              </circle>
									              <circle fill="#F33D38" stroke="none" cx="30" cy="50" r="6">
									                <animateTransform 
									                attributeName="transform" 
									                dur="1s" 
									                type="translate" 
									                values="0 10 ; 0 -10; 0 10" 
									                repeatCount="indefinite" 
									                begin="0.2"/>
									              </circle>
									              <circle fill="#F33D38" stroke="none" cx="54" cy="50" r="6">
									                <animateTransform 
									                attributeName="transform" 
									                dur="1s" 
									                type="translate" 
									                values="0 5 ; 0 -5; 0 5" 
									                repeatCount="indefinite" 
									                begin="0.3"/>
									              </circle>
									            </svg>
									          </div>

										<table id="example1" class="table table-bordered table-striped">

											<thead>

												<tr>

													<th>ID</th>

													<th>Customer Name</th>

													<th>Customer Contact</th>

													<th>Customer Email</th>
													<th>Passport No</th>

													<th>Created By</th>

													<th>Desination</th>

													<th>Prospect</th>

													<th>Travel Date</th>

													<th>Next FollowUp Date</th>

													<th>Status</th>

													<th>Assigned To</th>

													@if($rights['edit_delete']==1 || $rights['view']==1)
													<th>Action</th>
													@endif



												</tr>

											</thead>

											<tbody>

												@foreach($get_enquiries as $enquiry)

												<tr>

													<td>{{$enquiry->enq_id}}</td>

													<td>{{$enquiry->customer_name}}</td>

													<td>{{$enquiry->customer_contact}}</td>

													<td>{{$enquiry->customer_email}}</td>
													<td>{{$enquiry->passport_no}}</td>
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
														@if($rights['edit_delete']==1 || $rights['view']==1)
														<td>
															@if(strpos($rights['admin_which'],'view')!==false)
															<a href="{{route('enquiry-details',['enq_id'=>$enquiry->enq_id])}}"><i class="fa fa-eye"></i></a>
															@elseif(($enquiry->emp_id!=Session::get('travel_users_id') || $enquiry->assigned_to!=Session::get('travel_users_id')) &&  strpos($rights['admin_which'],'view')!==false)
															<a href="{{route('enquiry-details',['enq_id'=>$enquiry->enq_id])}}"><i class="fa fa-eye"></i></a>
															@elseif(($enquiry->emp_id==Session::get('travel_users_id') || $enquiry->assigned_to==Session::get('travel_users_id')) &&  $rights['view']==1)
															<a href="{{route('enquiry-details',['enq_id'=>$enquiry->enq_id])}}"><i class="fa fa-eye"></i></a>
															@endif

															 |

															@if(strpos($rights['admin_which'],'edit_delete')!==false)
															<a href="{{route('edit-enquiry',['enq_id'=>$enquiry->enq_id])}}"><i class="fa fa-pencil"></i></a>
															@elseif(($enquiry->emp_id!=Session::get('travel_users_id') || $enquiry->assigned_to!=Session::get('travel_users_id')) &&  strpos($rights['admin_which'],'edit_delete')!==false)
															<a href="{{route('edit-enquiry',['enq_id'=>$enquiry->enq_id])}}"><i class="fa fa-pencil"></i></a>
															@elseif(($enquiry->emp_id==Session::get('travel_users_id') || $enquiry->assigned_to==Session::get('travel_users_id')) &&  $rights['edit_delete']==1)
															<a href="{{route('edit-enquiry',['enq_id'=>$enquiry->enq_id])}}"><i class="fa fa-pencil"></i></a>
															@endif

														</td>
														@endif

												</tr>

												@endforeach

												<!-- <tr>

													<td>123</td>

													<td>Rohan Sharma</td>

													<td>9856321458</td>

													<td>r@gmail.com</td>

													<td>Daman kumar</td>

													<td>Amritsar</td>

													<td>Warm</td>

													<td>12-02-19</td>

													<td>12-02-20</td>

													<td>0</td>

													<td>Gaurav Sir</td>

													<td>



														<i class="fa fa-eye"></i>

														<i class="fa fa-pencil"></i>

													</td>

												</tr>

												<tr>

													<td>123</td>

													<td>Rohan Sharma</td>

													<td>9856321458</td>

													<td>r@gmail.com</td>

													<td>Daman kumar</td>

													<td>Amritsar</td>

													<td>Warm</td>

													<td>12-02-19</td>

													<td>12-02-20</td>

													<td>0</td>

													<td>Gaurav Sir</td>

													<td>



														<i class="fa fa-eye"></i>

														<i class="fa fa-pencil"></i>

													</td>

												</tr> -->





											</tbody>



										</table>

									</div>

								</div>

								<!-- /.box-body -->

							</div>
						</div>
						@endif





					</div>



				</div>

				<!-- /.row -->

			</div>

			<!-- /.box-body -->

		</div>
		@else
	<h4 class="text-danger">No rights to access this page</h4>
			
			@endif



		<!-- /.box -->

	</div>

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



            endDate: date



            



        })



        //Date picker



        $('.todatepicker').datepicker({



            autoclose: true,



            todayHighlight: true,



            format: 'dd/mm/yyyy',



            endDate: date



        })

 })



</script>
<script>
	 $('#example1').DataTable({
						'paging'      : true,
						'lengthChange': false,
						'searching'   : true,
						'ordering'    : false,
						'info'        : false,
						'autoWidth'   : true
					});
</script>

<script>

	

    var mainStuff = function () {
	var enq_name=$('#enq_name').val();
	var enq_email=$('#enq_email').val();
	var enq_passport=$('#enq_passport').val();
	var enq_mobile=$('#enq_mobile').val();
	 $("#table-loader").show();
	$.ajax({
			url: "{{route('enquiry_search_filter')}}",
				 data: {
						'enq_name':enq_name,
						'enq_email':enq_email,
						'enq_passport':enq_passport,
						'enq_mobile':enq_mobile,
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
						'searching'   : true,
						'ordering'    : false,
						'info'        : false,
						'autoWidth'   : false
						});
					}
					$("#table-loader").hide();
				}
			})
		 }



</script>

<script>

 $('#enq_name').on('change',mainStuff);

 $('#enq_email').on('change',mainStuff);

  $('#enq_passport').on('change',mainStuff);

 $('#enq_mobile').on('change',mainStuff);



</script>



</body>





</html>

