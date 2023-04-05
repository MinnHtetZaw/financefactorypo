<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialRequest extends Model
{
    //
    protected $fillable = [
		'request_code',
        'prefix_syntax',
        'index_digit',
        'item_list',
        'user_id',
        'request_date',
        'warehouse_status',
        'site_status',
        'eta_date',
        'dispatch_date',
        'receive_date',
        'status',
        'remark',
	];
    public function getItemListAttribute($value) {
		return json_decode($value);
	}	
}
