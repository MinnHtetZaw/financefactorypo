<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
	protected $guarded = [];
	
	use SoftDeletes;
	
	protected $softDelete = true;

    protected $fillable = [
		'name','age','phone','address','relation','booking_date','est_time','token_number','status','relation','submit_by','user_id','doctor_id','floor_id','schedule_change_log_id','description','diagnosis','remark_booking_date','patient_document','zoom_id','zoom_psw','start_url','join_url','booking_status'
	];

	public function doctor() {
		return $this->belongsTo('App\Doctor');
	}
	public function payments()
	{
		return	$this->hasMany('App\Payment');
	}

	public function user() {
		return $this->belongsTo('App\User');
	}

	public function scopeManualbookings(){
		return $this->where('booking_status',0);
	}
	
	public function scopeOnlinebookings(){
		return $this->where('booking_status',1);
	}
	public function scopeReservedbookings(){
		return $this->where('booking_status',2);
	}
}
