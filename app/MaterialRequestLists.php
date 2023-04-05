<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialRequestLists extends Model
{
    //
    protected $fillable = [
    	'material_request_id','product_id','request_qty',
    ];

    public function product(){
    	return $this->belongsTo('App\Product');
    }
}
