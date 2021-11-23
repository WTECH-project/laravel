<header class="bg-black px-8 py-8">
    <div class="flex items-center justify-between">
        <div class="flex items-center space-x-8">
            <a class="uppercase text-white font-bold text-xl" href="{{ route('home') }}">Logo</a>
            <nav>
                <ul class="flex items-center space-x-8">
                    <li>
                        <a class="hover:underline text-gray-300" href="{{ route('products', 2) }}">Ženy</a>
                    </li>
                    <li>
                        <a class="hover:underline text-gray-300" href="{{ route('products', 1) }}">Muži</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="flex items-center justify-center space-x-8">
            <!-- Cart icon -->
            <div>
                <a href="{{ route('checkout.cart') }}" class="flex relative cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    <div class="absolute left-7 top-5 text-white text-xs">
                        @if(session()->has('cart') && count(session()->get('cart')) > 0)

                        @php
                        $cart = session()->get('cart', []);

                        $product_count = 0;

                        foreach($cart as $product_id => $size_data) {
                            foreach($size_data as $size_id => $count) {
                                $product_count += 1;
                            }
                        }
                        @endphp

                        <span>{{ $product_count }}</span>
                        @endif
                    </div>
                </a>
            </div>
            <!-- Profile menu -->
            @auth
            <div id="profile" class="hidden md:block flex relative cursor-pointer px-8 py-4 border-2 border-gray-300 md:m-0 md:p-0 md:border-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <p class="text-white hover:underline md:hidden">Profil</p>
                <div id="profileMenu" class="hidden absolute w-48 right-2 top-8 text-white text-xs z-10">
                    <a href="{{ route('settings') }}" class="flex cursor-pointer w-full px-8 py-2 border-2 border-gray-300 bg-gray-800 gap-2 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="text-white">Zobraziť profil</p>
                    </a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf

                        <button type="submit" class="w-full">
                            <div class="flex items-center px-8 py-2 border-2 border-gray-300 bg-gray-800 gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                <p class="text-white">Odhlásiť sa</p>
                            </div>
                        </button>
                    </form>
                </div>
            </div>
            <!-- Hamburger -->
            <div class="md:hidden">
                <svg id="hamburger" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-300 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </div>
            @endauth

            @guest
            <div class="flex items-center">
                <nav>
                    <ul class="flex items-center space-x-4">
                        <li>
                            <a class="hover:underline text-gray-300" href="{{ route('login') }}">Prihlásiť sa</a>
                        </li>
                        <li>
                            <a class="hover:underline text-gray-300" href="{{ route('register') }}">Registrovať</a>
                        </li>
                    </ul>
                </nav>
            </div>
            @endguest
        </div>
    </div>
    <!-- Responsive menu -->
    @if(auth()->user())
    <div id="menu" class="hidden md:hidden">
        <div class="w-full flex flex-col md:flex-row md:items-center mt-4">
            <a href="{{ route('settings') }}" class="flex items-center gap-2 px-8 py-4 border-2 border-gray-300 md:m-0 md:p-0 md:border-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <p class="text-white hover:underline md:hidden">Profil</p>
            </a>

            <form action="{{ route('logout') }}" method="POST" class="mt-4">
                @csrf

                <button type=" submit" class="w-full">
                    <div class=" flex items-center px-8 py-4 border-2 border-gray-300 gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <p class="text-white hover:underline">Odhlásiť sa</p>
                    </div>
                </button>
            </form>
        </div>
    </div>
    @endif
</header>