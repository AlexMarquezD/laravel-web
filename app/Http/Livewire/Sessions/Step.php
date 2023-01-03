<?php

namespace App\Http\Livewire\Sessions;

use Livewire\Component;

class Step extends Component
{
    public $option = 'login';

    public function render()
    {
        return view('livewire.sessions.step');
    }

    public function options($value) {
        $this->option = $value;
    }
}
