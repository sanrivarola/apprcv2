<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class LoginPage extends Component
{
    public $name = '';
    public $password = '';
    public $remember = false;

    protected $rules = [
        'name'     => ['required', 'string'],
        'password' => ['required'],
    ];

    public function authenticate()
    {
        $this->validate();

        $user = User::where('name', $this->name)->first();

        if (! $user || ! Hash::check($this->password, $user->password)) {
            $this->addError('name', 'Credenciales incorrectas.');
            return;
        }

        if (! $user->active) {
            $this->addError('name', 'Tu cuenta está desactivada.');
            return;
        }

        Auth::login($user, $this->remember);

        return redirect()->intended(route('dashboard'));
    }

    public function render()
    {
        return view('livewire.auth.login-page');
    }
}
