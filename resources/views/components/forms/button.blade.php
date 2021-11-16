@props([
    'text' => $text,
    'type' => $type
])

<div {{ $attributes->merge(['class' => 'flex flex-col']) }}>
    <button class="
        p-3 
        bg-black 
        text-white 
        uppercase 
        font-bold 
        transition 
        duration-300 
        hover:bg-gray-700" 
    type="{{ $type }}">
        {{ $text }}
    </button>
</div>