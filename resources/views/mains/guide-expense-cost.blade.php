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
                                <h3 class="page-title">Guide Expenses Cost</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Masters</li>
                                            <li class="breadcrumb-item active" aria-current="page">Add New Guide Expenses Cost
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
                                    <h4 class="box-title">Add New Guide Expenses Cost</h4>
                                </div>
                                <div class="box-body">
                                    <form class="package_form" action="javascript:void()" method="POST" id="menu_form">
                                        {{csrf_field()}}
                                        <div class="row mb-10">
                                            <div class="col-sm-4 col-md-4">
                                                <div class="form-group">
                                                    <label>Guide Expenses Name <span class="asterisk">*</span></label>
                                                    <select class="form-control" id="guide_expense_name" name="guide_expense_name" autofocus="autofocus">
                                                        <option value="0">SELECT GUIDE EXPENSES TYPE</option>
                                                        <option value="HOTEL COST">HOTEL COST</option>
                                                        <option value="FOOD COST">FOOD COST</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="row mb-10">
                                            <div class="col-sm-4 col-md-4">
                                                <div class="form-group">
                                                    <label>Guide Expenses Cost <span class="asterisk">*</span></label>
                                                    <input type="number" min=0 class="form-control" placeholder="Guide Expenses Cost" id="guide_expense_cost" name="guide_expense_cost" autofocus>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-10">
                                            <div class="col-md-12">
                                                <button type="button"  id="save_guide_expense" class="btn btn-rounded btn-primary mr-10 pull-right">Submit</button>
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
                                    <h4 class="box-title">View Guide Expenses Cost</h4>
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
                                            @foreach($fetch_guide_expense as $guide_expense)
                                            <tr class="tr_{{$guide_expense->guide_expense_id}}">
                                                <td>{{$guide_expense->guide_expense_id}}</td>
                                                <td id="guide_expense_{{$guide_expense->guide_expense_id}}">{{$guide_expense->guide_expense}}</td>
                                                <td id="guide_expense_cost_{{$guide_expense->guide_expense_id}}">{{$guide_expense->guide_expense_cost}}</td>
                                                 <td><button id="edit_{{$guide_expense->guide_expense_id}}" class="btn btn-default btn-rounded edit_fuel"><i class="fa fa-pencil"></i></button></td>
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
       
        <h4 class="modal-title">Edit Guide Expenses</h4>
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
                                                     <input type="hidden" id="edit_guide_expense_id" name="guide_expense_id">
                                                    <label>Guide Expenses Name <span class="asterisk">*</span></label>
                                                    <select class="form-control" id="edit_guide_expense_name" name="guide_expense_name" autofocus="autofocus">
                                                        <option value="0">SELECT GUIDE EXPENSES TYPE</option>
                                                        <option value="HOTEL COST">HOTEL COST</option>
                                                        <option value="FOOD COST">FOOD COST</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="row mb-10">
                                            <div class="col-sm-4 col-md-4">
                                                <div class="form-group">
                                                    <label>Guide Expenses Cost <span class="asterisk">*</span></label>
                                                    <input type="number" min=0 class="form-control" placeholder="Guide Expenses Cost" id="edit_guide_expense_cost" name="guide_expense_cost">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
            </div>
        </div>
        
      </div>
      <div class="modal-footer">
        
         <button type="button"  id="update_guide_expense" class="btn btn-rounded btn-primary mr-10 ">Submit</button>
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

    $(document).on("click","#save_guide_expense",function()
    {
        var guide_expense_name=$("#guide_expense_name").val();
        var guide_expense_cost=$("#guide_expense_cost").val();

        if(guide_expense_name.trim()=="0")
        {
            $("#guide_expense_name").parent().find(".select2-selection").css("border","1px solid #cf3c63");
        }
        else
        {
            $("#guide_expense_name").parent().find(".select2-selection").css("border","1px solid #9e9e9e");
        }

        if(guide_expense_cost.trim()=="")
        {
            $("#guide_expense_cost").css("border","1px solid #cf3c63");
        }
        else
        {
            $("#guide_expense_cost").css("border","1px solid #9e9e9e");
        }


        if(guide_expense_name.trim()=="0")
        {
            $("#guide_expense_name").parent().find(".select2-selection").focus();
        }
        else  if(guide_expense_cost.trim()=="")
        {
            $("#guide_expense_cost").focus();
        }
        else
        {
            $("#save_guide_expense").prop("disabled",true);
            var formdata=new FormData($("#menu_form")[0]);
            $.ajax({
                url:"{{route('guide-expense-cost-insert')}}",
                data: formdata,
                type:"POST",
                processData: false,
                contentType: false,
                success:function(response)
                {
                    if(response.indexOf("exist")!=-1)
                    {
                        swal("Already Exist!", "Guide Expenses Cost already exists");
                    }
                    else if(response.indexOf("success")!=-1)
                    {
                        swal({title:"Success",text:"Guide Expenses Cost Created Successfully !",type: "success"},
                            function(){
                                location.reload();
                            });
                    }
                    else if(response.indexOf("fail")!=-1)
                    {
                        swal("ERROR", "Guide Expenses Cost cannot be inserted right now! ");
                    }
                    $("#save_guide_expense").prop("disabled",false);
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

        var guide_expense_cost=$("#guide_expense_cost_"+actual_id[1]).text();
        var guide_expense_name=$("#guide_expense_"+actual_id[1]).text();
        $("#edit_guide_expense_cost").val(guide_expense_cost);
        $("#edit_guide_expense_name").val(guide_expense_name);
        $("#edit_guide_expense_id").val(actual_id[1]);


        $("#editModal").modal("show"); 
    });

    $(document).on("click","#update_guide_expense",function()
    {
    var guide_expense_name=$("#edit_guide_expense_name").val();
    var guide_expense_cost=$("#edit_guide_expense_cost").val();

    if(guide_expense_name.trim()=="0")
    {
    $("#edit_guide_expense_name").parent().find(".select2-selection").css("border","1px solid #cf3c63");
    }
    else
    {
    $("#edit_guide_expense_name").parent().find(".select2-selection").css("border","1px solid #9e9e9e");
    }

    if(guide_expense_cost.trim()=="")
    {
    $("#edit_guide_expense_cost").css("border","1px solid #cf3c63");
    }
    else
    {
    $("#edit_guide_expense_cost").css("border","1px solid #9e9e9e");
    }
    
    
    if(guide_expense_name.trim()=="0")
    {
    $("#edit_guide_expense_name").parent().find(".select2-selection").focus();
    }
    else  if(guide_expense_cost.trim()=="")
    {
    $("#edit_guide_expense_cost").focus();
    }
    else
    {
    $("#update_guide_expense").prop("disabled",true);
            var formdata=new FormData($("#edit_menu_form")[0]);
            $.ajax({
                url:"{{route('guide-expense-cost-update')}}",
                data: formdata,
                type:"POST",
                processData: false,
                contentType: false,
                success:function(response)
                {
                    if(response.indexOf("exist")!=-1)
                    {
                        swal("Already Exist!", "Guide Expenses Cost already exists");
                    }
                    else if(response.indexOf("success")!=-1)
                    {
                        swal({title:"Success",text:"Guide Expenses Cost Updated Successfully !",type: "success"},
                            function(){
                                location.reload();
                            });
                    }
                    else if(response.indexOf("fail")!=-1)
                    {
                        swal("ERROR", "Guide Expenses Cost cannot be updated right now! ");
                    }
                    $("#update_guide_expense").prop("disabled",false);
                }
            });
    }
    });
    </script>

</body>
</html>