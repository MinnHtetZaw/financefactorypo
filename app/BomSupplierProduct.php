<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BomSupplierProduct extends Model
{
    //
    protected $fillable = [
    	'bom_supplier_id','product_id','requested_qty','requested_price','requested_specs','available_qty','quoted_price','available_specs','status'
    ];
    public function product(){
    	return $this->belongsTo('App\Product');
    }
    public function bom_supplier(){
        return $this->belongsTo('App\BomSupplier');
    }
    public function supplier(){
    	return $this->belongsTo('App\Supplier');
    }
   
}
