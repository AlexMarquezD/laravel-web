@extends('layouts.auth.app')
@section('title')
    Profile
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @livewire('content.list-content', ['step' => 'profile', 'user' => $user])
            </div>
        </div>
    </div>
@endsection