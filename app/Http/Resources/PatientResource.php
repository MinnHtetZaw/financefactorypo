<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        /*return parent::toArray($request);*/

        $url = url("/") . '/image/PatientProfile/' ;

        $patient = $this->user;

        $status = $this->status;

        if ($status == 0) {

            return [
                'name' => $this->name,
                'patient_code' => $this->patient_code,
                'email' => $patient->email,
                'photo' => $url . $this->photo . ".jpg",
                'age' => $this->age,
                'phone' =>$this->phone,
                'status' => "Un-Confirm Account!",
            ];
            
        }else{

            return [
                'name' => $this->name,
                'patient_code' => $this->patient_code,
                'email' => $patient->email,
                'photo' => $url . $this->photo . ".jpg",
                'age' => $this->age,
                'phone' =>$this->phone,
                'status' => "Confirmed Account!",
            ];

        }        
    }
}
