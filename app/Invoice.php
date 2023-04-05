<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //
    protected $guarded = [];

    protected $fillable = [
       'invoice_no',
       'invoice_date',
       'sale_project_id',
       'total_product_qty',
       'paid_status',
       'total_amount',
       'customer_id',
       'currency_id'

    ];
    public function saleproject(){
    	return $this->belongsTo('App\SaleProject','sale_project_id');
    }
    public function curr(){
    	return $this->belongsTo('App\Currency','currency_id');
    }
}
