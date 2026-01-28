<?php

namespace App\Livewire\Raffle;

use App\Models\Raffle;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Edit extends Component
{
    public bool $modal = false;
    public ?Raffle $raffle = null;

    
    #[On('raffle::edit')]
    public function open(int $id): void
    {
        $this->modal = true;
        $this->raffle = Raffle::findOrFail($id);
    }

    public function rules(): array
    {
        return [
            'raffle.name' => ['required', 'string', 'min:5', 'max:255', 'unique:raffles,name' . $this->raffle->id]
        ];
    }

    public function handle(): void
    {
        $this->validate();
        /*
            Because legacy model binding feature flag is enabled and I'm using it, Livewire will update the model automatically.
            Then I just need to save the model
        */
        $this->raffle->save();
        $this->dispatch('raffle::refresh');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.raffle.edit');
    }
}
