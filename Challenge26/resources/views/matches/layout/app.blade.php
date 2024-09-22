@include('matches.layout.head')


<body class="bg-light py-5">
    @include('matches.layout.navbar')


    @hasSection('content')
    @yield('content')
    @endif


    @include('matches.layout.scripts')


</body>

</html>