<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
	protected $guarded = [];
	
    protected $fillable = ['name'];

    public function floor(){
		return $this->hasOne('App\Floor');
	}

	
}
