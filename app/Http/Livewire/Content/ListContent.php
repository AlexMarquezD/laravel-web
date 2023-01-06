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

    public function render()
    {
        $this->images = Image::orderByDesc('id')->get();

        return view('livewire.content.list-content');
    }
}
