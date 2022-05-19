<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Project;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    
        $openpro = Project::all()->where('status',1);
        $executepro = Project::all()->where('status',2);

        $dayAgo = 3 ;// where here there is your calculation for now How many days
        $dayToCheck = Carbon::now()->subDays($dayAgo);
        $lastoffer = Offer::all()
        ->where('status',2)
        ->where("created_at",  '>', $dayToCheck);

        $lastPro = Project::all()
        ->where('status',1)
        ->where("created_at",  '>', $dayToCheck);
      
        $seeker = User::all()->where('status',1);
        $provider = User::all()->where('type',3);
        return view('admin.pages.Home.index', compact('openpro','executepro', 'seeker','provider','lastoffer','lastPro'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showNewPro($id)
    {
        
        $data = Project::with(['sal_offers','sal_handel_by','sal_created_by','sal_skills_by','sal_project_attach'])->find($id);
      

      return view('admin.pages.Home.index')->with('data' , $data);
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
}
