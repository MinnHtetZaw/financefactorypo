<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectPhase extends Model {
	protected $fillable = [
		'phase_name', 'description', 'start_date', 'end_date', 'user_id', 'project_id',
	];
	public function project(){
	    return $this->belongsTo('App\Project');
	}
}
