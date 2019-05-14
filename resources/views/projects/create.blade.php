<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create new project</title>
</head>

<body>
    <form action="/projects" method="POST">
        {{ csrf_field() }}
        <h1>Create a New Project</h1>

        <div>
            <input type="text" name="title" placeholder="Project title">
        </div>

        <div>
            <input type="text" name="description" placeholder="Project description">
        </div>

        <div>
            <button type="submit">Create Project</button>
        </div>
    </form>
</body>

</html>
