<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\NotificationController;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      if(Auth::check()){
      $profile = user::with(['sal_works','sal_skills.sal_skill_u','sal_profile'])->find(Auth::user()->id); 
        return view('website.layouts.home')->with('data' , $profile);}
        else
          return view('website.layouts.home');
        }
    

    public function notify()
    {
      if(Auth::check()){
      $data=['receiver_id'=>13,'sender_id'=>Auth::user()->id,'title'=>'title of notify','is_read'=> 0,'message'=>'mass of notify','link'=> '/home'];

      NotificationController::hiNotification($data);
    }

    }
 
}
