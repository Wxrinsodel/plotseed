<x-site-layout title="Character Board - {{ $project->title }}">
    <div class="max-w-7xl mx-auto p-6 mt-8">
        
        <div class="mb-8 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <a href="{{ route('projects.show', $project->id) }}" class="text-gray-500 hover:text-emerald-600 font-bold flex items-center gap-2 transition bg-white px-4 py-2 rounded-xl shadow-sm border border-gray-100 w-fit mb-2">
                    &larr; Back to Project
                </a>
                <h1 class="text-3xl font-black text-gray-900 uppercase tracking-tight">Character Board</h1>
                <p class="text-emerald-600 font-medium">Cast of "{{ $project->title }}"</p>
            </div>

            <a href="{{ route('projects.characters.manage', $project->id) }}" class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-3 rounded-2xl font-bold shadow-lg shadow-emerald-100 transition-all transform hover:-translate-y-1 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                Manage Cast
            </a>
        </div>

        <div class="bg-emerald-50/50 p-8 rounded-[3rem] border-2 border-dashed border-emerald-200 min-h-[600px]">
            
            @if($project->characters->count() > 0)
                <div class="grid grid-cols-1 xl:grid-cols-2 gap-8">
                    @foreach($project->characters as $character)
                        <div class="bg-white rounded-3xl shadow-sm hover:shadow-xl transition-all duration-500 border border-gray-100 flex flex-col overflow-hidden group">
                            
                            <div class="absolute w-2 h-full bg-emerald-500 transition-all group-hover:w-3"></div>

                            <div class="flex flex-row p-6 pl-10 gap-6 items-center">
                                <div class="flex-shrink-0 relative">
                                    <img src="{{ $character->avatarUrl('preview') }}" 
                                         alt="{{ $character->name }}" 
                                         class="w-28 h-28 sm:w-32 sm:h-32 rounded-full object-cover border-4 border-emerald-50 shadow-md group-hover:scale-105 transition-transform">
                                    
                                    <div class="absolute -bottom-2 -right-2 bg-emerald-600 text-white rounded-full p-2 shadow-lg border-2 border-white">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path></svg>
                                    </div>
                                </div>

                                <div class="flex-grow min-w-0">
                                    <div class="flex justify-between items-start">
                                        <p class="text-[10px] font-black tracking-widest text-emerald-500 uppercase mb-1">Character Profile</p>
                                        <span class="text-[10px] font-mono text-gray-300">#{{ str_pad($character->id, 4, '0', STR_PAD_LEFT) }}</span>
                                    </div>
                                    
                                    <h2 class="text-2xl font-black text-gray-900 truncate mb-1">{{ $character->name }}</h2>
                                    
                                    <div class="flex flex-wrap gap-2 mb-3">
                                        <span class="bg-emerald-50 text-emerald-700 text-[10px] font-black px-3 py-1 rounded-lg uppercase border border-emerald-100">
                                            {{ $character->role ?? 'Extra' }}
                                        </span>
                                    </div>

                                    <p class="text-sm text-gray-500 line-clamp-2 leading-relaxed italic">
                                        "{{ $character->identity ?? 'No identity summary available.' }}"
                                    </p>
                                </div>
                            </div>

                            <div class="bg-gray-50 px-8 py-3 flex justify-between items-center border-t border-gray-100 group-hover:bg-emerald-50/30 transition-colors">
                                <a href="{{ route('characters.show', $character->id) }}" class="text-xs font-bold text-emerald-600 hover:text-emerald-800 flex items-center gap-1 transition">
                                    VIEW FULL DOSSIER &rarr;
                                </a>
                                <div class="w-12 h-3 opacity-20" style="background-image: repeating-linear-gradient(to right, #000 0, #000 2px, transparent 2px, transparent 4px);"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="flex flex-col items-center justify-center py-32 text-center">
                    <div class="w-24 h-24 bg-emerald-100 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-12 h-12 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-400">The stage is empty.</h3>
                    <p class="text-gray-400 mt-2">Add characters to this project to see them on the board.</p>
                    <a href="{{ route('projects.characters.manage', $project->id) }}" class="mt-6 text-emerald-600 font-bold border-b-2 border-emerald-600 pb-1">Manage Cast Now</a>
                </div>
            @endif

        </div>
    </div>
</x-site-layout>