@include('mains.includes.top-header')
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
                                <h3 class="page-title">Fuel Type Cost</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Masters</li>
                                            <li class="breadcrumb-item active" aria-current="page">Add New Fuel Type Cost
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
                                    <h4 class="box-title">Add New Fuel Type Cost</h4>
                                </div>
                                <div class="box-body">
                                    <form class="package_form" action="javascript:void()" method="POST" id="menu_form">
                                        {{csrf_field()}}
                                        <div class="row mb-10">
                                            <div class="col-sm-4 col-md-4">
                                                <div class="form-group">
                                                    <label>Fuel Type Name <span class="asterisk">*</span></label>
                                                    <select class="form-control" id="fuel_type_name" name="fuel_type_name" autofocus="autofocus">
                                                        <option value="0">SELECT FUEL TYPE</option>
                                                        <option value="EURO REGULAR">EURO REGULAR</option>
                                                        <option value="EURO DIESEL">EURO DIESEL</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="row mb-10">
                                            <div class="col-sm-4 col-md-4">
                                                <div class="form-group">
                                                    <label>Fuel Type Cost <span class="asterisk">*</span></label>
                                                    <input type="number" min=0 class="form-control" placeholder="Fuel Type Cost" id="fuel_type_cost" name="fuel_type_cost" autofocus>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-10">
                                            <div class="col-md-12">
                                                <button type="button"  id="save_fuel_type" class="btn btn-rounded btn-primary mr-10 pull-right">Submit</button>
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
                                    <h4 class="box-title">View Fuel Type Cost</h4>
                                </div>
                                <div class="box-body">
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered table-striped datatable">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>NAME</th>
                                                <th>COST</th>
                                                  <th>ACTION</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($fetch_fuel_type as $fuel_type)
                                            <tr class="tr_{{$fuel_type->fuel_type_id}}">
                                                <td>{{$fuel_type->fuel_type_id}}</td>
                                                <td id="fuel_type_{{$fuel_type->fuel_type_id}}">{{$fuel_type->fuel_type}}</td>
                                                <td id="fuel_type_cost_{{$fuel_type->fuel_type_id}}">{{$fuel_type->fuel_type_cost}}</td>
                                                 <td><button id="edit_{{$fuel_type->fuel_type_id}}" class="btn btn-default btn-rounded edit_fuel"><i class="fa fa-pencil"></i></button></td>
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
       <!-- Modal -->
<div id="editModal" class="modal fade" role="dialog" style="z-index: 9999">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Fuel Type</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <form class="package_form" action="javascript:void()" method="POST" id="edit_menu_form">
                                        {{csrf_field()}}
                                        <div class="row mb-10">
                                            <div class="col-sm-4 col-md-4">
                                                <div class="form-group">
                                                     <input type="hidden" id="edit_fuel_type_id" name="fuel_type_id">
                                                    <label>Fuel Type Name <span class="asterisk">*</span></label>
                                                    <select class="form-control" id="edit_fuel_type_name" name="fuel_type_name" autofocus="autofocus">
                                                        <option value="0">SELECT FUEL TYPE</option>
                                                        <option value="EURO REGULAR">EURO REGULAR</option>
                                                        <option value="EURO DIESEL">EURO DIESEL</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="row mb-10">
                                            <div class="col-sm-4 col-md-4">
                                                <div class="form-group">
                                                    <label>Fuel Type Cost <span class="asterisk">*</span></label>
                                                    <input type="number" min=0 class="form-control" placeholder="Fuel Type Cost" id="edit_fuel_type_cost" name="fuel_type_cost">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
            </div>
        </div>
        
      </div>
      <div class="modal-footer">
        
         <button type="button"  id="update_fuel_type" class="btn btn-rounded btn-primary mr-10 ">Submit</button>
        <button type="button" class="btn btn-default mr-10 pull-right" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
    <script>
    $(document).ready(function()
    {
        $(".datatable").DataTable();

        $(".select2").select2();
    });

    $(document).on("click","#save_fuel_type",function()
    {
        var fuel_type_name=$("#fuel_type_name").val();
        var fuel_type_cost=$("#fuel_type_cost").val();

        if(fuel_type_name.trim()=="0")
        {
            $("#fuel_type_name").parent().find(".select2-selection").css("border","1px solid #cf3c63");
        }
        else
        {
            $("#fuel_type_name").parent().find(".select2-selection").css("border","1px solid #9e9e9e");
        }

        if(fuel_type_cost.trim()=="")
        {
            $("#fuel_type_cost").css("border","1px solid #cf3c63");
        }
        else
        {
            $("#fuel_type_cost").css("border","1px solid #9e9e9e");
        }


        if(fuel_type_name.trim()=="0")
        {
            $("#fuel_type_name").parent().find(".select2-selection").focus();
        }
        else  if(fuel_type_cost.trim()=="")
        {
            $("#fuel_type_cost").focus();
        }
        else
        {
            $("#save_fuel_type").prop("disabled",true);
            var formdata=new FormData($("#menu_form")[0]);
            $.ajax({
                url:"{{route('fuel-type-cost-insert')}}",
                data: formdata,
                type:"POST",
                processData: false,
                contentType: false,
                success:function(response)
                {
                    if(response.indexOf("exist")!=-1)
                    {
                        swal("Already Exist!", "Fuel Type Cost already exists");
                    }
                    else if(response.indexOf("success")!=-1)
                    {
                        swal({title:"Success",text:"Fuel Type Cost Created Successfully !",type: "success"},
                            function(){
                                location.reload();
                            });
                    }
                    else if(response.indexOf("fail")!=-1)
                    {
                        swal("ERROR", "Fuel Type Cost cannot be inserted right now! ");
                    }
                    $("#save_fuel_type").prop("disabled",false);
                }
            });
        }
    });
