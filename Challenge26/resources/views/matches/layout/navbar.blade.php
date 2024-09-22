<header>
    <nav
        class="navbar navbar-expand-sm navbar-white bg-white shadow-sm px-5 fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('matches') }}">Laravel</a>
            <button
                class="navbar-toggler d-lg-none"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavId"
                aria-controls="collapsibleNavId"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav ms-auto mt-2 mt-lg-0">

                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                    @endguest


                    @auth

                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('matches') }}">Matches</a>
                    </li>

                    @if(auth()->user()->role->type == 'administrator')

                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('teams') }}">Teams</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('players') }}">Players</a>
                    </li>

                    @endif

                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            id="dropdownId"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false">{{ Auth::user()->name }}</a>
                        <div
                            class="dropdown-menu"
                            aria-labelledby="dropdownId">
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">Log Out</a>
                            </form>
                        </div>
                    </li>


                    @endauth
                </ul>

            </div>
        </div>
    </nav>

</header>