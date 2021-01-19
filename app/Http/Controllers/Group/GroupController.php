<?php

namespace App\Http\Controllers\Group;

use App\Group;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        $user = $request->user();
        $studentGroups = $user->usersGroups;
        $groups = $user->groups->merge($studentGroups);
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('group.create');
    }

    /**
     * Add a newly created resource in storage.
     * @param Request $request
     */
    public function addGroup(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|min:6',
                'description' => 'required|min:6',
            ]
        );
        $user = $request->user();
        Group::create(
            [
                'name' => $request->name,
                'description' => $request->description,
                'owner_id' => $request->user()->id,
                'status' => Group::ACTIVE,
            ]
        );
        return redirect(route('groups.index'));
    }

    public function show(Group $group)
    {
        //TODO use validator
        $user = Auth::user()->id;
        $owner = $group->owner_id;
        if ($user == $owner) {
            return view('group.showOwnerGroup', ['group' => $group]);
        }
        return view('group.showStudentGroup', ['group' => $group]);
    }

    public function confirmDeactivate($group)
    {
        return view('group.confirmDeactivate', ['group' => $group]);
    }

    /**
     *  Deactivate the group from storage.
     * @param $group
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deactivateGroup($group)
    {
        Group::where('id', $group)->update(['status' => Group::INACTIVE]);
        return redirect(route('groups.index'));
    }

    public function selectUser(Group $group)
    {
        return view('group.participant', ['group' => $group]);
    }

    public function addUser(Request $request)
    {
        $this->validate(
            $request,
            [
                'email' => 'required|min:6|exists:users',
            ]
        );
        $user = User::where('email', $request->email)->first();
        if (count($user->usersGroups) == 0) {
            $mess = 'The participant was added';
            $user->usersGroups()->attach($user->id, ['group_id' => $request->id,]);
            return redirect(route('groups.selectUser', $request->id))->with('mess', $mess);
        } else {
            $userGroups = [];
            foreach ($user->usersGroups as $group) {
                $userGroups[] = $group->pivot->group_id;
            }
            if (!in_array($request->id, $userGroups)) {
                $mess = 'The participant was added';
                $user->usersGroups()->attach($user->id, ['group_id' => $request->id,]);
                return redirect(route('groups.selectUser', $request->id))->with('mess', $mess);
            } else {
                $mess = 'This participant was added earlier!';
                return redirect(route('groups.selectUser', $request->id))->with('mess', $mess);
            }
        }
    }
}
