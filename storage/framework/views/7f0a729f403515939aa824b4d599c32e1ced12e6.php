

      <!-- Left side column. contains the logo and sidebar -->

      <aside class="main-sidebar">

          <!-- sidebar-->

          <section class="sidebar">

            <!-- sidebar menu-->

            <ul class="sidebar-menu" data-widget="tree">



              



              <li class="link-a">

                <a href="<?php echo e(route('agent-home')); ?>">

                  <i class="ti-home"></i>

                  <span>Home</span>

                  

                </a>

                

              </li>  
                <?php
                $service_type=session()->get('travel_agent_type');

                $services=explode(',',$service_type);

                for($count=0;$count< count($services);$count++)
                {
                  if($services[$count]!="transportation")
                  {

                    $url=$services[$count]."-search";
                  
                  

                  echo '<li>
                  <a href="'.route("$url").'">
                    <i class="ti-email"></i> <span>'.ucwords($services[$count]).'</span>
                  </a>
                </li>';
                }

                }
                ?>


               <li class="link-a">

                <a href="<?php echo e(route('agent-bookings')); ?>">

                  <i class="ti-ticket"></i>

                  <span>My Bookings</span>

                  

                </a>

                

              </li>  

              
              


                


<!-- 
          



              <li>

                <a href="#">

                  <i class="ti-email"></i> <span>Booking Management</span>

                </a>

              </li>



              <li class="link-a">

                  <a href="#">

                    <i class="ti-dashboard"></i>

                    <span>Save Itineraries</span>

                    

                  </a>

                  

                </li>  



                <li class="link-a">

                  <a href="<?php echo e(route('view-enquiry')); ?>">

                    <i class="ti-dashboard"></i>

                    <span>Customer Management</span>

                    

                  </a>

                  

                </li>  





              





                <li class="link-a">

                  <a href="#">

                    <i class="ti-dashboard"></i>

                    <span>Quotation Management</span>

                    

                  </a>

                  

                </li>  



                <li class="treeview">

                  <a href="#">

                    <i class="ti-dashboard"></i>

                    <span>Invoices</span>

                    

                  </a>

                  

                </li>    



                <li class="link-a">

                  <a href="<?php echo e(route('user-management')); ?>">

                    <i class="ti-dashboard"></i>

                    <span>User Management</span>

                    

                  </a>

                  

                </li>  

                <li class="link-a">

                  <a href="<?php echo e(route('supplier-management')); ?>">

                    <i class="ti-dashboard"></i>

                    <span>Supplier Management</span>

                    

                  </a>

                  

                </li>   



                <li class="link-a">

                  <a href="<?php echo e(route('service-management')); ?>">

                    <i class="ti-dashboard"></i>

                    <span>Service Management</span>

                    

                  </a>

                  

                </li>  





              





                <li class="treeview">

                  <a href="#">

                    <i class="ti-dashboard"></i>

                    <span>Access Control</span>

                    

                  </a>

                  

                </li>
 -->


            </ul>

          </section>

      </aside><?php /**PATH /home/tqfproco/crm.traveldoor.ge/resources/views/agent/includes/nav.blade.php ENDPATH**/ ?>