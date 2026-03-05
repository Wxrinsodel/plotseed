<x-site-layout title="Create a New Project">
    <div class="max-w-2xl mx-auto p-8 bg-white shadow-lg rounded-xl">
        <h1 class="text-2xl font-bold mb-6 text-blue-900">Create a New Project</h1>

        <form action="{{ route('projects.store') }}" method="POST">
            @csrf <div class="space-y-4">
                <div>
                    <label class="block font-semibold">Project Title</label>
                    <div class="mb-4">
                
                <input type="text" id="title" name="title" value="{{ old('title', null) }}" 
                    class="w-full p-2 border rounded-lg @error('title') border-red-600 @else border-gray-300 @enderror">
                
                @error('title')
                    <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="penname" class="block font-semibold text-sm mb-1">Penname</label>
                <input type="text" id="penname" name="penname" value="{{ old('penname', null) }}" 
                    class="w-full p-2 border rounded-lg @error('penname') border-red-600 @else border-gray-300 @enderror">
                @error('penname')
                    <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>

                <div class="mb-4">
                    <label class="block mb-2 font-bold">Genre:</label>
                    <select name="genre" id="genre" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        <option value="" disabled selected>-- Choose a genre --</option>
                        <option value="Fictional">Fictional</option>
                        <option value="Fantasy">Fantasy</option>
                        <option value="Romance">Romance</option>
                        <option value="Sci-Fi">Sci-Fi</option>
                        <option value="Horror">Horror</option>
                        <option value="Thriller">Action</option>
                        <option value="Drama">Drama</option>
                        <option value="Slice of Life">Slice of Life</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="outline" class="block font-semibold text-sm mb-1">Outline / Summary</label>
                    <textarea id="outline" name="outline" rows="5" class="w-full border p-2 rounded-lg @error('outline') border-red-600 @else border-gray-300 @enderror" placeholder="your project outline or summary...">{{ old('outline', null) }}</textarea>
                @error('outline')
                    <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>

                <div class="flex justify-end space-x-4 pt-4">
                    <a href="{{ route('projects.index') }}" class="px-6 py-2 bg-gray-200 rounded-lg">Cancel</a>
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Save Project</button>
                </div>
            </div>
        </form>
    </div>
</x-site-layout>