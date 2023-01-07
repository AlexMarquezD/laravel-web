<?php

namespace App\Http\Livewire\Comment;

use App\Models\Comment;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class InfoComment extends Component
{
    use LivewireAlert;

    public $comments = null;
    public $content = '';
    public $image_id = 0;

    public function render()
    {
        $this->preLoad();
        return view('livewire.comment.info-comment');
    }

    public function preLoad() {
        $this->comments = Comment::where('image_id', $this->image_id)->get();
    }

    public function saveComment() {
        $validate = Validator::make(['content' => $this->content], [
            'content' => ['string', 'max:200'],
        ]);

        if($validate->fails()) {
            return $validate->validate();
        }

        Comment::create([
            'user_id' => auth()->user()->id,
            'image_id' => $this->image_id,
            'content' => $this->content
        ]);

        $this->reset('content');

        $this->alert('success', 'Your comment has been created');
    }
}
