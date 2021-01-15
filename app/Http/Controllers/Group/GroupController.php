<?php
    namespace App\Http\Controllers\Group;
    use App\Group;
    use App\User;
    use Illuminate\Http\Request;
    use App\Http\Requests;
    use App\Http\Controllers\Controller;
    class GroupController extends Controller
    {
        public function index(Request $request)
        {
            $user = $request->user()->id;

//            $ch = Group::where('user_id', '=', $user);
//            $ch = User::find($user); // нахождение владельца группы
//            $groups = Group::with('user')->get();
//
//            dd($groups);




//            foreach ($ch->groups as $group){
//                var_dump($group);
//            }
//            foreach ($ch->groups as $group){
//                var_dump($group);
//            }
//dd($ch);
            $groups = Group::all(); //TODO choose user`s groups
            return view(
                    'groups.index',  //TODO write view
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
            return view('group.create'); //TODO edit view
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
            //TODO change function to create()
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
            return redirect(route('')); //TODO write redirect
        }
        public function selectUser()
        {
            return view('group.participant');
        }
        public function addUser()
        {
        }
    }
