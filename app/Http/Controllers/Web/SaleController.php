<?php

namespace App\Http\Controllers\Web;

use App\Item;
use App\User;
use DateTime;
use stdClass;
use App\Issue;
use App\Order;
use App\Voucher;
use App\Category;
use App\Customer;
use App\Employee;
use App\StockCount;
use App\SubCategory;
use App\CountingUnit;
use App\Doctor;
use App\SalesCustomer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\SaleCustomerCreditlist;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\PayCredit;
use App\Service;
use App\State;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use PHPUnit\Framework\Constraint\Count;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Psy\Command\DocCommand;

class SaleController extends Controller
{
    protected function getSalePanel(){

    	return view('Sale.sale_panel');

    }

    protected function getSalePage(Request $request){

        $items = Item::all();

        $categories = Category::all();
        
        $sub_categories = SubCategory::all();

        $employees = Employee::all();

        $date = new DateTime('Asia/Yangon');

        $otherServices= Service::otherservice()->get();

        $doctors = Doctor::with('services')->get();

        $today_date = strtotime($date->format('d-m-Y H:i'));
    	
        $state_lists= State::all();
    	return view('Sale.sale_page',compact('items','categories','employees','today_date','sub_categories','otherServices','doctors','state_lists'));
    }
    protected function getVucherPage(Request $request){

        $validator = Validator::make($request->all(), [
            'delivery' => 'required'
        ]);
        if($request->delivery==1){
            $validator = Validator::make($request->all(), [
                'pickupname' => 'required',
                'pickupphone' => 'required',
                'pickupdate' => 'required'
            ]);
        }
        if($request->delivery==2){
            $validator = Validator::make($request->all(), [
                'receivername' => 'required',
                'receiverphno' => 'required',
                'deliverydate' => 'required',
                'state_id' => 'required',
                'town_id' => 'required',
                'address' => 'required',
                'charges' => 'required',
            ]);
        }

        if ($validator->fails()) {

            alert()->error('Something Wrong!');

            return redirect()->back();
        }
        $deliveryinfo= ['delivery'=>$request->delivery,'pickupname'=>$request->pickupname,'pickupphone'=>$request->pickupphone,'pickupdate'=>$request->pickupdate,'receivername'=>$request->receivername,'receiverphno'=>$request->receiverphno,'deliverydate'=>$request->deliverydate,'state_id'=>$request->state_id,'town_id'=>$request->town_id,'address'=>$request->address,'charges'=>$request->charges];

        $date = new DateTime('Asia/Yangon');

        $today_date = $date->format('d-m-Y h:i:s');

        $check_date = $date->format('Y-m-d');

        $items = json_decode($request->item);

        $grand = json_decode($request->grand);

        $docServiceItem = json_decode($request->docServiceItem);
        $docServiceGrandTotal = json_decode($request->docServiceGrandTotal);
        $pagServiceItem = json_decode($request->pagServiceItem);
        $pagServicegrandTotal = json_decode($request->pagServicegrandTotal);

        $last_voucher = Voucher::get()->last();

        $right_now_customer= $request->right_now_customer;
        if(empty($last_voucher)){
        $voucher_code =  "VOU-".date('dmY')."-".sprintf("%04s", 1);
        }else{
            $voucher_code =  "VOU-".date('dmY')."-".sprintf("%04s", ($last_voucher->id + 1));

        }
 
        return view('Sale.voucher', compact('items','today_date','grand','voucher_code','right_now_customer','docServiceItem','docServiceGrandTotal','pagServiceItem','pagServicegrandTotal','deliveryinfo'));
    }

    
    protected function storeVoucher(request $request){

        $deliveryinfo = json_decode(json_encode($request->deliveryinfo));

        $user = session()->get('user');

        $date = new DateTime('Asia/Yangon');

        $today_date = $date->format('d-m-Y h:i:s');

        $voucher_date = $date->format('Y-m-d');

        $today_time = $date->format('g:i A');
 
        $items = json_decode(json_encode($request->item));

        $grand = json_decode(json_encode($request->grand));

        $docServiceItem = json_decode(json_encode($request->docServiceItem));

        $pagServiceItem = json_decode(json_encode($request->pagServiceItem));

        $total_amount = $request->allTotal;
        
        $total_quantity = $request->allQty;

        $voucher = Voucher::create([
            'sale_by' => $user->id,
            'voucher_code' => $request->voucher_code,
            'total_price' =>  $total_amount,
            'total_quantity' => $total_quantity,
            'voucher_date' => $voucher_date,
            'type' => 1,
            'status' => 0,
            
        ]);
       
        if($deliveryinfo->delivery==1){ //pickup
            $voucher->name = $deliveryinfo->pickupname;
            $voucher->phone = $deliveryinfo->pickupphone;
            $voucher->date = $deliveryinfo->pickupdate;
        }
        elseif($deliveryinfo->delivery==2)  { //delivery
            $voucher->name = $deliveryinfo->receivername;
            $voucher->phone = $deliveryinfo->receiverphno;
            $voucher->date = $deliveryinfo->deliverydate;
            $voucher->state_id = $deliveryinfo->state_id;
            $voucher->town_id = $deliveryinfo->town_id;
            $voucher->address = $deliveryinfo->address;
            $voucher->delivery_charges = $deliveryinfo->charges;
        }
        $voucher->delivery_status= $deliveryinfo->delivery;
        $voucher->save();

        if(!empty($items)){
            foreach ($items as $item) {
            
                $voucher->counting_unit()->attach($item->id, ['quantity' => $item->order_qty,'price' => $item->selling_price]);
    
                $counting_unit = CountingUnit::find($item->id);
    
                $balance_qty = ($counting_unit->stock_qty - $item->order_qty);
    
                $counting_unit->stock_qty = $balance_qty;
    
                $counting_unit->save();
    
            }

        }
   

//voucher_services table
        if(!empty($docServiceItem)){

            foreach ($docServiceItem as $docServiceitem) {
                $voucher->services()->attach($docServiceitem->id, ['quantity' => $docServiceitem->qty,'doctor_id'=>$docServiceitem->doctor_id]);
            }

        }
      
    // voucher_services table
    if(!empty($pagServiceItem)){

    foreach ($pagServiceItem as $pagServiceitem) {
        if($pagServiceitem->type=="service"){
        $voucher->services()->attach($pagServiceitem->id, ['quantity' => $pagServiceitem->qty]);
        }else{
        $voucher->packages()->attach($pagServiceitem->id, ['quantity' => $pagServiceitem->qty]);
        }

        // $voucher->services()->attach($pagServiceitem->id, ['quantity' => $pagServiceitem->qty]);

        }
    }
        
        return response()->json($voucher);
        
    }

