<?php

namespace App\Livewire\Raffle;

use Livewire\Component;

use App\Models\Raffle;

class DrawWinner extends Component
{
    public ?Raffle $raffle = null;

    public function render()
    {
        return view('livewire.raffle.draw-winner');
    }
}