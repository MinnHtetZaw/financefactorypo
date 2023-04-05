<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    //
    protected $fillable = [
        'purchase_order_no' ,
        'purchase_order_date' ,
        'sale_project_id' ,
        'total_product_qty' ,
        'total_amount' ,
        'paid_status' ,
        'description',
        'supplier_id',
        'currency_id',
    ];

    public function curr(){
    	return $this->belongsTo('App\Currency','currency_id');
    }

}
