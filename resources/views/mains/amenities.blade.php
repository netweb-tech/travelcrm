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
                                <h3 class="page-title">Amenities</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Masters</li>
                                            <li class="breadcrumb-item active" aria-current="page">Add New Amenities
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
                                    <h4 class="box-title">Add New Amenities</h4>
                                </div>
                                <div class="box-body">
                                    <form class="package_form" action="javascript:void()" method="POST" id="menu_form">
                                        {{csrf_field()}}
                                        <div class="row mb-10">
                                            <div class="col-sm-4 col-md-4">
                                                <div class="form-group">
                                                    <input type="hidden" name="menu_pid" value="0">
                                                    <label>Amenities Name <span class="asterisk">*</span></label>
                                                    <input type="text" class="form-control" placeholder="Name" id="amenities_name" name="amenities_name" autofocus>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-10">
                                            <div class="col-md-12">
                                                <button type="button"  id="save_amenities" class="btn btn-rounded btn-primary mr-10 pull-right">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                     <div class="row">
                        <div class="col-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h4 class="box-title">View Amenities</h4>
                                </div>
                                <div class="box-body">
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered table-striped datatable">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>NAME</th>
                                                 <td>STATUS</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($fetch_amenities as $amenities)
                                            <tr class="tr_{{$amenities->amenities_id}}">
                                                <td>{{$amenities->amenities_id}}</td>
                                                <td>{{$amenities->amenities_name}}</td>
                                                <td>@if($amenities->amenities_status==1)
                                                            <button type="button" class="btn btn-sm btn-rounded inactive btn-primary" id="inactive_amenities_{{$amenities->amenities_id}}" >Active</button>
                                                            @else
                                                            <button type="button" class="btn btn-sm btn-rounded active btn-default" id="active_amenities_{{$amenities->amenities_id}}">InActive</button>
                                                            @endif</td>
                                            </tr>

                                            @endforeach
                                            </tbody>
                                            
                                        </table>
                                    </div>
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
    $(document).ready(function()
    {
        $(".datatable").DataTable();
    });

    $(document).on("click","#save_amenities",function()
    {
    var amenities_name=$("#amenities_name").val();

    if(amenities_name.trim()=="")
    {
    $("#amenities_name").css("border","1px solid #cf3c63");
    }
    else
    {
    $("#amenities_name").css("border","1px solid #9e9e9e");
    }
    
    
    if(amenities_name.trim()=="")
    {
    $("#amenities_name").focus();
    }
    else
    {
    $("#save_amenities").prop("disabled",true);
    var formdata=new FormData($("#menu_form")[0]);
    $.ajax({
    url:"{{route('amenities-insert')}}",
    data: formdata,
    type:"POST",
    processData: false,
    contentType: false,
    success:function(response)
    {
    if(response.indexOf("exist")!=-1)
    {
    swal("Already Exist!", "Amenities Name already exists");
    }
    else if(response.indexOf("success")!=-1)
    {
    swal({title:"Success",text:"Amenities Created Successfully !",type: "success"},
    function(){
    location.reload();
    });
    }
    else if(response.indexOf("fail")!=-1)
    {
    swal("ERROR", "Amenities cannot be inserted right now! ");
    }
    $("#save_amenities").prop("disabled",false);
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

            swal({
                title: "Are you sure?",
                text: "You want to activate this amenity !",
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
                        url:"{{route('update-amenities-active')}}",
                        type:"POST",
                        data:{"_token":"{{csrf_token()}}",
                        "action_perform":action_perform,
                        "amenities_id":action_id},
                        success:function(response)
                        {
                            if(response.indexOf("success")!=-1)
                            {
                                $("#"+id).parent().html('<button type="button" class="btn btn-sm btn-rounded btn-primary inactive" id="inactive_amenities_'+action_id+'">Active</button>');

                                swal("Activated!", "Selected Amenity has been activated.", "success");
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

        
    

    });
    $(document).on("click",'.inactive',function()
    {
        var id=this.id;
        var actual_id=id.split("_");

        var action_name=actual_id[1];
        var action_perform=actual_id[0];
        var action_id=actual_id[2];
            swal({
                title: "Are you sure?",
                text: "You want to inactive this amenity !",
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
                        url:"{{route('update-amenities-active')}}",
                        type:"POST",
                        data:{"_token":"{{csrf_token()}}",
                        "action_perform":action_perform,
                        "amenities_id":action_id},
                        success:function(response)
                        {
                            if(response.indexOf("success")!=-1)
                            {
                                $("#"+id).parent().html('<button type="button" class="btn btn-sm btn-rounded btn-default active" id="active_amenities_'+action_id+'">InActive</button>');

                                swal("Inactivated!", "Selected Amenity has been inactivated.", "success");
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



        

    });
    </script>


</body>
</html>