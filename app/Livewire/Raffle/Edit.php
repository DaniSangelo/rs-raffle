<?php

namespace App\Livewire\Raffle;

use App\Models\Raffle;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Edit extends Component
{
    public bool $modal = false;
    public ?int $id = null;

    #[Validate(['required', 'string', 'min:5', 'max:255', 'unique:raffles,name'])]
    public string $name = '';

    #[On('raffle::edit')]
    public function open(int $id): void
    {
        $this->modal = true;
        $raffle = Raffle::findOrFail($id);
        $this->id = $raffle->id;
        $this->name = $raffle->name;
    }

    public function handle(): void
    {
        $this->validate();
        Raffle::where('id', $this->id)->update(['name' => $this->name]);
        $this->dispatch('raffle::refresh');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.raffle.edit');
    }
}
