<?php

namespace App\Livewire\Raffle;

use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class Create extends Component
{
    public bool $modal = false;

    #[On('raffle::create')]
    public function open(): void
    {
        $this->modal = true;
    }

    public function render(): View
    {
        return view('livewire.raffle.create');
    }
}
