<?php

namespace App\Http\Livewire\Image\Modals;

use App\Models\Image as ModelsImage;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class Image extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public $description = '';
    public $image = null;
    public $iteration = 0;

    public function render()
    {
        return view('livewire.image.modals.image');
    }

    public function saveImage()
    {
        $data = [
            'description' => $this->description,
            'image' => $this->image,
        ];

        $validate = Validator::make($data, [
            'description' => ['string', 'max:200'],
            'image' => ['image', 'max:1024'],
        ]);
        
        if($validate->fails()) {
           return $validate->validate();
        }

        $image = $this->image->store('public/albums');
        $imageUrl = Storage::url($image);

        ModelsImage::create([
            'user_id' => auth()->user()->id,
            'description' => $this->description,
            'image_path' => $imageUrl,
        ]);

        $this->alert('success', 'Saved image!!');
        $this->image = null;
        $this->iteration ++;
        $this->reset('description');
    }
}
