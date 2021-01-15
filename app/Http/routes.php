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
    return view('auth/login');
});

Route::group(['prefix' => 'groups', 'namespace' => 'Group',], function () {
    Route::get('/', 'GroupController@index')->name('groups.index');
    Route::get('/create', 'GroupController@create')->name('groups.create');
    Route::put('/', 'GroupController@addGroup')->name('groups.add');
    Route::delete('/{id}', 'GroupController@delete')->name('groups.delete');
    Route::get('/{group}', 'GroupController@show')->name('groups.show');
    Route::get('/select-participant/{groupId}', 'GroupController@selectUser')->name('groups.selectUser');
    Route::put('/add-participant', 'GroupController@addUser')->name('groups.addUser');

    Route::group(['prefix' => 'homework', 'namespace'=>'Homework',], function () {

    });
});

Route::group(['prefix'=>'marks', 'namespace'=>'Homework',], function () {
    Route::get('/', 'HomeworkController@getMarks')->name('homework.marks');
    Route::get('/{userId}', 'HomeworkController@getMark')->name('homework.mark');
});

Route::auth();

//Route::get('/home', 'HomeController@index');

