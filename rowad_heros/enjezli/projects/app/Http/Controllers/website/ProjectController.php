<?php

namespace App\Http\Controllers\website;
use Illuminate\Support\Facades\Validator;
use App\Models\Project;
use App\Models\Offer;
use App\Models\Skill;
use App\Models\ProjectSkill;
use App\Models\UserAttachment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data=Project::with(['sal_created_by'])->where('status',1)->get();
      // return response( $data);
      return view('website.users.project.index',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $data=Skill::All();
        return view('website.users.project.create',compact('data'));
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
            'title'=> array(
              'required',
              'min:10',
              
              // 'regex:/^[a-zA-Z\s]+$/u'
            ),
            'price'=>['required','numeric'],
            'duration'=>['required','numeric'],
            'description'=>  array(
              'required',
              // 'regex:/(^([a-zA-Z\s]+)(\d+)?[.،:؛]?$)/u'
            ),
            'skills'=>['required'],
           
        ],[
            'title.required'=>'يجب ادخال عنوان المشروع',
            'title.min'=>'لا يقل  عن 10 حروف',
            'title.min'=>'لا يزيد  عن 50 حرف',
            // 'title.regex'=>'يجب أن يحتوي  على حروف فقط ',
            'price.required'=>'يجب ادخال السعر ',
            'price.numeric'=>'يجب ادخال قيمةر قمية ',
            'duration.required'=>'يجب ادخال المدة ',
            'duration.numeric'=>'يجب ادخال رقم ',
            'description.required'=>'يجب أدخال وصف المشروع ',
            // 'description.regex'=>'يجب ألا يحتوي على أرقام أو رموز فقط   ',
            'skills.required'=>'يجب أدخال اختيار مهارات للمشروع  '
      
        ]);
             $project=new Project;
             $project->title=$request->title;
             $project->price=$request->price;
             $project->net_price=$request->price;
             $project->duration=$request->duration;
             $project->description=$request->description;
             $project->user_id=Auth::user()->id;
       
         if($project->save()){
          
          foreach($request->skills as $skill){
            // return response($request->skills);
            // print_r($request->skills);
         
            $ProjectSkill=new ProjectSkill;
            $ProjectSkill->project_id=$project->id;
            $ProjectSkill->skill_id=$skill;
            $ProjectSkill->save();
           
         }
       
          if($request->hasFile('files')){
            foreach($request->file('files') as $file){
                $Attachments=new UserAttachment;
                $Attachments->attach_id= $project->id;
                $Attachments->attach_type='1';
                $fileNme=time().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('images'), $fileNme);
                $Attachments->file_name=$fileNme;
                $Attachments->file_type=$file->getClientOriginalExtension();
                $Attachments->user_id= $project->user_id;
                $Attachments->save();
                
            }
        
            return redirect()->back()->with(['success'=>'تم تعديل البيانات بنجاح']);
            return redirect()->back()->with(['error'=>'لم يتم تعديل البيانات ']);
        }
         };
      
      
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
   
public function show($id)//'sal_created_by',
    {   $data=Project::with(['sal_created_by','sal_project_attach',
                            'sal_skills_by.sal_skill',
                            'sal_offers.sal_provider_by.sal_profile',])->where('id',$id)->first();
                            // $offers_count=Project::with('sal_offers')->count();
                            $offers_count=Offer::where('project_id',$id)->count();
                            // $offers_avg=Offer::where('project_id',$id)->groupBy('project_id')
                            // ->avg('price');
                            // $offers_avg=Offer::where('project_id',$id)
                            // ->avg('price');
                            
      // if()
      // return response($data->sal_created_by->name);
      // return response(Auth::user()->id);
      // if(in_array(2,$data->sal_created_by->user_roles_user)){
      //   echo 'seeker' ;
      // }
      // else{
      //   echo 'not seeker' ;
      // }
      $canMakeOffer=0;
      $has_offer=Offer::where('project_id',$id)
                  ->where('provider_id',Auth::user()->id)->exists();
     
                  // return response ($has_offer);
      if(Auth::user()->hasRole('provider')&&Auth::user()->id != $data->user_id &&  $has_offer !=1){
        $canMakeOffer=1;
      }
      // return response($canMakeOffer);

      // return response($data->sal_created_by->user_roles_user);
      // return view('website.users.project.show')->with('data',$data);
      return view('website.users.project.show',compact('data','offers_count','canMakeOffer'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($project_id)
    {
        $data=Project::where('id',$project_id)->first();
        if( $data->user_id==Auth()->user()->id){
        $skills=Skill::All();
        return view('website.users.project.edit',compact('data','skills'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$project_id)
    {
   
    
        Validator::validate($request->all(),[
          'title'=> array(
            'required',
            'min:10',
            'max:50',
            // 'regex:/^[a-zA-Z\s]+$/u'
          ),
          'price'=>['required','numeric'],
          'duration'=>['required','numeric'],
          'description'=>  array(
            'required',
            // 'regex:/(^([a-zA-Z\s]+)(\d+)?[.،:؛]?$)/u'
          ),
          'skills'=>['required'],
         
      ],[
          'title.required'=>'يجب ادخال عنوان المشروع',
          'title.min'=>'لا يقل  عن 10 حروف',
          'title.min'=>'لا يزيد  عن 50 حرف',
          // 'title.regex'=>'يجب أن يحتوي  على حروف فقط ',
          'price.required'=>'يجب ادخال السعر ',
          'price.numeric'=>'يجب ادخال رقم ',
          'duration.required'=>'يجب ادخال المدة ',
          'duration.numeric'=>'يجب ادخال رقم ',
          'description.required'=>'يجب أدخال وصف المشروع ',
          // 'description.regex'=>'يجب ألا يحتوي على أرقام أو رموز فقط   ',
          'skills.required'=>'يجب أدخال اختيار مهارات للمشروع  '
    
      ]);
  
          $project= Project::find($project_id);
          $project->title=$request->title;
          $project->price=$request->price;
          $project->net_price=$request->price;
          $project->duration=$request->duration;
          $project->description=$request->description;
          // $project->user_id=Auth::user()->id;
        
     if($project->save()){
    
      if($request->has('skills')){
        ProjectSkill::where('project_id',$project_id)->delete();
          foreach($request->skills as $skill){
            $ProjectSkill=new ProjectSkill;
            $ProjectSkill->project_id=$project->id;
            $ProjectSkill->skill_id=$skill;
            $ProjectSkill->save();
          }
     }
   
      if($request->hasFile('files')){
        UserAttachment::where('attach_id',$project_id)
                       ->where('attach_type','project') ->delete();
        foreach($request->file('files') as $file){
            $Attachments=new UserAttachment;
            $Attachments->attach_id= $project->id;
            $Attachments->attach_type='1';
            $fileNme=time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images'), $fileNme);
            $Attachments->file_name=$fileNme;
            $Attachments->file_type=$file->getClientOriginalExtension();
            $Attachments->user_id= $project->user_id;
            $Attachments->save();
        }
    
        return redirect()->back()->with(['success'=>'تم تعديل البيانات بنجاح']);
        return redirect()->back()->with(['error'=>'لم يتم تعديل البيانات ']);
    }
     };
  
    
        
     


    }
    
/**----------------------
 * change status of project
 *------------------------**/
public function changeStatus($project_id,$status){ 
  $project=Project::find($project_id);    
  $project->status=$status;
  if($project->save()){
    return redirect()->back()->with(['success'=>'تم تعديل البيانات بنجاح']);
    return redirect()->back()->with(['error'=>'لم يتم تعديل البيانات ']);
  }
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
