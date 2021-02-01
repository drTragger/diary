@extends('templates.default')
@section('back')
    <a href="{{route('groups.index')}}" class="btn btn-warning" title="Back"><i class="fas fa-long-arrow-alt-left"></i></a>
@endsection
@section('content')
    @include('common.errors')
    <div class="container-form d-flex flex-wrap justify-content-center">
        <div class="container-form d-inline-flex flex-wrap  fill-bg">
            <h3 class="text-center col-12">Create new group</h3>
            <form action="{{route('groups.add')}}" method="POST" class="mt-5 col-12">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description" id="description"
                              class="form-control">{{ old('description') }}</textarea>
                </div>

                <h4 class="text-center">Schedule</h4>
                <div class="d-flex flex-wrap justify-content-center align-items-center">
                    <div class="d-flex flex-column flex-wrap col-4">
                        <label for="calendar">start</label>
                        <input type="date" name="calendar_start" id="calendar_start" required>
                        <label for="calendar">end</label>
                        <input type="date" name="calendar_end" id="calendar_end" required>
                    </div>

                    <div>
                        <input type="checkbox" name="days[]" id="monday" value="monday">
                        <label for="monday">Monday</label>
                        <input type="checkbox" name="days[]" id="tuesday" value="tuesday">
                        <label for="tuesday">Tuesday</label>
                        <input type="checkbox" name="days[]" id="wednesday" value="wednesday">
                        <label for="wednesday">Wednesday</label>
                        <input type="checkbox" name="days[]" id="thursday" value="thursday">
                        <label for="thursday">Thursday</label>
                        <input type="checkbox" name="days[]" id="friday" value="friday">
                        <label for="friday">Friday</label>
                        <input type="checkbox" name="days[]" id="saturday" value="saturday">
                        <label for="saturday">Saturday</label>
                        <input type="checkbox" name="days[]" id="sunday" value="sunday">
                        <label for="sunday">Sunday</label>
                    </div>
                </div>


                <input type="hidden" name="status" value="on">
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection
