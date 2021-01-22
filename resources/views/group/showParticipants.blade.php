@extends('templates.default')

@section('content')
    @include('common.errors')
    <div class="container-form">
        <h3 class="text-center">Participants</h3>
        @if(!empty($participants))
            <table class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Remove</th>
                </tr>
                </thead>

                <tbody class="table">
                @foreach($participants as $participant)
                    <tr>
                        <td>{{$participant->name}}</td>
                        <td>{{$participant->email}}</td>
                        <td>
                            <form action="{{route('groups.deactivateParticipant', $participant->id)}}" method="post">
                                {{csrf_field()}}
                                {{method_field('put')}}
                                <input type="hidden" name="group_id" value="{{$group->id}}">
                                <input type="submit" value="deactivate">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        @endif
    </div>
@endsection