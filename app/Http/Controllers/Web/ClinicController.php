<?php

namespace App\Http\Controllers\Web;

use DateTime;
use App\Doctor;
use App\Voucher;
use App\Appointment;
use App\AppointmentAttachment;
use App\Clinicappointmentinfo;
use App\CountingUnit;
use App\ClinicPatient;
use App\Diagnosis;
use App\Dose;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Patient;
use Illuminate\Support\Facades\Validator;

class ClinicController extends Controller
{
    protected function patientregister()
	{

		$doctors = Doctor::all();

		return view('Clinic.patient_register', compact('doctors'));
	}
	public function appointmentStore(Request $request)
	{
		
		$validator = Validator::make($request->all(), [
            'name' => 'required',
            'fathername' => 'required',
            'age' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'appointmentdoc' => 'required',
            'appointmentclinic' => 'required',
            'date' => 'required',
            'time' => 'required',
        ]);

        if ($validator->fails()) {

            alert()->error('Something Wrong!');

            return redirect()->back();
        }

		$date = date("Y-m-d", strtotime($request->date));
		$time = date("h:i", strtotime($request->time));

		$check_booking = Appointment::where('doctor_id', $request->appointmentdoc)
		->whereDate('date', $date)->where('from_clinic',$request->appointmentclinic)
		->get();

		if(!empty($check_booking)){
			$count = count($check_booking) +1;
			$token_number = "TKN-" . sprintf("%03s", $count);

		}else{
			$token_number = "TKN-" . sprintf("%03s", 1);
		}
	


		$app= ClinicPatient::all();
		if(!empty($app)){
			$app_count = count($app) +1;
			$patient_code = "PTN-" . sprintf("%04s", $app_count);

		}else{
			$patient_code = "PTN-" . sprintf("%04s", 1);
		}

		$patient = ClinicPatient::create([
			'name'=>$request->name,
			'father_name'=>$request->fathername,
			'age'=>$request->age,
			'phone'=>$request->phone,
			'address'=>$request->address,
			'code'=> $patient_code,
			'age_month'=> $request->age_month,
		]);

	

		$appointment = Appointment::create([
			'doctor_id'=>$request->appointmentdoc,
			'clinic_patient_id' =>$patient->id,
			'from_clinic'=> $request->appointmentclinic,
			'date' => $date,
			'time' => $time,
			'token'=> $token_number
		]);
		alert()->success(' Success !');

		return redirect()->route("appointments",$patient->id);
	}
	public function searchpatient(Request $request)
	{
		$patients = ClinicPatient::where('name', 'LIKE', "%{$request->name}%") 
		->where('father_name', 'LIKE', "%{$request->fathername}%")->get();
		return response()->json($patients);
	}
	public function oldpatientAppointment(Request $request)
	{

		$validator = Validator::make($request->all(), [
            'oldpatientid' => 'required',
            'oldappointmentdoc' => 'required',
            'oldappointmentclinic' => 'required',
            'olddate' => 'required',
            'oldtime' => 'required',
        ]);

        if ($validator->fails()) {

            alert()->error('Something Wrong!');

            return redirect()->back();
        }

		$date = date("Y-m-d", strtotime($request->olddate));
		$time = date("h:i", strtotime($request->oldtime));
		
		$check_booking = Appointment::where('doctor_id', $request->oldappointmentdoc)
		->whereDate('date', $date)->where('from_clinic',$request->oldappointmentclinic)
		->get();

		if(!empty($check_booking)){
			$count = count($check_booking) +1;
			$token_number = "TKN-" . sprintf("%03s", $count);

		}else{
			$token_number = "TKN-" . sprintf("%03s", 1);
		}
	
		$appointment = Appointment::create([
			'doctor_id'=>$request->oldappointmentdoc,
			'clinic_patient_id' =>$request->oldpatientid,
			'from_clinic'=> $request->oldappointmentclinic,
			'date' => $date,
			'time' => $time,
			'token'=> $token_number
		]);
		alert()->success(' Success !');

		return redirect()->route("appointments",$request->oldpatientid);

	}
	public function appointments($patient_id)
	{
		try {
			$patient = ClinicPatient::findOrFail($patient_id);
		} catch (\Exception $e) {

			alert()->error("Patient Not Found!")->persistent("Close!");

		}
		$date = new DateTime('Asia/Yangon');
        $today_date = $date->format('d');

		$appointments = Appointment::where('clinic_patient_id',$patient_id)->with('clinic_patient')->with('diagnosis')->with('voucher')->orderBy('id','desc')->get();
		return view("Clinic.appointment", compact('appointments','patient','today_date'));
	}
	public function todayAppointments()
	{
		$date = new DateTime('Asia/Yangon');
        $today_date = $date->format('y-m-d');

		$userId = session()->get('user')->id;
		$doctor =Doctor::where('user_id',$userId)->first();
		if($doctor){
			$appointments = Appointment::where('date',$today_date)->where('doctor_id',$doctor->id)->with('clinic_patient')->with('voucher')->get();
		}
		else{
			$appointments = Appointment::where('date',$today_date)->with('clinic_patient')->with('voucher')->get();
		}
		return view('Clinic.appointments',compact('appointments'));
	}
	public function searchpatientToday(Request $request)
	{
		$todayorall= $request->todayorall;
		$date = new DateTime('Asia/Yangon');
        $today_date = $date->format('d');
		$name= $request->name;
		$fathername= $request->fathername;
		if($todayorall=='today')
		{
			$appointments = Appointment::whereDay('date',$today_date)->with('clinic_patient')->with('doctor')->with('voucher')->whereHas('clinic_patient', function($q) use($name, $fathername){
				$q->where('name', 'LIKE', "%{$name}%")->where('father_name', 'LIKE', "%{$fathername}%");
			})->get();
		}
		else{
			$dias= $request->diagnosis;
			if($request->filterName=='name'){
				if($dias){
					$appointments= ClinicPatient::where('name', 'LIKE', "%{$name}%")->where('father_name', 'LIKE', "%{$fathername}%")->with('appointments.diagnosis')
					->whereHas('appointments.diagnosis', function($q) use($dias){
						// foreach($dias as $dia){
						// 	$q= $q->where('diagnosis_id', $dia); 
						// 	if($q){
						// 		continue;
						// 	}else{
						// 		break;
						// 	}
						// }
						$q->whereIn('diagnosis_id',$dias);
					})
					->withCount('appointments')->get();
				}
				else{
					$appointments= ClinicPatient::where('name', 'LIKE', "%{$name}%")->where('father_name', 'LIKE', "%{$fathername}%")->withCount('appointments')->get();
				}
			}
			else{
				$fromdate= $request->fromdate;
				$todate= $request->todate;
				$appointments= ClinicPatient::with('appointments')
				->whereHas('appointments', function($q) use($fromdate,$todate){
					$q->whereBetween('date', [$fromdate, $todate]);
				})
				->withCount('appointments')->get();
				// $appointments = Appointment::whereBetween('date', [$request->fromdate, $request->todate])->with('clinic_patient')->with('doctor')->with('voucher')->get();
			}
		
				
		}
		return response()->json($appointments);
		
	}
	public function searchAppointments(Request $request)
	{
		$patient_id= $request->patient_id;
	
		if($request->filterName== 'count'){

			$appointments = Appointment::where('clinic_patient_id',$patient_id)->latest()->take($request->count)->with('doctor')->with('diagnosis')->get();
			
		}
		else if($request->filterName== 'date'){
			$fromdate= $request->fromdate;
			$todate= $request->todate;
			$appointments = Appointment::where('clinic_patient_id',$patient_id)->whereBetween('date',[$fromdate,$todate])->with('doctor')->with('diagnosis')->get();

		}
		else{
			$appointments = Appointment::where('clinic_patient_id',$patient_id)->with('doctor')->with('diagnosis')->get();
		}
		return response()->json($appointments);

	}
	public function appointmentRecord($appointment_id)
	{
		$userId = session()->get('user')->id;
		$appointment = Appointment::where('id',$appointment_id)->with('attachments')->with('clinic_patient')->with('voucher')->with('voucher.counting_unit')->with('voucher.services')->with('diagnosis')->first();
		// $vouchers = Voucher::where('appointment_id',$appointment_id)->where('clinicvoucher_status',0)->with('counting_unit')->with('counting_unit.item')->with("services")->first();
		$vouchers = Voucher::where('appointment_id',$appointment_id)->with('counting_unit')->with('counting_unit.item')->with("services")->first();
		try {
			$appointment = Appointment::where('id',$appointment_id)->with('clinic_patient')->with('diagnosis')->first();
		} catch (\Exception $e) {

			alert()->error("Appointment Not Found!")->persistent("Close!");
			return back();

		}
		$diagnosis = Diagnosis::where('created_by',$userId)->get();
		$doses = Dose::all();
		$appointmentinfo= $appointment->appointmentinfo;
		return view("Clinic.record", compact('appointment','appointmentinfo','diagnosis','doses','vouchers'));
	}
	public function patientHistory($appointment_id)
	{
		try {
			$appointment = Appointment::where('id',$appointment_id)->with('attachments')->with('clinic_patient')->with('voucher')->with('voucher.counting_unit')->with('voucher.services')->with('diagnosis')->first();
			
		} catch (\Exception $e) {

			alert()->error("Appointment Not Found!")->persistent("Close!");
			return back();
		}
		$look_pro = 0;

		if($appointment->voucher){
			foreach($appointment->voucher->counting_unit as $counting){
				$look_pro+=$counting->pivot->look_procedure;
			}
		}
	
		$appointmentinfo= $appointment->appointmentinfo;
		return view("Clinic.patienthistory", compact('appointment','appointmentinfo','look_pro'));
	}
	public function attachmentsDelete(Request $request)
	{
		try {
			$attachmentfile = AppointmentAttachment::findOrfail($request->document_id);
		} catch (\Exception $e) {

			return response()->json(0);

		}
		$attachmentfile->delete();

		return response()->json(1);

	}
	public function storeRecord(Request $request)
	{

			$validator = Validator::make($request->all(), [
				'doctorChargesbyHand' => 'required',
				'patient_id' => 'required',
				'appointment_id' => 'required',
			]);
			if($request->medicineTotalbyHand){
				$validator = Validator::make($request->all(), [
					'dose' => 'required',
					'duration' => 'required',
					'qtyDose' => 'required',
					'medicineTotalbyHand' => 'required'
				]);
				
			}

        if ($validator->fails()) {

            alert()->error('Something Wrong!');

            return redirect()->back();
        }
			$user = session()->get('user');

			$date = new DateTime('Asia/Yangon');

			$voucher_date = $date->format('Y-m-d');

			$items = json_decode($request->item);

			$grand = json_decode($request->grand);

			$pagServiceItem = json_decode($request->pagServiceItem);

			$pagServicegrandTotal = json_decode($request->pagServicegrandTotal);

			$total_amount = ($request->medicineTotalbyHand ?? 0)+$request->serviceTotalbyHand+$request->doctorChargesbyHand;
			
			// $total_quantity = $request->allQty;
			$alreadyVoucher = Voucher::where('appointment_id',$request->appointment_id)->first();

			if($alreadyVoucher){
				$voucher_code= $alreadyVoucher->voucher_code;
			}
			else
			{
				$last_voucher = Voucher::get()->last();
				if(empty($last_voucher)){
				$voucher_code =  "VOU-".date('dmY')."-".sprintf("%04s", 1);
				}else{
					$voucher_code =  "VOU-".date('dmY')."-".sprintf("%04s", ($last_voucher->id + 1));
		
				}
			}
			$voucher = Voucher::updateOrCreate([
				'appointment_id'=> $request->appointment_id
			],[
				'voucher_code' => $voucher_code,
				'sale_by' => $user->id,
				'total_price' =>  $total_amount,
				'total_quantity' => 0,
				'voucher_date' => $voucher_date,
				'type' => 1,
				'status' => 0,
				'clinicvoucher_status'=> 0,   //just record not voucher 
				'medicine_charges'=> $request->medicineTotalbyHand,
				'service_charges'=> $request->serviceTotalbyHand,
				'doctor_charges'=> $request->doctorChargesbyHand,
			]);
		
			if(!empty($items)){
				$voucher->counting_unit()->detach();
				foreach ($items as $key=>$item) {
					if($request->look_procedure){
						for($i=0;$i<count($request->look_procedure);$i++){
							if($item->id == (int) $request->look_procedure[$i]){
								$lookProcedure = 1;
								break;
							}else{
								$lookProcedure=0;
							}
						}
					}else{
						$lookProcedure=0;
					}
					
					$dosename = Dose::find($request->dose[$key]);
					$doseNameQty =$dosename->name;
					$voucher->counting_unit()->attach($item->id, ['quantity' => $request->totlaqty[$key],'price' => 0,'dose'=> $doseNameQty,'duration'=> $request->duration[$key],'doseper_qty'=>$request->qtyDose[$key],'look_procedure'=>$lookProcedure]);
				}
			}

			if(!empty($pagServiceItem))
			{
				$voucher->services()->detach();

				foreach ($pagServiceItem as $pagServiceitem) {
					if($pagServiceitem->type=="service"){
					$voucher->services()->attach($pagServiceitem->id, ['quantity' => $pagServiceitem->qty]);
					}else{
					$voucher->packages()->attach($pagServiceitem->id, ['quantity' => $pagServiceitem->qty]);
					}
					
					// $voucher->services()->attach($pagServiceitem->id, ['quantity' => $pagServiceitem->qty]);
			
				}
			}

		alert()->success(' Success !');
		return redirect()->route('patienthist',$request->appointment_id);
	}

