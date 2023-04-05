<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegionalWarehouse extends Model
{
    //
    protected $fillable = [
    	'warehouse_name',
    	'region',
    	'country',
    	'location_address',
    	'area',
    	'capacity',
    	'employee_id',
    	'sale_project_id',
		'photo',
		'address'
    ];

    public function employee() {
        return $this->belongsTo('App\Employee','employee_id');
    }
	public function projects(){
    	return $this->belongsToMany('App\SaleProject')->withPivot('id','regional_warehouse_id','sale_project_id');;
    }
}
