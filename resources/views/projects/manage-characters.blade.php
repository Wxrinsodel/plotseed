<x-site-layout title="Manage Characters - {{ $project->title }}">
    <div class="max-w-5xl mx-auto p-6 mt-8">
        
        <div class="mb-6 flex justify-between items-center">
            <a href="{{ route('projects.show', $project->id) }}" class="text-gray-500 hover:text-blue-600 font-bold flex items-center gap-2 transition">
                &larr; Back to Project Details
            </a>
        </div>

        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
            
            <div class="bg-gradient-to-r from-blue-800 to-blue-600 p-8 text-white">
                <h1 class="text-3xl font-extrabold mb-2">Manage Characters</h1>
                <p class="text-blue-100">Select characters to include in the project: <span class="font-bold text-white tracking-wide">"{{ $project->title }}"</span></p>
            </div>

            <form action="{{ route('projects.characters.update', $project->id) }}" method="POST" class="p-8">
                @csrf
                @method('PUT') 

                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
                    @forelse($characters as $character)
                        <label class="cursor-pointer relative group h-full">
                            
                            <input type="checkbox" name="characters[]" value="{{ $character->id }}"
                                   class="peer sr-only"
                                   {{ $project->characters->contains($character->id) ? 'checked' : '' }}>
                            
                            <div class="border-2 border-gray-100 rounded-2xl p-5 flex flex-col items-center gap-3 transition-all duration-200 bg-white hover:border-blue-300 peer-checked:border-blue-500 peer-checked:bg-blue-50 peer-checked:shadow-md h-full">
                                
                                <div class="absolute top-3 right-3 hidden peer-checked:block text-blue-500 bg-white rounded-full shadow-sm">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                </div>

                                <img src="{{ $character->avatarUrl('preview') }}" 
                                     alt="{{ $character->name }}" 
                                     class="w-20 h-20 rounded-full object-cover border-4 border-gray-50 shadow-sm transition-transform group-hover:scale-105 bg-white">
                                
                                <div class="text-center w-full mt-auto">
                                    <p class="font-bold text-gray-900 text-sm line-clamp-2 w-full leading-tight">{{ $character->name }}</p>
                                    <p class="text-[10px] text-blue-600 font-bold uppercase tracking-wider mt-2 bg-blue-50 py-1 rounded-md border border-blue-100">{{ $character->role ?? 'No Role' }}</p>
                                </div>
                            </div>
                        </label>
                    @empty
                        <div class="col-span-full text-center py-12 text-gray-500 bg-gray-50 rounded-2xl border border-dashed border-gray-300 flex flex-col items-center">
                            <span class="text-4xl mb-3">👻</span>
                            <p class="text-lg font-bold text-gray-700">No characters found in your universe.</p>
                            <p class="text-sm mt-1 mb-4">Please create some characters first before adding them to this project.</p>
                            <a href="{{ route('characters.create') }}" class="px-5 py-2 bg-blue-100 text-blue-700 font-bold rounded-lg hover:bg-blue-200 transition">Create New Character</a>
                        </div>
                    @endforelse
                </div>

                <div class="mt-10 pt-6 border-t border-gray-100 flex justify-end gap-4">
                    <a href="{{ route('projects.show', $project->id) }}" class="px-6 py-2.5 bg-gray-100 text-gray-700 font-bold rounded-lg hover:bg-gray-200 transition">Cancel</a>
                    <button type="submit" class="px-8 py-2.5 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 transition shadow-md hover:shadow-lg transform hover:-translate-y-0.5">Save Selected Characters</button>
                </div>

            </form>
        </div>

    </div>
</x-site-layout>