@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col m6 offset-m3">
            <div class="card">
                <div class="card-title">{{ __('Verify Your Email Address') }}</div>

                <div class="card-content">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
