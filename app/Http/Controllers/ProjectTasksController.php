<?php

namespace App\Http\Controllers;

use App\Task;
use App\Project;

class ProjectTasksController extends Controller
{
    public function store(Project $project)
    {
        $attributes = request()->validate(['description' => 'required']);

        $project->addTask($attributes);

        // $project->addTask(request('description'));

        return back();
    }
    public function update(Task $task)
    {
        $method = request()->has('completed') ? 'complete' : 'incomplete';

        $task->$method();

        // request()->has('completed') ? $task->complete() : $task->incomplete();

        // $task->complete(request()->has('completed'));

        // $task->update([
        //     'completed' => request()->has('completed')
        // ]);

        return back();
    }
}
