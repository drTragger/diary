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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/create', 'GroupController@create')->name('group.create');

Route::get('/', 'Users@index')->name('Users.index');

Route::get('/id', 'GroupController@delete')->name('group.delete');

Route::get('/createHomework','HomeworkController@createTask')->name('homework.createTask');