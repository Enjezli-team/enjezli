<?php

namespace App\Http\Controllers\website;
use Illuminate\Support\Facades\Validator;
use App\Models\Offer;
use App\Models\UserAttachment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('website.users.offers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ){
        $project_id=$request->project_id;
        // $project_id=5;

        Validator::validate($request->all(),[
            
            'price'=>['required','numeric'],
            'duration'=>['required','numeric'],
            'description'=>  array(
              'required',
            ),
           
           
        ],[
           
            'price.required'=>'يجب ادخال السعر ',
            'price.numeric'=>'يجب ادخال رقم ',
            'duration.required'=>'يجب ادخال المدة ',
            'duration.numeric'=>'يجب ادخال رقم ',
            'description.required'=>'يجب أدخال تفاصيل العرض  ',
            // 'description.regex'=>'يجب ألا يحتوي على أرقام أو رموز فقط   ',
      
        ]);
        $model=new Offer;
        $model->price=$request->price;
        $model->net_price=$request->price;
        $model->net_price=$request->price;
        $model->duration=$request->duration;
        $model->provider_id=1;//Auth_id
        $model->project_id=$project_id;
        $model->status=1;
        // if($request->input('description')){
            $model->description=$request->description;
        // }
        if($model->save()){
            // // 
            
            if($request->hasFile('files')){
                    
                    foreach($request->file('files') as $file){
                        $Attachments=new UserAttachment;
                        $Attachments->attach_id=$model->id;
                        $Attachments->attach_type='2';
                        $fileNme=time().'.'.$file->getClientOriginalExtension();
                        $file->move(public_path('images'), $fileNme);
                        $Attachments->file_name=$fileNme;
                        $Attachments->file_type=$file->getClientOriginalExtension();
                        $Attachments->user_id= $model->provider_id;
                        $Attachments->save();
                        
                    }
                }
                   
                return redirect()->back()->with(['success'=>'تم تعديل البيانات بنجاح']);
                return redirect()->back()->with(['error'=>'لم يتم تعديل البيانات ']);
            
        }
       
    
       
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
        $data=Offer::where('id',$id)->first();
        // return response( $data);
        return view('website.users.offers.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $offer_id)
    {
        Validator::validate($request->all(),[
            
            'price'=>['required','numeric'],
            'duration'=>['required','numeric'],
            'description'=>  array(
              'required',
            ),
           
           
        ],[
           
            'price.required'=>'يجب ادخال السعر ',
            'price.numeric'=>'يجب ادخال رقم ',
            'duration.required'=>'يجب ادخال المدة ',
            'duration.numeric'=>'يجب ادخال رقم ',
            'description.required'=>'يجب أدخال وصف المشروع ',
            // 'description.regex'=>'يجب ألا يحتوي على أرقام أو رموز فقط   ',
      
        ]);
        $model= Offer::find($offer_id);
        $model->price=$request->price;
        $model->net_price=$request->price;
        $model->duration=$request->duration;
        // if($request->input('description')){
            $model->description=$request->description;
        // }
        if($model->save()){
            
            if($request->hasFile('files')){
                UserAttachment::where('attach_id',$offer_id)
                               ->where('attach_type','offer') ->delete();
                    if($request->hasFile('files')){
                        foreach($request->file('files') as $file){
                            $Attachments=new UserAttachment;
                            $Attachments->attach_id=$model->id;
                            $Attachments->attach_type='offer';
                            $fileNme=time().'.'.$file->getClientOriginalExtension();
                            $file->move(public_path('images'), $fileNme);
                            $Attachments->file_name=$fileNme;
                            $Attachments->file_type=$file->getClientOriginalExtension();
                            $Attachments->user_id= $model->provider_id;
                            $Attachments->save();
                            
                        }
                        return redirect()->back()->with(['success'=>'تم تعديل البيانات بنجاح']);
                        return redirect()->back()->with(['error'=>'لم يتم تعديل البيانات ']);
                    }
            }
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
