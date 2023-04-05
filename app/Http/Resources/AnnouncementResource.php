<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AnnouncementResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        if ($this->slide_status == 0) {
            
            $status = "Major Announcement!";
        }
        else{

            $status = "Minor Announcement!";
        }

        $url = url("/") . '/image/ann/' ;

        return [
            "id"=> $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'photo_path' => $url . $this->photo_path,
            'slide_status' => $status,
            "short_description" => $this->short_description,
            "expired_at"=> $this->expired_at,
        ];
    }
}
