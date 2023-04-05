<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdvertisementResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       // return parent::toArray($request);

        $url = url("/") . '/image/adv/' ;


        return [
            "id"=> $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'photo_path' => $url . $this->photo_path,
            "short_description"=> $this->short_description,
            "expired_at"=> $this->expired_at,
            "start_date"=> $this->start_date,
            "package_id"=> $this->package_id,
            "package"=> $this->package,
        ];
    }
}
