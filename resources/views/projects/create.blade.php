<x-site-layout title="Create a New Project">
    <div class="max-w-2xl mx-auto p-8 bg-white shadow-lg rounded-xl">
        <h1 class="text-2xl font-bold mb-6 text-blue-900">Create a New Project</h1>

        <form action="{{ route('projects.store') }}" method="POST">
            @csrf <div class="space-y-4">
                <div>
                    <label class="block font-semibold">Project Title</label>
                    <input type="text" name="title" class="w-full border-2 p-2 rounded-lg" placeholder="your project title" required>
                </div>

                <div>
                    <label class="block font-semibold">Penname</label>
                    <input type="text" name="penname" class="w-full border-2 p-2 rounded-lg" placeholder="your penname" required>
                </div>

                <div>
                    <label class="block mb-2 font-bold">Genre:</label>

                    <select name="genre" class="w-full border p-2 mb-4 rounded" required>
                    <option value="" disabled selected>-- Choose a genre --</option>
                    <option value="Fantasy">Fantasy</option>
                    <option value="Romance">Romance</option>
                    <option value="Sci-Fi">Sci-Fi</option>
                    <option value="Horror">Horror</option>
                    <option value="Thriller">Thriller</option>
                </select>

                </div>
                <div>
                    <label class="block font-semibold">Outline / Summary</label>
                    <textarea name="outline" rows="5" class="w-full border-2 p-2 rounded-lg" placeholder="your project outline or summary..."></textarea>
                </div>

                <div class="flex justify-end space-x-4 pt-4">
                    <a href="{{ route('projects.index') }}" class="px-6 py-2 bg-gray-200 rounded-lg">Cancel</a>
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Save Project</button>
                </div>
            </div>
        </form>
    </div>
</x-site-layout>