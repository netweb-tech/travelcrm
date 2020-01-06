<?php



namespace App\Http\Controllers;



use App\Users;

use App\Menus;

use App\VehicleType;

use App\HotelMeal;

use App\UserRights;

use App\Amenities;

use App\SubAmenities;

use App\Languages;

use App\VehicleWiseCost;

use App\FuelType;

use App\VehicleWiseCost_log;

use App\FuelType_log;

use App\GuideExpense;

use App\GuideExpense_log;

use Session;

use Illuminate\Http\Request;



class LoginController extends Controller

{
     private function rights($menu)
    {
        $emp_id=session()->get('travel_users_id');
        $right_array=array();
        $employees=Users::where('users_id',$emp_id)->where('users_pid',0)->where('users_status',1)->first();
        if($employees)
        {
            $right_array['add']=1;
            $right_array['view']=1;
            $right_array['edit_delete']=1;
            $right_array['report']=1;
            $right_array['admin']=1;
            $right_array['admin_which']="add,view,edit_delete,report";
        }
        else
        {

            $employees=Users::where('users_id',$emp_id)->where('users_status',1)->first();
            if(count($employees)>0)
            {
                $user_rights=UserRights::where('emp_id',$emp_id)->where('menu',$menu)->first();
                if(count($user_rights)>0)
                {
                    $right_array['add']=$user_rights->add_status;
                    $right_array['view']=$user_rights->view_status;
                    $right_array['edit_delete']=$user_rights->edit_del_status;
                    $right_array['report']=$user_rights->report_status;
                    $right_array['admin']=$user_rights->admin_status;
                    if($user_rights->admin_which_status!="")
                        $right_array['admin_which']=$user_rights->admin_which_status;
                    else
                        $right_array['admin_which']="No";
                }
                else
                {
                    $right_array['add']=0;
                    $right_array['view']=0;
                    $right_array['edit_delete']=0;
                    $right_array['report']=0;
                    $right_array['admin']=0;
                    $right_array['admin_which']="No";
                }
            }
            else
            {
                $right_array['add']=0;
                $right_array['view']=0;
                $right_array['edit_delete']=0;
                $right_array['report']=0;
                $right_array['admin']=0;
                $right_array['admin_which']="No";
            }

        }

        return $right_array;

    }

    public function index()

    {

          if(session()->has('travel_users_id'))

          {



           return view('mains.home');

        }

        else

        {

         return view('mains.index');

        }

    }



    public function home()

    {

           if(session()->has('travel_users_id'))

          {



           return view('mains.home');

        }

        else

        {

         return redirect()->route('index');

        }

    }



    public function login_check(Request $request)

    {

    	$username=$request->get('username');

    	$password=$request->get('password');



    	$check_users=Users::where('users_username',$username)->where('users_password',md5($password))->first();

    	if($check_users)

    	{

    		if($check_users->users_role=="Admin")

    		{

    			session()->put('travel_users_id',$check_users->users_id);

    			session()->put('travel_username',$check_users->users_username);

    			session()->put('travel_email',$check_users->users_email);

    			session()->put('travel_fullame',$check_users->users_fname." ".$check_users->users_lname);

    			session()->put('travel_users_role',"Admin");

    			echo "success";

    		}

    		else

    		{

                $timestamp=date('Y-m-d H:i:s');

                $update_user=Users::where('users_username',$username)->update(["last_login"=> $timestamp]);

    			session()->put('travel_users_id',$check_users->users_id);

    			session()->put('travel_username',$check_users->users_username);

    			session()->put('travel_email',$check_users->users_email);

    			session()->put('travel_fullame',$check_users->users_fname." ".$check_users->users_lname);

    			session()->put('travel_users_role',"Sub-User");

    			echo "success";



    		}

    		

    	}

    	else

    	{

    		echo "fail";

    	}



    }

    public function logout()

    {

        Session::flush();

        return redirect()->intended('/');

    }



    public function menu(Request $request)

