<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    //
    protected $fillable = [

        'account_id','account_code','account_name','opeing_date','account_holder_name','balance','bank_name','bank_address','bank_contact',
        'currency_id'
    ];

    public function accounting(){
        return $this->belongsTo('App\Accounting','account_id');
    }

    public function currency(){
        return $this->belongsTo('App\Currency','currency_id');
    }
}
