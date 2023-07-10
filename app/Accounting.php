<?php

namespace App;

use App\SubHeading;
use Illuminate\Database\Eloquent\Model;

class Accounting extends Model
{
    //

    protected $fillable = [
        'account_code',
        'account_name',
        'subheading_id',
        'balance',
        'nature',
        'currency_id',

    ];

    public function subheading(){
    	return $this->belongsTo(SubHeading::class,'subheading_id');
    }

    public function currency(){
    	return $this->belongsTo('App\Currency','currency_id');
    }

}
