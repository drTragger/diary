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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth/login');
});

Route::group(['prefix' => 'groups', 'namespace' => 'Group', 'middleware' => 'auth'], function () {
    Route::get('/', 'GroupController@index')->name('groups.index');
    Route::get('/create', 'GroupController@create')->name('groups.create');
    Route::put('/', 'GroupController@addGroup')->name('groups.add');
    Route::delete('/{id}', 'GroupController@delete')->name('groups.delete');
    Route::get('/{group}', 'GroupController@show')->name('groups.show');
    Route::get('/select-participant/{group}', 'GroupController@selectUser')->name('groups.selectUser');
    Route::put('/add-participant', 'GroupController@addUser')->name('groups.addUser');

    Route::group(['prefix' => 'homework', 'namespace' => 'Homework',], function () {
//        Route::get('/', 'GroupController@index')->name('homework.index');
    });
});


Route::group(['prefix' => 'marks', 'namespace' => 'Homework',], function () {
    Route::get('/{group}', 'HomeworkController@getMarks')->name('homework.marks');
    Route::get('/', 'HomeworkController@getMark')->name('homework.mark');
});

Route::group(['prefix' => 'homework', 'namespace' => 'Homework'], function () {
    Route::get('/{id}', 'HomeworkController@index')->name('homework.index');
    Route::get('/answers', 'HomeworkController@answer')->name('homework.answers');
    Route::post('/', 'HomeworkController@addAnswer')->name('homework.addAnswer');
    Route::get('/task/{groupId}', 'HomeworkController@task')->name('homework.task');
    Route::post('/create_task', 'HomeworkController@addTask')->name('homework.addTask');
});

Route::auth();

//Route::get('/home', 'HomeController@index');

