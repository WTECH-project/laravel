@props([
    'title' => $title,
    'description' => $description    
])

<header {{ $attributes->merge(['class' => 'max-w-md mx-auto px-8 text-center']) }}>
    <h1 class="font-bold text-4xl">{{ $title }}</h1>
    <p class="mt-4 text-sm text-gray-500">{{ $description }}</p>
</header>