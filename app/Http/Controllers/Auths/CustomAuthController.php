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
    public function registration()
    {
        return view('auth.register');
    }
    public function verify($token)
    {
        $user = User::where('remember_token', $token)->first();
        if ($user) {
            $user->email_verified_at = Carbon::now()->timestamp;
            $user->save();
            Auth::login($user);
            // return redirect('profiles/create/'.Auth::user()->id);
            return redirect('/login');
        }
        // return view('auth.verify');
    }
    public function verifyy()
    {

        return view('auth.verify');
    }

    public function forgit_password()
    {
        return view('auth.conf');
    }
    // public function forgit_check_email(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email|exists:users',
    //     ]);

    //     $token = Str::random(64);

    //     $user = User::where('email',$request->email)->update([
    //         'email' => $request->email, 
    //         'remember_token' => $token, 
    //         'created_at' => Carbon::now()
    //       ]);

    //     Mail::send('forgit_check_email', ['remember_token' => $token], function($message) use($request){
    //         $message->to($request->email);
    //         $message->subject('Reset Password');
    //     });

    //     return back()->with('message', 'We have e-mailed your password reset link!');
    // }
    public function reset_password()
    {
        return view('auth.reset_password');
    }
    public function updatePassword(Request $request)
    {
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
            'new_password_confirmation' => 'required',
            //    ' new_password_confirmation'=> 'required|confirmed',
        ], [
            'old_password.required' => 'يرجى ادخال كلمة السر القديمه  ',
            'new_password.required' => 'يرجى ادخال السر الجديده ',
            'new_password.confirmed' => 'كلمة السر غير مطابقة .',


        ]);


        #Match The Old Password
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with("error", "كلمة السر القديمة خطا!");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect('/login')->with("status", "تم تغير كلمة السر بنجاح!");
    }
    // public function forgit_check_email (Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'email' => 'required|email|exists:users',

    //     ], [
    //         'email.required' => 'يجب ادخال البريد الالكتروني .',
    //         'email.exists:users' => '  البريد الالكتروني غير موجود .',
    //         'email.email' => 'يجب ادخال البريد الالكتروني بشكل صحيح .',
    //     ]);
    //     $user_vertify=User::where('email',$request->email)->value('token');
    //     if($user_vertify !=""){
    //     return view('auth.changename');
    //     }else{
    //         return redirect('/forgit_password')->withSuccess('enter email correctly');
    //     }
    // }   
    public function customLogin(Request $request)
    {
        // $request->validate([
        //     'email' => 'required',
        //     'password' => 'required',
        // ]);
        $validatedData = $request->validate([
            'password' => 'required',
            'email' => 'required|email',
        ], [
            'password.required' => 'يجب ادخال كلمة السر.',
            'email.required' => 'يجب ادخال البريد الالكتروني .',
            'email.email' => 'يجب ادخال البريد الالكتروني بشكل صحيح .',

        ]);

        $credentials = $request->only('email', 'password');
        $credentials = ['email' => $request->email, 'password' => $request->password, 'status' => 1, 'is_blocked' => 0];
        if (Auth::attempt($credentials)) {
            if (Auth::user()->type == 2 && Auth::user()->email_verified_at != Null) {
                $profile = Profile::where('user_id', Auth::user()->id)->value('id');
                if ($profile == '') {
                    return redirect()->intended('/profiles/create')->withSuccess('Signed in');
                } else {
                    return redirect()->intended('profiles/' . Auth::user()->id)->withSuccess('Signed in');
                }
            }
            if (Auth::user()->type == 1) {
                //check profile
                return redirect()->intended('/admin')->withSuccess('Signed in');
            } else {
                Session::flush();
                Auth::logout();

                return Redirect('login');
            }
        }
        return redirect('/login')->with("failed", "ادخل البيانات بشكل صحيح   !");
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
        $u = new User();
        $u->password = Hash::make($request->password);
        $u->name = $request->name;
        $u->email = $request->email;
        $u->remember_token = $token;
        $u->type = 2;
        $u->status = 1;


        // $user = User::create(['name'=>$request->name,'email'=>$request->email,
        // 'password'=>$password,'status'=>1,'type'=>2,'remember_token'=>$token]);
        if ($u->save()) {
            $email_data = array('full' => $request->name, 'url' => URL::to('/') . "/verify_email/" . $token);
            Mail::to($request->email)->send(new welcomeEmail($email_data));

            /*  $to = $user['email'];
        $subject = "انجزلي";
        
        $message = "<b>مرحبا".$user['name']."</b>";
        $message .= "<h1>هذا رابط التحقق من حسابك اضغط عليه</h1>";
        $message .= "<a href='http://127.0.0.1:8000/check_email/".$user['id']."'>click here</a>";
        
        $header = "From: Your name <salmanalwageeh@gmail.com> \r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
        
        $retval = mail ($to,$subject,$message,$header);
        
        if( $retval == true ) {
           echo "Message sent successfully...";
        }else {
           echo "Message could not be sent...";
        }*/
            return redirect('verify');
        }
        return redirect('register');
    }
    public function check_email($id)
    {
        // $date=now();
        // $user_vertify=User::where('id',$id)->value('email_verified_at');
        // if($user_vertify ==null){
        // $user=tap(User::where('id',$id))->update(['email_verified_at'=>$date]);
        // Auth::login($user->first());
        // return redirect('/profiles/create')->withSuccess('vertifird');
        // }else{
        //     return redirect('/login')->withSuccess('login please');

        // }


    }

    public function dashboard()
    {
        if (Auth::check()) {
            return view('dashboard');
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
