@extends('templates.default')
@section('nav')
    @yield('stnav')
@endsection
@section('content')
    @if(count($tasks)>0)
        <div class="container d-flex flex-direction-row flex-wrap groups-container ">
            <div class="row margin-0-auto ">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Date</th>
                        @if(\Illuminate\Support\Facades\Auth::user()->id === $group->owner_id)
                            <th>Submitted</th>
                            <th>Action</th>
                        @else
                            <th>Link</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td>{{$task->id}}</td>
                            <td>{{$task->name}}</td>
                            <td>{{mb_strimwidth($task->created_at,0,10)}}</td>
                            <td>
                                @if($check)
                                    @include('homework.homeworkOwner')
                                @else
                                    @include('homework.homeworkStudent')
                                @endif
                            </td>
                            @if(\Illuminate\Support\Facades\Auth::user()->id === $group->owner_id)
                                <td>
                                    <form action="{{ route('homework.taskEdition', ['task' => $task->id]) }}"
                                          method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="group_id" value="{{ $group->id }}">
                                        <button type="submit" class="btn btn-default">Edit</button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @else
                    <p class="row margin-0-auto ">No homework</p>
    @endif
@endsection

