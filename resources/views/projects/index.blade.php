<html>
<head>
    <title>List of Projects</title>
</head>
<body>

    <h1>List of Projects</h1>
    <ul>
        @foreach($projects as $project)
            <li> <a href="{{ route('projects.show', $project->id) }}">{{ $project->title }}</a></li>
        @endforeach
    </ul>
</body>
</html>