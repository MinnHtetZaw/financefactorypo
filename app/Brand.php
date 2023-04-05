<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //
    protected $fillable = [
        
        
        'brand_code','category_id','sub_category','name','description','suppliers','country_of_origin',
         
    ];
    public function subcategories()
    {
		return $this->belongsToMany('App\SubCategory','brand_sub_category','brand_id','sub_category_id')->withPivot('id','brand_id','sub_category_id');

    }
    public function product(){
      return $this->belongsTo('App\Product');
    }
    public function category(){
      return $this->belongsTo('App\Category');
    }
}
