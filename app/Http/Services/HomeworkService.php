<?php


namespace App\Http\Services;

use App\{Answer, Group, Task, Checked_asnwers};
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function addTask(array $task): bool
    {
        $createdTask = Task::create([
            'name' => $task['subject'],
            'content' => $task['task'],
            'teacher_id' => Auth::user()->id,
            'group_id' => $task['groupId'],
        ]);

        if ($createdTask->name === $task['subject'] && $createdTask->content === $task['task']) {
            return true;
        }
        return false;
    }

    public function checkOwner(Request $request)
    {
        $group = $request->id;
        $group = Group::where('id', $group)->first();
        $owner = $group->owner_id;
        $user = Auth::user()->id;
        if ($owner === $user) {
            return true;
        }
        return false;
    }

    public function getTask(int $id)
    {
        return Task::where('id', $id);
    }

    public function editTask($request)
    {
        $task = Task::where('id', '=', $request['task_id'])->first();
        $task->name = $request['subject'];
        $task->content = $request['task'];
        $task->save();
    }

    public function deleteTask(Task $task)
    {
        $task->delete();
    }

    public function getGroupById(int $id)
    {
        return Group::where('id', $id)->first();
    }

    public function setMark(int $mark, Answer $answer)
    {
        $answer = Answer::where('id', '=', $answer->id)->first();
        $answer->mark = $mark;
        $answer->save();
    }
}