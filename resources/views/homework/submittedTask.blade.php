@extends('templates.default')
@section('nav')
        @include('templates.topnav')
@endsection
@section('content')

    @if(!empty($tasks))
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Subject</th>
                <th>Estimate</th>
            </tr>
            </thead>
            <tbody class="table">
            @foreach($tasks as $task)
                <tr>
                    <td>{{$task->id}}</td>
                    <td>{{$task->name}}</td>
                    <td>
                        <a href="{{ route('homework.estimate', $task->id) }}" class="btn main-nav-a-btn">Estimate</a>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
    @endif
@endsection