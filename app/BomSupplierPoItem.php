<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BomSupplierPoItem extends Model
{
    //
    protected $fillable = [
    	'order_qty','order_price','required_specification','item_id'
    ];
    public function bomsupplier(){
    	return $this->belongsTo('App\BomSupplier');
    }
}
