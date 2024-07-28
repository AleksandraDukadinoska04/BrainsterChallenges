@include('BrainsterLabs.layout.head')


<body>
    @include('BrainsterLabs.layout.navbar')
    @if (session()->exists('logedIn') && session()->exists('email'))
    @include('BrainsterLabs.layout.adminNavbar')
    @endif


    @hasSection('content')
    @yield('content')
    @endif

    @hasSection('addProject')
    @yield('addProject')
    @endif

    @hasSection('changeProject')
    @yield('changeProject')
    @endif

    @include('BrainsterLabs.layout.footer')
    @include('BrainsterLabs.layout.scripts')


</body>

</html>