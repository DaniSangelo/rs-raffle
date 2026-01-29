<div>
    <h1 class="text-2xl font-bold mb-4">Raffle Application :: {{ $raffle->name }}</h1>
    @if ($success)
        <div class="flex flex-col items-center justify-center p-4 bg-green-700 border rounded-lg border-green-300">
            <h1 class="text-2xl font-bold">Thank you for your submisstion</h1>
            <p class="mt-2">We will contact you soon.</p>
        </div>
    @else
        <form wire:submit="save">
            <x-ui.input 
                label="Enter your email" 
                name="email" 
                wire:model="email"
            />
            <x-ui.button type="submit" class="mt-4">Submit</x-ui.button>
        </form>
    @endif

    <br>

    <div class="border border-gray-200 dark:border-gray-800 rounded-lg p-4">
        <h3 class="text-lg font-medium text-gray-800 dark:text-gray-300 mb-4">Participants</h3>
        <ul class="divide-y divide-gray-100">
            @foreach($this->participants as $participant)
                <li class="py-2 px-2 hover:bg-gray-50 dark:hover:bg-gray-900">{{ $participant }}</li>
            @endforeach
        </ul>
    </div>

    <br>

    @if ($this->winners)
        <livewire:raffle.winners :raffle="$raffle" />
    @endif

    @can('drawWinner', $raffle)
        <x-ui.button  type="button" wire:click="getWinner" class="mt-4">Draw the winner</x-ui.button>
        <x-ui.error name="error" />
    @endcan
</div>