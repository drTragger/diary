@extends('templates.default')
@section('back')
    <a href="{{route('homework.index', $group->id)}}" class="btn btn-warning"><i class="fas fa-long-arrow-alt-left"></i></a>
@endsection

@section('content')
    @include('common.errors')
    <div class="modern-form">
        <h3 class="text-center">Homework</h3>
        <h4 class="text-center">Title: {{$task->name}}</h4>
        <p class="word-wrap p-2">{{$task->content}}</p>
        <hr>
        <form action="{{route('homework.addAnswer')}}" method="POST" enctype="multipart/form-data"
              class="text-center">
            {{csrf_field()}}
            {{method_field('put')}}
            <input type="hidden" name="group_id" value="{{ $group->id }}">
            <input type="hidden" name="task_id" value="{{$task->id}}">
            <div class="form-group">
                <label for="answer">Answer</label>
                <textarea class="form-control" rows="5" id="answer" name="answer">{{ old('answer') }}</textarea>
            </div>
            <div class="inline">
                <span>*optional</span>
                <input type="file" name="file" class="form-control-file">
            </div>
            <button type="submit" class="btn btn-dark">Submit</button>
        </form>
    </div>
@endsection