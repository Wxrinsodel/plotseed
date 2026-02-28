<html>
<head>
    <title>Details of {{$project->title}}</title>
</head>
<body>

<h1>{{ $project->title }}</h1>
<p><strong>Penname: {{ $project->penname }}</strong></p>
<p>{{ $project->outline }}</p>
<p><em>Genre : {{ $project->genre }}</em></p>

<a href="{{ route('projects.index') }}">Back to list of projects</a>
</body>
</html>