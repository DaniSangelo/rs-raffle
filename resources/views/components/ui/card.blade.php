@props([
    'href' => null,
])

<div class="h-full">
    @if ($href)
        <a href="{{ $href }}"
            {{ $attributes->class(['flex flex-col bg-white rounded-lg shadow-md p-8 dark:bg-gray-800 hover:shadow-gray-500 hover:shadow transition-shadow duration-300 h-full']) }}>
            {{ $slot }}
        </a>
    @else
        <div {{ $attributes->class(['bg-white rounded-lg shadow-md p-8 dark:bg-gray-800 h-full']) }}>
            {{ $slot }}
        </div>
    @endif
</div>