    public function getCountingUnitsByItemId(request $request){

        $item_id = $request->item_id;
        $units = CountingUnit::where('item_id', $item_id)->with('item')->with('item.brand')->with('item.type')->get();
       
        // $units = CountingUnit::where('item_id', $item->id)->where('stock_qty', '!=', 0)->with('item')->get();
    
        return response()->json($units);

    }

    public function getCountingUnitsByItemCode(Request $request){

        $unit_code = $request->unit_code;
       
        $units = CountingUnit::where('unit_code', $unit_code)->orWhere('original_code', $unit_code)->with('item')->first();

        return response()->json($units);
    }

    protected function getSaleHistoryPage(Request $request){
        if(session()->get('user')->hasRole('EmployeeC') || session()->get('user')->hasRole('DoctorC')){
            $voucher_lists =Voucher::where('type', 1)->where('clinicvoucher_status',1)->orderBy('id','desc')->get();

        }
        else{
            $voucher_lists =Voucher::where('type', 1)->orderBy('id','desc')->get();

        }
        
        $countunits=[];
        $arr_ki=[];
        $total_qty=[];

                    foreach($voucher_lists as $key=>$item){
                        $item_count=count($countunits);
                        for($i=0; $i<count($item->counting_unit);$i++){
                            if(!in_array($item->counting_unit[$i]->id,$arr_ki)){
                                array_push($arr_ki,$item->counting_unit[$i]->id);
                                array_push($total_qty,[
                                    'countingunit_id'=>$item->counting_unit[$i]->id,
                                    'qty'=>$item->counting_unit[$i]->pivot->quantity]
                                );
                                array_push($countunits,$item->counting_unit[$i]);
                            }            

                        else{
                            foreach($total_qty as $key=>$t){


                               if($t['countingunit_id']==$item->counting_unit[$i]->id)
                                {
                                    $qty = $t['qty'] + $item->counting_unit[$i]->pivot->quantity;
                                    
                                    array_splice($total_qty, $key, 1);
                                    array_push($total_qty,[
                                        'countingunit_id'=>$item->counting_unit[$i]->id,
                                        'qty'=>$qty
                                    ]);
                                }
                            }

                        }

                        }
                        
                    }

                    $total_sales  = 0;
        
        foreach ($voucher_lists as $voucher_list){

            $total_sales += $voucher_list->total_price;

        }
        $date = new DateTime('Asia/Yangon');
        
        $current_date = strtotime($date->format('Y-m-d'));
        
        $weekly = date('Y-m-d', strtotime('-1week', $current_date));
        $to = $date->format('Y-m-d');

        // $to = date('Y-m-d', strtotime('+1day', $current_date));use =>created_at 
        
        if(session()->get('user')->hasRole('EmployeeC') || session()->get('user')->hasRole('DoctorC')){
          
            $weekly_data = Voucher::where('type', 1)->where('clinicvoucher_status',1)->whereBetween('voucher_date',[$weekly,$to])->get();
        }
        else{
            $weekly_data = Voucher::where('type', 1)->whereBetween('voucher_date', [$weekly,$to])->get();

        }
        $weekly_sales = 0;
        
        foreach($weekly_data as $weekly){
            
            $weekly_sales += $weekly->total_price;
        }

        $current_month = $date->format('m');
        $current_month_year = $date->format('Y');
        $today_date = $date->format('Y-m-d');
        if(session()->get('user')->hasRole('EmployeeC') || session()->get('user')->hasRole('DoctorC')){
            $daily = Voucher::where('type', 1)->where('clinicvoucher_status',1)->whereDate('created_at', $today_date)->get();
        }
        else{
            $daily = Voucher::where('type', 1)->where('created_at', $today_date)->get();

        }
        
        $daily_sales = 0;
        
        foreach($daily as $day){
            
            $daily_sales += $day->total_price;
        }
        if(session()->get('user')->hasRole('EmployeeC') || session()->get('user')->hasRole('DoctorC')){

            $monthly = Voucher::where('type', 1)->where('clinicvoucher_status',1)->whereMonth('created_at',$current_month)->whereYear('created_at',$current_month_year)->get();

        }
        else{
            $monthly = Voucher::where('type', 1)->whereMonth('created_at',$current_month)->get();

        }
        $monthly_sales = 0;
        
        foreach ($monthly as $month){

            $monthly_sales += $month->total_price;
        }

        $counting_units= CountingUnit::all();

        return view('Sale.sale_history_page',compact('counting_units','voucher_lists','total_sales','daily_sales','monthly_sales','weekly_sales','total_qty','countunits'));
    }

