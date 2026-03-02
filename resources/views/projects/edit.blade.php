<x-site-layout title="Edit Project">
    <div class="max-w-2xl mx-auto p-8 bg-white shadow-lg rounded-xl mt-6">
        
        <h1 class="font-bold text-2xl mb-4">Edit {{$project->title}}</h1>

        <form class="flex flex-col gap-4" action="{{ route('projects.update', $project->id) }}" method="post">
            
            @method('put')
            @csrf

            <div>
                <label for="title" class="font-semibold text-sm">Project Title</label><br/>
                <input type="text" id="title" name="title" value="{{$project->title}}" class="p-1 border border-sky-700 w-full" required>
            </div>

            <div>
                <label for="penname" class="font-semibold text-sm">Penname</label><br/>
                <input type="text" id="penname" name="penname" value="{{$project->penname}}" class="p-1 border border-sky-700 w-full" required>
            </div>

            <div>
                <label for="genre" class="font-semibold text-sm">Genre</label><br/>
                <input type="text" id="genre" name="genre" value="{{$project->genre}}" class="p-1 border border-sky-700 w-full">
            </div>

            <div>
                <label for="outline" class="font-semibold text-sm">Outline / Summary</label><br/>
                <textarea id="outline" name="outline" rows="4" class="p-1 border border-sky-700 w-full">{{$project->outline}}</textarea>
            </div>

            <div>
                <button type="submit" class="bg-sky-800 text-sky-50 p-2 uppercase rounded hover:bg-sky-900 transition">Update</button>
            </div>

        </form>
    </div>
</x-site-layout>