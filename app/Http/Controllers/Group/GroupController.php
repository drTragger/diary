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

    /**
     *  Remove the group from storage.
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete($id)
    {
        $group = Group::find($id);
        //        $this->authorize('destroy', $group);
        $group->delete();
        return redirect(route('groups.index'));
    }

    public function selectUser(Group $group)
    {
        return view('group.participant', ['group' => $group,]);
    }

    public function addUser(Request $request, User $user)
    {
        $this->validate(
            $request,
            [
                'email' => 'required|min:6|exists:users',
            ]
        );
        $user = User::where('email', $request->email)->first();
        if (!empty($user)) {
            $user->usersGroups()->attach($user->id, ['group_id'=>$request->id,]);
            return redirect(route('groups.selectUser', $request->id));
        } else {
            return redirect(route('groups.selectUser'));
        }
    }
}
