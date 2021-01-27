@extends('templates.default')
@section('back')
    <a href="{{route('groups.index')}}" class="btn btn-secondary">Back</a>
@endsection

@section('content')
    @include('common.errors')
    <a href="{{route('groups.selectUser', $group->id)}}" class="btn btn-success">Add participant</a>
    @if(!empty($participants))
        <table class="table text-center mt-4">
            <thead>
            <tr>
                <th class="table-col-1">Name</th>
                <th class="table-col-2">Email</th>
                <th class="table-col-3">Action</th>
            </tr>
            </thead>

            <tbody class="table">
            @foreach($participants as $participant)
                <tr class="table-color">
                    <td>{{$participant->name}}</td>
                    <td>{{$participant->email}}</td>
                    <td>
                        <form action="{{route('groups.deactivateParticipant', $participant->id)}}" method="post">
                            {{csrf_field()}}
                            {{method_field('put')}}
                            <input type="hidden" name="group_id" value="{{$group->id}}">
                            <button type="submit" class="btn btn-danger">Kick</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
    @else
        <div class="card bg-warning">
            <div class="card-body">There are no participants</div>
        </div>
    @endif
@endsection
