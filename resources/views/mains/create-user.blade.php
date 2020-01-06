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

                <h3 class="page-title">User Management</h3>

                <div class="d-inline-block align-items-center">

                    <nav>

                        <ol class="breadcrumb">

                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>

                            <li class="breadcrumb-item" aria-current="page">Dashboard</li>

                            <li class="breadcrumb-item" aria-current="page">User Management</li>

                            <li class="breadcrumb-item active" aria-current="page">Create New User

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

                    <h4 class="box-title">Create User</h4>

                </div>

                <div class="box-body">

                      <form id="user_form" method="post" accept-charset="utf-8">

                         {{csrf_field()}}

                    <div class="row mb-10">

                        <div class="col-sm-6 col-md-6">

                            <div class="form-group">

                                <label>EMPLOYEE CODE <span class="asterisk">*</span></label>

                                <input type="text" class="form-control" placeholder="EMPLOYEE CODE" id="employee_code" name="employee_code">

                            </div>

                        </div>

                        <div class="col-sm-6 col-md-6">



                        </div>









                    </div>

                    <div class="row mb-10">



                        <div class="col-sm-6 col-md-6">

                            <div class="form-group">

                                <div class="form-group">



                                    <div class="form-group">

                                        <label>SELECT ROLES <span class="asterisk">*</span></label>

                                        <select id="employee_role" name="select_role" class="form-control select2" style="width: 100%;">

                                            <option selected="selected" value="0">Select Role</option>

                                            <option>Sub-User</option>

                                        </select>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col-sm-6 col-md-6">



                        </div>

                      

                    </div>

                    <div class="row mb-10">

                        <div class="col-sm-6 col-md-6">

                            <div class="form-group">

                                <label>USERNAME <span class="asterisk">*</span></label>

                                <input type="text" class="form-control" placeholder="USERNAME" id="username" name="username">

                            </div>

                        </div>

                        <div class="col-sm-6 col-md-6">



                        </div>



                    </div>

                    <div class="row mb-10">

                        <div class="col-sm-6 col-md-6">

                            <div class="form-group">

                                <label>FIRST NAME <span class="asterisk">*</span></label>

                                <input type="text" class="form-control" placeholder="FIRST NAME" id="first_name" name="first_name">

                            </div>

                        </div>

                        <div class="col-sm-6 col-md-6">



                        </div>









                    </div>

                    <div class="row mb-10">

                        <div class="col-sm-6 col-md-6">

                            <div class="form-group">

                                <label>LAST NAME <span class="asterisk">*</span></label>

                                <input type="text" class="form-control" placeholder="LAST NAME" id="last_name" name="last_name">

                            </div>

                        </div>

                        <div class="col-sm-6 col-md-6">



                        </div>









                    </div>

                    <div class="row mb-10">

                        <div class="col-sm-6 col-md-6">

                            <div class="form-group">

                                <label>CONTACT NUMBER <span class="asterisk">*</span></label>

                                <div class="intl-tel-input">

    

                                    <input type="text" id="contact_number" name="contact_number" class="form-control" autocomplete="off" placeholder="CONTACT NUMBER" maxlength="15">

                                </div>

                            </div>

                        </div>

                        <div class="col-sm-6 col-md-6">



                        </div>









                    </div>

                    <div class="row mb-10">

                        <div class="col-sm-6 col-md-6">

                            <div class="form-group">

                                <label>E-MAIL <span class="asterisk">*</span></label>

                                <input type="text" class="form-control" placeholder="E-MAIL"  id="employee_email" name="employee_email" >

                            </div>

                        </div>

                        <div class="col-sm-6 col-md-6">



                        </div>

                    </div>

                    <div class="row mb-10">

                        <div class="col-md-12">

                            <div class="box-header with-border"

                                style="padding: 10px;border-bottom:none;border-radius:0;border-top:1px solid #c3c3c3">

                                <button type="button"  id="create_user" class="btn btn-rounded btn-primary mr-10">Create</button>

                                <button type="button" id="discard_user" class="btn btn-rounded btn-primary">Discard</button>

                            </div>

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