    protected function searchSaleHistory(Request $request){


        $validator = Validator::make($request->all(), [
            'from' => 'required',
            'to' => 'required',
        ]);
        if ($validator->fails()) {

            alert()->error('Something Wrong!');

            return redirect()->back();
        }
        if(session()->get('user')->hasRole('EmployeeC') || session()->get('user')->hasRole('DoctorC')){

            $voucher_lists = Voucher::where('type', 1)->where('clinicvoucher_status',1)->whereBetween('voucher_date', [$request->from, $request->to])->get();
            // $voucher_lists = Voucher::where('type', 1)->where('clinicvoucher_status',1)->where('created_at', '>=', $request->from)
            // ->where('created_at', '<=', $request->to)->get();

        }else{
            $voucher_lists = Voucher::where('type', 1)->whereBetween('created_at', [$request->from, $request->to])->get();

        }

        if(session()->get('user')->hasRole('EmployeeC') || session()->get('user')->hasRole('DoctorC')){
            $voucher_lists_all = Voucher::where('type', 1)->where('clinicvoucher_status',1)->get();

        }
        else{
            $voucher_lists_all = Voucher::where('type', 1)->get();

        }
        
        $total_sales  = 0;
        
        foreach ($voucher_lists_all as $voucher_list){

            $total_sales += $voucher_list->total_price;

        }
        

        $countunits=[];
        $arr_ki=[];
        $total_qty=[];

                    foreach($voucher_lists as $key=>$item){
                        $item_count=count($countunits);
                        // if($item_count ==0)
                        // {
                        //     array_push($countunits,$item->counting_unit);
                        //     array_push($arr_ki,$item->counting_unit[0]->id);
                        //     array_push($total_qty,[$item->counting_unit[0]->id=>$item->total_quantity]);
                        // }
                        // else{
                        for($i=0; $i<count($item->counting_unit);$i++){
                            if(!in_array($item->counting_unit[$i]->id,$arr_ki)){
                                array_push($arr_ki,$item->counting_unit[$i]->id);
                                array_push($total_qty,[
                                    'countingunit_id'=>$item->counting_unit[$i]->id,
                                    'qty'=>$item->counting_unit[$i]->pivot->quantity]
                                );
                                array_push($countunits,$item->counting_unit[$i]);
                            }            

                        else{
                            foreach($total_qty as $key=>$t){


                               if($t['countingunit_id']==$item->counting_unit[$i]->id)
                                {
                                    $qty = $t['qty'] + $item->counting_unit[$i]->pivot->quantity;
                                    
                                    array_splice($total_qty, $key, 1);
                                    array_push($total_qty,[
                                        'countingunit_id'=>$item->counting_unit[$i]->id,
                                        'qty'=>$qty
                                    ]);
                                }
                            }

                        }

                        }
                        
                    }


                    $date = new DateTime('Asia/Yangon');
        
                    $current_date = strtotime($date->format('Y-m-d'));
                    
                    $weekly = date('Y-m-d', strtotime('-1week', $current_date));
                    $to = date('Y-m-d', strtotime('+1day', $current_date));
                    
                    if(session()->get('user')->hasRole('EmployeeC') || session()->get('user')->hasRole('DoctorC')){
                      
                        $weekly_data = Voucher::where('type', 1)->where('clinicvoucher_status',1)->whereBetween('created_at',[$weekly,$to])->get();
            
                    }
                    else{
                        $weekly_data = Voucher::where('type', 1)->whereBetween('voucher_date', [$weekly,$to])->get();
            
                    }
                    $weekly_sales = 0;
                    
                    foreach($weekly_data as $weekly){
                        
                        $weekly_sales += $weekly->total_price;
                    }
            
                    $current_month = $date->format('m');
                    $current_month_year = $date->format('Y');
                    $today_date = $date->format('Y-m-d');
                    if(session()->get('user')->hasRole('EmployeeC') || session()->get('user')->hasRole('DoctorC')){
                        $daily = Voucher::where('type', 1)->where('clinicvoucher_status',1)->whereDate('created_at', $today_date)->get();
                    }
                    else{
                        $daily = Voucher::where('type', 1)->where('created_at', $today_date)->get();
            
                    }
                    
                    $daily_sales = 0;
                    
                    foreach($daily as $day){
                        
                        $daily_sales += $day->total_price;
                    }
                    if(session()->get('user')->hasRole('EmployeeC') || session()->get('user')->hasRole('DoctorC')){
            
                        $monthly = Voucher::where('type', 1)->where('clinicvoucher_status',1)->whereMonth('created_at',$current_month)->whereYear('created_at',$current_month_year)->get();
            
                    }
                    else{
                        $monthly = Voucher::where('type', 1)->whereMonth('created_at',$current_month)->get();
            
                    }
                    $monthly_sales = 0;
                    
                    foreach ($monthly as $month){
            
                        $monthly_sales += $month->total_price;
                    }
        $counting_units= CountingUnit::all();

        return view('Sale.sale_history_page',compact('counting_units','voucher_lists','total_sales','daily_sales','monthly_sales','weekly_sales','countunits','total_qty'));

    }
    public function searchSaleHistoryget()
    {
        return redirect()->route('sale_history');
    }
    protected function getVoucherDetails(request $request, $id){

        $unit = Voucher::find($id);
        $packages= $unit->packages;
        $payed = $unit->total_price;
        $docAndservices= $unit->services;
        return view('Sale.voucher_details', compact('unit','payed','packages','docAndservices'));
    }
    
