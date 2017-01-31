<?php

namespace App;

use App\Project;
use Illuminate\Database\Eloquent\Model;

class ProjectRole extends Model
{
	protected $fillable = ['role'];

    public function project() {
    	return $this->belongsToMany(Project::class);
    }
}
