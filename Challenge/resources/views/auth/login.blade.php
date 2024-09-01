@extends('forum.layout.app')

@section('content')

<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show mt-1 my-5 px-3 mx-auto alerts" role="alert">
        <p class="fw-bold m-0 p-0 text-danger">{{ session('error') }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif


    <h2 class="border-bottom border-light-subtle p-3 bg-light fs-5">Login</h2>


    <form method="POST" action="{{ route('login') }}" class="mx-5 my-4">
        @csrf



        <!-- Email Address -->
        <div class="ms-4">
            <div class="d-flex align-items-center justify-content-center">
                <x-input-label for="email" :value="__('Email')" class="d-inline me-3" />
                <x-text-input id="email" class="d-inline mt-1 w-50" type="email" name="email" :value="old('email')" autofocus autocomplete="username" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2 mx-auto text-center  w-50 d-block" />
        </div>

        <!-- Password -->
        <div class="mt-4 ms-2">
            <div class="d-flex align-items-center justify-content-center">

                <x-input-label for="password" :value="__('Password')" class="d-inline me-3" />

                <x-text-input id="password" class="d-inline mt-1 w-50"
                    type=" password"
                    name="password"
                    autocomplete="current-password" />
            </div>


            <x-input-error :messages="$errors->get('password')" class="mt-2 mx-auto text-center  w-50 d-block" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4 w-50  text-end">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="border-black-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-black-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-center mt-4">
            <button type="submit" class="me-3 btn btn-primary">
                {{ __('Login') }}
            </button>

            @if (Route::has('password.request'))
            <a class=" text-sm text-primary hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
            @endif


        </div>
    </form>

</x-guest-layout>

@endsection