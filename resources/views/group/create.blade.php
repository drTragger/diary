@extends('templates.default')

@section('content')
    @include('common.errors')
    <div class="margin-0-auto min-width-50">
        <div class="container-form">
            <h3 class="text-center">Create new group</h3>
            <form action="{{route('groups.add')}}" method="POST" class="d-flex flex-direction-column">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control"></textarea>
                </div>
                <input type="hidden" name="status" value="on">
                <button type="submit" class="btn btn-success">Create</button>
            </form>
        </div>
    </div>
@endsection
