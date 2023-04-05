<?php

namespace App\Http\Controllers\Web;

use App\Accounting;
use App\AccountingType;
use App\CostCenter;
use App\Currency;
use App\Http\Controllers\Controller;
use App\Invoice;
use App\PurchaseOrder;
use App\SaleProject;
use Illuminate\Http\Request;

class FinancialReportController extends Controller
{
    protected function profit_loss_acc_list(Request $request)
	{

        $cost_center = CostCenter::all();
		$account = Accounting::where('account_type',6)
                    ->where('general_project_flag',1)->get();
        $account1 = Accounting::where('account_type',7)
                    ->where('general_project_flag',1)->get();
        $account2 = Accounting::where('account_type',10)
                    ->where('general_project_flag',1)->get();
        $account3 = Accounting::where('account_type',14)
                    ->orWhere('account_type',15)
                    ->where('general_project_flag',0)->get();
        $account4 = Accounting::where('account_type',8)
                    ->where('general_project_flag',0)->get();
		$saleproject = SaleProject::all();
		$account_type = AccountingType::all();
        $currency  = Currency::all();
		return view('Admin.profit_loss_acc_list',compact('currency','account','account1','account2','account3','account4','saleproject','account_type','cost_center'));
	}

    protected function balancesheet_acc_list(Request $request)
	{
        $cost_center = CostCenter::all();
		$account = Accounting::where('account_type',1)->get();
        $acc1 = Accounting::where('account_type',3)->get();
        $account1 = 0;
        foreach($acc1 as $acc){
            $account1 += $acc->amount;
        }
        $acc2 = Accounting::where('account_type',4)->get();
        $account2 = 0;
        foreach($acc2 as $acco){
            $account2 += $acco->amount;
        }

        $acc3 = Invoice::where('paid_status',0)->get();
        $account3 = 0;
        foreach($acc3 as $accou){
            $account3 += $accou->total_amount;
        }
        $acc4 = PurchaseOrder::where('paid_status',0)->get();
        $account4 = 0;
        foreach($acc4 as $accoun){
            $account4 += $accoun->total_amount;
        }
		$saleproject = SaleProject::all();
		$account_type = AccountingType::all();
        $currency  = Currency::all();
		return view('Admin.balancesheet_acc_list',compact('currency','account','account1','account2','account3','account4','saleproject','account_type','cost_center'));
	}
    
    protected function trial_balance(Request $request)
	{
        $acc1 = Accounting::where('account_type',3)->get();
        $account1 = 0;
        foreach($acc1 as $acc){
            $account1 += $acc->amount;
        }
        $acc2 = Accounting::where('account_type',4)->get();
        $account2 = 0;
        foreach($acc2 as $acco){
            $account2 += $acco->amount;
        }
        $account = Accounting::where('account_type',6)
                    ->where('general_project_flag',1)->get();
        $account3 = Accounting::where('account_type',14)
        ->orWhere('account_type',15)
        ->where('general_project_flag',0)->get();
        $account4 = Accounting::where('account_type',10)
                    ->where('general_project_flag',1)->get();
		return view('Admin.trail_balance',compact('account','account1','account2','account3','account4'));
	}
}
