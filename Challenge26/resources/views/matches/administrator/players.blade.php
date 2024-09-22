@extends('matches.layout.app')

@section('content')
<main class="pt-3">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show alerts w-50 mt-4 mx-auto" role="alert">
        <p class="fw-bold m-0 p-0 text-success">{{ session('success') }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show alerts w-50 mt-4 mx-auto" role="alert">
        <p class="fw-bold m-0 p-0 text-danger">{{ session('error') }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="bg-white border border-light-subtle rounded border-2 w-50 mx-auto mt-3">
        <h4 class="border-bottom border-light-subtle p-3 bg-light fs-5">Players</h4>

        <div class="p-4">

            <div class="d-flex align-items-center justify-content-end mb-4">
                <a href="{{ route('player.create') }}" class="btn btn-primary "> Add new Player</a>
            </div>
            <table class="table border-top">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Date of Birth</th>
                        <th scope="col">Team</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($players as $player)
                    <tr>
                        <td>{{ $player->name }}</td>
                        <td>{{ $player->date_of_birth}}</td>
                        <td>{{ $player->team->name }}</td>
                        <td>
                            <a href="{{ route('player.edit' , $player->id) }}" class="text-decoration-none">Edit</a>
                            <form action="{{ route('player.delete', $player->id) }}" method="POST" class="d-inline">
                                @csrf
                                @METHOD('DELETE')
                                <button type="submit" class="bg-white text-primary border-0">Delete</button>
                            </form>
                        </td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>

</main>
@endsection