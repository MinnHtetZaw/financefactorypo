<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClinicPatient extends Model
{
    protected $fillable = [
        'name','father_name','age','age_month','phone','address','code'
    ];
    public function appointments() {
		return $this->hasMany('App\Appointment');
	}
    public function latestappointments($count) {
		return $this->hasMany('App\Appointment')->latest()->take($count);
	}
    public function dateappointments($fromdate,$todate) {
		return $this->hasMany('App\Appointment')->whereBetween('date',[$fromdate,$todate]);
	}
}
