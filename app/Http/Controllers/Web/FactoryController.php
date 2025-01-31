<?php

namespace App\Http\Controllers\Web;

use App\Bank;
use App\Cash;
use DateTime;
use App\Expense;
use App\Category;
use App\Currency;
use App\Purchase;
use App\Supplier;
use App\FactoryPo;
use App\Accounting;
use App\SubHeading;
use App\FactoryItem;
use App\SaleProject;
use App\SubCategory;
use App\Transaction;
use App\FactroyFabricDate;
use App\SupplierCreditList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class FactoryController extends Controller
{

    protected function factoryitem_list()
	{
        $item_lists =  FactoryItem::all();

		$categories =  Category::all();
		$sub_categories = SubCategory::all();

		return view('Inventory.factoryitem_list', compact('item_lists','categories','sub_categories'));
	}

    protected function showSubCategory(request $request){

	    $category_id = $request->category_id;

	    $subcategory = SubCategory::where('category_id', $category_id)->get();

	    return response()->json($subcategory);
	}

    protected function storeFactoryItem(Request $request)
	{

		$validator = Validator::make($request->all(), [
            'item_code' => 'required',
            'item_name' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'purchase_price' => 'required',
            'instock_qty' => 'required',
        ]);

        if ($validator->fails()) {

        	alert()->error('Validation Error!');

            return redirect()->back();
        }

        try {

            $item = FactoryItem::create([
                'item_code' => $request->item_code,
                'item_name' => $request->item_name,
                'category_id' => $request->category_id,
                'subcategory_id' => $request->sub_category_id,
                'purchase_price' => $request->purchase_price,
                'instock_qty' => $request->instock_qty
            ]);

        } catch (\Exception $e) {

            alert()->error('Something Wrong! When Creating Item.');

            return redirect()->back();
        }

        alert()->success('Successfully Added');

        return redirect()->route('factoryitem_list');
	}

    protected function newcreate_itemrequest(Request $request){


        $categories = Category::all();
        $sub_categories = SubCategory::all();
        $items = FactoryItem::all();



        $date = new DateTime('Asia/Yangon');

        $today_date = strtotime($date->format('d-m-Y H:i'));



        $last_po = FactoryPo::all()->last();

        if($last_po != null){
            $po_code =  "FPR-" .date('y') . sprintf("%02s", (intval(date('m')))) .sprintf("%02s", ($last_po->id + 1));
        }else{
            $po_code =  "FPR-" .date('y') . sprintf("%02s", (intval(date('m')))) .sprintf("%02s", 1);
        }

    	return view('Admin.newcreate_itemrequest',compact('po_code','items','categories','today_date','sub_categories'));
    }

    public function itemSearch(Request $request){
        $category_id = $request->category_id;
        $subcategory_id = $request->subcategory_id;
        ini_set('max_execution_time',300);

        $items = FactoryItem::where("category_id",$category_id)->where("subcategory_id",$subcategory_id)->get();

        return response()->json($items);
    }

    public function subcategorySearch(Request $request){

        $category_id = $request->category_id;
        $subCategories = SubCategory::where('category_id',$category_id)->get();
        return response()->json($subCategories);

    }

    protected function storePurchaseOrder(Request $request){



        $now = new DateTime;
        $today = strtotime($now->format('d-m-Y'));

        $items = json_decode($_POST['item']);

        $grand = json_decode($_POST['grand_total']);

        $po_type = $_POST['po_type'];

        if($po_type == 9){


        $total_rolls = $grand->total_rolls;

        $total_yards = $grand->total_yards;

        $total_quantity = $grand->total_yards;

        }else if($po_type == 10){


            $total_rolls = 0;

        $total_yards = 0;

        $total_quantity = $grand->total_qty;
        }

        $total_amount = $grand->sub_total;

        $po_number = $_POST['po_number'];

        $po_format_date = date('Y-m-d', strtotime($_POST['po_date']));

        $receive_format_date = date('Y-m-d', strtotime($_POST['receive_date']));

        $requested_by = $_POST['requested_by'];
         $approved_by = $_POST['approved_by'];
         $file_path = '';

         if(isset($_FILES['file']['name'])){

              $filename = $_FILES['file']['name'];


              $location = public_path() . '/files/attachments/' . $filename;
              if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
                  $file_path = '/files/attachments/' . $filename;
              }

         }else{
             $file_path = "defaultfile.pdf";
         }

        try {

             $factoryPO = FactoryPo::create([
                'po_number' => $po_number,
                'po_date' => $po_format_date,
                'po_type' => $po_type,
                'receive_date' => $receive_format_date,
                'total_rolls'=> $total_rolls,
                'total_yards'=> $total_yards,
                'total_quantity' => $total_quantity,
                'total_price'=> $total_amount,
                'status' => 0,
                'requested_by' => $requested_by,
                'approved_by'=> $approved_by,
                'attach_file_path' => $file_path,
            ]);

            foreach ($items as $item) {
                if($po_type == 9){
                    $rolls = $item->rolls;

        $yards_per_roll = $item->yards_per_roll;

        $sub_yards = $item->sub_yards;

        $order_qty = $item->sub_yards;
                }else if($po_type == 10){
                    $rolls = 0;

        $yards_per_roll = 0;

        $sub_yards = 0;

        $order_qty = $item->order_qty;
                }
            $factoryPO->factory_items()->attach($item->id, ['purchase_price' => $item->purchase_price,'rolls' => $rolls,'yards_per_roll' => $yards_per_roll,'sub_yards' => $sub_yards,'order_qty' => $order_qty,'remark'=> $item->remark]);
            }

            return response()->json($factoryPO);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Something Wrong! When Store Purchase Order'], 404);

        }

    }

    protected function getFactoryPOPage(){

    	$po_lists = FactoryPO::all();

    	return view('Itemrequest.porequestlist', compact('po_lists'));
    }

    protected function changePOStatus(Request $request){
        $validator = Validator::make($request->all(), [
            'po_id' => 'required',
        ]);

        if ($validator->fails()) {

            alert()->error('Something Wrong! Validation Error!');

            return redirect()->back();
        }

    	try {

        	$factory_po = FactoryPo::findOrFail($request->po_id);

   		} catch (\Exception $e) {

        	alert()->error("PO Not Found!")->persistent("Close!");
            return redirect()->back();
    	}

        if ($factory_po->status == 0 ) {

                $factory_po->status = 1;
                $factory_po->save();

                foreach($factory_po->factory_items as $factory_item){
                    $factory_item->instock_qty -= $factory_item->pivot->quantity;
                    $factory_item->reserved_qty -= $factory_item->pivot->quantity;
                    $factory_item->save();
                }
                return response()->json(1);
        }
    }

    protected function getPoDetails($id){
        try{
            $PO = FactoryPo::findOrFail($id);
        }catch(\Exception $e){
            alert()->error("PO Not Found!")->persistent("Close!");
            return redirect()->back;
        }
        return view('Itemrequest.po_details',compact('PO'));
    }

    protected function createPurchaseHistory(){

        $supplier = Supplier::all();

         $last_voucher = Purchase::all()->last();
        if($last_voucher != null){
            $purchase_number =  "PRN-" .date('y') . sprintf("%02s", (intval(date('m')) + 1)) . sprintf("%02s", ($last_voucher->id+ 1));
        }else{
            $purchase_number =  "PRN-" .date('y') . sprintf("%02s", (intval(date('m')) + 1)) .sprintf("%02s", 1);
        }

        return view('Purchase.create_purchase', compact('supplier','purchase_number'));
    }

    public function show_supplier_credit_lists()
    {

        $supplier_credit_list = Supplier::all();
        return view('Supplier.supplier_credit_list',compact('supplier_credit_list'));
    }

    public function store_supplier(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone_number' => 'required',
        ]);

        $suppliers = Supplier::create([
             'name' => $request->name,
             'phone_number' => $request->phone_number,
        ]);

    alert()->success('successfully stored Supplier Data');
    return back();
}

