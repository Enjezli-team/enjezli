<?php

namespace App\Events;

//use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
//use Illuminate\Broadcasting\PresenceChannel;
//use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProblemEvent  implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
     public $message;
     public $sender_id;
     public $receiver_id1;
     public $receiver_id2;
     public $recever_name1;
     public $recever_name2;
     public $sender_name;
    

    public function __construct($data=[])
    {
      $this->message=$data['message'];
     $this->sender_id=$data['sender_id'];
   
     $this->receiver_id1=$data['receiver_id1'];
     $this->receiver_id2=$data['receiver_id2'];
     $this->recever_name1=$data['recever_name'];
     $this->recever_name2=$data['recever_name2'];
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
       return ['chatProblem'];
    }
    public function broadcastAs() {

        return 'chatProblem';
        
        }
       public function broadcastWith()
{
   return ['sender_id'=> $this->sender_id,'message'=>$this->message,'receiver_id1'=>$this->receiver_id1,'receiver_id2'=>$this->receiver_id2,'sender_name'=>$this->sender_name,'recever_name1'=>$this->recever_name1,'recever_name2'=>$this->recever_name2];
}

}