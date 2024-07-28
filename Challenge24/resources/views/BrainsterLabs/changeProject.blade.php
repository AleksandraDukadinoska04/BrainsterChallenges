@extends('BrainsterLabs.layout.app')

@section('changeProject')

<main>
    <div class="container py-5">
        @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show mt-1 mb-5 px-3 mx-auto alerts" role="alert">
            <p class="fw-bold m-0 p-0 text-дангер">Се појави ерор при валидирањето на внесовите, проверете ја формата на проектот кој сакавте да го измените!</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-1 mb-5 px-3 mx-auto alerts" role="alert">
            <p class="fw-bold m-0 p-0 text-success">{{ session('success') }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show mt-1 mb-5 px-3 mx-auto alerts" role="alert">
            <p class="fw-bold m-0 p-0 text-danger">{{ session('error') }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="row flex-wrap justify-content-center align-items-strech ">
            @foreach($allProjects as $project)
            <div class="col-lg-3 col-md-4 project rounded-2 text-center  p-0">
                <div class="card h-100">
                    <a href="{{ $project->URL }}" target="_blank" class="pt-2 px-4  text-decoration-none rounded-2 text-center d-flex flex-column align-items-center justify-content-start g-3">

                        <img class="w-75 mx-auto" src="{{ $project->photo }}" alt="Project Photo">
                        <h4 class="text-capitalize my-3 fw-bold text-secondary">{{ $project->name }}</h4>
                        <p class="text-muted">{{ $project->subtitle }}</p>
                        <p class=" text-black">{{ $project->description }}</p>

                    </a>
                    <div class="buttons p-2 w-100 animate__animated">
                        <button class="edit-delete edit d-inline py-1 px-2"><i class="fa-solid fa-pen-to-square hoverEdit"></i></button>
                        <button class="edit-delete d-inline py-1 px-2" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $project->id }}"><i class="fa-solid fa-xmark hoverDelete"></i></button>
                    </div>
                </div>

                <div class="form">
                    <form action="{{ route('updateProject', $project->id) }}" method="POST" class="w-100">
                        <h4 class="fw-bold mt-2">Измени го Проектот</h4>
                        @csrf
                        @method('patch')
                        <input type="text" hidden id="created_at" name="created_at" value="{{ now() }}">
                        <input type="text" hidden id="updated_at" name="updated_at" value="{{ now() }}">

                        <div class="groups p-2">
                            <div class="my-4">
                                <label for="name" class="form-label">Име</label>
                                <input type="text" required class="form-control" id="name" name="name" value="{{ $project->name }}">
                                @error('name')
                                <small class="text-danger fw-bold">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="my-4">
                                <label for="subtitle" class="form-label">Поднаслов</label>
                                <input type="text" required class="form-control" id="subtitle" name="subtitle" value="{{ $project->subtitle }}">
                                @error('subtitle')
                                <small class="text-danger fw-bold">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="my-4">
                                <label for="photo" class="form-label">Слика</label>
                                <input type="url" required class="form-control" id="photo" name="photo" value="{{ $project->photo }}" placeholder="http://">
                                @error('photo')
                                <small class="text-danger fw-bold">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="my-4">
                                <label for="URL" class="form-label">URL</label>
                                <input type="url" required class="form-control" id="URL" name="URL" value="{{ $project->URL }}" placeholder="http://">
                                @error('URL')
                                <small class="text-danger fw-bold">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="my-4">
                                <label for="description" class="form-label">Опис</label>
                                <textarea required class="form-control" name="description" id="description">{{ $project->description }}</textarea>
                                @error('description')
                                <small class="text-danger fw-bold">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="action w-100 p-3">
                            <button class="save me-2" type="submit">Зачувај</button>
                            <button class="cancel" type="button">Откажи</button>
                        </div>
                    </form>


                </div>
            </div>

            <!-- DELETE MODAL -->
            <div class="modal fade" id="exampleModal-{{ $project->id }}" tabindex="-1" aria-labelledby="exampleModal-{{ $project->id }}Label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title fs-5 fw-bold" id="exampleModal-{{ $project->id }}Label">Избриши</h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="m-0">Дали сте сигурни дека сакате да го избришете проектот?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Откажи</button>

                            <form action="{{ route('deleteProject', $project->id )}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn gold">Избриши</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

    </div>

</main>


@endsection