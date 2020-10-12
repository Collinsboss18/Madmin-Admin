@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col m6 offset-m3">
            <div class="card">
                <div class="card-body" style="padding: 20px;">
                    <h3>{{ __('Login') }}</h3>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="input-field">
                            <div class="col-md-6">
                                <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <label for="email">{{ __('E-Mail Address') }}</label>
                            </div>
                        </div>

                        <div class="input-field">
                            <div class="col-md-6">
                                <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                <label for="password">{{ __('Password') }}</label>
                            </div>
                        </div>

                        <p class="">
                            <input type="checkbox" class='filled-in' name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </p>

                        <div class="input-field">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
