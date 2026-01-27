<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{
    #[Validate(['required', 'email'])]
    public ?string $email = null;

    #[Validate(['required', 'string'])]
    public ?string $password = null;

    private const MAX_ATTEMPTS = 5;
    private const DECAY_SECONDS = 60;

    public function render()
    {
        return view('livewire.auth.login');
    }

    public function handle(): void
    {
        $this->validate();
        $this->ensureIsNotRatelimited();

        if (Auth::attempt($this->only(['email', 'password']), true)) {
            RateLimiter::clear($this->rateKey());
            Session::regenerate();
            $this->redirectRoute('home');
        }

        $this->addError('email', 'Invalid credentials');
    }

    private function rateKey(): string
    {
        return str($this->email . '|' . request()->ip())
            ->replace('@', '_at_')
            ->replace('.', '_')
            ->slug();
    }

    private function ensureIsNotRatelimited(): void
    {
        if (RateLimiter::tooManyAttempts($this->rateKey(), self::MAX_ATTEMPTS)) {
            $seconds = RateLimiter::availableIn($this->rateKey());
            throw ValidationException::withMessages([
                'email' => 'Too many login attempts. Please try again in ' . $seconds . ' seconds.',
            ]);
        }

        RateLimiter::hit($this->rateKey(), self::DECAY_SECONDS);
    }
}
