<?php

namespace App\Http\Controllers\Group;

use App\{Answer, Day, Group, Schedule, User};
use App\Http\Requests\{AddParticipantRequest, ChangeLessonRequest, GroupRequest};
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
        $startTime = $request->get('start_time');
        $endTime = $request->get('end_time');

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
                'start' => $request->get('start'),
                'end' => $request->get('end'),
            ]
        );

        for ($i = 0; $i < $days; $i++) {
            foreach ($request->get('days') as $key => $day) {
                if ($start->dayOfWeek == $day) {
                    Day::create(
                        [
                            'schedule_id' => $schedule->id,
                            'day' => $day,
                            'start' => (string)$start->setTimeFromTimeString($startTime[$key]),
                            'end' => (string)$start->setTimeFromTimeString($endTime[$key]),
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
        $group = Group::find($request->group_id);
        if ($user->id == $group->owner_id) {
            $mess = "You cannot add yourself because you are admin this group";
            return redirect(route('groups.selectUser', $request->id))->with('mess', $mess);
        } else if (count($user->usersGroups) == 0) {
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
        $days = $group->schedule->days()->whereIn('status', [1, 3])->get();
        $check = Auth::user()->id == $group->owner_id;
        return view('group.schedule', ['days' => $days, 'check' => $check, 'group' => $group]);
    }

    public function cancelLesson(Day $day)
    {
        return view('group.cancelLesson', ['day' => $day]);
    }

    public function deactivateLesson(Day $day): RedirectResponse
    {
        $day->update(['status' => Group::INACTIVE]);
        return redirect()->route('groups.getSchedule', $day->schedule->group_id);
    }

    public function changeLesson(Day $day, ChangeLessonRequest $request): RedirectResponse
    {
        $date = Carbon::parse($request->get('date'));
        $start = Carbon::parse($request->get('start'));
        $end = Carbon::parse($request->get('end'));
        $busyDay = Day::where('schedule_id', $day->schedule_id)->where('status', '!=', Group::INACTIVE)->whereDate('start', '=', $date)->first();

        if ($this->timeIsBusy($date, $start, $end, $busyDay)) {
            $busyTimeStart = Carbon::parse($busyDay->start)->format('H:i');
            $busyTimeEnd = Carbon::parse($busyDay->end)->format('H:i');
            return redirect()->route('groups.cancelLesson', $day->id)
                ->withErrors(['error' => "This time is busy. There is a lesson from {$busyTimeStart} till {$busyTimeEnd}. Please, select another time"]);
        }

        $day->update(['status' => Group::CANCELLED]);
        Day::create([
            'schedule_id' => $day->schedule_id,
            'day' => $date->dayOfWeek,
            'start' => (string)$start,
            'end' => (string)$end,
            'status' => Group::ACTIVE,
        ]);

        return redirect()->route('groups.getSchedule', $day->schedule->group_id);
    }

    protected function timeIsBusy(Carbon $date, Carbon $start, Carbon $end, ?Day $busyDay): bool
    {
        if (isset($busyDay)) {
            $startBetween = $date->setTimeFrom($start)->isBetween(Carbon::parse($busyDay->start), Carbon::parse($busyDay->end));
            $endBetween = $date->setTimeFrom($end)->isBetween(Carbon::parse($busyDay->start), Carbon::parse($busyDay->end));
            if ($startBetween || $endBetween) {
                return true;
            }
        }
        return false;
    }

    public function cancelledLesson(Day $day)
    {
        $day->update(['status' => Group::CANCELLED]);
        return redirect(route('groups.getSchedule', $day->schedule->group->id));
    }


    public function addLesson(Group $group)
    {
        return view('group.addLesson', ['group' => $group]);
    }

    public function saveLesson(Group $group, Request $request)
    {
        $date = Carbon::parse($request->get('date'));
        $start = Carbon::parse($request->get('start'));
        $end = Carbon::parse($request->get('end'));
        $busyDay = Day::where('schedule_id', $group->schedule->id)->where('status', '!=', Group::INACTIVE)->whereDate('start', '=', $date)->first();

        if ($this->timeIsBusy($date, $start, $end, $busyDay)) {
            $busyTimeStart = Carbon::parse($busyDay->start)->format('H:i');
            $busyTimeEnd = Carbon::parse($busyDay->end)->format('H:i');
            return redirect()->route('groups.addLesson', $group->id)
                ->withErrors(['error' => "This time is busy. There is a lesson from {$busyTimeStart} till {$busyTimeEnd}. Please, select another time"]);
        }

        $schedule = $group->schedule;
        $schedule->days()->create([
            'schedule_id' => $schedule->id,
            'day' => Carbon::parse($request->get('date'))->dayOfWeek,
            'start' => Carbon::parse($request->get('date'))->setTimeFromTimeString($request->get('start')),
            'end' => Carbon::parse($request->get('date'))->setTimeFromTimeString($request->get('end')),
            'status' => Group::ACTIVE,
        ]);
        return redirect()->route('groups.getSchedule', $group->id);
    }
}
