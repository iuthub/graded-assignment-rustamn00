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
            $tasks = Task::all();
            return view('welcome', ['tasks' => $tasks]);
        }
        return view('welcome');
    }

    

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', new rule],
            'user_id' => 'required'
        ]);

        Task::create([ 'name' => $validated->title, 'user_id'  => $validated->user_id]);
        return redirect()->route('home')->with('letter', 'Task stored');
    }

    
    
    public function edit(Task $task)
    {
        if (\Gate::allows('edit-task', $task)) {
            return view('task/edit', ['task' => $task]);
        }
        return redirect()->route('home')->with('letter', 'Wrong task');

    }

    //Update task
    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => ['required', new rule]
        ]);
        $task->update($validated);

        return redirect()->route('home')->with('letter', 'Task updated');
    }

    //Task deletion
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        //Checking if the task belongs to current user
        if (!\Gate::allows('edit-task', $task))
        {
            return redirect()->route('home')->with('letter', 'Wrong task');
        }
        $task->delete();
        return redirect()->route('home')->with('letter', 'Task deleted');
    }
}