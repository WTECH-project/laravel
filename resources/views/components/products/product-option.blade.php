@props([
    'name' => $name,
    'type' => $type,
    'label' => $label,
])

<div>
    <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" {{$attributes}} />
    <label for="{{ $name }}">{{ $label }}</label>
</div>