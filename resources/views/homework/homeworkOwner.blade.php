<div class="statistics">
    <div>Submitted: {{ count($task->answers) }} students</div>
    <div>Checked: {{ count($task->answers) - count($task->answers->where('mark', null)) }} answers</div>
</div>
<div class="actions d-flex flex-wrap justify-content-center mt-4">
    @if(isset($task->file))
        <a href="{{ route('homework.downloadTask', ['task' => $task->id]) }}" class="btn btn-info" title="Download file"><i class="fas fa-file" ></i></a>
    @endif
    @if(count($task->answers->where('mark', null)))
        <a href="{{ route('homework.estimate', ['task' => $task->id]) }}"
           class="btn btn-success" title="Check answers"><i class="fas fa-check"></i></a>
    @endif
    <form action="{{ route('homework.taskEdition', ['task' => $task->id]) }}"
          method="post">
        {{ csrf_field() }}
        <input type="hidden" name="group_id" value="{{ $group->id }}">
        <button type="submit" class="btn btn-secondary" title="Edit"><i class="fas fa-pencil-alt" ></i></button>
    </form>
    <form action="{{ route('homework.deleteTask', ['task' => $task->id]) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('delete') }}
        <button type="submit" class="btn btn-danger" title="Delete"><i class="fas fa-trash"></i></button>
    </form>
</div>