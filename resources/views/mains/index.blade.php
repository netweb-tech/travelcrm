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

<body class="hold-transition theme-fruit bg-img" style="background-image: url('{{ asset('assets/images/auth-bg/bg-2.jpg')}}');" data-gr-c-s-loaded="true">

	<div class="wrapper">	

		<div class="content">

<div class="h-p100">

		<div class="row align-items-center justify-content-md-center h-p100">

			<div class="col-lg-8 col-12">

				<div class="row justify-content-center no-gutters">

					<div class="col-xl-4 col-lg-7 col-md-6 col-12">

						<div class="content-top-agile p-10">

							<div class="logo">

								<a href="#" class="aut-logo my-40 d-block">

									<img src="../../images/logo-light.png" alt="">

								</a>

							</div>

							<h2 class="text-white">Travel CRM</h2>						

						</div>

						<div class="p-30">

							<form id="login_form" method="post">

								{{csrf_field()}}

								<div class="form-group">

									<div class="input-group mb-3">

										<div class="input-group-prepend">

											<span class="input-group-text text-white bg-transparent"><i class="ti-user"></i></span>

										</div>

										<input id="login_username" type="text" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Username" name="username">

									</div>

								</div>

								<div class="form-group">

									<div class="input-group mb-3">

										<div class="input-group-prepend">

											<span class="input-group-text text-white bg-transparent"><i class="ti-lock"></i></span>

										</div>

										<input id="login_password" type="password" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Password"  name="password">

									</div>

								</div>

								  <div class="row">

									<div class="col-6">

									  <!-- <div class="checkbox text-white">

										<input type="checkbox" id="basic_checkbox_1" class="filled-in chk-col-danger" checked="">

										<label for="basic_checkbox_1">Remember Me</label>

									  </div> -->

									</div>

									<!-- /.col -->

									<!-- <div class="col-6">

									 <div class="fog-pwd text-right">

										<a href="javascript:void(0)" class="hover-info text-white"><i class="ion ion-locked"></i> Forgot pwd?</a><br>

									  </div>

									</div> -->

									<!-- /.col -->

									<div class="col-12 text-center">



									  <button type="button" id="sign_in" class="btn btn-warning btn-outline mt-10">SIGN IN</button>

									</div>

									<!-- /.col -->

								  </div>

							</form>														



						<!-- 	<div class="text-center">

							  <p class="mt-20 text-white">- Sign With -</p>

							  <p class="gap-items-2 mb-20">

								  <a class="btn btn-social-icon btn-facebook" href="#"><i class="fa fa-facebook"></i></a>

								  <a class="btn btn-social-icon btn-twitter" href="#"><i class="fa fa-twitter"></i></a>

								  <a class="btn btn-social-icon btn-google" href="#"><i class="fa fa-google-plus"></i></a>

								  <a class="btn btn-social-icon btn-instagram" href="#"><i class="fa fa-instagram"></i></a>

								</p>	

							</div>

							

							<div class="text-center text-white">

								<p class="mt-15 mb-0">Don't have an account? <a href="auth_register.html" class="text-white ml-5">Sign Up</a></p>

							</div> -->

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>

		</div>

	</div>

@include('mains.includes.bottom-footer')

<script>

	$(document).on("click","#sign_in",function()

	{

		var username=$("#login_username").val();

		var password=$("#login_password").val();



		if(username.trim()=="")

		{

			$("#login_username").css("border","1px solid #fe67d9");

		}

		else

		{

			$("#login_username").css("border","1px solid #9e9e9e");

		}



		if(password.trim()=="")

		{

			$("#login_password").css("border","1px solid #fe67d9");

		}

		else

		{

			$("#login_password").css("border","1px solid #9e9e9e");

		}



		if(username.trim()=="")

		{

			$("#login_username").focus();

		}

		else if(password.trim()=="")

		{

			$("#login_password").focus();

		}

		else

		{

			$("#sign_in").prop("disabled",true);

			var formData=new FormData($("#login_form")[0]);

			$.ajax({

				url:"{{route('login-check')}}",

				type:"POST",

				data:formData,

				processData:false,

				contentType:false,

				success:function(response)

				{

					if(response.indexOf("success")!=-1)

					{

						window.location.href="{{route('home')}}";

					}

					else

					{

						swal("Incorrect Details","You have entered either incorrect username or password!");

					}

					$("#sign_in").prop("disabled",false);

				}

			})

		}





	});



	$(document).on("keypress","#login_username,#login_password",function(e)

	{

		if(e.keyCode == 13)

		{

		var username=$("#login_username").val();

		var password=$("#login_password").val();



		if(username.trim()=="")

		{

			$("#login_username").css("border","1px solid #fe67d9");

		}

		else

		{

			$("#login_username").css("border","1px solid #9e9e9e");

		}



		if(password.trim()=="")

		{

			$("#login_password").css("border","1px solid #fe67d9");

		}

		else

		{

			$("#login_password").css("border","1px solid #9e9e9e");

		}



		if(username.trim()=="")

		{

			$("#login_username").focus();

		}

		else if(password.trim()=="")

		{

			$("#login_password").focus();

		}

		else

		{
			$("#sign_in").prop("disabled",true);
			var formData=new FormData($("#login_form")[0]);

			$.ajax({

				url:"{{route('login-check')}}",

				type:"POST",

				data:formData,

				processData:false,

				contentType:false,

				success:function(response)

				{

					if(response.indexOf("success")!=-1)

					{

						window.location.href="{{route('home')}}";

					}

					else

					{

						swal("Incorrect Details","You have entered either incorrect username or password!");

					}

					$("#sign_in").prop("disabled",false);

				}

			})

		}



}

	});

</script>

</body>

</html>

