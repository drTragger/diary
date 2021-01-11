<?php


namespace App\Http\Services;

use App\Checked_asnwers;
use App\Group;

class HomeworkService
{
    /**
     * Gets the marks for current group
     * @param int $groupId
     * @return Checked_asnwers
     */
    public function getMarks(int $groupId): Checked_asnwers
    {
        return Checked_asnwers::where('group_id', $groupId);
    }

    /**
     * Gets the marks of a specific user
     * @param int $userId
     * @return Checked_asnwers
     */
    public function getMark(int $userId): Checked_asnwers
    {
        return Checked_asnwers::with('answers')->where('owner_id', '=', $userId);
    }

    public function checkTeacher(int $userId, int $groupId)
    {
        $group = Group::where('id', $groupId);
        return $group->id === $groupId;
    }
}