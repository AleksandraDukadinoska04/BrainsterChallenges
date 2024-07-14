@extends('website.layout.app')

@section('title', 'Contact')
@section('backgroud', 'backgroudImage3')
@section('h1', 'Contact Me')
@section('desc', 'Have questions? I have answers!')
@section('class1', 'text-center')


@section('contact')

<main>
    <div class="container w-30 mx-auto my-5 p-0">
        <form action="" method="POST">
            <label for="name">Name</label>
            <input type="text" id="name" name="name">
            <br>
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email">
            <br>
            <label for="phone">Phone Number</label>
            <input type="num" id="phone" name="phone">
            <br>
            <label for="message">Message</label>
            <textarea name="message" id="message" rows="4"></textarea>
            <br>
            <button type="submit" class="btn btn-primary rounded-0 fw-bold">SEND</button>
        </form>
    </div>
    <hr class="mx-3">
</main>

@endsection