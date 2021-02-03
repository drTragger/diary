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
                <div class="d-flex flex-column flex-wrap align-items-center">
                    <div class="d-flex justify-content-around w-100 mt-3">
                        <div class="form-group d-flex align-items-baseline">
                            <label for="calendar_start" class="mr-2">Start</label>
                            <input type="date" name="start" id="calendar_start" class="form-control"
                                   value="{{ old('start') }}" required>
                        </div>
                        <div class="form-group d-flex align-items-baseline">
                            <label for="calendar_end" class="mr-2">End</label>
                            <input type="date" name="end" id="calendar_end" class="form-control"
                                   value="{{ old('end') }}" required>
                        </div>
                    </div>

                    <h5 class="text-center">Days</h5>

                    <div class="d-flex justify-content-between w-100 mb-4 mt-3 days">
                        <div class="day-time d-flex flex-column align-items-center justify-content-start">
                            <div class="form-check-inline">
                                <input type="checkbox" class="form-check-input" name="days[]" id="monday"
                                       value="1">
                                <label for="monday" class="form-check-label">Monday</label>
                            </div>
                        </div>
                        <div class="day-time d-flex flex-column align-items-center justify-content-start">
                            <div class="form-check-inline">
                                <input type="checkbox" class="form-check-input" name="days[]" id="tuesday"
                                       value="2">
                                <label for="tuesday" class="form-check-label">Tuesday</label>
                            </div>
                        </div>
                        <div class="day-time d-flex flex-column align-items-center justify-content-start">
                            <div class="form-check-inline">
                                <input type="checkbox" class="form-check-input" name="days[]" id="wednesday"
                                       value="3">
                                <label for="wednesday" class="form-check-label">Wednesday</label>
                            </div>
                        </div>
                        <div class="day-time d-flex flex-column align-items-center justify-content-start">
                            <div class="form-check-inline">
                                <input type="checkbox" class="form-check-input" name="days[]" id="thursday"
                                       value="4">
                                <label for="thursday" class="form-check-label">Thursday</label>
                            </div>
                        </div>
                        <div class="day-time d-flex flex-column align-items-center justify-content-start">
                            <div class="form-check-inline">
                                <input type="checkbox" class="form-check-input" name="days[]" id="friday"
                                       value="5">
                                <label for="friday" class="form-check-label">Friday</label>
                            </div>
                        </div>
                        <div class="day-time d-flex flex-column align-items-center justify-content-start">
                            <div class="form-check-inline">
                                <input type="checkbox" class="form-check-input" name="days[]" id="saturday"
                                       value="6">
                                <label for="saturday" class="form-check-label">Saturday</label>
                            </div>
                        </div>
                        <div class="day-time d-flex flex-column align-items-center justify-content-start">
                            <div class="form-check-inline">
                                <input type="checkbox" class="form-check-input" name="days[]" id="sunday"
                                       value="7">
                                <label for="sunday" class="form-check-label">Sunday</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success">Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection
