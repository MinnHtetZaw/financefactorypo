<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transfer extends Model
{
    use HasFactory;

    protected $fillable=['from_account_id','to_account_id','amount','transfer_date','remark'];

    public function fromAccount():BelongsTo
    {
        return $this->belongsTo(Accounting::class,'from_account_id');
    }

    public function toAccount():BelongsTo
    {
        return $this->belongsTo(Accounting::class,'to_account_id');
    }

    public function transactions():HasMany
    {
        return $this->hasMany(TransferTransaction::class);
    }
}
