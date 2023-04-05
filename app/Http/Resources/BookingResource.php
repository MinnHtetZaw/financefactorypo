<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
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

        if ($this->status == 0) {
            
            $status = "Un-Confirm Booking";
        }
        elseif ($this->status == 3) {
            
            $status = "Cancel Booking";
        }
        else{

            $status = "Confirmed Booking";
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
        ];
    }
}
