<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Customer;
use App\Order;
use App\Employee;
use App\Voucher;
use App\CountingUnit;
use Datetime;

class OrderController extends Controller
{
    protected function getOrderPanel(){

    	return view('Order.order_panel');
    }

    protected function getOrderPage($type){

    	$order_lists = Order::where('status',$type)->get();

        $employee_lists = Employee::all();

    	return view('Order.order_page', compact('order_lists','type','employee_lists'));
    }

    protected function storeCustomerOrder(Request $request){

        $now = new DateTime;

        $today = strtotime($now->format('d-m-Y'));

        $validator = Validator::make($request->all(), [
            'address' => 'required',
            'phone' => 'required',
            'item' => 'required',
            'employee' => 'required',
            'order_date' => 'required|after_or_equal:today',
            'grand_total' => 'required',
            'customer_id' => 'required',
        ]);

        if ($validator->fails()) {          

            return response()->json(['error' => 'Something Wrong! Validation Error'], 404);
        }

        $user = session()->get('user');

        $items = json_decode($request->item);

        $grand = json_decode($request->grand_total);

        $total_quantity = $grand->total_qty;

        $total_amount = $grand->sub_total;

        $customer = Customer::find($request->customer_id);

        $order_format_date = date('Y-m-d', strtotime($request->order_date));

        $deli_format_date = date('Y-m-d H:i', strtotime($request->delivered_date));

        try {

             $order = Order::create([
                'address' => $request->address,
                'name' => $customer->user->name,
                'phone' => $request->phone,
                'total_quantity' => $total_quantity,
                'est_price' => $total_amount,
                'order_date' => $order_format_date,
                'delivered_date' => $deli_format_date,
                'customer_id' => $customer->id,
                'employee_id' => $request->employee,
                'status' => 4,                                      
            ]);

            $order->order_number = "ORD-".sprintf("%04s", $order->id);

            $order->save();

            foreach ($items as $item) {
            
                $order->counting_unit()->attach($item->id, ['quantity' => $item->order_qty]);

            }

            $voucher = Voucher::create([
                'sale_by' => $user->id,
                'total_price' =>  $total_amount,
                'total_quantity' => $total_quantity,
                'voucher_date' => $deli_format_date,
                'type' => 2,
                'status' => 0,
                'order_id' => $order->id,
                'sales_customer_id' => 0,
                'sales_customer_name' => "",
            ]);

            $voucher->voucher_code = "VOU-".date('dmY')."-".sprintf("%04s", $voucher->id);

            $voucher->save();

            foreach ($items as $unit) {
                
                $voucher->counting_unit()->attach($unit->id, ['quantity' =>  $unit->order_qty,'price' => $unit->selling_price]);

                $counting_unit = CountingUnit::find($unit->id);

                $balance_qty = ($counting_unit->current_quantity - $unit->order_qty);

                $counting_unit->current_quantity = $balance_qty;

                $counting_unit->save();

            }

            return response()->json($voucher);    

        } catch (\Exception $e) {
        
            return response()->json(['error' => 'Something Wrong! When Store Customer Order'], 404);

        }

    }

    protected function getOrderDetailsPage($id){

        try {
            
            $order = Order::findOrFail($id);

        } catch (\Exception $e) {

            alert()->error("Order Not Found!")->persistent("Close!");
            
            return redirect()->back();
        }
        
        return view('Order.order_details', compact('order'));
    }

