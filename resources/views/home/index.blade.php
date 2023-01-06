@extends('layouts.auth.app')
@section('title')
    Home
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @livewire('content.list-content', ['step' => 'home'])
            </div>
        </div>
    </div>
@endsection
