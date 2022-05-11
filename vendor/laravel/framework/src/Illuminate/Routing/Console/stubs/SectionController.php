<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
  
    public function section()
    {

        // 
        // $sections=array(1,5,7,9);

        // $section=implode(",",$sections);
        // return $sections;
        $section = Skill::all();
        
        return view('Admin.section', compact('section','section'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        $section = Skill::where('parent_id', 'id') ->get();
        return view('Admin.create_section',compact('section','section'));
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
              //
              $request->validate([
                'title'=>'required',
                'section'=>'required',
            ]);
     
            $section = new Skill([
                'title' => $request->get('title'),
                'parent_id' => $request->get('section')
            ]);
     
            $section->save();
            return redirect('/admin/admin/section')->with('success', 'section has been added');
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $section)
    {
        //
        return view('admin.section',compact('section'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    // public function edit(Section $section)
    // {
    //     //
    //     return view('admin.update_section',compact('section'));
    // }

    public function edit($id){
        $section=Skill::find($id);
        return view('admin.update_section')
        ->with('section',$section);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Section $section)
    // {
    //     //

    //     $request->validate([
    //         'title'=>'required'
    //     ]);
 
    //     $section = Section::find($id);
    //     $section->title = $request->get('title');
 
    //     $section->update();
 
    //     return redirect('/admin/section')->with('success', 'section updated successfully');
    

    // }


    public function update(Request $request,$id){

        $section=Skill::find($id);
        $section->title=$request->title;
        if($section->save())
        return redirect()->route('section')->with(['success'=>'section updated successful']);
        return redirect()->back()->with(['error'=>'can not update section ']);


    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $section,$id)
    {
        //
        $section->whereId($id)->delete();
        return redirect('/admin/admin/section')->with('success', 'section deleted successfully');
   
    }

    function status_update($id)
{
	//get product status with the help of product ID
	$section = Skill::select('status')
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
	Skill::where('id',$id)->update($values);

	session()->flash('msg','تم تفعيل القسم ');
	return redirect('/admin/admin/section');
}
}
