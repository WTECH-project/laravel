@props([
'name' => $name,
'label' => $label,
'value' => old($name),
'rows' => 4,
'cols' => 50
])

<div {{ $attributes->merge(['class' => 'flex flex-col']) }}>
    <label class="text-left text-gray-500" for="{{ $name }}">{{ $label }}</label>
    <textarea class="
        bg-white border-2 
        border-gray-600 
        focus:outline-none 
        transition
        duration-300 
        focus:border-black
        px-4 
        py-3
        mt-2
        w-full
        @error($name)
        border-red-500
        @enderror" 
        id="{{ $name }}" 
        name="{{ $name }}"
        rows="{{ $rows }}"
        cols="{{ $cols }}"
    >{{ $value }}</textarea>

    @error($name)
    <div class='text-red-500 mt-2 text-sm'>
        {{ $message }}
    </div>
    @enderror
</div>