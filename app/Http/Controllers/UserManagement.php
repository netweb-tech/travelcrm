<?php



namespace App\Http\Controllers;

use App\Users;

use App\Menus;

use App\UserRights;

use Session;

use Illuminate\Http\Request;



class UserManagement extends Controller

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

	 public function user_management(Request $request)

	 {

	 	if(session()->has('travel_users_id'))

	 	{
            $rights=$this->rights('user-management');

	 		$emp_id=session()->get('travel_users_id');

	 		$get_users=Users::where("users_pid",$emp_id)->get();

	 		return view('mains.user-management')->with(compact('get_users','rights'));

	 	}

	 	else

	 	{

	 		return redirect()->route('index');

	 	}



    }



    public function create_user(Request $request)

    {

    	if(session()->has('travel_users_id'))

    	{
            $rights=$this->rights('user-management');
    		return view('mains.create-user')->with(compact('rights'));

    	}

    	else

    	{

    		return redirect()->route('index');

    	}



    	

    }



    public function insert_user(Request $request)

    {

    	$users_pid=session()->get('travel_users_id');

    	$users_empcode=$request->get('employee_code');

    	$users_assigned_role=$request->get('select_role');

    	$users_role=$request->get('select_role');

    	$users_username=$request->get('username');

    	$users_fname=$request->get('first_name');

    	$users_lname=$request->get('last_name');

    	$users_contact=$request->get('contact_number');

    	$users_email=$request->get('employee_email');

    	$users_password_hint="123456";

    	$users_password=md5($users_password_hint);

    	$get_users=Users::where('users_username',$users_username)->orWhere('users_email',$users_email)->first();

        if($get_users)

        {   

            echo "exist";

        }

        else

        {

            date_default_timezone_set("Asia/Kolkata");

            $insert_user=new Users;

            $insert_user->users_pid=$users_pid;

            $insert_user->users_empcode=$users_empcode;

            $insert_user->users_fname=$users_fname;

            $insert_user->users_lname=$users_lname;

            $insert_user->users_username=$users_username;

            $insert_user->users_contact=$users_contact;

            $insert_user->users_email=$users_email;

            $insert_user->users_password=$users_password;

            $insert_user->users_password_hint=$users_password_hint;

            $insert_user->users_assigned_role=$users_assigned_role;

            $insert_user->users_role=$users_role;

            $insert_user->users_status="1";

            if($insert_user->save())

            {

                echo "success";

            }

            else

            {

                echo "fail";

            }

        }

    }

     public function edit_user($users_id)

    {

    	if(session()->has('travel_users_id'))

    	{
            $rights=$this->rights('user-management');
    		$get_users=Users::where('users_id',$users_id)->first();

    		$users_id=base64_encode(base64_encode($users_id));

    		if($get_users)

    		{

    			return view('mains.edit-user')->with(compact('get_users','rights'))->with('users_id',$users_id);  

    		}

    		else

    		{

    			return redirect()->back();

    		}

    	}

    	else

    	{

    		return redirect()->route('index');

    	}

       

     

    }



      public function update_user(Request $request)

    {

        $users_id=base64_decode(base64_decode($request->get('users_id')));

        $users_empcode=$request->get('employee_code');

        $users_assigned_role=$request->get('select_role');

        $users_username=$request->get('username');

        $users_fname=$request->get('first_name');

        $users_lname=$request->get('last_name');

        $users_contact=$request->get('contact_number');

        $users_email=$request->get('employee_email');

         $users_status=$request->get('select_status');

        $get_users=Users::where('users_id',"!=",$users_id)->where(function ($query) use($users_username,$users_email)

            {

                $query->where('users_username',$users_username)->orWhere('users_email',$users_email);



            })->first();

        if($get_users)

        {   

            echo "exist";

        }

        else

        {

        date_default_timezone_set("Asia/Kolkata");

            $update_data=array("users_empcode"=>$users_empcode,

                "users_assigned_role"=>$users_assigned_role,

                "users_username"=>$users_username,

                "users_fname"=>$users_fname,

                "users_lname"=>$users_lname,

                "users_contact"=>$users_contact,

                "users_email"=>$users_email,

                "users_status"=>$users_status);



            $update_user=Users::where('users_id',$users_id)->update($update_data);

            if($update_data)

            {

                echo "success";



            }

            else

            {

                echo "fail";

            }

          

        }

    }



     public function user_details($users_id)

    {

    	if(session()->has('travel_users_id'))

    	{
                 $rights=$this->rights('user-management');
    		$get_users=Users::where('users_id',$users_id)->first();

    		$users_id=base64_encode(base64_encode($users_id));

    		if($get_users)

    		{

    			return view('mains.user-details-view')->with(compact('get_users','rights'))->with('users_id',$users_id);

    		}

    		else

    		{

    			return redirect()->back();

    		}

    	}

    	else

    	{

    		return redirect()->route('index');

    	}

    	

    	

    }



    public function user_rights(Request $request)

{

    if(session()->has('travel_users_id'))

    {
         $rights=$this->rights('user-rights');

        $get_users=Users::where("users_pid",'!=',0)->get();

        return view('mains.user-rights')->with(compact('get_users','rights'));

    }

    else

    {

        return redirect()->route('index');

    }

        

}



public function user_rights_insert(Request $request)

