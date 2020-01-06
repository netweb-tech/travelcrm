<?php
use App\Http\Controllers\ServiceManagement;
?>
@include('mains.includes.top-header')
<style>
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
							<li class="breadcrumb-item active" aria-current="page">Service Management
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
					<!-- Nav tabs -->
					<ul class="nav nav-pills mb-20">
						<li class=" nav-item"> <a href="#navpills-1" class="nav-link show active" data-toggle="tab"
								aria-expanded="false">Hotel</a> </li>
						<li class="nav-item"> <a href="#navpills-2" class="nav-link show" data-toggle="tab"
								aria-expanded="false">Activity</a> </li>
						<!-- <li class="nav-item"> <a href="#navpills-3" class="nav-link show" data-toggle="tab"
								aria-expanded="true">Transportation</a> </li> -->
								<li class="nav-item"> <a href="#navpills-4" class="nav-link show" data-toggle="tab"
								aria-expanded="true">Guides</a> </li>
								<li class="nav-item"> <a href="#navpills-5" class="nav-link show" data-toggle="tab"
								aria-expanded="true">Sightseeing</a> </li>
					</ul>
					<!-- Tab panes -->
					<div class="tab-content">
						<div id="navpills-1" class="tab-pane show active">
							<div class="row">


								<!-- <div class="col-sm-6 col-md-5">
									<div class="input-group my-colorpicker2">

										<input type="text" class="form-control" placeholder="Search...">

										<div class="input-group-addon">
											<i class="fa fa-search"></i>
										</div>
									</div>
								</div>

								<div class="col-sm-6 col-md-4">
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
								</div> -->
									@if($rights['add']==1)
								<div class="col-sm-6 col-md-3">
									<div class="form-group">

										<a href="{{route('create-hotel')}}"><button type="button"
												class="btn btn-rounded btn-success">Create New Hotel</button></a>
									</div>
								</div>
								@endif





								@if($rights['view']==1)		
								<div class="col-12">
									<div class="box">

										<!-- /.box-header -->
										<div class="box-body">
											<div class="table-responsive">
												<table  id="hotel_table" class="table table-bordered table-striped">
													<thead>
														<tr>
															<th>S. No.</th>
															<th style="display:none">Hotel ID</th>
															<th>Hotel Name</th>
															<th>Hotel Address</th>
															<th>City</th>
															<th>Country</th>
															<th>Supplier Name</th>
															@if($rights['edit_delete']==1)
															<th>Status</th>
															<th>Approval</th>
																<th>Best Seller</th>
															@endif
															@if($rights['edit_delete']==1 || $rights['view']==1)
															<th>Action</th>
															@endif
														</tr>
													</thead>
													<tbody>
														@php
														$srno=1;
														@endphp
															@foreach($get_hotels as $hotels)

												<tr id="tr_{{$hotels->hotel_id}}">
													<td style="cursor: all-scroll;">{{$srno}}</td>
													<td style="display:none">{{$hotels->hotel_id}}</td>
													<td>{{$hotels->hotel_name}}</td>
													<td>{{$hotels->hotel_address}}</td>
													<td>
													<?php
														$fetch_city=ServiceManagement::searchCities($hotels->hotel_city,$hotels->hotel_country);

														echo $fetch_city['name'];
														?>

												</td>

													<td>
														@foreach($countries as $country)
															@if($country->country_id==$hotels->hotel_country)
													{{$country->country_name}}
															@endif

														@endforeach
														</td>

													<td>@foreach($get_suppliers as $suppliers)
															@if($suppliers->supplier_id==$hotels->supplier_id)
													{{$suppliers->supplier_name}}
															@endif

														@endforeach</td>


														@if($rights['edit_delete']==1)
														@if(strpos($rights['admin_which'],'edit_delete')!==false)
														<td>
															@if($hotels->hotel_status==1)
															<button type="button" class="btn btn-sm btn-rounded inactive btn-primary" id="inactive_hotel_{{$hotels->hotel_id}}">Active</button>
															@else
															<button type="button" class="btn btn-sm btn-rounded active btn-default" id="active_hotel_{{$hotels->hotel_id}}">InActive</button>
															@endif
														</td>
														
														
														<td style="white-space: nowrap;">
														@if($hotels->hotel_approve_status==1)
															<button type="button" class="btn btn-sm btn-rounded btn-primary" disabled="disabled">Approved</button>
															@elseif($hotels->hotel_approve_status==0)
															<button type="button" class="btn btn-sm btn-rounded approve btn-primary" id="approve_hotel_{{$hotels->hotel_id}}">Approve</button>
															<button type="button" class="btn btn-sm btn-rounded reject btn-danger" id="reject_hotel_{{$hotels->hotel_id}}">Reject</button>
															@elseif($hotels->hotel_approve_status==2)
															<button type="button" class="btn btn-sm btn-rounded btn-danger" disabled="disabled">Rejected</button>
															@endif


															</td>
															<td>
															
															@if($hotels->hotel_best_status==1)
															<button type="button" class="btn btn-sm btn-rounded best_seller_no btn-primary" id="bestsellerno_hotel_{{$hotels->hotel_id}}" >Active</button>
															@else
															<button type="button" class="btn btn-sm btn-rounded best_seller_yes btn-default" id="bestselleryes_hotel_{{$hotels->hotel_id}}" >InActive</button>
															@endif
														</td>

														@elseif($hotels->hotel_created_by!=Session::get('travel_users_id') &&  strpos($rights['admin_which'],'edit_delete')!==false)
														<td>
															@if($hotels->hotel_status==1)
															<button type="button" class="btn btn-sm btn-rounded inactive btn-primary" id="inactive_hotel_{{$hotels->hotel_id}}">Active</button>
															@else
															<button type="button" class="btn btn-sm btn-rounded active btn-default" id="active_hotel_{{$hotels->hotel_id}}">InActive</button>
															@endif
														</td>
														
														
														<td style="white-space: nowrap;">
														@if($hotels->hotel_approve_status==1)
															<button type="button" class="btn btn-sm btn-rounded btn-primary" disabled="disabled">Approved</button>
															@elseif($hotels->hotel_approve_status==0)
															<button type="button" class="btn btn-sm btn-rounded approve btn-primary" id="approve_hotel_{{$hotels->hotel_id}}">Approve</button>
															<button type="button" class="btn btn-sm btn-rounded reject btn-danger" id="reject_hotel_{{$hotels->hotel_id}}">Reject</button>
															@elseif($hotels->hotel_approve_status==2)
															<button type="button" class="btn btn-sm btn-rounded btn-danger" disabled="disabled">Rejected</button>
															@endif


															</td>
															<td>
															
															@if($hotels->hotel_best_status==1)
															<button type="button" class="btn btn-sm btn-rounded best_seller_no btn-primary" id="bestsellerno_hotel_{{$hotels->hotel_id}}" >Active</button>
															@else
															<button type="button" class="btn btn-sm btn-rounded best_seller_yes btn-default" id="bestselleryes_hotel_{{$hotels->hotel_id}}" >InActive</button>
															@endif
														</td>
														@elseif($hotels->hotel_created_by==Session::get('travel_users_id') && $hotels->hotel_create_role!="Supplier" && $rights['edit_delete']==1)
														<td>
															@if($hotels->hotel_status==1)
															<button type="button" class="btn btn-sm btn-rounded inactive btn-primary" id="inactive_hotel_{{$hotels->hotel_id}}">Active</button>
															@else
															<button type="button" class="btn btn-sm btn-rounded active btn-default" id="active_hotel_{{$hotels->hotel_id}}">InActive</button>
															@endif
														</td>
														
														
														<td style="white-space: nowrap;">
														@if($hotels->hotel_approve_status==1)
															<button type="button" class="btn btn-sm btn-rounded btn-primary" disabled="disabled">Approved</button>
															@elseif($hotels->hotel_approve_status==0)
															<button type="button" class="btn btn-sm btn-rounded approve btn-primary" id="approve_hotel_{{$hotels->hotel_id}}">Approve</button>
															<button type="button" class="btn btn-sm btn-rounded reject btn-danger" id="reject_hotel_{{$hotels->hotel_id}}">Reject</button>
															@elseif($hotels->hotel_approve_status==2)
															<button type="button" class="btn btn-sm btn-rounded btn-danger" disabled="disabled">Rejected</button>
															@endif


															</td>
															<td>
															
															@if($hotels->hotel_best_status==1)
															<button type="button" class="btn btn-sm btn-rounded best_seller_no btn-primary" id="bestsellerno_hotel_{{$hotels->hotel_id}}" >Active</button>
															@else
															<button type="button" class="btn btn-sm btn-rounded best_seller_yes btn-default" id="bestselleryes_hotel_{{$hotels->hotel_id}}" >InActive</button>
															@endif
														</td>
															@else
															<td>
															@if($hotels->hotel_status==1)
															<button type="button" class="btn btn-sm btn-rounded inactive btn-primary" id="inactive_hotel_{{$hotels->hotel_id}}" disabled="disabled">Active</button>
															@else
															<button type="button" class="btn btn-sm btn-rounded active btn-default" id="active_hotel_{{$hotels->hotel_id}}" disabled="disabled">InActive</button>
															@endif
														</td>
														<td style="white-space: nowrap;">
														@if($hotels->hotel_approve_status==1)
															<button type="button" class="btn btn-sm btn-rounded btn-primary" disabled="disabled">Approved</button>
															@elseif($hotels->hotel_approve_status==0)
															<button type="button" class="btn btn-sm btn-rounded approve btn-primary" id="approve_hotel_{{$hotels->hotel_id}}" disabled="disabled">Approve</button>
															<button type="button" class="btn btn-sm btn-rounded reject btn-danger" id="reject_hotel_{{$hotels->hotel_id}}" disabled="disabled">Reject</button>
															@elseif($hotels->hotel_approve_status==2)
															<button type="button" class="btn btn-sm btn-rounded btn-danger" disabled="disabled">Rejected</button>
															@endif


															</td>
															<td>
															
															@if($hotels->hotel_best_status==1)
															<button type="button" class="btn btn-sm btn-rounded best_seller_no btn-primary" id="bestsellerno_hotel_{{$hotels->hotel_id}}" disabled="disabled">Active</button>
															@else
															<button type="button" class="btn btn-sm btn-rounded best_seller_yes btn-default" id="bestselleryes_hotel_{{$hotels->hotel_id}}" disabled="disabled">InActive</button>
															@endif
														</td>
														@endif


														
															@endif

															@if($rights['edit_delete']==1 || $rights['view']==1)

													<td>
														@if(strpos($rights['admin_which'],'view')!==false)
														<a href="{{route('hotel-details',['hotel_id'=>$hotels->hotel_id])}}"><i class="fa fa-eye"></i></a>
														@elseif($hotels->hotel_created_by!=Session::get('travel_users_id') &&  strpos($rights['admin_which'],'view')!==false)
														<a href="{{route('hotel-details',['hotel_id'=>$hotels->hotel_id])}}"><i class="fa fa-eye"></i></a>
														@elseif($hotels->hotel_created_by==Session::get('travel_users_id') && $hotels->hotel_create_role!="Supplier" && $rights['view']==1)
														<a href="{{route('hotel-details',['hotel_id'=>$hotels->hotel_id])}}"><i class="fa fa-eye"></i></a>
														@endif

														@if(strpos($rights['admin_which'],'edit_delete')!==false)
														<a href="{{route('edit-hotel',['hotel_id'=>$hotels->hotel_id])}}"><i class="fa fa-pencil"></i></a>
														@elseif($hotels->hotel_created_by!=Session::get('travel_users_id') &&  strpos($rights['admin_which'],'edit_delete')!==false)
														<a href="{{route('edit-hotel',['hotel_id'=>$hotels->hotel_id])}}"><i class="fa fa-pencil"></i></a>
														@elseif($hotels->hotel_created_by==Session::get('travel_users_id') && $hotels->hotel_create_role!="Supplier" && $rights['edit_delete']==1)
														<a href="{{route('edit-hotel',['hotel_id'=>$hotels->hotel_id])}}"><i class="fa fa-pencil"></i></a>
														@endif

														

													</td>
													@endif

												</tr>
												@php
														$srno++;
														@endphp

												@endforeach

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
						<div id="navpills-2" class="tab-pane show">
							<div class="row">
							@if($rights['add']==1)
								<div class="col-sm-6 col-md-3">
									<div class="form-group">

										<a href="{{route('create-activity')}}"><button type="button"
												class="btn btn-rounded btn-success">Create New Activity</button></a>
									</div>
								</div>
								@endif

								@if($rights['view']==1)	
								
								<div class="col-12">
									<div class="box">

										<!-- /.box-header -->
										<div class="box-body">
											<div class="table-responsive">
												<table id="activity_table" class="table table-bordered table-striped">
													<thead>
														<tr>
															<th>S. No.</th>
															<th style="display:none">Activity ID</th>
															<th>Activity Name</th>
															<th>Supplier Name</th>
															<th>Location</th>
															<th>City</th>
															<th>Country</th>
															@if($rights['edit_delete']==1)
															<th>Status</th>
															<th>Approval</th>
															<th>Best Seller</th>
															@endif
															@if($rights['edit_delete']==1 || $rights['view']==1)
															<th>Action</th>
															@endif

														</tr>
													</thead>
													<tbody>
														@php
														$srno=1;
														@endphp
														@foreach($get_activites as $activities)

												<tr id="tr_{{$activities->activity_id}}" >
													<td style="cursor: all-scroll;">{{$srno}}</td>
													<td style="display:none">{{$activities->activity_id}}</td>

													<td>{{$activities->activity_name}}</td>

													<td>@foreach($get_suppliers as $suppliers)
															@if($suppliers->supplier_id==$activities->supplier_id)
													{{$suppliers->supplier_name}}
															@endif

														@endforeach</td>

													<td>{{$activities->activity_location}}</td>

													<td>
													<?php
														$fetch_city=ServiceManagement::searchCities($activities->activity_city,$activities->activity_country);

														echo $fetch_city['name'];
														?>

												</td>

													<td>
														@foreach($countries as $country)
															@if($country->country_id==$activities->activity_country)
													{{$country->country_name}}
															@endif

														@endforeach
														</td>

														@if($rights['edit_delete']==1)
														@if(strpos($rights['admin_which'],'edit_delete')!==false)
														<td>
															
															@if($activities->activity_status==1)
															<button type="button" class="btn btn-sm btn-rounded inactive btn-primary" id="inactive_activity_{{$activities->activity_id}}">Active</button>
															@else
															<button type="button" class="btn btn-sm btn-rounded active btn-default" id="active_activity_{{$activities->activity_id}}">InActive</button>
															@endif
														</td>

														<td style="white-space: nowrap;">
															@if($activities->activity_approve_status==1)
															<button type="button" class="btn btn-sm btn-rounded btn-primary" disabled="disabled">Approved</button>
															@elseif($activities->activity_approve_status==0)
															<button type="button" class="btn btn-sm btn-rounded approve btn-primary" id="approve_activity_{{$activities->activity_id}}">Approve</button>
															<button type="button" class="btn btn-sm btn-rounded reject btn-danger" id="reject_activity_{{$activities->activity_id}}">Reject</button>
															@elseif($activities->activity_approve_status==2)
															<button type="button" class="btn btn-sm btn-rounded btn-danger" disabled="disabled">Rejected</button>
															@endif
														</td>
														<td>
															
															@if($activities->activity_best_status==1)
															<button type="button" class="btn btn-sm btn-rounded best_seller_no btn-primary" id="bestsellerno_activity_{{$activities->activity_id}}" >Active</button>
															@else
															<button type="button" class="btn btn-sm btn-rounded best_seller_yes btn-default" id="bestselleryes_activity_{{$activities->activity_id}}" >InActive</button>
															@endif
														</td>
														@elseif($activities->activity_created_by!=Session::get('travel_users_id') &&  strpos($rights['admin_which'],'edit_delete')!==false)
														<td>
															
															@if($activities->activity_status==1)
															<button type="button" class="btn btn-sm btn-rounded inactive btn-primary" id="inactive_activity_{{$activities->activity_id}}">Active</button>
															@else
															<button type="button" class="btn btn-sm btn-rounded active btn-default" id="active_activity_{{$activities->activity_id}}">InActive</button>
															@endif
														</td>

														<td style="white-space: nowrap;">
															@if($activities->activity_approve_status==1)
															<button type="button" class="btn btn-sm btn-rounded btn-primary" disabled="disabled">Approved</button>
															@elseif($activities->activity_approve_status==0)
															<button type="button" class="btn btn-sm btn-rounded approve btn-primary" id="approve_activity_{{$activities->activity_id}}">Approve</button>
															<button type="button" class="btn btn-sm btn-rounded reject btn-danger" id="reject_activity_{{$activities->activity_id}}">Reject</button>
															@elseif($activities->activity_approve_status==2)
															<button type="button" class="btn btn-sm btn-rounded btn-danger" disabled="disabled">Rejected</button>
															@endif
														</td>
														<td>
															
															@if($activities->activity_best_status==1)
															<button type="button" class="btn btn-sm btn-rounded best_seller_no btn-primary" id="bestsellerno_activity_{{$activities->activity_id}}" >Active</button>
															@else
															<button type="button" class="btn btn-sm btn-rounded best_seller_yes btn-default" id="bestselleryes_activity_{{$activities->activity_id}}" >InActive</button>
															@endif
														</td>
														@elseif($activities->activity_created_by==Session::get('travel_users_id') && $activities->activity_role!="Supplier" && $rights['edit_delete']==1)
														<td>
															
															@if($activities->activity_status==1)
															<button type="button" class="btn btn-sm btn-rounded inactive btn-primary" id="inactive_activity_{{$activities->activity_id}}">Active</button>
															@else
															<button type="button" class="btn btn-sm btn-rounded active btn-default" id="active_activity_{{$activities->activity_id}}">InActive</button>
															@endif
														</td>

														<td style="white-space: nowrap;">
															@if($activities->activity_approve_status==1)
															<button type="button" class="btn btn-sm btn-rounded btn-primary" disabled="disabled">Approved</button>
															@elseif($activities->activity_approve_status==0)
															<button type="button" class="btn btn-sm btn-rounded approve btn-primary" id="approve_activity_{{$activities->activity_id}}">Approve</button>
															<button type="button" class="btn btn-sm btn-rounded reject btn-danger" id="reject_activity_{{$activities->activity_id}}">Reject</button>
															@elseif($activities->activity_approve_status==2)
															<button type="button" class="btn btn-sm btn-rounded btn-danger" disabled="disabled">Rejected</button>
															@endif
														</td>
														<td>
															
															@if($activities->activity_best_status==1)
															<button type="button" class="btn btn-sm btn-rounded best_seller_no btn-primary" id="bestsellerno_activity_{{$activities->activity_id}}" >Active</button>
															@else
															<button type="button" class="btn btn-sm btn-rounded best_seller_yes btn-default" id="bestselleryes_activity_{{$activities->activity_id}}" >InActive</button>
															@endif
														</td>
														@else
														<td>
															
															@if($activities->activity_status==1)
															<button type="button" class="btn btn-sm btn-rounded inactive btn-primary" id="inactive_activity_{{$activities->activity_id}}" disabled="disabled">Active</button>
															@else
															<button type="button" class="btn btn-sm btn-rounded active btn-default" id="active_activity_{{$activities->activity_id}}" disabled="disabled">InActive</button>
															@endif
														</td>

														<td style="white-space: nowrap;">
															@if($activities->activity_approve_status==1)
															<button type="button" class="btn btn-sm btn-rounded btn-primary" disabled="disabled">Approved</button>
															@elseif($activities->activity_approve_status==0)
															<button type="button" class="btn btn-sm btn-rounded approve btn-primary" id="approve_activity_{{$activities->activity_id}}" disabled="disabled">Approve</button>
															<button type="button" class="btn btn-sm btn-rounded reject btn-danger" id="reject_activity_{{$activities->activity_id}}" disabled="disabled">Reject</button>
															@elseif($activities->activity_approve_status==2)
															<button type="button" class="btn btn-sm btn-rounded btn-danger" disabled="disabled">Rejected</button>
															@endif
														</td>
														<td>
															
															@if($activities->activity_best_status==1)
															<button type="button" class="btn btn-sm btn-rounded best_seller_no btn-primary" id="bestsellerno_activity_{{$activities->activity_id}}" disabled="disabled">Active</button>
															@else
															<button type="button" class="btn btn-sm btn-rounded best_seller_yes btn-default" id="bestselleryes_activity_{{$activities->activity_id}}" disabled="disabled">InActive</button>
															@endif
														</td>
														@endif

														
														@endif

														@if($rights['edit_delete']==1 || $rights['view']==1)

													<td>

														@if(strpos($rights['admin_which'],'view')!==false)
														<a href="{{route('activity-details',['activity_id'=>$activities->activity_id])}}"><i class="fa fa-eye"></i></a>
														@elseif($activities->activity_created_by!=Session::get('travel_users_id') &&  strpos($rights['admin_which'],'view')!==false)
														<a href="{{route('activity-details',['activity_id'=>$activities->activity_id])}}"><i class="fa fa-eye"></i></a>
														@elseif($activities->activity_created_by==Session::get('travel_users_id') && $activities->activity_role!="Supplier" && $rights['view']==1)
														<a href="{{route('activity-details',['activity_id'=>$activities->activity_id])}}"><i class="fa fa-eye"></i></a>
														@endif

														@if(strpos($rights['admin_which'],'edit_delete')!==false)
															<a href="{{route('edit-activity',['activity_id'=>$activities->activity_id])}}"><i class="fa fa-pencil"></i></a>
														@elseif($activities->activity_created_by!=Session::get('travel_users_id') &&  strpos($rights['admin_which'],'edit_delete')!==false)
															<a href="{{route('edit-activity',['activity_id'=>$activities->activity_id])}}"><i class="fa fa-pencil"></i></a>
														@elseif($activities->activity_created_by==Session::get('travel_users_id') && $activities->activity_role!="Supplier" && $rights['edit_delete']==1)
															<a href="{{route('edit-activity',['activity_id'=>$activities->activity_id])}}"><i class="fa fa-pencil"></i></a>
														@endif

													

													</td>
													@endif

												</tr>
												@php  $srno++; @endphp

												@endforeach

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
						<div id="navpills-3" class="tab-pane show">
							<div class="row">
								@if($rights['add']==1)

								<div class="col-sm-6 col-md-3">
									<div class="form-group">

										<a href="{{route('create-transport')}}"><button type="button"
												class="btn btn-rounded btn-success">Create New Transport</button></a>
									</div>
								</div>
								@endif
								@if($rights['view']==1)	
								<div class="col-12">
									<div class="box">

										<!-- /.box-header -->
										<div class="box-body">
											<div class="table-responsive">
												<table id="" class="table table-bordered table-striped datatable">
													<thead>
														<tr>
															<th>ID</th>
															<th>Transport Name</th>
															<th>Supplier Name</th>
															<th>Description</th>
															<th>City</th>
															<th>Country</th>
															@if($rights['edit_delete']==1)
															<th>Status</th>
															<th>Approval</th>
															@endif
															@if($rights['edit_delete']==1 || $rights['view']==1)
															<th>Action</th>
															@endif

														</tr>
													</thead>
													<tbody>
														@foreach($get_transport as $transport)

												<tr id="tr_{{$transport->transport_id}}">

													<td>{{$transport->transport_id}}</td>

													<td>{{$transport->transfer_name}}</td>

													<td>@foreach($get_suppliers as $suppliers)
															@if($suppliers->supplier_id==$transport->supplier_id)
													{{$suppliers->supplier_name}}
															@endif

														@endforeach</td>

													<td>{{$transport->transfer_description}}</td>

													<td>
														<?php
														$fetch_city=ServiceManagement::searchCities($transport->transfer_city,$transport->transfer_country);

														echo $fetch_city['name'];
														?>
													</td>

													<td>
														@foreach($countries as $country)
															@if($country->country_id==$transport->transfer_country)
													{{$country->country_name}}
															@endif

														@endforeach
														</td>

														@if($rights['edit_delete']==1)
														@if(strpos($rights['admin_which'],'edit_delete')!==false)
															<td>
															@if($transport->transfer_status==1)
															<button type="button" class="btn btn-sm btn-rounded inactive btn-primary" id="inactive_transport_{{$transport->transport_id}}">Active</button>
															@else
															<button type="button" class="btn btn-sm btn-rounded active btn-default" id="active_transport_{{$transport->transport_id}}">InActive</button>
															@endif
														</td>
														
														<td style="white-space: nowrap;">
															@if($transport->transport_approve_status==1)
															<button type="button" class="btn btn-sm btn-rounded btn-primary" disabled="disabled">Approved</button>
															@elseif($transport->transport_approve_status==0)
															<button type="button" class="btn btn-sm btn-rounded approve btn-primary" id="approve_transport_{{$transport->transport_id}}">Approve</button>
															<button type="button" class="btn btn-sm btn-rounded reject btn-danger" id="reject_transport_{{$transport->transport_id}}">Reject</button>
															@elseif($transport->transport_approve_status==2)
															<button type="button" class="btn btn-sm btn-rounded btn-danger" disabled="disabled">Rejected</button>
															@endif
														</td>
														@elseif($activities->transfer_created_by!=Session::get('travel_users_id') &&  strpos($rights['admin_which'],'edit_delete')!==false)
															<td>
															@if($transport->transfer_status==1)
															<button type="button" class="btn btn-sm btn-rounded inactive btn-primary" id="inactive_transport_{{$transport->transport_id}}">Active</button>
															@else
															<button type="button" class="btn btn-sm btn-rounded active btn-default" id="active_transport_{{$transport->transport_id}}">InActive</button>
															@endif
														</td>
														
														<td style="white-space: nowrap;">
															@if($transport->transport_approve_status==1)
															<button type="button" class="btn btn-sm btn-rounded btn-primary" disabled="disabled">Approved</button>
															@elseif($transport->transport_approve_status==0)
															<button type="button" class="btn btn-sm btn-rounded approve btn-primary" id="approve_transport_{{$transport->transport_id}}">Approve</button>
															<button type="button" class="btn btn-sm btn-rounded reject btn-danger" id="reject_transport_{{$transport->transport_id}}">Reject</button>
															@elseif($transport->transport_approve_status==2)
															<button type="button" class="btn btn-sm btn-rounded btn-danger" disabled="disabled">Rejected</button>
															@endif
														</td>
														@elseif($activities->transfer_created_by==Session::get('travel_users_id') && $activities->transfer_create_role!="Supplier" && $rights['edit_delete']==1)
														<td>
															@if($transport->transfer_status==1)
															<button type="button" class="btn btn-sm btn-rounded inactive btn-primary" id="inactive_transport_{{$transport->transport_id}}">Active</button>
															@else
															<button type="button" class="btn btn-sm btn-rounded active btn-default" id="active_transport_{{$transport->transport_id}}">InActive</button>
															@endif
														</td>
														
														<td style="white-space: nowrap;">
															@if($transport->transport_approve_status==1)
															<button type="button" class="btn btn-sm btn-rounded btn-primary" disabled="disabled">Approved</button>
															@elseif($transport->transport_approve_status==0)
															<button type="button" class="btn btn-sm btn-rounded approve btn-primary" id="approve_transport_{{$transport->transport_id}}">Approve</button>
															<button type="button" class="btn btn-sm btn-rounded reject btn-danger" id="reject_transport_{{$transport->transport_id}}">Reject</button>
															@elseif($transport->transport_approve_status==2)
															<button type="button" class="btn btn-sm btn-rounded btn-danger" disabled="disabled">Rejected</button>
															@endif
														</td>
														@else
														<td>
															@if($transport->transfer_status==1)
															<button type="button" class="btn btn-sm btn-rounded inactive btn-primary" id="inactive_transport_{{$transport->transport_id}}" disabled="disabled">Active</button>
															@else
															<button type="button" class="btn btn-sm btn-rounded active btn-default" id="active_transport_{{$transport->transport_id}}" disabled="disabled">InActive</button>
															@endif
														</td>
														
														<td style="white-space: nowrap;">
															@if($transport->transport_approve_status==1)
															<button type="button" class="btn btn-sm btn-rounded btn-primary" disabled="disabled">Approved</button>
															@elseif($transport->transport_approve_status==0)
															<button type="button" class="btn btn-sm btn-rounded approve btn-primary" id="approve_transport_{{$transport->transport_id}}" disabled="disabled">Approve</button>
															<button type="button" class="btn btn-sm btn-rounded reject btn-danger" id="reject_transport_{{$transport->transport_id}}" disabled="disabled">Reject</button>
															@elseif($transport->transport_approve_status==2)
															<button type="button" class="btn btn-sm btn-rounded btn-danger" disabled="disabled">Rejected</button>
															@endif
														</td>
														@endif

														
														@endif

														@if($rights['edit_delete']==1 || $rights['view']==1)

													<td>
														@if(strpos($rights['admin_which'],'view')!==false)
															<a href="{{route('transport-details',['transport_id'=>$transport->transport_id])}}"><i class="fa fa-eye"></i></a>
														@elseif($activities->transfer_created_by!=Session::get('travel_users_id') &&  strpos($rights['admin_which'],'view')!==false)
															<a href="{{route('transport-details',['transport_id'=>$transport->transport_id])}}"><i class="fa fa-eye"></i></a>
														@elseif($activities->transfer_created_by==Session::get('travel_users_id') && $activities->transfer_create_role!="Supplier" && $rights['view']==1)
															<a href="{{route('transport-details',['transport_id'=>$transport->transport_id])}}"><i class="fa fa-eye"></i></a>
														@endif

														@if(strpos($rights['admin_which'],'edit_delete')!==false)
															<a href="{{route('edit-transport',['transport_id'=>$transport->transport_id])}}"><i class="fa fa-pencil"></i></a>
														@elseif($activities->transfer_created_by!=Session::get('travel_users_id') &&  strpos($rights['admin_which'],'edit_delete')!==false)
															<a href="{{route('edit-transport',['transport_id'=>$transport->transport_id])}}"><i class="fa fa-pencil"></i></a>
														@elseif($activities->transfer_created_by==Session::get('travel_users_id') && $activities->transfer_create_role!="Supplier" && $rights['edit_delete']==1)
														<a href="{{route('edit-transport',['transport_id'=>$transport->transport_id])}}"><i class="fa fa-pencil"></i></a>
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
								</div>
								@endif


							</div>
						</div>
						<div id="navpills-4" class="tab-pane show">
							<div class="row">


								<!-- <div class="col-sm-6 col-md-5">
									<div class="input-group my-colorpicker2">

										<input type="text" class="form-control" placeholder="Search...">

										<div class="input-group-addon">
											<i class="fa fa-search"></i>
										</div>
									</div>
								</div>

								<div class="col-sm-6 col-md-4">
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
								</div> -->
								@if($rights['add']==1)

								<div class="col-sm-6 col-md-3">
									<div class="form-group">

										<a href="{{route('admin-create-guide')}}"><button type="button"
												class="btn btn-rounded btn-success">Create New Guide</button></a>
									</div>
								</div>
								@endif
								@if($rights['view']==1)	
								<div class="col-12">

							<div class="box">



								<!-- /.box-header -->

								<div class="box-body" style="padding:0">

									<div class="table-responsive">

                                        <div class="row">

                                        <table id="guide_table" class="table table-bordered table-striped">

											<thead>

												<tr>
													<th>S. No.</th>
													<th style="display:none">Guide ID</th>

													<th>Name</th>

													<th>Contact</th>

													<th>Address</th>

													<th>Supplier</th>

													<th>City</th>

													<th>Country</th>
												
													@if($rights['edit_delete']==1)
													<th>Status</th>
													<th>Approval</th>
													<th>Best Seller</th>
													@endif
													@if($rights['edit_delete']==1 || $rights['view']==1)
													<th>Action</th>
													@endif

												</tr>

											</thead>

											<tbody>
												@php $srno=1; @endphp
												@foreach($get_guides as $guide)

												<tr id="tr_{{$guide->guide_id}}">

													<td style="cursor: all-scroll;">{{$srno}}</td>
													<td style="display:none">{{$guide->guide_id}}</td>

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
														@if(strpos($rights['admin_which'],'edit_delete')!==false)
														
														<td>
															@if($guide->guide_status==1)
															<button type="button" class="btn btn-sm btn-rounded inactive btn-primary" id="inactive_guide_{{$guide->guide_id}}">Active</button>
															@else
															<button type="button" class="btn btn-sm btn-rounded active btn-default" id="active_guide_{{$guide->guide_id}}">InActive</button>
															@endif
														</td>
														<td style="white-space: nowrap;">
															@if($guide->guide_approve_status==1)
															<button type="button" class="btn btn-sm btn-rounded btn-primary" disabled="disabled">Approved</button>
															@elseif($guide->guide_approve_status==0)
															<button type="button" class="btn btn-sm btn-rounded approve btn-primary" id="approve_guide_{{$guide->guide_id}}">Approve</button>
															<button type="button" class="btn btn-sm btn-rounded reject btn-danger" id="reject_guide_{{$guide->guide_id}}">Reject</button>
															@elseif($guide->guide_approve_status==2)
															<button type="button" class="btn btn-sm btn-rounded btn-danger" disabled="disabled">Rejected</button>
															@endif
														</td>
														<td>
															
															@if($guide->guide_best_status==1)
															<button type="button" class="btn btn-sm btn-rounded best_seller_no btn-primary" id="bestsellerno_guide_{{$guide->guide_id}}" >Active</button>
															@else
															<button type="button" class="btn btn-sm btn-rounded best_seller_yes btn-default" id="bestselleryes_guide_{{$guide->guide_id}}" >InActive</button>
															@endif
														</td>
														@elseif($guide->guide_created_by!=Session::get('travel_users_id') &&  strpos($rights['admin_which'],'edit_delete')!==false)
														
														<td>
															@if($guide->guide_status==1)
															<button type="button" class="btn btn-sm btn-rounded inactive btn-primary" id="inactive_guide_{{$guide->guide_id}}">Active</button>
															@else
															<button type="button" class="btn btn-sm btn-rounded active btn-default" id="active_guide_{{$guide->guide_id}}">InActive</button>
															@endif
														</td>
														<td style="white-space: nowrap;">
															@if($guide->guide_approve_status==1)
															<button type="button" class="btn btn-sm btn-rounded btn-primary" disabled="disabled">Approved</button>
															@elseif($guide->guide_approve_status==0)
															<button type="button" class="btn btn-sm btn-rounded approve btn-primary" id="approve_guide_{{$guide->guide_id}}">Approve</button>
															<button type="button" class="btn btn-sm btn-rounded reject btn-danger" id="reject_guide_{{$guide->guide_id}}">Reject</button>
															@elseif($guide->guide_approve_status==2)
															<button type="button" class="btn btn-sm btn-rounded btn-danger" disabled="disabled">Rejected</button>
															@endif
														</td>
														<td>
															
															@if($guide->guide_best_status==1)
															<button type="button" class="btn btn-sm btn-rounded best_seller_no btn-primary" id="bestsellerno_guide_{{$guide->guide_id}}" >Active</button>
															@else
															<button type="button" class="btn btn-sm btn-rounded best_seller_yes btn-default" id="bestselleryes_guide_{{$guide->guide_id}}" >InActive</button>
															@endif
														</td>
														@elseif($guide->guide_created_by==Session::get('travel_users_id') && $guide->guide_role!="Supplier" && $rights['edit_delete']==1)
														
														<td>
															@if($guide->guide_status==1)
															<button type="button" class="btn btn-sm btn-rounded inactive btn-primary" id="inactive_guide_{{$guide->guide_id}}">Active</button>
															@else
															<button type="button" class="btn btn-sm btn-rounded active btn-default" id="active_guide_{{$guide->guide_id}}">InActive</button>
															@endif
														</td>
													<td style="white-space: nowrap;">
															@if($guide->guide_approve_status==1)
															<button type="button" class="btn btn-sm btn-rounded btn-primary" disabled="disabled">Approved</button>
															@elseif($guide->guide_approve_status==0)
															<button type="button" class="btn btn-sm btn-rounded approve btn-primary" id="approve_guide_{{$guide->guide_id}}">Approve</button>
															<button type="button" class="btn btn-sm btn-rounded reject btn-danger" id="reject_guide_{{$guide->guide_id}}">Reject</button>
															@elseif($guide->guide_approve_status==2)
															<button type="button" class="btn btn-sm btn-rounded btn-danger" disabled="disabled">Rejected</button>
															@endif
														</td>
														<td>
															
															@if($guide->guide_best_status==1)
															<button type="button" class="btn btn-sm btn-rounded best_seller_no btn-primary" id="bestsellerno_guide_{{$guide->guide_id}}" >Active</button>
															@else
															<button type="button" class="btn btn-sm btn-rounded best_seller_yes btn-default" id="bestselleryes_guide_{{$guide->guide_id}}" >InActive</button>
															@endif
														</td>
														@else

														<td>
															@if($guide->guide_status==1)
															<button type="button" class="btn btn-sm btn-rounded inactive btn-primary" id="inactive_guide_{{$guide->guide_id}}" disabled="disabled">Active</button>
															@else
															<button type="button" class="btn btn-sm btn-rounded active btn-default" id="active_guide_{{$guide->guide_id}}" disabled="disabled">InActive</button>
															@endif
														</td>
														<td style="white-space: nowrap;">
															@if($guide->guide_approve_status==1)
															<button type="button" class="btn btn-sm btn-rounded btn-primary" disabled="disabled">Approved</button>
															@elseif($guide->guide_approve_status==0)
															<button type="button" class="btn btn-sm btn-rounded approve btn-primary" id="approve_guide_{{$guide->guide_id}}" disabled="disabled">Approve</button>
															<button type="button" class="btn btn-sm btn-rounded reject btn-danger" id="reject_guide_{{$guide->guide_id}}" disabled="disabled">Reject</button>
															@elseif($guide->guide_approve_status==2)
															<button type="button" class="btn btn-sm btn-rounded btn-danger" disabled="disabled">Rejected</button>
															@endif
														</td>
														<td>
															
															@if($guide->guide_best_status==1)
															<button type="button" class="btn btn-sm btn-rounded best_seller_no btn-primary" id="bestsellerno_guide_{{$guide->guide_id}}" disabled="disabled">Active</button>
															@else
															<button type="button" class="btn btn-sm btn-rounded best_seller_yes btn-default" id="bestselleryes_guide_{{$guide->guide_id}}" disabled="disabled">InActive</button>
															@endif
														</td>
															@endif
											
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
												@php
														$srno++;
														@endphp

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

						<div id="navpills-5" class="tab-pane show">
							<div class="row">


								<!-- <div class="col-sm-6 col-md-5">
									<div class="input-group my-colorpicker2">

										<input type="text" class="form-control" placeholder="Search...">

										<div class="input-group-addon">
											<i class="fa fa-search"></i>
										</div>
									</div>
								</div>

								<div class="col-sm-6 col-md-4">
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
								</div> -->
								@if($rights['add']==1)

								<div class="col-sm-6 col-md-3">
									<div class="form-group">

										<a href="{{route('create-sightseeing')}}"><button type="button"
												class="btn btn-rounded btn-success">Create New SightSeeing</button></a>
									</div>
								</div>
								@endif
								@if($rights['view']==1)	
								<div class="col-12">
									<div class="box">

										<!-- /.box-header -->
										<div class="box-body">
											<div class="table-responsive">
												<table id="sightseeing_table" class="table table-bordered table-striped">
													<thead>
														<tr>
															<th>S. No.</th>
															<th style="display:none">Sightseeing ID</th>
															<th>Tour Name</th>
															<th>Description</th>
															<th>From City</th>
															<th>In Between Cities</th>
															<th>To City</th>
															<th>Country</th>
															@if($rights['edit_delete']==1)
															<th>Status</th>
															<th>Best Seller</th>
															@endif
															@if($rights['edit_delete']==1 || $rights['view']==1)
															<th>Action</th>
															@endif

														</tr>
													</thead>
													<tbody>
														@php
														$srno=1;
														@endphp
														@foreach($get_sightseeing as $sightseeing)

												<tr id="tr_{{$sightseeing->sightseeing_id}}">

													<td style="cursor: all-scroll;">{{$srno}}</td>
													<td style="display:none">{{$sightseeing->sightseeing_id}}</td>

													<td>{{$sightseeing->sightseeing_tour_name}}</td>

													<td><?php echo $sightseeing->sightseeing_tour_desc;
														?></td>
													
													<td>
														<?php
														$fetch_city=ServiceManagement::searchCities($sightseeing->sightseeing_city_from,$sightseeing->sightseeing_country);

														echo $fetch_city['name'];
														?>
													</td>

													<td>
														@if($sightseeing->sightseeing_city_between!="")
														
														<?php
														$all_between_cities=explode(",",$sightseeing->sightseeing_city_between);
														for($cities=0;$cities< count($all_between_cities);$cities++)
														{
																$fetch_city=ServiceManagement::searchCities($all_between_cities[$cities],$sightseeing->sightseeing_country);
														echo $fetch_city['name'];

														if($cities<count($all_between_cities)-1)
														{
															echo " ,";
														}

														}

													
														?>
														@else
															NA
														@endif
													</td>

													<td>
														<?php
														$fetch_city=ServiceManagement::searchCities($sightseeing->sightseeing_city_to,$sightseeing->sightseeing_country);

														echo $fetch_city['name'];
														?>
													</td>


													<td>
														@foreach($countries as $country)
															@if($country->country_id==$sightseeing->sightseeing_country)
													{{$country->country_name}}
															@endif

														@endforeach
														</td>

														@if($rights['edit_delete']==1)
														@if(strpos($rights['admin_which'],'edit_delete')!==false)
															<td>
															@if($sightseeing->sightseeing_status==1)
															<button type="button" class="btn btn-sm btn-rounded inactive btn-primary" id="inactive_sightseeing_{{$sightseeing->sightseeing_id}}">Active</button>
															@else
															<button type="button" class="btn btn-sm btn-rounded active btn-default" id="active_sightseeing_{{$sightseeing->sightseeing_id}}">InActive</button>
															@endif
														</td>

														<td>
															@if($sightseeing->sightseeing_best_status==1)
															<button type="button" class="btn btn-sm btn-rounded best_seller_no btn-primary" id="bestsellerno_sightseeing_{{$sightseeing->sightseeing_id}}">Active</button>
															@else
															<button type="button" class="btn btn-sm btn-rounded best_seller_yes btn-default" id="bestselleryes_sightseeing_{{$sightseeing->sightseeing_id}}">InActive</button>
															@endif
														</td>
														
													
														@elseif($activities->transfer_created_by!=Session::get('travel_users_id') &&  strpos($rights['admin_which'],'edit_delete')!==false)
															<td>
															@if($sightseeing->sightseeing_status==1)
															<button type="button" class="btn btn-sm btn-rounded inactive btn-primary" id="inactive_sightseeing_{{$sightseeing->sightseeing_id}}">Active</button>
															@else
															<button type="button" class="btn btn-sm btn-rounded active btn-default" id="active_sightseeing_{{$sightseeing->sightseeing_id}}">InActive</button>
															@endif
														</td>
														<td>
															@if($sightseeing->sightseeing_best_status==1)
															<button type="button" class="btn btn-sm btn-rounded best_seller_no btn-primary" id="bestsellerno_sightseeing_{{$sightseeing->sightseeing_id}}">Active</button>
															@else
															<button type="button" class="btn btn-sm btn-rounded best_seller_yes btn-default" id="bestselleryes_sightseeing_{{$sightseeing->sightseeing_id}}">InActive</button>
															@endif
														</td>
														
														@elseif($activities->transfer_created_by==Session::get('travel_users_id') && $activities->transfer_create_role!="Supplier" && $rights['edit_delete']==1)
														<td>
															@if($sightseeing->sightseeing_status==1)
															<button type="button" class="btn btn-sm btn-rounded inactive btn-primary" id="inactive_sightseeing_{{$sightseeing->sightseeing_id}}">Active</button>
															@else
															<button type="button" class="btn btn-sm btn-rounded active btn-default" id="active_sightseeing_{{$sightseeing->sightseeing_id}}">InActive</button>
															@endif
														</td>
														<td>
															@if($sightseeing->sightseeing_best_status==1)
															<button type="button" class="btn btn-sm btn-rounded best_seller_no btn-primary" id="bestsellerno_sightseeing_{{$sightseeing->sightseeing_id}}">Active</button>
															@else
															<button type="button" class="btn btn-sm btn-rounded best_seller_yes btn-default" id="bestselleryes_sightseeing_{{$sightseeing->sightseeing_id}}">InActive</button>
															@endif
														</td>
														
														
														@else
														<td>
															@if($sightseeing->sightseeing_status==1)
															<button type="button" class="btn btn-sm btn-rounded inactive btn-primary" id="inactive_sightseeing_{{$sightseeing->sightseeing_id}}" disabled="disabled">Active</button>
															@else
															<button type="button" class="btn btn-sm btn-rounded active btn-default" id="active_sightseeing_{{$sightseeing->sightseeing_id}}" disabled="disabled">InActive</button>
															@endif
														</td>

														<td>
															@if($sightseeing->sightseeing_best_status==1)
															<button type="button" class="btn btn-sm btn-rounded best_seller_no btn-primary" id="bestsellerno_sightseeing_{{$sightseeing->sightseeing_id}}" disabled="disabled">Active</button>
															@else
															<button type="button" class="btn btn-sm btn-rounded best_seller_yes btn-default" id="bestselleryes_sightseeing_{{$sightseeing->sightseeing_id}}" disabled="disabled">InActive</button>
															@endif
														</td>
														
														
														@endif

														
														@endif

														@if($rights['edit_delete']==1 || $rights['view']==1)

													<td>
														@if(strpos($rights['admin_which'],'view')!==false)
															<a href="{{route('sightseeing-details',['sightseeing_id'=>$sightseeing->sightseeing_id])}}"><i class="fa fa-eye"></i></a>
														@elseif($sightseeing->sightseeing_created_by!=Session::get('travel_users_id') &&  strpos($rights['admin_which'],'view')!==false)
															<a href="{{route('sightseeing-details',['sightseeing_id'=>$sightseeing->sightseeing_id])}}"><i class="fa fa-eye"></i></a>
														@elseif($sightseeing->sightseeing_created_by==Session::get('travel_users_id') && $sightseeing->sightseeing_create_role!="Supplier" && $rights['view']==1)
															<a href="{{route('sightseeing-details',['sightseeing_id'=>$sightseeing->sightseeing_id])}}"><i class="fa fa-eye"></i></a>
														@endif

														@if(strpos($rights['admin_which'],'edit_delete')!==false)
															<a href="{{route('edit-sightseeing',['sightseeing_id'=>$sightseeing->sightseeing_id])}}"><i class="fa fa-pencil"></i></a>
														@elseif($sightseeing->sightseeing_created_by!=Session::get('travel_users_id') &&  strpos($rights['admin_which'],'edit_delete')!==false)
															<a href="{{route('edit-sightseeing',['sightseeing_id'=>$sightseeing->sightseeing_id])}}"><i class="fa fa-pencil"></i></a>
														@elseif($sightseeing->sightseeing_created_by==Session::get('travel_users_id') && $sightseeing->sightseeing_create_role!="Supplier" && $rights['edit_delete']==1)
														<a href="{{route('edit-sightseeing',['sightseeing_id'=>$sightseeing->sightseeing_id])}}"><i class="fa fa-pencil"></i></a>
														@endif


													</td>
													@endif

												</tr>
												@php $srno++; @endphp
												@endforeach
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
	$(".datatable").DataTable();


	var table = $('#activity_table').DataTable({
        rowReorder: true,
         "lengthMenu": [[25, 50, 100,150,200,250,500,-1], [25, 50, 100,150,200,250,500,"All"]]
    });
 
    table.on( 'row-reorder', function ( e, diff, edit ) {
        var result = 'Reorder started on row: '+edit.triggerRow.data()[1]+'<br>';
 		var new_data=[];
        for ( var i=0, ien=diff.length ; i<ien ; i++ ) {
            var rowData = table.row( diff[i].node ).data();
 			new_data.push({activity_id:rowData[1],new_order:diff[i].newData});
           
        }

        // console.log(new_data);
        if(new_data.length>0)
        {
          $.ajax({
        	url:"{{route('sort-activity')}}",
        	type:"POST",
        	data:{"_token":"{{csrf_token()}}",
        	"new_data":new_data},
        	success:function(response)
        	{
        		console.log(response);
        	}
        });	
        }
      
        
   
    });

    var table_hotel = $('#hotel_table').DataTable({
        rowReorder: true,
         "lengthMenu": [[25, 50, 100,150,200,250,500,-1], [25, 50, 100,150,200,250,500,"All"]]
    });
 
    table_hotel.on( 'row-reorder', function ( e, diff1, edit1 ) {
        var result = 'Reorder started on row: '+edit1.triggerRow.data()[1]+'<br>';
 		var new_data=[];
        for ( var i=0, ien=diff1.length ; i<ien ; i++ ) {
            var rowData = table_hotel.row( diff1[i].node ).data();
 			new_data.push({hotel_id:rowData[1],new_order:diff1[i].newData});
        }

  // console.log(new_data);
        if(new_data.length>0)
        {
          $.ajax({
        	url:"{{route('sort-hotel')}}",
        	type:"POST",
        	data:{"_token":"{{csrf_token()}}",
        	"new_data":new_data},
        	success:function(response)
        	{
        		console.log(response);
        	}
        });	
        }
      
        
   
    });

     var table_sightseeing = $('#sightseeing_table').DataTable({
        rowReorder: true,
         "lengthMenu": [[25, 50, 100,150,200,250,500,-1], [25, 50, 100,150,200,250,500,"All"]]
    });
 
    table_sightseeing.on( 'row-reorder', function ( e, diff1, edit1 ) {
        var result = 'Reorder started on row: '+edit1.triggerRow.data()[1]+'<br>';
 		var new_data=[];
        for ( var i=0, ien=diff1.length ; i<ien ; i++ ) {
            var rowData = table_sightseeing.row( diff1[i].node ).data();
 			new_data.push({sightseeing_id:rowData[1],new_order:diff1[i].newData});
        }

  		// console.log(new_data);
        if(new_data.length>0)
        {
          $.ajax({
        	url:"{{route('sort-sightseeing')}}",
        	type:"POST",
        	data:{"_token":"{{csrf_token()}}",
        	"new_data":new_data},
        	success:function(response)
        	{
        		console.log(response);
        	}
        });	
        }

    });

     var table_guide = $('#guide_table').DataTable({
        rowReorder: true,
         "lengthMenu": [[25, 50, 100,150,200,250,500,-1], [25, 50, 100,150,200,250,500,"All"]]
    });
 
    table_guide.on( 'row-reorder', function ( e, diff1, edit1 ) {
        var result = 'Reorder started on row: '+edit1.triggerRow.data()[1]+'<br>';
 		var new_data=[];
        for ( var i=0, ien=diff1.length ; i<ien ; i++ ) {
            var rowData = table_guide.row( diff1[i].node ).data();
 			new_data.push({guide_id:rowData[1],new_order:diff1[i].newData});
        }

  		// console.log(new_data);
        if(new_data.length>0)
        {
          $.ajax({
        	url:"{{route('sort-guide')}}",
        	type:"POST",
        	data:{"_token":"{{csrf_token()}}",
        	"new_data":new_data},
        	success:function(response)
        	{
        		console.log(response);
        	}
        });	
        }

    });

	$(document).on("click",'.approve',function()
	{
		var id=this.id;
		var actual_id=id.split("_");

		var action_name=actual_id[1];
		var action_perform=actual_id[0];
		var action_id=actual_id[2];

		if(action_name=="hotel")
		{

			swal({
				title: "Are you sure?",
				text: "You want to approve this hotel !",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes, Approve",
				cancelButtonText: "No, cancel!",
				closeOnConfirm: false,
				closeOnCancel: false
			}, function(isConfirm) {
				if (isConfirm) {

					$.ajax({
						url:"{{route('update-hotel-approval')}}",
						type:"POST",
						data:{"_token":"{{csrf_token()}}",
						"action_perform":action_perform,
						"hotel_id":action_id},
						success:function(response)
						{
							if(response.indexOf("success")!=-1)
							{
								$("#"+id).parent().html('<button type="button" class="btn btn-sm btn-rounded btn-primary" disabled="disabled">Approved</button>');

								swal("Approved!", "Selected Hotel has been approved.", "success");
							}
							else
							{
								swal("Error", "Unable to perform this operation", "error");

							}
						}
					});

					
				} else {
					swal("Cancelled", "Operation Cancelled", "error");
				}
			});

		}
		else if(action_name=="activity")
		{
			swal({
				title: "Are you sure?",
				text: "You want to approve this activity !",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes, Approve",
				cancelButtonText: "No, cancel!",
				closeOnConfirm: false,
				closeOnCancel: false
			}, function(isConfirm) {
				if (isConfirm) {


					$.ajax({
						url:"{{route('update-activity-approval')}}",
						type:"POST",
						data:{"_token":"{{csrf_token()}}",
						"action_perform":action_perform,
						"activity_id":action_id},
						success:function(response)
						{
							if(response.indexOf("success")!=-1)
							{
								$("#"+id).parent().html('<button type="button" class="btn btn-sm btn-rounded btn-primary" disabled="disabled">Approved</button>');

								swal("Approved!", "Selected Activity has been approved.", "success");
							}
							else
							{
								swal("Error", "Unable to perform this operation", "error");

							}
							
						}
					});

					
				} else {
					swal("Cancelled", "Operation Cancelled", "error");
				}
			});

		}
		else if(action_name=="transport")
		{
			swal({
				title: "Are you sure?",
				text: "You want to approve this transport !",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes, Approve",
				cancelButtonText: "No, cancel!",
				closeOnConfirm: false,
				closeOnCancel: false
			}, function(isConfirm) {
				if (isConfirm) {

					$.ajax({
						url:"{{route('update-transport-approval')}}",
						type:"POST",
						data:{"_token":"{{csrf_token()}}",
						"action_perform":action_perform,
						"transport_id":action_id},
						success:function(response)
						{
							if(response.indexOf("success")!=-1)
							{
								$("#"+id).parent().html('<button type="button" class="btn btn-sm btn-rounded btn-primary" disabled="disabled">Approved</button>');

								swal("Approved!", "Selected Transport has been approved.", "success");
							}
							else
							{
								swal("Error", "Unable to perform this operation", "error");

							}
							
						}
					});

					
				} else {
					swal("Cancelled", "Operation Cancelled", "error");
				}
			});

		}
		else if(action_name=="guide")
		{
			swal({
				title: "Are you sure?",
				text: "You want to approve this guide !",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes, Approve",
				cancelButtonText: "No, cancel!",
				closeOnConfirm: false,
				closeOnCancel: false
			}, function(isConfirm) {
				if (isConfirm) {

					$.ajax({
						url:"{{route('admin-update-guide-approval')}}",
						type:"POST",
						data:{"_token":"{{csrf_token()}}",
						"action_perform":action_perform,
						"guide_id":action_id},
						success:function(response)
						{
							if(response.indexOf("success")!=-1)
							{
								$("#"+id).parent().html('<button type="button" class="btn btn-sm btn-rounded btn-primary" disabled="disabled">Approved</button>');

								swal("Approved!", "Selected Guide has been approved.", "success");
							}
							else
							{
								swal("Error", "Unable to perform this operation", "error");

							}
							
						}
					});

					
				} else {
					swal("Cancelled", "Operation Cancelled", "error");
				}
			});

		}
	});
	$(document).on("click",'.reject',function()
	{
		var id=this.id;
		var actual_id=id.split("_");

		var action_name=actual_id[1];
		var action_perform=actual_id[0];
		var action_id=actual_id[2];
		if(action_name=="hotel")
		{
			swal({
				title: "Are you sure?",
				text: "You want to reject this hotel !",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes, Reject",
				cancelButtonText: "No, cancel!",
				closeOnConfirm: false,
				closeOnCancel: false
			}, function(isConfirm) {
				if (isConfirm) {

					$.ajax({
						url:"{{route('update-hotel-approval')}}",
						type:"POST",
						data:{"_token":"{{csrf_token()}}",
						"action_perform":action_perform,
						"hotel_id":action_id},
						success:function(response)
						{
							if(response.indexOf("success")!=-1)
							{
								$("#"+id).parent().html('<button type="button" class="btn btn-sm btn-rounded btn-danger" disabled="disabled">Rejected</button>');

								swal("Rejected!", "Selected Hotel has been rejected.", "success");
							}
							else
							{
								swal("Error", "Unable to perform this operation", "error");

							}
						}
					});



				} else {
					swal("Cancelled", "Operation Cancelled", "error");
				}
			});


		}
		else if(action_name=="activity")
		{
			swal({
				title: "Are you sure?",
				text: "You want to reject this activity !",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes, Reject",
				cancelButtonText: "No, cancel!",
				closeOnConfirm: false,
				closeOnCancel: false
			}, function(isConfirm) {
				if (isConfirm) {

					$.ajax({
						url:"{{route('update-activity-approval')}}",
						type:"POST",
						data:{"_token":"{{csrf_token()}}",
						"action_perform":action_perform,
						"activity_id":action_id},
						success:function(response)
						{
							if(response.indexOf("success")!=-1)
							{
								$("#"+id).parent().html('<button type="button" class="btn btn-sm btn-rounded btn-danger" disabled="disabled">Rejected</button>');

								swal("Rejected!", "Selected Activity has been rejected.", "success");
							}
							else
							{
								swal("Error", "Unable to perform this operation", "error");

							}
						}
					});

					
				} else {
					swal("Cancelled", "Operation Cancelled", "error");
				}
			});


		}
		else if(action_name=="transport")
		{
			swal({
				title: "Are you sure?",
				text: "You want to reject this transport !",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes, Reject",
				cancelButtonText: "No, cancel!",
				closeOnConfirm: false,
				closeOnCancel: false
			}, function(isConfirm) {
				if (isConfirm) {

					$.ajax({
						url:"{{route('update-transport-approval')}}",
						type:"POST",
						data:{"_token":"{{csrf_token()}}",
						"action_perform":action_perform,
						"transport_id":action_id},
						success:function(response)
						{
							if(response.indexOf("success")!=-1)
							{
								$("#"+id).parent().html('<button type="button" class="btn btn-sm btn-rounded btn-danger" disabled="disabled">Rejected</button>');

								swal("Rejected!", "Selected Transport has been rejected.", "success");
							}
							else
							{
								swal("Error", "Unable to perform this operation", "error");

							}
						}
					});


					
				} else {
					swal("Cancelled", "Operation Cancelled", "error");
				}
			});
			
		}
		else if(action_name=="guide")
		{
			swal({
				title: "Are you sure?",
				text: "You want to reject this guide !",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes, Reject",
				cancelButtonText: "No, cancel!",
				closeOnConfirm: false,
				closeOnCancel: false
			}, function(isConfirm) {
				if (isConfirm) {

					$.ajax({
						url:"{{route('admin-update-guide-approval')}}",
						type:"POST",
						data:{"_token":"{{csrf_token()}}",
						"action_perform":action_perform,
						"guide_id":action_id},
						success:function(response)
						{
							if(response.indexOf("success")!=-1)
							{
								$("#"+id).parent().html('<button type="button" class="btn btn-sm btn-rounded btn-danger" disabled="disabled">Rejected</button>');

								swal("Rejected!", "Selected Guide has been rejected.", "success");
							}
							else
							{
								swal("Error", "Unable to perform this operation", "error");

							}
						}
					});


					
				} else {
					swal("Cancelled", "Operation Cancelled", "error");
				}
			});
			
		}
	});

	$(document).on("click",'.active',function()
	{
		var id=this.id;
		var actual_id=id.split("_");

		var action_name=actual_id[1];
		var action_perform=actual_id[0];
		var action_id=actual_id[2];

		if(action_name=="hotel")
		{

			swal({
				title: "Are you sure?",
				text: "You want to activate this hotel !",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes, Activate",
				cancelButtonText: "No, cancel!",
				closeOnConfirm: false,
				closeOnCancel: false
			}, function(isConfirm) {
				if (isConfirm) {

					$.ajax({
						url:"{{route('update-hotel-active')}}",
						type:"POST",
						data:{"_token":"{{csrf_token()}}",
						"action_perform":action_perform,
						"hotel_id":action_id},
						success:function(response)
						{
							if(response.indexOf("success")!=-1)
							{
								$("#"+id).parent().html('<button type="button" class="btn btn-sm btn-rounded btn-primary inactive" id="inactive_hotel_'+action_id+'">Active</button>');

								swal("Activated!", "Selected Hotel has been activated.", "success");
							}
							else
							{
								swal("Error", "Unable to perform this operation", "error");

							}
						}
					});

					
				} else {
					swal("Cancelled", "Operation Cancelled", "error");
				}
			});

		}
		else if(action_name=="activity")
		{
			swal({
				title: "Are you sure?",
				text: "You want to activate this activity !",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes, Activate",
				cancelButtonText: "No, cancel!",
				closeOnConfirm: false,
				closeOnCancel: false
			}, function(isConfirm) {
				if (isConfirm) {


					$.ajax({
						url:"{{route('update-activity-active')}}",
						type:"POST",
						data:{"_token":"{{csrf_token()}}",
						"action_perform":action_perform,
						"activity_id":action_id},
						success:function(response)
						{
							if(response.indexOf("success")!=-1)
							{
								$("#"+id).parent().html('<button type="button" class="btn btn-sm btn-rounded btn-primary inactive" id="inactive_activity_'+action_id+'">Active</button>');

								swal("Activated!", "Selected Activity has been activated.", "success");
							}
							else
							{
								swal("Error", "Unable to perform this operation", "error");

							}
							
						}
					});

					
				} else {
					swal("Cancelled", "Operation Cancelled", "error");
				}
			});

		}
		else if(action_name=="transport")
		{
			swal({
				title: "Are you sure?",
				text: "You want to activate this transport !",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes, Activate",
				cancelButtonText: "No, cancel!",
				closeOnConfirm: false,
				closeOnCancel: false
			}, function(isConfirm) {
				if (isConfirm) {

					$.ajax({
						url:"{{route('update-transport-active')}}",
						type:"POST",
						data:{"_token":"{{csrf_token()}}",
						"action_perform":action_perform,
						"transport_id":action_id},
						success:function(response)
						{
							if(response.indexOf("success")!=-1)
							{
								$("#"+id).parent().html('<button type="button" class="btn btn-sm btn-rounded btn-primary inactive" id="inactive_transport_'+action_id+'" >Active</button>');

								swal("Activated!", "Selected Transport has been activated.", "success");
							}
							else
							{
								swal("Error", "Unable to perform this operation", "error");

							}
							
						}
					});

					
				} else {
					swal("Cancelled", "Operation Cancelled", "error");
				}
			});

		}
		else if(action_name=="guide")
		{
			swal({
				title: "Are you sure?",
				text: "You want to activate this guide !",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes, Activate",
				cancelButtonText: "No, cancel!",
				closeOnConfirm: false,
				closeOnCancel: false
			}, function(isConfirm) {
				if (isConfirm) {

					$.ajax({
						url:"{{route('admin-update-guide-active')}}",
						type:"POST",
						data:{"_token":"{{csrf_token()}}",
						"action_perform":action_perform,
						"guide_id":action_id},
						success:function(response)
						{
							if(response.indexOf("success")!=-1)
							{
								$("#"+id).parent().html('<button type="button" class="btn btn-sm btn-rounded btn-primary inactive" id="inactive_guide_'+action_id+'" >Active</button>');

								swal("Activated!", "Selected Guide has been activated.", "success");
							}
							else
							{
								swal("Error", "Unable to perform this operation", "error");

							}
							
						}
					});

					
				} else {
					swal("Cancelled", "Operation Cancelled", "error");
				}
			});

		}
		else if(action_name=="sightseeing")
		{
			swal({
				title: "Are you sure?",
				text: "You want to activate this sightseeing !",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes, Activate",
				cancelButtonText: "No, cancel!",
				closeOnConfirm: false,
				closeOnCancel: false
			}, function(isConfirm) {
				if (isConfirm) {

					$.ajax({
						url:"{{route('update-sightseeing-active')}}",
						type:"POST",
						data:{"_token":"{{csrf_token()}}",
						"action_perform":action_perform,
						"sightseeing_id":action_id},
						success:function(response)
						{
							if(response.indexOf("success")!=-1)
							{
								$("#"+id).parent().html('<button type="button" class="btn btn-sm btn-rounded btn-primary inactive" id="inactive_sightseeing_'+action_id+'" >Active</button>');

								swal("Activated!", "Selected Sightseeing has been activated.", "success");
							}
							else
							{
								swal("Error", "Unable to perform this operation", "error");

							}
							
						}
					});

					
				} else {
					swal("Cancelled", "Operation Cancelled", "error");
				}
			});

		}

	});
	$(document).on("click",'.inactive',function()
	{
		var id=this.id;
		var actual_id=id.split("_");

		var action_name=actual_id[1];
		var action_perform=actual_id[0];
		var action_id=actual_id[2];
		if(action_name=="hotel")
		{
			swal({
				title: "Are you sure?",
				text: "You want to inactive this hotel !",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes, Inactivate",
				cancelButtonText: "No, cancel!",
				closeOnConfirm: false,
				closeOnCancel: false
			}, function(isConfirm) {
				if (isConfirm) {

					$.ajax({
						url:"{{route('update-hotel-active')}}",
						type:"POST",
						data:{"_token":"{{csrf_token()}}",
						"action_perform":action_perform,
						"hotel_id":action_id},
						success:function(response)
						{
							if(response.indexOf("success")!=-1)
							{
								$("#"+id).parent().html('<button type="button" class="btn btn-sm btn-rounded btn-default active" id="active_hotel_'+action_id+'">InActive</button>');

								swal("Inactivated!", "Selected Hotel has been inactivated.", "success");
							}
							else
							{
								swal("Error", "Unable to perform this operation", "error");

							}
						}
					});



				} else {
					swal("Cancelled", "Operation Cancelled", "error");
				}
			});


		}
		else if(action_name=="activity")
		{
			swal({
				title: "Are you sure?",
				text: "You want to inactivate this activity !",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes, Inactivate",
				cancelButtonText: "No, cancel!",
				closeOnConfirm: false,
				closeOnCancel: false
			}, function(isConfirm) {
				if (isConfirm) {

					$.ajax({
						url:"{{route('update-activity-active')}}",
						type:"POST",
						data:{"_token":"{{csrf_token()}}",
						"action_perform":action_perform,
						"activity_id":action_id},
						success:function(response)
						{
							if(response.indexOf("success")!=-1)
							{
								$("#"+id).parent().html('<button type="button" class="btn btn-sm btn-rounded btn-default active" id="active_activity_'+action_id+'">InActive</button>');

								swal("Inactivated!", "Selected Activity has been inactivated.", "success");
							}
							else
							{
								swal("Error", "Unable to perform this operation", "error");

							}
						}
					});

					
				} else {
					swal("Cancelled", "Operation Cancelled", "error");
				}
			});


		}
		else if(action_name=="transport")
		{
			swal({
				title: "Are you sure?",
				text: "You want to inactivate this transport !",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes, Inactivate",
				cancelButtonText: "No, cancel!",
				closeOnConfirm: false,
				closeOnCancel: false
			}, function(isConfirm) {
				if (isConfirm) {

					$.ajax({
						url:"{{route('update-transport-active')}}",
						type:"POST",
						data:{"_token":"{{csrf_token()}}",
						"action_perform":action_perform,
						"transport_id":action_id},
						success:function(response)
						{
							if(response.indexOf("success")!=-1)
							{
								$("#"+id).parent().html('<button type="button" class="btn btn-sm btn-rounded btn-default active" id="active_transport_'+action_id+'">InActive</button>');

								swal("Inactivated!", "Selected Transport has been inactivated.", "success");
							}
							else
							{
								swal("Error", "Unable to perform this operation", "error");

							}
						}
					});


					
				} else {
					swal("Cancelled", "Operation Cancelled", "error");
				}
			});
			
		}
		else if(action_name=="guide")
		{
			swal({
				title: "Are you sure?",
				text: "You want to inactivate this guide !",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes, Inactivate",
				cancelButtonText: "No, cancel!",
				closeOnConfirm: false,
				closeOnCancel: false
			}, function(isConfirm) {
				if (isConfirm) {

					$.ajax({
						url:"{{route('admin-update-guide-active')}}",
						type:"POST",
						data:{"_token":"{{csrf_token()}}",
						"action_perform":action_perform,
						"guide_id":action_id},
						success:function(response)
						{
							if(response.indexOf("success")!=-1)
							{
								$("#"+id).parent().html('<button type="button" class="btn btn-sm btn-rounded btn-default active" id="active_guide_'+action_id+'">InActive</button>');

								swal("Inactivated!", "Selected Guide has been inactivated.", "success");
							}
							else
							{
								swal("Error", "Unable to perform this operation", "error");

							}
						}
					});


					
				} else {
					swal("Cancelled", "Operation Cancelled", "error");
				}
			});
			
		}
		else if(action_name=="sightseeing")
		{
			swal({
				title: "Are you sure?",
				text: "You want to inactivate this sightseeing !",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes, Inactivate",
				cancelButtonText: "No, cancel!",
				closeOnConfirm: false,
				closeOnCancel: false
			}, function(isConfirm) {
				if (isConfirm) {

					$.ajax({
						url:"{{route('update-sightseeing-active')}}",
						type:"POST",
						data:{"_token":"{{csrf_token()}}",
						"action_perform":action_perform,
						"sightseeing_id":action_id},
						success:function(response)
						{
							if(response.indexOf("success")!=-1)
							{
								$("#"+id).parent().html('<button type="button" class="btn btn-sm btn-rounded btn-default active" id="active_sightseeing_'+action_id+'">InActive</button>');

								swal("Inactivated!", "Selected Sightseeing has been inactivated.", "success");
							}
							else
							{
								swal("Error", "Unable to perform this operation", "error");

							}
						}
					});


					
				} else {
					swal("Cancelled", "Operation Cancelled", "error");
				}
			});
			
		}

	});



