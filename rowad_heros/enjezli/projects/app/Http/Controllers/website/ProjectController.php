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
    public function My_projects()
    {
      $data=Project::with(['sal_created_by','sal_offers'])
                                               ->where('user_id',Auth::user()->id)->get();
                            
    //  $offers_count=Project::with(['sal_offers'])->where('user_id',Auth::user()->id)
    //                                            ->groupBy('id')->count();
      //  $offers=Offer::with(['sal_project_id'])->where('provider_id',Auth::user()->id)->get();

      //  return view('website.users.offers.index',compact('offers'));
      
      // return response( $data);
      return view('website.users.project.projects_d',compact('data'));

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
             $noError=0;
         if($project->save()){
          
          foreach($request->skills as $skill){
            // return response($request->skills);
            // print_r($request->skills);
         
            $ProjectSkill=new ProjectSkill;
            $ProjectSkill->project_id=$project->id;
            $ProjectSkill->skill_id=$skill;
            $ProjectSkill->save();
            $noError=1;
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
                $noError=2;
            }
            if($noError>=1){
              return redirect()->back()->with(['success'=>'  تمت الاضافة بنجاح']);
            }
            else{
              return redirect()->back()->with(['success'=>' فشلت  الاضافة ']);
              } 
          
           
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
    { 
      $data=Project::with(['sal_created_by','sal_project_attach',
      'sal_skills_by.sal_skill',
      'sal_offers.sal_provider_by.sal_profile','sal_offers.sal_offer_attach'])->where('id',$id)->first();
     
      
        if( $data!=null){
              $canMakeOffer=0;
              $has_offer=Offer::where('project_id',$id)
                          ->where('provider_id',Auth::user()->id)->exists();
            
                        
              if(Auth::user()->hasRole('provider')&&Auth::user()->id != $data->user_id &&  $has_offer !=1){
                $canMakeOffer=1;
              }
              if(Auth::User()->id!=$data->user_id){
                $data=Project::with(['sal_created_by','sal_project_attach',
                'sal_skills_by.sal_skill',
                'sal_offers.sal_provider_by.sal_profile','sal_offers.sal_offer_attach'])->where('id',$id)->where('status','<>',0)->first();
              }
              if($data!=null){
                return view('website.users.project.show',compact('data','canMakeOffer'));

              }
              else{
                return response(['error' => true, 'error-msg' => 'Not found'], 404);
              }
              }   
              else{
                return response(['error' => true, 'error-msg' => 'Not found'], 404);
              }
      
                            // $offers_count=Project::with('sal_offers')->count();
                            // $offers_count=Offer::where('project_id',$id)
                            //                     ->where('status','<>',0)->count();
                            // $offers_avg=Offer::where('project_id',$id)->groupBy('project_id')
                            // ->avg('price');
                            // $offers_avg=Offer::where('project_id',$id)
                            // ->avg('price');
                            
                            // return view('website.users.project.show',compact('data','offers_count','canMakeOffer'));

                  }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $project_id)
    {
        $data=Project::with(['sal_offers'])->where('id',$project_id)->first();
        // if( $data->user_id==Auth()->user()->id && $data->sal_offers->count()==0){
        if($data!=null){
          if($data->user_id==Auth()->user()->id && $data->status==1||$data->status==0){

            $skills=Skill::All();
            return view('website.users.project.edit',compact('data','skills'));
            }
            else{
              return response(['error' => true, 'error-msg' => 'Not found'], 404);
            }
        }
        else{
          return response(['error' => true, 'error-msg' => 'Not found'], 404);
        }
    }
    // public function edit($project_id)
    // {
    //     $data=Project::where('id',$project_id)->first();
    //     if( $data->user_id==Auth()->user()->id){
    //     $skills=Skill::All();
    //     return view('website.users.project.edit',compact('data','skills'));
    //     }
    // }

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
        $noError=0;
     if($project->save()){
    
      if($request->has('skills')){
        ProjectSkill::where('project_id',$project_id)->delete();
          foreach($request->skills as $skill){
            $ProjectSkill=new ProjectSkill;
            $ProjectSkill->project_id=$project->id;
            $ProjectSkill->skill_id=$skill;
            $ProjectSkill->save();
            $noError=1;
          }
         
     }
   
      if($request->hasFile('files')){
        UserAttachment::where('attach_id',$project_id)
                       ->where('attach_type','1') ->delete();
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
            $noError=2;
        }
    if($noError>=2){
      return redirect()->back()->with(['success'=>'تم تعديل البيانات بنجاح']);
    }
    else{
      return redirect()->back()->with(['success'=>'لم يتم تعديل البيانات بنجاح']);
      } 
       
    }
     };
  
    
        
     


    }
    
/**----------------------
 * change status of project
 *------------------------**/
public function changeStatus($project_id,$status){ 

  $project=Project::find($project_id);   
  if($project!=null){ 
  $project->status=$status;
  if($project->save()){
    return redirect()->back()->with(['success'=>'تم تعديل البيانات بنجاح']);
   
  }
  return redirect()->back()->with(['error'=>'لم يتم تعديل البيانات ']);
}
  else{
    return response(['error' => true, 'error-msg' => 'Not found'], 404);
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
