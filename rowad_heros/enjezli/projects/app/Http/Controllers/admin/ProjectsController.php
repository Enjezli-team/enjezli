<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $projects = Project::all();
        return view('Admin.project.projects', compact('projects','projects'));
    }

    public function report()
    {
        return view('Admin.project.reports');
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
     * @param  \App\Models\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function show(Project $projects)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $projects)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $projects)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $projects)
    {
        //
    }
}
