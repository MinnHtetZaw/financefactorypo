<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorInfo extends Model
{
	protected $guarded = [];

    protected $fillable = [
		'booking_range','maximum_token','reserved_token','advance_time','time_per_patient','status','doctor_id',
	];
}
