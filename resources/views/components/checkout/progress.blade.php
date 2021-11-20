@props([
    'span' => $span,
    'label' => $label
])

<li class="w-1/6 p-4">
    <div class="flex items-center justify-start flex-col text-xs sm:text-base">
        <div class="rounded-full h-12 w-12 flex items-center justify-center border-2 border-gray-600">
            <span>{{ $span }}</span>
        </div>
        <div class="rounded-full h-12 w-12 bg-black flex items-center justify-center border-2 border-gray-600 hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
        </div>
        {{ $label }}
    </div>
</li>
