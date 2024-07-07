<!doctype html>
<html lang="en">

<head>
    <title>LOG IN</title>
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
        <a href="{{ route('login') }}" class="orange">LOG IN</a>
    </div>

    <div class="form w-50 mx-auto ">
        <form action="{{ route('login') }}" method="POST">
            @csrf

            @error('name')
            <span>{{ $message }}</span>
            @enderror
            <label for="name" class="d-block w-100 text-white form-label">NAME</label>
            <input type="text" id="name" name="name" class="d-block w-100 form-control" value="{{ old('name') }}">

            @error('lastname')
            <span>{{ $message }}</span>
            @enderror
            <label for="lastname" class="d-block w-100 text-white form-label">LAST NAME</label>
            <input type="text" id="lastname" name="lastname" class="d-block w-100 form-control" value="{{ old('lastname') }}">

            @error('email')
            <span>{{ $message }}</span>
            @enderror
            <label for="email" class="d-block w-100 text-white form-label">EMAIL</label>
            <input type="text" id="email" name="email" class="d-block w-100 form-control" value="{{ old('email') }}">

            <button type="submit" class="w-100 btn btn-primary my-3">Submit</button>
        </form>
    </div>



    <footer>
        <p>Copyright &copy; Your Website 2018</p>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>