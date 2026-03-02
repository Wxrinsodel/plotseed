<x-site-layout title="List of projects">
<div class="mb-8 flex justify-between items-center">
        <h1 class="text-3xl font-bold">List of Projects</h1>
        <a href="{{ route('projects.create') }}" class="bg-green-500 text-white px-6 py-2 rounded-full font-bold hover:bg-green-600">
            + Add New Project
        </a>
    </div>

    @foreach($projects as $project)
        <div class="p-6 border-b hover:bg-gray-50 transition">
             <h2 class="text-xl font-bold text-blue-800">{{ $project->title }}</h2>
             <p class="text-gray-600">penname: {{ $project->penname }} | Genre: {{ $project->genre }}</p>
             <a href="{{ route('projects.show', $project->id) }}" class="mt-2 inline-block text-blue-500 font-semibold underline">Manage Project</a>
        </div>
    @endforeach

</x-site-layout>