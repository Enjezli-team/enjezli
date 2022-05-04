<?php

namespace App\Http\Controllers\website;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserWork;
use App\Models\User;
use App\Models\UserAttachment;
use Illuminate\Support\Facades\Auth;
class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data=UserWork::where('is_active',1)->get();
        // // return response( $data);
        // return view('website.users.works.index',compact('data'));
        $works = User::with('sal_works')->find(Auth::user()->id);
        // return response($works);
        return view('website.users.works.index')->with('data' , $works);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data=Skill::All();
        return view('website.users.works.create');
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
               
               
                'description'=>  array(
                  'required',
                  // 'regex:/(^([a-zA-Z\s]+)(\d+)?[.،:؛]?$)/u'
                )
               
               
            ],[
                'title.required'=>'يجب ادخال عنوان المشروع',
                'title.min'=>'لا يقل  عن 10 حروف',
              
                // 'title.regex'=>'يجب أن يحتوي  على حروف فقط ',
               
                'description.required'=>'يجب أدخال وصف المشروع ',
                // 'description.regex'=>'يجب ألا يحتوي على أرقام أو رموز فقط   ',
          
            ]);
                 $works=new UserWork();
                 $works->title=$request->title;
                 $works->link=$request->link;
                 $works->description=$request->description;
                 $works->user_id=Auth::user()->id;
           
             if($works->save()){
              
             
           
              if($request->hasFile('files')){
                foreach($request->file('files') as $file){
                    $Attachments=new UserAttachment;
                    $Attachments->attach_id= $works->id;
                    $Attachments->attach_type='1';
                    $fileNme=time().'.'.$file->getClientOriginalExtension();
                    $file->move(public_path('images'), $fileNme);
                    $Attachments->file_name=$fileNme;
                    $Attachments->file_type=$file->getClientOriginalExtension();
                    $Attachments->user_id= Auth::user()->id;
                    $Attachments->save();

                    
                }
                return redirect('works')->with(['error'=>'لم يتم تعديل البيانات ']);
               
            }
             };
          
             
             return redirect()->back()->with(['success'=>'تم تعديل البيانات بنجاح']);

          
        }
 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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
    public function user_works($user_id)
    {
        //
    }
}
