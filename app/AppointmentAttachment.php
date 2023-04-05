<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppointmentAttachment extends Model
{
    protected $fillable = ['attachment','description','appointment_id'];

    public function appointment() {
		return $this->belongsTo(Appointment::class);
	}
}
