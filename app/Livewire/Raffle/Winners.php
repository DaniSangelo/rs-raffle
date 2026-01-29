<?php

namespace App\Livewire\Raffle;

use App\Models\Raffle;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class Winners extends Component
{
    public Raffle $raffle;
    public bool $show = true;

    #[On('winners::refresh')]
    public function render()
    {
        return view('livewire.raffle.winners');
    }

    #[Computed]
    public function winners(): Collection
    {
        return $this->raffle->winners()
            ->with('applicant')
            ->get()
            ->map(fn($winner) => 
                $this->show
                    ? $winner->applicant->email
                    : preg_replace("/(?<=.{2}).(?=.*@)/u", '*', $winner->applicant->email)
            );
    }

    public function toggleShow():void
    {
        $this->show = !$this->show;
    }
}
