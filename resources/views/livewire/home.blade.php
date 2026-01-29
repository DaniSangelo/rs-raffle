<div>
    @foreach($this->raffles as $raffle)
        <a class="hover:underline hover:text-blue-400" href="{{ route('raffle.application', $raffle) }}">
            {{ $raffle->id }} - {{ $raffle->name }}
        </a>
        <br>
    @endforeach
</div>