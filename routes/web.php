	<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/','LoginController@index')->name('index');
Route::get('/home','LoginController@home')->name('home');
Route::post('/login-check','LoginController@login_check')->name('login-check');
Route::get('/logout','LoginController@logout')->name('logout');

// menus
Route::get('/menu','LoginController@menu')->name('menu');
Route::post('/menu-insert','LoginController@menu_insert')->name('menu-insert');

// languages
Route::get('/languages','LoginController@languages')->name('languages');
Route::post('/languages-insert','LoginController@languages_insert')->name('languages-insert');

// vehicle type
Route::get('/vehicle-type','LoginController@vehicle_type')->name('vehicle-type');
Route::post('/vehicle-type-insert','LoginController@vehicle_type_insert')->name('vehicle-type-insert');

// vehicle type cost
Route::get('/vehicle-type-cost','LoginController@vehicle_type_cost')->name('vehicle-type-cost');
Route::post('/vehicle-type-cost-insert','LoginController@vehicle_type_cost_insert')->name('vehicle-type-cost-insert');
Route::post('/vehicle-type-cost-update','LoginController@vehicle_type_cost_update')->name('vehicle-type-cost-update');

// fuel type cost
Route::get('/fuel-type-cost','LoginController@fuel_type')->name('fuel-type-cost');
Route::post('/fuel-type-cost-insert','LoginController@fuel_type_insert')->name('fuel-type-cost-insert');
Route::post('/fuel-type-cost-update','LoginController@fuel_type_update')->name('fuel-type-cost-update');

// hotel meals
Route::get('/hotel-meal','LoginController@hotel_meal')->name('hotel-meal');
Route::post('/hotel-meal-insert','LoginController@hotel_meal_insert')->name('hotel-meal-insert');

// amenities
Route::get('/amenities','LoginController@amenities')->name('amenities');
Route::get('/fetchAmenitiesName','LoginController@fetchAmenitiesName')->name('fetchAmenitiesName');
Route::post('/amenities-insert','LoginController@amenities_insert')->name('amenities-insert');
Route::post('/update-amenities-active','LoginController@update_amenities_active')->name('update-amenities-active');

// sub amenities

Route::get('/sub-amenities','LoginController@sub_amenities')->name('sub-amenities');
Route::get('/fetchSubAmenitiesName','LoginController@fetchSubAmenitiesName')->name('fetchSubAmenitiesName');
Route::post('/sub-amenities-insert','LoginController@sub_amenities_insert')->name('sub-amenities-insert');
Route::post('/update-sub-amenities-active','LoginController@update_sub_amenities_active')->name('update-sub-amenities-active');

//guide cost
Route::get('/guide-expense-cost','LoginController@guide_expense')->name('guide-expense-cost');
Route::post('/guide-expense-cost-insert','LoginController@guide_expense_insert')->name('guide-expense-cost-insert');
Route::post('/guide-expense-cost-update','LoginController@guide_expense_update')->name('guide-expense-cost-update');


//Enquiry
Route::get('/create-enquiry','EnquiryController@create_enquiry')->name('create-enquiry');
Route::post('/insert-enquiry','EnquiryController@insert_enquiry')->name('insert-enquiry');
Route::get('/view-enquiry','EnquiryController@view_enquiry')->name('view-enquiry');

Route::get('/search-enquiry','EnquiryController@search_enquiry')->name('search-enquiry');
Route::get('/edit-enquiry/{enq_id}','EnquiryController@edit_enquiry')->name('edit-enquiry');
Route::post('/update-enquiry','EnquiryController@update_enquiry')->name('update-enquiry');
Route::get('/enquiry-details/{enq_id}','EnquiryController@enquiry_details')->name('enquiry-details');
Route::post('/insert-comments','EnquiryController@insert_comments')->name('insert-comments');

