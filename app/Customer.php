<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $fillable = [
        'company_name',
        'business_type',
        'address',
        'email',
        'website',
        'contact_person_name',
        'contact_number',
        'ongoing_project',
    ];
}
