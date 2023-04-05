<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BomSupplierPurchaseOrder extends Model
{
    //
    protected $fillable = [
    	'bom_supplier_id','po_date','supplier_po_no','po_email_title','po_email_description','po_email_filepath','po_total_qty','po_total_price','po_total_typeqty','status'
    ];
    public function bomsupplier(){
    	return $this->belongsTo('App\BomSupplier','bom_supplier_id');
    }
}
