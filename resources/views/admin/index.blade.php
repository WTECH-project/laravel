@extends('layouts.app')

@section('content')
<section class="w-full flex-grow max-w-xl mx-auto pt-8 px-4 my-18 md:pt-12 sm:max-w-2xl md:max-w-3xl lg:flex-row lg:max-w-5xl lg:space-x-4 xl:max-w-7xl">
    <h2 class="font-bold w-full text-3xl sm:text-4xl text-center mb-4">Zoznam produktov</h2>
    <div class="flex flex-col items-center">
        <a class="bg-white border-2 border-gray-400 
                    hover:border-black transition duration-200 w-full md:w-auto cursor-pointer px-4 py-2 text-center" href="{{ route('admin.showCreate') }}">
            + Pridať produkt
        </a>
        <div class="gap-8 text-sm sm:text-base pt-2">
            @foreach($products as $product)
            <x-admin.product link="{{ route('admin.show', $product->id) }}" name="{{ $product->name }}" description="{{ $product->description }}" price="{{ $product->price }}" img="{{ asset('storage/' . $product->images->first()->image_path) }}" productId="{{ $product->id }}" />
            @endforeach
        </div>
    </div>
</section>
@endsection