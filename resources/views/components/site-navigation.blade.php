<nav class="bg-blue-950 text-white 100">
 
    <div class="max-w-7xl mx-auto flex justify-between items-center h-16 px-4">
        <ul class="flex space-x-4 p-4 "> 
            @foreach($menu_items as $item)
                <li><a href="{{$item['url']}}">{{$item['name']}}</a></li>
            @endforeach
        </ul>   

            @if (Route::has('login'))
                <div class="flex  items-center justify-end gap-4">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="">
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>

</nav>