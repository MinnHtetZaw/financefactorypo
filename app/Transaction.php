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
        'purchase_id',
        'related_transaction_id',
        'type_flag',
        'expense_flag',
        'all_flag',
        'currency_id',
        'expense_id',
        'incoming_flag',
        'incoming_id'
    ];
    public function accounting(){
		return $this->belongsTo('App\Accounting','account_id');
	}
    public function purchase(){
		return $this->belongsTo('App\Purchase','purchase_id');
	}
    public function expense(){
        return $this->belongsTo(Expense::class,'expense_id');
    }
    public function incoming()
    {
        return $this->belongsTo(Incoming::class,'incoming_id');
    }
    public function currency()
    {
        return $this->belongsTo(Currency::class,'currency_id');
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

