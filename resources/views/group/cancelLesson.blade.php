@extends('templates.default')
@section('back')
    <a href="{{url()->previous()}}" class="btn btn-warning" title="Back"><i class="fas fa-long-arrow-alt-left"></i></a>
@endsection

@section('content')
    @include('common.errors')
    <div class="modern-form">
    <h3 class="text-center pt-3 pb-3">Cancel the Lesson</h3>
    <h6 class="text-center pl-2 pr-2 mb-3">You can cancel or choose another day of the lesson</h6>
        <div class="text-center">
            <a class="btn btn-danger text-center mt-3 mb-5" href="{{route('groups.deactivateLesson', $day->id)}}">Cancel the lesson</a>
</div>
    <h3 class="text-center col-12">Choose another day</h3>
    <form action="{{route('groups.changeLesson', $day->id)}}" method="POST" class="mt-3 col-12">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class="d-flex flex-wrap justify-content-center align-items-center ">
            <div class="d-flex flex-column flex-wrap col-4">
                <div class="form-group">
                    <label for="calendar_start"></label>
                    <input type="date" name="start" id="calendar_start" class="form-control" value="{{ old('start') }}" required>
                </div>
            </div>
        </div>
        <div class="text-center mt-2">
            <button type="submit" class="btn btn-success">Save</button>
        </div>
    </form>
    </div>
@endsection