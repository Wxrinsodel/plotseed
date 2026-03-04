<x-site-layout title="Create Character">
    <div class="max-w-3xl mx-auto p-6 mt-8">
        
        <div class="mb-6">
            <a href="{{ route('characters.index') }}" class="text-gray-500 hover:text-blue-600 font-medium">&larr; Back to Characters</a>
        </div>

        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
            <h1 class="text-2xl font-bold text-gray-900 mb-6 border-b pb-4">Create New Character</h1>
            
            <form action="{{ route('characters.store') }}" method="POST">
                @csrf
                
                <div class="mb-6">
                    <label for="name" class="block font-semibold text-sm mb-1 text-gray-800">Character Name <span class="text-red-500">*</span></label>
                    <input type="text" id="name" name="name" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" value="{{ old('name') }}" required>
                    @error('name') <div class="text-red-600 text-xs mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="mb-6">
                    <label for="role" class="block font-semibold text-sm mb-1 text-gray-800">Role</label>
                    <select id="role" name="role" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-gray-700">
                        <option value="">-- Can add later --</option>
                        <option value="Protagonist">Protagonist</option>
                        <option value="Antagonist">Antagonist</option>
                        <option value="Supporting">Supporting</option>
                        <option value="Extra">Extra</option>
                    </select>
                </div>

                <div class="grid grid-cols-1 gap-6 mb-6">
                    <div>
                        <label for="identity" class="block font-semibold text-sm mb-1 text-gray-800">Identity</label>
                        <textarea id="identity" name="identity" rows="2" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 placeholder-gray-400" placeholder="">{{ old('identity') }}</textarea>
                    </div>

                    <div>
                        <label for="background" class="block font-semibold text-sm mb-1 text-gray-800">Background</label>
                        <textarea id="background" name="background" rows="2" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 placeholder-gray-400" placeholder="">{{ old('background') }}</textarea>
                    </div>

                    <div>
                        <label for="development" class="block font-semibold text-sm mb-1 text-gray-800">Development</label>
                        <textarea id="development" name="development" rows="2" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 placeholder-gray-400" placeholder="">{{ old('development') }}</textarea>
                    </div>

                    <div>
                        <label for="description" class="block font-semibold text-sm mb-1 text-gray-800">General Description</label>
                        <textarea id="description" name="description" rows="2" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 placeholder-gray-400" placeholder="">{{ old('description') }}</textarea>
                    </div>
                </div>

                <div class="flex justify-end gap-3 pt-4 border-t">
                    <a href="{{ route('characters.index') }}" class="px-5 py-2.5 bg-gray-100 text-gray-700 font-medium rounded-lg hover:bg-gray-200 transition">Cancel</a>
                    <button type="submit" class="px-5 py-2.5 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition">Save Character</button>
                </div>
            </form>
        </div>

    </div>
</x-site-layout>