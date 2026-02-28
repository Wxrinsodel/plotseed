<html>
<head>
    <title>Details of {{$project->title}}</title>
</head>
<body>

<h1>Details of {{$project->title}}</h1>
<p><em>{{$project->penname}}</em></p>
<p>{{$project->outline}}</p>

<a href="{{ route('projects.index') }}">Back to list of projects</a>
</body>
</html>