Route::get('/search_mobile_enquiry','EnquiryController@search_mobile_enquiry')->name('search_mobile_enquiry');
Route::get('/enq_data_search','EnquiryController@enq_data_search')->name('enq_data_search');
//enquiry followup
Route::get('/view-enquiry-followup','EnquiryController@view_enquiry_followup')->name('view-enquiry-followup');
Route::get('/enquiry_view_filter_followup','EnquiryController@enquiry_view_filter_followup')->name('enquiry_view_filter_followup');
//Enquiry filters
Route::get('/enquiry_view_filter','EnquiryController@enquiry_view_filter')->name('enquiry_view_filter');
Route::get('/enquiry_search_filter','EnquiryController@enquiry_search_filter')->name('enquiry_search_filter');
//USER
Route::get('/user-management','UserManagement@user_management')->name('user-management');
Route::get('/create-user','UserManagement@create_user')->name('create-user');
Route::post('/insert-user','UserManagement@insert_user')->name('insert-user');
Route::get('/edit-user/{users_id}','UserManagement@edit_user')->name('edit-user');
Route::post('/update-user','UserManagement@update_user')->name('update-user');
Route::get('/user-details/{users_id}','UserManagement@user_details')->name('user-details');

//USER RIGHTS
Route::get('/user-rights','UserManagement@user_rights')->name('user-rights');
Route::post('/user-rights-insert','UserManagement@user_rights_insert')->name('user-rights-insert');
Route::get('/user-rights-fetch','UserManagement@user_rights_fetch')->name('user-rights-fetch');

//SUPPLIER
Route::get('/supplier-management','SupplierManagement@supplier_management')->name('supplier-management');
Route::get('/create-supplier','SupplierManagement@create_supplier')->name('create-supplier');
Route::post('/insert-supplier','SupplierManagement@insert_supplier')->name('insert-supplier');
Route::get('/edit-supplier/{supplier_id}','SupplierManagement@edit_supplier')->name('edit-supplier');
Route::post('/update-supplier','SupplierManagement@update_supplier')->name('update-supplier');
Route::get('/supplier-details/{supplier_id}','SupplierManagement@supplier_details')->name('supplier-details');
Route::post('/update-supplier-active','SupplierManagement@update_supplier_active_inactive')->name('update-supplier-active');
Route::post('/supplier-change-password','SupplierManagement@change_password')->name('supplier-change-password');




//AGENTS
Route::get('/agent-management','AgentManagement@agent_management')->name('agent-management');
Route::get('/create-agent','AgentManagement@create_agent')->name('create-agent');
Route::post('/insert-agent','AgentManagement@insert_agent')->name('insert-agent');
Route::get('/edit-agent/{agent_id}','AgentManagement@edit_agent')->name('edit-agent');
Route::post('/update-agent','AgentManagement@update_agent')->name('update-agent');
Route::get('/agent-details/{agent_id}','AgentManagement@agent_details')->name('agent-details');
Route::post('/update-agent-active','AgentManagement@update_agent_active_inactive')->name('update-agent-active');
Route::post('/agent-change-password','AgentManagement@change_password')->name('agent-change-password');




//SERVICE MANAGEMENT HELPERS
Route::get('/search-supplier-country','ServiceManagement@search_supplier_country')->name('search-supplier-country');
Route::get('/search-country-cities','ServiceManagement@search_country_cities')->name('search-country-cities');
Route::get('/searchCities','ServiceManagement@searchCities')->name('searchCities');
Route::get('/searchSightseeingTour','ServiceManagement@searchSightseeingTour')->name('searchSightseeingTour');
Route::get('/searchSightseeingTourName','ServiceManagement@searchSightseeingTourName')->name('searchSightseeingTourName');
Route::get('/searchFuelCost','ServiceManagement@searchFuelCost')->name('searchFuelCost');
Route::get('/searchActivity','ServiceManagement@searchActivity')->name('searchActivity');
Route::get('/searchHotel','ServiceManagement@searchHotel')->name('searchHotel');
Route::get('/searchGuide','ServiceManagement@searchGuide')->name('searchGuide');
Route::get('/searchItinerary','ServiceManagement@searchItinerary')->name('searchItinerary');
Route::get('/searchSupplier','ServiceManagement@searchSupplier')->name('searchSupplier');
Route::get('/searchAgent','ServiceManagement@searchAgent')->name('searchAgent');
Route::get('/service-management','ServiceManagement@service_management')->name('service-management');

