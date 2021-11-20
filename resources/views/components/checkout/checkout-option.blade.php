@props([
    'type' => $type,
    'id' => $id,
    'name' => $name,
    'for' => $for,
    'label' => $label,
    'price' => $price
])

<div class="flex p-4 flex-row items-center justify-between">
    <div>
        <input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}">
        <label for="{{ $for }}">{{ $label }}</label>
    </div>
    <span>{{ $price }}</span>
</div>