<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleOrder extends Model
{
    //
    protected $fillable = [
    	'purchase_order_id','sale_order_list','project_id','phase_id','delivery_date','status'
    ];

    public function getSaleOrderListAttribute($value) {
        return json_decode($value);
    }

    public function purchase_order(){
    	return $this->belongsTo('App\PurchaseOrder');
    }
    public function project(){
    	return $this->belongsTo('App\Project');
    }
}
