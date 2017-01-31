<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\ProjectsRequest;
use App\Project;
use App\ProjectRole;
use MediaUploader;

class ProjectsController extends Controller
{
	
	public function __construct() {
		$this->middleware('auth');
		parent::__construct();
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('dashboard.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$projectRoles = ProjectRole::pluck('role', 'id');
        return view('dashboard.projects.create', compact('projectRoles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectsRequest $request)
    {
    	$project = Project::publish($request);
    	$project->attachImages($request->file('projectImages'));
    	flash()->success('Great', 'Your project has been published.');

    	return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::withMedia(['projectImages'])->where('id', $id)->firstOrFail();
        return view('dashboard.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
    	$project = Project::withMedia(['projectImages'])->with('projectRoles')->where('slug', $slug)->first();
    	$projectRoles = ProjectRole::pluck('role', 'id')->toArray();
        return view('dashboard.projects.edit', compact('project', 'projectRoles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectsRequest $request, $id)
    {
        Project::find($id)->update($request->all());
        flash()->success('Great', 'Your project has been updated');
        return back();
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
