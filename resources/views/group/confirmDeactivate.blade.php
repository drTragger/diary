@extends('templates.default')

@section('content')
    @include('common.errors')
    <div class="container-form bg-warning text-center">
        <h3 class="text-center pt-3 pb-3">Deactivate Group</h3>
        <h4 class="pl-2 pr-2 mb-3">Are you exactly sure you want to deactivate the group?</h4>
        <form action="{{route('groups.deactivateGroup', $group)}}" method="POST">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <input type="submit" value="Deactivate Group" class="btn btn-danger mb-2">
        </form>
    </div>
@endsection
