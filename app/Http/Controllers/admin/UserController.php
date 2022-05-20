<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\welcomeEmailAdmin;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.Users.index',['data'=>User::where('type',1)->get()]);
    }

    public function user_upon_status($type=2)
    {   
        return view('admin.pages.Users.index',['data'=>User::where('type',$type)->get()]);
    }

    // public function provider()
    // {
    //     return view('admin.pages.Users.provider',['data'=>User::where('type',2)->get()]);
    // }
    // public function seeker()
    // {
    //     return view('admin.pages.Users.seeker',['data'=>User::where('type',3)->get()]);
    // }

    public function create()
    {
        return view('admin.pages.Users.create');

    }

    public function store(Request $request)
    {
        // echo "hello";
        Validator::validate($request->all(),[

            'email' => 'required|email|unique:users',
             'name'=>['required'],

         ],[
            'email.required' => 'يجب ادخال البريد الالكتروني .',
            'email.required' => 'يجب ادخال البريد الالكتروني بشكل صحيح .',
            'email.unique' => 'هذا البريد موجود  .',

            'name.required'=>' يرجى ادخال الاسم بشكل صحيح   ',
        ]);
         if($request->image){
        $imageName = time().'.'.$request->image->extension();
         $request->image->move(public_path('images'), $imageName);
         }else{
             $imageName = 'user_avater.png';
         }
         $password='password';
         $u=new User();
         $u->password = Hash::make($password);
         $u->name=$request->name;
         $u->email=$request->email;
         $u->remember_token="";
         $u->image=$imageName;
         $u->type=1;
         $u->status=1;

          if($u->save()){
          $email_data=array('name'=>$request->name,'email'=>$request->email,'password'=>$password);
          Mail::to($request->email)->send(New welcomeEmailAdmin($email_data));
        }
          return redirect('admin/users')->with('success','user successfully deleted.');;

    }
    public function blockUser($userId,$blockValue)
    {
        $user = User::where('id',$userId)->update(['is_blocked'=>$blockValue]);
         // redirect
         return back()->with('success','user data successfully updated.');

    }

    public function search(Request $request)
    {
        Validator::validate($request->all(),[

            'value' => 'required',

         ],[
            'value.required' => 'يجب ادخال قيمه للبحث بشكل صحيح كأسم او رقم او ايميل   .',
         ]);
            $search=User::query()
            ->orWhere('email', 'LIKE', "%{$request->value}%")
            ->orWhere('name', 'LIKE', "%{$request->value}%")
            ->orWhere('id', 'LIKE', "%{$request->value}%")
            ->get();
            return view('admin.pages.Users.index',['data'=>$search]);

    }

    public function edit($id)
    {
        return view('admin.pages.Users.edit',['data'=>User::find($id)]);
    }


    public function update(Request $request, $id)
    {
        Validator::validate($request->all(),[

            'email' => 'required|email',
             'name'=>['required'],

         ],[
            'email.required' => 'يجب ادخال البريد الالكتروني .',
            'email.required' => 'يجب ادخال البريد الالكتروني بشكل صحيح .',
            'email.unique' => 'هذا البريد موجود  .',

            'name.required'=>' يرجى ادخال الاسم بشكل صحيح   ',
        ]);
         if($request->image){
        $imageName = time().'.'.$request->image->extension();
         $request->image->move(public_path('images'), $imageName);
         }else{
             $imageName = $request->imageold;
         }
         $password='password';
         $u= User::where('id',$id)->update(['email'=>$request->email,'name'=>$request->name,'image'=>$imageName]);
          return redirect('admin/users')->with('success','user successfully updated.');


    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
         // redirect
         return back()->with('success','user successfully deleted.');
    }
}
