<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyInfomation extends Model
{
    //
    protected $fillable = [
        'company_name',
        'company_address',
        'company_contact',
        'company_email',
        'company_md_name',
        'financial_start_date',
        'financial_end_date',
        'starting_capital',
        'netprofit_pre_year',
        'netprofit_current_year',
    ];
}

