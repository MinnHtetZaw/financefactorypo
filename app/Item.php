<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    protected $fillable = [
    'product_id',
    'serial_number',
    'model',
    'size',
    'color',
    'dimension',
    'hs_code',
    'other_specification',
    'reserved_flag',
    'in_transit_flag',
    'in_stock_flag',
    'delivered_flag',
    'active_flag',
    'description',
    'condition_type',
    'condition_remark',
    'unit_purchase_price',
    'unit_selling_price',
    'currency_type_id',
    'purchase_date',
    'supplier_id',
    'stock_status',
    'delivered_date',
    'damage_remark',
    'registered_date',
    'item_location',
    'stock_qty',
    'warehouse_type',
    'warehouse_id'
    ];
    public function supplier(){
    	return $this->belongsTo('App\Supplier','product_id');
    }
    public function product(){
    	return $this->belongsTo('App\Product','supplier_id');
    }
    public function itemproduct(){
    	return $this->belongsTo('App\Product','product_id');
    }
    public function regional()
    {
        return $this->belongsTo('App\RegionalWarehouse','warehouse_id');
    }
    public function main()
    {
        return $this->belongsTo('App\Product','warehouse_id');
    }
}
