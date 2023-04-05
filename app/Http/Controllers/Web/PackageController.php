<?php

namespace App\Http\Controllers\Web;

use App\Package;
use App\Service;
use Carbon\Carbon;
use App\Advertisement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PackageStoreRequest;

class PackageController extends Controller
{
    public function packageList()
    {
        $packages = Package::with('services')->get();
        $otherServices = Service::where('status',1)->get();
        return view('Admin.Services.packages',compact('packages','otherServices'));
    }
    public function packageStore(PackageStoreRequest $request)
    {       
        $package=Package::create($request->validated());
        foreach($request->services as $service){
            $package->services()->attach($service);
        }   
        if($request->advertise_yesOrno==1){
            $booking_range = request('range');

            $weekormonth = request('weekormonth');

            if ($request->hasfile('img')) {

                $image = $request->file('img');

                $name = $image->getClientOriginalName();

                $image_name =  time()."-".$name;

                $image->move(public_path() . '/image/adv/', $image_name);

                $image = $image_name;
            }
            else{
                $image_name= 'default.png';

            }
            $today = Carbon::parse($request->start_date);
            // $now = $request->start_date;
            // dd($now);
            // $today = $now->format('Y-m-d');
            $req_date = $today->format('Y-m-d');
            $today_string = strtotime($today);		

            if ($weekormonth == "month") {

                $expire_date = strtotime("+$booking_range months" , $today_string);
            }
            else{

                $expire_date = strtotime("+$booking_range week" , $today_string);
                
            }
            
            $advertisement = Advertisement::create([
                'title' => request('adver_title'),
                'description' => request('adver_description'),
                'short_description' => request('adver_short_description'),
                'photo_path' => $image_name,
                'expired_at' => date('Y-m-d', $expire_date),
                'start_date' =>  $req_date,
                'package_id'=> $package->id

            ]);

    }
            alert()->success('Successfully Added!')->autoclose(1000);

            return redirect()->route('packages.lists');
    }
    public function packageUpdate(PackageStoreRequest $request,$id)
    {
            try {

            $package= Package::findOrFail($id);

            } catch (\Exception $e) {
                alert()->error('Something wrong when Update');
            }
            $package->update($request->validated());
            alert()->success('Successful!');
            return redirect()->route('services.lists');
    }
    public function serviceDelete(Request $request)
    {
        $service = Service::findOrFail($request->service_id);
        $service->delete();
        return response()->json($service);

    }
    public function ajaxpackageList() //ajax
    {
        $packages = Package::all();
        return $packages;
    }

}
