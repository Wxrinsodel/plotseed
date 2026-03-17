<x-site-layout title="Edit Character - {{ $character->name }}">
    <div class="max-w-3xl mx-auto p-6 mt-8">

        <div class="mb-6 flex justify-between items-center">
            <a href="{{ route('characters.index') }}" class="text-gray-500 hover:text-blue-600 font-medium transition">
                &larr; Back to Characters
            </a>

            <form action="{{ route('characters.destroy', $character->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this character?');" class="m-0">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500 hover:text-red-700 font-semibold text-sm transition">
                    Delete Character
                </button>
            </form>
        </div>

        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
            <h1 class="text-2xl font-bold text-gray-900 mb-6 border-b pb-4">
                Edit Character: {{ $character->name }}
            </h1>

            <form action="{{ route('characters.update', $character->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label for="name" class="block font-semibold text-sm mb-1 text-gray-800">
                        Character Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="name" name="name" value="{{ old('name', $character->name) }}" class="w-full p-2 border rounded-lg focus:border-blue-500 @error('name') border-red-500 @else border-gray-300 @enderror" required>
                    @error('name') 
                        <div class="text-red-600 text-xs mt-1 font-semibold">{{ $message }}</div> 
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="role" class="block font-semibold text-sm mb-1 text-gray-800">
                        Role <span class="text-red-500">*</span>
                    </label>
                    <select id="role" name="role" class="w-full p-2 border rounded-lg focus:border-blue-500 @error('role') border-red-500 @else border-gray-300 @enderror text-gray-700">
                        <option value="" disabled {{ empty($character->role) ? 'selected' : '' }}>-- Choose a role --</option>
                        <option value="Protagonist" {{ old('role', $character->role) == 'Protagonist' ? 'selected' : '' }}>Protagonist</option>
                        <option value="Antagonist" {{ old('role', $character->role) == 'Antagonist' ? 'selected' : '' }}>Antagonist</option>
                        <option value="Supporting" {{ old('role', $character->role) == 'Supporting' ? 'selected' : '' }}>Supporting</option>
                        <option value="Extra" {{ old('role', $character->role) == 'Extra' ? 'selected' : '' }}>Extra</option>
                    </select>
                    @error('role') 
                        <div class="text-red-600 text-xs mt-1 font-semibold">{{ $message }}</div> 
                    @enderror
                </div>

                <div class="grid grid-cols-1 gap-6 mb-6">
                    <div>
                        <label for="identity" class="block font-semibold text-sm mb-1 text-gray-800">Identity</label>
                        <textarea id="identity" name="identity" rows="2" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 placeholder-gray-400">{{ old('identity', $character->identity) }}</textarea>
                    </div>

                    <div class="mb-6 bg-gray-50 p-5 rounded-xl border border-gray-200 shadow-sm">
                        <h3 class="text-sm font-bold text-gray-800 mb-4 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 0 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z" clip-rule="evenodd" />
                            </svg>
                            Social Media
                        </h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            
                            <div>
                                <label for="social_x" class="block text-sm font-medium text-gray-700 mb-1.5">X (Twitter)</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                            <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"></path>
                                        </svg>
                                    </div>
                                    <input type="text" name="social_x" id="social_x" value="{{ old('social_x', $character->social_x ?? '') }}" 
                                        class="block w-full pl-11 py-3 border-gray-300 rounded-lg shadow-sm focus:ring-gray-900 focus:border-gray-900 sm:text-sm transition-all" 
                                        placeholder="@username หรือ Link">
                                </div>
                            </div>

                            <div>
                                <label for="social_ig" class="block text-sm font-medium text-gray-700 mb-1.5">Instagram</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5" stroke-width="2"></rect>
                                            <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z" stroke-width="2"></path>
                                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5" stroke-width="2" stroke-linecap="round"></line>
                                        </svg>
                                    </div>
                                    <input type="text" name="social_ig" id="social_ig" value="{{ old('social_ig', $character->social_ig ?? '') }}" 
                                        class="block w-full pl-11 py-3 border-gray-300 rounded-lg shadow-sm focus:ring-pink-500 focus:border-pink-500 sm:text-sm transition-all" 
                                        placeholder="@username หรือ Link">
                                </div>
                            </div>

    </div>
</div>
                    <div>
                        <label for="background" class="block font-semibold text-sm mb-1 text-gray-800">Background</label>
                        <textarea id="background" name="background" rows="2" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 placeholder-gray-400">{{ old('background', $character->background) }}</textarea>
                    </div>

                    <div>
                        <label for="development" class="block font-semibold text-sm mb-1 text-gray-800">Development</label>
                        <textarea id="development" name="development" rows="2" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 placeholder-gray-400">{{ old('development', $character->development) }}</textarea>
                    </div>

                    <div>
                        <label for="description" class="block font-semibold text-sm mb-1 text-gray-800">General Description</label>
                        <textarea id="description" name="description" rows="2" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 placeholder-gray-400">{{ old('description', $character->description) }}</textarea>
                    </div>
                </div>

                <div class="mb-8">
                    <label class="block mb-2 font-bold text-sm text-gray-800">Character Avatar:</label>
                    
                    <div class="mt-1 flex justify-center border-2 border-dashed rounded-2xl hover:border-blue-500 hover:bg-blue-50 transition-all duration-300 relative group cursor-pointer overflow-hidden w-48 h-48 mx-auto {{ $character->getFirstMediaUrl('avatars') ? 'border-solid border-blue-500' : 'border-gray-300 bg-gray-50' }}" 
                        id="drop-zone" 
                        onclick="document.getElementById('avatar').click()">
                        
                        <div class="space-y-2 text-center relative z-10 flex flex-col items-center justify-center h-full w-full {{ $character->getFirstMediaUrl('avatars') ? 'hidden' : '' }}" id="upload-content">
                            <svg class="mx-auto h-10 w-10 text-gray-400 group-hover:text-blue-500 transition-colors" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <p class="text-xs text-gray-500 font-medium">Upload (2MB)</p>
                        </div>
                        
                        <img id="image-preview" 
                            class="{{ $character->getFirstMediaUrl('avatars') ? '' : 'hidden' }} absolute inset-0 w-full h-full object-cover opacity-90 group-hover:opacity-100 transition-opacity z-0" 
                            src="{{ $character->getFirstMediaUrl('avatars') }}" 
                            alt="Preview">

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
                        Update Character
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
                    if(content) content.classList.add('hidden');
                    
                    dropZone.classList.remove('border-dashed', 'border-gray-300', 'bg-gray-50');
                    dropZone.classList.add('border-solid', 'border-blue-500');
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</x-site-layout>