<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BomSupplier extends Model
{
    //
    protected $fillable = [
    	'request_no','email_sent_status','bom_id','supplier_id','request_quotation_date','quotation_reply_date','status','po_sent_date','invoice_received_date',
        'import_start_date',
        'rfq_email_title',
        'rfq_email_description',
        'rfq_email_filepath',
        'rfq_total_qty',
        'rfq_total_price',
        'rfq_type_qty',
    ];
    public function supplier(){
    	return $this->belongsTo('App\Supplier');
    }
    public function bomat(){
    	return $this->belongsTo('App\BillOfMaterial');
    }
}
