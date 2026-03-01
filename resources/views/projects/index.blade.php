<x-site-layout title="List of projects">


    <h1 class="inline text-xl font-semibold text-black-800">List of Projects</h1>
    <ul class="list-disc list-inside">
        @foreach($projects as $project)
            <li> <a href="{{ route('projects.show', $project->id) }}">{{ $project->title }}</a></li>
        @endforeach
    </ul>

</x-site-layout>