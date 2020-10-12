@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body" style="padding: 20px;">
                    <h3>{{ __('Dashboard') }}</h3>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    @if(Auth::user()->role_id === 1)
                        <a href="/admin" class="btn">Visit Dashboard</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
