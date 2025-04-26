<h2>Hello Shaheed</h2>
<p>Here are your tasks for today:</p>
<ul>
@foreach($tasks as $task)
    <li>{{ $task->task_name }} ({{ $task->duration }}) - Priority: {{ $task->priority }}</li>
@endforeach
</ul>
