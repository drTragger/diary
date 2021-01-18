<li>
    <a href="#" class="btn main-nav-a-btn">Participants</a>
</li>
<li>
    <a href="{{route('groups.selectUser', $group->id)}}" class="btn main-nav-a-btn">Add participant</a>
</li>
<li>
    <a href="{{ route('homework.tasks', $group->id) }}" class="btn main-nav-a-btn">Homework</a>
</li>
<li>
    <a href="{{ route('homework.task', $group->id) }}" class="btn main-nav-a-btn">Add homework</a>
</li>
<li>
    <a href="#" class="btn main-nav-a-btn">Submitted homework</a>
</li>
<li>
    <a href="#" class="btn main-nav-a-btn">Marks</a>
</li>
<li>
    <a href="#" class="btn main-nav-a-btn">Delete group</a>
    {{--    <form action="{{route('groups.delete', $group->id)}}" method="POST">--}}
    {{--        {{csrf_field()}}--}}
    {{--        {{method_field('DELETE')}}--}}
    {{--        <input type="submit" value="Удалить группу" class="btn main-nav-a-btn">--}}
    {{--    </form>--}}
    {{--        <a href="{{route('groups.delete', $group->id)}}" class="btn main-nav-a-btn">Удалить группу</a>--}}
</li>