$(document).on("click",'.best_seller_yes',function()
	{
		var id=this.id;
		var actual_id=id.split("_");

		var action_name=actual_id[1];
		var action_perform=actual_id[0];
		var action_id=actual_id[2];

		if(action_name=="hotel")
		{

			swal({
				title: "Are you sure?",
				text: "You want to activate best seller status for this hotel !",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes, Activate",
				cancelButtonText: "No, cancel!",
				closeOnConfirm: false,
				closeOnCancel: false
			}, function(isConfirm) {
				if (isConfirm) {


					$.ajax({
						url:"{{route('update-hotel-bestseller')}}",
						type:"POST",
						data:{"_token":"{{csrf_token()}}",
						"action_perform":action_perform,
						"hotel_id":action_id},
						success:function(response)
						{
							if(response.indexOf("success")!=-1)
							{
								$("#"+id).parent().html('<button type="button" class="btn btn-sm btn-rounded btn-primary best_seller_no" id="bestsellerno_hotel_'+action_id+'">Active</button>');

								swal("Activated!", "Selected Hotel's best seller status has been activated.", "success");
							}
							else
							{
								swal("Error", "Unable to perform this operation", "error");

							}
							
						}
					});

					
				} else {
					swal("Cancelled", "Operation Cancelled", "error");
				}
			});

		}
		else if(action_name=="activity")
		{
			swal({
				title: "Are you sure?",
				text: "You want to activate best seller status for this activity !",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes, Activate",
				cancelButtonText: "No, cancel!",
				closeOnConfirm: false,
				closeOnCancel: false
			}, function(isConfirm) {
				if (isConfirm) {


					$.ajax({
						url:"{{route('update-activity-bestseller')}}",
						type:"POST",
						data:{"_token":"{{csrf_token()}}",
						"action_perform":action_perform,
						"activity_id":action_id},
						success:function(response)
						{
							if(response.indexOf("success")!=-1)
							{
								$("#"+id).parent().html('<button type="button" class="btn btn-sm btn-rounded btn-primary best_seller_no" id="bestsellerno_activity_'+action_id+'">Active</button>');

								swal("Activated!", "Selected Activity's best seller status has been activated.", "success");
							}
							else
							{
								swal("Error", "Unable to perform this operation", "error");

							}
							
						}
					});

					
				} else {
					swal("Cancelled", "Operation Cancelled", "error");
				}
			});

		}
		else if(action_name=="transport")
		{
			swal({
				title: "Are you sure?",
				text: "You want to activate this transport !",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes, Activate",
				cancelButtonText: "No, cancel!",
				closeOnConfirm: false,
				closeOnCancel: false
			}, function(isConfirm) {
				if (isConfirm) {

					$.ajax({
						url:"{{route('update-transport-active')}}",
						type:"POST",
						data:{"_token":"{{csrf_token()}}",
						"action_perform":action_perform,
						"transport_id":action_id},
						success:function(response)
						{
							if(response.indexOf("success")!=-1)
							{
								$("#"+id).parent().html('<button type="button" class="btn btn-sm btn-rounded btn-primary inactive" id="inactive_transport_'+action_id+'" >Active</button>');

								swal("Activated!", "Selected Transport has been activated.", "success");
							}
							else
							{
								swal("Error", "Unable to perform this operation", "error");

							}
							
						}
					});

					
				} else {
					swal("Cancelled", "Operation Cancelled", "error");
				}
			});

		}
		else if(action_name=="guide")
		{
			swal({
				title: "Are you sure?",
				text: "You want to activate best seller status for this guide !",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes, Activate",
				cancelButtonText: "No, cancel!",
				closeOnConfirm: false,
				closeOnCancel: false
			}, function(isConfirm) {
				if (isConfirm) {


					$.ajax({
						url:"{{route('admin-update-guide-bestseller')}}",
						type:"POST",
						data:{"_token":"{{csrf_token()}}",
						"action_perform":action_perform,
						"guide_id":action_id},
						success:function(response)
						{
							if(response.indexOf("success")!=-1)
							{
								$("#"+id).parent().html('<button type="button" class="btn btn-sm btn-rounded btn-primary best_seller_no" id="bestsellerno_guide_'+action_id+'">Active</button>');

								swal("Activated!", "Selected Guide's best seller status has been activated.", "success");
							}
							else
							{
								swal("Error", "Unable to perform this operation", "error");

							}
							
						}
					});

					
				} else {
					swal("Cancelled", "Operation Cancelled", "error");
				}
			});

		}
		else if(action_name=="sightseeing")
		{
			swal({
				title: "Are you sure?",
				text: "You want to activate best seller status for this sightseing !",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes, Activate",
				cancelButtonText: "No, cancel!",
				closeOnConfirm: false,
				closeOnCancel: false
			}, function(isConfirm) {
				if (isConfirm) {


					$.ajax({
						url:"{{route('update-sightseeing-bestseller')}}",
						type:"POST",
						data:{"_token":"{{csrf_token()}}",
						"action_perform":action_perform,
						"sightseeing_id":action_id},
						success:function(response)
						{
							if(response.indexOf("success")!=-1)
							{
								$("#"+id).parent().html('<button type="button" class="btn btn-sm btn-rounded btn-primary best_seller_no" id="bestsellerno_sightseeing_'+action_id+'">Active</button>');

								swal("Activated!", "Selected Sightseeing's best seller status has been activated.", "success");
							}
							else
							{
								swal("Error", "Unable to perform this operation", "error");

							}
							
						}
					});

					
				} else {
					swal("Cancelled", "Operation Cancelled", "error");
				}
			});

		}

	});
	$(document).on("click",'.best_seller_no',function()
	{
		var id=this.id;
		var actual_id=id.split("_");

		var action_name=actual_id[1];
		var action_perform=actual_id[0];
		var action_id=actual_id[2];
		if(action_name=="hotel")
		{
			swal({
				title: "Are you sure?",
				text: "You want to inactivate best seller status for this hotel !",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes, Inactivate",
				cancelButtonText: "No, cancel!",
				closeOnConfirm: false,
				closeOnCancel: false
			}, function(isConfirm) {
				if (isConfirm) {

					$.ajax({
						url:"{{route('update-hotel-bestseller')}}",
						type:"POST",
						data:{"_token":"{{csrf_token()}}",
						"action_perform":action_perform,
						"hotel_id":action_id},
						success:function(response)
						{
							if(response.indexOf("success")!=-1)
							{
								$("#"+id).parent().html('<button type="button" class="btn btn-sm btn-rounded btn-default best_seller_yes" id="bestselleryes_hotel_'+action_id+'">InActive</button>');

								swal("Inactivated!", "Selected Hotel's best seller status has been inactivated.", "success");
							}
							else
							{
								swal("Error", "Unable to perform this operation", "error");

							}
						}
					});

					
				} else {
					swal("Cancelled", "Operation Cancelled", "error");
				}
			});


		}
		else if(action_name=="activity")
		{
			swal({
				title: "Are you sure?",
				text: "You want to inactivate best seller status for this activity !",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes, Inactivate",
				cancelButtonText: "No, cancel!",
				closeOnConfirm: false,
				closeOnCancel: false
			}, function(isConfirm) {
				if (isConfirm) {

					$.ajax({
						url:"{{route('update-activity-bestseller')}}",
						type:"POST",
						data:{"_token":"{{csrf_token()}}",
						"action_perform":action_perform,
						"activity_id":action_id},
						success:function(response)
						{
							if(response.indexOf("success")!=-1)
							{
								$("#"+id).parent().html('<button type="button" class="btn btn-sm btn-rounded btn-default best_seller_yes" id="bestselleryes_activity_'+action_id+'">InActive</button>');

								swal("Inactivated!", "Selected Activity's best seller status has been inactivated.", "success");
							}
							else
							{
								swal("Error", "Unable to perform this operation", "error");

							}
						}
					});

					
				} else {
					swal("Cancelled", "Operation Cancelled", "error");
				}
			});


		}
		else if(action_name=="transport")
		{
			swal({
				title: "Are you sure?",
				text: "You want to inactivate this transport !",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes, Inactivate",
				cancelButtonText: "No, cancel!",
				closeOnConfirm: false,
				closeOnCancel: false
			}, function(isConfirm) {
				if (isConfirm) {

					$.ajax({
						url:"{{route('update-transport-active')}}",
						type:"POST",
						data:{"_token":"{{csrf_token()}}",
						"action_perform":action_perform,
						"transport_id":action_id},
						success:function(response)
						{
							if(response.indexOf("success")!=-1)
							{
								$("#"+id).parent().html('<button type="button" class="btn btn-sm btn-rounded btn-default active" id="active_transport_'+action_id+'">InActive</button>');

								swal("Inactivated!", "Selected Transport has been inactivated.", "success");
							}
							else
							{
								swal("Error", "Unable to perform this operation", "error");

							}
						}
					});


					
				} else {
					swal("Cancelled", "Operation Cancelled", "error");
				}
			});
			
		}
		else if(action_name=="guide")
		{
			swal({
				title: "Are you sure?",
				text: "You want to inactivate best seller status for this guide !",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes, Inactivate",
				cancelButtonText: "No, cancel!",
				closeOnConfirm: false,
				closeOnCancel: false
			}, function(isConfirm) {
				if (isConfirm) {

					$.ajax({
						url:"{{route('admin-update-guide-bestseller')}}",
						type:"POST",
						data:{"_token":"{{csrf_token()}}",
						"action_perform":action_perform,
						"guide_id":action_id},
						success:function(response)
						{
							if(response.indexOf("success")!=-1)
							{
								$("#"+id).parent().html('<button type="button" class="btn btn-sm btn-rounded btn-default best_seller_yes" id="bestselleryes_guide_'+action_id+'">InActive</button>');

								swal("Inactivated!", "Selected Guide's best seller status has been inactivated.", "success");
							}
							else
							{
								swal("Error", "Unable to perform this operation", "error");

							}
						}
					});

					
				} else {
					swal("Cancelled", "Operation Cancelled", "error");
				}
			});
			
		}
		else if(action_name=="sightseeing")
		{
			swal({
				title: "Are you sure?",
				text: "You want to inactivate best seller status for this sightseeing !",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes, Inactivate",
				cancelButtonText: "No, cancel!",
				closeOnConfirm: false,
				closeOnCancel: false
			}, function(isConfirm) {
				if (isConfirm) {

					$.ajax({
						url:"{{route('update-sightseeing-bestseller')}}",
						type:"POST",
						data:{"_token":"{{csrf_token()}}",
						"action_perform":action_perform,
						"sightseeing_id":action_id},
						success:function(response)
						{
							if(response.indexOf("success")!=-1)
							{
								$("#"+id).parent().html('<button type="button" class="btn btn-sm btn-rounded btn-default best_seller_yes" id="bestselleryes_sightseeing_'+action_id+'">InActive</button>');

								swal("Inactivated!", "Selected Sightseeing's best seller status has been inactivated.", "success");
							}
							else
							{
								swal("Error", "Unable to perform this operation", "error");

							}
						}
					});

					
				} else {
					swal("Cancelled", "Operation Cancelled", "error");
				}
			});
			
		}

	});





</script>
</body>
</html>
