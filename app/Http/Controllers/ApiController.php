<?php

namespace App\Http\Controllers;
use App\Activities;
use App\Hotels;
use App\Currency;
use App\Countries;
use App\Cities;
use App\Users;
use App\Suppliers;
use App\Guides;
use App\GuideExpense;
use App\Languages;
use App\BookingCustomer;
use App\SightSeeing;
use App\SavedItinerary;
use App\VehicleType;
use Session;
use Mail;
use App\Mail\SendMailable;

use Illuminate\Http\Request;

class ApiController extends Controller
{

	public function getCountries(Request $request)
	{
		$fetch_countries=Countries::where("country_status",1)->get();

		if(count($fetch_countries)>0)
		{
			$data=array();
			$data=$fetch_countries;
			return json_encode($data);
		}
		else
		{
			$data=array();
			return json_encode($data);
		}
	}
	
	public function getLanguages(Request $request)
	{
		$fetch_langauges=Languages::where("language_status",1)->get();

		if(count($fetch_langauges)>0)
		{
			$data=array();
			$data=$fetch_langauges;
			return json_encode($data);
		}
		else
		{
			$data=array();
			return json_encode($data);
		}
	}

	public function getCities(Request $request)
	{
		$country_id=$request->get('country_id');

		$get_countries=Countries::where('country_id',$country_id)->first();

		if($get_countries)

		{

			$citydata="<option value='0' hidden>SELECT CITY</option>";

			$fetch_cities=Cities::join("states","states.id","=","cities.state_id")->where("states.country_id",$country_id)->select("cities.*")->orderBy('cities.name','asc')->get();

			// foreach($fetch_cities as $cities)

			// {

			// 	$citydata.="<option value='".$cities->id."'>".$cities->name."</option>";

			// }

			// echo $citydata;

			if(count($fetch_cities)>0)
			{
				$data=array();
				$data=$fetch_cities;
				return json_encode($data);
			}
			else
			{
				$data=array();
				return json_encode($data);
			}

		}

		else

		{

		}
	}

	public function fetchActivites(Request $request)
	{
		$fetch_activites=Activities::where('activity_status',1)->orderBy('activity_id','desc')->get();

		if(count($fetch_activites)>0)
		{
			$data=array();
			$fetch_activites['markup']= 10;
			$data=$fetch_activites;
			
			return json_encode($data);
		}
		else
		{
			$data=array();
			return json_encode($data);
		}
	}

	public function filteredfetchActivites(Request $request)
	{

		$country_id=$request->get('country_id');
		$city_id=$request->get('city_id');
		$date_from=$request->get('date_from');
  // $date_to=$request->get('date_to');
		$limit=9;
		if($request->has('offset'))
		{
				$offset=$request->get('offset');
		}
		else
		{
				$offset=0;
		}
	


		$fetch_activites=Activities::where('activity_country',$country_id)->where('activity_city',$city_id);

		if($date_from!="")
		{
			$fetch_activites=$fetch_activites->where('validity_fromdate',"<=",$date_from)->where('validity_todate',">=",$date_from);
		}

		$fetch_activites=$fetch_activites->where('activity_status',1)->orderBy(\DB::raw('-`activity_show_order`'), 'desc')->orderBy('activity_id','desc')->offset($offset*$limit)->take($limit)->get();

		if(count($fetch_activites)>0)
		{
			$data=array();
				$fetch_activites['markup']= 10;
			$data=$fetch_activites;
			return json_encode($data);
		}
		else
		{
			$data=array();
			return json_encode($data);
		}
	}

	public function activityDetailView(Request $request)
	{

		$activity_id=$request->get('activity_id');

		$get_activities=Activities::where('activity_id',$activity_id)->where('activity_status',1)->first();
		if($get_activities)
		{
			
			$get_dates_from=strtotime($get_activities->validity_fromdate);
			$get_dates_to=strtotime($get_activities->validity_todate);

			$blackout_days=explode(',',$get_activities->activity_blackout_dates);

			$date_diff=abs($get_dates_from - $get_dates_to)/60/60/24;
			$dates="";
			for($count=0;$count<=$date_diff;$count++)
			{
				$calculated_date=date("Y-m-d",strtotime("+$count day",strtotime($get_activities->validity_fromdate)));

				if(!in_array($calculated_date, $blackout_days))
				{
					$dates.=$calculated_date;
					if($count<$date_diff)
					{
						$dates.=", ";
					} 
				}

			}
			$countries=Countries::get();
			foreach($countries as $country)
			{
				if($country->country_id==$get_activities->activity_country)
				{
					$country_name=$country->country_name;
				}


			}


			$fetch_city=ServiceManagement::searchCities($get_activities->activity_city,$get_activities->activity_country);
			$city_name=$fetch_city['name'];

			$activity_data=array("errorCode"=>"0",
				"errorMessage"=>"",
				"activity"=>$get_activities,
				"country"=>$country_name,
				"city"=>$city_name,
				"enabled_dates"=>$dates,
				"markup"=>10);
			return json_encode($activity_data);
		}
		else
		{
			$activity_data=array("errorCode"=>"1","errorMessage"=>"No data Found");
			return json_encode($activity_data);
		}

	}

	public function activityBooked(Request $request)
	{

		$fetch_admin=Users::where('users_pid',0)->first();
		$login_customer_id=$request->get('login_customer_id');
		$login_customer_name=$request->get('login_customer_name');
		$login_customer_email=$request->get('login_customer_email');
		$customer_name=$request->get('customer_name');
		$customer_email=$request->get('customer_email');  
		$customer_phone=$request->get('customer_phone');  
		$customer_country=$request->get('customer_country');  
		$customer_address=$request->get('customer_address');  
		$customer_remarks=$request->get('customer_remarks'); 
		$activity_id=$request->get('activity_id');
		$booking_supplier_id=$request->get('booking_supplier_id');
		$fetch_supplier=Suppliers::where('supplier_id',$booking_supplier_id)->first();
		$booking_amount=$request->get('booking_amount');
		$booking_date=$request->get('booking_date');
		$adult_price=$request->get('adult_price');
		$booking_adult_count=$request->get('booking_adult_count');
		$booking_child_count=$request->get('booking_child_count');
		$customer_adult_price=$request->get('customer_adult_price');
		$customer_child_price=$request->get('customer_child_price');
		$booking_markup_per=$request->get('booking_markup_per');
		$get_activities=Activities::where('activity_id',$activity_id)->where('activity_status',1)->first();
		if($get_activities)
		{
			$supplier_adult_price=$get_activities->adult_price;
			$supplier_child_price=$get_activities->child_price;
			$booking_currency=$get_activities->activity_currency;
			$date=date("Y-m-d");
			$time=date("H:i:s");
			 $get_latest_id=BookingCustomer::latest()->value('booking_sep_id');
			     $get_latest_id=$get_latest_id+1;
			$insert_booking=new BookingCustomer;
			$insert_booking->booking_sep_id=$get_latest_id;
			$insert_booking->booking_type="activity";
			$insert_booking->booking_type_id=$activity_id;
			$insert_booking->customer_login_id=$login_customer_id;
			$insert_booking->customer_login_name=$login_customer_name;
			$insert_booking->customer_login_email=$login_customer_email;
			$insert_booking->booking_supplier_id=$booking_supplier_id;
			$insert_booking->customer_name=$customer_name;
			$insert_booking->customer_contact=$customer_phone;
			$insert_booking->customer_email=$customer_email;
			$insert_booking->customer_country=$customer_country;
			$insert_booking->customer_address=$customer_address;
			$insert_booking->booking_adult_count=$booking_adult_count;
			$insert_booking->booking_child_count=$booking_child_count;
			$insert_booking->supplier_adult_price=$supplier_adult_price;
			$insert_booking->supplier_child_price=$supplier_child_price;
			$insert_booking->customer_adult_price=$customer_adult_price;
			$insert_booking->customer_child_price=$customer_child_price;
			$insert_booking->booking_currency=$booking_currency;
			$insert_booking->booking_amount=$booking_amount;
			$insert_booking->booking_markup_per=$booking_markup_per;
			$insert_booking->booking_remarks=$customer_remarks;
			$insert_booking->booking_selected_date=$booking_date;
			$insert_booking->booking_date=$date;
			$insert_booking->booking_time=$time;

			if($insert_booking->save())
			{
				$booking_id=$get_latest_id;
				$htmldata='<p>Dear '.$customer_name.',</p><p>You have successfully booked activity on traveldoor[dot]ge . Your booking id is '.$booking_id.'.</p>
				';
				$data = array(
					'name' => $customer_name,
					'email' =>$customer_email
				);
				Mail::send('email.htmldata', ['htmldata' => $htmldata], function ($m) use ($data) {
					$m->from('sarbjitphp@netwebtechnologies.com', 'Traveldoor');
					$m->to($data['email'], $data['name'])->subject('BOOKING SUCCESSFUL');
				});

				$htmldata='<p>Dear '.$fetch_supplier->supplier_name.',</p><p>You have got new activity booking on traveldoor[dot]ge with booking id '.$booking_id.'. Please login into your supplier portal to get more information.</p>';
				$data_supplier= array(
					'name' => $fetch_supplier->supplier_name,
					'email' =>$fetch_supplier->company_email
				);
				Mail::send('email.htmldata', ['htmldata' => $htmldata], function ($m) use ($data_supplier) {
					$m->from('sarbjitphp@netwebtechnologies.com', 'Traveldoor');
					$m->to($data_supplier['email'], $data_supplier['name'])->subject('NEW ACTIVITY BOOKING');
				});

				$htmldata='<p>Dear Admin,</p><p>New activity has been booked with booking id '.$booking_id.' by customer '.$customer_name.' for the supplier '.$fetch_supplier->supplier_name.' </p>';
				$data_admin= array(
					'name' => $fetch_admin->users_fname." ".$fetch_admin->users_lname,
					'email' =>$fetch_admin->users_email
				);
				Mail::send('email.htmldata', ['htmldata' => $htmldata], function ($m) use ($data_admin) {
					$m->from('sarbjitphp@netwebtechnologies.com', 'Traveldoor');
					$m->to($data_admin['email'], $data_admin['name'])->subject('NEW ACTIVITY BOOKING ON PORTAL');
				});



				$result_data=array("errorCode"=>"0",
				"errorMessage"=>"",
				"result"=>"success");
				return json_encode($result_data);
			}
			else
			{
					$result_data=array("errorCode"=>"1","errorMessage"=>"Booking Failed",
				"result"=>"fail");
				return json_encode($result_data);
			}

		}

	}

