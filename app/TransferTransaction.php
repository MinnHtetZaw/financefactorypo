<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransferTransaction extends Model
{
    use HasFactory;

    protected $fillable= ['transfer_id','transaction_type','account_id','current_amount'];

    // public function transfer():BelongsTo
    // {
    //     return $this->belongsTo(Transfer::class);
    // }

    public function account():BelongsTo
    {
        return $this->belongsTo(Accounting::class,'account_id');
    }

    public function getTransactionTypeAttribute($type)
    {
        switch ($type) {
            case '1':
                return "Debit";
                break;

            case '2':
                return "Credit";
                break;
        }
    }


}