    {

       if(session()->has('travel_users_id'))

       {

        $rights=$this->rights('menu');
        $fetch_menu=Menus::where('menu_pid',0)->get();
        return view('mains.menu')->with(compact('fetch_menu','rights'));

    }

    else

    {

        return redirect()->route('index');

    }

}



public function menu_insert(Request $request)

{

    $menu_pid=$request->get('menu_pid');

    $menu_name=$request->get('menu_name');

    $file_name=$request->get('file_name');

    if($request->get('new_window'))

        $new_window=$request->get('new_window');

    else

        $new_window=0;



    $check_menu=Menus::where('menu_name',$menu_name)->first();

    if($check_menu)

    {

        echo "exist";

    }

    else

    {

        $order=1;

        $check_menu_order=Menus::where("menu_pid",$menu_pid)->orderBy('menu_id','desc')->first();



        if($check_menu_order)

        {

            $order=$check_menu_order->order_id;

            $order++;

        }



        $emp_id=session()->has('travel_users_id');

        $menu_insert=new Menus;

        $menu_insert->menu_pid=$menu_pid;

        $menu_insert->order_id=$order;

        $menu_insert->menu_name=$menu_name;

        $menu_insert->menu_file=$file_name;

        $menu_insert->newwindow=$new_window;

        $menu_insert->emp_id=$emp_id;

        if($menu_insert->save())

        {

            echo "success";

        }

        else

        {

            echo "fail";

        }





    }





}



public static function menu_fetch()

{

    // $menus=Menus::get();

    // return $menus;



    $fetch_menu=Menus::where('menu_pid',0)->orderBy('order_id','asc')->get();

    $fetch_sub_menu=Menus::where('menu_pid','!=',0)->orderBy('order_id','asc')->get();

    $emp_id=session()->get('travel_users_id');

    $usertype="";

    $rights=array();

    $admin_fetch=Users::where('users_id',$emp_id)->where('users_pid',0)->first();

    if(count($admin_fetch)>=1)

    {

        $usertype="admin";

    }

    else

    {

        $employee_fetch=Users::where('users_id',$emp_id)->first();

        if(count($employee_fetch)>0)

        {

            $usertype="sub-user";

            $check_existing=UserRights::where('emp_id',$emp_id)->get();

            if(count($check_existing)>0)

            {

                $new_array=array();

                $count=0;

                foreach($check_existing as $array_values)

                {

                    $new_array[$count]['menu']=$array_values->menu;

                    $new_array[$count]['add_status']=$array_values->add_status;

                    $new_array[$count]['add_status']=$array_values->add_status;

                    $new_array[$count]['view_status']=$array_values->view_status;

                    $new_array[$count]['edit_del_status']=$array_values->edit_del_status;

                    $new_array[$count]['report_status']=$array_values->report_status;

                    $new_array[$count]['admin_status']=$array_values->admin_status;

                    $new_array[$count]['admin_which_status']=$array_values->admin_which_status;



                    $count++;

                }



                $rights=$new_array;



            }

            else

            {

                $rights[]="no_rights_available";

            }

        }

    }





    return array("fetch_menu"=>$fetch_menu,"sub_menu"=>$fetch_sub_menu,"rights"=>$rights,"type"=>$usertype);

}



    public function languages(Request $request)

    {

       if(session()->has('travel_users_id'))

       {

        $rights=$this->rights('languages');
        $fetch_languages=Languages::get();
        return view('mains.languages')->with(compact('fetch_languages','rights'));

    }

    else

    {

        return redirect()->route('index');

    }

}



public function languages_insert(Request $request)

{

    $language_name=$request->get('language_name');

    $iso_639_no=$request->get('iso_639_no');

    $check_langauge=Languages::where('language_name',$language_name)->first();

    if($check_langauge)

    {

        echo "exist";

    }

    else
    {

        $emp_id=session()->has('travel_users_id');

        $languages_insert=new Languages;

        $languages_insert->language_name=$language_name;

        $languages_insert->iso_639_no=$iso_639_no;

        $languages_insert->language_created_by=$emp_id;

        if($languages_insert->save())

        {

            echo "success";

        }

        else

        {

            echo "fail";

        }





    }





}

