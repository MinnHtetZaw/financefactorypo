<?php

namespace App\Http\Controllers;

use App\Currency;
use App\Accounting;
use App\SubHeading;
use App\HeadingType;
use App\JournalEntry;
use App\AccountingType;
use Illuminate\Http\Request;

class JournalEntryController extends Controller
{
    //

    public function getEntryList()
    {
        $account = Accounting::all();
        $subheadings = SubHeading::all();
        $headings= HeadingType::all();

        $entries = JournalEntry::with('relatedEntry','relatedEntry.toAccount')->whereNull('related_entry_id')->get();
        // dd($entries->relatedEntry->toArray());
        return view("Admin.JournalEntry.journalentrylist",compact('entries','account','subheadings','headings'));
    }

    public function storeEntry(Request $request)
    {

        $fromAccount = Accounting::find($request->from_account_id);
        $toAccount = Accounting::find($request->to_account_id);

        $con_amt = $this->convertRate($toAccount,$fromAccount,$request->amount);

        //  same type => plus
        // different => minus

        // fromACcount
        if($fromAccount->nature == $request->from_type)
        {
            $fromAccount->balance +=$request->amount;
            $fromAccount->save();
        }
        else
        {
            $fromAccount->balance -=$request->amount;
            $fromAccount->save();
        }

        // toAccount
        if($toAccount->nature == $request->to_type)
        {
            $toAccount->balance +=$con_amt;
            $toAccount->save();
        }
        else
        {
            $toAccount->balance -=$con_amt;
            $toAccount->save();
        }


        $entry = JournalEntry::create([
            'from_account_id'=>$request->from_account_id,
            'type'=> $request->from_type,
            'amount'=>$request->amount,
            'entry_date'=>$request->date,
            'remark'=>$request->remark
        ]);

            JournalEntry::create([
                'related_entry_id'=>$entry->id,
                'to_account_id'=>$request->to_account_id,
                'type'=>$request->to_type,
                'entry_date'=>$request->date,
                'remark'=>$request->remark,

            ]);
            alert()->success('Journal Entry Succeed');
            return back();
    }

    public function editEntry($id)
    {
        $entry=JournalEntry::with('relatedEntry','toAccount','fromAccount','fromAccount.subheading.heading','relatedEntry.toAccount.subheading.heading')->find($id);
        $accounts = Accounting::all();
        $subheadings = SubHeading::all();
        $headings= HeadingType::all();


        return view('Admin.JournalEntry.journalentryupdate',compact('entry','accounts','subheadings','headings'));
    }

    public function updateEntry(Request $request,JournalEntry $entry)
    {

        $fromAccount = Accounting::find($request->from_account_id);
        $toAccount = Accounting::find($request->to_account_id);

        $entryFrom = Accounting::find($entry->from_account_id);
        $entryTo = Accounting::find($entry->relatedEntry->to_account_id);

        $return_con_amt = $this->convertRate($entryTo,$entryFrom,$entry->amount);
        $current_con_amt =$this->convertRate($toAccount,$fromAccount,$request->amount);

        //From Account Calculation

        if($request->from_account_id == $entry->from_account_id)
        {
            if($request->from_type != $entry->getRawOriginal('type'))
            {
                if($entry->getRawOriginal('type') ==  $entryFrom->nature)
                {
                     $entryFrom->balance -=$entry->amount;
                     $entryFrom->balance -=$request->amount;
                     $entryFrom->save();
                }
                else
                {
                    $entryFrom->balance +=$entry->amount;
                    $entryFrom->balance +=$request->amount;
                    $entryFrom->save();
                }

            }
        }
        else
        {
            // Return back to Original State
            if($entry->getRawOriginal('type') ==  $entryFrom->nature)
            {
                 $entryFrom->balance -=$entry->amount;
                 $entryFrom->save();
            }
            else
            {
                $entryFrom->balance +=$entry->amount;
                $entryFrom->save();
            }

            // Current New State
            if($fromAccount->nature == $request->from_type)
            {
                $fromAccount->balance +=$request->amount;
                $fromAccount ->save();
            }
            else
            {
                $fromAccount->balance -=$request->amount;
                $fromAccount->save();
            }
        }

        //To Account Calculation

        if($request->to_account_id == $entry->relatedEntry->to_account_id)
        {
            if($request->to_type != $entry->relatedEntry->getRawOriginal('type'))
            {
                if($entry->relatedEntry->getRawOriginal('type') ==  $entryTo->nature)
                {
                     $entryTo->balance -=$return_con_amt; // Default State before entry
                     $entryTo->balance -=$current_con_amt; // Current entry State
                     $entryTo->save();
                }
                else
                {

                    $entryTo->balance += $return_con_amt;
                    $entryTo->balance += $current_con_amt;
                    $entryTo->save();
                }

            }
        }
        else
        {
             // Return back to Original State
             if($entry->relatedEntry->getRawOriginal('type') ==  $entryTo->nature)
             {
                  $entryTo->balance -=$return_con_amt;
                  $entryTo->save();
             }
             else
             {
                 $entryTo->balance +=$return_con_amt;
                 $entryTo->save();
             }

            if($toAccount->nature == $request->to_type)
            {
                $toAccount->balance += $current_con_amt;
                $toAccount->save();
            }
            else
            {
                $toAccount->balance -= $current_con_amt;
                $toAccount->save();
            }
        }

        $entry->from_account_id = $request->from_account_id;
        $entry->type  = $request->from_type;
        $entry->amount = $request->amount;
        $entry->entry_date = $request->date;
        $entry->remark = $request->remark;
        $entry->save();


            $data=JournalEntry::where('related_entry_id',$entry->id)->first();
            $data->to_account_id = $request->to_account_id;
            $data->type = $request->to_type;
            $data->remark = $request->remark;
            $data->entry_date = $request->date;
            $data->save();


        alert()->success('Journal Entry Update Succeed!');
        return redirect()->route('journalEntry');

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
