@extends('BrainsterLabs.layout.app')

@section('addProject')

<main>

    <div class="container">
        <div class="add mx-auto">
            <h3 class="mt-5 fw-bold">Додај нов проект:</h3>
            @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show my-3 px-2" role="alert">
                <ul class="m-0">
                    @foreach($errors->all() as $error)
                    <li class="fw-bold m-0 p-0 text-danger">{{$error}}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show my-3 px-2" role="alert">
                <p class="fw-bold m-0 p-0 text-success">{{ session('success') }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <form action="{{ route('storeProject') }}" method="POST">
                @csrf

                <input type="text" hidden id="created_at" name="created_at" value="{{ now() }}">
                <input type="text" hidden id="updated_at" name="updated_at" value="{{ now() }}">

                <div class="my-4">
                    <label for="name" class="form-label">Име</label>
                    <input type="text" required class="form-control" id="name" name="name" value="{{ old('name') }}">
                </div>
                <div class="my-4">
                    <label for="subtitle" class="form-label">Поднаслов</label>
                    <input type="text" required class="form-control" id="subtitle" name="subtitle" value="{{ old('subtitle') }}">
                </div>
                <div class="my-4">
                    <label for="photo" class="form-label">Слика</label>
                    <input type="utl" required class="form-control" id="photo" name="photo" value="{{ old('photo') }}" placeholder="http://">
                </div>
                <div class="my-4">
                    <label for="URL" class="form-label">URL</label>
                    <input type="url" required class="form-control" id="URL" name="URL" value="{{ old('URL') }}" placeholder="http://">
                </div>
                <div class="my-4">
                    <label for="description" class="form-label">Опис</label>
                    <textarea required class="form-control" name="description" id="description">{{ old('description') }}</textarea>
                </div>
                <button type="submit" class="btn d-block w-100 gold mt-4 mb-5">Додај</button>
            </form>
        </div>
    </div>
</main>

@endsection