<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //
    protected $fillable=[
        'type_code','name','brand_id','sub_category_id'
    ];
    public function brands(){
        return $this->hasMany(Brand::class,'id','brand_id');
    }

    public function subcategories(){
        return $this->hasMany(SubCategory::class,'id','sub_category_id');
    }
}
