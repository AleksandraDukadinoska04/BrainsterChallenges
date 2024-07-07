<!doctype html>
<html lang="en">

<head>
    <title>Home</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <h1>BUSINES CASUAL</h1>
    <div class="navbar">
        <a href="{{ route('home') }}" class="orange">HOME</a>
        @if (session()->exists('name') && session()->exists('lastname'))
        <a href="{{ route('info') }}" class="white">INFO</a>
        <a href="{{ route('logout') }}" class="white">LOG OUT</a>
        @else
        <a href="{{ route('login') }}" class="white">LOG IN</a>
        @endif
    </div>

    <div class="image">
        <img src="{{ asset('images/cafe.jpg') }}" alt="Cafe">

        <div class="text">
            <small>LOREM IPSUM</small>
            <h2>LOREM IPSUM</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem ipsam, non placeat, laborum at illum eligendi assumenda quibusdam neque, facilis voluptate corporis repellat deleniti ea ex eaque incidunt ullam eum!</p>
            <p class="visit">Visit us today</p>
        </div>
    </div>

    <div class="toYou">
        <div class="inner">
            <small>OUR PROMISE</small>
            @if (session()->exists('name') && session()->exists('lastname'))
            <h2 class="text-uppercase">TO {{session('name')}} {{session('lastname')}}</h2>
            @else
            <h2>TO YOU</h2>
            @endif
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi veritatis incidunt totam? Voluptatum illo ratione odio, adipisci dolorem officia maiores qui corrupti placeat nulla, a voluptatibus velit. Odit, quasi? Ut nisi itaque, dolore eligendi ratione omnis mollitia, nulla at quis ullam natus modi similique dolorem blanditiis dignissimos adipisci minus repudiandae.</p>
        </div>
    </div>

    <footer>
        <p>Copyright &copy; Your Website 2018</p>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>