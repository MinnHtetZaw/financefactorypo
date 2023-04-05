<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class YearProject extends Model
{
    //
    protected $fillable = [
		'year', 'project_id',
	];
    public function project(){
    	return $this->belongsTo('App\SaleProject','project_id');
    }
}
