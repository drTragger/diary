@extends('templates.default')
@section('back')
    <a href="{{route('homework.index', $group->id)}}" class="btn btn-secondary">Back</a>
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
    <div class="add-task fill-bg">
        <form action="{{ route('homework.addTask') }}" method="POST" enctype="multipart/form-data" class="text-center">
            {{ csrf_field() }}
            <input type="hidden" name="group_id" value="{{ $group->id }}">
            <div class="form-group">
                <label for="subject">Title</label>
                <input type="text" name="subject" id="subject" class="form-control" value="{{ old('subject') }}"
                       required maxlength="60" autofocus>
            </div>
            <div class="form-group">
                <label for="task">Task</label>
                <textarea name="task" id="task" class="form-control" cols="30" rows="10">{{ old('task') }}</textarea>
            </div>
            <div class="inline">
                <span>*optional</span>
                <input type="file" name="file" class="form-control-file">
            </div>
            <button type="submit" class="btn btn-success">Add</button>
        </form>
    </div>
@endsection