	public function fetchHotels(Request $request)
	{
		$date_from=date('Y-m-d');
		$fetch_hotels=Hotels::where('hotel_status',1)->where('booking_validity_to',">",$date_from)->orderBy('hotel_id','desc')->get();

		if(count($fetch_hotels)>0)
		{
			$data=array();
			$fetch_hotels['markup']= 5;
			$data=$fetch_hotels;
			
			return json_encode($data);
		}
		else
		{
			$data=array();
			return json_encode($data);
		}
	}

	public function filteredfetchHotels(Request $request)
	{

		$country_id=$request->get('country_id');
		$city_id=$request->get('city_id');
		$date_from=$request->get('date_from');
		$date_to=$request->get('date_to');
		$room_quantity=$request->get('room_qty');
  // $date_to=$request->get('date_to');
		$limit=10;
		if($request->has('offset'))
		{
				$offset=$request->get('offset');
		}
		else
		{
				$offset=0;
		}

		$fetch_hotels=Hotels::where('hotel_country',$country_id)->where('hotel_city',$city_id);

		if($date_from!="")
		{
			 $fetch_hotels=$fetch_hotels->where('booking_validity_from',"<=",$date_from)->where('booking_validity_to',">=",$date_from);
		}

		$fetch_hotels=$fetch_hotels->where('hotel_status',1)->orderBy(\DB::raw('-`hotel_show_order`'), 'desc')->orderBy('hotel_id','desc')->offset($offset*$limit)->take($limit)->get();

		if(count($fetch_hotels)>0)
		{
			$data=array();
				$fetch_hotels['markup']= 5;
			$data=$fetch_hotels;
			return json_encode($data);
		}
		else
		{
			$data=array();
			return json_encode($data);
		}
	}


	public function hotelDetailView(Request $request)
	{
		$mainid=$request->get('hotel_id');
		
		$get_hotels=Hotels::where('hotel_status',1)->where('hotel_id',$mainid)->first();
		if($get_hotels)
		{
			
		$checkin_date=$request->get('checkin_date');

		$checkout_date=$request->get('checkout_date');

		$room_quantity=$request->get('room_quantity');

		$check_in_day = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $checkin_date.' 0:00:00');

		$check_out_day = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $checkout_date.' 0:00:00');

		$NoOfNights = $check_in_day->diffInDays($check_out_day);
		$amenities_array=array();
		$main_amenities=0;
                    $get_amenities=unserialize($get_hotels->hotel_amenities);
                 
                    if($get_amenities==null || $get_amenities=="")
                    {

                    }
                    else
                    {

                    

                        
             
                       foreach($get_amenities as $amenities)
                       {
                        
                      
                            $get_amenities_name=LoginController::fetchAmenitiesName($amenities[0]);

                            $amenities_array[$main_amenities]["amenities_name"]=$get_amenities_name['amenities_name'];


                       if(!empty($amenities[1]))
                        {
                       $sub_amenities_count=0;


 
                        foreach($amenities[1] as $sub_amenities)
                        {
                        	
                        	
                           $get_sub_amenities_name=LoginController::fetchSubAmenitiesName($sub_amenities,$amenities[0]);

                            $amenities_array[$main_amenities]["sub_amenities"][$sub_amenities_count]=$get_sub_amenities_name['sub_amenities_name'];

                           $sub_amenities_count++;
                        	
                           

                        }
                        $main_amenities++;
                        }
                       
              
                        
                        }

                        }
                      

