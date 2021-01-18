<?php

namespace App\Http\Controllers\Homework;

use App\Group;
use App\Http\Controllers\Controller;
use App\Http\Requests\AnswerRequest;
use App\Http\Services\HomeworkService;

class HomeworkController extends Controller
{
    protected $homeworkService;

    public function __construct(HomeworkService $service)
    {
        $this->homeworkService = $service;
    }

    public function getMarks(Group $group)
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

    public function addTask() {
        // TODO make
    }
}
