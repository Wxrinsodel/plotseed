<x-site-layout title="Characters">
    <div class="max-w-7xl mx-auto p-6">
        
        <div class="flex justify-between items-center mb-8 border-b pb-4">
            <h1 class="text-3xl font-extrabold text-gray-900">Characters Directory</h1>
            <a href="{{ route('characters.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg font-medium shadow-sm transition inline-flex items-center">
                + Add New Character
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($characters as $character)
                <a href="{{ route('characters.edit', $character->id) }}" class="block bg-white border border-gray-100 p-6 rounded-2xl shadow-sm hover:shadow-md hover:border-blue-300 transition group">
                    <h3 class="font-bold text-xl text-gray-800 group-hover:text-blue-600 transition">{{ $character->name }}</h3>
                    <p class="text-sm text-blue-600 font-medium mt-1">{{ $character->role ?? 'No Role' }}</p>
                    <p class="text-gray-600 text-sm mt-3 line-clamp-3">
                        {{ $character->description ?? 'No description yet.' }}
                    </p>
                </a>
            @endforeach
        </div>

        @if($characters->isEmpty())
            <div class="text-center py-12 bg-gray-50 rounded-2xl border-2 border-dashed border-gray-200">
                <p class="text-gray-500 font-medium">there is no character available.</p>
                <p class="text-sm text-gray-400 mt-1">Try clicking the button above to create your first character!</p>
            </div>
        @endif

    </div>
</x-site-layout>