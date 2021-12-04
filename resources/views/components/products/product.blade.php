@props([
    'brand' => $brand,
    'link' => $link,
    'name' => $name,
    'price' => $price,
    'img' => $img
])

<article class="w-full shadow-md">
    <a class="w-full shadow-md" href="{{ $link }}">
        <img class="h-48 sm:h-72 w-full" src="{{ asset('storage/' . $img) }}" alt="Topánky">
        <div class="p-6 text-lg xl:text-lg">
            <h4 class="font-semibold">{{ $brand }} {{ $name }}</h4>
            <div class="text-gray-600">{{ $price }}€</div>
        </div>
    </a>
</article>