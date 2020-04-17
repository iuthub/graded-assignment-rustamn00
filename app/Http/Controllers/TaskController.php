<?php

namespace App\Http\Controllers;
use Auth;
use App\Task;
use App\User;
use Illuminate\Http\Request;
use App\Rules\rule;

class TaskController extends Controller
{
    
    public function index()
    {
        if(Auth::user())
        {
            $tasks = Auth::user()->tasks;
            return view('welcome', ['tasks' => $tasks]);
        }
        return view('welcome');
    }

    

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required'],
            'user_id' => 'required'
        ]);

        Task::create([
            'name' => $request->title,
            'user_id' => $request->user_id
        ]);
        return redirect()->route('home')->with('letter', 'Task stored');
    }

    
    
    public function edit(Task $task)
    {
        
        return view('task/edit', ['task' => $task]);

    }

    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => ['required']
        ]);
        $task->update([
            'name' => $request->title
        ]);

        return redirect()->route('home')->with('letter', 'Task updated');
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        
        $task->delete();
        return redirect()->route('home')->with('letter', 'Task deleted');
    }
}