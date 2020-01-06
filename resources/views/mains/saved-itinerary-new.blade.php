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
													<table id="itinerary_table" class="table table-bordered table-striped">
														<thead>
															<tr>
																<th>S. No.</th>
																<th style="display:none">Itinerary ID</th>
																<th>Tour Name</th>
																<th>No. of Days</th>
																<th>Total Cost</th>
																@if($rights['edit_delete']==1)
																<th>B2B Status</th>
																<th>B2C Status</th>
																<th>Best Seller</th>
																<th>Action</th>
																@endif
															</tr>
														</thead>
														<tbody>
															@php 
															$srno=1;
															@endphp
															@foreach($get_itinerary as $itinerary)
															<tr id="tr_{{$itinerary->itinerary_id}}">
																<td style="cursor:all-scroll;">{{$srno}}</td>
																<td style="display:none">{{$itinerary->itinerary_id}}</td>
																<td>{{$itinerary->itinerary_tour_name}}</td>
																<td>{{$itinerary->itinerary_tour_days}}</td>
																<td>{{$itinerary->itinerary_total_cost}}</td>
																@if($rights['edit_delete']==1)
																<td>
																	@if(strpos($rights['admin_which'],'edit_delete')!==false)
																	@if($itinerary->itinerary_status==1)
																	<button type="button" class="btn btn-sm btn-rounded inactive btn-primary" id="b2binactive_itinerary_{{$itinerary->itinerary_id}}">Active</button>
																	@else
																	<button type="button" class="btn btn-sm btn-rounded active btn-default" id="b2bactive_itinerary_{{$itinerary->itinerary_id}}">InActive</button>
																	@endif
																	@elseif($itinerary->itinerary_created_by!=Session::get('travel_users_id') &&  strpos($rights['admin_which'],'edit_delete')!==false)
																	@if($itinerary->itinerary_status==1)
																	<button type="button" class="btn btn-sm btn-rounded inactive btn-primary" id="b2binactive_itinerary_{{$itinerary->itinerary_id}}">Active</button>
																	@else
																	<button type="button" class="btn btn-sm btn-rounded active btn-default" id="b2bactive_itinerary_{{$itinerary->itinerary_id}}">InActive</button>
																	@endif
																	@elseif($itinerary->itinerary_created_by==Session::get('travel_users_id') && $itinerary->itinerary_created_role!="Supplier" && $rights['edit_delete']==1)
																	@if($itinerary->itinerary_status==1)
																	<button type="button" class="btn btn-sm btn-rounded inactive btn-primary" id="b2binactive_itinerary_{{$itinerary->itinerary_id}}">Active</button>
																	@else
																	<button type="button" class="btn btn-sm btn-rounded active btn-default" id="b2bactive_itinerary_{{$itinerary->itinerary_id}}">InActive</button>
																	@endif
																	@else
																	@if($itinerary->itinerary_status==1)
																	<button type="button" class="btn btn-sm btn-rounded inactive btn-primary" id="b2binactive_itinerary_{{$itinerary->itinerary_id}}" disabled="disabled">Active</button>
																	@else
																	<button type="button" class="btn btn-sm btn-rounded active btn-default" id="b2bactive_itinerary_{{$itinerary->itinerary_id}}" disabled="disabled">InActive</button>
																	@endif
																	@endif
																	
																</td>
																<td>
																	@if(strpos($rights['admin_which'],'edit_delete')!==false)
																	@if($itinerary->itinerary_bc_status==1)
																	<button type="button" class="btn btn-sm btn-rounded inactive btn-primary" id="b2cinactive_itinerary_{{$itinerary->itinerary_id}}">Active</button>
																	@else
																	<button type="button" class="btn btn-sm btn-rounded active btn-default" id="b2cactive_itinerary_{{$itinerary->itinerary_id}}">InActive</button>
																	@endif
																	@elseif($itinerary->itinerary_created_by!=Session::get('travel_users_id') &&  strpos($rights['admin_which'],'edit_delete')!==false)
																	@if($itinerary->itinerary_bc_status==1)
																	<button type="button" class="btn btn-sm btn-rounded inactive btn-primary" id="b2cinactive_itinerary_{{$itinerary->itinerary_id}}">Active</button>
																	@else
																	<button type="button" class="btn btn-sm btn-rounded active btn-default" id="b2cactive_itinerary_{{$itinerary->itinerary_id}}">InActive</button>
																	@endif
																	@elseif($itinerary->itinerary_created_by==Session::get('travel_users_id') && $itinerary->itinerary_created_role!="Supplier" && $rights['edit_delete']==1)
																	@if($itinerary->itinerary_bc_status==1)
																	<button type="button" class="btn btn-sm btn-rounded inactive btn-primary" id="b2cinactive_itinerary_{{$itinerary->itinerary_id}}">Active</button>
																	@else
																	<button type="button" class="btn btn-sm btn-rounded active btn-default" id="b2cactive_itinerary_{{$itinerary->itinerary_id}}">InActive</button>
																	@endif
																	@else
																	@if($itinerary->itinerary_bc_status==1)
																	<button type="button" class="btn btn-sm btn-rounded inactive btn-primary" id="b2cinactive_itinerary_{{$itinerary->itinerary_id}}" disabled="disabled">Active</button>
																	@else
																	<button type="button" class="btn btn-sm btn-rounded active btn-default" id="b2cactive_itinerary_{{$itinerary->itinerary_id}}" disabled="disabled">InActive</button>
																	@endif
																	@endif
																	
																</td>
																<td>
																	@if(strpos($rights['admin_which'],'edit_delete')!==false)
																	@if($itinerary->itinerary_best_status==1)
															<button type="button" class="btn btn-sm btn-rounded best_seller_no btn-primary" id="bestsellerno_itinerary_{{$itinerary->itinerary_id}}" >Active</button>
															@else
															<button type="button" class="btn btn-sm btn-rounded best_seller_yes btn-default" id="bestselleryes_itinerary_{{$itinerary->itinerary_id}}" >InActive</button>
															@endif
																	@elseif($itinerary->itinerary_created_by!=Session::get('travel_users_id') &&  strpos($rights['admin_which'],'edit_delete')!==false)
																	@if($itinerary->itinerary_best_status==1)
															<button type="button" class="btn btn-sm btn-rounded best_seller_no btn-primary" id="bestsellerno_itinerary_{{$itinerary->itinerary_id}}" >Active</button>
															@else
															<button type="button" class="btn btn-sm btn-rounded best_seller_yes btn-default" id="bestselleryes_itinerary_{{$itinerary->itinerary_id}}" >InActive</button>
															@endif
																	@elseif($itinerary->itinerary_created_by==Session::get('travel_users_id') && $itinerary->itinerary_created_role!="Supplier" && $rights['edit_delete']==1)
																	@if($itinerary->itinerary_best_status==1)
															<button type="button" class="btn btn-sm btn-rounded best_seller_no btn-primary" id="bestsellerno_itinerary_{{$itinerary->itinerary_id}}" >Active</button>
															@else
															<button type="button" class="btn btn-sm btn-rounded best_seller_yes btn-default" id="bestselleryes_itinerary_{{$itinerary->itinerary_id}}" >InActive</button>
															@endif
																	@else
																	@if($itinerary->itinerary_best_status==1)
															<button type="button" class="btn btn-sm btn-rounded best_seller_no btn-primary" id="bestsellerno_itinerary_{{$itinerary->itinerary_id}}" disabled="disabled">Active</button>
															@else
															<button type="button" class="btn btn-sm btn-rounded best_seller_yes btn-default" id="bestselleryes_itinerary_{{$itinerary->itinerary_id}}" disabled="disabled">InActive</button>
															@endif
																	@endif
															
															
															</td>
																<td>
																	@if(strpos($rights['admin_which'],'view')!==false)
																	<!-- 	<a href="javascript:void(0)"><i class="fa fa-eye"></i></a> -->
																	@elseif($itinerary->itinerary_created_by!=Session::get('travel_users_id') &&  strpos($rights['admin_which'],'view')!==false)
																	<!-- 	<a href="javascript:void(0)"><i class="fa fa-eye"></i></a> -->
																	@elseif($itinerary->itinerary_created_by==Session::get('travel_users_id') && $itinerary->itinerary_created_role!="Supplier" && $rights['view']==1)
																	<!-- <a href="javascript:void(0)"><i class="fa fa-eye"></i></a> -->
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
<script>


	var table = $('#itinerary_table').DataTable({
        rowReorder: true,
         "lengthMenu": [[25, 50, 100,150,200,250,500,-1], [25, 50, 100,150,200,250,500,"All"]]
    });
 
    table.on( 'row-reorder', function ( e, diff, edit ) {
        var result = 'Reorder started on row: '+edit.triggerRow.data()[1]+'<br>';
 		var new_data=[];
        for ( var i=0, ien=diff.length ; i<ien ; i++ ) {
            var rowData = table.row( diff[i].node ).data();
 			new_data.push({itinerary_id:rowData[1],new_order:diff[i].newData});
           
        }

        // console.log(new_data);
        if(new_data.length>0)
        {
          $.ajax({
        	url:"{{route('sort-itinerary')}}",
        	type:"POST",
        	data:{"_token":"{{csrf_token()}}",
        	"new_data":new_data},
        	success:function(response)
        	{
        		console.log(response);
        	}
        });	
        }

        
        
        
        var data = table.rows().data();
 data.each(function (value, index) {
     console.log(value[1]+"--"+value[0]);
 });
      
        
   
    });

	$(document).on("click",'.active',function()
	{
		var id=this.id;
		var actual_id=id.split("_");
		var action_name=actual_id[1];
		var action_perform=actual_id[0];
		var action_id=actual_id[2];
		if(action_name=="itinerary")
		{
			swal({
				title: "Are you sure?",
				text: "You want to activate this itinerary !",
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
						url:"{{route('update-itinerary-active')}}",
						type:"POST",
						data:{"_token":"{{csrf_token()}}",
						"action_perform":action_perform,
						"itinerary_id":action_id},
						success:function(response)
						{
							if(response.indexOf("success")!=-1)
							{
								if(action_perform.indexOf('b2b')!=-1)
								{
									$("#"+id).parent().html('<button type="button" class="btn btn-sm btn-rounded btn-primary inactive" id="b2binactive_itinerary_'+action_id+'">Active</button>');
								}
								else
								{
									$("#"+id).parent().html('<button type="button" class="btn btn-sm btn-rounded btn-primary inactive" id="b2cinactive_itinerary_'+action_id+'">Active</button>');
								}
								
								swal("Activated!", "Selected Itinerary has been activated.", "success");
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
		if(action_name=="itinerary")
		{
			swal({
				title: "Are you sure?",
				text: "You want to inactive this itinerary !",
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
						url:"{{route('update-itinerary-active')}}",
						type:"POST",
						data:{"_token":"{{csrf_token()}}",
						"action_perform":action_perform,
						"itinerary_id":action_id},
						success:function(response)
						{
							if(response.indexOf("success")!=-1)
							{
								if(action_perform.indexOf('b2b')!=-1)
								{
									$("#"+id).parent().html('<button type="button" class="btn btn-sm btn-rounded btn-default active" id="b2bactive_itinerary_'+action_id+'">InActive</button>');
								}
								else
								{
									$("#"+id).parent().html('<button type="button" class="btn btn-sm btn-rounded btn-default active" id="b2cactive_itinerary_'+action_id+'">InActive</button>');
								}

								swal("Inactivated!", "Selected Itinerary has been inactivated.", "success");
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

		if(action_name=="itinerary")
		{

			swal({
				title: "Are you sure?",
				text: "You want to activate best seller status for this itinerary !",
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
						url:"{{route('update-itinerary-bestseller')}}",
						type:"POST",
						data:{"_token":"{{csrf_token()}}",
						"action_perform":action_perform,
						"itinerary_id":action_id},
						success:function(response)
						{
							if(response.indexOf("success")!=-1)
							{
								$("#"+id).parent().html('<button type="button" class="btn btn-sm btn-rounded btn-primary best_seller_no" id="bestsellerno_itinerary_'+action_id+'">Active</button>');

								swal("Activated!", "Selected Itinerary's best seller status has been activated.", "success");
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
		if(action_name=="itinerary")
		{
			swal({
				title: "Are you sure?",
				text: "You want to inactivate best seller status for this itinerary !",
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
						url:"{{route('update-itinerary-bestseller')}}",
						type:"POST",
						data:{"_token":"{{csrf_token()}}",
						"action_perform":action_perform,
						"itinerary_id":action_id},
						success:function(response)
						{
							if(response.indexOf("success")!=-1)
							{
								$("#"+id).parent().html('<button type="button" class="btn btn-sm btn-rounded btn-default best_seller_yes" id="bestselleryes_itinerary_'+action_id+'">InActive</button>');

								swal("Inactivated!", "Selected Iitnerary's best seller status has been inactivated.", "success");
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