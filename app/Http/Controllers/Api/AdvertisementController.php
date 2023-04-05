<?php

namespace App\Http\Controllers\Api;

use App\Announcement;
use App\Advertisement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiBaseController;
use App\Http\Requests\AdverDetailApiRequest;
use App\Http\Requests\AnnounceDetailApiRequest;
use App\Http\Resources\AdverResource;
use App\Http\Resources\AdvertisementCollection;
use App\Http\Resources\AdvertisementResource;
use App\Http\Resources\AnnouncementResource;

class AdvertisementController extends Controller
{
    public function advertisementLists()
    {
        $advertisements = Advertisement::all();
        $adverCollection =  AdvertisementResource::collection($advertisements);

    	return response()->json([
    		"message" => "Successful",
    		"status" => 1,
			"advertisements" => $adverCollection,
    	]);
    }
    public function advertisementDetail(AdverDetailApiRequest $request)
    {
        $advertisement = Advertisement::where('id',$request->advertisement_id)->with('package')->with('package.services')->first();
       $adverresource= new AdvertisementResource($advertisement); 
        return response()->json([
    		"message" => "Successful",
    		"status" => 1,
			"advertisements" => $advertisement,
    	]);
    }

    public function announcementLists()
    {
        $announcements = Announcement::all();
        $annoResource = AnnouncementResource::collection($announcements);
    	return response()->json([
    		"message" => "Successful",
    		"status" => 1,
			"announcements" => $annoResource,
    	]);
    }
    public function announcementDetail(AnnounceDetailApiRequest $request)
    {
        $announcement = Announcement::findOrFail($request->announcement_id);
        $annoResource = new AnnouncementResource($announcement);
        return response()->json([
    		"message" => "Successful",
    		"status" => 1,
			"announcement" => $annoResource,
    	]);
    }
}
