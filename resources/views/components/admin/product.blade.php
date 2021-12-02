@props([
    'link' => $link,
    'name' => $name,
    'description' => $description,
    'price' => $price,
    'img' => $img,
    'productId' => $productId
])

<div class="flex flex-row w-full gap-4 shadow-md items-center">
    <img class="w-32 h-28 rounded-md ml-3" src="{{ $img }}" alt="Topánky">
    <div class="p-6 text-lg xl:text-lg">
        <h4 class="font-semibold">{{ $name }}</h4>
        <div class="text-gray-600">{{ $price }}€</div>
        <div class="text-gray-600">{{ $description }}</div>
    </div>
    <a class="border border-black p-1 mr-3" href="{{ $link }}"> Upraviť produkt </a>
    <form action="{{ route('admin.delete', $productId) }}" method="post">
        @method('DELETE')
        @csrf
        <input class="border border-black p-1 mr-3 bg-white cursor-pointer" type="submit" value="Vymazať produkt" />
    </form>
</div>