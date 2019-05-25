@extends('layouts.auth')

@section('content')
    <div class="row">
        <div class="col m6 offset-m3">
            <div class="card">
                <div class="card-title">{{ __('Doğrulama ') }}</div>

                <div class="card-content">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('E-mail adresine güncelleme linki yollandı.') }}
                        </div>
                    @endif

                    {{ __('Devam etmeden önce maillerinize bakın.') }}
                    {{ __('E-mail size ulaşmadıysa') }}, <a href="{{ route('verification.resend') }}">{{ __('buraya tıklayın.') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
