@extends('templates.index')
@section('content')

    @if(count($tasks)>0)
        @foreach ($tasks as $task)
            <div>
                <div>
                    <div>
                        Homework# {{$task->id}}
                    </div>
                    <div>
                        Subject: {{$task->name}}
                    </div>
                    <div>
                        Date: {{$task->date_created}}
                    </div>
                </div>
                <div>
                    {{$task->content}}
                </div>
                <div>
<form action="" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="file" name="task">
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
                </div>
            </div>
        @endforeach
    @endif
@endsection

