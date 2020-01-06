

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

				<h3 class="page-title">User Details View</h3>

				<div class="d-inline-block align-items-center">

					<nav>

						<ol class="breadcrumb">

							<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>

							<li class="breadcrumb-item" aria-current="page">Dashboard</li>

							<li class="breadcrumb-item active" aria-current="page">User Details View

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

							<label for="users_empcode"><strong>EMPLOYEE CODE :</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="users_empcode"> @if($get_users->users_empcode!="" && $get_users->organization_name!="0" && $get_users->users_empcode!=null){{$get_users->users_empcode}} @else No Data Available @endif </p>

						</div>

					</div>

					<div class="row">

						<div class="col-md-3">

							<label for="users_username"><strong>USERNAME :</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="users_username"> @if($get_users->users_username!="" && $get_users->users_username!="0" && $get_users->users_username!=null){{$get_users->users_username}} @else No Data Available @endif </p>

						</div>

					</div>

					<div class="row">

						<div class="col-md-3">

							<label for="users_fname"><strong>FIRST NAME :</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="users_fname"> @if($get_users->users_fname!="" && $get_users->users_fname!="0" && $get_users->users_fname!=null){{$get_users->users_fname}} @else No Data Available @endif </p>

						</div>

					</div>

					<div class="row">

						<div class="col-md-3">

							<label for="users_lname"><strong>LAST NAME :</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="users_lname"> @if($get_users->users_lname!="" && $get_users->users_lname!="0" && $get_users->users_lname!=null){{$get_users->users_lname}} @else No Data Available @endif </p>

						</div>

					</div>

						<div class="row">

						<div class="col-md-3">

							<label for="users_email"><strong>EMAIL ID :</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="users_email"> @if($get_users->users_email!="" && $get_users->users_email!="0" && $get_users->users_email!=null){{$get_users->users_email}} @else No Data Available @endif </p>

						</div>

					</div>

					<div class="row">

						<div class="col-md-3">

							<label for="users_contact"><strong>CONTACT NUMBER :</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="users_contact"> @if($get_users->users_contact!="" && $get_users->users_contact!="0" && $get_users->users_contact!=null){{$get_users->users_contact}} @else No Data Available @endif </p>

						</div>

					</div>

						<div class="row">

						<div class="col-md-3">

							<label for="users_status"><strong>STATUS :</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="users_status"> 

								@if($get_users->users_status!="" && $get_users->users_status!=null)

								@if($get_users->users_status=="1")

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

							<p class="" id="users_contact"> @if($get_users->created_at!=""  && $get_users->created_at!=null){{$get_users->created_at}} @else No Data Available @endif </p>

						</div>

					</div>

					<div class="row">

						<div class="col-md-3">

							<label for="users_contact"><strong>Updated DateTime :</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="users_contact"> @if($get_users->updated_at!=""  && $get_users->updated_at!=null){{$get_users->updated_at}} @else No Data Available @endif </p>

						</div>

					</div>

					<div class="row">

						<div class="col-md-3">

							<label for="users_contact"><strong>ROLES :</strong></label>

						</div>

						<div class="col-md-9">

							<p class="" id="users_contact"> @if($get_users->users_assigned_role!=""  && $get_users->users_assigned_role!=null){{$get_users->users_assigned_role}} @else No Data Available @endif </p>

						</div>

					</div>

					  <div class="row mb-10">

                        <div class="col-md-12">

                            <div class="box-header with-border"

                                style="padding: 10px;border-bottom:none;border-radius:0;border-top:1px solid #c3c3c3">

                                <button type="button"  id="back_btn" onclick="window.history.back()" class="btn btn-rounded btn-primary mr-10">Back</button>

                                @php

								$users_converted_id=base64_decode(base64_decode($users_id));

                                @endphp

                                <a href="{{route('edit-user',['users_id'=>$users_converted_id])}}"><button type="button" id="discard_user" class="btn btn-rounded btn-primary">Edit</button></a>

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



</body>





</html>

