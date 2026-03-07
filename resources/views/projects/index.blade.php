<x-site-layout title="My Projects">
    <div class="max-w-7xl mx-auto p-6 mt-8">
        
        <div class="mb-10 flex justify-between items-end border-b-2 border-gray-100 pb-6">
            <div>
                <h1 class="text-4xl font-extrabold text-gray-900 mb-2">My Projects</h1>
            </div>
            
            <a href="{{ route('projects.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-bold shadow-md hover:shadow-lg transition-all duration-300 flex items-center gap-2 transform hover:-translate-y-0.5">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Create New Project
            </a>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            @forelse($projects as $project)
                <div class="bg-white rounded-3xl shadow-sm hover:shadow-xl border border-gray-100 p-8 transition-all duration-300 flex flex-col h-full group">
                    
                    <div class="flex justify-between items-start mb-6">
                        <span class="bg-blue-100 text-blue-800 text-sm px-4 py-1.5 rounded-full font-bold tracking-wide">
                            {{ $project->genre }} {{ $project->sub_genre ? ' / ' . $project->sub_genre : '' }}
                        </span>
                        
                        <span class="text-xs font-semibold text-gray-500 bg-gray-100 px-3 py-1 rounded-lg">
                            {{ $project->characters->count() ?? 0 }} Characters
                        </span>
                    </div>

                    <div class="mb-6 flex justify-center">
                        @if($project->hasMedia('covers'))
                            <img src="{{ $project->getFirstMediaUrl('covers') }}" alt="Cover Image" class="w-32 h-auto object-cover rounded-lg shadow-md border border-gray-200">
                        @else
                            <div class="w-32 h-44 bg-gray-100 flex flex-col items-center justify-center rounded-lg shadow-sm border border-dashed border-gray-300">
                                <svg class="w-8 h-8 text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <span class="text-gray-400 text-xs font-bold">No Cover</span>
                            </div>
                        @endif
                    </div>
                    
                    <h2 class="text-3xl font-extrabold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors text-center">{{ $project->title }}</h2>
                    <p class="text-md text-gray-500 font-medium mb-6 pb-6 border-b border-gray-100 text-center">
                        Penname: <span class="text-gray-900 font-bold">{{ $project->penname }}</span>
                    </p>

                    <div class="grid grid-cols-2 gap-3 mb-8">
                        <a href="{{ route('projects.sequence', $project->id) }}" class="bg-indigo-50 border border-indigo-100 p-3 rounded-xl text-center hover:bg-indigo-500 hover:border-indigo-500 transition duration-300 group/btn">
                            <h3 class="text-sm font-bold text-indigo-700 group-hover/btn:text-white transition">Sequence</h3>
                        </a>
                        
                        <a href="{{ route('projects.board', $project->id) }}" class="bg-emerald-50 border border-emerald-100 p-3 rounded-xl text-center hover:bg-emerald-500 hover:border-emerald-500 transition duration-300 group/btn">
                            <h3 class="text-sm font-bold text-emerald-700 group-hover/btn:text-white transition">Board</h3>
                        </a>
                    </div>

                    <div class="flex justify-between items-center pt-4 mt-auto">
                        <div class="flex gap-4">
                            <a href="{{ route('projects.show', $project->id) }}" class="text-blue-600 hover:text-blue-800 font-bold transition flex items-center gap-1">
                                Full Details &rarr;
                            </a>
                        </div>
                        
                        <div class="flex gap-4 items-center">
                            <a href="{{ route('projects.edit', $project->id) }}" class="text-sm font-bold text-yellow-600 hover:text-yellow-800 transition">
                                Edit
                            </a>
                            <span class="text-gray-300">|</span>
                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this novel?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-sm font-bold text-red-500 hover:text-red-700 transition">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                    
                </div>
            @empty
                <div class="col-span-full flex flex-col items-center justify-center py-24 bg-white rounded-3xl shadow-sm border border-dashed border-gray-300">
                    <div class="bg-blue-50 p-6 rounded-full mb-6">
                        <svg class="h-16 w-16 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                    </div>
                    <p class="text-2xl font-extrabold text-gray-900 mb-2">No novels in the system</p>
                    <p class="text-gray-500 text-lg">Get started by creating your first novel universe!</p>
                    <a href="{{ route('projects.create') }}" class="mt-8 bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-xl font-bold shadow-md transition-all">
                        Create Project
                    </a>
                </div>
            @endforelse
        </div>

    </div>
</x-site-layout>