//ACTIVITY
Route::get('/create-activity','ServiceManagement@create_activity')->name('create-activity');
Route::post('/insert-activity','ServiceManagement@insert_activity')->name('insert-activity');
Route::get('/edit-activity/{activity_id}','ServiceManagement@edit_activity')->name('edit-activity');
Route::post('/update-activity','ServiceManagement@update_activity')->name('update-activity');
Route::get('/activity-details/{activity_id}','ServiceManagement@activity_details')->name('activity-details');
Route::post('/update-activity-approval','ServiceManagement@update_activity_approval')->name('update-activity-approval');
Route::post('/update-activity-active','ServiceManagement@update_activity_active_inactive')->name('update-activity-active');
Route::post('/update-activity-bestseller','ServiceManagement@update_activity_bestseller')->name('update-activity-bestseller');
Route::post('/sort-activity','ServiceManagement@sort_activity')->name('sort-activity');

//TRANSPORT
Route::get('/create-transport','ServiceManagement@create_transport')->name('create-transport');
Route::post('/insert-transport','ServiceManagement@insert_transport')->name('insert-transport');
Route::get('/edit-transport/{transport_id}','ServiceManagement@edit_transport')->name('edit-transport');
Route::post('/update-transport','ServiceManagement@update_transport')->name('update-transport');
Route::get('/transport-details/{transport_id}','ServiceManagement@transport_details')->name('transport-details');
Route::post('/update-transport-approval','ServiceManagement@update_transport_approval')->name('update-transport-approval');
Route::post('/update-transport-active','ServiceManagement@update_transport_active_inactive')->name('update-transport-active');

//HOTELS
Route::get('/create-hotel','ServiceManagement@create_hotel')->name('create-hotel');
Route::post('/insert-hotel','ServiceManagement@insert_hotel')->name('insert-hotel');
Route::get('/edit-hotel/{hotel_id}','ServiceManagement@edit_hotel')->name('edit-hotel');
Route::post('/update-hotel','ServiceManagement@update_hotel')->name('update-hotel');
Route::get('/hotel-details/{hotel_id}','ServiceManagement@hotel_details')->name('hotel-details');
Route::post('/update-hotel-approval','ServiceManagement@update_hotel_approval')->name('update-hotel-approval');
Route::post('/update-hotel-active','ServiceManagement@update_hotel_active_inactive')->name('update-hotel-active');
Route::post('/update-hotel-bestseller','ServiceManagement@update_hotel_bestseller')->name('update-hotel-bestseller');
Route::post('/sort-hotel','ServiceManagement@sort_hotel')->name('sort-hotel');

//SIGHTSEEING
Route::get('/create-sightseeing','ServiceManagement@create_sightseeing')->name('create-sightseeing');
Route::post('/insert-sightseeing','ServiceManagement@insert_sightseeing')->name('insert-sightseeing');
Route::get('/edit-sightseeing/{sightseeing_id}','ServiceManagement@edit_sightseeing')->name('edit-sightseeing');
Route::post('/update-sightseeing','ServiceManagement@update_sightseeing')->name('update-sightseeing');
Route::get('/sightseeing-details/{sightseeing_id}','ServiceManagement@sightseeing_details')->name('sightseeing-details');
// Route::post('/update-sightseeing-approval','ServiceManagement@update_sightseeing_approval')->name('update-sightseeing-approval');
Route::post('/update-sightseeing-active','ServiceManagement@update_sightseeing_active_inactive')->name('update-sightseeing-active');
Route::post('/update-sightseeing-bestseller','ServiceManagement@update_sightseeing_bestseller')->name('update-sightseeing-bestseller');
Route::post('/sort-sightseeing','ServiceManagement@sort_sightseeing')->name('sort-sightseeing');

