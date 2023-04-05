<?php

namespace App\Http\Controllers\Web;

use App\Doctor;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceStoreRequest;
use App\Service;
use BotMan\BotMan\Cache\DoctrineCache;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function serviceList()
    {
        $services = Service::all();
        return view('Admin.Services.services',compact('services'));
    }
    public function serviceStore(ServiceStoreRequest $request)
    {
            Service::create($request->validated());
            return redirect()->route('services.lists');
    }
    public function serviceUpdate(ServiceStoreRequest $request,$id)
    {
            try {

            $service= Service::findOrFail($id);

            } catch (\Exception $e) {
                alert()->error('Something wrong when Update');
            }
            $service->update($request->validated());
            alert()->success('Successful!');
            return redirect()->route('services.lists');
    }
    public function serviceDelete(Request $request)
    {
        $service = Service::findOrFail($request->service_id);
        $service->delete();
        return response()->json($service);

    }
    public function doctorServices(Request $request)  //ajax
    {
        $doctorServices= Doctor::findOrFail($request->doctor_id)->services;
        return $doctorServices;
    }
    public function ajaxOtherServices(Request $request)  //ajax
    {
        $otherServices= Service::otherservice()->get();
        return $otherServices;
    }
}
