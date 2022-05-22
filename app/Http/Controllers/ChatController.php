<?php

namespace App\Http\Controllers;
use App\Events\chatEvent;
use App\Events\ProblemEvent;
use App\Models\chat;
use App\Models\User;
use App\Models\chatProblem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{

    public function chats(){
        $chats=chat::with(['receiver_chat','sender_chat'])->get();
  
        return view('chats')->with('chat' , $chats);


    }
    public function chats_with($user,$pro_id){
        $type=chat::where('type_id',$pro_id)->pluck('type')->first();
        if($type)
        {
        $chats=chat::where('type_id',$pro_id)
        ->with(['receiver_chat','sender_chat'])->get();
        return view('website.users.project.chats')->with(['chat'=>$chats,'user'=>$user,'project_id'=>$pro_id,'type'=>2]);

    }
        else
        {$chats=chat::where([['sender_id',Auth::user()->id],['receiver_id',$user]])
                            ->orWhere([['sender_id',$user],['receiver_id',Auth::user()->id]])
                            ->with(['receiver_chat','sender_chat'])->get();
                            return view('website.users.project.chats')->with(['chat'=>$chats,'user'=>$user,'project_id'=>$pro_id,'type'=>0]);
        }

    }
    public function chat(){
        $chats=chat::with(['receiver_chat','sender_chat'])->get();
  
        return view('chat')->with('chat' , $chats);


    }
    public function save(Request $request){
       
       if($request->receiver_id2)
    {
           if(Auth::user()->id==$request->receiver_id)
           {
               $sender_id=Auth::user()->id;
               $receiver_id=$request->receiver_id2;
               $receiver_id2=$request->receiver_id3;
           }
           else if(Auth::user()->id==$request->receiver_id2)
           {
               $sender_id=Auth::user()->id;
               $receiver_id=$request->receiver_id;
               $receiver_id2=$request->receiver_id3;
           }
           else{
            $sender_id=Auth::user()->id;
            $receiver_id=$request->receiver_id;
            $receiver_id2=$request->receiver_id2;
           }
        
        $chats=chatProblem::create([
            'type'=>2,
            'type_id'=>$request->id,
            'receiver_id1'=>$receiver_id,
            'receiver_id2'=>$receiver_id2,
            'sender_id'=>$sender_id,
            'message'=>$request->message,
      ]);
      $data['sender_id']=$sender_id;
      $data['message']=$request->message;
      $data['receiver_id1']=$receiver_id;
      $data['receiver_id2']=$receiver_id2;
      $data['recever_name']=User::whereId($receiver_id)->pluck('name')->first();
      $data['recever_name2']=User::whereId($receiver_id2)->pluck('name')->first();
      $data['sender_name']=User::whereId(Auth::user()->id)->pluck('name')->first();
// dd($data);
       event(new ProblemEvent($data));
    }
       else{
        $data=['message'=>$request->message,
        'sender_id'=>Auth::user()->id,
        
        'receiver_id'=>$request->receiver_id];
        $chats = chat::create([
            'message'=>$request->message,
            'type'=>0,
            'type_id'=>$request->id,
            'sender_id'=>Auth::user()->id,
            'receiver_id'=>$request->receiver_id,
        ]);
        $dataa=$data['message'];
        $data['recever_name']=User::whereId($request->receiver_id)->pluck('name')->first();
        $data['sender_name']=User::whereId(Auth::user()->id)->pluck('name')->first();
         event(new ChatEvent($data));
       }
       
          
      
    }
   public function chats_complaint($pro_id)
   {
       $id =User::whereHas('roles',function($q){
              $q->where('name','Admin');
       })->pluck('id')->first();
       $chat=chat::where('type_id',$pro_id)->get();
         foreach($chat as $data){
            chatProblem::create([
                'type'=>2,
                'type_id'=>$pro_id,
                'receiver_id1'=>$data->receiver_id,
                'receiver_id2'=>$id,
                'sender_id'=>$data->sender_id,
                'message'=>$data->message,
          ]);
         }
    $chats = chat::where('type_id',$pro_id)->update([
          'type'=>2
    ]);
    if($chats)
    return back()->with('success','تم رفع الشكوى للادمن للفصل');
    else
    return back()->with('errors','حدث خطا ما');

   }
   public function chats_problem($pro_id)
   {
    $type=chat::where('type_id',$pro_id)->pluck('type')->first();
    if($type)
    {
    $chats=chatProblem::where('type_id',$pro_id)
    ->with(['receiver_chat','sender_chat','receiver_chat2'])->get();
    return view('website.users.project.chatProblem')->with(['chat'=>$chats,'project_id'=>$pro_id,'type'=>$type]);

} 
   }
   public function chats_solve($pro_id){
    $chats = chat::where('type_id',$pro_id)->update([
        'type'=>3
  ]);
  $chats = chatProblem::where('type_id',$pro_id)->update([
    'type'=>3
]);
return back()->with(['success'=>'تم حل النزاع','type'=>3]);

   }
}
