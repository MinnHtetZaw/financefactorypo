<?php

namespace App\Http\Controllers\Web;

use App\Accounting;
use App\Day;
use App\Town;
use App\User;
use DateTime;
use App\Admin;
use App\AccountingType;
use App\State;
use App\SaleProject;
use App\Doctor;
use App\Booking;
use App\Patient;
use App\Voucher;
use App\Employee;
use Carbon\Carbon;
use App\Department;
use App\DoctorInfo;
use App\DoctorTime;
use App\Appointment;
use App\Announcement;
use App\Advertisement;
use App\CostCenter;
use App\Currency;
use App\Traits\ZoomJWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Invoice;
use App\PurchaseOrder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class OperatorController extends Controller
{
	public function __construct()
	{

		$this->routeList = [
			"U Zaw Win",
			"Daw Zin Win Oo",
			"Daw Zin Zin Win",
			"Daw Win Win Zaw",
			"U Sai Kaung Chit",
			"Daw Khin Myat Min",
			"U Sein Aung Lwin",
			"Daw Khin Myit Sein",
			"Daw Yamone Oo",
			"Daw Yamone Phoo",
			"Daw Zun Phoo Phoo",
			"Daw Aye Nyein Thu",
			"Daw Aye Nyein May",
			"Daw Thet Htar Swe",
			"U Pyae Phyo Win",
			"U Win Pyae Phyo",
			"U Wunna Kyaw",
			"U Aung Htoo Kyaw",
			"U Kyaw Lin Aung",
			"U Aung Lin Kyaw",
		];
	}

	use ZoomJWT;

	const MEETING_TYPE_INSTANT = 1;
	const MEETING_TYPE_SCHEDULE = 2;
	const MEETING_TYPE_RECURRING = 3;
	const MEETING_TYPE_FIXED_RECURRING_FIXED = 8;

	protected function ShowAccountList(Request $request)
	{
        $cost_center = CostCenter::all();
		$account = Accounting::all();
		$saleproject = SaleProject::all();
		$account_type = AccountingType::all();
        $currency  = Currency::all();
		return view('Admin.account_list',compact('currency','account','saleproject','account_type','cost_center'));
	}

    protected function profit_loss_acc_list(Request $request)
	{
        $cost_center = CostCenter::all();
		$account = Accounting::where('account_type',6)
                    ->where('general_project_flag',1)->get();
        $account1 = Accounting::where('account_type',7)
                    ->where('general_project_flag',1)->get();
        $account2 = Accounting::where('account_type',10)
                    ->where('general_project_flag',1)->get();
        $account3 = Accounting::where('account_type',14)
                    ->orWhere('account_type',15)
                    ->where('general_project_flag',0)->get();
        $account4 = Accounting::where('account_type',8)
                    ->where('general_project_flag',0)->get();
		$saleproject = SaleProject::all();
		$account_type = AccountingType::all();
        $currency  = Currency::all();
		return view('Admin.profit_loss_acc_list',compact('currency','account','account1','account2','account3','account4','saleproject','account_type','cost_center'));
	}

    protected function balancesheet_acc_list(Request $request)
	{
        $cost_center = CostCenter::all();
		$account = Accounting::where('account_type',1)->get();
        $acc1 = Accounting::where('account_type',3)->get();
        $account1 = 0;
        foreach($acc1 as $acc){
            $account1 += $acc->amount;
        }
        $acc2 = Accounting::where('account_type',4)->get();
        $account2 = 0;
        foreach($acc2 as $acco){
            $account2 += $acco->amount;
        }
        $acc3 = Invoice::where('paid_status',0)->get();
        $account3 = 0;
        foreach($acc3 as $accou){
            $account3 += $accou->total_amount;
        }
        $acc4 = PurchaseOrder::where('paid_status',0)->get();
        $account4 = 0;
        foreach($acc4 as $accoun){
            $account4 += $accoun->total_amount;
        }
		$saleproject = SaleProject::all();
		$account_type = AccountingType::all();
        $currency  = Currency::all();
		return view('Admin.balancesheet_acc_list',compact('currency','account','account1','account2','account3','account4','saleproject','account_type','cost_center'));
	}

    protected function trial_balance(Request $request)
	{
        $acc1 = Accounting::where('account_type',3)->get();
        $account1 = 0;
        foreach($acc1 as $acc){
            $account1 += $acc->amount;
        }
        $acc2 = Accounting::where('account_type',4)->get();
        $account2 = 0;
        foreach($acc2 as $acco){
            $account2 += $acco->amount;
        }
        $account = Accounting::where('account_type',6)
                    ->where('general_project_flag',1)->get();
        $account3 = Accounting::where('account_type',14)
        ->orWhere('account_type',15)
        ->where('general_project_flag',0)->get();
        $account4 = Accounting::where('account_type',10)
                    ->where('general_project_flag',1)->get();
		return view('Admin.trail_balance',compact('account','account1','account2','account3','account4'));
	}

	protected function getBookingListUi()
	{

		$doctors = Doctor::all();

		$departments = Department::all();

		$now = new DateTime;

		$today = $now->format('Y-m-d');

		$booking_lists = Booking::where('booking_date', $today)->with('doctor')->get();

		$booking_count = count($booking_lists);

		return view('Admin.booking_list', compact('doctors', 'departments','booking_lists','booking_count'));
	}

	protected function ajaxDoctorBookingList(Request $request)
	{

		$request_date = $request->check_date;

		$status = $request->status;

		$doctor = Doctor::where('id', $request->doctor_id)->with('department')->first();


		if ($status == 6) {

			$booking_lists = Booking::where('booking_date', $request_date)->where("doctor_id", $request->doctor_id)->get();
		} else {

			$booking_lists = Booking::where('booking_date', $request_date)->where("doctor_id", $request->doctor_id)->where("status", $status)->get();
		}

		$booking_count = count($booking_lists);

		return response()->json([
			'doctor' => $doctor,
			'booking_lists' => $booking_lists,
			'booking_count' => $booking_count,
			'status' => $status,
		]);
	}

	protected function AjaxTokenCheckIn(Request $request)
	{

		$token_number = $request->token_number;

		$booking = Booking::where('token_number', $token_number)->first();

		$booking_list = Booking::where('doctor_id', $booking->doctor_id)->where('booking_date', $booking->booking_date)->get();

		return response()->json([
			'booking' => $booking,
			'booking_lists' => $booking_list,
		]);
	}

	protected function AdminProfile(Request $request)
	{

		$user_id = getUserId($request);

		$user = $request->session()->get('user');

		$user_email = $user->email;

		$admin = Admin::where('user_id', $user_id)->first();

		return view('Admin.profile', compact('admin', 'user_email'));
	}
	protected function counterProfile(Request $request,$counter_id)
	{

		$admin = Employee::with('user')->findOrfail($counter_id);
		$user_email= $admin->user->email;
		return view('Admin.profile', compact('admin','user_email'));
	}
	protected function counterProfileEdit(Request $request,$counter_id)
	{

		$admin = Employee::with('user')->findOrfail($counter_id);
		$user_email= $admin->user->email;
		return view('Admin.editprofile', compact('admin','user_email'));
	}
	protected function counterProfileEditSave(Request $request)
	{
		$validator = Validator::make($request->all(), [
			"employee_id" => "required",
			"name" => "required",
			"code" => "required",
			"phone" => "required",
			"dob" => "required",
			"email" => "required",
		]);
		if($request->password){
			$validator = Validator::make($request->all(), [
				"employee_id" => "required",
				"name" => "required",
				"code" => "required",
				"phone" => "required",
				"dob" => "required",
				"email" => "required",
				"password"=> "required|min:6"
			]);
		}

		if ($validator->fails()) {

			alert()->error('Please Fill All Fields!');
			return redirect()->back();
		}
		$employee = Employee::findOrfail($request->employee_id);

		$employeeupdate=$employee->update([
			"name" => $request->name,
			"employee_code" => $request->code,
			"phone" => $request->phone,
			"dob" => $request->dob
		]);
		$employee->user->update([
			'email'=> $request->email
		]);
		if($request->password){
			$employee->user->update([
				'password'=> Hash::make($request->password)
			]);
		}
		alert()->success('Successfully Changed!');

		return back();
	}

	public function createCounter(Request $request)
	{
		return view('Admin.createcounter');
	}
	public function createCounterSave(Request $request)
	{
			$validator = Validator::make($request->all(), [
				"name" => "required",
				"phone" => "required",
				"dob" => "required",
				"email" => "required",
				"password"=> "required|min:6"
			]);

		if ($validator->fails()) {

			alert()->error('Please Fill All Fields!');
			return redirect()->back();
		}
		$user = User::create([
			'name' => $request->name,
			'email' => $request->email,
			'phone' => $request->phone,
			'password' => Hash::make($request->password)
		]);
		$user->assignRole(4);

        if ($request->hasfile('image')) {

			$image = $request->file('image');

			$name = $image->getClientOriginalName();

			$photo_path =  time()."-".$name;

			$image->move(public_path() . '/image/admin/', $photo_path);

			$path = '/image/admin/'. $photo_path;

		}
		else{
			$path = '/image/admin/user.jpg';

		}
		$employee_code =  "EMP_" . sprintf("%03s", $user->id);


		$employee=Employee::create([
			"name" => $request->name,
			"employee_code" => $request->code,
			"phone" => $request->phone,
			"dob" => $request->dob,
			"user_id"=> $user->id,
			"photo" => $path,
			"position_id" =>1,
			"employee_code" => $employee_code
		]);

		alert()->success('Successfully Added!');

		return redirect()->route('doctor_list');
	}
	protected function AdminChangePassUI(Request $request)
	{

		return view('Admin.change_pw');
	}

	protected function AdminChangePass(Request $request)
	{

		$validator = Validator::make($request->all(), [
			'current_pw' => 'required',
			'new_pw' => 'required|confirmed|min:6'
		]);

		if ($validator->fails()) {

			alert()->error('Something Wrong!');
			return redirect()->back();
		}

		$user = $request->session()->get('user');

		$current_pw = $request->current_pw;

		if (!\Hash::check($current_pw, $user->password)) {

			alert()->info("Wrong Current Password!");

			return redirect()->back();
		}

		$has_new_pw = \Hash::make($request->new_pw);

		$user->password = $has_new_pw;

		$user->save();

		alert()->success('Successfully Changed!');

		return redirect()->route('admin_dashboard');
	}

	protected function DepartmentList()
	{

		$department_lists = Department::all();

		return view('Admin/Department/department_list', compact('department_lists'));
	}



	//To update with Modal Box
	protected function CreateDepartment()
	{

		return view('Admin/Department/create_department');
	}

	protected function StoreDepartment(Request $request)
	{

		$validator = Validator::make($request->all(), [
			'name' => 'required',
			'description' => 'required',
			'image' => 'required|file'
		]);

		if ($validator->fails()) {

			alert()->error('Something Wrong');

			return redirect()->back();
		}

		if ($request->hasfile('image')) {

			$image = $request->file('image');
			$name = $image->getClientOriginalName();
			$image->move(public_path() . '/image/Department_Image/', $name);
			$image = $name;
		}
		$department = Department::create([
			'name' => $request->name,
			'description' => $request->description,
			'photo_path' => $image,
			'status' => $request->status,
		]);

		$department_id = $department->id;

		$department_code = "DEPT" . sprintf("%04s", $department_id);

		$department->department_code = $department_code;

		$department->save();

		alert()->success('Successfully Added!');

		return redirect()->route('department_list');
	}

	protected function EditDepartment($department, Request $request)
	{

		$department = Department::where('id', $department)->first();

		return view('Admin/Department/edit_department', compact('department'));
	}

	protected function UpdateDepartment($department, Request $request)
	{

		$department = Department::where('id', $department)->first();

		if ($request->dept_status == "on") {

			$department->status = 1;
		} else {

			$department->status = 2;
		}

		$department->name = $request->name;

		$department->description = $request->description;

		$department->save();

		alert()->success('ပြင်ဆင်တာ​အောင်မြင်ပါသည်');

		return redirect()->route('department_list');
	}

	//For Phone Booking From Reception
	protected function GetToken()
	{

		$doctors = Doctor::all();

		return view('Admin.get_token', compact('doctors'));
	}

	//For Phone Booking from Reception
	protected function SearchDoctors(Request $request)
	{

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

		$final_date = array();

		$start_time_array = array();

		$end_time_array = array();

		for ($i = 0; $i <= $range; $i++) {

			array_push($available_date, date('d-m-Y,l', strtotime("+$i day", $today_string)));
		}

		foreach ($available_date as $ava_date) {

			foreach ($days as $day) {

				if ($day->name == date('l', strtotime($ava_date))) {

					$start_time = date('h:i A', strtotime($day->pivot->start_time));

					$end_time = date('h:i A', strtotime($day->pivot->end_time));

					$object = collect([$ava_date, $start_time, $end_time]);

					array_push($final_date, $object);
				}
			}
		}

		return response()->json($final_date);
	}

	protected function StoreBookingToken(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'booking_date' => 'required',
			'name' => 'required',
			'age' => 'required',
			'phone' => 'required',
			'address' => 'required',
			'bookings' => 'required',
		]);

		if ($validator->fails()) {

			alert()->error('Something Wrong');

			return redirect()->back();
		}
		$person_list = $this->routeList;

		$date = explode(',', $request->booking_date);

		$check_date = date('Y-m-d', strtotime($date[0]));

		$date_save = date('md', strtotime($date[0]));

		$doctor = Doctor::find(request('doctor'));

		$reserved_token = $doctor->doc_info->reserved_token;

		$check_booking = Booking::where('doctor_id', request('doctor'))
			->whereDate('booking_date', $check_date)
			->get();



			if($request->bookings== "manualBooking"){
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
					'start_time' => $this->toZoomTimeFormat($check_date),
					'duration' => 30,
					'agenda' => "Data",
					'settings' => [
						'host_video' => false,
						'participant_video' => false,
						'waiting_room' => true,
					]
				]);

				$zoom = json_decode($response->body(), true);
				Log::channel('custom')->info($zoom);
				$zoom_id= $zoom['id'];
				$zoom_psw= $zoom['password'];
				$start_url= $zoom['start_url'];
				$join_url= $zoom['join_url'];
				$booking_status=1;

			}

		if (count($check_booking) == 0) {

			for ($i = 1; $i <= $reserved_token; $i++) {

				$random = array_rand($person_list);

				$name = $person_list[$random];

				$book_token = Booking::create([
					'name' => $name,
					'age' => 33,
					'phone' => " 09250206903",
					'address' => "Tarmwe Yangon",
					'booking_date' => $check_date,
					'status' => 1,
					'submit_by' => 0,
					'user_id' => 1,
					'doctor_id' => request('doctor'),
					'floor_id' => 1,
					'booking_status' => 2, //manual booking-0 online-1 reserved-2
				]);

				$token_number = "TKN-" . sprintf("%03s", $i);

				$book_token->token_number = $token_number;

				$book_token->save();
			}

			$check_booking_real = Booking::where('doctor_id', request('doctor'))->whereDate('booking_date', $check_date)->get();

			$booking_array = $check_booking_real->toArray();

			$last_token_booking_arry = array_column($booking_array, 'token_number');

			$last_token = end($last_token_booking_arry);

			$last_token_number = explode('-', $last_token);

			$token = $last_token_number[1] + 1;

			$real_token_number = "TKN-" . sprintf("%03s", $token);

			$real_book_token = Booking::create([
				'token_number' =>  $real_token_number,
				'name' => $request->name,
				'age' => $request->age,
				'phone' => $request->phone,
				'address' => $request->address,
				'booking_date' => $check_date,
				'status' => 1,
				'submit_by' => 0,
				'user_id' => 1,
				'doctor_id' => request('doctor'),
				'floor_id' => 1,
				'booking_status' => $booking_status,
				'zoom_id' => $zoom_id,
				'zoom_psw' => $zoom_psw,
				'start_url' => $start_url,
				'join_url' => $join_url,
			]);

			// alert()->success('Token Number', $real_token_number)->persistent('Close');

			// return redirect()->back();
		} else {

			$booking_array = $check_booking->toArray();

			$last_token_booking_arry = array_column($booking_array, 'token_number');

			$last_token = end($last_token_booking_arry);

			$last_token_number = explode('-', $last_token);

			$token = $last_token_number[1] + 1;

			$real_token_number = "TKN-" . sprintf("%03s", $token);

			$real_book_token = Booking::create([
				'token_number' =>  $real_token_number,
				'name' => $request->name,
				'age' => $request->age,
				'phone' => $request->phone,
				'address' => $request->address,
				'booking_date' => $check_date,
				'status' => 1,
				'user_id' => 1,
				'doctor_id' => request('doctor'),
				'floor_id' => 1,
				'booking_status' => $booking_status,
				'zoom_id' => $zoom_id,
				'zoom_psw' => $zoom_psw,
				'start_url' => $start_url,
				'join_url' => $join_url,
			]);

		}
		$doctor= Doctor::findOrfail(request('doctor'));
		$doctorService= $doctor->services->sum('charges');
		$amount1  =$doctor->online_early_payment/1700; //1.76
		$amount2=round($amount1, 2);

		$amount3 = $amount2* 100;
		$amount =sprintf("%012s", $amount3);
			// dd($doctorService->sum('charges'));
			// alert()->success('Token Number', $real_token_number)->persistent('Close');
		return view('payments.payment4',compact('doctorService','real_book_token','doctor','amount'));

	}

	protected function editBookingRecord(Request $request)
	{

		try {

			$booking = Booking::findOrFail($request->booking_id);
		} catch (\Exception $e) {

			alert()->error("Booking Not Found!")->persistent("Close!");

			return response()->json([
				'status' => "failed",
			]);
		}

		$booking->name = $request->name;

		$booking->age = $request->age;

		$booking->phone = $request->phone;

		$withdateOrnodate= $request->withdateOrnodate;

		if ($booking->save()) {

			return response()->json([$booking->save(),$withdateOrnodate]);;
		} else {

			alert()->error("Database Error!")->persistent("Close!");

			return redirect()->back();
		}
	}

	protected function adminconfirmbooking(Request $request)
	{

		try {

			$booking = Booking::findOrFail($request->booking_id);
		} catch (\Exception $e) {

			alert()->error("Booking Not Found!")->persistent("Close!");

			return response()->json([
				'status' => "failed",
			]);;
		}

		$booking->status = 1;

		if ($booking->save()) {

			return response()->json($booking->save());;
		} else {

			alert()->error("Database Error!")->persistent("Close!");

			return redirect()->back();
		}
	}

	protected function admincheckinbooking(Request $request)
	{

		try {

			$booking = Booking::findOrFail($request->booking_id);
		} catch (\Exception $e) {

			alert()->error("Booking Not Found!")->persistent("Close!");

			return response()->json([
				'status' => "failed",
			]);;
		}

		$booking->status = 4;

		if ($booking->save()) {

			return response()->json($booking->save());;
		} else {

			alert()->error("Database Error!")->persistent("Close!");

			return redirect()->back();
		}
	}
	protected function admincanclebooking(Request $request)
	{

		try {

			$booking = Booking::findOrFail($request->booking_id);
		} catch (\Exception $e) {

			alert()->error("Booking Not Found!")->persistent("Close!");

			return response()->json([
				'status' => "failed",
			]);;
		}

		$booking->status = 2;

		if ($booking->save()) {

			return response()->json($booking->save());;
		} else {

			alert()->error("Database Error!")->persistent("Close!");

			return redirect()->back();
		}
	}


	protected function admindonebooking(Request $request)
	{

		try {
			$booking = Booking::findOrFail($request->booking_id);
		} catch (\Exception $e) {

			alert()->error("Booking Not Found!")->persistent("Close!");

			return response()->json([
				'status' => "failed",
			]);;
		}
		if ($booking->description ==null || $booking->diagnosis == null || $booking->remark_booking_date==null) {

			return response()->json([
				$booking->doctor->services,
				0,
			]);
		}
		$booking->status = 5;
		if ($booking->save()) {

			return response()->json([
				$booking->doctor->services,
				1,
			]);
		} else {

			alert()->error("Database Error!")->persistent("Close!");

			return redirect()->back();
		}
	}

	protected function checkedallconfirm(Request $request)
	{

		try {

			$checked_ids = $request->checked_id;
		} catch (\Exception $e) {

			alert()->error("Something worng!")->persistent("Close!");

			return response()->json([
				'status' => "failed",
			]);;
		}
		$checked_id_objs = (object) $checked_ids;

		foreach ($checked_id_objs as $checked_id_obj) {

			$bookingcomfirm = Booking::findOrFail($checked_id_obj);
			$bookingcomfirm->status = 1;
			$bookingcomfirm->save();
		}
		return response()->json(1);
		// $booking->status = 1;

		// if($booking->save()){

		// 	return response()->json($booking->save());;

		// }else{

		//     alert()->error("Database Error!")->persistent("Close!");

		//      return redirect()->back();
		// }
	}

	//For mobile app
	protected function announcementStore(Request $request)
	{

		$validator = Validator::make($request->all(), [
			'title' => 'required',
			'description' => 'required',
			'short_description' => 'required',
			'photo' => 'required',
		]);

		if ($validator->fails()) {

			alert()->error('Something Wrong');

			return redirect()->back();
		}

		$booking_range = request('range');

		$weekormonth = request('weekormonth');

		if ($request->hasfile('photo')) {

			$image = $request->file('photo');

			$name = $image->getClientOriginalName();

			$image_name =  time() . "-" . $name;

			$image->move(public_path() . '/image/ann/', $image_name);

			$image = $image_name;
		}

		$now = new DateTime('Asia/Yangon');

		$today = $now->format('Y-m-d');

		$today_string = strtotime($today);

		if ($weekormonth == "month") {

			$expire_date = strtotime("+$booking_range months", $today_string);
		} else {

			$expire_date = strtotime("+$booking_range week", $today_string);
		}

		$announcement = Announcement::create([
			'title' => request('title'),
			'description' => request('description'),
			'short_description' => request('short_description'),
			'photo_path' => $image_name,
			'slide_status' => 0,
			'expired_at' => date('Y-m-d', $expire_date),
		]);

		alert()->success('Successfully Added!')->autoclose(2000);

		return redirect()->back();
	}

	protected function advertiesmentStore(Request $request)
	{

		$validator = Validator::make($request->all(), [
			'title' => 'required',
			'short_description' => 'required',
			'description' => 'required',
			'short_description' => 'required',
			'photo' => 'required',
			'start_date' => 'required'
		]);

		if ($validator->fails()) {

			alert()->error('Something Wrong');

			return redirect()->back();
		}

		$booking_range = request('range');

		$weekormonth = request('weekormonth');

		if ($request->hasfile('photo')) {

			$image = $request->file('photo');

			$name = $image->getClientOriginalName();

			$image_name =  time() . "-" . $name;

			$image->move(public_path() . '/image/adv/', $image_name);

			$image = $image_name;
		}

		$today = Carbon::parse($request->start_date);
		// $now = $request->start_date;
		// dd($now);
		// $today = $now->format('Y-m-d');
		$req_date = $today->format('Y-m-d');
		$today_string = strtotime($today);

		if ($weekormonth == "month") {

			$expire_date = strtotime("+$booking_range months", $today_string);
		} else {

			$expire_date = strtotime("+$booking_range week", $today_string);
		}

		$advertisement = Advertisement::create([
			'title' => request('title'),
			'description' => request('description'),
			'short_description' => request('short_description'),
			'photo_path' => $image_name,
			'expired_at' => date('Y-m-d', $expire_date),
			'start_date' =>  $req_date
		]);

		alert()->success('Successfully Added!')->autoclose(2000);

		return redirect()->back();
	}

	public function advertiesmentIndex()
	{
		$advertisements = Advertisement::all();
		return view('Admin.Advertisment.advertisment', compact('advertisements'));
	}
	public function announcementIndex()
	{
		$announcements = Announcement::all();
		return view('Admin.Advertisment.announcement', compact('announcements'));
	}

	protected function getStateList()
	{

		$state_lists = State::all();

		return view('Admin.state_list', compact('state_lists'));
	}

	protected function storeTown(Request $request)
	{

		$validator = Validator::make($request->all(), [
			'code' => 'required',
			'name' => 'required',
			'state_id' => 'required',
			'allowdelivery'=> 'required',
		]);
		if($request->allowdelivery == 1){
			$validator = Validator::make($request->all(), [
				'code' => 'required',
				'name' => 'required',
				'state_id' => 'required',
				'allowdelivery'=> 'required',
				'charges' => 'required'
			]);
		}
		if ($validator->fails()) {

			alert()->error('Something Wrong!');

			return redirect()->back();
		}

		try {

			$town = Town::create([
				'town_code' => $request->code,
				'town_name' => $request->name,
				'state_id' => $request->state_id,
				'status' => $request->allowdelivery,
				'delivery_charges'=> $request->charges,
			]);

		} catch (\Exception $e) {

			alert()->error('Something Wrong!');

			return redirect()->back();
		}

		alert()->success('Successfully Added');

		return redirect()->back();
	}

	protected function ajaxSearchTown(Request $request)
	{

		$validator = Validator::make($request->all(), [
			'state_id' => 'required',
		]);

		if ($validator->fails()) {

			return response()->json(array("errors" => $validator->getMessageBag()), 422);
		}

		$town_lists = Town::where('state_id', $request->state_id)->get();

		return response()->json($town_lists);
	}

	protected function editTown(Request $request)
	{

		try {

			$town = Town::findOrFail($request->town_id);
		} catch (\Exception $e) {

			alert()->error("Town Not Found!")->persistent("Close!");

			return redirect()->back();
		}


		$town->town_code = $request->code;
		$town->town_name = $request->name;
		$town->status = $request->allowdelivery;
		$town->delivery_charges = $request->editcharges;

		$town->save();

		alert()->success('Successfully Updated!');

		return redirect()->back();
	}
}
