<header class="bg-black px-8 py-8">
    <div class="flex items-center justify-between">
        <div class="flex items-center space-x-8">
            <a class="uppercase text-white font-bold text-xl" href="{{ route('home') }}">Logo</a>
            <nav>
                <ul class="flex items-center space-x-8">
                    @foreach($sex_categories as $sex_category)
                    <li>
                        <a class="hover:underline text-gray-300" href="{{ route('products', $sex_category->id) }}">{{ $sex_category->name }}</a>
                    </li>
                    @endforeach
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
            <div id="profile" class="hidden sm:flex relative cursor-pointer px-8 py-4 border-2 border-gray-300 sm:m-0 sm:p-0 sm:border-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <p class="text-white hover:underline sm:hidden">Profil</p>
                <div id="profileMenu" class="hidden absolute w-48 right-2 top-8 text-white text-xs z-10">
                    @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin') }}" class="flex cursor-pointer w-full px-8 py-2 border-2 border-gray-300 bg-gray-800 gap-2 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <p class="text-white">Admin rozhranie</p>
                    </a>
                    @endif
                    <a href="{{ route('settings') }}" class="flex cursor-pointer w-full px-8 py-2 border-2 border-gray-300 bg-gray-800 gap-2 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="text-white">Zobrazi?? profil</p>
                    </a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf

                        <button type="submit" class="w-full">
                            <div class="flex items-center px-8 py-2 border-2 border-gray-300 bg-gray-800 gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                <p class="text-white">Odhl??si??</p>
                            </div>
                        </button>
                    </form>
                </div>
            </div>
            @endauth

            @guest
            <div id="profile" class="sm:flex items-center hidden">
                <nav>
                    <ul class="flex items-center space-x-4">
                        <li>
                            <a class="hover:underline text-gray-300" href="{{ route('login') }}">Prihl??si??</a>
                        </li>
                        <li>
                            <a class="hover:underline text-gray-300" href="{{ route('register') }}">Registrova??</a>
                        </li>
                    </ul>
                </nav>
            </div>
            @endguest

            <!-- Hamburger -->
            <div class="sm:hidden">
                <svg id="hamburger" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-300 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </div>
        </div>
    </div>
    <!-- Responsive auth menu -->
    @auth
    <div id="menu" class="hidden sm:hidden">
        <div class="w-full flex flex-col sm:flex-row sm:items-center mt-4 space-y-4">
            @if(auth()->user()->isAdmin())
            <a href="{{ route('admin') }}" class="flex items-center gap-2 px-8 py-4 border-2 border-gray-300 sm:m-0 sm:p-0 md:border-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <p class="text-white hover:underline md:hidden">Admin rozhranie</p>
            </a>
            @endif

            <a href="{{ route('settings') }}" class="flex items-center gap-2 px-8 py-4 border-2 border-gray-300 sm:m-0 sm:p-0 md:border-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <p class="text-white hover:underline md:hidden">Profil</p>
            </a>

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type=" submit" class="w-full">
                    <div class=" flex items-center px-8 py-4 border-2 border-gray-300 gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <p class="text-white hover:underline">Odhl??si??</p>
                    </div>
                </button>
            </form>
        </div>
    </div>
    @endauth

    <!-- Responsive guest menu -->
    @guest
    <div id="menu" class="hidden sm:hidden">
        <div class="w-full flex flex-col md:flex-row md:items-center mt-4">
            <a href="{{ route('login') }}" class="flex items-center gap-2 px-8 py-4 border-2 border-gray-300 md:m-0 md:p-0 md:border-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                </svg>
                <p class="text-white hover:underline md:hidden">Prihl??si??</p>
            </a>

            <a href="{{ route('register') }}" class="flex items-center gap-2 px-8 py-4 border-2 border-gray-300 md:m-0 md:p-0 md:border-0 mt-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <p class="text-white hover:underline md:hidden">Registrova??</p>
            </a>
        </div>
    </div>
    @endguest
</header>