<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'title', 
        'description', 
        'photo_path',
        'slide_status',
        'expired_at',
        'short_description'

    ];
}
