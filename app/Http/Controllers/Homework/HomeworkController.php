<?php

namespace App\Http\Controllers\Homework;

use App\Group;
use App\Http\Controllers\Controller;
use App\Http\Requests\AnswerRequest;
use App\Http\Requests\TaskRequest;
use App\Task;
use Illuminate\Http\Request;
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

    public function task(int $groupId)
    {
        return view('homework.task', ['groupId' => $groupId]);
    }

    public function addTask(TaskRequest $request)
    {
        return $this->homeworkService->addTask($request->all())
            ? redirect(route('groups.show', $request->get('groupId')))
            : redirect(route('homework.tasks', $request->get('groupId')))->with('error', 'Something went wrong');
    }
}
