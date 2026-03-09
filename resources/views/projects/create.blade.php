<x-site-layout title="Create a New Project">
    <div class="max-w-2xl mx-auto p-8 bg-white shadow-lg rounded-xl">
        <h1 class="text-2xl font-bold mb-6 text-blue-900">Create a New Project</h1>

        <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf 
            
            <div class="mb-4">
                <label for="title" class="block font-semibold text-sm mb-1">Project Title <span class="text-red-500">*</span></label>
                <input type="text" id="title" name="title" value="{{ old('title', $project->title ?? '') }}" class="w-full p-2 border rounded-lg focus:border-blue-500 @error('title') border-red-500 @enderror">
                @error('title') <div class="text-red-600 text-xs mt-1 font-semibold">{{ $message }}</div> @enderror
            </div>

            <div class="mb-4">
                <label for="penname" class="block font-semibold text-sm mb-1">Penname <span class="text-red-500">*</span></label>
                <input type="text" id="penname" name="penname" value="{{ old('penname', $project->penname ?? '') }}" class="w-full p-2 border rounded-lg focus:border-blue-500 @error('penname') border-red-500 @enderror">
                @error('penname') <div class="text-red-600 text-xs mt-1 font-semibold">{{ $message }}</div> @enderror
            </div>

                <div class="mb-4">
                    <label class="block mb-2 font-bold">Genre <span class="text-red-500">*</span></label>
                    <select name="genre" id="genre" class="mt-4 block w-full rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm @error('genre') border-red-500 @else border-gray-300 @enderror">
                        <option value="" disabled {{ empty($project->genre) ? 'selected' : '' }}>-- Choose a genre --</option>
                        <option value="Fictional" {{ old('genre', $project->genre ?? '') == 'Fictional' ? 'selected' : '' }}>Fictional</option>
                        <option value="Fantasy" {{ old('genre', $project->genre ?? '') == 'Fantasy' ? 'selected' : '' }}>Fantasy</option>
                        <option value="Romance" {{ old('genre', $project->genre ?? '') == 'Romance' ? 'selected' : '' }}>Romance</option>
                        <option value="Sci-Fi" {{ old('genre', $project->genre ?? '') == 'Sci-Fi' ? 'selected' : '' }}>Sci-Fi</option>
                        <option value="Horror" {{ old('genre', $project->genre ?? '') == 'Horror' ? 'selected' : '' }}>Horror</option>
                        <option value="Action" {{ old('genre', $project->genre ?? '') == 'Action' ? 'selected' : '' }}>Action</option>
                        <option value="Drama" {{ old('genre', $project->genre ?? '') == 'Drama' ? 'selected' : '' }}>Drama</option>
                        <option value="Slice of Life" {{ old('genre', $project->genre ?? '') == 'Slice of Life' ? 'selected' : '' }}>Slice of Life</option>
                        </select>
                    @error('genre') <div class="text-red-600 text-xs mt-1 font-semibold">{{ $message }}</div> @enderror
                </div>
                <div class="mb-4">
                    <label for="outline" class="block font-semibold text-sm mb-1">Outline / Summary</label>
                    <textarea id="outline" name="outline" rows="5" class="w-full border p-2 rounded-lg @error('outline') border-red-600 @else border-gray-300 @enderror" placeholder="your project outline or summary...">{{ old('outline', null) }}</textarea>
                @error('outline')
                    <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>

                        <div class="mb-6">
                <label class="block text-sm font-bold text-gray-700 uppercase tracking-widest mb-2">Cover Image</label>
                
                <div class="mt-1 flex justify-center px-6 pt-10 pb-10 border-2 border-gray-300 border-dashed rounded-3xl hover:border-indigo-500 hover:bg-indigo-50 transition-all duration-300 relative group cursor-pointer overflow-hidden" 
                    id="drop-zone" 
                    onclick="document.getElementById('cover_image').click()">
                    
                    <div class="space-y-2 text-center relative z-10" id="upload-content">
                        <svg class="mx-auto h-14 w-14 text-gray-400 group-hover:text-indigo-500 transition-colors" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-gray-600 justify-center items-center gap-1">
                            <span class="font-bold text-indigo-600 hover:text-indigo-800">Upload a file</span>
                            <p>or drag and drop</p>
                        </div>
                        <p class="text-xs text-gray-500 font-medium">PNG, JPG up to 2MB</p>
                    </div>
                    
                    <img id="image-preview" class="hidden absolute inset-0 w-full h-full object-cover rounded-3xl opacity-90 group-hover:opacity-100 transition-opacity z-0" src="" alt="Preview">

                    <input id="cover_image" name="cover_image" type="file" class="sr-only" accept="image/*" onchange="previewImage(event)">
                </div>

                @error('cover_image')
                    <p class="mt-2 text-red-500 text-sm font-bold">{{ $message }}</p>
                @enderror
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
                            
                            content.classList.add('hidden');
                            
                            dropZone.classList.remove('border-dashed', 'border-gray-300');
                            dropZone.classList.add('border-solid', 'border-indigo-500');
                        }
                        
                        reader.readAsDataURL(input.files[0]);
                    }
                }
            </script>
        </form>
    </div>
</x-site-layout>