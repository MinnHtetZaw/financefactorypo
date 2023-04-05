<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BomSupplierPoProduct extends Model
{
    //
    protected $fillable = [
    	'bom_po_id','order_qty','order_price','required_specification','product_id'
    ];
    public function product(){
    	return $this->belongsTo('App\Product',"product_id");
    }
}
