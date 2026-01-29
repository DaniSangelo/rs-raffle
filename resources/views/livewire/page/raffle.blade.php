<div>

    <h1 class="text-2xl font-bold mb-4">Raffle :: {{ $raffle->name }}</h1>
    <livewire:raffle.application :raffle="$raffle" />
    <livewire:raffle.winners :raffle="$raffle" />
    <livewire:raffle.draw-winner :raffle="$raffle" />
</div>