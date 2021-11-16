@props([
    'name' => $name,
    'type' => $type,
    'label' => $label
])

<div class="flex flex-col">
    <label class="text-left text-gray-500" for="{{ $name }}">{{ $label }}</label>
    <input class="
        bg-white border-2 
        border-gray-600 
        focus:outline-none 
        transition
        duration-300 
        focus:border-black
        px-4 
        py-3
        mt-2"
    type="{{ $type }}" 
    id="{{ $name }}" 
    name="{{ $name }}">
</div>