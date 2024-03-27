<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $tasks = Task::latest()->where('user_id', auth()->id())->get();
        $views = $request->input('view','card');

        return view('dashboard', [
            'tasks' => $tasks,
            'views' => $views
        ]);
    }

    public function checkTask($id)
    {
        $task = Task::findOrFail($id);

        // $task->is_done = $task->is_done == 0 ? 1 : 0;
        $task->is_done = !$task->is_done; // Toggle the is_done status
        $task->save();

        return redirect()->route('dashboard');
    }
}
