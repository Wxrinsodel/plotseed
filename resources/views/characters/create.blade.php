<x-site-layout title="Create Character">
    <div class="max-w-3xl mx-auto p-6 mt-8">

        <div class="mb-6">
            <a href="{{ route('characters.index') }}" class="text-gray-500 hover:text-blue-600 font-medium transition">
                &larr; Back to Characters
            </a>
        </div>

        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
            <h1 class="text-2xl font-bold text-gray-900 mb-6 border-b pb-4">Create New Character</h1>

            <form action="{{ route('characters.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-6">
                    <label for="name" class="block font-semibold text-sm mb-1 text-gray-800">
                        Character Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full p-2 border rounded-lg focus:border-blue-500 @error('name') border-red-500 @else border-gray-300 @enderror">
                    @error('name') 
                        <div class="text-red-600 text-xs mt-1 font-semibold">{{ $message }}</div> 
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="role" class="block font-semibold text-sm mb-1 text-gray-800">
                        Role <span class="text-red-500">*</span>
                    </label>
                    <select id="role" name="role" class="w-full p-2 border rounded-lg focus:border-blue-500 @error('role') border-red-500 @else border-gray-300 @enderror text-gray-700">
                        <option value="" disabled {{ old('role') ? '' : 'selected' }}>-- Choose a role --</option>
                        <option value="Protagonist" {{ old('role') == 'Protagonist' ? 'selected' : '' }}>Protagonist</option>
                        <option value="Antagonist" {{ old('role') == 'Antagonist' ? 'selected' : '' }}>Antagonist</option>
                        <option value="Supporting" {{ old('role') == 'Supporting' ? 'selected' : '' }}>Supporting</option>
                        <option value="Extra" {{ old('role') == 'Extra' ? 'selected' : '' }}>Extra</option>
                    </select>
                    @error('role') 
                        <div class="text-red-600 text-xs mt-1 font-semibold">{{ $message }}</div> 
                    @enderror
                </div>

                <div class="grid grid-cols-1 gap-6 mb-6">
                    <div>
                        <label for="identity" class="block font-semibold text-sm mb-1 text-gray-800">Identity</label>
                        <textarea id="identity" name="identity" rows="2" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 placeholder-gray-400">{{ old('identity') }}</textarea>
                    </div>

                    <div>
                        <label for="background" class="block font-semibold text-sm mb-1 text-gray-800">Background</label>
                        <textarea id="background" name="background" rows="2" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 placeholder-gray-400">{{ old('background') }}</textarea>
                    </div>

                    <div>
                        <label for="development" class="block font-semibold text-sm mb-1 text-gray-800">Development</label>
                        <textarea id="development" name="development" rows="2" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 placeholder-gray-400">{{ old('development') }}</textarea>
                    </div>

                    <div>
                        <label for="description" class="block font-semibold text-sm mb-1 text-gray-800">General Description</label>
                        <textarea id="description" name="description" rows="2" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 placeholder-gray-400">{{ old('description') }}</textarea>
                    </div>
                </div>

                <div class="mb-8">
                    <label class="block mb-2 font-bold text-sm text-gray-800">Character Avatar:</label>
                    
                    <div class="mt-1 flex justify-center border-2 border-gray-300 border-dashed rounded-2xl hover:border-blue-500 hover:bg-blue-50 transition-all duration-300 relative group cursor-pointer overflow-hidden bg-gray-50 w-48 h-48 mx-auto" 
                         id="drop-zone" 
                         onclick="document.getElementById('avatar').click()">
                        
                        <div class="space-y-2 text-center relative z-10 flex flex-col items-center justify-center h-full w-full" id="upload-content">
                            <svg class="mx-auto h-10 w-10 text-gray-400 group-hover:text-blue-500 transition-colors" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <p class="text-xs text-gray-500 font-medium">Upload (2MB)</p>
                        </div>
                        
                        <img id="image-preview" class="hidden absolute inset-0 w-full h-full object-cover opacity-90 group-hover:opacity-100 transition-opacity z-0" src="" alt="Preview">

                        <input id="avatar" name="avatar" type="file" class="sr-only" accept="image/*" onchange="previewImage(event)">
                    </div>
                    @error('avatar') 
                        <div class="text-red-600 text-xs mt-1 font-semibold text-center">{{ $message }}</div> 
                    @enderror
                </div>

                <div class="flex justify-end gap-3 pt-6 border-t">
                    <a href="{{ route('characters.index') }}" class="px-5 py-2.5 bg-gray-100 text-gray-700 font-medium rounded-lg hover:bg-gray-200 transition">
                        Cancel
                    </a>
                    <button type="submit" class="px-5 py-2.5 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition">
                        Save Character
                    </button>
                </div>

            </form>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('image-preview');
            const content = document.getElementById('upload-content');
            const dropZone = document.getElementById('drop-zone');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    if (content) content.classList.add('hidden');
                    dropZone.classList.remove('border-dashed', 'border-gray-300', 'bg-gray-50');
                    dropZone.classList.add('border-solid', 'border-blue-500');
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</x-site-layout>