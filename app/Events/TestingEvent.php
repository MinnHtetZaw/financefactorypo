<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TestingEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user_booking_id;
    public $user_token;
    public $type;
    public $initial_booking_date;
    public $initial_booking_est_time;
    public $revised_booking_date;
    public $revised_booking_time;
    public $doctor_id;
    public $doctor_name;
    public $status;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user_booking_id,$user_token,$type,$initial_booking_date,$initial_booking_est_time,$revised_booking_date,$revised_booking_time,$doctor_id,$doctor_name,$status)
    {
   
        $this->user_booking_id=$user_booking_id;
        $this->user_token=$user_token;
        $this->type=$type;
        $this->initial_booking_date=$initial_booking_date;
        $this->initial_booking_est_time=$initial_booking_est_time;
        $this->revised_booking_date=$revised_booking_date;
        $this->revised_booking_time=$revised_booking_time;
        $this->doctor_id=$doctor_id;
        $this->doctor_name=$doctor_name;
        //  $this->$revised_doctor_id=$revised_doctor_id;
        //  $this->$revised_doctor_name= $revised_doctor_name;
         $this->status= $status;


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
        return 'my-event';
    }
}


