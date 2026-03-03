<x-site-layout title="Edit Project">
    <div class="max-w-2xl mx-auto p-8 bg-white shadow-lg rounded-xl mt-6">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit Project: {{ $project->title }}</h1>

        <form action="{{ route('projects.update', $project->id) }}" method="POST">
            @csrf
            @method('PUT')

            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-6">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="mb-4">
                <label for="title" class="block font-semibold text-sm mb-1">Project Title</label>
                <input type="text" id="title" name="title" value="{{ old('title', $project->title) }}" 
                    class="w-full p-2 border rounded-lg focus:border-blue-500 @error('title') border-red-600 @else border-gray-300 @enderror">
                @error('title')
                    <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="penname" class="block font-semibold text-sm mb-1">Penname</label>
                <input type="text" id="penname" name="penname" value="{{ old('penname', $project->penname) }}" 
                    class="w-full p-2 border rounded-lg focus:border-blue-500 @error('penname') border-red-600 @else border-gray-300 @enderror">
                @error('penname')
                    <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="genre" class="block font-semibold text-sm mb-1">Genre</label>
                <input type="text" id="genre" name="genre" value="{{ old('genre', $project->genre) }}" 
                    class="w-full p-2 border rounded-lg focus:border-blue-500 @error('genre') border-red-600 @else border-gray-300 @enderror">
                @error('genre')
                    <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-6">
                <label for="outline" class="block font-semibold text-sm mb-1">Outline / Summary</label>
                <textarea id="outline" name="outline" rows="4" 
                    class="w-full border p-2 rounded-lg focus:border-blue-500 @error('outline') border-red-600 @else border-gray-300 @enderror">{{ old('outline', $project->outline) }}</textarea>
                @error('outline')
                    <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex justify-end gap-3">
                <a href="{{ route('projects.index') }}" class="px-6 py-2 bg-gray-200 text-gray-700 font-medium rounded-lg hover:bg-gray-300 transition">Cancel</a>
                <button type="submit" class="bg-sky-800 text-sky-50 px-6 py-2 uppercase font-medium rounded-lg hover:bg-sky-900 transition shadow-sm">Update</button>
            </div>

        </form>
    </div>
</x-site-layout>