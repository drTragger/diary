<?php

namespace App\Http\Controllers\Group;

use App\Group;
use App\User;
use App\UsersGroup;
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
        //$groups = Group::paginate(10); //count pagination

        $user = $request->user();
        $groups = $user->groups; // получение групп которыми владеет пользователь
        $studentGroups = $user->usersGroups; // получение групп в которых пользователь является студентом
        //TODO view отдельно для групп
        return view(
            'group.index',
            [
                'groups' => $groups,
                'studentsGroups' => $studentGroups,
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
        return view('group.selectGroup', ['group' => $group]);
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
                'email' => 'required|min:6',
            ]
        );
        dd($request);
//        dd(User::where('email', $request->email )->get());
        $user = User::where('email', $request->email)->get();
        if (!empty($user)) {
            // TODO add user to group
        } else {
            $mess = 'Данного пользователя ненайдено';
            return redirect(route('groups.selectUser', ['mess' => $mess]));
            //TODO view error massage
        }

//        return redirect(route('groups.show'));
    }
}
