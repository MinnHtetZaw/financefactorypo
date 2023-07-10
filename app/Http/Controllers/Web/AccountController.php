<?php

namespace App\Http\Controllers\Web;

use App\Bank;
use App\Expense;
use App\Currency;
use App\Incoming;
use App\Accounting;
use App\SubHeading;
use App\HeadingType;
use App\Transaction;
use App\AccountingType;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    //
    public function getAccountType()
    {
        $accounttypes = AccountingType::all();

        return view('Admin.account_type',compact('accounttypes'));
    }

    public function storeAccountType(Request $request)
    {
        $accounttype = new AccountingType();

        $accounttype->type_name=$request->account_type_name;
        $accounttype->description=$request->account_type_description;

        $accounttype->save();


        return back();
    }

    public function updateAccountType(Request $request,$id)
    {
        $accounttype = AccountingType::find($id);

        $accounttype->type_name=$request->account_type_name;
        $accounttype->description=$request->account_type_description;
        $accounttype->save();

        return back();
    }

    public function getHeading()
    {
        $accounttypes = AccountingType::all();

        $headings = HeadingType::all();


        return view('Admin.heading_type',compact('headings','accounttypes'));
    }

    public function storeHeading(Request $request)
    {
        $heading = new HeadingType();

        $heading->code=$request->code;
        $heading->type_name=$request->heading_name;
        $heading->accounting_type_id=$request->accounting_type_id;
        $heading->save();


        return back();
    }

    public function updateHeading(Request $request,$id)
    {
        $heading = HeadingType::find($id);

        $heading->code=$request->code;
        $heading->type_name=$request->heading_name;
        $heading->accounting_type_id=$request->accounting_type_id;
        $heading->save();

        return back();
    }


    public function getSubHeading()
    {
        $accounttypes = AccountingType::all();
        $subheadings = SubHeading::all();
        $headings = HeadingType::all();

        return view('Admin.sub_heading_list',compact('subheadings','headings','accounttypes'));

    }

    public function storeSubHeading(Request $request)
    {
        $subheading = new SubHeading();
        $subheading->code=$request->code;
        $subheading->name=$request->subheading_name;
        $subheading->heading_id=$request->heading_id;

        $subheading->save();

        return back();
    }

    public function updateSubHeading(Request $request,$id)
    {
        $subheading = SubHeading::find($id);

        $subheading->code=$request->code;
        $subheading->heading_id=$request->heading_id;
        $subheading->name=$request->subheading_name;
        $subheading->save();

        return back();
    }

    public function searchHeading(Request $request)
    {

        $heading = HeadingType::where('accounting_type_id',$request->accouting_type_id)->get();

        return response()->json($heading);
    }

    public function searchSubHeading(Request $request)
    {
        $subheading = SubHeading::where('heading_id',$request->heading_id)->get();

        return response()->json($subheading);
    }

    public function ShowAccountList(Request $request) {

            $account = Accounting::all();
            $subheadings = SubHeading::all();
            $headings= HeadingType::all();
            $account_type = AccountingType::all();
            $currency  = Currency::all();

             return view('Admin.account_list',compact('currency','account','account_type','subheadings','headings'));
        }

    public function storeAccounting(Request $request)
    {

            Accounting::create([
            'account_code' => $request->acc_code,
            'account_name' => $request->acc_name,
            'subheading_id' => $request->subheading_id,
            'currency_id' =>$request->currency,
            'balance' => $request->balance,
            'nature'=> $request->nature
           ]);

        return back();
   }
   public function update_accounting(Request $request,$id){

    $update = Accounting::find($id);

    $update->account_code = $request->acc_code;
    $update->account_name = $request->acc_name;
    $update->subheading_id = $request->subheading_id;
    $update->currency_id = $request->currency;
    $update->balance = $request->balance;
    $update->nature = $request->nature;
    $update->save();

        return back();
}

   protected function incoming()
   {
       $incoming_tran = Transaction::where('incoming_flag',1)->get();

       $bank_cash_tran = Transaction::where('incoming_flag',2)->get();

        $cash_account = Accounting::where('subheading_id',7)->get();
        $bank_account = Accounting::where('subheading_id',19)->get();

        $inc_account = Accounting::where('subheading_id',6)->get();

       $currency = Currency::all();

       return view('Admin.incoming',compact('currency','bank_account','cash_account','inc_account','incoming_tran','bank_cash_tran'));
   }

   protected function expense()
   {

       $expense_tran = Transaction::where('expense_flag',1)->get();

       $bank_cash_tran = Transaction::where('expense_flag',2)->get();

        $bank_account = Accounting::where('subheading_id',19)->get();
        $cash_account = Accounting::where('subheading_id',7)->get();

        $subheading = SubHeading::where('heading_id',7)->pluck('id');

        $exp_account = Accounting::wherein('subheading_id',$subheading)->get();

        $currency = Currency::all();

       return view('Admin.expense',compact('currency','bank_account','expense_tran','bank_cash_tran','exp_account','cash_account'));
   }

   public function expenseDelete($id)
   {
    $trans = Transaction::find($id);
    Expense::destroy($trans->expense_id);
    Transaction::destroy($id);
    return back();
   }

   public function incomingDelete($id)
   {
    $trans = Transaction::find($id);
    Incoming::destroy($trans->incoming_id);
    Transaction::destroy($id);
    return back();
   }

   protected function bank_list()
   {
       $account = Accounting::all();
       $banks = Bank::all();
       $currency = Currency::all();
       $trans = Transaction::where('type_flag',2)->get();

       return view('Admin.bank_list',compact('account','banks','trans','currency'));
   }

   protected function store_bank(Request $request)
    {

        $acc = Accounting::create([
            'account_code' =>$request->acc_code,
            'account_name' => $request->acc_name,
            'subheading_id' =>19,
            'balance' => $request->current_balance,
            'currency_id'=>4
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

    public function getTransactionList()
    {
        $transaction = Transaction::all();

        return view('Admin.transaction_list',compact('transaction'));
    }

    public function ajaxTransactionFilter(Request $request){


        $from = $request->from;
        $to = $request->to;

        $date_filter = Transaction::whereBetween('date',[$from,$to])->with('accounting')->get();

        return response()->json([
            'date_filter' => $date_filter
       ]);
    }
}
