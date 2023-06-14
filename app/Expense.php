<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    //
    protected $fillable = [
            'purchase_id','date','remark','amount'
    ];

    public function purchase()
{
    return $this->belongsTo(Purchase::class,'purchase_id');
}

}
