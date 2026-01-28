<?php

namespace App\Livewire\Raffle;

use App\Models\Raffle;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Create extends Component
{
    public bool $modal = false;

    #[Validate(['required', 'string', 'min:5', 'max:255', 'unique:raffles,name'])]
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
        $this->validate();
        Raffle::create([
            'name' => $this->name
        ]);
        $this->dispatch('raffle::refresh');
        $this->reset();
    }
}
