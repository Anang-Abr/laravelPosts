<nav class="navbar navbar-expand-lg bg-dark">
  <div class="container">
    <a class="navbar-brand text-light" href="/home">BLOGS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-light {{ (request()->segment(1) == "home") ? "active" : "" }}" aria-current="page" href="/home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light {{ (request()->segment(1) == "about") ? "active" : "" }}" href="/about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light {{ (request()->segment(1) == "blogs") ? "active" : "" }}" href="/blogs">Blogs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light {{ (request()->segment(1) == "category") ? "active" : "" }}" href="/category">Category</a>
        </li>
      </ul>
      @auth
      <div class="nav-item dropdown text-light">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Hello, {{ Auth::user()->name }}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="{{ url('dashboard') }}">Dashboard</a></li>
            <li><hr class="dropdown-divider"></li>
            <form action="/logout" method="post">
              @csrf
              <button type="submit" class="dropdown-item">Log Out</button>
            </form>
          </ul>
        </div>
      @else
      <ul class="navbar nav">
        <a href="{{  url('login') }}" class="btn btn-outline-primary">Login</a>
      </ul>
      @endauth
    </div>
  </div>
</nav>