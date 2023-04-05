<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable= [
        'booking_id','total','paid_amount','invoice_no','date','web_or_mobile'
    ];
}
