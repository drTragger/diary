<?php

namespace App\Http\Controllers\Group;

use App\{Answer, Day, Group, Schedule, User};
use App\Http\Requests\{AddParticipantRequest, GroupRequest};
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\{Storage, Auth};
use Illuminate\Http\{RedirectResponse, Request};
use App\Http\Controllers\Controller;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class GroupController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $studentGroups = $user->usersGroups;
        $groups = $user->groups()->where('status', Group::ACTIVE)->get()->merge($studentGroups);
        $groups = $this->paginate($groups, 10)->setPath('groups');
        return view(
            'group.index',
            [
                'groups' => $groups,
            ]
        );
    }

    /**
     * Show the form for creating a new group.
     * @return Factory|View
     */
    public function create()
    {
        return view('group.create');
    }

    /**
     * Add a newly created resource in storage.
     * @param GroupRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function addGroup(GroupRequest $request)  // was changed
    {
        $start = Carbon::parse($request->start);
        $end = Carbon::parse($request->end);
        $days = $end->diffInDays($start);

        $group = Group::create(
            [
                'name' => $request->name,
                'description' => $request->description,
                'owner_id' => $request->user()->id,
                'status' => Group::ACTIVE,
            ]
        );

        $schedule = Schedule::create(
            [
                'group_id' => $group->id,
                'start' => $request->start,
                'end' => $request->end,
            ]
        );

        for ($i = 0; $i < $days; $i++) {
            foreach ($request->days as $day) {
                if ($start->dayOfWeek == $day) {
                    Day::create(
                        [
                            'schedule_id' => $schedule->id,
                            'day' => $day,
                            'date' => $start,
                            'status' => Group::ACTIVE,
                        ]
                    );
                }
            }
            $start->addDay();
        }
        return redirect(route('groups.index'));
    }

    public function show(Group $group)
    {
        if (Auth::user()->id == $group->owner_id) {
            return view('group.showOwnerGroup', ['group' => $group]);
        }
        return view('group.showStudentGroup', ['group' => $group]);
    }

    public function renameGroup(Group $group)
    {
        return view('group.rename', ['group' => $group]);
    }

    public function saveRename(Request $request)
    {
        $this->validate(
            $request,
            [
                'group_name' => 'required|min:5'
            ]
        );
        $group = Group::where('id', $request->get('group_id'))->first();
        $group->name = $request->get('group_name');
        $group->save();
        return redirect(route('groups.index'));
    }

    public function confirmDeactivate($group)
    {
        return view('group.confirmDeactivate', ['group' => $group]);
    }

    /**
     *  Deactivate the group from storage.
     * @param Group $group
     * @return RedirectResponse|Redirector
     */
    public function deactivateGroup(Group $group)
    {
        $group->update(['status' => Group::INACTIVE]);

//        $group->schedule->days()->update(['status' => Group::INACTIVE], ['date' => false]);

        return redirect(route('groups.index'));
    }

    public function selectUser(Group $group)
    {
        return view('group.participant', ['group' => $group]);
    }

    public function showParticipants($group)
    {
        $group = Group::find($group);
        $participants = [];
        foreach ($group->students as $participant) {
            if ($participant->pivot->status != Group::INACTIVE) {
                $user = User::find($participant->pivot->user_id);
                $participants[] = $user;
            }
        }
        return view('group.showParticipants', ['participants' => $participants, 'group' => $group]);
    }

    public function deactivateParticipant(User $participant, Request $request)
    {
        $answers = Answer::where('owner_id', $participant->id)->get();

        foreach ($answers as $answer) {
            if (isset($answer->file)) {
                Storage::delete('public' . DIRECTORY_SEPARATOR . 'answers' . DIRECTORY_SEPARATOR . $answer->file);
            }
            $answer->delete();
        }

        $participant->usersGroups()->detach(['user_id' => $participant->id, 'group_id' => $request->group_id]);

        return redirect(route('groups.showParticipants', $request->group_id));

    }

    public function addUser(AddParticipantRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if (count($user->usersGroups) == 0) {
            $mess = 'The participant was added';
            $user->usersGroups()->attach($user->id, ['group_id' => $request->id, 'status' => Group::ACTIVE]);
            return redirect(route('groups.showParticipants', $request->group_id))->with('mess', $mess);
        } else {
            $userGroups = [];
            foreach ($user->usersGroups as $group) {
                $userGroups[] = $group->pivot->group_id;
            }
            if (!in_array($request->id, $userGroups)) {
                $mess = 'The participant was added';
                $user->usersGroups()->attach($user->id, ['group_id' => $request->id, 'status' => Group::ACTIVE]);
                return redirect(route('groups.selectUser', $request->id))->with('mess', $mess);
            } else {
                $mess = 'This participant was added earlier!';
                return redirect(route('groups.selectUser', $request->id))->with('mess', $mess);
            }
        }
    }

    public function getSchedule(Group $group)
    {
        $schedule = Schedule::where('group_id', $group->id)->first();
        $days = Day::where([
            ['schedule_id', $schedule->id],
            ['status', 1],
        ])->get();
        $check = Auth::user()->id == $group->owner_id;
            return view('group.schedule', ['days' => $days, 'check' => $check]);
    }

    public function cancelLesson(Day $day){
        return view('group.cancelLesson', ['day' => $day]);
    }

    public function deactivateLesson(Day $day){
        $day->status = 0;
        $day->save();
        $schedule = Schedule::where('id', $day->schedule_id)->first();
        return redirect()->route('groups.getSchedule', $schedule->group_id);
    }

    public function changeLesson(Day $day, Request $request){
        $start = Carbon::parse($request->start);
        $day->day = $start->dayOfWeek;
        $day->date = $start;
        $day->save();
        $schedule = Schedule::where('id', $day->schedule_id)->first();
        return redirect()->route('groups.getSchedule', $schedule->group_id);
    }

}
