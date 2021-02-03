@extends('templates.default')
@section('back')
    <a href="{{route('groups.getSchedule', $group->id)}}" class="btn btn-warning" title="Back"><i
                class="fas fa-long-arrow-alt-left"></i></a>
@endsection
@section('content')
    @include('common.errors')
    <div class="modern-form">
        <form action="{{ route('groups.saveLesson', $group->id) }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="date">Select date</label>
                <input type="date" name="date" class="form-control" id="date">
            </div>
            <div class="form-group">
                <label for="date">Lesson starts</label>
                <input type="time" name="start" class="form-control" id="date">
            </div>
            <div class="form-group">
                <label for="date">Lesson ends</label>
                <input type="time" name="end" class="form-control" id="date">
            </div>
            <button type="submit" class="btn btn-success">Add</button>
        </form>
    </div>
@endsection