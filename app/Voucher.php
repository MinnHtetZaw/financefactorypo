<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Voucher extends Model
{

	use SoftDeletes;

    protected $guarded = [];

    protected $fillable = [

    	'voucher_code',
    	'total_price',
    	'total_quantity',
    	'sale_by',
    	'type',
    	'voucher_date',
    	'status',
        'delivery_status',
        'name',
        'phone',
        'address',
        'date',
        'state_id',
        'town_id',
        'delivery_charges',
        'appointment_id',
        'clinicvoucher_status',
        'medicine_charges',
        'service_charges',
        'doctor_charges',
    	'deleted_at'
    ];

    public function counting_unit() {
        return $this->belongsToMany(CountingUnit::class)->withPivot('quantity','price','dose','doseper_qty','duration','look_procedure');
    }
    public function packages() {
        return $this->belongsToMany(Package::class)->withPivot('quantity');
    }
    public function services() {
        return $this->belongsToMany(Service::class)->withPivot('quantity','doctor_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User','sale_by');
    }
    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
    //scope

}

