<?php

use App\Http\Controllers\ServiceManagement;

?>

@include('supplier.includes.top-header')

<style>

    div#cke_1_contents {



        height: 250px !important;



    }



</style>



<body class="hold-transition light-skin sidebar-mini theme-rosegold onlyheader">



<div class="wrapper">



@include('supplier.includes.top-nav')



<div class="content-wrapper">



    <div class="container-full clearfix position-relative">	



@include('supplier.includes.nav')



	<div class="content">

	<!-- Content Header (Page header) -->

	<div class="content-header">

		<div class="d-flex align-items-center">

			<div class="mr-auto">

				<h3 class="page-title">Transports</h3>

				<div class="d-inline-block align-items-center">

					<nav>

						<ol class="breadcrumb">

							<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>

							<li class="breadcrumb-item" aria-current="page">Dashboard</li>

							<li class="breadcrumb-item active" aria-current="page">Transport

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







		<div class="col-12">

			<div class="box">



				<div class="box-body">

					<!-- Nav tabs -->

					

					<!-- Tab panes -->

					<div class="tab-content">

					

						

						<div id="navpills-3" class="tab-pane show active">

							<div class="row">





								<div class="col-sm-6 col-md-3">

									<div class="form-group">



										<a href="{{route('supplier-create-transport')}}"><button type="button"

												class="btn btn-rounded btn-success">Create New Transport</button></a>

									</div>

								</div>













								<div class="col-12">

									<div class="box">



										<!-- /.box-header -->

										<div class="box-body">

											<div class="table-responsive">

												<table id="example1" class="table table-bordered table-striped">

													<thead>

														<tr>

															<th>ID</th>

															<th>Transport Name</th>

															<th>Supplier Name</th>

															<th>Description</th>

															<th>City</th>

															<th>Country</th>

															<th>Status</th>

																<th>Approval</th>

															<th>Action</th>



														</tr>

													</thead>

													<tbody>

														<?php

														$jt=1;

														?>

														@foreach($get_transport as $transport)



												<tr id="tr_{{$transport->transport_id}}">



													<td>{{$jt++}}</td>



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



														<td>

															@if($transport->transfer_status==1)

															Active

															@else

															Inactive

															@endif

														</td>

														<td style="white-space: nowrap;">

														@if($transport->transport_approve_status==1)

															<button type="button" class="btn btn-sm btn-rounded btn-primary" >Approved</button>

															@elseif($transport->transport_approve_status==0)

															<button type="button" class="btn btn-sm btn-rounded btn-warning" >Pending</button>

															@elseif($transport->transport_approve_status==2)

															<button type="button" class="btn btn-sm btn-rounded btn-danger" >Rejected</button>

															@endif

															</td>



													<td>



														<a href="{{route('supplier-transport-details',['transport_id'=>$transport->transport_id])}}"><i class="fa fa-eye"></i></a>



														<a href="{{route('supplier-edit-transport',['transport_id'=>$transport->transport_id])}}"><i class="fa fa-pencil"></i></a>



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

					</div>

				</div>





				<!-- /.row -->

			</div>

			<!-- /.box-body -->

		</div>



		<!-- /.box -->



	</div>



</div>

</div>



</div>



</div>

@include('supplier.includes.footer')



@include('supplier.includes.bottom-footer')



</body>

</html>

