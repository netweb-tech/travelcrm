<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('getCountries','ApiController@getCountries')->name('getCountries');
Route::get('getLanguages','ApiController@getLanguages')->name('getLanguages');
Route::post('getCities','ApiController@getCities')->name('getCities');

Route::get('activity/fetchActivites','ApiController@fetchActivites')->name('fetchActivites');
Route::post('activity/filteredfetchActivites','ApiController@filteredfetchActivites')->name('filteredfetchActivites');
Route::post('activity/activityDetailView','ApiController@activityDetailView')->name('activityDetailView');
Route::post('activity/activityBooked','ApiController@activityBooked')->name('activityBooked');


Route::get('hotel/fetchHotels','ApiController@fetchHotels')->name('fetchHotels');
Route::post('hotel/filteredfetchHotels','ApiController@filteredfetchHotels')->name('filteredfetchHotels');
Route::post('hotel/hotelDetailView','ApiController@hotelDetailView')->name('hotelDetailView');
Route::post('hotel/hotelBooked','ApiController@hotelBooked')->name('hotelBooked');

Route::get('guide/fetchGuides','ApiController@fetchGuides')->name('fetchGuides');
Route::post('guide/filteredfetchGuides','ApiController@filteredfetchGuides')->name('filteredfetchGuides');
Route::post('guide/guideDetailView','ApiController@guideDetailView')->name('guideDetailView');
Route::post('guide/guideBooked','ApiController@guideBooked')->name('guideBooked');

Route::get('sightseeing/fetchSightseeing','ApiController@fetchSightseeing')->name('fetchSightseeing');
Route::post('sightseeing/filteredfetchSightseeing','ApiController@filteredfetchSightseeing')->name('filteredfetchSightseeing');
Route::post('sightseeing/sightseeingDetailView','ApiController@sightseeingDetailView')->name('sightseeingDetailView');
Route::post('sightseeing/fetchGuidesSightseeing','ApiController@fetchGuidesSightseeing')->name('fetchGuidesSightseeing');
Route::post('sightseeing/sightseeingBooked','ApiController@sightseeingBooked')->name('sightseeingBooked');


Route::get('itinerary/fetchItinerary','ApiController@fetchItinerary')->name('fetchItinerary');
Route::post('itinerary/filteredfetchItinerary','ApiController@filteredfetchItinerary')->name('filteredfetchItinerary');
Route::post('itinerary/itineraryDetailView','ApiController@itineraryDetailView')->name('itineraryDetailView');
Route::post('itinerary/itineraryBooked','ApiController@itineraryBooked')->name('itineraryBooked');

Route::post('itinerary/itinerary-get-hotels','ApiController@itinerary_get_hotels')->name('itinerary-get-hotels');
Route::post('itinerary/itinerary-get-activities','ApiController@itinerary_get_activities')->name('itinerary-get-activities');
Route::post('itinerary/itinerary-get-sightseeing','ApiController@itinerary_get_sightseeing')->name('itinerary-get-sightseeing');