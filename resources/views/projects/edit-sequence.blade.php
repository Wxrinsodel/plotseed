<x-site-layout title="Edit Event - {{ $sequence->title }}">
    <div class="max-w-2xl mx-auto p-6 mt-8">
        <div class="bg-white p-8 rounded-3xl shadow-lg border border-gray-100">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 font-display">Edit Event</h2>
            
            <form action="{{ route('projects.sequence.update', [$project->id, $sequence->id]) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Chapter / Ep.</label>
                    <input type="text" name="chapter_no" value="{{ old('chapter_no', $sequence->chapter_no) }}" class="w-full p-2.5 border border-gray-300 rounded-xl outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Event Title</label>
                    <input type="text" name="title" value="{{ old('title', $sequence->title) }}" class="w-full p-2.5 border border-gray-300 rounded-xl outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Details</label>
                    <textarea name="description" rows="5" class="w-full p-2.5 border border-gray-300 rounded-xl outline-none focus:ring-2 focus:ring-indigo-500">{{ old('description', $sequence->description) }}</textarea>
                </div>

                <div class="flex justify-end gap-3 pt-4">
                    <a href="{{ route('projects.sequence', $project->id) }}" class="px-6 py-2.5 bg-gray-100 text-gray-600 rounded-xl font-bold">Cancel</a>
                    <button type="submit" class="bg-indigo-600 text-white px-8 py-2.5 rounded-xl font-bold shadow-md hover:bg-indigo-700 transition">Update Event</button>
                </div>
            </form>
        </div>
    </div>
</x-site-layout>