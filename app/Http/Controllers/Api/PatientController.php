<?php

namespace App\Http\Controllers\Api;

use App\Day;
use App\Town;
use App\User;
use Datetime;
use App\Floor;
use App\State;
use App\Doctor;
use App\Booking;
use App\Patient;
use App\Department;
use App\DoctorInfo;
use App\Announcement;
use App\Advertisement;
use App\Traits\ZoomJWT;
use App\ScheduleChangeLog;
use Illuminate\Http\Request;
use App\Http\Resources\DateResource;
use App\Http\Resources\DoctorResource;
use App\Http\Resources\BookingResource;
use App\Http\Resources\PatientResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ApiBaseController;
use App\Http\Resources\AnnouncementResource;
use App\Http\Resources\AdvertisementResource;
use App\Http\Resources\PatientOnlineBookingResource;

class PatientController extends ApiBaseController
{

	use ZoomJWT;

	const MEETING_TYPE_INSTANT = 1;
	const MEETING_TYPE_SCHEDULE = 2;
	const MEETING_TYPE_RECURRING = 3;
	const MEETING_TYPE_FIXED_RECURRING_FIXED = 8;


	protected function today(){

		$now = new DateTime;

		$today = strtotime($now->format('Y-m-d'));

		return $today;
	}
	
	protected function PatientProfile(Request $request){

		$user = User::find($request->user()->id);

		$patient = Patient::where('user_id', $user->id)->with('user')->get();

		$final_patient = PatientResource::collection($patient);		
        
        return $this->sendSuccessResponse('patient_profile', $final_patient);
	}


	//Need to Finish
	protected function editPatientProfile(Request $request){

		$user = $request->user();

		$patient = Patient::where('user_id', $user->id)->first();

		return $this->sendSuccessResponse('patient_profile', $user);
	}

	//Need to Finish
	protected function changePassword(Request $request){
	}

	//Need to Finish
	protected function verifyPatient(Request $request){
	}

	protected function PatientDashboard(Request $request){

		$today = $this->today();

		$now = date('Y-m-d', $today);

		$announcement = Announcement::where('expired_at', '>' , $now)->get();

		$advertisement = Advertisement::where('expired_at', '>', $now)->get();

		$image_announcement = AnnouncementResource::collection($announcement);

		$image_advertisement = AdvertisementResource::collection($advertisement);

		return response()->json([
                'announcement' => $image_announcement,               
                'advertisement' => $image_advertisement,               
                'success' => true,
                'message' => 'Successful'
        ]);
	}

	protected function BookingDashboard(Request $request){

		$doctors = Doctor::all();

		$final_docs = DoctorResource::collection($doctors);

		$departments = Department::where('status', 1)->select('id','name','photo_path','department_code')->get();

		$url = url("/") . '/image/Department_Image/' ;

		foreach ($departments as $dept) {
			
			$dept->photo_path = $url . $dept->photo_path;
		}

		return response()->json([
                'doctors' => $final_docs,               
                'departments' => $departments,               
                'success' => true,
                'message' => 'Successful'
        ]);
	}

	protected function DateSearchResult(Request $request){

		$today = $this->today();

		$validator = Validator::make($request->all(), [
			'check_date' => 'required|date_format:d-m-Y|after:today'
		]);

		if ($validator->fails()) {

			return $this->sendFailResponse("Something Wrong Validation!","422");
		}

		$string_check_date = strtotime(request('check_date'));

		$day_name = date('l', $string_check_date);

		$day = Day::where('name', $day_name)->first();

		$doctors = $day->doctors;

		$date_range = ($string_check_date - $today);

		$doctor_lists = array();

		foreach ($doctors as $doc) {

			$doc_range = explode("-", $doc->doc_info->booking_range);

			if($date_range < ( (7 * 86400) * $doc_range[0])){

				array_push($doctor_lists, $doc);
			}

		}

		$final_doctors = DoctorResource::collection($doctor_lists);

		return $this->sendSuccessResponse('doctor_list', $final_doctors);
	}

	protected function DepartmentSearch(Request $request){

		$validator = Validator::make($request->all(), [
			'department' => 'required'
		]);

		if ($validator->fails()) {

			return $this->sendFailResponse("Something Wrong!","422");
		}

		$doctors = Doctor::where('department_id', $request->department)->get();

		$final_doctors = DoctorResource::collection($doctors);

		return $this->sendSuccessResponse('doctor_list', $final_doctors);
	}

