@props([
'type' => $type,
'name' => $name,
'label' => $label,
'price' => $price
])
<div>
    <div class="flex p-4 flex-row items-center justify-between">
        <div class="flex items-center justify-center gap-4">
            <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" {{$attributes}}>
            <label for="{{ $name }}">{{ $label }}</label>
        </div>
        <span>{{ $price }}</span>
    </div>
    
    @error($name)
    <div class='text-red-500 mt-2 text-sm'>
        {{ $message }}
    </div>
    @enderror
</div>