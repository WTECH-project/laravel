@props([
'label' => $label,
'name' => $name,
'placeholder' => $placeholder,
'options' => []
])

<div class="flex flex-col">
    <label class="text-left text-gray-500" for="{{ $name }}">{{ $label }}</label>
    <select class="
            border-2 
            border-gray-600 
            focus:outline-none 
            transition 
            duration-300 
            focus:border-black 
            px-4 
            py-3 
            mt-2
            @error($name)
            border-red-500
            @enderror" 
            id="{{ $name }}" 
            name="{{ $name }}">
        <option selected disabled hidden value="0">{{ $placeholder }}</option>

        @foreach($options as $key => $value)
        <option value={{ $key }}>{{ $value }}</option>
        @endforeach
    </select>

    @error($name)
    <div class='text-red-500 mt-2 text-sm'>
        {{ $message }}
    </div>
    @enderror
</div>