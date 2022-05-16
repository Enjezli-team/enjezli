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
        // $works = user::with(['sal_works','sal_skills','sal_profile'])->find(Auth::user()->id);
        $data = UserWork::with(['sal_user', 'sal_work_attach'])->where('user_id', Auth::user()->id)->where('is_active', 1)->get();
        $works = user::with(['sal_works', 'sal_skills', 'sal_profile'])->find(Auth::user()->id);
        // return response($data);

        return view('website.users.works.index')->with('data', $data);
    }


    public function create()
    {
        // $data=Skill::All();
        return view('website.users.works.create');
    }


    public function store(Request $request)
    {

        Validator::validate($request->all(), [
            'title' => array(
                'required',
                'min:10',

                // 'regex:/^[a-zA-Z\s]+$/u'
            ),


            'description' =>  array(
                'required',
                // 'regex:/(^([a-zA-Z\s]+)(\d+)?[.،:؛]?$)/u'
            )


        ], [
            'title.required' => 'يجب ادخال عنوان المشروع',
            'title.min' => 'لا يقل  عن 10 حروف',

            // 'title.regex'=>'يجب أن يحتوي  على حروف فقط ',

            'description.required' => 'يجب أدخال وصف المشروع ',
            // 'description.regex'=>'يجب ألا يحتوي على أرقام أو رموز فقط   ',

        ]);
        if ($request->image) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        } else {
            $imageName = 'user_avater.png';
        }
        $works = new UserWork();
        $works->title = $request->title;
        $works->link = $request->link;
        $works->description = $request->description;
        $works->user_id = Auth::user()->id;
        $works->file = $imageName;

        if ($works->save()) {



            if ($request->hasFile('files')) {

                if ($request->hasFile('files')) {
                    foreach ($request->file('files') as $file) {
                        $Attachments = new UserAttachment;
                        $Attachments->attach_id =$works->id;
                        $Attachments->attach_type = '3';
                        $fileNme = time() . '.' . $file->getClientOriginalExtension();
                        $file->move(public_path('images'), $fileNme);
                        $Attachments->file_name = $fileNme;
                        $Attachments->file_type = $file->getClientOriginalExtension();
                        $Attachments->user_id =$works->user_id;
                        $Attachments->save();
                    }
                }
                return redirect('profiles/' . Auth::user()->id)->with(['success' => ' تم اضافة البيانات ']);
            } else {
                return redirect()->back()->with(['error' => 'لم يتم حفظ البيانات ']);
            }
        }


    }

    public function work_data($id)
    {
        $data = UserWork::where('id', $id)->first();

        return view('website.users.works.work_details')->with('data', $data);
    }
    public function show($id)
    {
        $data = UserWork::where('id', $id)->first();

        return view('website.users.works.show')->with('data', $data);
    }


    public function edit($id)
    {
        $data = UserWork::where('id', $id)->first();
        if ($data->user_id = Auth::user()->id) {

            return view('website.users.works.edit')->with('data', $data);
        }
    }


    public function update(Request $request, $id)
    {
        Validator::validate($request->all(), [
            'title' => array(
                'required',
                'min:10',

                // 'regex:/^[a-zA-Z\s]+$/u'
            ),


            'description' =>  array(
                'required',
                // 'regex:/(^([a-zA-Z\s]+)(\d+)?[.،:؛]?$)/u'
            )


        ], [
            'title.required' => 'يجب ادخال عنوان المشروع',
            'title.min' => 'لا يقل  عن 10 حروف',

            // 'title.regex'=>'يجب أن يحتوي  على حروف فقط ',

            'description.required' => 'يجب أدخال وصف المشروع ',
            // 'description.regex'=>'يجب ألا يحتوي على أرقام أو رموز فقط   ',

        ]);
        if ($request->image) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        } else {
            $imageName = $request->imageold;
        }
        $works = UserWork::find($id);
        $works->title = $request->title;
        $works->link = $request->link;
        $works->file = $imageName;
        $works->description = $request->description;
        $works->user_id = Auth::user()->id;

        if ($works->save()) {
            if ($request->hasFile('files')) {
                UserAttachment::where('attach_id', $id)
                    ->where('attach_type', '3')->delete();
                if ($request->hasFile('files')) {
                    foreach ($request->file('files') as $file) {
                        $Attachments = new UserAttachment;
                        $Attachments->attach_id =$works->id;
                        $Attachments->attach_type = '3';
                        $fileNme = time() . '.' . $file->getClientOriginalExtension();
                        $file->move(public_path('images'), $fileNme);
                        $Attachments->file_name = $fileNme;
                        $Attachments->file_type = $file->getClientOriginalExtension();
                        $Attachments->user_id =$works->user_id;
                        $Attachments->save();
                    }
                }
                // return redirect('profiles/'.Auth::user()->id)->with(['success' => 'تم تعديل البيانات بنجاح']);
            } else {
                // return redirect()->back()->with(['error' => 'لم يتم تعديل البيانات ']);

            }

        }
        return redirect('profiles/'.Auth::user()->id)->with(['success' => 'تم تعديل البيانات بنجاح']);

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $old = UserWork::where('id', $id)->value('is_active');
        UserWork::where('id', $id)->update(['is_active' => ($old == 1) ? 0 : 1]);
        return redirect('profiles/' . Auth::user()->id)->with(['success' => ' تم حذف البيانات ']);
    }
    public function user_works($user_id)
    {
        //
    }
}
