<?php

namespace App\Http\Controllers\website;

use App\Models\Profile;


use App\Http\Controllers\Controller;
use App\Http\Controllers\NotificationController;
use App\Models\Role;
use App\Models\Roleuser;
use App\Models\Skill;
use App\Models\user;
use App\Models\userSkill;
use App\Models\UserWork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    //show providers
    public function index()
    {
        $profiles = Roleuser::where([['role_id', 2]])->get();
        foreach ($profiles as $profile) {
            $profile->user['ratings'] = $profile->user->sal_review_to()->avg('rate');
        }
        return view('website.users.profile.index')->with('data', $profiles);
    }

    //show one provider
    public function provider_data($id)
    {
        return view('website.users.profile.provider_details', ['data' => user::find($id)]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Profile::where('user_id', Auth::user()->id)->value('id') == "") {
            return view('website.users.profile.create', ['skills' => Skill::all(), 'roles' => Role::where('name', '<>', 'admin')->get()]);
        } else {
            $profile = Profile::find(Auth::user()->id);

            return redirect('profiles/' . Auth::user()->id)->with('completed', 'it has been saved!');
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::validate($request->all(), [

            // 'image'=>['mimes:jpg,png,jpeg','size:512'],
            'phone' => ['required', 'digits:14'],
            'country' => ['required'],
            'major' => [''],
            'role' => ['required'],
            'tweeter' => ['url'],
            'facebook' => ['url'],
            'github' => ['url'],
            'Job_title' => [''],
            'describe' => ['required', 'min:50 ']
        ], [
            'phone.required' => 'يرجى ادخال رقم التلفون ',
            'phone.digits' => 'يرجى ادخال رقم التلفون ',

            'country.required' => 'يرجى ادخال الدولة ',
            'role.required' => 'يرجى ادخال نوع الاستخدام ',
            //'major.required'=>'يرجى ادخال الاسم التخصص',
            //'Job_title.required'=>'يرجى ادخال المسمي الوظيفي ',
            'describe.required' => 'يرجى ادخال وصف عنك',
            'tweeter.url' => 'يرجى ادخال عنوان حساب تويتر بشكل صحيح ',
            'facebook.url' => 'يرجى ادخال عنوان حساب فيسبوك بشكل صحيح ',
            'github.url' => 'يرجى ادخال عنوان حساب جيت هب بشكل صحيح ',
            // 'image.size'=>'حجم الصوره يجب ان يكون اقل من 512 كيلوبايت',
            // 'image.mimes'=>'jpg او png او jpeg يجب ان تكون الصوره من صيغة',
            'describe.min' => 'يجب ان يكون الوصف اكثر  من 70 حرف',
            'phone.required' => ' يرجى ادخال رقم التلفون بشكل صحيح حجمه 14رقم   ',
        ]);
        if ($request->image) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        } else {
            $imageName = 'user_avater.png';
        }
        user::where('id', Auth::user()->id)->update(['image' => $imageName]);

        $profile = profile::create([
            'phone' => $request->phone, 'gander' => $request->gander, 'birth_date' => $request->birth_date,
            'country' => $request->country, 'major' => $request->major, 'user_id' => Auth::user()->id,
            'Job_title' => $request->Job_title, 'image' => $imageName, 'description' => $request->describe, 'facebook' => $request->facebook, 'tweeter' => $request->tweeter, 'github' => $request->github
        ]);
        foreach ($request->skills as $skill) {
            // return response($request->skills);
            // print_r($request->skills);

            $userSkill = new userSkill;
            $userSkill->user_id = Auth::user()->id;
            $userSkill->skill_id = $skill;
            $userSkill->save();
        }
        if (sizeof($request->role) > 0) {
            foreach ($request->role as $r) {
                Auth::user()->attachRole($r);
            }
            return redirect('profiles/' . Auth::user()->id)->with('completed', 'it has been saved!');
            //  if(sizeof($request->skills)>0){
            //     foreach($request->skills as $s){
            //     userSkill::create(['skill_id'=>$s,'user_id'=>Auth::user()->id]);

            //     }


        }


        return redirect()->route('profiles.show', Auth::user()->id)->with('success', '  تم حفظ البياتات بنجاج');
    }


    public function show($id)
    {
        return view('website.users.profile.show', ['data' => user::find($id)]);
    }

    public function edit($id)
    {
        //
        $profile = Profile::find($id);

        return view('website.users.profile.edit', ['data' => $profile, 'skills' => Skill::all(), 'roles' => Role::where('name', '<>', 'admin')->get()]);
    }

    public function update(Request $request, $id)
    {
        Validator::validate($request->all(), [

            //'image'=>['mimes:jpg,png,jpeg','size:512'],
            'phone' => ['required', 'digits:14'],
            //'country'=>['required'],
            'major' => [''],
            // 'role'=>['required'],
            'tweeter' => ['url'],
            'facebook' => ['url'],
            'github' => ['url'],
            'Job_title' => [''],
            'describe' => ['required', 'min:50']
        ], [
            'phone.required' => 'يرجى ادخال رقم التلفون ',
            //'country.required'=>'يرجى ادخال الدولة ',
            // 'role.required'=>'يرجى ادخال نوع الاستخدام ',
            //'major.required'=>'يرجى ادخال الاسم التخصص',
            //'Job_title.required'=>'يرجى ادخال المسمي الوظيفي ',
            'describe.required' => 'يرجى ادخال وصف عنك',
            'tweeter.url' => 'يرجى ادخال عنوان حساب تويتر بشكل صحيح ',
            'facebook.url' => 'يرجى ادخال عنوان حساب فيسبوك بشكل صحيح ',
            'github.url' => 'يرجى ادخال عنوان حساب جيت هب بشكل صحيح ',
            // 'image.size'=>'حجم الصوره يجب ان يكون اقل من 512 كيلوبايت',
            //'image.mimes'=>'jpg او png او jpeg يجب ان تكون الصوره من صيغة',
            'describe.min' => 'يجب ان يكون الوصف اكثر  من 70 حرف',
            'phone.required' => ' يرجى ادخال رقم التلفون بشكل صحيح حجمه 14رقم   ',
        ]);
        if ($request->image!="") {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        } else {
            $imageName = $request->imageold;
        }
        user::where('id', Auth::user()->id)->update(['name' => $request->name,'image'=>$imageName]);
        Profile::where('id', $id)->update([
            'phone' => $request->phone, 'gander' => $request->gander, 'birth_date' => $request->birth_date,
            'country' => $request->country, 'major' => $request->major, 'user_id' => Auth::user()->id,
            'Job_title' => $request->Job_title, 'facebook' => $request->facebook, 'tweeter' => $request->tweeter, 'github' => $request->github, 'description' => $request->describe
        ]);
        if ($request->has('skills')) {
            userSkill::where('user_id', Auth::user()->id)->delete();
            foreach ($request->skills as $skill) {
                $userSkill = new userSkill;
                $userSkill->user_id = Auth::user()->id;
                $userSkill->skill_id = $skill;
                $userSkill->save();
            }
            if(Auth::check()){
                $data=['receiver_id'=>Auth::user()->id,'sender_id'=>Auth::user()->id,'title'=>'title of notify','is_read'=> 0,'message'=>'لقد قمت بتعديل ملفك الشخصي','link'=> '/home'];
          
                NotificationController::hiNotification($data);
              }
        }
        return redirect('profiles/' . Auth::user()->id)->with('completed', 'تم تعديل البياتات بنجاج');
    }

    public function destroy($id)
    {
        userSkill::where('id', $id)->delete();
        return redirect()->back()->with(['status' => ' تم حذف البيانات ']);
    }
}
