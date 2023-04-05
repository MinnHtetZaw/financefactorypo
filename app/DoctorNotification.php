<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorNotification extends Model
{
	protected $guarded = [];
	
     protected $fillable = [
		'title','description','status','doctor_id',
	];
}
