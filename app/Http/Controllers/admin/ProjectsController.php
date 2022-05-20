<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Project;
use App\Models\ProjectSkill;
use App\Models\Skill;
use App\Models\User;
use App\Models\UserAttachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class ProjectsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.pages.Projects.index', ['data' => Project::where('status', 0)->get(), compact('user')]);
    }

    public function project_upon_status($status=1)
    {
        return view('admin.pages.Projects.index', ['data' => Project::where('status', $status)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data = Project::with(['sal_offers', 'sal_handel_by', 'sal_created_by', 'sal_skills_by', 'sal_project_attach'])->find($id);


        return view('admin.pages.Projects.show')->with('data', $data);
    }

    public function search(Request $request)
    {
        Validator::validate($request->all(), [

            'value' => 'required',

        ], [
            'value.required' => 'يجب ادخال قيمه للبحث بشكل صحيح كأسم او رقم او ايميل   .',
        ]);
        $search = Project::query()
            ->orWhere('title', 'LIKE', "%{$request->value}%")
            ->orWhere('description', 'LIKE', "%{$request->value}%")
            ->orWhere('id', 'LIKE', "%{$request->value}%")
            ->get();
        return view('admin.pages.Projects.index', ['data' => $search]);
    }


    public function blockProByAdmin($proId, $blockValue)
    {
        $user = Project::where('id', $proId)->update(['blockByAdmin' => $blockValue]);
        // redirect
        return back()->with('success', 'project data successfully updated.');
    }

    public function activatePro($proId, $status)
    {


        $user = Project::where('id', $proId)->update(['status' => $status]);
        // redirect
        return back()->with('success', 'offer data successfully updated.');
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
        // return view('admin.pages.Projects.edit',['data'=>Project::find($id)]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $project_id)
    {
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
