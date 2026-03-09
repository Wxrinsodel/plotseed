<x-site-layout title="My Account">
    <div class="max-w-3xl mx-auto p-6 mt-16">
        
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-10 text-center relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-24 bg-gradient-to-r from-blue-500 to-indigo-600"></div>
            
            <div class="relative w-32 h-32 bg-white rounded-full flex items-center justify-center text-5xl font-black text-indigo-600 mx-auto mb-4 border-4 border-white shadow-lg mt-8">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>

            <h1 class="text-3xl font-black text-gray-900 mb-1">{{ Auth::user()->name }}</h1>
            <p class="text-gray-500 font-medium mb-10">{{ Auth::user()->email }}</p>

            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('projects.index') }}" class="px-8 py-3.5 bg-gray-100 text-gray-700 font-bold rounded-xl hover:bg-gray-200 transition-colors">
                    Back to Projects
                </a>

                <form method="POST" action="{{ route('logout') }}" class="m-0">
                    @csrf
                    <button type="submit" class="w-full sm:w-auto px-8 py-3.5 bg-red-500 text-white font-bold rounded-xl hover:bg-red-600 transition-colors shadow-sm shadow-red-200">
                        Log Out
                    </button>
                </form>
            </div>
            
        </div>

    </div>
</x-site-layout>