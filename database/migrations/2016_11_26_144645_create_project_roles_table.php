<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('role');
            $table->timestamps();
        });

        Schema::create('project_project_role', function (Blueprint $table) {
        	$table->integer('project_id')->unsigned()->index();
        	$table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');

        	$table->integer('project_role_id')->unsigned()->index();
        	$table->foreign('project_role_id')->references('id')->on('project_roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
        Schema::dropIfExists('project_role');
    }
}
