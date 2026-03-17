<x-site-layout title="My Characters">
    <div class="max-w-7xl mx-auto p-6 mt-8">
        
        <div class="mb-10 flex justify-between items-end border-b-2 border-gray-100 pb-6">
            <div>
                <h1 class="text-4xl font-extrabold text-gray-900 mb-2">My Characters</h1>
            </div>
            
            <a href="{{ route('characters.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-bold shadow-md hover:shadow-lg transition-all duration-300 flex items-center gap-2 transform hover:-translate-y-0.5">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                Create Character
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            
            @forelse($characters as $character)
                <div class="bg-white rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 border border-gray-200 flex flex-col relative group overflow-hidden">
                    
                    <div class="absolute top-0 left-0 w-2.5 h-full bg-gradient-to-b from-blue-800 to-blue-500"></div>

                    <div class="flex flex-row p-6 pl-8 gap-6 items-center flex-grow">
                        
                        <div class="flex-shrink-0 relative">
                            <img src="{{ $character->avatarUrl('preview') }}" 
                                 alt="{{ $character->name }}" 
                                 class="w-24 h-24 sm:w-28 sm:h-28 rounded-full object-cover border-4 border-gray-50 shadow-sm">
                            
                            <div class="absolute -bottom-2 -right-2 bg-blue-100 border-2 border-white rounded-full p-1.5 shadow-sm">
                                <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                            </div>
                        </div>

                        <div class="flex-grow min-w-0 flex flex-col justify-center">
                            <div class="flex justify-between items-start mb-1">
                                <p class="text-[10px] font-black tracking-widest text-blue-500 uppercase">
                                    ID: NO.{{ str_pad($character->id, 5, '0', STR_PAD_LEFT) }}
                                </p>
                                
                                <div class="hidden sm:block opacity-30 w-16 h-4" style="background-image: repeating-linear-gradient(to right, #000 0, #000 1.5px, transparent 1.5px, transparent 3px, #000 3px, #000 4px, transparent 4px, transparent 6px);"></div>
                            </div>
                            
                            <h2 class="text-xl sm:text-2xl font-extrabold text-gray-900 truncate">{{ $character->name }}</h2>
                            
                            <div class="mt-2">
                                <span class="bg-blue-50 text-blue-700 text-xs px-3 py-1 rounded-md font-bold uppercase tracking-wider border border-blue-100">
                                    {{ $character->role ?? 'Unknown Role' }}
                                </span>
                            </div>

                            <p class="text-sm text-gray-500 mt-3 line-clamp-2 leading-relaxed pr-2">
                                {{ $character->identity ?? $character->background ?? 'No identity or background specified.' }}
                            </p>

                            @if(!empty($character->social_x) || !empty($character->social_ig))
                                <div class="mt-3 flex flex-wrap items-center gap-3 border-t border-gray-100 pt-3">
                                    
                                    @if(!empty($character->social_x))
                                        <div class="flex items-center text-xs text-gray-500 hover:text-gray-900 transition-colors" title="X (Twitter)">
                                            <svg class="h-3.5 w-3.5 mr-1.5" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"></path>
                                            </svg>
                                            <span class="truncate max-w-[100px]">{{ $character->social_x }}</span>
                                        </div>
                                    @endif

                                    @if(!empty($character->social_ig))
                                        <div class="flex items-center text-xs text-gray-500 hover:text-pink-600 transition-colors" title="Instagram">
                                            <svg class="h-3.5 w-3.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5" stroke-width="1.5"></rect>
                                                <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z" stroke-width="1.5"></path>
                                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5" stroke-width="1.5" stroke-linecap="round"></line>
                                            </svg>
                                            <span class="truncate max-w-[100px]">{{ $character->social_ig }}</span>
                                        </div>
                                    @endif

                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="border-t border-gray-100 bg-gray-50 px-6 py-3 pl-8 flex justify-between items-center group-hover:bg-blue-50/50 transition-colors">
                        <a href="{{ route('characters.show', $character->id) }}" class="text-sm font-bold text-blue-600 hover:text-blue-800 transition flex items-center gap-1">
                            Full Details &rarr;
                        </a>
                        <div class="flex gap-4 items-center">
                            <a href="{{ route('characters.edit', $character->id) }}" class="text-sm font-bold text-yellow-600 hover:text-yellow-800 transition">
                                Edit
                            </a>
                            <span class="text-gray-300">|</span>
                            <form action="{{ route('characters.destroy', $character->id) }}" method="POST" class="inline m-0" onsubmit="return confirm('Are you sure you want to delete this character?');">
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <p class="text-2xl font-extrabold text-gray-900 mb-2">No characters yet</p>
                    <p class="text-gray-500 text-lg">Create your first character to populate your universe!</p>
                </div>
            @endforelse
            
        </div>
    </div>
</x-site-layout>