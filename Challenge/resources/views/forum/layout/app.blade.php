@include('forum.layout.head')


<body class="bg-light">

    @include('forum.layout.navbar')

    <main>
        @hasSection('content')
        @yield('content')
        @endif
    </main>

    @include('forum.layout.scripts')


</body>

</html>