			$hotel_data=array("errorCode"=>"0",
				"errorMessage"=>"",
				"hotel"=>$get_hotels,
				"hotel_amenities"=>$amenities_array,
				"checkin_date"=>$checkin_date,
				"checkout_date"=>$checkout_date,
				"room_quantity"=>$room_quantity,
				"NoOfNights"=>$NoOfNights,
				"markup"=>5);
			return json_encode($hotel_data);
		}
		else
		{
			$hotel_data=array("errorCode"=>"1","errorMessage"=>"No data Found");
			return json_encode($hotel_data);
		}

	}

	public function hotelBooked(Request $request)
	{

		$fetch_admin=Users::where('users_pid',0)->first();
		$login_customer_id=$request->get('login_customer_id');
		$login_customer_name=$request->get('login_customer_name');
		$login_customer_email=$request->get('login_customer_email');
		$customer_name=$request->get('customer_name');
		$customer_email=$request->get('customer_email');  
		$customer_phone=$request->get('customer_phone');  
		$customer_country=$request->get('customer_country');  
		$customer_address=$request->get('customer_address');  
		$customer_remarks=$request->get('customer_remarks'); 
		$hotel_id=$request->get('hotel_id');
		$booking_supplier_id=$request->get('booking_supplier_id');
		$fetch_supplier=Suppliers::where('supplier_id',$booking_supplier_id)->first();
		$booking_amount=$request->get('booking_amount');
		$checkin_date=$request->get('checkin_date');
		$checkout_date=$request->get('checkout_date');
		$check_in_day = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $request->get('checkin_date').' 0:00:00');
		$check_out_day = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $request->get('checkout_date').' 0:00:00');
		$NoOfdays = $check_in_day->diffInDays($check_out_day);
		 $booking_room_count=$request->get('booking_room_quantity');
		 $booking_room_name=$request->get('room_name');
		$supplier_room_price=$request->get('supplier_price');
		$customer_room_price=$request->get('customer_room_price');
		$booking_markup_per=$request->get('booking_markup_per');
		$get_hotels=Hotels::where('hotel_id',$hotel_id)->where('hotel_status',1)->first();

		if($get_hotels)
		{
		
			$booking_currency=$request->get('room_currency');
			$date=date("Y-m-d");
			$time=date("H:i:s");
			$get_latest_id=BookingCustomer::latest()->value('booking_sep_id');
			     $get_latest_id=$get_latest_id+1;
			$insert_booking=new BookingCustomer;
			$insert_booking->booking_sep_id=$get_latest_id;
			$insert_booking->booking_type="hotel";
			$insert_booking->booking_type_id=$hotel_id;
			$insert_booking->customer_login_id=$login_customer_id;
			$insert_booking->customer_login_name=$login_customer_name;
			$insert_booking->customer_login_email=$login_customer_email;
			$insert_booking->booking_supplier_id=$booking_supplier_id;
			$insert_booking->customer_name=$customer_name;
			$insert_booking->customer_contact=$customer_phone;
			$insert_booking->customer_email=$customer_email;
			$insert_booking->customer_country=$customer_country;
			$insert_booking->customer_address=$customer_address;
			$insert_booking->booking_adult_count=$booking_room_count;
			$insert_booking->booking_subject_name=$booking_room_name;
			$insert_booking->booking_subject_days=$NoOfdays;
			$insert_booking->supplier_adult_price=$supplier_room_price;
			$insert_booking->customer_adult_price=$customer_room_price;
			$insert_booking->booking_currency=$booking_currency;
			$insert_booking->booking_amount=$booking_amount;
			$insert_booking->booking_markup_per=$booking_markup_per;
			$insert_booking->booking_remarks=$customer_remarks;
			$insert_booking->booking_selected_date=$checkin_date;
			$insert_booking->booking_selected_to_date=$checkout_date;
			$insert_booking->booking_date=$date;
			$insert_booking->booking_time=$time;

			if($insert_booking->save())
			{
				$booking_id=$get_latest_id;
				$htmldata='<p>Dear '.$customer_name.',</p><p>You have successfully booked hotel on traveldoor[dot]ge . Your booking id is '.$booking_id.'.</p>
				';
				$data = array(
					'name' => $customer_name,
					'email' =>$customer_email
				);
				Mail::send('email.htmldata', ['htmldata' => $htmldata], function ($m) use ($data) {
					$m->from('sarbjitphp@netwebtechnologies.com', 'Traveldoor');
					$m->to($data['email'], $data['name'])->subject('BOOKING SUCCESSFUL');
				});

				$htmldata='<p>Dear '.$fetch_supplier->supplier_name.',</p><p>You have got new hotel booking on traveldoor[dot]ge with booking id '.$booking_id.'. Please login into your supplier portal to get more information.</p>';
				$data_supplier= array(
					'name' => $fetch_supplier->supplier_name,
					'email' =>$fetch_supplier->company_email
				);
				Mail::send('email.htmldata', ['htmldata' => $htmldata], function ($m) use ($data_supplier) {
					$m->from('sarbjitphp@netwebtechnologies.com', 'Traveldoor');
					$m->to($data_supplier['email'], $data_supplier['name'])->subject('NEW HOTEL BOOKING');
				});

				$htmldata='<p>Dear Admin,</p><p>New hotel has been booked with booking id '.$booking_id.' by customer '.$customer_name.' for the supplier '.$fetch_supplier->supplier_name.' </p>';
				$data_admin= array(
					'name' => $fetch_admin->users_fname." ".$fetch_admin->users_lname,
					'email' =>$fetch_admin->users_email
				);
				Mail::send('email.htmldata', ['htmldata' => $htmldata], function ($m) use ($data_admin) {
					$m->from('sarbjitphp@netwebtechnologies.com', 'Traveldoor');
					$m->to($data_admin['email'], $data_admin['name'])->subject('NEW HOTEL BOOKING ON PORTAL');
				});



				$result_data=array("errorCode"=>"0",
				"errorMessage"=>"",
				"result"=>"success");
				return json_encode($result_data);
			}
			else
			{
					$result_data=array("errorCode"=>"1","errorMessage"=>"Booking Failed",
				"result"=>"fail");
				return json_encode($result_data);
			}

		}

	}

	public function fetchGuides(Request $request)
	{
		$date_from=date('Y-m-d');
		$fetch_guides=Guides::where('guide_status',1)->orderBy('guide_id','desc')->get();

		$languages=Languages::get();

     $guide_expense=GuideExpense::get();

     $hotel_cost=0;

     $food_cost=0;

    foreach($guide_expense as $expense)

    {

        if($expense->guide_expense=="HOTEL COST")

        {

             $hotel_cost=$expense->guide_expense_cost;

        }

        else if($expense->guide_expense=="FOOD COST")

        {

            $food_cost=$expense->guide_expense_cost;

        }

        

    }

		if(count($fetch_guides)>0)
		{
			$data=array();
			$fetch_guides['markup']= 12;
			$fetch_guides['hotel_cost']= $hotel_cost;
			$fetch_guides['food_cost']= $food_cost;
			$data=$fetch_guides;
			return json_encode($data);
		}
		else
		{
			$data=array();
			return json_encode($data);
		}

	}

	public function filteredfetchGuides(Request $request)
	{

		$country_id=$request->get('country_id');
		$city_id=$request->get('city_id');
		$date_from=$request->get('date_from');
		$date_to=$request->get('date_to');

		$guides_array=array();


		$languages=languages::get();

		$guide_expense=GuideExpense::get();

		$hotel_cost=0;

		$food_cost=0;

		foreach($guide_expense as $expense)
		{
			if($expense->guide_expense=="HOTEL COST")
			{
				$hotel_cost=$expense->guide_expense_cost;
			}
			else if($expense->guide_expense=="FOOD COST")
			{
				$food_cost=$expense->guide_expense_cost;
			}
		}
		$fetch_guides=Guides::where('guide_country',$country_id)->where('guide_city',$city_id)->orderBy(\DB::raw('-`guide_show_order`'), 'desc')->orderBy('guide_id','desc')->get();

		if(count($fetch_guides)>0)
		{
			foreach($fetch_guides as $guides)

			{



				$operating_days=unserialize($guides->operating_weekdays);

				$operating_days_array=array();

				foreach($operating_days as $key=>$days)

				{

					if($days=="Yes")

					{

						$operating_days_array[]= ucwords($key);

					}



				}

				$check_blackout_during_dates=0;



				$get_dates_from=strtotime($date_from);

				$get_dates_to=strtotime($date_to);



				$blackout_days=explode(',',$guides->guide_blackout_dates);



				$date_diff=abs($get_dates_from - $get_dates_to)/60/60/24;

				$dates="";

				for($count=0;$count<=$date_diff;$count++)

				{

					$calculated_date=date("Y-m-d",strtotime("+$count day",strtotime($date_from)));



					$calculated_day=date("l",strtotime("+$count day",strtotime($date_from)));

					if(in_array($calculated_date, $blackout_days) || !in_array($calculated_day, $operating_days_array))

					{

						$check_blackout_during_dates++;



					}





				}





				if($check_blackout_during_dates<=0)

				{
					$guides_array[]=$guides;

				}



			}

			$check_in_day = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $date_from.' 0:00:00');

			$check_out_day = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $date_to.' 0:00:00');

			$NoOfDays = $check_in_day->diffInDays($check_out_day);

			$NoOfDays=($NoOfDays+1);

			$data=array();
			$fetch_guides_data=array();
			$fetch_guides=$guides_array;
			$fetch_guides_data['markup']= 12;
			$fetch_guides_data['food_cost']= $food_cost;
			$fetch_guides_data['hotel_cost']= $hotel_cost;
			$fetch_guides_data['no_of_days']= $NoOfDays;
			$data['error']="0";
			$data['error_code']="";
			$data['guides']=$fetch_guides;
			$data['guides_data']=$fetch_guides_data;
			return json_encode($data);
		}
		else
		{
			$data=array();
			return json_encode($data);
		}

	}
	
	public function guideDetailView(Request $request)
	{


		$guide_id=$request->get('guide_id');

		$get_guides=Guides::where('guide_id',$guide_id)->where('guide_status',1)->first();
		if($get_guides)
		{
		
			$countries=Countries::get();
			foreach($countries as $country)
			{
				if($country->country_id==$get_guides->guide_country)
				{
					$country_name=$country->country_name;
				}


			}
			
			   $guide_expense=GuideExpense::get();
     $hotel_cost=0;

     $food_cost=0;

    foreach($guide_expense as $expense)

    {

        if($expense->guide_expense=="HOTEL COST")

        {

             $hotel_cost=$expense->guide_expense_cost;

        }

        else if($expense->guide_expense=="FOOD COST")

        {

            $food_cost=$expense->guide_expense_cost;

        }

        

    }



			$fetch_city=ServiceManagement::searchCities($get_guides->guide_city,$get_guides->guide_country);
			$city_name=$fetch_city['name'];
			
			$languages=languages::get();
			 $languages_data=explode(",",$get_guides->guide_language);

   foreach($languages as $language)

   {

    if(in_array($language->language_id,$languages_data))

    {



    $languages_spoken[]=$language->language_name;

   }

 }

			$guide_data=array("errorCode"=>"0",
				             "errorMessage"=>"",
				             "guide"=>$get_guides,
				             "country"=>$country_name,
				             "city"=>$city_name,
			                  "hotel_cost"=>$hotel_cost,
				             "food_cost"=>$food_cost,
				            "languages_spoken"=>$languages_spoken,
				             "markup"=>12);
			return json_encode($guide_data);
		}
		else
		{
			$guide_data=array("errorCode"=>"1","errorMessage"=>"No data Found");
			return json_encode($guide_data);
		}

	}

	public function guideBooked(Request $request)
	{

		$fetch_admin=Users::where('users_pid',0)->first();
		$login_customer_id=$request->get('login_customer_id');
		$login_customer_name=$request->get('login_customer_name');
		$login_customer_email=$request->get('login_customer_email');
		$customer_name=$request->get('customer_name');
		$customer_email=$request->get('customer_email');  
		$customer_phone=$request->get('customer_phone');  
		$customer_country=$request->get('customer_country');  
		$customer_address=$request->get('customer_address');  
		$customer_remarks=$request->get('customer_remarks'); 
		$guide_id=$request->get('guide_id');
		$booking_supplier_id=$request->get('booking_supplier_id');
		$fetch_supplier=Suppliers::where('supplier_id',$booking_supplier_id)->first();
		$booking_amount=$request->get('booking_amount');
		$from_date=$request->get('from_date');
		$to_date=$request->get('to_date');
		$check_in_day = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $request->get('from_date').' 0:00:00');
		$check_out_day = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $request->get('to_date').' 0:00:00');
		$NoOfdays = $check_in_day->diffInDays($check_out_day);
		$NoOfdays = ($NoOfdays+1);
		 $booking_guide_quantity=$request->get('booking_guide_quantity');
		$supplier_guide_price=$request->get('supplier_guide_price');
		$customer_guide_price=$request->get('customer_guide_price');
		$booking_markup_per=$request->get('booking_markup_per');

		$guide_expense=GuideExpense::get();
		$hotel_cost=0;
		$food_cost=0;
		foreach($guide_expense as $expense)
		{
			if($expense->guide_expense=="HOTEL COST")
			{
				$hotel_cost=$expense->guide_expense_cost;
			}
			else if($expense->guide_expense=="FOOD COST")
			{
				$food_cost=$expense->guide_expense_cost;
			}
		}

  		$other_expenses=array("hotel_cost"=>$hotel_cost,"food_cost"=>$food_cost);
		$get_guides=Guides::where('guide_id',$guide_id)->where('guide_status',1)->first();

		if($get_guides)
		{
		
			$booking_currency=$request->get('guide_currency');
			$date=date("Y-m-d");
			$time=date("H:i:s");
			 $get_latest_id=BookingCustomer::latest()->value('booking_sep_id');
			     $get_latest_id=$get_latest_id+1;
			$insert_booking=new BookingCustomer;
			$insert_booking->booking_sep_id=$get_latest_id;
			$insert_booking->booking_type="guide";
			$insert_booking->booking_type_id=$guide_id;
			$insert_booking->customer_login_id=$login_customer_id;
			$insert_booking->customer_login_name=$login_customer_name;
			$insert_booking->customer_login_email=$login_customer_email;
			$insert_booking->booking_supplier_id=$booking_supplier_id;
			$insert_booking->customer_name=$customer_name;
			$insert_booking->customer_contact=$customer_phone;
			$insert_booking->customer_email=$customer_email;
			$insert_booking->customer_country=$customer_country;
			$insert_booking->customer_address=$customer_address;
			$insert_booking->booking_adult_count=$booking_guide_quantity;
			$insert_booking->booking_subject_days=$NoOfdays;
			$insert_booking->supplier_adult_price=$supplier_guide_price;
			$insert_booking->customer_adult_price=$customer_guide_price;
			$insert_booking->other_expenses=serialize($other_expenses);
			$insert_booking->booking_currency=$booking_currency;
			$insert_booking->booking_amount=$booking_amount;
			$insert_booking->booking_markup_per=$booking_markup_per;
			$insert_booking->booking_remarks=$customer_remarks;
			$insert_booking->booking_selected_date=$from_date;
			$insert_booking->booking_selected_to_date=$to_date;
			$insert_booking->booking_date=$date;
			$insert_booking->booking_time=$time;

			if($insert_booking->save())
			{
				$booking_id=$get_latest_id;
				$htmldata='<p>Dear '.$customer_name.',</p><p>You have successfully booked guide on traveldoor[dot]ge . Your booking id is '.$booking_id.'.</p>
				';
				$data = array(
					'name' => $customer_name,
					'email' =>$customer_email
				);
				Mail::send('email.htmldata', ['htmldata' => $htmldata], function ($m) use ($data) {
					$m->from('sarbjitphp@netwebtechnologies.com', 'Traveldoor');
					$m->to($data['email'], $data['name'])->subject('BOOKING SUCCESSFUL');
				});

				$htmldata='<p>Dear '.$fetch_supplier->supplier_name.',</p><p>You have got new guide booking on traveldoor[dot]ge with booking id '.$booking_id.'. Please login into your supplier portal to get more information.</p>';
				$data_supplier= array(
					'name' => $fetch_supplier->supplier_name,
					'email' =>$fetch_supplier->company_email
				);
				Mail::send('email.htmldata', ['htmldata' => $htmldata], function ($m) use ($data_supplier) {
					$m->from('sarbjitphp@netwebtechnologies.com', 'Traveldoor');
					$m->to($data_supplier['email'], $data_supplier['name'])->subject('NEW GUIDE BOOKING');
				});

				$htmldata='<p>Dear Admin,</p><p>New guide has been booked with booking id '.$booking_id.' by customer <b>'.$customer_name.'</b> for the supplier <b>'.$fetch_supplier->supplier_name.'</b> </p>';
				$data_admin= array(
					'name' => $fetch_admin->users_fname." ".$fetch_admin->users_lname,
					'email' =>$fetch_admin->users_email
				);
				Mail::send('email.htmldata', ['htmldata' => $htmldata], function ($m) use ($data_admin) {
					$m->from('sarbjitphp@netwebtechnologies.com', 'Traveldoor');
					$m->to($data_admin['email'], $data_admin['name'])->subject('NEW GUIDE BOOKING ON PORTAL');
				});



				$result_data=array("errorCode"=>"0",
				"errorMessage"=>"",
				"result"=>"success");
				return json_encode($result_data);
			}
			else
			{
					$result_data=array("errorCode"=>"1","errorMessage"=>"Booking Failed",
				"result"=>"fail");
				return json_encode($result_data);
			}

		}

	}

	public function fetchSightseeing(Request $request)
	{

	}

	public function filteredfetchSightseeing(Request $request)
	{

		$country_id=$request->get('country_id');
		$city_id=$request->get('city_id');
		$date_from=$request->get('date_from');
			$limit=9;
		if($request->has('offset'))
		{
				$offset=$request->get('offset');
		}
		else
		{
				$offset=0;
		}

		 $fetch_sightseeing=SightSeeing::where('sightseeing_country',$country_id)->where(function ($query) use ($city_id){
   			 $query->where('sightseeing_city_from',$city_id)->orWhere('sightseeing_city_to',$city_id); });

		$fetch_sightseeing=$fetch_sightseeing->where('sightseeing_status',1)->orderBy(\DB::raw('-`sightseeing_show_order`'), 'desc')->orderBy('sightseeing_id','desc')->offset($offset*$limit)->take($limit)->get();

		if(count($fetch_sightseeing)>0)
		{
			$data=array();
			$fetch_sightseeing['markup']= 10;
			$data=$fetch_sightseeing;
			return json_encode($data);
		}
		else
		{
			$data=array();
			return json_encode($data);
		}
	}

	public function sightseeingDetailView(Request $request)
	{

		$sightseeing_id=$request->get('sightseeing_id');
		$get_vehicles=VehicleType::get();

		$get_sightseeing=SightSeeing::where('sightseeing_status',1)->where('sightseeing_id',$sightseeing_id)->first();

		if($get_sightseeing)
		{
			$countries=Countries::get();
			foreach($countries as $country)
			{
				if($country->country_id==$get_sightseeing->sightseeing_country)
				{
					$country_name=$country->country_name;
				}


			}
			$between_city="";
			$get_from_city=ServiceManagement::searchCities($get_sightseeing->sightseeing_city_from,$get_sightseeing->sightseeing_country);
			$from_city=$get_from_city['name'];

			if($get_sightseeing->sightseeing_city_between!=null && $get_sightseeing->sightseeing_city_between!="")
			{
				$all_between_cities=explode(",",$get_sightseeing->sightseeing_city_between);
				for($cities=0;$cities< count($all_between_cities);$cities++)
				{
					$fetch_city=ServiceManagement::searchCities($all_between_cities[$cities],$get_sightseeing->sightseeing_country);
					$between_city.=$fetch_city['name']."-";
				}
			}

			 $get_to_city=ServiceManagement::searchCities($get_sightseeing->sightseeing_city_to,$get_sightseeing->sightseeing_country);
			$to_city=$get_to_city['name'];

			$sightseeing_data=array("errorCode"=>"0",
				"errorMessage"=>"",
				"sightseeing"=>$get_sightseeing,
				"country"=>$country_name,
				"from_city"=>$from_city,
				"between_city"=>$between_city,
				"to_city"=>$to_city,
				"vehicle_types"=>$get_vehicles,
				"markup"=>10);
			return json_encode($sightseeing_data);
		}
		else
		{
			$sightseeing_data=array("errorCode"=>"1","errorMessage"=>"No data Found");
			return json_encode($sightseeing_data);
		}

	}

	public function fetchGuidesSightseeing(Request $request)
	{
		$languages=languages::get();
		$country_id=$request->get('sightseeing_country_id');
		$date_from=$request->get('sightseeing_checkin_date');
		$date_to=$request->get('sightseeing_checkin_date');


		$sightseeing_id=$request->get('sightseeing_id');
		$vehicle_selected=$request->get('vehicle_type_id');

		$fetch_guides=Guides::where('guide_country',$country_id)->where('guide_status',1)->orderBy('guide_id','desc')->get();

		$check_guide_count=0;
		foreach($fetch_guides as $guides)
		{
			$guide_cost_vehicle_selected=0;
			$get_tour_cost=unserialize($guides->guide_tours_cost);

			foreach($get_tour_cost as $tour_cost)
			{
				if($tour_cost['tour_name']==$sightseeing_id)
				{
					$cost_count=0;
					foreach($tour_cost['tour_vehicle_name'] as $vehicle_names)
					{
						if($vehicle_names==$vehicle_selected)
						{
							$guide_cost_vehicle_selected=$tour_cost['tour_guide_cost'][$cost_count];
							$operating_days=unserialize($guides->operating_weekdays);

							$operating_days_array=array();

							foreach($operating_days as $key=>$days)

							{

								if($days=="Yes")

								{

									$operating_days_array[]= ucwords($key);

								}



							}

							$check_blackout_during_dates=0;



							$get_dates_from=strtotime($date_from);

							$get_dates_to=strtotime($date_to);



							$blackout_days=explode(',',$guides->guide_blackout_dates);



							$date_diff=abs($get_dates_from - $get_dates_to)/60/60/24;

							$dates="";

							for($count=0;$count<=$date_diff;$count++)

							{

								$calculated_date=date("Y-m-d",strtotime("+$count day",strtotime($date_from)));



								$calculated_day=date("l",strtotime("+$count day",strtotime($date_from)));

								if(in_array($calculated_date, $blackout_days) || !in_array($calculated_day, $operating_days_array))

								{

									$check_blackout_during_dates++;



								}





							}



							$guides_array=array();

							if($check_blackout_during_dates<=0)

							{

								$guides_array[$check_guide_count]["guide_id"]=$guides->guide_id;
								$guides_array[$check_guide_count]["guide_first_name"]=$guides->guide_first_name;
								$guides_array[$check_guide_count]["guide_last_name"]=$guides->guide_last_name;
								$guides_array[$check_guide_count]["guide_tours_cost"]=$guide_cost_vehicle_selected;
								$guides_array[$check_guide_count]["guide_description"]=$guides->guide_description;
								$guides_array[$check_guide_count]["guide_image"]=$guides->guide_image;
								$guides_array[$check_guide_count]["guide_language"]=$guides->guide_language;



							}





						}

					}
					$cost_count++;
				}
			}
		}
if(count($fetch_guides)>0)
		{
			$data=array();
			$fetch_guides=$guides_array;
			$data['error']="0";
			$data['error_code']="";
			$data['guides']=$fetch_guides;
			return json_encode($data);
		}
		else
		{
			$data=array();
			return json_encode($data);
		}


	}

	public function sightseeingBooked(Request $request)
	{
		$fetch_admin=Users::where('users_pid',0)->first();
		$login_customer_id=$request->get('login_customer_id');
		$login_customer_name=$request->get('login_customer_name');
		$login_customer_email=$request->get('login_customer_email');
		$customer_name=$request->get('customer_name');
		$customer_email=$request->get('customer_email');  
		$customer_phone=$request->get('customer_phone');  
		$customer_country=$request->get('customer_country');  
		$customer_address=$request->get('customer_address');  
		$customer_remarks=$request->get('customer_remarks'); 
		$sightseeing_id=$request->get('sightseeing_id');
		$booking_supplier_id=$request->get('booking_supplier_id');
		$fetch_supplier=Suppliers::where('supplier_id',$booking_supplier_id)->first();
		$booking_amount=$request->get('booking_amount');
		$booking_date=$request->get('booking_date');
		$booking_adult_count=$request->get('booking_adult_count');
		$booking_child_count=$request->get('booking_child_count');
		$customer_adult_price=$request->get('customer_adult_price');
		$customer_child_price=$request->get('customer_child_price');
		$booking_markup_per=$request->get('booking_markup_per');
		$vehicle_type_id=$request->get('vehicle_type_id');
  		$vehicle_type_name=$request->get('vehicle_type_name');
		$guide_id=$request->get('guide_id');
		$guide_name=$request->get('guide_name');
		$guide_cost=$request->get('guide_cost');
		$sightseeing_food_cost_w_markup=$request->get('sightseeing_food_cost');
		$sightseeing_hotel_cost_w_markup=$request->get('sightseeing_hotel_cost');
		$get_sightseeing=Sightseeing::where('sightseeing_id',$sightseeing_id)->where('sightseeing_status',1)->first();
		if($get_sightseeing)
		{
			$supplier_adult_price=$get_sightseeing->sightseeing_adult_cost;
			$supplier_child_price=$get_sightseeing->sightseeing_child_cost;
			$sightseeing_food_cost=$get_sightseeing->sightseeing_food_cost;
			$sightseeing_hotel_cost=$get_sightseeing->sightseeing_hotel_cost;

			$other_expenses=array("food_cost"=>$sightseeing_food_cost,
                          "food_cost_with_markup"=>$sightseeing_food_cost_w_markup,
                          "hotel_cost"=>$sightseeing_hotel_cost,
                          "hotel_cost_with_markup"=> $sightseeing_hotel_cost_w_markup);

    		$booking_vehicle_guide_name=array("vehicle_type_id"=>$vehicle_type_id,
                          "vehicle_type_name"=>$vehicle_type_name,
                          "guide_id"=>$guide_id,
                          "guide_name"=> $guide_name,
                        "guide_cost"=> $guide_cost);

    		$booking_currency=$request->get('sightseeing_currency');


			$date=date("Y-m-d");
			$time=date("H:i:s");
			$get_latest_id=BookingCustomer::latest()->value('booking_sep_id');
			$get_latest_id=$get_latest_id+1;

			$insert_booking=new BookingCustomer;
			$insert_booking->booking_sep_id=$get_latest_id;
			$insert_booking->booking_type="sightseeing";
			$insert_booking->booking_type_id=$sightseeing_id;
			$insert_booking->customer_login_id=$login_customer_id;
			$insert_booking->customer_login_name=$login_customer_name;
			$insert_booking->customer_login_email=$login_customer_email;
			$insert_booking->booking_supplier_id=$booking_supplier_id;
			$insert_booking->customer_name=$customer_name;
			$insert_booking->customer_contact=$customer_phone;
			$insert_booking->customer_email=$customer_email;
			$insert_booking->customer_country=$customer_country;
			$insert_booking->customer_address=$customer_address;
			$insert_booking->booking_adult_count=$booking_adult_count;
			$insert_booking->booking_child_count=$booking_child_count;
			$insert_booking->booking_subject_name=serialize($booking_vehicle_guide_name);
			$insert_booking->supplier_adult_price=$supplier_adult_price;
			$insert_booking->supplier_child_price=$supplier_child_price;
			$insert_booking->customer_adult_price=$customer_adult_price;
			$insert_booking->customer_child_price=$customer_child_price;
			$insert_booking->other_expenses=serialize($other_expenses);
			$insert_booking->booking_currency=$booking_currency;
			$insert_booking->booking_amount=$booking_amount;
			$insert_booking->booking_markup_per=$booking_markup_per;
			$insert_booking->booking_remarks=$customer_remarks;
			$insert_booking->booking_selected_date=$booking_date;
			$insert_booking->booking_date=$date;
			$insert_booking->booking_time=$time;

			if($insert_booking->save())
			{
				$booking_id=$get_latest_id;
				$htmldata='<p>Dear '.$customer_name.',</p><p>You have successfully booked sightseeing on traveldoor[dot]ge . Your booking id is '.$booking_id.'.</p>
				';
				$data = array(
					'name' => $customer_name,
					'email' =>$customer_email
				);
				Mail::send('email.htmldata', ['htmldata' => $htmldata], function ($m) use ($data) {
					$m->from('sarbjitphp@netwebtechnologies.com', 'Traveldoor');
					$m->to($data['email'], $data['name'])->subject('BOOKING SUCCESSFUL');
				});

				$htmldata='<p>Dear Admin,</p><p>New sightseeing has been booked with booking id '.$booking_id.' by customer <b>'.$customer_name.'</b></p>';
				$data_admin= array(
					'name' => $fetch_admin->users_fname." ".$fetch_admin->users_lname,
					'email' =>$fetch_admin->users_email
				);
				Mail::send('email.htmldata', ['htmldata' => $htmldata], function ($m) use ($data_admin) {
					$m->from('sarbjitphp@netwebtechnologies.com', 'Traveldoor');
					$m->to($data_admin['email'], $data_admin['name'])->subject('NEW SIGHTSEEING BOOKING ON PORTAL');
				});




				$result_data=array("errorCode"=>"0",
					"errorMessage"=>"",
					"result"=>"success");
				return json_encode($result_data);
			}
			else
			{
					$result_data=array("errorCode"=>"1","errorMessage"=>"Booking Failed",
				"result"=>"fail");
				return json_encode($result_data);
			}

		}

	}

	public function fetchItinerary(Request $request)
	{

	}

	public function filteredfetchItinerary(Request $request)
	{

		$country_id=$request->get('country_id');
		$city_id=$request->get('city_id');
		$date_from=$request->get('date_from');
		$limit=10;
		if($request->has('offset'))
		{
				$offset=$request->get('offset');
		}
		else
		{
				$offset=0;
		}

		  $fetch_itinerary=SavedItinerary::whereRaw("FIND_IN_SET(".$country_id.",itinerary_package_countries)")->whereRaw("FIND_IN_SET(".$city_id.",itinerary_package_cities)")->where('itinerary_bc_status',1)->orderBy(\DB::raw('-`itinerary_show_order`'), 'desc')->orderBy('itinerary_id','desc')->offset($offset*$limit)->take($limit)->get();

		if(count($fetch_itinerary)>0)
		{
			$fetch_itinerary_array=array();
			$count=0;
			foreach($fetch_itinerary as $itinerary)
			{
				$fetch_image=unserialize($itinerary->itinerary_package_services);
				$itnerary_image_id=$fetch_image[0]['sightseeing']['sightseeing_id'];
				$fetch_sightseeing=SightSeeing::where('sightseeing_id',$itnerary_image_id)->first();
				$fetch_sightseeing_image=unserialize($fetch_sightseeing['sightseeing_images']);

				$fetch_itinerary_array[$count]= $itinerary;
				$fetch_itinerary_array[$count]['itinerary_image']= $fetch_sightseeing_image;
				$count++;
			}
			
			$data=array();
			$fetch_itinerary_array['markup']= 10;
			$data=$fetch_itinerary_array;
			return json_encode($data);
		}
		else
		{
			$data=array();
			return json_encode($data);
		}
	}

	public function itineraryDetailView(Request $request)
	{
		$itinerary_id=$request->get('itinerary_id');
		$itinerary_date_from=$request->get('itinerary_date_from');
			$countries=Countries::get();
		  $get_itinerary=SavedItinerary::where('itinerary_id',$itinerary_id)->where('itinerary_status',1)->first();
		  $itinerary_array=array();
		  $itinerary_images=array();
		if($get_itinerary)
		{
			$itinerary_array['itinerary_id']=$get_itinerary->itinerary_id;
			 $itinerary_array['itinerary_name']=$get_itinerary->itinerary_tour_name;
			  $itinerary_array['itinerary_tour_description']=$get_itinerary->itinerary_tour_description;
			   $itinerary_array['itinerary_tour_days']=$get_itinerary->itinerary_tour_days;


			   $itinerary_package_countries=explode(",",$get_itinerary->itinerary_package_countries);
			   $itinerary_package_cities=explode(",",$get_itinerary->itinerary_package_cities);
			   $itinerary_package_title=unserialize($get_itinerary->itinerary_package_title);
			   $itinerary_package_description=unserialize($get_itinerary->itinerary_package_description);
			   $itinerary_package_services=unserialize($get_itinerary->itinerary_package_services);

			   for($days_count=0;$days_count<$get_itinerary->itinerary_tour_days;$days_count++)
			   {
			   	$itinerary_array['itinerary_details_day_wise'][$days_count]['day_number']=($days_count+1);
			   	$itinerary_array['itinerary_details_day_wise'][$days_count]['day_title']=$itinerary_package_title[$days_count];
			   	$itinerary_array['itinerary_details_day_wise'][$days_count]['day_desc']=$itinerary_package_description[$days_count];
			   	$itinerary_array['itinerary_details_day_wise'][$days_count]['country_id']=$itinerary_package_countries[$days_count];

			   	$day_country="";
			   	foreach($countries as $country)
			   	{
			   		if($country->country_id==$itinerary_package_countries[$days_count])
			   		{
			   			$day_country=$country->country_name;
			   		}


			   	} 

			   	$itinerary_array['itinerary_details_day_wise'][$days_count]['country_name']=$day_country;

			   	$itinerary_array['itinerary_details_day_wise'][$days_count]['city_id']=$itinerary_package_cities[$days_count];

			   	$fetch_city_name=ServiceManagement::searchCities($itinerary_package_cities[$days_count],$itinerary_package_countries[$days_count]);

			   	$itinerary_array['itinerary_details_day_wise'][$days_count]['city_name']=$fetch_city_name['name'];

			   	$days_date=date('Y-m-d',strtotime("+".($days_count)." days",strtotime($itinerary_date_from)));

			   	$itinerary_array['itinerary_details_day_wise'][$days_count]['date']=$days_date;
			   	if($itinerary_package_services[$days_count]['hotel']['hotel_no_of_days']!="0")
			   	{
			   		$fetch_hotel=ServiceManagement::searchHotel($itinerary_package_services[$days_count]['hotel']['hotel_id']);
			   		$itinerary_array['itinerary_details_day_wise'][$days_count]['hotel']['hotel_details']=$fetch_hotel;
			   		$itinerary_array['itinerary_details_day_wise'][$days_count]['hotel']['hotel_itinerary_details']=$itinerary_package_services[$days_count]['hotel'];

			   		$checkin_date=date('Y-m-d',strtotime("+".($days_count)." days",strtotime($itinerary_date_from))); 
			   		$checkout_date=date('Y-m-d',strtotime("+".($itinerary_package_services[$days_count]['hotel']['hotel_no_of_days'])." days",strtotime($checkin_date)));

			   		$itinerary_array['itinerary_details_day_wise'][$days_count]['hotel']['hotel_checkin']=$checkin_date;
			   		$itinerary_array['itinerary_details_day_wise'][$days_count]['hotel']['hotel_checkout']=$checkout_date;
			   		$hotel_images=unserialize($fetch_hotel['hotel_images']);
			   		if(!empty($hotel_images));
			   		{
			   		 $itinerary_images['hotel'][]=$hotel_images[0];
			   		}

			   	}

			   	$fetch_sightseeing=ServiceManagement::searchSightseeingTourName($itinerary_package_services[$days_count]['sightseeing']['sightseeing_id']);

			   	$itinerary_array['itinerary_details_day_wise'][$days_count]['sightseeing']['sightseeing_details']=$fetch_sightseeing;
			   	$itinerary_array['itinerary_details_day_wise'][$days_count]['sightseeing']['sightseeing_itinerary_details']=$itinerary_package_services[$days_count]['sightseeing'];

			   	$get_from_city=ServiceManagement::searchCities($fetch_sightseeing['sightseeing_city_from'],$itinerary_package_countries[$days_count]);
			   	$itinerary_array['itinerary_details_day_wise'][$days_count]['sightseeing']['from_city']=$get_from_city['name']."-";


			   	$between_city="";
			   	if($fetch_sightseeing['sightseeing_city_between']!=null && $fetch_sightseeing['sightseeing_city_between']!="")
			   	{
			   		$all_between_cities=explode(",",$fetch_sightseeing['sightseeing_city_between']);
			   		for($cities=0;$cities< count($all_between_cities);$cities++)
			   		{
			   			$fetch_city=ServiceManagement::searchCities($all_between_cities[$cities],$itinerary_package_countries[$days_count]);
			   			$between_city.=$fetch_city['name']."-";
			   		}
			   	}
			   	$itinerary_array['itinerary_details_day_wise'][$days_count]['sightseeing']['between_city']=$between_city;


			   	$get_from_city=ServiceManagement::searchCities($fetch_sightseeing['sightseeing_city_to'],$itinerary_package_countries[$days_count]);
			   	$itinerary_array['itinerary_details_day_wise'][$days_count]['sightseeing']['to_city']=$get_from_city['name'];

			   	$sightseeing_images=unserialize($fetch_sightseeing['sightseeing_images']);
			   		if(!empty($sightseeing_images));
			   		{
			   		 $itinerary_images['sightseeing'][]=$sightseeing_images[0];
			   		}


			   	  $activity_count=count($itinerary_package_services[$days_count]['activity']['activity_id']);

			   	    for($activity_counter=0;$activity_counter < $activity_count;$activity_counter++)
			   	    {
			   	    	 $fetch_activity=ServiceManagement::searchActivity($itinerary_package_services[$days_count]['activity']['activity_id'][$activity_counter]);

			   	    	  	$itinerary_array['itinerary_details_day_wise'][$days_count]['activity'][$activity_counter]['activity_details']=$fetch_activity;
			   				$itinerary_array['itinerary_details_day_wise'][$days_count]['activity'][$activity_counter]['activity_itinerary_details']=$itinerary_package_services[$days_count]['activity'];

			   				$activity_images=unserialize($fetch_activity['activity_images']);
			   		if(!empty($activity_images));
			   		{
			   		 $itinerary_images['activity'][]=$activity_images[0];
			   		}
			   	    }

			   }

			    $itinerary_array['itinerary_details_day_wise'][$days_count]['day_number']=($days_count+1);
			   	$itinerary_array['itinerary_details_day_wise'][$days_count]['day_title']=$itinerary_package_title[$days_count];
			   	$itinerary_array['itinerary_details_day_wise'][$days_count]['day_desc']=$itinerary_package_description[$days_count];
			   	$days_date=date('Y-m-d',strtotime("+".($days_count)." days",strtotime($itinerary_date_from)));
			   	$itinerary_array['itinerary_details_day_wise'][$days_count]['date']=$days_date;

			   	 $itinerary_array['itinerary_exclusions']=$get_itinerary->itinerary_exclusions;
			   	  $itinerary_array['itinerary_terms_and_conditions']=$get_itinerary->itinerary_terms_and_conditions;
			   	   $itinerary_array['itinerary_cancellation']=$get_itinerary->itinerary_cancellation;
			   	    $itinerary_array['total_cost']=$get_itinerary->itinerary_total_cost;
 					$itinerary_array['itinerary_images']= $itinerary_images;


			$itinerary_data=array("errorCode"=>"0",
				"errorMessage"=>"",
				"itinerary"=>$itinerary_array,
				"markup"=>10);
			return json_encode($itinerary_data);
		}
		else
		{
			$itinerary_data=array("errorCode"=>"1","errorMessage"=>"No data Found");
			return json_encode($itinerary_data);
		}
	}

	public function itinerary_get_hotels(Request $request)
	{
	
		$country_id=$request->get('country_id');

 		 $city_id=$request->get('city_id');
		$fetch_hotels=Hotels::where('hotel_country',$country_id)->where('hotel_city',$city_id)->where('hotel_status',1)->orderBy('hotel_id','desc')->get();

		$get_hotels_data=array("errorCode"=>"0",
				"errorMessage"=>"",
				"hotels"=>$fetch_hotels);
			return json_encode($get_hotels_data);

	}

	public function itinerary_get_activities(Request $request)
	{

		$country_id=$request->get('country_id');

		$city_id=$request->get('city_id');

		$fetch_activites=Activities::where('activity_country',$country_id)->where('activity_city',$city_id);
		$fetch_activites=$fetch_activites->where('activity_status',1)->orderBy('activity_id','desc')->get();
	$fetch_activity_array=array();
	$count=0;
		foreach($fetch_activites as $activity)
		{
			$address="";
			$fetch_activity_array[$count]['activity_id']=$activity->activity_id;
			$fetch_activity_array[$count]['activity_name']=$activity->activity_name;
			$fetch_activity_array[$count]['adult_price']=$activity->adult_price;
			$fetch_activity_array[$count]['child_price']=$activity->child_price;
			$fetch_activity_array[$count]['activity_location']=$activity->activity_location;
			$fetch_activity_array[$count]['activity_images']=$activity->activity_images;

			$count++;
		}
		$get_activity_data=array("errorCode"=>"0",
				"errorMessage"=>"",
				"activity"=>$fetch_activity_array);
			return json_encode($get_activity_data);
	}

	public function itinerary_get_sightseeing(Request $request)
	{

		$country_id=$request->get('country_id');

		$city_id=$request->get('city_id');

		 $fetch_sightseeing=SightSeeing::where('sightseeing_country',$country_id)->where(function ($query) use ($city_id){
    $query->where('sightseeing_city_from',$city_id)->orWhere('sightseeing_city_to',$city_id); });
$fetch_sightseeing=$fetch_sightseeing->where('sightseeing_status',1)->orderBy('sightseeing_id','desc')->get();

	$fetch_sightseeing_array=array();
$count=0;
foreach($fetch_sightseeing as $sightseeing)
		{
			 $address="";
			 $fetch_sightseeing_array[$count]['sightseeing_id']=$sightseeing->sightseeing_id;
			 	$fetch_sightseeing_array[$count]['sightseeing_tour_name']=$sightseeing->sightseeing_tour_name;
	$fetch_sightseeing_array[$count]['sightseeing_adult_cost']=$sightseeing->sightseeing_adult_cost;
	$fetch_sightseeing_array[$count]['sightseeing_food_cost']=$sightseeing->sightseeing_food_cost;
	$fetch_sightseeing_array[$count]['sightseeing_hotel_cost']=$sightseeing->sightseeing_hotel_cost;
	$fetch_sightseeing_array[$count]['sightseeing_images']=$sightseeing->sightseeing_images;
	$fetch_sightseeing_array[$count]['sightseeing_distance_covered']=$sightseeing->sightseeing_distance_covered;

	 $get_from_city=ServiceManagement::searchCities($sightseeing->sightseeing_city_from,$sightseeing->sightseeing_country);
			 $address.=$get_from_city['name']."-";
			  if($sightseeing->sightseeing_city_between!=null && $sightseeing->sightseeing_city_between!="")
			 {
			 	$all_between_cities=explode(",",$sightseeing->sightseeing_city_between);
			 	for($cities=0;$cities< count($all_between_cities);$cities++)
			 	{
			 		$fetch_city=ServiceManagement::searchCities($all_between_cities[$cities],$sightseeing->sightseeing_country);
			 		$address.=$fetch_city['name']."-";
			 	}
			 }


			 $get_from_city=ServiceManagement::searchCities($sightseeing->sightseeing_city_to,$sightseeing->sightseeing_country);
			 $address.=$get_from_city['name'];

	$fetch_sightseeing_array[$count]['sightseeing_map_location']=$address;


	$count++;
		}

		$currency="GEL";


		$get_sightseeing_data=array("errorCode"=>"0",
				"errorMessage"=>"",
				"sightseeing"=>$fetch_sightseeing_array,
				"currency"=>$currency);
			return json_encode($get_sightseeing_data);
	}

	public function itineraryBooked(Request $request)
	{
		
		$fetch_admin=Users::where('users_pid',0)->first();
		$login_customer_id=$request->get('login_customer_id');
		$login_customer_name=$request->get('login_customer_name');
		$login_customer_email=$request->get('login_customer_email');
		$customer_name=$request->get('customer_name');
		$customer_email=$request->get('customer_email');  
		$customer_phone=$request->get('customer_phone');  
		$customer_country=$request->get('customer_country');  
		$customer_address=$request->get('customer_address');  
		$customer_remarks=$request->get('customer_remarks'); 
		$itinerary_id=$request->get('booking_whole_data')['itinerary_id'];
		$booking_whole_data=serialize($request->all());
		$booking_details=$request->get('booking_whole_data')['booking_details_array'];
		
		$booking_amount=$request->get('booking_whole_data')['booking_amount'];
		$booking_amount_without_markup=$request->get('booking_whole_data')['booking_amount_without_markup'];
		$booking_from_date=$request->get('booking_whole_data')['booking_from_date'];
		$booking_to_date=$request->get('booking_whole_data')['booking_to_date'];
		$booking_adult_count=$request->get('booking_whole_data')['booking_adult_count'];
		$booking_rooms_count=$request->get('booking_whole_data')['booking_rooms_count'];
		$booking_markup_per=$request->get('booking_whole_data')['booking_markup_per'];
		$get_itinerary=SavedItinerary::where('itinerary_id',$itinerary_id)->where('itinerary_status',1)->first();
		if($get_itinerary)
		{

			$get_itinerary_id=BookingCustomer::latest()->value('booking_sep_id');

			$get_itinerary_id=$get_itinerary_id+1;

			$booking_currency=$request->get('booking_whole_data')['itinerary_currency'];

			$date=date("Y-m-d");

			$time=date("H:i:s");

			$insert_booking=new BookingCustomer;

			$insert_booking->booking_type="itinerary";

			$insert_booking->booking_sep_id=$get_itinerary_id;

			$insert_booking->booking_type_id=$itinerary_id;

			$insert_booking->customer_login_id=$login_customer_id;

			$insert_booking->customer_login_name=$login_customer_name;

			$insert_booking->customer_login_email=$login_customer_email;

			$insert_booking->customer_name=$customer_name;

			$insert_booking->customer_contact=$customer_phone;

			$insert_booking->customer_email=$customer_email;

			$insert_booking->customer_country=$customer_country;

			$insert_booking->customer_address=$customer_address;

			$insert_booking->booking_remarks=$customer_remarks;

			$insert_booking->booking_adult_count=$booking_adult_count;

			$insert_booking->booking_rooms_count=$booking_rooms_count;

			$insert_booking->booking_currency=$booking_currency;

			$insert_booking->booking_amount=$booking_amount;

			$insert_booking->booking_amount_without_markup=$booking_amount_without_markup;

			$insert_booking->booking_markup_per=$booking_markup_per;

			$insert_booking->booking_selected_date=$booking_from_date;

			$insert_booking->booking_selected_to_date=$booking_to_date;

			$insert_booking->booking_whole_data=$booking_whole_data;

			$insert_booking->booking_date=$date;

			$insert_booking->booking_time=$time;

			if($insert_booking->save())

			{

				for($booking_count=0;$booking_count < count($booking_details);$booking_count++)
				{

					
					$date=date("Y-m-d");

					$time=date("H:i:s");

					if(!empty($booking_details[$booking_count]['hotel']))
					{

						$get_hotels=Hotels::where('hotel_id',$booking_details[$booking_count]['hotel']['hotel_id'])->first();

						$insert_booking=new BookingCustomer;
						$insert_booking->booking_sep_id=$get_itinerary_id;
						$insert_booking->booking_type="hotel";
						$insert_booking->booking_type_id=$booking_details[$booking_count]['hotel']['hotel_id'];
						$insert_booking->customer_login_id=$login_customer_id;
						$insert_booking->customer_login_name=$login_customer_name;
						$insert_booking->customer_login_email=$login_customer_email;
						$insert_booking->booking_supplier_id=$get_hotels['supplier_id'];
						$insert_booking->customer_name=$customer_name;
						$insert_booking->customer_contact=$customer_phone;
						$insert_booking->customer_email=$customer_email;
						$insert_booking->customer_country=$customer_country;
						$insert_booking->customer_address=$customer_address;
						$insert_booking->booking_adult_count=$booking_details[$booking_count]['hotel']['room_quantity'];
						$insert_booking->booking_subject_name=$booking_details[$booking_count]['hotel']['room_name'];
						$insert_booking->booking_subject_days=$booking_details[$booking_count]['hotel']['no_of_days'];
						$insert_booking->booking_currency=$booking_currency;
						$insert_booking->booking_amount=round($booking_details[$booking_count]['hotel']['hotel_cost']*$booking_details[$booking_count]['hotel']['room_quantity']);
						$insert_booking->supplier_adult_price=round($booking_details[$booking_count]['hotel']['hotel_cost']);
						$insert_booking->customer_adult_price=round($booking_details[$booking_count]['hotel']['hotel_cost']);
						$insert_booking->booking_remarks=$customer_remarks;
						$insert_booking->booking_selected_date=$booking_details[$booking_count]['hotel']['hotel_checkin'];
						$insert_booking->booking_selected_to_date=$booking_details[$booking_count]['hotel']['hotel_checkout'];
						$insert_booking->booking_date=$date;
						$insert_booking->booking_time=$time;
						$insert_booking->save();

					}


					if(!empty($booking_details[$booking_count]['activity']))
					{

						for($activity_count=0;$activity_count <count($booking_details[$booking_count]['activity']);$activity_count++)
						{
							$get_activities=Activities::where('activity_id',$booking_details[$booking_count]['activity'][$activity_count]['activity_id'])->first();


							$insert_booking=new BookingCustomer;
							$insert_booking->booking_sep_id=$get_itinerary_id;
							$insert_booking->booking_type="activity";
							$insert_booking->booking_type_id=$booking_details[$booking_count]['activity'][$activity_count]['activity_id'];
							$insert_booking->customer_login_id=$login_customer_id;
							$insert_booking->customer_login_name=$login_customer_name;
							$insert_booking->customer_login_email=$login_customer_email;
							$insert_booking->booking_supplier_id=$get_activities['supplier_id'];
							$insert_booking->customer_name=$customer_name;
							$insert_booking->customer_contact=$customer_phone;
							$insert_booking->customer_email=$customer_email;
							$insert_booking->customer_country=$customer_country;
							$insert_booking->customer_address=$customer_address;
							$insert_booking->booking_adult_count=$booking_adult_count;
							$insert_booking->supplier_adult_price=$booking_details[$booking_count]['activity'][$activity_count]['activity_cost'];
							$insert_booking->customer_adult_price=$booking_details[$booking_count]['activity'][$activity_count]['activity_cost'];
							$insert_booking->booking_currency=$get_activities['activity_currency'];
								$insert_booking->booking_amount=round($booking_details[$booking_count]['activity'][$activity_count]['activity_cost']*$booking_adult_count);
							$insert_booking->booking_remarks=$customer_remarks;
							$insert_booking->booking_selected_date=$booking_details[$booking_count]['dates'];
							$insert_booking->booking_date=$date;
							$insert_booking->booking_time=$time;
							$insert_booking->save();

						}



					}

					if(!empty($booking_details[$booking_count]['sightseeing']))
					{
						$get_sightseeing=SightSeeing::where('sightseeing_id',$booking_details[$booking_count]['sightseeing']['sightseeing_id'])->first();

						$supplier_adult_price=$get_sightseeing->sightseeing_adult_cost;

						$supplier_child_price=$get_sightseeing->sightseeing_child_cost;

						$sightseeing_food_cost=$get_sightseeing->sightseeing_food_cost;

						$sightseeing_hotel_cost=$get_sightseeing->sightseeing_hotel_cost;


						$other_expenses=array("food_cost"=>$sightseeing_food_cost,
							"hotel_cost"=>$sightseeing_hotel_cost);

						$insert_booking=new BookingCustomer;
						$insert_booking->booking_sep_id=$get_itinerary_id;
						$insert_booking->booking_type="sightseeing";
						$insert_booking->booking_type_id=$booking_details[$booking_count]['sightseeing']['sightseeing_id'];
						$insert_booking->customer_login_id=$login_customer_id;
						$insert_booking->customer_login_name=$login_customer_name;
						$insert_booking->customer_login_email=$login_customer_email;
						$insert_booking->customer_name=$customer_name;
						$insert_booking->customer_contact=$customer_phone;
						$insert_booking->customer_email=$customer_email;
						$insert_booking->customer_country=$customer_country;
						$insert_booking->customer_address=$customer_address;
						$insert_booking->booking_adult_count=$booking_adult_count;
						$insert_booking->supplier_adult_price=$supplier_adult_price;
						$insert_booking->customer_adult_price=$supplier_adult_price;
						$insert_booking->other_expenses=serialize($other_expenses);
						$insert_booking->booking_currency=$booking_currency;
						$insert_booking->booking_amount=round($booking_details[$booking_count]['sightseeing']['sightseeing_cost']*$booking_adult_count);
						$insert_booking->booking_remarks=$customer_remarks;
						$insert_booking->booking_selected_date=$booking_details[$booking_count]['dates'];
						$insert_booking->booking_date=$date;
						$insert_booking->booking_time=$time;
						$insert_booking->save();





					}


				}


				$result_data=array("errorCode"=>"0",
					"errorMessage"=>"",
					"result"=>"success");
				return json_encode($result_data);
			}
			else
			{
				$result_data=array("errorCode"=>"1","errorMessage"=>"Booking Failed",
				"result"=>"fail");
				return json_encode($result_data);
			}
		}
		else
		{
					$result_data=array("errorCode"=>"1","errorMessage"=>"Booking Failed",
				"result"=>"fail");
				return json_encode($result_data);
		}
	}

}
