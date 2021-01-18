@extends('templates.default')

@section('content')
    <div class="add-task">
        <form action="{{ route('homework.addTask') }}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="groupId" value="{{ $groupId }}">
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" name="subject" id="subject" class="form-control" required maxlength="60">
            </div>
            <div class="form-group">
                <label for="task">Task</label>
                <textarea name="task" id="task" class="form-control" cols="30" rows="10"></textarea>
            </div>
            <button type="submit" class="btn btn-default">Add</button>
        </form>
    </div>
@endsection