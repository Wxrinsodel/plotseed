<x-site-layout title="New Project - PlotSeed">
    <div class="max-w-5xl mx-auto p-6 mt-8">
        
        <div class="mb-8">
            <h1 class="text-4xl font-black text-gray-900 tracking-tight uppercase">Create New Project</h1>
            <p class="text-gray-500 font-medium mt-1">Start a new universe for your story.</p>
        </div>

        <div class="bg-white p-8 sm:p-10 rounded-[2rem] shadow-sm border border-gray-100">
            <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                    
                    <div class="md:col-span-1">
                        <label class="block text-sm font-bold text-gray-700 uppercase tracking-widest mb-2">Cover Image</label>
                        
                        <div class="mt-1 flex justify-center px-6 pt-12 pb-12 border-2 border-gray-300 border-dashed rounded-3xl hover:border-blue-500 hover:bg-blue-50 transition-all duration-300 relative group cursor-pointer overflow-hidden aspect-[2/3]" 
                             id="drop-zone" 
                             onclick="document.getElementById('cover_image').click()">
                            
                            <div class="space-y-2 text-center relative z-10 flex flex-col items-center justify-center h-full" id="upload-content">
                                <svg class="h-14 w-14 text-gray-400 group-hover:text-blue-500 transition-colors mb-2" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex flex-col text-sm text-gray-600 justify-center items-center">
                                    <span class="font-bold text-blue-600 hover:text-blue-800">Upload a file</span>
                                    <p class="mt-1">or drag and drop</p>
                                </div>
                                <p class="text-xs text-gray-500 font-medium mt-4">PNG, JPG up to 2MB</p>
                            </div>
                            
                            <img id="image-preview" class="hidden absolute inset-0 w-full h-full object-cover rounded-3xl opacity-90 group-hover:opacity-100 transition-opacity z-0" src="" alt="Preview">

                            <input id="cover_image" name="cover_image" type="file" class="sr-only" accept="image/*" onchange="previewImage(event)">
                        </div>
                        
                        @error('cover_image')
                            <p class="mt-2 text-red-500 text-sm font-bold">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2 space-y-6">
                        
                        <div>
                            <label for="title" class="block text-sm font-bold text-gray-700 uppercase tracking-widest mb-2">Project Title <span class="text-red-500">*</span></label>
                            <input type="text" id="title" name="title" required value="{{ old('title') }}" placeholder="Enter your epic story title..."
                                   class="w-full p-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition shadow-sm @error('title') border-red-500 @enderror">
                            @error('title') 
                                <p class="mt-2 text-red-500 text-sm font-bold">{{ $message }}</p> 
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label for="penname" class="block text-sm font-bold text-gray-700 uppercase tracking-widest mb-2">Penname <span class="text-red-500">*</span></label>
                                <input type="text" id="penname" name="penname" required value="{{ old('penname') ?? Auth::user()->name }}"
                                       class="w-full p-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition shadow-sm">
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-bold text-gray-700 uppercase tracking-widest mb-2">Genre:</label>
                                <select name="genre" id="genre" class="w-full p-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition shadow-sm text-gray-700">
                                    <option value="" disabled {{ old('genre') ? '' : 'selected' }}>-- Choose a genre --</option>
                                    <option value="Fictional" {{ old('genre') == 'Fictional' ? 'selected' : '' }}>Fictional</option>
                                    <option value="Fantasy" {{ old('genre') == 'Fantasy' ? 'selected' : '' }}>Fantasy</option>
                                    <option value="Romance" {{ old('genre') == 'Romance' ? 'selected' : '' }}>Romance</option>
                                    <option value="Sci-Fi" {{ old('genre') == 'Sci-Fi' ? 'selected' : '' }}>Sci-Fi</option>
                                    <option value="Horror" {{ old('genre') == 'Horror' ? 'selected' : '' }}>Horror</option>
                                    <option value="Thriller" {{ old('genre') == 'Thriller' ? 'selected' : '' }}>Action / Thriller</option>
                                    <option value="Drama" {{ old('genre') == 'Drama' ? 'selected' : '' }}>Drama</option>
                                    <option value="Slice of Life" {{ old('genre') == 'Slice of Life' ? 'selected' : '' }}>Slice of Life</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label for="outline" class="block text-sm font-bold text-gray-700 uppercase tracking-widest mb-2">Outline / Summary</label>
                            <textarea id="outline" name="outline" rows="7" placeholder="Briefly describe what your story is about..."
                                      class="w-full p-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition shadow-sm resize-none">{{ old('outline') }}</textarea>
                        </div>

                        <div class="mt-6">
                            <label for="book_link" class="block text-sm font-bold text-gray-700 mb-2">Book/ Novel Link</label>
                            <input type="url" name="book_link" id="book_link" 
                                value="{{ old('book_link', $project->book_link ?? '') }}" 
                                placeholder="https://..." 
                                class="w-full p-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all shadow-sm @error('book_link') border-red-500 @enderror">
                            @error('book_link')
                                <p class="text-red-600 text-sm mt-1 font-bold">{{ $message }}</p>
                            @enderror
                            <p class="text-xs text-gray-400 mt-1">Add a link to the book (if available)</p>
                        </div>

                    </div>
                </div>

                <div class="mt-10 pt-8 border-t border-gray-100 flex justify-end gap-4">
                    <a href="{{ route('projects.index') }}" class="px-8 py-4 bg-gray-100 text-gray-700 font-bold rounded-xl hover:bg-gray-200 transition-colors">
                        Cancel
                    </a>
                    <button type="submit" class="px-8 py-4 bg-blue-600 text-white font-bold rounded-xl hover:bg-blue-700 transition-all shadow-lg shadow-blue-200 transform hover:-translate-y-1">
                        Create Project
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
                    content.classList.add('hidden');
                    dropZone.classList.remove('border-dashed', 'border-gray-300');
                    dropZone.classList.add('border-solid', 'border-blue-500'); 
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</x-site-layout>