<?php

namespace App\Livewire\Raffle;

use Livewire\Component;

use App\Models\Raffle;
use Livewire\Attributes\Computed;

class DrawWinner extends Component
{
    private const DELAY = 80000;
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

        $this->rulete();
        $this->getWinner();
    }

    #[Computed]
    public function winners(): int
    {
        return $this->raffle->winners()->count();
    }

    public function getWinner(): void
    {
        $winners = $this->raffle->winners->pluck('applicant_id')->toArray();
        $winner = $this->raffle->applicants()
            ->whereNotIn('id', $winners)
            ->inRandomOrder()
            ->first();

        if (!$winner) {
            $this->addError('winner', 'No more participants available for the draw.');
            return;
        }
        $this->raffle->winners()->create([
            'applicant_id' => $winner->id
        ]);
        $this->winner = $winner->email;
        $this->dispatch('winners::refresh')->to('raffle.winners');
    }

    public function rulete(): void
    {
        $applicants = $this->raffle->applicants()
            ->inRandomOrder()
            ->pluck('email');

        foreach($applicants as $email) {
            usleep(self::DELAY);
            $this->stream('winner', $email, true);
        }
    }
}