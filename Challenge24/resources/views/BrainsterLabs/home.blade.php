@extends('BrainsterLabs.layout.app')

@section('content')

<main>
    @if (!session()->exists('logedIn') && !session()->exists('email'))
    <div class="banner w-100 d-flex align-items-center justify-content-center p-2">
        <div class="inner text-center text-white">
            <h1 class="fw-vold">Brainster.xyz Labs</h1>
            <small class="pale desc">Проекти од Академиите на Brainster</small>
        </div>
    </div>
    @endif

    <div class="container py-5">
        <div class="row flex-wrap justify-content-center align-items-strech ">
            @foreach($allProjects as $project)
            <a href="{{ $project->URL }}" target="_blank" class="col-lg-3 col-md-4 col-sm-12 project py-2 px-4 text-decoration-none rounded-2 text-center d-flex flex-column align-items-center justify-content-start g-3">
                <img class="w-75 mx-auto" src="{{ $project->photo }}" alt="Project Photo">
                <h4 class="text-capitalize my-3 fw-bold text-secondary">{{ $project->name }}</h4>
                <p class="text-muted">{{ $project->subtitle }}</p>
                <p class="text-black">{{ $project->description }}</p>
            </a>
            @endforeach

        </div>


    </div>

</main>

@endsection