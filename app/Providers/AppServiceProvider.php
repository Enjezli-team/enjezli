<?php

namespace App\Providers;


use App\Models\Notification;
use View;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;


use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
    
        Schema::defaultStringLength(191);
        View::composer('*', function($view)
        {
            if(Auth::check()){
                $notification_c = Notification::where([['receiver_id',Auth::user()->id],['is_read',0]])->orderBy('created_at','desc')->take(5)->get();
              //  $messages_c = Chat::where([['status',1],['resiver_id',Auth::user()->id]])->orderBy('created_at','desc')->count();
            }else{
                $notification_c =[];
                
            }
            $notification = Notification::orderBy('created_at','desc')->get();
            $view->with(['notifications'=>$notification_c]);
        });
     
    }
}
