<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'doctor_id','clinic_patient_id','date','time','from_clinic','token'
    ];
    public function clinic_patient() {
		return $this->belongsTo('App\ClinicPatient');
	}
    public function doctor() {
		return $this->belongsTo('App\Doctor');
	}
  public function appointmentinfo() {
		return $this->hasOne(Clinicappointmentinfo::class);
	}
  public function voucher() {
		return $this->hasOne(Voucher::class);
	}
	public function attachments() {
		return $this->hasMany(AppointmentAttachment::class);
	}
	public function diagnosis() {
		return $this->belongsToMany(Diagnosis::class);
	}

}
