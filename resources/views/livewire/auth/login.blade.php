<x-site-layout title="Welcome Back - PlotSeed">
    <div class="min-h-[80vh] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        
        <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-[2rem] shadow-xl shadow-blue-100/50 border border-gray-100 relative overflow-hidden">
            
            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-blue-400 to-indigo-500"></div>

            <div class="text-center pt-2">
                <div class="mx-auto h-16 w-16 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mb-6 border border-blue-100 shadow-sm">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                </div>
                <h2 class="text-3xl font-black text-gray-900 tracking-tight">Welcome back</h2>
                <p class="mt-3 text-sm text-gray-500 font-medium">Log in to continue building your universe.</p>
            </div>

            @if (session('status'))
                <div class="p-4 rounded-xl bg-green-50 border border-green-200 text-green-600 text-sm font-bold text-center">
                    {{ session('status') }}
                </div>
            @endif

            <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="space-y-5">
                    
                    <div>
                        <label for="email" class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Email address</label>
                        <input id="email" name="email" type="email" autocomplete="email" required 
                               class="appearance-none rounded-xl block w-full px-4 py-3.5 border border-gray-300 placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition shadow-sm @error('email') border-red-500 @enderror" 
                               value="{{ old('email') }}">
                        @error('email')
                            <p class="mt-2 text-red-500 text-sm font-bold">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Password</label>
                        <input id="password" name="password" type="password" autocomplete="current-password" required 
                               class="appearance-none rounded-xl block w-full px-4 py-3.5 border border-gray-300 placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition shadow-sm @error('password') border-red-500 @enderror">
                        @error('password')
                            <p class="mt-2 text-red-500 text-sm font-bold">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center justify-between mt-6">
                    <div class="flex items-center">
                        <input id="remember" name="remember" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded cursor-pointer">
                        <label for="remember" class="ml-2 block text-sm text-gray-700 font-bold cursor-pointer">
                            Remember me
                        </label>
                    </div>

                    <div class="text-sm">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="font-bold text-blue-600 hover:text-blue-500 transition">
                                Forgot password?
                            </a>
                        @endif
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full flex justify-center py-4 px-4 border border-transparent text-sm font-bold rounded-xl text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all shadow-lg shadow-blue-200 transform hover:-translate-y-1">
                        Sign In
                    </button>
                </div>
            </form>
            
            <div class="pt-6 text-center border-t border-gray-100 mt-6">
                <p class="text-sm text-gray-500 font-medium">
                    Don't have an account? 
                    <a href="{{ route('register') }}" class="font-bold text-blue-600 hover:text-blue-800 transition border-b-2 border-blue-200 hover:border-blue-600 pb-0.5 ml-1">Sign up now</a>
                </p>
            </div>

        </div>
    </div>
</x-site-layout>