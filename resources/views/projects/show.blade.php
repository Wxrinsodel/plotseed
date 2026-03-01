<html>
<head>
    <title>Details of {{$project->title}}</title>
</head>
<body>

<h1>{{ $project->title }}</h1>
<p><strong>Penname: {{ $project->penname }}</strong></p>
<p>{{ $project->outline }}</p>
<p><em>Genre : {{ $project->genre }}</em></p>


<hr/>
<h2>Characters</h2>
<ul>
    @foreach($project->characters as $character)
        <li>
            <p><strong>Name:</strong> {{ $character->name }}</p>
            <p><strong>Role:</strong> {{ $character->role }}</p>

            <a href="#">Character's detail: url of that charcater</a>

            <p><a href="#">Add new character: go to character page</a></p>
        </li>
    @endforeach
</ul>

<a href="{{ route('projects.index') }}">Back to list of projects</a>
</body>
</html>