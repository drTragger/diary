<?php

namespace App\Http\Controllers\Homework;

use App\{Answer, Group, Http\Requests\AnswerRequest, Task};
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;
use App\Http\Services\HomeworkService;
use Illuminate\Support\Facades\{Redirect, Auth, Storage};

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
        $check = $this->homeworkService->checkOwner($request);
        $tasks = Task::with('answers')->where('group_id', $group)->get();

        $unsubmittedTasks = [];
        foreach ($tasks as $task) {
            if (empty($task->answers->where('owner_id', Auth::user()->id)->all())) {
                $unsubmittedTasks[] = $task;
            }
        }

        if (!$check) {
            $tasks = $unsubmittedTasks;
        }

        $tasks = Controller::paginate($tasks, 6)->setPath((int)$group);
        $group = Group::where('id', $group)->first();
        return view('homework.tasks', ['tasks' => $tasks, 'group' => $group, 'check' => $check]);
    }

    public function getMarks(Group $group)
    {
        return view('homework.marks', ['marks' => $this->homeworkService->getMarks($group)]);
    }

    public function answer(Request $request)
    {
        $task = json_decode($request->task);
        dd($task);
//        return view('homework.showHomework', ['task'=>$task, 'id'=>$request->group_id]);
    }

    public function addAnswer(AnswerRequest $request) //student
    {
        $this->homeworkService->addAnswer($request);
        return redirect(route('homework.index', $request->group_id));
    }

    public function task(Group $group)
    {
        return view('homework.task', ['group' => $group]);
    }

    public function addTask(TaskRequest $request)
    {
        return $this->homeworkService->addTask($request)
            ? redirect(route('homework.index', $request->get('group_id')))
            : redirect(route('homework.tasks', $request->get('group_id')))->with('error', 'Something went wrong');
    }

    public function showTask(Request $request)
    {
        $task = $tasks = Task::where('id', $request->task)->first();
        $group = $request->group;
        $group = Group::where('id', $group)->first();
        return view('homework.answer', ['task' => $task, 'group' => $group]);
    }

    public function taskEdition(Task $task, Request $request)
    {
        $task = $this->homeworkService->getTask($task->id)->first();
        return view('homework.task_edit', ['task' => $task, 'group' => $this->homeworkService->getGroupById($request->get('group_id'))]);
    }

    public function editTask(TaskRequest $request)
    {
        $this->homeworkService->editTask($request->all());
        return redirect(route('homework.index', ['id' => $request->get('group_id')]));
    }

    public function deleteTask(Task $task)
    {
        Storage::delete('public/homework/' . $task->file);
        $this->homeworkService->deleteTask($task);
        return Redirect::back();
    }

    public function submittedTasks(Request $request)
    {
        $group = $request->group;
        $tasks = Task::where('group_id', $group)->get();
        $group = Group::where('id', $group)->first();
        return view('homework.submittedTask', ['tasks' => $tasks, 'group' => $group]);
    }

    public function estimateTask(Task $task)
    {
        $answers = Answer::with('user')->where('mark', '=', null)->where('task_id', '=', $task->id)->get();
        $group = Group::where('id', $task->group_id)->first();
        return view('homework.estimate', ['answers' => $answers, 'group' => $group, 'task' => $task]);
    }

    public function setMark(Answer $answer, Request $request)
    {
        $this->homeworkService->setMark($request->get('mark'), $answer);
        return redirect(route('homework.estimate', $request->get('task')));
    }

    public function downloadTask(Task $task)
    {
        $path = storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'homework' . DIRECTORY_SEPARATOR . $task->file);
        return file_exists($path) ?
            response()->download($path) :
            redirect()->route('groups.index');
    }

    public function downloadAnswer(Answer $answer)
    {
        $path = storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'answers' . DIRECTORY_SEPARATOR . $answer->file);
        return file_exists($path) ?
            response()->download($path) :
            redirect()->route('groups.index');
    }
}
