@extends('matches.layout.app')

@section('content')
<main>

    <div class="bg-white border border-light-subtle rounded border-2 w-50 mx-auto mt-5">
        <h4 class="border-bottom border-light-subtle p-3 bg-light fs-5">Edit a Match</h4>

        <form action="{{ route('match.update', $match->id) }}" method="POST" class="p-3">
            @csrf
            @METHOD('PUT')
            <div class="mb-3">
                <label for="home_team" class="form-label">Home Team</label>

                <select name="home_team" id="home_team">
                    <option value="" selected disabled>Choose a home team</option>
                    @foreach($teams as $team)
                    <option value="{{ $team->id }}" {{ $team->id === $match->home_team ? 'selected' : '' }}>{{ $team->name }}</option>
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
                    <option value="{{ $team->id }}" {{ $team->id === $match->guest_team  ? 'selected' : '' }}>{{ $team->name }}</option>
                    @endforeach
                </select>
                @error('guest_team')
                <small class="text-danger fw-bold d-block">{{ $message }}</small>
                @enderror
            </div>

            <div class="my-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" name="date" id="date" class="form-control" value="{{ $match->date }}">
                @error('date')
                <small class=" text-danger fw-bold d-block">{{ $message }}</small>
                @enderror
            </div>

            @if($match->date <= now())
                <div class="my-3">
                <label for="result" class="form-label">Result</label>
                <input type="text" name="result" id="result" class="form-control" value="{{ $match->result }}">
                @error('result')
                <small class=" text-danger fw-bold d-block">{{ $message }}</small>
                @enderror
    </div>
    @endif

    <button type="submit" class="btn btn-success mt-2">Update</button>
    </form>
    </div>

</main>
@endsection