{

    $employee=$request->get('employees');

    $total_menus=$request->get('total_menus');





    $check_existing=UserRights::where('emp_id',$employee)->get();

    if(count($check_existing)<=0)

    {

        $success=0;

        for($rights=1;$rights<=$total_menus;$rights++)

        {

            $date=date('d/m/Y');

            $time=date('H:i:s');

            $menus=$request->get('rights_menu'.$rights);



            if($request->has('add'.$rights))

                $add_status=1;

            else

                $add_status=0;



            if($request->has('view'.$rights))

                $view_status=1;

            else

                $view_status=0;



            if($request->has('edit_delete'.$rights))

                $edit_del_status=1;

            else

                $edit_del_status=0;



            if($request->has('report'.$rights))

                $report_status=1;

            else

                $report_status=0;





            if($request->has('sadmin'.$rights))

                $sadmin_status=1;

            else

                $sadmin_status=0;



            if($request->has('admin_which'.$rights))

            {

                $admin_which_array=$request->get('admin_which'.$rights);

                if(count($admin_which_array)>0)

                    $admin_which=implode(',',$admin_which_array);

                else

                    $admin_which="";



            }

            else

            {

                $admin_which="";

            }



            $user_rights=new UserRights;

            $user_rights->emp_id=$employee;

            $user_rights->menu=$menus;

            $user_rights->add_status=$add_status;

            $user_rights->view_status=$view_status;



            $user_rights->edit_del_status=$edit_del_status;

            $user_rights->report_status=$report_status;

            $user_rights->admin_status=$sadmin_status;

            $user_rights->admin_which_status=$admin_which;

            $user_rights->rights_status=1;

            $user_rights->rights_date=$date;

            $user_rights->rights_time=$time;



            if($user_rights->save())

            {

                $success++;

            }

        }



        if($success==$total_menus)

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

        $updations=0;

        for($rights=1;$rights<=$total_menus;$rights++)

        {

            $menus=$request->get('rights_menu'.$rights);



            if($request->has('add'.$rights))

                $add_status=1;

            else

                $add_status=0;



            if($request->has('view'.$rights))

                $view_status=1;

            else

                $view_status=0;



            if($request->has('edit_delete'.$rights))

                $edit_del_status=1;

            else

                $edit_del_status=0;



            if($request->has('report'.$rights))

                $report_status=1;

            else

                $report_status=0;





            if($request->has('sadmin'.$rights))

                $sadmin_status=1;

            else

                $sadmin_status=0;



            if($request->has('admin_which'.$rights))

            {

                $admin_which_array=$request->get('admin_which'.$rights);

                if(count($admin_which_array)>0)

                    $admin_which=implode(',',$admin_which_array);

                else

                    $admin_which="";



            }

            else

            {

                $admin_which="";

            }







            $check_existing_menu=UserRights::where('emp_id',$employee)->where('menu',$menus)->get();



            if(count($check_existing_menu)>0)

            {

                $updatearray=array(

                    'menu'=>$menus,

                    'add_status'=>$add_status,

                    'view_status'=>$view_status,

                    'edit_del_status'=>$edit_del_status,

                    'report_status'=>$report_status,

                    'admin_status'=>$sadmin_status,

                    'admin_which_status'=>$admin_which,

                    'rights_status'=>1

                );

                $update_rights=UserRights::where('emp_id',$employee)->where('menu',$menus)->update($updatearray);



                if($update_rights)

                {

                    $updations++;

                }

            }

            else

            {

                $date=date('d/m/Y');

                $time=date('H:i:s');

                $user_rights=new UserRights;

                $user_rights->emp_id=$employee;

                $user_rights->menu=$menus;

                $user_rights->add_status=$add_status;

                $user_rights->view_status=$view_status;

                $user_rights->edit_del_status=$edit_del_status;

                $user_rights->report_status=$report_status;

                $user_rights->admin_status=$sadmin_status;

                $user_rights->admin_which_status=$admin_which;

                $user_rights->rights_status=1;

                $user_rights->rights_date=$date;

                $user_rights->rights_time=$time;



                if($user_rights->save())

                {

                    $updations++;

                }

            }



        }



        if($updations==$total_menus)

        {

            echo "success";

        }

        else

        {

            echo "fail";

        }

    }



}

public function user_rights_fetch(Request $request)

