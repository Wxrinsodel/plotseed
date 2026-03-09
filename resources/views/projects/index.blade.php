<x-site-layout title="My Projects">
    <div class="max-w-5xl mx-auto p-6 mt-8">
        
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end mb-10 border-b-2 border-gray-100 pb-8 gap-4">
            <div>
                <h1 class="text-4xl font-black text-gray-900 tracking-tight ">My Projects</h1>
                <p class="text-gray-500 font-medium mt-1">Manage your creative universes and stories.</p>
            </div>
            
            <div class="flex items-center gap-3">


                <a href="{{ route('projects.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3.5 rounded-2xl font-bold shadow-lg shadow-blue-100 transition-all transform hover:-translate-y-1 flex items-center gap-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    New Project
                </a>
            </div>
        </div>

        @if($projects->count() > 0)
            <div class="space-y-6">
                @foreach($projects as $project)
                    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-6 hover:shadow-lg hover:border-blue-200 transition-all duration-300 group">
                        <div class="flex flex-col sm:flex-row gap-6">
                            
                            <div class="flex-shrink-0 relative overflow-hidden rounded-2xl w-full sm:w-32 md:w-40 aspect-[2/3] sm:aspect-auto sm:h-48">
                                <img src="{{ $project->coverUrl('preview') }}" 
                                     alt="{{ $project->title }}" 
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                <div class="absolute top-0 left-0 w-1.5 h-full bg-blue-500 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            </div>

                            <div class="flex-grow flex flex-col justify-between min-w-0">
                                <div>
                                    <div class="flex justify-between items-start gap-4">
                                        <div>
                                            <span class="bg-blue-50 text-blue-700 text-[10px] font-black px-3 py-1 rounded-md uppercase tracking-widest border border-blue-100 mb-2 inline-block">
                                                {{ $project->genre ?? 'Uncategorized' }}
                                            </span>
                                            <h3 class="text-2xl font-black text-gray-900 group-hover:text-blue-600 transition-colors truncate">
                                                {{ $project->title }}
                                            </h3>
                                            <p class="text-gray-500 text-sm font-medium italic mt-1">
                                                By {{ $project->penname }}
                                            </p>
                                        </div>
                                        
                                        <div class="flex-shrink-0 bg-gray-50 border border-gray-100 px-3 py-1.5 rounded-lg text-center hidden md:block">
                                            <span class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest">Characters</span>
                                            <span class="block text-lg font-black text-gray-700">{{ $project->characters->count() }}</span>
                                        </div>
                                    </div>
                                    
                                    <p class="text-gray-600 text-sm mt-4 line-clamp-2 leading-relaxed">
                                        {{ $project->outline ?? 'No outline provided yet.' }}
                                    </p>
                                </div>

                                <div class="mt-4 flex justify-end items-center border-t border-gray-50 pt-4">
                                    <a href="{{ route('projects.show', $project->id) }}" class="text-blue-600 font-bold hover:text-blue-800 flex items-center gap-2 transition bg-blue-50 hover:bg-blue-100 px-5 py-2 rounded-xl">
                                        Open Project 
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="flex flex-col items-center justify-center py-32 bg-gray-50 rounded-[3rem] border-2 border-dashed border-gray-200">
                <div class="text-6xl mb-6 text-gray-300">📚</div>
                <h2 class="text-2xl font-bold text-gray-400">Your workspace is empty.</h2>
                <p class="text-gray-400 mt-2 mb-8">Ready to start your first masterpiece?</p>
                <a href="{{ route('projects.create') }}" class="text-blue-600 font-bold border-b-2 border-blue-600 pb-1 hover:text-blue-800 transition">Create your first project</a>
            </div>
        @endif

    </div>
</x-site-layout>