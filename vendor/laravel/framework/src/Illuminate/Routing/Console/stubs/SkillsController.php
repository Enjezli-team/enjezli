<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Skills;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $skills = Skills::all();
        
        return view('Admin.skills.skills', compact('skills','skills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        return view('Admin.skills.create_skills');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title'=>'required',
        ]);
 
        $skills = new Skills([
            'title' => $request->get('title')
        ]);
 
        $skills->save();
        return redirect('/admin/skills')->with('success', 'skill has been added');//here
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Skills  $skills
     * @return \Illuminate\Http\Response
     */
    public function show(Skills $skills)
    {
        //
        
        return view('admin.skills.skills',compact('skills'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Skills  $skills
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $skills=Skills::find($id);
        return view('admin.skills.update_skills')
        ->with('skills',$skills);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Skills  $skills
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $skills=Skills::find($id);
        $skills->title=$request->title;
        if($skills->save())
        return redirect()->route('skills')->with(['success'=>'skill updated successful']);
        return redirect()->back()->with(['error'=>'can not update skill ']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Skills  $skills
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skills $skills,$id)
    {
        //
        $skills->whereId($id)->delete();
        return redirect('/admin/skills')->with('success', 'skill deleted successfully');
    }

    function status_update($id)
    {
        //get product status with the help of product ID
        $section = Skills::select('status')
                    ->where('id','=',$id)
                    ->first();
    
        //Check section status
        if($section->status == '1'){
            $status = '0';
        }else{
            $status = '1';
        }
    
        //update section status
        $values = array('status' => $status );
        Skills::where('id',$id)->update($values);
    
        session()->flash('msg','تم تفعيل القسم ');
        return redirect('/admin/skills');
    }
}
