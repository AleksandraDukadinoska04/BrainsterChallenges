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
        <h4 class="border-bottom border-light-subtle p-3 bg-light fs-5">Matches</h4>

        <div class="p-4">

            @if(auth()->user()->role->type === 'administrator')

            <div class="d-flex align-items-center justify-content-end mb-4">
                <a href="{{ route('matches.create') }}" class="btn btn-primary "> Add new Match</a>
            </div>

            @endif

            <table class="table border-top">
                <thead>
                    <tr>
                        <th scope="col">Home Team</th>
                        <th scope="col">Guest Team</th>
                        <th scope="col">Date</th>
                        <th scope="col">Result</th>
                        @if(auth()->user()->role->type === 'administrator')
                        <th scope="col"></th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($matches as $match)
                    <tr>
                        <td>{{ $match->homeTeam->name }}</td>
                        <td>{{ $match->guestTeam->name}}</td>
                        <td>{{ $match->date }}</td>
                        <td> {{ $match->result === null ? '/' : $match->result }}</td>

                        @if(auth()->user()->role->type === 'administrator')
                        <td>
                            <a href="{{ route('match.edit' , $match->id) }}" class="text-decoration-none">Edit</a>
                            <form action="{{ route('match.delete', $match->id) }}" method="POST" class="d-inline">
                                @csrf
                                @METHOD('DELETE')
                                <button type="submit" class="bg-white text-primary border-0">Delete</button>
                            </form>
                        </td>
                        @endif

                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>

</main>
@endsection