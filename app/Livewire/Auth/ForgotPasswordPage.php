<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class ForgotPasswordPage extends Component
{
    public $email = '';

    public function sendLink()
    {
        $this->validate([
            'email' => ['required', 'email'],
        ]);

        $status = Password::sendResetLink([
            'email' => $this->email,
        ]);

        return $status === Password::RESET_LINK_SENT
            ? session()->flash('status', __($status))
            : $this->addError('email', __($status));
    }

    public function render()
    {
        return view('livewire.auth.forgot-password-page');
    }
}
