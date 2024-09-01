@extends('forum.layout.app')

@section('content')
<div class="container pb-5">

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3 mb-3 px-3 mx-auto alerts" role="alert">
        <p class="fw-bold m-0 p-0 text-success">{{ session('success') }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <h1 class="text-center my-5">Approve Discussions</h1>

    @if ($notApprovedDiscussions->isEmpty())
    <p class="text-center text-muted fs-5 my-5">There are no discussions for approving!</p>
    @else
    @foreach ($notApprovedDiscussions as $discussion)
    <div class=" bg-white shadow my-3 border border-light-subtle rounded p-4 d-flex align-items-center justify-content-between">
        <a href="" class="text-decoration-none text-black d-flex align-items-center justify-content-between w-100">
            <div class="d-flex align-items-start justify-content-center">
                <div class="">
                    <img src="{{ $discussion->photo ? asset('storage/' . $discussion->photo) : 'images.png' }}" alt="Discussion Photo" class="w-50 mx-auto d-block">
                </div>
                <div class="d-flex flex-column align-items-start justify-content-center">
                    <h4 class="m-0 mb-2">{{ $discussion->title }}</h4>
                    <small class="text-muted">{{ $discussion->description }}</small>
                </div>
            </div>
            <div class="d-flex flex-column align-items-center justify-content-center w-25 text-center">
                <div class="w-100">
                    <p class="text-muted text-capitalize m-0 mb-2">{{ $discussion->category->category }} <b>|</b> {{ $discussion->user->name }}
                        @if($discussion->user->role->role === 'Admin')
                        (<span class="text-primary">Admin</span>)
                        @endif

                    </p>
                </div>

                <div class="action">

                    <a href="{{ route('editDiscussion', $discussion->id) }}"><i class="fa-solid fa-pen-to-square text-primary fs-5 d-inline mx-1"></i></a>

                    <form action="{{ route('approve', $discussion->id) }}" method="POST" class="d-inline m-0 p-0">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="border-0 bg-white d-inline m-0 p-0"><i class="fa-solid fa-check text-success fs-5"></i></button>
                    </form>

                    <button type="button" class="border-0 bg-white d-inline m-0 p-0" data-bs-toggle="modal" data-bs-target="#deleteID{{ $discussion->id }}"><i class="fa-solid fa-trash text-danger fs-5"></i></button>


                    <!-- Modal -->
                    <div class="modal fade" id="deleteID{{ $discussion->id }}" tabindex="-1" aria-labelledby="deleteID{{ $discussion->id }}Label" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="deleteID{{ $discussion->id }}Label">Delete</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body m-0 text-start">
                                    <p class="m-0">Are you sure you want to delete this Discussion?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <form action="{{ route('deleteDiscussion', $discussion->id )}}" method="POST" class="d-inline m-0">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </a>
    </div>
    @endforeach
    @endif
</div>

@endsection