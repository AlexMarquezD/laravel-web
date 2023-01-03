<div>
    @section('title')
        Web-laravel
    @endsection
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">

            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a class="nav-link" wire:click="options('login')">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item" wire:click="options('register')">
                            <a class="nav-link">{{ __('Register') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="mt-5" wire:ignore.self>
            @if ($option === 'login')
                @livewire('sessions.login')
            @elseif($option === 'register')
                @livewire('sessions.register')
            @endif
        </div>
    </div>
</div>
