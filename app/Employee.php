<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
	protected $guarded = [];

    protected $fillable = [
	
		'employee_code', 'name', 'phone', 'address', 'photo', 'employed_date', 'user_id', 'salary',
	];
	public function user()
	{
		return $this->belongsTo(User::class);
	}

}
