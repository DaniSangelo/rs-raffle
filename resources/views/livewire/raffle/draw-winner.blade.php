<div>
    @can('drawWinner', $raffle)
        <x-ui.error name="winner" />
        <x-ui.button  type="button" wire:click="handle" class="mt-4">Draw the winner</x-ui.button>
        @if($winner)
            <x-ui.card class="mt-4 flex items-center align-middle justify-center font-bold text-2xl">
                <div wire:stream="winner">
                    {{ $winner }}
                </div>
            </x-ui.card>
        @endif
    @endcan
</div>