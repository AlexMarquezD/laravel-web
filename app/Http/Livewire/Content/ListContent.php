<?php

namespace App\Http\Livewire\Content;

use App\Models\Image;
use Carbon\Carbon;
use Livewire\Component;

class ListContent extends Component
{
    public $step = '';
    public $images = null;
    public $like = [];
    public $user = 0;

    public function render()
    {
        if ($this->step == 'home') {
            $this->images = Image::orderByDesc('id')->get();
        } else if ($this->step == 'profile') {
            $this->images = Image::where('user_id', $this->user)->orderByDesc('id')->get();
        }

        return view('livewire.content.list-content');
    }
}
