<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function home()
    {
        return view('Admin.home');
    }

    public function users(Request $request)
    {
        
        // $users = User::all();
        // dd(request('search'));

        // return view('Admin.users.users', [
        //     'users' =>User::latest()->filter(request('search'))->get()
        // ]);
        $search =  $request->input('q');
        $select = $request->get('selecting_role');
        if($search!=""){
            $users = User::where(function ($query) use ($search){
                $query->where('name', 'like', '%'.$search.'%')
                    ->orWhere('email', 'like', '%'.$search.'%');
                    
            })
            ->paginate(2);
            $users->appends(['q' => $search]);
        }
        elseif($select){
            $users = User::where(function ($query) use ($select){
                $query->whereHas('role_id',$select);
                    
            })
            ->paginate(6);
            $users->appends(['selecting_role' => $select]);
        }
        else{
        //  $users = User::with(['sal_skills.sal_skill_u']);

            $users = User::paginate(6);
        }
        return View('Admin.users.users')->with('users',$users);
    }  


}
