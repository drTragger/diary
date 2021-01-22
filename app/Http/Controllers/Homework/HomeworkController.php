<?php

namespace App\Http\Controllers\Homework;

use App\Answer;
use App\Group;
use App\Http\Controllers\Controller;
use App\Http\Requests\AnswerRequest;
use App\Http\Requests\TaskRequest;
use App\Task;
use Illuminate\Http\Request;
use App\Http\Services\HomeworkService;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class HomeworkController extends Controller
{
    protected $homeworkService;

    public function __construct(HomeworkService $service)
    {
        $this->homeworkService = $service;
    }

    public function index(Request $request)
    {
        $group = $request->id;
        $tasks = Task::where('group_id', $group)->get();
        $tasks = Controller::paginate($tasks, 10)->setPath((int)$group . '/');
        $group = Group::where('id', $group)->first();
        $check = $this->homeworkService->checkOwner($request);
        return view('homework.tasks', ['tasks' => $tasks, 'group' => $group, 'check' => $check]);
    }

    public function getMarks(Group $group)
    {
        return view('homework.marks', ['marks' => $this->homeworkService->getMarks($group)]);
    }

    public function answer()
    {
        // TODO create a feature to display the task
        return view('homework.answer');
    }

    public function addAnswer(Request $request)
    {
        $this->validate(
            $request,
            [
                'answer' => 'required',
            ]
        );
        Answer::create([
            'owner_id' => Auth::user()->id,
            'content' => $request->answer,
            'group_id' => $request->group_id,
            'task_id' => $request->task_id,
        ]);
        return redirect(route('homework.index', $request->group_id));
    }

    public function getAnswer()
    { // для учителя

    }

    public function task(int $groupId)
    {
        return view('homework.task', ['groupId' => $groupId]);
    }

    public function addTask(TaskRequest $request)
    {
        return $this->homeworkService->addTask($request->all())
            ? redirect(route('homework.index', $request->get('groupId')))
            : redirect(route('homework.tasks', $request->get('groupId')))->with('error', 'Something went wrong');
    }

    public function showTask(Request $request)
    {
        $task = $request->id;
        $task = $tasks = Task::where('id', $task)->first();
        $group = $task->group_id;
        $group = Group::where('id', $group)->first();
        return view('homework.answer', ['task' => $task, 'group' => $group]);
    }

    public function taskEdition(Task $task, Request $request)
    {
        $task = $this->homeworkService->getTask($task->id)->first();
        return view('homework.task_edit', ['task' => $task, 'group_id' => $request->get('group_id')]);
    }

    public function editTask(TaskRequest $request)
    {
        $this->homeworkService->editTask($request->all());
        return redirect(route('homework.index', ['id' => $request->get('group_id')]));
    }

    public function deleteTask(Task $task)
    {
        $this->homeworkService->deleteTask($task);
        return Redirect::back();
    }
}
