<?php


namespace App\Http\Services;

use App\Checked_asnwers;
use App\Group;
use App\Task;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeworkService
{
    /**
     * Gets the marks
     * @param Group $group
     * @return Checked_asnwers|Builder
     */
    public function getMarks(Group $group)
    {
        $user = Auth::user();
        return ($user->id === $group->owner_id)
            ? Checked_asnwers::where('group_id', $group->id)
            : Checked_asnwers::with(['answer' => function ($query) use ($user) {
                $query->where('owner_id', '=', $user->id);
            }]);
    }

    public function addTask(array $task)
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
}