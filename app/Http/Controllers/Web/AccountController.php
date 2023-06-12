<?php

namespace App\Http\Controllers\Web;

use App\HeadingType;
use App\AccountingType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SubHeading;

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

        $subheading->name=$request->subheading_name;
        $subheading->heading_id=$request->heading_id;

        $subheading->save();

        return back();
    }

    public function updateSubHeading(Request $request,$id)
    {
        $subheading = SubHeading::find($id);

        $subheading->heading_id=$request->heading_id;
        $subheading->name=$request->subheading_name;
        $subheading->save();

        return back();
    }
}
