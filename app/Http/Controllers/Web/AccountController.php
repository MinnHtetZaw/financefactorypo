<?php

namespace App\Http\Controllers\Web;

use App\Currency;
use App\Accounting;
use App\SubHeading;
use App\HeadingType;
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
            $account_type = AccountingType::all();
            $currency  = Currency::all();

             return view('Admin.account_list',compact('currency','account','account_type','subheadings'));
        }

    public function storeAccounting(Request $request)
    {

            Accounting::create([
            'account_code' => $request->acc_code,
            'account_name' => $request->acc_name,
            'subheading_id' => $request->subheading_id,
            'currency_id' =>$request->currency,
            'balance' => $request->balance,
           ]);

        return back();


    }
}
