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

				<h3 class="page-title">Agent Management</h3>

				<div class="d-inline-block align-items-center">

					<nav>

						<ol class="breadcrumb">

							<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>

							<li class="breadcrumb-item" aria-current="page">Dashboard</li>

							<li class="breadcrumb-item active" aria-current="page">Agent Management

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



								<a href="{{route('create-agent')}}"><button type="button"

										class="btn btn-rounded btn-success">Create Agent</button>

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

												@foreach($get_agents as $agent)

												<tr id="tr_{{$agent->agent_id}}">

													<td>{{$agent->agent_id}}</td>

													<td>{{$agent->agent_name}}</td>

													<td>{{$agent->company_contact}}</td>

													<td>{{$agent->address}}</td>

													<td>
														<?php
														$fetch_city=ServiceManagement::searchCities($agent->agent_city,$agent->agent_country);
														echo $fetch_city['name'];
														?>
													</td>

													<td>
														@foreach($countries as $country)
															@if($country->country_id==$agent->agent_country)
													{{$country->country_name}}
															@endif

														@endforeach
														</td>
														@if($rights['edit_delete']==1)
														<td>
															@if($agent->agent_status==1)
															<button type="button" class="btn btn-sm btn-rounded inactive btn-primary" id="inactive_agent_{{$agent->agent_id}}">Active</button>
															@else
															<button type="button" class="btn btn-sm btn-rounded active btn-default" id="active_agent_{{$agent->agent_id}}">InActive</button>
															@endif
														</td>
														@endif
													@if($rights['edit_delete']==1 || $rights['view']==1)

													<td>
														@if(strpos($rights['admin_which'],'view')!==false)
														<a href="{{route('agent-details',['agent_id'=>$agent->agent_id])}}"><i class="fa fa-eye"></i></a>
														@elseif($agent->agent_created_by!=Session::get('travel_users_id') &&  strpos($rights['admin_which'],'view')!==false)
														<a href="{{route('agent-details',['agent_id'=>$agent->agent_id])}}"><i class="fa fa-eye"></i></a>
														@elseif($agent->agent_created_by==Session::get('travel_users_id') &&  $rights['view']==1)
														<a href="{{route('agent-details',['agent_id'=>$agent->agent_id])}}"><i class="fa fa-eye"></i></a>
														@endif
															
															@if(strpos($rights['admin_which'],'edit_delete')!==false)
														<a href="{{route('edit-agent',['agent_id'=>$agent->agent_id])}}"><i class="fa fa-pencil"></i></a>
														@elseif($agent->agent_created_by!=Session::get('travel_users_id') &&  strpos($rights['admin_which'],'edit_delete')!==false)
														<a href="{{route('edit-agent',['agent_id'=>$agent->agent_id])}}"><i class="fa fa-pencil"></i></a>
														@elseif($agent->agent_created_by==Session::get('travel_users_id') &&  $rights['edit_delete']==1)
														<a href="{{route('edit-agent',['agent_id'=>$agent->agent_id])}}"><i class="fa fa-pencil"></i></a>

															@endif

															@if(strpos($rights['admin_which'],'edit_delete')!==false)
															<a href="javascript:void(0)" class="change_password" id="change_pswd_{{$agent->agent_id}}"><i class="fa fa-key"></i></a>
															@elseif($agent->agent_created_by!=Session::get('travel_users_id') &&  strpos($rights['admin_which'],'edit_delete')!==false)
															<a href="javascript:void(0)" class="change_password" id="change_pswd_{{$agent->agent_id}}"><i class="fa fa-key"></i></a>
															@elseif($agent->agent_created_by==Session::get('travel_users_id') &&  $rights['edit_delete']==1)
															<a href="javascript:void(0)" class="change_password" id="change_pswd_{{$agent->agent_id}}"><i class="fa fa-key"></i></a>
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
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="result-popup" aria-hidden="true"
    style="display: none;" id="change_password_modal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="result-popup">CHANGE PASSWORD</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
            	<form id="change_password_form">
            		{{csrf_field()}}
            		<input type="hidden" name="agent_id">
            		<div class="row mb-10">

            			<div class="col-sm-12 col-md-12 col-lg-12">

            				<div class="form-group">

            					<label>PASSWORD<span class="asterisk">*</span></label>

            					<input type="password" class="form-control" placeholder="PASSWORD"

            					name="agent_new_password" id="agent_new_password">

            				</div>

            			</div>


            		</div>

            		<div class="row mb-10">

            			<div class="col-sm-12 col-md-12 col-lg-12">

            				<div class="form-group">

            					<label>CONFIRM PASSWORD<span class="asterisk">*</span></label>

            					<input type="password" class="form-control" placeholder="CONFIRM PASSWORD"

            					name="agent_confirm_password" id="agent_confirm_password">

            				</div>

            			</div>

            		</div>
            		<div class="row mb-10">

            			<div class="col-sm-12 col-md-12 col-lg-12">
            				 <button type="button" id="change_password_btn"

                                                        class="btn btn-rounded btn-primary mr-10">Change Password</button>
            			</div>

            	</form>
              
            </div>
            <div class="modal-footer">
               <!--  <button type="button" class="btn btn-default btn-sm pull-right" data-dismiss="modal">Close</button> -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
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
	$(document).on("click",".change_password",function()
	{
		var password_id=this.id;
		var supplier_id=password_id.split("_")[2];

		$("input[name='agent_id']").val(supplier_id);

		$("#change_password_modal").modal("show");
	});
