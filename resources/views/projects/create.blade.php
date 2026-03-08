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

            <div class="mb-4">
                <label class="block mb-2 font-bold">Cover Image:</label>
                <input type="file" name="cover_image" class="block w-full text-sm text-gray-500 border border-gray-300 rounded-lg cursor-pointer bg-gray-50">
            </div>

                <div class="flex justify-end space-x-4 pt-4">
                    <a href="{{ route('projects.index') }}" class="px-6 py-2 bg-gray-200 rounded-lg">Cancel</a>
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Save Project</button>
                </div>
            </div>
        </form>
    </div>
</x-site-layout>