<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountingType extends Model
{
    //
    protected $guarded = [];

    protected $fillable = [
        'type_name'
    ];
}
