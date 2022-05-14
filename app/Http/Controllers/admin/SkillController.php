<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.Skills.index',['data'=>Skill::get()]);
    }

    public function create()
    {
        return view('admin.pages.Skills.create',['parent'=>Skill::get()]);

    }

    public function store(Request $request)
    {
        Validator::validate($request->all(),[

            'name'=>['required'],
            'parent'=>['required'],

         ],[

            'name.required'=>' يرجى ادخال الاسم بشكل صحيح   ',
            'parent.required'=>' يرجى اختيار اب  ',
        ]);

         $u=new Skill();
         $u->title=$request->name;
         $u->parent_id=$request->parent;
         $u->status=1;
         $u->save();


          return redirect('admin/skills')->with('success','Skill successfully created.');

    }
    public function change_status($SkillId,$blockValue)
    {
        $Skill = Skill::where('id',$SkillId)->update(['status'=>$blockValue]);
        $Skill = Skill::where('parent_id',$SkillId)->update(['status'=>$blockValue]);
         // redirect
         return back()->with('success','Skill data successfully updated.');

    }

    public function search(Request $request)
    {
        Validator::validate($request->all(),[

            'value' => 'required',

         ],[
            'value.required' => 'يجب ادخال قيمه للبحث بشكل صحيح كأسم او رقم او ايميل   .',
         ]);
            $search=Skill::query()
            ->orWhere('title', 'LIKE', "%{$request->value}%")
            ->orWhere('id', 'LIKE', "%{$request->value}%")
            ->get();
            return view('admin.pages.Skills.index',['data'=>$search]);

    }

    public function edit($id)
    {
        return view('admin.pages.Skills.edit',['data'=>Skill::find($id),'parent'=>Skill::get()]);
    }


    public function update(Request $request, $id)
    {
        Validator::validate($request->all(),[

            'name'=>['required'],
            'parent'=>['required'],

         ],[

            'name.required'=>' يرجى ادخال الاسم بشكل صحيح   ',
            'parent.required'=>' يرجى اختيار اب  ',
        ]);

         $u= Skill::where('id',$id)->update(['parent_id'=>$request->parent,'title'=>$request->name,]);
          return redirect('admin/skills')->with('success','Skill successfully updated.');

    }
    public function destroy($id)
    {
        $Skill = Skill::find($id);
        $Skill->delete();
         // redirect
         return back()->with('success','Skill successfully deleted.');
    }
}
