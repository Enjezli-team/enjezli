<?php

namespace App\Http\Controllers\Auths;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }  
      
    public function customLogin(Request $request)
    {
        // $request->validate([
        //     'email' => 'required',
        //     'password' => 'required',
        // ]);
       /* $validatedData = $request->validate([
            'password' => 'required|',
            'email' => 'required|email',
        ], [
            'password.required' => 'يجب ادخال كلمة السر.',
            'email.required' => 'يجب ادخال البريد الالكتروني .',
        ]);*/
   
        $credentials = $request->only('email','password');
        $credentials = ['email'=>$request->email,'password'=>$request->password,'status'=>1,'is_blocked'=>0];
        if (Auth::attempt($credentials)) {
            if(Auth::user()->type==2){
                $profile=Profile::where('user_id',Auth::user()->id)->value('id');
                if($profile==''){
            return redirect()->intended('/profiles/create')->withSuccess('Signed in');
                }else{
                    return redirect()->intended('profiles/'.Auth::user()->id)->withSuccess('Signed in');
                }

            }if(Auth::user()->type==1){
                //check profile
               return redirect()->intended('/admin')->withSuccess('Signed in');
                }

        }
        return redirect('/login')->withSuccess(' faild');

    }

   
    public function create(Request $request)
    {
      
        $validatedData = $request->validate([
            'name' => 'required',
            'password' => 'required|min:8',
            'email' => 'required|email|unique:users',
           // 'password_confirmation' => 'required|confirmed|min:8',
        ], [
            'name.required' => 'يجب ادخال الاسم',
            'password.required' => 'يجب ادخال كلمة السر.',
            'email.required' => 'يجب ادخال البريد الالكتروني .',
            'email.required' => 'يجب ادخال البريد الالكتروني بشكل صحيح .',
            'email.unique' => 'هذا البريد موجود  .',

           
        ]);

       $password = Hash::make($request->password);
        $user = User::create(['name'=>$request->name,'email'=>$request->email,'password'=>$password,'status'=>1,'type'=>2]);
    return Redirect('login');

    }    
    
    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}
