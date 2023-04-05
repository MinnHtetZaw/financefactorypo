<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoodReceiveNoteProduct extends Model
{
    //
    protected $fillable = [
        
        'grn_id','qty','product_id','status'
        
        ];
        public function product(){
            return $this->belongsTo('App\Product','product_id');
        }
}
