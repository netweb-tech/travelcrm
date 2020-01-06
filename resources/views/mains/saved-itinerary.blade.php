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



				<h3 class="page-title">Saved Itineraries</h3>



				<div class="d-inline-block align-items-center">



					<nav>



						<ol class="breadcrumb">



							<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>



							<li class="breadcrumb-item" aria-current="page">Home</li>



							<li class="breadcrumb-item active" aria-current="page"> Saved Itineraries



							</li>



						</ol>



					</nav>



				</div>



			</div>





		</div>



	</div>











	<div class="row">


@if($rights['add']==1 || $rights['view']==1)
	 <div class="col-12">



			<div class="box">











				<div class="box-body">







					<div class="row">



						<!--  <div class="col-sm-6 col-md-5">

                            <div class="input-group my-colorpicker2">



                                <input type="text" class="form-control" placeholder="Search...">



                                <div class="input-group-addon">

                                    <i class="fa fa-search"></i>

                                </div>

                            </div>

                        </div>

 						-->
 						@if($rights['add']==1)
						<div class="col-sm-6 col-md-3">

							<div class="form-group">

								<a href="{{route('create-itinerary')}}"><button type="button"



										class="btn btn-rounded btn-success">Create Own Itinerary</button>
								</a>

							</div>
						</div>
						@endif

						<!--  <div class="col-sm-6 col-md-2">

                            <div class="form-group">

                                <a href="#"><button type="button" class="btn btn-rounded btn-success">Upload

                                        File</button></a>

                                </a>

                            </div>





                        </div>

                        <div class="col-sm-6 col-md-2">

                            <div class="form-group">



                                <a href="#">

                                    <button type="button" class="btn btn-rounded btn-success">Export Data</button></a>

                                </a>

                            </div>

                        </div>

 					-->

 						@if($rights['view']==1)	
						<div class="col-12">
							<div class="box">
								<!-- /.box-header -->
								<div class="box-body" style="padding:0">
									<div class="table-responsive">
                                        <div class="row">
                                        <table id="example1" class="table table-bordered table-striped">
											<thead>
												<tr>
													<th>ID</th>
													<th>Tour Name</th>
													<th>Occupancy</th>
													<th>Adult Count</th>
													<th>Start Date</th>
													<th>End Date</th>
														@if($rights['edit_delete']==1)
													<th>Status</th>
													<th>Action</th>
													@endif
												</tr>
											</thead>
											<tbody>

												@foreach($get_itinerary as $itinerary)
												<tr id="tr_{{$itinerary->itinerary_id}}">

													<td>{{$itinerary->itinerary_id}}</td>

													<td>{{$itinerary->itinerary_tour_name}}</td>



													<td>{{$itinerary->itinerary_occupancy}}</td>



													<td>{{$itinerary->itinerary_adult}}</td>



													<td>{{$itinerary->itinerary_tour_fromdate}}</td>

													<td>{{$itinerary->itinerary_tour_todate}}</td>
													@if($rights['edit_delete']==1)
													<td>
														@if(strpos($rights['admin_which'],'edit_delete')!==false)
														@if($itinerary->itinerary_status==1)

														<button type="button" class="btn btn-sm btn-rounded inactive btn-primary" id="inactive_itinerary_{{$itinerary->itinerary_id}}">Active</button>

														@else

														<button type="button" class="btn btn-sm btn-rounded active btn-default" id="active_itinerary_{{$itinerary->itinerary_id}}">InActive</button>

														@endif
														@elseif($itinerary->itinerary_created_by!=Session::get('travel_users_id') &&  strpos($rights['admin_which'],'edit_delete')!==false)
														@if($itinerary->itinerary_status==1)

														<button type="button" class="btn btn-sm btn-rounded inactive btn-primary" id="inactive_itinerary_{{$itinerary->itinerary_id}}">Active</button>

														@else

														<button type="button" class="btn btn-sm btn-rounded active btn-default" id="active_itinerary_{{$itinerary->itinerary_id}}">InActive</button>

														@endif
														@elseif($itinerary->itinerary_created_by==Session::get('travel_users_id') && $itinerary->itinerary_created_role!="Supplier" && $rights['edit_delete']==1)
														<@if($itinerary->itinerary_status==1)

														<button type="button" class="btn btn-sm btn-rounded inactive btn-primary" id="inactive_itinerary_{{$itinerary->itinerary_id}}">Active</button>

														@else

														<button type="button" class="btn btn-sm btn-rounded active btn-default" id="active_itinerary_{{$itinerary->itinerary_id}}">InActive</button>

														@endif
														@else
														@if($itinerary->itinerary_status==1)

														<button type="button" class="btn btn-sm btn-rounded inactive btn-primary" id="inactive_itinerary_{{$itinerary->itinerary_id}}" disabled="disabled">Active</button>

														@else

														<button type="button" class="btn btn-sm btn-rounded active btn-default" id="active_itinerary_{{$itinerary->itinerary_id}}" disabled="disabled">InActive</button>

														@endif
														@endif

														

													</td>

													<td>

														@if(strpos($rights['admin_which'],'view')!==false)
														<a href="javascript:void(0)"><i class="fa fa-eye"></i></a>
														@elseif($itinerary->itinerary_created_by!=Session::get('travel_users_id') &&  strpos($rights['admin_which'],'view')!==false)
														<a href="javascript:void(0)"><i class="fa fa-eye"></i></a>
														@elseif($itinerary->itinerary_created_by==Session::get('travel_users_id') && $itinerary->itinerary_created_role!="Supplier" && $rights['view']==1)
														<a href="javascript:void(0)"><i class="fa fa-eye"></i></a>
														@endif

														

														@if(strpos($rights['admin_which'],'edit_delete')!==false)
														<a href="{{route('edit-itinerary',['itinerary_id'=>$itinerary->itinerary_id])}}"><i class="fa fa-pencil"></i></a>
														@elseif($itinerary->itinerary_created_by!=Session::get('travel_users_id') &&  strpos($rights['admin_which'],'edit_delete')!==false)
														<a href="{{route('edit-itinerary',['itinerary_id'=>$itinerary->itinerary_id])}}"><i class="fa fa-pencil"></i></a>
														@elseif($itinerary->itinerary_created_by==Session::get('travel_users_id') && $itinerary->itinerary_created_role!="Supplier" && $rights['edit_delete']==1)
														<a href="{{route('edit-itinerary',['itinerary_id'=>$itinerary->itinerary_id])}}"><i class="fa fa-pencil"></i></a>
														@endif


													</td>
													@endif

											</tr>

												@endforeach

				



											</tbody>







										</table>



                                        </div>



									



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



@include('mains.includes.footer')



@include('mains.includes.bottom-footer')



</body>











</html>



