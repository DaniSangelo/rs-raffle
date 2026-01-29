<div class="grid grid-cols-1 m-3 md:grid-cols-3 gap-4">
    @foreach ($this->raffles as $raffle)
        <x-ui.card href="{{ route('raffle', $raffle) }}">
            <h1 class="text-lg font-bold mb-4">
                {{ $raffle->id }} - {{ $raffle->name }}
            </h1>

            <div class="h-full flex flex-col justify-between space-y-4">
                <p class="text-sm ">
                    {{ $raffle->applicants_count }} participants
                </p>
                <p class="text-sm ">
                    {{ $raffle->winners_count }} winners
                </p>

                <x-ui.button>
                    Join Now
                </x-ui.button>
            </div>
        </x-ui.card>
    @endforeach
</div>