@extends('templates.default')
@section('back')
    <a href="{{route('groups.getSchedule', $group->id)}}" class="btn btn-warning" title="Back"><i
                class="fas fa-long-arrow-alt-left"></i></a>
@endsection
@section('content')
    @include('common.errors')
    <div class="modern-form">
        <h3 class="text-center pt-3 pb-3">Add a new lesson</h3>
        <form action="{{ route('groups.saveLesson', $group->id) }}" method="post">
            {{ csrf_field() }}
            <div class="d-flex justify-content-around flex-wrap text-center mb-3 mt-3">
                <div class="form-group col-sm-3">
                    <label for="date">Select date</label>
                    <input type="date" name="date" class="form-control" id="date">
                </div>
                <div class="form-group col-sm-3">
                    <label for="date">Lesson starts</label>
                    <input type="time" name="start" class="form-control" id="date">
                </div>
                <div class="form-group col-sm-3">
                    <label for="date">Lesson ends</label>
                    <input type="time" name="end" class="form-control" id="date">
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success">Add</button>
            </div>
        </form>
    </div>
@endsection