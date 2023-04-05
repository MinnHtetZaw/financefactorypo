<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DoctorChange implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user_booking_id;
    public $user_token;
    public $type;  //chagne doctor
    public $booking_date;
    public $booking_time;
    public $initial_doc_name;
    public $initial_doc_id;
    public $anydoctor;
    public $revised_in_doc_name;
    public $revised_in_doc_id;
    public $revised_out_doc_name;
    public $status;


 

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user_booking_id,$user_token,$type,$booking_date,$booking_time,$initial_doc_name,$initial_doc_id,$anydoctor,$revised_in_doc_name,$revised_in_doc_id,$revised_out_doc_name,$status)
    {
        $this->user_booking_id=$user_booking_id;
        $this->user_token=$user_token;
    $this->type =$type; 
    $this->booking_date=$booking_date;
    $this->booking_time=$booking_time;
    $this->initial_doc_name=$initial_doc_name;
    $this->initial_doc_id=$initial_doc_id;
    $this->anydoctor=$anydoctor;
    $this->revised_in_doc_name= $revised_in_doc_name;
    $this->revised_in_doc_id=$revised_in_doc_id;
    $this->revised_out_doc_name=$revised_out_doc_name;
    $this->status=$status;

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
