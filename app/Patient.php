<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model 
{
	protected $guarded = [];
	
	protected $fillable = [
		'name','patient_code','age' ,'phone', 'photo','status','user_id','address'
	];

	public function booking() {
		return $this->hasMany('App\Booking');
	}

	public function user() {
		return $this->belongsTo('App\User');
	}
}
