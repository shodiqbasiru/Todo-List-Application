<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{

    
    public function create()
    {
        return view('task.create');
    }

    public function store(Request $request)
    {

        // dd($request);
        
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        
        
        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'is_done' => 0,
            'user_id' => auth()->id()
        ]);

        // $task = new Task();
        // $task->title = $request->title;
        // $task->description = $request->description;
        // $task->is_done = 0;
        // $task->user_id = auth()->id();
        // $task->save();

        return redirect()->route('dashboard');
    }

    public function edit($id)
    {
        $task = Task::find($id);

        return view('task.edit', [
            'task' => $task
        ]);
    }


    public function update(Request $request, $id)
    {
        $task = Task::find($id);

        $task->title = $request->title;
        $task->description = $request->description;
        $task->save();

        return redirect()->route('dashboard');
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();

        return redirect()->route('dashboard');
    }
}
