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


Route::group(['prefix'=>'group'], function (){
    Route::get('/', 'Group\GroupController@index', function (){
        return view('templates.index');
    })->name('group.index');
    Route::get('/{id}', 'GroupController@show')->name('group.show');
});
