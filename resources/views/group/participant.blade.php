@extends('templates.default')
@section('nav')
    @include('templates.topnav')
@endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div>
                        @include('common.errors')
                    </div>
                    @if(!empty(session('mess')))
                        <div>{{session('mess')}}</div>
                    @endif
                    <div>
                        <form action="{{route('groups.addUser')}}" method="POST" class="d-flex flex-direction-column">
                            {{csrf_field()}}
                            {{method_field('patch')}}
                            <label for="participant">Participant's email</label>
                            <input type="text" name="email" id="participant">
                            <input type="hidden" name="id" value="{{$group->id}}">
                            <input type="submit" name="Add participant">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
