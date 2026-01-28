<?php

namespace App\Livewire\Raffle;

use App\Models\Raffle;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class Create extends Component
{
    public bool $modal = false;
    public string $name = '';

    #[On('raffle::create')]
    public function open(): void
    {
        $this->modal = true;
    }

    public function render(): View
    {
        return view('livewire.raffle.create');
    }

    public function handle(): void
    {
        Raffle::create([
            'name' => $this->name
        ]);
        $this->dispatch('raffle::refresh');
        $this->reset();
    }
}
