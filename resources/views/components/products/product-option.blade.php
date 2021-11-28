@props([
    'name' => $name,
    'type' => $type,
    'label' => $label,
])

<div class="flex flex-row items-center">
    <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" {{$attributes}} />
    <label class="ml-4 text-lg" for="{{ $name }}">{{ $label }}</label>
</div>