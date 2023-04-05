<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialIssueList extends Model
{
    protected $fillable = [
    	'material_issue_id','item_id','stock_qty',
    ];
    public function product(){
    	return $this->belongsTo('App\Product');
    }
}
