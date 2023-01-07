<?php

namespace App\Http\Livewire\Image;

use App\Models\Image;
use Livewire\Component;

class InfoImage extends Component
{
    public $image_id = 0;
    public $image = null;

    public function render()
    {
        $this->image = Image::find($this->image_id);
        return view('livewire.image.info-image');
    }
}
