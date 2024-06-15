<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;
use App\Models\Task;
use DateTime;

class TaskController extends Controller
{

    public function index()
    {
        $tasks = Task::latest()->paginate(5);

        return view('index', compact('tasks'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(TaskRequest $request)
    {

        $request->validated('completed') ? $request['completed'] = true : $request['completed'] = false;
        $task = new Task();
        $task->title = $request->validated('title');
        $task->description = $request->validated('description');
        $task->long_description = $request->validated('long_description');
        $task->completed = $request['completed'];
        $task->save();
        return redirect()->route('tasks')->with('message', 'One task added successfully');
    }

    public function show(Task $task)
    {
        // $task = Task::findOrFail($taskId);
        return view('show', compact('task'));
    }

    public function edit(Task $task)
    {
        $editingTask = true;

        return view('create', compact('task', 'editingTask'));
    }

    public function update(TaskRequest $request, Task $task)
    {

        // $task = Task::findOrFail($taskId);
        $request->validated('completed') ? $request['completed'] = true : $request['completed'] = false;

        $oldTask = $task->title;

        $task->title = $request->validated('title');
        $task->description = $request->validated('description');
        $task->long_description = $request->validated('long_description');
        $task->completed = $request['completed'];


        $res = $task->save();

        if ($task->updated_at->format('U') == time() && $res) {
            return redirect()->route('tasks.show', $task->id)->with('message', "Task {$oldTask} updated successfully");
        } else {
            return redirect()->route('tasks.show', $task->id)->with('message', "Task {$task->title} doesn`t changed");
        }
    }

    public function destroy(Task $task)
    {
        // $task = Task::findOrFail($taskId);
        $task->delete();

        return redirect()->route('tasks')->with('message', "Task {$task->title} deleted successfully");
    }

    public function toggleTask(Task $task)
    {
        $task->completed = !$task->completed;
        $task->save();
        return redirect()->back()->with('message', 'Task upadated successfully');
    }
}
