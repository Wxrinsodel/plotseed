<x-site-layout title="Edit Character">
    <div class="max-w-3xl mx-auto p-6 mt-8">
        
        <div class="mb-6 flex justify-between items-center">
            <a href="{{ route('characters.index') }}" class="text-gray-500 hover:text-blue-600 font-medium">&larr; Back to Characters</a>
            
            <form action="{{ route('characters.destroy', $character->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this character?');" class="m-0">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500 hover:text-red-700 font-medium underline text-sm transition">
                    Delete Character
                </button>
            </form>
        </div>

        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
            <h1 class="text-2xl font-bold text-gray-900 mb-6 border-b pb-4">Edit Character: {{ $character->name }}</h1>
            
           <form action="{{ route('characters.update', $character->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                
                <div class="mb-6">
                    <label for="name" class="block font-semibold text-sm mb-1 text-gray-800">Character Name <span class="text-red-500">*</span></label>
                    <input type="text" id="name" name="name" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" value="{{ old('name', $character->name) }}" required>
                    @error('name') <div class="text-red-600 text-xs mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="mb-6">
                    <label for="role" class="block font-semibold text-sm mb-1 text-gray-800">Role</label>
                    <select id="role" name="role" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-gray-700">
                        <option value="">-- Can edit later --</option>
                        <option value="Protagonist" {{ old('role', $character->role) == 'Protagonist' ? 'selected' : '' }}>Protagonist</option>
                        <option value="Antagonist" {{ old('role', $character->role) == 'Antagonist' ? 'selected' : '' }}>Antagonist</option>
                        <option value="Supporting" {{ old('role', $character->role) == 'Supporting' ? 'selected' : '' }}>Supporting</option>
                        <option value="Extra" {{ old('role', $character->role) == 'Extra' ? 'selected' : '' }}>Extra</option>
                    </select>
                </div>

                <div class="grid grid-cols-1 gap-6 mb-6">
                    <div>
                        <label for="identity" class="block font-semibold text-sm mb-1 text-gray-800">Identity</label>
                        <textarea id="identity" name="identity" rows="2" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">{{ old('identity', $character->identity) }}</textarea>
                    </div>

                    <div>
                        <label for="background" class="block font-semibold text-sm mb-1 text-gray-800">Background</label>
                        <textarea id="background" name="background" rows="2" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">{{ old('background', $character->background) }}</textarea>
                    </div>

                    <div>
                        <label for="development" class="block font-semibold text-sm mb-1 text-gray-800">Development</label>
                        <textarea id="development" name="development" rows="2" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">{{ old('development', $character->development) }}</textarea>
                    </div>

                    <div>
                        <label for="description" class="block font-semibold text-sm mb-1 text-gray-800">General Description</label>
                        <textarea id="description" name="description" rows="2" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">{{ old('description', $character->description) }}</textarea>
                    </div>
                </div>

                <div class="mb-6 border-t pt-6">
                    <label class="block mb-2 font-bold text-gray-800">Character Avatar:</label>
                    <input type="file" name="avatar" class="block w-full text-sm text-gray-500 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 p-2">
                </div>

                <div class="flex justify-end gap-3 pt-4 border-t">
                    <a href="{{ route('characters.index') }}" class="px-5 py-2.5 bg-gray-100 text-gray-700 font-medium rounded-lg hover:bg-gray-200 transition">Cancel</a>
                    <button type="submit" class="px-5 py-2.5 bg-yellow-500 text-white font-medium rounded-lg hover:bg-yellow-600 transition">Update Character</button>
                </div>
            </form>
        </div>

    </div>
</x-site-layout>