@extends('website.layout.app')

@section('title', 'Home')
@section('backgroud', 'backgroudImage1')
@section('h1', 'Clean Blog')
@section('desc', 'A Blog Theme By Start Bootstrap')
@section('class1', 'text-center')


@section('home')

<main>
    <div class="container w-30 mx-auto my-5 p-0">
        <h3 class="fw-bold">Lorem Ipsum</h3>
        <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat possimus quasi odit. Eaque quia nobis sunt iste iure adipisci rem.</p>
        <small class="text-body-secondary fst-italic"> Posted by <b>John Doe</b></small>
        <br>
        <hr>
        <h3 class="fw-bold">Lorem Ipsum 2</h3>
        <small class="text-body-secondary fst-italic"> Posted by <b>John Doe</b> in another boring news</small>
        <br>
        <hr>
        <h3 class="fw-bold">Lorem Ipsum 3</h3>
        <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga necessitatibus accusantium veritatis quos voluptate quia beatae illo, unde laboriosam ipsam deleniti cum dolores fugiat recusandae id magni rerum sequi? Cum doloremque ducimus explicabo porro aspernatur quod obcaecati earum itaque maiores et eaque, autem ipsa eos eius optio nisi nemo sunt?</p>
        <small class="text-body-secondary fst-italic"> Posted by <b>John Doe</b></small>
        <br>
        <hr>
        <h3 class="fw-bold">Lorem Ipsum 4</h3>
        <p class="mb-0">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Incidunt, commodi.</p>
        <small class="text-body-secondary fst-italic"> Posted by <b>Missy Doe</b></small>
        <br>
        <hr>
        <button class="btn btn-primary rounded-0 d-block ms-auto fw-bold">Older posts -></button>
        <br>
    </div>
    <hr class="mx-3">
</main>

@endsection