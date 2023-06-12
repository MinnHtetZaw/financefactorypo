<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubHeading extends Model
{
    use HasFactory;

   

    protected $fillable = [
        'name',
        'heading_id'
    ];

    public function heading(){
        return $this->belongsTo(HeadingType::class);
    }
}
