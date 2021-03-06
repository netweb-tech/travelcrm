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

				<h3 class="page-title">Supplier Management</h3>

				<div class="d-inline-block align-items-center">

					<nav>

						<ol class="breadcrumb">

							<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>

							<li class="breadcrumb-item" aria-current="page">Dashboard</li>

							<li class="breadcrumb-item active" aria-current="page">Guide Management

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




@if($rights['add']==1 || $rights['view']==1)
	<div class="row">

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
				
						<div class="col-sm-6 col-md-2">

							<div class="form-group">



								<a href="{{route('admin-create-guide')}}"><button type="button"

										class="btn btn-rounded btn-success">Create Guide</button>

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

													<th>Name</th>

													<th>Contact</th>

													<th>Address</th>

													<th>Supplier</th>

													<th>City</th>

													<th>Country</th>
												
													@if($rights['edit_delete']==1)
													<th>Status</th>
													@endif
													@if($rights['edit_delete']==1 || $rights['view']==1)
													<th>Action</th>
													@endif



												</tr>

											</thead>

											<tbody>

												@foreach($get_guides as $guide)

												<tr id="tr_{{$guide->guide_id}}">

													<td>{{$guide->guide_id}}</td>

													<td>{{$guide->guide_first_name}} {{$guide->guide_last_name}}</td>

													<td>{{$guide->guide_contact}}</td>

													<td>{{$guide->guide_address}}</td>

													<td>@foreach($get_suppliers as $suppliers)
															@if($suppliers->supplier_id==$guide->guide_supplier_id)
													{{$suppliers->supplier_name}}
															@endif

														@endforeach</td>

													<td>
														<?php
														$fetch_city=ServiceManagement::searchCities($guide->guide_city,$guide->guide_country);
														echo $fetch_city['name'];
														?>
													</td>

													<td>
														@foreach($countries as $country)
															@if($country->country_id==$guide->guide_country)
													{{$country->country_name}}
															@endif

														@endforeach
														</td>
														@if($rights['edit_delete']==1)
											
														<td>
															@if($guide->guide_status==1)
															<button type="button" class="btn btn-sm btn-rounded inactive btn-primary" id="inactive_supplier_{{$guide->guide_id}}">Active</button>
															@else
															<button type="button" class="btn btn-sm btn-rounded active btn-default" id="active_supplier_{{$guide->guide_id}}">InActive</button>
															@endif
														</td>
														@endif
														@if($rights['edit_delete']==1 || $rights['view']==1)
													<td>
														@if(strpos($rights['admin_which'],'view')!==false)
														<a href="{{route('admin-guide-details',['guide_id'=>$guide->guide_id])}}"><i class="fa fa-eye"></i></a>
														@elseif($guide->guide_created_by!=Session::get('travel_users_id') && $guide->guide_role!="Supplier" && strpos($rights['admin_which'],'view')!==false)
														<a href="{{route('admin-guide-details',['guide_id'=>$guide->guide_id])}}"><i class="fa fa-eye"></i></a>
														@elseif($guide->guide_created_by==Session::get('travel_users_id') && $guide->guide_role!="Supplier" && $rights['view']==1)
														<a href="{{route('admin-guide-details',['guide_id'=>$guide->guide_id])}}"><i class="fa fa-eye"></i></a>
														@endif

															@if(strpos($rights['admin_which'],'edit_delete')!==false)
														<a href="{{route('admin-edit-guide',['guide_id'=>$guide->guide_id])}}"><i class="fa fa-pencil"></i></a>
														@elseif($guide->guide_created_by!=Session::get('travel_users_id') &&  strpos($rights['admin_which'],'edit_delete')!==false)
														<a href="{{route('admin-edit-guide',['guide_id'=>$guide->guide_id])}}"><i class="fa fa-pencil"></i></a>
														@elseif($guide->guide_created_by==Session::get('travel_users_id') && $guide->guide_role!="Supplier" && $rights['edit_delete']==1)
														<a href="{{route('admin-edit-guide',['guide_id'=>$guide->guide_id])}}"><i class="fa fa-pencil"></i></a>
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



		<!-- /.box -->



	</div>
	@else
	<h4 class="text-danger">No rights to access this page</h4>
			
			@endif



