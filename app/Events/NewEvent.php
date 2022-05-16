<?php

namespace App\Events;

//use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
//use Illuminate\Broadcasting\PresenceChannel;
//use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewEvent  implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
     public $sender_id;
     public $receiver_id;
     public $title;
     public $message;
     public $link;
     public $data;

    public function __construct($data =[])
    {
      $this->sender_id=$data['sender_id'];
     $this->receiver_id=$data['receiver_id'];
     $this->title=$data['title'];
     $this->message=$data['message'];
     $this->link=$data['link'];

               }
               
               

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
       // return new Channel('sss');
       return ['salman'];
    }
    public function broadcastAs() {

        return 'salman';
        
        }
       public function broadcastWith()
{
   return ['receiver_id' => $this->receiver_id,'sender_id' => $this->sender_id,'title' => $this->title,'message'=>$this->message,'link' => $this->link];
}

}