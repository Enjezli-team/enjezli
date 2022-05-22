<?php

namespace App\Http\Controllers\Auths;

use App\Http\Controllers\Controller;
use App\Mail\welcomeEmail;
use App\Models\Profile;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Expr\New_;

class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    } 
    public function registration ()
    {
        return view('auth.register');
    }  
    public function verify ($token)
    {
        $user=User::where('remember_token',$token)->first();
        if($user){
            $user->email_verified_at=Carbon::now()->timestamp;
            $user->save();
            Auth::login($user);
            return redirect('/login');

        }
    } 
    public function verifyy ()
    {
       
        return view('auth.verify');
    } 
    
    public function forgit_password ()
    {
        return view('auth.conf');
    }  
    public function reset_password ()
    {
        return view('auth.reset_password');
    } 
    public function updatePassword(Request $request)
{
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
            'new_password_confirmation'=> 'required',
        ],[
            'old_password.required'=>'يرجى ادخال كلمة السر القديمه  ',
            'new_password.required'=>'يرجى ادخال السر الجديده ',
            'new_password.confirmed' => 'كلمة السر غير مطابقة .',

                     
        ]);


        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "كلمة السر القديمة خطا!");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect('/login')->with("success", "تم تغير كلمة السر بنجاح!");
}
    public function customLogin(Request $request)
    {
       $validatedData = $request->validate([
            'password' => 'required',
            'email' => 'required|email',
        ], [
            'password.required' => 'يجب ادخال كلمة السر.',
            'email.required' => 'يجب ادخال البريد الالكتروني .',
        ]);

        $credentials = $request->only('email','password');
        $credentials = ['email'=>$request->email,'password'=>$request->password,'status'=>1,'is_blocked'=>0];
        if (Auth::attempt($credentials)) {
            if(Auth::user()->type==2 && Auth::user()->hasRole(['seeker','provider']) && Auth::user()->email_verified_at!=Null){
                $profile=Profile::where('user_id',Auth::user()->id)->value('id');
                if($profile==''){
            return redirect()->intended('/profiles/create')->with('success',"يرجى اكمال ملفك الشخصي");
                }else{
                    return redirect()->intended('profiles/'.Auth::user()->id)->with('success'," مرحبا بك");
                }

            }if(Auth::user()->type==1 && Auth::user()->hasRole(['Admin'])){
                //check profile
               return redirect()->intended('/admin/index')->withSuccess('success',"تاكد من كلمة السر او بريدك الالكتروني");
                }else{
                    Session::flush();
        Auth::logout();

        return Redirect('login')->with('error',"تاكد من كلمة السر او بريدك الالكتروني");
                }

        }
        return redirect('/login')->with('error',"تاكد من كلمة السر او بريدك الالكتروني");

    }
    public function create(Request $request)
    {
      
        $validatedData = $request->validate([
            'name' => 'required',
            'password' => 'required|confirmed',
            'email' => 'required|email|unique:users',
         'password_confirmation' => 'required',
        ], [
            'name.required' => 'يجب ادخال الاسم',
            ' password_confirmation.confirmed' => '   كلمة السر غير مطابقة.',

            'password.required' => 'يجب ادخال كلمة السر.',
            'password_confirmation.required' => 'يجب ادخال كلمة السر.',

            'password.confirmed' => 'كلمة السر غير مطابقة .',
            'email.required' => 'يجب ادخال البريد الالكتروني .',
            'email.email' => 'يجب ادخال البريد الالكتروني بشكل صحيح .',
            'email.unique' => 'هذا البريد موجود  .',

           
        ]);

      
       $token = Str::uuid();
       $u=new User();
       $u->password = Hash::make($request->password);
       $u->name=$request->name;
       $u->email=$request->email;
       $u->remember_token=$token;
       $u->type=2;
       $u->status=1;
        if($u->save()){
        $email_data=array('full'=>$request->name,'url'=>URL::to('/')."/verify_email/".$token);
        Mail::to($request->email)->send(New welcomeEmail($email_data));

        return redirect('verify');
    }
    return redirect('register');
    }    
    public function check_email ($id)
    {
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
