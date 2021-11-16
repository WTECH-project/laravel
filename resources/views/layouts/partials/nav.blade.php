<header>
    <nav class="flex flex-col md:flex-row md:justify-between md:items-center bg-black px-8 py-4">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <a class="uppercase text-white font-bold text-xl" href="#">Logo</a>
                <ul class="flex items-center mx-4">
                    <li class="mx-4">
                        <a class="hover:underline text-gray-300" href="#">Ženy</a>
                    </li>
                    <li class="mx-4">
                        <a class="hover:underline text-gray-300" href="#">Muži</a>
                    </li>
                </ul>
            </div>
            <div>
                <svg id="hamburger" xmlns="http://www.w3.org/2000/svg" class="md:mx-2 h-6 w-6 md:hidden block text-gray-300 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </div>
        </div>

        <div id="menu" class="hidden md:block">
            <div class="flex flex-col md:flex-row justify-center items-center py-4">
                <form class="flex relative flex-row w-full items-center mb-0" action="#" method="GET">
                    <input class="w-full md:w-80 bg-gray-700 m-4 px-8 py-4 md:m-0 md:px-4 md:py-2 text-white focus:outline-none" type="text" placeholder="Vyhľadaj značky, kategórie, produkty">
                    <div id="search" class="cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mx-4 h-6 w-6 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>

                    <div id="searchMenu" class="z-10 hidden absolute w-full md:w-80 bg-gray-800 top-20 md:top-10 text-white text-sm">
                        <a href="#" class="flex justify-between cursor-pointer w-full px-6 py-2 border-2 border-gray-300 gap-4 items-center">
                            <div class="flex flex-row gap-2 items-center">
                                <img class="h-10 w-10" src="https://images.unsplash.com/photo-1549298916-b41d501d3772?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1112&q=80" alt="Topánky">
                                <p class="text-white">Jordan 4 Retro Off-White</p>
                            </div>
                            <p>189€</p>
                        </a>
                        <a href="#" class="flex justify-between cursor-pointer w-full px-6 py-2 border-2 border-gray-300 gap-4 items-center">
                            <div class="flex flex-row gap-2 items-center">
                                <img class="h-10 w-10" src="https://images.unsplash.com/photo-1549298916-b41d501d3772?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1112&q=80" alt="Topánky">
                                <p class="text-white">Jordan 4 Retro Off-White</p>
                            </div>
                            <p>189€</p>
                        </a>
                        <a href="#" class="flex justify-between cursor-pointer w-full px-6 py-2 border-2 border-gray-300 gap-4 items-center">
                            <div class="flex flex-row gap-2 items-center">
                                <img class="h-10 w-10" src="https://images.unsplash.com/photo-1549298916-b41d501d3772?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1112&q=80" alt="Topánky">
                                <p class="text-white">Jordan 4 Retro Off-White</p>
                            </div>
                            <p>189€</p>
                        </a>
                    </div>
                </form>
                
                <div class="w-full flex flex-col md:flex-row md:items-center">
                    <a href="#" class="flex relative cursor-pointer m-4 px-8 py-4 border-2 border-gray-300 md:m-0 md:p-0 md:border-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mx-2 h-6 w-6 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        <span class="text-white hover:underline md:hidden">Nákupný košík</span>
                        <div class="absolute left-7 top-5 text-white text-xs">
                            <p id="numBasketItems"></p>
                        </div>
                    </a>
                    
                    <a href="#" class="md:hidden flex cursor-pointer m-4 px-8 py-4 border-2 border-gray-300 md:m-0 md:p-0 md:border-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mx-2 h-6 w-6 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <p class="text-white hover:underline md:hidden">Profil</p>
                    </a>
                    
                    <div id="profile" class="hidden md:block flex relative cursor-pointer m-4 px-8 py-4 border-2 border-gray-300 md:m-0 md:p-0 md:border-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mx-2 h-6 w-6 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <p class="text-white hover:underline md:hidden">Profil</p>
                        <div id="profileMenu" class="hidden absolute w-48 right-2 top-8 text-white text-xs">
                            <a href="#" class="flex cursor-pointer w-full px-8 py-2 border-2 border-gray-300 bg-gray-800 gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <p class="text-white">Zobraziť profil</p>
                            </a>
                            <a href="#" class="flex relative cursor-pointer w-full px-8 py-2 border-2 border-gray-300 bg-gray-800 gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                <p class="text-white">Odhlásiť sa</p>
                            </a>
                        </div>
                    </div>

                    <a href="#" class="flex cursor-pointer m-4 px-8 py-4 border-2 border-gray-300 md:m-0 md:p-0 md:border-0 md:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mx-2 h-6 w-6 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <p class="text-white hover:underline md:hidden">Odhlásiť sa</p>
                    </a>
                </div>
            </div>
        </div>
    </nav>
</header>