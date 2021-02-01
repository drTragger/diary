@extends('templates.default')

@section('content')
    <a href="{{route('groups.create')}}" class="btn btn-success">Create group</a>
    @include('common.errors')
    @if(count($groups)>0)
        <table class="table text-center mt-4">
            <thead>
            <tr>
                <th>Name</th>
                <th>Teacher</th>
                <th>Created</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($groups as $group)
                <tr class="table-color">
                    <td>{{ $group->name }}</td>
                    <td>{{ $group->user->name }}</td>
                    <td>{{ $group->created_at }}</td>
                    <td>
                        <a href="{{ route('homework.index', $group->id) }}"
                           class="btn btn-primary">Homework</a>
                        <a href="{{ route('homework.marks', $group->id) }}" class="btn btn-success">Marks</a>
                        {{--                            START TEST--}}
                        <a href="{{route('groups.getSchedule', $group->id)}}" class="btn btn-secondary">Schedule</a>
                        {{--                            END TEST--}}
                        @if($group->owner_id == Auth::user()->id)
                            <a href="{{route('groups.showParticipants', $group->id)}}"
                               class="btn btn-secondary">Participants</a>
                            <a href="{{route('groups.renameGroup', $group)}}" class="btn btn-secondary">Rename</a>
                            <a href="{{route('groups.confirmDeactivate', $group)}}"
                               class="btn btn-secondary">Deactivate</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination">
            <div class="pagination-buttons">
                {{ $groups->links() }}
            </div>
        </div>
    @else
        <div class="card bg-warning mt-4">
            <div class="card-body">There are no groups</div>
        </div>
    @endif
@endsection
