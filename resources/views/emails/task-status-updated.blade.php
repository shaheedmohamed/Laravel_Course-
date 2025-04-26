<h2>Task Updated</h2>
<p>The task <strong>{{ $task->task_name }}</strong> has been updated.</p>
<p>Status: {{ $task->is_finished ? 'Finished' : 'Pending' }}</p>
<p>Duration: {{ $task->duration }}</p>
