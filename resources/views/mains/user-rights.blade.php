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
    span.select2.select2-container.select2-container--default.select2-container--below {
    width: 100% !important;
}
select#admin_which9 {
    width: 100% !important;
}

.checkbox {
    display: inline-block;
    margin: 0;
}

    div#cke_1_contents {

        height: 250px !important;

    }
     #table-loader svg{
    width: 100px;
    height: 100px;
    display:inline-block;
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

                <h3 class="page-title">User Rights</h3>

                <div class="d-inline-block align-items-center">

                    <nav>

                        <ol class="breadcrumb">

                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>

                            <li class="breadcrumb-item" aria-current="page">Home</li>

                            <li class="breadcrumb-item active" aria-current="page">Assign User Rights

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

            <h4 class="box-title">User Rights</h4>

          </div>

          <div class="box-body">
           <form id="rights_form" method="post">
            <div class="row">
              <div class="col-md-4">

                <div class="form-group" id="sponser_div" style="display:block;">

                  <label class="textfield_error" id="employees_error">&nbsp;</label>

                  <select class="form-control textfield" id="employees" name="employees">

                    <option value="">--Select Employee--</option>
                    @foreach($get_users as $users)
                    <option value="{{$users->users_id}}">{{$users->users_fname}} {{$users->users_lname}}</option>
                    @endforeach

                  </select>

                </div>

              </div>
            </div>
            <?php
            $inputcount=1;
            ?>
            <div id="table-loader" class="text-center" style="display: none">
              <svg version="1.1" id="L5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
              viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
              <circle fill="#F33D38" stroke="none" cx="6" cy="50" r="6">
                <animateTransform 
                attributeName="transform" 
                dur="1s" 
                type="translate" 
                values="0 15 ; 0 -15; 0 15" 
                repeatCount="indefinite" 
                begin="0.1"/>
              </circle>
              <circle fill="#F33D38" stroke="none" cx="30" cy="50" r="6">
                <animateTransform 
                attributeName="transform" 
                dur="1s" 
                type="translate" 
                values="0 10 ; 0 -10; 0 10" 
                repeatCount="indefinite" 
                begin="0.2"/>
              </circle>
              <circle fill="#F33D38" stroke="none" cx="54" cy="50" r="6">
                <animateTransform 
                attributeName="transform" 
                dur="1s" 
                type="translate" 
                values="0 5 ; 0 -5; 0 5" 
                repeatCount="indefinite" 
                begin="0.3"/>
              </circle>
            </svg>
          </div>
          <div id="main_rights_div">   

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
  $(document).on("change","#employees",function()
  {
    var emp_id=$("#employees").val();
    if(emp_id!='')
    {
     $("#success_div").hide();
     $("#error_div").hide();
      $("#table-loader").show();
      $("#main_rights_div").empty();
      $.ajax({
        url:"{{route('user-rights-fetch')}}",
        type:"GET",
        data:{"emp_id":emp_id},
        dataType:"JSON",
        success:function(response)
        {
          if(response.result=="success")
          {
            $("#main_rights_div").html(response.data);
            $('.select-multiple').select2({
              placeholder: "--Select--",
              allowClear: true
            });

            if(response.nor_display_content!="")
            {
              if(response.nor_display_content.indexOf(',')!=-1)
              {
                var new_data=response.nor_display_content
                var data_none_array=new_data.split(',');

                for($count_none=0;$count_none< data_none_array.length;$count_none++)
                {
                 var data_none=data_none_array[$count_none];
                 var id=data_none.charAt(data_none.length - 1);
                 $("#divRightData"+id).hide();
                 $("#show_rights_data"+id).removeClass('minus').addClass('plus');
                 $("#show_rights_data"+id).children('i').removeClass('fa-minus-square-o').addClass('fa-plus-square-o');
               }
             }
             else
             {
              var data_none=response.nor_display_content;
              var id=data_none.charAt(data_none.length - 1);
              $("#divRightData"+id).hide();
              $("#show_rights_data"+id).removeClass('minus').addClass('plus');
              $("#show_rights_data"+id).children('i').removeClass('fa-minus-square-o').addClass('fa-plus-square-o');
            }
          }
        }
        else
        {
         $("#main_rights_div").html(response.data);
         $('.select-multiple').select2({
          placeholder: "--Select--",
          allowClear: true
        });
       }
       $("#table-loader").hide();
     }
   });
    }
  });
</script>

