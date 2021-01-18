<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Task;
use Illuminate\Http\Request;
use App\Http\Requests\GetMarksRequest;
use App\Http\Requests;
use App\Http\Services\HomeworkService;

class HomeworkController extends Controller
{
    protected $homeworkService;

    public function __construct(HomeworkService $service)
    {
        $this->homeworkService = $service;
    }

    public function index(Request $request)
    {
//        $user = $request->user();
//        $tasks = Task::all();
//        dd($tasks);
//        return view('homework.homework', ['tasks'=>$tasks]);
    }

    public function getMarks(Request $request)
    {
        return view('homework.marks', ['marks' =>  $this->homeworkService->getMarks($group)]);
    }

    public function answer()
    {
        // TODO create a feature to display the task
        return view('homework.answer');
    }

    public function addAnswer(AnswerRequest $request)
    {
        dd($request->getContent());
    }

    public function addTask()
    {
        // TODO make
    }
}
