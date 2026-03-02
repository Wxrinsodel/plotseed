<x-site-layout title="Edit Project">
    <div class="max-w-2xl mx-auto p-8 bg-white shadow-lg rounded-xl mt-6">
        
        <div class="mb-4">
            <label for="title" class="block font-semibold text-sm mb-1">Project Title</label>
            
            <input type="text" id="title" name="title" value="{{ old('title', $project->title) }}" 
                class="w-full p-2 border rounded-lg @error('title') border-red-600 @else border-gray-300 @enderror">
                
            @error('title')
                <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="penname" class="block font-semibold text-sm mb-1">Penname</label>
            <input type="text" id="penname" name="penname" value="{{ old('penname', $project->penname) }}" 
                class="w-full p-2 border rounded-lg @error('penname') border-red-600 @else border-gray-300 @enderror">
            @error('penname')
                <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
            @enderror
        </div>

            <div>
                <label for="genre" class="font-semibold text-sm">Genre</label><br/>
                <input type="text" id="genre" name="genre" value="{{$project->genre}}" class="p-1 border border-sky-700 w-full">
            </div>


            <div>
                <label for="outline" class="block font-semibold text-sm mb-1">Outline / Summary</label>
            <textarea id="outline" name="outline" rows="4" class="w-full border p-2 rounded-lg @error('outline') border-red-600 @else border-gray-300 @enderror">{{ old('outline', $project->outline) }}</textarea>
            @error('outline')
                <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
            @enderror
            </div>
            <div>
                <button type="submit" class="bg-sky-800 text-sky-50 p-2 uppercase rounded hover:bg-sky-900 transition">Update</button>
            </div>

        </form>
    </div>
</x-site-layout>