    protected function changeOrderStatus(Request $request){

        $validator = Validator::make($request->all(), [
            'order_id' => 'required',
        ]);

        if ($validator->fails()) {

            alert()->error('Something Wrong! Validation Error!');

            return redirect()->back();
        }

        $user = session()->get('user');

    	try {
            
        	$order = Order::findOrFail($request->order_id);

   		} catch (\Exception $e) {
   		    
        	alert()->error("Order Not Found!")->persistent("Close!");
            
            return redirect()->back();
    	}

        if ($order->status == 1 ) {

            if (is_null($request->delivered_date)) {
                
                alert()->error("Something Wrong! Delivered Date Can't be Empty!")->persistent("Close!");

                return redirect()->back();
            }
            else{

                $order->status = 2;

                $order->delivered_date = $request->delivered_date;

                $order->save();

                alert()->success('Successfully Changed');

                return redirect()->back();

            }   

        }elseif ($order->status == 2 || $order->status == 3) {
            
            if (is_null($request->delivered_date) && is_null($request->employee)) {
                
                alert()->error("Something Wrong! Delivered Date and Delivery Person Can't be Empty!")->persistent("Close!");

                return redirect()->back();
            }
            else{

                $total = 0;

                $order->status = 4;

                $order->employee_id = $request->employee;

                $order->delivered_date = $request->delivered_date;

                $order->save();

                $customer = Customer::find($order->customer_id);

                if ($customer->customer_level == 1) {

                    foreach ($order->counting_unit as $unit) {

                        $total += ($unit->pivot->quantity * $unit->normal_sale_price);
                    }
                
                } 
                elseif ($customer->customer_level == 2) {
                    
                    foreach ($order->counting_unit as $unit) {

                        $total += ($unit->pivot->quantity * $unit->whole_sale_price);
                    }
                } 
                else {
                    
                    foreach ($order->counting_unit as $unit) {

                        $total += ($unit->pivot->quantity * $unit->order_price);
                    }
                }

                $voucher = Voucher::create([
                    'sale_by' => $user->id,
                    'total_price' =>  $total,
                    'total_quantity' => $order->total_quantity,
                    'voucher_date' => $request->delivered_date,
                    'type' => 2,
                    'status' => 0,
                    'order_id' => $order->id,
                ]);

                $voucher->voucher_code = "VOU-".date('dmY')."-".sprintf("%04s", $voucher->id);

                $voucher->save();


                 if ($customer->customer_level == 1) {

                    foreach ($order->counting_unit as $unit) {
                
                        $voucher->counting_unit()->attach($unit->id, ['quantity' => $unit->pivot->quantity,'price' => $unit->normal_sale_price]);

                        $counting_unit = CountingUnit::find($unit->id);

                        $balance_qty = ($counting_unit->current_quantity - $unit->pivot->quantity);

                        $counting_unit->current_quantity = $balance_qty;

                        $counting_unit->save();

                    }
                
                } 
                elseif ($customer->customer_level == 2) {
                    
                    foreach ($order->counting_unit as $unit) {
                
                        $voucher->counting_unit()->attach($unit->id, ['quantity' => $unit->pivot->quantity,'price' => $unit->whole_sale_price]);

                        $counting_unit = CountingUnit::find($unit->id);

                        $balance_qty = ($counting_unit->current_quantity - $unit->pivot->quantity);

                        $counting_unit->current_quantity = $balance_qty;

                        $counting_unit->save();

                    }
                } 
                else {
                    
                    foreach ($order->counting_unit as $unit) {
                
                        $voucher->counting_unit()->attach($unit->id, ['quantity' => $unit->pivot->quantity,'price' => $unit->order_price]);

                        $counting_unit = CountingUnit::find($unit->id);

                        $balance_qty = ($counting_unit->current_quantity - $unit->pivot->quantity);

                        $counting_unit->current_quantity = $balance_qty;

                        $counting_unit->save();

                    }
                }

                alert()->success('Successfully Changed');

                return view('Order.order_voucher', compact('voucher','order'));
            }  

        }else{

            alert()->error('Something Wrong! Order is Delivered!');

            return redirect()->back();
        } 	
    }

    protected function getOrderHistoryPage(){

        $from_date = date("Y-m-d");
        $to_date = date("Y-m-d");
        $voucher_lists = Voucher::where('type', 2)->whereBetween('voucher_date',[$from_date,$to_date])->get();
        
        $customer_lists = array();
        
        foreach($voucher_lists as $voucher){
            $customer_name = Order::find($voucher->order_id)->name;
            $customer_lists[$voucher->id] = $customer_name;
        }

        return view('Order.order_history_page', compact('voucher_lists','customer_lists'));
    }

    public function validateData($request)
    {
        return  Validator::make($request->all(), [
            'from' => 'required',
            'to' => 'required',
        ]);
    }

    protected function searchOrderVoucherHistory(Request $request){

        // $validator = $this->validateData($request);

        if ($this->validateData($request)->fails()) {

            alert()->error('Something Wrong!');

            return redirect()->back();
        }

        $voucher_lists = Voucher::where('type', 2)->whereBetween('voucher_date', [$request->from, $request->to])->get();
        
        $customer_lists = array();
        
        foreach($voucher_lists as $voucher){
            $customer_name = Order::find($voucher->order_id)->name;
            $customer_lists[$voucher->id] = $customer_name;
        }

        return view('Order.order_history_page', compact('voucher_lists','customer_lists'));
    }

    protected function getVoucherDetails(Request $request, $id){

        try {
            
            $voucher = Voucher::findOrFail($id);

        } catch (\Exception $e) {

            alert()->error("Order Not Found!")->persistent("Close!");
            
            return redirect()->back();
        }
        
        return view('Order.order_voucher', compact('voucher'));
    }
}
