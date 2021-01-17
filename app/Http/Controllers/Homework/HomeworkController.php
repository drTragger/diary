<?php

namespace App\Http\Controllers;

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
        $user = $request->user();
        return view('homework.marks', ['user' => 'John']);
//        $this->homeworkService->getMarks($request->groupId)
    }

    public function getMark(Request $request)
    {
        $user = $request->user();
        return view('homework.marks', ['marks' => $this->homeworkService->getMark($user->id)]);
    }

    public function addTask()
    {
        // TODO make
    }
}
