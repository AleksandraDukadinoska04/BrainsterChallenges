<!doctype html>
<html lang="en">

<head>
    <title>Informations</title>
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
        <a href="{{ route('home') }}" class="white">HOME</a>
        @if (session()->exists('name') && session()->exists('lastname'))
        <a href="{{ route('info') }}" class="orange">INFO</a>
        <a href="{{ route('logout') }}" class="white">LOG OUT</a>
        @else
        <a href="{{ route('login') }}" class="white">LOG IN</a>
        @endif
    </div>

    <div class="info w-50 mx-auto">
        <p>Your name is: {{session('name')}}</p>
        <p>Your last name is: {{session('lastname')}}</p>
        @if (session('email') !== null)
        <p>Your email is: {{session('email')}}</p>
        @endif
    </div>


    <footer>
        <p>Copyright &copy; Your Website 2018</p>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>