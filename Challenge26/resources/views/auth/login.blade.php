@extends('matches.layout.app')

@section('content')

<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <h4 class="border-bottom border-light-subtle p-3 bg-light fs-5">Login</h4>


    <form method="POST" action="{{ route('login') }} " class="p-5">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="form-label" />
            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />

            @error('email')
            <small class="text-danger fw-bold d-block mt-1">{{ $message }}</small>
            @enderror
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="form-label" />

            <x-text-input id="password" class="form-control"
                type="password"
                name="password"
                required autocomplete="current-password" />

            @error('password')
            <small class="text-danger fw-bold d-block mt-1">{{ $message }}</small>
            @enderror

        </div>

        <!-- Remember Me -->

        <div class="my-4">
            <div class="d-inline me-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>
            @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
            @endif

        </div>
        <button type="submit" class="btn btn-primary">Log in</button>
    </form>
</x-guest-layout>

@endsection