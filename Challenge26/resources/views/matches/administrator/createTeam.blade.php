@extends('matches.layout.app')

@section('content')
<main>

    <div class="bg-white border border-light-subtle rounded border-2 w-50 mx-auto mt-5">
        <h4 class="border-bottom border-light-subtle p-3 bg-light fs-5">Create new Team</h4>

        <form action="{{ route('team.create') }}" method="POST" class="p-3">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
                @error('name')
                <small class="text-danger fw-bold d-block">{{ $message }}</small>
                @enderror

            </div>
            <div class="my-3">
                <label for="year_founded" class="form-label">Year Founded</label>
                <input type="number" name="year_founded" id="year_founded" class="form-control" placeholder="Year Founded" value="{{ old('year_founded') }}">
                @error('year_founded')
                <small class="text-danger fw-bold d-block">{{ $message }}</small>
                @enderror

            </div>

            <button type="submit" class="btn btn-success mt-2">Save</button>
        </form>
    </div>

</main>
@endsection