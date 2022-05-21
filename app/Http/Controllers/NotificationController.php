<?php

namespace App\Http\Controllers;

use App\Events\NewEvent;
use Illuminate\Support\Facades\Auth;


use App\Models\Notification;
use App\Models\User;

use Illuminate\Http\Request;


use Illuminate\Notifications\ChannelManager;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public static function hiNotification($data)
    {
        $user = User::where('id', $data['sender_id'])->first();
        // return response($user);
        // $mesgeData = ['receiver_id' => $data['receiver_id'], 'sender_id' => $data['sender_id'], 'title' => $data['title'], 'is_read' => 0, 'message' => $data['message'], 'link' => $data['link']];
        $mesgeData = ['receiver_id' => $data['receiver_id'], 'sender_id' => $data['sender_id'], 'title' => $data['title'], 'is_read' => 0, 'message' => $data['message'], 'link' => $data['link'], 'sender_name' => $user->name];

        event(new NewEvent($mesgeData));
        $Notification = new Notification;
        $Notification->sender_id = $mesgeData['sender_id'];
        $Notification->receiver_id = $mesgeData['receiver_id'];
        $Notification->title = $mesgeData['title'];
        $Notification->message = $mesgeData['message'];
        $Notification->body = $mesgeData['link'];
        $Notification->save();
        return true;
    }
}
