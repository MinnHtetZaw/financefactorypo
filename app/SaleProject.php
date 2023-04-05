<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleProject extends Model
{
    //
    protected $fillable = [
    	
        'name',
        'year',
        'estimate_date',
        'description',
        'type',
        'rfq_file_path',
        'status',
        'location',
        'project_contact_person',
        'phone','email',
        'government_department_name','submission_date',
        'project_owner',

        'project_value','expected_budget',
        'roi_value',
        'team',
        'customer_id'

    ];
    public function customer(){
    	return $this->belongsTo('App\Customer');
    }
    public function project_customer(){
        
        return $this->belongsToMany('App\Customer')->withPivot('sale_project_id','customer_id');
    }
}
