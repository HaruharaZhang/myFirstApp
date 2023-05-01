@extends('layouts.app')
@section('content')
<div class="container">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email">{{ __('Email') }}</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" />
            @error('email')
            <span>{{ $message }}</span>
            @enderror
        </div>

        <!-- Password -->
        <div>
            <label for="password">{{ __('Password') }}</label>
            <input id="password" type="password" name="password" required autocomplete="current-password" />
            @error('password')
            <span>{{ $message }}</span>
            @enderror
        </div>

        <!-- Remember Me -->
        <div>
            <label for="remember_me">
                <input id="remember_me" type="checkbox" name="remember">
                {{ __('Remember me') }}
            </label>
        </div>

        <div>
            @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
            @endif
            <button type="submit">{{ __('Log in') }}</button>
        </div>
    </form>
</div>
@endsection

@push('styles')
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        background-color: #f8f9fa;
    }

    .container {
        width: 100%;
        max-width: 450px;
        padding: 15px;
        margin: auto;
        background-color: white;
        box-shadow: 0 4px 6px 0 rgba(0, 0, 0, 0.1);
        border-radius: 4px;
    }

    h2 {
        text-align: center;
        margin-bottom: 24px;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button {
        background-color: #0069d9 !important;
        color: black;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        border-radius: 4px;
    }

    button:hover {
        background-color: #0069d9;
    }

    .forgot-password {
        float: right;
    }
</style>
@endpush