	protected function DateandDepartmentSearch(Request $request){

		$today = $this->today();

		$validator = Validator::make($request->all(), [
			'department' => 'required',
			'check_date' => 'required|date_format:d-m-Y|after:today'
		]);

		if ($validator->fails()) {

			return $this->sendFailResponse("Something Wrong!","422");
		}

		$string_check_date = strtotime(request('check_date'));

		$day_name = date('l', $string_check_date);

		$day = Day::where('name', $day_name)->first();

		$doctors = $day->doctors()->where('department_id', $request->department)->get();

		$date_range = ($string_check_date - $today);

		$doctor_lists = array();

		foreach ($doctors as $doc) {

			$doc_range = explode("-", $doc->doc_info->booking_range);

			if($date_range < ( (7 * 86400) * $doc_range[0])){

				array_push($doctor_lists, $doc);
			}

		}

		$final_doctors = DoctorResource::collection($doctor_lists);

		return $this->sendSuccessResponse('doctor_list', $final_doctors);
	}

	protected function CheckDoctorProfile(Request $request){

		$validator = Validator::make($request->all(), [
			'doctor' => 'required'
		]);

		if ($validator->fails()) {

			$message = "Validation Error";

    		$status = "402";

			return $this->sendFailResponse($message,$status);
		}

        $doctor = Doctor::where('id', request('doctor'))->get();

        if (count($doctor) == 0) { 

        	$message = "Can't Find Doctor Error";

    		$status = "402";       	

    		return $this->sendFailResponse($message,$status);

        }else{
        	
        	$final_docs = DoctorResource::collection($doctor);

        	return $this->sendSuccessResponse('doctor', $final_docs); 		
    	}
	}

	protected function CheckDoctorAvailability(Request $request){

		$validator = Validator::make($request->all(), [
			'doctor_id' => 'required',
		]);

		if ($validator->fails()) {

			return $this->sendFailResponse("Something Wrong!","422");
		}

		$today = $this->today();
		
		$tomorrow = strtotime("+1day" , $today);

		$doctor = Doctor::find(request('doctor_id'));

		$days = $doctor->day;

		$doc_range = explode("-", $doctor->doc_info->booking_range);

		$range = 7 *  $doc_range[0];

		$available_date = array();

		$final_date = array();

		$start_time_array = array();

		$end_time_array = array();

		for ($i=0; $i < $range ; $i++) { 
			
			array_push($available_date, date('d-m-Y,l', strtotime("+$i day" , $tomorrow)));
		}

		foreach ($available_date as $ava_date) {
			
			foreach ($days as $day) {

				if ($day->name == date('l',strtotime($ava_date))) {

					$start_time = date('h:i A', strtotime($day->pivot->start_time));

					$end_time = date('h:i A', strtotime($day->pivot->end_time));

					$object = collect([$ava_date,$start_time,$end_time]);

					array_push($final_date, $object);
				}
			}
		}

		$final = DateResource::collection($final_date);
		
		return $this->sendSuccessResponse('available_date', $final); 		
	}

	protected function StateandTownList(Request $request){

		$state_lists = State::select('id','state_code','state_name')->get();

		$town_lists = Town::select('id','town_code','town_name','state_id')->get();

		return response()->json([
            'state_lists' => $state_lists,               
            'town_lists' => $town_lists,               
            'status' => 200,
            'message' => 'Successful'
        ]);
	} //Finished 

