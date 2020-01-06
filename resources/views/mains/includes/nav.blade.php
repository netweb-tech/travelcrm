<?php

use App\Http\Controllers\LoginController;

$menus=LoginController::menu_fetch();

$new_array=array();

$new_array=$menus['rights'];
?>


      <!-- Left side column. contains the logo and sidebar -->


      <aside class="main-sidebar">


          <!-- sidebar-->


          <section class="sidebar">


            <!-- sidebar menu-->

              @if($menus['type']=="admin")

         <!--In case of Admin-->



       <ul class="sidebar-menu" data-widget="tree">

      @foreach($menus['fetch_menu'] as $main_menu)

      @php 

      $count=0;

      @endphp



      @foreach($menus['sub_menu']  as $sub_menu)

      <?php

      if($sub_menu->menu_pid==$main_menu->menu_id)

        $count++;

    ?>

    @endforeach



    @if($count==0)

       <li class="link-a {{$main_menu->menu_id}}_menu">

        @else

          <li class="treeview {{$main_menu->menu_id}}_menu">

            @endif



            @if($main_menu->menu_file=='#')

            <a href='#'>

                @else

                <a href='{{route("$main_menu->menu_file")}}'>

                    @endif



                    @if($main_menu->menu_file=='dashboard')

                    <i class="fa fa-tachometer"></i>

                    @else

                    <i class="fa fa-cogs"></i>

                    @endif

                    <span>{{$main_menu->menu_name}}</span>



                    @if($count>0)

                    <span class="pull-right-container"><i class="fa fa-angle-right pull-right"></i></span>

                    @endif



                </a>

                @if($count>0)

                <ul class="treeview-menu" style="display: none;">

                  @foreach($menus['sub_menu'] as $sub_menu)

                  <?php

                  if($sub_menu->menu_pid==$main_menu->menu_id)

                  {

                    ?>

                    <li><a href='{{route("$sub_menu->menu_file")}}'><i class="fa fa-circle-o"></i> {{$sub_menu->menu_name}}</a></li>

                    <?php

                }

                ?>

                @endforeach





            </ul>

            @endif



        </li>



        @endforeach







    </ul>

    @else



    <!--In case of employees-->

    <!-- menus according to rights -->

    <ul class="sidebar-menu" data-widget="tree">
@if($new_array[0]!="no_rights_available")
  <?php



  $non_display_menus=array();

  ?>

  @foreach($menus['fetch_menu'] as $main_menu)

  @php 

  $count=0;

  $show=0;

  $check_none=0;

  $sub_count=0;

  $array_key="";

  @endphp



  @foreach($menus['sub_menu']  as $sub_menu)

  <?php

  if($sub_menu->menu_pid==$main_menu->menu_id)
  {

    foreach($new_array as $key => $data_values)
    {
        if($data_values['menu']==$sub_menu->menu_file)
        {
            $array_key=$key;  
            if($new_array[$array_key]['add_status']==1 || $new_array[$array_key]['view_status']==1)
            {
             $count++;
             $sub_count++;
            }
            else
            {
               $sub_count++;
            }
    

     }



 }



}

if($sub_count==0)
{
  foreach($new_array as $key => $data_values)
  {
    if($data_values['menu']==$main_menu->menu_file)
    {
      $array_key=$key;  
      if($new_array[$array_key]['add_status']==1 || $new_array[$array_key]['view_status']==1)
      {
        $check_none++;
      }


    }
  }
}

?>

@endforeach



@if($count==0)

       <li class="link-a {{$main_menu->menu_id}}_menu">

    @else

 <li class="treeview {{$main_menu->menu_id}}_menu">

        @endif

        

        @if($main_menu->menu_file=='#')

        <a href='#'>

            @else

            <a href='{{route("$main_menu->menu_file")}}'>

                @endif



                @if($main_menu->menu_file=='dashboard')

                <i class="fa fa-tachometer"></i>

                @else

                <i class="fa fa-cogs"></i>

                @endif

                <span>{{$main_menu->menu_name}}</span>



                @if($count>0)

                <span class="pull-right-container"><i class="fa fa-angle-right pull-right"></i></span>

                @endif



            </a>

            @if($count>0)

            <ul class="treeview-menu" style="display: none;">





                @foreach($menus['sub_menu'] as $sub_menu)

                <?php

                $show=0;

                ?>

                @if($sub_menu->menu_pid==$main_menu->menu_id)



                @foreach($new_array as $key => $data_values)
                  
                @if($data_values['menu']==$sub_menu->menu_file)

                <?php

                $array_key=$key;
                if($new_array[$array_key]['add_status']==1 || $new_array[$array_key]['view_status']==1)

                {

                    $show++;

                    $check_none++;

                }

                ?>

                @endif



                @endforeach

                @endif

                @if($show==1)

                <li class=""><a href='{{route("$sub_menu->menu_file")}}'><i class="fa fa-circle-o"></i> {{$sub_menu->menu_name}}</a></li>

                @endif

                @endforeach







            </ul>

            @endif



        </li>

        <?php

        if($check_none==0)

           $non_display_menus[]=$main_menu->menu_id;

       ?>



       @endforeach



   </ul>

   <?php

   // print_r($non_display_menus);

  if(count($non_display_menus)>0)

  {

     $executescript="<script>";

      for($i=0;$i<count($non_display_menus);$i++)

      {

          $executescript.="

          var elements".$non_display_menus[$i]." = document.getElementsByClassName('".$non_display_menus[$i]."_menu');

            elements".$non_display_menus[$i]."[0].parentNode.removeChild(elements".$non_display_menus[$i]."[0]);";

      }



      $executescript.="</script>";

         echo $executescript;



  }





?>

    @endif





           

           <!--  <li class="treeview">

             <a href=''>

              <i class="ti-view-list"></i>

              <span>Settings</span>

              <span class="pull-right-container">

            <i class="fa fa-angle-right pull-right"></i>

          </span>

            </a>

            <ul class="treeview-menu">

              <li><a href="#">Level One</a></li>

              <li><a href="#">Level One</a></li>

            </ul>

          </li>

 -->
@endif
            </ul>



          </section>



      </aside>