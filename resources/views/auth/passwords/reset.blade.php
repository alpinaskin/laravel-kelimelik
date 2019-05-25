@extends('layouts.main')

@section('content')
    <div class="row ">
        <div class="col s12 m6 offset-m3">
            <div class="card">
                <div class="card-title center">{{ __('Şifreyi Sıfırla') }}</div>

                <div class="card-content">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-field row">
                            <label for="email">{{ __('E-Mail Adresi') }}</label>

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-field row">
                            <label for="password">{{ __('Şifre') }}</label>
                                <input id="password" type="password" @error('password') is-invalid @enderror name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-field row">
                            <label for="password-confirm">{{ __('Şifreyi Onayla') }}</label>
                                <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="form-field row">
                            <div class="center">
                                <button type="submit" class="btn">
                                    {{ __('Şifreyi Sıfırla') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
