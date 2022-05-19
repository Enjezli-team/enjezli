<?php

namespace App\Events;

//use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
//use Illuminate\Broadcasting\PresenceChannel;
//use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatEvent  implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
     public $message;
     public $sender_id;
     public $receiver_id;
     public $recever_name;
     public $sender_name;
    

    public function __construct($data=[])
    {
      $this->message=$data['message'];
     $this->sender_id=$data['sender_id'];
   
     $this->receiver_id=$data['receiver_id'];
     $this->recever_name=$data['recever_name'];
     $this->sender_name=$data['sender_name'];
     

               }
               
               

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    
    public function broadcastOn()
    {
       // return new Channel('sss');
       return ['chat'];
    }
    public function broadcastAs() {

        return 'chat';
        
        }
       public function broadcastWith()
{
   return ['sender_id'=> $this->sender_id,'message'=>$this->message,'receiver_id'=>$this->receiver_id,'sender_name'=>$this->sender_name,'recever_name'=>$this->recever_name];
}

}