@extends('templates.default')

@section('nav')
    <li>
        <a href=""
           class="btn main-nav-a-btn">All Marks
        </a>
    </li>
    <li>
        <a href="{{route('groups.create')}}"
           class="btn main-nav-a-btn">Create group
        </a>
    </li>
@endsection

@section('content')
    @include('common.errors')
    @if(count($groups)>0)
        <div class="container d-flex flex-direction-row flex-wrap groups-container">
            <div class="row margin-0-auto w-100">
                @foreach($groups as $group)
                    @if($group->status == '1')
                    <div class="col-3 col-sm-4 groups-item d-flex flex-direction-column justify-space-between">
                        <div class="group-item">
                            <div>
                                <p>Name: {{$group->name}}</p>
                                <p>Description: {{mb_strimwidth($group->description, 0, 200, '...')}}</p>
                                <p>Owner: {{$group->user->name}}</p>
                                <p>Date created: {{mb_strimwidth($group->created_at,0,10)}}</p>
                            </div>
                            <div class="container-a-bnt-info d-flex flex-direction-column">
                                <a href="{{route('groups.show', $group->id)}}" class="btn a-btn-info align-self-center">More
                                    info</a>
                            </div>
                        </div>

                    </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="pages">{{$groups->render()}}</div>
    @else
        NOTHING
    @endif
@endsection