protected function storePurchaseHistory(Request $request){
    $validator = Validator::make($request->all(), [
        'purchase_number' => 'required',
        'purchase_date' => 'required',
        'purchase_remark' => 'required',
        'supp_name' => 'required',
        'unit' => 'required',
        'price' => 'required',
        'qty' => 'required',
        'sub_total'=>'required',
        'adjustment'=>'required',
    ]);

    if ($validator->fails()) {

        alert()->error("Something Wrong! Validation Error");

        return redirect()->back();
    }

    $user_code = $request->session()->get('user')->id;

    $unit = $request->unit;

    $price = $request->price;

    $qty = $request->qty;

    $total_qty = 0;

    $total_price = 0;

    $psub_total = 0;


    for($count = 0; $count < count($unit); $count++){
        $psub_total = $price[$count] * $qty[$count];
        $total_price += $psub_total;
    }

    foreach ($qty as $q) {

        $total_qty += $q;
    }
    $supplier = Supplier::find($request->supp_name);

    if($request->pay_method == 1)
    {

    $supplier->credit_amount +=  $request->credit_amount;
    $supplier->save();
    }
    try {

        $purchase = Purchase::create([
            'purchase_number' => $request->purchase_number,
            'supplier_name' => $supplier->name,
            'supplier_id' => $request->supp_name,
            'total_quantity' => $total_qty,
            'total_price' => $total_price,
            'purchase_date' => $request->purchase_date,
            'purchase_remark' => $request->purchase_remark,
            'type_flag' => $request->adjustment,
            'purchase_by' => $user_code,
            'credit_amount' => $request->credit_amount,
        ]);

        if($request->pay_method == 1)
        {

            $supplier_credit = SupplierCreditList::create([
                'supplier_id' => $request->supp_name,
                'purchase_id' => $purchase->id,
                'credit_amount' => $request->credit_amount,
                'repay_date' => $request->repay_date,
            ]);
        }

        for($count = 0; $count < count($unit); $count++){

                if($request->adjustment == 2){
                    $purchase->factory_item()->attach($unit[$count], ['quantity' => $qty[$count], 'price' => $price[$count],'remaining_amount'=>0,'arrive_complete' => 1 ]);

                    $factory_item = FactoryItem::find($unit[$count]);

                    $balance_qty = ($factory_item->instock_qty + $qty[$count]);

                    $factory_item->instock_qty = $balance_qty;

                    $factory_item->save();
                }
                elseif($request->adjustment == 1){
                    $purchase->factory_item()->attach($unit[$count], ['quantity' => $qty[$count], 'price' => $price[$count],'remaining_amount'=>$qty[$count]]);

                }

        }

    } catch (\Exception $e) {

        alert()->error('Something Wrong! When Purchase Store.');

        return redirect()->back();
    }

    alert()->success("Success");

    return redirect()->route('purchase_list');
}

