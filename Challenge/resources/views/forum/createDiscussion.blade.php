@extends('forum.layout.app')

@section('content')

<div class="container">
<h1 class="text-center mb-5 mt-3">Create Discussion</h1>

    <form action="{{ route('storeDiscussion') }}" method="POST" class="w-50 mx-auto my-5">
        @csrf

        <div class="my-4">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
            @error('title')
            <small class="text-danger fw-bold d-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="my-4">
            <label for="photo" class="form-label d-block">Photo</label>
            <input type="file" id="photo" name="photo" value="{{ old('photo') }}">
            @error('photo')
            <small class="text-danger fw-bold d-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="my-4">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
            @error('description')
            <small class="text-danger fw-bold d-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="my-4">
            <label for="category" class="form-label">Category</label>
            <select name="category" id="category">
                <option value="" selected disabled>Choose</option>

                @foreach ($categories as $category)
                <option class="text-capitalize" value="{{ $category->id }}" {{ $category->id === old('category')  ? 'selected' : '' }}>{{ $category->category }}</option>
                @endforeach

            </select>
            @error('category')
            <small class="text-danger fw-bold d-block">{{ $message }}</small>
            @enderror
        </div>

        <button class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection