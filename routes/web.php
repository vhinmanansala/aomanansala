<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'FrontEndController@showHomepageProjects')->name('home');
Route::get('/about', ['as' => 'about', function() {
	return view('frontend.about');
}]);
Route::get('/contact', ['as' => 'contact', function() {
	return ('contact');
}]);
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/project/{slug}', 'FrontEndController@showProjectDetail');


Auth::routes();
Route::resource('/dashboard/projects', 'ProjectsController');