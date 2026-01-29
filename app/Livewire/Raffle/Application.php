<?php

namespace App\Livewire\Raffle;

use App\Models\Applicant;
use App\Models\Raffle;
use Livewire\Component;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Computed;

class Application extends Component
{
    public ?string $email = null;
    public bool $success = false;
    public ?Raffle $raffle = null;

    // In a Livewire component, mount is the first method to be called when the component is initialized. It is simillar to __construct
    public function mount(Raffle $raffle): void
    {
        $this->authorize('onlyPublished', $raffle);
        $this->raffle = $raffle;
    }

    public function save(): void
    {
        $this->validate();
        Applicant::create([
            'raffle_id' => $this->raffle->id,
            'email' => $this->email,
        ]);
        $this->success = true;
    }

    public function render(): View
    {
        return view('livewire.raffle.application');
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

    #[Computed]
    public function participants(): Collection
    {
        return $this->raffle
            ->applicants()
            ->get()
            ->map(fn($applicant) => preg_replace('/(?<=.{2}).(?=.*@)/u', '*', $applicant->email));
    }
}