<li>
    <a href="#" class="btn main-nav-a-btn">Participants</a>
</li>
<li>
    <a href="{{route('groups.selectUser', $group->id)}}" class="btn main-nav-a-btn">Add participant</a>
</li>
<li>
    <a href="{{ route('homework.index', $group->id) }}" class="btn main-nav-a-btn">Homework</a>
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
    <a href="{{route('groups.confirmDeactivate', $group)}}" class="btn main-nav-a-btn">deactivate group</a>
</li>