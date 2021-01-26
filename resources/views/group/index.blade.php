@extends('templates.default')

@section('content')
    <a href="{{route('groups.create')}}" class="btn btn-success">Create group</a>
    @include('common.errors')
    @if(count($groups)>0)
        <table class="table text-center">
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
                    <tr class="table-color">
                        <td>{{ $group->name }}</td>
                        <td>{{ $group->user->name }}</td>
                        <td>{{ $group->created_at }}</td>
                        <td>
                            <a href="{{ route('homework.index', [$group->id]) }}"
                               class="btn btn-primary">Homeworks</a>
                            <a href="{{ route('homework.marks', $group->id) }}" class="btn btn-success">Marks</a>
                            @if($group->owner_id == Auth::user()->id)
                                <a href="{{route('groups.showParticipants', $group->id)}}"
                                   class="btn btn-info">Participants</a>
                                <a href="{{route('groups.renameGroup', $group)}}" class="btn btn-warning">Rename
                                    Group</a>
                                <a href="{{route('groups.confirmDeactivate', $group)}}" class="btn btn-danger">Deactivate
                                    group</a>
                            @endif
                        </td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
        <div class="pages">{{$groups->render()}}</div>
    @else
        <div class="bg-warning text-center pt-3 pb-2">
            <h4>You have no groups at the moment</h4>
        </div>
    @endif
@endsection
