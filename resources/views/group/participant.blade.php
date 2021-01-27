@extends('templates.default')
@section('back')
    <a href="{{route('groups.showParticipants', $group->id)}}" class="btn btn-warning"><i class="fas fa-long-arrow-alt-left"></i></a>
@endsection
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="panel panel-default col-12">
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
