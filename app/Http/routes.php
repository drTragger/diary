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

use App\Http\Controllers\HomeworkController;

Route::get('/', function () {
    return view('templates.index');
});
Route::group(['prefix'=>'groups', 'namespace'=>'Group'], function () {
    Route::get('/', 'GroupController@index')->name('groups.index');
    Route::get('/create', 'GroupController@create')->name('groups.create');
    Route::put('/','GroupController@add')->name('groups.add');
    Route::get('/select-participant', 'GroupController@selectUser')->name('groups.selectUser');
    Route::put('/add-participant', 'GroupController@addUser')->name('groups.addUser');
});
Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/marks', 'HomeworkController@getMarks')->name('homework.marks');

Route::get('/{userId}', 'HomeworkController@getMark')->name('homework.mark');