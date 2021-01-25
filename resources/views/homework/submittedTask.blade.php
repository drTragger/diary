@extends('templates.default')
@section('nav')
    @include('templates.topnav')
@endsection
@section('content')
    @if(!empty($tasks))
        <div class="container">
            <table class="table">
                <thead>
                <tr>
                    <th class="table-col-1">#</th>
                    <th class="table-col-2">Subject</th>
                    <th class="table-col-3">Estimate</th>
                </tr>
                </thead>
                <tbody class="table">
                @foreach($tasks as $task)
                    <tr>
                        <td>{{$task->id}}</td>
                        <td>{{$task->name}}</td>
                        <td>
                            <a href="{{ route('homework.estimate', $task->id) }}"
                               class="btn main-nav-a-btn">Estimate</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection