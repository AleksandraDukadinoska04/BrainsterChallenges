@extends('forum.layout.app')

@section('content')

<div class="container pb-5">
    <h1 class="text-center my-5">Welcome to the Forum</h1>

    <div class="bg-white shadow my-3 border border-2 border-light-subtle rounded p-5">
        <small class="text-muted text-capitalize m-0 w-25 text-end ms-auto d-block">{{ $discussion->category->category }} <b>|</b> {{ $discussion->user->name }}
            @if($discussion->user->role->role === 'Admin')
            (<span class="text-primary">Admin</span>)
            @endif
        </small>
        <div class="w-75 mx-auto mt-5">
            <div class="w-100">
                <img src="{{ $discussion->photo ? asset('storage/' . $discussion->photo) : 'images.png' }}" alt="" class="w-75 mx-auto d-block">
            </div>
            <div class="w-75 mx-auto mt-5">
                <h4 class="m-0 mb-2 mt-4">{{ $discussion->title }}</h4>
                <small class="text-muted">{{ $discussion->description }}</small>
            </div>
        </div>

    </div>

    <div class="">
        <h3 class="mt-5 mb-3">Comments:</h3>
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show alerts w-50 my-3" role="alert">
            <p class="fw-bold m-0 p-0 text-success">{{ session('success') }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show alerts w-50 my-3" role="alert">
            <p class="fw-bold m-0 p-0 text-danger">{{ session('error') }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if(Auth::check())
        <a href="{{ route('addComment', $discussion->id) }}" class="btn btn-secondary">Add comment</a>
        @endif



        @if ($comments->isEmpty())
        <p class="text-muted mt-4 fs-5"><i>There are no comments yet!</i></p>
        @else

        @foreach($comments as $comment)

        <div class="bg-white shadow my-4 border border-2 border-light-subtle rounded py-3 px-4 d-flex align-items-center justify-content-between">
            <div class="">
                <small class="text-muted">{{ $comment->user->name }}
                    @if($comment->user->role->role === 'Admin')
                    (<span class="text-primary">Admin</span>)
                    @endif
                    says:</small>

                <div class="d-flex">
                    <p class="m-0 me-2"> {{ $comment->comment}} </p>
                    @if (Auth::check() && Auth::id() === $comment->user_id)
                    <div class="action d-inline">
                        <a href="{{ route('editComment', $comment->id )}}"><i class="fa-solid fa-pen-to-square text-success "></i></a>


                        <button type="button" class="border-0 bg-white d-inline m-0 p-0" data-bs-toggle="modal" data-bs-target="#deleteID{{ $comment->id }}"><i class="fa-solid fa-trash text-danger"></i></button>


                        <!-- Modal -->
                        <div class="modal fade" id="deleteID{{ $comment->id }}" tabindex="-1" aria-labelledby="deleteID{{ $comment->id }}Label" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="deleteID{{ $comment->id }}Label">Delete</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete this comment?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <form action="{{ route('deleteComment', $comment->id )}}" method="POST" class="d-inline m-0">
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


            </div>

            <div class="">
                <small class="text-muted">{{ $comment->created_at }}</small>
            </div>

        </div>

        @endforeach

    </div>
    @endif


</div>




@endsection