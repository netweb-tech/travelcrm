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



    <div class="content-header">

        <div class="d-flex align-items-center">

            <div class="mr-auto">

                <h3 class="page-title">Menus</h3>

                <div class="d-inline-block align-items-center">

                    <nav>

                        <ol class="breadcrumb">

                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>

                            <li class="breadcrumb-item" aria-current="page">Home</li>

                            <li class="breadcrumb-item active" aria-current="page">Create Menus

                            </li>

                        </ol>

                    </nav>

                </div>

            </div>

           <!--  <div class="right-title">

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



  @if($rights['add']==1)

    <div class="row">

        <div class="col-12">

            <div class="box">

                <div class="box-header with-border">

                    <h4 class="box-title">Create Menus</h4>

                </div>

                <div class="box-body">

                     

                	<h3 class="box-title">Main Menu</h3>



                	<form class="package_form" action="javascript:void()" method="POST" id="menu_form">



                		{{csrf_field()}}



                		<div class="row mb-10">

                			<div class="col-sm-4 col-md-4">

                				<div class="form-group">

                					<input type="hidden" name="menu_pid" value="0">

                					<label>Menu Name <span class="asterisk">*</span></label>

                					<input type="text" class="form-control" placeholder="Menu" id="menu_name" name="menu_name" autofocus>

                				</div>

                			</div>

                			<div class="col-sm-4 col-md-4">

                				<div class="form-group">

                					<input type="hidden" name="menu_pid" value="0">

                					<label>Menu File <span class="asterisk">*</span></label>

                					<input type="text" class="form-control textfield" placeholder="File Name" id="file_name" name="file_name">

                				</div>



                			</div>

                			<div class="col-sm-3 col-md-3 checkbox">

                				<br>

                                    <input id="check" type="checkbox" name="new_window" value="yes">

                                    <label for="check">New Window</label>


                            </div>



                		</div>



                		<div class="row mb-10">

                			<div class="col-md-12">

                				<button type="button"  id="save_main_menu" class="btn btn-rounded btn-primary mr-10 pull-right">Submit</button>

                			</div>

                		</div>



                	</form>











                            <h3 class="box-title">Sub Menu under Main Menu</h3>



                                  <!--   <div class="col-md-6">



                                        <img src="{{ asset('assets/images/register-img.jpg') }}" class="img-responsive">



                                    </div> -->



                                    <form class="package_form" action="javascript:void()" method="POST" id="sub_menu_form">



                                        {{csrf_field()}}



									

                		<div class="row mb-10">

                			<div class="col-sm-4 col-md-4">

                				<div class="form-group">

                					<label>Main Menu <span class="asterisk">*</span></label>

                					 <select class="form-control" id="menu_pid_sub" name="menu_pid">

                                                    <option value="0">--MAIN MENU--</option>

                                                    @foreach($fetch_menu as $fetch_menus_data)

                                                    <option value="{{$fetch_menus_data->menu_id}}">{{$fetch_menus_data->menu_name}}</option>

                                                    @endforeach

                                                </select>

                				</div>

                			</div>

                			<div class="col-sm-4 col-md-4">

                				<div class="form-group">

                					<label>Sub Menu Name <span class="asterisk">*</span></label>

                					 <input type="text" class="form-control" placeholder="Sub Menu" id="sub_menu_name" name="menu_name" autofocus>

                				</div>



                			</div>

                			<div class="col-sm-4 col-md-4">

                				<div class="form-group">

                					<label>Sub Menu File Name <span class="asterisk">*</span></label>

                					  <input type="text" class="form-control" placeholder="File Name" id="sub_file_name" name="file_name">



                				</div>



                			</div>

                			<div class="col-sm-4 col-md-4 checkbox">

                                <br>

                                    <input id="check" type="checkbox" name="new_window" value="yes">

                                    <label for="check">New Window</label>


                            </div>




                		</div>

                		<div class="row mb-10">

                			<div class="col-md-12 ">

                				<button type="button"  id="save_sub_menu" class="btn btn-rounded btn-primary mr-10 pull-right">Submit</button>

                			</div>

                		</div>

                                     



                                </form>



                            </div>

                </div>

            </div>

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

   



        $(document).on("click","#save_main_menu",function()

        {

            var menu_name=$("#menu_name").val();

            var file_name=$("#file_name").val(); 



            if(menu_name.trim()=="")

            {

                $("#menu_name").css("border","1px solid #cf3c63");

            }

            else

            {

             $("#menu_name").css("border","1px solid #9e9e9e"); 

            }



            if(file_name.trim()=="")

            {

                $("#file_name").css("border","1px solid #cf3c63");

            }

            else

            {

             $("#file_name").css("border","1px solid #9e9e9e"); 

            }



     

            if(menu_name.trim()=="")

            {

                $("#menu_name").focus();

            }

            else if(file_name.trim()=="")

            {

                $("#file_name").focus();

            }

            else

            {

                $("#save_main_menu").prop("disabled",true);

                var formdata=new FormData($("#menu_form")[0]);

                $.ajax({

                    url:"{{route('menu-insert')}}",

                    data: formdata,

                    type:"POST",

                    processData: false,

                    contentType: false,

                    success:function(response)

                    {

                       if(response.indexOf("exist")!=-1)

                       {

                          swal("Already Exist!", "Menu Name already exists");

                       }

                      else if(response.indexOf("success")!=-1)

                      {

                        swal({title:"Success",text:"Menu Created Successfully !",type: "success"},

                         function(){ 

                             location.reload();

                         });

                      }

                      else if(response.indexOf("fail")!=-1)

                      {

                       swal("ERROR", "Menu cannot be inserted right now! ");

                      }

                        $("#save_main_menu").prop("disabled",false);

                    }

                });  

            }







        });





        $(document).on("click","#save_sub_menu",function()

        {

        	 var menu_pid_sub=$("#menu_pid_sub").val();

            var sub_menu_name=$("#sub_menu_name").val();

            var sub_file_name=$("#sub_file_name").val(); 



             if(menu_pid_sub.trim()=="0")

            {

                $("#menu_pid_sub").css("border","1px solid #cf3c63");

            }

            else

            {

             $("#menu_pid_sub").css("border","1px solid #9e9e9e"); 

            }



            if(sub_menu_name.trim()=="")

            {

                $("#sub_menu_name").css("border","1px solid #cf3c63");

            }

            else

            {

             $("#sub_menu_name").css("border","1px solid #9e9e9e"); 

            }



            if(sub_file_name.trim()=="")

            {

                $("#sub_file_name").css("border","1px solid #cf3c63");

            }

            else

            {

             $("#sub_file_name").css("border","1px solid #9e9e9e"); 

            }



     		 if(menu_pid_sub.trim()=="0")

            {

                $("#menu_pid_sub").focus();

            }

            else if(sub_menu_name.trim()=="")

            {

                $("#sub_menu_name").focus();

            }

            else if(sub_file_name.trim()=="")

            {

                $("#sub_file_name").focus();

            }

            else

            {

                $("#save_sub_menu").prop("disabled",true);

                var formdata=new FormData($("#sub_menu_form")[0]);

                $.ajax({

                    url:"{{route('menu-insert')}}",

                    data: formdata,

                    type:"POST",

                    processData: false,

                    contentType: false,

                    success:function(response)

                    {

                       if(response.indexOf("exist")!=-1)

                       {

                          swal("Already Exist!", "Menu Name already exists");

                       }

                      else if(response.indexOf("success")!=-1)

                      {

                        swal({title:"Success",text:"Sub Menu Created Successfully !",type: "success"},

                         function(){ 

                             location.reload();

                         });

                      }

                      else if(response.indexOf("fail")!=-1)

                      {

                       swal("ERROR", "Sub Menu cannot be inserted right now! ");

                      }

                        $("#save_sub_menu").prop("disabled",false);

                    }

                });  

            }







        });

</script>

</body>

</html>

