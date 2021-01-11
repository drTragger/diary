<?php

namespace App\Http\Controllers\Group;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class GroupController extends Controller
{
    public function index(Request $request)
    {
        $groups = Group::all(); //TODO choose user`s groups
        return view('',  //TODO write view
            [
                'groups' => $groups,
            ]
        );
    }

    /**
     * Show the form for creating a new group.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('group.create'); //TODO edit view
    }

    /**
     * Add a newly created resource in storage.
     *
     * @param Request $request
     */
    public function add(Request $request)
    {
        $this->validate(
            $request,
            [
                //TODO validation
            ]
        );
        $user = $request->user();
        //TODO change function to create()
        $group = new Group();
        $group->name = $request->name;
        $group->description = $request->description;
        $group->owner_id = $user->id;
        $group->status = $request->status;
        $group->save();
    }

    public function show($id)
    {

    }

    /**
     *  Remove the group from storage.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete($id)
    {
        $group = Group::find($id);
//        $this->authorize('destroy', $group);
        $group->delete();
        return redirect(route('')); //TODO write redirect
    }

    public function addUser()
    {

    }
}
