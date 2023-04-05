<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = ['name','description','total_charges','cost'];

    public function services(){
        return $this->belongsToMany(Service::class);
    }
}
