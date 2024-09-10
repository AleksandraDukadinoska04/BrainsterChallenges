@include('vehicles.layout.head')


<body>
    @include('vehicles.layout.navbar')


    @hasSection('content')
    @yield('content')
    @endif

    @include('vehicles.layout.footer')
    @include('vehicles.layout.scripts')


</body>

</html>