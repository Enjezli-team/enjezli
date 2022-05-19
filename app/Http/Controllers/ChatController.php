<?php

namespace App\Http\Controllers;
use App\Events\chatEvent;
use App\Models\chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{

    public function chats(){
        $chats=chat::with(['receiver_chat','sender_chat'])->get();
  
        return view('chats')->with('chat' , $chats);


    }
    public function chats_with($user){
        $chats=chat::where([['sender_id',Auth::user()->id],['receiver_id',$user]])
                            ->orWhere([['sender_id',$user],['receiver_id',Auth::user()->id]])
                            ->with(['receiver_chat','sender_chat'])->get();
  
        return view('chats')->with(['chat'=>$chats,'user'=>$user]);


    }
    public function chat(){
        $chats=chat::with(['receiver_chat','sender_chat'])->get();
  
        return view('chat')->with('chat' , $chats);


    }
    public function save(Request $request){
        $data=['message'=>$request->message,
        'sender_id'=>Auth::user()->id,
        'receiver_id'=>$request->receiver_id];
        $dataa=$data['message'];
        $chats = chat::create([
            'message'=>$request->message,
            'sender_id'=>Auth::user()->id,
            'receiver_id'=>$request->receiver_id,
        ]);
           $data['recever_name']=User::whereId($request->receiver_id)->pluck('name')->first();
           $data['sender_name']=User::whereId(Auth::user()->id)->pluck('name')->first();
            event(new ChatEvent($data));

    }
   
}