</div>

</div>

</div>

@include('mains.includes.footer')

@include('mains.includes.bottom-footer')

<script>

	$(document).ready(function()

	{

		$('#date_range').daterangepicker({

			locale: {

				format: 'YYYY-MM-DD',

				cancelLabel: 'Clear'

			}

		});

	});

</script>
<script>
	// $(document).on("click",'.active',function()
	// {
	// 	var id=this.id;
	// 	var actual_id=id.split("_");

	// 	var action_name=actual_id[1];
	// 	var action_perform=actual_id[0];
	// 	var action_id=actual_id[2];

	// 	if(action_name=="supplier")
	// 	{

	// 		swal({
	// 			title: "Are you sure?",
	// 			text: "You want to activate this supplier !",
	// 			type: "warning",
	// 			showCancelButton: true,
	// 			confirmButtonColor: "#DD6B55",
	// 			confirmButtonText: "Yes, Activate",
	// 			cancelButtonText: "No, cancel!",
	// 			closeOnConfirm: false,
	// 			closeOnCancel: false
	// 		}, function(isConfirm) {
	// 			if (isConfirm) {

	// 				$.ajax({
	// 					url:"{{route('update-supplier-active')}}",
	// 					type:"POST",
	// 					data:{"_token":"{{csrf_token()}}",
	// 					"action_perform":action_perform,
	// 					"supplier_id":action_id},
	// 					success:function(response)
	// 					{
	// 						if(response.indexOf("success")!=-1)
	// 						{
	// 							$("#"+id).parent().html('<button type="button" class="btn btn-sm btn-rounded btn-primary inactive" id="inactive_supplier_'+action_id+'">Active</button>');

	// 							swal("Activated!", "Selected Supplier has been activated.", "success");
	// 						}
	// 						else
	// 						{
	// 							swal("Error", "Unable to perform this operation", "error");

	// 						}
	// 					}
	// 				});

					
	// 			} else {
	// 				swal("Cancelled", "Operation Cancelled", "error");
	// 			}
	// 		});

	// 	}
	// });
	// $(document).on("click",'.inactive',function()
	// {
	// 	var id=this.id;
	// 	var actual_id=id.split("_");

	// 	var action_name=actual_id[1];
	// 	var action_perform=actual_id[0];
	// 	var action_id=actual_id[2];
	// 	if(action_name=="supplier")
	// 	{
	// 		swal({
	// 			title: "Are you sure?",
	// 			text: "You want to inactive this hotel !",
	// 			type: "warning",
	// 			showCancelButton: true,
	// 			confirmButtonColor: "#DD6B55",
	// 			confirmButtonText: "Yes, Inactivate",
	// 			cancelButtonText: "No, cancel!",
	// 			closeOnConfirm: false,
	// 			closeOnCancel: false
	// 		}, function(isConfirm) {
	// 			if (isConfirm) {

	// 				$.ajax({
	// 					url:"{{route('update-supplier-active')}}",
	// 					type:"POST",
	// 					data:{"_token":"{{csrf_token()}}",
	// 					"action_perform":action_perform,
	// 					"supplier_id":action_id},
	// 					success:function(response)
	// 					{
	// 						if(response.indexOf("success")!=-1)
	// 						{
	// 							$("#"+id).parent().html('<button type="button" class="btn btn-sm btn-rounded btn-default active" id="active_hotel_'+action_id+'">InActive</button>');

	// 							swal("Inactivated!", "Selected Hotel has been inactivated.", "success");
	// 						}
	// 						else
	// 						{
	// 							swal("Error", "Unable to perform this operation", "error");

	// 						}
	// 					}
	// 				});



	// 			} else {
	// 				swal("Cancelled", "Operation Cancelled", "error");
	// 			}
	// 		});
	// 	}
	// });
</script>





</body>





</html>

