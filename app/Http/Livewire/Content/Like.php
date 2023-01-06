<?php

namespace App\Http\Livewire\Content;

use App\Models\Like as ModelsLike;
use Livewire\Component;

class Like extends Component
{
    public $image = 0;
    public $like = 0;
    public $count = 0;

    public function render()
    {
        $this->like = ModelsLike::where('image_id', $this->image)->where('user_id', auth()->user()->id)->count();
        $this->count = ModelsLike::where('image_id', $this->image)->count();

        return view('livewire.content.like');
    }

    public function updateLike()
    {
        if ($this->like) {
            ModelsLike::where('image_id', $this->image)->where('user_id', auth()->user()->id)->delete();
        } else {
            ModelsLike::create([
                'image_id' => $this->image,
                'user_id' => auth()->user()->id
            ]);
        }
    }
}
