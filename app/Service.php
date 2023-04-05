<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $guarded = [];
	
    protected $fillable = ['name','description','charges','cost','status'];

    public function doctors() {
		return $this->belongsToMany(Doctor::class);
	}
    public function packages(){
    return $this->belongsToMany(Service::class);
  }
  public function scopeOtherservice($query)
  {
    return $query->where('status',1);
  }
  public function scopeDoctorservice($query)
  {
    return $query->where('status',0);
  }
}
