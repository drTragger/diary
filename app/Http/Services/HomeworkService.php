<?php


namespace App\Http\Services;

use App\Checked_asnwers;
use App\Group;
use Illuminate\Database\Eloquent\Builder;
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
}