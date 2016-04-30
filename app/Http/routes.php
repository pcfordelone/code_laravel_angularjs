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

Route::group(['prefix' => 'project/{id}'], function() {
    Route::group(['prefix' => 'note'], function() {
        Route::get('/',             ['as' => 'project.note.index', 'uses'   => 'ProjectNoteController@index']);
        Route::get('{noteId}',    ['as' => 'project.note.show', 'uses'    => 'ProjectNoteController@show']);
        Route::post('/',            ['as' => 'project.note.store', 'uses'   => 'ProjectNoteController@store']);
        Route::put('{noteId}',    ['as' => 'project.note.update', 'uses'  => 'ProjectNoteController@update']);
        Route::delete('{noteId}', ['as' => 'project.note.destroy', 'uses' => 'ProjectNoteController@destroy']);
    });

    Route::group(['prefix' => 'task'], function() {
        Route::get('/',             ['as' => 'project.task.index', 'uses'   => 'ProjectTaskController@index']);
        Route::get('{taskId}',    ['as' => 'project.task.show', 'uses'    => 'ProjectTaskController@show']);
        Route::post('/',            ['as' => 'project.task.store', 'uses'   => 'ProjectTaskController@store']);
        Route::put('{taskId}',    ['as' => 'project.task.update', 'uses'  => 'ProjectTaskController@update']);
        Route::delete('{taskId}', ['as' => 'project.task.destroy', 'uses' => 'ProjectTaskController@destroy']);
    });

});