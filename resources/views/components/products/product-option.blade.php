@props([
    'type' => $type,
    'id' => $id,
    'name' => $name,
    'for' => $for,
    'label' => $label
])

<div>
    <input type="{{ $type }}" id="{{ $id }}" name="{{ $name }}">
    <label for="{{ $for }}">{{ $label }}</label>
</div>