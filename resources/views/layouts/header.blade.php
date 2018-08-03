<header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
        </li>
        @if (! Auth::check())
        <li class="nav-item">
          <a class="nav-link" href="/login">Admin</a>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link" href="/logout">Logout</a>
        </li>
        @endif
        <li class="nav-item">
            <a class="nav-link" href="/leads/create">Create Lead</a>
        </li>
      </ul>
    </div>
    @if (Auth::check())
        <span class="navbar-text">{{ Auth::user()->name }}</span>
    @endif
  </nav>
</header>
