@extends('BrainsterLabs.layout.app')

@section('content')

<main>

    <div class="login d-flex align-items-center justify-content-center">
        <div class="w-responsible">
            <form action="{{ route('loginCheck') }}" method="POST">
                @csrf
                <label for="email" class="form-label d-block width mx-auto">Е-мејл</label>
                <input type="email" required class="form-control width mx-auto" id="email" name="email" value="{{ old('email') }}">
                @error('email')
                <small class="text-danger fw-bold width mx-auto d-block">{{ $message }}</small>
                @enderror
                <label for="password" class="form-label d-block width mx-auto mt-4">Пасворд</label>
                <input type="password" required class="form-control width mx-auto" id="password" name="password">
                @error('password')
                <small class="text-danger fw-bold width mx-auto d-block">{{ $message }}</small>
                @enderror
                <button type="submit" class="btn d-block width gold mx-auto mt-4">Логирај се</button>
            </form>
        </div>

    </div>

</main>

@endsection