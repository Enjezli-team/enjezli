<?php

namespace App\Http\Controllers\website;
use Illuminate\Support\Facades\Validator;
use App\Models\Offer;
use App\Models\Project;
use App\Models\UserAttachment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers=Offer::with(['sal_project_id'])->where('provider_id',Auth::user()->id)->get();

       return view('website.users.offers.index',compact('offers'));
      
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
        $website_precentage= $model->price / 10;
        $model->net_price=$model->price-$website_precentage;
            
        // $model->net_price=$request->price;
        $model->duration=$request->duration;
        $model->provider_id=Auth::User()->id;//Auth_id
        $model->project_id=$project_id;
        $model->status=1;
        // if($request->input('description')){
            $model->description=$request->description;
        // }
        if($model->save()){
          
            
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
    public function acceptOffer(Request $request)
    {  
         //check if the user is the project owner
         // and is   and the status of the offer is acceptOffer $offer->status==1
       $offer= Offer::find($request->offer_id);     
        if($request->project_owner==Auth::user()->id && $request->offer_status==1){
            $offer->status=2;
          
             if($offer->save()){
                // return response($offer);
                return redirect()->back()->with(['success'=>'تم تعديل البيانات بنجاح']);
               
                 }
                 else{
                    return redirect()->back()->with(['error'=>'لم يتم تعديل البيانات ']);

                 }

             }
     
    }
    //seeker cancel the confirmation before the provider confirm
    public function cancelConfirm(Request $request)
    {
       
        //check if the user is the project owner
        // and is   and the status of the offer is acceptOffer $offer->status==2
        $offer=Offer::with('sal_project_id')->where('project_id',$request->project_id)
                     ->where('id',$request->offer_id)->first();  
    if($request->project_owner==Auth::user()->id &&$offer->status==2 && $offer->sal_project_id->status==1){
            $offer->status=1;
            if($offer->save()){
            // return response( $offer);
                return redirect()->back()->with(['success'=>'تم العملية بنجاح']);
            } 
            else{
                return redirect()->back()->with(['success'=>'فشلت العملية']);
            }

            }
      
         }
   //provider confirm the offer last confirmation and start work
         public function confirmOffer(Request $request)
    {
       $data=Offer::with('sal_project_id')->where('project_id',$request->project_id)
        ->where('id',$request->offer_id)->first();
    // $data=Offer::where('project_id',$request->project_id)->first();

    //    $project=Offer::where('id',$request->project_id)->first();
    

       if($data->sal_project_id->status==1){
        $data->status=3;
        $data->sal_project_id->status=2;
        $data->sal_project_id->handled_by= $data->provider_id;
      
       //project is in excution
        if($data->save()&& $data->sal_project_id->save()){
            // return response($data);
            return redirect()->back()->with(['success'=>'تم العملية بنجاح']);
        } 
        else{
            return redirect()->back()->with(['success'=>'فشلت العملية']);
        }
       }
    //    return response($data->sal_project_id->status);
        //check if the user is the provider in the offer
        // and is  and the status of the project is acceptOffer $project->status==1
        // مفتوح then change the project status to قيد التنفيذ 

      
    }
  //provider cancel the offer before the seeker accept or after the seeker accepts
  public function  cancelOffer (Request $request)
  {
     
      //check if the user is the project owner
      // and is   and the status of the offer is acceptOffer $offer->status==2
      $data= Offer::find($request->offer_id);  
        
      if($data->provider_id==Auth::user()->id && $data->status==1 ){
        // $request->offer_status==1
          $data->status=0;
        

          }
        else if($data->provider_id==Auth::user()->id && $data->status==2 ){
        // $request->offer_status==1
            $data->status=4;
            }
     
              if($data->save()){

                return redirect()->back()->with(['success'=>'تم العملية بنجاح']);
                // return response($data);
            } 
            else{
                return redirect()->back()->with(['success'=>'فشلت العملية']);
            }
          
           
       }
 
  /**----------------------
   * seeker confirm that the project is delivered
   *------------------------**/
    public function confirmDelivery(Request $request)
    {
        
      //check if the user is the provider 
      // and is   and the status of the project is acceptOffer $project->status==1
    //   مفتوح then change the project status to قيد التنفيذ 
    // $offer= Offer::with('')->find($request->offer_id);   
    $offer=Offer::with('sal_project_id')->where('project_id',$request->project_id)
    ->where('id',$request->offer_id)->first();  
    if($request->project_owner==Auth::user()->id &&$offer->status==3 && $offer->sal_project_id->status==3){
        $offer->status=5;//done working and seeker confirm
      
         if($offer->save()){
            // return response($offer);
            return redirect()->back()->with(['success'=>'تم تعديل البيانات بنجاح']);
           
             }
             else{
                return redirect()->back()->with(['error'=>'لم يتم تعديل البيانات ']);

             }

         }
      
    }
    public function finishWork(Request $request)
    {



      //check if the user is the provider 
      // and is   and the status of the project is acceptOffer $project->status==1
    //   مفتوح then change the project status to قيد التنفيذ 
 $data=Offer::with('sal_project_id')->where('project_id',$request->project_id)
        ->where('id',$request->offer_id)->first();
    // $data=Offer::where('project_id',$request->project_id)->first();

    //    $project=Offer::where('id',$request->project_id)->first();
    
    
       if($data->sal_project_id->status==2 && $data->status==3){
        
        $data->sal_project_id->status=3;
        // $data->sal_project_id->handled_by= $data->provider_id;
      
       //project is in excution
        if($data->save()&& $data->sal_project_id->save()){
            // return response($data);
            return redirect()->back()->with(['success'=>'تم العملية بنجاح']);
        } 
        else{
            return redirect()->back()->with(['success'=>'فشلت العملية']);
        }
       }
      
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
        $website_precentage= $model->price / 10;
        $model->net_price=$model->price-$website_precentage;
        $model->duration=$request->duration;
        // if($request->input('description')){
            $model->description=$request->description;
        // }
        if($model->save()){
            
            if($request->hasFile('files')){
                UserAttachment::where('attach_id',$offer_id)
                               ->where('attach_type','2') ->delete();
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
