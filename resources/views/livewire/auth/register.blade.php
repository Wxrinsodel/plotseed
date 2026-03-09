<x-site-layout title="Create an Account - PlotSeed">
    <div class="min-h-[80vh] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        
        <div class="max-w-md w-full space-y-6 bg-white p-10 rounded-[2rem] shadow-xl shadow-blue-100/50 border border-gray-100 relative overflow-hidden">
            
            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-indigo-400 to-blue-500"></div>

            <div class="text-center pt-2">
                <div class="mx-auto h-16 w-16 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center mb-6 border border-indigo-100 shadow-sm">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                </div>
                <h2 class="text-3xl font-black text-gray-900 tracking-tight">Create an account</h2>
                <p class="mt-3 text-sm text-gray-500 font-medium">Start building your universe today.</p>
            </div>

            <form class="mt-8 space-y-5" action="{{ route('register') }}" method="POST">
                @csrf
                
                <div>
                    <label for="name" class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Pen Name / Full Name</label>
                    <input id="name" name="name" type="text" autocomplete="name" required autofocus
                           class="appearance-none rounded-xl block w-full px-4 py-3.5 border border-gray-300 placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition shadow-sm @error('name') border-red-500 @enderror" 
                           value="{{ old('name') }}">
                    @error('name')
                        <p class="mt-2 text-red-500 text-sm font-bold">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Email address</label>
                    <input id="email" name="email" type="email" autocomplete="email" required 
                           class="appearance-none rounded-xl block w-full px-4 py-3.5 border border-gray-300 placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition shadow-sm @error('email') border-red-500 @enderror" 
                           value="{{ old('email') }}">
                    @error('email')
                        <p class="mt-2 text-red-500 text-sm font-bold">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Password</label>
                    <input id="password" name="password" type="password" autocomplete="new-password" required 
                           class="appearance-none rounded-xl block w-full px-4 py-3.5 border border-gray-300 placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition shadow-sm @error('password') border-red-500 @enderror">
                    @error('password')
                        <p class="mt-2 text-red-500 text-sm font-bold">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Confirm Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required 
                           class="appearance-none rounded-xl block w-full px-4 py-3.5 border border-gray-300 placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition shadow-sm">
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full flex justify-center py-4 px-4 border border-transparent text-sm font-bold rounded-xl text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all shadow-lg shadow-indigo-200 transform hover:-translate-y-1">
                        Sign Up
                    </button>
                </div>
            </form>
            
            <div class="pt-6 text-center border-t border-gray-100 mt-6">
                <p class="text-sm text-gray-500 font-medium">
                    Already have an account? 
                    <a href="{{ route('login') }}" class="font-bold text-indigo-600 hover:text-indigo-800 transition border-b-2 border-indigo-200 hover:border-indigo-600 pb-0.5 ml-1">Log in</a>
                </p>
            </div>

        </div>
    </div>
</x-site-layout>