@extends('matches.layout.app')

@section('content')
<main>

    <div class="bg-white border border-light-subtle rounded border-2 w-50 mx-auto mt-5">
        <h4 class="border-bottom border-light-subtle p-3 bg-light fs-5">Edit a Player</h4>

        <form action="{{ route('player.update' , $player->id) }}" method="POST" class="p-3">
            @csrf
            @METHOD('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ $player->name }}">
                @error('name')
                <small class="text-danger fw-bold d-block">{{ $message }}</small>
                @enderror

            </div>
            <div class="my-3">
                <label for="date_of_birth" class="form-label">Date of Birth</label>
                <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="{{ $player->date_of_birth }}">
                @error('date_of_birth')
                <small class="text-danger fw-bold d-block">{{ $message }}</small>
                @enderror

            </div>

            <div class="my-3">
                <label for="team_id" class="form-label">Team</label>

                <select name="team_id" id="team_id" class="form-control">
                    <option value="" selected disabled>Choose a team</option>
                    @foreach($teams as $team)
                    <option value="{{ $team->id }}" {{ $team->id === $player->team_id  ? 'selected' : '' }}>{{ $team->name }}</option>
                    @endforeach
                </select>
                @error('team')
                <small class="text-danger fw-bold d-block">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-success mt-2">Update</button>
        </form>
    </div>

</main>
@endsection