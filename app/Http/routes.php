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
    return view('welcome');
});

Route::get('client',         ['as' => 'client.index', 'uses'   => 'ClientController@index']);
Route::get('client/{id}',    ['as' => 'client.show', 'uses'    => 'ClientController@show']);
Route::post('client',        ['as' => 'client.store', 'uses'   => 'ClientController@store']);
Route::put('client/{id}',    ['as' => 'client.update', 'uses'  => 'ClientController@update']);
Route::delete('client/{id}', ['as' => 'client.destroy', 'uses' => 'ClientController@destroy']);

Route::get('project',         ['as' => 'project.index', 'uses'   => 'ProjectController@index']);
Route::get('project/{id}',    ['as' => 'project.show', 'uses'    => 'ProjectController@show']);
Route::post('project',        ['as' => 'project.store', 'uses'   => 'ProjectController@store']);
Route::put('project/{id}',    ['as' => 'project.update', 'uses'  => 'ProjectController@update']);
Route::delete('project/{id}', ['as' => 'project.destroy', 'uses' => 'ProjectController@destroy']);