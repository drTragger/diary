@extends('templates.default')

@section('content')
    @include('common.errors')
        <div class="container-form d-flex flex-wrap justify-content-center">
            <h3 class="text-center col-12">Create new group</h3>
            <form action="{{route('groups.add')}}" method="POST" class="mt-5 text-center col-12">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                </div>
                <input type="hidden" name="status" value="on">
                <button type="submit" class="btn btn-success">Create</button>
            </form>
        </div>
@endsection