{

    $employee=$request->get('emp_id');

    $fetch_menu=Menus::where('menu_pid',0)->get();

    $fetch_sub_menu=Menus::where('menu_pid','!=',0)->get();

    $dataarray=array();

    $nor_display_content=array();

    $data="<input type='hidden' name='_token' value='".csrf_token()."'>";





    $check_existing=UserRights::where('emp_id',$employee)->get();
    // print_r($check_existing);

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

        $inputcount=1;

        $check_menu=0;

        $count_menus=0;

        foreach($fetch_menu as $main_menu)

        {



                $check_none=0;  //for not displaying the div if no rights has been active from that div

                $check_sub_menus=0;

                $data.='<div class="row">

                <div class="col-md-12">

                <div class="row">

                <div class="col-md-3">

                <h4>'.strtoupper($main_menu->menu_name).'</h4>

                </div>

                <div class="col-md-1">

                <span class="plus_minus minus" id="show_rights_data'.$main_menu->menu_id.'" onclick="showRights(\''.$main_menu->menu_id.'\')"><i class="fa fa-minus-square-o plus" aria-hidden="true"></i></span>

                </div>

                </div>

                <br>

                <div class="row" id="divRightData'.$main_menu->menu_id.'"  style="border:1px solid lightgrey;padding:10px">

                <div class="col-md-12">

                <div class="row">

                <div class="col-md-3">

                <br>

                <input type="radio" id="radiobtn_partial'.$main_menu->menu_id.'" name="radio'.$main_menu->menu_id.'" class="with-gap radio-col-primary radio'.$main_menu->menu_id.'" value="Partial" onchange="fillOutAllCheck(\''.$main_menu->menu_id.'\')">

                <label for="radiobtn_partial'.$main_menu->menu_id.'">PARTIAL RIGHTS </label>

                </div>

                <div class="col-md-3">

                <br>

                <input type="radio" id="radiobtn_full'.$main_menu->menu_id.'" name="radio'.$main_menu->menu_id.'" class="with-gap radio-col-primary radio'.$main_menu->menu_id.'" value="Full" onchange="fillOutAllCheck(\''.$main_menu->menu_id.'\')">

                <label for="radiobtn_full'.$main_menu->menu_id.'">FULL RIGHTS </label>

                </div>

                </div>

                </div>

                <br>

                 <div class="col-md-12">

                <div class="row">

                <div class="col-md-4">

                </div>

                <div class="col-md-1  text-center">
                 <label>All</label>

                </div>

                <div class="col-md-1 text-center">

                <label>Add</label>

                </div>

                <div class="col-md-1 text-center">

                <label>View</label>

                </div>

                <div class="col-md-1 text-center">

                <label>Edit/Delete</label>

                </div>

                <div class="col-md-1 text-center">

                <label>Pdf/Excel</label>

                </div>

                <div class="col-md-1 text-center">

                <label>Admin</label>

                </div>

                </div>

                </div> <div class="col-md-12">';



                foreach($fetch_sub_menu as $submenu)

                {

                    if($submenu->menu_pid==$main_menu->menu_id)

                    {

                        $array_key="";

                        foreach($new_array as $key => $data_values)

                        {

                            if($data_values['menu']==$submenu->menu_file)

                                $array_key=$key;

                            

                        }



                        $check_sub_menus++;



                        $data.='<div class="row">

                        <div class="col-md-4">

                        <label class="rights_menu" id="rights_menu'.$inputcount.'">'.$submenu->menu_name.'</label>

                        <input type="hidden" name="rights_menu'.$inputcount.'" value="'.$submenu->menu_file.'">

                        </div>';





                        if($array_key!="" && $new_array[$array_key]['add_status']==1 && $new_array[$array_key]['view_status']==1 && $new_array[$array_key]['edit_del_status']==1 && $new_array[$array_key]['report_status']==1 && $new_array[$array_key]['admin_status']==1)

                        {

                            $data.='<div class="col-md-1 text-center checkbox">

                            <input type="checkbox" id="single_row_rights'.$inputcount.'" class="single_row_rights'.$inputcount.' rights'.$main_menu->menu_id.'" onchange="fillOutSingleCheck(\''.$inputcount.'\')" checked>

                            <label for="single_row_rights'.$inputcount.'"></label>

                            </div>';

                        }

                        else

                        {

                            $data.='<div class="col-md-1 text-center checkbox">

                            <input type="checkbox" id="single_row_rights'.$inputcount.'" class="single_row_rights'.$inputcount.' rights'.$main_menu->menu_id.'" onchange="fillOutSingleCheck(\''.$inputcount.'\')">

                             <label for="single_row_rights'.$inputcount.'"></label>

                            </div>';

                        }



                        if($array_key!="" && $new_array[$array_key]['add_status']==1)

                        {

                            $data.='<div class="col-md-1 text-center checkbox">

                            <input type="checkbox" id="add'.$inputcount.'" name="add'.$inputcount.'" class="add'.$inputcount.' rights'.$main_menu->menu_id.'"  onchange="removeCheck(\''.$inputcount.'\')" checked>

                            <label for="add'.$inputcount.'"></label>

                            </div>';

                            $check_none++;

                        }

                        else

                        {

                            $data.='<div class="col-md-1 text-center checkbox">

                            <input type="checkbox" id="add'.$inputcount.'" name="add'.$inputcount.'" class="add'.$inputcount.' rights'.$main_menu->menu_id.'"  onchange="removeCheck(\''.$inputcount.'\')">

                             <label for="add'.$inputcount.'"></label>

                            </div>';

                        }



                        if($array_key!="" && $new_array[$array_key]['view_status']==1)

                        {

                            $data.='<div class="col-md-1 text-center checkbox">

                            <input type="checkbox" id="view'.$inputcount.'"  name="view'.$inputcount.'" class="view'.$inputcount.' rights'.$main_menu->menu_id.'" onchange="removeCheck(\''.$inputcount.'\')" checked>

                            <label for="view'.$inputcount.'"></label>

                            </div>';

                            $check_none++;

                        }

                        else

                        {

                            $data.='<div class="col-md-1 text-center checkbox">

                            <input type="checkbox" id="view'.$inputcount.'" name="view'.$inputcount.'" class="view'.$inputcount.' rights'.$main_menu->menu_id.'" onchange="removeCheck(\''.$inputcount.'\')">

                             <label for="view'.$inputcount.'"></label>

                            </div>';

                        }



                        if($array_key!="" && $new_array[$array_key]['edit_del_status']==1)

                        {

                            $data.='<div class="col-md-1 text-center checkbox">

                            <input type="checkbox" id="edit_delete'.$inputcount.'" name="edit_delete'.$inputcount.'" class="edit_delete'.$inputcount.' rights'.$main_menu->menu_id.'" onchange="removeCheck(\''.$inputcount.'\')" checked>

                             <label for="edit_delete'.$inputcount.'"></label>

                            </div>';

                            $check_none++;

                        }

                        else

                        {

                            $data.='<div class="col-md-1 text-center checkbox">

                            <input type="checkbox" id="edit_delete'.$inputcount.'" name="edit_delete'.$inputcount.'" class="edit_delete'.$inputcount.' rights'.$main_menu->menu_id.'" onchange="removeCheck(\''.$inputcount.'\')">

                             <label for="edit_delete'.$inputcount.'"></label>

                            </div>';

                        }



                        if($array_key!="" && $new_array[$array_key]['report_status']==1)

                        {

                            $data.='<div class="col-md-1 text-center checkbox">

                            <input type="checkbox" id="report'.$inputcount.'" name="report'.$inputcount.'" class="report'.$inputcount.' rights'.$main_menu->menu_id.'" onchange="removeCheck(\''.$inputcount.'\')" checked>

                            <label for="report'.$inputcount.'"></label>

                            </div>';

                            $check_none++;

                        }

                        else

                        {

                            $data.='<div class="col-md-1 text-center checkbox">

                            <input type="checkbox" id="report'.$inputcount.'" name="report'.$inputcount.'" class="report'.$inputcount.' rights'.$main_menu->menu_id.'" onchange="removeCheck(\''.$inputcount.'\')">

                            <label for="report'.$inputcount.'"></label>

                            </div>';

                        }



                        if($array_key!="" && $new_array[$array_key]['admin_status']==1)

                        {

                            $data.='<!--    <div class="col-md-1 text-center checkbox">

                            <input type="checkbox" name="admin'.$inputcount.'" class="admin'.$inputcount.' rights'.$main_menu->menu_id.'" onchange="removeCheck(\''.$inputcount.'\')">

                            </div> -->

                            <div class="col-md-1 text-center checkbox">

                            <input type="checkbox" id="sadmin'.$inputcount.'"  name="sadmin'.$inputcount.'"  class="sadmin'.$inputcount.' rights'.$main_menu->menu_id.' single_row_rights'.$inputcount.' " onchange="activeSelect(\''.$inputcount.'\')" checked>

                              <label for="sadmin'.$inputcount.'"></label>

                            </div>';

                            $check_none++;

                        }

                        else

                        {

                            $data.='<!--    <div class="col-md-1 text-center checkbox">

                            <input type="checkbox" name="admin'.$inputcount.'" class="admin'.$inputcount.' rights'.$main_menu->menu_id.'" onchange="removeCheck(\''.$inputcount.'\')">

                            </div> -->

                            <div class="col-md-1 text-center checkbox">

                            <input type="checkbox" id="sadmin'.$inputcount.'"  name="sadmin'.$inputcount.'"  class="sadmin'.$inputcount.' rights'.$main_menu->menu_id.' single_row_rights'.$inputcount.' " onchange="activeSelect(\''.$inputcount.'\')">

                             <label for="sadmin'.$inputcount.'"></label>

                            </div>';

                        }



                        if($array_key!="" && $new_array[$array_key]['admin_which_status']!="")

                        {

                            $which_status=explode(',',$new_array[$array_key]['admin_which_status']);



                            $data.='<div class="col-md-2 text-center">

                            <select style="width:100% !important" name="admin_which'.$inputcount.'[]" id="admin_which'.$inputcount.'" class="select-multiple  admin_which'.$inputcount.' rights1'.$main_menu->menu_id.'" multiple="multiple" onchange="checkIndividual(\''.$inputcount.'\')" >';

                            if(in_array("add",$which_status))

                                $data.='<option value="add" selected>Add</option>';

                            else

                                $data.='<option value="add" >Add</option>';



                            if(in_array("view",$which_status))

                                $data.='<option value="view" selected>View</option>';

                            else

                                $data.='<option value="view">View</option>';



                            if(in_array("edit_delete",$which_status))

                                $data.='<option value="edit_delete" selected>Edit/Delete</option>';

                            else

                                $data.='<option value="edit_delete">Edit/Delete</option>';

                            

                            if(in_array("report",$which_status))

                                $data.='<option value="report" selected>Pdf/Excel</option>';

                            else

                                $data.='<option value="report">Pdf/Excel</option>';



                            $data.='</select>

                            </div>';

                            $check_none++;

                        }

                        else if($array_key!="" && $new_array[$array_key]['admin_status']==1)

                        {

                            $data.='<div class="col-md-2 text-center">

                            <select style="width:100% !important" name="admin_which'.$inputcount.'[]" id="admin_which'.$inputcount.'" class="select-multiple  admin_which'.$inputcount.' rights1'.$main_menu->menu_id.'" multiple="multiple" onchange="checkIndividual(\''.$inputcount.'\')" >

                            <option value="add">Add</option>

                            <option value="view">View</option>

                            <option value="edit_delete">Edit/Delete</option>

                            <option value="report">Pdf/Excel</option>

                            </select>

                            </div>';

                        }

                        else

                        {

                            $data.='<div class="col-md-2 text-center">

                            <select style="width:100% !important" name="admin_which'.$inputcount.'[]" id="admin_which'.$inputcount.'" class="select-multiple  admin_which'.$inputcount.' rights1'.$main_menu->menu_id.'" multiple="multiple" disabled="disabled" onchange="checkIndividual(\''.$inputcount.'\')" >

                            <option value="add">Add</option>

                            <option value="view">View</option>

                            <option value="edit_delete">Edit/Delete</option>

                            <option value="report">Pdf/Excel</option>

                            </select>

                            </div>';

                        }

                        



                        $data.='</div><br>';



                        $inputcount++;

                        $check_menu++;

                    }



                }



                if($check_sub_menus==0)

                {

                    $data.='<div class="row">

                    <div class="col-md-4">

                    <label class="rights_menu" id="rights_menu'.$inputcount.'">'.$main_menu->menu_name.'</label>

                    <input type="hidden" name="rights_menu'.$inputcount.'" value="'.$main_menu->menu_file.'">

                    </div>';





                    if(!empty($new_array[$inputcount-1]) && $new_array[$inputcount-1]['add_status']==1 && $new_array[$inputcount-1]['view_status']==1 && $new_array[$inputcount-1]['edit_del_status']==1 && $new_array[$inputcount-1]['report_status']==1 && $new_array[$inputcount-1]['admin_status']==1)

                    {

                        $data.='<div class="col-md-1 text-center checkbox">

                        <input type="checkbox" id="single_row_rights'.$inputcount.'" class="single_row_rights'.$inputcount.' rights'.$main_menu->menu_id.'" onchange="fillOutSingleCheck(\''.$inputcount.'\')" checked>

                        <label for="single_row_rights'.$inputcount.'"></label>

                        </div>';

                    }

                    else

                    {

                        $data.='<div class="col-md-1 text-center checkbox">

                        <input type="checkbox" id="single_row_rights'.$inputcount.'" class="single_row_rights'.$inputcount.' rights'.$main_menu->menu_id.'" onchange="fillOutSingleCheck(\''.$inputcount.'\')">

                          <label for="single_row_rights'.$inputcount.'"></label>

                        </div>';

                    }



                    if(!empty($new_array[$inputcount-1]) && $new_array[$inputcount-1]['add_status']==1)

                    {

                        $data.='<div class="col-md-1 text-center checkbox">

                        <input type="checkbox" id="add'.$inputcount.'" name="add'.$inputcount.'" class="add'.$inputcount.' rights'.$main_menu->menu_id.'"  onchange="removeCheck(\''.$inputcount.'\')" checked>

                          <label for="add'.$inputcount.'"></label>

                        </div>';

                        $check_none++;

                    }

                    else

                    {

                        $data.='<div class="col-md-1 text-center checkbox">

                        <input type="checkbox" id="add'.$inputcount.'" name="add'.$inputcount.'" class="add'.$inputcount.' rights'.$main_menu->menu_id.'"  onchange="removeCheck(\''.$inputcount.'\')">

                          <label for="add'.$inputcount.'"></label>

                        </div>';

                        $check_none++;

                    }



                    if(!empty($new_array[$inputcount-1]) && $new_array[$inputcount-1]['view_status']==1)

                    {

                        $data.='<div class="col-md-1 text-center checkbox">

                        <input type="checkbox" id="view'.$inputcount.'" name="view'.$inputcount.'" class="view'.$inputcount.' rights'.$main_menu->menu_id.'" onchange="removeCheck(\''.$inputcount.'\')" checked>

                          <label for="view'.$inputcount.'"></label>

                        </div>';

                        $check_none++;

                    }

                    else

                    {

                        $data.='<div class="col-md-1 text-center checkbox">

                        <input type="checkbox" id="view'.$inputcount.'" name="view'.$inputcount.'" class="view'.$inputcount.' rights'.$main_menu->menu_id.'" onchange="removeCheck(\''.$inputcount.'\')">

                          <label for="view'.$inputcount.'"></label>

                        </div>';

                    }



                    if(!empty($new_array[$inputcount-1]) && $new_array[$inputcount-1]['edit_del_status']==1)

                    {

                        $data.='<div class="col-md-1 text-center checkbox">

                        <input type="checkbox" id="edit_delete'.$inputcount.'"  name="edit_delete'.$inputcount.'" class="edit_delete'.$inputcount.' rights'.$main_menu->menu_id.'" onchange="removeCheck(\''.$inputcount.'\')" checked>

                        <label for="edit_delete'.$inputcount.'"></label>

                        </div>';

                        $check_none++;

                    }

                    else

                    {

                        $data.='<div class="col-md-1 text-center checkbox">

                        <input type="checkbox" id="edit_delete'.$inputcount.'"  name="edit_delete'.$inputcount.'" class="edit_delete'.$inputcount.' rights'.$main_menu->menu_id.'" onchange="removeCheck(\''.$inputcount.'\')">

                        <label for="edit_delete'.$inputcount.'"></label>

                        </div>';

                    }



                    if(!empty($new_array[$inputcount-1]) && $new_array[$inputcount-1]['report_status']==1)

                    {

                        $data.='<div class="col-md-1 text-center checkbox">

                        <input type="checkbox" id="report'.$inputcount.'" name="report'.$inputcount.'" class="report'.$inputcount.' rights'.$main_menu->menu_id.'" onchange="removeCheck(\''.$inputcount.'\')" checked>

                         <label for="report'.$inputcount.'"></label>

                        </div>';

                        $check_none++;

                    }

                    else

                    {

                        $data.='<div class="col-md-1 text-center">

                        <input type="checkbox" id="report'.$inputcount.'" name="report'.$inputcount.'" class="report'.$inputcount.' rights'.$main_menu->menu_id.'" onchange="removeCheck(\''.$inputcount.'\')">

                         <label for="report'.$inputcount.'"></label>

                        </div>';

                    }



                    if(!empty($new_array[$inputcount-1]) && $new_array[$inputcount-1]['admin_status']==1)

                    {

                        $data.='<!--    <div class="col-md-1 text-center checkbox">

                        <input type="checkbox" name="admin'.$inputcount.'" class="admin'.$inputcount.' rights'.$main_menu->menu_id.'" onchange="removeCheck(\''.$inputcount.'\')">

                        </div> -->

                        <div class="col-md-1 text-center checkbox">

                        <input type="checkbox"  id="sadmin'.$inputcount.'" name="sadmin'.$inputcount.'"  class="sadmin'.$inputcount.' rights'.$main_menu->menu_id.' single_row_rights'.$inputcount.' " onchange="activeSelect(\''.$inputcount.'\')" checked>

                         <label for="sadmin'.$inputcount.'"></label>

                        </div>';

                        $check_none++;

                    }

                    else

                    {

                        $data.='<!--    <div class="col-md-1 text-center checkbox">

                        <input type="checkbox" name="admin'.$inputcount.'" class="admin'.$inputcount.' rights'.$main_menu->menu_id.'" onchange="removeCheck(\''.$inputcount.'\')">

                        </div> -->

                        <div class="col-md-1 text-center checkbox">

                        <input type="checkbox"  id="sadmin'.$inputcount.'" name="sadmin'.$inputcount.'"  class="sadmin'.$inputcount.' rights'.$main_menu->menu_id.' single_row_rights'.$inputcount.' " onchange="activeSelect(\''.$inputcount.'\')">

                         <label for="sadmin'.$inputcount.'"></label>

                        </div>';

                    }



                    if( !empty($new_array[$inputcount-1]) && $new_array[$inputcount-1]['admin_which_status']!="")

                    {

                        $which_status=explode(',',$new_array[$inputcount-1]['admin_which_status']);



                        $data.='<div class="col-md-2 text-center">

                        <select style="width:100% !important" name="admin_which'.$inputcount.'[]" id="admin_which'.$inputcount.'" class="select-multiple  admin_which'.$inputcount.' rights1'.$main_menu->menu_id.'" multiple="multiple" onchange="checkIndividual(\''.$inputcount.'\')" >';

                        if(in_array("add",$which_status))

                            $data.='<option value="add" selected>Add</option>';

                        else

                            $data.='<option value="add" >Add</option>';



                        if(in_array("view",$which_status))

                            $data.='<option value="view" selected>View</option>';

                        else

                            $data.='<option value="view">View</option>';



                        if(in_array("edit_delete",$which_status))

                            $data.='<option value="edit_delete" selected>Edit/Delete</option>';

                        else

                            $data.='<option value="edit_delete">Edit/Delete</option>';



                        if(in_array("report",$which_status))

                            $data.='<option value="report" selected>Pdf/Excel</option>';

                        else

                            $data.='<option value="report">Pdf/Excel</option>';



                        $data.='</select>

                        </div>';

                        $check_none++;

                    }

                    else if( !empty($new_array[$inputcount-1]) && $new_array[$inputcount-1]['admin_status']==1)

                    {

                        $data.='<div class="col-md-2 text-center">

                        <select style="width:100% !important" name="admin_which'.$inputcount.'[]" id="admin_which'.$inputcount.'" class="select-multiple  admin_which'.$inputcount.' rights1'.$main_menu->menu_id.'" multiple="multiple" onchange="checkIndividual(\''.$inputcount.'\')" >

                        <option value="add">Add</option>

                        <option value="view">View</option>

                        <option value="edit_delete">Edit/Delete</option>

                        <option value="report">Pdf/Excel</option>

                        </select>

                        </div>';



                    }

                    else

                    {

                        $data.='<div class="col-md-2 text-center">

                        <select style="width:100% !important" name="admin_which'.$inputcount.'[]" id="admin_which'.$inputcount.'" class="select-multiple  admin_which'.$inputcount.' rights1'.$main_menu->menu_id.'" multiple="multiple" disabled="disabled" onchange="checkIndividual(\''.$inputcount.'\')" >

                        <option value="add">Add</option>

                        <option value="view">View</option>

                        <option value="edit_delete">Edit/Delete</option>

                        <option value="report">Pdf/Excel</option>

                        </select>

                        </div>';

                    }



                    $data.='</div>';

                    $inputcount++;

                    $check_menu++;



                }





                $data.='</div></div></div></div><br>';

                if($check_none==0)

                {

                    $nor_display_content[]="divRightData$main_menu->menu_id";

                }



                

            }

            $data.='<div class="row">

            <div class="col-md-9">

            </div>

            <div class="col-md-3 pull-right">

            <input type="hidden" name="total_menus" value="'.($inputcount-1).'">

            <button id="submit" type="button" class="btn btn-rounded btn-primary mr-10">Submit</button>

            </div>

            </div>';



            if(count($nor_display_content)>0)

            {

                $dataarray['nor_display_content']=implode(',',$nor_display_content);

            }

            else

            {

                $dataarray['nor_display_content']="";

            }



            $dataarray['result']="success";

            $dataarray['data']=$data;



        }

        else

        {



            $inputcount=1;

            foreach($fetch_menu as $main_menu)

            {



                $check_sub_menus=0;

                $data.='<div class="row">

                <div class="col-md-12">

                <div class="row">

                <div class="col-md-3">

                <h4>'.strtoupper($main_menu->menu_name).'</h4>

                </div>

                <div class="col-md-1">

                <span class="plus_minus plus" id="show_rights_data'.$main_menu->menu_id.'" onclick="showRights(\''.$main_menu->menu_id.'\')"><i class="fa fa-plus-square-o plus" aria-hidden="true"></i></span>

                </div>

                </div>

                <br>



                <div class="row" id="divRightData'.$main_menu->menu_id.'"  style="border:1px solid lightgrey;padding:10px;display:none">

                <div class="col-md-12">

                <div class="row">

                <div class="col-md-3">

                <br>

                <input type="radio" id="radiobtn_partial'.$main_menu->menu_id.'" name="radio'.$main_menu->menu_id.'" class="with-gap radio-col-primary radio'.$main_menu->menu_id.'" value="Partial" onchange="fillOutAllCheck(\''.$main_menu->menu_id.'\')">

                <label for="radiobtn_partial'.$main_menu->menu_id.'">PARTIAL RIGHTS </label>

                </div>

                <div class="col-md-3">

                <br>

                <input type="radio" id="radiobtn_full'.$main_menu->menu_id.'" name="radio'.$main_menu->menu_id.'" class="with-gap radio-col-primary radio'.$main_menu->menu_id.'" value="Full" onchange="fillOutAllCheck(\''.$main_menu->menu_id.'\')">

                <label for="radiobtn_full'.$main_menu->menu_id.'">FULL RIGHTS </label>

                </div>

                </div>

                </div>

                <br>

                 <div class="col-md-12">

                <div class="row">

                <div class="col-md-4">

                </div>

                <div class="col-md-1 text-center">
                 <label>All</label>

                </div>

                <div class="col-md-1 text-center">

                <label>Add</label>

                </div>

                <div class="col-md-1 text-center">

                <label>View</label>

                </div>

                <div class="col-md-1 text-center">

                <label>Edit/Delete</label>

                </div>



                <div class="col-md-1 text-center">

                <label>Pdf/Excel</label>

                </div>

                <!--   <div class="col-md-1 text-center">

                <label>Admin</label>

                </div> -->

                <div class="col-md-1 text-center">

                <label>Admin</label>

                </div>

                </div>

                </div>

                   <div class="col-md-12">';

                foreach($fetch_sub_menu as $submenu)

                {

                    if($submenu->menu_pid==$main_menu->menu_id)

                    {

                        $check_sub_menus++;



                        $data.='<div class="row">

                        <div class="col-md-4">

                        <label class="rights_menu" id="rights_menu'.$inputcount.'">'.$submenu->menu_name.'</label>

                        <input type="hidden" name="rights_menu'.$inputcount.'" value="'.$submenu->menu_file.'">

                        </div>

                        <div class="col-md-1 text-center checkbox">

                        <input type="checkbox" id="single_row_rights'.$inputcount.'" class="single_row_rights'.$inputcount.' rights'.$main_menu->menu_id.'" onchange="fillOutSingleCheck(\''.$inputcount.'\')">

                         <label for="single_row_rights'.$inputcount.'"></label>

                        </div>

                        <div class="col-md-1 text-center checkbox">

                        <input type="checkbox" id="add'.$inputcount.'" name="add'.$inputcount.'" class="add'.$inputcount.' rights'.$main_menu->menu_id.'"  onchange="removeCheck(\''.$inputcount.'\')">

                         <label for="add'.$inputcount.'"></label>

                        </div>

                        <div class="col-md-1 text-center checkbox">

                        <input type="checkbox" id="view'.$inputcount.'" name="view'.$inputcount.'" class="view'.$inputcount.' rights'.$main_menu->menu_id.'" onchange="removeCheck(\''.$inputcount.'\')">

                         <label for="view'.$inputcount.'"></label>

                        </div>

                        <div class="col-md-1 text-center checkbox">

                        <input type="checkbox" id="edit_delete'.$inputcount.'" name="edit_delete'.$inputcount.'" class="edit_delete'.$inputcount.' rights'.$main_menu->menu_id.'" onchange="removeCheck(\''.$inputcount.'\')">

                         <label for="edit_delete'.$inputcount.'"></label>

                        </div>



                        <div class="col-md-1 text-center checkbox">

                        <input type="checkbox" id="report'.$inputcount.'" name="report'.$inputcount.'" class="report'.$inputcount.' rights'.$main_menu->menu_id.'" onchange="removeCheck(\''.$inputcount.'\')">

                         <label for="report'.$inputcount.'"></label>

                        </div>

                        <!--    <div class="col-md-1 text-center checkbox">

                        <input type="checkbox" name="admin'.$inputcount.'" class="admin'.$inputcount.' rights'.$main_menu->menu_id.'" onchange="removeCheck(\''.$inputcount.'\')">

                         <label for="admin'.$inputcount.'"></label>

                        </div> -->

                        <div class="col-md-1 text-center checkbox">

                        <input type="checkbox" id="sadmin'.$inputcount.'" name="sadmin'.$inputcount.'" class="sadmin'.$inputcount.' rights'.$main_menu->menu_id.' single_row_rights'.$inputcount.' " onchange="activeSelect(\''.$inputcount.'\')">

                         <label for="sadmin'.$inputcount.'"></label>

                        </div>

                        <div class="col-md-2 text-center">

                        <select style="width:100% !important" name="admin_which'.$inputcount.'[]" id="admin_which'.$inputcount.'" class="select-multiple  admin_which'.$inputcount.' rights1'.$main_menu->menu_id.'" multiple="multiple" onchange="checkIndividual(\''.$inputcount.'\')">

                        <option value="add">Add</option>

                        <option value="view">View</option>

                        <option value="edit_delete">Edit/Delete</option>

                        <option value="report">Pdf/Excel</option>

                        </select>

                        </div>

                        </div>

                        <br>';



                        $inputcount++;



                    }



                }



                if($check_sub_menus==0)

                {

                    $data.='<div class="row">

                    <div class="col-md-4">

                    <label class="rights_menu" id="rights_menu'.$inputcount.'">'.$main_menu->menu_name.'</label>

                    <input type="hidden" name="rights_menu'.$inputcount.'" value="'.$main_menu->menu_file.'">

                    </div>

                    <div class="col-md-1 text-center checkbox">

                    <input type="checkbox" id="single_row_rights'.$inputcount.'" class="single_row_rights'.$inputcount.' rights'.$main_menu->menu_id.'" onchange="fillOutSingleCheck(\''.$inputcount.'\')">

                      <label for="single_row_rights'.$inputcount.'"></label>

                    </div>

                    <div class="col-md-1 text-center checkbox">

                    <input type="checkbox" id="add'.$inputcount.'" name="add'.$inputcount.'" class="add'.$inputcount.' rights'.$main_menu->menu_id.'"  onchange="removeCheck(\''.$inputcount.'\')">

                    <label for="add'.$inputcount.'"></label>

                    </div>

                    <div class="col-md-1 text-center checkbox">

                    <input type="checkbox" id="view'.$inputcount.'" name="view'.$inputcount.'" class="view'.$inputcount.' rights'.$main_menu->menu_id.'" onchange="removeCheck(\''.$inputcount.'\')">

                    <label for="view'.$inputcount.'"></label>

                    </div>

                    <div class="col-md-1 text-center checkbox">

                    <input type="checkbox" id="edit_delete'.$inputcount.'" name="edit_delete'.$inputcount.'" class="edit_delete'.$inputcount.' rights'.$main_menu->menu_id.'" onchange="removeCheck(\''.$inputcount.'\')">

                    <label for="edit_delete'.$inputcount.'"></label>

                    </div>



                    <div class="col-md-1 text-center checkbox">

                    <input type="checkbox" id="report'.$inputcount.'"  name="report'.$inputcount.'" class="report'.$inputcount.' rights'.$main_menu->menu_id.'" onchange="removeCheck(\''.$inputcount.'\')">

                    <label for="report'.$inputcount.'"></label>

                    </div>

                    <!--    <div class="col-md-1 text-center checkbox">

                    <input type="checkbox" id="admin'.$inputcount.'" name="admin'.$inputcount.'" class="admin'.$inputcount.' rights'.$main_menu->menu_id.'" onchange="removeCheck(\''.$inputcount.'\')">

                    <label for="admin'.$inputcount.'"></label>

                    </div> -->

                    <div class="col-md-1 text-center checkbox">

                    <input type="checkbox" id="sadmin'.$inputcount.'" name="sadmin'.$inputcount.'" class="sadmin'.$inputcount.' rights'.$main_menu->menu_id.' single_row_rights'.$inputcount.' " onchange="activeSelect(\''.$inputcount.'\')">

                    <label for="sadmin'.$inputcount.'"></label>

                    </div>

                    <div class="col-md-2 text-center">

                    <select style="width:100% !important" name="admin_which'.$inputcount.'[]" id="admin_which'.$inputcount.'" class="select-multiple  admin_which'.$inputcount.' rights1'.$main_menu->menu_id.'" multiple="multiple" onchange="checkIndividual(\''.$inputcount.'\')">

                    <option value="add">Add</option>

                    <option value="view">View</option>

                    <option value="edit_delete">Edit/Delete</option>

                    <option value="report">Pdf/Excel</option>

                    </select>

                    </div>

                    </div>';



                    $inputcount++;



                }





                $data.='</div>

                </div>

                </div></div><br>';



            }



            $data.='  <div class="row">

            <div class="col-md-9">

            </div>

            <div class="col-md-3 pull-right">

            <input type="hidden" name="total_menus" value="'.($inputcount-1).'">

            <button id="submit" type="button" class="btn btn-rounded btn-primary mr-10">Submit</button>

            </div>

            </div>';



            $dataarray['result']="notavailable";

            $dataarray['data']=$data;

        }

        echo json_encode($dataarray);

    }







}

