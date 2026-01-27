<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{
    #[Validate(['required', 'email'])]
    public ?string $email = null;

    #[Validate(['required', 'string'])]
    public ?string $password = null;

    public function render()
    {
        return view('livewire.auth.login');
    }

    public function handle(): void
    {
        $this->validate();

        if (Auth::attempt($this->only(['email', 'password']), true)) {
            $this->redirectRoute('home');
        }

        $this->addError('email', 'Invalid credentials');
    }
}
