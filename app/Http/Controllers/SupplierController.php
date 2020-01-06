<?php

namespace App\Http\Controllers;

use Session;
use App\Users;
use App\Countries;
use App\States;
use App\Cities;
use App\Currency;
use App\Suppliers;
use App\Activities;
use App\Transport;
use App\Hotels;
use App\Guides;
use App\Guides_log;
use App\Languages;
use App\VehicleType;
use App\HotelMeal;
use App\Amenities;
use App\SubAmenities;
use Illuminate\Http\Request;
use App\Bookings;

class SupplierController extends Controller
{
     public function index()
    {
          
         return view('supplier.index');
        
    }
    public function supplier_login_check(Request $request)
    {
    	$username=$request->get('username');
    	$password=$request->get('password');

    	$check_users=Suppliers::where('company_email',$username)->where('supplier_password',md5($password))->first();
    	if($check_users)
    	{
    		if($check_users->supplier_status=='1')
    		{
    			session()->put('travel_supplier_id',$check_users->supplier_id);
    			session()->put('travel_email_supplier',$check_users->company_email);
    			session()->put('travel_supplier_fullame',$check_users->supplier_name);
    			session()->put('travel_supplier_type',$check_users->supplier_service_type);
    			session()->put('travel_users_role',"Supplier");
    			echo "success";
    		}
    		else
    		{
    			echo "inactive";
    		}

    			
    		
    	}
    	else
    	{
    		echo "fail";
    	}

    }
    public function supplier_logout(Request $request)
    {
    		Session::forget('travel_supplier_id');
    		Session::forget('travel_supplier_type');
    		Session::forget('travel_email_supplier');
		  if(!Session::has('travel_supplier_id'))

		   {

		      return redirect()->intended('/supplier');

		   }
    }
    public function supplier_home(Request $request)
    {
    	 if(session()->has('travel_supplier_id'))
          {

           return view('supplier.home');
        }
        else
        {
         return redirect()->route('/supplier');
        }
    }

    public function register_supplier(Request $request)
    {
    	if(session()->has('travel_supplier_id'))
    	{
    		return view('supplier.home');
    		
    	}
    	else
    	{
    		$countries=Countries::where('country_status',1)->get();
    		$currency=Currency::get();
    		return view('supplier.register-supplier')->with(compact('countries','currency'));
    	}

    	
    }

