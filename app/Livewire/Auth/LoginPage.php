<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class LoginPage extends Component
{
    public $email = '', $password = '', $remember = false;

    protected $rules = [
        'email'    => ['required', 'email'],
        'password' => ['required'],
    ];

    public function authenticate()
    {
        $this->validate();

        $user = User::where('email', $this->email)->first();

        if (! $user || ! Hash::check($this->password, $user->password)) {
            $this->addError('email', 'Credenciales incorrectas.');
            return;
        }

        if (! $user->active) {
            $this->addError('email', 'Tu cuenta está desactivada.');
            return;
        }

        Auth::login($user, $this->remember);

        return redirect()->intended(route('dashboard'));
    }

    public function render()
    {
        return view('livewire.auth.login-page'); // sólo el div raíz con el form
    }
}