protected function getPurchaseHistory(Request $request){

    $purchase_lists = Purchase::all();
    $subheading = SubHeading::where('heading_id',7)->pluck('id');

    $exp_account = Accounting::wherein('subheading_id',$subheading)->get();

    // $expense_tran = Transaction::where('expense_flag',1)->get();
     $bank_account = Accounting::where('subheading_id',19)->get();
     $cash_account = Accounting::where('subheading_id',7)->get();

     $bank_cash_tran = Transaction::get();

     $currency = Currency::all();

    return view('Purchase.purchase_lists', compact('bank_cash_tran','purchase_lists','currency','bank_account','exp_account','cash_account'));
}

protected function getPurchaseHistoryDetails($id){

    try {

        $purchase = Purchase::findOrFail($id);
        $factoryitemdate = FactroyFabricDate::where('purchase_id',$purchase->id)->get();



    } catch (\Exception $e) {

        alert()->error('Something Wrong! Purchase Cannot be Found.');

        return redirect()->back();
    }
    // dd($purchase->factory_item->toArray());
    return view('Purchase.purchase_details', compact('purchase','factoryitemdate'));

}


protected function saveArriveFactory(Request $request){

    $arrive_format_date = date('Y-m-d', strtotime($request->arrive_date));
    $items = json_decode($request->arrivedItems);
    $purchase = Purchase::find($request->purchase_id);

    try{

        foreach($items as $item){

         $factoryitem = FactoryItem::find($item->id);

            if($item->id == $factoryitem->id){

                $factoryitem->instock_qty += $item->arrive_qty;
                $factoryitem->save();
            }

            $factory_fabric_save_date = new FactroyFabricDate();
            $factory_fabric_save_date->purchase_id = $request->purchase_id;
            $factory_fabric_save_date->factory_item_id = $item->id;
            $factory_fabric_save_date->arrive_quantity = $item->arrive_qty;
            $factory_fabric_save_date->remark =$request->arrive_remark;
            $factory_fabric_save_date->arrive_date = $arrive_format_date;
            $factory_fabric_save_date->save();


            foreach ($purchase->factory_item as $unit) {
                if ($unit->pivot->factory_item_id == $item->id) {
                    $unit->pivot->remaining_amount -= $item->arrive_qty;

                    $unit->pivot->arrive_quantity += $item->arrive_qty;

                    if ($unit->pivot->remaining_amount == 0) {
                        $status = 1;
                    } else {
                        $status = 0;
                    }
            $purchase->factory_item()->updateExistingPivot($item->id,['remaining_amount' => $unit->pivot->remaining_amount,'arrive_quantity' =>  $unit->pivot->arrive_quantity,'arrive_complete' => $status]);
        }
    }
        }

    }catch (\Exception $e) {

        return response()->json([$e], 404);

    }

     return response()->json($items);
}

public function storeFactoryPoExpense(Request $request){


    $exp = Expense::create([
        'purchase_id' => $request->purchase_id,
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
        'purchase_id' => $request->purchase_id,
        'currency_id' => $request->currency,
        'all_flag'  =>4,
        'expense_id'=> $exp->id

     ]);

    if($request->bank_acc == null){
        $amt = Accounting::find($request->cash_acc);

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
        'purchase_id' =>$request->purchase_id,
        'currency_id' => $request->currency,
        'all_flag'  =>4,
        'expense_id'=> $exp->id
    ]);
    $tran1->related_transaction_id = $tran->id;
    $tran1->save();

    alert('Added Transaction Successfully!!');
  return redirect()->back();
}
protected function updatefactoryItem($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'item_code' => 'required',
            'item_name' => 'required',
        ]);

        if ($validator->fails()) {

            alert()->error('Something Wrong!');

            return redirect()->back();
        }

        try {

            $item = FactoryItem::findOrFail($id);

        } catch (\Exception $e) {

            alert()->error("Item Not Found!")->persistent("Close!");

            return redirect()->back();

        }

        $item->item_code = $request->item_code;

        $item->item_name = $request->item_name;

        $item->category_id = $request->category_id;

        $item->subcategory_id = $request->sub_category_id;

        $item->save();

        alert()->success('Successfully Updated!');

        return redirect()->back();
    }


    protected function exchangeRate(){

    }
}
