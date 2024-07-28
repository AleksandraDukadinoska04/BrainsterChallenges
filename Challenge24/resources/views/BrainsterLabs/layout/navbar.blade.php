<header>
    <nav class="navbar gold navbar-expand-md fixed-top p-1">
        <div class="container-fluid">

            <a class="navbar-brand" href="{{ route('home') }}">
                <img class="logo-img" src="{{ asset('Images/logo_footer_black.png') }}" alt="Logo">
                <small class="logo-text fw-bold p-0 logo">BRAINSTER</small>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item text-center">
                        <a class="nav-link" aria-current="page" target="_blank" href="https://brainster.co/full-stack/">Академија за Програмирање</a>
                    </li>
                    <li class="nav-item text-center">
                        <a class="nav-link" target="_blank" href="https://brainster.co/marketing/">Академија за Маркетинг</a>
                    </li>
                    <li class="nav-item text-center">
                        <a class="nav-link" target="_blank" href="https://brainster.co/graphic-design/">Академија за Дизајн</a>
                    </li>
                    <li class="nav-item text-center">
                        <a class="nav-link d-flex align-items-center justify-content-center text-center" target="_blank" href="https://blog.brainster.co/">Блог</a>
                    </li>
                    <li class="nav-item text-center">
                        <a class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal">Вработи наши студенти</a>
                    </li>
                    <!-- @if (session()->exists('logedIn') && session()->exists('email'))
                    <li class="nav-item text-center">
                        <a class="nav-link" href="{{ route('logout') }}">Одлогирај се</a>
                    </li>
                    @endif -->

                </ul>

            </div>
        </div>
    </nav>
</header>

@include('BrainsterLabs.layout.modal')