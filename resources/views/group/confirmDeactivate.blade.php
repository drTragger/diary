@extends('templates.default')

@section('content')
    @include('common.errors')
    <div class="container-form">
        <h3 class="text-center">Deactivate Group</h3>
        <form action="{{route('groups.deactivateGroup', $group)}}" method="POST" class="text-center">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <input type="submit" value="Deactivate Group" class="btn main-nav-a-btn">
        </form>
    </div>
@endsection
