<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeadingType extends Model
{
    use HasFactory;

    protected $fillable = ['code','type_name','accounting_type_id'];

    public function accountingtype()
    {
        return $this->belongsTo(AccountingType::class,'accounting_type_id');
    }

}
