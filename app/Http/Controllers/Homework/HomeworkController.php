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
        if ($this->homeworkService->checkOwner($request)) {
            return view('homework.homeworkOwner', ['tasks' => $tasks, 'group' => $group]);
        } else {
            return view('homework.homeworkStudent', ['tasks' => $tasks, 'group' => $group]);
        }
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

    public function showHomework(Request $request) {
//        dd($request->group_id);
        $task = json_decode($request->task);
//        dd($request,$id, $task);

        return view('homework.showHomework', ['task'=>$task, 'id'=>$request->group_id]);
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
            'owner_id'=>Auth::user()->id,
            'content'=>$request->answer,
            'group_id'=>$request->group_id,
            'task_id'=>$request->task_id,
        ]);
        return redirect(route('homework.index', $request->group_id));
    }

    public function getAnswer() { // для учителя
        
    }

    public function tasks(Request $request) {
//        dd($request->groupId);
        $tasks = Task::where('teacher_id', Auth::user()->id)->where('group_id', $request->groupId)->paginate(2);
//        dd($tasks);
        return view('homework.tasks', ['tasks'=>$tasks]);
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
