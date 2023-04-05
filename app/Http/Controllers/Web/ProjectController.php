<?php

namespace App\Http\Controllers\Web;

use App\Accounting;
use App\Currency;
use App\Customer;
use App\Http\Controllers\Controller;
use App\Invoice;
use App\InvoiceProductList;
use App\Product;
use App\PurchaseOrder;
use App\SaleProject;
use App\Supplier;
use App\YearProject;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProjectController extends Controller

{
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

        protected function create_project()
        {

            $customers = Customer::all();
            $currency  = Currency::all();
            return view('Admin.create_project',compact('currency','customers'));
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
}
