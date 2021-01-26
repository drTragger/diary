@extends('templates.default')
@section('back')
    <a href="{{route('homework.index', $group->id)}}" class="btn btn-secondary">Back</a>
@endsection

@section('content')
    <div class="add-task">
        <form action="{{ route('homework.addTask') }}" method="POST" class="text-center">
            {{ csrf_field() }}
            <input type="hidden" name="groupId" value="{{ $group->id }}">
            <div class="form-group">
                <label for="subject">Title</label>
                <input type="text" name="subject" id="subject" class="form-control" required maxlength="60" autofocus>
            </div>
            <div class="form-group">
                <label for="task">Task</label>
                <textarea name="task" id="task" class="form-control" cols="30" rows="10"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Add</button>
        </form>
    </div>
@endsection