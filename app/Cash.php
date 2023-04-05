<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cash extends Model
{
    //
    protected $fillable = [
        'account_id','name','amount',
    ];
}
