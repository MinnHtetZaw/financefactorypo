<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
	protected $guarded = [];
	
    protected $fillable = [
		'name','department_code','description','status','photo_path'
	];
}
