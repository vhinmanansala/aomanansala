<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Project;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    /*
     * Show projects in homepage
     */
    public function showHomepageProjects() {
    	$projects = Project::all()->sortByDesc('created_at');
		return view('frontend.home', compact('projects'));
    }

    /*
     * Show project detail in frontend
     */
    public function showProjectDetail($slug) {
    	$project = Project::withMedia(['projectImages'])->where('slug', $slug)->firstOrFail();
    	$previous = Project::where('id', '<', $project->id)->orderBy('id','desc')->limit(1)->first();
    	$next = Project::where('id', '>', $project->id)->limit(1)->first();

		return view('frontend.project', compact('project', 'previous', 'next'));
    }
}