 public function vehicle_type(Request $request)

    {

       if(session()->has('travel_users_id'))

       {

        $rights=$this->rights('vehicle-type');
        $fetch_vehicle_type=VehicleType::get();
        return view('mains.vehicle-type')->with(compact('fetch_vehicle_type','rights'));

    }

    else

    {

        return redirect()->route('index');

    }

}



public function vehicle_type_insert(Request $request)

{

    $vehicle_type_name=$request->get('vehicle_type_name');

    $check_vehicle_type=VehicleType::where('vehicle_type_name',$vehicle_type_name)->first();

    if($check_vehicle_type)

    {

        echo "exist";

    }

    else
    {

        $emp_id=session()->has('travel_users_id');

        $vehicle_type_insert=new VehicleType;

        $vehicle_type_insert->vehicle_type_name=$vehicle_type_name;

        $vehicle_type_insert->vehicle_type_created_by=$emp_id;

        if($vehicle_type_insert->save())

        {

            echo "success";

        }

        else

        {

            echo "fail";

        }

    }

}
public function hotel_meal(Request $request)

    {

       if(session()->has('travel_users_id'))

       {

        $rights=$this->rights('hotel-meal');
        $fetch_hotel_meal=HotelMeal::get();
        return view('mains.hotel-meal')->with(compact('fetch_hotel_meal','rights'));

    }

    else

    {

        return redirect()->route('index');

    }

}



public function hotel_meal_insert(Request $request)

{

    $hotel_meal_name=$request->get('hotel_meal_name');

    $check_hotel_meal=HotelMeal::where('hotel_meals_name',$hotel_meal_name)->first();

    if($check_hotel_meal)

    {

        echo "exist";

    }

    else
    {

        $emp_id=session()->has('travel_users_id');

        $hotel_meal_insert=new HotelMeal;

        $hotel_meal_insert->hotel_meals_name=$hotel_meal_name;

        $hotel_meal_insert->hotel_meals_created_by=$emp_id;

        if($hotel_meal_insert->save())

        {

            echo "success";

        }

        else

        {

            echo "fail";

        }





    }





}


public function fuel_type(Request $request)

    {

       if(session()->has('travel_users_id'))

       {

        $rights=$this->rights('fuel-type-cost');
        $fetch_fuel_type=FuelType::get();
        return view('mains.fuel-type-cost')->with(compact('fetch_fuel_type','rights'));

    }

    else

    {

        return redirect()->route('index');

    }

}

public function fuel_type_insert(Request $request)

{

    $fuel_type_name=$request->get('fuel_type_name');

    $fuel_type_cost=$request->get('fuel_type_cost');

    $check_fuel_type=FuelType::where('fuel_type',$fuel_type_name)->first();

    if($check_fuel_type)

    {

        echo "exist";

    }

    else
    {

        $emp_id=session()->has('travel_users_id');

        $fuel_type_insert=new FuelType;

        $fuel_type_insert->fuel_type=$fuel_type_name;

         $fuel_type_insert->fuel_type_cost=$fuel_type_cost;

        $fuel_type_insert->fuel_type_created_by=$emp_id;

        if($fuel_type_insert->save())

        {
            $last_id=$fuel_type_insert->id;

           $fuel_type_log_insert=new FuelType_log;

           $fuel_type_log_insert->fuel_type_id=$last_id;

           $fuel_type_log_insert->fuel_type=$fuel_type_name;

           $fuel_type_log_insert->fuel_type_cost=$fuel_type_cost;

           $fuel_type_log_insert->fuel_type_created_by=$emp_id;

           $fuel_type_log_insert->fuel_type_operation="INSERT";

           $fuel_type_log_insert->save();

            echo "success";

        }

        else

        {

            echo "fail";

        }

    }

}

public function fuel_type_update(Request $request)

{

    $fuel_type_id=$request->get('fuel_type_id');

    $fuel_type_name=$request->get('fuel_type_name');

    $fuel_type_cost=$request->get('fuel_type_cost');

    $check_fuel_type=FuelType::where('fuel_type',$fuel_type_name)->where('fuel_type_id','!=',$fuel_type_id)->first();

    if($check_fuel_type)

    {

        echo "exist";

    }

    else
    {

        $emp_id=session()->has('travel_users_id');
        $update_fuel_type_array=array("fuel_type_cost"=>$fuel_type_cost);
        $update_fuel_type=FuelType::where('fuel_type_id',$fuel_type_id)->update($update_fuel_type_array);

        if($update_fuel_type)

        {
            $fuel_type_log_insert=new FuelType_log;

           $fuel_type_log_insert->fuel_type_id=$fuel_type_id;

           $fuel_type_log_insert->fuel_type=$fuel_type_name;

           $fuel_type_log_insert->fuel_type_cost=$fuel_type_cost;

           $fuel_type_log_insert->fuel_type_created_by=$emp_id;

           $fuel_type_log_insert->fuel_type_operation="UPDATE";

           $fuel_type_log_insert->save();

            echo "success";

        }

        else

        {

            echo "fail";

        }

    }

}

public function vehicle_type_cost(Request $request)

