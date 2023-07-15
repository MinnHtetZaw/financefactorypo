<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class JournalEntry extends Model
{
    use HasFactory;

    protected $fillable = ['from_account_id','to_account_id','type','amount','remark','entry_date','related_entry_id'];

    public function fromAccount():BelongsTo
    {
        return $this->belongsTo(Accounting::class,'from_account_id');
    }

    public function toAccount():BelongsTo
    {
        return $this->belongsTo(Accounting::class,'to_account_id');
    }

    public function relatedEntry():HasOne
    {
        return $this->hasOne(JournalEntry::class,'related_entry_id');
    }

    public function getTypeAttribute($value)
    {
        switch ($value) {
            case '1':
                return "Debit";
                break;
            case '2':
                return "Credit";
                break;
        }
    }
}
