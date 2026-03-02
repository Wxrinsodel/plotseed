<x-site-layout :title="$project->title">
    <div class="max-w-6xl mx-auto p-6">
        
        <div class="mb-6 flex justify-between items-center">
            <a href="{{ route('projects.index') }}" class="text-gray-500 hover:text-blue-600 font-medium flex items-center transition">
                &larr; Back to all projects
            </a>
            
            <a href="/projects/{{$project->id}}/edit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-2 rounded-lg font-medium shadow-sm transition">
    Edit Project
</a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-2 space-y-8">
                
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                    <div class="mb-4">
                        <span class="bg-blue-100 text-blue-800 text-sm px-4 py-1.5 rounded-full font-semibold tracking-wide">
                            {{ $project->genre ?? 'Uncategorized' }}
                        </span>
                    </div>
                    
                    <h1 class="text-4xl font-extrabold text-gray-900 mb-2">{{ $project->title }}</h1>
                    <p class="text-lg text-gray-600 font-medium mb-8">
                        Penname: <span class="text-gray-900">{{ $project->penname }}</span>
                    </p>
                    
                    <h2 class="text-xl font-bold text-gray-800 mb-3 border-b pb-2">Outline / Summary</h2>
                    <p class="text-gray-700 leading-relaxed whitespace-pre-line">
                        {{ $project->outline ?? 'ยังไม่มีการเขียนเรื่องย่อ...' }}
                    </p>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Workspace</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <a href="#" class="group block bg-indigo-50 border border-indigo-100 p-6 rounded-xl text-center hover:bg-indigo-500 hover:border-indigo-500 transition duration-300 shadow-sm">
                            <h3 class="text-xl font-bold text-indigo-700 group-hover:text-white transition">Sequence</h3>
                            <p class="text-sm text-indigo-500 mt-2 group-hover:text-indigo-100 transition">จัดการลำดับเหตุการณ์</p>
                        </a>
                        
                        <a href="#" class="group block bg-emerald-50 border border-emerald-100 p-6 rounded-xl text-center hover:bg-emerald-500 hover:border-emerald-500 transition duration-300 shadow-sm">
                            <h3 class="text-xl font-bold text-emerald-700 group-hover:text-white transition">Board</h3>
                            <p class="text-sm text-emerald-500 mt-2 group-hover:text-emerald-100 transition">กระดานระดมสมอง</p>
                        </a>
                    </div>
                </div>

            </div>

            <div class="space-y-8">
                
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 h-full">
                    <div class="flex justify-between items-center mb-6 border-b pb-3">
                        <h2 class="text-xl font-bold text-gray-800">Characters</h2>
                        <a href="#" class="text-sm bg-gray-100 text-gray-700 px-3 py-1 rounded-lg hover:bg-gray-200 transition font-medium">
                            + Add
                        </a>
                    </div>
                    
                    @if($project->characters && $project->characters->count() > 0)
                        <ul class="space-y-4">
                            @foreach($project->characters as $character)
                                <li class="p-4 border border-gray-100 rounded-xl hover:shadow-md transition bg-gray-50">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <p class="font-bold text-gray-900 text-lg">{{ $character->name }}</p>
                                            <p class="text-sm text-blue-600 font-medium">{{ $character->role }}</p>
                                        </div>
                                        <a href="#" class="text-gray-400 hover:text-blue-500">
                                            <span class="text-xs font-semibold underline">View</span>
                                        </a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <div class="text-center py-10 text-gray-500 bg-gray-50 rounded-xl border border-dashed border-gray-300">
                            <p class="text-sm">ยังไม่มีตัวละครในโปรเจกต์นี้</p>
                            <p class="text-xs mt-1">กด "+ Add" เพื่อสร้างตัวละครใหม่</p>
                        </div>
                    @endif
                </div>

            </div>
            
        </div>
    </div>
</x-site-layout>