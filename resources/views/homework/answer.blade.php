@extends('templates.default')
@section('back')
    <a href="{{route('homework.index', $group->id)}}" class="btn btn-secondary">Back</a>
@endsection

@section('content')
    @include('common.errors')
    <div class="container-form bg-light pt-4">
            <h3 class="text-center">Homework</h3>
            <h4 class="text-center">Title: {{$task->name}}</h4>
            <p class="word-wrap p-2">{{$task->content}}</p>
        <hr>
        <form action="{{route('homework.addAnswer')}}" method="POST"
              class="d-flex flex-column text-center">
            {{csrf_field()}}
            {{method_field('put')}}
            <input type="hidden" name="group_id" value="{{$group}}">
            <input type="hidden" name="task_id" value="{{$task->id}}">
            <label for="answer">Answer</label>
            <textarea class="p-2" rows="5" id="answer" name="answer"></textarea>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
@endsection