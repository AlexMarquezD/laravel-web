<?php

namespace App\Http\Livewire\Content;

use App\Models\Image;
use App\Models\Like;
use Livewire\Component;

class ListContent extends Component
{
    public $step = '';
    public $images = null;
    public $like = [];
    public $user = 0;

    protected $listeners = [
        'render' => 'render',
    ];

    public function render()
    {
        $this->preLoad();
        return view('livewire.content.list-content');
    }

    public function preLoad()
    {
        if ($this->step == 'home') {
            $this->images = Image::orderByDesc('id')->get();
        } else if ($this->step == 'profile') {
            $this->images = Image::where('user_id', $this->user)->orderByDesc('id')->get();
        }
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
