<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BomProductLists extends Model
{
    //
    protected $fillable = [
    	'bom_id','product_id','required_qty','required_price','required_spec','selected_supplier_id','selected_supplier_price','proposed_price','profit_margin','file_title','file_description','file_path'
    ];
    public function product(){
    	return $this->belongsTo('App\Product',"product_id");
    }
    public function bom(){
    	return $this->belongsToMany('App\BillOfMaterial');
    }
    public function supplier()
    {
        return $this->belongsTo('App\Supplier',"selected_supplier_id");
    }
    public function brand(){
    	return $this->belongsTo('App\Brand');
    }
}
