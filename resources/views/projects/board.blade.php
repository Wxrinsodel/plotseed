<x-site-layout :title="'Board - ' . $project->title">
    <div class="max-w-7xl mx-auto p-6">
        
        <div class="mb-6 flex justify-between items-center border-b pb-4">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900">Project Board</h1>
                <p class="text-gray-500 mt-1">Project: <span class="font-semibold">{{ $project->title }}</span></p>
            </div>
            <a href="{{ route('projects.show', $project->id) }}" class="text-gray-500 hover:text-blue-600 font-medium px-5 py-2 rounded-lg transition">
                 &larr; Back to Manage
            </a>
        </div>

        <div class="bg-white p-10 rounded-xl shadow-sm border border-gray-100 text-center min-h-[400px] flex flex-col justify-center items-center">
            <svg class="w-16 h-16 text-emerald-300  mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2"></path></svg>
            <h2 class="text-xl font-bold text-gray-400">Project Board</h2>
            <p class="text-gray-400 mt-2 text-sm">We'll build a Kanban-style board here to manage your project tasks.</p>
        </div>

    </div>
</x-site-layout>