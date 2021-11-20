@props([
    'h2' => $h2,
    'label1' => $label1,
    'label2' => $label2
])

<div>
    <h2 class="font-bold text-2xl mt-4">{{ $h2 }}</h2>
    <div>
        <span class="text-gray-500">{{ $label1 }}</span>
        <span class="text-gray-500 ml-4">{{ $label2 }}</span>
    </div> 
</div>