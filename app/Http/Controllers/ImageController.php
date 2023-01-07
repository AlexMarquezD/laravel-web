<?php

namespace App\Http\Controllers;

class ImageController extends Controller
{
    public function viewImage($image)
    {
        return view('image.index', ['image' => $image]);
    }
}
