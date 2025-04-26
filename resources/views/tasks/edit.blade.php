<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
    <div class="container">
        <h2>Edit Task</h2>

        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Task Name</label>
                <input type="text" name="task_name" class="form-control" value="{{ $task->task_name }}" required>
            </div>
            <div class="mb-3">
                <label>Duration</label>
                <input type="text" name="duration" class="form-control" value="{{ $task->duration }}" required>
            </div>
            <div class="mb-3">
                <label>Priority</label>
                <select name="priority" class="form-select" required>
                    <option value="First" {{ $task->priority == 'First' ? 'selected' : '' }}>First</option>
                    <option value="Second" {{ $task->priority == 'Second' ? 'selected' : '' }}>Second</option>
                    <option value="Third" {{ $task->priority == 'Third' ? 'selected' : '' }}>Third</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
</body>
</html>
