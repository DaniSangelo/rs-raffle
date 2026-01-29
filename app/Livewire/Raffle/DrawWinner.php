<?php

namespace App\Livewire\Raffle;

use Livewire\Component;

use App\Models\Raffle;
use Livewire\Attributes\Computed;

class DrawWinner extends Component
{
    public ?Raffle $raffle = null;
    public ?string $winner = null;

    public function render()
    {
        return view('livewire.raffle.draw-winner');
    }

    public function handle()
    {
        $this->authorize('drawWinner', $this->raffle);

        if ($this->raffle->applicants()->count() < 2) {
            $this->addError('error', 'There must be at least 2 applicants to draw a winner.');
            return;
        }

        $winner = $this->raffle->applicants()
            ->whereNotIn('id', $this->raffle->winners()->pluck('applicant_id'))
            ->inRandomOrder()
            ->first();

        if (!$winner) {
            $this->addError('error', 'No more participants available for draw');
            return;
        }

        $this->winner = $winner->email;
        $this->raffle->winners()->create([
            'applicant_id' => $winner->id,
        ]);

        $this->dispatch('winners::refresh')->to('raffle.winners');
    }

    #[Computed]
    public function winners(): int
    {
        return $this->raffle->winners()->count();
    }
}