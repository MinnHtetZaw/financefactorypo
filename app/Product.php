<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
		'department_id',
        'photo',
        'serial_number',
        'purchase_date',
        'category_id',
        'subcategory_id',
        'brand_id',
        'shelve_id',
        'primary_supplier_id',
        'model_number',
         'measuring_unit', 
         'name',
          'stock_qty',
          'minnimum_order_qty',
           'reorder_qty',
            'purchase_price',
            'retail_price',
            'wholesale_price',
            'discount_flag',
            'discount_type' ,
            'location',
            'description',
            'reg_date',
            'selling_price',

            'product_code',

            'instock_preorder',
            'part_no',
           'accounting_id',
            'total_qty',
            'moq_qty',
            'moq_price',
            'unit_purchase_price',
            'currency_type_id',


	];
  public function brand(){
		return $this->belongsTo('App\Brand','brand_id');
	}
  public function category(){
		return $this->belongsTo('App\Category');
	}
  public function supplier(){
		return $this->belongsTo('App\Supplier','primary_supplier_id');
	}
  public function subcategory(){
		return $this->belongsTo('App\SubCategory');
	}
  public function department(){
		return $this->belongsTo('App\Department');
	}

}
