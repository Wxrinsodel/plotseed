<x-site-layout title="My Characters">
    <div class="max-w-7xl mx-auto p-6 mt-8">
        
   
        <div class="mb-10 flex justify-between items-end border-b-2 border-gray-100 pb-6">
            <div>
                <h1 class="text-4xl font-extrabold text-gray-900 mb-2">My Characters</h1>
            </div>
            
            <a href="{{ route('characters.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-bold shadow-md hover:shadow-lg transition-all duration-300 flex items-center gap-2 transform hover:-translate-y-0.5">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Add New Character
            </a>
        </div>

        
   
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($characters as $character)
                <div class="bg-white rounded-3xl shadow-sm hover:shadow-xl border border-gray-100 p-8 transition-all duration-300 flex flex-col h-full group">
                    
                    <div class="flex justify-between items-start mb-6">
                        <h2 class="text-2xl font-extrabold text-gray-900 group-hover:text-blue-600 transition-colors pr-4">{{ $character->name }}</h2>
                        <span class="bg-indigo-100 text-indigo-800 text-xs px-4 py-1.5 rounded-full font-bold tracking-wide whitespace-nowrap">
                            {{ $character->role ?? 'No Role' }}
                        </span>
                    </div>

                    <img src="{{ $character->avatarUrl('preview') }}" alt="Avatar" class="w-24 h-24 rounded-full object-cover shadow-md border-2 border-white">
                    <div class="space-y-4 mb-8 flex-grow">
                        
                        <div>
                            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Identity</p>
                            <p class="text-sm text-gray-800 font-medium line-clamp-2">
                                {{ $character->identity ?? '-' }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Background</p>
                            <p class="text-sm text-gray-700 line-clamp-2">
                                {{ $character->background ?? '-' }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Description</p>
                            <p class="text-sm text-gray-600 italic line-clamp-2">
                                "{{ $character->description ?? '-' }}"
                            </p>
                        </div>

                    </div>

                    <div class="flex justify-between items-center pt-5 border-t border-gray-100 mt-auto">
                        <a href="{{ route('characters.show', $character->id) }}" class="text-blue-600 hover:text-blue-800 font-bold transition flex items-center gap-1">
                            View Profile &rarr;
                        </a>
                        
                        <div class="flex gap-4 items-center">
                            <a href="{{ route('characters.edit', $character->id) }}" class="text-sm font-bold text-yellow-600 hover:text-yellow-800 transition">
                                Edit
                            </a>
                            <span class="text-gray-300">|</span>
                            <form action="{{ route('characters.destroy', $character->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this character?');">
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
                    <div class="bg-indigo-50 p-6 rounded-full mb-6">
                        <svg class="h-16 w-16 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <p class="text-2xl font-extrabold text-gray-900 mb-2">No characters available</p>
                    <p class="text-gray-500 text-lg">Try clicking the button above to create your first character!</p>
                </div>
            @endforelse
        </div>

    </div>
</x-site-layout>