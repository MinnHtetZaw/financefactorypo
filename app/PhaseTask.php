<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhaseTask extends Model {
	protected $fillable = [
		'task_name', 'description', 'start_date', 'end_date', 'phase_id','status','complete'
	];
}
