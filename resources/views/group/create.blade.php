@extends('templates.default')

@section('content')
    @include('common.errors')
    <div class="container-form">
        <h3 class="text-center">Создание новой группы</h3>
        <form action="{{route('groups.add')}}" method="POST" class="d-flex flex-direction-column">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <label for="name">Название</label>
            <input type="text" name="name" id="name">
            <label for="description">Описание</label>
            <textarea type="text" name="description" id="description"></textarea>
            <input type="hidden" name="status" value="on">
            <input type="submit"
                   value="Создать">
        </form>
    </div>
@endsection
