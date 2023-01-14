<?php

namespace App\Http\Controllers;

use App\Task;
use App\sistem;
use DB;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::with(['sistems'])->get();
        return view('tasks.index')->with('tasks', $tasks);
        
    }

    public function create()
    {
        $sistem = DB::table('sistems')->select('sistem')->get();
        $task = new Task;
        return view('tasks.create', compact(
            'sistem',
            'task'
        ));
    }

    public function store(TaskRequest $request)
    {
        $tasks=Task::create([
            'name' => request('name'),
            'description' => request('description'),
            'sistem' => request('sistem'),

        ]);

        return back()->with('success', 'task has been added');
    }

    public function show(Task $task)
    {
        return view('tasks.show')->with('task', $task);
    }

    public function edit(Task $task)
    {
        $sistem = DB::table('sistems')->select('id','sistem')->get();
        return view('tasks.edit',compact('sistem'))->with('task', $task);
    }

    public function update(Task $task, TaskRequest $request)
    {
        $task->update($request->all());
        return back()->with('success', 'task has been updated');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/tasks')->with('success', 'Task has been deleted!');
    }

    public function complete($id)
    {
        $task = Task::where('id', $id)->first();

        if (!$task->is_completed) {
            $task->is_completed = true;
        } else {
            $task->is_completed = false;
        }
        $task->save();

        return redirect('/tasks')->with('success', 'Task has been completed!');
    }
}
