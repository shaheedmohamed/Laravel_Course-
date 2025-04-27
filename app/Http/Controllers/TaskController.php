<?php
namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TaskStatusUpdated;

// بعد ما تعدل المهمة أو تنهيها:


class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'task_name' => 'required',
            'duration'  => 'required',
            'priority'  => 'required',
        ]);

        Task::create($request->all());

        return redirect()->route('tasks.index');
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->update($request->all());
        return redirect()->route('tasks.index');
    }

    public function destroy($id)
    {
        Task::findOrFail($id)->delete();
        return redirect()->route('tasks.index');
    }

    public function finish($id)
    {
        $task              = Task::findOrFail($id);
        $task->is_finished = true;
        $task->save();

        return redirect()->route('tasks.index');
    }
}
