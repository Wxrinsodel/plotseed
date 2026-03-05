<x-site-layout :title="'Sequence - ' . $project->title">
    <div class="max-w-7xl mx-auto p-6">
        
        <div class="mb-6 flex justify-between items-center border-b pb-4">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900">Sequence Editor</h1>
                <p class="text-gray-500 mt-1">Project: <span class="font-semibold">{{ $project->title }}</span></p>
            </div>
            <a href="{{ route('projects.show', $project->id) }}" class="text-gray-500 hover:text-blue-600 font-medium px-5 py-2 rounded-lg transition">
                &larr; Back to Manage
            </a>
        </div>

        <div class="bg-white p-10 rounded-xl shadow-sm border border-gray-100 text-center min-h-[400px] flex flex-col justify-center items-center">
            <svg class="w-16 h-16 text-indigo-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
            <h2 class="text-xl font-bold text-gray-400">A space for sequence management</h2>
            <p class="text-gray-400 mt-2 text-sm">We'll write code here later to manage the sequence of events in this project.</p>
        </div>

    </div>
</x-site-layout>