@extends('templates.default')
@section('nav')
    <li>
        <a href="#" class="btn main-nav-a-btn">Marks</a>
    </li>
    <li>
        <a href="{{ route('homework.index', $id) }}" class="btn main-nav-a-btn">Homework</a>
    </li>
@endsection
@section('content')
    @include('common.errors')
    <div class="container-form">
        <h3 class="text-center">Send task</h3>
        <h4 class="text-center">Title: {{$task->name}}</h4>
        <h4>Homework</h4>
        <div>{{$task->content}}</div>
        <hr>
        <form action="{{route('homework.addAnswer')}}" method="POST" class="d-flex flex-direction-column">  {{--TODO send task--}}
            {{csrf_field()}}
            {{method_field('put')}}
            <input type="hidden" name="group_id" value="{{$id}}">
                        <input type="hidden" name="task_id" value="{{$task->id}}">
            <label for="answer">Answer</label>
            <textarea type="text" name="answer" id="answer"></textarea>
            <input type="submit"
                   value="Summit">
        </form>
    </div>
@endsection