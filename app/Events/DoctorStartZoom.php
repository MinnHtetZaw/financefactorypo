<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DoctorStartZoom implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $userID_bookingID;
    public $userID_tokenName;
    public $name;
    public $age;
    public $phone;
    public $booking_date;
    public $status;
    public $zoom_id;
    public $zoom_psw;
    public $join_url;
    public function __construct($userID_bookingID,$userID_tokenName,$name,$age,$phone,$booking_date,$status,$zoom_id,$zoom_psw,$join_url)
    {
        $this->userID_bookingID = $userID_bookingID;
        $this->userID_tokenName = $userID_tokenName;
         $this->name = $name;
         $this->age = $age;
         $this->phone = $phone;
         $this->booking_date = $booking_date;
         $this->status = $status;
         $this->zoom_id = $zoom_id;
         $this->zoom_psw = $zoom_psw;
         $this->join_url = $join_url;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return ['hospital_booking'];
    }

    public function broadcastAs() 
    {
        return 'zoom-start';
    }
}
