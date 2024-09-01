@extends('forum.layout.app')

@section('content')


<div class="container">


    <h1 class="text-center mb-5 mt-3">Add Comment</h1>


    <form action="{{ route('storeComment') }}" method="POST" class="w-50 mx-auto my-4">
        @csrf

        <input type="hidden" id="discussion_id" name="discussion_id" value="{{ $discussion_id }}">
        <label for="comment" class="form-label">Comment</label>
        <textarea name="comment" id="comment" class="form-control bg-white border-2 border border-light-subtle rounded ">{{ old('comment') }}</textarea>
        @error('comment')
        <small class="text-danger fw-bold d-block">{{ $message }}</small>
        @enderror
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>

</div>


@endsection