    public function insert_supplier(Request $request)
    {
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
  $supplier_password_hint=$request->get('acc_password');
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
  $supplier->supplier_status=0;	
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

    public function supplier_profile(Request $request)
    {
    	 if(session()->has('travel_supplier_id'))
	 	{
	 		$supplier_id=session()->get('travel_supplier_id');
	 		$currency=Currency::get();
	 		$countries=Countries::where('country_status',1)->get();
	 		
	 		$get_supplier=Suppliers::where('supplier_id',$supplier_id)->first();
	 		$supplier_id=base64_encode(base64_encode($supplier_id));
	 		if($get_supplier)
	 		{
	 			return view('supplier.supplier-profile')->with(compact('get_supplier','countries','currency'))->with('supplier_id',$supplier_id);
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


    public function supplier_hotel(Request $request)
    {
    	 	if(session()->has('travel_supplier_id'))
	 	{
	 		$supplier_id=session()->get('travel_supplier_id');	
	 		$countries=Countries::where('country_status',1)->get();
		    $cities=Cities::get();
			$emp_id=session()->get('travel_supplier_id');
			$get_hotels=Hotels::where('hotel_created_by',$supplier_id)->where('hotel_create_role','Supplier')->get();
		    $get_suppliers=Suppliers::get();
	 		return view('supplier.supplier-hotel')->with(compact('countries','cities','get_suppliers','get_hotels'));
		 	}
		 	else
		 	{
		 		return redirect()->route('index');
		 	}
    }
    public function supplier_create_hotel(Request $request)
    {
    	if(session()->has('travel_supplier_id'))
		  {
		   $countries=Countries::where('country_status',1)->get();
		    $currency=Currency::get();
		    $suppliers=Suppliers::get();
         $hotel_meal=HotelMeal::get();
		     $supplier_id=session()->get('travel_supplier_id');
	      $supplier_name=session()->get('travel_supplier_fullame');
         $fetch_amenities=Amenities::where('amenities_status',1)->get();

      $fetch_sub_amenities=SubAmenities::where('sub_amenities_status',1)->get();
		    return view('supplier.create-hotel')->with(compact('countries','currency','supplier_id','supplier_name','hotel_meal','fetch_amenities','fetch_sub_amenities'));
		  }
		  else
		  {
		    return redirect()->route('index');
		  }
    }
    public function supplier_edit_hotel($hotel_id)
    {
    	if(session()->has('travel_supplier_id'))
    	{
    		$countries=Countries::where('country_status',1)->get();
    		$currency=Currency::get();
    		$suppliers=Suppliers::get();
        $hotel_meal=HotelMeal::get();
    		$get_hotels=Hotels::where('hotel_id',$hotel_id)->first();
           $fetch_amenities=Amenities::get();

      $fetch_sub_amenities=SubAmenities::get();
    		if($get_hotels)
    		{
    			$supplier_id=$get_hotels->supplier_id;

    			$get_supplier_countries=Suppliers::where('supplier_id',$supplier_id)->first();

    			$supplier_countries=$get_supplier_countries->supplier_opr_countries;

    			$countries_data=explode(',', $supplier_countries);

    			$cities=Cities::join("states","states.id","=","cities.state_id")->where("states.country_id", $get_hotels->hotel_country)->select("cities.*")->orderBy('cities.name','asc')->get();

    			return view('supplier.edit-hotel')->with(compact('countries','currency','cities','suppliers','get_hotels',"countries_data","get_supplier_countries","hotel_meal","fetch_amenities","fetch_sub_amenities"));
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


    //activity
   public function supplier_activity(Request $request)
   {
   		if(session()->has('travel_supplier_id'))
	 	{		
	 		$supplier_id=session()->get('travel_supplier_id');	
	 		$countries=Countries::where('country_status',1)->get();
		    $cities=Cities::get();
			$emp_id=session()->get('travel_supplier_id');
			$get_activites=Activities::where('activity_created_by',$supplier_id)->where('activity_role','Supplier')->get();
		    $get_transport=Transport::get();
		    $get_suppliers=Suppliers::get();
        $hotel_meal=HotelMeal::get();
			return view('supplier.supplier-activity')->with(compact('countries','cities','get_activites','get_suppliers','get_transport','hotel_meal'));
			 	}
			 	else
			 	{
			 		return redirect()->route('index');
			 	}
	}
	public function supplier_create_activity(Request $request)
	{
		if(session()->has('travel_supplier_id'))
	    {
	      $supplier_id=session()->get('travel_supplier_id');
	      $supplier_name=session()->get('travel_supplier_fullame');
	     $countries=Countries::where('country_status',1)->get();
	      $currency=Currency::get();
	      
	      return view('supplier.create-activity')->with(compact('countries','currency','supplier_id','supplier_name'));
	    }
	    else
	    {
	      return redirect()->route('index');
	    }
	}
	public function supplier_activity_details($activity_id)
    {
      	if(session()->has('travel_supplier_id'))
	    {
	     $countries=Countries::where('country_status',1)->get();
	      $currency=Currency::get();
	      $suppliers=Suppliers::get();
	      $get_activity=Activities::where('activity_id',$activity_id)->first();
	      if($get_activity)
	      {
	         $supplier_id=$get_activity->supplier_id;

	      $get_supplier_countries=Suppliers::where('supplier_id',$supplier_id)->first();

	      $supplier_countries=$get_supplier_countries->supplier_opr_countries;

	      $countries_data=explode(',', $supplier_countries);

	       $cities=Cities::join("states","states.id","=","cities.state_id")->where("states.country_id", $get_activity->activity_country)->select("cities.*")->orderBy('cities.name','asc')->get();

	      return view('supplier.activity-details-view')->with(compact('countries','currency','cities','suppliers','get_activity',"countries_data"));
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
	//edit activity
	 public function supplier_edit_activity ($activity_id)
	  {
	    if(session()->has('travel_supplier_id'))
	    {
	     $countries=Countries::where('country_status',1)->get();
	      $currency=Currency::get();
	      
	      $get_activity=Activities::where('activity_id',$activity_id)->first();
	      if($get_activity)
	      {
	         $supplier_id=$get_activity->supplier_id;

	      $get_supplier_countries=Suppliers::where('supplier_id',$supplier_id)->first();

	      $supplier_countries=$get_supplier_countries->supplier_opr_countries;

	      $countries_data=explode(',', $supplier_countries);


	       $cities=Cities::join("states","states.id","=","cities.state_id")->where("states.country_id", $get_activity->activity_country)->select("cities.*")->orderBy('cities.name','asc')->get();

	      return view('supplier.edit-activity')->with(compact('countries','currency','cities','get_activity',"countries_data","get_supplier_countries"));
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
	  //transport
	  public function supplier_transport(Request $request)
	   {
	   		if(session()->has('travel_supplier_id'))
		 	{
		 		$supplier_id=session()->get('travel_supplier_id');	
		 		$countries=Countries::where('country_status',1)->get();
	     		 $cities=Cities::get();
		 		$emp_id=session()->get('travel_supplier_id');
		 	
		     	 $get_transport=Transport::where('transfer_created_by',$supplier_id)->where('transfer_create_role','Supplier')->get();
		      
		        $get_suppliers=Suppliers::get();
		 		return view('supplier.supplier-transport')->with(compact('countries','cities','get_suppliers','get_transport'));
		 	}
		 	else
		 	{
		 		return redirect()->route('index');
		 	}

	   }
	   public function supplier_create_transport(Request $request)
	   {
	   		if(session()->has('travel_supplier_id'))
		    {
		      $countries=Countries::where('country_status',1)->get();
		      $currency=Currency::get();
		      $suppliers=Suppliers::get();
           $vehicle_type=VehicleType::get();
		      $supplier_id=session()->get('travel_supplier_id');
	     	  $supplier_name=session()->get('travel_supplier_fullame');
		      return view('supplier.create-transport')->with(compact('countries','currency','supplier_id','supplier_name','vehicle_type'));
		    }
		    else
		    {
		      return redirect()->route('index');
		    }
	   }
	   public function supplier_transport_details($transport_id)
	   {
	   		if(session()->has('travel_supplier_id'))
		    {
		      $countries=Countries::where('country_status',1)->get();
		      $currency=Currency::get();
		      $suppliers=Suppliers::get();
           $vehicle_type=VehicleType::get();
		      $get_transport=Transport::where('transport_id',$transport_id)->first();
		      if($get_transport)
		      {
		      $supplier_id=$get_transport->supplier_id;

		      $get_supplier_countries=Suppliers::where('supplier_id',$supplier_id)->first();

		      $supplier_countries=$get_supplier_countries->supplier_opr_countries;

		      $countries_data=explode(',', $supplier_countries);

		      return view('supplier.transport-details-view')->with(compact('countries','currency','cities','suppliers','get_transport','countries_data','vehicle_type'));
		      }
		      else
		      {
		        return redirect()->back();
		      }
		     
		    }
		    else
		    {
		      return redirect()->route('/supplier');
		    }
	   }
	   public function supplier_edit_transport($transport_id)
	   {
	   		if(session()->has('travel_supplier_id'))
		    {
		      $countries=Countries::where('country_status',1)->get();
		      $currency=Currency::get();
		      $suppliers=Suppliers::get();
           $vehicle_type=VehicleType::get();
		      $get_transport=Transport::where('transport_id',$transport_id)->first();
		      if($get_transport)
		      {
		         $supplier_id=$get_transport->supplier_id;

		      $get_supplier_countries=Suppliers::where('supplier_id',$supplier_id)->first();

		      $supplier_countries=$get_supplier_countries->supplier_opr_countries;

		      $countries_data=explode(',', $supplier_countries);

		       $cities=Cities::join("states","states.id","=","cities.state_id")->where("states.country_id", $get_transport->transfer_country)->select("cities.*")->orderBy('cities.name','asc')->get();

		      return view('supplier.edit-transport')->with(compact('countries','currency','cities','get_supplier_countries','get_transport',"countries_data","vehicle_type"));
		      }
		      else
		      {
		        return redirect()->back();
		      }
		     
		    }
		    else
		    {
		      return redirect()->route('/supplier');
		    }
	   }
	   //hotel details
	    public function supplier_hotel_details($hotel_id)
	    {
	       if(session()->has('travel_supplier_id'))
	    {
	      $countries=Countries::where('country_status',1)->get();
	      $currency=Currency::get();
	      $suppliers=Suppliers::get();
	      $get_hotels=Hotels::where('hotel_id',$hotel_id)->first();
          $hotel_meal=HotelMeal::get();
	      if($get_hotels)
	      {
	      $supplier_id=$get_hotels->supplier_id;

	      $get_supplier_countries=Suppliers::where('supplier_id',$supplier_id)->first();

	      $supplier_countries=$get_supplier_countries->supplier_opr_countries;

	      $countries_data=explode(',', $supplier_countries);

	      return view('supplier.hotel-details-view')->with(compact('countries','currency','cities','suppliers','get_hotels','hotel_meal','countries_data'));
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

     public function guide_management(Request $request)
     {
      if(session()->has('travel_supplier_id'))
      {
        $countries=Countries::where('country_status',1)->get();
        $emp_id=session()->get('travel_supplier_id');
        $get_guides=Guides::where(function($query) use($emp_id){
          $query->where('guide_supplier_id',$emp_id);
        })->orWhere(function($query1) use($emp_id){
          $query1->where('guide_created_by',$emp_id)->where('guide_role',"Supplier");
        })->get();

        return view('supplier.guide-management')->with(compact('get_guides','countries'));
      }
      else
      {
        return redirect()->route('index');
      }

    }
    public function create_guide(Request $request)
    {
      if(session()->has('travel_supplier_id'))
      {
        $countries=Countries::where('country_status',1)->get();
        $supplier_id=session()->get('travel_supplier_id');

          $get_supplier_countries=Suppliers::where('supplier_id',$supplier_id)->first();

          $supplier_countries=$get_supplier_countries->supplier_opr_countries;

          $countries_data=explode(',', $supplier_countries);
           $languages=Languages::get();
        return view('supplier.create-guide')->with(compact('countries','get_supplier_countries',"countries_data",'languages'));
      }
      else
      {
        return redirect()->route('index');
      }
    }
    public function insert_guide(Request $request)
    {

      $guide_created_by=session()->get('travel_supplier_id');
      $guide_first_name=$request->get('guide_first_name');
      $guide_last_name=$request->get('guide_last_name');
      $guide_contact=$request->get('contact_number');
      $guide_address=$request->get('address');
        $check_guides=Guides::where('guide_contact',$guide_contact)->get();
        if(count($check_guides)>0)
        {
  
            echo "exist";
        }
        else
        {

       $guide_country=$request->get('guide_country');

        $guide_city=$request->get('guide_city');

        $guide_language=$request->get('guide_language');

        $guide_language=implode(',',$guide_language);

           $guide_price_per_day=$request->get('guide_price_per_day');

        $guide_description=$request->get('description');

        $week_monday=$request->get('week_monday');

        $week_tuesday=$request->get('week_tuesday');

        $week_wednesday=$request->get('week_wednesday');

        $week_thursday=$request->get('week_thursday');

        $week_friday=$request->get('week_friday');

        $week_saturday=$request->get('week_saturday');

        $week_sunday=$request->get('week_sunday');



        $operating_weekdays=array("monday"=>$week_monday,

          "tuesday"=>$week_tuesday,

          "wednesday"=>$week_wednesday,

          "thursday"=>$week_thursday,

          "friday"=>$week_friday,

          "saturday"=>$week_saturday,

          "sunday"=>$week_sunday);



        $operating_weekdays=serialize($operating_weekdays);

        $guide_blackout_dates=$request->get('blackout_days');



        $guide_nationality=$request->get('guide_nationality');

        $guide_markup=$request->get('guide_markup');

        $guide_amount=$request->get('guide_amount');



        $nationality_markup_details=array();

        for($nation_count=0;$nation_count<count($guide_nationality);$nation_count++)

        {

          $nationality_markup_details[$nation_count]['guide_nationality']=$guide_nationality[$nation_count];

          $nationality_markup_details[$nation_count]['guide_markup']=$guide_markup[$nation_count];

          $nationality_markup_details[$nation_count]['guide_amount']=$guide_amount[$nation_count];

        }



        $nationality_markup_details=serialize($nationality_markup_details);



        $guide_validity_from=$request->get('guide_validity_from');

        $guide_validity_to=$request->get('guide_validity_to');

        $guide_tourname=$request->get('guide_tourname');  

        $guide_cost_four=$request->get('guide_cost_four');

        $guide_cost_seven=$request->get('guide_cost_seven');

        $guide_cost_twenty=$request->get('guide_cost_twenty');

        $guide_duration=$request->get('guide_duration');





        $guide_tariff=array();

        for($transport_count=0;$transport_count<count($guide_tourname);$transport_count++)

        {

          $guide_tariff[$transport_count]['guide_validity_from']=$guide_validity_from[$transport_count];

          $guide_tariff[$transport_count]['guide_validity_to']=$guide_validity_to[$transport_count];

          $guide_tariff[$transport_count]['guide_tourname']=$guide_tourname[$transport_count];

          $guide_tariff[$transport_count]['guide_cost_four']=$guide_cost_four[$transport_count];

          $guide_tariff[$transport_count]['guide_cost_seven']=$guide_cost_seven[$transport_count];

          $guide_tariff[$transport_count]['guide_cost_twenty']=$guide_cost_twenty[$transport_count];

          $guide_tariff[$transport_count]['guide_duration']=$guide_duration[$transport_count];



        }



        $guide_tariff=serialize($guide_tariff);


         if($request->has('tour_name'))
        {
            $tour_name=$request->get('tour_name');

             $tour_vehiclename=$request->get('tour_vehiclename');
        $tour_guide_cost=$request->get('tour_guide_cost');

        $guide_tours_cost=array();
        for($cost_count=0;$cost_count<count($tour_name);$cost_count++)

        {

          $guide_tours_cost[$cost_count]["tour_name"]=$tour_name[$cost_count];
           $guide_tours_cost[$cost_count]["tour_vehicle_name"]=$tour_vehiclename[$cost_count];
            $guide_tours_cost[$cost_count]["tour_guide_cost"]=$tour_guide_cost[$cost_count];
        }

        
        }
        else
        {
          $guide_tours_cost=array();
        }
      

      $guide_tours_cost=serialize($guide_tours_cost);







        $guide_logo_file=$request->get('guide_logo_file');



        if($request->hasFile('guide_logo_file'))

        {

          $guide_logo_file=$request->file('guide_logo_file');

          $extension=strtolower($request->guide_logo_file->getClientOriginalExtension());

          if($extension=="png" || $extension=="jpg" || $extension=="jpeg")

          {

            $guide_image = "guide-".time().'.'.$request->file('guide_logo_file')->getClientOriginalExtension();



                // request()->agent_logo->storeAs(public_path('consultant-images'), $imageName);

            $dir1 = 'assets/uploads/guide_images/';



            $request->file('guide_logo_file')->move($dir1, $guide_image);

          }

          else

          {

            $guide_image = "";

          }

        }

        else

        {

          $guide_image = "";

        }



        $guide_inclusions=$request->get('guide_inclusions');

        $guide_exclusions=$request->get('guide_exclusions');

        $guide_cancel_policy=$request->get('guide_cancellation');

        $guide_terms_conditions=$request->get('guide_terms_conditions');
         
        $guide=new Guides;
        $guide->guide_first_name=$guide_first_name;
        $guide->guide_last_name=$guide_last_name;
        $guide->guide_contact=$guide_contact;
        $guide->guide_address=$guide_address;
        $guide->guide_supplier_id=$guide_created_by;
        $guide->guide_country=$guide_country;
        $guide->guide_city=$guide_city;
        $guide->guide_tours_cost=$guide_tours_cost;
        $guide->guide_language=$guide_language;
        $guide->guide_price_per_day=$guide_price_per_day;
        $guide->guide_description=$guide_description;
        $guide->operating_weekdays=$operating_weekdays;
        $guide->guide_blackout_dates=$guide_blackout_dates;
        $guide->nationality_markup_details=$nationality_markup_details;
        $guide->guide_tariff=$guide_tariff;
        $guide->guide_inclusions=$guide_inclusions;
        $guide->guide_exclusions=$guide_exclusions;
        $guide->guide_cancel_policy=$guide_cancel_policy;
        $guide->guide_terms_conditions=$guide_terms_conditions;
        $guide->guide_image=$guide_image;
        $guide->guide_created_by=$guide_created_by;
        $guide->guide_role="Supplier";
         if($guide->save())
         {
          $last_id=$guide->id;
          $guide_log=new Guides_log;
          $guide_log->guide_id=$last_id;
          $guide_log->guide_first_name=$guide_first_name;
          $guide_log->guide_last_name=$guide_last_name;
          $guide_log->guide_contact=$guide_contact;
          $guide_log->guide_address=$guide_address;
          $guide_log->guide_supplier_id=$guide_created_by;
          $guide_log->guide_country=$guide_country;
          $guide_log->guide_city=$guide_city;
          $guide_log->guide_tours_cost=$guide_tours_cost;
          $guide_log->guide_language=$guide_language;
           $guide_log->guide_price_per_day=$guide_price_per_day;
          $guide_log->guide_description=$guide_description;
          $guide_log->operating_weekdays=$operating_weekdays;
          $guide_log->guide_blackout_dates=$guide_blackout_dates;
          $guide_log->nationality_markup_details=$nationality_markup_details;
          $guide_log->guide_tariff=$guide_tariff;
          $guide_log->guide_inclusions=$guide_inclusions;
          $guide_log->guide_exclusions=$guide_exclusions;
          $guide_log->guide_cancel_policy=$guide_cancel_policy;
          $guide_log->guide_terms_conditions=$guide_terms_conditions;
          $guide_log->guide_image=$guide_image;
          $guide_log->guide_created_by=$guide_created_by;
          $guide_log->guide_role="Supplier";
          $guide_log->guide_operation_performed="INSERT";
          $guide_log->save();
          echo "success";
         }
         else
         {
          echo "fail";
         }
     }

    }
     public function edit_guide($guide_id)
    {
      if(session()->has('travel_supplier_id'))
      {
          $countries=Countries::where('country_status',1)->get();
          $get_guides=Guides::where('guide_id',$guide_id)->first();
           $languages=Languages::get();
            $fetch_vehicle_type=VehicleType::where('vehicle_type_status',1)->get();
          if($get_guides)
          {
              $supplier_id=$get_guides->guide_created_by;

          $get_supplier_countries=Suppliers::where('supplier_id',$supplier_id)->first();

          $supplier_countries=$get_supplier_countries->supplier_opr_countries;

          $countries_data=explode(',', $supplier_countries);

           $cities=Cities::join("states","states.id","=","cities.state_id")->where("states.country_id", $get_guides->guide_country)->select("cities.*")->orderBy('cities.name','asc')->get();

          return view('supplier.edit-guide')->with(compact('countries','cities','get_supplier_countries','get_guides',"countries_data",'languages','fetch_vehicle_type'));
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

     public function update_guide(Request $request)
    {
      $guide_id=$request->get('guide_id');
      $guide_created_by=session()->get('travel_supplier_id');
      $guide_first_name=$request->get('guide_first_name');
      $guide_last_name=$request->get('guide_last_name');
      $guide_contact=$request->get('contact_number');
      $guide_address=$request->get('address');
        $check_guides=Guides::where('guide_contact',$guide_contact)->where('guide_id','!=',$guide_id)->get();
        if(count($check_guides)>0)
        {
  
            echo "exist";
        }
        else
        {
         $guide_image_get=Guides::where('guide_id',$guide_id)->first();
          $logo_data=$guide_image_get['guide_image'];

          $guide_country=$request->get('guide_country');

         $guide_city=$request->get('guide_city');

         $guide_language=$request->get('guide_language');

         $guide_language=implode(',',$guide_language);

          $guide_price_per_day=$request->get('guide_price_per_day');

         $guide_description=$request->get('description');

         $week_monday=$request->get('week_monday');

         $week_tuesday=$request->get('week_tuesday');

         $week_wednesday=$request->get('week_wednesday');

         $week_thursday=$request->get('week_thursday');

         $week_friday=$request->get('week_friday');

         $week_saturday=$request->get('week_saturday');

         $week_sunday=$request->get('week_sunday');



        $operating_weekdays=array("monday"=>$week_monday,

          "tuesday"=>$week_tuesday,

          "wednesday"=>$week_wednesday,

          "thursday"=>$week_thursday,

          "friday"=>$week_friday,

          "saturday"=>$week_saturday,

          "sunday"=>$week_sunday);



        $operating_weekdays=serialize($operating_weekdays);

        $guide_blackout_dates=$request->get('blackout_days');



        $guide_nationality=$request->get('guide_nationality');

        $guide_markup=$request->get('guide_markup');

        $guide_amount=$request->get('guide_amount');



        $nationality_markup_details=array();

        for($nation_count=0;$nation_count<count($guide_nationality);$nation_count++)

        {

          $nationality_markup_details[$nation_count]['guide_nationality']=$guide_nationality[$nation_count];

          $nationality_markup_details[$nation_count]['guide_markup']=$guide_markup[$nation_count];

          $nationality_markup_details[$nation_count]['guide_amount']=$guide_amount[$nation_count];

        }



        $nationality_markup_details=serialize($nationality_markup_details);



        $guide_validity_from=$request->get('guide_validity_from');

        $guide_validity_to=$request->get('guide_validity_to');

        $guide_tourname=$request->get('guide_tourname');  

        $guide_cost_four=$request->get('guide_cost_four');

        $guide_cost_seven=$request->get('guide_cost_seven');

        $guide_cost_twenty=$request->get('guide_cost_twenty');

        $guide_duration=$request->get('guide_duration');





        $guide_tariff=array();

        for($transport_count=0;$transport_count<count($guide_tourname);$transport_count++)

        {

          $guide_tariff[$transport_count]['guide_validity_from']=$guide_validity_from[$transport_count];

          $guide_tariff[$transport_count]['guide_validity_to']=$guide_validity_to[$transport_count];

          $guide_tariff[$transport_count]['guide_tourname']=$guide_tourname[$transport_count];

          $guide_tariff[$transport_count]['guide_cost_four']=$guide_cost_four[$transport_count];

          $guide_tariff[$transport_count]['guide_cost_seven']=$guide_cost_seven[$transport_count];

          $guide_tariff[$transport_count]['guide_cost_twenty']=$guide_cost_twenty[$transport_count];

          $guide_tariff[$transport_count]['guide_duration']=$guide_duration[$transport_count];



        }



        $guide_tariff=serialize($guide_tariff);

       if($request->has('tour_name'))
        {
            $tour_name=$request->get('tour_name');

             $tour_vehiclename=$request->get('tour_vehiclename');
        $tour_guide_cost=$request->get('tour_guide_cost');

        $guide_tours_cost=array();
        for($cost_count=0;$cost_count<count($tour_name);$cost_count++)

        {

          $guide_tours_cost[$cost_count]["tour_name"]=$tour_name[$cost_count];
           $guide_tours_cost[$cost_count]["tour_vehicle_name"]=$tour_vehiclename[$cost_count];
            $guide_tours_cost[$cost_count]["tour_guide_cost"]=$tour_guide_cost[$cost_count];
        }

        
        }
        else
        {
          $guide_tours_cost=array();
        }
      

      $guide_tours_cost=serialize($guide_tours_cost);

        $guide_logo_file=$request->get('guide_logo_file');

         if($request->hasFile('guide_logo_file'))
        {
            $guide_logo_file=$request->file('guide_logo_file');
            $extension=strtolower($request->guide_logo_file->getClientOriginalExtension());
            if($extension=="png" || $extension=="jpg" || $extension=="jpeg")
            {
                $guide_image = "guide-".time().'.'.$request->file('guide_logo_file')->getClientOriginalExtension();

                // request()->agent_logo->storeAs(public_path('consultant-images'), $imageName);
                $dir1 = 'assets/uploads/guide_images/';

                $request->file('guide_logo_file')->move($dir1, $guide_image);
            }
            else
            {
                $guide_image = "";
            }
        }
        else
        {
            $guide_image = $logo_data;
        }

        
        $guide_inclusions=$request->get('guide_inclusions');

        $guide_exclusions=$request->get('guide_exclusions');

        $guide_cancel_policy=$request->get('guide_cancellation');

        $guide_terms_conditions=$request->get('guide_terms_conditions');
         
        $update_array=array("guide_first_name"=>$guide_first_name,
        "guide_last_name"=>$guide_last_name,
        "guide_contact"=>$guide_contact,
        "guide_address"=>$guide_address,
        "guide_supplier_id"=>$guide_created_by,
        "guide_country"=>$guide_country,
        "guide_city"=>$guide_city,
         "guide_tours_cost"=>$guide_tours_cost,
        "guide_language"=>$guide_language,
        "guide_price_per_day"=>$guide_price_per_day,
        "guide_description"=>$guide_description,
        "operating_weekdays"=>$operating_weekdays,
        "guide_blackout_dates"=>$guide_blackout_dates,
        "nationality_markup_details"=>$nationality_markup_details,
        "guide_tariff"=>$guide_tariff,
        "guide_inclusions"=>$guide_inclusions,
        "guide_exclusions"=>$guide_exclusions,
        "guide_cancel_policy"=>$guide_cancel_policy,
        "guide_terms_conditions"=>$guide_terms_conditions,
        "guide_image"=>$guide_image);

        $update_guide=Guides::where('guide_id',$guide_id)->update($update_array);
        if($update_guide)
        {
          $guide_log=new Guides_log;
          $guide_log->guide_id=$guide_id;
          $guide_log->guide_first_name=$guide_first_name;
          $guide_log->guide_last_name=$guide_last_name;
          $guide_log->guide_contact=$guide_contact;
          $guide_log->guide_address=$guide_address;
          $guide_log->guide_supplier_id=$guide_created_by;
          $guide_log->guide_country=$guide_country;
          $guide_log->guide_city=$guide_city;
            $guide_log->guide_tours_cost=$guide_tours_cost;
          $guide_log->guide_language=$guide_language;
          $guide_log->guide_price_per_day=$guide_price_per_day;
          $guide_log->guide_description=$guide_description;
          $guide_log->operating_weekdays=$operating_weekdays;
          $guide_log->guide_blackout_dates=$guide_blackout_dates;
          $guide_log->nationality_markup_details=$nationality_markup_details;
          $guide_log->guide_tariff=$guide_tariff;
          $guide_log->guide_inclusions=$guide_inclusions;
          $guide_log->guide_exclusions=$guide_exclusions;
          $guide_log->guide_cancel_policy=$guide_cancel_policy;
          $guide_log->guide_terms_conditions=$guide_terms_conditions;
          $guide_log->guide_image=$guide_image;
          $guide_log->guide_created_by=$guide_created_by;
          $guide_log->guide_role="Supplier";
          $guide_log->guide_operation_performed="UPDATE";
          $guide_log->save();
          echo "success";
        }
        else
        {
          echo "fail";
        }
     }

    }

    public function guide_details($guide_id)
    {
     if(session()->has('travel_supplier_id'))
     {
      $countries=Countries::where('country_status',1)->get();
      $get_guides=Guides::where('guide_id',$guide_id)->first();
       $fetch_vehicle_type=VehicleType::where('vehicle_type_status',1)->get();
         $languages=Languages::get();
      if($get_guides)
      {
       $supplier_id=$get_guides->guide_created_by;

       $get_supplier_countries=Suppliers::where('supplier_id',$supplier_id)->first();

       $supplier_countries=$get_supplier_countries->supplier_opr_countries;

       $countries_data=explode(',', $supplier_countries);

       $cities=Cities::join("states","states.id","=","cities.state_id")->where("states.country_id", $get_guides->guide_country)->select("cities.*")->orderBy('cities.name','asc')->get();

       return view('supplier.guide-details-view')->with(compact('countries','cities','get_supplier_countries','get_guides',"countries_data","fetch_vehicle_type","languages"))->with('guide_id',$guide_id);
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

public function supplier_bookings()
{
  if(session()->has('travel_supplier_id'))
  {
    $supplier_id=session()->get('travel_supplier_id');
    $fetch_bookings=Bookings::where('booking_supplier_id',$supplier_id)->get();
    $fetch_activity=Activities::where('activity_status',1)->get();
    return view('supplier.bookings')->with(compact('fetch_bookings'));
  }
  else
  {
    return redirect()->route('/supplier');
  }

}



}

