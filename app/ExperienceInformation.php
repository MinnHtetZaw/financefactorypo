<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExperienceInformation extends Model
{
	protected $guarded = [];
	
    protected $fillable = [
		 'position','place','doctor_id',
	];   
}
