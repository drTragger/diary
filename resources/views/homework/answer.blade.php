@extends('templates.default')
@section('back')
    <a href="{{route('homework.index', $group->id)}}" class="btn btn-warning" title="Back"><i class="fas fa-long-arrow-alt-left"></i></a>
@endsection

@section('content')
    @include('common.errors')
    <div class="modern-form">
        <h3 class="text-center">Homework</h3>
        <h4 class="text-center">{{$task->name}}</h4>
        <p class="word-wrap my-2">Task: {{$task->content}}</p>
        <form action="{{route('homework.addAnswer')}}" method="POST" enctype="multipart/form-data"
              class="text-center mt-2">
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
                <input type="file" name="file" class="form-control-file" accept="image/*, application/msword, application/pdf">
            </div>
            <button type="submit" class="btn btn-dark">Submit</button>
        </form>
    </div>
@endsection