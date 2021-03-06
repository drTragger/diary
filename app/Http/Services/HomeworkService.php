<?php


namespace App\Http\Services;

use App\{Answer, Group, Task};
use Illuminate\Database\Eloquent\{Builder, Collection};
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Storage};

class HomeworkService
{
    /**
     * @param Group $group
     * @return Answer[]|Builder[]|Collection
     */
    public function getMarks(Group $group)
    {
        $user = Auth::user();
        return ($user->id === $group->owner_id)
            ? Answer::with(['task', 'user'])->where('group_id', $group->id)->get()
            : Answer::with(['task', 'user'])->where('owner_id', $user->id)->get();
    }

    /**
     * @param Request $task
     * @return bool
     */
    public function addTask(Request $task): bool
    {
        $createdTask = Task::create([
            'name' => $task->get('subject'),
            'content' => $task->get('task'),
            'teacher_id' => Auth::user()->id,
            'group_id' => $task->get('group_id'),
        ]);

        $fileName = $this->saveFile($task, $createdTask, 'public' . DIRECTORY_SEPARATOR . 'homework');

        if ($fileName) {
            $createdTask->file = $fileName;
            $createdTask->save();
        }

        if ($createdTask->name === $task['subject'] && $createdTask->content === $task['task']) {
            return true;
        }
        return false;
    }

    /**
     * @param Group $group
     * @return bool
     */
    public function checkOwner(Group $group)
    {
        return $group->owner_id === Auth::user()->id;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getTask(int $id)
    {
        return Task::find($id);
    }

    /**
     * @param $request
     */
    public function editTask($request)
    {
        $task = Task::find($request['task_id']);
        $task->name = $request['subject'];
        $task->content = $request['task'];
        $task->save();
    }

    /**
     * @param Task $task
     * @throws Exception
     */
    public function deleteTask(Task $task)
    {
        $answers = Answer::where('task_id', $task->id)->get();
        foreach ($answers as $answer) {
            if (isset($answer->file)) {
                Storage::delete('public' . DIRECTORY_SEPARATOR . 'answers' . DIRECTORY_SEPARATOR . $answer->file);
            }
        }
        Storage::delete('public' . DIRECTORY_SEPARATOR . 'homework' . DIRECTORY_SEPARATOR . $task->file);
        $task->delete();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getGroupById(int $id)
    {
        return Group::find($id);
    }

    /**
     * @param int $mark
     * @param Answer $answer
     */
    public function setMark(int $mark, Answer $answer)
    {
        $answer = Answer::where('id', '=', $answer->id)->first();
        $answer->mark = $mark;
        $answer->save();
    }

    /**
     * @param $request
     */
    public function addAnswer($request)
    {
        $answer = Answer::create([
            'owner_id' => Auth::user()->id,
            'content' => $request->answer,
            'group_id' => $request->group_id,
            'task_id' => $request->task_id,
        ]);

        $fileName = $this->saveFile($request, $answer, 'public' . DIRECTORY_SEPARATOR . 'answers');

        if ($fileName) {
            $answer->file = $fileName;
            $answer->save();
        }
    }

    /**
     * @param $request
     * @param $model
     * @param $namespace
     * @return false|string
     */
    protected function saveFile($request, $model, $namespace)
    {
        if ($request->files->count() > 0) {
            $fileName = $request->get('group_id') . '-' . $model->id . '-' . mb_strtolower(Auth::user()->name) . '.' . $request->file('file')->getClientOriginalExtension();
            $path = $namespace . DIRECTORY_SEPARATOR . $fileName;

            Storage::put(
                $path,
                file_get_contents($request->file('file')->getRealPath())
            );
            return $fileName;
        }
        return false;
    }
}