<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    if(Auth::check()){
        return view('welcome');
    }
    return view('auth.login');

});

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...

Route::post('auth/register', 'Auth\AuthController@postRegister');



Route::group(['middleware' => 'auth'], function () {
    Route::resource('project','ProjectController');
    Route::get('download/{id}/{step_id}',function($id,$step_id){
        $filename=\App\ProjectFile::where('project_id',$id)->where('step_id',$step_id)->value('project_file');
       return response()->download($filename);
    });
});