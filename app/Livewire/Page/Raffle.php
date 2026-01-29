<?php

namespace App\Livewire\Page;

use App\Models\Raffle as ModelsRaffle;
use Livewire\Component;

class Raffle extends Component
{
    public ?ModelsRaffle $raffle = null;

    // In a Livewire component, mount is the first method to be called when the component is initialized. It is simillar to __construct
    public function mount(ModelsRaffle $raffle): void
    {
        $this->authorize('onlyPublished', $raffle);
        $this->raffle = $raffle;
    }

    public function render()
    {
        return view('livewire.page.raffle');
    }

}
