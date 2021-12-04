@extends('layouts.app')

@section('content')
<div class="w-full flex-grow max-w-xl mx-auto pt-8 px-4 my-18 md:pt-12 sm:max-w-2xl md:max-w-3xl lg:flex-row lg:max-w-5xl lg:space-x-4 xl:max-w-7xl">   
    <div class="flex flex-col items-center">
        <a class="border border-black p-2" href="{{ route('admin.showCreate') }}">
            + Pridať produkt
        </a> 
        <div class="gap-8 text-sm sm:text-base pt-2">
            @foreach($products as $product)
            <x-admin.product link="{{ route('admin.show', $product->id) }}" name="{{ $product->name }}" description="{{ $product->description }}" price="{{ $product->price }}" img="{{ asset('images/' . $product->images->first()->image_path) }}" productId="{{ $product->id }}"/>
            @endforeach
        </div>
        <span class="mt-4">
            
        </span>
    </div>
</div>
@endsection