    {

       if(session()->has('travel_users_id'))

       {

        $rights=$this->rights('vehicle-type-cost');
       $fetch_vehicle_type=VehicleType::get();
        $fetch_vehicle_type_cost=VehicleWiseCost::join('vehicle_type','vehicle_type.vehicle_type_id',"=","vehicle_wise_cost.vehicle_type_id")->select("vehicle_wise_cost.*","vehicle_type.vehicle_type_name")->get();
        return view('mains.vehicle-type-cost')->with(compact('fetch_vehicle_type_cost','fetch_vehicle_type','rights'));

    }

    else

    {

        return redirect()->route('index');

    }

}

public function vehicle_type_cost_insert(Request $request)

{

    $vehicle_type_id=$request->get('vehicle_type_name');

    $vehicle_type_cost=$request->get('vehicle_type_cost');

    $check_vehicle_type_cost=VehicleWiseCost::where('vehicle_type_id',$vehicle_type_id)->first();

    if($check_vehicle_type_cost)

    {

        echo "exist";

    }

    else
    {

        $emp_id=session()->has('travel_users_id');

        $vehicle_type_cost_insert=new VehicleWiseCost;

        $vehicle_type_cost_insert->vehicle_type_id=$vehicle_type_id;

         $vehicle_type_cost_insert->vehicle_type_cost=$vehicle_type_cost;

        $vehicle_type_cost_insert->vehicle_cost_created_by=$emp_id;

        if($vehicle_type_cost_insert->save())

        {
            $last_id=$vehicle_type_cost_insert->id;

           $vehicle_type_cost_log_insert=new VehicleWiseCost_log;

           $vehicle_type_cost_log_insert->vehicle_cost_id=$last_id;

           $vehicle_type_cost_log_insert->vehicle_type_id=$vehicle_type_id;

           $vehicle_type_cost_log_insert->vehicle_type_cost=$vehicle_type_cost;

           $vehicle_type_cost_log_insert->vehicle_cost_created_by=$emp_id;

           $vehicle_type_cost_log_insert->vehicle_type_operation="INSERT";

           $vehicle_type_cost_log_insert->save();

            echo "success";

        }

        else

        {

            echo "fail";

        }

    }

}

public function vehicle_type_cost_update(Request $request)

{

    $vehicle_type_cost_id=$request->get('vehicle_type_cost_id');

   $vehicle_type_id=$request->get('vehicle_type_name');

    $vehicle_type_cost=$request->get('vehicle_type_cost');

    $check_vehicle_type_cost=VehicleWiseCost::where('vehicle_type_id',$vehicle_type_id)->where('vehicle_cost_id','!=',$vehicle_type_cost_id)->first();

    if($check_vehicle_type_cost)

    {

        echo "exist";

    }

    else
    {

        $emp_id=session()->has('travel_users_id');
        $update_vehicle_type_cost_array=array("vehicle_type_cost"=>$vehicle_type_cost);
        $update_vehicle_type_cost=VehicleWiseCost::where('vehicle_cost_id',$vehicle_type_cost_id)->update($update_vehicle_type_cost_array);

        if($update_vehicle_type_cost)

        {
            $vehicle_type_cost_log_insert=new VehicleWiseCost_log;

           $vehicle_type_cost_log_insert->vehicle_cost_id=$vehicle_type_cost_id;

           $vehicle_type_cost_log_insert->vehicle_type_id=$vehicle_type_id;

           $vehicle_type_cost_log_insert->vehicle_type_cost=$vehicle_type_cost;

           $vehicle_type_cost_log_insert->vehicle_cost_created_by=$emp_id;

           $vehicle_type_cost_log_insert->vehicle_type_operation="UPDATE";

           $vehicle_type_cost_log_insert->save();

            echo "success";

        }

        else

        {

            echo "fail";

        }

    }

}

public function amenities(Request $request)

