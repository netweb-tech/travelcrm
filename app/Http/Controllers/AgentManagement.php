<?php

namespace App\Http\Controllers;
use App\Users;
use App\Countries;
use App\Cities;
use App\Currency;
use App\UserRights;
use App\Agents;
use App\Agents_log;
use App\Suppliers;
use App\Activities;
use App\Transport;
use App\Hotels;
use App\SavedItinerary;
use Session;
use Illuminate\Http\Request;

class AgentManagement extends Controller
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

   public function agent_management(Request $request)
   {
   		if(session()->has('travel_users_id'))
	 	{

            $rights=$this->rights('agent-management');
	 		$countries=Countries::where('country_status',1)->get();
	 		$emp_id=session()->get('travel_users_id');

            if(strpos($rights['admin_which'],'add')!==false || strpos($rights['admin_which'],'view')!==false)
            {
                $get_agents=Agents::get();
            }
            else
            {
                $get_agents=Agents::where('agent_created_by',$emp_id)->get(); 
            }
	 		
	 		return view('mains.agent-management')->with(compact('get_agents','countries','rights'));
	 	}
	 	else
	 	{
	 		return redirect()->route('index');
	 	}

   }
     public function create_agent(Request $request)
    {
    	if(session()->has('travel_users_id'))
    	{
             $rights=$this->rights('agent-management');
    		  $countries=Countries::where('country_status',1)->get();
           $currency=Currency::get();
    		return view('mains.create-agent')->with(compact('countries','currency','rights'));
    	}
    	else
    	{
    		return redirect()->route('index');
    	}

    	
    }

    public function insert_agent(Request $request)
    {

       
        $created_by=session()->get('travel_users_id');
    	$agent_name=$request->get('agent_name');
    	$company_name=$request->get('company_name');
    	$email_id=$request->get('email_id');
    	$contact_number=$request->get('contact_number');
        $check_agent=Agents::where('company_email',$email_id)->orWhere('company_contact',$contact_number)->get();
        if(count($check_agent)>0)
        {
  
            echo "exist";
        }
        else
        {
    	$fax_number=$request->get('fax_number');
    	$agent_reference_id=$request->get('agent_reference_id');
    	$address=$request->get('address');
    	$agent_country=$request->get('agent_country');
    	$agent_city=$request->get('agent_city');
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
    	$agent_opr_currency=$request->get('agent_opr_currency');
    	$agent_opr_countries=$request->get('agent_opr_countries');
    	$account_number=$request->get('account_number');
    	$bank_name=$request->get('bank_name');
    	$bank_ifsc=$request->get('bank_ifsc');
    	$bank_iban=$request->get('bank_iban');
    	$bank_currency=$request->get('bank_currency');
    	$service_type=$request->get('service_type');
    	$contact_person_name=$request->get('contact_person_name');
    	$contact_person_number=$request->get('contact_person_number');	
    	$contact_person_email=$request->get('contact_person_email');
    	$agent_certificate_file=$request->get('agent_certificate_file');
    	$agent_logo_file=$request->get('agent_logo_file');

    	 if($request->hasFile('agent_certificate_file'))
        {
            $agent_certificate_file=$request->file('agent_certificate_file');
            $extension=strtolower($request->agent_certificate_file->getClientOriginalExtension());
            if($extension=="png" || $extension=="jpg" || $extension=="jpeg" || $extension=="pdf")
            {
                $certificate_agent = "certificate-".time().'.'.$request->file('agent_certificate_file')->getClientOriginalExtension();

                // request()->agent_logo->storeAs(public_path('consultant-images'), $imageName);
                $dir = 'assets/uploads/agent_certificates/';

                $request->file('agent_certificate_file')->move($dir, $certificate_agent);
            }
            else
            {
                $certificate_agent = "";
            }
        }
        else
        {
            $certificate_agent = "";
        }

         if($request->hasFile('agent_logo_file'))
        {
            $agent_logo_file=$request->file('agent_logo_file');
            $extension=strtolower($request->agent_logo_file->getClientOriginalExtension());
            if($extension=="png" || $extension=="jpg" || $extension=="jpeg" || $extension=="pdf")
            {
                $logo_agent = "logo-".time().'.'.$request->file('agent_logo_file')->getClientOriginalExtension();

                // request()->agent_logo->storeAs(public_path('consultant-images'), $imageName);
                $dir1 = 'assets/uploads/agent_logos/';

                $request->file('agent_logo_file')->move($dir1, $logo_agent);
            }
            else
            {
                $logo_agent = "";
            }
        }
        else
        {
            $logo_agent = "";
        }

        $operating_weekdays=array("monday"=>$week_monday,
        	"tuesday"=>$week_tuesday,
        	"wednesday"=>$week_wednesday,
        	"thursday"=>$week_thursday,
        	"friday"=>$week_friday,
        	"saturday"=>$week_saturday,
        	"sunday"=>$week_sunday);

        $operating_weekdays=serialize($operating_weekdays);
        $agent_opr_currency=implode(",",$agent_opr_currency);
        $agent_opr_countries=implode(",",$agent_opr_countries);

        $service_type=implode(",",$service_type);

          //agent markup new code
        if($request->has('service_name'))
        {
            $service_name=$request->get('service_name');

            $service_cost=$request->get('service_cost');

            $agent_service_markup="";
            for($markup_count=0;$markup_count<count($service_name);$markup_count++)

            {

              $agent_service_markup.=$service_name[$markup_count]."---".$service_cost[$markup_count]."///";
          }


      }
      else
      {
          $agent_service_markup="";
      }
      //end of agent markup new code

			$agent_bank_details=array();
         for($bank_count=0;$bank_count<count($account_number);$bank_count++)
         {
         	$agent_bank_details[$bank_count]['account_number']=$account_number[$bank_count];
         	$agent_bank_details[$bank_count]['bank_name']=$bank_name[$bank_count];
         	$agent_bank_details[$bank_count]['bank_ifsc']=$bank_ifsc[$bank_count];
         	$agent_bank_details[$bank_count]['bank_iban']=$bank_iban[$bank_count];
         	$agent_bank_details[$bank_count]['bank_currency']=$bank_currency[$bank_count];

         }
         	$contact_persons=array();
         for($contact_count=0;$contact_count<count($contact_person_name);$contact_count++)
         {
         	$contact_persons[$contact_count]['contact_person_name']=$contact_person_name[$contact_count];
         	$contact_persons[$contact_count]['contact_person_number']=$contact_person_number[$contact_count];
         	$contact_persons[$contact_count]['contact_person_email']=$contact_person_email[$contact_count];

         }

       



         $agent_password_hint="12345";
         $agent_password=md5($agent_password_hint);
         
        $agent_bank_details=serialize($agent_bank_details);
        $contact_persons=serialize($contact_persons);
        $agent=new Agents;
        $agent->agent_name=$agent_name;
        $agent->company_name=$company_name;
        $agent->company_email=$email_id;
        $agent->agent_password=$agent_password;
        $agent->agent_password_hint=$agent_password_hint;
        $agent->company_contact=$contact_number;
        $agent->company_fax=$fax_number;
        $agent->agent_ref_id=$agent_reference_id;
        $agent->address=$address;
        $agent->agent_country=$agent_country;
        $agent->agent_city=$agent_city;
        $agent->corporate_reg_no=$corporate_reg_no;
        $agent->corporate_desc=$corporate_description;
        $agent->skype_id=$skype_id;	
        $agent->operating_hrs_from=$operating_hrs_from;
        $agent->operating_hrs_to=$operating_hrs_to;	
        $agent->operating_weekdays=$operating_hrs_to;
        $agent->operating_weekdays=$operating_weekdays;
        $agent->certificate_corp=$certificate_agent;	
        $agent->agent_logo=$logo_agent;
        $agent->agent_opr_currency=$agent_opr_currency;
        $agent->agent_opr_countries=$agent_opr_countries;	
         $agent->agent_bank_details=$agent_bank_details;
         $agent->agent_service_type=$service_type;
         $agent->agent_service_markup=$agent_service_markup;
         $agent->contact_persons=$contact_persons;	
          $agent->agent_created_by=$created_by;  
         if($agent->save())
         {
         	$last_id=$agent->id;
         	$agent_log=new Agents_log;
         	$agent_log->agent_id=$last_id;
         	$agent_log->agent_name=$agent_name;
         	$agent_log->company_name=$company_name;
         	$agent_log->company_email=$email_id;
         	$agent_log->agent_password=$agent_password;
         	$agent_log->agent_password_hint=$agent_password_hint;
         	$agent_log->company_contact=$contact_number;
         	$agent_log->company_fax=$fax_number;
         	$agent_log->agent_ref_id=$agent_reference_id;
         	$agent_log->address=$address;
         	$agent_log->agent_country=$agent_country;
         	$agent_log->agent_city=$agent_city;
         	$agent_log->corporate_reg_no=$corporate_reg_no;
         	$agent_log->corporate_desc=$corporate_description;
         	$agent_log->skype_id=$skype_id;	
         	$agent_log->operating_hrs_from=$operating_hrs_from;
         	$agent_log->operating_hrs_to=$operating_hrs_to;	
         	$agent_log->operating_weekdays=$operating_hrs_to;
         	$agent_log->operating_weekdays=$operating_weekdays;
         	$agent_log->certificate_corp=$certificate_agent;	
         	$agent_log->agent_logo=$logo_agent;
         	$agent_log->agent_opr_currency=$agent_opr_currency;
         	$agent_log->agent_opr_countries=$agent_opr_countries;	
         	$agent_log->agent_bank_details=$agent_bank_details;
         	$agent_log->agent_service_type=$service_type;
            $agent_log->agent_service_markup=$agent_service_markup;
         	$agent_log->contact_persons=$contact_persons;	
         	$agent_log->agent_created_by=$created_by;
         	if(session()->get('travel_users_role')=="Admin")
         	{
         		$agent_log->agent_created_role="Admin";
         	}
         	else
         	{
         		$agent_log->agent_created_role="Sub-User";
         	}
         	$agent_log->agent_operation_performed="INSERT";

         	$agent_log->save();

         	echo "success";
         }
         else
         {
         	echo "fail";
         }
     }

    }
 public function edit_agent($agent_id)
    {
    	if(session()->has('travel_users_id'))
    	{
            $rights=$this->rights('agent-management');
    		  $countries=Countries::where('country_status',1)->get();
           $currency=Currency::get();
           $emp_id=session()->get('travel_users_id');
            if(strpos($rights['admin_which'],'edit_delete')!==false)
            {
                $get_agent=Agents::where('agent_id',$agent_id)->first();
            }
            else
            {
                $get_agent=Agents::where('agent_id',$agent_id)->where('agent_created_by',$emp_id)->first();
            }
                if($get_agent)
                {
                	$cities=Cities::join("states","states.id","=","cities.state_id")->where("states.country_id", $get_agent->agent_country)->select("cities.*")->orderBy('cities.name','asc')->get();
                  return view('mains.edit-agent')->with(compact('countries','currency','get_agent','cities','rights'));
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
    public function update_agent(Request $request)
    {	
    	$created_by=session()->get('travel_users_id');
    	$agent_id=urldecode(base64_decode(base64_decode($request->get('agent_id'))));

    	$check_agent=Agents::where('agent_id',$agent_id)->first();
    	if(!$check_agent)
    	{
    		echo "fail";
    	}
    	else
    	{
    		$certificate_data=$check_agent->certificate_corp;
    		$logo_data=$check_agent->agent_logo;

    		$agent_name=$request->get('agent_name');
    		$company_name=$request->get('company_name');
    		$email_id=$request->get('email_id');
    		$contact_number=$request->get('contact_number');
    		$fax_number=$request->get('fax_number');
    		$check_agent_exist=Agents::where('agent_id','!=',$agent_id)->where(function($query) use($email_id,$contact_number){

    			$query->where('company_email',$email_id)->orWhere('company_contact',$contact_number);

    		})->get();
    		if(count($check_agent_exist)>0)
    		{

    			echo "exist";
    		}
    		else
    		{
    			$agent_reference_id=$request->get('agent_reference_id');
    			$address=$request->get('address');
    			$agent_country=$request->get('agent_country');
    			$agent_city=$request->get('agent_city');
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
    			$agent_opr_currency=$request->get('agent_opr_currency');
    			$agent_opr_countries=$request->get('agent_opr_countries');
    			$account_number=$request->get('account_number');
    			$bank_name=$request->get('bank_name');
    			$bank_ifsc=$request->get('bank_ifsc');
    			$bank_iban=$request->get('bank_iban');
    			$bank_currency=$request->get('bank_currency');
    			$service_type=$request->get('service_type');
    			$contact_person_name=$request->get('contact_person_name');
    			$contact_person_number=$request->get('contact_person_number');	
    			$contact_person_email=$request->get('contact_person_email');
    			$agent_certificate_file=$request->get('agent_certificate_file');
    			$agent_logo_file=$request->get('agent_logo_file');

    			if($request->hasFile('agent_certificate_file'))
    			{
    				$agent_certificate_file=$request->file('agent_certificate_file');
    				$extension=strtolower($request->agent_certificate_file->getClientOriginalExtension());
    				if($extension=="png" || $extension=="jpg" || $extension=="jpeg" || $extension=="pdf")
    				{
    					$certificate_agent = "certificate-".time().'.'.$request->file('agent_certificate_file')->getClientOriginalExtension();

                // request()->agent_logo->storeAs(public_path('consultant-images'), $imageName);
    					$dir = 'assets/uploads/agent_certificates/';

    					$request->file('agent_certificate_file')->move($dir, $certificate_agent);
    				}
    				else
    				{
    					$certificate_agent = "";
    				}
    			}
    			else
    			{
    				$certificate_agent=$certificate_data;
    			}


    			if($request->hasFile('agent_logo_file'))
    			{
    				$agent_logo_file=$request->file('agent_logo_file');
    				$extension=strtolower($request->agent_logo_file->getClientOriginalExtension());
    				if($extension=="png" || $extension=="jpg" || $extension=="jpeg" || $extension=="pdf")
    				{
    					$logo_agent = "logo-".time().'.'.$request->file('agent_logo_file')->getClientOriginalExtension();

                		// request()->agent_logo->storeAs(public_path('consultant-images'), $imageName);
    					$dir1 = 'assets/uploads/agent_logos/';

    					$request->file('agent_logo_file')->move($dir1, $logo_agent);
    				}
    				else
    				{
    					$logo_agent = "";
    				}
    			}
    			else
    			{
    				$logo_agent=$logo_data;
    			}


    			$operating_weekdays=array("monday"=>$week_monday,
    				"tuesday"=>$week_tuesday,
    				"wednesday"=>$week_wednesday,
    				"thursday"=>$week_thursday,
    				"friday"=>$week_friday,
    				"saturday"=>$week_saturday,
    				"sunday"=>$week_sunday);

    			$operating_weekdays=serialize($operating_weekdays);
    			$agent_opr_currency=implode(",",$agent_opr_currency);
    			$agent_opr_countries=implode(",",$agent_opr_countries);

    			$service_type=implode(",",$service_type);

                 //agent markup new code
               if($request->has('service_name'))
               {
                $service_name=$request->get('service_name');

                $service_cost=$request->get('service_cost');

                $agent_service_markup="";
                for($markup_count=0;$markup_count<count($service_name);$markup_count++)

                {

                  $agent_service_markup.=$service_name[$markup_count]."---".$service_cost[$markup_count]."///";
              }


          }
          else
          {
              $agent_service_markup="";
          }
      //end of agent markup new code


    			$agent_bank_details=array();
    			for($bank_count=0;$bank_count<count($account_number);$bank_count++)
    			{
    				$agent_bank_details[$bank_count]['account_number']=$account_number[$bank_count];
    				$agent_bank_details[$bank_count]['bank_name']=$bank_name[$bank_count];
    				$agent_bank_details[$bank_count]['bank_ifsc']=$bank_ifsc[$bank_count];
    				$agent_bank_details[$bank_count]['bank_iban']=$bank_iban[$bank_count];
    				$agent_bank_details[$bank_count]['bank_currency']=$bank_currency[$bank_count];

    			}
    			$contact_persons=array();
    			for($contact_count=0;$contact_count<count($contact_person_name);$contact_count++)
    			{
    				$contact_persons[$contact_count]['contact_person_name']=$contact_person_name[$contact_count];
    				$contact_persons[$contact_count]['contact_person_number']=$contact_person_number[$contact_count];
    				$contact_persons[$contact_count]['contact_person_email']=$contact_person_email[$contact_count];

    			}

    			$agent_bank_details=serialize($agent_bank_details);
    			$contact_persons=serialize($contact_persons);

    			$update_data=array("agent_name"=>$agent_name,
    				"company_name"=>$company_name,
    				"company_email"=>$email_id,
    				"company_contact"=>$contact_number,
    				"company_fax"=>$fax_number,
    				"agent_ref_id"=>$agent_reference_id,
    				"address"=>$address,
    				"agent_country"=>$agent_country,
    				"agent_city"=>$agent_city,
    				"corporate_reg_no"=>$corporate_reg_no,
    				"corporate_desc"=>$corporate_description,
    				"skype_id"=>$skype_id,  
    				"operating_hrs_from"=>$operating_hrs_from,
    				"operating_hrs_to"=>$operating_hrs_to,  
    				"operating_weekdays"=>$operating_hrs_to,
    				"operating_weekdays"=>$operating_weekdays,
    				"certificate_corp"=>$certificate_agent,  
    				"agent_logo"=>$logo_agent,
    				"agent_opr_currency"=>$agent_opr_currency,
    				"agent_opr_countries"=>$agent_opr_countries,  
    				"agent_bank_details"=>$agent_bank_details,
    				"agent_service_type"=>$service_type,
                    "agent_service_markup"=>$agent_service_markup,
    				"contact_persons"=>$contact_persons
    			);


    			$update_query=Agents::where('agent_id',$agent_id)->update($update_data);
    			if($update_query)
    			{
    				$agent_log=new Agents_log;
    				$agent_log->agent_id=$agent_id;
    				$agent_log->agent_name=$agent_name;
    				$agent_log->company_name=$company_name;
    				$agent_log->company_email=$email_id;
    				$agent_log->company_contact=$contact_number;
    				$agent_log->company_fax=$fax_number;
    				$agent_log->agent_ref_id=$agent_reference_id;
    				$agent_log->address=$address;
    				$agent_log->agent_country=$agent_country;
    				$agent_log->agent_city=$agent_city;
    				$agent_log->corporate_reg_no=$corporate_reg_no;
    				$agent_log->corporate_desc=$corporate_description;
    				$agent_log->skype_id=$skype_id;	
    				$agent_log->operating_hrs_from=$operating_hrs_from;
    				$agent_log->operating_hrs_to=$operating_hrs_to;	
    				$agent_log->operating_weekdays=$operating_hrs_to;
    				$agent_log->operating_weekdays=$operating_weekdays;
    				$agent_log->certificate_corp=$certificate_agent;	
    				$agent_log->agent_logo=$logo_agent;
    				$agent_log->agent_opr_currency=$agent_opr_currency;
    				$agent_log->agent_opr_countries=$agent_opr_countries;	
    				$agent_log->agent_bank_details=$agent_bank_details;
    				$agent_log->agent_service_type=$service_type;
                    $agent_log->agent_service_markup=$agent_service_markup;
    				$agent_log->contact_persons=$contact_persons;	
    				$agent_log->agent_created_by=$created_by;
    				if(session()->get('travel_users_role')=="Admin")
    				{
    					$agent_log->agent_created_role="Admin";
    				}
    				else
    				{
    					$agent_log->agent_created_role="Sub-User";
    				}
    				$agent_log->agent_operation_performed="UPDATE";

    				$agent_log->save();
    				echo "success";
    			}
    			else
    			{
    				echo "fail";
    			}
    		}
    	}

    }
    public function agent_details($agent_id)
    {
    	 if(session()->has('travel_users_id'))
	 	{
             $rights=$this->rights('agent-management');
	 		$currency=Currency::get();
	 		$countries=Countries::where('country_status',1)->get();
	 		$emp_id=session()->get('travel_users_id');
	 		 if(strpos($rights['admin_which'],'view')!==false)
            {
                $get_agent=Agents::where('agent_id',$agent_id)->first();
            }
            else
            {
                $get_agent=Agents::where('agent_id',$agent_id)->where('agent_created_by',$emp_id)->first();
            }
	 		$agent_id=base64_encode(base64_encode($agent_id));
	 		if($get_agent)
	 		{
	 			return view('mains.agent-details-view')->with(compact('get_agent','countries','currency','rights'))->with('agent_id',$agent_id);
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

    public function update_agent_active_inactive(Request $request)
    {
    	$id=$request->get('agent_id');
    	$action_perform=$request->get('action_perform');

    	if($action_perform=="active")
    	{
    		$update_activity=Agents::where('agent_id',$id)->update(["agent_status"=>1]);
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
    		$update_activity=Agents::where('agent_id',$id)->update(["agent_status"=>0]);
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

    public function agent_home(Request $request)
    {
    	 if(session()->has('travel_agent_id'))
          {

          	$countries=Countries::where('country_status',1)->get();
          	$cities=Cities::get();
          	$agent_id=session()->get('travel_agent_id');
          	$get_itinerary=SavedItinerary::where('itinerary_status',1)->paginate(9);
          	$get_activities=Activities::where('activity_status',1)->paginate(9);
          	$get_transport=Transport::where('transfer_status',1)->paginate(9);
          	$get_hotels=Hotels::where('hotel_status',1)->paginate(9);


           return view('agent.home')->with(compact('countries','cities','agent_id','get_itinerary','get_activities','get_transport','get_hotels'));
        }
        else
        {
         return redirect()->route('/agent');
        }
    }

    public function change_password(Request $request)
{
 $agent_id=$request->get('agent_id');
 $agent_new_password=$request->get('agent_new_password');
  $agent_confirm_password=$request->get('agent_confirm_password');
  if($agent_new_password==$agent_confirm_password)
  {
    $password_original=$agent_new_password;
    $password_secure=md5($password_original);

    $change_password_updation=Agents::where('agent_id',$agent_id)->update(["agent_password"=>$password_secure,"agent_password_hint"=>$password_original]);

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
