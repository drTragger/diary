<div class="statistics">
    <div>Submitted: {{ count($task->answers) }} students</div>
    <div>Checked: {{ count($task->answers) - count($task->answers->where('mark', null)) }} answers</div>
</div>


