 <div class="container mt-5">
     <div class="row justify-content-center">
         <div class="col-md-8">
             <div class="card">
                 <div class="card-header">{{ __('Register') }}</div>

                 <div class="card-body">
                     <div>
                         @csrf
                         <div class="row mb-3">
                             <label for="name"
                                 class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                             <div class="col-md-6">
                                 <input id="name" type="text" wire:model="data.name"
                                     class="form-control @error('name') is-invalid @enderror" name="name"
                                     value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                                 <input id="surname" type="text" wire:model="data.surname"
                                     class="form-control @error('surname') is-invalid @enderror" name="surname"
                                     value="{{ old('surname') }}" required autocomplete="surname" autofocus>

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
                                 <input id="nick" type="text" wire:model="data.nick"
                                     class="form-control @error('nick') is-invalid @enderror" name="nick"
                                     value="{{ old('nick') }}" required autocomplete="nick" autofocus>

                                 @error('nick')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                             </div>
                         </div>

                         <div class="row mb-3">
                             <label for="email"
                                 class="col-md-4 col-form-label text-md-right">{{ __('Email Address') }}</label>

                             <div class="col-md-6">
                                 <input id="email" type="email" wire:model="data.email"
                                     class="form-control @error('email') is-invalid @enderror" name="email"
                                     value="{{ old('email') }}" required autocomplete="email">

                                 @error('email')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                             </div>
                         </div>

                         <div class="row mb-3">
                             <label for="password"
                                 class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                             <div class="col-md-6">
                                 <input id="password" type="password" wire:model="data.password"
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
                                 <input id="password-confirm" wire:model="data.password_confirmation" type="password"
                                     class="form-control" name="password_confirmation" required
                                     autocomplete="new-password">
                             </div>
                         </div>

                         <div class="form-group row mb-0 mt-2">
                             <div class="col-md-8 offset-md-4">
                                 <button wire:click="create" class="btn btn-primary">
                                     {{ __('Register') }}
                                 </button>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
