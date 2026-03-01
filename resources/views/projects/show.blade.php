<x-site-layout title="{{$project->title}}">

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
            <p><strong>Name:</strong> {{ $character->name }}</p>
            <p><strong>Role:</strong> {{ $character->role }}</p>
            <p><a href="#">Character's detail: url of that character</a></p>
            <p><a href="#">Add new character: go to character page</a></p>
        </li>
    @endforeach
</ul>



</div>


<a href="{{ route('projects.index') }}">Back to list of projects</a>

</x-site-layout>
