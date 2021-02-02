<?php

namespace App\Http\Controllers\Homework;

use App\{Answer, Group, Task};
use App\Http\Controllers\Controller;
use App\Http\Requests\{TaskRequest, AnswerRequest, MarkRequest};
use Illuminate\Http\Request;
use App\Http\Services\HomeworkService;
use Illuminate\Support\Facades\{Redirect, Auth};

class HomeworkController extends Controller
{
    protected $homeworkService;

    public function __construct(HomeworkService $service)
    {
        $this->homeworkService = $service;
    }

    public function index(Group $group)
    {
        $check = $this->homeworkService->checkOwner($group);
        $tasks = Task::with('answers')->where('group_id', $group->id)->get();

        $unsubmittedTasks = [];
        foreach ($tasks as $task) {
            if (empty($task->answers->where('owner_id', Auth::user()->id)->all())) {
                $unsubmittedTasks[] = $task;
            }
        }

        if (!$check) {
            $tasks = $unsubmittedTasks;
        }

        $tasks = Controller::paginate($tasks, 6)->setPath($group->id);
        return view('homework.tasks', ['tasks' => $tasks, 'group' => $group, 'check' => $check]);
    }

    public function marks(Group $group)
    {
        return view('homework.marks', [
            'marks' => $this->homeworkService->getMarks($group),
            'group' => $group,
            'check' => $this->homeworkService->checkOwner($group)
        ]);
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
        $task = $this->homeworkService->getTask($request->task);
        $group = Group::find($request->group);
        return view('homework.answer', ['task' => $task, 'group' => $group]);
    }

    public function taskEdition(Task $task, Request $request)
    {
        $task = $this->homeworkService->getTask($task->id);
        return view('homework.task_edit', ['task' => $task, 'group' => $this->homeworkService->getGroupById($request->get('group_id'))]);
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

    public function submittedTasks(Request $request)
    {
        $tasks = Task::where('group_id', $request->group)->get();
        $group = $this->homeworkService->getGroupById($request->group);
        return view('homework.submittedTask', ['tasks' => $tasks, 'group' => $group]);
    }

    public function estimateTask(Task $task)
    {
        $answers = Answer::with('user')->where('mark', '=', null)->where('task_id', '=', $task->id)->paginate(5);
        $group = $this->homeworkService->getGroupById($task->group_id);
        return view('homework.estimate', ['answers' => $answers, 'group' => $group, 'task' => $task]);
    }

    public function setMark(Answer $answer, MarkRequest $request)
    {
        $this->homeworkService->setMark($request->get('mark'), $answer);
        return redirect(route('homework.estimate', $request->get('task')));
    }

    public function downloadTask(Task $task)
    {
        if (isset($task->file)) {
            $path = storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'homework' . DIRECTORY_SEPARATOR . $task->file);
            return file_exists($path)
                ? response()->download($path)
                : redirect()->back()->withErrors(['File does not exist']);
        }
        return redirect()->back()->withErrors(['File does not exist']);
    }

    public function downloadAnswer(Answer $answer)
    {
        if (isset($answer->file)) {
            $path = storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'answers' . DIRECTORY_SEPARATOR . $answer->file);
            return file_exists($path)
                ? response()->download($path)
                : redirect()->back()->withErrors(['File does not exist']);
        }
        return redirect()->back()->withErrors(['File does not exist']);
    }
}
