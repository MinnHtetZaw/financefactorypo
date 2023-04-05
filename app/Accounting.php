<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accounting extends Model
{
    //
    protected $guarded = [];

    protected $fillable = [
        'account_code',
        'account_type',
        'account_name',
        'project_id',
        'amount',
        'opening_balance',
        'general_project_flag',
        'expense_flag',
        'cost_center_id',
        'currency_id',
        'carry_for_work'
    ];
    public function project(){
    	return $this->belongsTo('App\SaleProject','project_id');
    }
    public function cost_center(){
    	return $this->belongsTo('App\CostCenter','cost_center_id');
    }
    public function curr(){
    	return $this->belongsTo('App\Currency','currency_id');
    }
    public function getAccountTypeAttribute($account_type) {
        switch ($account_type) {
            case '1':
                return "Fixed-Asset";
                break;
            case '2':
                return "Current-Asset";
                break;
            case '3':
                return "Cash";
                break;
            case '4':
                return "Bank";
                break;
            case '5':
                return "Cash-In-Hand";
                break;
            case '6':
                return "Revenue";
                break;
            case '7':
                return "Receiveable";
                break;
            case '8':
                return "Expense";
                break;
            case '9':
                return "Payable";
                break;
            case '10':
                return "COGS";
                break;
            case '11':
                return "Accumulated Depriciation";
                break;
            case '12':
                return "Expense Depriciation";
                break;

            case '14':
                return "Other Revenue";
                break;
            case '15':
                return "Other Receiable";
                break;
            default:
                return "has";
                break;
        }
    }
}
