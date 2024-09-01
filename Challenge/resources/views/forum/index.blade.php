@extends('forum.layout.app')

@section('content')
<div class="container pb-5 pt-3">

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-1 mb-3 px-3 mx-auto alerts" role="alert">
        <p class="fw-bold m-0 p-0 text-success">{{ session('success') }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show mt-1 my-5 px-3 mx-auto alerts" role="alert">
        <p class="fw-bold m-0 p-0 text-danger">{{ session('error') }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <h1 class="text-center mb-5 mt-3">Welcome to the Forum</h1>
    <a href="{{ route('createDiscussion') }}" class="btn btn-secondary mb-2"><i class="fa-solid fa-plus text-white"></i> Add new discussion</a>
    <br>

    @if(Auth::check() && Auth::user()->role->role === 'Admin')
    <a href="{{ route('approveDiscussion') }}" class="btn btn-primary"><i class="fa-solid fa-gear text-white"></i> Approve discussions</a>
    @endif


    @if ($approvedDiscussion->isEmpty())
    <p class="text-center text-muted fs-5 my-5">Nothing here yet! Start a topic!</p>
    @else
    @foreach ($approvedDiscussion as $discussion)
    <div class=" bg-white shadow my-4 border border-light-subtle rounded p-4 d-flex align-items-center justify-content-between">
        <a href="{{ route('showDiscussion' , $discussion->id ) }}" class="text-decoration-none text-black d-flex align-items-center justify-content-between w-100">
            <div class="d-flex align-items-center justify-content-start">
                <div class="">
                    <img src="{{ $discussion->photo ? asset('storage/' . $discussion->photo) : 'images.png' }}" alt="Discussion Photo" class="w-50 mx-auto d-block">
                </div>
                <div class="d-flex flex-column align-items-start justify-content-center">
                    <h3 class="m-0 mb-3">{{ $discussion->title }}</h3>
                    <small class="text-muted">{{ $discussion->description }}</small>
                </div>
            </div>
            <div class="d-flex flex-column align-items-end justify-content-center w-25 text-center">
                <div class="w-100">
                    <p class="text-muted text-capitalize text-end m-0 mb-2">{{ $discussion->category->category }} <b>|</b> {{ $discussion->user->name }}
                        @if($discussion->user->role->role === 'Admin')
                        (<span class="text-primary">Admin</span>)
                        @endif
                    </p>
                </div>
                @if (Auth::check() && (Auth::id() === $discussion->user_id || Auth::user()->role->role === 'Admin'))
                <div class="action">

                    <a href="{{ route('editDiscussion', $discussion->id) }}"><i class="fa-solid fa-pen-to-square text-success fs-5"></i></a>


                    <button type="submit" class="border-0 bg-white d-inline m-0 p-0" data-bs-toggle="modal" data-bs-target="#deleteID{{ $discussion->id }}"><i class=" fa-solid fa-trash text-danger fs-5"></i></button>


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

                @endif
            </div>

        </a>
    </div>
    @endforeach
    @endif
</div>

@endsection