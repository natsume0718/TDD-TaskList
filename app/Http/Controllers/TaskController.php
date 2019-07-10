<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks  = Task::all();

        return view('index', compact('tasks'));
    }

    public function show($id)
    {
        $task = Task::find($id);
        if ($task === null)
            abort(404);
        return view('show', compact('task'));
    }

    public function update($id)
    {
        return redirect()->route('task.show', ['id' => $id]);
    }
}