<script>
  function showRights(id)
  {
    if($("#show_rights_data"+id).hasClass('plus'))
    {
      $("#divRightData"+id).show();
      $("#show_rights_data"+id).removeClass('plus').addClass('minus');
      $("#show_rights_data"+id).children('i').removeClass('fa-plus-square-o').addClass('fa-minus-square-o');
    }
    else if($("#show_rights_data"+id).hasClass('minus'))
    {
     $("#divRightData"+id).hide();
     $("#show_rights_data"+id).removeClass('minus').addClass('plus');
     $("#show_rights_data"+id).children('i').removeClass('fa-minus-square-o').addClass('fa-plus-square-o');
   }
 }

 function fillOutAllCheck(id)
 {
  if($("#radiobtn_full"+id+":checked").val()=="Full")
  {
    $(".rights"+id).prop("checked",true);
    $(".rights1"+id).prop("disabled",false);
    $(".rights1"+id+" option").prop("selected",true).trigger("change");
  }
  else if($("#radiobtn_partial"+id+":checked").val()=="Partial")
  {
   $(".rights"+id).prop("checked",false);
   $(".rights1"+id).prop("disabled",true);
   $(".rights1"+id).val(null).trigger("change");
 }
}

function fillOutSingleCheck(id)
{

  if($("#single_row_rights"+id).prop("checked")===true)
  {
    $(".add"+id).prop("checked",true);
    $(".view"+id).prop("checked",true);
    $(".edit_delete"+id).prop("checked",true);
    $(".report"+id).prop("checked",true);
    // $(".admin"+id).prop("checked",true);
    $(".sadmin"+id).prop("checked",true);
    $(".admin_which"+id).prop("disabled",false);
    $(".admin_which"+id+" option").prop("selected",true).trigger("change");
  }
  else if($("#single_row_rights"+id).prop("checked")===false)
  {
   $(".add"+id).prop("checked",false);
   $(".view"+id).prop("checked",false);
   $(".edit_delete"+id).prop("checked",false);
   $(".report"+id).prop("checked",false);
   // $(".admin"+id).prop("checked",true);
   $(".sadmin"+id).prop("checked",false);
   $(".admin_which"+id).prop("disabled",true);
   $(".admin_which"+id).val(null).trigger("change");
  

   }
 }

   function activeSelect(id)
   {

     if($(".sadmin"+id).prop("checked")===true)
     {
      $("#admin_which"+id).prop("disabled",false);

    }
    else if($(".sadmin"+id).prop("checked")===false)
    {
      $("#admin_which"+id).prop("disabled",true);
      $('select[name="admin_which'+id+'[]"]').val(null).trigger("change");
      $("#submit").prop("disabled",false);
    }
  }


  function removeCheck(id)
  {
    // var check_count=0;
    // if($(".add"+id).prop("checked")===true)
    //     check_count++;
    // if($(".view"+id).prop("checked")===true)
    //     check_count++;
    // if($(".edit_delete"+id).prop("checked")===true)
    //     check_count++;
    // if($(".report"+id).prop("checked")===true)
    //     check_count++;
    // if($(".admin"+id).prop("checked")===true)
    //     check_count++;
    // if($(".sadmin"+id).prop("checked")===true)
    //     check_count++;

    // if(check_count>=6)
    //     $(".single_row_rights"+id).prop("checked",true);
    // else
    //     $(".single_row_rights"+id).prop("checked",false);
  }


  function checkIndividual(id)
  {
    var selected_data=$('select[name="admin_which'+id+'[]"]').val().join(',');

    if(selected_data.indexOf(',')!=-1)
    {
      var data=selected_data.split(',');

      for($count_data=0;$count_data<data.length;$count_data++)
      {
       if($("."+data[$count_data]+id).prop("checked")===true)
       {
                // $("#submit").prop("disabled",false);
              }
              else if($("."+data[$count_data]+id).prop("checked")===false)
              {
              swal("Error", "You cannot give admin rights until or unless you assign the indiviudal right for the same.");
               $("#submit").prop("disabled",true);
             }
           }
         }
         else
         {
          if($("."+selected_data+id).prop("checked")===true)
          {
            $("#submit").prop("disabled",false);
          }
          else if($("."+selected_data+id).prop("checked")===false)
          {
             swal("Error", "You cannot give admin rights until or unless you assign the indiviudal right for the same.");
           $("#submit").prop("disabled",true);
         }
         else
         {
          $("#submit").prop("disabled",false);
        }
      }


    }
  </script>
   <script>
    $(document).on("click","#submit",function()
    {
      $(".textfield_error").hide();

      if($("#employees").val().trim()=="")
      {
        $("#employees_error").text("Please Select Employee--");
        $("#employees_error").show();

    }


    if($("#employees").val().trim()=="")
       $("#employees").focus();
   else
   {


    $("#submit").prop("disabled",true);
    var formdata=$("#rights_form").serialize();

    $.ajax({
      url:"{{route('user-rights-insert')}}",
      type:"POST",
      data:formdata,
      success:function(response)
      {
        if(response.indexOf("success")!=-1)
        {
            swal({title:"Success",text:"User Rights Asssigned Successfully !",type: "success"},

                 function(){ 

                     location.reload();

                 });

      }
      else
      {
       swal("Error", "User Rights cannot be assigned right now");
   }
   $("#submit").prop("disabled",false);
}
});
}
});
</script>
<script>


  $(document).ready(function() {

    $('.select-multiple').select2({

      placeholder: "--Select--",

      allowClear: true

    });
  });


</script>

</body>

</html>

