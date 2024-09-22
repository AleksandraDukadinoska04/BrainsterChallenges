@extends('matches.layout.app')

@section('content')


<x-guest-layout>

    <h4 class="border-bottom border-light-subtle p-3 bg-light fs-5">Register</h4>

    <form method="POST" action="{{ route('register') }}" class="p-5">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" class="form-label" />
            <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />

            @error('name')
            <small class="text-danger fw-bold d-block mt-1">{{ $message }}</small>
            @enderror
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" class="form-label" />
            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" />

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
                required autocomplete="new-password" />


            @error('password')
            <small class="text-danger fw-bold d-block mt-1">{{ $message }}</small>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="form-label" />

            <x-text-input id="password_confirmation" class="form-control"
                type="password"
                name="password_confirmation" required autocomplete="new-password" />


            @error('password_confirmation')
            <small class="text-danger fw-bold d-block mt-1">{{ $message }}</small>
            @enderror
        </div>

        <div class="flex items-center justify-end mt-4">

            <button type="submit" class="btn btn-primary me-2">Register</button>

            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
        </div>
    </form>
</x-guest-layout>

@endsection