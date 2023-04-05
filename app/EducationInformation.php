<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EducationInformation extends Model
{
	protected $guarded = [];
	
	protected $fillable = [
		 'degree','university','subject','doctor_id',
	];
}	
