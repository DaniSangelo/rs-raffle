<?php

namespace App\Livewire\Raffle;

use App\Models\Raffle;
use Livewire\Attributes\On;
use Livewire\Component;

class Publish extends Component
{
    public bool $modal = false;
    public ?int $id = null;

    #[On('raffle::publish')]
    public function open(int $id): void
    {
        $this->modal = true;
        $raffle = Raffle::findOrFail($id);
        $this->id = $raffle->id;

    }

    public function handle(): void
    {
        Raffle::where('id', $this->id)
            ->update(['published_at' => now()]);

        $this->dispatch('raffle::refresh');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.raffle.publish');
    }
}
