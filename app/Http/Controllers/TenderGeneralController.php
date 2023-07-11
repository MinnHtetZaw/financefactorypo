<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Cash;
use App\Item;
use App\User;
use App\Brand;
use App\Expense;
use App\Invoice;
use App\Product;
use App\Category;
use App\Currency;
use App\Customer;
use App\Employee;
use App\Incoming;
use App\Supplier;
use App\Accounting;
use App\CostCenter;
use App\FixedAsset;
use App\BomSupplier;
use App\SaleProject;
use App\SubCategory;
use App\Transaction;
use App\YearProject;
use App\incoterm_type;
use App\PurchaseOrder;
use App\BillOfMaterial;
use App\BomProductLists;
use App\BomSupplierPoItem;
use App\CompanyInfomation;
use App\RegionalWarehouse;
use App\BomSupplierPoProduct;
use App\BomSupplierInvoice;
use App\GoodReceiveNoteProduct;
use App\GoodReceiveNoteItem;
use App\BomSupplierProduct;
use App\InvoiceProductList;
use App\SupplierSocialType;
use App\MaterialRequest;
use App\MaterialRequestLists;
use App\SaleOrder;
use App\SaleOrderLists;
use Illuminate\Http\Request;
use App\BomSupplierQuotation;
use Illuminate\Support\Carbon;
use Illuminate\Testing\Assert;
use App\BomSupplierPurchaseOrder;
use App\GoodReceiveNote;
use App\SupplierProductComparison;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Validator;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class TenderGeneralController extends Controller
{
    //

    protected function category_list()
    {
        $category = Category::all();
        return view('Admin.category_list',compact('category'));
    }
    protected function store_category(Request $request)
    {
        // dd($request->all());
        Category::create([
            'category_code' => $request->code,
            'category_name' => $request->name
        ]);
        alert()->success('Added Category Successfully!!!');
        return redirect()->back();
    }
    protected function sub_category_list()
    {
        $category = Category::all();
        $subcategory = SubCategory::all();

        return view('Admin.sub_category_list',compact('category','subcategory'));
    }
    protected function store_subcategory(Request $request)
    {
        // dd($request->all());
        SubCategory::create([
            'subcategory_code' => $request->code,
            'name' => $request->name,
            'category_id' => $request->related
        ]);
        alert()->success('Added Sub Category Successfully!!!');
        return redirect()->back();
    }
    protected function store_company(Request $request)
    {
        // dd($request->all());
        CompanyInfomation::create([
        'company_name' => $request->company_name,
        'company_address' => $request->company_address,
        'company_contact' => $request->company_contact,
        'company_email' => $request->company_email,
        'company_md_name' => $request->md_name,
        'financial_start_date' => $request->start_date,
        'financial_end_date' => $request->end_date,
        'starting_capital' => $request->capital,
        'netprofit_pre_year' => $request->pre_year,
        'netprofit_current_year' => $request->curr_year,
        ]);
        alert()->success('Added Company Infomation Successfully!!!');
        return redirect()->back();
    }
    protected function update_company(Request $request){
        // dd('hello');
        $update =CompanyInfomation::first();
        $update->company_name = $request->company_name;
        $update->company_address = $request->company_address;
        $update->company_contact = $request->company_contact;
        $update->company_email = $request->company_email;
        $update->company_md_name = $request->md_name;
        $update->financial_start_date = $request->start_date;
        $update->financial_end_date = $request->end_date;
        $update->starting_capital = $request->capital;
        $update->netprofit_pre_year = $request->pre_year;
        $update->netprofit_current_year = $request->curr_year;
        $update->save();
        alert()->success('Updated Company Information Successfully!!!');
        return redirect()->back();
    }
    protected function bank_list()
    {
        $account = Accounting::all();
        $banks = Bank::all();
        $currency = Currency::all();
        $trans = Transaction::where('type_flag',2)->get();
        // dd($trans);
        return view('Admin.bank_list',compact('account','banks','trans','currency'));
    }
    protected function company_information()
    {
        // dd($trans);
        $com = CompanyInfomation::first();
        // dd($com->financial_end_date);
        $now_date = Carbon::now();
        $now = $now_date->toDateString();
        $acc = Accounting::all();
        if($com != null){
        if($com->financial_end_date < $now){
            // dd('hello');
            // dd($acc);
            foreach($acc as $account){
                $account1 = Accounting::find($account->id);
                if($account1->carry_for_work == 0){
                $account1->opening_balance = 0;
                $account1->amount = 0;
                $account1->save();
                }
                else if($account1->carry_for_work == 1){
                    $account1->opening_balance = $account1->amount;
                    $account1->save();
                    }
            }
        }

         }

        return view('Admin.company_information',compact('com'));
    }
    protected function fixed_asset()
    {
        // dd('hello');
       $done = FixedAsset::all();
       $now_date = Carbon::now();
       $now = $now_date->toDateString();
       $find_date = FixedAsset::where('future_month',$now)->get();
    //    dd($find_date);
       $count = count($find_date);
        // dd($count);

        foreach($find_date as $m_dep){
            if($count != 0){
                // dd($m_dep->id);
            $m_dep->future_month = date('Y-m-d', strtotime('+1 month', strtotime($m_dep->future_month)));
            $m_dep->current_value -= $m_dep->monthly_depriciation;
            // $m_dep->fix_tran_flag = 1;

            $m_dep->save();
            $acc = Accounting::where('account_code',$m_dep->account_code)
                    ->where('account_type',1)
                    ->first();
            $acc1 = Accounting::where('account_code',$m_dep->account_code)
            ->where('account_type',11)
            ->first();
            // dd($acc1);
            // foreach($acc as $fix_acc){
            $ttt = Transaction::create([
            'account_id' =>$acc->id,
            'type'       =>2,
            'amount'     => $m_dep->monthly_depriciation,
            'date'       => $now,
            'remark'     =>'Monthly Depriciation',
            'related_project_flag' =>2,
            'type_flag'   =>2,
            'fixed_asset_id' =>$m_dep->id,
            ]);

            // dd($ttt->fixed_asset_id);
        // }
        // foreach($acc1 as $accumulate_acc){

            Transaction::create([
                'account_id' => $acc1->id,
                'type'       =>1,
                'amount'     => $m_dep->monthly_depriciation,
                'date'       => $now,
                'remark'     =>'Monthly Depriciation',
                'related_project_flag' =>2,
                'type_flag'   =>2,
                'fixed_asset_id' =>$m_dep->id,
                ]);
        // }
        $exp_dep_acc = Accounting::where('account_type',12)->first();
        // dd($exp_dep_acc);
        $exp_dep_acc->amount += $m_dep->monthly_depriciation;
        $exp_dep_acc->save();
        Transaction::create([
            'account_id' => $exp_dep_acc->id,
            'type'       =>1,
            'amount'     => $m_dep->monthly_depriciation,
            'date'       => $now,
            'remark'     =>'Monthly Depriciation',
            'related_project_flag' =>2,
            'type_flag'   =>2,
            'fixed_asset_id' =>$m_dep->id,
            ]);

            $acc->amount -= $m_dep->monthly_depriciation;
            // dd($acc->amount);
            $acc->save();
            $acc1->amount += $m_dep->monthly_depriciation;
            // dd($acc1->amount);
             $acc1->save();

        }
    }
            $trans = Transaction::where('type_flag',2)->get();
            $accs = Accounting::all();
            // dd($trans);
        return view('Admin.fixed_asset',compact('done','trans','accs'));
    }
    protected function store_tran(Request $request){
        // dd($request->amount);
        Transaction::Create([
            'account_id' => $request->from_acc,
            'type'       =>2,
            'amount'     => $request->amount,
            'date'       => $request->date,
            'remark'     =>$request->remark,
            'related_project_flag' =>2,
            'type_flag'   =>2,
        ]);
        $acc = Accounting::find($request->from_acc);
        $acc->amount -= $request->amount;
        $acc->save();
        $bank = Bank::where('account_id',$request->from_acc)->first();
        $bank->balance -= $request->amount;

        $bank->save();
        Transaction::Create([
            'account_id' => $request->transfer_acc,
            'type'       =>1,
            'amount'     => $request->amount,
            'date'       => $request->date,
            'remark'     =>$request->remark,
            'related_project_flag' =>2,
            'type_flag'   =>2,
        ]);
        $acc1 = Accounting::find($request->transfer_acc);
        // dd($acc1->amount);
        $acc1->amount += $request->amount;
        // dd($acc1->amount);
        $acc1->save();
        $bank1 = Bank::where('account_id',$request->transfer_acc)->first();
        $bank1->balance += $request->amount;
        $bank1->save();
        alert()->success('Added Transaction Successfully!!!');
        return redirect()->back();
    }

    protected function store_incoming(Request $request){


        $incoming = Incoming::create([  
            'amount' => $request->amount,
            'remark' => $request->remark,
            'date' => $request->date,
        ]);

        $tran1 = Transaction::create([
            'account_id' =>$request->incoming_acc,
            'type' => 2, // credit
            'amount' => $request->amount,
            'remark' => $request->remark,
            'date' => $request->date,
            'type_flag' =>4, // income credit type
            'currency_id' => $request->currency,
            'all_flag' =>3,
            'incoming_flag'=>1,
            'incoming_id'=>$incoming->id
        ]);
        if($request->bank_acc == null){
            $amt = Accounting::find( $request->cash_acc);

            $usd_rate = Currency::find(5);
            $euro_rate = Currency::find(6);
            $sgp_rate = Currency::find(9);
            $jpn_rate = Currency::find(10);
            $chn_rate = Currency::find(11);
            $idn_rate = Currency::find(12);
            $mls_rate = Currency::find(13);
            $thai_rate = Currency::find(14);
            if($amt->currency_id == 4 && $request->currency == 5){
                $con_amt = $request->amount * $usd_rate->exchange_rate;
            }
            else if($amt->currency_id == 4 && $request->currency == 6){
                $con_amt = $request->amount * $euro_rate->exchange_rate;
            }
            else if($amt->currency_id == 4 && $request->currency == 9){
                $con_amt = $request->amount * $sgp_rate->exchange_rate;
            }
            else if($amt->currency_id == 4 && $request->currency == 10){
                $con_amt = $request->amount * $jpn_rate->exchange_rate;
            }
            else if($amt->currency_id == 4 && $request->currency == 11){
                $con_amt = $request->amount * $chn_rate->exchange_rate;
            }
            else if($amt->currency_id == 4 && $request->currency == 12){
                $con_amt = $request->amount * $idn_rate->exchange_rate;
            }
            else if($amt->currency_id == 4 && $request->currency == 13){
                $con_amt = $request->amount * $mls_rate->exchange_rate;
            }
            else if($amt->currency_id == 4 && $request->currency == 14){
                $con_amt = $request->amount * $thai_rate->exchange_rate;
            }
            else if($amt->currency_id == 5 && $request->currency == 4){
                $con_amt = $request->amount / $usd_rate->exchange_rate;
            }
            else if($amt->currency_id == 6 && $request->currency == 4){
                $con_amt = $request->amount / $euro_rate->exchange_rate;
            }
            else if($amt->currency_id == 9 && $request->currency == 4){
                $con_amt = $request->amount / $sgp_rate->exchange_rate;
            }
            else if($amt->currency_id == 10 && $request->currency == 4){
                $con_amt = $request->amount / $jpn_rate->exchange_rate;
            }
            else if($amt->currency_id == 11 && $request->currency == 4){
                $con_amt = $request->amount / $chn_rate->exchange_rate;
            }
            else if($amt->currency_id == 12 && $request->currency == 4){
                $con_amt = $request->amount / $idn_rate->exchange_rate;
            }
            else if($amt->currency_id == 13 && $request->currency == 4){
                $con_amt = $request->amount / $mls_rate->exchange_rate;
            }
            else if($amt->currency_id == 14 && $request->currency == 4){
                $con_amt = $request->amount / $thai_rate->exchange_rate;
            }
            else{
                $con_amt = $request->amount;
            }
            $bc_acc = $request->cash_acc;

            $acc_cash = Accounting::find($bc_acc);
            $acc_cash->balance += $con_amt;
            $acc_cash->save();

            $incoming_cash = Accounting::find($request->incoming_acc);
            $incoming_cash->balance -= $request->amount;
            $incoming_cash->save();
        }
        else if($request->cash_acc == null){
            $amt = Accounting::find($request->bank_acc);
            $usd_rate = Currency::find(5);
            $euro_rate = Currency::find(6);
            $sgp_rate = Currency::find(9);
            $jpn_rate = Currency::find(10);
            $chn_rate = Currency::find(11);
            $idn_rate = Currency::find(12);
            $mls_rate = Currency::find(13);
            $thai_rate = Currency::find(14);

            if($amt->currency_id == 4 && $request->currency == 5){
                $con_amt = $request->amount * $usd_rate->exchange_rate;
            }
            else if($amt->currency_id == 4 && $request->currency == 6){
                $con_amt = $request->amount * $euro_rate->exchange_rate;
            }
            else if($amt->currency_id == 4 && $request->currency == 9){
                $con_amt = $request->amount * $sgp_rate->exchange_rate;
            }
            else if($amt->currency_id == 4 && $request->currency == 10){
                $con_amt = $request->amount * $jpn_rate->exchange_rate;
            }
            else if($amt->currency_id == 4 && $request->currency == 11){
                $con_amt = $request->amount * $chn_rate->exchange_rate;
            }
            else if($amt->currency_id == 4 && $request->currency == 12){
                $con_amt = $request->amount * $idn_rate->exchange_rate;
            }
            else if($amt->currency_id == 4 && $request->currency == 13){
                $con_amt = $request->amount * $mls_rate->exchange_rate;
            }
            else if($amt->currency_id == 4 && $request->currency == 14){
                $con_amt = $request->amount * $thai_rate->exchange_rate;
            }
            else if($amt->currency_id == 5 && $request->currency == 4){
                $con_amt = $request->amount / $usd_rate->exchange_rate;
            }
            else if($amt->currency_id == 6 && $request->currency == 4){
                $con_amt = $request->amount / $euro_rate->exchange_rate;
            }
            else if($amt->currency_id == 9 && $request->currency == 4){
                $con_amt = $request->amount / $sgp_rate->exchange_rate;
            }
            else if($amt->currency_id == 10 && $request->currency == 4){
                $con_amt = $request->amount / $jpn_rate->exchange_rate;
            }
            else if($amt->currency_id == 11 && $request->currency == 4){
                $con_amt = $request->amount / $chn_rate->exchange_rate;
            }
            else if($amt->currency_id == 12 && $request->currency == 4){
                $con_amt = $request->amount / $idn_rate->exchange_rate;
            }
            else if($amt->currency_id == 13 && $request->currency == 4){
                $con_amt = $request->amount / $mls_rate->exchange_rate;
            }
            else if($amt->currency_id == 14 && $request->currency == 4){
                $con_amt = $request->amount / $thai_rate->exchange_rate;
            }
            else{
                $con_amt = $request->amount;
            }

            $bc_acc = $request->bank_acc;

            $bank = Bank::where('account_id',$bc_acc)->first();
            $bank->balance +=  $con_amt;
            $bank->save();

            $acc_bank = Accounting::find($bc_acc);
            $acc_bank->balance += $con_amt;
            $acc_bank->save();

            $incoming_bank = Accounting::find($request->incoming_acc);
            $incoming_bank->balance -= $request->amount;
            $incoming_bank->save();
        }
        $tran = Transaction::create([
            'account_id' => $bc_acc,
            'type' => 1,
            'amount' => $con_amt,
            'remark' => $request->remark,
            'date' => $request->date,
            'type_flag' =>3,
            'incoming_flag' => 2,
            'currency_id' => $request->currency,
            'all_flag' =>3,
            'incoming_id'=>$incoming->id
        ]);

        $tran1->related_transaction_id = $tran->id;
        $tran1->save();


        alert('Added Transaction Successfully!!');
      return redirect()->back();
    }


    protected function ajax_code_search(Request $request){
        $code = $request->code;
        $acc = Accounting::where('account_code', $code)->first();
        $code = Transaction::where('all_flag',4)
                        ->where('type_flag',1)
                        ->where('account_id',$acc->id)
                        ->with('accounting')
                        ->get();
        $code_relate = Transaction::where('all_flag',4)
                        ->with('accounting')
                        ->where('type_flag',2)->get();

        return response()->json([
            'code' => $code,
            'code_relate' => $code_relate,
        ]);
    }

    protected function ajax_search_code(Request $request){
        $code = $request->code;
        $acc = Accounting::where('account_code', $code)->first();
        $code = Transaction::where('all_flag',3)
                        ->where('type_flag',3)
                        ->where('account_id',$acc->id)
                        ->with('accounting')
                        ->get();
        $code_relate = Transaction::where('all_flag',3)
                        ->with('accounting')
                        ->where('type_flag',4)->get();

        return response()->json([
            'code' => $code,
            'code_relate' => $code_relate,
        ]);
    }

    protected function store_expense(Request $request)
    {

       $exp = Expense::create([

            'amount' => $request->amount,
            'remark' => $request->remark,
            'date' => $request->date,
        ]);

        $tran1 = Transaction::create([
            'account_id' =>$request->exp_acc ,
            'type' => 1,
            'amount' => $request->amount,
            'remark' => $request->remark,
            'date' => $request->date,
            'type_flag' =>1,
            'expense_flag' => 1,
            'currency_id' => $request->currency,
            'all_flag'  =>4,
            'expense_id'=> $exp->id
         ]);
        if($request->bank_acc == null){
            $amt = Accounting::find( $request->cash_acc);

            $usd_rate = Currency::find(5);
            $euro_rate = Currency::find(6);
            $sgp_rate = Currency::find(9);
            $jpn_rate = Currency::find(10);
            $chn_rate = Currency::find(11);
            $idn_rate = Currency::find(12);
            $mls_rate = Currency::find(13);
            $thai_rate = Currency::find(14);
            if($amt->currency_id == 4 && $request->currency == 5){
                $con_amt = $request->amount * $usd_rate->exchange_rate;
            }
            else if($amt->currency_id == 4 && $request->currency == 6){
                $con_amt = $request->amount * $euro_rate->exchange_rate;
            }
            else if($amt->currency_id == 4 && $request->currency == 9){
                $con_amt = $request->amount * $sgp_rate->exchange_rate;
            }
            else if($amt->currency_id == 4 && $request->currency == 10){
                $con_amt = $request->amount * $jpn_rate->exchange_rate;
            }
            else if($amt->currency_id == 4 && $request->currency == 11){
                $con_amt = $request->amount * $chn_rate->exchange_rate;
            }
            else if($amt->currency_id == 4 && $request->currency == 12){
                $con_amt = $request->amount * $idn_rate->exchange_rate;
            }
            else if($amt->currency_id == 4 && $request->currency == 13){
                $con_amt = $request->amount * $mls_rate->exchange_rate;
            }
            else if($amt->currency_id == 4 && $request->currency == 14){
                $con_amt = $request->amount * $thai_rate->exchange_rate;
            }
            else if($amt->currency_id == 5 && $request->currency == 4){
                $con_amt = $request->amount / $usd_rate->exchange_rate;
            }
            else if($amt->currency_id == 6 && $request->currency == 4){
                $con_amt = $request->amount / $euro_rate->exchange_rate;
            }
            else if($amt->currency_id == 9 && $request->currency == 4){
                $con_amt = $request->amount / $sgp_rate->exchange_rate;
            }
            else if($amt->currency_id == 10 && $request->currency == 4){
                $con_amt = $request->amount / $jpn_rate->exchange_rate;
            }
            else if($amt->currency_id == 11 && $request->currency == 4){
                $con_amt = $request->amount / $chn_rate->exchange_rate;
            }
            else if($amt->currency_id == 12 && $request->currency == 4){
                $con_amt = $request->amount / $idn_rate->exchange_rate;
            }
            else if($amt->currency_id == 13 && $request->currency == 4){
                $con_amt = $request->amount / $mls_rate->exchange_rate;
            }
            else if($amt->currency_id == 14 && $request->currency == 4){
                $con_amt = $request->amount / $thai_rate->exchange_rate;
            }
            else{
                $con_amt = $request->amount;
            }

            $bc_acc = $request->cash_acc;

            $acc_cash = Accounting::find($bc_acc);
            $acc_cash->balance -= $con_amt;
            $acc_cash->save();

            $exp_cash = Accounting::find($request->exp_acc);
            $exp_cash->balance += $request->amount;
            $exp_cash->save();
        }
        else if($request->cash_acc == null){
            $amt = Accounting::find($request->bank_acc);

            $usd_rate = Currency::find(5);
            $euro_rate = Currency::find(6);
            $sgp_rate = Currency::find(9);
            $jpn_rate = Currency::find(10);
            $chn_rate = Currency::find(11);
            $idn_rate = Currency::find(12);
            $mls_rate = Currency::find(13);
            $thai_rate = Currency::find(14);

            if($amt->currency_id == 4 && $request->currency == 5){
                $con_amt = $request->amount * $usd_rate->exchange_rate;
            }
            else if($amt->currency_id == 4 && $request->currency == 6){
                $con_amt = $request->amount * $euro_rate->exchange_rate;
            }
            else if($amt->currency_id == 4 && $request->currency == 9){
                $con_amt = $request->amount * $sgp_rate->exchange_rate;
            }
            else if($amt->currency_id == 4 && $request->currency == 10){
                $con_amt = $request->amount * $jpn_rate->exchange_rate;
            }
            else if($amt->currency_id == 4 && $request->currency == 11){
                $con_amt = $request->amount * $chn_rate->exchange_rate;
            }
            else if($amt->currency_id == 4 && $request->currency == 12){
                $con_amt = $request->amount * $idn_rate->exchange_rate;
            }
            else if($amt->currency_id == 4 && $request->currency == 13){
                $con_amt = $request->amount * $mls_rate->exchange_rate;
            }
            else if($amt->currency_id == 4 && $request->currency == 14){
                $con_amt = $request->amount * $thai_rate->exchange_rate;
            }
            else if($amt->currency_id == 5 && $request->currency == 4){
                $con_amt = $request->amount / $usd_rate->exchange_rate;
            }
            else if($amt->currency_id == 6 && $request->currency == 4){
                $con_amt = $request->amount / $euro_rate->exchange_rate;
            }
            else if($amt->currency_id == 9 && $request->currency == 4){
                $con_amt = $request->amount / $sgp_rate->exchange_rate;
            }
            else if($amt->currency_id == 10 && $request->currency == 4){
                $con_amt = $request->amount / $jpn_rate->exchange_rate;
            }
            else if($amt->currency_id == 11 && $request->currency == 4){
                $con_amt = $request->amount / $chn_rate->exchange_rate;
            }
            else if($amt->currency_id == 12 && $request->currency == 4){
                $con_amt = $request->amount / $idn_rate->exchange_rate;
            }
            else if($amt->currency_id == 13 && $request->currency == 4){
                $con_amt = $request->amount / $mls_rate->exchange_rate;
            }
            else if($amt->currency_id == 14 && $request->currency == 4){
                $con_amt = $request->amount / $thai_rate->exchange_rate;
            }
            else{
                $con_amt = $request->amount;
            }


            $bc_acc = $request->bank_acc;

            $acc_bank = Accounting::find($bc_acc);
            $acc_bank->balance -= $con_amt;
            $acc_bank->save();

            $exp_bank = Accounting::find($request->exp_acc);
            $exp_bank->balance += $request->amount;
            $exp_bank->save();

            $bank=Bank::where('account_id',$request->bank_acc)->first();
            $bank->balance -= $con_amt;
            $bank->save();
        }

        $tran = Transaction::create([
            'account_id' => $bc_acc,
            'type' => 2,
            'amount' => $con_amt,
            'remark' => $request->remark,
            'date' => $request->date,
            'type_flag' =>2,
            'expense_flag' => 2,
            'currency_id' => $request->currency,
            'all_flag'  =>4,
            'expense_id'=> $exp->id
        ]);

        $tran1->related_transaction_id = $tran->id;
        $tran1->save();

        alert('Added Transaction Successfully!!');
      return redirect()->back();
    }
    protected function expense()
    {

        $expense_tran = Transaction::where('expense_flag',1)->get();
        $bank_cash_tran = Transaction::where('expense_flag',2)->get();
         $account = Accounting::where('account_type',4)->get();
         $cash_account = Accounting::where('account_type',3)->get();
         $exp_account = Accounting::where('account_type',8)->get();

         $saleproject = SaleProject::all();
         $currency = Currency::all();
        return view('Admin.expense',compact('currency','saleproject','account','expense_tran','bank_cash_tran','exp_account','cash_account'));
    }
    protected function incoming()
    {
        $expense_tran = Transaction::where('expense_flag',1)->get();
        // dd($expense_tran);
        $bank_cash_tran = Transaction::where('expense_flag',2)->get();
         $account = Accounting::where('account_type',4)->get();
         $cash_account = Accounting::where('account_type',3)->get();
         $inc_account = Accounting::where('account_type',6)
                        ->orWhere('account_type',14)
                        ->get();
        $saleproject = SaleProject::all();
        $currency = Currency::all();
        // dd($inc_account);
        return view('Admin.incoming',compact('currency','account','cash_account','inc_account','expense_tran','bank_cash_tran','saleproject'));
    }
    protected function incoming_type()
    {
        $saleproject = SaleProject::all();
        $account = Accounting::where('account_type',6)
                   ->orWhere('account_type',14)
                   ->orWhere('account_type',7)
                   ->orWhere('account_type',15)
                   ->get();
        $cost_centers = CostCenter::all();
        $currency = Currency::all();
        // dd($expense);
        return view('Admin.incoming_type',compact('currency','account','saleproject','cost_centers'));

    }
    protected function expense_type()
    {
        $cost_centers = CostCenter::all();
        $saleproject = SaleProject::all();
        $account = Accounting::where('account_type',8)
                    ->orWhere('account_type',9)
                    ->orWhere('account_type',10)->get();
        $currency = Currency::all();
        // dd($expense);
        return view('Admin.expense_type',compact('currency','account','saleproject','cost_centers'));
    }
    protected function add_asset()
    {
        return view('Admin.add_asset');
    }
    public function store_asset(Request $request){
        //  dd($request->all());
         if($request->exist_asset == 1){
             $used_year = $request->used_year;
             $total_dep = $request->depriciation_total;
         }
         elseif($request->exist_asset == 2){
            $used_year = 0;
            $total_dep = 0;
        }


            $futureDate=date('Y-m-d', strtotime('+1 year', strtotime($request->start_date)));

            $futureMonth=date('Y-m-d', strtotime('+1 month', strtotime($request->start_date)));
            $futureDay=date('Y-m-d', strtotime('+1 day', strtotime($request->start_date)));
            $daily_dep = $request->year_depriciation/365;
            $monthly_dep = $request->year_depriciation/12;



        // if($request->sell)

        // dd( $used_year );
        $asset = FixedAsset::create([
            'name' => $request->asset_name ,
            'type' => $request->type ,
            'description' => $request->asset_description  ,
            'initial_purchase_price' => $request->purchase_initial_price ,
            'salvage_value' => $request->salvage_value ,
            'use_life' => $request->use_life ,
            'yearly_depriciation' => $request->year_depriciation ,
            'existing_flag' => $request->exist_asset ,
            'account_code' => $request->account_code,
            'account_name' => $request->account_name,
            'used_years' => $used_year,
            'depriciation_total' => $total_dep ,
            'current_value' => $request->current_value ,
            'start_date' => $request->start_date ,
            'future_date'=> $futureDate,

            'monthly_depriciation' => $monthly_dep,
            'daily_depriciation' => $daily_dep,
            'future_month' =>$futureMonth,

            'future_day' => $futureDay
        ]);
        if($total_dep == 0){
            $balance = $request->purchase_initial_price;
            Accounting::create([
                'account_code' =>$request->account_code,
                'account_name' => $request->account_name,
                'account_type' =>1,
                // 'project_id' =>7,
                'amount' => $balance,
                'opening_balance' => $balance,
                'general_project_flag' => 0,

            ]);
            Accounting::create([
                'account_code' =>$request->account_code,
                'account_name' => $request->account_name,

                'account_type' =>11,
                // 'project_id' =>7,
                'amount' =>0,
                'opening_balance' =>0,
                'general_project_flag' => 0,

            ]);
        }
        else if($total_dep != 0){
            $balance = $request->purchase_initial_price;
            $balance1 = $request->current_value;
            Accounting::create([
                'account_code' =>$request->account_code,
                'account_name' => $request->account_name,
                'account_type' =>1,
                // 'project_id' =>7,

                'amount' =>$balance1 ,
                'general_project_flag' => 0,

            ]);
            Accounting::create([
                'account_code' =>$request->account_code,
                'account_name' => $request->account_name,

                'account_type' =>11,
                // 'project_id' =>7,
                'amount' => $total_dep,
                'general_project_flag' => 0,
            ]);
        }

        alert()->success('successfully stored Asset Data');
        return redirect()->route('fixed_asset');
    }

    public function store_sell_end(Request $request){
        //  dd($request->all());
        // $request->
        $fixed_asset = FixedAsset::find($request->id);
        // dd($fixed_asset->profit_loss_status);
        if($request->sell_price > $request->current_value){
            $fixed_asset->profit_loss_status = 1;
        }
        elseif($request->sell_price < $request->current_value){
            $fixed_asset->profit_loss_status = 2;
        }
        if($request->exist_asset == 1){
            $fixed_asset->sell_or_end_flag = 1;
        }
        if($request->exist_asset == 2){
            $fixed_asset->sell_or_end_flag = 2;
        }

            $fixed_asset->sell_price = $request->sell_price;
            $fixed_asset->sell_date = $request->sell_date;
            $fixed_asset->profit_loss_value = $request->profit_loss;
            $fixed_asset->end_remark = $request->remark;
            $fixed_asset->end_date = $request->end_date;
            $fixed_asset->save();


            return redirect()->route('fixed_asset');


    }

    protected function store_bank(Request $request)
    {
        // dd($request->all());

        // $account = Accounting::latest()->orderBy('id', 'DESC')->first();
        // $acc_id = $account->id + 1;
        // $no_project = "-";
        // dd($acc_id);
        $acc = Accounting::create([
            'account_code' =>$request->acc_code,
            'account_name' => $request->acc_name,
            'account_type' =>4,
            'general_project_flag' =>0,
        ]);
        Bank::create([
            'account_id' => $acc->id,

            'account_name' => $request->acc_name,
            'account_code' =>$request->acc_code,
            'opeing_date' => $request->opening_date,
            'account_holder_name' => $request->holder_name,
            'balance' => $request->current_balance,
            'bank_name' => $request->bank_name,
            'bank_address' => $request->bank_address,
            'bank_contact' => $request->bank_contact,
        ]);

        alert()->success('Added Bank Successfully!!!');
        return redirect()->back();
    }


    protected function show_account_list()
    {
        return view('Admin.project_list');
    }
    protected function create_project()
    {
        $customers = Customer::all();
        $currency  = Currency::all();
        return view('Admin.create_project',compact('currency','customers'));
    }
    protected function show_customer_list()
    {
        $customers = Customer::all();
        return view('Admin.customer_list',compact('customers'));
    }
    protected function storeCustomer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'company_name' => 'required',
            // 'business_type' => 'required',
            'address' => 'required',
            'email' => 'required',
            'contact_number' => 'required',
            // 'website' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('customer')
                        ->withErrors($validator)
                        ->withInput();
        }

        $customer = Customer::create([
            'company_name' => $request->company_name,

            'address' => $request->address,
            'email' => $request->email,

            'contact_person_name' => $request->contact_person_name,
            'contact_number' => $request->contact_number,
            // 'project_id' => implode(',',$request->project_id),
        ]);


        alert()->success('Successfully created Customer!');
        return redirect()->route('customer_list');
    }
    public function check_projectType(Request $request)
    {
        if($request->type == 1)
        {
            return response()->json("gover");
        }
        else
        {
            $customer = Customer::all();
            return response()->json($customer);
        }
    }
    public function show_projectsale()
    {
        $years = [];

        $year_project = YearProject::all();
        foreach($year_project as $yearproj)
        {
            array_push($years,$yearproj->year);

        }
        $show_year = array_unique($years);


        // dd($show_year);

        $sale_project_yearly = SaleProject::all();
    //    dd($sale_project);

        return view('Admin.project_list',compact('year_project','show_year','sale_project_yearly'));
    }

    public function currency(){
        $currency = Currency::all();
        return view('Admin.currency',compact('currency'));
    }

    public function store_currency(Request $request){
        // return view('Admin.cost_center');
        // dd($request->all());
        Currency::create([
            'code' => $request->code,
            'name' => $request->name,
            'exchange_rate' => $request->rate,
            'last_update' => $request->last,
        ]);
      alert()->success('Added Currency Successfully!!!');
        return redirect()->back();
    }

    public function update_currency(Request $request,$id){
        // dd($request->rate);
        $curr = Currency::find($id);
        // dd($curr->exchange_rate);
        $curr->exchange_rate = $request->rate;
        $curr->save();
        alert()->success('Updated Exchange Rate Successfully!!!');
        return redirect()->back();
    }

    public function update_accounting(Request $request,$id){
        //    dd($request->all());
        // dd($id);
        $update = Accounting::find($id);
        if($request->project_id == 0){
        $update->account_code = $request->acc_code;
        $update->account_name = $request->acc_name;
        if($request->account_type_id != 0){
        $update->account_type = $request->account_type_id;
        }
        $update->project_id = null;
        $update->general_project_flag = 0;
        $update->cost_center_id = $request->cost_center;
        $update->currency_id = $request->currency;
        $update->amount = $request->balance;
        $update->carry_for_work = $request->no_yes;
        $update->save();
        alert()->success('Updated Account Successfully!!!');
        return redirect()->back();
        }
        else{
            $update->account_code = $request->acc_code;
            $update->account_name = $request->acc_name;
            if($request->account_type_id != 0){
                $update->account_type = $request->account_type_id;
            }
            $update->project_id = null;
            $update->general_project_flag = 0;
            $update->cost_center_id = $request->cost_center;
            $update->currency_id = $request->currency;
            $update->amount = $request->balance;
            $update->carry_for_work = $request->no_yes;
            $update->save();
            alert()->success('Updated Account Successfully!!!');
            return redirect()->back();
        }



    }

    public function cost_center(){
        $cost_centers = CostCenter::all();
        return view('Admin.cost_center',compact('cost_centers'));
    }

    public function store_cost_center(Request $request){
        // return view('Admin.cost_center');
        // dd($request->all());
        CostCenter::create([
            'name' => $request->cc_name,
        ]);
      alert()->success('Added Cost Center Successfully!!!');
        return redirect()->back();
    }

    public function store_sale_project(Request $request)
    {

        // dd($request->all());
        $year = Carbon::parse($request->esti_date)->format('Y');


        $roi = ($request->project_value) - ($request->exp_budget);
        $roii = $roi/($request->exp_budget);
        $roi_value = $roii *100;
        // dd($roii);


        if ($request->hasfile('rfq')) {

			$RFQ = $request->file('rfq');
			$name = $RFQ->getClientOriginalName();
			$RFQ->move(public_path() . '/image/', $name);
			$RFQ = $name;
		}
        if($request->type == 1)
        {
            $storesale_project = SaleProject::create([
                'name' =>  $request->proj_name,
                'type' => $request->type,
                'government_department_name' => $request->customer,
                'status' => 1,
                'project_contact_person' => $request->person,
                'phone' => $request->phone,
                'email' =>  $request->email,
                'location' => $request->location,
                'submission_date' =>$request->submis_date,
                'estimate_date' =>$request->esti_date,
                'rfq_file_path' =>$RFQ,
                'description' => $request->description,
                'project_value' =>$request->project_value,
                'expected_budget' => $request->exp_budget,
                'year' => $year,
                'roi_value' => $roi_value,
                'customer_id' => $request->customer_id,
                'team' => $request->team,

            ]);
        }
        else
        {
            $storesale_project = SaleProject::create([
                'name' =>  $request->proj_name,
                'type' => $request->type,
                'project_owner' => $request->customer,
                'status' => 1,
                'project_contact_person' => $request->person,
                'phone' => $request->phone,
                'email' =>  $request->email,
                'location' => $request->location,
                'submission_date' =>$request->submis_date,
                'estimate_date' =>$request->esti_date,
                'rfq_file_path' =>$RFQ,
                'description' => $request->description,
                'project_value' =>$request->project_value,
                'expected_budget' => $request->exp_budget,
                'year' => $year,
                'roi_value' => $roi_value,
                'customer_id' => $request->customer_id,
                'team' => $request->team,

            ]);
            // $storesale_project->project_customer()->attach($request->customer_id);
        }
        $year_project = YearProject::create([
            'year' => $year,
            'project_id' => $storesale_project->id,
        ]);
        if($request->project_value != null)
        {
            $revenue_acc = Accounting::create([

                'account_code' => $request->revenueacc_code,
                'account_name' => $request->revenueacc_name,
                'account_type' => 6,
                'project_id' => $storesale_project->id,
                'amount' => $request->project_value,
                'currency_id' => $request->currency,
                'opening_balance' => $request->project_value,
            ]);
            $receiveable_acc = Accounting::create([
                'account_code' => $request->receacc_code,
                'account_name' => $request->receacc_name,
                'account_type' => 7,
                'project_id' => $storesale_project->id,
                'amount' => $request->project_value,
                'currency_id' => $request->currency,
                'opening_balance' => $request->project_value,
            ]);
        }
        if($request->exp_budget != null)
        {

            $cogs_acc = Accounting::create([
                'account_code' => $request->cogsacc_code,
                'account_name' => $request->cogsacc_name,
                'account_type' => 10,
                'project_id' => $storesale_project->id,
                'amount' => 0,
                'currency_id' => $request->currency_id,
                'opening_balance' => $request->exp_budget,
            ]);
            $payable_acc = Accounting::create([
                'account_code' => $request->payableacc_code,
                'account_name' => $request->payableacc_name,
                'account_type' => 9,
                'project_id' => $storesale_project->id,
                'amount' => $request->exp_budget,
                'currency_id' => $request->currency_id,
                'opening_balance' => $request->exp_budget,
            ]);
        }


       return redirect()->back();

    }
    protected function store_accounting_account(Request $request)
    {

        if($request->project_id == 0)
        {
            if($request->no_yes != null){
            $accounting = Accounting::create([
                'account_code' => $request->acc_code,
                'account_name' => $request->acc_name,
                'account_type' => $request->account_type_id,
                'project_id' => null,
                'general_project_flag' => 0,
                'cost_center_id'  => $request->cost_center,
                'currency_id' =>$request->currency,
                'amount' => $request->balance,
                'opening_balance' => $request->balance,
                'carry_for_work' => $request->no_yes,
           ]);
          }else{
            $accounting = Accounting::create([
                'account_code' => $request->acc_code,
                'account_name' => $request->acc_name,
                'account_type' => $request->account_type_id,
                'project_id' => null,
                'general_project_flag' => 0,
                'cost_center_id'  => $request->cost_center,
                'currency_id' =>$request->currency,
                'amount' => $request->balance,
                'opening_balance' => $request->balance,
           ]);
          }
        }
        else
        {
            if($request->no_yes != null){
            $accounting = Accounting::create([
                'account_code' => $request->acc_code,
                'account_name' => $request->acc_name,
                'account_type' => $request->account_type_id,
                'project_id' => $request->project_id,
                'general_project_flag' => 1,
                'cost_center_id'  => $request->cost_center,
                'currency_id' =>$request->currency,
                'amount' => $request->balance,
                'opening_balance' => $request->balance,
                'carry_for_work' => $request->no_yes,
            ]);
          }else{
            $accounting = Accounting::create([
                'account_code' => $request->acc_code,
                'account_name' => $request->acc_name,
                'account_type' => $request->account_type_id,
                'project_id' => $request->project_id,
                'general_project_flag' => 1,
                'cost_center_id'  => $request->cost_center,
                'currency_id' =>$request->currency,
                'amount' => $request->balance,
                'opening_balance' => $request->balance,
            ]);
          }
        }

        // dd("done");
        alert()->success('Successfully Stored Accounting Account!!');
        return back();

    }
    public function createProduct() {


        $category = Category::all();
        $subcategory = SubCategory::all();
        $supplier = Supplier::all();
        $incoterm = incoterm_type::all();

        $brand = Brand::all();
		return view('MasterData.create_product',compact('brand','incoterm','supplier','category','subcategory'));


	}
    public function store_product(Request $request) {
		// dd($request->pri_supplier_id);
		// $extra_units = $request->extra_unit;
		// dd($request->all());
        $primary_info = json_decode($request->primary_sup);
        $secondary_info = json_decode($request->secondary_sup);

        // dd("done_sec");
        foreach($primary_info as $pri)
        {
            $unit_pur_price = (int)$pri->unit_pur_price;
            // dd($unit_pur_price);
            $moq_qty = $pri->moq_qty;
            $moq_price = $pri->moq_price;
            // $dis_type = $pri->dis_type;
            // dd((int)$pri->dis_con_type);
        }

		// $validator = Validator::make($request->all(), [
		// 	'model_number' => 'required',
		// 	'name' => 'required',
		// 	'stock_qty' => 'required',
		// 	'brand_name' => 'required',
		// 	'reg_date' => 'required',
		// 	// 'location' => 'required',
		// 	'measuring_unit' => 'required',
		// 	'reorder_quantity' => 'required',
		// 	'purchase_price' => 'required',
		// 	'retail_price' => 'required',
		// 	'wholesale_price' => 'required',
		// ]);

		// if ($validator->fails()) {
		// 	alert()->info("Please Fill all Field!");
		// }
		if ($request->hasfile('photo')) {

			$photo = $request->file('photo');
			$name = $photo->getClientOriginalName();
			$photo->move(public_path() . '/image/', $name);
			$photo = $name;
		}
        else{

			$photo = "logo.jpg";
        }

// dd($unit_pur_price);
		$srn_num = "SRN-" . $request->serial_number;
		$product = Product::create([
            'department_id' => $request->department_id,
            'brand_id' => $request->brand_id,
		    // 'shelve_id' => $request->shelve_id??null,
            'instock_preorder' => $request->exist_asset,
		    'category_id' => $request->category_id??null,
		    'subcategory_id' => $request->subcategory_id??null,
			'measuring_unit' => $request->measuring_unit,
			'name' => $request->name,
            'stock_qty' => $request->stock_qty,
            'reorder_qty' => $request->reorder_qty,
            'primary_supplier_id' => $request->pri_supplier_id,
            'reg_date' => $request->reg_date,
			'photo' => $photo,
			'description' => $request->description,
			'part_no' => $request->part,
            'unit_purchase_price' => $unit_pur_price,
            'moq_price' => $moq_price??null,
            'moq_qty' => $moq_qty??null,

		]);
        foreach($primary_info as $pri)
        {
            // dd($pri->credit_condition_type);
            $upp = (int)$pri->unit_pur_price;
            $comparison = SupplierProductComparison::create([
                'supplier_id' => $pri->id,
                'product_id' => $product->id,
                'primary_flag' => $pri->supplier_flag,
                'unit_purchase_price' => $upp,
                'currency_id' => $pri->currency_type??null,
                'discount_type' => $pri->dis_type??null,
                'discount_value' => $pri->dis_amt??null,
                'incoterm_id' => $pri->incoterm??null,
                'last_purchase_date' => $pri->last_pur_date??null,
                'delivery_lead_time' => $pri->deli_lead_time??null,
                'total_purchase_qty' => $pri->initial_pur_qty??null,
                'total_purchase_amount' => $pri->initial_pur_amt??null,
                'lead_time_type' => $pri->lead_time_type??null,
                'discount_condition' => $pri->dis_cond_type??null,
                'discount_condition_value' => $pri->dis_cond??null,
                'credit_term_type' => $pri->credit_term_type??null,
                'credit_term_value' => $pri->credit_term??null,
                'credit_condition' => $pri->credit_condition_type??null,
                'credit_condition_value' => $pri->con??null,
                'moq_price' => $pri->moq_price??null,
                'moq_qty' => $pri->moq_qty??null,
                'credit_amount' => $pri->credit_amt??null,

            ]);
        }
        foreach($secondary_info as $sec)
        {
            // dd($sec->)
            $secupp = (int)$sec->unit_pur_price;
            $comparison = SupplierProductComparison::create([
                'supplier_id' => $sec->id,
                'product_id' => $product->id,
                'primary_flag' => $sec->supplier_flag,
                'unit_purchase_price' => $secupp??null,
                'currency_id' => $sec->currency_type??null,
                'discount_type' => $sec->dis_type??null,
                'discount_value' => $sec->dis_amt??null,
                'incoterm_id' => $sec->incoterm??null,
                'last_purchase_date' => $sec->last_pur_date??null,
                'delivery_lead_time' => $sec->deli_lead_time??null,
                'total_purchase_qty' => $sec->initial_pur_qty??null,
                'total_purchase_amount' => $sec->initial_pur_amt??null,
                'lead_time_type' => $sec->lead_time_type??null,
                'discount_condition' => $sec->dis_cond_type??null,
                'discount_condition_value' => $sec->dis_cond??null,
                'credit_term_type' => $sec->credit_term_type??null,
                'credit_term_value' => $sec->credit_term??null,
                'credit_condition' => $sec->credit_condition_type??null,
                'credit_condition_value' => $sec->con??null,
                'moq_price' => $sec->moq_price??null,
                'moq_qty' => $sec->moq_qty??null,
                'credit_amount' => $sec->credit_amt??null,

            ]);
        }



// dd("done");

		alert()->success("Successfully Added!");
		return redirect()->back();

	}
    public function product_list() {
		$products = Product::orderBy('id','desc')->get();
		// dd($products);
        $items = Item::all();
        $regionalname = RegionalWarehouse::all();
        $projects = SaleProject::all();
		return view('MasterData.product_list', compact('projects','products','items','regionalname'));
	}
    public function add_new_invoice()
	{



		$project = SaleProject::where('status',1)->get();


		$product = Product::all();
		$product_all = [];
		foreach($product as $pro)
		{
			array_push($product_all,$pro->id);
		}
		return view('Invoice.invoice',compact('product_all','project','product'));
	}
    public function show_invoice_list()
	{

		$invoice = Invoice::all();


		// dd($boms);
		return view('Invoice.invoice_list',compact('invoice'));
	}
    public function show_invoice_accounting($id)
    {
        // dd($id);
        $project = SaleProject::find($id);
        $accounting = Accounting::all();
        $customers = Customer::all();
        $currency = Currency::all();
        return view('Invoice.invoice_accounting',compact('currency','project','accounting','customers'));
    }

    public function ajax_convert(Request $request){
        $bk_ch_acc = $request->bk_ch;
        $convert = Accounting::find($bk_ch_acc);
        $usd_rate = Currency::find(5);
        $euro_rate = Currency::find(6);
        $sgp_rate = Currency::find(9);
        $jpn_rate = Currency::find(10);
        $chn_rate = Currency::find(11);
        $idn_rate = Currency::find(12);
        $mls_rate = Currency::find(13);
        $thai_rate = Currency::find(14);
        return response()->json([
            'convert' => $convert,
            'usd_rate' => $usd_rate,
            'sgp_rate' => $sgp_rate,
            'jpn_rate' => $jpn_rate,
            'chn_rate' => $chn_rate,
            'idn_rate' => $idn_rate,
            'mls_rate' => $mls_rate,
            'thai_rate' => $thai_rate,
            'euro_rate' => $euro_rate]);
    }

    public function ajax_date_filter(Request $request){
        // dd($request->all());
        $from = $request->from;
        $to = $request->to;
        $date_filter = Transaction::where('all_flag',3)
                    ->where('type_flag',3)
                    ->whereBetween('date',[$from,$to])->with('accounting')->get();
        $date_filt = Transaction::where('all_flag',3)
                    ->where('type_flag',4)
                    ->whereBetween('date',[$from,$to])->with('accounting')->get();
        return response()->json([
            'date_filter' => $date_filter,
            'date_filt'   => $date_filt,
       ]);
    }

    public function ajax_filter_date(Request $request){
        // dd($request->all());
        $from = $request->from;
        $to = $request->to;
        $date_filter = Transaction::where('all_flag',4)
                    ->where('type_flag',1)
                    ->whereBetween('date',[$from,$to])->with('accounting')->get();
        $date_filt = Transaction::where('all_flag',4)
                    ->where('type_flag',2)
                    ->whereBetween('date',[$from,$to])->with('accounting')->get();
        return response()->json([
            'date_filter' => $date_filter,
            'date_filt'   => $date_filt,
       ]);
    }

    public function store_invoiceAccounting(Request $request)
      {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
			'invoice_no' => 'required',
            'invoice_date' => 'required',
            'description' => 'required',
            'total_amt' => 'required',
            'total_qty' => 'required',
            'paid_flag' => 'required',

		]);

		if ($validator->fails()) {
			alert()->info("Please Fill all Field!");
		}
        if($request->paid_flag == 1)
        {
            $pf = 1;
        }
        else if($request->paid_flag == 2)
        {
            $pf =0;
        }
        // dd($pf);
        $invoice_accIng = Invoice::create([
            'invoice_no' => $request->invoice_no,
            'invoice_date' => $request->invoice_date,
            'sale_project_id' => $request->project_id,
            'total_product_qty' => $request->total_qty,
            'total_amount' => $request->total_amt,
            'paid_status' => $pf,
            'currency_id' => $request->currency_id,
        ]);
        if($request->paid_flag == 1)
        {

            if($request->exist_asset == 1){
                // dd($request->bank_acc);
                $accounting = Accounting::where('project_id',$request->project_id)->where('account_type',7)->first();
                $accounting->amount -= $request->pay_amt;
                $accounting->save();
                $bank = Bank::where('account_id',$request->bank_acc)->first();
                // dd($bank);
                $bank->balance += $request->pay_amt;
                $bank->save();
                $accounting_bank = Accounting::find($bank->account_id);
                $accounting_bank->amount += $request->pay_amt;
                $accounting_bank->save();

                $transaction_rece = Transaction::create([
                    'account_id' => $accounting->id,
                    'amount'=> $request->pay_amt,
                    'date'=>$request->date,
                    'remark'=>$request->remark,
                    'type'=>2,
                    'related_project_flag'=>1,
                    'project_id' => $request->project_id,
                    'type_flag' => 1,
                    'all_flag' => 1,
                ]);

                $transaction = Transaction::create([
                    'account_id' => $accounting_bank->id,
                    'amount'=> $request->pay_amt,
                    'date'=>$request->date,
                    'remark'=>$request->remark,
                    'type'=>1,
                    'related_project_flag'=>1,
                    'project_id' => $request->project_id,
                    'type_flag' => 2,
                    'all_flag' => 1,
                ]);
            }
            else{
                $accounting = Accounting::where('project_id',$request->project_id)->where('account_type',7)->first();
                $accounting->amount -= $request->pay_amt;
                $accounting->save();
                $accounting_cash = Accounting::find($request->cash_acc);
                $accounting_cash->amount += $request->pay_amt;
                $accounting_cash->save();

                $transaction_rece = Transaction::create([
                    'account_id' => $accounting->id,
                    'amount'=> $request->pay_amt,
                    'date'=>$request->date,
                    'remark'=>$request->remark,
                    'type'=>2,
                    'related_project_flag'=>1,
                    'project_id' => $request->project_id,
                    'type_flag' => 1,
                    'all_flag' => 1,
                ]);

                $transaction = Transaction::create([
                    'account_id' => $accounting_cash->id,
                    'amount'=> $request->pay_amt,
                    'date'=>$request->date,
                    'remark'=>$request->remark,
                    'type'=>1,
                    'related_project_flag'=>1,
                    'project_id' => $request->project_id,
                    'type_flag' => 2,
                    'all_flag' => 1,
                ]);
            }

            $transaction_rece->related_transaction_id = $transaction->id;
            $transaction_rece->save();


        }
        // return back();
        return redirect()->route('show_pay_invoice',['id' => $request->project_id]);
    }
    public function show_po_accounting($id)
    {
        // dd($id);
        $project = SaleProject::find($id);
        $accounting = Accounting::all();
        $suppliers = Supplier::all();
        $currency = Currency::all();
        return view('purchase_order.purchase_order_accounting',compact('currency','project','accounting','suppliers'));
    }
    public function store_poAccounting(Request $request)
    {
        // dd($request->all());

        $validator = Validator::make($request->all(), [
			'po_no' => 'required',
            'po_date' => 'required',
            'description' => 'required',
            'total_amt' => 'required',
            'total_qty' => 'required',
            'paid_flag' => 'required',
            'supplier' => 'required',
            'currency_id' => 'required'
		]);

		if ($validator->fails()) {
			alert()->info("Please Fill all Field!");
		}
        if($request->paid_flag == 1)
        {
            $pf = 1;
        }
        else if($request->paid_flag == 2)
        {
            $pf =0;
        }
        // dd($pf);
        $invoice_accIng = PurchaseOrder::create([
            'purchase_order_no' => $request->po_no,
            'purchase_order_date' => $request->po_date,
            'sale_project_id' => $request->project_id,
            'total_product_qty' => $request->total_qty,
            'total_amount' => $request->total_amt,
            'paid_status' => $pf,
            'description' => $request->description,
            'supplier_id' => $request->supplier,
            'currency_id' => $request->currency_id,
        ]);
        // dd("df");
        if($request->paid_flag == 1)
        {
            if($request->exist_asset == 1){
                $accounting = Accounting::where('project_id',$request->project_id)->where('account_type',10)->first();
                $accounting->amount += $request->pay_amt;
                $accounting->save();
                $bank = Bank::where('account_id',$request->bank_acc)->first();
                $bank->balance -= $request->pay_amt;
                $bank->save();
                $accounting_bank = Accounting::find($bank->account_id);
                $accounting_bank->amount -= $request->pay_amt;
                $accounting_bank->save();
                // dd($request->bank_acc);

                $transaction_rece = Transaction::create([
                    'account_id' => $accounting->id,
                    'amount'=> $request->pay_amt,
                    'date'=>$request->date,
                    'remark'=>$request->remark,
                    'type'=>1,
                    'related_project_flag'=>1,
                    'project_id' => $request->project_id,
                    'type_flag' => 1,
                    'all_flag' => 1,
                    'currency_id' => $request->currency_id,
                ]);

                $transaction = Transaction::create([
                    'account_id' => $accounting_bank->id,
                    'amount'=> $request->pay_amt,
                    'date'=>$request->date,
                    'remark'=>$request->remark,
                    'type'=>2,
                    'related_project_flag'=>1,
                    'project_id' => $request->project_id,
                    'type_flag' => 2,
                    'all_flag' => 1,
                    'currency_id' => $request->currency_id,
                ]);
            }else{
                $accounting = Accounting::where('project_id',$request->project_id)->where('account_type',10)->first();
                $accounting->amount += $request->pay_amt;
                $accounting->save();
                $accounting_cash = Accounting::find($request->cash_acc);
                $accounting_cash->amount -= $request->pay_amt;
                $accounting_cash->save();

                $transaction_rece = Transaction::create([
                    'account_id' => $accounting->id,
                    'amount'=> $request->pay_amt,
                    'date'=>$request->date,
                    'remark'=>$request->remark,
                    'type'=>1,
                    'related_project_flag'=>1,
                    'project_id' => $request->project_id,
                    'type_flag' => 1,
                    'all_flag' => 1,
                    'currency_id' => $request->currency_id,
                ]);

                $transaction = Transaction::create([
                    'account_id' => $accounting_cash->id,
                    'amount'=> $request->pay_amt,
                    'date'=>$request->date,
                    'remark'=>$request->remark,
                    'type'=>2,
                    'related_project_flag'=>1,
                    'project_id' => $request->project_id,
                    'type_flag' => 2,
                    'all_flag' => 1,
                    'currency_id' => $request->currency_id,
                ]);
            }

            $transaction_rece->related_transaction_id = $transaction->id;
            $transaction_rece->save();


        }
        return redirect()->route('show_pay_po',['id' => $request->project_id]);

    }

     function invoice_product_list(Request $request)
	{
		// dd($request->bom_id);
		$invoicepro = [];
		$cate = [];
		$brand = [];
		$dep = [];
		$invoice = Invoice::find($request->invoice_id);
		$invoice_productlist = InvoiceProductList::where('invoice_id',$invoice->id)->get();
		foreach($invoice_productlist as $invlist)
		{
			$product = Product::find($invlist->product_id);


			// dd($product);
			array_push($invoicepro,$product);

		}
		return response()->json([

			'product' => $invoicepro
		]);



	}
    function store_invoice(Request $request)
	{
		// dd($request->all());
		$invoice_product = json_decode($request->bom_pro);
		// dd($bom_supplier[0]->id);
		$invoiceNo = "Inv - ".$request->invoice_no;
		$invoice = Invoice::create([
			'invoice_no' => $invoiceNo,
			'sale_project_id' => $request->project_id,
			'total_product_qty' => $request->total_req_qty,
			'invoice_date' => $request->invoice_date,

            'total_amount' => $request->total_req_price,

		]);

		foreach($invoice_product as $invpro)
		{
			$invoice_product_list = InvoiceProductList::create([
				'invoice_id' => $invoice->id,
				'product_id' => $invpro->id,

				'sub_total' => $invpro->sub_total,
                'qty' =>$invpro->qty,
			]);
		}



		alert()->success("Successfully Created Invoice!");
		return redirect()->back();
	}

    public function pay_invoice($id)
    {

        $sale_project = SaleProject::find($id);
        $invoice = Invoice::where('sale_project_id',$id)->get();
        $invoice_product = InvoiceProductList::all();
        $product = Product::all();
        $accounting = Accounting::all();
        $currency = Currency::all();

        $transaction = Transaction::where('project_id',$id)->get();
        return view('Admin.pay_invoice',compact('currency','transaction','accounting','sale_project','invoice','invoice_product','product'));
    }
    public function pay_po($id)
    {
        $sale_project = SaleProject::find($id);
        $purchase_order = PurchaseOrder::where('sale_project_id',$id)->get();
        // $invoice_product = InvoiceProductList::all();
        // $product = Product::all();
        $currency = Currency::all();
        $suppliers =Supplier::all();
        $accounting = Accounting::all();
        $transaction = Transaction::where('project_id',$id)->get();
        // dd($transaction);
        return view('purchase_order.pay_po',compact('currency','transaction','accounting','sale_project','purchase_order','suppliers'));

    }
    function store_transaction(Request $request)
    {
        // dd($request->all());
        if($request->exist_asset == 1){
            // dd($request->bank_acc);
            $accounting = Accounting::where('project_id',$request->project_id)->where('account_type',7)->first();
            $accounting->amount -= $request->pay_amt;
            $accounting->save();
            $bank = Bank::where('account_id',$request->bank_acc)->first();
            // dd($bank);
            $bank->balance += $request->pay_amt;
            $bank->save();
            $accounting_bank = Accounting::find($bank->account_id);
            $accounting_bank->amount += $request->pay_amt;
            $accounting_bank->save();
            $transaction_rece = Transaction::create([
                'account_id' => $accounting->id,
                'amount'=> $request->pay_amt,
                'date'=>$request->date,
                'remark'=>$request->remark,
                'type'=>2,
                'related_project_flag'=>1,
                'project_id' => $request->project_id,
                'type_flag' => 1,
                'all_flag' => 1,
            ]);

            $transaction = Transaction::create([
                'account_id' => $accounting_bank->id,
                'amount'=> $request->pay_amt,
                'date'=>$request->date,
                'remark'=>$request->remark,
                'type'=>1,
                'related_project_flag'=>1,
                'project_id' => $request->project_id,
                'type_flag' => 2,
                'all_flag' => 1,
            ]);
        }
        else{
            $accounting = Accounting::where('project_id',$request->project_id)->where('account_type',7)->first();
            $accounting->amount -= $request->pay_amt;
            $accounting->save();
            // $bank = Bank::where('account_id',$request->cash_acc)->first();
            // dd($bank);
            // $bank->balance += $request->pay_amt;
            // $bank->save();
            $accounting_cash = Accounting::find($request->cash_acc);
            $accounting_cash->amount += $request->pay_amt;
            $accounting_cash->save();
            $transaction_rece = Transaction::create([
                'account_id' => $accounting->id,
                'amount'=> $request->pay_amt,
                'date'=>$request->date,
                'remark'=>$request->remark,
                'type'=>2,
                'related_project_flag'=>1,
                'project_id' => $request->project_id,
                'type_flag' => 1,
                'all_flag' => 1,
            ]);

            $transaction = Transaction::create([
                'account_id' => $accounting_cash->id,
                'amount'=> $request->pay_amt,
                'date'=>$request->date,
                'remark'=>$request->remark,
                'type'=>1,
                'related_project_flag'=>1,
                'project_id' => $request->project_id,
                'type_flag' => 2,
                'all_flag' => 1,
            ]);
        }

            $transaction_rece->related_transaction_id = $transaction->id;
            $transaction_rece->save();

            $invoice_change = Invoice::find($request->invoice_id);
            $invoice_change->paid_status = 1;
            $invoice_change->save();


            return back();

        }


    function store_pay_po_transaction(Request $request)
    {
        // dd($request->all());
        if($request->exist_asset == 1)
        {
            $accounting = Accounting::where('project_id',$request->project_id)->where('account_type',10)->first();
            $accounting->amount += $request->pay_amt;
            $accounting->save();
            $bank = Bank::where('account_id',$request->bank_acc)->first();
            $bank->balance -= $request->pay_amt;
            $bank->save();
            $accounting_bank = Accounting::find($bank->account_id);
            $accounting_bank->amount -= $request->pay_amt;
            $accounting_bank->save();
            $transaction_rece = Transaction::create([

                'account_id' => $accounting->id,
                'amount'=> $request->pay_amt,
                'date'=>$request->date,
                'remark'=>$request->remark,
                'type'=>1,
                'related_project_flag'=>1,

                'project_id' => $request->project_id,
                'type_flag' => 1,
                'all_flag' => 2,
            ]);


            $transaction = Transaction::create([
                'account_id' => $accounting_bank->id,
                'amount'=> $request->pay_amt,
                'date'=>$request->date,
                'remark'=>$request->remark,
                'type'=>2,
                'related_project_flag'=>1,

                'project_id' => $request->project_id,
                'type_flag' => 2,
                'all_flag' => 2,
            ]);
        }else{
            $accounting = Accounting::where('project_id',$request->project_id)->where('account_type',10)->first();
            $accounting->amount += $request->pay_amt;
            $accounting->save();
            $accounting_cash = Accounting::find($request->cash_acc);
            $accounting_cash->amount -= $request->pay_amt;
            $accounting_cash->save();
            $transaction_rece = Transaction::create([

                'account_id' => $accounting->id,
                'amount'=> $request->pay_amt,
                'date'=>$request->date,
                'remark'=>$request->remark,
                'type'=>1,
                'related_project_flag'=>1,

                'project_id' => $request->project_id,
                'type_flag' => 1,
                'all_flag' => 2,
            ]);


            $transaction = Transaction::create([
                'account_id' => $accounting_cash->id,
                'amount'=> $request->pay_amt,
                'date'=>$request->date,
                'remark'=>$request->remark,
                'type'=>2,
                'related_project_flag'=>1,

                'project_id' => $request->project_id,
                'type_flag' => 2,
                'all_flag' => 2,
            ]);
        }
            $transaction_rece->related_transaction_id = $transaction->id;
            $transaction_rece->save();

            $purchase_order_change = PurchaseOrder::find($request->purchase_order_id);
            $purchase_order_change->paid_status = 1;
            $purchase_order_change->save();

        return back();
    }

    function change_project_status($id)
    {


        $sale_project = SaleProject::find($id);
        if($sale_project->status == 1)
        {
            $sale_project->status = 2;
            $sale_project->save();
        }
        elseif($sale_project->status == 2)
        {
            $sale_project->status = 3;
            $sale_project->save();
        }
        return back();
    }
   function supplier_list(){

    	$brands = Brand::all();
        // dd($brands);
    	$suppliers = Supplier::all();
        $supplier_all = Supplier::all();
        $social = SupplierSocialType::all();
		$brand_supplier = DB::table('brand_supplier')->get();
        $category = Category::all();
		$brand_subcategory = DB::table('brand_sub_category')->get();
        $brand = Brand::all();
        $incoterm = incoterm_type::all();
        $comp = SupplierProductComparison::all();
    	return view('Supplier.supplier_list',compact('comp','incoterm','brand','category','supplier_all','brand_subcategory','social','brand_supplier','suppliers','brands'));
    }
    function ajaxSupplier(Request $request){
// dd($request->all());
        $validator = Validator::make($request->all(), [
            // 'company_name' => 'required',
            // 'business_type' => 'required',
            'name' => 'required',
            'email' => 'required',
            'website' => 'required',
            'department' => 'required',
            'address' => 'required',
            'country' => 'required',
            'sector' => 'required',
            'phone' => 'required',
            'fax' => 'required',
            'rank' =>'required',
            'remark' =>'required',

            // 'website' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $brands = $request->brands;
        $social_type = json_decode($request->social_obj);
        // dd($brands);
    	$supplier = Supplier::create([
    	    'email' => $request->email,
    		'company_name' => $request->name,
    		'phone' => $request->phone,
    		'address' => $request->address,
            'department' => $request->department,
            'fax' => $request->fax,
            'remark' => $request->remark,
            'supplier_rank' => $request->rank,
            'country' => $request->country,
            'sector' => $request->sector,
            'website' => $request->website,
    	]);

// dd("save");
        foreach ($brands as $brand) {

            $supplier->assignBrand($brand);
        }
        foreach($social_type as $st)
        {
            DB::table('supplier_social_type_pivot')->insert([
                'supplier_id' => $supplier->id,
                'social_type' => $st->id,
                'social_address' => $st->social_address,
            ]);
        }


    	$supplier_id = $supplier->id;
		$supplier_code = sprintf("%04s", $supplier_id);
		$supplier->supplier_code = $supplier_code;
		$supplier->save();
        alert()->success("Successfully Added New Supplier!");
    	return back();
    }
     function brand_detail_all(Request $request)
    {
        // dd($request->supplier_id);
        $brand_supplier = DB::table('brand_supplier')->where('supplier_id',$request->supplier_id)->get();
        // dd($brand_supplier);
        $brand_name = [];
        $category = [];
        $subcate = [];
        $co = [];
        foreach($brand_supplier as $bsup)
        {
            $brand = Brand::find($bsup->brand_id);
            // dd($brand->category->category_name);
            $sub = DB::table('brand_sub_category')->where('brand_id',$brand->id)->get();
            foreach($sub as $subthis)
            {
                $sub_categ = SubCategory::find($subthis->sub_category_id);
                array_push($subcate,$sub_categ->name);
            }
            array_push($category,$brand->category->category_name);
            array_push($brand_name,$brand);
            array_push($co,$brand->country_of_origin);


        }
        // dd("ok");
        return response()->json([
            'brand_name' => $brand_name,
            'category' => $category,
            'sub_category' => $subcate,
            'countryof' => $co,
        ]);

    }
    function show_supplier_po_list($id)
    {
        // dd($id);
        $purchase_order = PurchaseOrder::where('supplier_id',$id)->get();
        $accounting = Accounting::all();
        return view('Supplier.supplier_po_list',compact('purchase_order','accounting'));

    }
    function show_ajax_social(Request $request)
    {
        $supplier = Supplier::find($request->supplier_id);
        $sup_social = DB::table('supplier_social_type_pivot')->where('supplier_id',$request->supplier_id)->get();
        $social_arr = [];
        $add_arr = [];
        foreach($sup_social as $supsocial)
        {
            $type = SupplierSocialType::find($supsocial->social_type);
            array_push($social_arr,$type->social_name);
            array_push($add_arr,$supsocial->social_address);
        }
        return response()->json([
            'social_type_name' => $social_arr,
            'social_address' => $add_arr,
        ]);
    }
    function show_customer_receive_list($id)
    {
        // dd("hello");
        $sale_project = SaleProject::where('customer_id',$id)->first();
        $invoice = Invoice::where('sale_project_id',$sale_project->id)->get();
        // dd($invoice);
        $accounting = Accounting::all();
        return view('Admin.customer_receive',compact('invoice','accounting'));
    }
    function now_ajax_get_cust(Request $request)
    {

        $customer = Customer::find($request->cust_id);
        return response()->json($customer);
    }
    function show_product_detail($id)
    {
        // dd($id);
        $product = Product::find($id);
        $sec_supplier = SupplierProductComparison::where('product_id',$id)->where('primary_flag',2)->get();
        // dd($sec_supplier);
        return view('MasterData.product_detail',compact('product','sec_supplier'));
    }
    public function getCompare_product(Request $request)
	{
		// dd($request->product_id);
		$second_product = [];
		$product_primary = Product::find($request->product_id);
		$pri_supplier = Supplier::find($product_primary->supplier_id);
		$product_secondary = SupplierProductComparison::where('product_id',$request->product_id)->where('primary_flag',2)->with('supplier')->with('incoterm')->get();
        $product_primary = SupplierProductComparison::where('product_id',$request->product_id)->where('primary_flag',1)->with('supplier')->with('incoterm')->first();
		// dd();
		return response()->json([
			'pri_sup' => $product_primary,
            'sec_pro' => $product_secondary,
		]);

	}
    function update_category(Request $request)
    {
        // dd($request->all());
        $update = Category::find($request->cate_id);
        $update->category_code = $request->code;
        $update->category_name = $request->name;
        $update->save();
        alert()->success("Successfully Updated!!");
        return back();
    }
    function delete_category(Request $request)
    {
        return ('hello');
        $delete = Category::find($request->category_id);
        $delete->delete();
        // alert()->success("Successfully deleted!!");
        return response()->json('success');
    }
    function update_subcategory(Request $request)
    {
        // dd($request->all());
        $update = SubCategory::find($request->subcate_id);
        // dd($update);
        $update->subcategory_code = $request->code;
        $update->name = $request->name;
        $update->category_id = $request->related;
        $update->save();
        alert()->success("Successfully Updated!!");
        return back();
    }
    function delete_subcategory(Request $request)
    {
        // dd($id);
        $delete = SubCategory::find($request->subcate_id);
        $delete->delete();
        // alert()->success("Successfully deleted!!");
        return response()->json('success');
    }
    function show_comparison_detail(Request $request)
    {

        $comparison = SupplierProductComparison::where('id',$request->supcom_id)->with('incoterm')->get();
        // dd($comparison);
        return response()->json($comparison);
    }
    function update_supplier(Request $request)
    {
        // dd($request->all());
        $update = Supplier::find($request->supplier_id);
        $update->company_name = $request->name;
        $update->email = $request->email;
        $update->department = $request->department;
        $update->supplier_rank = $request->rank;
        $update->sector = $request->sector;
        $update->country = $request->country;
        $update->phone = $request->phone;
        $update->fax = $request->fax;
        $update->remark = $request->remark;
        $update->website = $request->website;
        $update->save();
        alert()->success("Successfully Updated !");
        return back();

    }
    function delete_supplier_info($id)
    {
        $delete = Supplier::find($id)->delete();
        alert()->success("Successfully Deleted !");
        return back();
    }
    function ajax_add_new_brand(Request $request)
    {
        $brand = $request->brands;
        // dd($brand);
        $Brand = Brand::all();
        $supplier = Supplier::find($request->supplier_id);
       $arr_brand = [];
        foreach($brand as $bd)
        {
            $supplier->assignBrand($bd);
            $brandadd = Brand::find($bd);
            array_push($arr_brand,$brandadd);
            $product = Product::where('brand_id',$bd)->get();
        }
        $brand_supp = DB::table('brand_supplier')->where('supplier_id',$request->supplier_id)->get();
        // dd($brand_supp);
         $brand_name = [];
        $category = [];
        $subcate = [];
        $co = [];
        foreach($brand_supp as $bsup)
        {

            $brand = Brand::find($bsup->brand_id);
            // dd($brand->id);
            $sub = DB::table('brand_sub_category')->where('brand_id',$brand->id)->get();
            foreach($sub as $subthis)
            {
                $sub_categ = SubCategory::find($subthis->sub_category_id);
                array_push($subcate,$sub_categ->name);
            }
            array_push($category,$brand->category->category_name);
            array_push($brand_name,$brand);
            array_push($co,$brand->country_of_origin);


        }
        // dd($arr_brand);
        return response()->json([
            'brand' => $brand_name,
            'product' => $product,
            'all_brand' => $Brand,
            'category' => $category,
            'sub_category' => $subcate,
            'countryof' => $co,
        ]);
    }
    function ajax_delete_new_brand(Request $request)
    {
        // dd($request->brand_id);
        $brand_supplier = DB::table('brand_supplier')->where('supplier_id',$request->supplier_id)->where('brand_id',$request->brand_id)->delete();
        $brand_supp = DB::table('brand_supplier')->where('supplier_id',$request->supplier_id)->get();
        // dd($brand_supplier);
        $brand_name = [];
        $category = [];
        $subcate = [];
        $co = [];
        foreach($brand_supp as $bsup)
        {
            $brand = Brand::find($bsup->brand_id);
            // dd($brand->category->category_name);
            $sub = DB::table('brand_sub_category')->where('brand_id',$brand->id)->get();
            foreach($sub as $subthis)
            {
                $sub_categ = SubCategory::find($subthis->sub_category_id);
                array_push($subcate,$sub_categ->name);
            }
            array_push($category,$brand->category->category_name);
            array_push($brand_name,$brand);
            array_push($co,$brand->country_of_origin);


        }
        // dd("ok");
        return response()->json([
            'brand_name' => $brand_name,
            'category' => $category,
            'sub_category' => $subcate,
            'countryof' => $co,
        ]);
    }
    function ajax_get_subcate(Request $request)
    {
        $sub = SubCategory::where('category_id',$request->cate_id)->get();
        return response()->json($sub);
    }
    function ajax_store_new_product(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
			'dep' => 'required',
            'cate' => 'required',
            'sub' => 'required',
            'brand' => 'required',
            'name' => 'required',
            'part' => 'required',
            'unit' => 'required',
            'reg_date' => 'required',
            'radio' => 'required',
            'moq_price' => 'required',
            'min_order_qty' => 'required',
            'instock' => 'required',
            'reorder' => 'required',


		]);

		if ($validator->fails()) {
			alert()->info("Please Fill all Field!");
		}
        $photo = "logo.jpg";
        $product = Product::create([
            'department_id' => $request->dep??null,
            'brand_id' => $request->brand??null,
		    // 'shelve_id' => $request->shelve_id??null,
            'instock_preorder' => $request->radio,
		    'category_id' => $request->cate??null,
		    'subcategory_id' => $request->sub??null,
			'measuring_unit' => $request->unit??null,
			'name' => $request->name??null,
            'stock_qty' => $request->instock,
            'reorder_qty' => $request->reorder??null,
            'photo' => $photo,
            'reg_date' => $request->reg_date,
			'part_no' => $request->part??null,
            'moq_price' => $moq_price??null,

		]);
        // dd("half");
        $comparison = SupplierProductComparison::create([
            'supplier_id' => $request->supplier_id,
            'product_id' => $product->id,
            'primary_flag' => 2,
            'unit_purchase_price' => $request->unit_pur_price,
            'currency_id' => $request->curr??null,
            'discount_type' => $request->dis_type??null,
            'discount_value' => $request->dis_amt??null,
            'incoterm_id' => $request->inco??null,
            'last_purchase_date' => $request->last_date??null,
            'delivery_lead_time' => $request->deli_time??null,
            'total_purchase_qty' => $request->in_pur_qty??null,
            'total_purchase_amount' => $request->in_pur_amt??null,
            'lead_time_type' => $request->time_type??null,
            'discount_condition' => $request->dis_cond_type??null,
            'discount_condition_value' => $request->dis_cond??null,
            'credit_term_type' => $request->credit_term_type??null,
            'credit_term_value' => $request->credit_term??null,
            'credit_condition' => $request->credit_con_type??null,
            'credit_condition_value' =>$request->credit_con??null,
            'moq_price' =>$request->moq_price??null,
            'moq_qty' => $request->moq_qty??null,
            'credit_amount' => $request->credit_amt??null,

        ]);
        // $products = Product::all();
        // dd("done");
        $compare = SupplierProductComparison::where('supplier_id',$request->supplier_id)->where('primary_flag',2)->with('product')->get();
        return response()->json($compare);
    }
    public function add_item_product(Request $request)
	{
		// dd($request->all());
		$serial = "SN-".$request->serial_no;

        if($request->warehouse_flag == 2)
        {
            $regional_id = $request->regional_id;
        }
        else
        {
            $regional_id = null;
        }
        // dd($regional_id);
		$item = Item::create([
			'product_id' => $request->product_id,
			'serial_number' => $serial,
			'size' => $request->size,
			'color' => $request->color,
			'dimension' => $request->dimension,
			'hs_code' => $request->hs_code,
			'other_specification' => $request->other_spec,
			'warehouse_location' => $request->ware_location,
            'unit_purchase_price' => $request->unit_price,
            'purchase_date' => $request->date,
            'stock_qty' => $request->qty,
            'warehouse_type' => $request->warehouse_flag,
            'warehouse_id' => $regional_id
		]);
        alert()->success('Successfully Added Item !!');
		return redirect()->back();

	}
    public function show_bom_list()
	{
        // dd("helo");
		$boms = BillOfMaterial::all();
		$supplier = Supplier::all();
        $suppliers_com = SupplierProductComparison::with('supplier')->with('incoterm')->get();
		// dd($boms);

		return view('Supplier.bom_list',compact('suppliers_com','boms','supplier'));
	}
    public function add_new_bom()
	{
		$supplier = Supplier::all();
		$project = SaleProject::where('status',1)->get();
		// $department = Department::all();
		$category = Category::all();
        $items = Item::all();
        // dd($items);
		$product = Product::all();
		$product_all = [];
        $item_all = [];
		foreach($product as $pro)
		{
			array_push($product_all,$pro->id);
		}
        foreach($items as $item)
		{
			array_push($item_all,$item->id);
		}
        // dd("dfdf");
		return view('Supplier.add_bom',compact('item_all','items','supplier','product_all','project','category','product'));
	}
    public function store_bom(Request $request)
	{
		// dd($request->all());
		$bom_product = json_decode($request->bom_pro);
		$bom_supplier = json_decode($request->supplier_pricing);
		// dd($bom_supplier[0]->id);
		$bomNo = "BOM - ".$request->bom_no;
		$bom = BillOfMaterial::create([
			'bom_no' => $bomNo,
			'project_id' => $request->project_id,
			'num_product_type' => 1,
			'num_product_qty' => $request->total_req_qty,
			'create_date' => $request->bom_date,
			'status' => 1,
		]);

		foreach($bom_product as $bompro)
		{
			$bom_product = BomProductLists::create([
				'bom_id' => $bom->id,
				'product_id' => $bompro->id,
				'required_qty' => $bompro->req_qty,
				'required_spec' => $bompro->req_spec,
				'selected_supplier_id' => $bompro->supplier_id,
			]);
		}
		// for($i=0;$i<=count($bom_product);$i++)
		// {
		// 	$bom_product = BomProductList::create([
		// 		'bom_id' => $bom->id,
		// 		'product_id' => $bom_product[$i]->id,
		// 		'required_qty' => $bom_product[$i]->req_qty,
		// 		'required_spec' => $bom_product[$i]->req_spec,
		// 		'selected_supplier_id' => $bom_product[$i]->supplier_id,
		// 		'selected_supplier_price' => $bom_supplier[$i]->,
		// 		'proposed_price' => ,
		// 		'profit_margin' => ,
		// 	]);
		// }



		alert()->success("Successfully Created Bay Of Matirial Form!");
		return redirect()->back();
	}
    public function bom_product_list(Request $request)
	{
		// dd($request->bom_id);
		$bompro = [];
		$cate = [];
		$brand = [];
		$dep = [];
		$bom = BillOfMaterial::find($request->bom_id);
		$bomlist = BomProductLists::where('bom_id',$bom->id)->with('product')->get();
		foreach($bomlist as $boml)
		{
			$product = Product::find($boml->product_id);
			$category = Category::find($product->category_id);
			$brandpro = Brand::find($product->brand_id);
			// $department = Department::find($product->department_id);
			// dd($product);
			array_push($bompro,$product);
			array_push($cate,$category->category_name);
			array_push($brand,$brandpro->name);
			// array_push($dep,$department->name);
		}
		return response()->json([
			'category' => $cate,
			'brand' => $brand,
			'department' => $dep,
			'product' => $bompro,
            'bompro' => $bomlist,
		]);

	}
    public function get_bom_supplier_list($bom_id)
	{
		// dd($bom_id);
		$bayofmat = BillOfMaterial::find($bom_id);
		$bom_product = BomProductLists::where('bom_id',$bayofmat->id)->get();
		$bom_supplier = BomSupplier::all();
		$bom_supplier_pro =BomSupplierProduct::all();
		$quo = BomSupplierQuotation::all();
		$inv = BomSupplierInvoice::all();
		// dd($quo);
		return view('Supplier.bom_supplier_list',compact('inv','quo','bayofmat','bom_product','bom_supplier','bom_supplier_pro'));
	}
    function bom_supplier_product($bom_id)
	{
		$bom_supplier = [];
		$bom = BillOfMaterial::find($bom_id);
		$bom_product = BomProductLists::where('bom_id',$bom_id)->with('product')->get();
		// dd($bom_product);
		foreach($bom_product as $bomsup)
		{
			$supplier = Supplier::find($bomsup->selected_supplier_id);
			array_push($bom_supplier,$supplier);
		}
		// dd($bom_supplier);

		return view('Supplier.bom_supplier_product',compact('bom','bom_product','bom_supplier'));
	}
    public function get_request_supplier(Request $request)
	{
		$supplier = Supplier::find($request->supplier_id);
        $bom_product_sup = BomProductLists::where('selected_supplier_id',$request->supplier_id)->where('bom_id',$request->bom_id)->with('product')->get();
        $brand_arr = [];
        foreach($bom_product_sup as $bp)
        {
            array_push($brand_arr,$bp->product->brand);
        }
		return response()->json([
            'bpsup' => $bom_product_sup,
            'supplier' => $supplier,
            'brand' => $brand_arr
        ]);
	}
    public function store_email_req(Request $request)
	{
		// dd($request->all());
        if($request->email_flag == 0)
        {
		$productID = $request->product_id;
		// dd($productID);
        // dd(count($productID));

		$req_no = "BOM-REQ-".$request->request_no;
        // dd($req_no);
		$bom_supplier = BomSupplier::create([
			'bom_id' => $request->bom_id,
			'request_no' => $req_no,
			'supplier_id' => $request->supplier_id,
			'request_quotation_date' =>$request->reply_date,
            'rfq_email_title' => $request->title,
            'rfq_email_description' => $request->description,

			'status' => 1,

		]);

		for($i=0;$i<count($productID);$i++)
		{

			$bom_supplier_product = BomSupplierProduct::create([
				'bom_supplier_id' => $bom_supplier->id,
				'product_id' => $productID[$i],
				'requested_qty' => $request->qty[$i],
				'requested_price' => $request->price[$i],
				'requested_specs' => $request->spec[$i],
				'status' => 1,

			]);
		}
        alert()->success("Successfully Stored Request!");
    }
    elseif($request->email_flag == 1)
    {
        $productID = $request->product_id;
		// dd($productID);
        // dd(count($productID));

		$req_no = "BOM-REQ-".$request->request_no;
        // dd($req_no);
		$bom_supplier = BomSupplier::create([
			'bom_id' => $request->bom_id,
			'request_no' => $req_no,
			'supplier_id' => $request->supplier_id,
			'request_quotation_date' =>$request->reply_date,
			'status' => 1,

		]);

		for($i=0;$i<count($productID);$i++)
		{

			$bom_supplier_product = BomSupplierProduct::create([
				'bom_supplier_id' => $bom_supplier->id,
				'product_id' => $productID[$i],
				'requested_qty' => $request->qty[$i],
				'requested_price' => $request->price[$i],
				'requested_specs' => $request->spec[$i],
				'status' => 1,

			]);
		}
        $mail_address = Supplier::find($request->supplier_id)->email;
        // dd($mail_address);
        $count = count($productID);
        // dd($count);
        $bsp = BomSupplierProduct::where('bom_supplier_id',$bom_supplier->id)->with('product')->get();
        $email_sent = BomSupplier::find($bom_supplier->id);
        $email_sent->email_sent_status = 1;
        $email_sent->save();
        $add = 'kokoshine3499@gmail.com';
        $details = [
            'title' => $request->title,
            'body' => $request->desc,
            'data' => $bsp,
            'count' => $count,
        ];

        \Mail::to('kokoshine3499@gmail.com')->send(new \App\Mail\BomSupplierProductMail($details));
        alert()->success("Successfully Stored Request And Send Email!");
    }

		return redirect()->back();

	}
    public function upload_quotation_info(Request $request)
	{
		// dd($request->all());
		if ($request->hasfile('quo_file_path')) {

			$photo = $request->file('quo_file_path');
			$name = $photo->getClientOriginalName();
			$photo->move(public_path() . '/image/', $name);
			$photo = $name;
		}
		// dd($photo);
        $bom_supplier = BomSupplier::find($request->bom_supplier_id);
        $bom_supplier->quotation_reply_date = $request->quodate;
        $bom_supplier->save();
		$bom_supplier_quo = BomSupplierQuotation::create([
			'bom_supplier_id' => $request->bom_supplier_id,
			'supplier_quotation_number' => $request->quo_no,
            'quotation_date' => $request->quodate,
			'quotation_file_name' => $request->quo_file_name,
			'quotation_file_description' => $request->quo_description,
			'quotation_file_path' => $photo,
		]);
		alert()->success('Successfully Uploaded Quotation Information !');
		return redirect()->back();

	}
    public function upload_invoice_info(Request $request)
	{
		// dd($request->all());
		if ($request->hasfile('invoice_file_path')) {

			$photo = $request->file('invoice_file_path');
			$name = $photo->getClientOriginalName();
			$photo->move(public_path() . '/image/', $name);
			$photo = $name;
		}
        $bomsupplier = BomSupplier::find($request->bom_supplier_id);
        $bomsupplier->invoice_received_date = $request->invdate;
        $bomsupplier->save();
		$bom_supplier_invoice = BomSupplierInvoice::create([
			'bom_supplier_id' => $request->bom_supplier_id,
            'invoice_date' => $request->invdate,
			'supplier_invoice_number' => $request->invoice_no,
			'invoice_file_name' => $request->invoice_file_name,
			'invoice_file_description' => $request->invoice_description,
			'invoice_file_path' => $photo,
		]);
		alert()->success('Successfully Uploaded Invoice Information !');
		return redirect()->back();
	}
    public function show_supplier_po_form(Request $request)
	{
		// dd($request->all());
		$bom_supplier = BomSupplier::find($request->bom_supplier_id);
		$bom_sup_product = BomSupplierProduct::where('bom_supplier_id',$bom_supplier->id)->with('product')->get();
        $products = Product::all();
        $items = Item::all();
        // dd($bom_supplier->supplier_id);
        $bom_purchase_order = BomSupplierPurchaseOrder::where('bom_supplier_id',$request->bom_supplier_id)->first();
        // dd($bom_purchase_order);
        if($bom_purchase_order != null)
        {
        $bom_po_product = BomSupplierPoProduct::where('bom_po_id',$bom_purchase_order->id)->get();
        return view('Supplier.bom_supplier_po',compact('bom_purchase_order','bom_po_product','bom_supplier','items','products','bom_supplier','bom_sup_product'));
        }
        // dd($bom_po_product);
		return view('Supplier.bom_supplier_po',compact('bom_purchase_order','bom_supplier','items','products','bom_supplier','bom_sup_product'));
	}
    public function reshow_bom_supplier_list($bom_id)
	{
		// dd($bom_id);
		$bayofmat = BillOfMaterial::find($bom_id);
		$bom_product = BomProductLists::where('bom_id',$bayofmat->id)->get();
		$bom_supplier = BomSupplier::all();
		$bom_supplier_pro =BomSupplierProduct::all();

		return view('Supplier.bom_supplier_list',compact('bayofmat','bom_product','bom_supplier','bom_supplier_pro'));
	}
    public function store_bom_po(Request $request)
    {
            // dd($request->all());
            $bomsupplier = BomSupplier::find($request->bom_supplier_id);
            $bomsupplier->po_sent_date = $request->podate;
            $bomsupplier->save();
            if($request->bom_po_id == null)
            {
                // dd("no ok");
            $bomsup_item = $request->product_id;
            $bomsupPO = BomSupplierPurchaseOrder::create([
                'bom_supplier_id' => $request->bom_supplier_id,
                'supplier_po_no' => $request->po_no,
                'po_email_title' => $request->po_title,
                'po_email_description' => $request->po_desc,
                'po_email_filepath' => $request->attach_file,
                'po_date' => $request->podate,
                'po_total_qty' => $request->totalqty,
                'po_total_price' => $request->totalPrice,
                'status' => 0,
            ]);
            for($i=0;$i<count($bomsup_item);$i++)
		    {
                $bom_supplier_product = BomSupplierPoProduct::create([
                    'bom_po_id' => $bomsupPO->id,
                    'product_id' => $bomsup_item[$i],
                    'order_qty' => $request->qty[$i],
                    'order_price' => $request->price[$i],
                    'required_specification' => $request->spec[$i],
                ]);
		    }

            alert()->success("Successfully Ordered !");
        }
        else
        {
            // dd("ok");
            $update_product  = BomSupplierPurchaseOrder::find($request->bom_po_id);
            $update_product->supplier_po_no = $request->po_no;
            $update_product->po_email_title = $request->po_title;
            $update_product->po_email_description = $request->po_desc;
            $update_product->po_email_filepath = $request->attach_file;
            $update_product->po_date = $request->podate;
            $update_product->po_total_qty = $request->totalqty;
            $update_product->po_total_price = $request->totalPrice;
            $update_product->status  = 0;
            $update_product->save();
            $bomsup_item = $request->bompoproduct_id;
            for($i=0;$i<count($bomsup_item);$i++)
		    {
                $bom_supplier_product = BomSupplierPoProduct::where('id',$bomsup_item[$i])->update([
                    'order_qty' => $request->qty[$i],
                    'order_price' => $request->price[$i],
                    'required_specification' => $request->spec[$i],
                ]);
		    }
            alert()->success("Successfully Order Updated !");
        }
           return back();
    }
    public function RegionalWarehouse(Request $request){

        // $employees = Employee::all();

        $projects = SaleProject::all();

        $regional_warehouses = RegionalWarehouse::all();
        // dd("jjj");
        return view('Warehouse.regional_warehouse',compact('regional_warehouses','projects'));

    }
    public function create_regional_ware()
    {
        $projects = SaleProject::all();
        return view('Warehouse.add_regional_warehouse',compact('projects'));
    }
    public function store_regional_ware(Request $request)
    {

        // dd($request->all());
        // $validator = Validator::make($request->all(), [
        //     'warehouse_name' => 'required',
        //     'region' => 'required',
        //     'country' => 'required',
        //     'location_address' => 'required',
        // ]);

        // if ($validator->fails()) {
        //     return redirect('RegionalWarehouse')
        //                 ->withErrors($validator)
        //                 ->withInput();
        // }

        if ($request->hasfile('photo')) {

			$photo = $request->file('photo');
			$name = $photo->getClientOriginalName();
			$photo->move(public_path() . '/image/', $name);
			$photo = $name;
		}

		$projectID = json_encode($request->proj);

		$user = User::create([
			'name' => $request->ware_name,
			'email' => $request->email,
			'password' => \Hash::make($request->password),
			'remember' => 1,
			// 'work_site_id' => 2,
			// 'work_site_id' => $projectID,


		]);

        $employee = Employee::create([
			'name' => $request->ware_name,
			'address' => $request->address,
			// 'phone' => $request->phone,
			'photo' => $photo,
			// 'employed_date' => $request->employed_date,
			// 'salary' => $request->salary,
			'user_id' => $user->id,
			'role' => 7,
		]);

        $user->assignRole(7);
		// dd("hello");
		$employee_code = "EPY" . sprintf("%04s", $employee->id);
		$employee->employee_code = $employee_code;
		$employee->save();

        $regional_warehouse = RegionalWarehouse::create([
            'warehouse_name' => $request->ware_name,
            'region' => $request->region,
            'country' => $request->country,
            'location_address' => $request->address,
            'area' => $request->area,
            'employee_id' => $employee->id,
            'photo' => $photo,
            'address' => $request->address,

        ]);
        // dd($regional_warehouse->id);
        $user->regional_id = $regional_warehouse->id;
        $user->save();
        // dd($request->proj);
        foreach($request->proj as $project){
            // dd($project);
            DB::table('regional_warehouse_sale_project')->insert([
                'regional_warehouse_id' => $regional_warehouse->id,
                'saleproject_id' => $project,

            ]);
        }
        alert()->success("Successfully Store RegionalWarehouse");
        return redirect()->route('RegionalWarehouse');
    }
    public function checkInventory(Request $request, $regional_id) {
        // dd($regional_id);
        $regional = RegionalWarehouse::find($regional_id);
        $items = item::where('warehouse_type',2)->where('warehouse_id',$regional_id)->get();
        $products = Product::all();
        $products_arr = [];
        foreach($items as $item)
        {
            foreach($products as $product)
            {
                if($product->id == $item->product_id)
                {
                    array_push($products_arr,$product);
                }
            }
        }
        $productt = array_unique($products_arr);
        // dd($products);
        return view('Warehouse.check_inventory_list',compact('productt','regional','items','products'));
    }
    public function send_bomsup_pro(Request $request)
    {
        dd($request->all());
        $mail_address = Supplier::find($request->sup_id)->email;
        // dd($mail_address);
        $bom_sup_pro = BomProductLists::where('bom_id',$request->bom_id)->with('product')->get();
        // dd($bom_sup_pro);
        $add = 'kokoshine3499@gmail.com';
        $details = [
            'title' => $request->title,
            'body' => $request->desc,
            'data' => $bom_sup_pro
        ];

        \Mail::to('kokoshine3499@gmail.com')->send(new \App\Mail\BomSupplierProductMail($details));

        dd("Email is Sent.");
    }
    function show_grn_list(Request $request)
    {
        // dd($request->bom_supplier_id);
        $bom_supplier_po = BomSupplierPurchaseOrder::where('bom_supplier_id',$request->bom_supplier_id)->with('bomsupplier')->first();
        // dd($bom_supplier_po->bomsupplier->request_no);
        $good_receive_note = GoodReceiveNote::where('bom_po_id',$bom_supplier_po->id)->get();
        // dd($good_receive_note);
        return view('Supplier.good_receive_note_list',compact('bom_supplier_po','good_receive_note'));
    }
    function add_grn_bom($bom_po_id)
    {
        // dd($bom_po_id);
        $bom_po = BomSupplierPurchaseOrder::find($bom_po_id);
        $bom_po_product = BomSupplierPoProduct::where('bom_po_id',$bom_po->id)->get();
        $regionalname = RegionalWarehouse::all();
        $projects = SaleProject::all();
        return view('Supplier.add_good_receive_note',compact('projects','regionalname','bom_po','bom_po_product'));
    }
    public function store_grn_bom(Request $request)
    {
        // dd($request->all());
        $product_item = json_decode($request->grnitem);
        if($request->warehouse_flag == 2)
        {
            $phase_id = null;
            $work_site_id = null;
            $pj_name = null;
            $regional_id = $request->regional_id;
        }
        elseif($request->warehouse_flag == 1)
        {
            $phase_id = null;
            $work_site_id = null;
            $pj_name = null;
            $regional_id = null;
        }

            $store_grn = GoodReceiveNote::create([
                'grn_no' => $request->grn_no,
                'bom_po_id' => $request->bom_po_id,
                'date' => $request->date,
                'type' => $request->type,
                'warehouse_flag' => $request->warehouse_flag,
                'project_phase_id' => $phase_id,
                'work_site_id' => $work_site_id,
                'total_qty' => 10,
                'project_name' => $request->pj_name,
            ]);
            if($request->warehouse_flag == 2)
            {
                DB::table('good_receive_note_regional_warehouse')->insert([
                    'good_receive_note_id' => $store_grn->id,
                    'regional_warehouse_id' => $request->regional_id,
                ]);
            }
            foreach($product_item as $pro)
            {
                // $product = Product::find($pro->product_id);

                $item = Item::create([
                    'product_id' => $pro->product_id,
                    'serial_number' => $pro->serial_no,
                    'size' => $pro->size,
                    'color' => $pro->color,
                    'dimension' => $pro->dim,
                    'hs_code' => $pro->hs,
                    'other_specification' => $pro->spec,
                    'unit_purchase_price' => $pro->unit_price,
                    'purchase_date' => $pro->date,
                    'stock_qty' => $pro->qty,
                    'warehouse_type' => $request->warehouse_flag,
                    'warehouse_id' => $regional_id
                ]);
                // dd("item");
                $grn_product = GoodReceiveNoteProduct::create([
                    'grn_id' => $store_grn->id,
                    'qty' => 1,
                    'product_id' => $pro->product_id,
                ]);
                $grn_item = GoodReceiveNoteItem::create([
                    'grn_id' => $store_grn->id,
                    'grn_product_id' => $grn_product->id,
                    'qty' => 1,
                    'item_id' => $item->id,
                ]);
            }
            alert()->success("Successfully Store Good Receive Note!!");
            return back();


    }


    public function stock_check(Request $request){
        $product_ids = $request->$product_ids;
        $available_items = Item::whereIn('product_id',$product_ids)->where('in_stock_flag',1)->where('reserve_flag',0);
        return response()->json([
            'available_items' => $available_items,
        ]);
    }

    public function get_all_products(Request $request)
    {
        $brand_arr = [];
        $bom_product = BomProductLists::where('bom_id',$request->bom_id)->with('product')->get();
        foreach($bom_product as $bp)
        {
            // dd($bp->product->brand->name);
            array_push($brand_arr,$bp->product->brand->name);
        }
        // dd($brand_arr);
        return response()->json([

            'bom_product' => $bom_product,
            'brand' => $brand_arr,
        ]);
    }
    function update_bom_supplier_request($bsup_id)
    {
        // dd($bsup_id);
        $bom_supplier = BomSupplier::find($bsup_id);
        $bom_supplier_product = BomSupplierProduct::where('bom_supplier_id',$bom_supplier->id)->get();
        $bom_supplier_arr = [];
		$bom_sup = BillOfMaterial::find($bom_supplier->bom_id);
		$bom_product = BomProductLists::where('bom_id',$bom_supplier->bom_id)->with('product')->get();

		foreach($bom_product as $bomsup)
		{
			$supplier = Supplier::find($bomsup->selected_supplier_id);
			array_push($bom_supplier_arr,$supplier);
		}
        return view('Supplier.update_bom_supplier_req',compact('bom_supplier_arr','bom_supplier','bom_supplier_product'));
    }
    public function update_bom_supplier_page(Request $request)
    {
        // dd($request->all());
        $update_bom_supplier = BomSupplier::find($request->bom_supplier_id);
        $update_bom_supplier->request_no = $request->request_no;
        $update_bom_supplier->supplier_id = $request->supplier_id;
        $update_bom_supplier->request_quotation_date = $request->reply_date;
        $update_bom_supplier->rfq_email_title = $request->title;
        $update_bom_supplier->rfq_email_description = $request->description;
        $update_bom_supplier->save();
        for($i=0;$i<count($request->product_id);$i++)
		{
			$update_bom_sup_pro = BomSupplierProduct::where('bom_supplier_id',$request->bom_supplier_id)->where('product_id',$request->product_id[$i])->first();
            $update_bom_sup_pro->requested_qty = $request->qty[$i];
            $update_bom_sup_pro->requested_price = $request->price[$i];
            $update_bom_sup_pro->requested_specs = $request->spec[$i];
            $update_bom_sup_pro->save();


		}
        alert()->success("Successfully Updated !!");
        return back();


    }
    public function show_material_request_list_page(Request $request)
    {
        $material_requests = MaterialRequest::all();
        $mr_product = MaterialRequestLists::all();
        $products = Product::all();
        $items = Item::all();
        return view('MaterialRequest.material_request_list',compact('material_requests','mr_product','products','items'));
    }
    public function show_sale_order_list_page()
    {
        $sale_orders = SaleOrder::all();
        $sale_order_lists = SaleOrderLists::all();
        return view('SaleOrder.sale_order_list',compact('sale_orders','sale_order_lists'));
    }



}