</script>
<script>
	$(document).on("click",'.active',function()
	{
		var id=this.id;
		var actual_id=id.split("_");

		var action_name=actual_id[1];
		var action_perform=actual_id[0];
		var action_id=actual_id[2];

		if(action_name=="agent")
		{

			swal({
				title: "Are you sure?",
				text: "You want to activate this agent !",
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
						url:"{{route('update-agent-active')}}",
						type:"POST",
						data:{"_token":"{{csrf_token()}}",
						"action_perform":action_perform,
						"agent_id":action_id},
						success:function(response)
						{
							if(response.indexOf("success")!=-1)
							{
								$("#"+id).parent().html('<button type="button" class="btn btn-sm btn-rounded btn-primary inactive" id="inactive_agent_'+action_id+'">Active</button>');

								swal("Activated!", "Selected Agent has been activated.", "success");
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
		if(action_name=="agent")
		{
			swal({
				title: "Are you sure?",
				text: "You want to inactive this agent !",
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
						url:"{{route('update-agent-active')}}",
						type:"POST",
						data:{"_token":"{{csrf_token()}}",
						"action_perform":action_perform,
						"agent_id":action_id},
						success:function(response)
						{
							if(response.indexOf("success")!=-1)
							{
								$("#"+id).parent().html('<button type="button" class="btn btn-sm btn-rounded btn-default active" id="active_agent_'+action_id+'">InActive</button>');

								swal("Inactivated!", "Selected Agent has been inactivated.", "success");
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

<script>
	$(document).on("click","#change_password_btn",function()
	{
		  var new_password = $("#agent_new_password").val();
          var confirm_new_password = $("#agent_confirm_password").val();

          if (new_password.trim() == "")
          {
          	$("#agent_new_password").css("border", "1px solid #cf3c63");
          } 
          else
          {
          	$("#agent_new_password").css("border", "1px solid #9e9e9e");
          }
           if (confirm_new_password.trim() == "")
          {
          	$("#agent_confirm_password").css("border", "1px solid #cf3c63");
          } 
          else
          {
          	$("#agent_confirm_password").css("border", "1px solid #9e9e9e");
          }
          if (new_password.trim() != "" && confirm_new_password.trim() != "" && (new_password!=confirm_new_password))

          {

          	$("#confirm_new_password").css("border", "1px solid #cf3c63");

          	swal("Password Mismatch!",

          		"Password doesn't match with Confirm Password");
          }

          if (new_password.trim() == ""){

          	$("#agent_new_password").focus();

          } else if(confirm_new_password.trim() == ""){

          	$("#agent_confirm_password").focus();

          }else if(new_password.trim() != "" && confirm_new_password.trim() != "" && (new_password!=confirm_new_password)) {

          	$("#confirm_new_password").focus();

          }
          else
          {
			$("#change_password_btn").prop("disabled", true);
          	var formdata = new FormData($("#change_password_form")[0]);
          	$.ajax({
          		url: "{{route('agent-change-password')}}",
          		enctype: 'multipart/form-data',
          		data: formdata,
          		type: "POST",
          		processData: false,
          		contentType: false,
          		success: function (response)
          		{
          			if (response.indexOf("fail") != -1)
          			{
          				 swal("ERROR", "Password cannot be changed right now! ");

          			}
          			else if (response.indexOf("success") != -1)
          			{
          				$("#change_password_modal").modal("hide");
          				swal({

          					title: "Success",

          					text: "Password Changed Successfully !",

          					type: "success"

          				});

          				$("#agent_new_password").val("");
          				$("#agent_confirm_password").val("");

          			} 
          			else if (response.indexOf("mismatch") != -1)
          			{
          				 swal("ERROR", "Password and Confirm Password  are not same! ");

          			} 
          			$("#change_password_btn").prop("disabled", false);



          		}


          	});

          }
	});
</script>





</body>





</html>

