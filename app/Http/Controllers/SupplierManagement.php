<?php

namespace App\Http\Controllers;
use App\Users;
use App\Countries;
use App\Cities;
use App\Currency;
use App\Suppliers;
use App\UserRights;
use App\Guides;
use App\Guides_log;
use Session;
use Illuminate\Http\Request;

class SupplierManagement extends Controller
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

   public function supplier_management(Request $request)
   {
   		if(session()->has('travel_users_id'))
	 	{

            $rights=$this->rights('supplier-management');
	 		$countries=Countries::get();
	 		$emp_id=session()->get('travel_users_id');

            if(strpos($rights['admin_which'],'add')!==false || strpos($rights['admin_which'],'view')!==false)
            {
                $get_suppliers=Suppliers::get();
            }
            else
            {
                $get_suppliers=Suppliers::where('supplier_created_by',$emp_id)->get(); 
            }
	 		
	 		return view('mains.supplier-management')->with(compact('get_suppliers','countries','rights'));
	 	}
	 	else
	 	{
	 		return redirect()->route('index');
	 	}

   }
     public function create_supplier(Request $request)
    {
    	if(session()->has('travel_users_id'))
    	{
             $rights=$this->rights('supplier-management');
    		  $countries=Countries::where('country_status',1)->get();
           $currency=Currency::get();
    		return view('mains.create-supplier')->with(compact('countries','currency','rights'));
    	}
    	else
    	{
    		return redirect()->route('index');
    	}

    	
    }

    public function insert_supplier(Request $request)
    {
        $created_by=session()->get('travel_users_id');
    	$supplier_name=$request->get('supplier_name');
    	$company_name=$request->get('company_name');
    	$email_id=$request->get('email_id');
    	$contact_number=$request->get('contact_number');
        $check_supplier=Suppliers::where('company_email',$email_id)->orWhere('company_contact',$contact_number)->get();
        if(count($check_supplier)>0)
        {
  
            echo "exist";
        }
        else
        {
    	$fax_number=$request->get('fax_number');
    	$supplier_reference_id=$request->get('supplier_reference_id');
    	$address=$request->get('address');
    	$supplier_country=$request->get('supplier_country');
    	$supplier_city=$request->get('supplier_city');
    	$corporate_reg_no=$request->get('corporate_reg_no');
    	$corporate_description=$request->get('corporate_description');
    	$skype_id=$request->get('skype_id');
    	$operating_hrs_from=$request->get('operating_hrs_from');
    	$operating_hrs_to=$request->get('operating_hrs_to');
    	$week_monday=$request->get('week_monday');	
    	$week_tuesday=$request->get('week_tuesday');
    	$week_wednesday=$request->get('week_wednesday');
    	$week_thursday=$request->get('week_thursday');
    	$week_friday=$request->get('week_friday');
    	$week_saturday=$request->get('week_saturday');
    	$week_sunday=$request->get('week_sunday');
    	$supplier_opr_currency=$request->get('supplier_opr_currency');
    	$supplier_opr_countries=$request->get('supplier_opr_countries');
    	$blackout_days=$request->get('blackout_days');
    	$account_number=$request->get('account_number');
    	$bank_name=$request->get('bank_name');
    	$bank_swift=$request->get('bank_swift');
    	$bank_iban=$request->get('bank_iban');
    	$bank_currency=$request->get('bank_currency');
    	$service_type=$request->get('service_type');
    	$contact_person_name=$request->get('contact_person_name');
    	$contact_person_number=$request->get('contact_person_number');	
    	$contact_person_email=$request->get('contact_person_email');
    	$supplier_certificate_file=$request->get('supplier_certificate_file');
    	$supplier_logo_file=$request->get('supplier_logo_file');

    	 if($request->hasFile('supplier_certificate_file'))
        {
            $supplier_certificate_file=$request->file('supplier_certificate_file');
            $extension=strtolower($request->supplier_certificate_file->getClientOriginalExtension());
            if($extension=="png" || $extension=="jpg" || $extension=="jpeg" || $extension=="pdf")
            {
                $certificate_supplier = "certificate-".time().'.'.$request->file('supplier_certificate_file')->getClientOriginalExtension();

                // request()->agent_logo->storeAs(public_path('consultant-images'), $imageName);
                $dir = 'assets/uploads/supplier_certificates/';

                $request->file('supplier_certificate_file')->move($dir, $certificate_supplier);
            }
            else
            {
                $certificate_supplier = "";
            }
        }
        else
        {
            $certificate_supplier = "";
        }

         if($request->hasFile('supplier_logo_file'))
        {
            $supplier_logo_file=$request->file('supplier_logo_file');
            $extension=strtolower($request->supplier_logo_file->getClientOriginalExtension());
            if($extension=="png" || $extension=="jpg" || $extension=="jpeg" || $extension=="pdf")
            {
                $logo_supplier = "logo-".time().'.'.$request->file('supplier_logo_file')->getClientOriginalExtension();

                // request()->agent_logo->storeAs(public_path('consultant-images'), $imageName);
                $dir1 = 'assets/uploads/supplier_logos/';

                $request->file('supplier_logo_file')->move($dir1, $logo_supplier);
            }
            else
            {
                $logo_supplier = "";
            }
        }
        else
        {
            $logo_supplier = "";
        }

        $operating_weekdays=array("monday"=>$week_monday,
        	"tuesday"=>$week_tuesday,
        	"wednesday"=>$week_wednesday,
        	"thursday"=>$week_thursday,
        	"friday"=>$week_friday,
        	"saturday"=>$week_saturday,
        	"sunday"=>$week_sunday);

        $operating_weekdays=serialize($operating_weekdays);
        $supplier_opr_currency=implode(",",$supplier_opr_currency);
        $supplier_opr_countries=implode(",",$supplier_opr_countries);

         $service_type=implode(",",$service_type);
			$supplier_bank_details=array();
         for($bank_count=0;$bank_count<count($account_number);$bank_count++)
         {
         	$supplier_bank_details[$bank_count]['account_number']=$account_number[$bank_count];
         	$supplier_bank_details[$bank_count]['bank_name']=$bank_name[$bank_count];
         	$supplier_bank_details[$bank_count]['bank_ifsc']=$bank_swift[$bank_count];
         	$supplier_bank_details[$bank_count]['bank_iban']=$bank_iban[$bank_count];
         	$supplier_bank_details[$bank_count]['bank_currency']=$bank_currency[$bank_count];

         }
         	$contact_persons=array();
         for($contact_count=0;$contact_count<count($contact_person_name);$contact_count++)
         {
         	$contact_persons[$contact_count]['contact_person_name']=$contact_person_name[$contact_count];
         	$contact_persons[$contact_count]['contact_person_number']=$contact_person_number[$contact_count];
         	$contact_persons[$contact_count]['contact_person_email']=$contact_person_email[$contact_count];

         }
         $supplier_password_hint="12345";
         $supplier_password=md5($supplier_password_hint);
         
        $supplier_bank_details=serialize($supplier_bank_details);
        $contact_persons=serialize($contact_persons);
        $supplier=new Suppliers;
        $supplier->supplier_name=$supplier_name;
        $supplier->company_name=$company_name;
        $supplier->company_email=$email_id;
        $supplier->supplier_password=$supplier_password;
        $supplier->supplier_password_hint=$supplier_password_hint;
        $supplier->company_contact=$contact_number;
        $supplier->company_fax=$fax_number;
        $supplier->supplier_ref_id=$supplier_reference_id;
        $supplier->address=$address;
        $supplier->supplier_country=$supplier_country;
        $supplier->supplier_city=$supplier_city;
        $supplier->corporate_reg_no=$corporate_reg_no;
        $supplier->corporate_desc=$corporate_description;
        $supplier->skype_id=$skype_id;	
        $supplier->operating_hrs_from=$operating_hrs_from;
        $supplier->operating_hrs_to=$operating_hrs_to;	
        $supplier->operating_weekdays=$operating_hrs_to;
        $supplier->operating_weekdays=$operating_weekdays;
        $supplier->certificate_corp=$certificate_supplier;	
        $supplier->supplier_logo=$logo_supplier;
        $supplier->supplier_opr_currency=$supplier_opr_currency;
        $supplier->supplier_opr_countries=$supplier_opr_countries;	
         $supplier->blackout_dates=$blackout_days;	
         $supplier->supplier_bank_details=$supplier_bank_details;
         $supplier->supplier_service_type=$service_type;
         $supplier->contact_persons=$contact_persons;	
          $supplier->supplier_created_by=$created_by;  
         if($supplier->save())
         {
         	echo "success";
         }
         else
         {
         	echo "fail";
         }
     }

    }
 public function edit_supplier($supplier_id)
    {
    	if(session()->has('travel_users_id'))
    	{
            $rights=$this->rights('supplier-management');
    		 $countries=Countries::where('country_status',1)->get();
           $currency=Currency::get();
            if(strpos($rights['admin_which'],'edit_delete')!==false)
            {
                $get_supplier=Suppliers::where('supplier_id',$supplier_id)->first();
            }
            else
            {
                $get_supplier=Suppliers::where('supplier_id',$supplier_id)->where('supplier_created_by',$emp_id)->first();
            }
                if($get_supplier)
                {
                  return view('mains.edit-supplier')->with(compact('countries','currency','get_supplier','rights'));
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
    public function update_supplier(Request $request)
    {
    	$supplier_id=urldecode(base64_decode(base64_decode($request->get('supplier_id'))));

        $check_supplier=Suppliers::where('supplier_id',$supplier_id)->first();
        if(!$check_supplier)
        {
                echo "fail";
        }
        else
        {
                $certificate_data=$check_supplier->certificate_corp;
                 $logo_data=$check_supplier->supplier_logo;

         $supplier_name=$request->get('supplier_name');
         $company_name=$request->get('company_name');
         $email_id=$request->get('email_id');
         $contact_number=$request->get('contact_number');
         $fax_number=$request->get('fax_number');
         $supplier_reference_id=$request->get('supplier_reference_id');
         $address=$request->get('address');
         $supplier_country=$request->get('supplier_country');
         $supplier_city=$request->get('supplier_city');
         $corporate_reg_no=$request->get('corporate_reg_no');
         $corporate_description=$request->get('corporate_description');
         $skype_id=$request->get('skype_id');
         $operating_hrs_from=$request->get('operating_hrs_from');
         $operating_hrs_to=$request->get('operating_hrs_to');
         $week_monday=$request->get('week_monday');	
         $week_tuesday=$request->get('week_tuesday');
         $week_wednesday=$request->get('week_wednesday');
         $week_thursday=$request->get('week_thursday');
         $week_friday=$request->get('week_friday');
         $week_saturday=$request->get('week_saturday');
         $week_sunday=$request->get('week_sunday');
         $supplier_opr_currency=$request->get('supplier_opr_currency');
         $supplier_opr_countries=$request->get('supplier_opr_countries');
         $blackout_days=$request->get('blackout_days');
         $account_number=$request->get('account_number');
         $bank_name=$request->get('bank_name');
         $bank_swift=$request->get('bank_swift');
         $bank_iban=$request->get('bank_iban');
         $bank_currency=$request->get('bank_currency');
         $service_type=$request->get('service_type');
         $contact_person_name=$request->get('contact_person_name');
         $contact_person_number=$request->get('contact_person_number');	
         $contact_person_email=$request->get('contact_person_email');
         $supplier_certificate_file=$request->get('supplier_certificate_file');
         $supplier_logo_file=$request->get('supplier_logo_file');

         if($request->hasFile('supplier_certificate_file'))
         {
            $supplier_certificate_file=$request->file('supplier_certificate_file');
            $extension=strtolower($request->supplier_certificate_file->getClientOriginalExtension());
            if($extension=="png" || $extension=="jpg" || $extension=="jpeg" || $extension=="pdf")
            {
                $certificate_supplier = "certificate-".time().'.'.$request->file('supplier_certificate_file')->getClientOriginalExtension();

                // request()->agent_logo->storeAs(public_path('consultant-images'), $imageName);
                $dir = 'assets/uploads/supplier_certificates/';

                $request->file('supplier_certificate_file')->move($dir, $certificate_supplier);
            }
            else
            {
                $certificate_supplier = "";
            }
        }
        else
        {
        	$certificate_supplier=$certificate_data;
        }


        if($request->hasFile('supplier_logo_file'))
        {
            $supplier_logo_file=$request->file('supplier_logo_file');
            $extension=strtolower($request->supplier_logo_file->getClientOriginalExtension());
            if($extension=="png" || $extension=="jpg" || $extension=="jpeg" || $extension=="pdf")
            {
                $logo_supplier = "logo-".time().'.'.$request->file('supplier_logo_file')->getClientOriginalExtension();

                // request()->agent_logo->storeAs(public_path('consultant-images'), $imageName);
                $dir1 = 'assets/uploads/supplier_logos/';

                $request->file('supplier_logo_file')->move($dir1, $logo_supplier);
            }
            else
            {
                $logo_supplier = "";
            }
        }
        else
        {
        	$logo_supplier=$logo_data;
        }


        $operating_weekdays=array("monday"=>$week_monday,
        	"tuesday"=>$week_tuesday,
        	"wednesday"=>$week_wednesday,
        	"thursday"=>$week_thursday,
        	"friday"=>$week_friday,
        	"saturday"=>$week_saturday,
        	"sunday"=>$week_sunday);

        $operating_weekdays=serialize($operating_weekdays);
        $supplier_opr_currency=implode(",",$supplier_opr_currency);
        $supplier_opr_countries=implode(",",$supplier_opr_countries);

        $service_type=implode(",",$service_type);
        $supplier_bank_details=array();
        for($bank_count=0;$bank_count<count($account_number);$bank_count++)
        {
          $supplier_bank_details[$bank_count]['account_number']=$account_number[$bank_count];
          $supplier_bank_details[$bank_count]['bank_name']=$bank_name[$bank_count];
          $supplier_bank_details[$bank_count]['bank_ifsc']=$bank_swift[$bank_count];
          $supplier_bank_details[$bank_count]['bank_iban']=$bank_iban[$bank_count];
          $supplier_bank_details[$bank_count]['bank_currency']=$bank_currency[$bank_count];

      }
      $contact_persons=array();
      for($contact_count=0;$contact_count<count($contact_person_name);$contact_count++)
      {
          $contact_persons[$contact_count]['contact_person_name']=$contact_person_name[$contact_count];
          $contact_persons[$contact_count]['contact_person_number']=$contact_person_number[$contact_count];
          $contact_persons[$contact_count]['contact_person_email']=$contact_person_email[$contact_count];

      }

      $supplier_bank_details=serialize($supplier_bank_details);
      $contact_persons=serialize($contact_persons);

      $update_data=array("supplier_name"=>$supplier_name,
        "company_name"=>$company_name,
        "company_email"=>$email_id,
        "company_contact"=>$contact_number,
        "company_fax"=>$fax_number,
        "supplier_ref_id"=>$supplier_reference_id,
        "address"=>$address,
        "supplier_country"=>$supplier_country,
        "supplier_city"=>$supplier_city,
        "corporate_reg_no"=>$corporate_reg_no,
        "corporate_desc"=>$corporate_description,
        "skype_id"=>$skype_id,  
        "operating_hrs_from"=>$operating_hrs_from,
        "operating_hrs_to"=>$operating_hrs_to,  
        "operating_weekdays"=>$operating_hrs_to,
        "operating_weekdays"=>$operating_weekdays,
        "certificate_corp"=>$certificate_supplier,  
        "supplier_logo"=>$logo_supplier,
        "supplier_opr_currency"=>$supplier_opr_currency,
        "supplier_opr_countries"=>$supplier_opr_countries,  
        "blackout_dates"=>$blackout_days,  
        "supplier_bank_details"=>$supplier_bank_details,
        "supplier_service_type"=>$service_type,
        "contact_persons"=>$contact_persons
    );


      $update_query=Suppliers::where('supplier_id',$supplier_id)->update($update_data);
      if($update_query)
      {
          echo "success";
      }
      else
      {
          echo "fail";
      }
  }

}
    public function supplier_details($supplier_id)
    {
    	 if(session()->has('travel_users_id'))
	 	{
             $rights=$this->rights('supplier-management');
	 		$currency=Currency::get();
	 		$countries=Countries::get();
	 		 if(strpos($rights['admin_which'],'view')!==false)
            {
                $get_supplier=Suppliers::where('supplier_id',$supplier_id)->first();
            }
            else
            {
                $get_supplier=Suppliers::where('supplier_id',$supplier_id)->where('supplier_created_by',$emp_id)->first();
            }
	 		$supplier_id=base64_encode(base64_encode($supplier_id));
	 		if($get_supplier)
	 		{
	 			return view('mains.supplier-details-view')->with(compact('get_supplier','countries','currency','rights'))->with('supplier_id',$supplier_id);
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

    public function update_supplier_active_inactive(Request $request)
    {
      $id=$request->get('supplier_id');
      $action_perform=$request->get('action_perform');

      if($action_perform=="active")
      {
        $update_activity=Suppliers::where('supplier_id',$id)->update(["supplier_status"=>1]);
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
      $update_activity=Suppliers::where('supplier_id',$id)->update(["supplier_status"=>0]);
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

 // public function guide_management(Request $request)
 //     {
 //      if(session()->has('travel_users_id'))
 //      {
 //         $rights=$this->rights('admin-guide-management');
 //       $countries=Countries::where('country_status',1)->get();
 //        $emp_id=session()->get('travel_users_id');
 //         if(strpos($rights['admin_which'],'add')!==false || strpos($rights['admin_which'],'view')!==false)
 //            {
 //                $get_guides=Guides::get();
 //            }
 //            else
 //            {
 //            	 $get_guides=Guides::where('guide_created_by',$emp_id)->where('guide_role',"!=","Supplier")->get();
 //            }
 //         $get_suppliers=Suppliers::where('supplier_status',1)->get();
 //        return view('mains.admin-guide-management')->with(compact('get_suppliers','get_guides','countries','rights'));
 //      }
 //      else
 //      {
 //        return redirect()->route('index');
 //      }

 //    }
//     public function create_guide(Request $request)
//     {
//       if(session()->has('travel_users_id'))
//       {
//          $rights=$this->rights('admin-guide-management');
//        $countries=Countries::where('country_status',1)->get();
//         $suppliers=Suppliers::where('supplier_status',1)->get();
//         return view('mains.admin-create-guide')->with(compact('suppliers','rights'));
//       }
//       else
//       {
//         return redirect()->route('index');
//       }
//     }
//     public function insert_guide(Request $request)
//     {

//       $guide_created_by=session()->get('travel_users_id');
//       $guide_first_name=$request->get('guide_first_name');
//       $guide_last_name=$request->get('guide_last_name');
//       $guide_contact=$request->get('contact_number');
//       $guide_address=$request->get('address');
//         $check_guides=Guides::where('guide_contact',$guide_contact)->get();
//         if(count($check_guides)>0)
//         {
  
//             echo "exist";
//         }
//         else
//         {
//             $guide_supplier_id=$request->get('guide_supplier_name');
//       $guide_country=$request->get('guide_country');
//       $guide_city=$request->get('guide_city');
//        $guide_language=$request->get('guide_language');
//       $guide_description=$request->get('description');
     
//       $guide_logo_file=$request->get('guide_logo_file');

//          if($request->hasFile('guide_logo_file'))
//         {
//             $guide_logo_file=$request->file('guide_logo_file');
//             $extension=strtolower($request->guide_logo_file->getClientOriginalExtension());
//             if($extension=="png" || $extension=="jpg" || $extension=="jpeg")
//             {
//                 $guide_image = "guide-".time().'.'.$request->file('guide_logo_file')->getClientOriginalExtension();

//                 // request()->agent_logo->storeAs(public_path('consultant-images'), $imageName);
//                 $dir1 = 'assets/uploads/guide_images/';

//                 $request->file('guide_logo_file')->move($dir1, $guide_image);
//             }
//             else
//             {
//                 $guide_image = "";
//             }
//         }
//         else
//         {
//             $guide_image = "";
//         }
         
//         $guide=new Guides;
//         $guide->guide_first_name=$guide_first_name;
//         $guide->guide_last_name=$guide_last_name;
//         $guide->guide_contact=$guide_contact;
//         $guide->guide_address=$guide_address;
//          $guide->guide_supplier_id=$guide_supplier_id;
//         $guide->guide_country=$guide_country;
//         $guide->guide_city=$guide_city;
//         $guide->guide_language=$guide_language;
//         $guide->guide_description=$guide_description;
//         $guide->guide_image=$guide_image;
//         $guide->guide_created_by=$guide_created_by;
//         if(session()->get('travel_users_role')=="Admin")
//         {
//          $guide->guide_role="Admin";
//         }
//         else
//         {
//         $guide->guide_role="Sub-User";
//         }

//          if($guide->save())
//          {
//           $last_id=$guide->id;
//         $guide_log=new Guides_log;
//         $guide_log->guide_id=$last_id;
//         $guide_log->guide_first_name=$guide_first_name;
//         $guide_log->guide_last_name=$guide_last_name;
//         $guide_log->guide_contact=$guide_contact;
//         $guide_log->guide_address=$guide_address;
//         $guide_log->guide_supplier_id=$guide_supplier_id;
//         $guide_log->guide_country=$guide_country;
//         $guide_log->guide_city=$guide_city;
//         $guide_log->guide_language=$guide_language;
//         $guide_log->guide_description=$guide_description;
//         $guide_log->guide_image=$guide_image;
//         $guide_log->guide_created_by=$guide_created_by;
//         if(session()->get('travel_users_role')=="Admin")
//         {
//            $guide_log->guide_role="Admin";
//        }
//        else
//        {
//         $guide_log->guide_role="Sub-User";
//         }
//         $guide_log->guide_operation_performed="INSERT";
//           $guide_log->save();
//           echo "success";
//          }
//          else
//          {
//           echo "fail";
//          }
//      }

//     }
//      public function edit_guide($guide_id)
//     {
//       if(session()->has('travel_users_id'))
//       {
//             $rights=$this->rights('admin-guide-management');
//          $countries=Countries::where('country_status',1)->get();
//            $emp_id=session()->get('travel_users_id');
//            if(strpos($rights['admin_which'],'edit_delete')!==false)
//            {
//            	$get_guides=Guides::where('guide_id',$guide_id)->first();
//            }
//            else
//            {
//            	$get_guides=Guides::where('guide_id',$guide_id)->where('guide_created_by',$emp_id)->where('guide_role',"!=","Supplier")->first();
//            }
        
//           if($get_guides)
//           {
//               $supplier_id=$get_guides->guide_supplier_id;

//           $get_supplier_countries=Suppliers::where('supplier_id',$supplier_id)->first();

//           $supplier_countries=$get_supplier_countries->supplier_opr_countries;

//           $countries_data=explode(',', $supplier_countries);
//            $suppliers=Suppliers::where('supplier_status',1)->get();
//            $cities=Cities::join("states","states.id","=","cities.state_id")->where("states.country_id", $get_guides->guide_country)->select("cities.*")->orderBy('cities.name','asc')->get();

//           return view('mains.admin-edit-guide')->with(compact('countries','cities','get_supplier_countries','get_guides','suppliers',"countries_data",'rights'));
//           }
//           else
//           {
//             return redirect()->back();
//           }

         

        
//       }
//       else
//       {
//         return redirect()->route('index');
//       }

//     }

//      public function update_guide(Request $request)
//     {
//       $guide_id=$request->get('guide_id');
//       $guide_created_by=session()->get('travel_users_id');
//       $guide_first_name=$request->get('guide_first_name');
//       $guide_last_name=$request->get('guide_last_name');
//       $guide_contact=$request->get('contact_number');
//       $guide_address=$request->get('address');
//         $check_guides=Guides::where('guide_contact',$guide_contact)->where('guide_id','!=',$guide_id)->get();
//         if(count($check_guides)>0)
//         {
  
//             echo "exist";
//         }
//         else
//         {
//          $guide_image_get=Guides::where('guide_id',$guide_id)->first();
//           $logo_data=$guide_image_get['guide_image'];
//            $guide_supplier_id=$request->get('guide_supplier_name');

//           $guide_country=$request->get('guide_country');
//           $guide_city=$request->get('guide_city');
//           $guide_language=$request->get('guide_language');
//           $guide_description=$request->get('description');

//           $guide_logo_file=$request->get('guide_logo_file');

//          if($request->hasFile('guide_logo_file'))
//         {
//             $guide_logo_file=$request->file('guide_logo_file');
//             $extension=strtolower($request->guide_logo_file->getClientOriginalExtension());
//             if($extension=="png" || $extension=="jpg" || $extension=="jpeg")
//             {
//                 $guide_image = "guide-".time().'.'.$request->file('guide_logo_file')->getClientOriginalExtension();

//                 // request()->agent_logo->storeAs(public_path('consultant-images'), $imageName);
//                 $dir1 = 'assets/uploads/guide_images/';

//                 $request->file('guide_logo_file')->move($dir1, $guide_image);
//             }
//             else
//             {
//                 $guide_image = "";
//             }
//         }
//         else
//         {
//             $guide_image = $logo_data;
//         }
         
//         $update_array=array("guide_first_name"=>$guide_first_name,
//         "guide_last_name"=>$guide_last_name,
//         "guide_contact"=>$guide_contact,
//         "guide_address"=>$guide_address,
//         "guide_supplier_id"=>$guide_supplier_id,
//         "guide_country"=>$guide_country,
//         "guide_city"=>$guide_city,
//         "guide_language"=>$guide_language,
//         "guide_description"=>$guide_description,
//         "guide_image"=>$guide_image);
//         $update_guide=Guides::where('guide_id',$guide_id)->update($update_array);
//         if($update_guide)
//         {
//           $guide_log=new Guides_log;
//           $guide_log->guide_id=$guide_id;
//           $guide_log->guide_first_name=$guide_first_name;
//           $guide_log->guide_last_name=$guide_last_name;
//           $guide_log->guide_contact=$guide_contact;
//           $guide_log->guide_address=$guide_address;
//            $guide_log->guide_supplier_id=$guide_supplier_id;
//           $guide_log->guide_country=$guide_country;
//           $guide_log->guide_city=$guide_city;
//           $guide_log->guide_language=$guide_language;
//           $guide_log->guide_description=$guide_description;
//           $guide_log->guide_image=$guide_image;
//           $guide_log->guide_created_by=$guide_created_by;
//           if(session()->get('travel_users_role')=="Admin")
//           {
//              $guide_log->guide_role="Admin";
//           }
//           else
//           {
//             $guide_log->guide_role="Sub-User";
//             }
         
//           $guide_log->guide_operation_performed="UPDATE";
//           $guide_log->save();
//           echo "success";
//         }
//         else
//         {
//           echo "fail";
//         }
//      }

//     }

//     public function guide_details($guide_id)
//     {
//      if(session()->has('travel_users_id'))
//      {
//          $rights=$this->rights('admin-guide-management');
//      $countries=Countries::where('country_status',1)->get();
//       $emp_id=session()->get('travel_users_id');
//       if(strpos($rights['admin_which'],'view')!==false)
//       {
//       	$get_guides=Guides::where('guide_id',$guide_id)->first();
//       }
//       else
//       {
//       	$get_guides=Guides::where('guide_id',$guide_id)->where('guide_created_by',$emp_id)->where('guide_role',"!=","Supplier")->first();
//       }
//       if($get_guides)
//       {
//        $supplier_id=$get_guides->guide_supplier_id;

//        $get_supplier_countries=Suppliers::where('supplier_id',$supplier_id)->first();

//        $supplier_countries=$get_supplier_countries->supplier_opr_countries;

//        $countries_data=explode(',', $supplier_countries);

//        $cities=Cities::join("states","states.id","=","cities.state_id")->where("states.country_id", $get_guides->guide_country)->select("cities.*")->orderBy('cities.name','asc')->get();
//         $suppliers=Suppliers::where('supplier_status',1)->get();

//        return view('mains.admin-guide-details-view')->with(compact('suppliers','countries','cities','get_supplier_countries','get_guides',"countries_data","rights"))->with('guide_id',$guide_id);
//      }
//      else
//      {
//       return redirect()->back();
//     }
    
//   }
//   else
//   {
//     return redirect()->route('index');
//   }
// }

public function change_password(Request $request)
{
 $supplier_id=$request->get('supplier_id');
 $supplier_new_password=$request->get('supplier_new_password');
  $supplier_confirm_password=$request->get('supplier_confirm_password');
  if($supplier_new_password==$supplier_confirm_password)
  {
    $password_original=$supplier_new_password;
    $password_secure=md5($password_original);

    $change_password_updation=Suppliers::where('supplier_id',$supplier_id)->update(["supplier_password"=>$password_secure,"supplier_password_hint"=>$password_original]);

    if($change_password_updation)
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
    echo "mismatch";
  }

}

 
}