    {

       if(session()->has('travel_users_id'))

       {

        $rights=$this->rights('amenities');
        $fetch_amenities=Amenities::get();
        return view('mains.amenities')->with(compact('fetch_amenities','rights'));

    }

    else

    {

        return redirect()->route('index');

    }

}



public function amenities_insert(Request $request)

{

    $amenities_name=$request->get('amenities_name');

    $check_amenities=Amenities::where('amenities_name',$amenities_name)->first();

    if($check_amenities)

    {

        echo "exist";

    }

    else
    {

        $emp_id=session()->has('travel_users_id');

        $amenities_insert=new Amenities;

        $amenities_insert->amenities_name=$amenities_name;

        $amenities_insert->amenities_created_by=$emp_id;

        if($amenities_insert->save())

        {

            echo "success";

        }

        else

        {

            echo "fail";

        }





    }





}

public function update_amenities_active(Request $request)
{
     $id=$request->get('amenities_id');

  $action_perform=$request->get('action_perform');



 if($action_perform=="active")

  {

    $update_activity=Amenities::where('amenities_id',$id)->update(["amenities_status"=>1]);

    if($update_activity)

    {

      echo "success";

    }

    else

    {

      echo "fail";

    }

  }

  else if($action_perform=="inactive")

  {

  $update_activity=Amenities::where('amenities_id',$id)->update(["amenities_status"=>0]);

   if($update_activity)

   {

    echo "success";

  }

  else

  {

    echo "fail";

  }

}

else

{

  echo "fail";

}

}

public static function fetchAmenitiesName($amenities_id)
{

$id=$amenities_id;

 $fetch_amenities=Amenities::where('amenities_id',$id)->first();

 return $fetch_amenities;
}

public static function fetchSubAmenitiesName($sub_amenities_id,$amenities_id)
{

$sub_amenities_id=$sub_amenities_id;
$amenities_id=$amenities_id;

 $fetch_sub_amenities=SubAmenities::where('sub_amenities_id',$sub_amenities_id)->where('amenities_id',$amenities_id)->first();

 return $fetch_sub_amenities;
}




public function sub_amenities(Request $request)

