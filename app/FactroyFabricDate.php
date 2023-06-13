<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactroyFabricDate extends Model
{
    use HasFactory;
    protected $fillable =['purchase_id','factory_item_id','arrive_quantity','remark','arrive_date'];
}
