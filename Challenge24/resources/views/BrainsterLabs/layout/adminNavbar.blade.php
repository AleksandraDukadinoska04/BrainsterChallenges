<div class="container adminNavbar mx-auto mt-4">

    <ul class="nav nav-tabs">
        <li class="nav-items">
            <a class="nav-link @hasSection('addProject') active @endif" @hasSection('addProject') aria-current="page" @endif href="{{ route('addProject') }}">Додај</a>
        </li>
        <li class="nav-items">
            <a class="nav-link @hasSection('changeProject') active @endif" @hasSection('changeProject') aria-current="page" @endif href="{{ route('changeProject') }}">Измени</a>
        </li>

    </ul>
</div>