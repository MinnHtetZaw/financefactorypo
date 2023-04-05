<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientOnlineBookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if ($this->status == 0) {
            
            $status = "Un-Confirm Booking";
        }
        elseif ($this->status == 3) {
            
            $status = "Cancel Booking";
        }
        else{

            $status = "Confirmed Booking";
        }
        
        if ($this->meeting_status == 0) {
            
            $meeting_status = "Meeting Not Start";
        }
        elseif ($this->meeting_status == 1) {
            
            $meeting_status = "Zoom Meeting Starting";
        }
        else{

            $meeting_status = "Zoom Meeting Finished";
        }

        $doctor = $this->doctor;

        return [
            'id' => $this->id,
            'name' => $this->name,
            'age' => $this->age,
            'phone' => $this->phone,
            'booking_date' => $this->booking_date,
            'token_number' => $this->token_number,
            'est_time' => $this->est_time,
            'status' => $status,
            'doctor' => $doctor->name,
            'zoom_id' => $this->zoom_id,
            'zoom_psw' => $this->zoom_psw,
            'join_url' => $this->join_url,
            'meeting_status' => $meeting_status

        ];
    }
}