	public function storeRecordInfo(Request $request)
	{
		if(session()->get('user')->hasRole('EmployeeC')){
			$validator = Validator::make($request->all(), [
				'temperature' => 'required',
				'oxygen' => 'required',
				'weight_kg' => 'required',
				'weight_lb' => 'required',
			]);
		}
		elseif(session()->get('user')->hasRole('DoctorC')){
			$validator = Validator::make($request->all(), [
				'procedure' => 'required',
			]);
		}

        if ($validator->fails()) {

            alert()->error('Something Wrong!');

            return redirect()->back();
        }

		if(session()->get('user')->hasRole('EmployeeC')){
			$appointmentinfo = Clinicappointmentinfo::updateOrCreate([
				'appointment_id'=>$request->appointment_id,],
			[
				'body_temperature'=> $request->temperature,
				'bloodpressure_lower'=> $request->lowerpressure,
				'bloodpressure_higher'=>$request->upperpressure,
				'pr' =>$request->pr,
				'oxygen'=> $request->oxygen,
				'weight_kg' =>$request->weight_kg,
				'weight_lb' =>$request->weight_lb,
			
			]);
		
		}
	
		elseif(session()->get('user')->hasRole('DoctorC')){
			$titles =count($request->titles);
			$titlesdata= [];
			$descriptionsdata= [];
			for($i=0; $i<$titles; $i++){
				if($request->titles[$i]){
					array_push($titlesdata,$request->titles[$i]);
					array_push($descriptionsdata,$request->descriptions[$i]);
				}
			}

			$appointmentinfo = Clinicappointmentinfo::updateOrCreate([
				'appointment_id'=>$request->appointment_id,],
			[
				'next_appointmentdate'=> $request->nextappointment_date,
				"gc" => $request->gc,
				"ht" => $request->ht,
				"lgs" => $request->lgs,
				"abd" => $request->abd,
				"titles"=> json_encode($titlesdata),
				"descriptions" => json_encode($descriptionsdata),
				"complaint" => $request->complaint,
				"procedure" => $request->procedure,
				'bloodpressure_lower'=> $request->lowerpressure,
				'bloodpressure_higher'=>$request->upperpressure,
				'pr' =>$request->pr,

			]);

			$appointment = Appointment::findOrfail($request->appointment_id);
			$appointment->diagnosis()->detach();
			foreach($request->diagnosis as $diag){
				$appointment->diagnosis()->attach($diag);
			}

		}
		alert()->success(' Success !');
		return back();
	}
	public function addserviceCounter(Request $request)
	{
			$validator = Validator::make($request->all(), [
				'pagServiceItem' => 'required',
				'addserviceCharge' => 'required',
				'pagServicegrandTotal'=>'required',
				'appintment_id'=> 'required',
			]);

        if ($validator->fails()) {

            alert()->error('Something Wrong!');

            return redirect()->back();
        }

			$user = session()->get('user');

			$date = new DateTime('Asia/Yangon');

			$pagServiceItem = json_decode($request->pagServiceItem);

			$pagServicegrandTotal = json_decode($request->pagServicegrandTotal);

			// $total_quantity = $request->allQty;
			$alreadyVoucher = Voucher::where('appointment_id',$request->appintment_id)->first();

			if(empty($alreadyVoucher)){
				alert()->error('Doctor is still looking the patient!');
				return redirect()->route('patienthist',$request->appintment_id);

			}
			$char = $alreadyVoucher->service_charges + $request->addserviceCharge;
			$alreadyVoucher->service_charges = $char;
			$tot_price= $alreadyVoucher->total_price + $request->addserviceCharge;
			$alreadyVoucher->total_price = $tot_price;
			$alreadyVoucher->save();
			
			if(!empty($pagServiceItem))
			{
				foreach ($pagServiceItem as $pagServiceitem) {
					if($pagServiceitem->type=="service"){
					$alreadyVoucher->services()->attach($pagServiceitem->id, ['quantity' => $pagServiceitem->qty]);
					}else{
					$alreadyVoucher->packages()->attach($pagServiceitem->id, ['quantity' => $pagServiceitem->qty]);
					}
					
					// $voucher->services()->attach($pagServiceitem->id, ['quantity' => $pagServiceitem->qty]);
			
				}
			}

		alert()->success(' Success !');
		return redirect()->route('patienthist',$request->appintment_id);
	}
	public function attachmentsStore(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'appointment_id' => 'required',
			'descriptions' => 'required',
			'attachments'=>'required'
		]);
	

	if ($validator->fails()) {

		alert()->error('Please Fill the Fileds!');

		return redirect()->back();
	}

		if($request->hasfile('attachments'))
        {

            foreach($request->file('attachments') as $key=>$file)
            {
                $name1=$file->getClientOriginalName();
                $name = time().$name1;
				$path='/files/attachments/'.$name;
				$file->move(public_path() . '/files/attachments', $name);
				$attachmentfile= AppointmentAttachment::create([
					'attachment'=> $path,
					'description'=> $request->descriptions[$key],
					'appointment_id' => $request->appointment_id

				]);
            }
        }else{

			alert()->error('Something Wrong!');

			return redirect()->back();
		}
		alert()->success('Success!');

			return redirect()->back();
	}
	public function history()
	{
		$diagnosis = Diagnosis::all();
		return view('Clinic.history',compact('diagnosis'));
	}
	public function storeVoucher(Request $request)
	{
		$voucher = Voucher::findOrfail($request->voucher_id);
		$voucher->clinicvoucher_status = 1;    //get voucher
		$voucher->save();

		return response()->json('success');

	}
	protected function clinicSaleHistoryPage(Request $request){
        $voucher_lists =Voucher::where('clinicvoucher_status', 1)->orderBy('id','desc')->get();
        
        $countunits=[];
        $arr_ki=[];
        $total_qty=[];

                    foreach($voucher_lists as $key=>$item){
                        $item_count=count($countunits);
                        for($i=0; $i<count($item->counting_unit);$i++){
                            if(!in_array($item->counting_unit[$i]->id,$arr_ki)){
                                array_push($arr_ki,$item->counting_unit[$i]->id);
                                array_push($total_qty,[
                                    'countingunit_id'=>$item->counting_unit[$i]->id,
                                    'qty'=>$item->counting_unit[$i]->pivot->quantity]
                                );
                                array_push($countunits,$item->counting_unit[$i]);
                            }            

                        else{
                            foreach($total_qty as $key=>$t){


                               if($t['countingunit_id']==$item->counting_unit[$i]->id)
                                {
                                    $qty = $t['qty'] + $item->counting_unit[$i]->pivot->quantity;
                                    
                                    array_splice($total_qty, $key, 1);
                                    array_push($total_qty,[
                                        'countingunit_id'=>$item->counting_unit[$i]->id,
                                        'qty'=>$qty
                                    ]);
                                }
                            }

                        }

                        }
                        
                    }

                    $total_sales  = 0;
        
        foreach ($voucher_lists as $voucher_list){

            $total_sales += $voucher_list->total_price;

        }
        $date = new DateTime('Asia/Yangon');
        
        $current_date = strtotime($date->format('Y-m-d'));
        
        $weekly = date('Y-m-d', strtotime('-1week', $current_date));
        
        $weekly_data = Voucher::where('type', 1)->whereBetween('created_at', [$current_date, $weekly])->get();
        
        $weekly_sales = 0;
        
        foreach($weekly_data as $weekly){
            
            $weekly_sales += $weekly->total_price;
        }

        $current_month = $date->format('m');
        
        $today_date = $date->format('d');
        
        $daily = Voucher::where('type', 1)->whereDay('created_at', $today_date)->get();
        
        $daily_sales = 0;
        
        foreach($daily as $day){
            
            $daily_sales += $day->total_price;
        }
        
        $monthly = Voucher::where('type', 1)->whereMonth('created_at',$current_month)->get();

        $monthly_sales = 0;
        
        foreach ($monthly as $month){

            $monthly_sales += $month->total_price;
        }

        $counting_units= CountingUnit::all();

        return view('Sale.sale_history_page',compact('counting_units','voucher_lists','total_sales','daily_sales','monthly_sales','weekly_sales','total_qty','countunits'));
    }
	public function getDiagnosis()
	{
		$userId = session()->get('user')->id;
		$diagnosis = Diagnosis::where('created_by',$userId)->get();
		return view('Clinic.diagnosis',compact('diagnosis'));
	}
	
	public function diagnosisStore(Request $request)
	{
		$userId = session()->get('user')->id;
		$diagnosis= Diagnosis::create([
			'name' => $request->name,
			'created_by'=> $userId
		]);
		alert()->success('Successfully Added!');

		return redirect()->route('getDiagnosis');
	}
	public function diagnosisStoreOntime(Request $request)

	{
		$userId = session()->get('user')->id;
		$alreadyDiagnosis = Diagnosis::where('name',$request->name)->where('created_by',$userId)->first();
		if(!$alreadyDiagnosis){
			$diagnosis= Diagnosis::create([
				'name' => $request->name,
				'created_by'=> $userId
			]);
			
		$diagnose = Diagnosis::where('created_by',$userId)->get();
		return response()->json([
			'status'=>1,
			'diagnose'=> $diagnose
		]);
		}else{
			return response()->json([
				'status'=>0,
				'diagnose'=> null
			]);
		}
	
	
	}
	
	public function attachimg(Request $request)
	{
		if($request->filter_name=="date"){
			$validator = Validator::make($request->all(), [
				'patient_id' => 'required',
				'from_date' => 'required',
				'to_date' => 'required',
			]);
		}
		else if($request->filter_name=="count"){
			$validator = Validator::make($request->all(), [
				'patient_id' => 'required',
				'count_app' => 'required',
			]);
		}else {
			$validator = Validator::make($request->all(), [
				'patient_id' => 'required',
				'filter_name' => 'required',
			]);
		}
	

	if ($validator->fails()) {

		alert()->error('Fill the fileds!');

		return redirect()->back();
	}

		// $appointments = ClinicPatient::findOrfail($request->patient_id)->appointments;
		
		$patient_id = $request->patient_id;
		
		if($request->filter_name== 'count'){

			$appointments = Appointment::where('clinic_patient_id',$patient_id)->latest()->take($request->count_app)->get();
			
		}
		else if($request->filter_name== 'date'){
			$fromdate= $request->from_date;
			$todate= $request->to_date;
			$appointments = Appointment::where('clinic_patient_id',$patient_id)->whereBetween('date',[$request->from_date,$request->to_date])->get();

		}
		else{
			$appointments = Appointment::where('clinic_patient_id',$patient_id)->get();
		}

		$allimgs= [];
		foreach($appointments as $appo){
			foreach($appo->attachments as $attach){
				$img= array_push($allimgs,$attach);
			}
		}
		
		if(count($allimgs)<=0){
			alert()->error(' Not Attachment Images !');
			return redirect()->back();
		}
		return view(('Clinic.attachimg'),compact('allimgs','patient_id'));
	}
	public function todayaptdelete(Request $request)
	{
		$appointment = Appointment::findOrfail($request->appointment_id);
		$appointment->delete();
		return response()->json('success');
	}
}
