@extends('layouts.auth')
@section('content')
        <div class="row">
            <div class="col s12 m4 offset-m4">
                <div class="card">
                    <div class="card-content">
                    <div class="card-title center">{{ __('Üye Ol') }}</div>
    
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
    
                            <div class="form-field row">
                                <label for="name">{{ __('İsim') }}</label>

                                    <input id="name" type="text" class="form-field @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
    
                            <div class="form-field row">
                                <label for="email">{{ __('E-Mail Adresi') }}</label>
                                <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
    
                            <div class="form-field row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Şifre') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
    
                            <div class="form-field row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Şifre Onay') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">   
                            </div>
    
                            <div class="form-field row mb-0">
                                <div class="col m6 offset-m4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Üye Ol') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection