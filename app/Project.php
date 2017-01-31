<?php

namespace App;

use App\Http\Requests\ProjectsRequest;
use App\ProjectRole;
use Illuminate\Database\Eloquent\Model;
use MediaUploader;
use Plank\Mediable\Mediable;

class Project extends Model
{
	use Mediable;

    protected $fillable = ['title', 'description', 'slug', 'url'];

    public static function publish(ProjectsRequest $request) {
		$projectDetails = $request->all();
		$projectDetails['slug'] = str_slug($projectDetails['title'], '-');

		$project = static::create($projectDetails);

		if ($request->input('role')) {
			$project->addProjectRoles($request);
		}

		return $project;
	}

	private function addProjectRoles(ProjectsRequest $request) {
		$roles = $this->createProjectRoles($request);
		$this->projectRoles()->attach($roles);

		return $this;
	}

	public function attachImages($images) {
		if ($images) {
    		foreach ($images as $image) {
    			$media = MediaUploader::fromSource($image)->toDestination('uploads', 'projects')->upload();
    			$this->attachMedia($media, 'projectImages');
    		}

    		return $this;
    	}
	}

    public function projectRoles() {
    	return $this->belongsToMany(ProjectRole::class);
    }

    private function createProjectRoles(ProjectsRequest $request) {
    	$projectRoles = [];

    	foreach($request->input('role') as $projectRole) {
    		if (ProjectRole::find($projectRole)) {
    			$projectRoles[] = $projectRole;
    		} else {
    			$projectRoles[] = ProjectRole::create(['role' => $projectRole])->id;
    		}
    	}

    	return $projectRoles;
    }
}
