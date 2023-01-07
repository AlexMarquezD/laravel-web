@extends('layouts.auth.app')
@section('title')
    Image
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @livewire('image.info-image', ['image_id' => $image])
            </div>
        </div>
    </div>
@endsection
