<html>
<head>
    <title>Details of {{$project->title}}</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>
<body class="bg-blue-200 p-4">

<h1 class="text-3xl font-bold">{{ $project->title }}</h1>
<p><strong>Penname: {{ $project->penname }}</strong></p>
<p>{{ $project->outline }}</p>
<p><em>Genre : {{ $project->genre }}</em></p>


<hr/>

<div class="mt-6 mb-2">
    <h2 class="inline text-xl font-semibold text-black-800 bg-blue-100">Characters</h2>
    <ul class="list-disc list-inside">
    @foreach($project->characters as $character)
        <li>
                <strong>Name:</strong> {{ $character->name }}

                <strong>Role:</strong> {{ $character->role }}

            <a href="#">Character's detail: url of that charcater</a>

            <p><a href="#">Add new character: go to character page</a></p>
        </li>
    @endforeach
</ul>



</div>


<a href="{{ route('projects.index') }}">Back to list of projects</a>
</body>
</html>