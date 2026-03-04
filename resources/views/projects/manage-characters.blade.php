<x-site-layout :title="'Manage Characters - ' . $project->title">
    <div class="max-w-3xl mx-auto p-6 mt-8">
        
        <div class="mb-6 flex justify-between items-center">
            <a href="{{ route('projects.show', $project->id) }}" class="text-gray-500 hover:text-blue-600 font-medium">&larr; Back to {{ $project->title }}</a>
        </div>

        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
            <h1 class="text-2xl font-bold text-gray-900 mb-2">Manage Characters</h1>
            <p class="text-gray-600 mb-6 border-b pb-4">เลือกตัวละครที่คุณต้องการให้ปรากฏในนิยายเรื่อง <span class="font-semibold text-blue-600">{{ $project->title }}</span></p>
            
            <form action="{{ route('projects.characters.update', $project->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-8">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 p-4 border border-gray-200 rounded-xl bg-gray-50 max-h-96 overflow-y-auto">
                        @forelse($characters as $character)
                            <label class="flex items-center space-x-3 cursor-pointer hover:bg-white p-3 rounded-lg border border-transparent hover:border-gray-200 hover:shadow-sm transition">
                                <input type="checkbox" name="characters[]" value="{{ $character->id }}" 
                                    class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500 h-5 w-5"
                                    {{ in_array($character->id, old('characters', $project->characters->pluck('id')->toArray())) ? 'checked' : '' }}>
                                <span class="text-sm font-medium text-gray-800">
                                    {{ $character->name }} 
                                    <span class="block text-xs text-gray-500 font-normal mt-0.5">{{ $character->role ?? 'N/A' }}</span>
                                </span>
                            </label>
                        @empty
                            <p class="text-sm text-gray-500 col-span-full text-center py-4">ยังไม่มีตัวละครในระบบ กรุณาสร้างตัวละครก่อน</p>
                        @endforelse
                    </div>
                </div>

                <div class="flex justify-end gap-3 pt-4 border-t">
                    <a href="{{ route('projects.show', $project->id) }}" class="px-5 py-2.5 bg-gray-100 text-gray-700 font-medium rounded-lg hover:bg-gray-200 transition">Cancel</a>
                    <button type="submit" class="px-5 py-2.5 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition">Save Characters</button>
                </div>
            </form>
        </div>

    </div>
</x-site-layout>