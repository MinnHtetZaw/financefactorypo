<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CountingUnit extends Model
{
    //
    use SoftDeletes;
	
    protected $guarded = [];

    protected $fillable = [
    	'unit_code',
    	'original_code',
		'unit_name',
		'reorder_quantity',
		'normal_sale_price',
		'purchase_price',
		'item_id',
		'stock_qty',
	];

	public function item() {
		return $this->belongsTo(Item::class);
	}

	public function order() {
		return $this->belongsToMany('App\Order')->withPivot('id','quantity');
	}
	
	public function itemBrand()
    {
        return $this->hasOneThrough(Brand::class, Item::class);
    }
	public function dose() {
		return $this->belongsTo(Dose::class);
	}
}