@include('mains.includes.footer')

@include('mains.includes.bottom-footer')

<script>  

        $("#discard_user").on("click",function()

        {

            window.history.back();

        });



        $(document).on("click","#create_user",function()

        {

            var employee_code=$("#employee_code").val();

            var employee_role=$("#employee_role").val(); 

            var username=$("#username").val();

            var first_name=$("#first_name").val();  

            var last_name=$("#last_name").val(); 

            var contact_number=$("#contact_number").val();

            var employee_email=$("#employee_email").val(); 

             var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/; 



            if(employee_code.trim()=="")

            {

                $("#employee_code").css("border","1px solid #cf3c63");

            }

            else

            {

             $("#employee_code").css("border","1px solid #9e9e9e"); 

            }



            if(employee_role.trim()=="0")

            {

                $("#employee_role").css("border","1px solid #cf3c63");

            }

            else

            {

             $("#employee_role").css("border","1px solid #9e9e9e"); 

            }



             if(username.trim()=="")

            {

                $("#username").css("border","1px solid #cf3c63");

            }

            else

            {

             $("#username").css("border","1px solid #9e9e9e"); 

            }

             if(first_name.trim()=="")

            {

                $("#first_name").css("border","1px solid #cf3c63");

            }

            else

            {

             $("#first_name").css("border","1px solid #9e9e9e"); 

            }

              if(last_name.trim()=="")

            {

                $("#last_name").css("border","1px solid #cf3c63");

            }

            else

            {

             $("#last_name").css("border","1px solid #9e9e9e"); 

            }

             if(contact_number.trim()=="")

            {

                $("#contact_number").css("border","1px solid #cf3c63");

            }

            else

            {

             $("#contact_number").css("border","1px solid #9e9e9e"); 

            }

             if(employee_email.trim()=="")

            {

                $("#employee_email").css("border","1px solid #cf3c63");

            }

            else

            {

             $("#employee_email").css("border","1px solid #9e9e9e"); 

            }

            if(!regex.test(employee_email.trim()) && employee_email.trim()!="")

            {

                $("#employee_email").css("border","1px solid #cf3c63");

            }



            if(employee_code.trim()=="")

            {

                $("#employee_code").focus();

            }

            else if(employee_role.trim()=="0")

            {

                $("#employee_role").focus();

            }

              else if(username.trim()=="")

            {

                $("#username").focus();

            }

             else if(first_name.trim()=="")

            {

                $("#first_name").focus();

            }

            else if(last_name.trim()=="")

            {

                $("#last_name").focus();

            }

            else if(contact_number.trim()=="")

            {

                $("#contact_number").focus();

            }

            else if(employee_email.trim()=="")

            {

                $("#employee_email").focus();

            }

            else if(!regex.test(employee_email.trim()))

            {

                $("#employee_email").focus();

            }

            else

            {

                $("#create_user").prop("disabled",true);

                var formdata=new FormData($("#user_form")[0]);

                $.ajax({

                    url:"{{route('insert-user')}}",

                    data: formdata,

                    type:"POST",

                    processData: false,

                    contentType: false,

                    success:function(response)

                    {

                       if(response.indexOf("exist")!=-1)

                       {

                          swal("Already Exist!", "User with this email or username already exists");

                       }

                      else if(response.indexOf("success")!=-1)

                      {

                        swal({title:"Success",text:"User Created Successfully !",type: "success"},

                         function(){ 

                             location.reload();

                         });

                      }

                      else if(response.indexOf("fail")!=-1)

                      {

                       swal("ERROR", "User cannot be inserted right now! ");

                      }

                        $("#create_user").prop("disabled",false);

                    }

                });  

            }







        });

</script>

</body>

</html>

