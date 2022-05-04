<?php

namespace App\Http\Controllers\website;

use App\Models\Profile;


use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\Skill;
use App\Models\User;
use App\Models\UserSkill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public function index()
    { $profile = profile::all();
        return view('website.users.profile.index', ['data' => $profile]);
        return view('website.users.profile.index',['skills'=>Skill::all(),'roles'=>Role::where('name','<>','admin')->get()]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('website.users.profile.create',['skills'=>Skill::all(),'roles'=>Role::where('name','<>','admin')->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         Validator::validate($request->all(),[
            
           // 'image'=>['mimes:jpg,png,jpeg','size:512'],
            'phone'=>['required','regex:/^(009677)[0-9]{8}$/'],
            'country'=>['required'],
            'major'=>[''],
            'role'=>['required'],
            'tweeter'=>['url'],
            'facebook'=>['url'],
            'github'=>['url'],
            'Job_title'=>[''],
            'describe'=>['required','min:50 ']
        ],[
            'phone.required'=>'يرجى ادخال رقم التلفون ',
            'country.required'=>'يرجى ادخال الدولة ',
            'role.required'=>'يرجى ادخال نوع الاستخدام ',
            //'major.required'=>'يرجى ادخال الاسم التخصص',
            //'Job_title.required'=>'يرجى ادخال المسمي الوظيفي ',
            'describe.required'=>'يرجى ادخال وصف عنك',
            'tweeter.url'=>'يرجى ادخال عنوان حساب تويتر بشكل صحيح ',
            'facebook.url'=>'يرجى ادخال عنوان حساب فيسبوك بشكل صحيح ',
            'github.url'=>'يرجى ادخال عنوان حساب جيت هب بشكل صحيح ',
           // 'image.size'=>'حجم الصوره يجب ان يكون اقل من 512 كيلوبايت',
           // 'image.mimes'=>'jpg او png او jpeg يجب ان تكون الصوره من صيغة',
            'describe.min'=>'يجب ان يكون الوصف اكثر  من 70 حرف', 
            'phone.required'=>' يرجى ادخال رقم التلفون بشكل صحيح حجمه 14رقم   ',           
        ]);
        if($request->image){
       $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);
        }else{
            $imageName = 'user_avater.png';  
        }
            User::where('id',Auth::user()->id)->update(['image'=>$imageName]);
      
       $profile = profile::create([
        'phone'=>$request->phone,'gander'=>$request->gander,'birth_date'=>$request->birth_date,
        'country'=>$request->country,'major'=>$request->major,'user_id'=>Auth::user()->id,
        'Job_title'=>$request->Job_title,'image'=>$imageName,'description'=>$request->describe
        ,'facebook'=>$request->facebook,'tweeter'=>$request->tweeter,'github'=>$request->github]);
         return redirect('profiles')->with('completed', 'it has been saved!');
         if(sizeof($request->skills)>0){
            foreach($request->skills as $s){
            UserSkill::create(['skill_id'=>$s,'user_id'=>Auth::user()->id]);
            }
        }
        if(sizeof($request->role)>0){
            foreach($request->role as $r){
                RoleUser::create(['role_id'=>$r,'user_id'=>Auth::user()->id,'user_type'=>'App/Model/User']);
            }
        }

        return redirect('profiles/'.Auth::user()->id)->with('success', '  تم حفظ البياتات بنجاج');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('website.users.profile.index',['data'=>User::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $profile=Profile::find($id);
        return view('website.users.profile.edit',['data'=>$profile,'skills'=>Skill::all(),'roles'=>Role::where('name','<>','admin')->get()]);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Validator::validate($request->all(),[
            
            //'image'=>['mimes:jpg,png,jpeg','size:512'],
            'phone'=>['required','digits:14'],
            //'country'=>['required'],
            'major'=>[''],
            'role'=>['required'],
            'tweeter'=>['url'],
            'facebook'=>['url'],
            'github'=>['url'],
            'Job_title'=>[''],
            'describe'=>['required','min:50 ']
        ],[
            'phone.required'=>'يرجى ادخال رقم التلفون ',
            'country.required'=>'يرجى ادخال الدولة ',
            'role.required'=>'يرجى ادخال نوع الاستخدام ',
            //'major.required'=>'يرجى ادخال الاسم التخصص',
            //'Job_title.required'=>'يرجى ادخال المسمي الوظيفي ',
            'describe.required'=>'يرجى ادخال وصف عنك',
            'tweeter.url'=>'يرجى ادخال عنوان حساب تويتر بشكل صحيح ',
            'facebook.url'=>'يرجى ادخال عنوان حساب فيسبوك بشكل صحيح ',
            'github.url'=>'يرجى ادخال عنوان حساب جيت هب بشكل صحيح ',
           // 'image.size'=>'حجم الصوره يجب ان يكون اقل من 512 كيلوبايت',
            //'image.mimes'=>'jpg او png او jpeg يجب ان تكون الصوره من صيغة',
            'describe.min'=>'يجب ان يكون الوصف اكثر  من 70 حرف', 
            'phone.required'=>' يرجى ادخال رقم التلفون بشكل صحيح حجمه 14رقم   ',           
        ]);
        if($request->image){
       $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);
        }else{
            $imageName = 'user_avater.png';  
        }
            User::where('id',Auth::user()->id)->update(['image'=>$imageName]);
      
        $proprofile =Profile::where('id',$id)->update([
        'phone'=>$request->phone,'gander'=>$request->gander,'birth_date'=>$request->birth_date,
        'country'=>$request->country,'major'=>$request->major,'user_id'=>Auth::user()->id,
        'Job_title'=>$request->Job_title,'description'=>$request->description
        ,'facebook'=>$request->facebook,'tweeter'=>$request->tweeter,'github'=>$request->github,]);
        
      
         return redirect('profiles/'.Auth::user()->id)->with('completed', 'تم تعديل البياتات بنجاج');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
