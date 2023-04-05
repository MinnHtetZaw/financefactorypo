<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Department;
use App\EducationInformation;

class DoctorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {   

        //return parent::toArray($request);

       /* $degree = ();*/

        $doctors_info = $this->doc_edu()->get('degree');

        $day_name = $this->day()->select('name','start_time','end_time')->get();

        $url = url("/") . '/image/DoctorProfile/' ;

        $deprtment = Department::where('id',$this->department_id)->select('id','name')->first();

        $doc_edu = EducationInformation::where('doctor_id', $this->id)->select('id','degree')->get();

        return [
            'id' => $this->id,     
            'doc_name' => $this->name, 
            'title' => $this->about_doc, 
            'position' => $this->position,       
            'photo' => $url . $this->photo,    
            'degree_list' => $doc_edu,    
            'department' => $deprtment,
            'day_name' => $day_name,
        ];
    }
}
