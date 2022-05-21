<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Project;
use App\Models\Role;
use App\Models\Roleuser;
use App\Models\Skill;
use App\Models\user;
use App\Models\userSkill;
use App\Models\UserWork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class reportsController extends Controller
{
    public function index()
    {
        $seeker_project_success=
        Project::with(['sal_created_by','sal_handel_by', 'sal_skills_by.sal_skill'])->where([['user_id',Auth::user()->id]])->get();
        
        $provider_project_success=
        Project::with(['sal_created_by','sal_handel_by', 'sal_skills_by.sal_skill'])->where([['handled_by',Auth::user()->id]])->get();
        
        return view('website.users.reports.reports')->with(["seeker_project_success"=>$seeker_project_success,"provider_project_success"=>$provider_project_success]);
        
    }
    public function offers()
    {
        $offers=Offer::with(['sal_provider_by', 'sal_project_id'])->where([['user_id',Auth::user()->id]])->get();
        
       
        
        return view('website.users.reports.offer_reports')->with('offers',$offers);
        
    }
    public function filter(Request $request)
    {
     $provider_project = project::with(['sal_created_by','sal_handel_by', 'sal_skills_by.sal_skill'])->where([['handled_by',Auth::user()->id]]);
    
     $seeker_project = project::with(['sal_created_by','sal_handel_by', 'sal_skills_by.sal_skill'])->where([['user_id',Auth::user()->id]]);
        if ($request->has('project_status')) {
            $provider_project ->where('status', $request->project_status);    
        $seeker_project ->where('status', $request->project_status);
        }
    $result_seeker= $seeker_project ->get();
    $result_provider= $provider_project ->get();
    return view('website.users.reports.reports')->with(["seeker_project_success"=>$result_seeker,"provider_project_success"=>$result_provider]);
    }
    public function filteroffer(Request $request)
    {
        $offer=Offer::with(['sal_provider_by', 'sal_project_id'])->where([['user_id',Auth::user()->id]]);    
        if ($request->has('offer_status')) {
            $offer ->where('status', $request->offer_status);    
        }
    $result_offer= $offer ->get();
    return view('website.users.reports.offer_reports')->with(["offers"=>$result_offer]);
    }

}
