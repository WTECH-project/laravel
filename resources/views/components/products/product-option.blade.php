@props([
'id' => null,
'name' => $name,
'type' => $type,
'label' => $label,
])

<div class="flex flex-row items-center">
    <input type="{{ $type }}" id="{{ $id ? $id : $name }}" name="{{ $name }}" {{$attributes}} />
    <label class="ml-4 text-lg" for="{{ $id ? $id : $name }}">{{ $label }}</label>
</div>