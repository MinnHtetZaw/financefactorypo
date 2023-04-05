<?php

namespace App\Http\Controllers\Web;

use App\Employee;
use App\MaterialRequest;
use App\MaterialRequestLists;
use App\SaleOrder;
use App\SaleOrderLists;
use App\Product;
use App\Item;
use App\MaterialIssue;
use App\MaterialIssueList;
use App\ProjectPhase;
use App\PhaseTask;
use App\RegionalWarehouse;
use App\SaleProject;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class WarehouseStockController extends Controller
{
    //
    public function RegionalWarehouse(Request $request){

        // $employees = Employee::all();

        $projects = SaleProject::all();

        $regional_warehouses = RegionalWarehouse::all();

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

}
