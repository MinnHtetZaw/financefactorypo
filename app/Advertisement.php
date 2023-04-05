<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'title', 
        'description', 
        'photo_path',
        'expired_at',
        'start_date',
        'package_id',
        'short_description'
    ];
    public function package(){
        return $this->belongsTo(Package::class);
    }
}
