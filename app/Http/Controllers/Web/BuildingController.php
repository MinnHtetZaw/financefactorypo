<?php

namespace App\Http\Controllers\Web;

use App\Building;
use App\Floor;
use App\Room;
use App\Day;
use App\RoomType;
use App\Department;
use App\DoctorTime;
use App\Doctor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class BuildingController extends Controller
{
    public function BuidlingList(){

    	$buildings = Building::with('floor')->get();

        $departments = Department::all();

        $days = Day::all();

        $floors = Floor::all();
        
    	return view('Admin.Building.building_list', compact('buildings','departments','floors','days'));
    }

    public function StoreBuidling(Request $request){
    	
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:5',
            
        ]);

        if ($validator->fails()) {
            
            alert()->error('Something Wrong');
            return redirect()->back();
        }

        $building = Building::create([
            'name' => $request->name,
        ]);

        alert()->success('Successfully Added!')->autoclose(2000);

        return redirect()->route('buidling_info');
    }

    public function StoreFloor(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:5',
            
        ]);

        if ($validator->fails()) {

            alert()->error('Something Wrong');
            return redirect()->back();
        }

        $floor = Floor::create([
            'name' => $request->name,
            'number_of_room' => $request->room_number,
            'building_id' => $request->building_id,
            'department_id' => $request->department_id,
        ]);

        alert()->success('Successfully Added!')->autoclose(2000);

        return redirect()->route('buidling_info');
    }

    public function StoreRoom(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'room_type_id' => 'required',
            'floor_id' => 'required',
            
        ]);

        if ($validator->fails()) {

            alert()->error('Something Wrong');
            return redirect()->back();
        }


        $floor = Floor::find($request->floor_id);

        $number_of_room = $floor->number_of_room;

        $room_prefix = $request->name;

        $prefix = substr($room_prefix, 0, -1);

        $floor_id = $floor->id;

        $room_type_id = $request->room_type_id;

        for ($i = 1; $i <= $number_of_room; $i++) {

            $room_num = "$floor_id" . "$prefix"."$i";

            $room = Room::create([
                'name' => $room_num,
                'floor_id' => $floor_id,
                'room_type_id' => $room_type_id,
            ]);

        }

        alert()->success('Successfully Added!')->autoclose(2000);

        return redirect()->route('buidling_info');

    }    
}
