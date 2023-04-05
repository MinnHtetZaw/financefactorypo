<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model {

	protected $guarded = [];
	
	protected $fillable = [
		'name','doctor_code','position','phone', 'photo','gender','address','about_doc','status','department_id', 'user_id','online_early_payment'
	];

	public function booking(){
		return $this->hasMany('App\Booking');
	}

	public function department() {
		return $this->belongsTo('App\Department');
	}

	public function doc_info(){
		return $this->hasOne('App\DoctorInfo');
	}

	public function doc_exp() {
		return $this->hasMany('App\ExperienceInformation');
	}

	public function doc_edu() {
		return $this->hasMany('App\EducationInformation');
	}

	public function day() {
		return $this->belongsToMany('App\Day')->withPivot('id','start_time','end_time');
	}

    public function services() {
		return $this->belongsToMany(Service::class);
	}
	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