	protected function GetToken(Request $request){

		$today = $this->today();

		$validator = Validator::make($request->all(), [
			'name' => 'required',
			'age' => 'required',
			'phone' => 'required',
			'booking_date' => 'required|date_format:d-m-Y|after:today',
			'doctor_id' => 'required',
			'status' => 'required',   //0 manual 1 online
		]);

		if ($validator->fails()) {

			return $this->sendFailResponse("Something Wrong Validataion!","422");
		}

		$req_date = request('booking_date');

		$user = User::find($request->user()->id);

		$doctor = Doctor::find(request('doctor_id'));

		$doc_info = DoctorInfo::where('doctor_id', $doctor->id)->first();

		$check_day = date('l', strtotime($req_date));

		$day = $doctor->day()->where('name', $check_day)->first();

		$doc_start_time = $day->pivot->start_time;	

		if (empty($day)) {

			return $this->sendFailResponse("No Doctor's Schedule!","422");
		}
		else{

			$date_save = date('md', strtotime($req_date));

			$date = date('Y-m-d', strtotime($req_date));			

			$check_booking = Booking::where('doctor_id',request('doctor_id'))
				->whereDate('booking_date', $date)
				->where('user_id', $user->id)
				->get();

			if (count($check_booking) == 3) {
				
				return $this->sendFailResponse("Something Wrong123!","422");

			}

			else{

				$booking = Booking::where('doctor_id',request('doctor_id'))->whereDate('booking_date', $date)->get();

				if($request->status== 0){
					$zoom_id= null;
					$zoom_psw= null;
					$start_url= null;
					$join_url= null;
					$booking_status=0;
				}
				else {
					$path = 'users/me/meetings';

					$response = $this->zoomPost($path, [
						'topic' => "online",
						'type' => self::MEETING_TYPE_SCHEDULE,
						'start_time' => $this->toZoomTimeFormat($date),
						'duration' => 30,
						'agenda' => "Data",
						'settings' => [
							'host_video' => false,
							'participant_video' => false,
							'waiting_room' => true,
						]
					]);

					$zoom = json_decode($response->body(), true);
					$zoom_id= $zoom['id'];
					$zoom_psw= $zoom['password'];
					$start_url= $zoom['start_url'];
					$join_url= $zoom['join_url'];
					$booking_status=1;
					}

				if(count($booking) == 0){

					$est_time_save = date('H:i:s', strtotime($doc_start_time));
					
					$book_token = Booking::create([
						'name' => request('name'),
						'age' => request('age'),
						'phone' => request('phone'),
						'address' => request('address'),
						'relation' => request('relation'),
						'booking_date' => $date,
						'est_time' => $est_time_save,
						'status' => 0,
						'user_id' => $user->id,
						'doctor_id' => request('doctor_id'),
						'floor_id' => 0,
						'booking_status' => $booking_status,
						'zoom_id' => $zoom_id,
						'zoom_psw' => $zoom_psw,
						'start_url' => $start_url,
						'join_url' => $join_url,
					]);

					$token_number = "TKN-" . sprintf("%03s", 1);

					$book_token->token_number = $token_number;

					$book_token->save();

					return $this->sendSuccessResponse('token', $book_token);
					
				}
				else{

					$booking_array = $booking->toArray();

					$last_token_booking_arry = array_column($booking_array, 'token_number');

					$last_token = end($last_token_booking_arry);
                
            		$est_time_save = date('H:i:s', strtotime($doc_start_time));

					$last_token_number = explode('-', $last_token);

					$token = $last_token_number[1]+1;

					$token_number = "TKN-" . sprintf("%03s", $token);

					$book_token = Booking::create([
						'name' => request('name'),
						'age' => request('age'),
						'phone' => request('phone'),
						'address' => request('address'),
						'relation' => request('relation'),
						'booking_date' => $date,
						'est_time' => $est_time_save,
						'token_number' =>  $token_number,
						'status' => 0,
						'user_id' => $user->id,
						'doctor_id' => request('doctor_id'),
						'floor_id' => 0,
						'booking_status' => $booking_status,
						'zoom_id' => $zoom_id,
						'zoom_psw' => $zoom_psw,
						'start_url' => $start_url,
						'join_url' => $join_url,
					]);


					return $this->sendSuccessResponse('token', $book_token);

				}
			}
		}	
	}

	protected function PatientBookingList(Request $request){

		$user = User::find($request->user()->id);

		$booking = Booking::whereNull('deleted_at')->where('user_id', $user->id)->get();

		$booking_lists =  BookingResource::collection($booking);

		return $this->sendSuccessResponse('booking_list', $booking_lists);
	}

