@extends('layouts.auth')
@section('content')
<div class="container">
        <div class="row">
            <div class="col s12 m6 offset-m3">
                <div class="card">
                    <div class="card-content">
                    
                        <div class="card-title center">{{ __('Giriş') }}</div>
    
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
    
                            <div class="form-field row">
                                <label for="email">{{ __('E-Mail Adresi') }}</label>
    
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
    
                            <div class="form-field row">
                                <label for="password">{{ __('Şifre') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
    
                            <div class="form-field row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <label class="form-check-label" for="remember">
                                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <span>{{ __('Beni hatırla') }}</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
    
                            <div class="form-group row mb-0 center">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Giriş') }}
                                    </button>
    
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Şifreni mi unuttun?') }}
                                        </a>
                                    @endif

                                    <a class="btn btn-link" href="{{ route('register') }}">
                                            {{ __('Üye Ol') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection