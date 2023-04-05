<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialIssue extends Model
{
    protected $fillable = [
    	'material_issue_no','prefix_syntax','index_digit','purchase_order_id','total_qty','material_request_id','project_id','phase_id','approve','approve_delivery_order','status','warehouse_transfer_status','delivery_order_status'
    ];

    public function getItemListAttribute($value){
    	return json_decode($value);
    }
    public function product(){
    	return $this->belongsTo('App\Product');
    }
    public function purchase_order(){
    	return $this->belongsTo('App\PurchaseOrder');
    }
    public function project(){
    	return $this->belongsTo('App\Project');
    }
    public function phase(){
    	return $this->belongsTo('App\ProjectPhase');
    }
    public function material_request(){
    	return $this->belongsTo('App\MaterialRequest');
    }
    public function wto_mi(){
    	return $this->belongsTo('App\Wto_MaterialIssue');
    }
}
