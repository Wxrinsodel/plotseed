<x-site-layout title="{{ $project->title }}">
    <div class="max-w-7xl mx-auto p-6 mt-8">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <div class="md:col-span-2 space-y-8">
                
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                    <div class="flex flex-col sm:flex-row gap-8 items-start">
                        
                        <div class="flex-shrink-0 w-full sm:w-56 md:w-64 lg:w-72">
                            <img src="{{ $project->coverUrl('preview') }}" 
                                 alt="{{ $project->title }} Cover" 
                                 class="w-full aspect-[2/3] object-cover rounded-xl shadow-lg border border-gray-200">
                        </div>

                        <div class="flex-grow w-full">
                            <div class="mb-4">
                                <span class="bg-blue-100 text-blue-800 text-sm px-4 py-1.5 rounded-full font-semibold tracking-wide">
                                    {{ $project->genre ?? 'Uncategorized' }}
                                </span>
                            </div>
                            
                            <h1 class="text-4xl font-extrabold text-gray-900 mb-2">{{ $project->title }}</h1>
                            <p class="text-lg text-gray-600 font-medium mb-6 pb-6 border-b border-gray-100">
                                Penname: <span class="text-gray-900">{{ $project->penname }}</span>
                            </p>
                            
                            <h2 class="text-xl font-bold text-gray-800 mb-3">Outline / Summary</h2>
                            <p class="text-gray-700 leading-relaxed whitespace-pre-line mb-8">
                                {{ $project->outline ?? 'No outline provided yet.' }}
                            </p>

                            <div class="flex gap-3 pt-4 border-t border-gray-100">
                                <a href="{{ route('projects.edit', $project->id) }}" class="px-6 py-2 bg-yellow-500 text-white font-bold rounded-lg hover:bg-yellow-600 transition shadow-sm">
                                    Edit Project
                                </a>
                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this project?');" class="m-0">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded-lg font-bold shadow-sm transition">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Workspace</h2>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <a href="{{ route('projects.sequence', $project->id) }}" class="group block bg-indigo-50 border border-indigo-100 p-6 rounded-xl text-center hover:bg-indigo-500 hover:border-indigo-500 transition duration-300 shadow-sm">
                            <h3 class="text-xl font-bold text-indigo-700 group-hover:text-white transition">Sequence</h3>
                            <p class="text-sm text-indigo-500 mt-2 group-hover:text-indigo-100 transition">Manage sequence of events</p>
                        </a>
                        
                        <a href="{{ route('projects.board', $project->id) }}" class="group block bg-emerald-50 border border-emerald-100 p-6 rounded-xl text-center hover:bg-emerald-500 hover:border-emerald-500 transition duration-300 shadow-sm">
                            <h3 class="text-xl font-bold text-emerald-700 group-hover:text-white transition">Board</h3>
                            <p class="text-sm text-emerald-500 mt-2 group-hover:text-emerald-100 transition">Manage project board</p>
                        </a>
                    </div>
                </div>

            </div>

            <div class="md:col-span-1 space-y-8">
                
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 h-full">
                    <div class="flex justify-between items-center mb-6 border-b pb-3">
                        <h2 class="text-xl font-bold text-gray-800">Characters</h2>
                        <a href="{{ route('projects.characters.manage', $project->id) }}" class="text-sm bg-gray-100 text-gray-700 px-3 py-1 rounded-lg hover:bg-gray-200 transition font-medium">
                            + Add / Manage
                        </a>
                    </div>
                    
                    @if($project->characters && $project->characters->count() > 0)
                        <div class="space-y-3 mt-4">
                            @foreach($project->characters as $character)
                                <a href="{{ route('characters.show', $character->id) }}" class="flex items-center gap-4 p-3 border border-gray-100 rounded-xl hover:shadow-md hover:border-blue-200 transition-all bg-white group cursor-pointer">
                                    
                                    <div class="flex-shrink-0">
                                        <img src="{{ $character->avatarUrl('preview') }}" 
                                             alt="{{ $character->name }}" 
                                             class="w-14 h-14 rounded-full object-cover border-2 border-gray-50 shadow-sm group-hover:border-blue-100 transition">
                                    </div>

                                    <div class="flex-grow min-w-0">
                                        <p class="font-bold text-gray-900 text-md truncate group-hover:text-blue-700 transition">{{ $character->name }}</p>
                                        <p class="text-xs text-blue-600 font-bold tracking-wider uppercase mt-0.5">{{ $character->role ?? 'No Role' }}</p>
                                    </div>

                                    <div class="text-gray-300 group-hover:text-blue-500 transition">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-10 text-gray-500 bg-gray-50 rounded-xl border border-dashed border-gray-300">
                            <p class="text-sm">No characters in this project yet.</p>
                            <p class="text-xs mt-1">Click "+ Add" to create a new character.</p>
                        </div>
                    @endif
                </div>
            </div>
            
        </div>
    </div>
</x-site-layout>