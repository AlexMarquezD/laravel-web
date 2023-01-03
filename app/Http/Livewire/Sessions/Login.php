<?php

namespace App\Http\Livewire\Sessions;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $data = [];

    public function render()
    {
        return view('livewire.sessions.login');
    }

    public function login()
    {
        $this->validate([
            'data.email' => 'required|email',
            'data.password' => 'required'
        ]);

        if (Auth::attempt(['email' => $this->data['email'], 'password' => $this->data['password']])) {
            return redirect()->intended('/');
        }

        $this->addError('email', 'Estas credenciales no coinciden con nuestros registros.');
    }
}
