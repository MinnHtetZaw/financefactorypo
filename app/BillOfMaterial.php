<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillOfMaterial extends Model
{
    //
    protected $fillable = [
    	'bom_no','num_product_type','product_id','num_product_qty','create_date','status','project_id'
    ];
    public function product(){
    	return $this->belongsToMany('App\Product');
    }
    public function saleproject(){
    	return $this->belongsTo('App\SaleProject','project_id');
    }
}
