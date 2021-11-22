@props([
    'link' => $link,
    'name' => $name,
    'price' => $price,
    'img' => $img
])

<a class="w-full shadow-md" href="{{ $link }}">
    <img src="{{ $img }}" alt="Topánky">
    <div class="p-6 text-lg xl:text-lg">
        <h4 class="font-semibold">{{ $name }}</h4>
        <div class="text-gray-600">{{ $price }}€</div>
    </div>
</a>