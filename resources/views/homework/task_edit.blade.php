@extends('templates.default')
@section('back')
    <a href="{{route('homework.index', $group->id)}}" class="btn btn-warning" title="Back"><i class="fas fa-long-arrow-alt-left"></i></a>
@endsection

@section('content')
    @include('common.errors')
    <div class="modern-form">
        <form action="{{ route('homework.editTask') }}" method="post" class="text-center">
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
            <button type="submit" class="btn btn-dark margin-0-auto">Save</button>
        </form>
    </div>
@endsection