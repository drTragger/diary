@extends('templates.default')

@section('nav')
    <li>
        <a href=""
           class="btn main-nav-a-btn">All Marks
        </a>
    </li>
    <li>
        <a href="{{route('groups.create')}}"
           class="btn main-nav-a-btn">Create group
        </a>
    </li>
@endsection

@section('content')
    <a href="{{route('groups.create')}}" class="btn btn-success">Create group</a>
    @include('common.errors')
    @if(count($groups)>0)
        {{--        <div class="container d-flex flex-direction-row flex-wrap groups-container">--}}
        {{--            <div class="row margin-0-auto w-100">--}}
        <table class="table" style="text-align: center">
            <thead>
            <tr class="table-active">
                <th>Name</th>
                <th>Teacher</th>
                <th>Created</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($groups as $group)
                @if($group->status == '1')
                    <tr>
                        <td class="table-primary">{{ $group->name }}</td>
                        <td>{{ $group->user->name }}</td>
                        <td>{{ $group->created_at }}</td>
                        <td>
                            <a href="{{route('groups.showParticipants', $group->id)}}"
                               class="btn btn-info">Participants</a>
                            <a href="{{ route('homework.index', [$group->id]) }}" class="btn btn-primary">Homework</a>
                            <a href="{{ route('homework.marks', $group->id) }}" class="btn btn-success">Marks</a>
                            <a href="{{route('groups.renameGroup', $group)}}" class="btn btn-warning">Rename Group</a>
                            <a href="{{route('groups.confirmDeactivate', $group)}}" class="btn btn-danger">Deactivate
                                group</a>
                        </td>
                        {{--                        <td><a href="{{ route('homework.index', [$group->id]) }}" class="btn btn-primary">Homework</a></td>--}}
                        {{--                        <td><a href="{{ route('homework.marks', $group->id) }}" class="btn btn-success">Marks</a></td>--}}
                        {{--                        <td><a href="{{route('groups.renameGroup', $group)}}" class="btn btn-warning">Rename Group</a></td>--}}
                        {{--                        <td><a href="{{route('groups.confirmDeactivate', $group)}}" class="btn btn-danger">Deactivate group</a></td>--}}
                    </tr>
                    {{--                        <div class="col-6 groups-item d-flex flex-direction-column justify-space-between">--}}
                    {{--                            <div class="group-item">--}}
                    {{--                                <div>--}}
                    {{--                                    <p>Name: {{$group->name}}</p>--}}
                    {{--                                    <p>Description: {{mb_strimwidth($group->description, 0, 200, '...')}}</p>--}}
                    {{--                                    <p>Owner: {{$group->user->name}}</p>--}}
                    {{--                                    <p>Date created: {{mb_strimwidth($group->created_at,0,10)}}</p>--}}
                    {{--                                </div>--}}
                    {{--                                <div class="container-a-bnt-info d-flex flex-direction-column">--}}
                    {{--                                    <a href="{{route('groups.show', $group->id)}}"--}}
                    {{--                                       class="btn a-btn-info align-self-center">More--}}
                    {{--                                        info</a>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}

                    {{--                        </div>--}}
                @endif
            @endforeach
            </tbody>
        </table>
        {{--            </div>--}}
        <div class="pages">{{$groups->render()}}</div>
        {{--        </div>--}}

    @else
        NOTHING
    @endif
@endsection
