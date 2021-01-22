@extends('homework.homework')
@section('stnav')
    <li>
        <a href="#" class="btn main-nav-a-btn">Marks</a>
    </li>
    <li>
        <a href="{{ route('homework.index', $group->id) }}" class="btn main-nav-a-btn">Homework</a>
    </li>
@endsection
@section('result')
    @include('common.errors')
    <div class="container-form">
        <h3 class="text-center">Send task</h3>
        <form action="{{route('homework.addAnswer')}}" method="POST" class="d-flex flex-direction-column">
            {{csrf_field()}}
            {{method_field('put')}}
            <input type="hidden" name="group_id" value="{{$group->id}}">
{{--            <input type="hidden" name="task_id" value="{{$task->id}}">--}}
            <label for="answer">Answer</label>
            <textarea type="text" name="answer" id="answer"></textarea>
            <input type="submit"
                   value="Summit">
        </form>
    </div>
@endsection