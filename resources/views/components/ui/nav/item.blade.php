@props(['route'])

<li>
    <a href="{{ route($route) }}" wire:navigate
        {{ $attributes->class([
            'text-gray-600 hover:text-gray-800 rounded-lg py-2 px-4 text-xs font-bold dark:hover:text-gray-300',
            'bg-white dark:bg-gray-950' => request()->routeIs($route),
        ]) }}>
        {{ $slot }}
    </a>
</li>