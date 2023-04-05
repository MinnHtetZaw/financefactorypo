<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinicappointmentinfo extends Model
{
    protected $fillable = [
        'body_temperature','bloodpressure_lower','bloodpressure_higher','oxygen','weight_kg','weight_lb','pr','appointment_id','next_appointmentdate','gc','ht','lgs','abd','titles','descriptions','complaint','procedure'
    ];

    public function appointment() {
		return $this->belongsTo(Appointment::class);
	}
}
