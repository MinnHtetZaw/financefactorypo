<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transfer extends Model
{
    use HasFactory;

    protected $fillable=['from_account_id','to_account_id','amount','transfer_date','remark'];

    public function accounts():BelongsTo
    {
        return $this->belongsTo(Accounting::class,'from_account_id','to_account_id');
    }
    
}
