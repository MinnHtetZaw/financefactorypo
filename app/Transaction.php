<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $fillable = [

        'account_id',
        'amount',
        'date',
        'remark',
        'type',
        'related_project_flag',
        'purchase_id',
        'related_transaction_id',
        'type_flag',
        'expense_flag',
        'all_flag',
        'currency_id',
        'voucher_id'
    ];
    public function accounting(){
		return $this->belongsTo('App\Accounting','account_id');
	}
    public function project(){
		return $this->belongsTo('App\Purchase','purchase_id');
	}
    public function getTypeAttribute($type) {
        switch ($type) {
            case '1':
                return "Debit";
                break;
            case '2':
                return "Credit";
                break;

            default:
                return "has";
                break;
        }
    }

}

