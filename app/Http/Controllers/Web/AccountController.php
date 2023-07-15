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
use App\Transfer;
use App\TransferTransaction;

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

    public function searchAccount(Request $request)
    {
        $accounts = Accounting::where('subheading_id',$request->subheading_id)->get();

        return response()->json($accounts);
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

   public function searchAccounting(Request $request)
   {
        $account =Accounting::where('account_name','like','%'.$request->search.'%')->get();
        $subheadings = SubHeading::all();
        $headings= HeadingType::all();
        $account_type = AccountingType::all();
        $currency  = Currency::all();

        return view('Admin.account_list',compact('currency','account','account_type','subheadings','headings'));
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

    public function TransferList()
    {
        $cash_accounts = Accounting::where('subheading_id',7)->get();
        $bank_accounts = Accounting::where('subheading_id',19)->get();
        $transfers = Transfer::with('fromAccount','toAccount','transactions')->get();

        return view('Admin.transfer_list',compact('transfers','cash_accounts','bank_accounts'));
    }
    public function storeTransfer(Request $request)
    {

        $from_acc = $request->from_bank_acc != null ? $request->from_bank_acc : $request->from_cash_acc;
        $to_acc = $request->to_bank_acc !=null ? $request->to_bank_acc : $request->to_cash_acc;

               $transfer= Transfer::create([
                    'from_account_id'=>$from_acc,
                    'to_account_id'=>$to_acc,
                    'amount'=> $request->amount,
                    'transfer_date'=>$request->date,
                    'remark'=>$request->remark
                ]);

                $fromAccount = Accounting::find($from_acc);
                $toAccount = Accounting::find($to_acc);


                if($request->from_account == 1 ) // Bank Type
                {
                    $bank_acc = Accounting::find($fromAccount->id);
                    $bank_acc->balance -= $request->amount;
                    $bank_acc->save();

                    $bank=Bank::where('account_id',$fromAccount->id)->first();
                    $bank->balance -= $request->amount;
                    $bank->save();

                    $from_current_amount =$bank_acc->balance;
                }
                else // Cash Type
                {
                    $cash = Accounting::find($fromAccount->id);
                    $cash->balance -= $request->amount;
                    $cash->save();

                    $from_current_amount =$cash->balance;
                }


                if($request->to_account == 1 ) // Bank Type
                {
                    $con_amt = $this->convertRate($toAccount,$fromAccount,$request->amount);

                    $bank_account = Accounting::find($toAccount->id);
                    $bank_account->balance += $con_amt;
                    $bank_account->save();

                    $bank=Bank::where('account_id',$toAccount->id)->first();
                    $bank->balance += $con_amt;
                    $bank->save();

                    $to_current_amount =$bank_account->balance;

                }
                else // Cash Type
                {
                    $con_amt = $this->convertRate($toAccount,$fromAccount,$request->amount);

                    $cash = Accounting::find($toAccount->id);
                    $cash->balance += $con_amt;
                    $cash->save();

                    $to_current_amount =$cash->balance;
                }

                TransferTransaction::create([
                    'account_id'=>$from_acc,
                    'transfer_id'=>$transfer->id,
                    'transaction_type'=> 2 , //Credit
                    'current_amount'=>$from_current_amount
                ]);

                TransferTransaction::create([
                    'account_id'=>$to_acc,
                    'transfer_id'=>$transfer->id,
                    'transaction_type'=> 1 , //debit
                    'current_amount'=>$to_current_amount
                ]);


                return back();

    }

    protected function convertRate($toAccount,$fromAccount,$amount)
    {
        $from = $fromAccount->currency_id;
        $to = $toAccount->currency_id;

        $usd_rate = Currency::find(5);
        $euro_rate = Currency::find(6);
        $sgp_rate = Currency::find(9);
        $jpn_rate = Currency::find(10);
        $chn_rate = Currency::find(11);
        $idn_rate = Currency::find(12);
        $mls_rate = Currency::find(13);
        $thai_rate = Currency::find(14);

        if($from == 4 && $to == 5){
            $con_amt = $amount / $usd_rate->exchange_rate;
        }
        else if($from == 4 && $to == 6){
            $con_amt = $amount / $euro_rate->exchange_rate;
        }
        else if($from == 4 && $to == 9){
            $con_amt = $amount / $sgp_rate->exchange_rate;
        }
        else if($from == 4 && $to == 10){
            $con_amt = $amount / $jpn_rate->exchange_rate;
        }
        else if($from == 4 && $to == 11){
            $con_amt = $amount / $chn_rate->exchange_rate;
        }
        else if($from == 4 && $to == 12){
            $con_amt = $amount / $idn_rate->exchange_rate;
        }
        else if($from == 4 && $to == 13){
            $con_amt = $amount / $mls_rate->exchange_rate;
        }
        else if($from == 4 && $to == 14){
            $con_amt = $amount / $thai_rate->exchange_rate;
        }
        else if($from == 5 && $to == 4){
            $con_amt = $amount * $usd_rate->exchange_rate;
        }
        else if($from == 6 && $to == 4){
            $con_amt = $amount * $euro_rate->exchange_rate;
        }
        else if($from == 9 && $to == 4){
            $con_amt = $amount * $sgp_rate->exchange_rate;
        }
        else if($from == 10 && $to == 4){
            $con_amt = $amount * $jpn_rate->exchange_rate;
        }
        else if($from == 11 && $to == 4){
            $con_amt = $amount * $chn_rate->exchange_rate;
        }
        else if($from == 12 && $to == 4){
            $con_amt = $amount * $idn_rate->exchange_rate;
        }
        else if($from == 13 && $to == 4){
            $con_amt = $amount * $mls_rate->exchange_rate;
        }
        else if($from == 14 && $to == 4){
            $con_amt = $amount * $thai_rate->exchange_rate;
        }
        else{
            $con_amt = $amount;
        }
        return $con_amt;
    }
}