</script>

    <script> 
    $(document).on("click",".edit_fuel",function()
    {
        var id=this.id;

        var actual_id=id.split("_");

        var fuel_type_cost=$("#fuel_type_cost_"+actual_id[1]).text();
        var fuel_type_name=$("#fuel_type_"+actual_id[1]).text();
        $("#edit_fuel_type_cost").val(fuel_type_cost);
        $("#edit_fuel_type_name").val(fuel_type_name);
        $("#edit_fuel_type_id").val(actual_id[1]);


        $("#editModal").modal("show"); 
    });

    $(document).on("click","#update_fuel_type",function()
    {
    var fuel_type_name=$("#edit_fuel_type_name").val();
    var fuel_type_cost=$("#edit_fuel_type_cost").val();

    if(fuel_type_name.trim()=="0")
    {
    $("#edit_fuel_type_name").parent().find(".select2-selection").css("border","1px solid #cf3c63");
    }
    else
    {
    $("#edit_fuel_type_name").parent().find(".select2-selection").css("border","1px solid #9e9e9e");
    }

    if(fuel_type_cost.trim()=="")
    {
    $("#edit_fuel_type_cost").css("border","1px solid #cf3c63");
    }
    else
    {
    $("#edit_fuel_type_cost").css("border","1px solid #9e9e9e");
    }
    
    
    if(fuel_type_name.trim()=="0")
    {
    $("#edit_fuel_type_name").parent().find(".select2-selection").focus();
    }
    else  if(fuel_type_cost.trim()=="")
    {
    $("#edit_fuel_type_cost").focus();
    }
    else
    {
    $("#update_fuel_type").prop("disabled",true);
            var formdata=new FormData($("#edit_menu_form")[0]);
            $.ajax({
                url:"{{route('fuel-type-cost-update')}}",
                data: formdata,
                type:"POST",
                processData: false,
                contentType: false,
                success:function(response)
                {
                    if(response.indexOf("exist")!=-1)
                    {
                        swal("Already Exist!", "Fuel Type Cost already exists");
                    }
                    else if(response.indexOf("success")!=-1)
                    {
                        swal({title:"Success",text:"Fuel Type Cost Update Successfully !",type: "success"},
                            function(){
                                location.reload();
                            });
                    }
                    else if(response.indexOf("fail")!=-1)
                    {
                        swal("ERROR", "Fuel Type Cost cannot be updated right now! ");
                    }
                    $("#update_fuel_type").prop("disabled",false);
                }
            });
    }
    });
    </script>

</body>
</html>