<div>
    <h1 class="text-2xl font-bold">Raffle app: {{ $raffle->name }}</h1>
    @if ($success)
        <div class="flex flex-col items-center justify-center p-4 bg-green-100 border rounded-lg border-green-300">
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
    <br/>

    <div class="border border-gray-200 rounded-lg p-4 dark:border-gray-800">
        <h3 class="text-lg font-medium text-gray-800 mb-4 dark:text-gray-300">Participants</h3>
        <ul>
            @foreach ($this->participants as $applicant)
                <li>{{ $applicant }}</li>
            @endforeach
        </ul>
    </div>

    <br/>

    <button wire:click="getWinner" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Draw winner</button>
    @if ($winner)
        <p>Winner: <span class="font-bold">{{ $winner }}</span></p>
    @endif
</div>