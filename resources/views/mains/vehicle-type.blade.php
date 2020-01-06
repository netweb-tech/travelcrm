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
                                <h3 class="page-title">Vehicle Type</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Masters</li>
                                            <li class="breadcrumb-item active" aria-current="page">Add New Vehicle Type
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
                                    <h4 class="box-title">Add New Vehicle Type</h4>
                                </div>
                                <div class="box-body">
                                    <form class="package_form" action="javascript:void()" method="POST" id="menu_form">
                                        {{csrf_field()}}
                                        <div class="row mb-10">
                                            <div class="col-sm-4 col-md-4">
                                                <div class="form-group">
                                                    <input type="hidden" name="menu_pid" value="0">
                                                    <label>Vehicle Type Name <span class="asterisk">*</span></label>
                                                    <input type="text" class="form-control" placeholder="Name" id="vehicle_type_name" name="vehicle_type_name" autofocus>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-10">
                                            <div class="col-md-12">
                                                <button type="button"  id="save_vehicle_type" class="btn btn-rounded btn-primary mr-10 pull-right">Submit</button>
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
                                    <h4 class="box-title">View Vehicle Type</h4>
                                </div>
                                <div class="box-body">
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered table-striped datatable">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>NAME</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($fetch_vehicle_type as $vehicle_type)
                                            <tr>
                                                <td>{{$vehicle_type->vehicle_type_id}}</td>
                                                <td>{{$vehicle_type->vehicle_type_name}}</td>
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

    $(document).on("click","#save_vehicle_type",function()
    {
    var vehicle_type_name=$("#vehicle_type_name").val();

    if(vehicle_type_name.trim()=="")
    {
    $("#vehicle_type_name").css("border","1px solid #cf3c63");
    }
    else
    {
    $("#vehicle_type_name").css("border","1px solid #9e9e9e");
    }
    
    
    if(vehicle_type_name.trim()=="")
    {
    $("#vehicle_type_name").focus();
    }
    else
    {
    $("#save_vehicle_type").prop("disabled",true);
    var formdata=new FormData($("#menu_form")[0]);
    $.ajax({
    url:"{{route('vehicle-type-insert')}}",
    data: formdata,
    type:"POST",
    processData: false,
    contentType: false,
    success:function(response)
    {
    if(response.indexOf("exist")!=-1)
    {
    swal("Already Exist!", "Vehicle Type Name already exists");
    }
    else if(response.indexOf("success")!=-1)
    {
    swal({title:"Success",text:"Vehicle Type Created Successfully !",type: "success"},
    function(){
    location.reload();
    });
    }
    else if(response.indexOf("fail")!=-1)
    {
    swal("ERROR", "Vehicle Type cannot be inserted right now! ");
    }
    $("#save_vehicle_type").prop("disabled",false);
    }
    });
    }
    });
    </script>

</body>
</html>