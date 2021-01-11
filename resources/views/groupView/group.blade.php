@extends('templates.index')

@section('create')
    <form action="" method="post">
        <p>
            <label>Name
                <input type="text" name="name">
            </label>
        </p>
        <p>
            <label>Description
                <input type="text" name="description">
            </label>
        </p>
        <button type="submit">create</button>
    </form>
@stop