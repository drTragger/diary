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
    return Auth::check() ?
        redirect()->route('groups.index') :
        view('auth.login');
});

Route::group(['prefix' => 'groups', 'namespace' => 'Group', 'middleware' => 'auth'], function () {
    Route::get('/', 'GroupController@index')->name('groups.index');
    Route::get('/create', 'GroupController@create')->name('groups.create');
    Route::put('/add', 'GroupController@addGroup')->name('groups.add');
    Route::get('/{group}/rename', 'GroupController@renameGroup')->name('groups.renameGroup');
    Route::put('/rename', 'GroupController@saveRename')->name('groups.saveRename');
    Route::get('/{group}/confirm-deactivate', 'GroupController@confirmDeactivate')->name('groups.confirmDeactivate');
    Route::put('/{group}/deactivate', 'GroupController@deactivateGroup')->name('groups.deactivateGroup');
    Route::get('/{group}/show', 'GroupController@show')->name('groups.show');
        Route::group(['prefix' => 'participants'], function () {
            Route::get('/{group}/add', 'GroupController@selectUser')->name('groups.selectUser');
            Route::patch('/add', 'GroupController@addUser')->name('groups.addUser');
            Route::get('/{group}', 'GroupController@showParticipants')->name('groups.showParticipants');
            Route::put('/{participant}/deactivate', 'GroupController@deactivateParticipant')->name('groups.deactivateParticipant');
        });
});


Route::group(['prefix' => 'marks', 'namespace' => 'Homework',], function () {
    Route::get('/{group}', 'HomeworkController@getMarks')->name('homework.marks');
});

Route::group(['prefix' => 'homework', 'namespace' => 'Homework'], function () {
    Route::get('/task/{id}/answer', 'HomeworkController@answer')->name('homework.answer');
    Route::get('/{group}', 'HomeworkController@index')->name('homework.index');
    Route::get('/answers', 'HomeworkController@answer')->name('homework.answers');
    Route::put('/save-answer', 'HomeworkController@addAnswer')->name('homework.addAnswer');
    Route::get('answers/download/{answer}', 'HomeworkController@downloadAnswer')->name('homework.downloadAnswer');

    Route::group(['prefix' => 'tasks'], function () {
        Route::get('/{group}', 'HomeworkController@task')->name('homework.task');
        Route::post('/create', 'HomeworkController@addTask')->name('homework.addTask');
        Route::post('/{task}/edit', 'HomeworkController@taskEdition')->name('homework.taskEdition');
        Route::put('/save-edit', 'HomeworkController@editTask')->name('homework.editTask');
        Route::delete('/{task}/delete', 'HomeworkController@deleteTask')->name('homework.deleteTask');
        Route::get('/{task}/group/{group}', 'HomeworkController@showTask')->name('homework.show');
        Route::get('/{group}/submitted', 'HomeworkController@submittedTasks')->name('homework.submittedTask');
        Route::get('/{task}/estimate', 'HomeworkController@estimateTask')->name('homework.estimate');
        Route::post('/{answer}/mark', 'HomeworkController@setMark')->name('homework.setMark');
        Route::get('/{task}/download', 'HomeworkController@downloadTask')->name('homework.downloadTask');
    });
});

Route::auth();

//Route::get('/home', 'HomeController@index');