//GUIDE
Route::get('/guide-management','ServiceManagement@guide_management')->name('admin-guide-management');
Route::get('/create-guide','ServiceManagement@create_guide')->name('admin-create-guide');
Route::post('/insert-guide','ServiceManagement@insert_guide')->name('admin-insert-guide');
Route::get('/edit-guide/{guide_id}','ServiceManagement@edit_guide')->name('admin-edit-guide');
Route::post('/update-guide','ServiceManagement@update_guide')->name('admin-update-guide');
Route::get('/guide-details/{guide_id}','ServiceManagement@guide_details')->name('admin-guide-details');
Route::post('/update-guide-approval','ServiceManagement@update_guide_approval')->name('admin-update-guide-approval');
Route::post('/update-guide-active','ServiceManagement@update_guide_active_inactive')->name('admin-update-guide-active');
Route::post('/update-guide-bestseller','ServiceManagement@update_guide_bestseller')->name('admin-update-guide-bestseller');
Route::post('/sort-guide','ServiceManagement@sort_guide')->name('sort-guide');



Route::get('/agent-bookings','ServiceManagement@agent_bookings')->name('bookings');
Route::get('/customer-bookings','ServiceManagement@customer_bookings')->name('customer-bookings');

Route::get('/pdf','ServiceManagement@pdf')->name('pdf');


//suppliers
Route::group(['prefix' => 'supplier'], function() 
{
		Route::get('/','SupplierController@index')->name('index');
		Route::get('/supplier-home','SupplierController@supplier_home')->name('supplier-home');
		Route::post('/supplier-login-check','SupplierController@supplier_login_check')->name('supplier-login-check');
		Route::get('/supplier-logout','SupplierController@supplier_logout')->name('supplier-logout');
		//suppliermanagemant

		Route::get('/register-supplier','SupplierController@register_supplier')->name('register-supplier');
		Route::post('/insert-new-supplier','SupplierController@insert_supplier')->name('insert-new-supplier');
		Route::get('/supplier-profile','SupplierController@supplier_profile')->name('supplier-profile');

		//hotel
		Route::get('/supplier-hotel','SupplierController@supplier_hotel')->name('supplier-hotel');
		Route::get('/supplier-create-hotel','SupplierController@supplier_create_hotel')->name('supplier-create-hotel');
		Route::get('/supplier-hotel-details/{hotel_id}','SupplierController@supplier_hotel_details')->name('supplier-hotel-details');
		Route::get('/supplier-edit-hotel/{hotel_id}','SupplierController@supplier_edit_hotel')->name('supplier-edit-hotel');
		//Activity
		Route::get('/supplier-activity','SupplierController@supplier_activity')->name('supplier-activity');
		Route::get('/supplier-create-activity','SupplierController@supplier_create_activity')->name('supplier-create-activity');
		Route::get('/supplier-activity-details/{activity_id}','SupplierController@supplier_activity_details')->name('supplier-activity-details');
		Route::get('/supplier-edit-activity/{activity_id}','SupplierController@supplier_edit_activity')->name('supplier-edit-activity');
		//Transport
		Route::get('/supplier-transport','SupplierController@supplier_transport')->name('supplier-transport');
		//todaywork
		Route::get('/supplier-create-transport','SupplierController@supplier_create_transport')->name('supplier-create-transport');
		Route::get('/supplier-transport-details/{transport_id}','SupplierController@supplier_transport_details')->name('supplier-transport-details');
		Route::get('/supplier-edit-transport/{transport_id}','SupplierController@supplier_edit_transport')->name('supplier-edit-transport');

		//GUIDE
		Route::get('/guide-management','SupplierController@guide_management')->name('supplier-guide');
		Route::get('/create-guide','SupplierController@create_guide')->name('supplier-create-guide');
		Route::post('/insert-guide','SupplierController@insert_guide')->name('supplier-insert-guide');
		Route::get('/edit-guide/{guide_id}','SupplierController@edit_guide')->name('supplier-edit-guide');
		Route::post('/update-guide','SupplierController@update_guide')->name('supplier-update-guide');
		Route::get('/guide-details/{guide_id}','SupplierController@guide_details')->name('supplier-guide-details');
		Route::post('/update-guide-active','SupplierController@update_guide_active_inactive')->name('supplier-update-guide-active');


		Route::get('/supplier-bookings','SupplierController@supplier_bookings')->name('supplier-bookings');



});


