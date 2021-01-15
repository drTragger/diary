@extends('templates.index')
@section('content')

    <div>My groups</div>

    @if (count($groups) > 0)
        @foreach($groups as $group)
            <table>
                <tr>
                    <td>
                        <div>
                            Name: {{$group->name}}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <form action="{{route('groups.show', $group->id)}}"
                              method="POST"> {{--                TODO check the route--}}
                            {{ csrf_field() }}
                            {{ method_field('GET') }}
                        </form>
                        <button type="submit" class="btn btn-primary">View</button>
                    </td>
                </tr>
            </table>
        @endforeach
    @endif
@endsection('content')