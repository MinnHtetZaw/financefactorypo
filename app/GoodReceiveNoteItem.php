<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoodReceiveNoteItem extends Model
{
    //
    protected $fillable = [
        
        'grn_id','qty','item_id','status','grn_product_id'
        
        ];
        public function item(){
            return $this->belongsTo('App\Item','item_id');
        }
}
