@extends('templates.default')
@section('back')
    <a href="{{route('groups.index')}}" class="btn btn-warning"><i class="fas fa-long-arrow-alt-left"></i></a>
@endsection
@section('content')
    @include('common.errors')
    <div id='calendar' class="fill-bg"></div>
@endsection
@section('actions')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                timeZone: 'UTC',
                themeSystem: 'bootstrap',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                },
                dayMaxEvents: true, // allow "more" link when too many events
                events: [
                        @foreach($days as $day)
                        @if($check)
                    {
                        title: 'Cancel',
                        start: '{{$day->datetime}}',
                        url: '{{ route('groups.cancelLesson', $day->id) }}',

                    },
                        @else
                    {
                        title: 'Lesson',
                        start: '{{$day->datetime}}',
                    },
                    @endif
                    @endforeach
                ]
            });

            calendar.render();
        });
    </script>

@endsection