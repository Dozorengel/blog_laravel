<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        // return $request->all();

        $project = new Project();
        $project->title = request('title');
        $project->description = request('description');
        $project->save();
    }
}