	protected function PatientOnlineBookings(Request $request){

		$user = User::find(auth()->user()->id);

		$booking = Booking::whereNull('deleted_at')->where('user_id', $user->id)->where('booking_status',1)->get();

		$booking_lists =  PatientOnlineBookingResource::collection($booking);

		return $this->sendSuccessResponse('booking_list', $booking_lists);
	}
	protected function confirmBooking(Request $request){

		$validator = Validator::make($request->all(), [
			'booking_id' => 'required',
		]);

		if ($validator->fails()) {

			return $this->sendFailResponse("Resource Not Found!");
		}

		$booking = Booking::find($request->booking_id);

			$booking->status = 1 ;

			$booking->save();

			return response()->json([
    			"message" => "Successfully Confirmed",
    			"status" => 202,
    		]);


		
	}	
	
		protected function CancelBooking(Request $request){

		$validator = Validator::make($request->all(), [
			'booking_id' => 'required',
		]);

		if ($validator->fails()) {

			return $this->sendFailResponse("Resource Not Found!","422");
		}

		$booking = Booking::find($request->booking_id);

		$now = new DateTime('Asia/Yangon');

		$today = $now->format('Y-m-d');

		$today_string = strtotime($today);

		$booking_date_string = strtotime($booking->booking_date);


		if ($today_string > $booking_date_string) {
			
			return $this->sendFailResponse("Booking Cannot Cancel!","422");

		}else{

			$booking->status = 2 ;

			$booking->delete();

			$booking->save();

			return response()->json([
    			"message" => "Successfully Deleted!",
    			"status" => 202,
    		]);


		}
	}	
	
	protected function userRevisedLists(Request $request){
		    
		    
		$user = User::find($request->user()->id);
		$bookings = Booking::whereNotNull('schedule_change_log_id')->where('user_id', $user->id)->get();

        if(count($bookings)){
        $revised_bookings = array();        
		foreach($bookings as $booking ){
		    $change_schedule = ScheduleChangeLog::find($booking->schedule_change_log_id);
		    if ($booking->status == 0) {
                $status = "Un-Confirmed Booking";
            }
            elseif ($booking->status == 2) {
                $status = "Canceled Booking";
			}
			elseif ($booking->status == 3) {
                $status = "Revised Booking";
			}
			elseif ($booking->status == 4) {
                $status = "Checked-in Booking";
			}
			elseif ($booking->status == 6) {
                $status = "Finished Booking";
            }
            else{
                $status = "Confirmed Booking";
            }
            $revised_date="";
            $revised_time="";
            $revised_doctor="";
            if($change_schedule->type == 0){
                $revised_date = $change_schedule->request_date;
                $revised_time = $change_schedule->request_time;
            }elseif($change_schedule->type == 1){
				if($change_schedule->change_doc_type==1){
                    $changed_doctor = Doctor::find($change_schedule->doctor_id);
                    $revised_doctor = $changed_doctor->position . $change_doctor->name;
				}
				else{
					$revised_doctor = $change_schedule->request_doc_name;
				}
            }
		    $revised_booking = array(
		            'id' => $booking->id,
                    'name' => $booking->name,
                    'age' => $booking->age,
                    'phone' => $booking->phone,
                    'booking_date' => $booking->booking_date,
                    'token_number' => $booking->token_number,
                    'est_time' => $booking->est_time,
                    'status' => $status,
                    'doctor' => $booking->doctor->name,
		            'type' => $change_schedule->type,
		            'revised_date' => $revised_date,
		            'revised_time' => $revised_time,
		            'revised_doctor' => $revised_doctor,
		        );
		    array_push($revised_bookings,$revised_booking);
		}
		    return $this->sendSuccessResponse('revised_booking_lists', $revised_bookings);
        }else{
            return $this->sendFailResponse("No revised booking found","422");
        }

	}	
    
protected function patientHistory(Request $request){

	$validator = Validator::make($request->all(), [
		'booking_id' => 'required',
	]);

	if ($validator->fails()) {

		return $this->sendFailResponse("Resource Not Found!","422");
	}
	$booking =Booking::findorFail($request->booking_id);
	return response()->json([
			"message" => "Success",
			"status" => 202,
			"history"=>[
				"diagonis"=> $booking->diagnosis,
				"description"=> $booking->description,
				"remark_booking_date" => $booking->remark_booking_date,
				"booking_date" => $booking->booking_date,
				"doctor_name" => $booking->doctor->name,
				"attachfile"=> url('/').$booking->patient_document
			]
			
	]);
}
    
}
