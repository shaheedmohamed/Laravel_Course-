<!DOCTYPE html>
<html>
<head>
    <title>ToDo List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .finished {
            text-decoration: line-through;
        }
    </style>
</head>
<body class="p-5">
    <div class="container">
        <h1 class="mb-4">ToDo List</h1>

        <form action="{{ route('tasks.store') }}" method="POST" class="mb-5">
            @csrf
            <div class="row g-2">
                <div class="col-md-4">
                    <input type="text" name="task_name" class="form-control" placeholder="Task Name" required>
                </div>
                <div class="col-md-3">
                    <input type="text" name="duration" class="form-control" placeholder="Duration" required>
                </div>
                <div class="col-md-3">
                    <select name="priority" class="form-select" required>
                        <option value="">Priority</option>
                        <option value="First">First</option>
                        <option value="Second">Second</option>
                        <option value="Third">Third</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Add Task</button>
                </div>
            </div>
        </form>

        <table class="table table-bordered table-striped">
            <thead>
                
                <tr>
                    <th>Task Name</th>
                    <th>Duration</th>
                    <th>Priority</th>
                    <th>Actual Duration</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                
                @if (!$loop->first)
                <tr id="task-{{ $task->id }}">
            <td class="task-name {{ $task->is_finished ? 'finished' : '' }}">{{ $task->task_name }}</td>
            <td class="task-duration {{ $task->is_finished ? 'finished' : '' }}">{{ $task->duration }}</td>
            <td class="task-priority {{ $task->is_finished ? 'finished' : '' }}">{{ $task->priority }}</td>
            <td>{{ $task->actual_duration ?? '-' }}</td>
            <td>
                
                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-warning">Edit</a>
        <a href="{{ route('tasks.destroy', $task->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
        <button class="btn btn-info ms-4" onclick="startTimer('{{ $task->task_name }}')">Start</button>
        
    </td>
</tr>
@endif
                @endforeach
            </tbody>
        </table>
<!-- ... باقي الصفحة فوق زي ما هي ... -->

<!-- مكان عرض العداد -->
<div id="timerContainer" class="text-center mt-5" style="display:none;">
    <h3 id="taskName" class="mb-3"></h3>
    <h1 id="timer" style="font-size: 60px;">00:00</h1>
    <div class="mt-3">
        <button id="pauseResumeBtn" class="btn btn-warning me-2" onclick="pauseResume()">Pause</button>
        <form action="{{ route('tasks.finish', $task->id) }}" method="POST" style="display: inline-block;">
    @csrf
    @method('PUT')
    <input type="hidden" name="actual_duration" id="actual-duration-{{ $task->id }}">
    <button type="submit" class="btn btn-sm btn-success" onclick="return setActualDuration({{ $task->id }})">Finished</button>
</form>
        <button class="btn btn-danger" onclick="closeTimer()">Close</button>
    </div>
</div>

<!-- صوت الجرس -->
<audio id="alarmSound" src="https://actions.google.com/sounds/v1/alarms/alarm_clock.ogg" preload="auto"></audio>

<!-- باقي الصفحة -->
<script>
    let countdown;
    let isPaused = false;
    let timeInSeconds = 0;
    let originalTime = 0;
    let currentTaskId = null;
    let startTime = null;

    function startTimer(taskName, taskId) {
        let minutes = prompt("Enter break time in minutes:");
        if (minutes && !isNaN(minutes)) {
            timeInSeconds = minutes * 60;
            originalTime = timeInSeconds;
            clearInterval(countdown);
            isPaused = false;
            startTime = new Date();

            currentTaskId = taskId;
            document.getElementById('taskName').textContent = "Task: " + taskName;
            document.getElementById('timerContainer').style.display = 'block';
            updateTimerDisplay(timeInSeconds);

            countdown = setInterval(() => {
                if (!isPaused) {
                    timeInSeconds--;
                    updateTimerDisplay(timeInSeconds);

                    if (timeInSeconds <= 0) {
                        clearInterval(countdown);
                        document.getElementById('alarmSound').play();
                        alert("Break time is over!");
                    }
                }
            }, 1000);

            document.getElementById('pauseResumeBtn').textContent = "Pause";
        }
    }

    function updateTimerDisplay(seconds) {
        let minutes = Math.floor(seconds / 60);
        let remainingSeconds = seconds % 60;
        document.getElementById('timer').textContent =
            `${minutes.toString().padStart(2, '0')}:${remainingSeconds.toString().padStart(2, '0')}`;
    }

    function pauseResume() {
        isPaused = !isPaused;
        document.getElementById('pauseResumeBtn').textContent = isPaused ? "Resume" : "Pause";
    }

    function closeTimer() {
        clearInterval(countdown);
        document.getElementById('timerContainer').style.display = 'none';
        currentTaskId = null;
    }

    function finishTask() {
        if (!currentTaskId) return;

        // احسب الوقت المستغرق فعلياً
        let endTime = new Date();
        let durationSeconds = Math.floor((endTime - startTime) / 1000);
        let minutes = Math.floor(durationSeconds / 60);
        let seconds = durationSeconds % 60;
        let actualDuration = `${minutes}m ${seconds}s`;

        // غير شكل المهمة في الجدول
        let row = document.getElementById('task-' + currentTaskId);
        if (row) {
            row.querySelector('.task-name').classList.add('finished');
            row.querySelector('.task-duration').textContent = actualDuration;
            row.querySelector('.task-duration').classList.add('finished');
            row.querySelector('.task-priority').classList.add('finished');
        }

        // قفل العداد
        closeTimer();
    }

    function setActualDuration(taskId) {
    let endTime = new Date();
    let durationSeconds = Math.floor((endTime - startTime) / 1000);
    let minutes = Math.floor(durationSeconds / 60);
    let seconds = durationSeconds % 60;
    let actualDuration = `${minutes}m ${seconds}s`;

    document.getElementById('actual-duration-' + taskId).value = actualDuration;

    return true; // عشان الفورم يكمل تقديم
}
</script>
</body>
</html>
