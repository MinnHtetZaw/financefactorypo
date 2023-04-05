<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FixedAsset extends Model
{
    //
    protected $fillable = [
        'name',
        'type',
        'description',
        'initial_purchase_price',
        'salvage_value',
        'use_life',
        'yearly_depriciation',
        'existing_flag',
        'used_years',
        'depriciation_total',
        'current_value',
        'start_date',
        'sell_or_end_flag',
        'sell_price',
        'profit_loss_value',
        'sell_date',
        'end_remark',
        'end_date',
        'profit_loss_status',
        'future_date',

        'monthly_depriciation',
        'daily_depriciation',
        'future_month',

        'future_day',
        'account_code',
        'account_name',
        'fixed_asset_id'
,    ];
}
