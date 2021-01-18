<?php

namespace App\Http\Controllers\Homework;

use App\Group;
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
        $user = $request->user(); //пользователь
        $group = $request->id; //группа
        $tasks = Task::where('group_id', $group)->get();
        $owner = Task::select('teacher_id')
            ->where('group_id', $group)
            ->first()
            ->teacher_id;
        $group = Group::where('id', $group)->get();
        if ($user === $owner) {
            return view('homework.homeworkOwner', ['tasks' => $tasks, 'group' => $group]); //todo group and nav
        }
        return view('homework.homeworkStudent', ['tasks' => $tasks, 'group' => $group]);
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
