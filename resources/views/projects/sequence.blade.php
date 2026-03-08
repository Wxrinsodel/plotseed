<x-site-layout title="Sequence - {{ $project->title }}">
    <div class="max-w-7xl mx-auto p-6 mt-8">
        
        <div class="mb-8 flex justify-between items-center">
            <a href="{{ route('projects.show', $project->id) }}" class="text-gray-500 hover:text-indigo-600 font-bold flex items-center gap-2 transition bg-white px-4 py-2 rounded-xl shadow-sm border border-gray-100">
                &larr; Back to Project
            </a>
            <h1 class="text-2xl font-black text-gray-800 uppercase tracking-tight">Story Sequence</h1>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 items-start">
            
            <div class="lg:col-span-1 sticky top-8">
                <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
                    <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                        <span class="bg-indigo-600 text-white w-7 h-7 flex items-center justify-center rounded-lg text-sm">+</span> 
                        Add New Event
                    </h2>
                    
                    <form action="{{ route('projects.sequence.store', $project->id) }}" method="POST" class="space-y-5">
                        @csrf
                        <div>
                            <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1.5">Chapter / Ep.</label>
                            <input type="text" name="chapter_no" value="{{ old('chapter_no') }}" placeholder="e.g. Chapter 1" 
                                class="w-full p-3 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all @error('chapter_no') border-red-500 @enderror">
                            @error('chapter_no') <p class="text-red-600 text-[10px] mt-1 font-bold">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1.5">Event Title</label>
                            <input type="text" name="title" value="{{ old('title') }}" placeholder="What's happening?" 
                                class="w-full p-3 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all @error('title') border-red-500 @enderror">
                            @error('title') <p class="text-red-600 text-[10px] mt-1 font-bold">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1.5">Brief Summary</label>
                            <textarea name="description" rows="4" placeholder="Describe this event..." 
                                class="w-full p-3 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all">{{ old('description') }}</textarea>
                        </div>

                        <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-3.5 rounded-2xl font-bold shadow-md shadow-indigo-200 transition-all transform hover:-translate-y-0.5 active:scale-95">
                            Add to Timeline
                        </button>
                    </form>
                </div>

                <div class="mt-6 p-5 bg-indigo-50 rounded-2xl border border-indigo-100">
                    <p class="text-xs text-indigo-700 leading-relaxed font-medium">
                        💡 <strong>Tip:</strong> Create your sequence will make your story go faster!
                    </p>
                </div>
            </div>

            <div class="lg:col-span-2">
                <div class="bg-indigo-900 p-8 rounded-t-[2.5rem] shadow-sm flex justify-between items-center text-white">
                    <div>
                        <h2 class="text-2xl font-black tracking-tight">Timeline</h2>
                        <p class="text-indigo-300 text-sm font-medium">The journey of "{{ $project->title }}"</p>
                    </div>
                    <div class="bg-indigo-800 px-4 py-2 rounded-xl border border-indigo-700 text-xs font-bold uppercase tracking-widest">
                        {{ $project->sequences->count() }} Events
                    </div>
                </div>

                <div class="bg-white p-8 md:p-12 rounded-b-[2.5rem] shadow-sm border border-gray-100 min-h-[600px]">
                    <div class="relative border-l-2 border-dashed border-indigo-200 ml-4 md:ml-6 space-y-12">
                        
                        @forelse($project->sequences as $event)
                            <div class="relative pl-10 group">
                                <div class="absolute -left-[10px] top-0 w-5 h-5 bg-white border-4 border-indigo-500 rounded-full shadow-sm group-hover:scale-125 transition-transform z-10"></div>
                                
                                <div class="relative -top-2">
                                    <div class="flex flex-col sm:flex-row justify-between items-start mb-2 gap-4">
                                        <div>
                                            <span class="inline-block bg-indigo-100 text-indigo-700 text-[10px] font-black px-3 py-1 rounded-full uppercase tracking-widest mb-2">
                                                {{ $event->chapter_no }}
                                            </span>
                                            <h3 class="text-2xl font-extrabold text-gray-900 group-hover:text-indigo-600 transition-colors">
                                                {{ $event->title }}
                                            </h3>
                                        </div>

                                        <div class="flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                            <a href="{{ route('projects.sequence.edit', [$project->id, $event->id]) }}" class="p-2 bg-gray-50 text-gray-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-xl transition shadow-sm">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                                            </a>
                                            <form action="{{ route('projects.sequence.destroy', [$project->id, $event->id]) }}" method="POST" onsubmit="return confirm('Delete this event?')" class="m-0">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-2 bg-gray-50 text-gray-400 hover:text-red-500 hover:bg-red-50 rounded-xl transition shadow-sm">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    
                                    <p class="text-gray-600 text-md leading-relaxed whitespace-pre-line border-l-4 border-gray-50 pl-4">
                                        {{ $event->description }}
                                    </p>
                                </div>
                            </div>
                        @empty
                            <div class="flex flex-col items-center justify-center py-20 text-center">
                                <div class="bg-indigo-50 p-6 rounded-full mb-4">
                                    <svg class="w-12 h-12 text-indigo-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                </div>
                                <h3 class="text-lg font-bold text-gray-400">Your story is waiting to be told.</h3>
                                <p class="text-sm text-gray-400">Add your first chapter event to start the journey!</p>
                            </div>
                        @endforelse

                    </div>
                </div>
            </div>

        </div>
    </div>
</x-site-layout>