<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProjectCreated;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        // $project = auth()->user()->projects;

        // $projects = Project::where('owner_id', auth()->id())->get();

        return view('projects.index', [
            'projects' => auth()->user()->projects
        ]);
    }

    public function create()
    {
        return view('projects.create');
    }

    public function show(Project $project)
    {
        $this->authorize('update', $project);
        // abort_unless(auth()->user()->owns($project), 403);
        // abort_if($project->owner_id !== auth()->id(), 403);

        return view('projects.show', compact('project'));
    }

    public function store()
    {
        $attributes = $this->validateProject();

        $attributes['owner_id'] = auth()->id();

        $project = Project::create($attributes);

        Mail::to($project->owner->email)->send(
            new ProjectCreated($project)
        );

        return redirect('/projects');
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project)
    {

        $this->authorize('update', $project);

        $project->update($this->validateProject());

        return redirect('/projects');
    }

    public function destroy(Project $project)
    {
        $this->authorize('update', $project);

        $project->delete();

        return redirect('/projects');
    }

    protected function validateProject()
    {
        return request()->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:3'
        ]);
    }
}
