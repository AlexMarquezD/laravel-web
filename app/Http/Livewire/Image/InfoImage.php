<?php

namespace App\Http\Livewire\Image;

use App\Models\Image;
use App\Models\Like;
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

    public function updateLike($image)
    {
        $like = Like::where('image_id', $image)->where('user_id', auth()->user()->id)->count();
        if ($like) {
            Like::where('image_id', $image)->where('user_id', auth()->user()->id)->delete();
        } else {
            Like::create([
                'image_id' => $image,
                'user_id' => auth()->user()->id
            ]);
        }
    }
}
