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

                            <div class="flex flex-wrap gap-3 pt-4 border-t border-gray-100">
                                
                                @if($project->book_link)
                                    <a href="{{ $project->book_link }}" target="_blank" rel="noopener noreferrer" class="px-6 py-2 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 transition shadow-sm flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                        Novel / Book Link
                                    </a>
                                @endif

                                <a href="{{ route('projects.edit', $project->id) }}" class="px-6 py-2 bg-yellow-500 text-white font-bold rounded-lg hover:bg-yellow-600 transition shadow-sm flex items-center justify-center">
                                    Edit Project
                                </a>

                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this project?');" class="m-0">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded-lg font-bold shadow-sm transition flex items-center justify-center h-full">
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
                        
                        <a href="{{ route('board.index', $project->id) }}" class="group block bg-emerald-50 border border-emerald-100 p-6 rounded-xl text-center hover:bg-emerald-500 hover:border-emerald-500 transition duration-300 shadow-sm">
                            <h3 class="text-xl font-bold text-emerald-700 group-hover:text-white transition">Board</h3>
                            <p class="text-sm text-emerald-500 mt-2 group-hover:text-emerald-100 transition">Manage project board</p>
                        </a>
                    </div>
                </div>

            </div>

            <div class="md:col-span-1 space-y-8">
                
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 h-full">
                    <div class="flex justify-between items-center mb-6 border-b pb-3">
                        @if(session('error'))
                            <div class="bg-red-50 border-l-4 border-red-500 p-3 mb-4 rounded-r-lg">
                                <p class="text-sm text-red-700 font-bold">⚠️ {{ session('error') }}</p>
                            </div>
                        @endif
                        <h2 class="text-xl font-bold text-gray-800">Characters</h2>
                        <a href="{{ route('projects.characters.manage', $project->id) }}" class="text-sm bg-gray-100 text-gray-700 px-3 py-1 rounded-lg hover:bg-gray-200 transition font-medium">
                            + Add / Manage
                        </a>
                    </div>
                    
                    @if($project->characters && $project->characters->count() > 0)
    @php
        $sortedCharacters = $project->characters->sortByDesc(function($c) {
            return $c->pivot->is_main;
        });
    @endphp

    <div class="flex flex-col gap-3 mt-4 max-h-[500px] overflow-y-auto pr-2 relative" style="scrollbar-width: thin;">
        @foreach($sortedCharacters as $character)
            
            <div class="relative group">
                <a href="{{ route('characters.show', $character->id) }}" 
                   class="flex items-center gap-4 p-3 border {{ $character->pivot->is_main ? 'border-yellow-300 bg-yellow-50/30' : 'border-gray-100 bg-white' }} rounded-xl hover:shadow-md hover:border-blue-200 transition-all cursor-pointer">
                    
                    <div class="flex-shrink-0 relative">
                        <img src="{{ $character->avatarUrl('preview') }}" 
                             alt="{{ $character->name }}" 
                             class="w-14 h-14 rounded-full object-cover border-2 {{ $character->pivot->is_main ? 'border-yellow-400' : 'border-gray-50' }} shadow-sm transition">
                        
                        @if($character->pivot->is_main)
                            <div class="absolute -top-2 -right-1 bg-white rounded-full p-0.5 shadow-sm">
                                <span class="text-yellow-500 text-xs">👑</span>
                            </div>
                        @endif
                    </div>

                    <div class="flex-grow min-w-0 pr-8">
                        <p class="font-bold {{ $character->pivot->is_main ? 'text-yellow-800' : 'text-gray-900' }} text-md truncate transition">{{ $character->name }}</p>
                        <p class="text-xs text-blue-600 font-bold tracking-wider uppercase mt-0.5">{{ $character->role ?? 'No Role' }}</p>
                    </div>
                </a>

                <form action="{{ route('projects.characters.pin', ['project' => $project->id, 'character' => $character->id]) }}" method="POST" class="absolute top-1/2 -translate-y-1/2 right-3 z-10 m-0">
                    @csrf
                    <button type="submit" class="p-1 rounded-full hover:bg-gray-100 transition-colors" title="{{ $character->pivot->is_main ? 'ปลดหมุด' : 'ปักหมุดเป็นตัวเอก' }}">
                        <svg class="w-6 h-6 {{ $character->pivot->is_main ? 'text-yellow-400 fill-yellow-400' : 'text-gray-300 hover:text-yellow-400' }} transition-colors" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                    </button>
                </form>
            </div>

        @endforeach
    </div>
@else
    @endif
                </div>
            </div>
            
        </div>
    </div>
</x-site-layout>