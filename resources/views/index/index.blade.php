@extends('layouts.app')

@section('content')
    <section class="grid grid-cols-1 sm:grid-cols-2 gap-4 px-8 py-4">
        <a class="w-full relative shadow-md" href="#">
            <div class="w-full h-full inset-0 top-0 left-0 absolute bg-black opacity-50"></div>
            <div class="w-full h-full absolute flex flex-col top-0 left-0 justify-center items-center">
                <div class="text-bold text-2xl sm:text-4xl md:text-6xl text-white">Ženy</div>
            </div>
            <img class="w-full object-cover" src="https://images.unsplash.com/photo-1549298916-b41d501d3772?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1112&q=80" alt="Topánky">
        </a>
        <a class="w-full relative shadow-md" href="#">
            <div class="w-full h-full top-0 left-0 absolute bg-black opacity-50"></div>
            <div class="w-full h-full absolute flex flex-col top-0 left-0 justify-center items-center">
                <div class="text-bold text-2xl sm:text-4xl md:text-6xl text-white">Muži</div>
            </div>
            <img class="w-full object-cover" src="https://images.unsplash.com/photo-1549298916-b41d501d3772?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1112&q=80" alt="Topánky">
        </a>
        <div class="sm:col-span-2 w-full relative shadow-md">
            <div class="w-full h-full top-0 left-0 absolute bg-black opacity-50"></div>
            <div class="w-full h-full absolute flex flex-col top-0 left-0 justify-center items-center">
                <div class="text-bold text-2xl sm:text-4xl md:text-6xl text-white">Vitajte vo svete tenisiek</div>
            </div>
            <img class="w-full object-cover" src="https://images.unsplash.com/photo-1549298916-b41d501d3772?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1112&q=80" alt="Topánky">
        </div>
        <div class="grid grid-cols-1 sm:col-span-2 sm:grid-cols-3 gap-4">
            <a class="w-full relative shadow-md" href="#">
                <div class="w-full h-full top-0 left-0 absolute bg-black opacity-50"></div>
                <div class="w-full h-full absolute flex flex-col top-0 left-0 justify-center items-center">
                    <div class="text-bold text-xl sm:text-4xl md:text-6xl text-white">Topanka 1</div>
                </div>
                <img class="w-full object-cover" src="https://images.unsplash.com/photo-1549298916-b41d501d3772?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1112&q=80" alt="Topánky">
            </a>
            <a class="w-full relative shadow-md" href="#">
                <div class="w-full h-full top-0 left-0 absolute bg-black opacity-50"></div>
                <div class="w-full h-full absolute flex flex-col top-0 left-0 justify-center items-center">
                    <div class="text-bold text-xl sm:text-4xl md:text-6xl text-white">Topanka 2</div>
                </div>
                <img class="w-full object-cover" src="https://images.unsplash.com/photo-1549298916-b41d501d3772?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1112&q=80" alt="Topánky">
            </a>
            <a class="w-full relative shadow-md" href="#">
                <div class="w-full h-full top-0 left-0 absolute bg-black opacity-50"></div>
                <div class="w-full h-full absolute flex flex-col top-0 left-0 justify-center items-center">
                    <div class="text-bold text-xl sm:text-4xl md:text-6xl text-white">Topanka 3</div>
                </div>
                <img class="w-full object-cover" src="https://images.unsplash.com/photo-1549298916-b41d501d3772?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1112&q=80" alt="Topánky">
            </a>
        </div>
    </section>
@endsection