    protected function getVoucherSummaryMain(){
        return view('Sale.voucher_history');
    }
    
    public function searchItemSalesByDate(Request $request){  // PYin Yan
        
        $role= $request->session()->get('user')->role;
        if($role=='Sale_Person' || $role=='Warehouse'){
            $item_from= $request->session()->get('user')->from;
      }
      else {
        $item_from= $request->session()->get('from');
      }

        $search_date = $request->date;
        
        $req_date = strtotime($search_date);
		
		$date = date('d/F/Y', $req_date);
        
        $vouchers = Voucher::whereDate('created_at', $search_date)->where('from_id',$item_from)->get();
        
        if(count($vouchers) == 0){
            
            alert()->error('ယနေ့အတွက် ဘောင်ချာမရှိသေးပါ');
            
            return redirect()->back();
        }
        
        $total_sales = 0;
        
        $total_quantity = 0;
        
        $item_lists = array();
        
        foreach($vouchers as $voucher){
            
            $total_sales += $voucher->total_price;
            
            $total_quantity += $voucher->total_quantity;
            
            foreach($voucher->counting_unit as $counting_unit){
                
                $counting_unit_id = $counting_unit->id;
                
                $item_id = $counting_unit->item_id;
                
                $item_name = Item::find($item_id)->item_name;
                
                $counting_unit_name = $counting_unit->unit_name;
                
                $quantity = $counting_unit->pivot->quantity;
                
                $price = $counting_unit->pivot->price;
                
                $combined = array('item_id' => $item_id, 'item_name' => $item_name, 'counting_unit_id' => $counting_unit_id,'counting_unit_name' => $counting_unit_name, 'quantity' => $quantity, 'price' =>$price );
                
                array_push($item_lists, $combined);
            }
            
        }
        
        $items = array();
        
        foreach ($item_lists as $item) {
            
            if (!isset($result[$item['counting_unit_id']])){
            
                $result[$item['counting_unit_id']] = $item;
            }else{
            
                $result[$item['counting_unit_id']]['quantity'] += $item['quantity'];
                $result[$item['counting_unit_id']]['price'] += $item['price'];
            }
        }
        
        $items = array_values($result);
        asort($items);

        
        return view('Sale.voucher_summary',compact('total_sales','total_quantity','items','date'));
    }
    protected function returnVoucher(Request $request)
    {
        dd($request->all());
        
        
        $current_arr = $request->current;
        $purchase_arr = $request->purchase;
        $counting_arr = $request->countingID;
        $fromID = $request->from;
        $new_arr = $request->new_qty;
        $vou_id = $request->voucherID;
        $total = 0;
        
        for($i=0;$i<count($counting_arr);$i++)
        {   
            if($current_arr[$i] < $new_arr[$i])
            {
                alert()->error("Your Current Quantity less than New!");
                return back();
            }
            // null in new qty
            if($new_arr[$i] == null)
            {
                $new_arr[$i] = $current_arr[$i];
            }
            // end null in new qty
            
            $total += $new_arr[$i] * $purchase_arr[$i]; 
            $voucher = Voucher::find($vou_id);
            $stock_qty = StockCount::where('counting_unit_id',$counting_arr[$i])->where('from_id',$fromID)->first();
            $has_credit = SaleCustomerCreditlist::where('voucher_id',$vou_id)->first();
            
                
            $voucher->counting_unit()->updateExistingPivot($counting_arr[$i],['quantity' => $new_arr[$i]]);
            $stock = $current_arr[$i] - $new_arr[$i];
            $stock_qty->stock_qty += $stock;
            $stock_qty->save();
            
            $voucher->counting_unit()->wherePivot('quantity',0)->detach();
           
            
        }
        

        $unit = Voucher::find($vou_id);
       
            
            // dd($unit->total_price);
            $unit->total_price = $total;
            if($unit->total_price == 0)
            {
                $unit->delete();
                
                return redirect()->route('sale_history');
                return back();
            }
            $unit->save();
      return back();
    }
    protected function calculateCurrent(Request $request)
    {
        // dd($request->all());
        $total = 0;
        $newnew = $request->new_qty;
        $purchases = $request->purchase;
        $payed = $request->payamt;
        $current = $request->current_qty;
        // dd($payed);
        for($i=0;$i<count($request->new_qty);$i++)
        {
            if($newnew[$i] == null)
            {
                $newnew[$i] = $current[$i];
                $now_qty = $newnew[$i];
                $total += $now_qty * $purchases[$i];
            }else{
                $now_qty = $current[$i] - $newnew[$i];
                $total += $now_qty * $purchases[$i];
            }
            
        }
        
        $left_credit = $total - $payed;
        
        return response()->json([
            'total' => $total,
            'left' => $left_credit
        ]);

    }
    protected function returnVoucherNew(Request $request)
    {
        // dd($request->all());
        // dd($request->voucherID."Revise");
        $current_arr = $request->current;
        $purchase_arr = $request->purchase;
        $counting_arr = $request->countingID;
        $fromID = $request->from;
        $new_arr = $request->new_qty;
        $vou_id = $request->voucherID;
        $payed = $request->payed_amount;
        $changes = $request->change;
        $nowCredit = $request->now_credit;
        $paynow = $request->pay;
        $total = 0;
        $customer_credit = SaleCustomerCreditlist::where('voucher_id',$vou_id)->first();
        $sales_customer = SalesCustomer::find($customer_credit->sales_customer_id);
        for($i=0;$i<count($counting_arr);$i++)
        {  
            if($current_arr[$i] < $new_arr[$i])
            {
                alert()->error("Your Current Quantity less than New!");
                return back();
            }
            if($new_arr[$i] == null)
            {
                $new_arr[$i] = $current_arr[$i];
            }
            
            $decrease_qty = $current_arr[$i] - $new_arr[$i];
            $total += $decrease_qty * $purchase_arr[$i]; 
            $voucher = Voucher::find($vou_id);
            $stock_qty = StockCount::where('counting_unit_id',$counting_arr[$i])->where('from_id',$fromID)->first();

            $voucher->counting_unit()->updateExistingPivot($counting_arr[$i],['quantity' => $decrease_qty]);
            $stock = $new_arr[$i];
            $stock_qty->stock_qty += $stock;
            $stock_qty->save();
            $voucher->counting_unit()->wherePivot('quantity',0)->detach();

        }// for end
        $sales_customer->credit_amount = $nowCredit - $paynow;
        $sales_customer->save();
        if($customer_credit != null)
        {
        $customer_credit->credit_amount = $nowCredit - $paynow;
        $customer_credit->save();
        }
        $unit = Voucher::find($vou_id);
        
        $myString = $unit->voucher_code;
        $contains = Str::contains($myString, '-Revise');
        if($contains == true)
        {
            $unit->voucher_code = $unit->voucher_code;
            $unit->save();
        }
        else{
            $unit->voucher_code = $unit->voucher_code."-Revise";
            $unit->save();
        }
     


        $unit->change_amount = $changes;
        $unit->total_price = $total;
        if($unit->total_price == 0)
        {
            $unit->delete();
            
            return redirect()->route('sale_history');
            return back();
        }
        $unit->save();
        $credit_status = SaleCustomerCreditlist::where('voucher_id',$vou_id)->first();
        if($credit_status->credit_amount == 0)
        {
            $credit_status->status = 1;
            $credit_status->save();
        }
        $pay_credits = PayCredit::create([
            'sale_customer_id' => $customer_credit->sales_customer_id,
            'left_amount' => $nowCredit - $paynow,
            
            'voucher_id'=>$vou_id,
            'pay_amount' => $paynow,
           
            'status' => 0,
         
             ]);
        return back();
        

    }
    public function deliveryState(Request $request)
    {
        $towns= State::findOrfail($request->state_id)->town()->where('status',1)->get();
        return response()->json($towns);

    }
}
