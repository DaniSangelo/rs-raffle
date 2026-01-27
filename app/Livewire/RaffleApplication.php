<?php

namespace App\Livewire;

use App\Models\Applicant;
use App\Models\Raffle;
use Livewire\Component;

use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rule;

class RaffleApplication extends Component
{
    public ?string $email = null;
    public bool $success = false;
    public ?Raffle $raffle = null;

    // In a Livewire component, mount is the first method to be called when the component is initialized. It is simillar to __construct
    public function mount(): void
    {
        $this->raffle = Raffle::inRandomOrder()->first();
    }

    public function save(): void
    {
        $this->validate();
        Applicant::create([
            'raffle_id' => $this->raffle->id,
            'email' => $this->email,
        ]);
    }

    public function render(): View
    {
        return view('livewire.raffle-application');
    }

    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'email',
                Rule::unique('applicants', 'email')->where('raffle_id', $this->raffle->id),
            ]
        ];
    }
}