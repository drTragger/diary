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
                        <th>link</th>
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
{{--                                <form action="{{route('homework.show',[$group->id, $task])}}" method="post">--}}
{{--                                    {{csrf_field()}}--}}
{{--                                    --}}{{--                                        {{method_field('get')}}--}}
{{--                                    <input type="hidden" name="task" value="{{$task}}">--}}
{{--                                    <input type="hidden" name="group_id" value="{{$group->id}}">--}}
{{--                                    <input type="hidden" name="task_content" value="{{$task->content}}">--}}
{{--                                    <input type="hidden" name="task_name" value="{{$task->name}}">--}}
{{--                                    <input type="submit" value="TODO">--}}
{{--                                </form>--}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @foreach ($tasks as $task)
                    <div class="d-flex flex-column bd-highlight ">
                        <div class="group-item w-75">
                            @if(\Illuminate\Support\Facades\Auth::user()->id === $group->owner_id)
                                <form action="{{ route('homework.taskEdition', ['task' => $task->id]) }}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="group_id" value="{{ $group->id }}">
                                    <button type="submit" class="btn btn-default">Edit</button>
                                </form>
                            @endif
                            <div>
                                <p>Homework# {{$task->id}}</p>
                                <p>Subject: {{$task->name}}</p>
                                <p>Date: {{mb_strimwidth($task->created_at,0,10)}}</p>
                                <p>{{$task->content}}</p>
                            </div>
                            <div class="container-a-bnt-info d-flex flex-direction-column">
                                @yield('result')
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="pages">{{$tasks->render()}}</div>
    @else
        <p class="row margin-0-auto ">No homework</p>
    @endif
@endsection

