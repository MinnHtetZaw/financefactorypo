<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BomSupplierInvoice extends Model
{
    //
    protected $fillable = [
    	'bom_supplier_id','invoice_date','supplier_invoice_number','invoice_file_name','invoice_file_description','invoice_file_path'
    ];
    public function bomsupplier(){
    	return $this->belongsTo('App\BomSupplier');
    }
}
