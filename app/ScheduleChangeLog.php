<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScheduleChangeLog extends Model
{
	protected $guarded = [];
	
    protected $fillable = [
		 'request_date','request_time','initial_date','initial_time','status','type','doctor_id','request_doc_id','request_doc_name','change_doc_type'
	];

	public function doctor() {
		return $this->belongsTo('App\Doctor');
	}	
	public function request_doc() {
		return $this->belongsTo('App\Doctor','request_doc_id');
	}	
}
