<x-site-layout :title="$character->name">
    <div class="max-w-4xl mx-auto p-6 mt-8">
        
        <div class="mb-6 flex justify-between items-center">
            <a href="{{ url()->previous() }}" class="text-gray-500 hover:text-blue-600 font-medium">&larr; Back</a>
            
            <a href="{{ route('characters.edit', $character->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-2 rounded-lg font-medium shadow-sm transition">
                Edit Character
            </a>
        </div>

        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
            <div class="mb-3">
                <span class="bg-indigo-100 text-indigo-800 text-sm px-3 py-1 rounded-full font-semibold">
                    {{ $character->role ?? 'No role yet' }}
                </span>
            </div>
            
            <h1 class="text-4xl font-extrabold text-gray-900 mb-8">{{ $character->name }}</h1>

            <div class="space-y-8">
                <div>
                    <h2 class="text-xl font-bold text-gray-800 border-b pb-2 mb-3">Identity</h2>
                    <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $character->identity ?? '-' }}</p>
                </div>

                <div>
                    <h2 class="text-xl font-bold text-gray-800 border-b pb-2 mb-3">Background</h2>
                    <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $character->background ?? '-' }}</p>
                </div>

                <div>
                    <h2 class="text-xl font-bold text-gray-800 border-b pb-2 mb-3">Development</h2>
                    <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $character->development ?? '-' }}</p>
                </div>

                <div>
                    <h2 class="text-xl font-bold text-gray-800 border-b pb-2 mb-3">General Description</h2>
                    <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $character->description ?? '-' }}</p>
                </div>
            </div>
        </div>

    </div>
</x-site-layout>