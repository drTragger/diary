<li>
    <a href="{{route('groups.showParticipants', $group->id)}}" class="btn main-nav-a-btn">Participants</a>
</li>
<li>
    <a href="{{route('groups.selectUser', $group->id)}}" class="btn main-nav-a-btn">Add participant</a>
</li>
<li>
    <a href="{{ route('homework.index', [$group->id]) }}" class="btn main-nav-a-btn">Tasks</a>
</li>
<li>
    <a href="{{ route('homework.task', $group->id) }}" class="btn main-nav-a-btn">Add Task</a>
</li>
<li>
    <a href="#" class="btn main-nav-a-btn">Submitted homework</a>
</li>
<li>
    <a href="#" class="btn main-nav-a-btn">Marks</a>
</li>
<li>
    <a href="{{route('groups.renameGroup', $group)}}" class="btn main-nav-a-btn">Rename Group</a>
</li>
<li>
    <a href="{{route('groups.confirmDeactivate', $group)}}" class="btn main-nav-a-btn">Deactivate group</a>
</li>