@extends('forum.layout.app')

@section('content')

<x-guest-layout>
    <h2 class="border-bottom border-light-subtle p-3 bg-light fs-5">Register</h2>

    <form method="POST" action="{{ route('register') }}" class="mx-5 my-4">
        @csrf

        <!-- Name -->
        <div class="ms-2">
            <div class="d-flex align-items-center justify-content-center">
                <x-input-label for="name" :value="__('Name')" class="d-inline me-3" />
                <x-text-input id="name" class="d-inline mt-1 w-50" type="text" name="name" :value="old('name')" autofocus autocomplete="name" />
            </div>
            <x-input-error :messages="$errors->get('name')" class="mt-2 mx-auto text-center  w-50 d-block" />
        </div>

        <!-- Email Address -->
        <div class="mt-4 ms-2">
            <div class="d-flex align-items-center justify-content-center">

                <x-input-label for="email" :value="__('Email')" class="d-inline me-3" />
                <x-text-input id="email" class="d-inline mt-1 w-50" type="email" name="email" :value="old('email')" autocomplete="username" />
            </div>

            <x-input-error :messages="$errors->get('email')" class="mt-2 mx-auto text-center  w-50 d-block" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <div class="d-flex align-items-center justify-content-center">

                <x-input-label for="password" :value="__('Password')" class="d-inline me-3" />

                <x-text-input id="password" class="d-inline mt-1 w-50"
                    type="password"
                    name="password"
                    autocomplete="new-password" />
            </div>


            <x-input-error :messages="$errors->get('password')" class="mt-2 mx-auto text-center  w-50 d-block" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4 pe-5 me-5">
            <div class="d-flex align-items-center justify-content-center">

                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="d-inline me-3" />

                <x-text-input id="password_confirmation" class="d-inline mt-1 w-50"
                    type="password"
                    name="password_confirmation" autocomplete="new-password" />
            </div>


            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 mx-auto text-center  w-50 d-block" />
        </div>

        <div class="flex items-center justify-start mt-4 w-50 mx-auto">
            <button type="submit" class="ms-5 btn btn-primary d-block">
                {{ __('Register') }}
            </button>
        </div>
    </form>
</x-guest-layout>

@endsection