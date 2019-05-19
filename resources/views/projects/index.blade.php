@extends('layout')

@section('content')
<h1 class="title">Projects</h1>

<ul>
    @foreach ($projects as $project)
    <li>
        <a href="/projects/{{$project->id}}">{{ $project->title }}</a>
    </li>
    @endforeach
    <br>
    <a href="/projects/create">Create Project</a>
</ul>
@endsection
