<x-site-layout title="{{ $character->name }} - Character Details">
    <div class="max-w-5xl mx-auto p-6 mt-8">

        <div class="mb-6 flex justify-between items-center">
            <a href="{{ route('characters.index') }}" class="text-gray-500 hover:text-blue-600 font-bold flex items-center gap-2 transition">
                &larr; Back to Characters
            </a>
            <div class="flex gap-3">
                <a href="{{ route('characters.edit', $character->id) }}" class="px-5 py-2 bg-yellow-500 text-white font-bold rounded-lg hover:bg-yellow-600 transition shadow-sm">
                    Edit Character
                </a>
                <form action="{{ route('characters.destroy', $character->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this character?');" class="m-0">
                    @csrf
                    @method('delete')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-5 py-2 rounded-lg font-bold shadow-sm transition">
                        Delete
                    </button>
                </form>
            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden flex flex-col md:flex-row">
            
            <div class="md:w-1/3 bg-gray-50 p-8 flex flex-col items-center border-r border-gray-100 relative">
                
                <div class="absolute top-0 left-0 w-full h-32 bg-gradient-to-b from-blue-800 to-blue-600 rounded-tl-3xl"></div>

                <div class="relative z-10 mt-8 mb-6">
                    <img src="{{ $character->avatarUrl('preview') }}" 
                         alt="{{ $character->name }}" 
                         class="w-48 h-48 rounded-full object-cover border-8 border-white shadow-lg bg-white">
                </div>

                <h1 class="text-3xl font-extrabold text-gray-900 text-center mb-2">{{ $character->name }}</h1>
                <span class="bg-blue-100 text-blue-800 text-sm px-5 py-1.5 rounded-full font-bold uppercase tracking-wide border border-blue-200 mb-8">
                    {{ $character->role ?? 'Unassigned Role' }}
                </span>

                <div class="w-full pt-6 border-t border-gray-200 text-center mt-auto">
                    <p class="text-xs text-gray-400 font-bold uppercase tracking-widest mb-1">Character ID</p>
                    <p class="text-lg font-mono text-gray-700 font-bold">NO. {{ str_pad($character->id, 6, '0', STR_PAD_LEFT) }}</p>
                    <div class="mt-4 opacity-30 w-full h-10" style="background-image: repeating-linear-gradient(to right, #000 0, #000 2px, transparent 2px, transparent 4px, #000 4px, #000 5px, transparent 5px, transparent 8px, #000 8px, #000 12px, transparent 12px);"></div>
                </div>
            </div>

            <div class="md:w-2/3 p-8 md:p-10 space-y-8">
                
                <div>
                    <h2 class="text-xl font-bold text-gray-800 mb-3 flex items-center gap-2 border-b pb-2">
                        <span class="text-2xl">👤</span> Identity
                    </h2>
                    <p class="text-gray-700 leading-relaxed bg-blue-50/50 p-5 rounded-xl border border-blue-100 whitespace-pre-line">
                        {{ $character->identity ?: 'No identity details provided.' }}
                    </p>
                </div>

                <div>
                    <h2 class="text-xl font-bold text-gray-800 mb-3 flex items-center gap-2 border-b pb-2">
                        <span class="text-2xl">🌍</span> Background
                    </h2>
                    <p class="text-gray-700 leading-relaxed bg-gray-50 p-5 rounded-xl border border-gray-100 whitespace-pre-line">
                        {{ $character->background ?: 'No background history provided.' }}
                    </p>
                </div>

                <div>
                    <h2 class="text-xl font-bold text-gray-800 mb-3 flex items-center gap-2 border-b pb-2">
                        <span class="text-2xl">📈</span> Development Arc
                    </h2>
                    <p class="text-gray-700 leading-relaxed bg-gray-50 p-5 rounded-xl border border-gray-100 whitespace-pre-line">
                        {{ $character->development ?: 'No development arc planned yet.' }}
                    </p>
                </div>

                <div>
                    <h2 class="text-xl font-bold text-gray-800 mb-3 flex items-center gap-2 border-b pb-2">
                        <span class="text-2xl">📝</span> General Description
                    </h2>
                    <p class="text-gray-700 leading-relaxed bg-gray-50 p-5 rounded-xl border border-gray-100 whitespace-pre-line">
                        {{ $character->description ?: 'No general description provided.' }}
                    </p>
                </div>

            </div>
        </div>

    </div>
</x-site-layout>