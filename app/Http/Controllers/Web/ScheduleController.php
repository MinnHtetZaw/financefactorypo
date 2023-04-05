<?php

namespace App\Http\Controllers\Web;

use App\Day;
use App\Room;
use DateTime;
use stdClass;
use App\Floor;
use App\Doctor;
use App\Booking;
use App\Building;
use App\Department;
use App\DoctorInfo;
use App\DoctorTime;
use App\ScheduleChangeLog;
use App\DoctorNotification;
use App\Events\DoctorChange;
use App\Events\TestingEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ScheduleController extends Controller
{
    
    public function ScheduleList(){

    	$doctors = Doctor::with('day')->orderBy('department_id', 'desc')->get();

    	return view('Admin/Schedule.schedule_list', compact('doctors'));
    }

    public function CreateScheduleDay(Request $request){

    	$departments = Department::all();

    	$days = Day::all();

    	return view('Admin/Schedule.create_schedule', compact('departments','days'));
    }

    public function AjaxDepartment(Request $request){

    	$department = $request->department;

    	$doctors = Doctor::where('department_id', $department)->get();
        
    	return response()->json($doctors);
    }
    public function AjaxScheduleDate(Request $request){

        $now = new DateTime;

        $today = $now->format('Y-m-d');
        
        $validator = Validator::make($request->all(), [
			'doctor_id' => 'required',
		]);

		if ($validator->fails()) {

			 return response()->json(array("errors" => $validator->getMessageBag()), 422);
		}

        $doctor = Doctor::find(request('doctor_id'));

		$days = $doctor->day;

		$doc_range = explode("-", $doctor->doc_info->booking_range);

		$range = 7 *  $doc_range[0];

		$today_string = strtotime($today);

		$available_date = array();

		for ($i=0; $i <= $range ; $i++) { 
			
			array_push($available_date, date('d-m-Y,l', strtotime("+$i day" , $today_string)));
		}
    	return response()->json($available_date);
    }

    
    public function AjaxScheduleTime(Request $request){

        $now = new DateTime;

        $today = $now->format('Y-m-d');
        
        $validator = Validator::make($request->all(), [
            'doctor_id' => 'required',
            'initial_date' => 'required',

            
		]);
		if ($validator->fails()) {

			 return response()->json(array("errors" => $validator->getMessageBag()), 422);
		}

        $doctor = Doctor::find(request('doctor_id'));

        $days = $doctor->day;
        
        $initial_date=$request->initial_date;

		$final_date = array();

        foreach ($days as $day) {

            if ($day->name == date('l',strtotime($initial_date))) {

                $start_time = date('h:i A', strtotime($day->pivot->start_time));

                $end_time = date('h:i A', strtotime($day->pivot->end_time));

                $object = collect([$start_time,$end_time]);

                array_push($final_date, $object);
            }
        }

    	return response()->json($final_date);
    }
    public function StoreScheduleDay(Request $request){

    	$validator = Validator::make($request->all(), [
			'doctor' => 'required',
			'days' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
		]);

		if ($validator->fails()) {

			alert()->error('Validation Error');

			return redirect()->back();
		}

		$doctor = Doctor::find($request->doctor);

		$array_days = $request->days;

        $start_time = date('H:i', strtotime($request->start_time));

        $end_time = date('H:i', strtotime($request->end_time));

		foreach ($array_days as $days) {
			
			$doctor->day()->attach($days, ['start_time' => $start_time,'end_time' => $end_time]);
		}

        alert()->success("Successfully Added!");

        return redirect()->back();
    }

    public function CheckScheduleTime($day, $doctor ,Request $request){

        $doctors = Doctor::where('id', $doctor)->first();

        $day = $doctors->day()->where('day_id', $day)->first();
           
        $new_start_time = date('h:i: a', strtotime($day->pivot->start_time));

        $new_end_time = date('h:i: a', strtotime($day->pivot->end_time));

        alert()->info("$new_start_time - $new_end_time \n \n Doctor - ". $doctors->name)->persistent("Close");

        return redirect()->back();
               
    }

     public function ChangeScheduleList(Request $request){

        $change_schedule_lists = ScheduleChangeLog::latest()->get();

        $doctors = Doctor::all();

        $departments = Department::all();

        return view('Admin/Schedule.change_schedule_list', compact('change_schedule_lists','doctors','departments'));
    }

    public function storeChangeScheduleList(Request $request){
        $status=$request->status;
   
        $now = new DateTime;

        $today = strtotime($now->format('Y-m-d'));

        $validator = Validator::make($request->all(), [
            'doctor' => 'required',
            'initial_date' => 'required',
            'initial_time' => 'required',            
            'request_date' => 'required|date_format:Y-m-d',
            'request_time' => 'required',
            'status'       => 'required',            
        ]);

        if ($validator->fails()) {

            $change_schedule_logs=ScheduleChangeLog::with("doctor")->with("request_doc")->get();
        

            return response()->json([
                        'status'=>0,
                        'message'=>'failed',
                        'errors'=>$validator->errors(),
                        'data'=>$change_schedule_logs,
                    ]);
        }

        $doctor = Doctor::find($request->doctor);

        $doctor_name=$doctor->name;
        
        $doc_info = DoctorInfo::where('doctor_id', $doctor->id)->first();

        $check_day = date('l', strtotime($request->initial_date));

        $format_initial_date = date('Y-m-d', strtotime($request->initial_date));
      
        $format_request_time = date('H:i:s', strtotime($request->request_time));

        $day = $doctor->day()->where('name', $check_day)->first();

        $request_day = date('l', strtotime($request->request_date));//friday

        $same_day = $doctor->day()->where('name', $request_day)->first();

        $same_time=$same_day->pivot->where('start_time',$format_request_time)->first();

        $get_initial_start_time=explode(",",$request->initial_time);


        if (empty($day)) {

            alert()->error("Booking Date doesn't equal with Doctor's Day!");

            return redirect()->back();           
        }


        else if(!empty($same_time)){
            $change_schedule_logs=ScheduleChangeLog::with("doctor")->get();

            return response()->json([
                'status'=>2,
                'message'=>'failed',
                'errors'=>"Request Time can't same as Doctor's Schedule",
                'data'=>$change_schedule_logs,
            ]);
        }

        else{

            $change_schedule_log = ScheduleChangeLog::create([
                'request_date' => $request->request_date,
                'request_time' => $request->request_time,
                'initial_date' => $format_initial_date,
                'initial_time' => $request->initial_time,
                'status' => 1,
                'type' => 0,
                'change_doc_type'=> 0,
                'doctor_id' => $doctor->id,
            ]);
            $change_schedule_log_ID=$change_schedule_log->id;
            $booking_lists = Booking::where('booking_date', $format_initial_date)->where('doctor_id', $doctor->id)->get();

            $userID_bookingID="";

            $tokenNos="";
            
            foreach($booking_lists as $booking) {

                $booking->est_time = $format_request_time;

                $booking->booking_date = $request->request_date;

                $string_time = strtotime("+$doc_info->time_per_patient minutes", strtotime($format_request_time));
                
                $format_request_time = date('H:i:s', $string_time);              

                $booking->status=3;

                $booking->schedule_change_log_id=$change_schedule_log_ID;

                $booking->save();

                $userID=$booking->user_id;

                //$userID_bookingID->userID=$userID;

                $token=$booking->token_number;

                $BookingID=$booking->id;

                $_ids = "$userID" . "_" . "$BookingID";
                
                $userID_bookingID = $userID_bookingID . $_ids . ",";

                $_ids_token = "$userID" . "_" . "$token";

                $tokenNos = $tokenNos . $_ids_token . ",";

                
                //$userID_bookingID->BookingID=$BookingID;

                // array_push($userID_bookingID,$BookingID);

            }

            $initial_booking_est_time=$request->initial_time;
            // dd($userID_bookingID,"0",$format_initial_date,$initial_booking_est_time,$request->request_date,$request->request_time,5);
       
             event(new TestingEvent($userID_bookingID,$tokenNos,"0",$format_initial_date,$initial_booking_est_time,$request->request_date,$request->request_time,$request->doctor,$doctor_name,5));


            $change_schedule_logs=ScheduleChangeLog::with("doctor")->with("request_doc")->get();
            

            return response()->json([
                        'status'=>1,
                        'message'=>'success',
                        'data'=>$change_schedule_logs,
                        
                    ]);;             
        }

    }

    public function storeChangeDoctorList(Request $request){
   
        $now = new DateTime;

        $today = strtotime($now->format('Y-m-d'));

        if($request->anydoctor==1){
            $validator = Validator::make($request->all(), [
                'initialdoctor' => 'required',
                'date' => 'required',
                'time' => 'required',            
                'anydoctor' => 'required',
                'indocname'  => 'required',            
            ]);
        }
       else if($request->anydoctor==2){
            $validator = Validator::make($request->all(), [
                'initialdoctor' => 'required',
                'date' => 'required',
                'time' => 'required',            
                'anydoctor' => 'required',
                'outdocname'  => 'required',            
            ]);
        }

     

        if ($validator->fails()) {

            $change_schedule_logs=ScheduleChangeLog::with("doctor")->with("request_doc")->get();
        

            return response()->json([
                        'status'=>0,
                        'message'=>'failed',
                        'errors'=>$validator->errors(),
                        'data'=>$change_schedule_logs,
                    ]);
        }

        $doctor = Doctor::find($request->initialdoctor);
        $initial_doc_name=$doctor->name;
        $initial_doc_id=$doctor->id;

        $format_date = date('Y-m-d', strtotime($request->date));

        if($request->anydoctor==1){

        $indocid = Doctor::find($request->indocname);
        $revised_in_doc_name=$indocid->name;
        $revised_in_doc_id=$indocid->id;

            $change_schedule_log = ScheduleChangeLog::create([
                'initial_date' => $format_date,
                'initial_time' => $request->time,
                'status' => 1,
                'type' => 1, //change doctor
                'doctor_id' => $doctor->id,
                'change_doc_type'=> 1,
                'request_doc_id'=>$request->indocname,
            ]);
        }
        else if($request->anydoctor==2){
        $revised_in_doc_id="";
        $revised_in_doc_name="";

            $change_schedule_log = ScheduleChangeLog::create([
                'initial_date' => $format_date,
                'initial_time' => $request->time,
                'status' => 1,
                'type' => 1, //change doctor
                'doctor_id' => $doctor->id,
                'change_doc_type'=>2,
                'request_doc_name'=>$request->outdocname,
            ]);
        }

       
            $change_schedule_log_ID=$change_schedule_log->id;

            $booking_lists = Booking::where('booking_date', $format_date)->where('doctor_id', $doctor->id)->get();

            $tokenNos="";
            $userID_bookingID="";
            
            foreach($booking_lists as $booking) {

           
                $booking->status=3;

                $booking->schedule_change_log_id=$change_schedule_log_ID;

                $booking->save();

                $userID=$booking->user_id;

                //$userID_bookingID->userID=$userID;

                $BookingID=$booking->id;

                $token=$booking->token_number;

                $_ids = "$userID" . "_" . "$BookingID";
                
                $userID_bookingID = $userID_bookingID . $_ids . ",";

                $_ids_token = "$userID" . "_" . "$token";

                $tokenNos = $tokenNos . $_ids_token . ",";

            }
             event(new DoctorChange($userID_bookingID,$tokenNos,1,$request->date,$request->time,$initial_doc_name,$initial_doc_id,$request->anydoctor,$revised_in_doc_name,$revised_in_doc_id,$request->outdocname,5));


            $change_schedule_logs=ScheduleChangeLog::with("doctor")->with("request_doc")->get();

            return response()->json([
                        'status'=>1,
                        'message'=>'success',
                        'data'=>$change_schedule_logs,
                        
                    ]);;          
    }
    public function revisedLists(Request $request)
    {
        $revisedlists=Booking::where('schedule_change_log_id',$request->change_schedule_log_id)->get();

       return ($revisedlists);

    }
}
