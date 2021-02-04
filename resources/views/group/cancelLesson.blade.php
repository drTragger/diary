@extends('templates.default')
@section('back')
    <a href="{{ route('groups.getSchedule', $day->schedule_id) }}" class="btn btn-warning" title="Back"><i
                class="fas fa-long-arrow-alt-left"></i></a>
@endsection

@section('content')
    @include('common.errors')
    <div class="modern-form">
        <h3 class="text-center pt-3 pb-3">Cancel the Lesson</h3>
        <h6 class="text-center pl-2 pr-2 mb-3">You can cancel, delete or choose another day of the lesson</h6>
        <div class="d-flex justify-content-center text-center">
            <div class="m-2">
                <form action="{{ route('groups.deactivateLesson', $day->id) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-danger text-center">Delete the lesson</button>
                </form>
            </div>
            <div class="m-2">
                <form action="{{route('groups.cancelledLesson', $day->id)}}" method="post">
                    {{ csrf_field() }}
                    <button class="btn btn-danger text-center">Cancel the lesson</button>
                </form>
            </div>
        </div>
        <hr class="mb-4 mt-4">
        <h3 class="text-center col-12">Choose another day</h3>
        <form action="{{route('groups.changeLesson', $day->id)}}" method="POST" class="mt-3 col-12">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="d-flex flex-wrap justify-content-center align-items-center ">
                <div class="d-flex flex-wrap w-100 justify-content-around text-center">
                    <div class="form-group col-sm-3">
                        <label for="date">Date</label>
                        <input type="date" name="date" id="date" class="form-control"
                               value="{{ old('date') }}" required>
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="start">Lesson starts</label>
                        <input type="time" name="start" id="start" class="form-control" value="{{ old('start') }}"
                               required>
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="end">Lesson ends</label>
                        <input type="time" name="end" id="end" class="form-control" value="{{ old('end') }}"
                               required>
                    </div>
                </div>
            </div>
            <div class="text-center mt-2">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
    </div>
@endsection
