@extends('templates.default')
@section('back')
    <a href="{{route('homework.index', $group->id)}}" class="btn btn-warning"><i class="fas fa-long-arrow-alt-left"></i></a>
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="modern-form">
        <h4 class=" text-center">Add Task</h4>
        <form action="{{ route('homework.addTask') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="group_id" value="{{ $group->id }}">
            <div class="form-group">
                <label for="subject">Title:</label>
                <input type="text" name="subject" id="subject" class="form-control" value="{{ old('subject') }}"
                       required maxlength="60" autofocus>
            </div>
            <div class="form-group">
                <label for="task">Task:</label>
                <textarea name="task" id="task" class="form-control" cols="30" rows="10">{{ old('task') }}</textarea>
            </div>
            <div class="inline">
                <span>*optional</span>
                <input type="file" name="file" class="form-control-file" accept="image/*, application/msword, application/pdf">
            </div>
            <div class="text-center mt-2">
                <button type="submit" class="btn btn-success">Add</button>
            </div>
        </form>
    </div>
@endsection