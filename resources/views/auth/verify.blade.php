@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col m6 offset-m3">
            <div class="card" style="padding: 20px;">
                <div class="card-body">
                    <h3>{{ __('Verify Your Email Address') }}</h3>
                    @if (session('resent'))
                        <script>
                            Materialize.toast('{{ __('A fresh verification link has been sent to your email address.') }}', 4000);
                        </script>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
