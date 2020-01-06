<?php
namespace App\Http\Controllers;
use App\Users;
use App\Countries;
use App\States;
use App\Cities;
use App\Currency;
use App\Suppliers;
use App\Activities;
use App\Activities_log;
use App\Transport;
use App\Transport_log;
use App\Hotels;
use App\Hotels_log;
use App\HotelMeal;
use App\Guides;
use App\Guides_log;
use App\SightSeeing;
use App\SightSeeing_log;
use App\Languages;
use App\FuelType;
use App\VehicleType;
use App\UserRights;
use App\Agents;
use App\SavedItinerary;
use Session;
use App\Bookings;
use App\BookingCustomer;
use App\Amenities;
use App\SubAmenities;
use PDF;
use Illuminate\Http\Request;
class ServiceManagement extends Controller
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
  public function service_management(Request $request)
  {
    if(session()->has('travel_users_id'))
    {
      $countries=Countries::where('country_status',1)->get();
      $cities=Cities::get();
      $emp_id=session()->get('travel_users_id');
      $rights=$this->rights('service-management');

      $get_suppliers=Suppliers::get();
      if(strpos($rights['admin_which'],'add')!==false || strpos($rights['admin_which'],'view')!==false)
      {
        $get_activites=Activities::orderBy(\DB::raw('-`activity_show_order`'), 'desc')->orderBy('activity_id','asc')->get();
        $get_transport=Transport::get();
        $get_hotels=Hotels::orderBy(\DB::raw('-`hotel_show_order`'), 'desc')->orderBy('hotel_id','asc')->get();
        $get_guides=Guides::orderBy(\DB::raw('-`guide_show_order`'), 'desc')->orderBy('guide_id','asc')->get();
        $get_sightseeing=SightSeeing::orderBy(\DB::raw('-`sightseeing_show_order`'), 'desc')->orderBy('sightseeing_id','asc')->get();
      }
      else
      {
        $get_activites=Activities::where('activity_created_by',$emp_id)->where('activity_role','!=','Supplier')->orderBy(\DB::raw('-`activity_show_order`'), 'desc')->orderBy('activity_id','asc')->get();
        $get_transport=Transport::where('transfer_created_by',$emp_id)->where('transfer_create_role','!=','Supplier')->get();
        $get_hotels=Hotels::where('hotel_created_by',$emp_id)->where('hotel_create_role','!=','Supplier')->orderBy(\DB::raw('-`hotel_show_order`'), 'desc')->orderBy('hotel_id','asc')->get();
        $get_guides=Guides::where('guide_created_by',$emp_id)->where('guide_role',"!=","Supplier")->orderBy(\DB::raw('-`guide_show_order`'), 'desc')->orderBy('guide_id','asc')->get();
        $get_sightseeing=SightSeeing::where('sightseeing_created_by',$emp_id)->orderBy(\DB::raw('-`sightseeing_show_order`'), 'desc')->orderBy('sightseeing_id','asc')->get();
      }
      return view('mains.service-management')->with(compact('countries','cities','get_activites','get_suppliers','get_hotels','get_transport','get_guides','get_sightseeing','rights'));
    }
    else
    {
      return redirect()->route('index');
    }
  }
  public static function searchCities($cityid,$countryid)
  {
    $city_id=$cityid;
    $country_id=$countryid;
    $fetch_cities=Cities::join("states","states.id","=","cities.state_id")->where("states.country_id", $country_id)->where('cities.id',$city_id)->select("cities.*")->orderBy('cities.name','asc')->first();
    return $fetch_cities;
  }
  public static function searchSightseeingTour(Request $request)
  {
    $city_id=$request->get('city_id');
    $country_id=$request->get('country_id');
    $fetch_vehicle_type=VehicleType::where('vehicle_type_status',1)->get();
    $fetch_sightseeing=SightSeeing::where('sightseeing_country',$country_id)->where(function($query) use($city_id){
      $query->where('sightseeing_city_from',$city_id)->orWhereRaw('FIND_IN_SET(?,sightseeing_city_between)', [$city_id])->orWhere('sightseeing_city_to',$city_id);
    })->get();
    $html="<div class='col-md-12'>
    <div class='row'>
    <div class='col-md-4'>
    <p >SightSeeing Tours</p>
    </div>
    <div class='col-md-5'>
    <div class='row'>
    <div class='col-md-8'>
    <p>Vehcile Type</p>
    </div>
    <div class='col-md-4'>
    <p>Guide Cost</p>
    </div>
    </div>


    </div>
    </div>";
    foreach($fetch_sightseeing as $sightseeing)
    {
      $html.="<div class='row'>
      <div class='col-md-4'>
      <input type='hidden' name='tour_name[]' value='".$sightseeing->sightseeing_id."'>
      <input type='text' class='form-control' value='".$sightseeing->sightseeing_tour_name."' readonly='readonly'>
      </div>
      <div class='col-md-5'>
      ";
      foreach($fetch_vehicle_type as $vehcile_type)
      {
        $html.=" <div class='row'>
        <div class='col-md-8'><input type='hidden' name='tour_vehiclename[".($sightseeing->sightseeing_id-1)."][]' value='".$vehcile_type->vehicle_type_id."'>
        <input type='text' class='form-control' value='".$vehcile_type->vehicle_type_name."' readonly='readonly'>  </div>  <div class='col-md-4'>
        <input type='text' class='form-control' name='tour_guide_cost[".($sightseeing->sightseeing_id-1)."][]' value='0' onkeypress='javascript:return validateNumber(event)'> </div>
        </div>";
      }
      $html.="
      <br></div>
      </div>
      ";
    }
    if(count($fetch_sightseeing)<=0)
    {
      $html.="<div class='row'><p class='text-center'><b>No Tours Available</b></p></div>";
    }
    $html.="</div>";
    echo $html;
  }
  public static function searchSightseeingTourName($sightseeing_id)
  {
    $fetch_sightseeing=SightSeeing::where('sightseeing_id',$sightseeing_id)->first();
    return $fetch_sightseeing;
  }
  public static function searchFuelCost(Request $request)
  {
    $fuel_type_id=$request->get('fuel_type_id');
    $fetch_fuel_type=FuelType::where("fuel_type_id", $fuel_type_id)->first();
    $fuel_cost=$fetch_fuel_type->fuel_type_cost;
    return $fuel_cost;
  }
  public static function searchActivity($activity_id)
  {
    $fetch_activity=Activities::where('activity_id',$activity_id)->first();
    return $fetch_activity;
  }
  public static function searchHotel($hotel_id)
  {
    $fetch_hotel=Hotels::where('hotel_id',$hotel_id)->first();
    return $fetch_hotel;
  }
  public static function searchGuide($guide_id)
  {
    $fetch_guide=Guides::where('guide_id',$guide_id)->first();
    return $fetch_guide;
  }
  public static function searchItinerary($itinerary_id)
  {
    $fetch_itinerary=SavedItinerary::where('itinerary_id',$itinerary_id)->first();
    return $fetch_itinerary;
  }
  public static function searchSupplier($supplier_id)
  {
    $fetch_supplier=Suppliers::where('supplier_id',$supplier_id)->first();
    return $fetch_supplier;
  }
  public static function searchAgent($agent_id)
  {
    $fetch_agent=Agents::where('agent_id',$agent_id)->first();
    return $fetch_agent;
  }
  public function create_activity(Request $request)
  {
    if(session()->has('travel_users_id'))
    {
      $rights=$this->rights('service-management');
      $countries=Countries::where('country_status',1)->get();
      $currency=Currency::get();
      $suppliers=Suppliers::where('supplier_status',1)->get();
      return view('mains.create-activity')->with(compact('countries','currency','suppliers','rights'));
    }
    else
    {
      return redirect()->route('index');
    }
  }
  public function search_supplier_country(Request $request)
  {
    $supplier_id=$request->get('supplier_id');
    $countries=Countries::where('country_status',1)->get();
    $get_supplier=Suppliers::where('supplier_status',1)->where('supplier_id',$supplier_id)->first();
    if($get_supplier)
    {
      $countrydata="<option value='0' hidden>SELECT COUNTRY</option>";
      $supplier_countries=$get_supplier->supplier_opr_countries;
      $supplier_countries_array=explode(',',$supplier_countries);
      for($count=0;$count<count($supplier_countries_array);$count++)
      {
        foreach($countries as $country)
        {
          if($country->country_id==$supplier_countries_array[$count])
          {
            $countrydata.="<option value='".$country->country_id."'>".$country->country_name."</option>";
          }
        }
      }
      echo $countrydata;
    }
    else
    {
      echo "fail";
    }
  }
  public function search_country_cities(Request $request)
  {
    $country_id=$request->get('country_id');
    $get_countries=Countries::where('country_id',$country_id)->first();
    if($get_countries)
    {
      $citydata="<option value='0' hidden>SELECT CITY</option>";
      $fetch_cities=Cities::join("states","states.id","=","cities.state_id")->where("states.country_id",$country_id)->select("cities.*")->orderBy('cities.name','asc')->get();
      foreach($fetch_cities as $cities)
      {
        $citydata.="<option value='".$cities->id."'>".$cities->name."</option>";
      }
      echo $citydata;
    }
    else
    {
    }
  }
  public static function search_country_cities_array($country_id,$city_id)
  {
    $country_id=$country_id;
    $get_countries=Countries::where('country_id',$country_id)->first();
    if($get_countries)
    {
      $citydata="<option value='0' hidden>SELECT CITY</option>";
      $fetch_cities=Cities::join("states","states.id","=","cities.state_id")->where("states.country_id",$country_id)->select("cities.*")->orderBy('cities.name','asc')->get();
      return $fetch_cities;
    }
    else
    {
      $fetch_cities=array();
      return $fetch_cities;
    }
  }
  public function fetch_services(Request $request)
  {
    $supplier_id=$request->get('supplier');
    $country_id=$request->get('country');
    $city_id=$request->get('city');
    $services_type=$request->get('services_type');
    $service_data="<option value='0' selected >SELECT SERVICE</option>";
    if($services_type=="activity")
    {
      $fetch_activity=Activities::where('activity_country',$country_id)->where('activity_city',$city_id)->where("supplier_id",$supplier_id)->where("activity_status",1)->get();
      foreach($fetch_activity as $activites)
      {
        $service_data.="<option value='$activites->activity_id'>".$activites->activity_name."</option>";
      }
    }
    else if($services_type=="hotel")
    {
      $fetch_hotels=Hotels::where('hotel_country',$country_id)->where('hotel_city',$city_id)->where("supplier_id",$supplier_id)->where("hotel_status",1)->get();
      foreach($fetch_hotels as $hotels)
      {
        $service_data.="<option value='$hotels->hotel_id'>".$hotels->hotel_name."</option>";
      }
    }
    else if($services_type=="transportation")
    {
      $fetch_transportation=Transport::where('transfer_country',$country_id)->where('transfer_city',$city_id)->where("supplier_id",$supplier_id)->where("transfer_status",1)->get();
      foreach($fetch_transportation as $transport)
      {
        $service_data.="<option value='$transport->transport_id'>".$transport->transfer_name."</option>";
      }
    }
    echo $service_data;
  }
  public static function fetch_services_array($supplier,$country,$city,$services_type)
  {
    $supplier_id=$supplier;
    $country_id=$country;
    $city_id=$city;
    $services_type=$services_type;
    $service_data="<option value='0' selected >SELECT SERVICE</option>";
    if($services_type=="activity")
    {
      $fetch_activity=Activities::where('activity_country',$country_id)->where('activity_city',$city_id)->where("supplier_id",$supplier_id)->where("activity_status",1)->get();
      return $fetch_activity;
    }
    else if($services_type=="hotel")
    {
      $fetch_hotels=Hotels::where('hotel_country',$country_id)->where('hotel_city',$city_id)->where("supplier_id",$supplier_id)->where("hotel_status",1)->get();
      return $fetch_hotels;
    }
    else if($services_type=="transportation")
    {
      $fetch_transportation=Transport::where('transfer_country',$country_id)->where('transfer_city',$city_id)->where("supplier_id",$supplier_id)->where("transfer_status",1)->get();
      return $fetch_transportation;
    }
  }
  public function insert_activity(Request $request)
  {
    $activity_role=$request->get('activity_role');
    if($activity_role=='supplier')
    {
      $user_id=$request->get('supplier_name');
      $user_role='Supplier';
    }
    else
    {
      if(session()->get('travel_users_role')=="Admin")
      {
        $user_role='Admin';
      }
      else
      {
        $user_role='Sub-User';
      }
      $user_id=session()->has('travel_users_id');
    }
    $activity_name=$request->get('activity_name');
    $supplier_id=$request->get('supplier_name');
    $activity_location=$request->get('activity_location');
    $activity_country=$request->get('activity_country');
    $activity_city=$request->get('activity_city');
    $operation_period_fromdate=$request->get('period_operation_from');
    $operation_period_todate=$request->get('period_operation_to');
    $validity_fromdate=$request->get('validity_operation_from');
    $validity_todate=$request->get('validity_operation_to');
    $validity_fromtime=$request->get('activity_time_from');
    $validity_totime=$request->get('activity_time_to');
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
    $activity_currency=$request->get('activity_currency');
    $adult_price=$request->get('activity_adult_cost');
    $child_price=$request->get('activity_child_cost');
    $for_all_ages=$request->get('for_all_ages');
    $child_allowed=$request->get('child_allowed');
    $child_age=$request->get('child_age');
    $adult_allowed=$request->get('adult_allowed');
    $adult_age=$request->get('adult_age');
    $child_adult_age_details=array();
    $child_adult_age_details[0][]="child";
    $child_adult_age_details[0][]=$child_allowed;
    $child_adult_age_details[0][]=$child_age;
    $child_adult_age_details[1][]="adult";
    $child_adult_age_details[1][]=$adult_allowed;
    $child_adult_age_details[1][]=$adult_age;

    $child_adult_age_details=serialize($child_adult_age_details);
    $activity_blackout_dates=$request->get('blackout_days');
    $activity_nationality=$request->get('activity_nationality');
    $activity_markup=$request->get('activity_markup');
    $activity_amount=$request->get('activity_amount');
    $nationality_markup_details=array();
    for($nation_count=0;$nation_count<count($activity_nationality);$nation_count++)
    {
      $nationality_markup_details[$nation_count]['activity_nationality']=$activity_nationality[$nation_count];
      $nationality_markup_details[$nation_count]['activity_markup']=$activity_markup[$nation_count];
      $nationality_markup_details[$nation_count]['activity_amount']=$activity_amount[$nation_count];
    }
    $nationality_markup_details=serialize($nationality_markup_details);
    $activity_transport_currency=$request->get('activity_transport_currency');
    $activity_transport_desc=$request->get('activity_transport_desc');
    $activity_transport_cost=$request->get('activity_transport_cost');
    $activity_transport_pricing=array();
    for($transport_count=0;$transport_count<count($activity_transport_currency);$transport_count++)
    {
      $activity_transport_pricing[$transport_count]['transport_currency']=$activity_transport_currency[$transport_count];
      $activity_transport_pricing[$transport_count]['transport_desc']=$activity_transport_desc[$transport_count];
      $activity_transport_pricing[$transport_count]['transport_cost']=$activity_transport_cost[$transport_count];
    }
    $activity_transport_pricing=serialize($activity_transport_pricing);
    $activity_inclusions=$request->get('activity_inclusions');
    $activity_exclusions=$request->get('activity_exclusions');
    $activity_cancel_policy=$request->get('activity_cancellation');
    $activity_terms_conditions=$request->get('activity_terms_conditions');
    $activity_created_by=$user_id;
    $activity_images=array();
//multifile uploading
    if($request->hasFile('upload_ativity_images'))
    {
      foreach($request->file('upload_ativity_images') as $file)
      {
        $extension=strtolower($file->getClientOriginalExtension());
        if($extension=="png" || $extension=="jpg" || $extension=="jpeg" || $extension=="pdf")
        {
          $image_name=$file->getClientOriginalName();
          $image_activity = "activity-".time()."-".$image_name;
// request()->agent_logo->storeAs(public_path('consultant-images'), $imageName);
          $dir1 = 'assets/uploads/activities_images/';
          $file->move($dir1, $image_activity);
          $activity_images[]=$image_activity;
        }
      }
    }
    $activity_images=serialize($activity_images);
    $insert_activity=new Activities;
    $insert_activity->activity_name=$activity_name;
    $insert_activity->supplier_id=$supplier_id;
    $insert_activity->activity_location=$activity_location;
    $insert_activity->activity_country=$activity_country;
    $insert_activity->activity_city=$activity_city;
    $insert_activity->operation_period_fromdate=$operation_period_fromdate;
    $insert_activity->operation_period_todate=$operation_period_todate;
    $insert_activity->validity_fromdate=$validity_fromdate;
    $insert_activity->validity_todate=$validity_todate;
    $insert_activity->validity_fromtime=$validity_fromtime;
    $insert_activity->validity_totime=$validity_totime;
    $insert_activity->operating_weekdays=$operating_weekdays;
    $insert_activity->activity_currency=$activity_currency;
    $insert_activity->adult_price=$adult_price;
    $insert_activity->child_price=$child_price;
    $insert_activity->activity_blackout_dates=$activity_blackout_dates;
    $insert_activity->nationality_markup_details=$nationality_markup_details;
    $insert_activity->activity_transport_pricing=$activity_transport_pricing;
    $insert_activity->for_all_ages=$for_all_ages;
    $insert_activity->child_adult_age_details=$child_adult_age_details;
    $insert_activity->activity_inclusions=$activity_inclusions;
    $insert_activity->activity_exclusions=$activity_exclusions;
    $insert_activity->activity_cancel_policy=$activity_cancel_policy;
    $insert_activity->activity_terms_conditions=$activity_terms_conditions;
    $insert_activity->activity_images=$activity_images;
    $insert_activity->activity_created_by=$activity_created_by;
    $insert_activity->activity_role=$user_role;
    if($user_role=="Supplier")
    {
      $insert_activity->activity_approve_status=0;
    }
    if($insert_activity->save())
    {

      $last_id=$insert_activity->id;
      $insert_activity_log=new Activities_log;
      $insert_activity_log->activity_id=$last_id;
      $insert_activity_log->activity_name=$activity_name;
      $insert_activity_log->supplier_id=$supplier_id;
      $insert_activity_log->activity_location=$activity_location;
      $insert_activity_log->activity_country=$activity_country;
      $insert_activity_log->activity_city=$activity_city;
      $insert_activity_log->operation_period_fromdate=$operation_period_fromdate;
      $insert_activity_log->operation_period_todate=$operation_period_todate;
      $insert_activity_log->validity_fromdate=$validity_fromdate;
      $insert_activity_log->validity_todate=$validity_todate;
      $insert_activity_log->validity_fromtime=$validity_fromtime;
      $insert_activity_log->validity_totime=$validity_totime;
      $insert_activity_log->operating_weekdays=$operating_weekdays;
      $insert_activity_log->activity_currency=$activity_currency;
      $insert_activity_log->adult_price=$adult_price;
      $insert_activity_log->child_price=$child_price;
      $insert_activity_log->activity_blackout_dates=$activity_blackout_dates;
      $insert_activity_log->nationality_markup_details=$nationality_markup_details;
      $insert_activity_log->activity_transport_pricing=$activity_transport_pricing;
      $insert_activity_log->for_all_ages=$for_all_ages;
      $insert_activity_log->child_adult_age_details=$child_adult_age_details;
      $insert_activity_log->activity_inclusions=$activity_inclusions;
      $insert_activity_log->activity_exclusions=$activity_exclusions;
      $insert_activity_log->activity_cancel_policy=$activity_cancel_policy;
      $insert_activity_log->activity_terms_conditions=$activity_terms_conditions;
      $insert_activity_log->activity_images=$activity_images;
      $insert_activity_log->activity_created_by=$activity_created_by;
      $insert_activity_log->activity_role=$user_role;
      $insert_activity_log->activity_operation_performed="INSERT";
      $insert_activity_log->save();
      echo "success";
    }
    else
    {
      echo "fail";
    }
  }
  public function edit_activity($activity_id)
  {
    if(session()->has('travel_users_id'))
    {
      $rights=$this->rights('service-management');
      $countries=Countries::where('country_status',1)->get();
      $currency=Currency::get();
      $suppliers=Suppliers::where('supplier_status',1)->get();
      $emp_id=session()->get('travel_users_id');
      if(strpos($rights['admin_which'],'edit_delete')!==false)
      {
        $get_activity=Activities::where('activity_id',$activity_id)->first();
      }
      else
      {
        $get_activity=Activities::where('activity_id',$activity_id)->where('activity_created_by',$emp_id)->where('activity_role','!=','Supplier')->first();
      }

      if($get_activity)
      {
        $supplier_id=$get_activity->supplier_id;
        $get_supplier_countries=Suppliers::where('supplier_status',1)->where('supplier_id',$supplier_id)->first();
        $supplier_countries=$get_supplier_countries->supplier_opr_countries;
        $countries_data=explode(',', $supplier_countries);
        $cities=Cities::join("states","states.id","=","cities.state_id")->where("states.country_id", $get_activity->activity_country)->select("cities.*")->orderBy('cities.name','asc')->get();
        return view('mains.edit-activity')->with(compact('countries','currency','cities','suppliers','get_activity','countries_data','rights'));
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
  public function update_activity(Request $request)
  {
    $activity_id=urldecode(base64_decode(base64_decode($request->get('activity_id'))));
    $activity_role=$request->get('activity_role');
    if($activity_role=='supplier')
    {
      $user_id=$request->get('supplier_name');
      $user_role='Supplier';
    }
    else
    {
      if(session()->get('travel_users_role')=="Admin")
      {
        $user_role='Admin';
      }
      else
      {
        $user_role='Sub-User';
      }
      $user_id=session()->has('travel_users_id');
    }
    $check_activity=Activities::where('activity_id',$activity_id)->get();
    if(count($check_activity)>0)
    {
      $activity_name=$request->get('activity_name');
      $supplier_id=$request->get('supplier_name');
      $activity_location=$request->get('activity_location');
      $activity_country=$request->get('activity_country');
      $activity_city=$request->get('activity_city');
      $operation_period_fromdate=$request->get('period_operation_from');
      $operation_period_todate=$request->get('period_operation_to');
      $validity_fromdate=$request->get('validity_operation_from');
      $validity_todate=$request->get('validity_operation_to');
      $validity_fromtime=$request->get('activity_time_from');
      $validity_totime=$request->get('activity_time_to');
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
      $activity_currency=$request->get('activity_currency');
      $adult_price=$request->get('activity_adult_cost');
      $child_price=$request->get('activity_child_cost');
      $for_all_ages=$request->get('for_all_ages');
      $child_allowed=$request->get('child_allowed');
      $child_age=$request->get('child_age');
      $adult_allowed=$request->get('adult_allowed');
      $adult_age=$request->get('adult_age');
      $child_adult_age_details=array();
      $child_adult_age_details[0][]="child";
      $child_adult_age_details[0][]=$child_allowed;
      $child_adult_age_details[0][]=$child_age;
      $child_adult_age_details[1][]="adult";
      $child_adult_age_details[1][]=$adult_allowed;
      $child_adult_age_details[1][]=$adult_age;

      $child_adult_age_details=serialize($child_adult_age_details);
      $activity_blackout_dates=$request->get('blackout_days');
      $activity_nationality=$request->get('activity_nationality');
      $activity_markup=$request->get('activity_markup');
      $activity_amount=$request->get('activity_amount');
      $nationality_markup_details=array();
      for($nation_count=0;$nation_count<count($activity_nationality);$nation_count++)
      {
        $nationality_markup_details[$nation_count]['activity_nationality']=$activity_nationality[$nation_count];
        $nationality_markup_details[$nation_count]['activity_markup']=$activity_markup[$nation_count];
        $nationality_markup_details[$nation_count]['activity_amount']=$activity_amount[$nation_count];
      }
      $nationality_markup_details=serialize($nationality_markup_details);
      $activity_transport_currency=$request->get('activity_transport_currency');
      $activity_transport_desc=$request->get('activity_transport_desc');
      $activity_transport_cost=$request->get('activity_transport_cost');
      $activity_transport_pricing=array();
      for($transport_count=0;$transport_count<count($activity_transport_currency);$transport_count++)
      {
        $activity_transport_pricing[$transport_count]['transport_currency']=$activity_transport_currency[$transport_count];
        $activity_transport_pricing[$transport_count]['transport_desc']=$activity_transport_desc[$transport_count];
        $activity_transport_pricing[$transport_count]['transport_cost']=$activity_transport_cost[$transport_count];
      }
      $activity_transport_pricing=serialize($activity_transport_pricing);
      $activity_inclusions=$request->get('activity_inclusions');
      $activity_exclusions=$request->get('activity_exclusions');
      $activity_cancel_policy=$request->get('activity_cancellation');
      $activity_terms_conditions=$request->get('activity_terms_conditions');
      $activity_created_by=$user_id;
      $activity_images=$request->get('upload_ativity_already_images');
//multifile uploading
      if($request->hasFile('upload_ativity_images'))
      {
        foreach($request->file('upload_ativity_images') as $file)
        {
          $extension=strtolower($file->getClientOriginalExtension());
          if($extension=="png" || $extension=="jpg" || $extension=="jpeg" || $extension=="pdf")
          {
            $image_name=$file->getClientOriginalName();
            $image_activity = "activity-".time()."-".$image_name;
// request()->agent_logo->storeAs(public_path('consultant-images'), $imageName);
            $dir1 = 'assets/uploads/activities_images/';
            $file->move($dir1, $image_activity);
            $activity_images[]=$image_activity;
          }
        }
      }
      $activity_images=serialize($activity_images);
      $update_activity_array=array("activity_name"=>$activity_name,
        "supplier_id"=>$supplier_id,
        "activity_location"=>$activity_location,
        "activity_country"=>$activity_country,
        "activity_city"=>$activity_city,
        "operation_period_fromdate"=>$operation_period_fromdate,
        "operation_period_todate"=>$operation_period_todate,
        "validity_fromdate"=>$validity_fromdate,
        "validity_todate"=>$validity_todate,
        "validity_fromtime"=>$validity_fromtime,
        "validity_totime"=>$validity_totime,
        "operating_weekdays"=>$operating_weekdays,
        "activity_currency"=>$activity_currency,
        "adult_price"=>$adult_price,
        "child_price"=>$child_price,
        "activity_blackout_dates"=>$activity_blackout_dates,
        "nationality_markup_details"=>$nationality_markup_details,
        "activity_transport_pricing"=>$activity_transport_pricing,
        "for_all_ages"=>$for_all_ages,
        "child_adult_age_details"=>$child_adult_age_details,
        "activity_inclusions"=>$activity_inclusions,
        "activity_exclusions"=>$activity_exclusions,
        "activity_cancel_policy"=>$activity_cancel_policy,
        "activity_terms_conditions"=>$activity_terms_conditions,
        "activity_images"=>$activity_images,
        "activity_role"=>$user_role,
      );
      $update_activity_log_array=array("activity_id"=>$activity_id,
        "activity_name"=>$activity_name,
        "supplier_id"=>$supplier_id,
        "activity_location"=>$activity_location,
        "activity_country"=>$activity_country,
        "activity_city"=>$activity_city,
        "operation_period_fromdate"=>$operation_period_fromdate,
        "operation_period_todate"=>$operation_period_todate,
        "validity_fromdate"=>$validity_fromdate,
        "validity_todate"=>$validity_todate,
        "validity_fromtime"=>$validity_fromtime,
        "validity_totime"=>$validity_totime,
        "operating_weekdays"=>$operating_weekdays,
        "activity_currency"=>$activity_currency,
        "adult_price"=>$adult_price,
        "child_price"=>$child_price,
        "activity_blackout_dates"=>$activity_blackout_dates,
        "nationality_markup_details"=>$nationality_markup_details,
        "activity_transport_pricing"=>$activity_transport_pricing,
        "activity_inclusions"=>$activity_inclusions,
        "activity_exclusions"=>$activity_exclusions,
        "activity_cancel_policy"=>$activity_cancel_policy,
        "activity_terms_conditions"=>$activity_terms_conditions,
        "activity_images"=>$activity_images,
        "activity_created_by"=>$user_id,
        "activity_role"=>$user_role,
        "activity_operation_performed"=>'UPDATE',
      );
      $update_activity=Activities::where('activity_id',$activity_id)->update($update_activity_array);
      $update_activity=Activities_log::insert($update_activity_log_array);
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
  public function activity_details($activity_id)
  {
    if(session()->has('travel_users_id'))
    {
      $rights=$this->rights('service-management');
      $countries=Countries::where('country_status',1)->get();
      $currency=Currency::get();
      $suppliers=Suppliers::where('supplier_status',1)->get();
      $emp_id=session()->get('travel_users_id');
      if(strpos($rights['admin_which'],'view')!==false)
      {
        $get_activity=Activities::where('activity_id',$activity_id)->first();
      }
      else
      {
        $get_activity=Activities::where('activity_id',$activity_id)->where('activity_created_by',$emp_id)->where('activity_role','!=','Supplier')->first();
      }
      if($get_activity)
      {
        $supplier_id=$get_activity->supplier_id;
        $get_supplier_countries=Suppliers::where('supplier_status',1)->where('supplier_id',$supplier_id)->first();
        $supplier_countries=$get_supplier_countries->supplier_opr_countries;
        $countries_data=explode(',', $supplier_countries);
        $cities=Cities::join("states","states.id","=","cities.state_id")->where("states.country_id", $get_activity->activity_country)->select("cities.*")->orderBy('cities.name','asc')->get();
        return view('mains.activity-details-view')->with(compact('countries','currency','cities','suppliers','get_activity',"countries_data",'rights'));
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
  public function update_activity_approval(Request $request)
  {
    $id=$request->get('activity_id');
    $action_perform=$request->get('action_perform');
    if($action_perform=="approve")
    {
      $update_activity=Activities::where('activity_id',$id)->update(["activity_approve_status"=>1]);
      if($update_activity)
      {
        echo "success";
      }
      else
      {
        echo "fail";
      }
    }
    else if($action_perform=="reject")
    {
      $update_activity=Activities::where('activity_id',$id)->update(["activity_approve_status"=>2]);
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
  public function update_activity_active_inactive(Request $request)
  {
    $id=$request->get('activity_id');
    $action_perform=$request->get('action_perform');
    if($action_perform=="active")
    {
      $update_activity=Activities::where('activity_id',$id)->update(["activity_status"=>1]);
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
      $update_activity=Activities::where('activity_id',$id)->update(["activity_status"=>0]);
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
  public function update_activity_bestseller(Request $request)
  {
    $id=$request->get('activity_id');
    $action_perform=$request->get('action_perform');
    if($action_perform=="bestselleryes")
    {
      $update_activity=Activities::where('activity_id',$id)->update(["activity_best_status"=>1]);
      if($update_activity)
      {
        echo "success";
      }
      else
      {
        echo "fail";
      }
    }
    else if($action_perform=="bestsellerno")
    {
      $update_activity=Activities::where('activity_id',$id)->update(["activity_best_status"=>0]);
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
  public function sort_activity(Request $request)
  {
    $sort_activity_array=$request->get('new_data');
    $success_array=array();
    for($count=0;$count<count($sort_activity_array);$count++)
    {
      $activity_id=$sort_activity_array[$count]['activity_id'];
      $new_order=$sort_activity_array[$count]['new_order'];
      $update_activity=Activities::where('activity_id',$activity_id)->update(["activity_show_order"=>$new_order]);
      if($update_activity)
      {
        $success_array[]="success";
      }
      else
      {
        $success_array[]="not_success";
      }
    }
    echo json_encode($success_array);
  }
  public function create_transport(Request $request)
  {
    if(session()->has('travel_users_id'))
    {
      $rights=$this->rights('service-management');
      $countries=Countries::where('country_status',1)->get();
      $currency=Currency::get();
      $vehicle_type=VehicleType::get();
      $suppliers=Suppliers::where('supplier_status',1)->get();
      return view('mains.create-transport')->with(compact('countries','currency','suppliers','rights','vehicle_type'));
    }
    else
    {
      return redirect()->route('index');
    }
  }
  public function insert_transport(Request $request)
  {
    $transport_role=$request->get('transport_role');
    if($transport_role=='supplier')
    {
      $user_id=$request->get('supplier_name');
      $user_role='Supplier';
    }
    else
    {
      if(session()->get('travel_users_role')=="Admin")
      {
        $user_role='Admin';
      }
      else
      {
        $user_role='Sub-User';
      }
      $user_id=session()->has('travel_users_id');
    }
    $transfer_name=$request->get('transfer_name');
    $supplier_id=$request->get('supplier_name');
    $driver_language=$request->get('driver_language');
    $transfer_country=$request->get('transfer_country');
    $transfer_city=$request->get('transfer_city');
    $transfer_arrival_time=$request->get('transfer_arrival_time');
    $transfer_pickup_point=$request->get('transfer_pickup_point');
    $transfer_drop_point=$request->get('transfer_drop_point');
    $transfer_meet_point=$request->get('transfer_meet_point');
    $transfer_description=$request->get('transfer_description');
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
    $transfer_blackout_dates=$request->get('blackout_days');
    $transfer_nationality=$request->get('transfer_nationality');
    $transfer_markup=$request->get('transfer_markup');
    $transfer_amount=$request->get('transfer_amount');
    $nationality_markup_details=array();
    for($nation_count=0;$nation_count<count($transfer_nationality);$nation_count++)
    {
      $nationality_markup_details[$nation_count]['transfer_nationality']=$transfer_nationality[$nation_count];
      $nationality_markup_details[$nation_count]['transfer_markup']=$transfer_markup[$nation_count];
      $nationality_markup_details[$nation_count]['transfer_amount']=$transfer_amount[$nation_count];
    }
    $nationality_markup_details=serialize($nationality_markup_details);
    $transfer_validity_from=$request->get('transfer_validity_from');
    $transfer_validity_to=$request->get('transfer_validity_to');
    $transfer_vehicle_type=$request->get('transfer_vehicle_type');
    $transfer_vehicle=$request->get('transfer_vehicle');
    $transfer_car_model=$request->get('transfer_car_model');
    $transfer_manufacture_year=$request->get('transfer_manufacture_year');
    $transfer_duration=$request->get('transfer_duration');
    $transfer_max_passengers=$request->get('transfer_max_passengers');
    $transfer_total_vehicles=$request->get('transfer_total_vehicles');
    $transfer_transport_currency=$request->get('transfer_transport_currency');
    $transfer_vehicle_cost=$request->get('transfer_vehicle_cost');
    $transfer_parking_cost=$request->get('transfer_parking_cost');
    $transfer_driver_tip=$request->get('transfer_driver_tip');
    $transfer_recep_disc=$request->get('transfer_recep_disc');
    $transfer_guide_cost=$request->get('transfer_guide_cost');
    $transfer_attraction_cost=$request->get('transfer_attraction_cost');
    $transfer_images_indexes=$request->get('upload_ativity_images_index');
    $transfer_transport_tariff=array();
    for($transport_count=0;$transport_count<count($transfer_vehicle_type);$transport_count++)
    {
      $transfer_transport_tariff[$transport_count]['transfer_validity_from']=$transfer_validity_from[$transport_count];
      $transfer_transport_tariff[$transport_count]['transfer_validity_to']=$transfer_validity_to[$transport_count];
      $transfer_transport_tariff[$transport_count]['transfer_vehicle_type']=$transfer_vehicle_type[$transport_count];
      $transfer_transport_tariff[$transport_count]['transfer_vehicle']=$transfer_vehicle[$transport_count];
      $transfer_transport_tariff[$transport_count]['transfer_car_model']=$transfer_car_model[$transport_count];
      $transfer_transport_tariff[$transport_count]['transfer_manufacture_year']=$transfer_manufacture_year[$transport_count];
      $transfer_transport_tariff[$transport_count]['transfer_duration']=$transfer_duration[$transport_count];
      $transfer_transport_tariff[$transport_count]['transfer_max_passengers']=$transfer_max_passengers[$transport_count];
      $transfer_transport_tariff[$transport_count]['transfer_total_vehicles']=$transfer_total_vehicles[$transport_count];
      $transfer_transport_tariff[$transport_count]['transfer_transport_currency']=$transfer_transport_currency[$transport_count];
      $transfer_transport_tariff[$transport_count]['transfer_vehicle_cost']=$transfer_vehicle_cost[$transport_count];
      $transfer_transport_tariff[$transport_count]['transfer_parking_cost']=$transfer_parking_cost[$transport_count];
      $transfer_transport_tariff[$transport_count]['transfer_driver_tip']=$transfer_driver_tip[$transport_count];
      $transfer_transport_tariff[$transport_count]['transfer_recep_disc']=$transfer_recep_disc[$transport_count];
      $transfer_transport_tariff[$transport_count]['transfer_guide_cost']=$transfer_guide_cost[$transport_count];
      $transfer_transport_tariff[$transport_count]['transfer_attraction_cost']=$transfer_attraction_cost[$transport_count];
      $transfer_images=array();
      $index=$transfer_images_indexes[$transport_count];
//multifile uploading
      if($request->hasFile("upload_ativity_images$index"))
      {
        $file_array=$request->file("upload_ativity_images$index");
        foreach($file_array as $file)
        {
          $extension=strtolower($file->getClientOriginalExtension());
          if($extension=="png" || $extension=="jpg" || $extension=="jpeg")
          {
            $image_name=$file->getClientOriginalName();
            $image_transfer = "transport-".time()."-".$image_name;
            $dir1 = 'assets/uploads/transport_images/';
            $file->move($dir1, $image_transfer);
            $transfer_images[]=$image_transfer;
          }
        }
      }
      $transfer_transport_tariff[$transport_count]['transfer_images']=$transfer_images;
    }
    $transfer_transport_tariff=serialize($transfer_transport_tariff);
    $transfer_inclusions=$request->get('transfer_inclusions');
    $transfer_exclusions=$request->get('transfer_exclusions');
    $transfer_cancel_policy=$request->get('transfer_cancellation');
    $transfer_terms_conditions=$request->get('transfer_terms_conditions');
    $transfer_created_by=$user_id;
// $transfer_images=array();
//multifile uploading
// if($request->hasFile('upload_ativity_images'))
// {
//  foreach($request->file('upload_ativity_images') as $file)
//  {
//   $extension=strtolower($file->getClientOriginalExtension());
//   if($extension=="png" || $extension=="jpg" || $extension=="jpeg" || $extension=="pdf")
//   {
//     $image_name=$file->getClientOriginalName();
//     $image_transfer = "trnasport-".$image_name."-".time().'.'.$file->getClientOriginalExtension();
//     $dir1 = 'assets/uploads/transport_images/';
//     $file->move($dir1, $image_transfer);
//     $transfer_images[]=$image_transfer;
//   }
// }
// }
// $transfer_images=serialize($transfer_images);
    $transfer_images="";
    $insert_transfer=new Transport;
    $insert_transfer->transfer_name=$transfer_name;
    $insert_transfer->supplier_id=$supplier_id;
    $insert_transfer->driver_language=$driver_language;
    $insert_transfer->transfer_country=$transfer_country;
    $insert_transfer->transfer_city=$transfer_city;
    $insert_transfer->transfer_pickup_point=$transfer_pickup_point;
    $insert_transfer->transfer_drop_point=$transfer_drop_point;
    $insert_transfer->transfer_meet_point=$transfer_meet_point;
    $insert_transfer->transfer_description=$transfer_description;
    $insert_transfer->transfer_arrival_time=$transfer_arrival_time;
    $insert_transfer->operating_weekdays=$operating_weekdays;
    $insert_transfer->transfer_blackout_dates=$transfer_blackout_dates;
    $insert_transfer->nationality_markup_details=$nationality_markup_details;
    $insert_transfer->transfer_transport_tariff=$transfer_transport_tariff;
    $insert_transfer->transfer_inclusions=$transfer_inclusions;
    $insert_transfer->transfer_exclusions=$transfer_exclusions;
    $insert_transfer->transfer_cancel_policy=$transfer_cancel_policy;
    $insert_transfer->transfer_terms_conditions=$transfer_terms_conditions ;
    $insert_transfer->transfer_images=$transfer_images;
    $insert_transfer->transfer_created_by=$transfer_created_by;
    $insert_transfer->transfer_create_role=$user_role;
    if($user_role=="Supplier")
    {
      $insert_transfer->transport_approve_status=0;
    }
    if($insert_transfer->save())
    {
      $last_insert_id=$insert_transfer->id;
      $insert_transfer=new Transport_log;
      $insert_transfer->transport_id=$last_insert_id;
      $insert_transfer->transfer_name=$transfer_name;
      $insert_transfer->supplier_id=$supplier_id;
      $insert_transfer->driver_language=$driver_language;
      $insert_transfer->transfer_country=$transfer_country;
      $insert_transfer->transfer_city=$transfer_city;
      $insert_transfer->transfer_pickup_point=$transfer_pickup_point;
      $insert_transfer->transfer_drop_point=$transfer_drop_point;
      $insert_transfer->transfer_meet_point=$transfer_meet_point;
      $insert_transfer->transfer_description=$transfer_description;
      $insert_transfer->transfer_arrival_time=$transfer_arrival_time;
      $insert_transfer->operating_weekdays=$operating_weekdays;
      $insert_transfer->transfer_blackout_dates=$transfer_blackout_dates;
      $insert_transfer->nationality_markup_details=$nationality_markup_details;
      $insert_transfer->transfer_transport_tariff=$transfer_transport_tariff;
      $insert_transfer->transfer_inclusions=$transfer_inclusions;
      $insert_transfer->transfer_exclusions=$transfer_exclusions;
      $insert_transfer->transfer_cancel_policy=$transfer_cancel_policy;
      $insert_transfer->transfer_terms_conditions=$transfer_terms_conditions ;
      $insert_transfer->transfer_images=$transfer_images;
      $insert_transfer->transfer_created_by=$transfer_created_by;
      $insert_transfer->transfer_create_role=$user_role;
      $insert_transfer->transfer_operation_performed="INSERT";
      $insert_transfer->save();
      echo "success";
    }
    else
    {
      echo "fail";
    }
  }
  public function edit_transport($transport_id)
  {
    if(session()->has('travel_users_id'))
    {
      $rights=$this->rights('service-management');
      $countries=Countries::where('country_status',1)->get();
      $currency=Currency::get();
      $vehicle_type=VehicleType::get();
      $suppliers=Suppliers::where('supplier_status',1)->get();
      $emp_id=session()->get('travel_users_id');
      if(strpos($rights['admin_which'],'edit_delete')!==false)
      {
        $get_transport=Transport::where('transport_id',$transport_id)->first();
      }
      else
      {
        $get_transport=Transport::where('transport_id',$transport_id)->where('transfer_created_by',$emp_id)->where('transfer_create_role','!=','Supplier')->first();
      }
      if($get_transport)
      {
        $supplier_id=$get_transport->supplier_id;
        $get_supplier_countries=Suppliers::where('supplier_status',1)->where('supplier_id',$supplier_id)->first();
        $supplier_countries=$get_supplier_countries->supplier_opr_countries;
        $countries_data=explode(',', $supplier_countries);
        $cities=Cities::join("states","states.id","=","cities.state_id")->where("states.country_id", $get_transport->transfer_country)->select("cities.*")->orderBy('cities.name','asc')->get();
        return view('mains.edit-transport')->with(compact('countries','currency','cities','suppliers','get_transport',"countries_data","rights",'vehicle_type'));
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
  public function update_transport(Request $request)
  {
  // echo "<pre>";
  // print_r($request->all());
   $transport_id=urldecode(base64_decode(base64_decode($request->get('transport_id'))));
   $user_id=session()->has('travel_users_id');
   $check_transport=Transport::where('transport_id',$transport_id)->get();
   $transport_role=$request->get('transport_role');
   if($transport_role=='supplier')
   {
    $user_id=$request->get('supplier_name');
    $user_role='Supplier';
  }
  else
  {
    if(session()->get('travel_users_role')=="Admin")
    {
      $user_role='Admin';
    }
    else
    {
     $user_role='Sub-User';
   }
   $user_id=session()->has('travel_users_id');
 }
 if(count($check_transport)>0)
 {
  $transfer_name=$request->get('transfer_name');
  $supplier_id=$request->get('supplier_name');
  $driver_language=$request->get('driver_language');
  $transfer_country=$request->get('transfer_country');
  $transfer_city=$request->get('transfer_city');
  $transfer_arrival_time=$request->get('transfer_arrival_time');
  $transfer_pickup_point=$request->get('transfer_pickup_point');
  $transfer_drop_point=$request->get('transfer_drop_point');
  $transfer_meet_point=$request->get('transfer_meet_point');
  $transfer_description=$request->get('transfer_description');
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
  $transfer_blackout_dates=$request->get('blackout_days');
  $transfer_nationality=$request->get('transfer_nationality');
  $transfer_markup=$request->get('transfer_markup');
  $transfer_amount=$request->get('transfer_amount');
  $nationality_markup_details=array();
  for($nation_count=0;$nation_count<count($transfer_nationality);$nation_count++)
  {
    $nationality_markup_details[$nation_count]['transfer_nationality']=$transfer_nationality[$nation_count];
    $nationality_markup_details[$nation_count]['transfer_markup']=$transfer_markup[$nation_count];
    $nationality_markup_details[$nation_count]['transfer_amount']=$transfer_amount[$nation_count];
  }
  $nationality_markup_details=serialize($nationality_markup_details);
  $transfer_validity_from=$request->get('transfer_validity_from');
  $transfer_validity_to=$request->get('transfer_validity_to');
  $transfer_vehicle_type=$request->get('transfer_vehicle_type');  
  $transfer_vehicle=$request->get('transfer_vehicle');
  $transfer_car_model=$request->get('transfer_car_model');
  $transfer_manufacture_year=$request->get('transfer_manufacture_year');
  $transfer_duration=$request->get('transfer_duration');
  $transfer_max_passengers=$request->get('transfer_max_passengers');
  $transfer_total_vehicles=$request->get('transfer_total_vehicles'); 
  $transfer_transport_currency=$request->get('transfer_transport_currency');  
  $transfer_vehicle_cost=$request->get('transfer_vehicle_cost');
  $transfer_parking_cost=$request->get('transfer_parking_cost');
  $transfer_driver_tip=$request->get('transfer_driver_tip');  
  $transfer_recep_disc=$request->get('transfer_recep_disc');
  $transfer_guide_cost=$request->get('transfer_guide_cost');
  $transfer_attraction_cost=$request->get('transfer_attraction_cost');  
  $transfer_images_indexes=$request->get('upload_ativity_images_index'); 
  $transfer_transport_tariff=array();
  for($transport_count=0;$transport_count<count($transfer_vehicle_type);$transport_count++)
  {
    $transfer_transport_tariff[$transport_count]['transfer_validity_from']=$transfer_validity_from[$transport_count];
    $transfer_transport_tariff[$transport_count]['transfer_validity_to']=$transfer_validity_to[$transport_count];
    $transfer_transport_tariff[$transport_count]['transfer_vehicle_type']=$transfer_vehicle_type[$transport_count];
    $transfer_transport_tariff[$transport_count]['transfer_vehicle']=$transfer_vehicle[$transport_count];
    $transfer_transport_tariff[$transport_count]['transfer_car_model']=$transfer_car_model[$transport_count];
    $transfer_transport_tariff[$transport_count]['transfer_manufacture_year']=$transfer_manufacture_year[$transport_count];
    $transfer_transport_tariff[$transport_count]['transfer_duration']=$transfer_duration[$transport_count];
    $transfer_transport_tariff[$transport_count]['transfer_max_passengers']=$transfer_max_passengers[$transport_count];
    $transfer_transport_tariff[$transport_count]['transfer_total_vehicles']=$transfer_total_vehicles[$transport_count];
    $transfer_transport_tariff[$transport_count]['transfer_transport_currency']=$transfer_transport_currency[$transport_count];
    $transfer_transport_tariff[$transport_count]['transfer_vehicle_cost']=$transfer_vehicle_cost[$transport_count];
    $transfer_transport_tariff[$transport_count]['transfer_parking_cost']=$transfer_parking_cost[$transport_count];
    $transfer_transport_tariff[$transport_count]['transfer_driver_tip']=$transfer_driver_tip[$transport_count];
    $transfer_transport_tariff[$transport_count]['transfer_recep_disc']=$transfer_recep_disc[$transport_count];
    $transfer_transport_tariff[$transport_count]['transfer_guide_cost']=$transfer_guide_cost[$transport_count];
    $transfer_transport_tariff[$transport_count]['transfer_attraction_cost']=$transfer_attraction_cost[$transport_count];
    $index=$transfer_images_indexes[$transport_count];
    $transfer_images=$request->get('upload_ativity_already_images'.$index);
      //multifile uploading
    if($request->hasFile("upload_ativity_images$index"))
    {
      $file_array=$request->file("upload_ativity_images$index");
      foreach($file_array as $file)
      {
        $extension=strtolower($file->getClientOriginalExtension());
        if($extension=="png" || $extension=="jpg" || $extension=="jpeg")
        {
          $image_name=$file->getClientOriginalName();
          $image_transfer = "transport-".time()."-".$image_name;
          $dir1 = 'assets/uploads/transport_images/';
          $file->move($dir1, $image_transfer);
          $transfer_images[]=$image_transfer;
        }
      }
    }
    $transfer_transport_tariff[$transport_count]['transfer_images']=$transfer_images;
  }
  $transfer_transport_tariff=serialize($transfer_transport_tariff);
  $transfer_inclusions=$request->get('transfer_inclusions');
  $transfer_exclusions=$request->get('transfer_exclusions');
  $transfer_cancel_policy=$request->get('transfer_cancellation');
  $transfer_terms_conditions=$request->get('transfer_terms_conditions');
  $transfer_created_by=$user_id;
  
//       //multifile uploading
//   if($request->hasFile('upload_ativity_images'))
//   {
//    foreach($request->file('upload_ativity_images') as $file)
//    {
//     $extension=strtolower($file->getClientOriginalExtension());
//     if($extension=="png" || $extension=="jpg" || $extension=="jpeg" || $extension=="pdf")
//     {
//       $image_name=$file->getClientOriginalName();
//       $image_transfer = "trnasport-".$image_name."-".time().'.'.$file->getClientOriginalExtension();
//                 // request()->agent_logo->storeAs(public_path('consultant-images'), $imageName);
//       $dir1 = 'assets/uploads/transport_images/';
//       $file->move($dir1, $image_transfer);
//       $transfer_images[]=$image_transfer;
//     }
//   }
// }
// $transfer_images=serialize($transfer_images);
  $transfer_images="";
  $update_transport_array=array(
    "transfer_name"=>$transfer_name,
    "supplier_id"=>$supplier_id,
    "driver_language"=>$driver_language,
    "transfer_country"=>$transfer_country,
    "transfer_city"=>$transfer_city,
    "transfer_pickup_point"=>$transfer_pickup_point,
    "transfer_drop_point"=>$transfer_drop_point,
    "transfer_meet_point"=>$transfer_meet_point,
    "transfer_description"=>$transfer_description,
    "transfer_arrival_time"=>$transfer_arrival_time,
    "operating_weekdays"=>$operating_weekdays,
    "transfer_blackout_dates"=>$transfer_blackout_dates,
    "nationality_markup_details"=>$nationality_markup_details,
    "transfer_transport_tariff"=>$transfer_transport_tariff,
    "transfer_inclusions"=>$transfer_inclusions,
    "transfer_exclusions"=>$transfer_exclusions,
    "transfer_cancel_policy"=>$transfer_cancel_policy,
    "transfer_terms_conditions"=>$transfer_terms_conditions ,
    "transfer_images"=>$transfer_images,
    "transfer_create_role"=>$user_role,
  );
  $insert_transport_log_array=array(
    "transport_id"=>$transport_id,
    "transfer_name"=>$transfer_name,
    "supplier_id"=>$supplier_id,
    "driver_language"=>$driver_language,
    "transfer_country"=>$transfer_country,
    "transfer_city"=>$transfer_city,
    "transfer_pickup_point"=>$transfer_pickup_point,
    "transfer_drop_point"=>$transfer_drop_point,
    "transfer_meet_point"=>$transfer_meet_point,
    "transfer_description"=>$transfer_description,
    "transfer_arrival_time"=>$transfer_arrival_time,
    "operating_weekdays"=>$operating_weekdays,
    "transfer_blackout_dates"=>$transfer_blackout_dates,
    "nationality_markup_details"=>$nationality_markup_details,
    "transfer_transport_tariff"=>$transfer_transport_tariff,
    "transfer_inclusions"=>$transfer_inclusions,
    "transfer_exclusions"=>$transfer_exclusions,
    "transfer_cancel_policy"=>$transfer_cancel_policy,
    "transfer_terms_conditions"=>$transfer_terms_conditions ,
    "transfer_images"=>$transfer_images,
    "transfer_created_by"=>$transfer_created_by,
    "transfer_create_role"=>$user_role,
    "transfer_operation_performed"=>"UPDATE",
  );
  $update_transport=Transport::where('transport_id',$transport_id)->update($update_transport_array);
  if($update_transport)
  {
    $insert_log_transport=Transport_log::insert($insert_transport_log_array);
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
public function transport_details($transport_id)
{
  if(session()->has('travel_users_id'))
  {
   $rights=$this->rights('service-management');
   $countries=Countries::where('country_status',1)->get();
   $currency=Currency::get();
   $vehicle_type=VehicleType::get();
   $suppliers=Suppliers::where('supplier_status',1)->get();
   $emp_id=session()->get('travel_users_id');
   if(strpos($rights['admin_which'],'view')!==false)
   {
    $get_transport=Transport::where('transport_id',$transport_id)->first();
  }
  else
  {
    $get_transport=Transport::where('transport_id',$transport_id)->where('transfer_created_by',$emp_id)->where('transfer_create_role','!=','Supplier')->first();
  }
  if($get_transport)
  {
    $supplier_id=$get_transport->supplier_id;
    $get_supplier_countries=Suppliers::where('supplier_status',1)->where('supplier_id',$supplier_id)->first();
    $supplier_countries=$get_supplier_countries->supplier_opr_countries;
    $countries_data=explode(',', $supplier_countries);
    return view('mains.transport-details-view')->with(compact('countries','currency','cities','suppliers','get_transport','countries_data','vehicle_type','rights'));
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
public function update_transport_approval(Request $request)
{
 $id=$request->get('transport_id');
 $action_perform=$request->get('action_perform');
 if($action_perform=="approve")
 {
  $update_transport=Transport::where('transport_id',$id)->update(["transport_approve_status"=>1]);
  if($update_transport)
  {
    echo "success";
  }
  else
  {
    echo "fail";
  }
}
else if($action_perform=="reject")
{
  $update_transport=Transport::where('transport_id',$id)->update(["transport_approve_status"=>2]);
  if($update_transport)
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
public function update_transport_active_inactive(Request $request)
{
 $id=$request->get('transport_id');
 $action_perform=$request->get('action_perform');
 if($action_perform=="active")
 {
  $update_transport=Transport::where('transport_id',$id)->update(["transfer_status"=>1]);
  if($update_transport)
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
  $update_transport=Transport::where('transport_id',$id)->update(["transfer_status"=>0]);
  if($update_transport)
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
public function create_hotel(Request $request)
{
  if(session()->has('travel_users_id'))
  {
   $rights=$this->rights('service-management');
   $countries=Countries::where('country_status',1)->get();
   $currency=Currency::get();
   $hotel_meal=HotelMeal::get();
   $fetch_amenities=Amenities::where('amenities_status',1)->get();
   $fetch_sub_amenities=SubAmenities::where('sub_amenities_status',1)->get();
   $suppliers=Suppliers::where('supplier_status',1)->get();
   return view('mains.create-hotel')->with(compact('countries','currency','suppliers','rights','hotel_meal','fetch_amenities','fetch_sub_amenities'));
 }
 else
 {
  return redirect()->route('index');
}
}
public function insert_hotel(Request $request)
{
 echo "<pre>";
 print_r($request->all());
 die();
 $hotel_role=$request->get('hotel_role');
 if($hotel_role=='supplier')
 {
  $user_id=$request->get('supplier_name');
  $user_role='Supplier';
}
else
{
  $user_id=session()->has('travel_users_id');
  if(session()->get('travel_users_role')=="Admin")
  {
    $user_role='Admin';
  }
  else
  {
   $user_role='Sub-User';
 }
}
$hotel_created_by=$user_id;
$hotel_name=$request->get('hotel_name');
$supplier_id=$request->get('supplier_name');
$hotel_contact=$request->get('contact_no');
$hotel_rating=$request->get('hotel_rating');
$hotel_address=$request->get('hotel_address');
$hotel_description=$request->get('hotel_description');
$hotel_country=$request->get('hotel_country');
$hotel_city=$request->get('hotel_city');
$season_name=$request->get('season_name'); 
$booking_validity_from=$request->get('booking_validity_from'); 
$booking_validity_to=$request->get('booking_validity_to'); 
$stop_sale=$request->get('stop_sale'); 
$season_details=array();
for($season=0;$season<count($season_name);$season++)
{
  $season_details[$season]["season_name"]=$season_name[$season];
  $season_details[$season]["booking_validity_from"]=$booking_validity_from[$season];
  $season_details[$season]["booking_validity_to"]=$booking_validity_to[$season];
  $season_details[$season]["stop_sale"]=$stop_sale[$season];
}
$season_details=serialize($season_details);
$activity_nationality=$request->get('activity_nationality'); 
$activity_markup=$request->get('activity_markup'); 
$activity_amount=$request->get('activity_amount'); 
$markup_details=array();
for($markup=0;$markup<count($activity_nationality);$markup++)
{
  $markup_details[$markup]["activity_nationality"]=$activity_nationality[$markup];
  $markup_details[$markup]["activity_markup"]=$activity_markup[$markup];
  $markup_details[$markup]["activity_amount"]=$activity_amount[$markup];
}
$markup_details=serialize($markup_details);
$blackout_days=$request->get('blackout_days'); 
$blackout_dates=serialize($blackout_days);
$surcharge_name=$request->get('surcharge_name'); 
$surcharge_day=$request->get('surcharge_day'); 
$surcharge_price=$request->get('surcharge_price'); 
$surcharge_details=array();
for($surcharge=0;$surcharge<count($surcharge_name);$surcharge++)
{
  $surcharge_details[$surcharge]["surcharge_name"]=$surcharge_name[$surcharge];
  $surcharge_details[$surcharge]["surcharge_day"]=$surcharge_day[$surcharge];
  $surcharge_details[$surcharge]["surcharge_price"]=$surcharge_price[$surcharge];
}
$surcharge_details=serialize($surcharge_details);
$room_type=$request->get('room_type'); 
$room_min=$request->get('room_min'); 
$room_max=$request->get('room_max');
$room_class=$request->get('room_class'); 
$room_currency=$request->get('room_currency'); 
$room_adult=$request->get('room_adult'); 
$room_cwb=$request->get('room_cwb'); 
$room_cnb=$request->get('room_cnb'); 
$room_weekend=$request->get('room_weekend'); 
$room_meal=$request->get('room_meal');
$room_night=$request->get('room_night');
$room_checkin=$request->get('room_checkin'); 
$room_checkout=$request->get('room_checkout');  
$rate_allocation_details=array();
for($allocation=0;$allocation<count($room_type);$allocation++)
{
  $rate_allocation_details[$allocation]["room_type"]=$room_type[$allocation];
  $rate_allocation_details[$allocation]["room_min"]=$room_min[$allocation];
  $rate_allocation_details[$allocation]["room_max"]=$room_max[$allocation];
  $rate_allocation_details[$allocation]["room_class"]=$room_class[$allocation];
  $rate_allocation_details[$allocation]["room_currency"]=$room_currency[$allocation];
  $rate_allocation_details[$allocation]["room_adult"]=$room_adult[$allocation];
  $rate_allocation_details[$allocation]["room_cwb"]=$room_cwb[$allocation];
  $rate_allocation_details[$allocation]["room_cnb"]=$room_cnb[$allocation];
  $rate_allocation_details[$allocation]["room_weekend"]=$room_weekend[$allocation];
  $rate_allocation_details[$allocation]["room_meal"]=$room_meal[$allocation];
  $rate_allocation_details[$allocation]["room_night"]=$room_night[$allocation];
  $rate_allocation_details[$allocation]["room_checkin"]=$room_checkin[$allocation];
  $rate_allocation_details[$allocation]["room_checkout"]=$room_checkout[$allocation];
}
$rate_allocation_details=serialize($rate_allocation_details);
$hotel_promotion_detail=array();
$hotel_promotion_detail['hotel_promotion']=$request->get('hotel_promotion');
$hotel_promotion_detail['hotel_prom_discount']=$request->get('hotel_prom_discount');
$hotel_promotion_detail['hotel_promotion_from']=$request->get('hotel_promotion_from');
$hotel_promotion_detail['hotel_promotion_to']=$request->get('hotel_promotion_to');
$hotel_promotion_detail['hotel_promotion_disc_booking']=$request->get('hotel_promotion_disc_booking');
$hotel_promotion_detail['hotel_promotion_disc_travel']=$request->get('hotel_promotion_disc_travel');
$hotel_promotion_detail=serialize($hotel_promotion_detail);
$hotel_addon_name=$request->get('hotel_addon_name'); 
$hotel_desc=$request->get('hotel_desc'); 
$hotel_adult_cost=$request->get('hotel_adult_cost'); 
$hotel_child_cost=$request->get('hotel_child_cost'); 
$hotel_currency=$request->get('hotel_currency'); 
$addon_details=array();
for($addon=0;$addon<count($hotel_addon_name);$addon++)
{
  $addon_details[$addon]["hotel_addon_name"]=$hotel_addon_name[$addon];
  $addon_details[$addon]["hotel_desc"]=$hotel_desc[$addon];
  $addon_details[$addon]["hotel_adult_cost"]=$hotel_adult_cost[$addon];
  $addon_details[$addon]["hotel_child_cost"]=$hotel_child_cost[$addon];
  $addon_details[$addon]["hotel_currency"]=$hotel_currency[$addon];
}
$addon_details=serialize($addon_details);
$policy_name=$request->get('policy_name'); 
$policy_desc=$request->get('policy_desc'); 
$policy_details=array();
for($policy=0;$policy<count($policy_name);$policy++)
{
  $policy_details[$policy]["policy_name"]=$policy_name[$policy];
  $policy_details[$policy]["policy_desc"]=$policy_desc[$policy];
}
$policy_details=serialize($policy_details);
$booking_validity_from=$request->get('validity_operation_from');
$booking_validity_to=$request->get('validity_operation_to'); 
$hotel_inclusions=$request->get('hotel_inclusions'); 
$hotel_exclusions=$request->get('hotel_exclusions');
$hotel_cancel_policy=$request->get('hotel_cancellation'); 
$hotel_terms_conditions=$request->get('hotel_terms_conditions'); 
$hotel_images=array();
        //multifile uploading
if($request->hasFile('upload_ativity_images'))
{
 foreach($request->file('upload_ativity_images') as $file)
 {
  $extension=strtolower($file->getClientOriginalExtension());
  if($extension=="png" || $extension=="jpg" || $extension=="jpeg" || $extension=="pdf")
  {
    $image_name=$file->getClientOriginalName();
    $image_hotel = "hotel-".time()."-".$image_name;
                  // request()->agent_logo->storeAs(public_path('consultant-images'), $imageName);
    $dir1 = 'assets/uploads/hotel_images/';
    $file->move($dir1, $image_hotel);
    $hotel_images[]=$image_hotel;
  }
}
}
$hotel_images=serialize($hotel_images);
$hotel_amenities=$request->get('amenities');
$hotel_amenities=serialize($hotel_amenities);
$insert_hotel=new Hotels;
$insert_hotel->hotel_name=$hotel_name;
$insert_hotel->supplier_id=$supplier_id;
$insert_hotel->hotel_contact=$hotel_contact;
$insert_hotel->hotel_rating=$hotel_rating;
$insert_hotel->hotel_address=$hotel_address;
$insert_hotel->hotel_description=$hotel_description;
$insert_hotel->hotel_country=$hotel_country;
$insert_hotel->hotel_city=$hotel_city;
$insert_hotel->hotel_season_details=$season_details;
$insert_hotel->hotel_markup_details=$markup_details;
$insert_hotel->hotel_blackout_dates=$blackout_dates;
$insert_hotel->hotel_surcharge_details=$surcharge_details;
$insert_hotel->rate_allocation_details=$rate_allocation_details;
$insert_hotel->hotel_promotion_details=$hotel_promotion_detail;
$insert_hotel->hotel_add_ons=$addon_details;
$insert_hotel->hotel_other_policies=$policy_details;
$insert_hotel->booking_validity_from=$booking_validity_from;
$insert_hotel->booking_validity_to=$booking_validity_to;
$insert_hotel->hotel_amenities=$hotel_amenities;
$insert_hotel->hotel_inclusions=$hotel_inclusions;
$insert_hotel->hotel_exclusions=$hotel_exclusions;
$insert_hotel->hotel_cancel_policy=$hotel_cancel_policy;
$insert_hotel->hotel_terms_conditions=$hotel_terms_conditions;
$insert_hotel->hotel_images=$hotel_images;
$insert_hotel->hotel_created_by=$hotel_created_by;
$insert_hotel->hotel_create_role=$user_role;
if($user_role=="Supplier")
{
  $insert_hotel->hotel_approve_status=0;
}
if($insert_hotel->save())
{
  $last_insert_id=$insert_hotel->id;
  $insert_hotel_log=new Hotels_log;
  $insert_hotel_log->hotel_id=$last_insert_id;
  $insert_hotel_log->hotel_name=$hotel_name;
  $insert_hotel_log->supplier_id=$supplier_id;
  $insert_hotel_log->hotel_contact=$hotel_contact;
  $insert_hotel_log->hotel_rating=$hotel_rating;
  $insert_hotel_log->hotel_address=$hotel_address;
  $insert_hotel_log->hotel_description=$hotel_description;
  $insert_hotel_log->hotel_country=$hotel_country;
  $insert_hotel_log->hotel_city=$hotel_city;
  $insert_hotel_log->hotel_season_details=$season_details;
  $insert_hotel_log->hotel_markup_details=$markup_details;
  $insert_hotel_log->hotel_blackout_dates=$blackout_dates;
  $insert_hotel_log->hotel_surcharge_details=$surcharge_details;
  $insert_hotel_log->rate_allocation_details=$rate_allocation_details;
  $insert_hotel_log->hotel_promotion_details=$hotel_promotion_detail;
  $insert_hotel_log->hotel_add_ons=$addon_details;
  $insert_hotel_log->hotel_other_policies=$policy_details;
  $insert_hotel_log->booking_validity_from=$booking_validity_from;
  $insert_hotel_log->booking_validity_to=$booking_validity_to;
  $insert_hotel_log->hotel_amenities=$hotel_amenities;
  $insert_hotel_log->hotel_inclusions=$hotel_inclusions;
  $insert_hotel_log->hotel_exclusions=$hotel_exclusions;
  $insert_hotel_log->hotel_cancel_policy=$hotel_cancel_policy;
  $insert_hotel_log->hotel_terms_conditions=$hotel_terms_conditions;
  $insert_hotel_log->hotel_images=$hotel_images;
  $insert_hotel_log->hotel_created_by=$hotel_created_by;
  $insert_hotel_log->hotel_create_role=$user_role;
  $insert_hotel_log->hotel_operation_performed='INSERT';
  $insert_hotel_log->save();
  echo "success";
}
else
{
  echo "fail";
}
}
public function edit_hotel($hotel_id)
{
  if(session()->has('travel_users_id'))
  {
   $rights=$this->rights('service-management');
   $countries=Countries::where('country_status',1)->get();
   $currency=Currency::get();
   $hotel_meal=HotelMeal::get();
   $suppliers=Suppliers::where('supplier_status',1)->get();
   $emp_id=session()->get('travel_users_id');
   $fetch_amenities=Amenities::get();
   $fetch_sub_amenities=SubAmenities::get();
   if(strpos($rights['admin_which'],'edit_delete')!==false)
   {
    $get_hotels=Hotels::where('hotel_id',$hotel_id)->first();
  }
  else
  {
    $get_hotels=Hotels::where('hotel_id',$hotel_id)->where('hotel_created_by',$emp_id)->where('hotel_create_role','!=','Supplier')->first();
  }
  if($get_hotels)
  {
   $supplier_id=$get_hotels->supplier_id;
   $get_supplier_countries=Suppliers::where('supplier_status',1)->where('supplier_id',$supplier_id)->first();
   $supplier_countries=$get_supplier_countries->supplier_opr_countries;
   $countries_data=explode(',', $supplier_countries);
   $cities=Cities::join("states","states.id","=","cities.state_id")->where("states.country_id", $get_hotels->hotel_country)->select("cities.*")->orderBy('cities.name','asc')->get();
   return view('mains.edit-hotel')->with(compact('countries','currency','cities','suppliers','get_hotels',"countries_data","rights","hotel_meal","fetch_amenities","fetch_sub_amenities"));
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
public function update_hotel(Request $request)
{
 $hotel_role=$request->get('hotel_role');
 if($hotel_role=='supplier')
 {
  $user_id=$request->get('supplier_name');
  $user_role='Supplier';
}
else
{
 if(session()->get('travel_users_role')=="Admin")
 {
  $user_role='Admin';
}
else
{
 $user_role='Sub-User';
}
$user_id=session()->has('travel_users_id');
}
$hotel_id=$request->get('hotel_id');
$hotel_created_by=$user_id;
$hotel_name=$request->get('hotel_name');
$supplier_id=$request->get('supplier_name');
$hotel_contact=$request->get('contact_no');
$hotel_rating=$request->get('hotel_rating');
$hotel_address=$request->get('hotel_address');
$hotel_description=$request->get('hotel_description');
$hotel_country=$request->get('hotel_country');
$hotel_city=$request->get('hotel_city');
$season_name=$request->get('season_name'); 
$booking_validity_from=$request->get('booking_validity_from'); 
$booking_validity_to=$request->get('booking_validity_to'); 
$stop_sale=$request->get('stop_sale'); 
$season_details=array();
for($season=0;$season<count($season_name);$season++)
{
  $season_details[$season]["season_name"]=$season_name[$season];
  $season_details[$season]["booking_validity_from"]=$booking_validity_from[$season];
  $season_details[$season]["booking_validity_to"]=$booking_validity_to[$season];
  $season_details[$season]["stop_sale"]=$stop_sale[$season];
}
$season_details=serialize($season_details);
$activity_nationality=$request->get('activity_nationality'); 
$activity_markup=$request->get('activity_markup'); 
$activity_amount=$request->get('activity_amount'); 
$markup_details=array();
for($markup=0;$markup<count($activity_nationality);$markup++)
{
  $markup_details[$markup]["activity_nationality"]=$activity_nationality[$markup];
  $markup_details[$markup]["activity_markup"]=$activity_markup[$markup];
  $markup_details[$markup]["activity_amount"]=$activity_amount[$markup];
}
$markup_details=serialize($markup_details);
$blackout_days=$request->get('blackout_days'); 
$blackout_dates=serialize($blackout_days);
$surcharge_name=$request->get('surcharge_name'); 
$surcharge_day=$request->get('surcharge_day'); 
$surcharge_price=$request->get('surcharge_price'); 
$surcharge_details=array();
for($surcharge=0;$surcharge<count($surcharge_name);$surcharge++)
{
  $surcharge_details[$surcharge]["surcharge_name"]=$surcharge_name[$surcharge];
  $surcharge_details[$surcharge]["surcharge_day"]=$surcharge_day[$surcharge];
  $surcharge_details[$surcharge]["surcharge_price"]=$surcharge_price[$surcharge];
}
$surcharge_details=serialize($surcharge_details);
$room_type=$request->get('room_type'); 
$room_min=$request->get('room_min'); 
$room_max=$request->get('room_max');
$room_class=$request->get('room_class'); 
$room_currency=$request->get('room_currency'); 
$room_adult=$request->get('room_adult'); 
$room_cwb=$request->get('room_cwb'); 
$room_cnb=$request->get('room_cnb'); 
$room_weekend=$request->get('room_weekend'); 
$room_meal=$request->get('room_meal');
$room_night=$request->get('room_night');
$room_checkin=$request->get('room_checkin'); 
$room_checkout=$request->get('room_checkout');  
$rate_allocation_details=array();
for($allocation=0;$allocation<count($room_type);$allocation++)
{
  $rate_allocation_details[$allocation]["room_type"]=$room_type[$allocation];
  $rate_allocation_details[$allocation]["room_min"]=$room_min[$allocation];
  $rate_allocation_details[$allocation]["room_max"]=$room_max[$allocation];
  $rate_allocation_details[$allocation]["room_class"]=$room_class[$allocation];
  $rate_allocation_details[$allocation]["room_currency"]=$room_currency[$allocation];
  $rate_allocation_details[$allocation]["room_adult"]=$room_adult[$allocation];
  $rate_allocation_details[$allocation]["room_cwb"]=$room_cwb[$allocation];
  $rate_allocation_details[$allocation]["room_cnb"]=$room_cnb[$allocation];
  $rate_allocation_details[$allocation]["room_weekend"]=$room_weekend[$allocation];
  $rate_allocation_details[$allocation]["room_meal"]=$room_meal[$allocation];
  $rate_allocation_details[$allocation]["room_night"]=$room_night[$allocation];
  $rate_allocation_details[$allocation]["room_checkin"]=$room_checkin[$allocation];
  $rate_allocation_details[$allocation]["room_checkout"]=$room_checkout[$allocation];
}
$rate_allocation_details=serialize($rate_allocation_details);
$hotel_promotion_detail=array();
$hotel_promotion_detail['hotel_promotion']=$request->get('hotel_promotion');
$hotel_promotion_detail['hotel_prom_discount']=$request->get('hotel_prom_discount');
$hotel_promotion_detail['hotel_promotion_from']=$request->get('hotel_promotion_from');
$hotel_promotion_detail['hotel_promotion_to']=$request->get('hotel_promotion_to');
$hotel_promotion_detail['hotel_promotion_disc_booking']=$request->get('hotel_promotion_disc_booking');
$hotel_promotion_detail['hotel_promotion_disc_travel']=$request->get('hotel_promotion_disc_travel');
$hotel_promotion_detail=serialize($hotel_promotion_detail);
$hotel_addon_name=$request->get('hotel_addon_name'); 
$hotel_desc=$request->get('hotel_desc'); 
$hotel_adult_cost=$request->get('hotel_adult_cost'); 
$hotel_child_cost=$request->get('hotel_child_cost'); 
$hotel_currency=$request->get('hotel_currency'); 
$addon_details=array();
for($addon=0;$addon<count($hotel_addon_name);$addon++)
{
  $addon_details[$addon]["hotel_addon_name"]=$hotel_addon_name[$addon];
  $addon_details[$addon]["hotel_desc"]=$hotel_desc[$addon];
  $addon_details[$addon]["hotel_adult_cost"]=$hotel_adult_cost[$addon];
  $addon_details[$addon]["hotel_child_cost"]=$hotel_child_cost[$addon];
  $addon_details[$addon]["hotel_currency"]=$hotel_currency[$addon];
}
$addon_details=serialize($addon_details);
$policy_name=$request->get('policy_name'); 
$policy_desc=$request->get('policy_desc'); 
$policy_details=array();
for($policy=0;$policy<count($policy_name);$policy++)
{
  $policy_details[$policy]["policy_name"]=$policy_name[$policy];
  $policy_details[$policy]["policy_desc"]=$policy_desc[$policy];
}
$policy_details=serialize($policy_details);
$booking_validity_from=$request->get('validity_operation_from');
$booking_validity_to=$request->get('validity_operation_to'); 
$hotel_inclusions=$request->get('hotel_inclusions'); 
$hotel_exclusions=$request->get('hotel_exclusions');
$hotel_cancel_policy=$request->get('hotel_cancellation'); 
$hotel_terms_conditions=$request->get('hotel_terms_conditions'); 
$hotel_images=$request->get('upload_ativity_already_images');
        //multifile uploading
if($request->hasFile('upload_ativity_images'))
{
 foreach($request->file('upload_ativity_images') as $file)
 {
  $extension=strtolower($file->getClientOriginalExtension());
  if($extension=="png" || $extension=="jpg" || $extension=="jpeg" || $extension=="pdf")
  {
    $image_name=$file->getClientOriginalName();
    $image_hotel = "hotel-".time()."-".$image_name;
                  // request()->agent_logo->storeAs(public_path('consultant-images'), $imageName);
    $dir1 = 'assets/uploads/hotel_images/';
    $file->move($dir1, $image_hotel);
    $hotel_images[]=$image_hotel;
  }
}
}
$hotel_images=serialize($hotel_images);
$hotel_amenities=$request->get('amenities');
$hotel_amenities=serialize($hotel_amenities);
$update_hotel_data=array("hotel_name"=>$hotel_name,
  "supplier_id"=>$supplier_id,
  "hotel_contact"=>$hotel_contact,
  "hotel_rating"=>$hotel_rating,
  "hotel_address"=>$hotel_address,
  "hotel_description"=>$hotel_description,
  "hotel_country"=>$hotel_country,
  "hotel_city"=>$hotel_city,
  "hotel_season_details"=>$season_details,
  "hotel_markup_details"=>$markup_details,
  "hotel_blackout_dates"=>$blackout_dates,
  "hotel_surcharge_details"=>$surcharge_details,
  "rate_allocation_details"=>$rate_allocation_details,
  "hotel_promotion_details"=>$hotel_promotion_detail,
  "hotel_add_ons"=>$addon_details,
  "hotel_other_policies"=>$policy_details,
  "booking_validity_from"=>$booking_validity_from,
  "booking_validity_to"=>$booking_validity_to,
  "hotel_amenities"=>$hotel_amenities,
  "hotel_inclusions"=>$hotel_inclusions,
  "hotel_exclusions"=>$hotel_exclusions,
  "hotel_cancel_policy"=>$hotel_cancel_policy,
  "hotel_terms_conditions"=>$hotel_terms_conditions,
  "hotel_images"=>$hotel_images);
$update_hotel_log_data=array(
  "hotel_id"=>$hotel_id,
  "hotel_name"=>$hotel_name,
  "supplier_id"=>$supplier_id,
  "hotel_contact"=>$hotel_contact,
  "hotel_rating"=>$hotel_rating,
  "hotel_address"=>$hotel_address,
  "hotel_description"=>$hotel_description,
  "hotel_country"=>$hotel_country,
  "hotel_city"=>$hotel_city,
  "hotel_season_details"=>$season_details,
  "hotel_markup_details"=>$markup_details,
  "hotel_blackout_dates"=>$blackout_dates,
  "hotel_surcharge_details"=>$surcharge_details,
  "rate_allocation_details"=>$rate_allocation_details,
  "hotel_promotion_details"=>$hotel_promotion_detail,
  "hotel_add_ons"=>$addon_details,
  "hotel_other_policies"=>$policy_details,
  "booking_validity_from"=>$booking_validity_from,
  "booking_validity_to"=>$booking_validity_to,
  "hotel_amenities"=>$hotel_amenities,
  "hotel_inclusions"=>$hotel_inclusions,
  "hotel_exclusions"=>$hotel_exclusions,
  "hotel_cancel_policy"=>$hotel_cancel_policy,
  "hotel_terms_conditions"=>$hotel_terms_conditions,
  "hotel_images"=>$hotel_images,
  "hotel_created_by"=>$hotel_created_by,
  "hotel_create_role"=>$user_role,
  "hotel_operation_performed"=>'UPDATE');
$update_hotel=Hotels::where("hotel_id",$hotel_id)->update($update_hotel_data);
$insert_hotel_log=Hotels_log::insert($update_hotel_log_data);
if($update_hotel)
{
  echo "success";
}
else
{
  echo "fail";
}
}
public function hotel_details($hotel_id)
{
 if(session()->has('travel_users_id'))
 {
   $rights=$this->rights('service-management');
   $countries=Countries::where('country_status',1)->get();
   $currency=Currency::get();
   $hotel_meal=HotelMeal::get();
   $suppliers=Suppliers::where('supplier_status',1)->get();
   $emp_id=session()->get('travel_users_id');
   if(strpos($rights['admin_which'],'view')!==false)
   {
     $get_hotels=Hotels::where('hotel_id',$hotel_id)->first();
   }
   else
   {
    $get_hotels=Hotels::where('hotel_id',$hotel_id)->where('hotel_created_by',$emp_id)->where('hotel_create_role','!=','Supplier')->first();
  }
  if($get_hotels)
  {
    $supplier_id=$get_hotels->supplier_id;
    $get_supplier_countries=Suppliers::where('supplier_status',1)->where('supplier_id',$supplier_id)->first();
    $supplier_countries=$get_supplier_countries->supplier_opr_countries;
    $countries_data=explode(',', $supplier_countries);
    return view('mains.hotel-details-view')->with(compact('countries','currency','cities','suppliers','get_hotels','countries_data','rights','hotel_meal'));
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
public function update_hotel_approval(Request $request)
{
  $id=$request->get('hotel_id');
  $action_perform=$request->get('action_perform');
  if($action_perform=="approve")
  {
    $update_hotel=Hotels::where('hotel_id',$id)->update(["hotel_approve_status"=>1]);
    if($update_hotel)
    {
      echo "success";
    }
    else
    {
      echo "fail";
    }
  }
  else if($action_perform=="reject")
  {
   $update_hotel=Hotels::where('hotel_id',$id)->update(["hotel_approve_status"=>2]);
   if($update_hotel)
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
public function update_hotel_active_inactive(Request $request)
{
  $id=$request->get('hotel_id');
  $action_perform=$request->get('action_perform');
  if($action_perform=="active")
  {
    $update_hotel=Hotels::where('hotel_id',$id)->update(["hotel_status"=>1]);
    if($update_hotel)
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
   $update_hotel=Hotels::where('hotel_id',$id)->update(["hotel_status"=>0]);
   if($update_hotel)
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
public function update_hotel_bestseller(Request $request)
{
  $id=$request->get('hotel_id');
  $action_perform=$request->get('action_perform');
  if($action_perform=="bestselleryes")
  {
    $update_hotel=Hotels::where('hotel_id',$id)->update(["hotel_best_status"=>1]);
    if($update_hotel)
    {
      echo "success";
    }
    else
    {
      echo "fail";
    }
  }
  else if($action_perform=="bestsellerno")
  {
   $update_hotel=Hotels::where('hotel_id',$id)->update(["hotel_best_status"=>0]);
   if($update_hotel)
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
public function sort_hotel(Request $request)
  {
    $sort_activity_array=$request->get('new_data');
    $success_array=array();
    for($count=0;$count<count($sort_activity_array);$count++)
    {
      $hotel_id=$sort_activity_array[$count]['hotel_id'];
      $new_order=$sort_activity_array[$count]['new_order'];
      $update_activity=Hotels::where('hotel_id',$hotel_id)->update(["hotel_show_order"=>$new_order]);
      if($update_activity)
      {
        $success_array[]="success";
      }
      else
      {
        $success_array[]="not_success";
      }
    }
    echo json_encode($success_array);
  }

public function create_guide(Request $request)
{
  if(session()->has('travel_users_id'))
  {
   $rights=$this->rights('service-management');
   $countries=Countries::where('country_status',1)->get();
   $languages=Languages::get();
   $suppliers=Suppliers::where('supplier_status',1)->get();
   return view('mains.admin-create-guide')->with(compact('suppliers','rights','countries','languages'));
 }
 else
 {
  return redirect()->route('index');
}
}
public function insert_guide(Request $request)
{

  $guide_created_by=session()->get('travel_users_id');
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
    $guide_supplier_id=$request->get('guide_supplier_name');
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
       $image_name=$file->getClientOriginalName();
       $guide_image = "guide-".time()."-".$image_name;
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
  $guide->guide_supplier_id=$guide_supplier_id;
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
  if(session()->get('travel_users_role')=="Admin")
  {
   $guide->guide_role="Admin";
 }
 else
 {
  $guide->guide_role="Sub-User";
}
if($guide->save())
{
  $last_id=$guide->id;
  $guide_log=new Guides_log;
  $guide_log->guide_id=$last_id;
  $guide_log->guide_first_name=$guide_first_name;
  $guide_log->guide_last_name=$guide_last_name;
  $guide_log->guide_contact=$guide_contact;
  $guide_log->guide_address=$guide_address;
  $guide_log->guide_supplier_id=$guide_supplier_id;
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
  if(session()->get('travel_users_role')=="Admin")
  {
   $guide_log->guide_role="Admin";
 }
 else
 {
  $guide_log->guide_role="Sub-User";
}
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
  if(session()->has('travel_users_id'))
  {
    $rights=$this->rights('service-management');
    $countries=Countries::where('country_status',1)->get();
    $languages=Languages::get();
    $fetch_vehicle_type=VehicleType::where('vehicle_type_status',1)->get();
    $emp_id=session()->get('travel_users_id');
    if(strpos($rights['admin_which'],'edit_delete')!==false)
    {
      $get_guides=Guides::where('guide_id',$guide_id)->first();
    }
    else
    {
      $get_guides=Guides::where('guide_id',$guide_id)->where('guide_created_by',$emp_id)->where('guide_role',"!=","Supplier")->first();
    }

    if($get_guides)
    {
      $supplier_id=$get_guides->guide_supplier_id;
      $get_supplier_countries=Suppliers::where('supplier_id',$supplier_id)->first();
      $supplier_countries=$get_supplier_countries->supplier_opr_countries;
      $countries_data=explode(',', $supplier_countries);
      $suppliers=Suppliers::where('supplier_status',1)->get();
      $cities=Cities::join("states","states.id","=","cities.state_id")->where("states.country_id", $get_guides->guide_country)->select("cities.*")->orderBy('cities.name','asc')->get();
      return view('mains.admin-edit-guide')->with(compact('languages','countries','cities','get_supplier_countries','get_guides','suppliers',"countries_data",'fetch_vehicle_type','rights'));
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
        // echo "<pre>";
          // print_r($request->all());
          // die();
  $guide_id=$request->get('guide_id');
  $guide_created_by=session()->get('travel_users_id');
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
   $guide_supplier_id=$request->get('guide_supplier_name');
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
    //         if($request->has('tour_name'))
    //         {
    //             $tour_name=$request->get('tour_name');
    //         $tour_guide_cost=$request->get('tour_guide_cost');
    // $guide_tours_cost="";
    //         for($cost_count=0;$cost_count<count($tour_name);$cost_count++)
    //         {
    //           $guide_tours_cost.=$tour_name[$cost_count]."---".$tour_guide_cost[$cost_count]."///";
    //         }

    //         }
    //         else
    //         {
    //           $guide_tours_cost="";
    //         }
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
     $image_name=$guide_logo_file->getClientOriginalName();
     $guide_image = "guide-".time()."-".$image_name;
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
  "guide_supplier_id"=>$guide_supplier_id,
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
  $guide_log->guide_supplier_id=$guide_supplier_id;
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
  if(session()->get('travel_users_role')=="Admin")
  {
   $guide_log->guide_role="Admin";
 }
 else
 {
  $guide_log->guide_role="Sub-User";
}

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
 if(session()->has('travel_users_id'))
 {
   $rights=$this->rights('service-management');
   $countries=Countries::where('country_status',1)->get();
   $languages=Languages::get();
   $fetch_vehicle_type=VehicleType::where('vehicle_type_status',1)->get();
   $emp_id=session()->get('travel_users_id');
   if(strpos($rights['admin_which'],'view')!==false)
   {
    $get_guides=Guides::where('guide_id',$guide_id)->first();
  }
  else
  {
    $get_guides=Guides::where('guide_id',$guide_id)->where('guide_created_by',$emp_id)->where('guide_role',"!=","Supplier")->first();
  }
  if($get_guides)
  {
   $supplier_id=$get_guides->guide_supplier_id;
   $get_supplier_countries=Suppliers::where('supplier_id',$supplier_id)->first();
   $supplier_countries=$get_supplier_countries->supplier_opr_countries;
   $countries_data=explode(',', $supplier_countries);
   $cities=Cities::join("states","states.id","=","cities.state_id")->where("states.country_id", $get_guides->guide_country)->select("cities.*")->orderBy('cities.name','asc')->get();
   $suppliers=Suppliers::where('supplier_status',1)->get();
   return view('mains.admin-guide-details-view')->with(compact('suppliers','countries','cities','get_supplier_countries','get_guides',"countries_data","rights","languages","fetch_vehicle_type"))->with('guide_id',$guide_id);
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
public function update_guide_active_inactive(Request $request)
{
  $id=$request->get('guide_id');
  $action_perform=$request->get('action_perform');
  if($action_perform=="active")
  {
    $update_guide=Guides::where('guide_id',$id)->update(["guide_status"=>1]);
    if($update_guide)
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
   $update_guide=Guides::where('guide_id',$id)->update(["guide_status"=>0]);
   if($update_guide)
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
public function update_guide_approval(Request $request)
{
  $id=$request->get('guide_id');
  $action_perform=$request->get('action_perform');
  if($action_perform=="approve")
  {
    $update_guide=Guides::where('guide_id',$id)->update(["guide_approve_status"=>1]);
    if($update_guide)
    {
      echo "success";
    }
    else
    {
      echo "fail";
    }
  }
  else if($action_perform=="reject")
  {
   $update_guide=Guides::where('guide_id',$id)->update(["guide_approve_status"=>2]);
   if($update_guide)
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
public function update_guide_bestseller(Request $request)
{
  $id=$request->get('guide_id');
  $action_perform=$request->get('action_perform');
  if($action_perform=="bestselleryes")
  {
    $update_guide=Guides::where('guide_id',$id)->update(["guide_best_status"=>1]);
    if($update_guide)
    {
      echo "success";
    }
    else
    {
      echo "fail";
    }
  }
  else if($action_perform=="bestsellerno")
  {
   $update_guide=Guides::where('guide_id',$id)->update(["guide_best_status"=>0]);
   if($update_guide)
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
public function sort_guide(Request $request)
  {
    $sort_activity_array=$request->get('new_data');
    $success_array=array();
    for($count=0;$count<count($sort_activity_array);$count++)
    {
      $guide_id=$sort_activity_array[$count]['guide_id'];
      $new_order=$sort_activity_array[$count]['new_order'];
      $update_guide=Guides::where('guide_id',$guide_id)->update(["guide_show_order"=>$new_order]);
      if($update_guide)
      {
        $success_array[]="success";
      }
      else
      {
        $success_array[]="not_success";
      }
    }
    echo json_encode($success_array);
  }
public function create_sightseeing(Request $request)
{
  if(session()->has('travel_users_id'))
  {
   $rights=$this->rights('service-management');
   $countries=Countries::where('country_status',1)->get();
   $fuel_type=FuelType::get();
        // $currency=Currency::get();
        // $suppliers=Suppliers::where('supplier_status',1)->get();
   return view('mains.create-sightseeing')->with(compact('countries','fuel_type','rights'));
 }
 else
 {
  return redirect()->route('index');
}
}
public function insert_sightseeing(Request $request)
{
 $user_id=session()->get('travel_users_id');
 if(session()->get('travel_users_role')=="Admin")
 {
  $user_role='Admin';
}
else
{
 $user_role='Sub-User';
}
$sightseeing_name=$request->get('sightseeing_name');
$sightseeing_desc=$request->get('sightseeing_desc');
$sightseeing_cities_covered=$request->get('sightseeing_cities_covered');
$sightseeing_country=$request->get('sightseeing_country');
$sightseeing_city_from=$request->get('sightseeing_city_from');
$sightseeing_city_between=$request->get('sightseeing_city_between');
if(!empty($sightseeing_city_between))
{
  $sightseeing_city_between=implode(",",$sightseeing_city_between);
}
$sightseeing_city_to=$request->get('sightseeing_city_to');
$sightseeing_distance=$request->get('sightseeing_distance');
$sightseeing_fuel_type=$request->get('sightseeing_fuel_type');
$sightseeing_total_fuel_cost=$request->get('sightseeing_total_fuel_cost');
$sightseeing_food_cost=$request->get('sightseeing_food_cost');
$sightseeing_hotel_cost=$request->get('sightseeing_hotel_cost');
$sightseeing_tour_expense_entrance=$request->get('sightseeing_tour_expense_entrance');
$sightseeing_adult_cost=$request->get('sightseeing_adult_cost');
$sightseeing_child_cost=$request->get('sightseeing_child_cost');
$sightseeing_attractions=$request->get('tour_attractions');
$sightseeing_images=array();
          //multifile uploading
if($request->hasFile('upload_ativity_images'))
{
 foreach($request->file('upload_ativity_images') as $file)
 {
  $extension=strtolower($file->getClientOriginalExtension());
  if($extension=="png" || $extension=="jpg" || $extension=="jpeg" || $extension=="pdf")
  {
    $image_name=$file->getClientOriginalName();
    $image_sightseeing = "sightseeing-".time()."-".$image_name;
                    // request()->agent_logo->storeAs(public_path('consultant-images'), $imageName);
    $dir1 = 'assets/uploads/sightseeing_images/';
    $file->move($dir1, $image_sightseeing);
    $sightseeing_images[]=$image_sightseeing;
  }
}
}
$sightseeing_images=serialize($sightseeing_images);
$insert_sightseeing=new SightSeeing;
$insert_sightseeing->sightseeing_tour_name=$sightseeing_name;
$insert_sightseeing->sightseeing_tour_desc=$sightseeing_desc;
$insert_sightseeing->sightseeing_country=$sightseeing_country;
$insert_sightseeing->sightseeing_city_covered=$sightseeing_cities_covered;
$insert_sightseeing->sightseeing_city_from=$sightseeing_city_from;
$insert_sightseeing->sightseeing_city_between=$sightseeing_city_between;
$insert_sightseeing->sightseeing_city_to=$sightseeing_city_to;
$insert_sightseeing->sightseeing_distance_covered=$sightseeing_distance;
$insert_sightseeing->sightseeing_fuel_type=$sightseeing_fuel_type;
$insert_sightseeing->sightseeing_total_fuel_cost=$sightseeing_total_fuel_cost;
$insert_sightseeing->sightseeing_food_cost=$sightseeing_food_cost;
$insert_sightseeing->sightseeing_hotel_cost=$sightseeing_hotel_cost;
$insert_sightseeing->sightseeing_total_expense_cost=$sightseeing_tour_expense_entrance;
$insert_sightseeing->sightseeing_adult_cost=$sightseeing_adult_cost;
$insert_sightseeing->sightseeing_child_cost=$sightseeing_child_cost;
$insert_sightseeing->sightseeing_attractions=$sightseeing_attractions;
$insert_sightseeing->sightseeing_images=$sightseeing_images;
$insert_sightseeing->sightseeing_created_by=$user_id;
$insert_sightseeing->sightseeing_create_role=$user_role;
$insert_sightseeing->sightseeing_status=1;
if($insert_sightseeing->save())
{
  $last_id=$insert_sightseeing->id;
  $insert_sightseeing_log=new SightSeeing_log;
  $insert_sightseeing_log->sightseeing_id=$last_id;
  $insert_sightseeing_log->sightseeing_tour_name=$sightseeing_name;
  $insert_sightseeing_log->sightseeing_tour_desc=$sightseeing_desc;
  $insert_sightseeing_log->sightseeing_country=$sightseeing_country;
  $insert_sightseeing_log->sightseeing_city_covered=$sightseeing_cities_covered;
  $insert_sightseeing_log->sightseeing_city_from=$sightseeing_city_from;
  $insert_sightseeing_log->sightseeing_city_between=$sightseeing_city_between;
  $insert_sightseeing_log->sightseeing_city_to=$sightseeing_city_to;
  $insert_sightseeing_log->sightseeing_distance_covered=$sightseeing_distance;
  $insert_sightseeing_log->sightseeing_fuel_type=$sightseeing_fuel_type;
  $insert_sightseeing_log->sightseeing_total_fuel_cost=$sightseeing_total_fuel_cost;
  $insert_sightseeing_log->sightseeing_food_cost=$sightseeing_food_cost;
  $insert_sightseeing_log->sightseeing_hotel_cost=$sightseeing_hotel_cost;
  $insert_sightseeing_log->sightseeing_total_expense_cost=$sightseeing_tour_expense_entrance;
  $insert_sightseeing_log->sightseeing_adult_cost=$sightseeing_adult_cost;
  $insert_sightseeing_log->sightseeing_child_cost=$sightseeing_child_cost;
  $insert_sightseeing_log->sightseeing_attractions=$sightseeing_attractions;
  $insert_sightseeing_log->sightseeing_images=$sightseeing_images;
  $insert_sightseeing_log->sightseeing_created_by=$user_id;
  $insert_sightseeing_log->sightseeing_create_role=$user_role;
  $insert_sightseeing_log->sightseeing_status=1;
  $insert_sightseeing_log->sightseeing_operation="INSERT";
  $insert_sightseeing_log->save();
  echo "success";
}
else
{
  echo "fail";
}
}
public function edit_sightseeing($sightseeing_id)
{
  if(session()->has('travel_users_id'))
  {
    $rights=$this->rights('service-management');
    $countries=Countries::where('country_status',1)->get();
    $emp_id=session()->get('travel_users_id');
    $fuel_type=FuelType::get();
    if(strpos($rights['admin_which'],'edit_delete')!==false)
    {
      $get_sightseeing=SightSeeing::where('sightseeing_id',$sightseeing_id)->first();
    }
    else
    {
      $get_sightseeing=SightSeeing::where('sightseeing_id',$sightseeing_id)->where('sightseeing_created_by',$emp_id)->where('sightseeing_create_role',"!=","Supplier")->first();
    }
    if($get_sightseeing)
    {
      $cities=Cities::join("states","states.id","=","cities.state_id")->where("states.country_id", $get_sightseeing->sightseeing_country)->select("cities.*")->orderBy('cities.name','asc')->get();
      return view('mains.edit-sightseeing')->with(compact('countries','cities','get_sightseeing','rights','fuel_type'));
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
public function update_sightseeing(Request $request)
{
 $user_id=session()->get('travel_users_id');
 if(session()->get('travel_users_role')=="Admin")
 {
  $user_role='Admin';
}
else
{
 $user_role='Sub-User';
}
$sightseeing_id=$request->get('sightseeing_id');
$sightseeing_name=$request->get('sightseeing_name');
$sightseeing_desc=$request->get('sightseeing_desc');
$sightseeing_cities_covered=$request->get('sightseeing_cities_covered');
$sightseeing_country=$request->get('sightseeing_country');
$sightseeing_city_from=$request->get('sightseeing_city_from');
$sightseeing_city_between=$request->get('sightseeing_city_between');
if(!empty($sightseeing_city_between))
{
  $sightseeing_city_between=implode(",",$sightseeing_city_between);
}
$sightseeing_city_to=$request->get('sightseeing_city_to');
$sightseeing_distance=$request->get('sightseeing_distance');
$sightseeing_fuel_type=$request->get('sightseeing_fuel_type');
$sightseeing_total_fuel_cost=$request->get('sightseeing_total_fuel_cost');
$sightseeing_food_cost=$request->get('sightseeing_food_cost');
$sightseeing_hotel_cost=$request->get('sightseeing_hotel_cost');
$sightseeing_tour_expense_entrance=$request->get('sightseeing_tour_expense_entrance');
$sightseeing_adult_cost=$request->get('sightseeing_adult_cost');
$sightseeing_child_cost=$request->get('sightseeing_child_cost');
$sightseeing_attractions=$request->get('tour_attractions');
$sightseeing_images=$request->get('upload_ativity_already_images');
          //multifile uploading
if($request->hasFile('upload_ativity_images'))
{
 foreach($request->file('upload_ativity_images') as $file)
 {
  $extension=strtolower($file->getClientOriginalExtension());
  if($extension=="png" || $extension=="jpg" || $extension=="jpeg" || $extension=="pdf")
  {
    $image_name=$file->getClientOriginalName();
    $image_sightseeing = "sightseeing-".time()."-".$image_name;
                    // request()->agent_logo->storeAs(public_path('consultant-images'), $imageName);
    $dir1 = 'assets/uploads/sightseeing_images/';
    $file->move($dir1, $image_sightseeing);
    $sightseeing_images[]=$image_sightseeing;
  }
}
}
$sightseeing_images=serialize($sightseeing_images);
$update_sightseeing=array(
  "sightseeing_tour_name"=>$sightseeing_name,
  "sightseeing_tour_desc"=>$sightseeing_desc,
  "sightseeing_country"=>$sightseeing_country,
  "sightseeing_city_covered"=>$sightseeing_cities_covered,
  "sightseeing_city_from"=>$sightseeing_city_from,
  "sightseeing_city_between"=>$sightseeing_city_between,
  "sightseeing_city_to"=>$sightseeing_city_to,
  "sightseeing_distance_covered"=>$sightseeing_distance,
  "sightseeing_fuel_type"=>$sightseeing_fuel_type,
  "sightseeing_total_fuel_cost"=>$sightseeing_total_fuel_cost,
  "sightseeing_food_cost"=>$sightseeing_food_cost,
  "sightseeing_hotel_cost"=>$sightseeing_hotel_cost,
  "sightseeing_total_expense_cost"=>$sightseeing_tour_expense_entrance,
  "sightseeing_adult_cost"=>$sightseeing_adult_cost,
  "sightseeing_child_cost"=>$sightseeing_child_cost,
  "sightseeing_attractions"=>$sightseeing_attractions,
  "sightseeing_images"=>$sightseeing_images,
  "sightseeing_created_by"=>$user_id,
  "sightseeing_create_role"=>$user_role,
  "sightseeing_status"=>1);
$update_query=SightSeeing::where('sightseeing_id',$sightseeing_id)->update($update_sightseeing);
if($update_query)
{
  $insert_sightseeing_log=new SightSeeing_log;
  $insert_sightseeing_log->sightseeing_id=$sightseeing_id;
  $insert_sightseeing_log->sightseeing_tour_name=$sightseeing_name;
  $insert_sightseeing_log->sightseeing_tour_desc=$sightseeing_desc;
  $insert_sightseeing_log->sightseeing_country=$sightseeing_country;
  $insert_sightseeing_log->sightseeing_city_covered=$sightseeing_cities_covered;
  $insert_sightseeing_log->sightseeing_city_from=$sightseeing_city_from;
  $insert_sightseeing_log->sightseeing_city_between=$sightseeing_city_between;
  $insert_sightseeing_log->sightseeing_city_to=$sightseeing_city_to;
  $insert_sightseeing_log->sightseeing_distance_covered=$sightseeing_distance;
  $insert_sightseeing_log->sightseeing_fuel_type=$sightseeing_fuel_type;
  $insert_sightseeing_log->sightseeing_total_fuel_cost=$sightseeing_total_fuel_cost;
  $insert_sightseeing_log->sightseeing_food_cost=$sightseeing_food_cost;
  $insert_sightseeing_log->sightseeing_hotel_cost=$sightseeing_hotel_cost;
  $insert_sightseeing_log->sightseeing_total_expense_cost=$sightseeing_tour_expense_entrance;
  $insert_sightseeing_log->sightseeing_adult_cost=$sightseeing_adult_cost;
  $insert_sightseeing_log->sightseeing_child_cost=$sightseeing_child_cost;
  $insert_sightseeing_log->sightseeing_attractions=$sightseeing_attractions;
  $insert_sightseeing_log->sightseeing_images=$sightseeing_images;
  $insert_sightseeing_log->sightseeing_created_by=$user_id;
  $insert_sightseeing_log->sightseeing_create_role=$user_role;
  $insert_sightseeing_log->sightseeing_status=1;
  $insert_sightseeing_log->sightseeing_operation="UPDATE";
  $insert_sightseeing_log->save();
  echo "success";
}
else
{
  echo "fail";
}
}
public function sightseeing_details($sightseeing_id)
{
 if(session()->has('travel_users_id'))
 {
   $rights=$this->rights('service-management');
   $countries=Countries::where('country_status',1)->get();
   $emp_id=session()->get('travel_users_id');
   $fuel_type=FuelType::get();
   if(strpos($rights['admin_which'],'view')!==false)
   {
    $get_sightseeing=SightSeeing::where('sightseeing_id',$sightseeing_id)->first();
  }
  else
  {
   $get_sightseeing=SightSeeing::where('sightseeing_id',$sightseeing_id)->where('sightseeing_created_by',$emp_id)->where('sightseeing_create_role',"!=","Supplier")->first();
 }
 if($get_sightseeing)
 {
   $cities=Cities::join("states","states.id","=","cities.state_id")->where("states.country_id", $get_sightseeing->sightseeing_country)->select("cities.*")->orderBy('cities.name','asc')->get();
   return view('mains.sightseeing-details')->with(compact('countries','cities','get_sightseeing',"rights","fuel_type"))->with('sightseeing_id',$sightseeing_id);
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
public function update_sightseeing_active_inactive(Request $request)
{
  $id=$request->get('sightseeing_id');
  $action_perform=$request->get('action_perform');
  if($action_perform=="active")
  {
    $update_sightseeing=SightSeeing::where('sightseeing_id',$id)->update(["sightseeing_status"=>1]);
    if($update_sightseeing)
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
   $update_sightseeing=SightSeeing::where('sightseeing_id',$id)->update(["sightseeing_status"=>0]);
   if($update_sightseeing)
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


public function update_sightseeing_bestseller(Request $request)
{
  $id=$request->get('sightseeing_id');
  $action_perform=$request->get('action_perform');
  if($action_perform=="bestselleryes")
  {
    $update_sightseeing=SightSeeing::where('sightseeing_id',$id)->update(["sightseeing_best_status"=>1]);
    if($update_sightseeing)
    {
      echo "success";
    }
    else
    {
      echo "fail";
    }
  }
  else if($action_perform=="bestsellerno")
  {
   $update_sightseeing=SightSeeing::where('sightseeing_id',$id)->update(["sightseeing_best_status"=>0]);
   if($update_sightseeing)
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

public function sort_sightseeing(Request $request)
  {
    $sort_activity_array=$request->get('new_data');
    $success_array=array();
    for($count=0;$count<count($sort_activity_array);$count++)
    {
      $sightseeing_id=$sort_activity_array[$count]['sightseeing_id'];
      $new_order=$sort_activity_array[$count]['new_order'];
      $update_sightseeing=Sightseeing::where('sightseeing_id',$sightseeing_id)->update(["sightseeing_show_order"=>$new_order]);
      if($update_sightseeing)
      {
        $success_array[]="success";
      }
      else
      {
        $success_array[]="not_success";
      }
    }
    echo json_encode($success_array);
  }

public function agent_bookings(Request $request)
{
  if(session()->has('travel_users_id'))
  {
    $agent_id=session()->get('travel_users_id');
    $fetch_bookings=Bookings::get();
    return view('mains.agent-bookings')->with(compact('fetch_bookings'));
  }
  else
  {
    return redirect()->route('index');
  }
}
public function customer_bookings(Request $request)
{
  if(session()->has('travel_users_id'))
  {
    $agent_id=session()->get('travel_users_id');
    $fetch_bookings=BookingCustomer::get();
    return view('mains.customer-bookings')->with(compact('fetch_bookings'));
  }
  else
  {
    return redirect()->route('index');
  }
}
public function pdf(Request $request)
{
  $data="hello";
   $pdf = PDF::loadView('pdf.invoice',["data"=>$data]);
  return $pdf->stream();
  // return view('pdf.invoice',["data"=>$data]); 
}
}