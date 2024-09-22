@extends('matches.layout.app')

@section('content')
<main>

    <div class="bg-white border border-light-subtle rounded border-2 w-50 mx-auto mt-5">
        <h4 class="border-bottom border-light-subtle p-3 bg-light fs-5">Create new Match</h4>

        <form action="{{ route('matches.create') }}" method="POST" class="p-3">
            @csrf
            <div class="mb-3">
                <label for="home_team" class="form-label">Home Team</label>

                <select name="home_team" id="home_team">
                    <option value="" selected disabled>Choose a home team</option>
                    @foreach($teams as $team)
                    <option value="{{ $team->id }}" {{ $team->id === old('home_team')  ? 'selected' : '' }}>{{ $team->name }}</option>
                    @endforeach
                </select>
                @error('home_team')
                <small class="text-danger fw-bold d-block">{{ $message }}</small>
                @enderror
            </div>
            <div class="my-3">
                <label for="guest_team" class="form-label">Guest Team</label>

                <select name="guest_team" id="guest_team">
                    <option value="" selected disabled>Choose a guest team</option>

                    @foreach($teams as $team)
                    <option value="{{ $team->id }}" {{ $team->id === old('guest_team')  ? 'selected' : '' }}>{{ $team->name }}</option>
                    @endforeach
                </select>
                @error('guest_team')
                <small class="text-danger fw-bold d-block">{{ $message }}</small>
                @enderror
            </div>

            <div class="my-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" name="date" id="date" class="form-control" value="{{ old('date') }}">
                @error('date')
                <small class=" text-danger fw-bold d-block">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-success mt-2">Save</button>
        </form>
    </div>

</main>
@endsection