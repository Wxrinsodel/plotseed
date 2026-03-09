<x-site-layout title="PlotSeed — Where Stories Bloom">
    
    <div class="relative min-h-screen flex items-center justify-center overflow-hidden bg-[#fafafa]">
        <div class="absolute inset-0 z-0 opacity-[0.03]" style="background-image: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiMwMDAwMDAiIGZpbGwtb3BhY2l0eT0iMSI+PHBhdGggZD0iTTM2IDM0djJIMjh2LTJoOHptMCA4djJIMjh2LTJoOHptMTAtMzJ2Mmg4VjhoLTh6bTggOHYyaC04VjhoOHptLTggMTh2Mmg4di0yaC04em04IDh2MmgtOFYyOGg4em0tMzIgOHYyaDh2LTJoLTh6bTggOHYyaC04VjQ0aDh6bTggMzJ2Mmg4di0yaC04em04IDh2MmgtOFY2MGg4em0tOC03MHYyaDhWOGgtOHptOCA4djJoLThWOGg4em0wIDE4djJoOHYtMmgtOHptOCA4djloLThWMjhoOHptLTMyIDE4djJoOHYtMmgtOHptOCA4djloLThWNDRoOHptLTMyIDI0djJoOFY2OGgtOHptOCA4djloLThWNjhoOHpNMjggNHYyaDhWNGgtOHptOCA4djloLThWNGg4em0wIDE4djJoOHYtMmgtOHptOCA4djloLThWMjh0OHptLTMyIDE4djJoOHYtMmgtOHptOCA4djloLThWNDRoOHptLTMyIDI0djJoOFY2OGgtOHptOCA4djloLThWNjhoOHpNMjggNHYyaDhWNGgtOHptOCA4djloLThWNGg4em0wIDE4djJoOHYtMmgtOHptOCA4djloLThWMjh0OHptLTMyIDE4djJoOHYtMmgtOHptOCA4djloLThWNDRoOHpNMjggNHYyaDhWNGgtOHptOCA4djloLThWNGg4em0wIDE4djJoOHYtMmgtOHptOCA4djloLThWMjh0OHpNMjggNHYyaDhWNGgtOHptOCA4djloLThWNGg4eiIvPjwvZz48L2c+PC9zdmc+');"></div>

        <div class="absolute top-[-10%] left-[-10%] w-[500px] h-[500px] bg-blue-100 rounded-full blur-[120px] opacity-50"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[500px] h-[500px] bg-yellow-100 rounded-full blur-[120px] opacity-50"></div>

        <div class="relative z-10 max-w-5xl mx-auto px-6 text-center">
            <span class="inline-block px-4 py-1.5 mb-6 text-[10px] font-black tracking-[0.3em] text-blue-600 bg-blue-50 rounded-full uppercase">
                The Future of Storytelling
            </span>
            
            <h1 class="text-7xl md:text-9xl font-black text-gray-900 tracking-tighter leading-[0.85] mb-8">
                PLANT YOUR <br> 
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600">IMAGINATION.</span>
            </h1>
            
            <p class="max-w-2xl mx-auto text-lg text-gray-500 font-medium leading-relaxed mb-12">
                change <br class="hidden md:block">
                the chaos in your head into a manageable universe <br class="hidden md:block">
                with our story planning system
            </p>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-6">
                @auth
                    <a href="{{ route('projects.index') }}" class="group relative px-12 py-5 bg-gray-900 text-white font-black rounded-2xl overflow-hidden transition-all hover:scale-105 active:scale-95 shadow-2xl shadow-gray-200">
                        <span class="relative z-10 uppercase tracking-widest text-sm">Go to Project</span>
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-indigo-600 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </a>
                @else
                    <a href="{{ route('register') }}" class="px-12 py-5 bg-blue-600 text-white font-black rounded-2xl hover:bg-blue-700 transition-all hover:shadow-2xl hover:shadow-blue-200 transform hover:-translate-y-1 uppercase tracking-widest text-sm">
                        Start Your Universe
                    </a>
                    <a href="{{ route('login') }}" class="px-12 py-5 bg-white text-gray-900 font-black rounded-2xl border border-gray-200 hover:border-gray-900 transition-all uppercase tracking-widest text-sm">
                        Sign In
                    </a>
                @endauth
            </div>
        </div>
    </div>

    <div class="py-32 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <div class="group p-10 bg-gray-50 rounded-[3rem] border border-transparent hover:border-blue-100 hover:bg-white hover:shadow-2xl hover:shadow-blue-50 transition-all duration-500">
                    <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center text-3xl shadow-sm group-hover:scale-110 transition-transform mb-8">🧭</div>
                    <h3 class="text-2xl font-black text-gray-900 mb-4 tracking-tight">VISUAL PLOTTING</h3>
                    <p class="text-gray-500 leading-relaxed font-medium">
                        Drag and drop your ideas on a digital canvas to see the connections between every scene in a flash
                    </p>
                </div>

                <div class="group p-10 bg-gray-50 rounded-[3rem] border border-transparent hover:border-yellow-100 hover:bg-white hover:shadow-2xl hover:shadow-yellow-50 transition-all duration-500">
                    <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center text-3xl shadow-sm group-hover:scale-110 transition-transform mb-8">⛓️</div>
                    <h3 class="text-2xl font-black text-gray-900 mb-4 tracking-tight">DETECTIVE BRAIN</h3>
                    <p class="text-gray-500 leading-relaxed font-medium">
                        Connect characters and scenes with "black threads" to identify complex relationships with precision
                    </p>
                </div>

                <div class="group p-10 bg-gray-50 rounded-[3rem] border border-transparent hover:border-purple-100 hover:bg-white hover:shadow-2xl hover:shadow-purple-50 transition-all duration-500">
                    <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center text-3xl shadow-sm group-hover:scale-110 transition-transform mb-8">🧬</div>
                    <h3 class="text-2xl font-black text-gray-900 mb-4 tracking-tight">CHARACTER DNA</h3>
                    <p class="text-gray-500 leading-relaxed font-medium">
                        Dive deep into the backstories and thoughts of every character to create memorable dimensions
                    </p>
                </div>

            </div>
        </div>
    </div>

    <footer class="bg-[#0a0a0a] pt-20 pb-10">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-16">
                
                <div class="space-y-6">
                    <h2 class="text-white font-black text-3xl tracking-tighter uppercase">PLOTSEED.</h2>
                    <p class="text-gray-500 text-sm font-medium leading-relaxed max-w-xs">
                        A story planning tool designed to transform "seeds of ideas" into "perfect universes"
                    </p>
                </div>

                <div class="space-y-6">
                    <h3 class="text-white text-xs font-black uppercase tracking-[0.3em]">Contact Us</h3>
                    <ul class="space-y-4">
                        <li>
                            <a href="mailto:hello@plotseed.com" class="group flex items-center gap-3 text-gray-400 hover:text-blue-500 transition-colors">
                                <div class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center group-hover:bg-blue-500/10 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                </div>
                                <span class="text-sm font-bold">hello@plotseed.com</span>
                            </a>
                        </li>
                        <li class="flex items-center gap-3 text-gray-400">
                            <div class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </div>
                            <span class="text-sm font-bold">Bangkok, Thailand</span>
                        </li>
                    </ul>
                </div>

                <div class="space-y-6">
                    <h3 class="text-white text-xs font-black uppercase tracking-[0.3em]">Follow Us</h3>
                    <div class="flex gap-4">
                        <a href="#" class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center text-gray-400 hover:bg-blue-600 hover:text-white transition-all transform hover:-translate-y-1">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center text-gray-400 hover:bg-gray-800 hover:text-white transition-all transform hover:-translate-y-1">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center text-gray-400 hover:bg-gray-700 hover:text-white transition-all transform hover:-translate-y-1">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/></svg>
                        </a>
                    </div>
                </div>

            </div>

            <div class="pt-8 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-gray-500 text-[10px] font-bold uppercase tracking-[0.2em]">
                    © 2026 PlotSeed | Intro to Web development with Laravel.
                </p>
                <div class="flex gap-6">
                    <a href="#" class="text-gray-600 hover:text-white text-[10px] font-bold uppercase tracking-widest transition-colors">Privacy Policy</a>
                    <a href="#" class="text-gray-600 hover:text-white text-[10px] font-bold uppercase tracking-widest transition-colors">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>
</x-site-layout>