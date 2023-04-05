<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceProductList extends Model
{
    //
    protected $guarded = [];

    protected $fillable = [
       'invoice_id',
       'product_id',
       'qty',
       'sub_total'

    ];
}
