<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Day;
use App\Doctor;
use App\Department;
use App\User;
use App\ExperienceInformation;
use App\EducationInformation;
use App\DoctorInfo;
use App\Employee;
use App\Service;
use DateTime;

class DoctorController extends Controller
{
	//Finalize
	
	protected function DoctorList(){

		$doctors = Doctor::all();
		
		$employee = Employee::get();
		return view('Doctor.doctor_lists', compact('doctors','employee'));
	}

	protected function CreateDoctor(){

		$departments = Department::all();

		$days = Day::all();

		$doctorServices = Service::where('status',0)->get();

		return view('Doctor.create_doctor', compact('departments','days','doctorServices'));
	}

   	protected function StoreDoctor(Request $request){

		$image = "user.jpg";

		$degree = $request->degree;

        $degree_arr = explode("-", $degree, -1);

        $university = $request->university;

        $university_arr = explode("-", $university, -1);

        $subject = $request->subject;

        $subject_arr = explode("-", $subject, -1);

        $position = $request->position;

        $position_arr = explode("-", $position, -1);

        $place = $request->place;

        $place_arr = explode("-", $place, -1);
//user create
		$user= User::create([
			'name' => $request->name,
			'email' => $request->email,
			'password' => bcrypt($request->password)
		]);
//role create
		$user->assignRole(5);
//

		$doctors = Doctor::create([
			'name' => $request->name,
			'gender' => $request->gender,
			'photo' => $image,
			'doctor_code' => "",
			'position' => $request->position_now,
			'address' => $request->address,
			'about_doc' => $request->about_doc,
			'phone' => $request->phone,
			'status' => 1,
			'user_id' => $user->id,
			'department_id' => $request->department,
			'online_early_payment' => $request->online_early_payment,
		]);

		$doctor_id = $doctors->id;

		$doctor_code = "DOC-" . sprintf("%04s", $doctor_id);

		$doctors->doctor_code = $doctor_code;

		$doctors->save();

		$booking_range = request('range');

		$range = request('weekormonth');

		$book_range = $booking_range . "-" . $range;

		$doc_info = DoctorInfo::create([
			'reserved_token' => $request->vip_token,
			'maximum_token' => $request->max_token_no,
			'status' => $request->status,
			'advance_time' => 0,
			'time_per_patient' => 0,
			'doctor_id' => $doctors->id,
			'booking_range' => $book_range,
		]);

		$services= $request->services;
		if($services){
			foreach($services as $service){
				$doctors->services()->attach($service);
			}
		}
	
		
		$now = $now = new DateTime('Asia/Yangon');

        $today = $now->format('Y-m-d H:i:s');

        for($count = 0; $count < count($degree_arr); $count++){

            $data_two = array(
                'university'  => $university_arr[$count],
                'subject'  => $subject_arr[$count],
                'degree'  => $degree_arr[$count],
                'doctor_id'  => $doctors->id,
                'created_at'  => $today,
                'updated_at'  => $today,
            );

            $insert_data_edu[] = $data_two; 
        }       

        $edu = EducationInformation::insert($insert_data_edu);	


        if (count($position_arr) != 0) {

        	for($count = 0; $count < count($position_arr); $count++){

	            $data_one = array(
	                'position'  => $position_arr[$count],
	                'place'  => $place_arr[$count],
	                'doctor_id'  => $doctors->id,
	                'created_at'  => $today,
	                'updated_at'  => $today,
	            );

	            $insert_data_exp[] = $data_one; 
        	}

        	$exp = ExperienceInformation::insert($insert_data_exp);
        }        





		return response()->json($doctors);
   	}

	   protected function editDoctor($id){

		// $user= User::findOrfail($id);
		$doctor = Doctor::where('id',$id)->with('department')->with('doc_info')->with('doc_exp')->with('doc_edu')->with('services')->with('user')->first();
		$doctorServices = Service::where('status',0)->get();
		$departments = Department::all();
		return view('Doctor.edit_doctor', compact('doctor','departments','doctorServices'));
	}

	protected function editStoreDoctor(Request $request){

		$image = "user.jpg";

		$degree = $request->degree;

        $degree_arr = explode("-", $degree, -1);

        $university = $request->university;

        $university_arr = explode("-", $university, -1);

        $subject = $request->subject;

        $subject_arr = explode("-", $subject, -1);

        $position = $request->position;

        $position_arr = explode("-", $position, -1);

        $place = $request->place;

        $place_arr = explode("-", $place, -1);
//user create
$doc= Doctor::find($request->doctor_id);
$doctor = $doc->update([
	'name' => $request->name,
	'gender' => $request->gender,
	'photo' => $image,
	'doctor_code' => "",
	'position' => $request->position_now,
	'address' => $request->address,
	'about_doc' => $request->about_doc,
	'phone' => $request->phone,
	'status' => 1,
	'user_id' => $doc->user->id,
	'department_id' => $request->department,
	'online_early_payment' => $request->online_early_payment,
]);
		$user= $doc->user->update([
			'name' => $request->name,
			'email' => $request->email
		]);
		if($request->password){
			$doc->user->update([
				'password' => bcrypt($request->password)
			]);
		}
//
		$booking_range = request('range');

		$range = request('weekormonth');

		$book_range = $booking_range . "-" . $range;
		$doc_info = $doc->doc_info->update([
			'reserved_token' => $request->vip_token,
			'maximum_token' => $request->max_token_no,
			'status' => $request->status,
			'advance_time' => 0,
			'time_per_patient' => 0,
			'doctor_id' => $request->doctor_id,
			'booking_range' => $book_range,
		]);

		$services= $request->services;
			$doc->services()->sync($services);

        $edu = EducationInformation::where('doctor_id',$request->doctor_id)->delete();	
        for($count = 0; $count < count($degree_arr); $count++){

            $data_two = array(
                'university'  => $university_arr[$count],
                'subject'  => $subject_arr[$count],
                'degree'  => $degree_arr[$count],
                'doctor_id'  => $request->doctor_id
            );

        $edu = EducationInformation::updateOrCreate($data_two);	

        }       
		$exp = ExperienceInformation::where('doctor_id',$request->doctor_id)->delete();

        if (count($position_arr) != 0) {

        	for($count = 0; $count < count($position_arr); $count++){

	            $data_one = array(
	                'position'  => $position_arr[$count],
	                'place'  => $place_arr[$count],
	                'doctor_id'  => $request->doctor_id,
	            );

	            $insert_data_exp[] = $data_one; 
        	}
        	$exp = ExperienceInformation::insert($insert_data_exp);
        }        



		$docto = Doctor::where('id',$request->doctor_id)->with('department')->with('doc_info')->with('doc_exp')->with('doc_edu')->with('services')->with('user')->first();


		return response()->json($docto);
   	}
	protected function CheckDoctorProfile($doctor, Request $request){

		try {

			$doctor = Doctor::findOrFail($doctor);

			return view ('Doctor.profile', compact('doctor'));

   		} catch (\Exception $e) {
   		    
        	alert()->error("Doctor Not Found!")->persistent("Close!");
            
            return redirect()->back();

    	}	
	}
}
