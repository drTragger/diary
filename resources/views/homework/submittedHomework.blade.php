@extends('templates.default')
@section('nav')
        @include('templates.topnav')
@endsection
@section('content')
    <div class="container-form">
        <h3 class="text-center">Submitted homework</h3>
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
                            <a href="#" class="btn a-btn-info align-self-center">Estimate</a>
                            <a href="{{route('homework.submitted', $task->id)}}" class="btn a-btn-info align-self-center">Estimate</a>
{{--                            //TODO route estimate homework--}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
@endsection