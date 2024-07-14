<!doctype html>
<html lang="en">

<head>
  <title>@yield('title')</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <!-- FONT AWESOME -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  <!-- CSS -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>
  <div class="backgroud @yield('backgroud') d-flex flex-column align-items-center justify-content-start">
    @include('website.layout.header')

    <div class="banner @yield('class1')">
      <h1 class="text-white fw-bold @yield('class2') ">@yield('h1')</h1>
      <p class="pale @yield('class3')">@yield('desc')</p>

      @hasSection('desc2')
      <small class="pale fst-italic fs-5">@yield('desc2')</small>
      @endif

    </div>
  </div>


  @hasSection('home')
  @yield('home')
  @endif

  @hasSection('aboutMe')
  @yield('aboutMe')
  @endif

  @hasSection('contact')
  @yield('contact')
  @endif

  @hasSection('samplePost')
  @yield('samplePost')
  @endif

  @include('website.layout.footer')

</body>

</html>