<?php

namespace App\Livewire\Raffle;

use App\Models\Raffle;
use Livewire\Attributes\On;
use Livewire\Component;

class Destroy extends Component
{
    public bool $modal = false;
    public ?Raffle $raffle = null;

    #[On('raffle::destroy')]
    public function open(int $id): void
    {
        $this->modal = true;
        $this->raffle = Raffle::findOrFail($id);
    }

    public function handle(): void
    {
        $this->raffle->delete();
        $this->dispatch('raffle::refresh');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.raffle.destroy');
    }
}
