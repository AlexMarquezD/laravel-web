<div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Setting Account') }}</div>

                <div class="card-body">
                    <div>
                        @csrf
                        <div class="row mb-3">
                            <label for="name"
                                class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" value="{{ $name }}" wire:model="name"
                                    class="form-control @error('name') is-invalid @enderror" name="name" required
                                    autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="surname"
                                class="col-md-4 col-form-label text-md-right">{{ __('surname') }}</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" value="{{ $surname }}" wire:model="surname"
                                    class="form-control @error('surname') is-invalid @enderror" name="surname" required
                                    autocomplete="surname" autofocus>

                                @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nick"
                                class="col-md-4 col-form-label text-md-right">{{ __('nick') }}</label>

                            <div class="col-md-6">
                                <input id="nick" type="text" value="{{ $nick }}" wire:model="nick"
                                    class="form-control @error('nick') is-invalid @enderror" name="nick" required
                                    autocomplete="nick" autofocus>

                                @error('nick')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nick"
                                class="col-md-4 col-form-label text-md-right">{{ __('avatar') }}</label>

                            <div class="col-md-6">
                                @if (auth()->user()->image)
                                    <img class="img-avatar" src="{{$imageUrl ?? auth()->user()->image }}" alt="">
                                @endif
                                <input id="image" type="file" wire:model="image"
                                    class="form-control @error('image') is-invalid @enderror" name="image" required
                                    autocomplete="image" autofocus>

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0 mt-2">
                            <div class="col-md-8 offset-md-4">
                                <button wire:click="setData" class="btn btn-primary">
                                    {{ __('Update data') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('New Password') }}</div>

                <div class="card-body">
                    <div>
                        @csrf

                        <div class="row mb-3">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" wire:model.defer="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" wire:model.defer="password_confirmation" type="password"
                                    class="form-control" name="password_confirmation" required
                                    autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0 mt-2">
                            <div class="col-md-8 offset-md-4">
                                <button wire:click="setPassword" class="btn btn-primary">
                                    {{ __('Update password') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .img-avatar {
            width: 55px;
            margin-bottom: 15px;
        }
    </style>
</div>
