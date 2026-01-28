<?php

namespace App\Livewire\Raffle;

use App\Models\Raffle;
use Livewire\Attributes\On;
use Livewire\Component;

class Publish extends Component
{
    public bool $modal = false;
    public ?Raffle $raffle = null;

    #[On('raffle::publish')]
    public function open(int $id): void
    {
        $this->modal = true;
        $this->raffle = Raffle::findOrFail($id);
    }

    public function handle(): void
    {
        $this->raffle->update(['published_at' => now()]);
        $this->dispatch('raffle::refresh');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.raffle.publish');
    }
}
