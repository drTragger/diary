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
use \Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    if(Auth::check()){
        return redirect(\route('groups.index'));
    } else {
        return view('auth/login');
    }
});

Route::group(['prefix' => 'groups', 'namespace' => 'Group', 'middleware' => 'auth'], function () {
    Route::get('/', 'GroupController@index')->name('groups.index');
    Route::get('/create', 'GroupController@create')->name('groups.create');
    Route::put('/', 'GroupController@addGroup')->name('groups.add');
    Route::get('/rename/{group}', 'GroupController@renameGroup')->name('groups.renameGroup');
    Route::put('/rename', 'GroupController@saveRename')->name('groups.saveRename');
    Route::get('/confirm-delete/{group}', 'GroupController@confirmDeactivate')->name('groups.confirmDeactivate');
    Route::put('/{group}', 'GroupController@deactivateGroup')->name('groups.deactivateGroup');
    Route::get('/{group}', 'GroupController@show')->name('groups.show');
    Route::get('/select-participant/{group}', 'GroupController@selectUser')->name('groups.selectUser');
    Route::patch('/add-participant', 'GroupController@addUser')->name('groups.addUser');
    Route::get('/participants/{group}', 'GroupController@showParticipants')->name('groups.showParticipants');
    Route::put('/participants/deactivate/{participant}', 'GroupController@deactivateParticipant')->name('groups.deactivateParticipant');
});


Route::group(['prefix' => 'marks', 'namespace' => 'Homework',], function () {
    Route::get('/{group}', 'HomeworkController@getMarks')->name('homework.marks');
    Route::get('/', 'HomeworkController@getMark')->name('homework.mark');
});

Route::group(['prefix' => 'homework', 'namespace' => 'Homework'], function () {
    Route::get('/task/{id}/answer', 'HomeworkController@answer')->name('homework.answer');
    Route::get('/{id}', 'HomeworkController@index')->name('homework.index');
    Route::get('/answers', 'HomeworkController@answer')->name('homework.answers');
    Route::put('/save-answer', 'HomeworkController@addAnswer')->name('homework.addAnswer');

    Route::group(['prefix' => 'tasks'], function () {
        Route::get('/{group}', 'HomeworkController@task')->name('homework.task');
        Route::post('/create', 'HomeworkController@addTask')->name('homework.addTask');
        Route::post('/edit/{task}', 'HomeworkController@taskEdition')->name('homework.taskEdition');
        Route::put('/edit', 'HomeworkController@editTask')->name('homework.editTask');
        Route::delete('/delete/{task}', 'HomeworkController@deleteTask')->name('homework.deleteTask');
        Route::get('/{task}/group/{group}', 'HomeworkController@showTask')->name('homework.show');
        Route::get('/{group}/submitted', 'HomeworkController@submittedTasks')->name('homework.submittedTask');
        Route::get('/{task}/estimate', 'HomeworkController@estimateTask')->name('homework.estimate');
        Route::post('/mark/{answer}', 'HomeworkController@setMark')->name('homework.setMark');
    });
});

Route::auth();

//Route::get('/home', 'HomeController@index');