    {

       if(session()->has('travel_users_id'))

       {

        $rights=$this->rights('sub_amenities');
         $fetch_amenities=Amenities::where('amenities_status',1)->get();
        $fetch_sub_amenities=SubAmenities::get();
        return view('mains.sub-amenities')->with(compact('fetch_sub_amenities','fetch_amenities','rights'));

    }

    else

    {

        return redirect()->route('index');

    }

}



public function sub_amenities_insert(Request $request)

{
    $amenities_id=$request->get('amenities_id');

    $sub_amenities_name=$request->get('sub_amenities_name');

    $check_sub_amenities=SubAmenities::where('sub_amenities_name',$sub_amenities_name)->first();

    if($check_sub_amenities)

    {

        echo "exist";

    }

    else
    {

        $emp_id=session()->has('travel_users_id');

        $sub_amenities_insert=new SubAmenities;

         $sub_amenities_insert->amenities_id=$amenities_id;

        $sub_amenities_insert->sub_amenities_name=$sub_amenities_name;

        $sub_amenities_insert->sub_amenities_created_by=$emp_id;

        if($sub_amenities_insert->save())

        {

            echo "success";

        }

        else

        {

            echo "fail";

        }





    }





}

public function update_sub_amenities_active(Request $request)
{
     $id=$request->get('sub_amenities_id');

  $action_perform=$request->get('action_perform');



 if($action_perform=="active")

  {

    $update_activity=SubAmenities::where('sub_amenities_id',$id)->update(["sub_amenities_status"=>1]);

    if($update_activity)

    {

      echo "success";

    }

    else

    {

      echo "fail";

    }

  }

  else if($action_perform=="inactive")

  {

  $update_activity=SubAmenities::where('sub_amenities_id',$id)->update(["sub_amenities_status"=>0]);

   if($update_activity)

   {

    echo "success";

  }

  else

  {

    echo "fail";

  }

}

}

public function guide_expense(Request $request)

    {

       if(session()->has('travel_users_id'))

       {

        $rights=$this->rights('fuel-type-cost');
        $fetch_guide_expense=GuideExpense::get();
        return view('mains.guide-expense-cost')->with(compact('fetch_guide_expense','rights'));

    }

    else

    {

        return redirect()->route('index');

    }

}

public function guide_expense_insert(Request $request)

{

    $guide_expense_name=$request->get('guide_expense_name');

    $guide_expense_cost=$request->get('guide_expense_cost');

    $check_guide_expense=GuideExpense::where('guide_expense',$guide_expense_name)->first();

    if($check_guide_expense)

    {

        echo "exist";

    }

    else
    {

        $emp_id=session()->has('travel_users_id');

        $guide_expense_insert=new GuideExpense;

        $guide_expense_insert->guide_expense=$guide_expense_name;

         $guide_expense_insert->guide_expense_cost=$guide_expense_cost;

        $guide_expense_insert->guide_expense_created_by=$emp_id;

        if($guide_expense_insert->save())

        {
            $last_id=$guide_expense_insert->id;

           $guide_expense_log_insert=new GuideExpense_log;

           $guide_expense_log_insert->guide_expense_id=$last_id;

           $guide_expense_log_insert->guide_expense=$guide_expense_name;

           $guide_expense_log_insert->guide_expense_cost=$guide_expense_cost;

           $guide_expense_log_insert->guide_expense_created_by=$emp_id;

           $guide_expense_log_insert->guide_expense_operation="INSERT";

           $guide_expense_log_insert->save();

            echo "success";

        }

        else

        {

            echo "fail";

        }

    }

}

public function guide_expense_update(Request $request)

{

    $guide_expense_id=$request->get('guide_expense_id');

    $guide_expense_name=$request->get('guide_expense_name');

    $guide_expense_cost=$request->get('guide_expense_cost');

    $check_guide_expense=GuideExpense::where('guide_expense',$guide_expense_name)->where('guide_expense_id','!=',$guide_expense_id)->first();

    if($check_guide_expense)

    {

        echo "exist";

    }

    else
    {

        $emp_id=session()->has('travel_users_id');
        $update_guide_expense_array=array("guide_expense_cost"=>$guide_expense_cost);
        $update_guide_expense=GuideExpense::where('guide_expense_id',$guide_expense_id)->update($update_guide_expense_array);

        if($update_guide_expense)

        {
            $guide_expense_log_insert=new GuideExpense_log;

           $guide_expense_log_insert->guide_expense_id=$guide_expense_id;

           $guide_expense_log_insert->guide_expense=$guide_expense_name;

           $guide_expense_log_insert->guide_expense_cost=$guide_expense_cost;

           $guide_expense_log_insert->guide_expense_created_by=$emp_id;

           $guide_expense_log_insert->guide_expense_operation="UPDATE";

           $guide_expense_log_insert->save();

            echo "success";

        }

        else

        {

            echo "fail";

        }

    }

}





}

