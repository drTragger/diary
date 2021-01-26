@extends('templates.default')
@section('back')
    <a href="{{route('groups.showParticipants', $group->id)}}" class="btn btn-warning">Back</a>
@endsection
@section('content')
    <div class="panel panel-default col-12 ">
        <div>
            @include('common.errors')
        </div>
        @if(!empty(session('mess')))
            <div class="bg-warning pt-2 pb-2 text-center mb-3">{{session('mess')}}</div>
        @endif
        <div class="fill-bg">
            <form action="{{route('groups.addUser')}}" method="POST" class="text-center">
                {{csrf_field()}}
                {{method_field('patch')}}
                <input type="hidden" name="id" value="{{$group->id}}">
                <div class="form-group">
                    <label for="participant">Participant's email</label>
                    <input type="text" name="email" id="participant" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Add participant</button>
            </form>
        </div>
    </div>
@endsection
