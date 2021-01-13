@extends('templates.default')

@section('content')
    @include('common.errors')
    <a href="{{route('groups.selectUser')}}">
        <li>Add participant</li>
    </a>
    <a href="#">
        <li>Delete group</li>
    </a>
    <div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div>
                    <div>
                        <p>Title: {{$group->name}}</p>
                        <p>Description: {{$group->description}}</p>
                        <p>Date created: {{$group->created_at}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
