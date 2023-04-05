<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

/*Route::post('SearchResult', 'Api\PatientController@SearchResult');*/

//


Route::post('SocialLogin', 'Api\LoginController@socialLogin');

Route::post('NormalLogin', 'Api\LoginController@normalLogin');

Route::post('Register', 'Api\LoginController@register');

Route::post('Logout', 'Api\LoginController@logout')->middleware('auth:api');

Route::group(['middleware' => ['auth:api']], function () {

	Route::post('PatientProfile','Api\PatientController@PatientProfile');

	Route::post('EditPatientProfile','Api\PatientController@editPatientProfile');

	Route::post('PatientDashboard', 'Api\PatientController@PatientDashboard');

	Route::post('BookingDashboard', 'Api\PatientController@BookingDashboard');	

	Route::post('DateSearch', 'Api\PatientController@DateSearchResult');

	Route::post('DepartmentSearch', 'Api\PatientController@DepartmentSearch');

	Route::post('DateandDepartmentSearch', 'Api\PatientController@DateandDepartmentSearch');

	Route::post('CheckDoctorAvailability', 'Api\PatientController@CheckDoctorAvailability');
	
	Route::post('CheckDoctorProfile', 'Api\PatientController@CheckDoctorProfile');

	Route::post('StateandTownList', 'Api\PatientController@StateandTownList');	
	
	Route::post('GetToken', 'Api\PatientController@GetToken'); //Floor ID (Fixed)

	Route::post('PatientBookingList', 'Api\PatientController@PatientBookingList');

	Route::post('patient/online/bookings', 'Api\PatientController@PatientOnlineBookings');

	Route::post('CancelBooking', 'Api\PatientController@CancelBooking');	
	
	Route::post('confirmBooking', 'Api\PatientController@confirmBooking');
	
	Route::post('userRevisedLists', 'Api\PatientController@userRevisedLists');
	
	Route::post('patient/history', 'Api\PatientController@patientHistory');


//advertisement
Route::get('advertisements/lists', 'Api\AdvertisementController@advertisementLists');
Route::post('advertisements/details', 'Api\AdvertisementController@advertisementDetail');
//announcement
Route::get('announcements/lists', 'Api\AdvertisementController@announcementLists');
Route::post('announcements/details', 'Api\AdvertisementController@announcementDetail');


});
Route::post('Fire_event', 'Api\DoctorController@testEvent');


// Get list of meetings.
Route::get('/meetings', 'Api\MeetingController@list');

// Create meeting room using topic, agenda, start_time.
Route::post('/meetings', 'Api\MeetingController@create');

// Get information of the meeting room by ID.
Route::get('/meetings/{id}', 'Api\MeetingController@get');
Route::patch('/meetings/{id}', 'Api\MeetingController@update');
Route::delete('/meetings/{id}', 'Api\MeetingController@delete');
