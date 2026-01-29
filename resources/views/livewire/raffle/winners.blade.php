<div class="relative flex flex-col items-center justify-center p-4 bg-blue-100 dark:bg-blue-900 border border-blue-400 dark:border-blue-600 rounded-lg">
    @can('drawWinner', $raffle)
        <x-ui.button wire:click="toggleShow" class="absolute top-2 right-2">
            @if ($show)
                Hide Winners
            @else
                Show Winners
            @endif
        </x-ui.button>
    @endcan

    <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">The winner is:</h1>
    @foreach($this->winners as $winner)
        <p class="mt-2 text-gray-700 dark:text-gray-300">{{ $winner }}</p>
    @endforeach
</div>