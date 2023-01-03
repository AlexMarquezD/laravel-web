<?php

namespace App\Http\Livewire\Sessions;

use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Register extends Component
{
    use LivewireAlert;

    public $data = [];

    public function render()
    {
        return view('livewire.sessions.register');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:100'],
            'surname' => ['required', 'string', 'max:200'],
            'nick' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'min:8', 'same:password'],
        ]);
    }

    function create()
    {
        $validate = $this->validator($this->data);
        
        if($validate->fails()) {
            $validate->validate();
        }
        
        User::create([
            'role' => 'user',
            'name' => $this->data['name'],
            'surname' => $this->data['surname'],
            'nick' => $this->data['nick'],
            'email' => $this->data['email'],
            'password' => Hash::make($this->data['password']),
            'image' => null,
        ]);
        
        $this->alert('success', 'su cuenta a sido creada con exito.');
    }
}
