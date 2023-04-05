<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BomSupplierQuotation extends Model
{
    //
    protected $fillable = [
    	'bom_supplier_id','quotation_date','supplier_quotation_number','quotation_file_name','quotation_file_description','quotation_file_path'
    ];
    public function bomsupplier(){
    	return $this->belongsTo('App\BomSupplier');
    }
}
