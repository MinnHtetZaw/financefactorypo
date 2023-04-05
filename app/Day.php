<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model {

	protected $guarded = [];
	
	protected $fillable = ['name'];


	public function doctors() {
		return $this->belongsToMany('App\Doctor')->withPivot('id');
	}
}
