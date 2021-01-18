@extends('templates.default')

@section('content')
    @include('common.errors')
    <div class="container-form">
        <h3 class="text-center">Create new group</h3>
        <form action="{{route('groups.add')}}" method="POST" class="d-flex flex-direction-column">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <label for="name">Name</label>
            <input type="text" name="name" id="name">
            <label for="description">Description</label>
            <textarea type="text" name="description" id="description"></textarea>
            <input type="hidden" name="status" value="on">
            <input type="submit"
                   value="Создать">
        </form>
    </div>
@endsection
