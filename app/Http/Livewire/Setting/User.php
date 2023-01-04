<?php

namespace App\Http\Livewire\Setting;

use App\Models\User as ModelsUser;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class User extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public $name = '';
    public $surname = '';
    public $nick = '';
    public $password = '';
    public $password_confirmation = '';
    public $imageUrl = null;
    public $image = null;

    public function mount()
    {
        $this->name = auth()->user()->name;
        $this->surname = auth()->user()->surname;
        $this->nick = auth()->user()->nick;
    }

    public function render()
    {
        $this->reset('password', 'password_confirmation');
        return view('livewire.setting.user');
    }

    public function setData()
    {
        $data = [
            'name' => $this->name,
            'surname' =>$this->surname,
            'nick' => $this->nick,
            'image' => $this->image,
        ];

        $validate = Validator::make($data, [
            'name' => ['required', 'string', 'max:100'],
            'surname' => ['required', 'string', 'max:200'],
            'nick' => ['required', 'string', 'max:100'],
            'image' => ['image', 'max:1024'],
        ]);

        if($validate->fails()) {
            return $validate->validate();
        }

        $image = $this->image->store('public/users');
        $this->imageUrl = Storage::url($image);

        ModelsUser::where('id', auth()->user()->id)->update([
            'name' => $this->name,
            'surname' => $this->surname,
            'nick' => $this->nick,
            'image' => $this->imageUrl,
        ]);

        $this->alert('success', 'Your data is change !!');
    }

    public function setPassword()
    {
        $data = [
            'password' => $this->password,
            'password_confirmation' =>$this->password_confirmation
        ];

        $validate = Validator::make($data, [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'min:8', 'same:password'],
        ]);

        if($validate->fails()) {
            return $validate->validate();
        }

        ModelsUser::where('id', auth()->user()->id)->update(
            ['password' => Hash::make($this->password)]
        );

        $this->alert('success', 'Your password is change !!');
    }

    public function updatedImage($value) {
        $this->image = $value;
    }
}
