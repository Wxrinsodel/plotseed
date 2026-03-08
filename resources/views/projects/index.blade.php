<x-site-layout title="My Library">
    <div class="max-w-7xl mx-auto p-6 mt-8">
        
        <div class="flex justify-between items-end mb-12 border-b-2 border-gray-100 pb-8">
            <div>
                <h1 class="text-4xl font-black text-gray-900 tracking-tight uppercase">My Library</h1>
                <p class="text-gray-500 font-medium mt-1">Manage your creative universes and stories.</p>
            </div>
            
            <a href="{{ route('projects.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-2xl font-bold shadow-lg shadow-blue-100 transition-all transform hover:-translate-y-1 flex items-center gap-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                New Project
            </a>
        </div>

        @if($projects->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-10">
                @foreach($projects as $project)
                    <div class="group">
                        <a href="{{ route('projects.show', $project->id) }}" class="block">
                            <div class="relative aspect-[2/3] mb-4 overflow-hidden rounded-2xl shadow-md group-hover:shadow-2xl group-hover:-translate-y-2 transition-all duration-300">
                                <img src="{{ $project->coverUrl('preview') }}" 
                                     alt="{{ $project->title }}" 
                                     class="w-full h-full object-cover">
                                
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-6">
                                    <span class="text-white font-bold text-sm">Open Project &rarr;</span>
                                </div>

                                <div class="absolute top-3 right-3">
                                    <span class="bg-white/90 backdrop-blur-sm text-gray-800 text-[10px] font-black px-2 py-1 rounded-md uppercase tracking-widest shadow-sm">
                                        {{ $project->genre }}
                                    </span>
                                </div>
                            </div>

                            <div class="space-y-1">
                                <h3 class="text-xl font-extrabold text-gray-900 group-hover:text-blue-600 transition-colors truncate">
                                    {{ $project->title }}
                                </h3>
                                <p class="text-gray-500 text-sm font-medium italic">
                                    By {{ $project->penname }}
                                </p>
                                
                                <div class="flex items-center gap-2 mt-3 pt-3 border-t border-gray-100">
                                    <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">
                                        {{ $project->characters->count() }} Characters
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <div class="flex flex-col items-center justify-center py-32 bg-gray-50 rounded-[3rem] border-2 border-dashed border-gray-200">
                <div class="text-6xl mb-6 text-gray-300">📚</div>
                <h2 class="text-2xl font-bold text-gray-400">Your library is empty.</h2>
                <p class="text-gray-400 mt-2 mb-8">Ready to start your first masterpiece?</p>
                <a href="{{ route('projects.create') }}" class="text-blue-600 font-bold border-b-2 border-blue-600 pb-1">Create your first project</a>
            </div>
        @endif

    </div>
</x-site-layout>