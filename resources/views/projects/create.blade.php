@extends('layout')

@section('content')
<form action="/projects" method="POST">
    {{ csrf_field() }}
    <h1 class="title">Create a New Project</h1>

    <div>
        <input type="text" class="input" name="title" placeholder="Project title">
    </div>

    <div>
        <input type="text" class="input" name="description" placeholder="Project description">
    </div>

    <div>
        <button type="submit" class="button">Create Project</button>
    </div>
</form>

@endsection
