<?php

namespace App\Http\Controllers\Web;

use DateTime;
use App\Doctor;
use App\Booking;
use Illuminate\Http\Request;
use App\Events\DoctorStartZoom;
use App\Http\Controllers\Controller;
use App\Payment;

use function GuzzleHttp\Promise\all;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DoctorDashboardController extends Controller
{
    public function doctorDashboard()
    {
        return view('Doctor_dashboard.doctor_dashboard');
    }
    public function doctorProfile()
    {
        $userid = session()->get('user')->id;

        try {

            $doctor = Doctor::where('user_id',$userid)->first();

            return view('Doctor.profile', compact('doctor'));
        } catch (\Exception $e) {

            alert()->error("Doctor Not Found!")->persistent("Close!");

            return redirect()->back();
        }
    }
    public function manualbookingLists()
    {
        $userid = session()->get('user')->id;

        $doctor = Doctor::where('user_id',$userid)->first();

		$now = new DateTime;

		$today = $now->format('Y-m-d');

		$manualbookings= Booking::where('booking_date',$today)->where('doctor_id',$doctor->id)->where('booking_status',0)->orWhere('booking_status',2)->where('booking_date',$today)->where('doctor_id',$doctor->id)->get();
		
		$checkinbookings= Booking::where('booking_date',$today)->where('doctor_id',$doctor->id)->where('booking_status',0)->where('status',4)->get();

		$chechincount= count($checkinbookings);

		$booking_count= count($manualbookings);
        return view('Doctor_dashboard.manual_booking_lists', compact('doctor','manualbookings','booking_count','chechincount'));
    }
    public function onlinebookingLists()
    {
        $userid = session()->get('user')->id;

        $doctor = Doctor::where('user_id',$userid)->first();

		$now = new DateTime;

		$today = $now->format('Y-m-d');


		$onlinebookings= Booking::where('booking_date',$today)->where('doctor_id',$doctor->id)->where('booking_status',1)->get();

		$booking_count= count($onlinebookings);

		return view('Doctor_dashboard.online_booking_lists', compact('doctor','onlinebookings','booking_count'));
    }

	public function patientHistory()
    {
        $userid = session()->get('user')->id;

        $doctor = Doctor::where('user_id',$userid)->first();

		$now = new DateTime;

		$today = $now->format('Y-m-d');

		$bookings= Booking::where('booking_date',$today)->where('doctor_id',$doctor->id)->where('status',5)->get();

		$booking_count = count($bookings);
		
        return view('Doctor_dashboard.patientHistory', compact('doctor','bookings','booking_count'));
    }
	public function ajaxPatientHistory(Request $request)
    {
        $doctor_id = $request->doctor_id;
	
		//name phone
		if ($request->check_date=='' && $request->nameOrphone != '') {
			if(is_numeric($request->nameOrphone)){
				$bookings= Booking::where('doctor_id',$doctor_id)->where('status',5)->where('phone',$request->nameOrphone)->get();

			}
			else{
				$bookings= Booking::where('doctor_id',$doctor_id)->where('status',5)->where('name',$request->nameOrphone)->get();
			}
		}
		//date
		if ($request->check_date!='' && $request->nameOrphone == '') {
			$bookings= Booking::where('booking_date',$request->check_date)->where('doctor_id',$doctor_id)->where('status',5)->get();
		}
		//phone name date
		if ($request->check_date !='' && $request->nameOrphone != '') {
			if(is_numeric($request->nameOrphone)){
				$bookings= Booking::where('booking_date',$request->check_date)->where('doctor_id',$doctor_id)->where('status',5)->where('phone',$request->nameOrphone)->get();

			}
			else{
				$bookings= Booking::where('booking_date',$request->check_date)->where('doctor_id',$doctor_id)->where('status',5)->where('name',$request->nameOrphone)->get();
			}
		}
		$booking_count= count($bookings);
		return response()->json(["bookings"=>$bookings,"booking_count"=>$booking_count]);
    }
    protected function ajaxDoctorManualBookingList(Request $request){
		
		$request_date = $request->check_date;

		$status=$request->status;
	
		$doctor = Doctor::where('id',$request->doctor_id)->with('department')->first();


		if($status==6){

			$booking_lists = Booking::where('booking_date', $request_date)->where("doctor_id",$request->doctor_id)->where('booking_status',0)->orWhere('booking_status',2)->where('booking_date', $request_date)->where("doctor_id",$request->doctor_id)->get();

		}
		else{

			$booking_lists = Booking::where('booking_date', $request_date)->where("doctor_id",$request->doctor_id)->where('booking_status',0)->where("status",$status)->get();

		}
		$checkin_lists = Booking::where('booking_date', $request_date)->where("doctor_id",$request->doctor_id)->where('booking_status',0)->where("status",4)->get();

		$booking_count = count($booking_lists);	
		$checkin_count = count($checkin_lists);	

		return response()->json([
    		'doctor' => $doctor,
    		'booking_lists' => $booking_lists,
			'booking_count' => $booking_count,
			'checkin_count' => $checkin_count,
			'status'=>$status,
		]);
	}
    protected function ajaxDoctorOnlineBookingList(Request $request){
		
		$request_date = $request->check_date;

		$status=$request->status;
	
		$doctor = Doctor::where('id',$request->doctor_id)->with('department')->first();

		
		if($status==6){

			$booking_lists = Booking::where('booking_date', $request_date)->where("doctor_id",$request->doctor_id)->where('booking_status',1)->get();

		}
		else{

			$booking_lists = Booking::where('booking_date', $request_date)->where("doctor_id",$request->doctor_id)->where('booking_status',1)->where("status",$status)->get();

		}

		$booking_count = count($booking_lists);	

		return response()->json([
    		'doctor' => $doctor,
    		'booking_lists' => $booking_lists,
			'booking_count' => $booking_count,
			'status'=>$status,
		]);
	}

	protected function doctordonebooking(Request $request){   
		$validator = Validator::make($request->all(), [
			'booking_id' => 'required',
			'donedateOrnodate' =>'required'
		]);
		dd($request->all());
		if ($validator->fails()) {
			return response()->json([
				'status'=>"failed",
				'withdateOrnodate'=> $request->donedateOrnodate
			]);;
		}
		try {
        	$booking = Booking::findOrFail($request->booking_id);
   		} catch (\Exception $e) {
   		    
            return response()->json([
						'status'=>"failed",
						'withdateOrnodate'=> $request->donedateOrnodate
					]);;

    	}
		if ($request->hasfile('patienthistory')) {
			$document = $request->file('patienthistory');

			// $name = $document->getClientOriginalName();
			$ext = $document->getClientOriginalExtension();

			$document_name =  time().'.'.$ext;

			$document->move(public_path() . '/image/patientHistory/', $document_name);

			$documentPath = '/image/patientHistory/'.$document_name;
		}
		else{
			$documentPath = '/image/patientHistory/1628842117.pdf';
		}

    	$booking->status = 5;
		$booking->meeting_status=2;
		$booking->description= $request->description;
		$booking->diagnosis= $request->diagnosis;
		$booking->remark_booking_date= $request->remark_date;
		$booking->patient_document= $documentPath;
    	if($booking->save()){
			
       		return response()->json([
				'status'=>"failed",
				'withdateOrnodate'=> $request->donedateOrnodate
			   ]);

        }else{
            
            alert()->error("Database Error!")->persistent("Close!");

             return redirect()->back();
        }
	}
	public function startzoom(Request $request)
	{
		try {
        	$booking = Booking::findOrFail($request->booking_id);
   		} catch (\Exception $e) {
   		    
        	alert()->error("Booking Not Found!")->persistent("Close!");
            
            return response()->json();

    	}
		$booking->meeting_status= 1;
		$booking->save();
		//Zoom pusher
		$userID=$booking->user_id;

		$token=$booking->token_number;

		$BookingID=$booking->id;

		$userID_bookingID = "$userID" . "_" . "$BookingID";

		$userID_tokenName = "$userID" . "_" . "$token";

		event(new DoctorStartZoom($userID_bookingID,$userID_tokenName,$booking->name,$booking->age,$booking->phone,$booking->booking_date,$booking->status,$booking->zoom_id,$booking->zoom_psw,$booking->join_url));

		return response()->json(
			$booking
		);;
		
	}
	public function DoctorScheduleList()
	{
		$userID = session()->get('user')->id;
		$doc = Doctor::where('user_id',$userID)->with('day')->first();
		return view('Doctor_dashboard/doctor_schedule', compact('doc'));
	}
	public function storepaymentweb(Booking $booking_id, $invoice_no)
	{
		$payment = Payment::where('invoice_no',$invoice_no)->first();
		$now = $now = new DateTime('Asia/Yangon');

        $today = $now->format('Y-m-d H:i:s');
		if(empty($payment)){
			$payment_real= Payment::create([
				'booking_id'=> $booking_id->id,
				'total'=> 0,
				'paid_amount'=> $booking_id->doctor->online_early_payment,
				'date' => $today,
				'invoice_no'=> $invoice_no,
				'web_or_mobile'=>0   // 0 web 1 mobile
			]);
        	alert()->success("Success Payment")->persistent("Close!");
			return redirect()->route('get_token');
		}
		else{
			alert()->error("Invoice number already exist")->persistent("Close!");
			return redirect()->route('get_token');
		}
	}

}


