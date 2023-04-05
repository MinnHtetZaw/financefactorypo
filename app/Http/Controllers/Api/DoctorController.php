<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiBaseController;
use App\Http\Resources\BookingResource;
use App\Events\TestingEvent;
use App\Day;
use App\Doctor;
use App\DoctorTime;
use App\Booking;
use App\ScheduleChangeLog;
use App\DoctorNotification;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class DoctorController extends ApiBaseController
{

	public function testEvent(){

		$test = 'Hello Pusher with Noti third Time';

		event(new TestingEvent($test));
	}



    /*public function DoctorProfile(Request $request){

    	$validator = Validator::make($request->all(), [
			'user_id' => 'required',
		]);

		if ($validator->fails()) {

			return $this->sendFailResponse();

		}

		$doctor = Doctor::where('user_id', $request->user_id)->with('doc_edu')->with('doc_exp')->with('day')->first();

		if (empty($doctor)) {

			return $this->sendFailResponse();
		}

		$doc_time = DoctorTime::all();

		$successStatus = 200;

		$doctor->photo = url("/") . '/image/' . $doctor->photo;

		return response()->json([
    		"message" => "Successful",
    		"status" => $successStatus,
    		"doctor" => $doctor,
    		"doctor_time" => $doc_time,
    		
    	]);

    }

    public function DoctorBookingList(Request $request){

    	$validator = Validator::make($request->all(), [
			'user_id' => 'required',
			'date' => 'required',
		]);

		if ($validator->fails()) {

			return $this->sendFailResponse();

		}

		$format_date = date('Y-m-d', strtotime($request->date));

		$doctor = Doctor::where('user_id', $request->user_id)->first();

		$booking_lists = Booking::where('doctor_id', $doctor->id)->where('booking_date', $format_date)->get();

		$final_booking_lists = BookingResource::collection($booking_lists);

		return $this->sendSuccessResponse('format_date', $final_booking_lists);
    }

    public function ChangeScheduleRequest(Request $request){

    	$validator = Validator::make($request->all(), [
			'user_id' => 'required',
			'request_date' => 'required',
			'request_time' => 'required',
			'date' => 'required',
			'time' => 'required',
			'type' => 'required',
		]);

		if ($validator->fails()) {

			return $this->sendFailResponse();
		}

		$format_request_date = date('Y-m-d', strtotime($request->request_date));

		$format_date = date('Y-m-d', strtotime($request->date));

		$format_request_time = date('H:i:s', strtotime($request->request_time));

		$format_time = date('H:i:s', strtotime($request->time));

		$doctor = Doctor::where('user_id', $request->user_id)->first();

		$change_schedule_log = ScheduleChangeLog::create([
			'request_date' => $format_request_date,
            'request_time' => $format_request_time,
            'date' => $format_date,
            'time' => $format_time,
            'status' => 1,
            'type' => $request->type,
            'doctor_id' => $doctor->id,
		]);

		return $this->sendSuccessResponse('data', $change_schedule_log);
    }

    public function CheckNotification(Request $request){

    	$validator = Validator::make($request->all(), [
			'user_id' => 'required',
		]);

		if ($validator->fails()) {

			return $this->sendFailResponse();
		}

		$doctor = Doctor::where('user_id', $request->user_id)->first();

		$doc_noti = DoctorNotification::where('doctor_id', $doctor->id)->get();

		$count = count($doc_noti);

		return $this->sendSuccessMultiResponse('data', $doc_noti , 'count',$count);

    }

    public function ChangeNotiStatus(Request $request){

    	$validator = Validator::make($request->all(), [
			'user_id' => 'required',
			'noti_id' => 'required',
		]);

		if ($validator->fails()) {

			return $this->sendFailResponse();
		}

		$doctor = Doctor::where('user_id', $request->user_id)->first();

		$doc_noti = DoctorNotification::where('doctor_id', $doctor->id)->where('id', $request->noti_id)->first();


		$doc_noti->status = 2;

		$doc_noti->save();

		return $this->sendSuccessResponse('data', $doc_noti);

	}*/
}
