<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
	protected $guarded = [];
	
     protected $fillable = [
		'name','number_of_room','building_id','department_id',
	];

	/*public function room(){
		return $this->hasMany('App\Room');
	}*/

	public function building() {
		return $this->belongsTo('App\Building');
	}
}
