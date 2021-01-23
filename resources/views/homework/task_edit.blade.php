@extends('templates.default')
@section('nav')
    @include('templates.topnav')
@endsection
@section('content')
    <form action="{{ route('homework.editTask') }}" method="post">
        {{ csrf_field() }}
        {{ method_field('put') }}
        <input type="hidden" name="group_id" value="{{ $group->id }}">
        <input type="hidden" name="task_id" value="{{ $task->id }}">
        <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" name="subject" id="subject" class="form-control" value="{{ $task->name }}" required
                   maxlength="60">
        </div>
        <div class="form-group">
            <label for="task">Task</label>
            <textarea name="task" id="task" class="form-control" cols="30" rows="10">{{ $task->content }}</textarea>
        </div>
        <button type="submit" class="btn btn-default">Edit</button>
    </form>
@endsection