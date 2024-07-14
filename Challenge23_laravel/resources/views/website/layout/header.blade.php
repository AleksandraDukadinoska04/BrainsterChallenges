<header>
  <div class="navbar d-flex justify-content-between align-items center w-100">
    <a href="{{ route('home') }}" class="text-white text-decoration-none w-25 fw-bold mx-auto">Blog</a>
    <ul class="d-flex justify-content-center align-items center w-50">
      <li><a href="{{ route('home') }}" class="pale text-decoration-none mx-2 hoverLine  @hasSection('home') active @endif">HOME</a></li>
      <li><a href="{{ route('aboutMe') }}" class="pale text-decoration-none mx-2 hoverLine @hasSection('aboutMe') active @endif">ABOUT</a></li>
      <li><a href="{{ route('samplePost') }}" class="pale text-decoration-none mx-2 hoverLine @hasSection('samplePost') active @endif">SAMPLE POST</a></li>
      <li><a href="{{ route('contact') }}" class="pale text-decoration-none mx-2 hoverLine @hasSection('contact') active @endif">CONTACT</a></li>
    </ul>
  </div>
</header>