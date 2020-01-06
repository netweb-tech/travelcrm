<?php

namespace App\Http\Controllers;
use App\Countries;
use App\Currency;
use App\Enquiries;
use App\Users;
use App\UserRights;
use App\EnquiryComments;
use DB;
use Session;
use Illuminate\Http\Request;

class EnquiryController extends Controller
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

    public function create_enquiry(Request $request)
    {    
        if(session()->has('travel_users_id'))
        {
            $rights=$this->rights('view-enquiry');
           $countries=Countries::where('country_status',1)->get();
           $currency=Currency::get();
           $users=Users::where("users_status",1)->where('users_pid',"!=","0")->get();
           return view('mains.create-enquiry')->with(compact('countries','currency','users','rights'));
       }
       else
       {
        return redirect()->route('index');
        }
    }
    public function insert_enquiry(Request $request)
    {
        $emp_id=session()->get('travel_users_id');
    	$organization_name=$request->get('organization_name');
        $customer_name=$request->get('customer_name');
        $customer_contact=$request->get('customer_contact');
        $alternate_contact_number=$request->get('alternate_contact_number');
        $customer_email=$request->get('customer_email');
        $customer_alt_email=$request->get('customer_alt_email');
        $passport_no=$request->get('passport_no');
        $passport_validity=$request->get('passport_validity');
        $enquiry_type=$request->get('enquiry_type');
         $address=$request->get('address');
        $area=$request->get('area');
        $customer_country=$request->get('customer_country');
        $customer_city=$request->get('customer_city');
        $customer_state=$request->get('customer_state');
        $customer_zipcode=$request->get('customer_zipcode');
        $booking_range=$request->get('booking_range');
        $no_of_days=$request->get('no_of_days');
        $no_of_adults=$request->get('no_of_adults');
        $no_of_kids=$request->get('no_of_kids');
        $hotel_type=$request->get('hotel_type');
        $budget_type=$request->get('budget_type');
        $enquiry_source=$request->get('enquiry_source');
        $enquiry_prospect=$request->get('enquiry_prospect');
        $enquiry_status=$request->get('enquiry_status');
        $assigned_to=$request->get('assigned_to');
        $nxt_followup_date=$request->get('nxt_followup_date');
        $customer_dob=$request->get('customer_dob');
        $wedding_date=$request->get('wedding_date');
        $currency_exchange_rate_status=$request->get('currency_exchange_rate_status');
        $have_visa=$request->get('have_visa');
        $have_insurance_status=$request->get('have_insurance_status');



         // $fetch_enquiries=Enquiries::where('customer_email',$customer_email)->get();
         // if(count($fetch_enquiries)>0)
         // {
         //    echo "exist";
         // }
         // else
         // {
             if($currency_exchange_rate_status=="Yes")
        {
            $currency=$request->get('currency');
            $currency_exchange_rate=$request->get('currency_exchange_rate');
        }
        else
        {
          $currency="0";
          $currency_exchange_rate="0";
        }
        if($have_insurance_status=="Yes")
        {
            $insurance_days=$request->get('insurance_days');
            $insurance_type=$request->get('insurance_type');
        }
        else
        {
          $insurance_days="0";
          $insurance_type="0";
        }
        $departure_country=$request->get('departure_country');
        $departure_city=$request->get('departure_city');
        $location_country=$request->get('enquiry_location_country');
          $location_cities=$request->get('enquiry_location_cities');
        $locations_array=array();
        for($i=0;$i<count($location_country);$i++)
        {
            $locations_array[$i]['country']=$location_country[$i];
            $locations_array[$i]['city']=$location_cities[$i];
        }
        $enquiry_locations=serialize($locations_array);

        $passenger_name=$request->get('passenger_name');
        $passenger_dob=$request->get('passenger_dob');
        $passenger_pan_number=$request->get('passenger_pan_number');
        $passenger_passport_no=$request->get('passenger_passport_no');
        $gstin_no=$request->get('gstin_no');
        $enquiry_comments=$request->get('enquiry_comments');
        if($request->has('response_email_status'))
        {
            $response_email_status=1;
        }
        else
        {
             $response_email_status=0;
        }
         if($request->has('response_sms_status'))
        {
            $response_sms_status=1;
        }
        else
        {
             $response_sms_status=0;
        }
        if($response_email_status==1)
        {
         $response_email_text=$request->get('response_email_text'); 
        }
        else
        {
              $response_email_text="";
        }

        if($request->hasFile('enquiry_comments_file'))
        {
            $enquiry_comments_file=$request->file('enquiry_comments_file');
            $extension=strtolower($request->enquiry_comments_file->getClientOriginalExtension());
            if($extension=="png" || $extension=="jpg" || $extension=="jpeg" || $extension=="pdf")
            {
                $imageName = time().'.'.$request->file('enquiry_comments_file')->getClientOriginalExtension();

                // request()->agent_logo->storeAs(public_path('consultant-images'), $imageName);
                $dir = 'assets/uploads/enq_comments/';

                $request->file('enquiry_comments_file')->move($dir, $imageName);
            }
            else
            {
                $imageName = "";
            }
        }
        else
        {
            $imageName = "";
        }
       

        date_default_timezone_set('Asia/Kolkata');
        $create_date=date('Y-m-d');
        $insert_enquiry=new Enquiries;
        $insert_enquiry->emp_id=$emp_id;
        $insert_enquiry->organization_name=$organization_name;
        $insert_enquiry->customer_name=$customer_name;
        $insert_enquiry->customer_contact=$customer_contact;
        $insert_enquiry->customer_alt_contact=$alternate_contact_number;
        $insert_enquiry->customer_email=$customer_email;
        $insert_enquiry->customer_alt_email=$customer_alt_email;
        $insert_enquiry->passport_no=$passport_no;
        $insert_enquiry->passport_validity=$passport_validity;
        $insert_enquiry->enquiry_type=$enquiry_type;

        $insert_enquiry->address=$address;
        $insert_enquiry->area=$area;
        $insert_enquiry->customer_country=$customer_country;
        $insert_enquiry->customer_city=$customer_city;
        $insert_enquiry->customer_state=$customer_state;
        $insert_enquiry->customer_zipcode=$customer_zipcode;
        $insert_enquiry->booking_range=$booking_range;

        $insert_enquiry->no_of_days=$no_of_days;
        $insert_enquiry->no_of_adults=$no_of_adults;
        $insert_enquiry->no_of_kids=$no_of_kids;

        $insert_enquiry->hotel_type=$hotel_type;
        $insert_enquiry->budget_type=$budget_type;
        $insert_enquiry->enquiry_source=$enquiry_source;

        $insert_enquiry->enquiry_prospect=$enquiry_prospect;
        $insert_enquiry->enquiry_status=$enquiry_status;
        $insert_enquiry->assigned_to=$assigned_to;

        $insert_enquiry->nxt_followup_date=$nxt_followup_date;
        $insert_enquiry->customer_dob=$customer_dob;
        $insert_enquiry->wedding_date=$wedding_date;

        $insert_enquiry->currency_exchange_rate_status=$currency_exchange_rate_status;
        $insert_enquiry->select_currency=$currency;
        $insert_enquiry->select_currency_rate=$currency_exchange_rate;
        $insert_enquiry->have_visa=$have_visa;
        $insert_enquiry->have_insurance_status=$have_insurance_status;
        $insert_enquiry->insurance_days=$insurance_days;
        $insert_enquiry->insurance_type=$insurance_type;

        $insert_enquiry->departure_country=$departure_country;
        $insert_enquiry->departure_city=$departure_city;
        $insert_enquiry->enquiry_locations=$enquiry_locations;


        $insert_enquiry->passenger_name=$passenger_name;
        $insert_enquiry->passenger_dob=$passenger_dob;
        $insert_enquiry->passenger_pan_number=$passenger_pan_number;
        $insert_enquiry->passenger_passport_no=$passenger_passport_no;
        $insert_enquiry->gstin_no=$gstin_no;
        $insert_enquiry->create_date=$create_date;

        if($insert_enquiry->save())
        {
            $last_enq_id=DB::getPdo()->lastInsertId();

            $insert_comments=new EnquiryComments;
            $insert_comments->enq_id=$last_enq_id;
            $insert_comments->enq_comments=$enquiry_comments;
            $insert_comments->enq_comments_file= $imageName;
             $insert_comments->enq_status=$enquiry_status;
            $insert_comments->enq_nxtfollowup_date= $nxt_followup_date;
            $insert_comments->response_email_status=$response_email_status;
            $insert_comments->response_sms_status=$response_sms_status;
            $insert_comments->response_email_text=$response_email_text;
            $insert_comments->given_by=$emp_id;
            if($insert_comments->save())
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
        // }
    }

    public function view_enquiry(Request $request)
    {
        if(session()->has('travel_users_id'))
        {
             $rights=$this->rights('view-enquiry');
            $countries=Countries::get();
            $emp_id=session()->get('travel_users_id');
              if(strpos($rights['admin_which'],'add')!==false || strpos($rights['admin_which'],'view')!==false)
            {
                $get_enquiries=Enquiries::get();
            }
            else
            {
                 $get_enquiries=Enquiries::where('emp_id',$emp_id)->orWhere('assigned_to',$emp_id)->get();
            }
            $users=Users::where("users_status",1)->get();
            return view('mains.view-enquiry')->with(compact('get_enquiries','countries','users','rights'));
        }
        else
        {
           return redirect()->route('index');
       }
       
   }

    public function edit_enquiry($enq_id)
    {

       if(session()->has('travel_users_id'))
       {
         $rights=$this->rights('view-enquiry');
         $currency=Currency::get();
         $countries=Countries::get();
         $users=Users::where("users_status",1)->where('users_pid',"!=","0")->get();
       
          $emp_id=session()->get('travel_users_id');
              if(strpos($rights['admin_which'],'edit_delete')!==false)
            {
                  $get_enquiries=Enquiries::where('enq_id',$enq_id)->first();
            }
            else
            {
                 $get_enquiries=Enquiries::where('enq_id',$enq_id)->where(function ($query) use($emp_id){
    $query->where('emp_id',$emp_id)->orWhere('assigned_to',$emp_id); 
})->first();
            }
         $enquiry_id=base64_encode(base64_encode($enq_id));
         if($get_enquiries)
         {
             return view('mains.edit-enquiry')->with(compact('countries','get_enquiries','currency','users','rights'))->with('enquiry_id',$enquiry_id);  
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

    public function update_enquiry(Request $request)
    {

       $enq_id=base64_decode(base64_decode($request->get('enquiry_id')));
        $get_enquiries=Enquiries::where('enq_id',$enq_id)->first();
      if($get_enquiries)
        {
        $organization_name=$request->get('organization_name');
        $customer_name=$request->get('customer_name');
        $customer_contact=$request->get('customer_contact');
        $alternate_contact_number=$request->get('alternate_contact_number');
        $customer_email=$request->get('customer_email');
        $customer_alt_email=$request->get('customer_alt_email');
        $passport_no=$request->get('passport_no');
        $passport_validity=$request->get('passport_validity');
        $enquiry_type=$request->get('enquiry_type');
         $address=$request->get('address');
        $area=$request->get('area');
        $customer_country=$request->get('customer_country');
        $customer_city=$request->get('customer_city');
        $customer_state=$request->get('customer_state');
        $customer_zipcode=$request->get('customer_zipcode');
        $booking_range=$request->get('booking_range');
        $no_of_days=$request->get('no_of_days');
        $no_of_adults=$request->get('no_of_adults');
        $no_of_kids=$request->get('no_of_kids');
        $hotel_type=$request->get('hotel_type');
        $budget_type=$request->get('budget_type');
        $enquiry_source=$request->get('enquiry_source');
        $enquiry_prospect=$request->get('enquiry_prospect');
        $enquiry_status=$request->get('enquiry_status');
        $assigned_to=$request->get('assigned_to');
        $nxt_followup_date=$request->get('nxt_followup_date');
        $customer_dob=$request->get('customer_dob');
        $wedding_date=$request->get('wedding_date');
        $currency_exchange_rate_status=$request->get('currency_exchange_rate_status');
        $have_visa=$request->get('have_visa');
        $have_insurance_status=$request->get('have_insurance_status');



         // $fetch_enquiries=Enquiries::where('customer_email',$customer_email)->get();
         // if(count($fetch_enquiries)>0)
         // {
         //    echo "exist";
         // }
         // else
         // {
             if($currency_exchange_rate_status=="Yes")
        {
            $currency=$request->get('currency');
            $currency_exchange_rate=$request->get('currency_exchange_rate');
        }
        else
        {
          $currency="0";
          $currency_exchange_rate="0";
        }
        if($have_insurance_status=="Yes")
        {
            $insurance_days=$request->get('insurance_days');
            $insurance_type=$request->get('insurance_type');
        }
        else
        {
          $insurance_days="0";
          $insurance_type="0";
        }
        $departure_country=$request->get('departure_country');
        $departure_city=$request->get('departure_city');
        $location_country=$request->get('enquiry_location_country');
          $location_cities=$request->get('enquiry_location_cities');
        $locations_array=array();
        for($i=0;$i<count($location_country);$i++)
        {
            $locations_array[$i]['country']=$location_country[$i];
            $locations_array[$i]['city']=$location_cities[$i];
        }
        $enquiry_locations=serialize($locations_array);

        $passenger_name=$request->get('passenger_name');
        $passenger_dob=$request->get('passenger_dob');
        $passenger_pan_number=$request->get('passenger_pan_number');
        $passenger_passport_no=$request->get('passenger_passport_no');
        $gstin_no=$request->get('gstin_no');
    
        date_default_timezone_set('Asia/Kolkata');

        $updae_enquiry_data=array("organization_name"=>$organization_name,
        "customer_name"=>$customer_name,
        "customer_contact"=>$customer_contact,
        "customer_alt_contact"=>$alternate_contact_number,
        "customer_email"=>$customer_email,
        "customer_alt_email"=>$customer_alt_email,
        "passport_no"=>$passport_no,
        "passport_validity"=>$passport_validity,
        "enquiry_type"=>$enquiry_type,
        "address"=>$address,
        "area"=>$area,
        "customer_country"=>$customer_country,
        "customer_city"=>$customer_city,
        "customer_state"=>$customer_state,
        "customer_zipcode"=>$customer_zipcode,
        "booking_range"=>$booking_range,
        "no_of_days"=>$no_of_days,
        "no_of_adults"=>$no_of_adults,
        "no_of_kids"=>$no_of_kids,
        "hotel_type"=>$hotel_type,
        "budget_type"=>$budget_type,
        "enquiry_source"=>$enquiry_source,
        "enquiry_prospect"=>$enquiry_prospect,
        "enquiry_status"=>$enquiry_status,
        "assigned_to"=>$assigned_to,
        "nxt_followup_date"=>$nxt_followup_date,
        "customer_dob"=>$customer_dob,
        "wedding_date"=>$wedding_date,
        "currency_exchange_rate_status"=>$currency_exchange_rate_status,
        "select_currency"=>$currency,
       "select_currency_rate"=>$currency_exchange_rate,
        "have_visa"=>$have_visa,
        "have_insurance_status"=>$have_insurance_status,
        "insurance_days"=>$insurance_days,
        "insurance_type"=>$insurance_type,
        "departure_country"=>$departure_country,
        "departure_city"=>$departure_city,
        "enquiry_locations"=>$enquiry_locations,
        "passenger_name"=>$passenger_name,
        "passenger_dob"=>$passenger_dob,
        "passenger_pan_number"=>$passenger_pan_number,
        "passenger_passport_no"=>$passenger_passport_no,
        "gstin_no"=>$gstin_no);

        $update=Enquiries::where("enq_id",$enq_id)->update($updae_enquiry_data);
        if($update)
        {
         echo "success";
        }
        else
        {
            echo "fail";
        }
        // }
        }
        else
        {

             return redirect()->back();
        }
     
    }


    public function enquiry_details($enq_id)
    {

       if(session()->has('travel_users_id'))
       {
         $rights=$this->rights('view-enquiry');
            $currency=Currency::get();
         $countries=Countries::get();
         $enquiry_id=base64_encode(base64_encode($enq_id));

           $emp_id=session()->get('travel_users_id');
              if(strpos($rights['admin_which'],'add')!==false || strpos($rights['admin_which'],'view')!==false)
            {
                  $get_enquiries=Enquiries::where('enq_id',$enq_id)->first();
            }
            else
            {
              $get_enquiries=Enquiries::where('enq_id',$enq_id)->where(function ($query) use($emp_id){
                $query->where('emp_id',$emp_id)->orWhere('assigned_to',$emp_id); 
            })->first();
            }
       
         $users=Users::where("users_status",1)->get();
        $get_enquiries_comments=EnquiryComments::where('enq_id',$enq_id)->orderBy('enq_comments_id','desc')->get();
        if($get_enquiries)
        {
            return view('mains.enquiry-details-view')->with(compact('get_enquiries','get_enquiries_comments','countries','currency','users','rights'))->with('enquiry_id',$enquiry_id);
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

    public function insert_comments(Request $request)
    {

        $emp_id=session()->get('travel_users_id');
        $enquiry_id=base64_decode(base64_decode($request->get('enquiry_id')));
            $enquiry_comments=$request->get('enquiry_comments');
            $enquiry_comments_status=$request->get('enquiry_comments_status');

            if($enquiry_comments_status=="Open" || $enquiry_comments_status=="Win")
            $nxt_followup_date=$request->get('nxt_followup_date');
            else
            $nxt_followup_date=null;

             if($enquiry_comments_status=="Fail")
            $reason_failure=$request->get('reason_failure');
            else
            $reason_failure=null;

            if($request->hasFile('enquiry_comments_file'))
            {
                $enquiry_comments_file=$request->file('enquiry_comments_file');
                $extension=strtolower($request->enquiry_comments_file->getClientOriginalExtension());
                if($extension=="png" || $extension=="jpg" || $extension=="jpeg" || $extension=="pdf")
                {
                    $imageName = time().'.'.$request->file('enquiry_comments_file')->getClientOriginalExtension();

                // request()->agent_logo->storeAs(public_path('consultant-images'), $imageName);
                    $dir = 'assets/uploads/enq_comments/';

                    $request->file('enquiry_comments_file')->move($dir, $imageName);
                }
                else
                {
                    $imageName = "";
                }
            }
            else
            {
                $imageName = "";
            }


            date_default_timezone_set('Asia/Kolkata');
            $insert_comments=new EnquiryComments; 
            $insert_comments->enq_id=$enquiry_id;
            $insert_comments->enq_comments=$enquiry_comments;
            $insert_comments->enq_comments_file=$imageName;
            $insert_comments->enq_status=$enquiry_comments_status;
            $insert_comments->enq_nxtfollowup_date=$nxt_followup_date;
            $insert_comments->reason_failure=$reason_failure;
            $insert_comments->given_by=$emp_id; 

            if($insert_comments->save())
            {
                $update_enquiry=array("enquiry_status"=>$enquiry_comments_status,
                                    "nxt_followup_date"=>$nxt_followup_date);

                $update_query=Enquiries::where('enq_id',$enquiry_id)->update($update_enquiry);
                if($update_query)
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

     public function  enquiry_view_filter(Request $request)
    {
          $rights=$this->rights('view-enquiry');
           $emp_id=session()->get('travel_users_id');
        $tbldata ='<table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer Name</th>
                            <th>Customer Contact</th>
                            <th>Customer Email</th>
                            <th>Created By</th>
                            <th>Desination</th>
                            <th>Prospect</th>
                            <th>Travel Date</th>
                            <th>Next FollowUp Date</th>
                            <th>Status</th>
                            <th>Assigned To</th>';
                            if($rights['edit_delete']==1 || $rights['view']==1)
                            {    
                               $tbldata .='<th>Action</th>';
                            }

                 $tbldata .='</tr>
                    </thead>
                    <tbody>';
        $enq_prospct=$request->get('enq_prospct');
        $enq_status=$request->get('enq_status');
        $enq_from_date=$request->get('enq_from_date');
        $enq_to_date=$request->get('enq_to_date');
        $assigned_to=$request->get('assigned_to');

        if($enq_from_date!="")
        {
            $enq_from_date=explode('/',$enq_from_date);
            $enq_from_date=$enq_from_date[2]."-".$enq_from_date[1]."-".$enq_from_date[0];
        }
        if($enq_to_date!="")
        {
            $enq_to_date=explode('/',$enq_to_date);
            $enq_to_date=$enq_to_date[2]."-".$enq_to_date[1]."-".$enq_to_date[0];
        }


         if(strpos($rights['admin_which'],'add')!==false || strpos($rights['admin_which'],'view')!==false)
        {
            if($enq_from_date!="" && $enq_to_date=="")
            {

                $sqlenq=Enquiries:: where(DB::raw('substr(create_date, 1, 11)'),$enq_from_date)->orWhere('enquiry_prospect',$enq_prospct)->orWhere('enquiry_status',$enq_status)->orWhere('assigned_to',$assigned_to)->get();
            }
            else if($enq_from_date=="" && $enq_to_date!="")
            {
                $sqlenq=Enquiries::where(DB::raw('substr(create_date, 1, 11)'),$enq_to_date)->orWhere('enquiry_prospect',$enq_prospct)->orWhere('enquiry_status',$enq_status)->orWhere('assigned_to',$assigned_to)->get();
            }
            else if($enq_from_date!="" && $enq_to_date!="")
            {
             $sqlenq=Enquiries::whereBetween(DB::raw('substr(create_date, 1, 11)'),[$enq_from_date,$enq_to_date])->orWhere('enquiry_prospect',$enq_prospct)->orWhere('assigned_to',$assigned_to)->orWhere('enquiry_status',$enq_status)->get();

         }
         else
         {
            $sqlenq=Enquiries::orWhere('enquiry_prospect',$enq_prospct)->orWhere('assigned_to',$assigned_to)->orWhere('enquiry_status',$enq_status)->get();
        }
    }
    else
    {
       if($enq_from_date!="" && $enq_to_date=="")
       {

        $sqlenq=Enquiries::where(function ($query) use($emp_id){
                $query->where('emp_id',$emp_id)->orWhere('assigned_to',$emp_id); 
            })->where(function ($query) use($emp_id,$enq_from_date,$enq_prospct,$enq_status,$assigned_to){
                $query->where(DB::raw('substr(create_date, 1, 11)'),$enq_from_date)->orWhere('enquiry_prospect',$enq_prospct)->orWhere('enquiry_status',$enq_status)->orWhere('assigned_to',$assigned_to); })->get();
    }
    else if($enq_from_date=="" && $enq_to_date!="")
    {
        $sqlenq=Enquiries::where(function ($query) use($emp_id){
                $query->where('emp_id',$emp_id)->orWhere('assigned_to',$emp_id); 
            })->where(function ($query) use($emp_id,$enq_to_date,$enq_prospct,$enq_status,$assigned_to){
                $query->where(DB::raw('substr(create_date, 1, 11)'),$enq_to_date)->orWhere('enquiry_prospect',$enq_prospct)->orWhere('enquiry_status',$enq_status)->orWhere('assigned_to',$assigned_to); })->get();
    }
    else if($enq_from_date!="" && $enq_to_date!="")
    {
       $sqlenq=Enquiries::where(function ($query) use($emp_id){
                $query->where('emp_id',$emp_id)->orWhere('assigned_to',$emp_id); 
            })->where(function ($query) use($emp_id,$enq_from_date,$enq_to_date,$enq_prospct,$enq_status,$assigned_to){
                $query->whereBetween(DB::raw('substr(create_date, 1, 11)'),[$enq_from_date,$enq_to_date])->orWhere('enquiry_prospect',$enq_prospct)->orWhere('assigned_to',$assigned_to)->orWhere('enquiry_status',$enq_status); })->get();

   }
   else
   {
    $sqlenq=Enquiries::where(function ($query) use($emp_id){
                $query->where('emp_id',$emp_id)->orWhere('assigned_to',$emp_id); 
            })->where(function ($query) use($emp_id,$enq_from_date,$enq_prospct,$enq_status,$assigned_to){
               $query->where('enquiry_prospect',$enq_prospct)->orWhere('assigned_to',$assigned_to)->orWhere('enquiry_status',$enq_status); })->get();
}
}

       $count= count($sqlenq);
       if(count($sqlenq) > 0)
       {
            foreach($sqlenq as $enquiry)
            {
                $usertbl=Users::where('users_id',$enquiry->emp_id)->first();
                $assigntbl=Users::where('users_id',$enquiry->assigned_to)->first();
                $destinations=array();
                $get_destination=unserialize($enquiry->enquiry_locations);
                for($i=0;$i< count($get_destination);$i++)
                {   
                    $destinations[]=$get_destination[$i]['city'];
                }
                $destination_data=implode(' - ',$destinations);
                $get_booking_date=explode(' - ',$enquiry->booking_range);
                $booking_date=date('d/m/Y',strtotime($get_booking_date[0]));
                                                       

                
                $get_nxtfollow_update=explode(' - ',$enquiry->nxt_followup_date);
                 $next_followup_date=date('d/m/Y h:i a',strtotime($get_nxtfollow_update[0]." ".$get_nxtfollow_update[1]));
                $tbldata .='<tr>
                                <td>'.$enquiry->enq_id.'</td>   
                                <td>'.$enquiry->customer_name.'</td> 
                                <td>'.$enquiry->customer_contact.'</td> 
                                <td>'.$enquiry->customer_email.'</td> 
                                <td>'.$usertbl->users_fname.' '.$usertbl->users_lname.'</td> 
                                <td>'.$destination_data.'</td> 
                                <td>'.$enquiry->enquiry_prospect.'</td> 
                                <td>'.$booking_date.'</td> 
                                <td>'.$next_followup_date.'</td> 
                                <td>'.$enquiry->enquiry_status.'</td> 
                                <td>'.$assigntbl->users_fname.' '.$assigntbl->users_lname.'</td>   
                               <td>';
                               if($rights['edit_delete']==1 || $rights['view']==1)
                               {
                                if(strpos($rights['admin_which'],'view')!==false)
                                {
                                     $tbldata .=' <a href='.route('enquiry-details',['enq_id'=>$enquiry->enq_id]).' ><i class="fa fa-eye"></i></a>';
                                }
                                else if(($enquiry->emp_id!=Session::get('travel_users_id') || $enquiry->assigned_to!=Session::get('travel_users_id')) &&  strpos($rights['admin_which'],'view')!==false)
                                {
                                     $tbldata .=' <a href='.route('enquiry-details',['enq_id'=>$enquiry->enq_id]).' ><i class="fa fa-eye"></i></a>';
                                }
                                else if(($enquiry->emp_id==Session::get('travel_users_id') || $enquiry->assigned_to==Session::get('travel_users_id')) &&  $rights['view']==1)
                                {
                                     $tbldata .=' <a href='.route('enquiry-details',['enq_id'=>$enquiry->enq_id]).' ><i class="fa fa-eye"></i></a>';
                                }
                                   
                                   if(strpos($rights['admin_which'],'edit_delete')!==false)
                                {
                                     $tbldata .='| <a href='.route('edit-enquiry',['enq_id'=>$enquiry->enq_id]).' ><i class="fa fa-pencil"></i></a>';
                                }
                                else if(($enquiry->emp_id!=Session::get('travel_users_id') || $enquiry->assigned_to!=Session::get('travel_users_id')) &&  strpos($rights['admin_which'],'edit_delete')!==false)
                                {
                                     $tbldata .='| <a href='.route('edit-enquiry',['enq_id'=>$enquiry->enq_id]).' ><i class="fa fa-pencil"></i></a>';
                                }
                                else if(($enquiry->emp_id==Session::get('travel_users_id') || $enquiry->assigned_to==Session::get('travel_users_id')) &&  $rights['edit_delete']==1)
                                {
                                     $tbldata .=' | <a href='.route('edit-enquiry',['enq_id'=>$enquiry->enq_id]).' ><i class="fa fa-pencil"></i></a>';
                                }                         

                               }
                            $tbldata .='</td>
                            </tr>';
            }
             $tbldata .='</tbody>
                    </table>';
       }
       else
       {
            $tbldata .="";
       }
       

        echo $tbldata;

    }
    //followup
    public function view_enquiry_followup(Request $request)
    {
        if(session()->has('travel_users_id'))
        {
            $rights=$this->rights('view-enquiry-followup');
           $countries=Countries::get();
           $emp_id=session()->get('travel_users_id');
           $currentdate=date('Y-m-d');
              if(strpos($rights['admin_which'],'add')!==false || strpos($rights['admin_which'],'view')!==false)
            {
                $get_enquiries=Enquiries::where(DB::raw('substr(nxt_followup_date, 1, 11)'),$currentdate)->get();
            }
            else
            {
                 $get_enquiries=Enquiries::where(DB::raw('substr(nxt_followup_date, 1, 11)'),$currentdate)->where(function($query) use($emp_id){
                    $query->where('emp_id',$emp_id)->orWhere('assigned_to',$emp_id);
                })->get();
            }
           $users=Users::where("users_status",1)->get();
           return view('mains.view-enquiry-followup')->with(compact('get_enquiries','countries','users','rights'));
        }
        else
        {
         return redirect()->route('index');
         }
       
    }
    //view followup
    public function  enquiry_view_filter_followup(Request $request)
    {
         $rights=$this->rights('view-enquiry-followup');
          $emp_id=session()->get('travel_users_id');
        $tbldata ='<table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer Name</th>
                            <th>Customer Contact</th>
                            <th>Customer Email</th>
                            <th>Created By</th>
                            <th>Desination</th>
                            <th>Prospect</th>
                            <th>Travel Date</th>
                            <th>Next FollowUp Date</th>
                            <th>Status</th>
                            <th>Assigned To</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>';
        $enq_prospct=$request->get('enq_prospct');
        $enq_status=$request->get('enq_status');
        $enq_from_date=$request->get('enq_from_date');
        $enq_to_date=$request->get('enq_to_date');
        $assigned_to=$request->get('assigned_to');

        if($enq_from_date!="")
        {
            $enq_from_date=explode('/',$enq_from_date);
            $enq_from_date=$enq_from_date[2]."-".$enq_from_date[1]."-".$enq_from_date[0];
        }
        if($enq_to_date!="")
        {
            $enq_to_date=explode('/',$enq_to_date);
            $enq_to_date=$enq_to_date[2]."-".$enq_to_date[1]."-".$enq_to_date[0];
        }

        if(strpos($rights['admin_which'],'add')!==false || strpos($rights['admin_which'],'view')!==false)
        {
            if($enq_from_date!="" && $enq_to_date=="")
            {

                $sqlenq=Enquiries:: where(DB::raw('substr(nxt_followup_date, 1, 11)'),$enq_from_date)->orWhere('enquiry_prospect',$enq_prospct)->orWhere('enquiry_status',$enq_status)->orWhere('assigned_to',$assigned_to)->get();
            }
            else if($enq_from_date=="" && $enq_to_date!="")
            {
                $sqlenq=Enquiries::where(DB::raw('substr(nxt_followup_date, 1, 11)'),$enq_to_date)->orWhere('enquiry_prospect',$enq_prospct)->orWhere('enquiry_status',$enq_status)->orWhere('assigned_to',$assigned_to)->get();
            }
            else if($enq_from_date!="" && $enq_to_date!="")
            {
             $sqlenq=Enquiries::whereBetween(DB::raw('substr(nxt_followup_date, 1, 11)'),[$enq_from_date,$enq_to_date])->orWhere('enquiry_prospect',$enq_prospct)->orWhere('assigned_to',$assigned_to)->orWhere('enquiry_status',$enq_status)->get();

         }
         else
         {
            $sqlenq=Enquiries::orWhere('enquiry_prospect',$enq_prospct)->orWhere('assigned_to',$assigned_to)->orWhere('enquiry_status',$enq_status)->get();
        }
    }
    else
    {
       if($enq_from_date!="" && $enq_to_date=="")
       {

        $sqlenq=Enquiries::where(function ($query) use($emp_id){
                $query->where('emp_id',$emp_id)->orWhere('assigned_to',$emp_id); 
            })->where(function ($query) use($emp_id,$enq_from_date,$enq_prospct,$enq_status,$assigned_to){
                $query->where(DB::raw('substr(nxt_followup_date, 1, 11)'),$enq_from_date)->orWhere('enquiry_prospect',$enq_prospct)->orWhere('enquiry_status',$enq_status)->orWhere('assigned_to',$assigned_to); })->get();
    }
    else if($enq_from_date=="" && $enq_to_date!="")
    {
        $sqlenq=Enquiries::where(function ($query) use($emp_id){
                $query->where('emp_id',$emp_id)->orWhere('assigned_to',$emp_id); 
            })->where(function ($query) use($emp_id,$enq_to_date,$enq_prospct,$enq_status,$assigned_to){
                $query->where(DB::raw('substr(nxt_followup_date, 1, 11)'),$enq_to_date)->orWhere('enquiry_prospect',$enq_prospct)->orWhere('enquiry_status',$enq_status)->orWhere('assigned_to',$assigned_to); })->get();
    }
    else if($enq_from_date!="" && $enq_to_date!="")
    {
       $sqlenq=Enquiries::where(function ($query) use($emp_id){
                $query->where('emp_id',$emp_id)->orWhere('assigned_to',$emp_id); 
            })->where(function ($query) use($emp_id,$enq_from_date,$enq_to_date,$enq_prospct,$enq_status,$assigned_to){
                $query->whereBetween(DB::raw('substr(nxt_followup_date, 1, 11)'),[$enq_from_date,$enq_to_date])->orWhere('enquiry_prospect',$enq_prospct)->orWhere('assigned_to',$assigned_to)->orWhere('enquiry_status',$enq_status); })->get();

   }
   else
   {
    $sqlenq=Enquiries::where(function ($query) use($emp_id){
                $query->where('emp_id',$emp_id)->orWhere('assigned_to',$emp_id); 
            })->where(function ($query) use($emp_id,$enq_prospct,$enq_status,$assigned_to){
               $query->where('enquiry_prospect',$enq_prospct)->orWhere('assigned_to',$assigned_to)->orWhere('enquiry_status',$enq_status); })->get();
}
}

       
       $count= count($sqlenq);
       if(count($sqlenq) > 0)
       {
            foreach($sqlenq as $enquiry)
            {
                $usertbl=Users::where('users_id',$enquiry->emp_id)->first();
                $assigntbl=Users::where('users_id',$enquiry->assigned_to)->first();
                $destinations=array();
                $get_destination=unserialize($enquiry->enquiry_locations);
                for($i=0;$i< count($get_destination);$i++)
                {   
                    $destinations[]=$get_destination[$i]['city'];
                }
                $destination_data=implode(' - ',$destinations);
                $get_booking_date=explode(' - ',$enquiry->booking_range);
                $booking_date=date('d/m/Y',strtotime($get_booking_date[0]));
                                                       

                
                $get_nxtfollow_update=explode(' - ',$enquiry->nxt_followup_date);
                 $next_followup_date=date('d/m/Y h:i a',strtotime($get_nxtfollow_update[0]." ".$get_nxtfollow_update[1]));
                $tbldata .='<tr>
                                <td>'.$enquiry->enq_id.'</td>   
                                <td>'.$enquiry->customer_name.'</td> 
                                <td>'.$enquiry->customer_contact.'</td> 
                                <td>'.$enquiry->customer_email.'</td> 
                                <td>'.$usertbl->users_fname.' '.$usertbl->users_lname.'</td> 
                                <td>'.$destination_data.'</td> 
                                <td>'.$enquiry->enquiry_prospect.'</td> 
                                <td>'.$booking_date.'</td> 
                                <td>'.$next_followup_date.'</td> 
                                <td>'.$enquiry->enquiry_status.'</td> 
                                <td>'.$assigntbl->users_fname.' '.$assigntbl->users_lname.'</td>   
                               <td>';
                               if($rights['add']==1)
                               {
                                  $tbldata .=' <a href='.route('enquiry-details',['enq_id'=>$enquiry->enq_id]).' ><i class="fa fa-eye"></i></a> ';
                               }
                              
                               $tbldata .='</td>
                            </tr>';
            }
             $tbldata .='</tbody>
                    </table>';
       }
       else
       {
            $tbldata .="";
       }
       

        echo $tbldata;

    }
   
   public function search_mobile_enquiry(Request $request)
   {
        $tabledata="";
        $sr=1;
       $customer_contact=$request->get('customer_contact');
       $sql_mobile=Enquiries::where('customer_contact',$customer_contact)->get();
       if(count($sql_mobile)>0)
       {
            $tabledata.='<table class="table table-striped" id="showlastdata">
                                <tr>
                                    <th>Sr No</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>';
                                foreach($sql_mobile as $fetchdata)
                                {
                                    if($fetchdata->enquiry_status=='Win')
                                    {
                                        $color="green";
                                    }
                                    else if($fetchdata->enquiry_status=='Fail')
                                    {
                                        $color="green";
                                    }
                                    else
                                    {
                                        $color="orange";
                                    }
                                    $tabledata.="<tr class='enq_chk' id=".$fetchdata->enq_id." style='cursor: pointer'>
                                    <td>".$sr++."</td>
                                    <td>".$fetchdata->customer_name."</td>
                                    <td>".$fetchdata->customer_contact."</td>
                                    <td>".$fetchdata->customer_email."</td>
                                    <td style='color:".$color."'>".$fetchdata->enquiry_status."</td>
                                </tr>";
                                }
                                
                             $tabledata.="</table>";
       }
       else
       {

       }
       echo $tabledata;

   }

   public function enq_data_search(Request $request)
   {

      $id=$request->get('id');
      $sql_mobile=Enquiries::where('enq_id',$id)->first();
      
      $data['customer_name']=$sql_mobile->customer_name;
      $data['customer_email']=$sql_mobile->customer_email;
      $data['no_of_adults']=$sql_mobile->no_of_adults;
      $data['no_of_kids']=$sql_mobile->no_of_kids;

      echo json_encode($data);


   }

    public function search_enquiry(Request $request)
    {
        if(session()->has('travel_users_id'))
        {
             $rights=$this->rights('view-enquiry');
            $countries=Countries::get();
            $emp_id=session()->get('travel_users_id');
              if(strpos($rights['admin_which'],'add')!==false || strpos($rights['admin_which'],'view')!==false)
            {
                $get_enquiries=Enquiries::get();
            }
            else
            {
                 $get_enquiries=Enquiries::where('emp_id',$emp_id)->orWhere('assigned_to',$emp_id)->get();
            }
            $users=Users::where("users_status",1)->get();
            return view('mains.search-enquiry')->with(compact('get_enquiries','countries','users','rights'));
        }
        else
        {
           return redirect()->route('index');
       }
       
   }
   public function  enquiry_search_filter(Request $request)
    {
          $rights=$this->rights('view-enquiry');
           $emp_id=session()->get('travel_users_id');
        $tbldata ='<table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer Name</th>
                            <th>Customer Contact</th>
                            <th>Customer Email</th>
                            <th>Passport No.</th>
                            <th>Created By</th>
                            <th>Desination</th>
                            <th>Prospect</th>
                            <th>Travel Date</th>
                            <th>Next FollowUp Date</th>
                            <th>Status</th>
                            <th>Assigned To</th>';
                            if($rights['edit_delete']==1 || $rights['view']==1)
                            {    
                               $tbldata .='<th>Action</th>';
                            }

                 $tbldata .='</tr>
                    </thead>
                    <tbody>';
        $enq_name=$request->get('enq_name');
        $enq_email=$request->get('enq_email');
        $enq_passport=$request->get('enq_passport');
        $enq_mobile=$request->get('enq_mobile');
        


         if(strpos($rights['admin_which'],'add')!==false || strpos($rights['admin_which'],'view')!==false)
        {

           
            if($enq_name!="")
            {
                $sqlenq=Enquiries::where('customer_name','like',"%".$enq_name."%")->where('active_status','1')->get();
                // $sqlenq=Enquiries:: where(DB::raw('substr(create_date, 1, 11)'),$enq_from_date)->orWhere('enquiry_prospect',$enq_prospct)->orWhere('enquiry_status',$enq_status)->orWhere('assigned_to',$assigned_to)->get();
            }
            if($enq_email!="")
            {
                $sqlenq=Enquiries::where('customer_email',$enq_email)->where('active_status','1')->get();
            }
             if($enq_passport!="")
            {
                $sqlenq=Enquiries::where('passport_no',$enq_passport)->where('active_status','1')->get();
            }
            if($enq_mobile!="")
            {
                $sqlenq=Enquiries::where('customer_contact',$enq_mobile)->where('active_status','1')->get();
            }
            if($enq_name=="" && $enq_email=="" && $enq_passport=="" && $enq_mobile=="" )
            {   
                $sqlenq=Enquiries::where('active_status','1')->get();
            }
            // else
            //  {
            //     $sqlenq=Enquiries::orWhere('enquiry_prospect',$enq_prospct)->orWhere('assigned_to',$assigned_to)->orWhere('enquiry_status',$enq_status)->get();
            // }
    }
    else
    {
        // if($enq_name!="")
        // {
        //     $sqlenq=Enquiries::where(function ($query) use($emp_id)
        //     {
        //     $query->where('emp_id',$emp_id)->orWhere('assigned_to',$emp_id); 
        //     })->where(function ($query) use($enq_name){
        //         $query->Where('customer_name','like',"%".$enq_name."%")->where('active_status','1')->get();
        // }
        // if($enq_email!="")
        // {
        //      $sqlenq=Enquiries::where(function ($query) use($emp_id){
        //     $query->where('emp_id',$emp_id)->orWhere('assigned_to',$emp_id); 
        //     })->where(function ($query) use($enq_email){
        //         $query->Where('customer_email','like',"%".$enq_email."%")->where('active_status','1')->get();
        // }
        // if($enq_passport !="")
        // {
        //       $sqlenq=Enquiries::where(function ($query) use($emp_id){
        //     $query->where('emp_id',$emp_id)->orWhere('assigned_to',$emp_id); 
        //     })->where(function ($query) use($enq_passport){
        //         $query->Where('passport_no','like',"%".$enq_passport."%")->where('active_status','1')->get();
        // }
        // if($enq_mobile !="")
        // {
        //     $sqlenq=Enquiries::where(function ($query) use($emp_id){
        //     $query->where('emp_id',$emp_id)->orWhere('assigned_to',$emp_id); 
        //     })->where(function ($query) use($enq_mobile){
        //         $query->Where('passport_no',$enq_mobile)->where('active_status','1')->get();
        // }
       
}
   
      
       if(count($sqlenq) > 0)
       {
            foreach($sqlenq as $enquiry)
            {
                $usertbl=Users::where('users_id',$enquiry->emp_id)->first();
                $assigntbl=Users::where('users_id',$enquiry->assigned_to)->first();
                $destinations=array();
                $get_destination=unserialize($enquiry->enquiry_locations);
                for($i=0;$i< count($get_destination);$i++)
                {   
                    $destinations[]=$get_destination[$i]['city'];
                }
                $destination_data=implode(' - ',$destinations);
                $get_booking_date=explode(' - ',$enquiry->booking_range);
                $booking_date=date('d/m/Y',strtotime($get_booking_date[0]));
                                                       

                
                $get_nxtfollow_update=explode(' - ',$enquiry->nxt_followup_date);
                 $next_followup_date=date('d/m/Y h:i a',strtotime($get_nxtfollow_update[0]." ".$get_nxtfollow_update[1]));
                $tbldata .='<tr>
                                <td>'.$enquiry->enq_id.'</td>   
                                <td>'.$enquiry->customer_name.'</td> 
                                <td>'.$enquiry->customer_contact.'</td> 
                                <td>'.$enquiry->customer_email.'</td> 
                                <td>'.$enquiry->passport_no.'</td> 
                                <td>'.$usertbl->users_fname.' '.$usertbl->users_lname.'</td> 
                                <td>'.$destination_data.'</td> 
                                <td>'.$enquiry->enquiry_prospect.'</td> 
                                <td>'.$booking_date.'</td> 
                                <td>'.$next_followup_date.'</td> 
                                <td>'.$enquiry->enquiry_status.'</td> 
                                <td>'.$assigntbl->users_fname.' '.$assigntbl->users_lname.'</td>   
                               <td>';
                               if($rights['edit_delete']==1 || $rights['view']==1)
                               {
                                if(strpos($rights['admin_which'],'view')!==false)
                                {
                                     $tbldata .=' <a href='.route('enquiry-details',['enq_id'=>$enquiry->enq_id]).' ><i class="fa fa-eye"></i></a>';
                                }
                                else if(($enquiry->emp_id!=Session::get('travel_users_id') || $enquiry->assigned_to!=Session::get('travel_users_id')) &&  strpos($rights['admin_which'],'view')!==false)
                                {
                                     $tbldata .=' <a href='.route('enquiry-details',['enq_id'=>$enquiry->enq_id]).' ><i class="fa fa-eye"></i></a>';
                                }
                                else if(($enquiry->emp_id==Session::get('travel_users_id') || $enquiry->assigned_to==Session::get('travel_users_id')) &&  $rights['view']==1)
                                {
                                     $tbldata .=' <a href='.route('enquiry-details',['enq_id'=>$enquiry->enq_id]).' ><i class="fa fa-eye"></i></a>';
                                }
                                   
                                   if(strpos($rights['admin_which'],'edit_delete')!==false)
                                {
                                     $tbldata .='| <a href='.route('edit-enquiry',['enq_id'=>$enquiry->enq_id]).' ><i class="fa fa-pencil"></i></a>';
                                }
                                else if(($enquiry->emp_id!=Session::get('travel_users_id') || $enquiry->assigned_to!=Session::get('travel_users_id')) &&  strpos($rights['admin_which'],'edit_delete')!==false)
                                {
                                     $tbldata .='| <a href='.route('edit-enquiry',['enq_id'=>$enquiry->enq_id]).' ><i class="fa fa-pencil"></i></a>';
                                }
                                else if(($enquiry->emp_id==Session::get('travel_users_id') || $enquiry->assigned_to==Session::get('travel_users_id')) &&  $rights['edit_delete']==1)
                                {
                                     $tbldata .=' | <a href='.route('edit-enquiry',['enq_id'=>$enquiry->enq_id]).' ><i class="fa fa-pencil"></i></a>';
                                }                         

                               }
                            $tbldata .='</td>
                            </tr>';
            }
             $tbldata .='</tbody>
                    </table>';
       }
       else
       {
            $tbldata .="";
       }
       

        echo $tbldata;

    }

} //mainfile close
